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
              <h3 class="card-title">Data Kirim Usulan OPD</h3>
            </div>

            <div class="card-body table-responsive">
              <table id="datatable-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Instansi Nama</th>
                    <th>Tahun Usulan</th>
                    <th>Status Usulan</th>
                    <th>Aksi</th>


                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($getLihatUsulanDescYear as $value) { 
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $value->instansi_nama; ?></td>
                      <td><?php echo $value->tahun_usulan; ?></td>
                      <td>
                        <div style="background-color: yellow; padding:5px;"><?php echo $value->nama_status; ?></div>
                      </td>
                      <td>
                        <a data-toggle='tooltip' data-placement='top' title='Detail'  href="<?php echo base_url('Opd/DataUsulan/detail_usulan_by_year_and_opd/' . $value->tahun_usulan); ?>" class="btn btn-warning"><i class="fa fa-folder-open-o ">Detail</i></a>
                       <!--  <a data-toggle='tooltip' data-placement='top' title='Detail'  href="<?php //echo base_url('Opd/DataUsulan/detail_usulan/' . $value->tahun_usulan); ?>" class="btn btn-primary"><i class="far fa fa-paper-plane-o nav-icon "></i></a> -->


                        <!-- <a href="<?php //echo base_url('DataUsulan/approval_usulan/'.$value->detail_usulan_id);
                                      ?>" 
                                    class="btn btn-success"><i class="fa fa-check ">
                                    Approve</i></a> -->

                        <button type="button" class="btn_detail_usulan btn btn-success" data-toggle="modal" value="<?php echo $value->instansi_id; ?>" data-target="#KirimUsulan-<?php echo $value->instansi_id; ?>"><i class="far fa fa-paper-plane-o nav-icon"> Kirim Usulan</i></button>


                        <!-- Modal KIRIM USULAN-->
                        <form action="aksi_kirimdatausulanopd/<?php echo $value->instansi_id; ?>" method="post">
                          <div class="modal fade" id="KirimUsulan-<?php echo $value->instansi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Kirim Usulan Ke BKPSDM Kab. Klaten</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                <div class="modal-body">
                                  Apakah anda sudah yakin ingin mengirimkan usulan dan segala data pegawai yang sudah ada adalah data terupdate. Segala Resiko di akan ditanggung Instansi terkait kevalidan data.
                                 <!--  <div class="form-group">
                                    <label>Jabatan Nama</label>
                                    <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php //echo $value->jabatan_nama; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Lokasi Unit Kerja</label>
                                    <input type="text" class="form-control instansi_nama" name="instansi_unor_nama" placeholder="Instansi Unor Nama" value="<?php //echo $value->instansi_unor_nama; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>ABK (Jumlah Formasi)</label>
                                    <input type="text" class="form-control formasi_jumlah" name="formasi_jumlah" placeholder="Jumlah Formasi" value="<?php //echo $value->formasi_jumlah; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>ASN yang ada</label>
                                    <input type="text" class="form-control formasi_jumlah" name="jumlahasn" placeholder="Jumlah ASN" value="<?php //echo $value->jumlahasn; ?>" readonly="readonly">
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah Kekurangan Pegawai</label>
                                    <input type="text" class="form-control formasi_jumlah" name="jumlahkekuranganasn" placeholder="Jumlah Kekurangan ASN" value="" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Usulan</label>
                                    <input type="text" class="form-control jumlah_usulan" name="jumlah_usulan" placeholder="Jumlah Usulan" value="<?php //echo $value->jumlah_usulan; ?>" readonly="readonly">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Usulan yang di setujui</label>
                                    <input type="number" min="1" max="<?php //echo $value->jumlah_usulan; ?>" class="form-control jumlah_approve" name="jumlah_approve" placeholder="Jumlah Approve" value="<?php //echo $value->jumlah_approve; ?>">
                                  </div> -->
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="detail_usulan_id" class="detail_usulan_id" value="<?php echo $value->instansi_id; ?>">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" id="btn-UpdateKirimUsulan" class="btn btn-primary">Kirim Usulan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

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

<?= $this->section('script') ?>
<script>
  //Menampilakan modal edit data petugas
  $('body').on('click', '.edit', function() {
    var instansiunor = $(this).attr("instansi_unor");
    var jabatankode = $(this).attr("jabatan_kode");
    $.ajax({
      url: "/dataFormasi/detail_pegawai/",
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
          '<td>' + data[i].pegawai_nama + '</td>' +
          '<td>' + data[i].pegawai_nip + '</td>' +
          '<td>' + data[i].jabatan_nama + '</td>' +
            // '<td>'+data[i].formasi_jumlah+'</td>'+

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