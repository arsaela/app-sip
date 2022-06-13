<div class="modal fade" id="modalEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Data Petugas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formUpdateDataPetugas">
        <div class="modal-body">
          <input type="hidden" name="idPetugas">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" readonly name="username2" placeholder="Username">
            <small id="username2_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="petugas_nama">Nama Petugas</label>
            <input type="text" class="form-control" name="petugas_nama2" placeholder="Nama Petugas">
            <small id="petugas_nama2_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="petugas_no_hp">No. HP</label>
            <input type="text" class="form-control" name="petugas_no_hp2" placeholder="No. HP">
            <small id="petugas_no_hp2_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="petugas_email">Email</label>
            <input type="text" class="form-control" name="petugas_email2" placeholder="Email">
            <small id="petugas_email2_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_password">Password</label>
            <input type="password" class="form-control" name="admin_password2" placeholder="Password">
            <small id="admin_password_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_password_conf">Password Confirmation</label>
            <input type="password" class="form-control" name="admin_password_conf" placeholder="Password Confirmation">
            <small id="admin_password_conf_error" class="text-danger"> </small>
          </div>
          <div class="form-group">
            <label for="admin_password_conf">Unit Kerja</label>
            <select class="form-control" name="instansi_nama" id="instansi_nama" required>
              <option value="">TIdak Ada Yang Dipilih</option>
              <?php foreach ($instansi_nama as $row) : ?>
                <option <?php if($row->instansi_id == "your desired id"){ echo 'selected="selected"'; } ?> value="<?php echo $row->instansi_id ?>"><?php echo  $row->instansi_nama;?> </option>



              <!--  <option value="<?php //echo $row->instansi_id; ?>"><?php //echo $row->instansi_nama; ?></option> -->
            <?php endforeach; ?>
          </select> 





           <!--  <select class="form-control" name="instansi_nama" id="instansi_nama" required>
              <option value="">TIdak Ada Yang Dipilih</option>
              <?php //foreach ($instansi_nama as $row) : ?>
                <option value="<?php //echo $row->instansi_id; ?>"><?php //echo $row->instansi_nama; ?></option>
              <?php //endforeach; ?>
            </select> -->

          </div>
        </div>
      </form>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-updateDataPetugas" class="btn btn-primary">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>