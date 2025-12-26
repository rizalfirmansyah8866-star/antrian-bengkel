-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2025 pada 00.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '12345'),
(2, 'admin', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_motor` varchar(100) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  `nama_motor` varchar(100) DEFAULT NULL,
  `jenis_layanan` varchar(100) DEFAULT NULL,
  `keluhan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id`, `nomor`, `nama_pelanggan`, `jenis_motor`, `status`, `nama_motor`, `jenis_layanan`, `keluhan`) VALUES
(12, 0, 'ilham ', '', '1', 'VARIO', 'Servis', 'GANTII OLI'),
(13, 0, 'MIFTA ', '', '0', 'MIO', 'Servis', 'GANTI VELG ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian_servis`
--

CREATE TABLE `antrian_servis` (
  `id_antrian` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `motor_tipe` varchar(50) NOT NULL,
  `plat_nomor` varchar(20) NOT NULL,
  `keluhan` text NOT NULL,
  `status_antrian` enum('Menunggu','Diproses','Selesai','Batal') NOT NULL DEFAULT 'Menunggu',
  `waktu_input` datetime NOT NULL,
  `nama_mekanik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian_servis`
--

INSERT INTO `antrian_servis` (`id_antrian`, `nama_pelanggan`, `motor_tipe`, `plat_nomor`, `keluhan`, `status_antrian`, `waktu_input`, `nama_mekanik`) VALUES
(1, 'rizal', 'vario', '', 'gantioli\r\n', 'Selesai', '0000-00-00 00:00:00', NULL),
(2, 'herman ', 'vario 125', '', 'service cvt', 'Selesai', '0000-00-00 00:00:00', NULL),
(3, 'ajat ', 'fu', '', 'ganti buso', 'Selesai', '0000-00-00 00:00:00', NULL),
(4, 'rizal', 'vario 125', '', 'ganti jok', 'Selesai', '0000-00-00 00:00:00', NULL),
(5, 'nisa ', 'bekjul', '', 'ganti ban', 'Selesai', '0000-00-00 00:00:00', NULL),
(6, 'IKI ', 'vario', '', 'mogok\r\n', '', '0000-00-00 00:00:00', NULL),
(7, 'ramlan', 'pcx', '', 'mogok', '', '0000-00-00 00:00:00', 'Asep'),
(8, 'ramlan pratama', 'beat', '', 'k', '', '0000-00-00 00:00:00', 'Asep'),
(9, 'ramlan', 'mio', '', 'mogok', '', '0000-00-00 00:00:00', 'Charlie'),
(11, 'MIFTA ', 'MIO', '', 'BAN BOCOR', 'Menunggu', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE `motor` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `antrian_servis`
--
ALTER TABLE `antrian_servis`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indeks untuk tabel `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `antrian_servis`
--
ALTER TABLE `antrian_servis`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
