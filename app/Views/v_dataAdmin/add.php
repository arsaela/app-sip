<?= $this->section('content') ?>

<?php
if (session()->getFlashData('error')) {
  ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('error') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
}
?>




<div class="modal fade" id="modalAdd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Input Data Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="formInputDataAdmin">
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control username2" name="username2" id="username2" placeholder="Username">
            <small id="username_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_nama">Nama Admin</label>
            <input type="text" class="form-control" name="admin_nama2" id="admin_nama2" placeholder="Nama Admin" required>
            <small id="admin_nama_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_no_hp">No. HP</label>
            <input type="text" class="form-control" name="admin_no_hp2" placeholder="No. HP">
            <small id="admin_no_hp_error" class="text-d


            anger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_email">Email</label>
            <input type="email" class="form-control" name="admin_email2" placeholder="Email">
            <small id="admin_email_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_password">Password</label>
            <input type="password" class="form-control" name="admin_password2" placeholder="Password">
            <small id="admin_password_error" class="text-danger"> </small>
          </div>
        </div>
      </form>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-saveDataAdmin" class="btn btn-primary">Save</button>


      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

</script>
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
  $(document).ready(function() {
    // $('#frm-inputusulan').validate();

    // get Edit Product
    $('body').on('click', '#btn-saveDataAdmin', function() {

      // // get data from button edit
      // const id = $(this).data('id');
      // const name = $(this).data('name');
      // const kekuranganformasi = $(this).data('kekuranganformasi');
      // const instansiunor_nama = $(this).data('instansiunornama');
      // const instansiunor = $(this).data('instansiunor');
      // const jabatan_kode = $(this).data('jabatan_kode');
      // const price = $(this).data('price');
      // const category = $(this).data('category_id');

      // var get_found_usulan = $("#txtname").val();

      // // alert(id);
      // // Set data to Form Edit
      // $('.usulan_id').val(id);
      // $('.jabatan_kode').val(jabatan_kode);
      // $('.jabatan_nama').val(name);
      // $('.kekuranganformasi').val(kekuranganformasi);
      // $('.instansi_unor_nama').val(instansiunor_nama);
      // $('.instansi_unor').val(instansiunor);

      // // if(!empty($get_found_usulan)){


      // // }
      // // Call Modal Edit
      // $('#editModal').modal('show');






      //alert('jumlahkebutuhanformasi = '+kekuranganformasi);

      $('#formInputDataAdmin').validate({
        alert('tessss');
        rules: {
         username2 : {
          required: true,
        },
        admin_nama2 : {
          required: true,
        },
        // jumlah_usulan_formasi: {
        //   digits: true,
        //   min: 1,
        //   max: kekuranganformasi
        // }

          // pass2: {
          //   equalTo: "#pass1"
          // }
        },
        messages: {
           username2: "Silahkan masukkan username anda",
           admin_nama2: "Silahkan masukkan nama anda",
          // jumlah_usulan_formasi: {
          //   required: "Jumlah usulan harus di isi",
          //   min: "Jumlah usulan minimal 1",
          //   max: "Jumlah usulan tidak boleh melebihi jumlah kekurangan formasi"

          // }
        }
      });


    });






    //Menampilakan modal detail pegawai
    $('body').on('click', '.edit', function() {
      var instansiunor = $(this).attr("instansi_unor");
      var jabatankode = $(this).attr("jabatan_kode");
      $.ajax({
        url: "/dataFormasi/detail_pegawai/",
        type: "GET",
        dataType: "JSON",
        data: {
          instansiunor: instansiunor,
          jabatankode: jabatankode
        },
        success: function(data) {
          var output = '';
          var no = 0;
          var i = 0;

          if(data.length==0){
           output += '<tr>' +
           '<td colspan="4" style="background-color:#fff; color:red; text-align:center;">' +  'Data PNS tidak ditemukan ..' + '</td>' +
           '</tr>';
           i++;
         } else {
          while (i < data.length) {
            no++;
            output += '<tr>' +
            '<td>' + no + '</td>' +
            '<td>' + data[i].pegawai_nama + '</td>' +
            '<td>' + data[i].pegawai_nip + '</td>' +
            '<td>' + data[i].jabatan_nama + '</td>' +
            // '<td>'+data[i].formasi_jumlah+'</td>'+

            '</tr>';
            i++;
          }
        }

        $('#myModal').modal("show");
        $('#show_data').html(output);
      }
    })

    });


  });
</script>
<?= $this->endSection() ?>

<style type="text/css">
.error {
  color: #F00;
  background-color: #FFF;
}
</style>