<?php
require 'konek.php';
error_reporting(0);
session_start();
$id_tamu = $_GET['id_tamu'];
if (isset($id_tamu)) {
    date_default_timezone_set('Asia/Jakarta');
    $jam_keluar = date("H:i:s");
    $sql_update = "UPDATE tamu SET jam_keluar = '$jam_keluar' WHERE id_tamu = '$id_tamu'";
    $sql = mysqli_query($konek, $sql_update);
    if ($sql) { ?>
        <script>
            alert("Check Out Berhasil");
            window.location = "data_tamu.php";
        </script>
<?php }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Tamu | Tamu</title>
    <style>
        .margin {
            margin-left: 70px;
            margin-top: 20px;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin.php" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a href="login.php">
                        <button class="btn btn-block btn-danger">Log Out</button>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!---<a href="#" class="brand-link">
                <img src="img/Kejari Bungo.JPG" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-Tamu</span>
            </a>--->

            <!-- Sidebar -->
            <div class="sidebar">
                <img class="margin brand-image img-circle elevation-3" style="text-align:center; width: 100px; height: 100px;" src="img/Kejari Bungo.png" alt="">
                <h5 class="text-white mt-2 mb-2 brand-text">KEJAKSAAN NEGERI BUNGO</h5>
                <!-- Sidebar user panel (optional) -->
                <!---<div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    </div>
                </div>--->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_tamu.php" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Data Tamu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_keperluan.php" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    Data Keperluan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_temu.php" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Data Temu
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_pertanyaan.php" class="nav-link">
                                <i class="nav-icon fas fa-question"></i>
                                <p>
                                    Data Pertanyaan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_kuisioner.php" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Data kuisioner
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Tamu</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Tamu</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                        Cetak Pdf
                                    </button>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Cetak Pdf</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="invoice">
                                                    <form action="invoice_print.php" method="post" target="_blank">
                                                        <div class="modal-body">
                                                            <label>Dari Tanggal:</label>
                                                            <input type="date" name="tanggal_masuk" id=""></br>
                                                            <label>Hingga Tanggal:</label>
                                                            <input type="date" name="tanggal_keluar" id=""></br>
                                                            <input type="submit" class="btn btn-default" name="cetak" value="cetak sesuai tanggal">
                                                        </div>
                                                    </form>
                                                    <div class="modal-footer justify-content-between">
                                                        <div class="row no-print ml-auto">
                                                            <div class="col-12">
                                                                <button class="btn btn-default" value="simpan tanggal"><a href="invoice_print.php" rel="noopener" target="_blank">cetak</a></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Keperluan</th>
                                                <th>Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                                <th>Ketemu</th>
                                                <th>Foto</th>
                                                <th>Scan Ktp</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'konek.php';
                                            $no = 1;
                                            $select = "SELECT tamu.id_tamu, tamu.nama, tamu.alamat, tamu.no_telepon, tamu.kelamin, keperluan.keperluan, tamu.tanggal, tamu.jam_masuk, tamu.jam_keluar, bertemu.bertemu, tamu.gambar, tamu.ktp FROM tamu INNER JOIN keperluan ON tamu.id_keperluan = keperluan.id_keperluan INNER JOIN bertemu ON tamu.id_bertemu = bertemu.id_bertemu ";
                                            $sql = mysqli_query($konek, $select);
                                            while ($row = mysqli_fetch_array($sql)) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['alamat']; ?></td>
                                                    <td><?php $nohp = $row['no_telepon'];
                                                        $nohp = str_replace(" ", "", $nohp);
                                                        if (substr(trim($nohp), 0, 3) == '+62') {
                                                            $hp = trim($nohp);
                                                        } elseif (substr(trim($nohp), 0, 1) == '0') {
                                                            $hp = '+62' . substr(trim($nohp), 1);
                                                        }
                                                        echo $hp;
                                                        ?></td>
                                                    <td><?php echo $row['kelamin']; ?></td>
                                                    <td><?php echo $row['keperluan']; ?></td>
                                                    <td><?php $date = $row['tanggal'];
                                                        $date = date('d-F-Y', strtotime($date));
                                                        echo $date; ?></td>
                                                    <td><?php echo $row['jam_masuk']; ?></td>
                                                    <?php if ($row['jam_keluar'] == NULL) { ?>
                                                        <td><a href="data_tamu.php?id_tamu=<?= $row['id_tamu']; ?>"><button type="button" name="kirim" class="btn btn-block btn-danger btn-sm">Check Out</button></a></td>
                                                    <?php
                                                    } else { ?>
                                                        <td><?php echo $row['jam_keluar']; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row['bertemu']; ?></td>
                                                    <td><?php echo "<img src='upload/" . $row['gambar'] . "'style='width:100px; height:100px;'>" ?></td>
                                                    <td><?php echo "<img src='ktp/" . $row['ktp'] . "'style='width:100px; height:100px;'>" ?></td>
                                                    <td>
                                                        <a href="hapus_data_tamu.php?id_tamu=<?= $row['id_tamu']; ?>"><button type="button" name="kirim" class="btn btn-block btn-danger btn-sm fas fa-trash-alt"></button></a>
                                                        <a href="edit_data_tamu.php?id_tamu=<?= $row['id_tamu']; ?>"><button type="button" name="kirim" class="btn btn-block btn-warning btn-sm mt-2"><i class="fas fa-user-edit"></i></button></a>
                                                        <?php echo "<a href='https://api.whatsapp.com/send?phone=" . $hp . "&text=Tamu%20Atas%20Nama%20" . $row['nama'] . "%20alamat:%20" . $row['alamat'] . ",%20jam" . $row['jam_masuk'] . "%20wib%20tanggal%20" . $date . ".%20keperluan%20" . $row['keperluan'] . "%20.'>" ?><button type="button" name="kirim" class="btn btn-block btn-success btn-sm mt-2 fab fa-whatsapp"></button></a>
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">E-Tamu</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>