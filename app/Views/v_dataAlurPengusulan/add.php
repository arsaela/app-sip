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

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


              <!-- content update data -->
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="card-title">Form Tambah Data Alur Pengusulan</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('dataalurpengusulan/add_alur_pengusulan');?>">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="text" name="alur_pengusulan_img" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <input type="text" name="alur_pengusulan_detail" required class="form-control">
                            </div>
                            <input type="hidden" value="<?= $informasi_by_id->informasi_id;?>" name="informasi_id">
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