<?php
error_reporting(0);
include 'konek.php';
$nama_file = time() . '.jpg';
$direktori = 'gambar/';
$target = $direktori . $nama_file;

move_uploaded_file($_FILES['webcam']['tmp_name'], $target);
$sql = "INSERT INTO webcam (gambar) VALUES ('$nama_file')";
$insert = mysqli_query($konek, $sql);
if ($insert) { ?>
    <script>
        alert("ambil gambar berhasil");
    </script>
<?php } ?>
<!doctype html>
<html>

<head>
    <title>WebcamJS Test Page</title>
    <style>
        input {
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <p>Ambil Gambar</p>
    <form action="" method="POST">
        <div id="camera">Capture</div>

        <div id="webcam">
            <input type=button value="Capture" onClick="preview()">
        </div>
        <div id="simpan" style="display:none">
            <input type=button value="Remove" onClick="batal()">
            <input type=submit value="Save" onClick="simpan()" style="font-weight:bold;">
        </div>
    </form>

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