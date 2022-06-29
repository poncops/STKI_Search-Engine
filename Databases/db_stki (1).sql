-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 05:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stki`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbberita`
--

CREATE TABLE `tbberita` (
  `Id` int(11) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Berita` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbberita`
--

INSERT INTO `tbberita` (`Id`, `Judul`, `Berita`) VALUES
(17, 'Indonesia Lolos Piala Asia, Prediksi Pelatih Nepal Jadi Kenyataan', 'jakarta, CNN Indonesia -- Prediksi Pelatih Nepal Abdullah Al Mutairi agar Timnas Indonesia lolos ke Piala Asia 2023 menjadi kenyataan.\nTimnas Indonesia memastikan tampil di Piala Asia 2023 usai menghajar Nepal 7-0 pada pertandingan terakhir di Grup A Kual'),
(18, 'Pukul Kepala Saddil, Kapten Nepal Gembok Instagram', 'Jakarta, CNN Indonesia -- Kapten timnas Nepal yang terlihat menoyor Saddil Ramdani, Pujan Uparkoti, diketahui menggembok akun Instagram.\nUparkoti merupakan pemimpin skuad The Gorkhalis di lapangan, namun pemain 26 tahun itu menunjukkan sikap yang kurang p');

-- --------------------------------------------------------

--
-- Table structure for table `tbcache`
--

CREATE TABLE `tbcache` (
  `Id` int(11) NOT NULL,
  `Query` varchar(100) NOT NULL,
  `DocId` int(11) NOT NULL,
  `Value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbindex`
--

CREATE TABLE `tbindex` (
  `Id` int(11) NOT NULL,
  `Term` varchar(30) NOT NULL,
  `DocId` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `Bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbindex`
--

INSERT INTO `tbindex` (`Id`, `Term`, `DocId`, `Count`, `Bobot`) VALUES
(1, 'jakarta', 17, 1, 0),
(2, 'cnn', 17, 1, 0),
(3, 'indonesia', 17, 3, 0),
(4, 'prediksi', 17, 1, 0.693147),
(5, 'pelatih', 17, 1, 0.693147),
(6, 'nepal', 17, 2, 0),
(7, 'abdullah', 17, 1, 0.693147),
(8, 'al', 17, 1, 0.693147),
(9, 'mutairi', 17, 1, 0.693147),
(10, 'agar', 17, 1, 0.693147),
(11, 'timnas', 17, 1, 0),
(12, 'lolos', 17, 1, 0.693147),
(13, 'piala', 17, 2, 1.38629),
(14, 'asia', 17, 2, 1.38629),
(15, '2023', 17, 2, 1.38629),
(16, 'menjadi', 17, 1, 0.693147),
(17, 'nyataan', 17, 1, 0.693147),
(18, '\ntimnas', 17, 1, 0.693147),
(19, 'memastikan', 17, 1, 0.693147),
(20, 'tampil', 17, 1, 0.693147),
(21, 'di', 17, 2, 0),
(22, 'usai', 17, 1, 0.693147),
(23, 'menghajar', 17, 1, 0.693147),
(24, '7', 17, 1, 0.693147),
(25, '0', 17, 1, 0.693147),
(26, 'pertandingan', 17, 1, 0.693147),
(27, 'terakhir', 17, 1, 0.693147),
(28, 'grup', 17, 1, 0.693147),
(29, 'a', 17, 1, 0.693147),
(30, 'kual', 17, 1, 0.693147),
(31, 'jakarta', 18, 1, 0),
(32, 'cnn', 18, 1, 0),
(33, 'indonesia', 18, 1, 0),
(34, 'kapten', 18, 1, 0.693147),
(35, 'timnas', 18, 1, 0),
(36, 'nepal', 18, 1, 0),
(37, 'terlihat', 18, 1, 0.693147),
(38, 'menoyor', 18, 1, 0.693147),
(39, 'saddil', 18, 1, 0.693147),
(40, 'rami', 18, 1, 0.693147),
(41, 'pujan', 18, 1, 0.693147),
(42, 'uparkoti', 18, 1, 0.693147),
(43, 'ditahui', 18, 1, 0.693147),
(44, 'menggembok', 18, 1, 0.693147),
(45, 'akun', 18, 1, 0.693147),
(46, 'instagram', 18, 1, 0.693147),
(47, '\nuparkoti', 18, 1, 0.693147),
(48, 'merupakan', 18, 1, 0.693147),
(49, 'pemimpin', 18, 1, 0.693147),
(50, 'skuad', 18, 1, 0.693147),
(51, 'the', 18, 1, 0.693147),
(52, 'gorkhalis', 18, 1, 0.693147),
(53, 'di', 18, 1, 0),
(54, 'lapangan', 18, 1, 0.693147),
(55, 'namun', 18, 1, 0.693147),
(56, 'pemain', 18, 1, 0.693147),
(57, '26', 18, 1, 0.693147),
(58, 'tahun', 18, 1, 0.693147),
(59, 'menunjukkan', 18, 1, 0.693147),
(60, 'sikap', 18, 1, 0.693147),
(61, 'kurang', 18, 1, 0.693147),
(62, 'p', 18, 1, 0.693147);

-- --------------------------------------------------------

--
-- Table structure for table `tbstem`
--

CREATE TABLE `tbstem` (
  `Id` int(11) NOT NULL,
  `Term` varchar(30) NOT NULL,
  `Stem` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbvektor`
--

CREATE TABLE `tbvektor` (
  `DocId` int(11) NOT NULL,
  `Panjang` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbvektor`
--

INSERT INTO `tbvektor` (`DocId`, `Panjang`) VALUES
(17, 3.98182),
(18, 3.53437);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbcache`
--
ALTER TABLE `tbcache`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbindex`
--
ALTER TABLE `tbindex`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbstem`
--
ALTER TABLE `tbstem`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbvektor`
--
ALTER TABLE `tbvektor`
  ADD PRIMARY KEY (`DocId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbberita`
--
ALTER TABLE `tbberita`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbcache`
--
ALTER TABLE `tbcache`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbindex`
--
ALTER TABLE `tbindex`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbstem`
--
ALTER TABLE `tbstem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
