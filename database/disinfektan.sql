-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Des 2021 pada 11.43
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disinfektan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `gambar` mediumblob NOT NULL,
  `folder` varchar(50) NOT NULL,
  `id_jadwal` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_disinfektan`
--

CREATE TABLE `jadwal_disinfektan` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jadwal` date DEFAULT NULL,
  `jam_range` varchar(20) DEFAULT NULL,
  `total_disinfektan` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `selesai_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_disinfektan`
--

INSERT INTO `jadwal_disinfektan` (`id`, `nama_petugas`, `jadwal`, `jam_range`, `total_disinfektan`, `created_at`, `selesai_pada`) VALUES
(34, 'Disinfektan Amburadul', '2021-11-11', '08:00-10:00', 15, '2021-12-09 23:07:03', '2021-12-09 23:07:03'),
(35, 'Agus Fahrudin', '2021-12-10', '10:00-12:00', 10, '2021-12-10 11:23:54', '2021-12-10 11:23:54'),
(36, 'Indra Rosidin', '2021-12-11', '13:00-15:00', 0, '2021-12-10 11:24:24', '2021-12-10 11:24:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `nama_user`, `password`, `level`) VALUES
(1, 'kapolr3s', 'Administrator', '$2y$10$nr/E8Smrsq6XktR3KPfa7ey8sXKLaSsLAbKQrFnZtURZjd1QHJeti', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_disinfektan`
--
ALTER TABLE `jadwal_disinfektan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_disinfektan`
--
ALTER TABLE `jadwal_disinfektan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
