<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Data Instansi</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Unit Kerja</h3>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>OPD</th>
                    <th>Detail Formasi</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach($getUsulan as $isi){?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $isi->usulan_id;?></td>
                                <td><?php echo $isi->instansi_unor_nama;?></td>
                                <td><?php echo $isi->instansi_nama;?></td>
                                <td><?php echo "ket.status";?></td>
                                <td>
                                    <a href="<?php echo base_url('DataUsulan/detail_usulan/'.$isi->usulan_id);?>" 
                                    class="btn btn-warning"><i class="fa fa-folder-open-o ">
                                    Detail</i></a>
                                    <!-- <a href="<?php //echo base_url('DataUsulan/approval_usulan/'.$isi->jabatan_kode);?>" 
                                    class="btn btn-success"><i class="fa fa-check ">
                                    Approve</i></a>
                                    <a href="<?php //echo base_url('DataUsulan/rejected/'.$isi->usulan_id);?>" 
                                    class="btn btn-danger"><i class="fa fa-times ">
                                    Rejected</i></a> -->
                                    <!-- <a href="<?php //echo base_url('DataUsulan/hapus/'.$isi->usulan_id);?>" 
                                    onclick="javascript:return confirm('Apakah anda yakin ini  ?')"
                                    class="btn btn-danger"><i class="fa fa-trash">
                                    Hapus</i></a> -->

                                </td>
                            </tr>
                        <?php $no++;}?>

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

