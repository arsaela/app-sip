<?= $this->extend('layouts_admin/template_admin') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h4>Detail Usulan</h4>
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
              <!-- <p style="float:left; font-size:18px;">OPD : <b style="color:red"><? php // echo $getDetailUsulan[0]->instansi_nama; 
                                                                                      ?></b></br> -->
              No. Usul : <? php // echo $getDetailUsulan[0]->usulan_id; 
                          ?> </p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered" id="datatable-list">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>
                    <th>ABK</th>
                    <th>ASN yang ada</th>
                    <th>Detail ASN</th>
                    <th>Usulan</th>
                    <th>Disetujui</th>
                    <th>Status Usulan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($getDetailUsulan as $value) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>
                        <?php echo $value->jabatan_nama . ' ' . $value->instansi_unor_nama; ?>
                        <input type="hidden" name="jabatan_kode" class="get_jabatan_kode" value="<?php echo $value->jabatan_kode; ?>" />
                      </td>
                      <td><?php echo $value->formasi_jumlah; ?></td>
                      <td><?php echo $value->jumlahasn; ?></td>
                      <td><button type="button" instansi_unor="<?php echo $value->instansi_unor; ?>" jabatan_kode="<?php echo $value->jabatan_kode; ?>" class="edit btn btn-success"><i class="fa fa-search"></i></button>
                        <!-- The Pegawai -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h3 class="card-title">Detail ASN</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>NIP</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody id="show_data">
                                  </tbody>
                                </table>
                              </div>
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $value->jumlah_usulan; ?></td>
                      <td><?php echo $value->jumlah_approve; ?></td>


                      <td><?php
                          if ($value->status_usulan_id == 0) {
                            echo "<p class='bg_status_belumverifikasi'>Belum Mengajukan Usulan</p>";
                          } else if ($value->status_usulan_id == 1) {
                            echo "<p class='bg_status_reject'>Belum Kirim Usulan</p>";
                          } else if ($value->status_usulan_id == 2) {
                            echo "<p class='bg_status_belumverifikasi'>Sudah Kirim Usulan, Belum di verifikasi</p>";
                          } else if ($value->status_usulan_id == 3) {
                            echo "<p class='bg_status_approve'>Approve Usulan</p>";
                          } else if ($value->status_usulan_id == 4) {
                            echo "<p class='bg_status_reject'>Reject Usulan</p>";
                          } else {
                            echo "<p class='bg_status_pending'>Pending</p>";
                          }
                          ?>
                      </td>
                      <td><?php echo $value->keterangan; ?></td>
                      <td>

                        <!-- <a href="<?php //echo base_url('DataUsulan/approval_usulan/'.$value->detail_usulan_id);
                                      ?>" 
                                    class="btn btn-success"><i class="fa fa-check ">
                                    Approve</i></a> -->

                        <button type="button" class="btn_detail_usulan btn btn-success" data-toggle="modal" value="<?php echo $value->detail_usulan_id; ?>" data-target="#ApproveUsulan-<?php echo $value->detail_usulan_id; ?>"><i class="fa fa-check "> Approve</i></button>


                        <!-- Modal APPROVE USULAN-->
                        <form action="/DataUsulan/approval_usulan_by_id/<?php echo $value->detail_usulan_id; ?>" method="post">
                          <div class="modal fade" id="ApproveUsulan-<?php echo $value->detail_usulan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                  <div class="form-group">
                                    <label>Lokasi Unit Kerja</label>
                                    <input type="text" class="form-control instansi_nama" name="instansi_unor_nama" placeholder="Instansi Unor Nama" value="<?php echo $value->instansi_unor_nama; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>ABK (Jumlah Formasi)</label>
                                    <input type="text" class="form-control formasi_jumlah" name="formasi_jumlah" placeholder="Jumlah Formasi" value="<?php echo $value->formasi_jumlah; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>ASN yang ada</label>
                                    <input type="text" class="form-control formasi_jumlah" name="jumlahasn" placeholder="Jumlah ASN" value="<?php echo $value->jumlahasn; ?>" readonly="readonly">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah Kekurangan Pegawai</label>
                                    <input type="text" class="form-control formasi_jumlah" name="jumlahkekuranganasn" placeholder="Jumlah Kekurangan ASN" value="<?php echo $value->formasi_jumlah - $value->jumlahasn; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Usulan</label>
                                    <input type="text" class="form-control jumlah_usulan" name="jumlah_usulan" placeholder="Jumlah Usulan" value="<?php echo $value->jumlah_usulan; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Usulan yang di setujui</label>
                                    <input type="number" min="1" max="<?php echo $value->jumlah_usulan; ?>" class="form-control jumlah_approve" name="jumlah_approve" placeholder="Jumlah Approve" value="<?php //echo $value->jumlah_approve; 
                                                                                                                                                                                                          ?>">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="detail_usulan_id" class="detail_usulan_id" value="<?php echo $value->detail_usulan_id; ?>">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" id="btn-UpdateApproveUsulan" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        <!-- End Modal Edit Approval Usulan-->

                        <!-- <a href="<?php //echo base_url('DataUsulan/rejected/'.$value->detail_usulan_id);
                                      ?>" 
                                    class="btn_detail_usulan btn btn-danger"><i class="fa fa-times ">
                                    Rejected</i></a> -->
                        <button type="button" class="btn_detail_usulan btn btn-danger " data-toggle="modal" value="<?php echo $value->detail_usulan_id; ?>" data-target="#RejectUsulan-<?php echo $value->detail_usulan_id; ?>"><i class="fa fa-times "> Reject</i></button>

                        <!-- Modal REJECT USULAN-->
                        <form action="/DataUsulan/reject_usulan_by_id/<?php echo $value->detail_usulan_id; ?>" method="post">
                          <div class="modal fade" id="RejectUsulan-<?php echo $value->detail_usulan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php echo $value->jabatan_nama; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Instansi Nama</label>
                                    <input type="text" class="form-control instansi_nama" name="instansi_nama" placeholder="Instansi Nama" value="<?php echo $value->instansi_unor_nama; ?>" readonly="readonly">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah Usulan</label>
                                    <input type="text" class="form-control jumlah_usulan" name="jumlah_usulan" placeholder="Jumlah Usulan" value="<?php echo $value->jumlah_usulan; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Alasan Usulan Di Tolak</label>
                                    <textarea class="form-control" rows="5" name="keterangan" id="comment"></textarea>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="detail_usulan_id" class="detail_usulan_id" value="<?php echo $value->detail_usulan_id; ?>">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" id="btn-UpdateApproveUsulan" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        <!-- End Modal Edit Approval Usulan-->

                        <!-- <a href="<?php //echo base_url('DataUsulan/hapus/'.$value->detail_usulan_id);
                                      ?>" 
                                    onclick="javascript:return confirm('Apakah anda yakin ini  ?')"
                                    class="btn_detail_usulan btn btn-danger"><i class="fa fa-trash">
                                    Hapus</i></a> -->

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
    </div>
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>



<?= $this->section('script') ?> <script>
  //Menampilakan modal edit data petugas
  $('body').on('click', '.edit', function() {
    var instansiunor = $(this).attr("instansi_unor");
    var jabatankode = $(this).attr("jabatan_kode");
    $.ajax({
      url: "/dataUsulan/detail_pegawai_usulan/",
      type: "GET",
      dataType: "JSON",
      data: {
        instansiunor: instansiunor,
        jabatankode: jabatankode
      },
      success: function(data) {
        // alert("sukses"+data);
        var output = '';
        var no = 0;
        var i = 0;
        while (i < data.length) {
          no++;
          output += '<tr>' +
            '<td>' + no + '</td>' +
            '<td>' + data[i].pegawai_nama +
            '</td>' + '<td>' + data[i].pegawai_nip +
            '</td>' + '<td>' + data[i].pegawai_status +
            '</td>' + // '<td>' +data[i].formasi_jumlah+'</td>'+
            '</tr>';
          i++;
        }

        $('#myModal').modal("show");
        $('#show_data').html(output);
      }
    })

  });
</script>
<?= $this->endSection() ?>

<style type="text/css">
  p.bg_status_belumverifikasi {
    color: #fff;
    background-color: #bf9705 !important;
    border-color: #830909;
    box-shadow: none;
    padding: 0.375rem 0.75rem;
  }
</style>