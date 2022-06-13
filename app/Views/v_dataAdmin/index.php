<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Data Admin</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Modal Add -->
          <?php include 'add.php';  ?>

          <!-- Default box -->
          <div class="card">

            <!-- validasi alert register gagal -->
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4>Terdapat kesalahan dalam penginputan</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
              </div>
            <?php endif; ?>

            <div class="card-header">
              <h3 class="card-title">Tabel Data Admin</h3>

              <div class="card-tools">
                <a data-toggle="tooltip" data-placement="top" title="Add">
                  <button id="addBankSoal" type="button" class="btn btn-outline-primary btn-sm" type="button" data-toggle="modal" data-target="#modalAdd">
                    <i class="fas fa-plus"></i>
                  </button>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama Admin</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

  <!-- Modal Edit -->
  <?php include 'edit.php';  ?>
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  $(document).ready(function() {

    //Menampilkan data admin (dataTable server-side)
    $('#example1').DataTable({
      "responsive": true,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "dataadmin/ajaxDataAdmin",
        "type": "POST"
      },

      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    });
    //-------------------------------------------------------------------

    //Save input data admin
    $('#btn-saveDataAdmin').on('click', function() {
      const formInput = $('#formInputDataAdmin');

      $.ajax({
        url: "dataadmin/add",
        method: "POST",
        data: formInput.serialize(),
        dataType: "JSON",
        success: function(data) {
          //Data error 
          // if (data.error) {
          //   if (data.username_error['username'] != '') $('#username_error').html(data.username_error['username']);
          //   else $('#username_error').html('');
          // }
          //Data admin berhasil disimpan
          if (data.success) {
            formInput.trigger('reset');
            $('#modalAdd').modal('hide');
            $('#username_error').html('');
            $('#example1').DataTable().ajax.reload();
            toastr.success('Data admin berhasil disimpan.');
          }

        }

      });

    });
    //-------------------------------------------------------------------

    //Menampilakan modal edit data admin
    $('body').on('click', '.btn-editAdmin', function() {
      const idAdmin = $(this).attr('value');
      $.ajax({
        url: "dataadmin/ajaxUpdate/" + idAdmin,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="idAdmin"]').val(data.id);
          $('[name="username2"]').val(data.username);
          $('[name="admin_nama2"]').val(data.admin_nama);
          $('[name="admin_no_hp2"]').val(data.admin_no_hp);
          $('[name="admin_email2"]').val(data.admin_email);
          $('#modalEdit').modal('show');
        }
      })

    });
    //-------------------------------------------------------------------

    //Save update data admin
    $('#btn-updateDataAdmin').on('click', function() {
      const formUpdate = $('#formUpdateDataAdmin');

      $.ajax({
        url: "dataadmin/update",
        method: "POST",
        data: formUpdate.serialize(),
        dataType: "JSON",
        success: function(data) {
          //Data error 
          if (data.error) {
            if (data.username_error['username'] != '') $('#username2_error').html(data.username_error['username']);
            else $('#username2_error').html('');
          }
          //Data admin berhasil disimpan
          if (data.success) {
            formUpdate.trigger('reset');
            $('#modalEdit').modal('hide');
            $('#username2_error').html('');
            $('#example1').DataTable().ajax.reload();
            toastr.info('Data admin berhasil diupdate.');
          }

        }

      });

    });
    //-------------------------------------------------------------------

    //Hapus data formasi jabatan
    $('body').on('click', '.btn-deleteAdmin', function(e) {
      e.preventDefault();
      const url = $(this).attr('href');

      Swal.fire({
        title: 'Hapus Data?',
        text: "Anda ingin menghapus data admin ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: url,
            method: "POST",
            success: function(response) {
              $('#example1').DataTable().ajax.reload()
              toastr.info('Data admin berhasil dihapus.');
            }
          });
        }
      });

    });
    //-------------------------------------------------------------------

  });
</script>
<?= $this->endSection() ?>