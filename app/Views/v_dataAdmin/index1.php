<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('head') ?>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <style>
    /* .invalid class prevents CSS from automatically applying */
.invalid input:required:invalid {
  background: #BE4C54;
}

/* Mark valid inputs during .invalid state */
.invalid input:required:valid {
  background: #17D654;
}
  </style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Import Data</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        <?php
		if(session()->getFlashdata('message')){
		?>
			<div class="alert alert-info">
				<?= session()->getFlashdata('message') ?>
			</div>
		<?php
		}
		?>
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Admin 1</h3><br>
              <div class="card-tools">
                <a data-toggle="tooltip" data-placement="top" title="Add">
                  <button type="button" class="btn btn-outline-primary btn-sm" type="button"  data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                  </button>
                </a>
              </div>
              <div class="mt-1">
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="datatable-list" class="table table-bordered table-striped">
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
                  <?php $no = 1;
                   $encrypter = \Config\Services::encrypter();
                  foreach ($min as $value) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $value['username'] ?></td>
                      <td><?php echo $encrypter->decrypt(base64_decode($value['password'])); ?></td>
                      <td><?php echo $value['admin_nama'] ?></td>
                      <td><?php echo $value['admin_no_hp'] ?></td>
                      <td><?php echo $value['admin_email'] ?></td>
                      <td>
                        <button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='fa fa-edit'></i></button>
                        <form action="/dataadmin1/<?=$value['username']; ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="delete">
                            <button type='submit' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php $no++; } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>


    <!-- Modal ADD -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="dataadmin1/add" method="post" class="needs-validation" novalidate>
        <?= csrf_field(); ?>
            <div class="modal-body">
              <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  <div class="invalid-feedback">
              Please enter a valid email address
            </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="admin_nama" placeholder="Nama">
                </div>
              </div>
              <div class="form-group row">
                <label for="nohp" class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nohp" name="admin_no_hp" placeholder="No HP">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="admin_email" placeholder="Email">
                </div>
              </div>

              <fieldset class="form-group">
                <div class="row">
                  <label class="col-form-label col-sm-2 pt-0">Hak Akses</label>
                    <div class="form-check col-sm-2">
                      <input class="form-check-input" type="radio" name="hak_akses" id="gridRadios1" value="admin" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Admin
                      </label>
                    </div>
                    <div class="form-check col-sm-3">
                      <input class="form-check-input" type="radio" name="hak_akses" id="gridRadios2" value="petugas">
                      <label class="form-check-label" for="gridRadios2">
                        Petugas
                      </label>
                    </div>
                    
                </div>
              </fieldset>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
        </div>
    </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

</script>
<?= $this->endSection() ?>