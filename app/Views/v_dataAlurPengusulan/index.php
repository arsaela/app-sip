
<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Data Alur Pengusulan</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

        <?php if (isset($message_success)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $message_success; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>

        <?php if (isset($message_failed)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $message_failed; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>

          <!-- Default box -->
          <div class="card">
            <div class="card-body table-responsive">
            
            <div class="card-tools">
              <a href="<?php echo base_url('dataAlurPengusulan/add_alur_pengusulan/'); ?>" class="btn btn-primary"><i class="fa fa-plus "> Tambah Data</i></a>
            </div>
            <br>

              <table class="table table-bordered" id="datatable-list">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Detail Pengusulan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($getAlurPengusulan as $isi) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>
                        <?php //echo $isi->alur_pengusulan_img; ?>
                        <img src=" <?php echo base_url('uploads/'.$isi->alur_pengusulan_img) ?> " width="100">

                      </td>
                      <td><?php echo $isi->alur_pengusulan_detail; ?></td>
                      <td>
                  
                        <a data-toggle='tooltip' data-placement='top' title='Update Data'  href="<?php echo base_url('dataAlurPengusulan/update_alurpengusulan/' . $isi->alur_pengusulan_id); ?>" class="btn btn-success"><i class="fa fa-pencil "></i></a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
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

</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>