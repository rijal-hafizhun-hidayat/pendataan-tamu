<?php
    require 'konek.php';
    session_start();
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $_SESSION['tanggal_awal'] = $tanggal_awal;
    $_SESSION['tanggal_akhir'] = $tanggal_akhir;
    header('Location: invoice_print.php');

?>