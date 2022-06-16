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
          <h1>Batas Pengusulan</h1>
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
              <h3 class="card-title">Set Batas Pengusulan</h3>
            </div>
            <div class="container card-body">
              <?php foreach ($batasPengusulan as $batas) : ?>
                
              <?php endforeach; ?>
              <form class="row" action="/SetBatasUsulan/update/<?=$batas['id']?>" method="post">
              <?= csrf_field(); ?>
              <input type="hidden" class="form-control" id="id" name="id" value="1"/>
                <label for="date" class="col-2 col-form-label">Batas Waktu</label>
                <div class="col-3">
                  <div class="input-group date" id="date">
                    <input type="text" class="form-control" id="datepicker" name="waktu" value="<?=$batas['waktu']?>"/>
                    
                  </div>
                </div>
                <div class="col-3">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </form>
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
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<?= $this->endSection() ?>