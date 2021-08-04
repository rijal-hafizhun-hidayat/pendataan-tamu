<?php
include 'konek.php';
if (isset($_POST['kirim'])) {
    $akun = $_POST['akun'];
    $pertanyaan = $_POST['tanya'];
    $jawaban = $_POST['jawaban'];
    $banyak = count($jawaban);
    for ($i=0; $i < $banyak; $i++) {
        $sql = "INSERT INTO kuisioner (id_tamu, id_pertanyaan, jawaban) VALUES ('$akun', '$pertanyaan[$i]', '$jawaban[$i]')";
        $insert = mysqli_query($konek, $sql);

    }
    if ($insert) {?>
        <script>
            alert("terima kasih telah mengisi IKM");
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
                    <a class="navbar-brand" href="#">Baku Tamu</a>
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
    <form action="" method="POST">
        <div class="bod_1 justify-content-center container rounded">
            <h3 class="bodi_2">Registrasi Tamu</h3>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" name="akun" id="exampleFormControlSelect1">
                            <option selected>--Pilih user yang sesuai dengan nama masing-masing--</option>
                            <?php
                            $tampil = "SELECT * FROM tamu";
                            $sql = mysqli_query($konek, $tampil);
                            while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <option value="<?php echo $result['id_tamu']; ?>"><?php echo $result['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                    $sql = "SELECT * FROM pertanyaan";
                    $query = mysqli_query($konek, $sql);
                    while ($hasil = mysqli_fetch_assoc($query)) { ?>
                        <h3><?php echo $hasil['pertanyaan']; ?></h3>
                        <input type="hidden" name="tanya[]" value="<?php echo $hasil['id_pertanyaan']; ?>">
                        <div class="form-group">
                            <select class="form-control" name="jawaban[]" id="exampleFormControlSelect1">
                                <option selected>--Pilih jawaban--</option>
                                <option value="Sangat Puas">Sangat Puas</option>
                                <option value="Puas">Puas</option>
                                <option value="Tidak Puas">Tidak Puas</option>
                            </select>
                        </div>
                    <?php
                    }
                    ?>
                    <input type=submit name="kirim" class="btn btn-primary" value="Submit All Data">
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
</body>

</html>