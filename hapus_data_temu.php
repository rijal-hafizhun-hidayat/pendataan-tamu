<?php
require("konek.php");
$id_bertemu = $_GET['id_bertemu'];
if (isset($id_bertemu)) {
    $delete = mysqli_query($konek, "DELETE FROM bertemu WHERE id_bertemu = $id_bertemu "); ?>
    <script>
        alert('data berhasil di hapus');
        window.location = "data_temu.php";
    </script>
<?php } else { ?>
    <script>
        alert('data gagal di hapus');
        window.location = "data_temu.php";
    </script>
<?php } ?>