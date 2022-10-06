-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2022 pada 16.19
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asal`
--

CREATE TABLE `asal` (
  `asal_id` int(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asal`
--

INSERT INTO `asal` (`asal_id`, `country`, `last_update`) VALUES
(1, 'Germany', '2022-06-09 15:22:31'),
(2, 'Japan', '2022-06-09 15:22:37'),
(3, 'Russia\r\n', '2022-06-09 15:22:45'),
(4, 'France', '2022-06-09 15:22:52'),
(5, 'Spain', '2022-06-09 15:23:01'),
(6, 'England', '2022-06-09 15:23:08'),
(7, 'United States', '2022-06-09 15:23:32'),
(8, 'Qatar', '2022-06-09 15:23:44'),
(9, 'Australia', '2022-06-09 15:24:18'),
(10, 'Brazil', '2022-06-09 15:24:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(8) NOT NULL,
  `stok_barang` int(8) NOT NULL,
  `kondisi` int(10) NOT NULL,
  `asal` int(10) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID`, `nama_barang`, `harga_barang`, `stok_barang`, `kondisi`, `asal`, `gambar`) VALUES
(7, 'Handphone (Iphone)', 7500000, 30, 3, 7, 'img/747222iphone.jpg'),
(8, 'Handphone (Samsung)', 9000000, 25, 2, 1, 'img/187544samsung.webp'),
(9, 'Monitor', 20000000, 6, 1, 9, 'img/534754monitor.jpeg'),
(11, 'Printer', 1750000, 23, 1, 5, 'img/372428printer.jpg'),
(12, 'Mouse Gaming', 525000, 39, 4, 5, 'img/324531mouse.jpg'),
(13, 'Keyboard Gaming', 32, 26, 1, 5, 'img/860591keyboard.jpg'),
(15, 'Laptop', 14350000, 73, 1, 6, 'img/271732laptop.png'),
(16, 'CPU Gaming', 10500000, 61, 3, 10, 'img/48084cpu.jpg'),
(17, 'VGA RTX 3090', 7500000, 78, 4, 3, 'img/152482vga.png'),
(18, 'Headphone', 450000, 66, 2, 10, 'img/164582headphone.webp'),
(19, 'Gaming Table', 2500000, 16, 2, 7, 'img/771406meja.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(10) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `kondisi`, `deskripsi`, `last_update`) VALUES
(1, 'BNIB', 'lorem lorem ipsum', '2022-06-09 15:31:02'),
(2, 'BNOB', 'lorem lorem ipsum', '2022-06-09 15:31:07'),
(3, 'BEKAS', 'lorem lorem ipsum', '2022-06-09 15:31:12'),
(4, 'SECOND HAND', 'lorem lorem ipsum', '2022-06-09 15:31:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asal`
--
ALTER TABLE `asal`
  ADD PRIMARY KEY (`asal_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asal`
--
ALTER TABLE `asal`
  MODIFY `asal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
