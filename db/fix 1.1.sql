-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 08:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemrumahproduksi`
--
CREATE DATABASE IF NOT EXISTS `sistemrumahproduksi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistemrumahproduksi`;

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` int(11) NOT NULL,
  `absensi_tanggal` date DEFAULT NULL,
  `absensi_status` int(2) NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absensi_id`, `absensi_tanggal`, `absensi_status`, `pegawai_id`) VALUES
(1, '2019-03-24', 0, 1),
(2, '2019-03-18', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda_pembahasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_paket`
--

CREATE TABLE `kategori_paket` (
  `kp_id` int(11) NOT NULL,
  `kp_nama` varchar(100) DEFAULT NULL,
  `kp_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_paket`
--

INSERT INTO `kategori_paket` (`kp_id`, `kp_nama`, `kp_tanggal`) VALUES
(1, 'Wedding', '2019-03-10 15:04:35'),
(2, 'Event', '2019-03-10 15:06:37'),
(3, 'Film Pendek', '2019-03-10 15:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pegawai`
--

CREATE TABLE `konfirmasi_pegawai` (
  `konfirmasi_id` int(11) NOT NULL,
  `pemesanan_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `konfirmasi_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pegawai`
--

INSERT INTO `konfirmasi_pegawai` (`konfirmasi_id`, `pemesanan_id`, `pegawai_id`, `konfirmasi_status`) VALUES
(33, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` int(11) NOT NULL,
  `paket_nama` varchar(100) DEFAULT NULL,
  `paket_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `paket_harga` varchar(27) DEFAULT NULL,
  `paket_keterangan` text,
  `paket_gambar` varchar(50) DEFAULT NULL,
  `kp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `paket_nama`, `paket_tanggal`, `paket_harga`, `paket_keterangan`, `paket_gambar`, `kp_id`) VALUES
(4, 'Paket 1 (1 Hari 1 Acara)', '2019-03-13 09:54:01', 'Rp. 2.500.000', '<p>– Foto dengan 1 kamera dslr</p><p>– Video dengan 1 kamera dslr</p><p>– 1 DVD hasil video dokumentasi full edit</p><p>- transfer file foto(no edit) dan video (editing)</p><div><br></div>', 'video1.jpg', 1),
(5, 'Foto taking only (Just jepret, transfer file)', '2019-03-13 09:54:59', 'Rp. 500.000', '<p>– Foto all event, output file foto ditransfer di tempat setelah event atau di cd after event</p><p>– 1 kamera dslr</p><p>– Lokasi foto palembang (daerah lain pls confirm terlebih dahulu)</p>', 'video.jpg', 1),
(6, 'Video taking Only (shoot n transfer File Video):', '2019-03-13 09:55:49', 'Rp. 800.000', '<p>– Video all event, shoot & transfer file video on the spot</p><p>– 1 kamera dslr/mirrorless</p>', 'video2.jpg', 1),
(7, 'Video & photo drone + Pilot (shoot n transfer File Video)', '2019-03-13 09:56:47', 'Rp. 1.000.000', '<p>– Video all event, shoot &amp; transfer file video on the spot</p><p>– 1 drone dji phantom 3 advanced</p><p>- 1 hari full</p>', 'video.jpg', 1),
(8, 'Paket 1 (1 Hari 1 Acara)', '2019-03-13 09:54:01', 'Rp. 2.500.000', '<p>– Foto dengan 1 kamera dslr</p><p>– Video dengan 1 kamera dslr</p><p>– 1 DVD hasil video dokumentasi full edit</p><p>- transfer file foto(no edit) dan video (editing)</p><div><br></div>', 'video.jpg', 2),
(9, 'Foto taking only (Just jepret, transfer file)', '2019-03-13 09:54:59', 'Rp. 500.000', '<p>– Foto all event, output file foto ditransfer di tempat setelah event atau di cd after event</p><p>– 1 kamera dslr</p><p>– Lokasi foto palembang (daerah lain pls confirm terlebih dahulu)</p>', 'video.jpg', 2),
(10, 'Video taking Only (shoot n transfer File Video):', '2019-03-13 09:55:49', 'Rp. 800.000', '<p>– Video all event, shoot &amp; transfer file video on the spot</p><p>– 1 kamera dslr/mirrorless</p>', 'video.jpg', 2),
(11, 'Video & photo drone + Pilot (shoot n transfer File Video)', '2019-03-13 09:56:47', 'Rp. 1.000.000', '<p>– Video all event, shoot &amp; transfer file video on the spot</p><p>– 1 drone dji phantom 3 advanced</p><p>- 1 hari full</p>', 'video.jpg', 2),
(12, 'Paket 1 (1 Hari 1 Acara)', '2019-03-13 09:54:01', 'Rp. 2.500.000', '<p>– Foto dengan 1 kamera dslr</p><p>– Video dengan 1 kamera dslr</p><p>– 1 DVD hasil video dokumentasi full edit</p><p>- transfer file foto(no edit) dan video (editing)</p><div><br></div>', 'video.jpg', 3),
(13, 'Foto taking only (Just jepret, transfer file)', '2019-03-13 09:54:59', 'Rp. 500.000', '<p>– Foto all event, output file foto ditransfer di tempat setelah event atau di cd after event</p><p>– 1 kamera dslr</p><p>– Lokasi foto palembang (daerah lain pls confirm terlebih dahulu)</p>', 'video.jpg', 3),
(14, 'Video taking Only (shoot n transfer File Video):', '2019-03-13 09:55:49', 'Rp. 800.000', '<p>– Video all event, shoot &amp; transfer file video on the spot</p><p>– 1 kamera dslr/mirrorless</p>', 'video.jpg', 3),
(15, 'Video & photo drone + Pilot (shoot n transfer File Video)', '2019-03-13 09:56:47', 'Rp. 1.000.000', '<p>– Video all event, shoot &amp; transfer file video on the spot</p><p>– 1 drone dji phantom 3 advanced</p><p>- 1 hari full</p>', 'video.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(50) DEFAULT NULL,
  `pegawai_spesialis` varchar(30) DEFAULT NULL,
  `pegawai_nohp` varchar(15) DEFAULT NULL,
  `pegawai_email` varchar(60) DEFAULT NULL,
  `pegawai_alamat` text,
  `pegawai_foto` varchar(50) DEFAULT NULL,
  `pegawai_username` varchar(50) DEFAULT NULL,
  `pegawai_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_spesialis`, `pegawai_nohp`, `pegawai_email`, `pegawai_alamat`, `pegawai_foto`, `pegawai_username`, `pegawai_password`) VALUES
(2, 'Puji', 'Videografer', '089606603036', 'muhammadpuji63@gmail.com', 'Jl.sultan agung palembang', 'photo_2.jpg', 'pegawai', '123456'),
(3, 'Rizki1', 'Fotografer', '081365541955', 'muhammadpuji63@gmail.com', 'Jl.sultan agung palembang', 'deku.jpg', 'rizki1', '123456'),
(4, 'Rizki2', 'Pilot Drone', '089606603036', 'muhammadpuji63@gmail.com', 'Jl.sultan agung palembang', 'deku1.jpg', 'rizki2', '123456'),
(5, 'Rizki3', 'Backup Data', '089606603036', 'muhammadpuji63@gmail.com', 'Jl.sultan agung palembang', 'deku2.jpg', 'rizki3', '123456'),
(6, 'Rizki4', 'Koordinator Tim', '089606603036', 'muhammadpuji63@gmail.com', 'Jl.sultan agung palembang', 'deku3.jpg', 'rizki4', '123456'),
(7, 'Rizki5', 'Editing', '089606603036', 'muhammadpuji63@gmail.com', 'Jl.sultan agung palembang', 'deku4.jpg', 'rizki5', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `pemesanan_nama` varchar(50) DEFAULT NULL,
  `pemesanan_email` varchar(50) DEFAULT NULL,
  `pemesanan_alamat` text,
  `pemesanan_nohp` varchar(40) DEFAULT NULL,
  `pemesanan_tglawal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pemesanan_tglakhir` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pemesanan_status` int(2) DEFAULT NULL,
  `s_videografer` int(11) NOT NULL,
  `s_fotografer` int(11) NOT NULL,
  `s_pilot_drone` int(11) NOT NULL,
  `s_backup_data` int(11) NOT NULL,
  `s_koordinator_tim` int(11) NOT NULL,
  `s_editing` int(11) NOT NULL,
  `paket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `pemesanan_nama`, `pemesanan_email`, `pemesanan_alamat`, `pemesanan_nohp`, `pemesanan_tglawal`, `pemesanan_tglakhir`, `pemesanan_status`, `s_videografer`, `s_fotografer`, `s_pilot_drone`, `s_backup_data`, `s_koordinator_tim`, `s_editing`, `paket_id`) VALUES
(2, 'M.Puji Lesmana', 'pujilesmana23@gmail.com', 'Jln.Sultan Agung Palembang Sumatera Selatan', '089606603036', '2019-04-04 17:00:00', '2019-03-27 17:00:00', 1, 2, 0, 0, 0, 0, 0, 5),
(4, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', 'Jln.Sultan Agung Palembang Sumatera Selatan', '089606603036', '2019-03-19 17:00:00', '2019-03-27 17:00:00', 1, 2, 0, 0, 0, 0, 0, 6),
(5, 'PPHI Lawfirm', 'muhammadpuji63@gmail.com', 'L. R. Soekamto Komp PTC (Palembang Trade Centere) MALL Blok H. 1 No. 066 Lantai 3 Kel. 8 ilir Kec. Ilir Timur II Palembang 30114\r\n-', '089606603036', '2019-03-26 17:00:00', '2019-03-11 17:00:00', 0, 0, 0, 0, 0, 0, 0, 5),
(6, 'M.Puji Lesmana', 'muhammadpuji63@gmail.com', 'Jln.Sultan Agung Palembang Sumatera Selatan\r\n-', '081365541955', '2019-03-22 17:00:00', '2019-03-24 17:00:00', 0, 0, 0, 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_harga` varchar(50) DEFAULT NULL,
  `transaksi_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transaksi_keterangan` text,
  `pemesanan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_hp` varchar(20) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_alamat` text,
  `user_foto` varchar(50) DEFAULT NULL,
  `user_level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_hp`, `user_email`, `user_alamat`, `user_foto`, `user_level`) VALUES
(1, 'Kepala Pimpinan', 'pimpinan', '123456', '081345678888', 'pimpinan@gmail.com', 'Jl.Cempedak', 'a.jpg', 1),
(2, 'Administrator', 'admin', '123456', '0813566667777', 'muhammadpuji63@gmail.com', 'Jl. ratu sianum', 'a.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_nama` varchar(100) DEFAULT NULL,
  `video_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `kategori_paket`
--
ALTER TABLE `kategori_paket`
  ADD PRIMARY KEY (`kp_id`);

--
-- Indexes for table `konfirmasi_pegawai`
--
ALTER TABLE `konfirmasi_pegawai`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pemesanan_id` (`pemesanan_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`paket_id`),
  ADD KEY `kp_id` (`kp_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `pemesanan_id` (`pemesanan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori_paket`
--
ALTER TABLE `kategori_paket`
  MODIFY `kp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `konfirmasi_pegawai`
--
ALTER TABLE `konfirmasi_pegawai`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
