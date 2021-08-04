<?php
error_reporting(0);
include 'konek.php';
$nama_file = time() . '.jpg';
$direktori = 'upload/';
$target = $direktori . $nama_file;
move_uploaded_file($_FILES['webcam']['tmp_name'], $target);

if (isset($_POST['kirim'])) {
    $nama = $_POST['name'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $asal_instansi = $_POST['asal_instansi'];
    $kelamin = $_POST['kelamin'];
    $bertemu = $_POST['bertemu'];
    $keperluan = $_POST['keperluan'];
    $nama_ktp = $_FILES['ktp']['name'];
    $source = $_FILES['ktp']['tmp_name'];
    $folder = 'ktp/';
    move_uploaded_file($source, $folder . $nama_ktp);
    $tanggal = date("Y-m-d");
    date_default_timezone_set('Asia/Jakarta');
    $jam_masuk = date("H:i:s");
    $sql = "INSERT INTO tamu (nama, alamat, no_telepon, kelamin, id_bertemu, id_keperluan, tanggal, jam_masuk, gambar, ktp) VALUES ('$nama', '$alamat', '$no_telepon', '$kelamin', '$bertemu', '$keperluan', '$tanggal', '$jam_masuk', '$nama_file', '$nama_ktp')";
    $insert = mysqli_query($konek, $sql);
    if ($insert) { ?>
        <script>
            alert("absensi telah berhasil");
        </script>
<?php }
} ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Buku Tamu</title>
</head>

<body class="back">
    <!--mulai navbar area -->
    <header class="header_area">
        <div class="main_menu">
            <nav class="nav_1 navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">Buku Tamu</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Admin</a>
                            </li>
                            <li class="nav-item ml-3">
                                <a class="nav-link" href="tambah_ikm.php"><button class="btn btn-primary">IKM</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="bod_1 justify-content-center container rounded">
            <h3 class="bodi_2">Registrasi Tamu</h3>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" placeholder="Nama" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Alamat" name="alamat" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="No Telepon" name="no_telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="hidden" placeholder="Asal Instansi" name="asal_instansi" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kelamin" id="exampleFormControlSelect1">
                            <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Bertemu: </label>
                        <select class="form-control" name="bertemu" id="exampleFormControlSelect1">
                            <option selected>--pilih seseorang yang ingin bertemu--</option>
                            <?php
                            $tampil = "SELECT * FROM bertemu";
                            $sql = mysqli_query($konek, $tampil);
                            while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <option value="<?php echo $result['id_bertemu']; ?>"><?php echo $result['bertemu']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Keperluan: </label>
                        <select class="form-control" name="keperluan" id="exampleFormControlSelect1">
                            <option selected>--pilih Keperluan--</option>
                            <?php
                            $tampil = "SELECT * FROM keperluan";
                            $sql = mysqli_query($konek, $tampil);
                            while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <option value="<?php echo $result['id_keperluan']; ?>"><?php echo $result['keperluan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Masukkan Scan Ktp</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="ktp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="camera">Capture</div>
                    <div id="webcam">
                        <input type=button class="btn btn-warning mt-4" value="Capture" onClick="preview()">
                    </div>
                    <div id="simpan" style="display: none;">
                        <input type=button class="btn btn-danger mt-4" value="Remove" onClick="batal()">
                        <input type=submit name="kirim" class="btn btn-primary mt-4" value="Submit All Data" onClick="simpan()">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    <!-- webcam js -->
    <div id="hasil"></div>

    <script src="webcam.min.js"></script>
    <script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach('#camera');

        function preview() {
            // untuk preview gambar sebelum di upload
            Webcam.freeze();
            // ganti display webcam menjadi none dan simpan menjadi terlihat
            document.getElementById('webcam').style.display = 'none';
            document.getElementById('simpan').style.display = '';
        }

        function batal() {
            // batal preview
            Webcam.unfreeze();

            // ganti display webcam dan simpan seperti semula
            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        }

        function simpan() {
            // ambil foto
            Webcam.snap(function(data_uri) {

                // upload foto
                Webcam.upload(data_uri, 'index.php', function(code, text) {});

                // tampilkan hasil gambar yang telah di ambil
                document.getElementById('hasil').innerHTML =
                    '<p>Hasil : </p>' +
                    '<img src="' + data_uri + '"/>';

                Webcam.unfreeze();

                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            });
        }
    </script>
</body>

</html>