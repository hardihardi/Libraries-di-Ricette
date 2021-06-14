-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2021 pada 14.49
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_libreria_di_ricette`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `idBahan` varchar(20) NOT NULL,
  `namaBahan` varchar(20) NOT NULL,
  `ids` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`idBahan`, `namaBahan`, `ids`) VALUES
('B-10', 'Saus Tomat', 10),
('B-11', 'Air', 11),
('B-12', 'Gula', 12),
('B-13', 'Merica', 13),
('B-14', 'Mentega', 14),
('B-15', 'Minyak Goreng', 15),
('B-2', 'Ayam Fillet', 2),
('B-3', 'Bawang Putih', 3),
('B-4', 'garam', 4),
('B-5', 'bawang Bombay', 5),
('B-6', 'Daun Bawang', 6),
('B-7', 'Kecap Manis', 7),
('B-8', 'Kecap Inggris', 8),
('B-9', 'Saus Tiram', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_resep`
--

CREATE TABLE `bahan_resep` (
  `idBahan` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `takaran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_resep`
--

INSERT INTO `bahan_resep` (`idBahan`, `idResep`, `takaran`) VALUES
('B-2', 'R-1', 250),
('B-3', 'R-1', 65),
('B-15', 'R-1', 90),
('B-9', 'R-1', 45),
('B-8', 'R-1', 85),
('B-13', 'R-1', 65),
('B-14', 'R-1', 300),
('B-5', 'R-1', 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `profilePic` varchar(20) NOT NULL,
  `idMember` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jenisKelamin` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `ids` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`profilePic`, `idMember`, `username`, `nama`, `email`, `jenisKelamin`, `verified`, `ids`) VALUES
('user.png', 'M-2', 'daffa', 'daffa', 'daffa@gmail.com', 1, 0, 2),
('user.png', 'M-3', 'daffaharis', '123', '1213@gmail.com', 1, 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_toko`
--

CREATE TABLE `ref_toko` (
  `idToko` varchar(20) NOT NULL,
  `namaToko` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ids` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_toko`
--

INSERT INTO `ref_toko` (`idToko`, `namaToko`, `alamat`, `ids`) VALUES
('T-1', 'swalayan mujaer', 'Jl. marugame no.12', 1),
('T-2', 'Toko bangunan punya ', 'Jl pegangsaan timur', 2),
('T-3', 'Toko koki', 'Jalan Catur No. 321', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `idMember` varchar(20) NOT NULL,
  `resepPic` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `judul` varchar(20) NOT NULL,
  `rating` float NOT NULL,
  `ids` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`idMember`, `resepPic`, `idResep`, `deskripsi`, `judul`, `rating`, `ids`) VALUES
('M-2', 'resep.jpg', 'R-1', 'Ayam goreng nikmat sekali, renyah dan gurih, buatnya cepat. Recommend untuk keluarga', 'Ayam Roreng Rempah', 5, 1),
('M-2', 'resep1.jpg', 'R-2', 'Bebikinan beberapa wkt lalu, ini enak dan gampang bikin nya, memanfaatkan sisa ikan tenggiri oleh2 dr paksu sehabis dari pantai ma semua teman laki2nya.\r\nBerhubung Ahad aku ditinggal sendiri ma maryam akhirnya buat nyenengin istri jadi di bawain ikan buat masak n foto2 katanya', 'Siomay Ikan Tenggiri', 3, 2),
('M-2', 'resep1.jpg', 'R-3', 'Resep Sate ayam ponorogo', 'Sate ayam Ponorogo', 1, 3),
('M-2', 'resep.jpg', 'R-4', 'asdasfsdfasee', 'Ikan Bakar', 0, 5),
('M-2', 'resep.jpg', 'R-5', 'sdfsdfsdfsdfsdfsd', 'sdfsdfsdfsd', 0, 6),
('M-2', 'resep1.jpg', 'R-6', 'asdasdasdasdsad', 'asdasdsad', 5, 7),
('M-2', 'resep.jpg', 'R-7', 'erefsdfs', 'sdfsdfsdf', 3, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `idReview` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `idMember` varchar(20) NOT NULL,
  `rating` int(5) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `tglReview` date NOT NULL,
  `ids` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`idReview`, `idResep`, `idMember`, `rating`, `isi`, `tglReview`, `ids`) VALUES
('Rev-1', 'R-1', 'M-2', 1, 'Agak asin yaa', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `step_resep`
--

CREATE TABLE `step_resep` (
  `idStep` varchar(20) NOT NULL,
  `idResep` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `stepKe` int(5) NOT NULL,
  `stepPic` varchar(20) NOT NULL,
  `ids` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko_bahan`
--

CREATE TABLE `toko_bahan` (
  `idBahan` varchar(20) NOT NULL,
  `idToko` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko_bahan`
--

INSERT INTO `toko_bahan` (`idBahan`, `idToko`) VALUES
('B-2', 'T-3'),
('B-3', 'T-3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `isAdmin`) VALUES
('daffa', '202cb962ac59075b964b07152d234b70', 0),
('daffaharis', '202cb962ac59075b964b07152d234b70', 0),
('ujank', '202cb962ac59075b964b07152d234b70', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `fk_username_admin` (`username`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`idBahan`),
  ADD UNIQUE KEY `ids` (`ids`);

--
-- Indeks untuk tabel `bahan_resep`
--
ALTER TABLE `bahan_resep`
  ADD KEY `fk_idResep_bahan_resep` (`idResep`),
  ADD KEY `fk_idBahan_bahan_resep` (`idBahan`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`),
  ADD UNIQUE KEY `idd` (`ids`),
  ADD KEY `fk_username` (`username`);

--
-- Indeks untuk tabel `ref_toko`
--
ALTER TABLE `ref_toko`
  ADD PRIMARY KEY (`idToko`),
  ADD UNIQUE KEY `ids` (`ids`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`idResep`),
  ADD UNIQUE KEY `ids` (`ids`),
  ADD KEY `fk_idMember_resep` (`idMember`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`),
  ADD UNIQUE KEY `ids` (`ids`),
  ADD KEY `fk_idResep_review` (`idResep`),
  ADD KEY `fk_idMember_review` (`idMember`);

--
-- Indeks untuk tabel `step_resep`
--
ALTER TABLE `step_resep`
  ADD PRIMARY KEY (`idStep`),
  ADD UNIQUE KEY `ids` (`ids`),
  ADD KEY `fk_idResep_step_resep` (`idResep`);

--
-- Indeks untuk tabel `toko_bahan`
--
ALTER TABLE `toko_bahan`
  ADD KEY `fk_idBahan_toko_bahan` (`idBahan`),
  ADD KEY `fk_idToko_toko_bahan` (`idToko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ref_toko`
--
ALTER TABLE `ref_toko`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `step_resep`
--
ALTER TABLE `step_resep`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_username_admin` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `bahan_resep`
--
ALTER TABLE `bahan_resep`
  ADD CONSTRAINT `fk_idBahan_bahan_resep` FOREIGN KEY (`idBahan`) REFERENCES `bahan` (`idBahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idResep_bahan_resep` FOREIGN KEY (`idResep`) REFERENCES `resep` (`idResep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_idMember_resep` FOREIGN KEY (`idMember`) REFERENCES `member` (`idMember`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_idMember_review` FOREIGN KEY (`idMember`) REFERENCES `member` (`idMember`),
  ADD CONSTRAINT `fk_idResep_review` FOREIGN KEY (`idResep`) REFERENCES `resep` (`idResep`);

--
-- Ketidakleluasaan untuk tabel `step_resep`
--
ALTER TABLE `step_resep`
  ADD CONSTRAINT `fk_idResep_step_resep` FOREIGN KEY (`idResep`) REFERENCES `resep` (`idResep`);

--
-- Ketidakleluasaan untuk tabel `toko_bahan`
--
ALTER TABLE `toko_bahan`
  ADD CONSTRAINT `fk_idBahan_toko_bahan` FOREIGN KEY (`idBahan`) REFERENCES `bahan` (`idBahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idToko_toko_bahan` FOREIGN KEY (`idToko`) REFERENCES `ref_toko` (`idToko`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
