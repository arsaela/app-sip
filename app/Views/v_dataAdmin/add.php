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
            <input type="text" class="form-control" name="username2" placeholder="Username">
            <small id="username2_error" class="text-danger"> </small>

            <label for="admin_nama">Nama Admin</label>
            <input type="text" class="form-control" name="admin_nama2" placeholder="Nama Admin">
            <small id="admin_nama2_error" class="text-danger"> </small>

            <label for="admin_no_hp">No. HP</label>
            <input type="text" class="form-control" name="admin_no_hp2" placeholder="No. HP">
            <small id="admin_no_hp2_error" class="text-danger"> </small>

            <label for="admin_email">Email</label>
            <input type="email" class="form-control" name="admin_email2" placeholder="Email">
            <small id="admin_email2_error" class="text-danger"> </small>

            <label for="admin_password">Password</label>
            <input type="text" class="form-control" name="admin_password" placeholder="Password">
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