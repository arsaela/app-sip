<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><?=$instansi_nama; ?></h1> 
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
              <h3 class="card-title">Tabel Detail Formasi</h3>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Formasi</th>
                    <th>Lokasi Unit Kerja</th>
                    <th>Jumlah Kebutuhan</th>
                    <th>Jumlah ASN</th>
                    <th>Detil ASN</th>
                    <th>Aksi</th> 
                  </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach($getDetailFormasi as $isi){?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $isi->jabatan_nama;?></td>
                                <td><?php echo $isi->instansi_unor;?></td>
                                <td><?php echo $isi->formasi_jumlah;?></td>
                                <td><?php echo "jumlah asn";?></td>
                                <td>
                                  <a href="<?php echo base_url(''.$isi->id);?>" 
                                    class="btn btn-warning"><i class="fa fa-eye">detail</i></a></td>
                                <td>
                                    <a href="<?php echo base_url('dataformasi/view/'.$isi->id);?>" 
                                    class="btn btn-warning"><i class="fa fa-eye"></i></a>
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
      <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Kembali Halaman Unit Kerja"/>
    </div>
    
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>