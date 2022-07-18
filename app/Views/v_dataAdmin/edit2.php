<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <!-- <h1>Data Informasi</h1> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">



    <div class="swal" data-swal="<?php echo session()->get('message');?>"> </div>

    <div class="row">
      <div class="col-md-8">
        <?php
        if (session()->get('err')){
          echo "<div class='alert alert-danger p-0 pt-2' role='alert'>". session()->get('err')."</div>";
          session()->remove('err');
        }
        ?>
      </div>
    </div>




    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <!-- content update data -->
          <div class="card">
            <div class="card-header bg-info text-white">
              <h4 class="card-title">Form Update Admin</h4>
            </div>
            <div class="card-body">
              <form method="post" action="<?= base_url('dataadmin/save_update_admin');?>">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" value="<?= $admin_by_id->username;?>" name="username" required class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label for="">Nama</label>
                  <div>
                    <input type="text" value="<?php echo $admin_by_id->admin_nama;?>" name="admin_nama" required class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="">No HP</label>
                  <div>
                   <input type="text" value="<?php echo $admin_by_id->admin_no_hp;?>" name="admin_no_hp" required class="form-control">
                 </div>
               </div>

               <div class="form-group">
                <label for="">Email</label>
                <div>
                  <input type="text" value="<?php echo $admin_by_id->admin_email;?>" name="admin_email" required class="form-control">
                </div>
              </div>
              <input type="hidden" value="<?= $admin_by_id->id;?>" name="admin_id">
              <button class="btn btn-success">Save</button>
            </form>
          </div>
        </div>
        <!-- end content update data -->


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
    const swal = $('.swal').data('swal');
    // alert('tesssku');
    if (swal) {
      Swal.fire({
        title: 'Success',
        text: swal,
        icon:'success'

      })
    }

  </script>
  <?= $this->endSection() ?>