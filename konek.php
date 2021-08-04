<?php
$konek = mysqli_connect("localhost", "root", "", "buku_tamu");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal " . mysqli_connect_error();
}
