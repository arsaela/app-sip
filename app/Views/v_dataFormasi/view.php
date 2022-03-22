<?= $this->extend('layouts_admin/template_admin') ?>

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
                  <?php $no = 1;
                  foreach ($getDetailFormasi as $value) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $value->jabatan_nama;
                          ?></td>
                      <td><?php echo $value->instansi_unor_nama; ?></td>
                      <td><?php echo $value->formasi_jumlah; ?></td>
                      <td><?php echo $value->jumlahasn; ?></td>
                      <td>
                        <a href="<?php echo base_url('' . $value->instansi_id); ?>" class="btn btn-warning"><i class="fa fa-eye">detail</i></a>
                        <button type="button" class="btn_detail_usulan btn btn-success" data-toggle="modal" value="<?php echo $value->instansi_id; ?>" data-target="#ApproveUsulan-<?php echo $value->instansi_id; ?>"><i class="fa fa-check "> detailku</i></button>

                        <!-- Modal APPROVE USULAN-->
                        <form action="/DataFormasi/detail_pegawai/<?php echo $value->instansi_id; ?>" method="post">
                          <div class="modal fade" id="ApproveUsulan-<?php echo $value->instansi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php echo $value->jabatan_nama; ?>" readonly="readonly">
                                  </div>
                                  <!-- <div class="form-group">
                                    <label>Instansi Nama</label>
                                    <input type="text" class="form-control instansi_nama" name="instansi_nama" placeholder="Instansi Nama" value="<?php //echo $get_usulan_by_id->instansi_nama; 
                                                                                                                                                  ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>ABK (Jumlah Formasi)</label>
                                    <input type="text" class="form-control formasi_jumlah" name="formasi_jumlah" placeholder="Jumlah Formasi" value="<?php //echo $get_usulan_by_id->formasi_jumlah; 
                                                                                                                                                      ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Usulan</label>
                                    <input type="text" class="form-control jumlah_usulan" name="jumlah_usulan" placeholder="Jumlah Usulan" value="<?php //echo $value->jumlah_usulan; 
                                                                                                                                                  ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Usulan yang di setujui</label>
                                    <input type="number" min="1" max="<?php //echo $value->jumlah_usulan; 
                                                                      ?>" class="form-control jumlah_approve" name="jumlah_approve" placeholder="Jumlah Approve" value="<?php //echo $value->jumlah_approve; 
                                                                                                                                                                        ?>">
                                  </div> -->

                                </div>
                                <div class="modal-footer">
                                  <!-- <input type="hidden" name="detail_usulan_id" class="detail_usulan_id" value="<?php //echo  $value->detail_usulan_id; 
                                                                                                                    ?>"> -->
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" id="btn-UpdateApproveUsulan" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        <!-- End Modal Edit Approval Usulan-->
                      </td>
                      <td>
                        <a href="<?php echo base_url('dataformasi/view/' . $value->instansi_id); ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                      </td>
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