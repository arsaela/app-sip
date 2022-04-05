<?= $this->extend('layouts_petugas/template_petugas') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1></h1>
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
              <h3 class="card-title">Data Pegawai</h3>
            </div>

            <div class="card-body table-responsive">
              <table id="datatable-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Pangkat Golongan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($getPegawaiByInstansi as $value) { 
                      ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $value->pegawai_nama; ?></td>
                        <td><?php echo $value->pegawai_nip; ?></td>
                        <td><?php echo $value->gol_pangkat .' ('.$value->gol_nama.')'; ?></td>
                        <td><?php echo $value->jabatan_nama; ?></td>
                        <td><?php echo $value->status_nama; ?></td>
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
      <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Kembali Halaman Unit Kerja" />
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>