<?= $this->section('content') ?>
<div class="modal fade" id="modalAdd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Input Data Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4>Periksa Entrian Form</h4>
      </hr />
      <?php echo session()->getFlashdata('error'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>








  
  <form id="formInputDataAdmin">
    <div class="modal-body">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control username2" name="username2" placeholder="Username" required>
        <small id="username_error" class="text-danger"> </small>
      </div>
      <div class="form-group">
        <label for="admin_nama">Nama Admin</label>
        <input type="text" class="form-control" name="admin_nama2" placeholder="Nama Admin" required>
        <small id="admin_nama_error" class="text-danger"> </small>
      </div>
      <div class="form-group">
        <label for="admin_no_hp">No. HP</label>
        <input type="number" class="form-control" name="admin_no_hp2" placeholder="No. HP" required>
        <small id="admin_no_hp_error" class="text-danger"> </small>
      </div>
      <div class="form-group">
        <label for="admin_email">Email</label>
        <input type="email" class="form-control" name="admin_email2" placeholder="Email" required>
        <small id="admin_email_error" class="text-danger"> </small>
      </div>
      <div class="form-group">
        <label for="admin_password">Password</label>
        <input type="password" class="form-control" name="admin_password2" placeholder="Password" required>
        <small id="admin_password_error" class="text-danger"> </small>
      </div>
      <div class="form-group">
        <label for="admin_password_conf">Password Confirmation</label>
        <input type="password" class="form-control" name="admin_password_conf" placeholder="Password Confirmation" required>
        <small id="admin_password_conf_error" class="text-danger"> </small>
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