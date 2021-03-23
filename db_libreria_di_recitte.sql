-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 05:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_libreria_di_recitte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `nama`, `email`) VALUES
('1', 'admin1', 'A-00001', 'email@email.com'),
('2', 'admin2', 'A-00002', 'email@email.com'),
('3', 'admin3', 'A-00003', 'email@email.com'),
('4', 'admin4', 'A-00004', 'email@email.com'),
('5', 'admin5', 'A-00005', 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `idBahan` varchar(20) NOT NULL,
  `namaBahan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`idBahan`, `namaBahan`) VALUES
('bahan01', 'gula'),
('bahan02', 'tepung_terigu'),
('bahan03', 'garam'),
('bahan04', 'bawang_putih'),
('bahan05', 'bawang_merah');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_resep`
--

CREATE TABLE `bahan_resep` (
  `idBahan` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `takaran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `profilePic` varchar(20) NOT NULL,
  `idMember` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jenisKelamin` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`profilePic`, `idMember`, `username`, `nama`, `email`, `jenisKelamin`, `verified`) VALUES
('foto.jpg', 'M-00001', 'user1', 'nama', 'email@email.com', 0, 0),
('foto.jpg', 'M-00002', 'user2', 'nama', 'email@email.com', 0, 0),
('foto.jpg', 'M-00003', 'user3', 'nama', 'email@email.com', 0, 0),
('foto.jpg', 'M-00004', 'user4', 'nama', 'email@email.com', 0, 0),
('foto.jpg', 'M-00005', 'user5', 'nama', 'email@email.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_toko`
--

CREATE TABLE `ref_toko` (
  `idToko` varchar(20) NOT NULL,
  `namaToko` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_toko`
--

INSERT INTO `ref_toko` (`idToko`, `namaToko`, `alamat`) VALUES
('toko01', 'Toko Dewa Kipas', 'Jalan Catur No. 32'),
('toko02', 'Toko Mantappu Jiwa', 'Jalan Nihon No. 11'),
('toko03', 'Toko Garok', 'Jalan Toxic No. 69'),
('toko04', 'Toko Bahan Bagus', 'Jalan Jakarta No. 1'),
('toko05', 'Toko Apa Saja', 'Jalan Inaja No. 99');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `idMember` varchar(20) NOT NULL,
  `resepPic` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `judul` varchar(20) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`idMember`, `resepPic`, `idResep`, `deskripsi`, `judul`, `rating`) VALUES
('M-00001', 'resep.jpg', 'resep1', 'berikut cara membuat puding yang enak', 'cara membuat puding', 1),
('M-00002', 'resep.jpg', 'resep2', 'berikut cara membuat sate padang yang enak', 'cara membuat sate pa', 4),
('M-00003', 'resep.jpg', 'resep3', 'berikut cara membuat soto yang enak', 'cara membuat soto', 3),
('M-00004', 'resep.jpg', 'resep4', 'berikut cara membuat steak yang enak', 'cara membuat steak', 5),
('M-00005', 'resep.jpg', 'resep5', 'berikut cara membuat roti kukus yang enak', 'cara membuat roti ku', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idReview` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `idMember` varchar(20) NOT NULL,
  `rating` int(5) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `tglReview` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`idReview`, `idResep`, `idMember`, `rating`, `isi`, `tglReview`) VALUES
('review1', 'resep1', 'M-00001', 1, 'pudingnya terasa lembut', '2021-01-01'),
('review2', 'resep2', 'M-00002', 4, 'kuahnya pas', '2021-01-02'),
('review3', 'resep3', 'M-00003', 3, 'sotonya terasa segar', '2021-01-03'),
('review4', 'resep4', 'M-00004', 5, 'dagingnya lembut', '2021-01-04'),
('review5', 'resep5', 'M-00005', 3, 'takaran rotinya pas', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `step_resep`
--

CREATE TABLE `step_resep` (
  `idStep` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `stepKe` int(5) NOT NULL,
  `stepPic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `step_resep`
--

INSERT INTO `step_resep` (`idStep`, `idResep`, `deskripsi`, `stepKe`, `stepPic`) VALUES
('S-000001', 'resep1', 'siapkan bahan-bahan', 1, 'gambar langkah.jpg'),
('S-000002', 'resep1', 'siapkan bahan-bahan', 2, 'gambar langkah.jpg'),
('S-000003', 'resep1', 'siapkan bahan-bahan', 3, 'gambar langkah.jpg'),
('S-000004', 'resep1', 'siapkan bahan-bahan', 4, 'gambar langkah.jpg'),
('S-000005', 'resep1', 'siapkan bahan-bahan', 5, 'gambar langkah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `toko_bahan`
--

CREATE TABLE `toko_bahan` (
  `idBahan` varchar(20) NOT NULL,
  `idToko` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `isAdmin`) VALUES
('admin1', 'this is supposed to be hashed', 1),
('admin2', 'this is supposed to be hashed', 1),
('admin3', 'this is supposed to be hashed', 1),
('admin4', 'this is supposed to be hashed', 1),
('admin5', 'this is supposed to be hashed', 1),
('ale', 'devil123', 0),
('user1', 'this is supposed to be hashed', 0),
('user2', 'this is supposed to be hashed', 0),
('user3', 'this is supposed to be hashed', 0),
('user4', 'this is supposed to be hashed', 0),
('user5', 'this is supposed to be hashed', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `fk_username_admin` (`username`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`idBahan`);

--
-- Indexes for table `bahan_resep`
--
ALTER TABLE `bahan_resep`
  ADD KEY `fk_idResep_bahan_resep` (`idResep`),
  ADD KEY `fk_idBahan_bahan_resep` (`idBahan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `ref_toko`
--
ALTER TABLE `ref_toko`
  ADD PRIMARY KEY (`idToko`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`idResep`),
  ADD KEY `fk_idMember_resep` (`idMember`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`),
  ADD KEY `fk_idResep_review` (`idResep`),
  ADD KEY `fk_idMember_review` (`idMember`);

--
-- Indexes for table `step_resep`
--
ALTER TABLE `step_resep`
  ADD PRIMARY KEY (`idStep`),
  ADD KEY `fk_idResep_step_resep` (`idResep`);

--
-- Indexes for table `toko_bahan`
--
ALTER TABLE `toko_bahan`
  ADD KEY `fk_idBahan_toko_bahan` (`idBahan`),
  ADD KEY `fk_idToko_toko_bahan` (`idToko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_username_admin` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `bahan_resep`
--
ALTER TABLE `bahan_resep`
  ADD CONSTRAINT `fk_idBahan_bahan_resep` FOREIGN KEY (`idBahan`) REFERENCES `bahan` (`idBahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idResep_bahan_resep` FOREIGN KEY (`idResep`) REFERENCES `resep` (`idResep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_idMember_resep` FOREIGN KEY (`idMember`) REFERENCES `member` (`idMember`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_idMember_review` FOREIGN KEY (`idMember`) REFERENCES `member` (`idMember`),
  ADD CONSTRAINT `fk_idResep_review` FOREIGN KEY (`idResep`) REFERENCES `resep` (`idResep`);

--
-- Constraints for table `step_resep`
--
ALTER TABLE `step_resep`
  ADD CONSTRAINT `fk_idResep_step_resep` FOREIGN KEY (`idResep`) REFERENCES `resep` (`idResep`);

--
-- Constraints for table `toko_bahan`
--
ALTER TABLE `toko_bahan`
  ADD CONSTRAINT `fk_idBahan_toko_bahan` FOREIGN KEY (`idBahan`) REFERENCES `bahan` (`idBahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idToko_toko_bahan` FOREIGN KEY (`idToko`) REFERENCES `ref_toko` (`idToko`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
