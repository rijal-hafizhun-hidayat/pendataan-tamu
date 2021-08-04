<?php
require 'konek.php';
session_start();
if (isset($_POST['kirim'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cek = mysqli_query($konek, "SELECT * FROM akun WHERE username = '$user' AND password = '$pass'");
    $query = mysqli_query($konek, $cek);
    $baca = mysqli_fetch_array($cek);

    $username = $baca['username'];
    $password = $baca['password'];
    if ($username == $user && $password == $pass) {
        $_SESSION['username'] = $username;
        header('location:admin.php?status=berhasil');
    } else { ?>
        <script>
            alert('username atau password salah');
        </script>
<?php }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Tamu | Log in</title>
    <style>
        .gambar {
            background-image: url("img/AnyConv.com__IMG_1956.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .huruf {
            color: #ffffff !important;
        }
    </style>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="gambar hold-transition login-page">
    <div class="login-box">
        <div class="huruf login-logo">
            <a class="text-white font-weight-normal" href="#"><b>e-</b>Pertamo</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login Untuk Melakukan Manajemen Data</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="index.php">kembali ke halaman utama</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" name="kirim" class="btn btn-primary btn-block" value="masuk">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>