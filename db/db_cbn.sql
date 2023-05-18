-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 03:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_approve`
--

CREATE TABLE `tb_approve` (
  `id_approve` int(11) NOT NULL,
  `approve` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_approve`
--

INSERT INTO `tb_approve` (`id_approve`, `approve`, `created_at`, `updated_at`) VALUES
(1, 'approve', '2023-04-12 15:53:53', '2023-04-12 15:53:53'),
(2, 'progress', '2023-04-12 15:53:53', '2023-04-12 15:53:53'),
(3, 'not approve', '2023-04-12 15:53:53', '2023-04-12 15:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donatur`
--

CREATE TABLE `tb_donatur` (
  `id_donatur` int(11) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_donatur`
--

INSERT INTO `tb_donatur` (`id_donatur`, `nama_donatur`, `jenis_kelamin`, `alamat`, `status`, `usia`, `created_at`, `updated_at`) VALUES
(2, 'Yusuf', 'Laki-laki', 'kp. wates', 'sementara', '25 Tahun', '2023-04-12 00:00:40', '2023-04-12 00:00:40'),
(3, 'Tia', 'Perempuan', 'kp. Kali Jaya', 'sementara', '30 Tahun', '2023-04-12 00:00:40', '2023-04-12 00:00:40'),
(4, 'H. DADANG', 'Laki-laki', 'Kp. Wates', 'Tetap', '33 tahun', '2023-04-15 00:36:42', '2023-04-15 00:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `kd_jenis` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `saldo` int(100) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `kd_jenis`, `jenis`, `saldo`, `id_satuan`, `created_at`, `updated_at`) VALUES
(1, 'DN-001', 'Materi', 0, 1, '2023-04-12 00:01:44', '2023-04-12 00:01:44'),
(2, 'DN-002', 'Non Materi', 400, 2, '2023-04-12 00:01:44', '2023-04-12 00:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id_keluar` int(11) NOT NULL,
  `tgl_keluar` varchar(50) NOT NULL,
  `kd_jenis` varchar(50) NOT NULL,
  `dana_keluar` int(100) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_approve` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keluar`
--

INSERT INTO `tb_keluar` (`id_keluar`, `tgl_keluar`, `kd_jenis`, `dana_keluar`, `id_satuan`, `keterangan`, `id_approve`, `created_at`, `updated_at`) VALUES
(2, '04/01/2023', 'DN-001', 100000, 1, 'Sodaqoh', 1, '2023-04-14 19:49:58', '2023-04-14 19:49:58'),
(4, '04/16/2023', 'DN-001', 100000, 1, 'Sodaqoh', 1, '2023-04-16 16:02:46', '2023-04-16 16:02:46'),
(5, '05/01/2023', 'DN-001', 100000, 1, 'amal jariah', 2, '2023-05-01 14:50:30', '2023-05-01 14:50:30');

--
-- Triggers `tb_keluar`
--
DELIMITER $$
CREATE TRIGGER `saldoMin` AFTER INSERT ON `tb_keluar` FOR EACH ROW BEGIN
UPDATE tb_jenis SET saldo = saldo - NEW.dana_keluar WHERE kd_jenis = NEW.kd_jenis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `tgl_masuk` varchar(50) NOT NULL,
  `kd_jenis` varchar(50) NOT NULL,
  `dana_masuk` int(100) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_approve` int(11) NOT NULL,
  `bukti_tf` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_masuk`, `id_donatur`, `tgl_masuk`, `kd_jenis`, `dana_masuk`, `id_satuan`, `keterangan`, `id_approve`, `bukti_tf`, `created_at`, `updated_at`) VALUES
(6, 4, '04/01/2023', 'DN-001', 100000, 1, 'Sodaqoh', 1, 'pembayaran novajet dika.jpg', '2023-04-16 15:52:41', '2023-04-16 15:52:41'),
(7, 2, '04/16/2023', 'DN-001', 100000, 1, 'Sodaqoh', 1, 'AW-169.jpg', '2023-04-16 16:02:05', '2023-04-16 16:02:05');

--
-- Triggers `tb_masuk`
--
DELIMITER $$
CREATE TRIGGER `dateUpdateUp` AFTER INSERT ON `tb_masuk` FOR EACH ROW BEGIN
UPDATE tb_jenis SET updated_at = CURRENT_TIMESTAMP WHERE kd_jenis;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `saldoUp` AFTER INSERT ON `tb_masuk` FOR EACH ROW BEGIN
UPDATE tb_jenis SET saldo = saldo + NEW.dana_masuk WHERE kd_jenis = NEW.kd_jenis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerima`
--

CREATE TABLE `tb_penerima` (
  `id_penerima` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `usia_penerima` varchar(10) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `status_penerima` varchar(20) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penerima`
--

INSERT INTO `tb_penerima` (`id_penerima`, `nama_penerima`, `usia_penerima`, `jenis_kelamin`, `status_penerima`, `alamat_penerima`, `created_at`, `updated_at`) VALUES
(2, 'ANDI', '10 Tahun', 'Laki-laki', 'Piatu', 'Kp. Watez', '2023-04-16 13:34:17', '2023-04-16 13:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'Rp.', '2023-04-12 00:02:05', '2023-04-12 00:02:05'),
(2, 'Kg', '2023-04-12 00:02:05', '2023-04-12 00:02:05'),
(4, 'Lbr', '2023-04-16 15:36:46', '2023-04-16 15:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('bendahara','sekretaris','ketua') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Haerul Imam', 'bendahara@cahayabn.com', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'bendahara', 'bendahara.jpg', '2023-04-11 11:05:16', '2023-04-11 11:05:16'),
(2, 'Haji Somad', 'ketuacbn@cahayabn.com', '00719910bb805741e4b7f28527ecb3ad', 'ketua', 'ketua.jpg', '2023-04-11 11:14:53', '2023-04-11 11:14:53'),
(4, 'Dian Fitriah,.S.K.M', 'sekretaris@cahayabn.com', 'ce1023b227de5c34b98c470cda4699bb', 'sekretaris', 'Sekretaris.jpg', '2023-04-11 19:23:45', '2023-04-11 19:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_approve`
--
ALTER TABLE `tb_approve`
  ADD PRIMARY KEY (`id_approve`);

--
-- Indexes for table `tb_donatur`
--
ALTER TABLE `tb_donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_approve`
--
ALTER TABLE `tb_approve`
  MODIFY `id_approve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_donatur`
--
ALTER TABLE `tb_donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
