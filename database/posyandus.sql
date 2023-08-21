-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2023 pada 19.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gizi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandus`
--

CREATE TABLE `posyandus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) DEFAULT NULL,
  `berat_badan` decimal(10,1) NOT NULL DEFAULT 0.0,
  `tinggi_badan` decimal(10,2) NOT NULL DEFAULT 0.00,
  `lingkaran_kepala` int(11) NOT NULL,
  `status_gizi` varchar(255) NOT NULL,
  `kalkulasi_bmi` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bmi` enum('Stunting','Normal','Obisitas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posyandus`
--

INSERT INTO `posyandus` (`id`, `child_id`, `berat_badan`, `tinggi_badan`, `lingkaran_kepala`, `status_gizi`, `kalkulasi_bmi`, `bmi`, `created_at`, `updated_at`) VALUES
(1, 1, '15.2', '0.98', 50, 'Gizi Baik', '0.35', 'Normal', '2023-08-19 17:00:00', '2023-08-20 09:54:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posyandus`
--
ALTER TABLE `posyandus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posyandus`
--
ALTER TABLE `posyandus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
