<div class="modal fade" id="modalAdd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Input Data Petugas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formInputDataPetugas">
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username2" placeholder="Username">
            <small id="username2_error" class="text-danger"> </small>

            <label for="petugas_nama">Nama Petugas</label>
            <input type="text" class="form-control" name="petugas_nama2" placeholder="Nama Petugas">
            <small id="petugas_nama2_error" class="text-danger"> </small>

            <label for="petugas_no_hp">No. HP</label>
            <input type="text" class="form-control" name="petugas_no_hp2" placeholder="No. HP">
            <small id="petugas_no_hp2_error" class="text-danger"> </small>

            <label for="petugas_email">Email</label>
            <input type="text" class="form-control" name="petugas_email2" placeholder="Email">
            <small id="petugas_email2_error" class="text-danger"> </small>
          </div>
        </div>
      </form>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-saveDataPetugas" class="btn btn-primary">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>