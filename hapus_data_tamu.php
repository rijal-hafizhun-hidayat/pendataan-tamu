<?php
require("konek.php");
$id_tamu = $_GET['id_tamu'];
if (isset($id_tamu)) {
    $delete = mysqli_query($konek, "DELETE FROM tamu WHERE id_tamu = $id_tamu "); ?>
    <script>
        alert('data berhasil di hapus');
        window.location = "data_tamu.php";
    </script>
<?php } else { ?>
    <script>
        alert('data gagal di hapus');
        window.location = "data_tamu.php";
    </script>
<?php } ?>