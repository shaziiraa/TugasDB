-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 04, 2024 at 11:54 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dayaksto_DB_Bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username_adm` varchar(15) NOT NULL,
  `password_adm` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_adm`, `password_adm`) VALUES
('admin', '79124251ea61de773683db73bbb83cf4'),
('admin1', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(7) NOT NULL,
  `waktu` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `waktu`) VALUES
('kdjw001', '09:00 WIB'),
('kdjw002', '11:00 WIB'),
('kdjw003', '13:00 WIB'),
('kdjw004', '15:00 WIB');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `no_polisi` varchar(10) NOT NULL,
  `jenis_motor` enum('Cub','Matic','Sport') NOT NULL,
  `merk_motor` enum('Honda','Yamaha','Suzuki','Kawasaki','Lainnya') NOT NULL,
  `nama_motor` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`no_polisi`, `jenis_motor`, `merk_motor`, `nama_motor`, `username`) VALUES
('B1Ri', 'Sport', 'Kawasaki', 'Motor mainan', 'Miazory'),
('B5678CE', 'Sport', 'Yamaha', 'Motor Gue', 'Vava'),
('B5678CF', 'Sport', 'Honda', 'Motorku', 'rika'),
('BH151TT', 'Cub', 'Yamaha', 'Blacky', 'edahuyyiba'),
('F1202BC', 'Sport', 'Honda', 'CB150 Verza', 'tegardoa'),
('Jdjdjsbxh', 'Matic', 'Yamaha', 'Hduzbxhjzbxb', 'user50'),
('T4443LA', 'Matic', 'Yamaha', 'Mio', 'Reksi Firmansya');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_transaksi` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rating` int NOT NULL,
  `comments` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `username`, `kode_transaksi`, `rating`, `comments`, `created_at`) VALUES
(1, 'edahuyyiba', '67502d15df9ad', 5, 'Mantap PAIJO', '2024-12-04 10:33:18'),
(2, 'edahuyyiba', '67502fcca0460', 5, 'MANTAP PAK', '2024-12-04 10:43:41'),
(3, 'edahuyyiba', '675031f8664a6', 5, 'GG', '2024-12-04 10:44:20'),
(4, 'edahuyyiba', '67503396d3d7d', 3, 'JELEK BANGET BANGSAT, GA BECUS JADI MEKANIK, MENDING PENSIUN GOBLOK, TOLOL AMAT JADI MEKANIK WKWKWKWKWKKWKWKWKWKWKWKWKKWKWKWKWKWKKWKW :V', '2024-12-04 10:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_jadwal` varchar(7) NOT NULL,
  `username` varchar(15) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `status` enum('Belum','Proses','Selesai','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tanggal`, `kode_jadwal`, `username`, `no_polisi`, `status`) VALUES
('5b14c5185c6fe', '2018-06-05', 'kdjw002', 'Miazory', 'B1Ri', 'Selesai'),
('5b14cc4e35889', '2018-06-07', 'kdjw004', 'Reksi Firmansya', 'T4443LA', 'Selesai'),
('5b14d80944944', '2018-06-05', 'kdjw002', 'Vava', 'B5678CE', 'Proses'),
('5b14db37a7798', '2018-06-11', 'kdjw001', 'user50', 'Jdjdjsbxh', 'Belum'),
('5b14db5371412', '2018-06-05', 'kdjw004', 'user50', 'Jdjdjsbxh', 'Belum'),
('5b14f4852f327', '2018-06-06', 'kdjw003', 'rika', 'B5678CF', 'Selesai'),
('5b150e3ee22af', '2018-06-09', 'kdjw003', 'rika', 'B5678CF', 'Belum'),
('5b33aa7e3e4a4', '2018-06-29', 'kdjw002', 'tegardoa', 'F1202BC', 'Belum'),
('67502d15df9ad', '2024-12-05', 'kdjw001', 'edahuyyiba', 'BH151TT', 'Selesai'),
('67502fcca0460', '2024-12-07', 'kdjw002', 'edahuyyiba', 'BH151TT', 'Selesai'),
('675031f8664a6', '2024-12-11', 'kdjw001', 'edahuyyiba', 'BH151TT', 'Selesai'),
('67503396d3d7d', '2024-12-06', 'kdjw002', 'edahuyyiba', 'BH151TT', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `block` enum('Blocked','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `tgl_lahir`, `jk`, `no_telp`, `alamat`, `block`) VALUES
('edahuyyiba', 'e172dd95f4feb21412a692e73929961e', 'Rizqullah Abiyyu Hade', '2024-12-04', 'Pria', '09090909', 'manakek', 'Tidak'),
('Miazory', '7a5bde8adaf60027e794a3af535dcaff', 'Miz', '2018-04-26', 'Pria', '081234456789', 'Jalan jalan', 'Tidak'),
('Reksi Firmansya', '202cb962ac59075b964b07152d234b70', 'Reksi Firmansyah', '1998-05-14', 'Pria', '08161415485', 'Perum Pemda', 'Tidak'),
('rika', '827ccb0eea8a706c4c34a16891f84e7b', 'Rika Fauziah', '1999-02-25', 'Wanita', '089656931847', 'Bekasi', 'Tidak'),
('simin', 'e10adc3949ba59abbe56e057f20f883e', 'simin', '2014-09-04', 'Pria', '089682612956', 'cikarang', 'Tidak'),
('tegardoa', 'd5b2e0291a5157c61c6867d31b235a71', 'Andy Yudithio', '0000-00-00', 'Pria', '085881742785', 'asdasd', 'Tidak'),
('user50', '5d68f62085335588b67cf713ed6b3cfb', 'User50', '2018-06-04', 'Pria', '0899999999', 'Telaga Murni', 'Tidak'),
('Vava', '674f3c2c1a8a6f90461e8a66fb5550ba', 'Vava Maharani', '2018-06-04', 'Wanita', '089654264514', 'Cipanas Cianjur', 'Tidak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_adm`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`no_polisi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `username` (`username`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_jadwal` (`kode_jadwal`),
  ADD KEY `username` (`username`),
  ADD KEY `no_polisi` (`no_polisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motor_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motor_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motor_ibfk_4` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE SET NULL;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_jadwal`) REFERENCES `jadwal` (`kode_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`no_polisi`) REFERENCES `motor` (`no_polisi`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`no_polisi`) REFERENCES `motor` (`no_polisi`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`no_polisi`) REFERENCES `motor` (`no_polisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`kode_jadwal`) REFERENCES `jadwal` (`kode_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
