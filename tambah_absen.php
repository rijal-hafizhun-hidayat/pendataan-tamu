<?php
include 'konek.php';
if (isset($_POST['kirim'])) {
    $nama = $_POST['name'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $asal_instansi = $_POST['asal_instansi'];
    $bertemu = $_POST['bertemu'];
    $keperluan = $_POST['keperluan'];
    $nama_file = time() . '.jpg';
    $direktori = 'uploads/';
    $target = $direktori . $nama_file;

    move_uploaded_file($_FILES['webcam']['tmp_name'], $target);

    $sql =
        "INSERT INTO tamu (nama, alamat, no_telepon, asal_instansi, bertemu, keperluan, gambar) VALUES ('$nama', '$alamat', '$no_telepon', '$asal_instansi', '$bertemu', '$keperluan', '$nama_file')";
    $insert = mysqli_query($konek, $sql);
    if ($insert) { ?>
        <script>
            alert("absensi telah berhasil");
        </script>
<?php }
} ?>