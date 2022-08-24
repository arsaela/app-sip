<html>

<head>
    <title>Dokumen Data Usulan Pegawai</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <!-- jQuery -->
    <script type="text/javascript" src="/assets/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/adminlte3/dist/css/adminlte.min.css">
    <!--MENAMBAHKAN ICON -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/style-admin.css">


</head>

<body>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrappere">
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
                                <h3 class="card-title" style="text-align: center !important;float: unset !important; margin-bottom: 20px;"><strong>Data Usulan Pegawai <?php echo $getnamaInstansi[0]->instansi_nama; ?></strong></h3>

                            </div>

                            <div class="card-body table-responsive">
                                <table id="datatable-list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Formasi</th>
                                            <th>Lokasi Unit Kerja</th>
                                            <th>Jumlah Usulan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        if (!empty($getLihatDetailUsulan)) {
                                            foreach ($getLihatDetailUsulan as $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $value->jabatan_nama; ?></td>
                                                    <td><?php echo $value->instansi_unor_nama; ?></td>
                                                    <td><?php echo $value->jumlah_usulan; ?></td>

                                                </tr>
                                                <?php $no++;
                                            }
                                        } else { ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">
                                                    <span style="color:red; font-style: italic;">"Mohon Maaf, Silahkan lakukan ajuan usulan dan kirim usulan terlebih dahulu."</span>
                                                </td>
                                            </tr>
                                            <?php  
                                        }?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="back_to_page">
                            <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Kembali Halaman Sebelumnya" />
                        </div>

                        <!-- /.card -->
                    </div>
                </div>



            </div>

            <div style="float:right; margin-right: 30px;">
               <?php $no = 1;
               if (!empty($getLihatUsulan)) { ?>
                <?php echo '<img src="data:' . $QR->getContentType() . ';base64,' . $QR->generate() . '" />'; ?>
            <?php } ?>
        </div>
    </section>
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->


</body>

</html>

<script>
    window.print();
</script>

<style type="text/css">
@media print {
    @page {
        size: A4;
        /* DIN A4 standard, Europe */
        margin: 7mm 6mm 7mm 15mm;
        font-size: 14px;
    }

    html,
    body {
        width: 210mm;
        /* height: 297mm; */
        height: 282mm;
        font-size: 11px;
        background: #FFF;
        overflow: visible;
    }

    body {
        padding-top: 15mm;
    }

    .back_to_page {
        display: none;
    }
}
</style>

<style type="text/css" media="print">
/* masukan sintak CSS disini */
h3.card-title {
    font-size: 25px;
}

table#datatable-list {
    font-size: 18px;
}
</style>