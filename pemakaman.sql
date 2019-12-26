-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 03:56 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemakaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id_trans` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_jenazah` varchar(100) NOT NULL,
  `no_petak` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_trans` datetime NOT NULL,
  `total_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`) VALUES
(1, 'Anjatan'),
(2, 'Arahan'),
(3, 'Balongan'),
(4, 'Bangodua'),
(5, 'Bongas'),
(6, 'Cantigi'),
(7, 'Cikedung'),
(8, 'Gabuswetan'),
(9, 'Gantar'),
(10, 'Haurgeulis'),
(11, 'Indramayu'),
(12, 'Jatibarang'),
(13, 'Juntinyuat'),
(14, 'Kandanghaur'),
(15, 'Karangampel'),
(16, 'Kedokan Bunder'),
(17, 'Kertasemaya'),
(18, 'Krangkeng'),
(19, 'Kroya'),
(20, 'Lelea'),
(21, 'Lohbener'),
(22, 'Losarang'),
(23, 'Pasekan'),
(24, 'Patrol'),
(25, 'Sindang'),
(26, 'Sliyeg'),
(27, 'Sukagumiwang'),
(28, 'Sukra'),
(29, 'Tukdana'),
(30, 'Terisi'),
(31, 'Widasari');

-- --------------------------------------------------------

--
-- Table structure for table `petak`
--

CREATE TABLE `petak` (
  `no_petak` varchar(5) NOT NULL,
  `id_tu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petak`
--

INSERT INTO `petak` (`no_petak`, `id_tu`) VALUES
('UI001', 1),
('UK001', 2),
('UK002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tpu`
--

CREATE TABLE `tpu` (
  `id_tpu` int(11) NOT NULL,
  `nama_tpu` varchar(100) NOT NULL,
  `id_kec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpu`
--

INSERT INTO `tpu` (`id_tpu`, `nama_tpu`, `id_kec`) VALUES
(1, 'Ujungaris', 31),
(2, 'Duku Jeruk', 15),
(3, 'Candi', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tpu_unit`
--

CREATE TABLE `tpu_unit` (
  `id_tu` int(11) NOT NULL,
  `id_tpu` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpu_unit`
--

INSERT INTO `tpu_unit` (`id_tu`, `id_tpu`, `id_unit`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `tgl_trans` datetime NOT NULL,
  `total_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_trans` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_jenazah` varchar(100) NOT NULL,
  `no_petak` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Islam'),
(2, 'Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `tanggal_lahir`, `jenis_kelamin`, `kata_sandi`, `level`) VALUES
(1, 'Meita Valensina', 'meita', '2000-05-10', 'Perempuan', 'meita21', 'admin'),
(2, 'Lufita Alif Nurjannah', 'lufita', '2000-01-02', 'Perempuan', 'lufita02', 'warga'),
(3, 'Nurul Miftahul Jannah', 'nurul', '2000-07-18', 'Perempuan', '12345', 'warga'),
(4, 'Marwiyah', 'marwiyah_zf', '1974-09-08', 'Perempuan', 'narayah', 'warga'),
(5, 'Muzaki', 'muzaki_zf', '1975-06-02', 'Laki-laki', '2675', 'warga'),
(6, 'Aura Nur Fathimah', 'aura_zf', '2008-10-15', 'Perempuan', '151008', 'warga'),
(7, 'admin', 'admin', '2000-04-01', 'Perempuan', 'admin17', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `petak`
--
ALTER TABLE `petak`
  ADD PRIMARY KEY (`no_petak`),
  ADD KEY `id_tu` (`id_tu`);

--
-- Indexes for table `tpu`
--
ALTER TABLE `tpu`
  ADD PRIMARY KEY (`id_tpu`),
  ADD KEY `id_kec` (`id_kec`);

--
-- Indexes for table `tpu_unit`
--
ALTER TABLE `tpu_unit`
  ADD PRIMARY KEY (`id_tu`),
  ADD KEY `id_tpu` (`id_tpu`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_trans` (`id_trans`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_petak` (`no_petak`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petak`
--
ALTER TABLE `petak`
  ADD CONSTRAINT `petak_ibfk_1` FOREIGN KEY (`id_tu`) REFERENCES `tpu_unit` (`id_tu`);

--
-- Constraints for table `tpu`
--
ALTER TABLE `tpu`
  ADD CONSTRAINT `tpu_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`);

--
-- Constraints for table `tpu_unit`
--
ALTER TABLE `tpu_unit`
  ADD CONSTRAINT `tpu_unit_ibfk_1` FOREIGN KEY (`id_tpu`) REFERENCES `tpu` (`id_tpu`),
  ADD CONSTRAINT `tpu_unit_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transaksi_detail` (`id_trans`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_detail_ibfk_4` FOREIGN KEY (`no_petak`) REFERENCES `petak` (`no_petak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
