-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2026 at 12:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_sd`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED DEFAULT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('hadir','izin','sakit','alfa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `nomor_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_skhun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Arsip') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `kelas_tujuan_id` bigint UNSIGNED DEFAULT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikulers`
--

CREATE TABLE `ekstrakurikulers` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `master_ekstrakurikuler_id` bigint UNSIGNED DEFAULT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan_guru` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kepegawaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_ptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_ptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pengajar` enum('Wali Kelas','Guru PAI','Guru PJOK','Kepala Sekolah','Operator','Staff') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_guru` enum('Aktif','Mutasi Keluar','Pensiun') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mapel_id` bigint UNSIGNED DEFAULT NULL,
  `kelas_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajarans`
--

CREATE TABLE `jadwal_pelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED DEFAULT NULL,
  `guru_id` bigint UNSIGNED DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_ke` tinyint NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_jadwal` enum('Wajib','Kokurikuler','Kegiatan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wajib',
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jam_pelajarans`
--

CREATE TABLE `jam_pelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `tingkat` tinyint UNSIGNED NOT NULL,
  `jam_ke` tinyint UNSIGNED NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `durasi` smallint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jam_pelajarans`
--

INSERT INTO `jam_pelajarans` (`id`, `tingkat`, `jam_ke`, `jam_mulai`, `jam_selesai`, `durasi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(2, 1, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(3, 1, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(4, 1, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(5, 1, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(6, 1, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(7, 1, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(10, 2, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(11, 2, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(12, 2, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(13, 2, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(14, 2, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(15, 2, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(16, 2, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(19, 3, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(20, 3, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(21, 3, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(22, 3, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(23, 3, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(24, 3, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(25, 3, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(26, 3, 8, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(27, 3, 9, '12:15:00', '12:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(28, 4, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(29, 4, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(30, 4, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(31, 4, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(32, 4, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(33, 4, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(34, 4, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(35, 4, 8, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(36, 4, 9, '12:15:00', '12:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(37, 5, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(38, 5, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(39, 5, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(40, 5, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(41, 5, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(42, 5, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(43, 5, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(44, 5, 8, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(45, 5, 9, '12:15:00', '12:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(46, 6, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(47, 6, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(48, 6, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(49, 6, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(50, 6, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(51, 6, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(52, 6, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(53, 6, 8, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(54, 6, 9, '12:15:00', '12:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mapels`
--

CREATE TABLE `kategori_mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_mapels`
--

INSERT INTO `kategori_mapels` (`id`, `kode_kategori`, `nama_kategori`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KD01', 'Kelas 1 s.d. Kelas 6', 'Berlaku untuk kelas 1–6', 'Aktif', '2026-07-22 03:51:59', '2026-07-22 03:51:59'),
(2, 'KD02', 'Kelas 3 s.d. Kelas 6', 'Berlaku mulai kelas 3–6', 'Aktif', '2026-07-22 03:51:59', '2026-07-22 03:51:59'),
(3, 'KD03', 'Kelas 5 s.d. Kelas 6 (Non JP Wajib)', 'KKA dan Anyaman, memiliki jadwal dan nilai rapor tetapi tidak dihitung sebagai JP wajib', 'Aktif', '2026-07-22 03:51:59', '2026-07-22 03:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED DEFAULT NULL,
  `wali_kelas_id` bigint UNSIGNED DEFAULT NULL,
  `ruang_kelas` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelulusans`
--

CREATE TABLE `kelulusans` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `tanggal_kelulusan` date NOT NULL,
  `status` enum('Lulus','Belum Lulus') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Lulus',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lingkup_materis`
--

CREATE TABLE `lingkup_materis` (
  `id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `tingkat` tinyint UNSIGNED NOT NULL,
  `kode_lm` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `master_mapel_id` bigint UNSIGNED DEFAULT NULL,
  `tahun_ajaran_id` bigint UNSIGNED DEFAULT NULL,
  `kategori_mapel_id` bigint UNSIGNED DEFAULT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok` enum('Intrakurikuler','Mapel Pilihan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Wajib','Muatan Lokal','Pilihan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wajib',
  `kkm` int NOT NULL DEFAULT '75',
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guru_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `master_mapel_id`, `tahun_ajaran_id`, `kategori_mapel_id`, `kode_mapel`, `nama_mapel`, `kelompok`, `jenis`, `kkm`, `status`, `created_at`, `updated_at`, `guru_id`) VALUES
(30, 11, 4, 3, 'ANY', 'Anyaman', 'Mapel Pilihan', 'Pilihan', 75, 'Aktif', '2026-08-30 16:53:08', '2026-08-30 16:53:08', NULL),
(31, 3, 4, 1, 'BIN', 'Bahasa Indonesia', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:40:10', '2026-08-30 17:40:10', NULL),
(32, 9, 4, 2, 'BIG', 'Bahasa Inggris', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:40:21', '2026-08-30 17:40:21', NULL),
(33, 8, 4, 1, 'BSD', 'Bahasa Sunda', 'Intrakurikuler', 'Muatan Lokal', 75, 'Aktif', '2026-08-30 17:40:45', '2026-08-30 17:40:45', NULL),
(34, 5, 4, 2, 'IPAS', 'IPAS', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:40:59', '2026-08-30 17:40:59', NULL),
(35, 10, 4, 3, 'KKA', 'Koding & Kecerdasan Artifisial', 'Mapel Pilihan', 'Pilihan', 75, 'Aktif', '2026-08-30 17:41:12', '2026-08-30 17:41:12', NULL),
(37, 4, 4, 1, 'MTK', 'Matematika', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:44:11', '2026-08-30 17:44:11', NULL),
(38, 1, 4, 1, 'PAI', 'Pendidikan Agama Islam', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:45:04', '2026-08-30 17:45:04', NULL),
(39, 2, 4, 1, 'PKN', 'Pendidikan Pancasila', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:45:16', '2026-08-30 17:45:16', NULL),
(40, 6, 4, 1, 'SBK', 'Seni Budaya', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:45:32', '2026-08-30 17:45:32', NULL),
(41, 7, 4, 1, 'PJOK', 'PJOK', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-08-30 17:45:47', '2026-08-30 17:45:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_ekstrakurikulers`
--

CREATE TABLE `master_ekstrakurikulers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_ekstrakurikuler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wajib` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_ekstrakurikulers`
--

INSERT INTO `master_ekstrakurikulers` (`id`, `nama_ekstrakurikuler`, `pembina`, `wajib`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka', 'Nani', 1, 'Aktif', '2026-08-04 04:54:02', '2026-08-04 04:54:02'),
(2, 'Volly', 'Yati', 0, 'Aktif', '2026-08-04 18:53:40', '2026-08-04 18:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `master_mapels`
--

CREATE TABLE `master_mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_mapel_id` bigint UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_mapels`
--

INSERT INTO `master_mapels` (`id`, `kode_mapel`, `nama_mapel`, `kategori_mapel_id`, `jenis`, `kelompok`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PAI', 'Pendidikan Agama Islam', 1, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(2, 'PKN', 'Pendidikan Pancasila', 1, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(3, 'BIN', 'Bahasa Indonesia', 1, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(4, 'MTK', 'Matematika', 1, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(5, 'IPAS', 'IPAS', 2, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(6, 'SBK', 'Seni Budaya', 1, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(7, 'PJOK', 'PJOK', 1, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(8, 'BSD', 'Bahasa Sunda', 1, 'Muatan Lokal', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(9, 'BIG', 'Bahasa Inggris', 2, 'Wajib', 'Intrakurikuler', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(10, 'KKA', 'Koding & Kecerdasan Artifisial', 3, 'Pilihan', 'Mapel Pilihan', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10'),
(11, 'ANY', 'Anyaman', 3, 'Pilihan', 'Mapel Pilihan', 'Aktif', '2026-08-27 03:41:10', '2026-08-27 03:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2026_03_18_094320_create_gurus_table', 1),
(5, '2026_03_18_094331_create_kelas_table', 1),
(6, '2026_03_18_094343_create_siswas_table', 1),
(7, '2026_03_18_094415_create_mapels_table', 1),
(8, '2026_03_18_094424_create_tahun_ajarans_table', 1),
(9, '2026_03_18_094519_create_nilais_table', 1),
(10, '2026_03_19_035855_create_users_table', 1),
(11, '2026_04_03_045709_add_fields_to_siswas_table', 1),
(12, '2026_04_03_061918_add_detail_to_siswas_table', 1),
(13, '2026_04_04_034342_add_guru_id_to_mapels_table', 1),
(14, '2026_05_15_061602_add_fields_to_tahun_ajarans_table', 1),
(15, '2026_05_15_071703_add_tahun_ajaran_id_to_nilais_table', 1),
(16, '2026_05_15_113150_add_jenis_guru_to_users_table', 1),
(17, '2026_05_16_043101_add_semester_to_nilais_table', 1),
(18, '2026_05_16_092247_create_absensis_table', 1),
(19, '2026_05_18_225348_add_mapel_id_to_gurus_table', 1),
(20, '2026_06_03_074308_add_status_siswa_to_siswas_table', 1),
(21, '2026_06_03_101816_create_ranking_siswa_table', 1),
(22, '2026_06_04_044105_create_kelulusans_table', 1),
(23, '2026_06_04_102808_create_guru_mapel_table', 1),
(24, '2026_06_05_044819_add_mapel_id_to_absensis_table', 1),
(25, '2026_06_05_102530_add_deskripsi_to_nilais_table', 1),
(26, '2026_06_06_125717_add_biodata_to_siswas_table', 1),
(27, '2026_06_09_092359_create_rapors_table', 1),
(28, '2026_06_09_092540_create_rapor_details_table', 1),
(29, '2026_06_09_092634_create_ekstrakurikulers_table', 1),
(30, '2026_06_09_135740_add_kelas_id_to_gurus_table', 1),
(31, '2026_06_10_082246_add_capaian_to_rapor_details_table', 1),
(32, '2026_06_13_034530_create_jadwals_table', 1),
(33, '2026_07_03_042559_add_tahun_ajaran_id_to_kelas_table', 1),
(34, '2026_07_03_063145_add_tingkat_to_siswas_table', 1),
(35, '2026_07_03_074003_add_dapodik_fields_to_siswas_table', 1),
(36, '2026_07_04_055206_create_anggota_kelas_table', 2),
(37, '2026_07_05_083337_add_full_dapodik_fields_to_siswas_table', 3),
(38, '2026_07_06_064124_update_master_guru_table', 4),
(39, '2026_07_07_130428_add_status_to_kelas_table', 5),
(40, '2026_07_08_020111_add_detail_to_mapels_table', 6),
(41, '2026_07_08_040006_alter_tahun_ajarans_table', 7),
(42, '2026_07_09_015012_alter_jadwals_add_jam_ke', 8),
(43, '2026_07_10_131935_create_jam_pelajarans_table', 9),
(44, '2026_07_11_012138_create_jam_pelajarans_table', 1),
(45, '2026_07_13_015725_add_field_to_nilais_table', 10),
(46, '2026_07_21_093155_add_ruang_kelas_to_kelas_table', 11),
(48, '2026_07_22_095305_create_kategori_mapels_table', 12),
(49, '2026_07_22_105003_add_kategori_mapel_id_to_mapels_table', 13),
(50, '2026_07_23_032950_add_ruang_kelas_to_kelas_table', 14),
(51, '2026_07_23_154810_create_jadwal_pelajarans_table', 15),
(52, '2026_07_24_131638_rename_jp_to_jam_ke_in_jadwal_pelajarans', 16),
(53, '2026_07_24_151721_add_jenis_jadwal_to_jadwal_pelajarans_table', 17),
(54, '2026_07_29_110123_add_waktu_to_jadwal_pelajarans_table', 18),
(55, '2026_07_29_110244_add_nama_kegiatan_to_jadwal_pelajarans_table', 19),
(56, '2026_08_02_084128_create_lingkup_materis_table', 20),
(57, '2026_08_02_084602_create_tujuan_pembelajarans_table', 21),
(58, '2026_08_03_051812_drop_urutan_from_lingkup_materis_table', 22),
(59, '2026_08_03_110432_create_nilai_tp_table', 23),
(60, '2026_08_03_110517_add_formatif_to_nilais_table', 23),
(61, '2026_08_03_153746_add_asat_to_nilais_table', 24),
(62, '2026_08_04_093230_create_master_ekstrakurikulers_table', 24),
(63, '2026_08_04_093943_alter_ekstrakurikulers_table', 25),
(65, '2026_08_04_141507_add_deskripsi_to_tujuan_pembelajarans', 26),
(66, '2026_08_05_153447_create_nilai_asts_table', 26),
(67, '2026_08_05_154651_create_nilai_asts_details_table', 27),
(68, '2026_08_06_040102_add_catatan_guru_to_ekstrakurikulers_table', 28),
(69, '2026_08_06_065747_add_kehadiran_to_ranking_siswas_table', 29),
(70, '2026_08_06_105032_add_remedial_to_nilais_table', 30),
(71, '2026_08_06_152035_add_kelas_tujuan_id_to_anggota_kelas_table', 31),
(72, '2026_08_07_045100_update_kelulusans_table', 32),
(73, '2026_08_07_051605_add_ujian_to_nilais_table', 33),
(74, '2026_08_07_061141_create_alumnis_table', 34),
(75, '2026_08_25_035358_add_periode_sebelumnya_id_to_tahun_ajarans_table', 35),
(76, '2026_08_25_035715_add_unique_tahun_semester_to_tahun_ajarans_table', 36),
(77, '2026_08_25_061812_add_unique_identity_to_gurus_table', 37),
(78, '2026_08_25_062013_add_unique_identity_to_gurus_table', 38),
(79, '2026_08_25_094521_make_tingkat_nullable_on_siswas_table', 39),
(80, '2026_08_25_160404_add_tahun_ajaran_id_to_mapels_table', 40),
(81, '2026_08_25_160653_create_master_mapels_table', 41),
(82, '2026_08_27_021422_add_master_mapel_id_to_mapels_table', 41),
(83, '2026_08_27_034012_recreate_master_mapels_table', 42);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rata_formatif` decimal(5,2) DEFAULT '0.00',
  `asts` decimal(5,2) DEFAULT '0.00',
  `asas` decimal(5,2) DEFAULT '0.00',
  `asat` decimal(5,2) NOT NULL DEFAULT '0.00',
  `ujian_tulis` decimal(5,2) DEFAULT NULL,
  `ujian_lisan` decimal(5,2) DEFAULT NULL,
  `nilai_akhir` decimal(5,2) NOT NULL DEFAULT '0.00',
  `nilai_awal` decimal(5,2) DEFAULT NULL,
  `nilai_remedial` decimal(5,2) DEFAULT NULL,
  `tanggal_remedial` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilais_backup_sebelum_restore`
--

CREATE TABLE `nilais_backup_sebelum_restore` (
  `id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `siswa_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rata_formatif` decimal(5,2) DEFAULT '0.00',
  `asts` decimal(5,2) DEFAULT '0.00',
  `asas` decimal(5,2) DEFAULT '0.00',
  `asat` decimal(5,2) NOT NULL DEFAULT '0.00',
  `ujian_tulis` decimal(5,2) DEFAULT NULL,
  `ujian_lisan` decimal(5,2) DEFAULT NULL,
  `nilai_akhir` decimal(5,2) NOT NULL DEFAULT '0.00',
  `nilai_awal` decimal(5,2) DEFAULT NULL,
  `nilai_remedial` decimal(5,2) DEFAULT NULL,
  `tanggal_remedial` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_asts`
--

CREATE TABLE `nilai_asts` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `lingkup_materi_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_asts_details`
--

CREATE TABLE `nilai_asts_details` (
  `id` bigint UNSIGNED NOT NULL,
  `nilai_id` bigint UNSIGNED NOT NULL,
  `lingkup_materi_id` bigint UNSIGNED NOT NULL,
  `nilai` decimal(5,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tp`
--

CREATE TABLE `nilai_tp` (
  `id` bigint UNSIGNED NOT NULL,
  `nilai_id` bigint UNSIGNED NOT NULL,
  `tp_id` bigint UNSIGNED NOT NULL,
  `nilai` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranking_siswas`
--

CREATE TABLE `ranking_siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rata_rata` double NOT NULL,
  `kehadiran` decimal(5,2) NOT NULL DEFAULT '0.00',
  `ranking` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rapors`
--

CREATE TABLE `rapors` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rata_rata` decimal(5,2) NOT NULL DEFAULT '0.00',
  `ranking` int DEFAULT NULL,
  `hadir` int NOT NULL DEFAULT '0',
  `izin` int NOT NULL DEFAULT '0',
  `sakit` int NOT NULL DEFAULT '0',
  `alfa` int NOT NULL DEFAULT '0',
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `semester_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naik_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggal_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_generate` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_details`
--

CREATE TABLE `rapor_details` (
  `id` bigint UNSIGNED NOT NULL,
  `rapor_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `nilai_akhir` decimal(5,2) NOT NULL DEFAULT '0.00',
  `capaian_kompetensi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `capaian_pengetahuan` longtext COLLATE utf8mb4_unicode_ci,
  `capaian_keterampilan` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nisn` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` int DEFAULT NULL,
  `kelas_id` bigint UNSIGNED DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nipd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_orangtua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_masuk` year DEFAULT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_saudara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingkar_kepala` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jarak_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skhun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima_kps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_akta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layak_pip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_layak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `tanggal_kk` date DEFAULT NULL,
  `no_registrasi_akta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Aktif',
  `periode_sebelumnya_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajarans`
--

INSERT INTO `tahun_ajarans` (`id`, `created_at`, `updated_at`, `tahun_ajaran`, `semester`, `status`, `periode_sebelumnya_id`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(4, '2026-08-30 16:41:02', '2026-08-30 16:41:41', '2026/2027', 'Ganjil', 'Aktif', NULL, '2026-06-16', '2026-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_pembelajarans`
--

CREATE TABLE `tujuan_pembelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `lingkup_materi_id` bigint UNSIGNED NOT NULL,
  `kode_tp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tinggi` longtext COLLATE utf8mb4_unicode_ci,
  `deskripsi_rendah` longtext COLLATE utf8mb4_unicode_ci,
  `jumlah_jp` int NOT NULL,
  `urutan` int NOT NULL DEFAULT '1',
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `jenis_guru`, `mapel_id`) VALUES
(1, 'Operator', 'operator@gmail.com', NULL, '$2y$12$ezuPbBvcPI7e1kgTrZ5uUONsIKP0pju5W6.O6dNf/tQOheiS/NxeO', 'operator', NULL, '2026-07-04 03:16:47', '2026-07-03 20:26:05', NULL, NULL),
(8, 'Agam Kurnia', 'agamkurnia@sdncimanahayu.sch.id', NULL, '$2y$12$g107ZkkPLTkmLp/lpanyuueCVhNvxbMgtq.NOhROb.jXEOYrgAk2W', 'guru', NULL, '2026-07-06 04:53:15', '2026-07-06 04:53:15', NULL, NULL),
(9, 'Jajang Budiman, S.Pd', 'jajangbudiman,s.pd@sdncimanahayu.sch.id', NULL, '$2y$12$oWEog.j6V/gBSlEbFP7AwudNkKashwPft6MRh.jjeVdBzzAXCfX6e', 'Kepala Sekolah', NULL, '2026-07-06 04:53:16', '2026-07-25 03:07:16', NULL, NULL),
(10, 'Lina Mariana', 'linamariana@sdncimanahayu.sch.id', NULL, '$2y$12$ipJBm3ks7DQ/N0NNn5SprexywVKymxmJfj6q5p1wIguGt7rmu4rS2', 'guru', NULL, '2026-07-06 04:53:16', '2026-07-06 04:53:16', NULL, NULL),
(11, 'Nanang Sukmana', 'nanangsukmana@sdncimanahayu.sch.id', NULL, '$2y$12$C0TcKCrfb.xDnIj9QO5/y.SR8FeHIslJH3kus4CBmPF83l8d3iJ3O', 'guru', NULL, '2026-07-06 04:53:17', '2026-07-06 04:53:17', NULL, NULL),
(12, 'Nani Rohani', 'nanirohani@sdncimanahayu.sch.id', NULL, '$2y$12$gQAbVlKBhgRU22J0OY./i.uLOQ1MyFA5Lv.i/FXChvosv/jDcle1q', 'guru', NULL, '2026-07-06 04:53:17', '2026-07-06 04:53:17', NULL, NULL),
(13, 'Oky Pratama Ibrahim', 'okypratamaibrahim@sdncimanahayu.sch.id', NULL, '$2y$12$SATjX2YrU8onqNljb5oCcutAgiqillsqr.Zz/pEu9CES3sFEs4.Hi', 'Guru PJOK', NULL, '2026-07-06 04:53:18', '2026-07-06 04:53:18', NULL, NULL),
(14, 'Sri Eriani Pebrianti', 'srierianipebrianti@sdncimanahayu.sch.id', NULL, '$2y$12$n9MCZYirF8VNZCIVv6TSheVaAwkYCJqRSGAVp4W/jL/M/1RZhi09W', 'guru', NULL, '2026-07-06 04:53:18', '2026-07-06 04:53:18', NULL, NULL),
(15, 'Sri Mulyani', 'srimulyani@sdncimanahayu.sch.id', NULL, '$2y$12$Rc/KDg1A1CJdLMviKZRtX.hflWojvpCeRpJ5ftmy1jY0cUcUoTrRy', 'guru', NULL, '2026-07-06 04:53:19', '2026-07-06 04:53:19', NULL, NULL),
(16, 'TATI SUSANTI', 'tatisusanti@sdncimanahayu.sch.id', NULL, '$2y$12$fuRb45zKuiMgHy6FbADOZu/xfTjMqTtE9Fz8Qs4fhr4K5CIXuPYXK', 'guru', NULL, '2026-07-06 04:53:19', '2026-07-06 04:53:19', NULL, NULL),
(17, 'Ucu Nurhasanah', 'ucunurhasanah@sdncimanahayu.sch.id', NULL, '$2y$12$jtR1ds51XaWf4.ZAMGR1bOJqxa9uzKBD.7TFsu1FLpkWSWzkp6d2q', 'guru', NULL, '2026-07-06 04:53:20', '2026-07-06 04:53:20', NULL, NULL),
(18, 'Yati Sulistiasari', 'yatisulistiasari@sdncimanahayu.sch.id', NULL, '$2y$12$eOb7FOwMA5RKlWy2mYxAOelrMpc1Y4BSsdK9YZF/fQBBIo8ayj8pe', 'guru', NULL, '2026-07-06 04:53:20', '2026-07-06 04:53:20', NULL, NULL),
(19, 'Jajang Budiman, S.Pd', '6a4ba5edad050@sdncimanahayu.sch.id', NULL, '$2y$12$nFhoEvk6jjrGC8srSiOrCOVTFTbpvVlgBoy/lWnsYhTU3GUugciF2', 'guru', NULL, '2026-07-06 05:56:14', '2026-07-06 05:56:14', NULL, NULL),
(20, 'Agam Kurnia', '6a4ba5ee5d16f@sdncimanahayu.sch.id', NULL, '$2y$12$/iziWmeG.C1qydEe4kkMZOoSumZdHCRRhGjdhLTGJTTggJxWkmNUW', 'guru', NULL, '2026-07-06 05:56:15', '2026-07-06 05:56:15', NULL, NULL),
(21, 'Lina Mariana', '6a4ba5ef07f0e@sdncimanahayu.sch.id', NULL, '$2y$12$nG0GccwAP7xvelnucuAIRu/xn9rjHoxX5XM//Rw1GQXlHEIXqQeTm', 'guru', NULL, '2026-07-06 05:56:15', '2026-07-06 05:56:15', NULL, NULL),
(22, 'Nanang Sukmana', '6a4ba5efa8e7f@sdncimanahayu.sch.id', NULL, '$2y$12$U8Oi6hbQIAMWXYCOV5qryuz9wJKWkKhzFRSLQaRZA7jsy0xzbHNFS', 'guru', NULL, '2026-07-06 05:56:16', '2026-07-06 05:56:16', NULL, NULL),
(23, 'Nani Rohani', '6a4ba5f0833bd@sdncimanahayu.sch.id', NULL, '$2y$12$1FTiVRXZLUjG0.iyC7evI./kveDdDJE0ulyk/bnfwAWCMqfl/6g/i', 'guru', NULL, '2026-07-06 05:56:17', '2026-07-06 05:56:17', NULL, NULL),
(24, 'Oky Pratama Ibrahim', '6a4ba5f1351e4@sdncimanahayu.sch.id', NULL, '$2y$12$mG2ekEfh1x/S8b.sQ05Xi.mJA7W0bKWJ7nKqMfpuxBk0qLDNr7.UW', 'guru', NULL, '2026-07-06 05:56:17', '2026-07-06 05:56:17', NULL, NULL),
(25, 'Sri Eriani Pebrianti', '6a4ba5f1c6535@sdncimanahayu.sch.id', NULL, '$2y$12$AHXpDW64Kr/k6XqFg1PsFu1Gh1TrrW9RcOoh8iOvv2D7MmnSXI7yi', 'guru', NULL, '2026-07-06 05:56:18', '2026-07-06 05:56:18', NULL, NULL),
(26, 'Sri Mulyani', '6a4ba5f26d021@sdncimanahayu.sch.id', NULL, '$2y$12$fdAPzCPuCCD4cIvUQA7MSuKdydoFvCAOGmu41a4pUdI12VEsZJR8y', 'guru', NULL, '2026-07-06 05:56:19', '2026-07-06 05:56:19', NULL, NULL),
(27, 'TATI SUSANTI', '6a4ba5f3281f5@sdncimanahayu.sch.id', NULL, '$2y$12$lg3ggZXbXg38/CNauofOZeX16X26VHb69bgTWp6rebU1duxUQX.3C', 'guru', NULL, '2026-07-06 05:56:19', '2026-07-06 05:56:19', NULL, NULL),
(28, 'Ucu Nurhasanah', '6a4ba5f3adb0d@sdncimanahayu.sch.id', NULL, '$2y$12$f93EZYB3rTOyzBAI0/09nO3KG/YNjrNv0OBzrxPPE1CwPFOZAUYRa', 'Guru PAI', NULL, '2026-07-06 05:56:20', '2026-07-06 05:56:20', NULL, NULL),
(29, 'Yati Sulistiasari', '6a4ba5f45564c@sdncimanahayu.sch.id', NULL, '$2y$12$h7Cf32gZH/u99g68Uls13.6w3m/lKKp8x/PYd/rM0lpYZ5L7RZOwa', 'guru', NULL, '2026-07-06 05:56:20', '2026-07-06 05:56:20', NULL, NULL),
(31, 'Agam Kurnia', '6a4baaac968be@sdncimanahayu.sch.id', NULL, '$2y$12$8/.2QR13FkH1XLfxEdNJAeAdAH9qUJ3G/l2GArwnOLcL7igdilkeW', 'guru', NULL, '2026-07-06 06:16:29', '2026-07-06 06:16:29', NULL, NULL),
(32, 'Lina Mariana', '6a4baaad1c7ab@sdncimanahayu.sch.id', NULL, '$2y$12$ID7ep35c0uQYCH9fdhECFuNgDUuCpj6bmYjlvq4NxuFAuAx9zjYm.', 'guru', NULL, '2026-07-06 06:16:29', '2026-07-06 06:16:29', NULL, NULL),
(33, 'Nanang Sukmana', '6a4baaade0a2c@sdncimanahayu.sch.id', NULL, '$2y$12$gMmvCZxpTrwt4jcIIbqkue8A2YPA8qTWUKHpB.ZqTgTDKobbPeZjW', 'guru', NULL, '2026-07-06 06:16:30', '2026-07-06 06:16:30', NULL, NULL),
(34, 'Nani Rohani', '6a4baaae637d2@sdncimanahayu.sch.id', NULL, '$2y$12$S9S0Rme1OQJm8dxegoIdyOOa8z1u.0kG.jyrKj.CenN0BQSsYS9wW', 'guru', NULL, '2026-07-06 06:16:30', '2026-07-06 06:16:30', NULL, NULL),
(35, 'Oky Pratama Ibrahim', '6a4baaaece2f8@sdncimanahayu.sch.id', NULL, '$2y$12$ju7aeC58L9tTVkGmJn1.1O0kOFzi41BOZogVCy3hvRMf/of8hEUYu', 'guru', NULL, '2026-07-06 06:16:31', '2026-07-06 06:16:31', NULL, NULL),
(36, 'Sri Eriani Pebrianti', '6a4baaaf41ad2@sdncimanahayu.sch.id', NULL, '$2y$12$6LGIZeq6.JcRjLeOZm1bk.1C.7UJAY4BXeVRcHYsdN448oTi2BZgi', 'guru', NULL, '2026-07-06 06:16:31', '2026-07-06 06:16:31', NULL, NULL),
(37, 'Sri Mulyani', '6a4baaafd99d4@sdncimanahayu.sch.id', NULL, '$2y$12$HZRfbjY3E94XFN8v.mjeZu/RnFi7x7kUg95vQzg7DAv4T/pOudH/O', 'guru', NULL, '2026-07-06 06:16:32', '2026-07-06 06:16:32', NULL, NULL),
(38, 'TATI SUSANTI', '6a4baab0991a8@sdncimanahayu.sch.id', NULL, '$2y$12$GsNwJr9JQbh.JInT4bxYxeyWZ6fkksGSlElH5Q3YhjqXMTm4iOK7W', 'guru', NULL, '2026-07-06 06:16:34', '2026-07-06 06:16:34', NULL, NULL),
(39, 'Ucu Nurhasanah', '6a4baab234c00@sdncimanahayu.sch.id', NULL, '$2y$12$oAWWaib.MpmGW.7Q/4RFwefhMstB6kmiBwSlu9AXb1pOWUhr..7G.', 'guru', NULL, '2026-07-06 06:16:35', '2026-07-06 06:16:35', NULL, NULL),
(40, 'Yati Sulistiasari', '6a4baab306135@sdncimanahayu.sch.id', NULL, '$2y$12$cGyain6NDtaA28gC0K3m0e1z5OE5Qb./yL.p7YS0Q62DYUBCBTp5u', 'guru', NULL, '2026-07-06 06:16:35', '2026-07-06 06:16:35', NULL, NULL),
(41, 'Jajang Budiman, S.Pd', '6a4bab31d12bf@sdncimanahayu.sch.id', NULL, '$2y$12$3NX6cyoqH8CM5JUuDQhRSOPdmg.e3GpY70JU5/oy.dxz1Gfb.XIeG', 'guru', NULL, '2026-07-06 06:18:42', '2026-07-06 06:18:42', NULL, NULL),
(42, 'Agam Kurnia', '6a4bab32e4ef7@sdncimanahayu.sch.id', NULL, '$2y$12$KtOtw6urSYywMDP7rbIwe.NpOVF9AYWyXJMUHO564f/l3drKS.XC2', 'guru', NULL, '2026-07-06 06:18:43', '2026-07-06 06:18:43', NULL, NULL),
(43, 'Lina Mariana', '6a4bab337a78e@sdncimanahayu.sch.id', NULL, '$2y$12$JVc2j9sTOcUkIq2orpignuxZVbErEtboQIPl1w/8ONa4Sd/46F39K', 'guru', NULL, '2026-07-06 06:18:44', '2026-07-06 06:18:44', NULL, NULL),
(44, 'Nanang Sukmana', '6a4bab345307f@sdncimanahayu.sch.id', NULL, '$2y$12$XHrfly.5Hh4CMqxafvp2/.mgxD7CdpOJPbguP6m1dUtpzIXH/yCpi', 'guru', NULL, '2026-07-06 06:18:45', '2026-07-06 06:18:45', NULL, NULL),
(45, 'Nani Rohani', '6a4bab3513606@sdncimanahayu.sch.id', NULL, '$2y$12$e4HyJACHmX1muoJLrm.D4OH2IXJdAzJJlS11NmJwQfs7F9bTKvQcW', 'guru', NULL, '2026-07-06 06:18:45', '2026-07-06 06:18:45', NULL, NULL),
(46, 'Oky Pratama Ibrahim', '6a4bab359fd21@sdncimanahayu.sch.id', NULL, '$2y$12$VHH20HUgl0FNW3kX6ix/0OvXXUL5WFjIhZSE2tq7n3iFg.YX4NkbG', 'guru', NULL, '2026-07-06 06:18:46', '2026-07-06 06:18:46', NULL, NULL),
(47, 'Sri Eriani Pebrianti', '6a4bab363a6fe@sdncimanahayu.sch.id', NULL, '$2y$12$PeaCEWygBYF9o88L.NNOdOcZQbN9NGr7qySdUrjTdyNxCLpbDINb.', 'guru', NULL, '2026-07-06 06:18:47', '2026-07-06 06:18:47', NULL, NULL),
(48, 'Sri Mulyani', '6a4bab372bcd7@sdncimanahayu.sch.id', NULL, '$2y$12$EjQtWOMYnJJfTU9/vZSav.y1jXoUUb0cdquXlcPX7mklbCmOG3mBC', 'guru', NULL, '2026-07-06 06:18:47', '2026-07-06 06:18:47', NULL, NULL),
(49, 'TATI SUSANTI', '6a4bab37b933e@sdncimanahayu.sch.id', NULL, '$2y$12$UzErvo76o9.R5nRnyh8V9eP46dwhy9Yuii1uYpxwHU4GOsywKCJeS', 'guru', NULL, '2026-07-06 06:18:48', '2026-07-06 06:18:48', NULL, NULL),
(50, 'Ucu Nurhasanah', '6a4bab3843fb1@sdncimanahayu.sch.id', NULL, '$2y$12$FcEWyFg1V7HKPMLEzpomuelkAodBz8FfKII7JPGbRKEHcafNjU6C.', 'guru', NULL, '2026-07-06 06:18:48', '2026-07-06 06:18:48', NULL, NULL),
(51, 'Yati Sulistiasari', '6a4bab38c0d47@sdncimanahayu.sch.id', NULL, '$2y$12$jA4HvqhbkKNj.m5opUL87.w3fQI.BCz0MNE6Jt59JUKHLNi7HkyAi', 'guru', NULL, '2026-07-06 06:18:49', '2026-07-06 06:18:49', NULL, NULL),
(52, 'Jajang Budiman, S.Pd', '6a4bac750de95@sdncimanahayu.sch.id', NULL, '$2y$12$FsG78nq.pnG/w1as368qDO43br9E0oxP9B01225PD0NVc7bp5Mq2q', 'guru', NULL, '2026-07-06 06:24:08', '2026-07-06 06:24:08', NULL, NULL),
(53, 'Agam Kurnia', '6a4bac791da68@sdncimanahayu.sch.id', NULL, '$2y$12$X381wOTB7jlpoNqjIJZFduooFJA15IjeZsmOFiBHPYhBtGACS/Rqi', 'guru', NULL, '2026-07-06 06:24:16', '2026-07-06 06:24:16', NULL, NULL),
(54, 'Lina Mariana', '6a4bac804eb61@sdncimanahayu.sch.id', NULL, '$2y$12$Z8leMC6uslm5/.1EHcctZOGHx6eCdF/iQusS6mfg2me5Lyql9q1D6', 'guru', NULL, '2026-07-06 06:24:21', '2026-07-06 06:24:21', NULL, NULL),
(55, 'Nanang Sukmana', '6a4bac8580d5d@sdncimanahayu.sch.id', NULL, '$2y$12$UrtpLNFgJhdDYtNtgQWrLudasnExw6lAUlwW7QCvUEMaeL2gBV06G', 'guru', NULL, '2026-07-06 06:24:23', '2026-07-06 06:24:23', NULL, NULL),
(56, 'Nani Rohani', '6a4bac872dfd8@sdncimanahayu.sch.id', NULL, '$2y$12$mSBQXnwBqisrjBdhl6bChuEnvU03C7svo2l0W2YGAtZV7k2fNmZB6', 'guru', NULL, '2026-07-06 06:24:26', '2026-07-06 06:24:26', NULL, NULL),
(57, 'Oky Pratama Ibrahim', '6a4bac8a30567@sdncimanahayu.sch.id', NULL, '$2y$12$Um3uYEweKV5hXaB1FmPTdOpTB1c42NY.YfKa6QJOiG9DAcla.E7uK', 'guru', NULL, '2026-07-06 06:24:35', '2026-07-06 06:24:35', NULL, NULL),
(58, 'Sri Eriani Pebrianti', '6a4bac93e1320@sdncimanahayu.sch.id', NULL, '$2y$12$R4rRC4brexatImSLRWIgjORbT8X5P2/YqwbejnQaUE867Gsz6xvNG', 'guru', NULL, '2026-07-06 06:24:39', '2026-07-06 06:24:39', NULL, NULL),
(59, 'Sri Mulyani', '6a4bac972c967@sdncimanahayu.sch.id', NULL, '$2y$12$PI1vgUg1uhcUWuTmbp7zauXoAxo8W2Bwtqir37ZXbAbLq8iBrTP0u', 'guru', NULL, '2026-07-06 06:24:40', '2026-07-06 06:24:40', NULL, NULL),
(60, 'TATI SUSANTI', '6a4bac984a3af@sdncimanahayu.sch.id', NULL, '$2y$12$Fn0kQ5GOEPcgXmdotubGe.JpaLQF834iWX123Dqv5CnJcApSW.wJW', 'guru', NULL, '2026-07-06 06:24:42', '2026-07-06 06:24:42', NULL, NULL),
(61, 'Ucu Nurhasanah', '6a4bac9a34848@sdncimanahayu.sch.id', NULL, '$2y$12$VmJGJeU2pQ.THzVyu3Vm/eQ6x71RzlQDMGUGKv5YZAvbKbueuoXya', 'guru', NULL, '2026-07-06 06:24:45', '2026-07-06 06:24:45', NULL, NULL),
(62, 'Yati Sulistiasari', '6a4bac9d57c39@sdncimanahayu.sch.id', NULL, '$2y$12$u8YY1TKS8.AJs9PaMr9q/ux1dbATecs/UTggbwBVnBkS1Flp5gi0O', 'guru', NULL, '2026-07-06 06:24:46', '2026-07-06 06:24:46', NULL, NULL),
(63, 'Jajang Budiman, S.Pd', '6a4bace60e72d@sdncimanahayu.sch.id', NULL, '$2y$12$GS2XCtqGodGFVot99FT8CuGlNGML6IBWavr2x3fcsnGVuvYUfEeFW', 'guru', NULL, '2026-07-06 06:26:02', '2026-07-06 06:26:02', NULL, NULL),
(64, 'Jajang Budiman, S.Pd', '6a4bace612caf@sdncimanahayu.sch.id', NULL, '$2y$12$VzcBneQSXV4TCuteVKGQs.e2GIKHK0w2mJ4XQeQNHapCo7aCe1m42', 'guru', NULL, '2026-07-06 06:26:02', '2026-07-06 06:26:02', NULL, NULL),
(65, 'Agam Kurnia', '6a4bacea49178@sdncimanahayu.sch.id', NULL, '$2y$12$x.TrJvttX1hVvWAMvwNHp.l2VIGlqSq6CoOrKAtiOgrH9HZbhGnB6', 'guru', NULL, '2026-07-06 06:26:08', '2026-07-06 06:26:08', NULL, NULL),
(66, 'Agam Kurnia', '6a4bacea4ab3d@sdncimanahayu.sch.id', NULL, '$2y$12$zxUPqGO79Q/eEL6LrvkTGuj6X8KkiqOLL1VqcHz.HmD3/KQap0Hty', 'guru', NULL, '2026-07-06 06:26:08', '2026-07-06 06:26:08', NULL, NULL),
(67, 'Lina Mariana', '6a4bacf027bf8@sdncimanahayu.sch.id', NULL, '$2y$12$6D/mSNfIWX6MnD8SVMHcxuIT9hryTRbeP2gagQ6AOuAkDCW5VLL3m', 'guru', NULL, '2026-07-06 06:26:11', '2026-07-06 06:26:11', NULL, NULL),
(68, 'Lina Mariana', '6a4bacf037764@sdncimanahayu.sch.id', NULL, '$2y$12$LnJgwrG.hP/.mhz1iCAwT.AmHhAjv2/5vGgsa8ltFdaxJTT63SPjC', 'guru', NULL, '2026-07-06 06:26:11', '2026-07-06 06:26:11', NULL, NULL),
(69, 'Nanang Sukmana', '6a4bacf3568b0@sdncimanahayu.sch.id', NULL, '$2y$12$lkmNpSy0FntCD60oDsrVDeLdEsEamtU2ixN5M1S8MIrMapUPr3vea', 'guru', NULL, '2026-07-06 06:26:14', '2026-07-06 06:26:14', NULL, NULL),
(70, 'Nanang Sukmana', '6a4bacf393fa2@sdncimanahayu.sch.id', NULL, '$2y$12$MfPMkfz.eKTlWt7hX6SYbuaNZdw6hZl1qQC.dlLejBbPBOwv0XBUC', 'guru', NULL, '2026-07-06 06:26:15', '2026-07-06 06:26:15', NULL, NULL),
(71, 'Nani Rohani', '6a4bacf6f0fd9@sdncimanahayu.sch.id', NULL, '$2y$12$WlYF7huWAjCVAFg4d3baROsPGYti.7m01E7CrDgmp5N1cJ33fgscC', 'guru', NULL, '2026-07-06 06:26:17', '2026-07-06 06:26:17', NULL, NULL),
(72, 'Nani Rohani', '6a4bacf738ac0@sdncimanahayu.sch.id', NULL, '$2y$12$qfe5aMQtvVytZVZjOrXas.FyhLK7kBkBq18pgHLalFkbgxarxaCWK', 'guru', NULL, '2026-07-06 06:26:17', '2026-07-06 06:26:17', NULL, NULL),
(73, 'Oky Pratama Ibrahim', '6a4bacf903e81@sdncimanahayu.sch.id', NULL, '$2y$12$wEHmoRyQJ8SlybZhVN2Sq.tNVmBILOTSFEZ99mwz82joTYZ7cVvjq', 'guru', NULL, '2026-07-06 06:26:18', '2026-07-06 06:26:18', NULL, NULL),
(74, 'Oky Pratama Ibrahim', '6a4bacf942fab@sdncimanahayu.sch.id', NULL, '$2y$12$WAx3YnGZeesiMifvi9OyaeKxAV6rvmVT3i9c3jKyAP0egYwt98/VG', 'guru', NULL, '2026-07-06 06:26:19', '2026-07-06 06:26:19', NULL, NULL),
(75, 'Sri Eriani Pebrianti', '6a4bacfad9ed1@sdncimanahayu.sch.id', NULL, '$2y$12$DiC1cDSl33ksjs/KwfAp7./GDdOA/tRUjnfi0cDWqXGP3mqmorSyO', 'guru', NULL, '2026-07-06 06:26:20', '2026-07-06 06:26:20', NULL, NULL),
(76, 'Sri Eriani Pebrianti', '6a4bacfb064d0@sdncimanahayu.sch.id', NULL, '$2y$12$nkuzvrViPBGxONxQ2nMx/e.pUI0z1n4tcxN/9WDBYEs5Kb9BIfxTi', 'guru', NULL, '2026-07-06 06:26:20', '2026-07-06 06:26:20', NULL, NULL),
(77, 'Sri Mulyani', '6a4bacfc5a9c2@sdncimanahayu.sch.id', NULL, '$2y$12$IIYlVkD50wShwaBEgT0b4uun6XgHWtO.4XxH.bTUrUWpkReL06uoy', 'guru', NULL, '2026-07-06 06:26:21', '2026-07-06 06:26:21', NULL, NULL),
(78, 'Sri Mulyani', '6a4bacfc6b1e2@sdncimanahayu.sch.id', NULL, '$2y$12$x9q2UXzDuUAwcs1a/nizDupV5z8Q3NTME4akAJxGy2DbGQL7bXxMe', 'guru', NULL, '2026-07-06 06:26:21', '2026-07-06 06:26:21', NULL, NULL),
(79, 'TATI SUSANTI', '6a4bacfd564a5@sdncimanahayu.sch.id', NULL, '$2y$12$s5JZwO7Ggu4zbHz3ebAEe.WDdXOEbJ7RvayFtBQ7bae9fKQBhyh0y', 'guru', NULL, '2026-07-06 06:26:22', '2026-07-06 06:26:22', NULL, NULL),
(80, 'TATI SUSANTI', '6a4bacfd5d4d5@sdncimanahayu.sch.id', NULL, '$2y$12$FNT1RMx8ZkjaOfLz0LtCtO6mrn8ibtNXYtatFkQ/yL1UI.u6qZVoe', 'guru', NULL, '2026-07-06 06:26:22', '2026-07-06 06:26:22', NULL, NULL),
(81, 'Ucu Nurhasanah', '6a4bacfe46e38@sdncimanahayu.sch.id', NULL, '$2y$12$xHQVNoJkcnX9IeI0650Wrusp2nuwWQhVv49k0KgvKpSM6AB1rmnnO', 'guru', NULL, '2026-07-06 06:26:23', '2026-07-06 06:26:23', NULL, NULL),
(82, 'Ucu Nurhasanah', '6a4bacfe4ace4@sdncimanahayu.sch.id', NULL, '$2y$12$7MSDf8cC/8WjuT517RK/c.sAnFffk.Q7zTsEi2u/VRZaV1SW..0h6', 'guru', NULL, '2026-07-06 06:26:23', '2026-07-06 06:26:23', NULL, NULL),
(83, 'Yati Sulistiasari', '6a4bacff4996b@sdncimanahayu.sch.id', NULL, '$2y$12$HuglWET2lF5i396tCx8zEOR.ABW5hv1VeucVQZjuG3jHYnGtazq4q', 'guru', NULL, '2026-07-06 06:26:24', '2026-07-06 06:26:24', NULL, NULL),
(84, 'Yati Sulistiasari', '6a4bacff316bd@sdncimanahayu.sch.id', NULL, '$2y$12$anigLJoOSOhgyYkc/LFa8O.ekfUeqBb46yebSkjRngPYxcY0ePjOG', 'guru', NULL, '2026-07-06 06:26:24', '2026-07-06 06:26:24', NULL, NULL),
(85, 'Jajang Budiman, S.Pd', '6a4bafbd7d483@sdncimanahayu.sch.id', NULL, '$2y$12$Jvbi0lcBnTyi8/zEunxo/Os.EPF7bJLzTgO1GKjAPZtPyGI31t2mW', 'guru', NULL, '2026-07-06 06:38:07', '2026-07-06 06:38:07', NULL, NULL),
(86, 'Agam Kurnia', '6a4bafbf3835e@sdncimanahayu.sch.id', NULL, '$2y$12$dNMPSbijMqD/bQGQnWUsvexk5KiJJBaW6ZWahewZeDY3F9kTLQyt.', 'guru', NULL, '2026-07-06 06:38:08', '2026-07-06 06:38:08', NULL, NULL),
(87, 'Lina Mariana', '6a4bafc02f7da@sdncimanahayu.sch.id', NULL, '$2y$12$1yHTo5.Cue0o2iMdPxZMhuhbqJVjEV3og9HDVsvVEYFAXxUrZEj8m', 'guru', NULL, '2026-07-06 06:38:09', '2026-07-06 06:38:09', NULL, NULL),
(88, 'Nanang Sukmana', '6a4bafc146018@sdncimanahayu.sch.id', NULL, '$2y$12$4Ghs8VircpUap09jhp0PA.vtnRCskxcPLs0hnAov/3drsqWix61G6', 'guru', NULL, '2026-07-06 06:38:10', '2026-07-06 06:38:10', NULL, NULL),
(89, 'Nani Rohani', '6a4bafc20716b@sdncimanahayu.sch.id', NULL, '$2y$12$suLVQw/Tlx31OpIqG7HMdOLGCFrMLevZCxxnWtxbg5S4LW8fCecXm', 'guru', NULL, '2026-07-06 06:38:10', '2026-07-06 06:38:10', NULL, NULL),
(90, 'Oky Pratama Ibrahim', '6a4bafc2c63d0@sdncimanahayu.sch.id', NULL, '$2y$12$NYlq6o9h2F4M2QCc3icTnuyhKRIYkkaffsuosrg4NzIytEIyN/QvG', 'guru', NULL, '2026-07-06 06:38:11', '2026-07-06 06:38:11', NULL, NULL),
(91, 'Sri Eriani Pebrianti', '6a4bafc3e2608@sdncimanahayu.sch.id', NULL, '$2y$12$43nvQB1OApSdE/G7h8bAyehutxSNVKk4LhW7I7/LYrqnbw4Kt4kwW', 'guru', NULL, '2026-07-06 06:38:12', '2026-07-06 06:38:12', NULL, NULL),
(92, 'Sri Mulyani', '6a4bafc4af8ec@sdncimanahayu.sch.id', NULL, '$2y$12$ADIwQrNwuKmzcQp16JzthuUhRlY.qDhm4tmHb7GFers2YVH6O.Ksi', 'guru', NULL, '2026-07-06 06:38:13', '2026-07-06 06:38:13', NULL, NULL),
(93, 'TATI SUSANTI', '6a4bafc54f196@sdncimanahayu.sch.id', NULL, '$2y$12$CigbrcADjrJrVaparJlPyesiunUiIs6ikwnqF5empI6RGK5CWEcEC', 'guru', NULL, '2026-07-06 06:38:14', '2026-07-06 06:38:14', NULL, NULL),
(94, 'Ucu Nurhasanah', '6a4bafc655068@sdncimanahayu.sch.id', NULL, '$2y$12$KFOLN1PYqtyVT6dyzvK1FO5JZIwjKa83.wdnlHxY5H5Oq8MDzivPO', 'guru', NULL, '2026-07-06 06:38:14', '2026-07-06 06:38:14', NULL, NULL),
(95, 'Yati Sulistiasari', '6a4bafc6d02a9@sdncimanahayu.sch.id', NULL, '$2y$12$ZdUBc9N7U0z9qBMXuxbwFeze.Cq/3WtoMkS4R01jOpP8sWN9NVd8.', 'guru', NULL, '2026-07-06 06:38:15', '2026-07-06 06:38:15', NULL, NULL),
(97, 'Jajang Budiman, S.Pd', 'jajang45@sdncimanahayu.sch.id', NULL, '$2y$12$3w2zX3HB3Le90YUbTLnBHuFT3qIxfpaGkWHqHkRIPEi4cozSdh.lW', 'kepala_sekolah', NULL, '2026-07-06 06:52:34', '2026-07-15 02:50:35', NULL, NULL),
(98, 'Agam Kurnia', '6a4bb322d899d@sdncimanahayu.sch.id', NULL, '$2y$12$VvOMZRnCq1y55XULDN6SseaIU5M6R94qCHTKOOicHdhvQvuw7O7GO', 'guru', NULL, '2026-07-06 06:52:35', '2026-07-07 05:37:52', NULL, NULL),
(99, 'Lina Mariana', '6a4bb3236f335@sdncimanahayu.sch.id', NULL, '$2y$12$eYbjra/S0ViK7LIdLtF2O.eI7HNONJjf7s4rU.e7V2gxcpcic0LbK', 'guru', NULL, '2026-07-06 06:52:35', '2026-07-06 06:52:35', NULL, NULL),
(100, 'Nanang Sukmana', 'nanang@guru.sd.belajar.id', NULL, '$2y$12$RLgZ6hJ96Aj0FbR3dY5rM.2Liim5QPnc9LlImDsf99aL6pO18aRCK', 'guru', NULL, '2026-07-06 06:52:36', '2026-08-08 23:55:05', NULL, NULL),
(101, 'Nani Rohani', 'nani123@guru.sd.belajar.id', NULL, '$2y$12$9Jlu8DFCgmcBCxgmNe8G7OgUeYNirYYWbza8rJLtrM/LzoKiZgAZq', 'guru', NULL, '2026-07-06 06:52:36', '2026-08-08 23:55:34', NULL, NULL),
(102, 'Oky Pratama Ibrahim', '6a4bb324de5b3@sdncimanahayu.sch.id', NULL, '$2y$12$zHX6amJ8OvZn4QxBSdArguiOu.S9TsgOyPDSi/shaKb6yLh56qL0K', 'guru', NULL, '2026-07-06 06:52:37', '2026-07-06 06:52:37', NULL, NULL),
(103, 'Sri Eriani Pebrianti', '6a4bb3254f0c5@sdncimanahayu.sch.id', NULL, '$2y$12$bLN6gcfOv6mZcxz9hL5ZWeZexA0yxoJbjaH2f6EQxsfKhhahnbpf.', 'guru', NULL, '2026-07-06 06:52:37', '2026-07-06 06:52:37', NULL, NULL),
(104, 'Sri Mulyani', '6a4bb325b1725@sdncimanahayu.sch.id', NULL, '$2y$12$ikSCDDx65F0if8T0quHW1OQlu7lwVYkAFonE628OsAq0buFZ97TFW', 'guru', NULL, '2026-07-06 06:52:38', '2026-07-06 06:52:38', NULL, NULL),
(105, 'TATI SUSANTI', '6a4bb32630c68@sdncimanahayu.sch.id', NULL, '$2y$12$fRkBKja6.gnT7inoXvAoYehMT2GxPKcOTNngoNv1hq1gXECVFlXJO', 'guru', NULL, '2026-07-06 06:52:38', '2026-07-06 06:52:38', NULL, NULL),
(106, 'Ucu Nurhasanah', 'ucu1234@guru.sd.belajar.id', NULL, '$2y$12$kno4CtyAXTAv/3OJ8ujTOeRDATWx2ONIjfxWyLNLpRQ.pcI2GnCPy', 'guru', NULL, '2026-07-06 06:52:39', '2026-07-12 21:15:49', NULL, NULL),
(107, 'Yati Sulistiasari', 'yatisulistiasari99@guru.sd.belajar.id', NULL, '$2y$12$v3Vjy.3x6/5ACwIDWwvIxeOkdqZh7XfKbBzFqUZV3D6MoZLBX6mle', 'guru', NULL, '2026-07-06 06:52:39', '2026-07-11 20:48:58', NULL, NULL),
(108, 'NANANG SUKMANA', '6a8bc6f1074f8@sdncimanahayu.sch.id', NULL, '$2y$12$xZ.gwjLTa8MFWdJmY3gJceuK0YVgxDlVnqO55AQwpkSZp9wum7h/G', 'guru', NULL, '2026-08-23 21:22:09', '2026-08-23 21:22:09', NULL, NULL),
(109, 'RUANG 5', 'ruang5@sdncimanahayu.sch.id', NULL, '$2y$12$TeNtHPNPAaiiLgXBI0f8beViuFBlg.8WT5Y5V5EVBa3ktylYNG2nC', 'guru', NULL, '2026-08-23 21:22:09', '2026-08-23 21:22:09', NULL, NULL),
(110, 'RUANG 6', 'ruang6@sdncimanahayu.sch.id', NULL, '$2y$12$TWWsNxvDJWI.PmzqnKBT7O3PRYBFTAgAWuAUdVva7iKOjux0f7wGC', 'guru', NULL, '2026-08-23 21:22:09', '2026-08-23 21:22:09', NULL, NULL),
(111, 'RUANG 7', 'ruang7@sdncimanahayu.sch.id', NULL, '$2y$12$AfmH7jlTve.F/RWb.8zMXuKT8UhkMZUf9Hmk60KKNbSNJfAlQGrEy', 'guru', NULL, '2026-08-23 21:22:10', '2026-08-23 21:22:10', NULL, NULL),
(112, 'RUANG 8', 'ruang8@sdncimanahayu.sch.id', NULL, '$2y$12$FW1ztGMUy9sJ4xC28Ky67eAQRKbfwuVoehpOE8dZHK7tWU8l31Uiu', 'guru', NULL, '2026-08-23 21:22:10', '2026-08-23 21:22:10', NULL, NULL),
(113, 'RUANG KEPALA SEKOLAH', 'ruangkepalasekolah@sdncimanahayu.sch.id', NULL, '$2y$12$18tZjm2M51BDGA0vHoX4B.baz4WN4LEIOpL0573I9IY2KVgbSc0he', 'guru', NULL, '2026-08-23 21:22:10', '2026-08-23 21:22:10', NULL, NULL),
(114, 'RUMAH DINAS', 'rumahdinas@sdncimanahayu.sch.id', NULL, '$2y$12$TSDzR8W.QaWYzooOo4w/XuQIg45XbnXpAl8UsDBbOhfDNb/9kC7NK', 'guru', NULL, '2026-08-23 21:22:11', '2026-08-23 21:22:11', NULL, NULL),
(115, 'TOILET', 'toilet@sdncimanahayu.sch.id', NULL, '$2y$12$NG3mhA4egY8mnDBf/NoKG.GUJxqXOLoj7vTXgWQp2tWOrvpz/TIyy', 'guru', NULL, '2026-08-23 21:22:11', '2026-08-23 21:22:11', NULL, NULL),
(116, 'TOILET', '6a8bc6f35a8ea@sdncimanahayu.sch.id', NULL, '$2y$12$QX7BeF.G4d.zghkYALgsnuJoVrMij/xW9pYs3j045J7jBXGKhNNqm', 'guru', NULL, '2026-08-23 21:22:11', '2026-08-23 21:22:11', NULL, NULL),
(117, 'TOILET', '6a8bc6f39e02f@sdncimanahayu.sch.id', NULL, '$2y$12$5pc6Lh8OPHQOjWTjftpXW.ub0Ou.qyyksqwzSa93VOWnmO.c5Y0xG', 'guru', NULL, '2026-08-23 21:22:11', '2026-08-23 21:22:11', NULL, NULL),
(118, '4 B', '4b@sdncimanahayu.sch.id', NULL, '$2y$12$UQU9sIWKfmQFogagKquu6.XHejPgurau5k.gdE5doiMRaf1XI9Lga', 'guru', NULL, '2026-08-23 21:22:12', '2026-08-23 21:22:12', NULL, NULL),
(119, '5', '5@sdncimanahayu.sch.id', NULL, '$2y$12$idjUEZJutO6Og9cfrOhK5unZiyofkcm7emtVXrEOMykOkb5EoKWlW', 'guru', NULL, '2026-08-23 21:22:12', '2026-08-23 21:22:12', NULL, NULL),
(120, '6', '6@sdncimanahayu.sch.id', NULL, '$2y$12$YS/EpSWXRa09ClRPbz6XpeBNRNeZEKaO644qWqp.jHyfiej2lLKfC', 'guru', NULL, '2026-08-23 21:22:12', '2026-08-23 21:22:12', NULL, NULL),
(121, 'I A', 'ia@sdncimanahayu.sch.id', NULL, '$2y$12$wEWtwSmNu6yaEoGxW5kKTucWS/uCL40chcYKL4PvTI50toyTAheFC', 'guru', NULL, '2026-08-23 21:22:13', '2026-08-23 21:22:13', NULL, NULL),
(122, '27', '27@sdncimanahayu.sch.id', NULL, '$2y$12$WLEpMtyGMyGKclQBc8uHcOicM.JcpNABpK.09ZhIoPxnixfpkn/HG', 'guru', NULL, '2026-08-23 21:22:13', '2026-08-23 21:22:13', NULL, NULL),
(123, '21', '21@sdncimanahayu.sch.id', NULL, '$2y$12$9S/LQ8F2FQfoeLY3euW7le5iS1KY8zkQPvCSaktkdsmPbbCoMTo6e', 'guru', NULL, '2026-08-23 21:22:13', '2026-08-23 21:22:13', NULL, NULL),
(124, '30', '30@sdncimanahayu.sch.id', NULL, '$2y$12$nVD3qGFDUFSvL6Zf1XN1D.et8iA8te2YAGy/e4UlbXc/Kxi49ibkG', 'guru', NULL, '2026-08-23 21:22:13', '2026-08-23 21:22:13', NULL, NULL),
(125, '31', '31@sdncimanahayu.sch.id', NULL, '$2y$12$y0Ru0TIGI7R/Mi0nzUYe0.nwLfSGEaNOZdNTbPBw1uv.73gW9mvcK', 'guru', NULL, '2026-08-23 21:22:14', '2026-08-23 21:22:14', NULL, NULL),
(126, '33', '33@sdncimanahayu.sch.id', NULL, '$2y$12$d8beWjUKz6qTWZYwVBrmBeN.c9Y/DSPPlPbv.JbTtlqpK.ijRe0h2', 'guru', NULL, '2026-08-23 21:22:14', '2026-08-23 21:22:14', NULL, NULL),
(127, '28', '28@sdncimanahayu.sch.id', NULL, '$2y$12$Xooq3Agq17Z94qgPkxe3B.r/83okZDWQXAsiTgGzvfTzrXP6sF7DK', 'guru', NULL, '2026-08-23 21:22:14', '2026-08-23 21:22:14', NULL, NULL),
(128, '26', '26@sdncimanahayu.sch.id', NULL, '$2y$12$3iP0ZqdOW/o5vpW8XJsvJ.ko6nxrT21B.gujJRaiJ9y.9EpYYxMGm', 'guru', NULL, '2026-08-23 21:22:15', '2026-08-23 21:22:15', NULL, NULL),
(129, '45', '45@sdncimanahayu.sch.id', NULL, '$2y$12$8vP.t4kgZccT0Y9l5BcG1urUGwxw9/nluzsFoEAc6k9MsRIqgny9O', 'guru', NULL, '2026-08-23 21:22:15', '2026-08-23 21:22:15', NULL, NULL),
(130, '50', '50@sdncimanahayu.sch.id', NULL, '$2y$12$P6fvw4evzN3JLNzfilJqmesNk1rX.iGxMEVQsBJpoZ/tJ9L0UwZ9G', 'guru', NULL, '2026-08-23 21:22:15', '2026-08-23 21:22:15', NULL, NULL),
(131, 'STATUS SEKOLAH', 'statussekolah@sdncimanahayu.sch.id', NULL, '$2y$12$ri4gPzcTehRJhYRF3QVj6.j3p6wTEU59XYc41X4fx977XQvzHGxje', 'guru', NULL, '2026-08-23 21:26:34', '2026-08-23 21:26:34', NULL, NULL),
(132, 'ALAMAT SEKOLAH', 'alamatsekolah@sdncimanahayu.sch.id', NULL, '$2y$12$zwrzQspFjRScYsUiaSB73OLp5Gll6RfDSJ8R3elrtTpgdAkOFyDxK', 'guru', NULL, '2026-08-23 21:26:35', '2026-08-23 21:26:35', NULL, NULL),
(133, 'RT / RW', 'rt/rw@sdncimanahayu.sch.id', NULL, '$2y$12$rpX3p9kblTHgzO2/VUYvlu5WbalpeXbNPZaZyPyvKZK52aAi4HfP6', 'guru', NULL, '2026-08-23 21:26:35', '2026-08-23 21:26:35', NULL, NULL),
(134, 'KODE POS', 'kodepos@sdncimanahayu.sch.id', NULL, '$2y$12$5tIecKeRIUOp8VSXHQh73eR1faBxusp0Jl7fIkhKI.wUBmpLEQh0u', 'guru', NULL, '2026-08-23 21:26:35', '2026-08-23 21:26:35', NULL, NULL),
(135, 'KELURAHAN', 'kelurahan@sdncimanahayu.sch.id', NULL, '$2y$12$TiRrooae4m616bT85TLMku/cJ4p9oVbitKqYfTJF.A.NZwNuVWLOm', 'guru', NULL, '2026-08-23 21:26:35', '2026-08-23 21:26:35', NULL, NULL),
(136, 'KECAMATAN', 'kecamatan@sdncimanahayu.sch.id', NULL, '$2y$12$PCG6TDxByHLyKUw0OrtxQ.WmYr1tBkG1CHac6m2xH3/Yo9xWxHK5W', 'guru', NULL, '2026-08-23 21:26:36', '2026-08-23 21:26:36', NULL, NULL),
(137, 'KABUPATEN/KOTA', 'kabupaten/kota@sdncimanahayu.sch.id', NULL, '$2y$12$acu9BvNzsFo3229avWP0Hu4qf/ux3/1rMLKW.U12PuznAfdu6c8h.', 'guru', NULL, '2026-08-23 21:26:36', '2026-08-23 21:26:36', NULL, NULL),
(138, 'PROVINSI', 'provinsi@sdncimanahayu.sch.id', NULL, '$2y$12$JcN0vQ047sn3VU95McpCJu.b/8yxOttcKT43I1wat2e5iRc0.QU.C', 'guru', NULL, '2026-08-23 21:26:36', '2026-08-23 21:26:36', NULL, NULL),
(139, 'NEGARA', 'negara@sdncimanahayu.sch.id', NULL, '$2y$12$OeiRZd1TQ2VZtZIaCRdJNOyejE.JEAezBb1QgD1LOHALxg1kY1Nwi', 'guru', NULL, '2026-08-23 21:26:37', '2026-08-23 21:26:37', NULL, NULL),
(140, 'POSISI GEOGRAFIS', 'posisigeografis@sdncimanahayu.sch.id', NULL, '$2y$12$tAZOsVt6mHUhjDfQ92UAseaeqGRKlPi2PD2koXlwicLvjUQyrUDZ2', 'guru', NULL, '2026-08-23 21:26:37', '2026-08-23 21:26:37', NULL, NULL),
(141, 'SK PENDIRIAN SEKOLAH', 'skpendiriansekolah@sdncimanahayu.sch.id', NULL, '$2y$12$IZHJJouf0XrBNCSadvhMQOhybUOe4wWtmRarTJbfq.UldauyRGRZq', 'guru', NULL, '2026-08-23 21:26:37', '2026-08-23 21:26:37', NULL, NULL),
(142, 'TANGGAL SK PENDIRIAN', 'tanggalskpendirian@sdncimanahayu.sch.id', NULL, '$2y$12$FyedWG1G2wv.FjZUjISq1OdPBlJUmLpZJDAyrIHQoOR/VtawL1i7m', 'guru', NULL, '2026-08-23 21:26:37', '2026-08-23 21:26:37', NULL, NULL),
(143, 'STATUS KEPEMILIKAN', 'statuskepemilikan@sdncimanahayu.sch.id', NULL, '$2y$12$EdzpMK2BKzBFGh5wMTMxAu2bUi/dSJ1tv2vB.vHNWF3spetHeerdm', 'guru', NULL, '2026-08-23 21:26:38', '2026-08-23 21:26:38', NULL, NULL),
(144, 'SK IZIN OPERASIONAL', 'skizinoperasional@sdncimanahayu.sch.id', NULL, '$2y$12$Lkk1fIAarJC/4DMBbOpOD.zqZfAj3BsdJHTvBRuX96LjseudVTP7i', 'guru', NULL, '2026-08-23 21:26:38', '2026-08-23 21:26:38', NULL, NULL),
(145, 'TGL SK IZIN OPERASIONAL', 'tglskizinoperasional@sdncimanahayu.sch.id', NULL, '$2y$12$oNEd48IO17NRsA7aqKUGlu7nqMz5/mrpkMSgZ7.QY/fT4N.QGlZeC', 'guru', NULL, '2026-08-23 21:26:38', '2026-08-23 21:26:38', NULL, NULL),
(146, 'KEBUTUHAN KHUSUS DILAYANI', 'kebutuhankhususdilayani@sdncimanahayu.sch.id', NULL, '$2y$12$LIsnqJW7QKNgdVW84W.I4.1JboG3hcl.FPg/k8VtSivwgBXLlEHOK', 'guru', NULL, '2026-08-23 21:26:39', '2026-08-23 21:26:39', NULL, NULL),
(147, 'NOMOR REKENING', 'nomorrekening@sdncimanahayu.sch.id', NULL, '$2y$12$1iWnhlQLuTuz6ESJgYD.R.Npd7MMmIOMD6QJpb90XMEgQ8ZyUIpfa', 'guru', NULL, '2026-08-23 21:26:39', '2026-08-23 21:26:39', NULL, NULL),
(148, 'NAMA BANK', 'namabank@sdncimanahayu.sch.id', NULL, '$2y$12$UDvhnua0TxMaTKgrfni/yuopYcB0voR7FcxlediSeyFCN9gyqxeUa', 'guru', NULL, '2026-08-23 21:26:39', '2026-08-23 21:26:39', NULL, NULL),
(149, 'CABANG KCP/UNIT', 'cabangkcp/unit@sdncimanahayu.sch.id', NULL, '$2y$12$gFxX2gatDo.KQkxZ9n2eje965aUOCPZJlpFJQtphhurC.K1cA2pgO', 'guru', NULL, '2026-08-23 21:26:39', '2026-08-23 21:26:39', NULL, NULL),
(150, 'REKENING ATAS NAMA', 'rekeningatasnama@sdncimanahayu.sch.id', NULL, '$2y$12$wV/ZP0CglfvAFCWuPQSOEOW9Sba2hHSphHfdOW2NlD5M0qe2wO3dC', 'guru', NULL, '2026-08-23 21:26:40', '2026-08-23 21:26:40', NULL, NULL),
(151, 'MBS', 'mbs@sdncimanahayu.sch.id', NULL, '$2y$12$UACb6tqOllR2w8GXi0YwM.DzKwT18P6KMyJvPA8WzQm3OKVT5xyRq', 'guru', NULL, '2026-08-23 21:26:40', '2026-08-23 21:26:40', NULL, NULL),
(152, 'IURAN TAHUNAN', 'iurantahunan@sdncimanahayu.sch.id', NULL, '$2y$12$BeddR6uqm151DegEdyMEYOILdTa2hUL.mlRQ93htJXNVmUs9Erv02', 'guru', NULL, '2026-08-23 21:26:40', '2026-08-23 21:26:40', NULL, NULL),
(153, 'IURAN BULANAN', 'iuranbulanan@sdncimanahayu.sch.id', NULL, '$2y$12$Zwynw/pLKEj9HzRNhkB3sO6sc/V1T.B3qRsYSwQUnmqkK/njzZC5C', 'guru', NULL, '2026-08-23 21:26:41', '2026-08-23 21:26:41', NULL, NULL),
(154, 'NAMA WAJIB PAJAK', 'namawajibpajak@sdncimanahayu.sch.id', NULL, '$2y$12$gaJ4Fw83UlqdJYDyCBezneUGZKAIR08ASl8GyWSsgKh0SpL1sOalC', 'guru', NULL, '2026-08-23 21:26:41', '2026-08-23 21:26:41', NULL, NULL),
(155, 'NPWP', 'npwp@sdncimanahayu.sch.id', NULL, '$2y$12$/O3eX5Wm4S1cgS3YMQmzluw0KvFOC5jmEZEvyvHjkfUoei5PPInmq', 'guru', NULL, '2026-08-23 21:26:41', '2026-08-23 21:26:41', NULL, NULL),
(156, 'NOMOR TELEPON', 'nomortelepon@sdncimanahayu.sch.id', NULL, '$2y$12$0hzUPrpLYZts.V4H1pWkC.P2Wq2sicI5vqoJ.V2FhKdkez825SNmy', 'guru', NULL, '2026-08-23 21:26:41', '2026-08-23 21:26:41', NULL, NULL),
(157, 'NOMOR FAX', 'nomorfax@sdncimanahayu.sch.id', NULL, '$2y$12$GGiEQqIYIL3DvaIeLxN0VObrg87zvchAdOwYdwXSjBSP3/GH4k5eG', 'guru', NULL, '2026-08-23 21:26:42', '2026-08-23 21:26:42', NULL, NULL),
(158, 'EMAIL', 'email@sdncimanahayu.sch.id', NULL, '$2y$12$Eu.t36iUSQPNhD4ZfD5YfOKRNrxkD6fhAMCWsNx8lRwPWjKV3EoWK', 'guru', NULL, '2026-08-23 21:26:42', '2026-08-23 21:26:42', NULL, NULL),
(159, 'WEBSITE', 'website@sdncimanahayu.sch.id', NULL, '$2y$12$GdaHhEJmkrfJiEPSG9IcVuwBgYp46yJ/01.BW06zLPgizGc6.RoN.', 'guru', NULL, '2026-08-23 21:26:42', '2026-08-23 21:26:42', NULL, NULL),
(160, 'WAKTU PENYELENGGARAAN', 'waktupenyelenggaraan@sdncimanahayu.sch.id', NULL, '$2y$12$1NNIKEP4GzQ8L2jH0bsGke7fUMjGzDCiHPOpmKW38jvqj8UmeruPS', 'guru', NULL, '2026-08-23 21:26:43', '2026-08-23 21:26:43', NULL, NULL),
(161, 'BERSEDIA MENERIMA BOS?', 'bersediamenerimabos?@sdncimanahayu.sch.id', NULL, '$2y$12$gfBdDzm0qlI3O71jzfPIHuWKSQfIFKgcQKIYh8x0wOlBqxtdgXEHq', 'guru', NULL, '2026-08-23 21:26:43', '2026-08-23 21:26:43', NULL, NULL),
(162, 'SERTIFIKASI ISO', 'sertifikasiiso@sdncimanahayu.sch.id', NULL, '$2y$12$YnpU5wK52DDOwmRmQQk5YOFcU.eTHQaMZNbXK81kWEGlAszsn1YQS', 'guru', NULL, '2026-08-23 21:26:43', '2026-08-23 21:26:43', NULL, NULL),
(163, 'SUMBER LISTRIK', 'sumberlistrik@sdncimanahayu.sch.id', NULL, '$2y$12$rubcB1nLbpE8tlHnqKzFL.dtzhnq7baV8x8797OAdTE2prH1i5Mdm', 'guru', NULL, '2026-08-23 21:26:44', '2026-08-23 21:26:44', NULL, NULL),
(164, 'TOTAL DAYA LISTRIK (WATT)', 'totaldayalistrik(watt)@sdncimanahayu.sch.id', NULL, '$2y$12$N5017m.et2dVs8fgh.qNuO0ovblm4T8WuWmRecn4eKbnX9UODC0FW', 'guru', NULL, '2026-08-23 21:26:44', '2026-08-23 21:26:44', NULL, NULL),
(165, 'AKSES INTERNET', 'aksesinternet@sdncimanahayu.sch.id', NULL, '$2y$12$GceQwLDUlMQNwKl0lVgBT.YiBSxnsHieo0lcUm0oy93X2F5zS2hpG', 'guru', NULL, '2026-08-23 21:26:44', '2026-08-23 21:26:44', NULL, NULL),
(166, 'SUMBER AIR', 'sumberair@sdncimanahayu.sch.id', NULL, '$2y$12$4v6ycvD49H5ejBil7sePSeXSUPzm7XnlteDwyuuYPFo0FGz4pgXde', 'guru', NULL, '2026-08-23 21:26:44', '2026-08-23 21:26:44', NULL, NULL),
(167, 'SUMBER AIR MINUM', 'sumberairminum@sdncimanahayu.sch.id', NULL, '$2y$12$58dG6q3OvNFb6UM/1wAtj.y9GNVgBUtble0ZJAz1Ry8rtAE9QDpn2', 'guru', NULL, '2026-08-23 21:26:45', '2026-08-23 21:26:45', NULL, NULL),
(168, 'KECUKUPAN AIR BERSIH', 'kecukupanairbersih@sdncimanahayu.sch.id', NULL, '$2y$12$l/e95.JQ0iIQM.6bT88vReuzoo8JTVLcxE8qPvvXwJo6gULoU1Jr6', 'guru', NULL, '2026-08-23 21:26:45', '2026-08-23 21:26:45', NULL, NULL),
(169, 'SEKOLAH MENYEDIAKAN JAMBAN YANG DILENGKAPI DENGAN FASILITAS PENDUKUNG UNTUK DIGUNAKAN OLEH SISWA BERKEBUTUHAN KHUSUS', 'sekolahmenyediakanjambanyangdilengkapidenganfasilitaspendukunguntukdigunakanolehsiswaberkebutuhankhusus@sdncimanahayu.sch.id', NULL, '$2y$12$okW46GWqmnb5Tjg6ndjn/.r4afBB83xeu768BBW5kuBmOjA7hfL6e', 'guru', NULL, '2026-08-23 21:26:45', '2026-08-23 21:26:45', NULL, NULL),
(170, 'TIPE JAMBAN', 'tipejamban@sdncimanahayu.sch.id', NULL, '$2y$12$DR3ZWYUga8Nf2YwoJdeF9OCI.YYN.x9i0DY0ipmA6HkeDr.7wJRcy', 'guru', NULL, '2026-08-23 21:26:46', '2026-08-23 21:26:46', NULL, NULL),
(171, 'SEKOLAH MENYEDIAKAN PEMBALUT CADANGAN', 'sekolahmenyediakanpembalutcadangan@sdncimanahayu.sch.id', NULL, '$2y$12$PO4spdgd.QOhssSSyAnmwecHb.NTleibP7DJMDb0we5ixhTLvrYRm', 'guru', NULL, '2026-08-23 21:26:46', '2026-08-23 21:26:46', NULL, NULL),
(172, 'JUMLAH HARI DALAM SEMINGGU SISWA MENGIKUTI KEGIATAN CUCI TANGAN BERKELOMPOK', 'jumlahharidalamseminggusiswamengikutikegiatancucitanganberkelompok@sdncimanahayu.sch.id', NULL, '$2y$12$6HXaHhTI4YuqNyePGVAVOOCkqWVKShHIvYjjdS5z1H8glELZHsM6W', 'guru', NULL, '2026-08-23 21:26:46', '2026-08-23 21:26:46', NULL, NULL),
(173, 'JUMLAH TEMPAT CUCI TANGAN', 'jumlahtempatcucitangan@sdncimanahayu.sch.id', NULL, '$2y$12$7ISp.WXVowO5ellKCnxjyeyXLygQfZD/lsp/.47NgRaq03fhPp2TG', 'guru', NULL, '2026-08-23 21:26:47', '2026-08-23 21:26:47', NULL, NULL),
(174, 'JUMLAH TEMPAT CUCI TANGAN RUSAK', 'jumlahtempatcucitanganrusak@sdncimanahayu.sch.id', NULL, '$2y$12$N7fX319WnT3jK5Z07BWtgODuXSG3kbVMgtVPqtkvwPNBYZCrLcZL.', 'guru', NULL, '2026-08-23 21:26:47', '2026-08-23 21:26:47', NULL, NULL),
(175, 'APAKAH SABUN DAN AIR MENGALIR PADA TEMPAT CUCI TANGAN', 'apakahsabundanairmengalirpadatempatcucitangan@sdncimanahayu.sch.id', NULL, '$2y$12$YK9KmnLIhAyDilSjbeQ4pOFLW9xkojqGnqHJeIq1CsWt4SZJrijIi', 'guru', NULL, '2026-08-23 21:26:47', '2026-08-23 21:26:47', NULL, NULL),
(176, 'SEKOLAH MEMIIKI SALURAN PEMBUANGAN AIR LIMBAH DARI JAMBAN', 'sekolahmemiikisaluranpembuanganairlimbahdarijamban@sdncimanahayu.sch.id', NULL, '$2y$12$p/kqGxiCOPi60WXVfFgkYOM/PEx70LauJyN7P1PtiAI0L1PL1/D4S', 'guru', NULL, '2026-08-23 21:26:48', '2026-08-23 21:26:48', NULL, NULL),
(177, 'SEKOLAH PERNAH MENGURAS TANGKI SEPTIK DALAM 3 HINGGA 5 TAHUN TERAKHIR DENGAN TRUK/MOTOR SEDOT TINJA', 'sekolahpernahmengurastangkiseptikdalam3hingga5tahunterakhirdengantruk/motorsedottinja@sdncimanahayu.sch.id', NULL, '$2y$12$cUdcuwwlMAnxOPW9VW9jlefYNv8eIgx42DaG0mczfS8sDvnDnT7Lu', 'guru', NULL, '2026-08-23 21:26:48', '2026-08-23 21:26:48', NULL, NULL),
(178, 'SEKOLAH MEMILIKI SELOKAN UNTUK MENGHINDARI GENANGAN AIR', 'sekolahmemilikiselokanuntukmenghindarigenanganair@sdncimanahayu.sch.id', NULL, '$2y$12$tmLnBS7QUEQFqI1YDnStxO5k.nfxDWnhJlBj3EpCsLDV1okocxtQa', 'guru', NULL, '2026-08-23 21:26:48', '2026-08-23 21:26:48', NULL, NULL),
(179, 'SEKOLAH MENYEDIAKAN TEMPAT SAMPAH DI SETIAP RUANG KELAS (SESUAI PERMENDIKBUD TENTANG STANDAR SARPRAS)', 'sekolahmenyediakantempatsampahdisetiapruangkelas(sesuaipermendikbudtentangstandarsarpras)@sdncimanahayu.sch.id', NULL, '$2y$12$.6MQwQfhY/u5xPC0mDXJkuRKst55SXUVdLf7Sp9L9mshFXndGUHrO', 'guru', NULL, '2026-08-23 21:26:49', '2026-08-23 21:26:49', NULL, NULL),
(180, 'SEKOLAH MENYEDIAKAN TEMPAT SAMPAH TERTUTUP DI SETIAP UNIT JAMBAN PEREMPUAN', 'sekolahmenyediakantempatsampahtertutupdisetiapunitjambanperempuan@sdncimanahayu.sch.id', NULL, '$2y$12$6mcljyNH6UPqb6BEtfqshu0/TEcclu0VqB/CfGierVZ0Pwi/vfanS', 'guru', NULL, '2026-08-23 21:26:49', '2026-08-23 21:26:49', NULL, NULL),
(181, 'SEKOLAH MENYEDIAKAN CERMIN DI SETIAP UNIT JAMBAN PEREMPUAN', 'sekolahmenyediakancermindisetiapunitjambanperempuan@sdncimanahayu.sch.id', NULL, '$2y$12$vzNKfOUTcJU7dmqoBkkwq.LbkhQkBAXLLmwD7Lq3WW2ZUrJJ12LTi', 'guru', NULL, '2026-08-23 21:26:49', '2026-08-23 21:26:49', NULL, NULL),
(182, 'SEKOLAH MEMILIKI TEMPAT PEMBUANGAN SAMPAH SEMENTARA (TPS) YANG TERTUTUP', 'sekolahmemilikitempatpembuangansampahsementara(tps)yangtertutup@sdncimanahayu.sch.id', NULL, '$2y$12$9uisMYIhPOmWSNYPY8tRBO/R9eSjl/W0MTL.IPYpjDTIR6/G5cjnq', 'guru', NULL, '2026-08-23 21:26:50', '2026-08-23 21:26:50', NULL, NULL),
(183, 'SAMPAH DARI TEMPAT PEMBUANGAN SAMPAH SEMENTARA DIANGKUT SECARA RUTIN', 'sampahdaritempatpembuangansampahsementaradiangkutsecararutin@sdncimanahayu.sch.id', NULL, '$2y$12$KtSn4tzr0SLSnEHJGNz5Xui9jAMTcXJY/dkspe3uv2mE8jtBw8t1u', 'guru', NULL, '2026-08-23 21:26:50', '2026-08-23 21:26:50', NULL, NULL),
(184, 'ADA PERENCANAAN DAN PENGANGGARAN UNTUK KEGIATAN PEMELIHARAAN DAN PERAWATAN SANITASI SEKOLAH', 'adaperencanaandanpenganggaranuntukkegiatanpemeliharaandanperawatansanitasisekolah@sdncimanahayu.sch.id', NULL, '$2y$12$OMRIjVsaIYDVrM56YeQWNeixtN7ypqzLZYE7W2fRdaPH8zHyEDs1C', 'guru', NULL, '2026-08-23 21:26:50', '2026-08-23 21:26:50', NULL, NULL),
(185, 'ADA KEGIATAN RUTIN UNTUK MELIBATKAN SISWA UNTUK MEMELIHARA DAN MERAWAT FASILITAS SANITASI DI SEKOLAH', 'adakegiatanrutinuntukmelibatkansiswauntukmemeliharadanmerawatfasilitassanitasidisekolah@sdncimanahayu.sch.id', NULL, '$2y$12$hSCubYVM8mfOvXKfqKsHjeU1pFXPFou72TeP0rSv3XtDJH/MXSbeS', 'guru', NULL, '2026-08-23 21:26:51', '2026-08-23 21:26:51', NULL, NULL),
(186, 'ADA KEMITRAAN DENGAN PIHAK LUAR UNTUK SANITASI SEKOLAH', 'adakemitraandenganpihakluaruntuksanitasisekolah@sdncimanahayu.sch.id', NULL, '$2y$12$y926Q5SNvjdjzb4MWCKmVuJsgutFhe9VfyhpYGo9f3LJydX8IreL2', 'guru', NULL, '2026-08-23 21:26:51', '2026-08-23 21:26:51', NULL, NULL),
(187, 'JUMLAH JAMBAN DAPAT DIGUNAKAN', 'jumlahjambandapatdigunakan@sdncimanahayu.sch.id', NULL, '$2y$12$xPtP48Tc4EujFoHfFeLcjeMyGzOMCr1z68ZTbytrQFwQ1wvTaOLDy', 'guru', NULL, '2026-08-23 21:26:52', '2026-08-23 21:26:52', NULL, NULL),
(188, 'JUMLAH JAMBAN TIDAK DAPAT DIGUNAKAN', 'jumlahjambantidakdapatdigunakan@sdncimanahayu.sch.id', NULL, '$2y$12$.Bn15/C448/aQtW8fBrii.yCTPKYCUmkfkj.5pwH45cEAOgU4zkX.', 'guru', NULL, '2026-08-23 21:26:52', '2026-08-23 21:26:52', NULL, NULL),
(189, 'VARIABEL', 'variabel@sdncimanahayu.sch.id', NULL, '$2y$12$LK.t0IRdm7vf1pi8/cUgxuWqbLZoqVIgRSrZlwZvQuX2YqsAnNxn6', 'guru', NULL, '2026-08-23 21:26:53', '2026-08-23 21:26:53', NULL, NULL),
(190, 'CUCI TANGAN PAKAI SABUN', 'cucitanganpakaisabun@sdncimanahayu.sch.id', NULL, '$2y$12$GraFG09uqVqNL4li8.sprO4Xk.VQqSayfmGidn3aQiwtjlmcFTgz6', 'guru', NULL, '2026-08-23 21:26:53', '2026-08-23 21:26:53', NULL, NULL),
(191, 'KEBERSIHAN DAN KESEHATAN', 'kebersihandankesehatan@sdncimanahayu.sch.id', NULL, '$2y$12$uYtBfFnwU697VtbPx/Er/u4SL5hZBGEsVY7.IINSUzhHx5RfeZBAO', 'guru', NULL, '2026-08-23 21:26:53', '2026-08-23 21:26:53', NULL, NULL),
(192, 'PEMELIHARAAN DAN PERAWATAN TOILET', 'pemeliharaandanperawatantoilet@sdncimanahayu.sch.id', NULL, '$2y$12$zLK4WWjjjc4x58UF/P9eOOIL8yWKsDiMTptH.vGo2Byy/xkVFI0y.', 'guru', NULL, '2026-08-23 21:26:54', '2026-08-23 21:26:54', NULL, NULL),
(193, 'KEAMANAN PANGAN', 'keamananpangan@sdncimanahayu.sch.id', NULL, '$2y$12$vFmEjTBO8t79EOFCIQzwFe1BeAREt3Fr4q5gTfOi1bICLoMCeFIU.', 'guru', NULL, '2026-08-23 21:26:54', '2026-08-23 21:26:54', NULL, NULL),
(194, 'AYO MINUM AIR', 'ayominumair@sdncimanahayu.sch.id', NULL, '$2y$12$111..4YP6D6zgKhsXeoeD./M2Z1lOYnIIhOzv.RynHorGapPWmrJq', 'guru', NULL, '2026-08-23 21:26:55', '2026-08-23 21:26:55', NULL, NULL),
(195, 'NANANG SUKMANA', '6a8bc80f23065@sdncimanahayu.sch.id', NULL, '$2y$12$f3hF73snxesEf74k7W/AxuNaagcccA9twNRj.CPjQT.Uq1Du8ZUIO', 'guru', NULL, '2026-08-23 21:26:55', '2026-08-23 21:26:55', NULL, NULL),
(196, 'PEREMPUAN', 'perempuan@sdncimanahayu.sch.id', NULL, '$2y$12$l64bVnmduJq8zUPDBLv0Le4HQ1FKsEhP4OLZbZqUlfPj/IEoCc8ya', 'guru', NULL, '2026-08-23 21:26:56', '2026-08-23 21:26:56', NULL, NULL),
(197, '138', '138@sdncimanahayu.sch.id', NULL, '$2y$12$iLFzg8IG8ASllFSNEmRJ9eUVesWr.Vlay9pBnyoE7fs8XbPDfILtS', 'guru', NULL, '2026-08-23 21:26:56', '2026-08-23 21:26:56', NULL, NULL),
(198, 'L', 'l@sdncimanahayu.sch.id', NULL, '$2y$12$iXY5NdsRzEhp/BxuMBkakOCmbgp2L4K9SdIorhXcnElV06/G6KpAS', 'guru', NULL, '2026-08-23 21:26:56', '2026-08-23 21:26:56', NULL, NULL),
(199, '147', '147@sdncimanahayu.sch.id', NULL, '$2y$12$oL9D92OBvZ55Bb7HcPogEuoupWReiCGSYDrJz3wKYilpT8KU/e2LS', 'guru', NULL, '2026-08-23 21:26:57', '2026-08-23 21:26:57', NULL, NULL),
(200, '4', '4@sdncimanahayu.sch.id', NULL, '$2y$12$6aFAWwpQF1VUnffu9JrA1uQg6ceNcxp5rECA4zgYjGz7cVkDSynJm', 'guru', NULL, '2026-08-23 21:26:57', '2026-08-23 21:26:57', NULL, NULL),
(201, '151', '151@sdncimanahayu.sch.id', NULL, '$2y$12$2EH.REfCvYFSGB.dyJ7Qd.xrWkEQ2l/H/1SUMbsroTEeqU6R48ZHy', 'guru', NULL, '2026-08-23 21:26:58', '2026-08-23 21:26:58', NULL, NULL),
(202, 'L', '6a8bc8122db7a@sdncimanahayu.sch.id', NULL, '$2y$12$SX7LFlxvEMqyuJttyVgJ8ejH0giKfHvszy9lohw14Ur3sCcSUB/Ry', 'guru', NULL, '2026-08-23 21:26:58', '2026-08-23 21:26:58', NULL, NULL),
(203, '151', '6a8bc8127bbea@sdncimanahayu.sch.id', NULL, '$2y$12$.gRcjbYc5vktfROVndQUwe4tJitzxsgcoXFnjPphFLiRr8Ip8SYke', 'guru', NULL, '2026-08-23 21:26:58', '2026-08-23 21:26:58', NULL, NULL),
(204, '151', '6a8bc812c260c@sdncimanahayu.sch.id', NULL, '$2y$12$4GUuzKxVeLSkgRj3nHrrG.r1QUTJLpul8jINjP.VxQlHeDIM8E/VC', 'guru', NULL, '2026-08-23 21:26:59', '2026-08-23 21:26:59', NULL, NULL),
(205, '2 A', '2a@sdncimanahayu.sch.id', NULL, '$2y$12$gn8x/h2Y8qqOtLp7pJhgWedTXUB1QUd.y758lk8EZKsKONFOqrqJm', 'guru', NULL, '2026-08-23 21:26:59', '2026-08-23 21:26:59', NULL, NULL),
(206, '2 B', '2b@sdncimanahayu.sch.id', NULL, '$2y$12$q7mubGGVSyyNL4XctHv5OuN5K37eDV.SwtCPXLlXlkiGoWeYxgy36', 'guru', NULL, '2026-08-23 21:26:59', '2026-08-23 21:26:59', NULL, NULL),
(207, '3', '3@sdncimanahayu.sch.id', NULL, '$2y$12$zcJ03d5Rf2k4qCrdHTiR9.beSzw.WlV7.LHU4cgCjaX3P2Rubn6iC', 'guru', NULL, '2026-08-23 21:26:59', '2026-08-23 21:26:59', NULL, NULL),
(208, '4 A', '4a@sdncimanahayu.sch.id', NULL, '$2y$12$9UBio4/QV6FaeYlL6dmFhuyixJN3.LYDsP2KJDvA1n45OLXB/9JfO', 'guru', NULL, '2026-08-23 21:27:00', '2026-08-23 21:27:00', NULL, NULL),
(209, 'RUANG 1', 'ruang1@sdncimanahayu.sch.id', NULL, '$2y$12$NAartJJ00YaUshAOpSx0qua0nmhqiLqBRjx.bOaPHbCbzoeWTZx3y', 'guru', NULL, '2026-08-23 21:27:00', '2026-08-23 21:27:00', NULL, NULL),
(210, 'RUANG 2', 'ruang2@sdncimanahayu.sch.id', NULL, '$2y$12$QJzUVLr7ipa.9Nc0XVj.0OzO05jW8dh0Als0shH83E/SaCIuPxYDC', 'guru', NULL, '2026-08-23 21:27:00', '2026-08-23 21:27:00', NULL, NULL),
(211, 'RUANG 3', 'ruang3@sdncimanahayu.sch.id', NULL, '$2y$12$cM60PQiT5rq8Hd0YMcOUAuvyQw.OK6Rdw7eP5SzJewF5GrO4X3yRG', 'guru', NULL, '2026-08-23 21:27:01', '2026-08-23 21:27:01', NULL, NULL),
(212, 'RUANG 4', 'ruang4@sdncimanahayu.sch.id', NULL, '$2y$12$0tQs2vfwMoUUXBhd6ErRFuRnlQX3YtNJV3HSF5IhXFlYsFFYRAUUK', 'guru', NULL, '2026-08-23 21:27:01', '2026-08-23 21:27:01', NULL, NULL),
(213, 'RUANG 5', '6a8bc8159aeff@sdncimanahayu.sch.id', NULL, '$2y$12$AnLTG8kEXj/h3EAZs/fXruECRifFp0rpqpzqgi400Ml.mDp9cxQpC', 'guru', NULL, '2026-08-23 21:27:01', '2026-08-23 21:27:01', NULL, NULL),
(214, 'RUANG 6', '6a8bc815e6785@sdncimanahayu.sch.id', NULL, '$2y$12$quBFWvPgRQCvpsLKUIY1vuN9VBx0eg6VGoQqpmj7drNaPrAP49XS6', 'guru', NULL, '2026-08-23 21:27:02', '2026-08-23 21:27:02', NULL, NULL),
(215, 'RUANG 7', '6a8bc81641019@sdncimanahayu.sch.id', NULL, '$2y$12$noybtag8n58oVUkyfoPAneEtcKc9fFaePhQQ3nmEMovvNWMPpBlAi', 'guru', NULL, '2026-08-23 21:27:02', '2026-08-23 21:27:02', NULL, NULL),
(216, 'RUANG 8', '6a8bc8168f7f6@sdncimanahayu.sch.id', NULL, '$2y$12$MQTUAhODzDF9DT0YPeTMseByq0bxv6UR7NEG/k18f/64kT4G0mgi6', 'guru', NULL, '2026-08-23 21:27:02', '2026-08-23 21:27:02', NULL, NULL),
(217, 'RUANG KEPALA SEKOLAH', '6a8bc816db952@sdncimanahayu.sch.id', NULL, '$2y$12$ioyD9iPxlScivt7jqAnx3.jL5ysIWp3XGtEfOmFScb.v6PCKMcWpe', 'guru', NULL, '2026-08-23 21:27:03', '2026-08-23 21:27:03', NULL, NULL),
(218, 'RUMAH DINAS', '6a8bc81732a70@sdncimanahayu.sch.id', NULL, '$2y$12$d7Zqy0uXR3CzKHnXfo32zehz30heKCx1JbIK0YE9wCPa6XzwBURey', 'guru', NULL, '2026-08-23 21:27:03', '2026-08-23 21:27:03', NULL, NULL),
(219, 'TOILET', '6a8bc8177c945@sdncimanahayu.sch.id', NULL, '$2y$12$GZHgEZfSXYV3FHBruSQp5OxULfljtQ3KvsVMGnCeq9SNYFEN4Hume', 'guru', NULL, '2026-08-23 21:27:03', '2026-08-23 21:27:03', NULL, NULL),
(220, 'TOILET', '6a8bc817c5119@sdncimanahayu.sch.id', NULL, '$2y$12$WDzBBS/j4WEzlLbJufJgBefTf7AL.6wBxHA5MrEiOFKlXs389TESu', 'guru', NULL, '2026-08-23 21:27:04', '2026-08-23 21:27:04', NULL, NULL),
(221, 'TOILET', '6a8bc8181e3c2@sdncimanahayu.sch.id', NULL, '$2y$12$GPdCBhFWX7JbWPQtCGbuhOilvcpHUl7LsqaP0Ts0gZdIVIpAWhDMW', 'guru', NULL, '2026-08-23 21:27:04', '2026-08-23 21:27:04', NULL, NULL),
(222, 'TEMPAT SAMPAH', 'tempatsampah@sdncimanahayu.sch.id', NULL, '$2y$12$pdDX9CyXrPCjvZZ7Ws1h4u1P/VT4T7ONs91Gdb2EAH/d4aMxibnCW', 'guru', NULL, '2026-08-23 21:27:04', '2026-08-23 21:27:04', NULL, NULL),
(223, 'MEJA SISWA', 'mejasiswa@sdncimanahayu.sch.id', NULL, '$2y$12$ISWcxPBjTWCyzkN8I0PXh.zDAk0Ry4WH9j3E6nVjm5MGLEdobwAme', 'guru', NULL, '2026-08-23 21:27:05', '2026-08-23 21:27:05', NULL, NULL),
(224, 'KURSI SISWA', 'kursisiswa@sdncimanahayu.sch.id', NULL, '$2y$12$RMDFSo.eFst.LmXb/qttTuHxHS1l0ZcnlWL/Ny9ECmUNd0zzedR0G', 'guru', NULL, '2026-08-23 21:27:05', '2026-08-23 21:27:05', NULL, NULL),
(225, 'KURSI SISWA', '6a8bc8198d6f6@sdncimanahayu.sch.id', NULL, '$2y$12$Jk.XaNaK04kuizDDo049TetJAbwHjSf3LUvM3f5MYcHZDQyb94C42', 'guru', NULL, '2026-08-23 21:27:05', '2026-08-23 21:27:05', NULL, NULL),
(226, 'KURSI SISWA', '6a8bc819dce38@sdncimanahayu.sch.id', NULL, '$2y$12$m40UFW5cwsItnsPw8pkF1uLE4gZNM1a/NI5G8QnAej.5A.tyCAMrO', 'guru', NULL, '2026-08-23 21:27:06', '2026-08-23 21:27:06', NULL, NULL),
(227, 'TEMPAT CUCI TANGAN', 'tempatcucitangan@sdncimanahayu.sch.id', NULL, '$2y$12$TivPE5C9ec2K6dNuXoTu7.X7i14dBHazaV2yybTRLRk9rgWXlINUy', 'guru', NULL, '2026-08-23 21:27:06', '2026-08-23 21:27:06', NULL, NULL),
(228, 'KURSI SISWA', '6a8bc81a8fd11@sdncimanahayu.sch.id', NULL, '$2y$12$APlUX4a6pLuB4wPQP.Xsj.acdhZ.8KUAm1kF2ZcBxoARJIK7jHDdu', 'guru', NULL, '2026-08-23 21:27:06', '2026-08-23 21:27:06', NULL, NULL),
(229, 'KURSI SISWA', '6a8bc81aedfd7@sdncimanahayu.sch.id', NULL, '$2y$12$ED.iVcCF1SIAgxJUFkZkiOnyEip/IIYYif/IlN001kNNDA7/78O4i', 'guru', NULL, '2026-08-23 21:27:07', '2026-08-23 21:27:07', NULL, NULL),
(230, 'KURSI SISWA', '6a8bc81b63cb2@sdncimanahayu.sch.id', NULL, '$2y$12$Ml6h8vwlqMr1JmkfCD/jXuUbti9TbMpC8D93iPzifqyNPLxU9S2s.', 'guru', NULL, '2026-08-23 21:27:07', '2026-08-23 21:27:07', NULL, NULL),
(231, 'NANANG SUKMANA', '6a8bc8bc14e76@sdncimanahayu.sch.id', NULL, '$2y$12$wQw0Dd10oC75vLqKQMSsjeWZ4tFmfWWkAOvJblbRqsHs51AKXfQzW', 'guru', NULL, '2026-08-23 21:29:48', '2026-08-23 21:29:48', NULL, NULL),
(232, 'JAJANG BUDIMAN, S.PD', '6a8bc957398c0@sdncimanahayu.sch.id', NULL, '$2y$12$JVdgogG8Q4m3TT6qAo2/IeQH8tUttVU.4TUE3bq.OD0OEJqPObD7i', 'guru', NULL, '2026-08-23 21:32:23', '2026-08-23 21:32:23', NULL, NULL),
(233, 'AGAM KURNIA', '6a8bc9578e311@sdncimanahayu.sch.id', NULL, '$2y$12$XDzp5Knq066uGGW.7ydJQu0gtG.Y0eO1IH/qw2blpEZMudeSDYOL2', 'guru', NULL, '2026-08-23 21:32:23', '2026-08-23 21:32:23', NULL, NULL),
(234, 'LINA MARIANA', '6a8bc957ee357@sdncimanahayu.sch.id', NULL, '$2y$12$GoedLMvDKf99xrF4THpFW..WdQNFIT.bS/OSZfSC4UNrU86NLy9BW', 'guru', NULL, '2026-08-23 21:32:24', '2026-08-23 21:32:24', NULL, NULL),
(235, 'NANANG SUKMANA', '6a8bc9583fc2e@sdncimanahayu.sch.id', NULL, '$2y$12$.csTdz6BHzT1ChsNtIZbd.IVoDwt5NHBh/5gSOUG6SdUZc4It39WS', 'guru', NULL, '2026-08-23 21:32:24', '2026-08-23 21:32:24', NULL, NULL),
(236, 'NANI ROHANI', '6a8bc95885944@sdncimanahayu.sch.id', NULL, '$2y$12$xStDOd38e9ggIUXokth6WO9QETSa4sCn8uWpZP/yh.y.ezMjnsAU6', 'guru', NULL, '2026-08-23 21:32:24', '2026-08-23 21:32:24', NULL, NULL),
(237, 'OKY PRATAMA IBRAHIM', '6a8bc958cbe0b@sdncimanahayu.sch.id', NULL, '$2y$12$wO.kVXrx1qpzDem06C9d2exyRP6Bah4YckHsUYeHnwFP85tMBxf02', 'guru', NULL, '2026-08-23 21:32:25', '2026-08-23 21:32:25', NULL, NULL),
(238, 'SRI ERIANI PEBRIANTI', '6a8bc9591c8d5@sdncimanahayu.sch.id', NULL, '$2y$12$aE237V81gAa8U7eDA1ROgOpnUnwpTU121.BNfK9Fy5LG2ApE98cEC', 'guru', NULL, '2026-08-23 21:32:25', '2026-08-23 21:32:25', NULL, NULL),
(239, 'SRI MULYANI', '6a8bc959624c4@sdncimanahayu.sch.id', NULL, '$2y$12$0tqihjhYXkxpoVZLIELk7uOQBaoNr3bXl3uvFCW/eVrfQ8pMIKEHe', 'guru', NULL, '2026-08-23 21:32:25', '2026-08-23 21:32:25', NULL, NULL),
(240, 'TATI SUSANTI', '6a8bc959ab834@sdncimanahayu.sch.id', NULL, '$2y$12$rT9ZuLSYVbNC8dioe5URruFOFl4R4dHJGYkn.0JzWhgkrNVQpBAle', 'guru', NULL, '2026-08-23 21:32:25', '2026-08-23 21:32:25', NULL, NULL),
(241, 'UCU NURHASANAH', '6a8bc959ef9d0@sdncimanahayu.sch.id', NULL, '$2y$12$OCm1vyJYJ3xritqdnf0yx.Gcx5mpvraSbLC.aqCY46Q8wZC/hAXdK', 'guru', NULL, '2026-08-23 21:32:26', '2026-08-23 21:32:26', NULL, NULL),
(242, 'YATI SULISTIASARI', '6a8bc95a4116e@sdncimanahayu.sch.id', NULL, '$2y$12$065UwOALb3CMc9IJFAFeoO6FsYM7AQfzsEgcSa45I8rAkY0iTJ91K', 'guru', NULL, '2026-08-23 21:32:26', '2026-08-23 21:32:26', NULL, NULL),
(243, 'JAJANG BUDIMAN, S.PD', 'jajangbudiman,s.pd.6a90c9f90f503@sdncimanahayu.sch.id', NULL, '$2y$12$NQ97UV6seswh1R8A.At7M.RMajeu1ZpAE.mH9lYLq447chHJbvMa6', 'guru', NULL, '2026-08-27 16:36:25', '2026-08-27 16:36:25', NULL, NULL),
(244, 'AGAM KURNIA', 'agamkurnia.6a90c9f981ee1@sdncimanahayu.sch.id', NULL, '$2y$12$t8AWJvhFlpmyCBAOjiMvueYjRhGquYkGvjclTHNhKecTF2NCfau.q', 'guru', NULL, '2026-08-27 16:36:25', '2026-08-27 16:36:25', NULL, NULL),
(245, 'LINA MARIANA', 'linamariana.6a90c9f9cd4ef@sdncimanahayu.sch.id', NULL, '$2y$12$5MISFc0j1Ujy9dReQdBuiekIIi7ktXYdfLlwe1g7QJumXfKPjdYGy', 'guru', NULL, '2026-08-27 16:36:26', '2026-08-27 16:36:26', NULL, NULL),
(246, 'NANANG SUKMANA', 'nanangsukmana.6a90c9fa2267b@sdncimanahayu.sch.id', NULL, '$2y$12$8Mn.otm5elmBHwaCiy.E5./606PSu/jw4tyViKl7hMPYQkaorwB4.', 'guru', NULL, '2026-08-27 16:36:26', '2026-08-27 16:36:26', NULL, NULL),
(247, 'NANI ROHANI', 'nanirohani.6a90c9fac4dfa@sdncimanahayu.sch.id', NULL, '$2y$12$f27/mOTO4qKrxAsOR0CkNOaM.EEIswGkXjUcVwQ40VZFiB3JSMGtS', 'guru', NULL, '2026-08-27 16:36:27', '2026-08-27 16:36:27', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `jenis_guru`, `mapel_id`) VALUES
(248, 'OKY PRATAMA IBRAHIM', 'okypratamaibrahim.6a90c9fb44435@sdncimanahayu.sch.id', NULL, '$2y$12$kcUQ/xxZVmclVXNXI6SBOOQpHYIg5u9cKMebCtQ9mlfk.XGDYojeG', 'guru', NULL, '2026-08-27 16:36:27', '2026-08-27 16:36:27', NULL, NULL),
(249, 'SRI ERIANI PEBRIANTI', 'srierianipebrianti.6a90c9fba69ad@sdncimanahayu.sch.id', NULL, '$2y$12$7yzmINWFFhDsEoLJi1m6ZerNtmQrGIuAGzyPFHl9Ej/ijYlX3nWga', 'guru', NULL, '2026-08-27 16:36:28', '2026-08-27 16:36:28', NULL, NULL),
(250, 'SRI MULYANI', 'srimulyani.6a90c9fc03dd4@sdncimanahayu.sch.id', NULL, '$2y$12$I0ojxBS7aMmZC4N86YSeHulnmk44PCtj2nu1TGyA.De6kjxz6oGyy', 'guru', NULL, '2026-08-27 16:36:28', '2026-08-27 16:36:28', NULL, NULL),
(251, 'TATI SUSANTI', 'tatisusanti.6a90c9fc564dd@sdncimanahayu.sch.id', NULL, '$2y$12$FwFja6W64yCMLYCSJJfAj.KenTSlv/fRTf8mr9yqIH2hYSPCDtGQe', 'guru', NULL, '2026-08-27 16:36:28', '2026-08-27 16:36:28', NULL, NULL),
(252, 'UCU NURHASANAH', 'ucunurhasanah.6a90c9fca7041@sdncimanahayu.sch.id', NULL, '$2y$12$kNON24p.VcxiMibG3TG8UuHmzcNE53lefbmrG3PU9qutwt5KPIyA2', 'guru', NULL, '2026-08-27 16:36:28', '2026-08-27 16:36:28', NULL, NULL),
(253, 'YATI SULISTIASARI', 'yatisulistiasari.6a90c9fcf35e6@sdncimanahayu.sch.id', NULL, '$2y$12$RqYdKVMIIMBKTHxfSmCehutSjrv/y3Z1ICRMZSdt8m0ZhonunCFOS', 'guru', NULL, '2026-08-27 16:36:29', '2026-08-27 16:36:29', NULL, NULL),
(254, 'JAJANG BUDIMAN, S.PD', 'jajangbudiman,s.pd.6a90d827626cc@sdncimanahayu.sch.id', NULL, '$2y$12$tCgLIN9H2WIB4bIpKPUjUO3h8.UkRn.kN..HI/bne5r9NeTEycBXm', 'guru', NULL, '2026-08-27 17:36:55', '2026-08-27 17:36:55', NULL, NULL),
(255, 'AGAM KURNIA', 'agamkurnia.6a90d827c9a52@sdncimanahayu.sch.id', NULL, '$2y$12$e29V4/6w7O2XNn8CHPIrNuJMTZNpntHhjbcWOAIdU0xJiW1Fqak9q', 'guru', NULL, '2026-08-27 17:36:56', '2026-08-27 17:36:56', NULL, NULL),
(256, 'LINA MARIANA', 'linamariana.6a90d82861f02@sdncimanahayu.sch.id', NULL, '$2y$12$dopwY8jdY98wVUkx2DdaaeJq1ARcgrUmE60CSH0LqsMKsJ7xs.cYm', 'guru', NULL, '2026-08-27 17:36:56', '2026-08-27 17:36:56', NULL, NULL),
(257, 'NANANG SUKMANA', 'nanangsukmana.6a90d828c6c1d@sdncimanahayu.sch.id', NULL, '$2y$12$CtWeGVlShiTmFJ67OfvJF.EA9VcyhyMa0tuDWjHkba37rNCTcWA8C', 'guru', NULL, '2026-08-27 17:36:57', '2026-08-27 17:36:57', NULL, NULL),
(258, 'NANI ROHANI', 'nanirohani.6a90d82931ab4@sdncimanahayu.sch.id', NULL, '$2y$12$O7/PnZCLDg2Z3vQxdhZKiuly0Gbzb7U2CKhOP7mfwrlieBIAXz63S', 'guru', NULL, '2026-08-27 17:36:57', '2026-08-27 17:36:57', NULL, NULL),
(259, 'OKY PRATAMA IBRAHIM', 'okypratamaibrahim.6a90d829912a6@sdncimanahayu.sch.id', NULL, '$2y$12$yF/YDRYaX6KYPuTXQq1bN.YayYeeI8To0jff/rmLDdm7CcAZKTN/G', 'guru', NULL, '2026-08-27 17:36:57', '2026-08-27 17:36:57', NULL, NULL),
(260, 'SRI ERIANI PEBRIANTI', 'srierianipebrianti.6a90d829f09e6@sdncimanahayu.sch.id', NULL, '$2y$12$Dj7oK84KVZ/JsTZ96AI3Vu9cHYXVds6f8.5anv/DW/RtTlXYxQwwu', 'guru', NULL, '2026-08-27 17:36:58', '2026-08-27 17:36:58', NULL, NULL),
(261, 'SRI MULYANI', 'srimulyani.6a90d82a5bdb6@sdncimanahayu.sch.id', NULL, '$2y$12$NW4NGZSZ5V7vNG5rW4hBHOHb1Pah9xLLIwYvOX3Cnn5tzsmgBEB4G', 'guru', NULL, '2026-08-27 17:36:58', '2026-08-27 17:36:58', NULL, NULL),
(262, 'TATI SUSANTI', 'tatisusanti.6a90d82abae3f@sdncimanahayu.sch.id', NULL, '$2y$12$s1rDs5HpzDfDESMqiusCEeQdXcxgKIydddyVdYVOxzPXlGgGU7u5G', 'guru', NULL, '2026-08-27 17:36:59', '2026-08-27 17:36:59', NULL, NULL),
(263, 'UCU NURHASANAH', 'ucunurhasanah.6a90d82b2579f@sdncimanahayu.sch.id', NULL, '$2y$12$kP9gBP5n6ssX9S.kdbhCZ.NDBX39WYq57m2kWaI2QEsBGtiYnIf4K', 'guru', NULL, '2026-08-27 17:36:59', '2026-08-27 17:36:59', NULL, NULL),
(264, 'YATI SULISTIASARI', 'yatisulistiasari.6a90d82b83108@sdncimanahayu.sch.id', NULL, '$2y$12$nJp.5yPTC.MI1ASaOTiprOs3ztgIaUKfd5liqiCrxUqMWpS5MOxG6', 'guru', NULL, '2026-08-27 17:36:59', '2026-08-27 17:36:59', NULL, NULL),
(265, 'JAJANG BUDIMAN, S.PD', 'jajangbudiman,s.pd.6a90e8ecc6ba2@sdncimanahayu.sch.id', NULL, '$2y$12$lqooYlMj4PCami6Z8gZxYel9au2ztzMINnBA9YXmx3x1v5lhZsnCe', 'guru', NULL, '2026-08-27 18:48:29', '2026-08-27 18:48:29', NULL, NULL),
(266, 'AGAM KURNIA', 'agamkurnia.6a90e8ed40255@sdncimanahayu.sch.id', NULL, '$2y$12$dVtGrHoxKnv3UdC85kBhFOD7OAgTTwAH3YhOMVsmkIkHDUrq108/i', 'guru', NULL, '2026-08-27 18:48:29', '2026-08-27 18:48:29', NULL, NULL),
(267, 'LINA MARIANA', 'linamariana.6a90e8eda6168@sdncimanahayu.sch.id', NULL, '$2y$12$TBPIHALrZ0J8FCRGaDg4Gu9Mc8zs/jNzoylN5przJSmYdlfJPeJIW', 'guru', NULL, '2026-08-27 18:48:30', '2026-08-27 18:48:30', NULL, NULL),
(268, 'NANANG SUKMANA', 'nanangsukmana.6a90e8ee118ba@sdncimanahayu.sch.id', NULL, '$2y$12$Ea3JXIs1SYURHBBFdXHjVetSEx8fi9Fm9N0Ip7ukAHuHc9a3Xz3TW', 'guru', NULL, '2026-08-27 18:48:30', '2026-08-27 18:48:30', NULL, NULL),
(269, 'NANI ROHANI', 'nanirohani.6a90e8ee7131b@sdncimanahayu.sch.id', NULL, '$2y$12$Ynh6WOtHdSK6r00MhRjdN.q34s46xlwTT4WFYQfKns.nBHqEhGjmW', 'guru', NULL, '2026-08-27 18:48:30', '2026-08-27 18:48:30', NULL, NULL),
(270, 'OKY PRATAMA IBRAHIM', 'okypratamaibrahim.6a90e8eed0e46@sdncimanahayu.sch.id', NULL, '$2y$12$yGNVVecPK/Rd8wUDXtJUaOHRqNLf5zR7qInTcBrQy5FOOwbQgGZaC', 'guru', NULL, '2026-08-27 18:48:31', '2026-08-27 18:48:31', NULL, NULL),
(271, 'SRI ERIANI PEBRIANTI', 'srierianipebrianti.6a90e8ef3bc97@sdncimanahayu.sch.id', NULL, '$2y$12$.Wh4xLSHp5X0e5vKCYQo4eQ2hWT8CjXeOY8w4HrLoZWYkTDxURTc.', 'guru', NULL, '2026-08-27 18:48:31', '2026-08-27 18:48:31', NULL, NULL),
(272, 'SRI MULYANI', 'srimulyani.6a90e8ef9aca9@sdncimanahayu.sch.id', NULL, '$2y$12$coSIMyFXR5NahmkOIgnGM.8vvKwiKkgpiq0zHwwDhEqkqLPHsx966', 'guru', NULL, '2026-08-27 18:48:32', '2026-08-27 18:48:32', NULL, NULL),
(273, 'TATI SUSANTI', 'tatisusanti.6a90e8f0046d0@sdncimanahayu.sch.id', NULL, '$2y$12$f/5O0ZXl6.USyRCbUsxc6egYeYMXwyRmSbKiIbi5fCrQk5y9JZjoq', 'guru', NULL, '2026-08-27 18:48:32', '2026-08-27 18:48:32', NULL, NULL),
(274, 'UCU NURHASANAH', 'ucunurhasanah.6a90e8f063850@sdncimanahayu.sch.id', NULL, '$2y$12$z09m93IKzO5Qz0LSe6HlHu6Dcglkj2kaVTvPFLy.Iw1fkKNQCKyKu', 'guru', NULL, '2026-08-27 18:48:32', '2026-08-27 18:48:32', NULL, NULL),
(275, 'YATI SULISTIASARI', 'yatisulistiasari.6a90e8f0c400f@sdncimanahayu.sch.id', NULL, '$2y$12$gwPskkeX7omJueveS7CgoOJyZwM/va3sI9wIwY0Rn3Wixu1q.RVoe', 'guru', NULL, '2026-08-27 18:48:33', '2026-08-27 18:48:33', NULL, NULL),
(284, 'JAJANG BUDIMAN, S.PD', 'jajangbudiman,s.pd.6a944db6d28e4@sdncimanahayu.sch.id', NULL, '$2y$12$7RmtPUnsAaOZ89qioqdu1OWQgl1Gc0auOT5wyqwqodG9QAoRPcO8q', 'guru', NULL, '2026-08-30 08:35:19', '2026-08-30 08:35:19', NULL, NULL),
(285, 'AGAM KURNIA', 'agamkurnia.6a944db745e84@sdncimanahayu.sch.id', NULL, '$2y$12$9PZ5Pbwdr8KHz4oHEUSiR.uZ8ZN/TXBpFBNB7QychfuUywXOn9npy', 'guru', NULL, '2026-08-30 08:35:19', '2026-08-30 08:35:19', NULL, NULL),
(286, 'LINA MARIANA', 'linamariana.6a944db7b935e@sdncimanahayu.sch.id', NULL, '$2y$12$X62hcz1d2LJT9GGNvcOU.OzboNUj02SA22a./YEaUjhQwmyq2ksTu', 'guru', NULL, '2026-08-30 08:35:20', '2026-08-30 08:35:20', NULL, NULL),
(287, 'NANANG SUKMANA', 'nanangsukmana.6a944db83dcb4@sdncimanahayu.sch.id', NULL, '$2y$12$H7mdsDD/xaFAXuIhJURL0Or3NtE/DAkwiRvvghzLabYmW4c5Py6Um', 'guru', NULL, '2026-08-30 08:35:20', '2026-08-30 08:35:20', NULL, NULL),
(288, 'NANI ROHANI', 'nanirohani.6a944db8a2480@sdncimanahayu.sch.id', NULL, '$2y$12$UV1Qaoc2noGJckgyvSBdBO3g25mtuDbLo2meMLEuN31l6r1CHPM06', 'guru', NULL, '2026-08-30 08:35:21', '2026-08-30 08:35:21', NULL, NULL),
(289, 'OKY PRATAMA IBRAHIM', 'okypratamaibrahim.6a944db913faa@sdncimanahayu.sch.id', NULL, '$2y$12$UXCfI5U6/nuYaC/xsVduBepPIM6CmRmhaQtGXzft466LSx1sclbiK', 'guru', NULL, '2026-08-30 08:35:21', '2026-08-30 08:35:21', NULL, NULL),
(290, 'SRI ERIANI PEBRIANTI', 'srierianipebrianti.6a944db981585@sdncimanahayu.sch.id', NULL, '$2y$12$opIbJ18ALiMgUTiYPZb.FeQ9RotVF5d53.0CL5lukGGqWv0KvpYn2', 'guru', NULL, '2026-08-30 08:35:21', '2026-08-30 08:35:21', NULL, NULL),
(291, 'SRI MULYANI', 'srimulyani.6a944db9ee3c6@sdncimanahayu.sch.id', NULL, '$2y$12$xdyrAOdrkverDDYkgYhN1OWZrCbpXbj/FNXd2ZkiHuJVtlNG6HGXq', 'guru', NULL, '2026-08-30 08:35:22', '2026-08-30 08:35:22', NULL, NULL),
(292, 'TATI SUSANTI', 'tatisusanti.6a944dba5c1f5@sdncimanahayu.sch.id', NULL, '$2y$12$hxZliqM1qPk5/20.ZhKWY.bs9M8kTZSI8LlplD5t8hLGPnD0C6i8y', 'guru', NULL, '2026-08-30 08:35:22', '2026-08-30 08:35:22', NULL, NULL),
(293, 'UCU NURHASANAH', 'ucunurhasanah.6a944dbac4826@sdncimanahayu.sch.id', NULL, '$2y$12$zNpuGbkEWO0Zt.PQUEYTT.UKx73a/X0LM9xfo2uyKa2EHz7jFhDwy', 'guru', NULL, '2026-08-30 08:35:23', '2026-08-30 08:35:23', NULL, NULL),
(294, 'YATI SULISTIASARI', 'yatisulistiasari.6a944dbb427f7@sdncimanahayu.sch.id', NULL, '$2y$12$hWw6UPJQNAAMKhMcQSEhv.1y/cxyo65jpIC9t/1d5T6IWdF.8zHrK', 'guru', NULL, '2026-08-30 08:35:23', '2026-08-30 08:35:23', NULL, NULL),
(295, 'JAJANG BUDIMAN, S.PD', 'jajangbudiman,s.pd.6a94bfd890593@sdncimanahayu.sch.id', NULL, '$2y$12$7LQ4r0LsiIgq.RHfrof8m.hN2U4QR9OtvxKOnOmYQUs20ksuotl7a', 'guru', NULL, '2026-08-30 16:42:16', '2026-08-30 16:42:16', NULL, NULL),
(296, 'AGAM KURNIA', 'agamkurnia.6a94bfd8f233a@sdncimanahayu.sch.id', NULL, '$2y$12$ursUEm/0WdpvVa2klW5jauY6ILDpS95MudUHDos1dty2gYcKplRKi', 'guru', NULL, '2026-08-30 16:42:17', '2026-08-30 16:42:17', NULL, NULL),
(297, 'LINA MARIANA', 'linamariana.6a94bfd960b85@sdncimanahayu.sch.id', NULL, '$2y$12$2rhOEpTStmYG744rqEyQ.uyzHKdJpn6a6hMZX6GUOI5X4IK.1B3lm', 'guru', NULL, '2026-08-30 16:42:17', '2026-08-30 16:42:17', NULL, NULL),
(298, 'NANANG SUKMANA', 'nanangsukmana.6a94bfd9c2148@sdncimanahayu.sch.id', NULL, '$2y$12$hzc78hNWiXwhMIdM/0/XS.Zkb8hjKwPymKTGVCoMbGz63WbRgjvi.', 'guru', NULL, '2026-08-30 16:42:18', '2026-08-30 16:42:18', NULL, NULL),
(299, 'NANI ROHANI', 'nanirohani.6a94bfda2d481@sdncimanahayu.sch.id', NULL, '$2y$12$rsrreQEwGW0PgpBLJLVyG.Q0Mj87xzlECY.lakj.ZPpCkueYSGyK2', 'guru', NULL, '2026-08-30 16:42:18', '2026-08-30 16:42:18', NULL, NULL),
(300, 'OKY PRATAMA IBRAHIM', 'okypratamaibrahim.6a94bfda94592@sdncimanahayu.sch.id', NULL, '$2y$12$JikkJ/aT30b37TPjQlztkOn.iTKEKeSAHi7NqfJRkSuGs7Jv2Cbhq', 'guru', NULL, '2026-08-30 16:42:19', '2026-08-30 16:42:19', NULL, NULL),
(301, 'SRI ERIANI PEBRIANTI', 'srierianipebrianti.6a94bfdb0dec7@sdncimanahayu.sch.id', NULL, '$2y$12$fYjcr/uB9y/ny0oE1DGcZO7wwAxd2zb6lI8Gl5Fecsi5yc82HYSCa', 'guru', NULL, '2026-08-30 16:42:19', '2026-08-30 16:42:19', NULL, NULL),
(302, 'SRI MULYANI', 'srimulyani.6a94bfdb6df70@sdncimanahayu.sch.id', NULL, '$2y$12$GYq/1GspLW8KVmCy109gOe3COjjPYJiJSTZ0wkUk7zfjRSt7UptHO', 'guru', NULL, '2026-08-30 16:42:19', '2026-08-30 16:42:19', NULL, NULL),
(303, 'TATI SUSANTI', 'tatisusanti.6a94bfdbcef48@sdncimanahayu.sch.id', NULL, '$2y$12$2KDM64yiypepliNuKrMAUu1bC5JHLjgglsbk5IaQYqh108Zlsh7km', 'guru', NULL, '2026-08-30 16:42:20', '2026-08-30 16:42:20', NULL, NULL),
(304, 'UCU NURHASANAH', 'ucunurhasanah.6a94bfdc3a5f0@sdncimanahayu.sch.id', NULL, '$2y$12$h02x.JjpBFNbXzsYDcZP4eqwsCQgG.NM2Mf/oaWd/w8NBKemHcc66', 'guru', NULL, '2026-08-30 16:42:20', '2026-08-30 16:42:20', NULL, NULL),
(305, 'YATI SULISTIASARI', 'yatisulistiasari.6a94bfdc9b7f2@sdncimanahayu.sch.id', NULL, '$2y$12$g1mFmUSMY8wwFzfsRj.81uwWErBSE2Ds/zyFwFmyQ65vABRyiSDZ6', 'guru', NULL, '2026-08-30 16:42:21', '2026-08-30 16:42:21', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_siswa_id_foreign` (`siswa_id`),
  ADD KEY `absensis_kelas_id_foreign` (`kelas_id`),
  ADD KEY `absensis_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `absensis_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnis_siswa_id_foreign` (`siswa_id`),
  ADD KEY `alumnis_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_kelas_siswa_id_tahun_ajaran_id_unique` (`siswa_id`,`tahun_ajaran_id`),
  ADD KEY `anggota_kelas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `anggota_kelas_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `anggota_kelas_kelas_tujuan_id_foreign` (`kelas_tujuan_id`);

--
-- Indexes for table `ekstrakurikulers`
--
ALTER TABLE `ekstrakurikulers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ekstrakurikulers_siswa_id_foreign` (`siswa_id`),
  ADD KEY `ekstrakurikulers_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `ekstrakurikulers_master_ekstrakurikuler_id_foreign` (`master_ekstrakurikuler_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`),
  ADD UNIQUE KEY `gurus_nuptk_unique` (`nuptk`),
  ADD UNIQUE KEY `gurus_nik_unique` (`nik`),
  ADD KEY `gurus_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_mapel_guru_id_foreign` (`guru_id`),
  ADD KEY `guru_mapel_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_pelajarans_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `jadwal_pelajarans_kelas_id_foreign` (`kelas_id`),
  ADD KEY `jadwal_pelajarans_mapel_id_foreign` (`mapel_id`),
  ADD KEY `jadwal_pelajarans_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `jam_pelajarans`
--
ALTER TABLE `jam_pelajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jam_pelajarans_tingkat_jam_ke_unique` (`tingkat`,`jam_ke`);

--
-- Indexes for table `kategori_mapels`
--
ALTER TABLE `kategori_mapels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_mapels_kode_kategori_unique` (`kode_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_wali_kelas_id_foreign` (`wali_kelas_id`),
  ADD KEY `kelas_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `kelulusans`
--
ALTER TABLE `kelulusans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelulusans_siswa_id_foreign` (`siswa_id`),
  ADD KEY `kelulusans_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `lingkup_materis`
--
ALTER TABLE `lingkup_materis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lingkup_materis_mapel_id_foreign` (`mapel_id`),
  ADD KEY `lingkup_materis_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_guru_id_foreign` (`guru_id`),
  ADD KEY `mapels_kategori_mapel_id_foreign` (`kategori_mapel_id`),
  ADD KEY `mapels_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `mapels_master_mapel_id_foreign` (`master_mapel_id`);

--
-- Indexes for table `master_ekstrakurikulers`
--
ALTER TABLE `master_ekstrakurikulers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_mapels`
--
ALTER TABLE `master_mapels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_mapels_kode_mapel_unique` (`kode_mapel`),
  ADD KEY `master_mapels_kategori_mapel_id_foreign` (`kategori_mapel_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilais_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilais_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `nilai_asts`
--
ALTER TABLE `nilai_asts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nilai_asts_unique` (`siswa_id`,`lingkup_materi_id`,`tahun_ajaran_id`,`semester`),
  ADD KEY `nilai_asts_kelas_id_foreign` (`kelas_id`),
  ADD KEY `nilai_asts_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilai_asts_lingkup_materi_id_foreign` (`lingkup_materi_id`),
  ADD KEY `nilai_asts_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `nilai_asts_details`
--
ALTER TABLE `nilai_asts_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asts_detail_unique` (`nilai_id`,`lingkup_materi_id`),
  ADD KEY `nilai_asts_details_lingkup_materi_id_foreign` (`lingkup_materi_id`);

--
-- Indexes for table `nilai_tp`
--
ALTER TABLE `nilai_tp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_tp_nilai_id_foreign` (`nilai_id`),
  ADD KEY `nilai_tp_tp_id_foreign` (`tp_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ranking_siswas`
--
ALTER TABLE `ranking_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ranking_siswas_siswa_id_foreign` (`siswa_id`),
  ADD KEY `ranking_siswas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `ranking_siswas_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `rapors`
--
ALTER TABLE `rapors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rapors_siswa_id_foreign` (`siswa_id`),
  ADD KEY `rapors_kelas_id_foreign` (`kelas_id`),
  ADD KEY `rapors_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `rapor_details`
--
ALTER TABLE `rapor_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rapor_details_rapor_id_foreign` (`rapor_id`),
  ADD KEY `rapor_details_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nisn_unique` (`nisn`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun_ajaran_semester_unique` (`tahun_ajaran`,`semester`),
  ADD KEY `tahun_ajarans_periode_sebelumnya_id_foreign` (`periode_sebelumnya_id`);

--
-- Indexes for table `tujuan_pembelajarans`
--
ALTER TABLE `tujuan_pembelajarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tujuan_pembelajarans_lingkup_materi_id_foreign` (`lingkup_materi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_mapel_id_foreign` (`mapel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekstrakurikulers`
--
ALTER TABLE `ekstrakurikulers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jam_pelajarans`
--
ALTER TABLE `jam_pelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kategori_mapels`
--
ALTER TABLE `kategori_mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelulusans`
--
ALTER TABLE `kelulusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `lingkup_materis`
--
ALTER TABLE `lingkup_materis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `master_ekstrakurikulers`
--
ALTER TABLE `master_ekstrakurikulers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_mapels`
--
ALTER TABLE `master_mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1341;

--
-- AUTO_INCREMENT for table `nilai_asts`
--
ALTER TABLE `nilai_asts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_asts_details`
--
ALTER TABLE `nilai_asts_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_tp`
--
ALTER TABLE `nilai_tp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking_siswas`
--
ALTER TABLE `ranking_siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `rapors`
--
ALTER TABLE `rapors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `rapor_details`
--
ALTER TABLE `rapor_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tujuan_pembelajarans`
--
ALTER TABLE `tujuan_pembelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD CONSTRAINT `alumnis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumnis_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD CONSTRAINT `anggota_kelas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_kelas_kelas_tujuan_id_foreign` FOREIGN KEY (`kelas_tujuan_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `anggota_kelas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggota_kelas_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ekstrakurikulers`
--
ALTER TABLE `ekstrakurikulers`
  ADD CONSTRAINT `ekstrakurikulers_master_ekstrakurikuler_id_foreign` FOREIGN KEY (`master_ekstrakurikuler_id`) REFERENCES `master_ekstrakurikulers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ekstrakurikulers_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ekstrakurikulers_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_mapel_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  ADD CONSTRAINT `jadwal_pelajarans_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `jadwal_pelajarans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_pelajarans_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_pelajarans_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kelas_wali_kelas_id_foreign` FOREIGN KEY (`wali_kelas_id`) REFERENCES `gurus` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kelulusans`
--
ALTER TABLE `kelulusans`
  ADD CONSTRAINT `kelulusans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelulusans_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lingkup_materis`
--
ALTER TABLE `lingkup_materis`
  ADD CONSTRAINT `lingkup_materis_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lingkup_materis_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `mapels_kategori_mapel_id_foreign` FOREIGN KEY (`kategori_mapel_id`) REFERENCES `kategori_mapels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mapels_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `master_mapels`
--
ALTER TABLE `master_mapels`
  ADD CONSTRAINT `master_mapels_kategori_mapel_id_foreign` FOREIGN KEY (`kategori_mapel_id`) REFERENCES `kategori_mapels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_asts`
--
ALTER TABLE `nilai_asts`
  ADD CONSTRAINT `nilai_asts_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_asts_lingkup_materi_id_foreign` FOREIGN KEY (`lingkup_materi_id`) REFERENCES `lingkup_materis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_asts_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_asts_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_asts_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_asts_details`
--
ALTER TABLE `nilai_asts_details`
  ADD CONSTRAINT `nilai_asts_details_lingkup_materi_id_foreign` FOREIGN KEY (`lingkup_materi_id`) REFERENCES `lingkup_materis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_asts_details_nilai_id_foreign` FOREIGN KEY (`nilai_id`) REFERENCES `nilais` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_tp`
--
ALTER TABLE `nilai_tp`
  ADD CONSTRAINT `nilai_tp_nilai_id_foreign` FOREIGN KEY (`nilai_id`) REFERENCES `nilais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_tp_tp_id_foreign` FOREIGN KEY (`tp_id`) REFERENCES `tujuan_pembelajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ranking_siswas`
--
ALTER TABLE `ranking_siswas`
  ADD CONSTRAINT `ranking_siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranking_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ranking_siswas_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rapors`
--
ALTER TABLE `rapors`
  ADD CONSTRAINT `rapors_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rapors_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rapors_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rapor_details`
--
ALTER TABLE `rapor_details`
  ADD CONSTRAINT `rapor_details_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rapor_details_rapor_id_foreign` FOREIGN KEY (`rapor_id`) REFERENCES `rapors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD CONSTRAINT `tahun_ajarans_periode_sebelumnya_id_foreign` FOREIGN KEY (`periode_sebelumnya_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tujuan_pembelajarans`
--
ALTER TABLE `tujuan_pembelajarans`
  ADD CONSTRAINT `tujuan_pembelajarans_lingkup_materi_id_foreign` FOREIGN KEY (`lingkup_materi_id`) REFERENCES `lingkup_materis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
