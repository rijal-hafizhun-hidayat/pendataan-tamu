<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
require 'konek.php';
$cetak = $_POST['cetak'];
if (isset($cetak)) {
    $no = 1;
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $select = "SELECT tamu.id_tamu, tamu.nama, tamu.alamat, tamu.no_telepon, tamu.kelamin, keperluan.keperluan, tamu.tanggal, tamu.jam_masuk, tamu.jam_keluar, bertemu.bertemu, tamu.gambar, tamu.ktp FROM tamu INNER JOIN keperluan ON tamu.id_keperluan = keperluan.id_keperluan INNER JOIN bertemu ON tamu.id_bertemu = bertemu.id_bertemu WHERE tanggal BETWEEN '$tanggal_masuk' AND '$tanggal_keluar'";
    $sql = mysqli_query($konek, $select);
}
else{
    $no = 1;
    $select = "SELECT tamu.id_tamu, tamu.nama, tamu.alamat, tamu.no_telepon, tamu.kelamin, keperluan.keperluan, tamu.tanggal, tamu.jam_masuk, tamu.jam_keluar, bertemu.bertemu, tamu.gambar, tamu.ktp FROM tamu INNER JOIN keperluan ON tamu.id_keperluan = keperluan.id_keperluan INNER JOIN bertemu ON tamu.id_bertemu = bertemu.id_bertemu ";
    $sql = mysqli_query($konek, $select);
}

$html = '<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <h2 style="text-align: center;">Data Tamu</h2>
	<table style="margin-left:auto;margin-right:auto" border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr style="font-size: 100px;">
				<td>No.</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>No.Telepon</td>
                <td>Jenis Kelamin</td>
                <td>Keperluan</td>
                <td>Tanggal</td>
                <td>Jam Masuk</td>
                <td>Jam Keluar</td>
                <td>Ketemu</td>
                <td>Foto</td>
                <td>Scan Ktp</td>
			</tr>
		</thead>';
        while ($row = mysqli_fetch_array($sql)) {
            $nohp = $row['no_telepon'];
            $nohp = str_replace(" ", "", $nohp);
            if (substr(trim($nohp), 0, 3) == '+62') {
                $hp = trim($nohp);
            } elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '+62' . substr(trim($nohp), 1);
            }
            $date = $row['tanggal'];
            $date = date('d-F-Y', strtotime($date));
            $html.= '<tbody>
			<tr>
				<td>'. $no . '</td>
                <td>'. $row['nama'] . '</td>
                <td>'. $row['alamat'] . '</td>
                <td>'. $hp . '</td>
                <td>'. $row['kelamin'] . '</td>
                <td>'. $row['keperluan'] . '</td>
                <td>'. $date . '</td>
                <td>'. $row['jam_masuk'] . '</td>
                <td>'. $row['jam_keluar'] . '</td>
                <td>'. $row['bertemu'] . '</td>
                <td><img style="width: 100px; height: 100px;" src="upload/'. $row["gambar"] . '"></td>
                <td><img style="width: 100px; height: 100px;" src="ktp/' . $row["ktp"] . '"></td>
			</tr>
		</tbody>';
        $no++; }
$html.= '</tbody>
	</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>