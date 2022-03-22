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
              <table id="datatable-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Formasi</th>
                    <th>Formasi Kode</th>
                    <th>Lokasi Unit Kerja</th>
                    <th>Lokasi Unit Kode</th>
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
                      <td><?php echo $value->jabatan_nama;?></td>
<<<<<<< HEAD
=======
                      <td><?php echo $value->jabatan_kode;?></td>
                      <td><?php echo $value->instansi_unor_nama; ?></td>
>>>>>>> e934d5183acfe62c401bbdc106026147ba941bca
                      <td><?php echo $value->instansi_unor; ?></td>
                      <td><?php echo $value->formasi_jumlah; ?></td>
                      <td><?php echo $value->jumlahasn; ?></td>
                      <td>
<<<<<<< HEAD
                        <button type="button" class="btn_detail_usulan btn btn-success" data-toggle="modal" value="<?php echo $value->jabatan_kode; ?>" data-target="#ApproveUsulan-<?php echo $value->jabatan_kode; ?>"><i class="fa fa-check "> Detail Pegawai</i></button>

                        <!-- Modal APPROVE USULAN-->
                        <form action="/DataFormasi/detail_pegawai/<?php echo $value->jabatan_kode; ?>" method="post">
                          <div class="modal fade" id="ApproveUsulan-<?php echo $value->jabatan_kode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Approve Usulan </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
=======

                      <button type="button" instansi_unor="<?php echo $value->instansi_unor; ?>" jabatan_kode="<?php echo $value->jabatan_kode; ?>" class="edit btn btn-success"><i class="fa fa-search"></i></button>

                      <!-- The Pegawai -->
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="judul">List Pegawai Jabatan</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan Nama</th>
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
>>>>>>> e934d5183acfe62c401bbdc106026147ba941bca
                                </div>
                      </div>

























<<<<<<< HEAD
                                  <div class="form-group">
                                    <label>Jabatan Nama</label>
                                    <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php echo $value->jabatan_nama; ?>" readonly="readonly">
                                    <label>Jabatan Nama</label>
                                    <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" value="<?php echo $value->instansi_unor_nama; ?>" readonly="readonly">

                                              <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Unit Kerja</h3>
            </div>
            <div class="card-body table-responsive">
              <table id="datatable-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;

  //  $jabatan_kode = $value->jabatan_kode;
  //  $instansi_uker = $value->instansi_unor;
  //  $getDetailFormasiAsik = getDetailFormasiManuk($jabatan_kode,$instansi_uker)->getResult();
  $idUnor = $value->instansi_unor;
  $idJabatan = $value->jabatan_kode;
  $getDetailPegawaiJos = getDetailPegawai($idUnor,$idJabatan)->getResult();


                  foreach ($getDetailPegawaiJos as $isi) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $isi->pegawai_nama; ?></td>
                      <td><?php echo $isi->pegawai_nip; ?></td>
                      <td><?php echo $isi->instansi_unor; ?></td>
=======

                      </td>

                     
>>>>>>> e934d5183acfe62c401bbdc106026147ba941bca
                      <td>
                        <a href="<?php echo base_url('dataformasi/detail_formasi/' . $isi->jabatan_kode); ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
                                  </div>
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

<?= $this->section('script') ?>
<script>

//Menampilakan modal edit data petugas
$('body').on('click', '.edit', function() {
  var instansiunor = $(this).attr("instansi_unor");
  var jabatankode = $(this).attr("jabatan_kode");
      $.ajax({
        url: "/dataFormasi/cek_detail_pegawai/",
        type: "GET",
        dataType: "JSON",
        data: {instansiunor:instansiunor, jabatankode:jabatankode},
        success: function(data) {
          // alert("sukses"+data);
          var output = '';
          var no=0;
          var i=0; 
          while(i<data.length){
            no++;
                  output += '<tr>'+
                              '<td>' + no  + '</td>'+
                              '<td>'+data[i].pegawai_nama+'</td>'+
                              '<td>'+data[i].jabatan_nama+'</td>'+
                              // '<td>'+data[i].jabatan_kode+'</td>'+
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