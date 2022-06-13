-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2021 pada 04.49
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yupin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(200) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `nama`, `kategori`, `status`, `date`) VALUES
(6, '16HoVngcyUoRU', 'Laptop 01', 'Elektronik', 1, '1619485036'),
(7, '16rK7aWipz20Y', 'Laptop 02', 'Elektronik', 2, '1619459641'),
(8, '168o7w6xSVIYw', 'Laptop 03', 'Elektronik', 2, '1619459666'),
(9, '16Zwn00yw/Sko', 'Laptop 04', 'Elektronik', 1, '1619459679'),
(10, '16BsLwBcWUBHc', 'Laptop 05', 'Elektronik', 1, '1619459689'),
(11, '1651pN/7u1z5A', 'Laptop 06', 'Elektronik', 1, '1619459705'),
(12, '16G/AtWf0PTw6', 'Laptop 07', 'Elektronik', 1, '1619459721'),
(13, '16UdcS5RlZMQU', 'Laptop 08', 'Elektronik', 1, '1619459736'),
(14, '16NC1qa21RQGY', 'Laptop 09', 'Elektronik', 1, '1619459750'),
(15, '16DAHHc69w6ak', 'Laptop 10', 'Elektronik', 1, '1619459772'),
(16, '16iSVtMe6LJaQ', 'Laptop 11', 'Elektronik', 1, '1619459789'),
(17, '16EzGL.QvRnhI', 'Laptop 12', 'Elektronik', 1, '1619459811'),
(18, '16e.Q6GZTu5k6', 'Laptop 13', 'Elektronik', 1, '1619459825'),
(19, '16Hm86ppapWyc', 'Laptop 14', 'Elektronik', 1, '1619459840'),
(20, '16AG9b2/OIVJ.', 'Laptop 15', 'Elektronik', 1, '1619459858'),
(21, '16jiw6ECnBPcQ', 'Laptop 16', 'Elektronik', 1, '1619459871'),
(22, '16J.aTsypbtVw', 'Laptop 17', 'Elektronik', 1, '1619459909'),
(23, '16SCoR8ojB1ws', 'Laptop 18', 'Elektronik', 1, '1619459929'),
(24, '16ee8TclRE3u2', 'Laptop 19', 'Elektronik', 1, '1619459943'),
(25, '16nZWE4dSkxMQ', 'Laptop 20', 'Elektronik', 1, '1619459956');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Elektronik'),
(2, 'Alat Olahragaa'),
(3, 'Alat Kebersihan'),
(4, 'Alat Mandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(128) NOT NULL,
  `nama_peminjam` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `date_pinjam` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_barang`, `nama_peminjam`, `kelas`, `jurusan`, `date_pinjam`) VALUES
(11, '16rK7aWipz20Y', 'Tegar sanjaya', '11', 'Rekayasa Perangkat Lunak', '1619491121'),
(13, '168o7w6xSVIYw', 'Agim Hidayat', '10', 'Rekayasa Perangkat Lunak', '1619573451');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `jurusan`) VALUES
(1, '0088372762', 'Agim Hidayat', '10', 'Rekayasa Perangkat Lunak'),
(6, '0088372763', 'Andrea alvi', '10', 'Rekayasa Perangkat Lunak'),
(7, '0088372764', 'Muhammad Arijal', '10', 'Rekayasa Perangkat Lunak'),
(8, '0088372765', 'Khoerudin Saepul Alam', '11', 'Multi Media'),
(9, '0088372765', 'Revaldo', '10', 'Rekayasa Perangkat Lunak'),
(10, '0088372766', 'Tegar sanjaya', '11', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(9) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(11) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `date`) VALUES
(1, 'Agim Hidayat', 'a_gimhdyt', '$2y$10$Smob7XyiqcSqKDUm57DGeuKCaVKpHQkS6kiDeYFDfyBNUOlZTRMBq', 1, '1619066845'),
(2, 'Agym Hidayat', 'admin', '$2y$10$ArSrAj1CNt20PRpPfl6er.ehLoa3giXu.tCUjk/QcNIBU/RO3nvl.', 2, '1619104671');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
