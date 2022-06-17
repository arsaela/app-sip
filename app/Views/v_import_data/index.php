<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('head') ?>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Import Data</h3><br>
              <div class="mt-1">
             <?php echo form_open_multipart('importpegawai/submitImport') ?>
                <div class="row form-group">
                    <div class="col-md-3">
                        <input class="form-control" name="fileExcel" type="file" id="formFile" required accept=".xls, .xlsx">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" type="submit">import</button>
                    </div>
                </div>
                <?php echo form_close() ?>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="datatable-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>NIP</th>
                    <th>Instansi</th>
                    <th>Instansi Unor</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pegawai as $key => $value) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $value['pegawai_nama'] ?></td>
                      <td><?php echo $value['pegawai_nip'] ?></td>
                      <td><?php echo $value['instansi_id'] ?></td>
                      <td><?php echo $value['instansi_unor'] ?></td>
                      <td><?php echo $value['jabatan_kode'] ?></td>
                      <td>
                        <a href="" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                        <?php echo $value['pegawai_gol'] ?>
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
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>