-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 01:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`) VALUES
(1, 'client', 'client'),
(2, 'kepala', 'kantor');

-- --------------------------------------------------------

--
-- Table structure for table `bertemu`
--

CREATE TABLE `bertemu` (
  `id_bertemu` int(11) NOT NULL,
  `bertemu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bertemu`
--

INSERT INTO `bertemu` (`id_bertemu`, `bertemu`) VALUES
(4, 'hamdi'),
(5, 'destian'),
(6, 'fajri'),
(7, 'daffa');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `asal_instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `asal_instansi`) VALUES
(2, 'PT_UNITED TRAKTORS');

-- --------------------------------------------------------

--
-- Table structure for table `keperluan`
--

CREATE TABLE `keperluan` (
  `id_keperluan` int(11) NOT NULL,
  `keperluan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keperluan`
--

INSERT INTO `keperluan` (`id_keperluan`, `keperluan`) VALUES
(5, 'pertemuan di tempat'),
(6, 'pengiriman barang sitaan'),
(7, 'cod jasa kurir'),
(8, 'konfirmasi proposal');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `id_tamu`, `id_pertanyaan`, `jawaban`) VALUES
(38, 51, 3, 'Sangat Puas'),
(39, 51, 4, 'Puas'),
(40, 51, 5, 'Tidak Puas'),
(41, 51, 6, 'Sangat Puas'),
(42, 51, 7, 'Puas'),
(43, 51, 8, 'Sangat Puas');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(3, 'apakah anda puas dengan fasilitas kami?'),
(4, 'apakah anda puas dengan kebersihan kantor kami?'),
(5, 'apakah anda puas dengan pelayanan kantor kami?'),
(6, 'apakah anda puas dengan interface halaman web ini?'),
(7, 'apakah anda puas dengan wc kami?'),
(8, 'apakah anda puas dengan fasilitas snack kami?');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` varchar(100) NOT NULL,
  `jam_keluar` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `id_keperluan` int(11) NOT NULL,
  `id_bertemu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `alamat`, `no_telepon`, `kelamin`, `tanggal`, `jam_masuk`, `jam_keluar`, `gambar`, `ktp`, `id_keperluan`, `id_bertemu`) VALUES
(51, 'hermawan', 'jl. kusumah indah 3 rt 11 rw 4 kec weru, kab cirebon', '087736457870', 'Laki-Laki', '2021-05-25', '21:11:25', '21:11:46', '1621951885.jpg', '', 7, 4),
(52, 'faisal khairi hidayat', 'cirebon', '082332131', 'Laki-Laki', '2021-05-26', '21:15:19', '21:16:52', '1621952119.jpg', '', 7, 5),
(53, 'rully ferdiansyah', 'megu gede', '081213', 'Laki-Laki', '2021-05-27', '21:15:50', '21:16:48', '1621952150.jpg', '', 5, 4),
(54, 'muhammad rizki irawan', 'kapling plered', '081393784144', 'Laki-Laki', '2021-05-25', '01:18:49', '01:19:24', '1621966729.jpg', '', 5, 7),
(61, 'herliningsih', 'jl. kusumah indah 3 rt 11 rw 4 kec weru, kab cirebon', '087736457870', 'Perempuan', '2021-05-26', '15:50:29', '15:50:45', '1622019029.jpg', 'photo6244627984912853869.jpg', 5, 5),
(65, 'kevin hamzah', 'bantul, yogyakarta', '081802328562', 'Laki-Laki', '2021-05-30', '18:50:44', '18:50:58', '1622375444.jpg', 'ktp_page-0001.jpg', 6, 4),
(66, 'rijal', 'cirebon', '081802328562', 'Perempuan', '2021-06-06', '10:15:41', '10:23:58', '1622949341.jpg', 'ktp_page-0001.jpg', 6, 4),
(67, 'rijal hafizhun hidayat', 'jl. kusumah indah 3 rt 11 rw 4 kec weru, kab cirebon', '081802328562', 'Laki-Laki', '2021-06-06', '10:31:42', '14:24:06', '1622950302.jpg', 'ktp_page-0001.jpg', 7, 4),
(68, 'rijal', 'cirebon', '081393784144', 'Laki-Laki', '2021-06-06', '14:11:56', '14:12:17', '1622963516.jpg', 'ktp_page-0001.jpg', 7, 6),
(69, 'kevin hamzah', 'jl. kusumah indah 3 rt 11 rw 4 kec weru, kab cirebon', '081393784144', 'Laki-Laki', '2021-06-06', '18:02:14', '18:02:28', '1622977334.jpg', 'ktm_page-0001.jpg', 7, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `bertemu`
--
ALTER TABLE `bertemu`
  ADD PRIMARY KEY (`id_bertemu`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `keperluan`
--
ALTER TABLE `keperluan`
  ADD PRIMARY KEY (`id_keperluan`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`),
  ADD KEY `id_tamu` (`id_tamu`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`),
  ADD KEY `id_keperluan` (`id_keperluan`),
  ADD KEY `id_bertemu` (`id_bertemu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bertemu`
--
ALTER TABLE `bertemu`
  MODIFY `id_bertemu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keperluan`
--
ALTER TABLE `keperluan`
  MODIFY `id_keperluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kuisioner_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tamu`
--
ALTER TABLE `tamu`
  ADD CONSTRAINT `tamu_ibfk_2` FOREIGN KEY (`id_keperluan`) REFERENCES `keperluan` (`id_keperluan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tamu_ibfk_3` FOREIGN KEY (`id_bertemu`) REFERENCES `bertemu` (`id_bertemu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
