-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2023 pada 08.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aditya_utss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datalink`
--

CREATE TABLE `datalink` (
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `datalink`
--

INSERT INTO `datalink` (`judul`, `url`, `deskripsi`) VALUES
('loker it', 'https://www.jobstreet.co.id/id/it-jobs', 'loker it terpecaya dan bagus'),
('makanan 5 sehat', 'https://id.search.yahoo.com/search?fr=mcafee&type=E210ID91215G0&p=makanan+sehat', 'silahkan di cek!!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('aditya@gmail.com', '1'),
('gigi12@gmail.com', '1'),
('kiki12@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datalink`
--
ALTER TABLE `datalink`
  ADD PRIMARY KEY (`judul`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
