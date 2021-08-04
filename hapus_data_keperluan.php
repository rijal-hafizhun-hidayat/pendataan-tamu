<?php
require("konek.php");
$id_keperluan = $_GET['id_keperluan'];
if (isset($id_keperluan)) {
    $delete = mysqli_query($konek, "DELETE FROM keperluan WHERE id_keperluan = $id_keperluan "); ?>
    <script>
        alert('data berhasil di hapus');
        window.location = "data_keperluan.php";
    </script>
<?php } else { ?>
    <script>
        alert('data gagal di hapus');
        window.location = "data_keperluan.php";
    </script>
<?php } ?>