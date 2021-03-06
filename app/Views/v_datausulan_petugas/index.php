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

  <?= $this->section('script') ?>
  <script type="text/javascript">
    <?php if (session("success")) { ?>
      toastr.success('Data ajuan usulan anda berhasil disimpan.');
    <?php } ?>
  </script>
  <?= $this->endSection() ?>


  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Input Usulan Formasi "<?php echo $get_petugas_by_login->instansi_nama;?>"</h3>
            </div>

            <div class="card-body table-responsive">
              <table id="datatable-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Formasi</th>
                    <th>Lokasi Unit Kerja</th>
                    <th>Jumlah Kebutuhan</th>
                    <th>Jumlah ASN</th>
                    <th>Kekurangan Formasi</th>
                    <th>Detail ASN</th>
<th>Ajukan Usulan</th>
                    <?php $no = 1;
                    foreach ($getDetailFormasiUsulan as $value) {  
                     $yearnow = date("Y");
                     
                     if($value->tahun_usulan==$yearnow AND $value->status_usulan_id=='1'){?>
                      
                    <?php } 
                  } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($getDetailFormasiUsulan as $value) {

                    $kekurangan_formasi = ($value->formasi_jumlah) - ($value->jumlahasn) - ($value->jumlah_usulan);
                    if ($kekurangan_formasi >= 0 and !empty($kekurangan_formasi)) {
                      ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <!-- <td><?php //echo $value->formasi_id; 
                      ?></td> -->

                      <td><?php echo $value->formasi_id; ?> / <?php echo $value->jabatan_nama; ?></td>
                        <!--  <td><?php //echo $value->instansi_unor; 
                      ?></td> -->
                      <td><?php echo $value->instansi_unor_nama; ?></td>
                      <td><?php echo $value->formasi_jumlah; ?></td>
                      <td><?php echo $value->jumlahasn; ?></td>
                      <td><?php echo $kekurangan_formasi; ?></td>
                      <td>

                        <button type="button" instansi_unor="<?php echo $value->instansi_unor; ?>" jabatan_kode="<?php echo $value->jabatan_kode; ?>" class="edit btn btn-success"><i class="fa fa-search"></i></button>

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
                                      <th>Jabatan</th>
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

                      <td>


                       <?php  
                   
                      // $yearnow = date("Y");
                       if(($getDetailFormasiUsulan[1]->status_usulan_id<>'2') ){?>
                        <a href="#" class="btn btn-warning btn-sm btn_input_usulan" data-jabatan_kode="<?= $value->jabatan_kode; ?>" data-id="<?= $no; ?>" data-name="<?= $value->jabatan_nama; ?>" data-kekuranganformasi="<?= $kekurangan_formasi; ?>" data-instansiunornama="<?= $value->instansi_unor_nama; ?>" data-instansiunor="<?= $value->instansi_unor; ?>"><i class="fa fa-check"></i></a>
                      <?php } 
                      else {

                      }?>
                      <!-- Modal Ajuan Usulan Formasi -->
                      <form action="/opd/DataUsulan/inputusulanopd" method="post" id="frm-inputusulan">
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Input Ajuan Usulan Formasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group">
                                  <label>Jabatan Nama</label>
                                  <input type="text" class="form-control jabatan_nama" name="jabatan_nama" placeholder="Jabatan Nama" readonly required>
                                  <input type="hidden" class="form-control jabatan_kode" name="jabatan_kode" placeholder="Jabatan Kode" readonly required>
                                  <input type="hidden" class="form-control instansi_unor" name="instansi_unor" placeholder="Instansi Unor" readonly required>
                                </div>

                                <div class="form-group">
                                  <label>Lokasi Unit Kerja</label>
                                  <input type="text" class="form-control instansi_unor_nama" name="instansi_unor_nama" readonly placeholder="Lokasi Unit Kerja" required>
                                </div>

                                <div class="form-group">
                                  <label>Kekurangan Formasi</label>
                                  <input type="text" class="form-control kekuranganformasi" name="jumlah_kekurangan_formasi" readonly placeholder="Jumlah Usulan" required>
                                </div>

                                <div class="form-group">
                                  <label>Jumlah Usulan</label>

                                  <input type="number" id="jumlah_usulan_formasi" class="form-control jumlah_usulan_formasi" name="jumlah_usulan_formasi" placeholder="Jumlah Usulan">
                                </div>

                              </div>
                              <div class="modal-footer">
                                <input type="hidden" name="usulan_id" class="usulan_id">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <!-- End Modal Edit Product-->


                    </td>
                  </tr>
                  <?php $no++;
                }
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
  $(document).ready(function() {
    // $('#frm-inputusulan').validate();

    // get Edit Product
    $('body').on('click', '.btn_input_usulan', function() {
      // get data from button edit
      const id = $(this).data('id');
      const name = $(this).data('name');
      const kekuranganformasi = $(this).data('kekuranganformasi');
      const instansiunor_nama = $(this).data('instansiunornama');
      const instansiunor = $(this).data('instansiunor');
      const jabatan_kode = $(this).data('jabatan_kode');
      const price = $(this).data('price');
      const category = $(this).data('category_id');

      var get_found_usulan = $("#txtname").val();

      // alert(id);
      // Set data to Form Edit
      $('.usulan_id').val(id);
      $('.jabatan_kode').val(jabatan_kode);
      $('.jabatan_nama').val(name);
      $('.kekuranganformasi').val(kekuranganformasi);
      $('.instansi_unor_nama').val(instansiunor_nama);
      $('.instansi_unor').val(instansiunor);

      // if(!empty($get_found_usulan)){


      // }
      // Call Modal Edit
      $('#editModal').modal('show');






      //alert('jumlahkebutuhanformasi = '+kekuranganformasi);

      $('#frm-inputusulan').validate({
        rules: {
          jumlah_usulan_formasi: {
            digits: true,
            min: 1,
            max: kekuranganformasi
          }

          // pass2: {
          //   equalTo: "#pass1"
          // }
        },
        messages: {
          jumlah_usulan_formasi: {
            required: "Jumlah usulan harus di isi",
            min: "Jumlah usulan minimal 1",
            max: "Jumlah usulan tidak boleh melebihi jumlah kekurangan formasi"

          }
        }
      });


    });






    //Menampilakan modal detail pegawai
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
          var output = '';
          var no = 0;
          var i = 0;

          if(data.length==0){
           output += '<tr>' +
           '<td colspan="4" style="background-color:#fff; color:red; text-align:center;">' +  'Data PNS tidak ditemukan ..' + '</td>' +
           '</tr>';
           i++;
         } else {
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
        }

        $('#myModal').modal("show");
        $('#show_data').html(output);
      }
    })

    });


  });
</script>
<?= $this->endSection() ?>

<style type="text/css">
.error {
  color: #F00;
  background-color: #FFF;
}
</style>