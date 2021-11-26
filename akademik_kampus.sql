-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2018 pada 06.03
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik_kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Hafid Amirudin', '085349443978', '2018-08-20 08:44:52', '2018-08-20 08:44:52'),
(3, 'Hasan Yudi', '081225699675', '2018-08-20 08:55:35', '2018-08-20 08:55:35'),
(4, 'Aries setiyawan', '081330496884', '2018-08-20 08:57:34', '2018-08-20 08:57:34'),
(5, 'Irfrans Kusmarna', '081365906700', '2018-08-20 09:13:25', '2018-08-20 09:13:25'),
(6, 'Maskur', '085646554437', '2018-08-20 09:14:16', '2018-08-20 09:14:16'),
(8, 'ajie', '085710062017', '2018-08-20 09:23:50', '2018-08-20 09:23:50'),
(9, 'Fachrizal Hasbi', '085350039922', '2018-08-20 09:33:18', '2018-08-20 09:33:18'),
(10, 'Fachrizal Hasbi', '08115534581', '2018-08-20 09:33:33', '2018-08-20 09:33:33'),
(12, 'test', '+6282283350537', '2018-08-20 09:46:50', '2018-08-20 09:46:50'),
(13, 'Karjono', '+62817831237', '2018-08-20 11:08:56', '2018-08-20 11:08:56'),
(14, 'Robby Akbar', '+6289666549850', '2018-08-20 15:19:07', '2018-08-20 15:19:07'),
(15, 'Nuris telkomsel', '+6285315990012', '2018-08-20 15:43:44', '2018-08-20 15:43:44'),
(16, 'Syahruni', '6285248931813', '2018-08-20 16:22:55', '2018-08-20 16:22:55'),
(17, 'Rudy', '+628115994545', '2018-08-20 16:46:11', '2018-08-20 16:46:11'),
(18, 'Azi', '+6281316559322', '2018-08-20 17:06:43', '2018-08-20 17:06:43'),
(19, 'Azi', '+6281316559322', '2018-08-20 17:06:49', '2018-08-20 17:06:49'),
(20, 'Hasan Yudi', '+6281225699675', '2018-08-20 17:14:59', '2018-08-20 17:14:59'),
(21, 'isbuntoro', '+628125497944', '2018-08-20 17:24:17', '2018-08-20 17:24:17'),
(22, 'Moh. Romadhon', '+6281333805506', '2018-08-20 19:08:16', '2018-08-20 19:08:16'),
(23, 'Lino oke', '+6285248487470', '2018-08-20 19:15:42', '2018-08-20 19:15:42'),
(24, 'Rudiyanto', '+6285728886160', '2018-08-20 19:57:43', '2018-08-20 19:57:43'),
(25, 'Nandang Gozali Nursambas', '+6282240891040', '2018-08-20 20:10:37', '2018-08-20 20:10:37'),
(26, 'Safaruddin', '+628113212014', '2018-08-20 20:18:34', '2018-08-20 20:18:34'),
(27, 'AHMAD ALI KHAMDANI', '+6282331050413', '2018-08-20 22:32:51', '2018-08-20 22:32:51'),
(28, 'Mahmud Zunus Amirudin', '+6281229863888', '2018-08-20 22:33:10', '2018-08-20 22:33:10'),
(29, 'Alkaaf', '+6283899499818', '2018-08-20 22:38:57', '2018-08-20 22:38:57'),
(30, 'abdulhanan', '+6283817520840', '2018-08-20 22:39:13', '2018-08-20 22:39:13'),
(31, 'M Irvan Sukandar', '+6281284565077', '2018-08-20 22:45:45', '2018-08-20 22:45:45'),
(32, 'gema', '6285776412775', '2018-08-20 22:47:05', '2018-08-20 22:47:05'),
(33, 'Sri Tanto', '+6285717499754', '2018-08-20 22:50:54', '2018-08-20 22:50:54'),
(34, 'Dedy Setiawan', '+6281274816112', '2018-08-20 22:55:02', '2018-08-20 22:55:02'),
(35, 'Jupriadi', '+6285240920009', '2018-08-20 22:57:59', '2018-08-20 22:57:59'),
(36, 'Adi Kiswanto', '6285640206067', '2018-08-20 23:08:41', '2018-08-20 23:08:41'),
(37, 'Irwan', '+6285646554437', '2018-08-20 23:10:00', '2018-08-20 23:10:00'),
(38, 'ajie', '6285710062017', '2018-08-21 03:43:10', '2018-08-21 03:43:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_dosen` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_fakultas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `kode_dosen`, `nama`, `no_hp`, `email`, `created_at`, `updated_at`, `password`, `kode_fakultas`) VALUES
('1234568', 'DRHZ', 'DURRATUL HAFIZAH M.KOM', '089699935557', 'hafizah@gmail.com', '2018-09-30 10:54:55', '2018-09-30 10:54:55', '$2y$10$m4SZeQiEMb0MTXdBLlAB9eHzXTkWRQwYfg8TCBn.BmJ.7rO/pKHva', 'IFDK'),
('12345678', 'NRSA', 'NURIS AKBAR M.KOM', '089699935552', 'nuris.akbar@gmail.com', '2018-09-30 10:54:22', '2018-09-30 10:54:22', '$2y$10$0Gg4gf1a0yYKIRKAjX8n9eS/CqhUnVH4cTlrAGflVYKpV0yPKwBMK', 'IFDK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_fakultas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
('IFDK', 'Ilmu Komputer Dan Informatika', '2018-09-30 10:49:03', '2018-09-30 10:49:03'),
('TELT', 'Teknik Elektro Dan Otomasi', '2018-09-30 11:53:36', '2018-09-30 11:53:36'),
('TMSN', 'Teknik Mesin Industri', '2018-09-30 11:53:01', '2018-09-30 11:53:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_dosen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id`, `hari`, `kode_mk`, `kode_dosen`, `jam`, `kode_jurusan`, `kode_ruangan`, `kode_tahun_akademik`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'senin', 'DB01', 'NRSA', '1', 'IFD3', 'LT101', '20181', 1, '2018-09-30 10:58:49', '2018-09-30 10:58:49'),
(2, 'senin', 'MP01', 'DRHZ', '2', 'IFD3', 'LT101', '20181', 1, '2018-09-30 10:59:09', '2018-09-30 10:59:09'),
(3, 'selasa', 'SO01', 'NRSA', '1', 'IFD3', 'LT101', '20181', 1, '2018-09-30 10:59:34', '2018-09-30 10:59:34'),
(5, 'senin', 'KSW01', 'DRHZ', '1', 'IFD3', 'LT101', '20181', 1, '2018-09-30 11:02:12', '2018-09-30 11:02:12'),
(6, 'kamis', 'RPL01', 'DRHZ', '2', 'IFD3', 'LT101', '20181', 1, '2018-09-30 11:02:31', '2018-09-30 11:02:31'),
(7, 'senin', 'WP01', 'NRSA', '1', 'IFD3', 'LT101', '20181', 1, '2018-09-30 11:07:19', '2018-09-30 11:07:19'),
(8, 'senin', 'ALG01', 'DRHZ', '1', 'IFD3', 'LBKom', '20182', 2, '2018-10-11 01:29:58', '2018-10-11 01:29:58'),
(9, 'senin', 'KCDs', 'DRHZ', '2', 'IFD3', 'LBKom', '20182', 2, '2018-10-11 01:30:10', '2018-10-11 01:30:10'),
(10, 'senin', 'TKJ01', 'DRHZ', '3', 'IFD3', 'LBKom', '20182', 2, '2018-10-11 01:30:24', '2018-10-11 01:30:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_kuliah`
--

CREATE TABLE `jam_kuliah` (
  `id` int(11) NOT NULL,
  `jam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam_kuliah`
--

INSERT INTO `jam_kuliah` (`id`, `jam`) VALUES
(1, '08:50 - 10:00'),
(2, '10:00 - 12.00'),
(3, '12.00 - 13.00'),
(4, '13.00 - 14.30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_fakultas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `kode_fakultas`, `jenjang`, `created_at`, `updated_at`) VALUES
('IFD3', 'TEKNIK INFORMATIKA D3', 'IFDK', 'd3', '2018-09-30 10:49:37', '2018-09-30 10:49:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_dosen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topik_pembahasan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `kode_mk`, `kode_dosen`, `kode_jurusan`, `kode_ruang`, `kode_tahun_akademik`, `topik_pembahasan`, `pertemuan_ke`, `created_at`, `updated_at`) VALUES
(1, 'DB01', 'NRSA', 'IFD3', 'LT101', '20181', 'Fudamental Datatabase', 1, '2018-09-30 11:11:46', '2018-09-30 11:11:46'),
(2, 'DB01', 'NRSA', 'IFD3', 'LT101', '20181', 'Belajar MySQL', 2, '2018-09-30 11:12:46', '2018-09-30 11:12:46'),
(3, 'DB01', 'NRSA', 'IFD3', 'LT101', '20181', 'Tugas MySQL', 3, '2018-09-30 11:15:24', '2018-09-30 11:15:24'),
(4, 'DB01', 'NRSA', 'IFD3', 'LT101', '20181', 'Relasi Database', 4, '2018-10-01 03:32:21', '2018-10-01 03:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `khs`
--

CREATE TABLE `khs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_kehadiran` int(11) NOT NULL,
  `kode_dosen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `khs`
--

INSERT INTO `khs` (`id`, `nim`, `kode_tahun_akademik`, `kode_mk`, `nilai_uts`, `nilai_uas`, `created_at`, `updated_at`, `nilai_tugas`, `nilai_kehadiran`, `kode_dosen`, `semester`) VALUES
(1, 'TI102132', '20181', 'DB01', 90, 90, '2018-09-30 11:08:07', '2018-09-30 11:08:07', 80, 90, 'NRSA', 1),
(2, 'TI102132', '20181', 'KSW01', 90, 90, '2018-09-30 11:08:07', '2018-09-30 11:08:07', 90, 90, 'DRHZ', 1),
(3, 'TI102132', '20181', 'MP01', 90, 90, '2018-09-30 11:08:07', '2018-09-30 11:08:07', 90, 90, 'DRHZ', 1),
(4, 'TI102132', '20181', 'RPL01', 90, 90, '2018-09-30 11:08:07', '2018-09-30 11:08:07', 9, 90, 'DRHZ', 1),
(5, 'TI102132', '20181', 'SO01', 90, 0, '2018-09-30 11:08:08', '2018-09-30 11:08:08', 89, 90, 'NRSA', 1),
(6, 'TI102132', '20181', 'WP01', 90, 90, '2018-09-30 11:08:08', '2018-09-30 11:08:08', 90, 90, 'NRSA', 1),
(7, 'TI102133', '20181', 'DB01', 89, 95, '2018-09-30 11:10:18', '2018-09-30 11:10:18', 87, 80, 'NRSA', 1),
(8, 'TI102133', '20181', 'KSW01', 90, 90, '2018-09-30 11:10:18', '2018-09-30 11:10:18', 90, 90, 'DRHZ', 1),
(9, 'TI102133', '20181', 'MP01', 90, 90, '2018-09-30 11:10:18', '2018-09-30 11:10:18', 90, 90, 'DRHZ', 1),
(10, 'TI102133', '20181', 'RPL01', 90, 90, '2018-09-30 11:10:18', '2018-09-30 11:10:18', 90, 90, 'DRHZ', 1),
(11, 'TI102133', '20181', 'SO01', 0, 0, '2018-09-30 11:10:18', '2018-09-30 11:10:18', 0, 0, 'NRSA', 1),
(12, 'TI102133', '20181', 'WP01', 0, 0, '2018-09-30 11:10:18', '2018-09-30 11:10:18', 0, 0, 'NRSA', 1),
(13, 'TI102132', '20182', 'KCDs', 80, 90, '2018-10-11 01:31:37', '2018-10-11 01:31:37', 80, 80, 'DRHZ', 2),
(14, 'TI102132', '20182', 'ALG01', 90, 90, '2018-10-11 01:31:37', '2018-10-11 01:31:37', 90, 90, 'DRHZ', 2),
(15, 'TI102132', '20182', 'TKJ01', 80, 98, '2018-10-11 01:31:37', '2018-10-11 01:31:37', 80, 80, 'DRHZ', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `kode_dosen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `kode_mk`, `kode_jurusan`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'DB01', 'IFD3', 1, '2018-09-30 10:57:40', '2018-09-30 10:57:40'),
(2, 'KSW01', 'IFD3', 1, '2018-09-30 10:57:46', '2018-09-30 10:57:46'),
(3, 'MP01', 'IFD3', 1, '2018-09-30 10:57:54', '2018-09-30 10:57:54'),
(4, 'RPL01', 'IFD3', 1, '2018-09-30 10:58:00', '2018-09-30 10:58:00'),
(5, 'SO01', 'IFD3', 1, '2018-09-30 10:58:04', '2018-09-30 10:58:04'),
(6, 'WP01', 'IFD3', 1, '2018-09-30 10:58:10', '2018-09-30 10:58:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `email`, `password`, `kode_jurusan`, `alamat`, `created_at`, `updated_at`, `kode_tahun_akademik`, `semester_aktif`) VALUES
('TI102132', 'UCI LEASTARI', 'uci@gmail.com', '$2y$10$kDBxr47hn6lL56YSyQ1XVu4Vcq9R6aqWb/.eXdhF.k5Ns1SpRIhFG', 'IFD3', 'JL PESANTREN NO 45 CIBABAT', '2018-09-30 10:50:29', '2018-09-30 10:50:29', '20181', 1),
('TI102133', 'rian apriansyah', 'rian@gmail.com', '$2y$10$tKpp6PluItcTABrmXlgQIuMUk38oi29Eq7XtTMU77DJWbh5/BqcTi', 'IFD3', 'example', '2018-09-30 10:51:15', '2018-09-30 10:51:15', '20181', 1),
('TI102134', 'Rudi Hermawan', 'rudi@gmail.com', '$2y$10$5KTUc7rShycPnUDaezgc5uKyGc8QLKE8Ls0sNMhXl8CPZzBaUgE0e', 'IFD3', 'example', '2018-09-30 10:51:42', '2018-09-30 10:51:42', '20181', 1),
('TI102135', 'Rio Satrio', 'rio@gmail.com', '$2y$10$ochHQt3MQ89xtX7bcRVmwupNaoUMxMltXjwAS.ns4IF8kBlBpUREe', 'IFD3', 'example', '2018-09-30 10:52:06', '2018-09-30 10:52:06', '20181', 1),
('TI102136', 'Dian Putri', 'dian@gmail.com', '$2y$10$mo2ItVgxbPMw6WDfaAQha.b4.VV9bPRmIhVcnL61H/Kx0FYfYpzDG', 'IFD3', 'example', '2018-09-30 10:52:35', '2018-09-30 10:52:35', '20181', 1),
('TI102137', 'Leni Apriani', 'leni@gmail.com', '$2y$10$8.WyHMwudNQKdrpNB5VDbOJVbDa/Kbeyd3e1cIsg8cZ5YJWdXaSE6', 'IFD3', 'example', '2018-09-30 10:53:00', '2018-09-30 10:53:00', '20181', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_sks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `jml_sks`, `created_at`, `updated_at`) VALUES
('ALG01', 'Algoritma Dasar', '3', '2018-10-11 01:29:24', '2018-10-11 01:29:24'),
('DB01', 'PEMOGRAMAN BASIS DATA', '3', '2018-09-30 10:56:46', '2018-09-30 10:56:46'),
('KCDs', 'Kecerdasan Buatan', '3', '2018-10-11 01:29:38', '2018-10-11 01:29:38'),
('KSW01', 'KEWIRAUSAHAAN', '2', '2018-09-30 10:57:18', '2018-09-30 10:57:18'),
('MP01', 'MOBILE PROGRAMMING', '3', '2018-09-30 10:56:17', '2018-09-30 10:56:17'),
('RPL01', 'REKAYASA PERANGKAT LUNAK', '3', '2018-09-30 10:56:56', '2018-09-30 10:56:56'),
('SO01', 'SISTEM OPERASI', '3', '2018-09-30 10:56:27', '2018-09-30 10:56:27'),
('TKJ01', 'Komputer Dan jaringan', '3', '2018-10-11 01:29:09', '2018-10-11 01:29:09'),
('WP01', 'WEB PROGRAMMING', '3', '2018-09-30 10:56:03', '2018-09-30 10:56:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_19_180421_create_table_matakuliah', 2),
(4, '2018_07_21_165939_create_dosens_table', 3),
(5, '2018_07_21_174622_create_table_fakultas', 4),
(6, '2018_07_21_182501_create_jurusans_table', 5),
(7, '2018_07_21_185846_create_ruangans_table', 6),
(8, '2018_07_21_191250_create_tahun_akademiks_table', 7),
(10, '2018_07_22_170110_create_kurikulums_table', 8),
(11, '2018_07_22_200308_create_settings_table', 9),
(13, '2018_07_23_183221_create_jadwalkuliahs_table', 10),
(14, '2018_07_24_180322_create_mahasiswas_table', 11),
(15, '2018_08_13_184050_create_krs_table', 12),
(16, '2018_08_13_195845_create_khs_table', 13),
(17, '2018_08_16_233451_add_column_password_to_dosen', 14),
(18, '2018_08_17_081930_add_tugas_kehadiran_to_khs', 15),
(19, '2018_08_17_082339_add_column_kode_dosen', 16),
(20, '2018_08_22_174121_create_kehadirans_table', 17),
(21, '2018_08_23_051021_create_kehadirans_table', 18),
(22, '2018_08_23_210906_create_table_riwayat_kehadiran', 19),
(23, '2018_09_25_001630_add_columns_to_tahun_akademik', 20),
(24, '2018_09_27_170804_add_kode_akademik_to_mahasiswa', 21),
(25, '2018_09_29_072206_add_kode_fakultas_to_dosen', 22),
(26, '2018_09_30_072620_add_semester_to_khs', 23),
(27, '2018_09_30_072651_add_semester_to_krs', 23),
(28, '2018_09_30_074221_add_kode_dosen_krs', 24),
(29, '2018_10_02_084105_add__wa_api_key_and_zenziva_to_setting', 25),
(30, '2018_10_10_232121_add_periode_isi_krs', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kehadiran`
--

CREATE TABLE `riwayat_kehadiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `kehadiran_id` int(11) NOT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kehadiran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_kehadiran`
--

INSERT INTO `riwayat_kehadiran` (`id`, `kehadiran_id`, `nim`, `status_kehadiran`, `pertemuan_ke`) VALUES
(1, 3, 'TI102132', 'H', 3),
(2, 3, 'TI102133', 'H', 3),
(3, 4, 'TI102132', 'I', 4),
(4, 4, 'TI102133', 'S', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
('LBKom', 'Lab Komputer', '2018-09-30 11:30:21', '2018-09-30 11:30:21'),
('LBTKJ', 'Lab Komputer Dan jaringan', '2018-09-30 11:30:37', '2018-09-30 11:30:37'),
('LT101', 'LT101 - Teori', '2018-09-30 10:55:27', '2018-09-30 10:55:27'),
('LT102', 'LT102  - Teori', '2018-09-30 11:30:10', '2018-09-30 11:30:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_universitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apiwha_apikey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zenziva_userkey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zenziva_passkey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_universitas`, `email`, `no_telpon`, `fax`, `web`, `alamat`, `created_at`, `updated_at`, `apiwha_apikey`, `zenziva_userkey`, `zenziva_passkey`) VALUES
(1, 'POLITEKNIK TEDC BANDUNG', 'politekniktedc@gmail.com', '0821342345', '21213333', 'http://www.poltektedc.ac.id', 'JL pesantren km 2, kelurahan cibabat, kecamatan cimahi utara', NULL, '2018-10-03 09:46:22', 'ffff', 'h8e5sg', 'yly6vqnwon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `kode_tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_awal_kuliah` date NOT NULL,
  `tanggal_akhir_kuliah` date NOT NULL,
  `tanggal_awal_uts` date NOT NULL,
  `tanggal_akhir_uts` date NOT NULL,
  `tanggal_awal_uas` date NOT NULL,
  `tanggal_akhir_uas` date NOT NULL,
  `tanggal_awal_isi_krs` date NOT NULL,
  `tanggal_akhir_isi_krs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`kode_tahun_akademik`, `tahun_akademik`, `status`, `created_at`, `updated_at`, `tanggal_awal_kuliah`, `tanggal_akhir_kuliah`, `tanggal_awal_uts`, `tanggal_akhir_uts`, `tanggal_awal_uas`, `tanggal_akhir_uas`, `tanggal_awal_isi_krs`, `tanggal_akhir_isi_krs`) VALUES
('20171', 'Tahun Akademik 2017 - 2018 Semester Ganjil', 'n', '2018-10-01 03:23:59', '2018-10-01 03:24:09', '2017-01-05', '2017-01-12', '2017-01-12', '2017-10-10', '2017-10-09', '2017-10-17', '0000-00-00', '0000-00-00'),
('20172', 'Tahun Akademik 2017 - 2018 Semester  Genap', 'n', '2018-10-01 03:25:43', '2018-10-01 03:25:51', '2017-10-12', '2017-10-10', '2017-10-11', '2017-10-09', '2017-10-10', '2017-10-16', '0000-00-00', '0000-00-00'),
('20181', '2018 - 2019 Semester Ganjil', 'n', '2018-09-30 10:47:45', '2018-10-11 01:26:10', '2018-10-01', '2018-10-31', '2018-10-01', '2018-10-31', '2018-10-01', '2018-10-01', '2018-10-13', '2018-10-31'),
('20182', '2018 - 2019 Semester genap', 'y', '2018-09-30 10:48:12', '2018-10-11 01:26:24', '2018-10-01', '2018-10-31', '2018-10-01', '2018-10-31', '2018-10-01', '2018-10-31', '2018-10-10', '2018-10-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nuris Akbar', 'nuris.akbar@gmail.com', '$2y$10$.6elVELTNaFeQMnB5fRH2O3Wn02tqVlojCsJC6BR59KMeN9AKaRYe', 'Sm6jkqQ6Pw6olJe8UfdL09fAwWIFYh3xFA42jaHE5U6PYeowJraC7qSUm85E', '2018-07-19 11:13:13', '2018-07-19 11:13:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indeks untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `riwayat_kehadiran`
--
ALTER TABLE `riwayat_kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`kode_tahun_akademik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jam_kuliah`
--
ALTER TABLE `jam_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `khs`
--
ALTER TABLE `khs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kehadiran`
--
ALTER TABLE `riwayat_kehadiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
