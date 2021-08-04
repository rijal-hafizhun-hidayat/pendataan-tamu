<?php
require 'konek.php';
$id_tamu = $_GET['id_tamu'];
session_start();
if (isset($_POST['kirim'])) {
    $jam_keluar = date("s:i:H");
    $sql_update = "UPDATE tamu SET jam_keluar = '$jam_keluar' WHERE id_tamu = '$id_tamu'";
    $sql = mysqli_query($konek, $sql_update);
    if ($sql) { ?>
        <script>
            alert("Check Out Berhasil");
            window.location = "data_tamu.php";
        </script>
<?php }
} ?>