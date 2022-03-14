<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h4>Detail Usulan dari OPD "<?php echo $get_usulan_by_id->instansi_nama;?>"</h4>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Modal Add -->
          <?php include 'add.php';  ?>

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <p style="float:left; font-size:18px;">Instansi Unor : <b style="color:red"><?php echo $get_usulan_by_id->instansi_unor_nama;?></b></br>
              Nomor Usulan : <?php echo $get_usulan_by_id->usulan_id;?> </p>
            </div>
            <div class="card-body table-responsive">
            <table class="table table-bordered" id="datatable-list">
                <thead>
                  <tr>
                   <th>No</th>
                    <th>Nama Jabatan</th>
                    <th>ABK</th>
                    <th>Existing</th>
                    <th>Status Pegawai</th>
                    <th>Usulan</th>
                    <th>Approve</th>
                    <th>Status Usulan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($detail_usulan_by_id as $value){?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $value->jabatan_nama;?></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td><?php echo $value->jumlah_usulan;?></td>
                                <td><?php echo $value->jumlah_approve;?></td>

                                <td><?php 
                                if($value->status_usulan==0){
                                  echo "<p class='bg_status_belumverifikasi'>Belum Di Verifikasi</p>";
                                } else if ($value->status_usulan==1){
                                  echo "<p class='bg_status_approve'>Disetujui</p>";
                                } else if($value->status_usulan==2){
                                  echo "<p class='bg_status_reject'>Ditolak</p>";
                                } else {
                                  echo "<p class='bg_status_pending'>Pending</p>";
                                }
                                ?>
                                </td>
                                <td><?php echo $value->keterangan;?></td>
                                <td>

                                    <!-- <a href="<?php //echo base_url('DataUsulan/approval_usulan/'.$value->detail_usulan_id);?>" 
                                    class="btn btn-success"><i class="fa fa-check ">
                                    Approve</i></a> -->

                                  <button type="button" class="btn_detail_usulan btn btn-success" data-toggle="modal" value="<?php echo $value->detail_usulan_id;?>" data-target="#ApproveUsulan-<?php echo $value->detail_usulan_id;?>"><i class="fa fa-check "> Approve</i></button>


                                   <!-- Modal APPROVE USULAN-->
                                  <form action="/DataUsulan/approval_usulan_by_id/<?php echo $value->detail_usulan_id;?>" method="post">
                                      <div class="modal fade" id="ApproveUsulan-<?php echo $value->detail_usulan_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Approve Usulan </h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
 
                                          <div class="modal-body">
                                          
                                              <div class="form-group">
                                                  <label>Jabatan Nama</label>
                                                  <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php echo $value->jabatan_nama;?>" readonly="readonly">
                                              </div>
                                              <div class="form-group">
                                                  <label>Instansi Nama</label>
                                                  <input type="text" class="form-control instansi_nama" name="instansi_nama" placeholder="Instansi Nama" value="<?php echo $get_usulan_by_id->instansi_nama;?>" readonly="readonly">
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label>Jumlah Usulan</label>
                                                  <input type="text" class="form-control jumlah_usulan" name="jumlah_usulan" placeholder="Jumlah Usulan" value="<?php echo $value->jumlah_usulan;?>" readonly="readonly">
                                              </div>    
                                              <div class="form-group">
                                                  <label>Jumlah Usulan yang di setujui</label>
                                                  <input type="number" min="1" max="<?php echo $value->jumlah_usulan;?>" class="form-control jumlah_approve" name="jumlah_approve" placeholder="Jumlah Approve" value="<?php echo $value->jumlah_approve;?>">
                                              </div>
                                      
                                          </div>
                                          <div class="modal-footer">
                                              <input type="hidden" name="detail_usulan_id" class="detail_usulan_id"  value="<?php echo $value->detail_usulan_id;?>">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" id="btn-UpdateApproveUsulan" class="btn btn-primary">Update</button>
                                          </div>
                                          </div>
                                      </div>
                                      </div>
                                  </form>
                                  <!-- End Modal Edit Approval Usulan-->
                                    
                                    <!-- <a href="<?php //echo base_url('DataUsulan/rejected/'.$value->detail_usulan_id);?>" 
                                    class="btn_detail_usulan btn btn-danger"><i class="fa fa-times ">
                                    Rejected</i></a> -->
                                    <button type="button" class="btn_detail_usulan btn btn-danger" data-toggle="modal" value="<?php echo $value->detail_usulan_id;?>" data-target="#RejectUsulan-<?php echo $value->detail_usulan_id;?>"><i class="fa fa-times"> Reject</i></button>

                                    <!-- Modal REJECT USULAN-->
                                    <form action="/DataUsulan/reject_usulan_by_id/<?php echo $value->detail_usulan_id;?>" method="post">
                                      <div class="modal fade" id="RejectUsulan-<?php echo $value->detail_usulan_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Reject Usulan </h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label>Jabatan Nama</label>
                                                  <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php echo $value->jabatan_nama;?>" readonly="readonly">
                                              </div>
                                              <div class="form-group">
                                                  <label>Instansi Nama</label>
                                                  <input type="text" class="form-control instansi_nama" name="instansi_nama" placeholder="Instansi Nama" value="<?php echo $get_usulan_by_id->instansi_nama;?>" readonly="readonly">
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label>Jumlah Usulan</label>
                                                  <input type="text" class="form-control jumlah_usulan" name="jumlah_usulan" placeholder="Jumlah Usulan" value="<?php echo $value->jumlah_usulan;?>" readonly="readonly">
                                              </div>    
                                              <div class="form-group">
                                                  <label>Alasan Usulan Di Tolak</label>
                                                  <textarea class="form-control" rows="5" name="keterangan" id="comment"></textarea>
                                              </div>
                                      
                                          </div>
                                          <div class="modal-footer">
                                              <input type="hidden" name="detail_usulan_id" class="detail_usulan_id"  value="<?php echo $value->detail_usulan_id;?>">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" id="btn-UpdateApproveUsulan" class="btn btn-primary">Update</button>
                                          </div>
                                          </div>
                                      </div>
                                      </div>
                                    </form>
                                    <!-- End Modal Edit Approval Usulan-->

                                    <!-- <a href="<?php //echo base_url('DataUsulan/hapus/'.$value->detail_usulan_id);?>" 
                                    onclick="javascript:return confirm('Apakah anda yakin ini  ?')"
                                    class="btn_detail_usulan btn btn-danger"><i class="fa fa-trash">
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
