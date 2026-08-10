-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2026 at 04:24 AM
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

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `siswa_id`, `mapel_id`, `kelas_id`, `tahun_ajaran_id`, `tanggal`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 557, 3, 29, 1, '2026-08-06', 'Ganjil', 'alfa', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(2, 562, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(3, 569, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(4, 571, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(5, 574, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(6, 582, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(7, 583, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(8, 587, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(9, 597, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(10, 606, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(11, 609, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(12, 612, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(13, 622, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(14, 623, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(15, 627, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(16, 629, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(17, 632, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(18, 645, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(19, 650, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(20, 651, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(21, 654, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(22, 663, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(23, 668, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(24, 679, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(25, 684, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(26, 687, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28'),
(27, 688, 3, 29, 1, '2026-08-06', 'Ganjil', 'hadir', '2026-08-06 00:10:28', '2026-08-06 00:10:28');

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

--
-- Dumping data for table `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id`, `siswa_id`, `kelas_id`, `kelas_tujuan_id`, `tahun_ajaran_id`, `created_at`, `updated_at`) VALUES
(1, 557, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(2, 562, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(3, 569, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(4, 571, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(5, 574, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(6, 582, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(7, 583, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(8, 587, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(9, 597, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(10, 606, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(11, 609, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(12, 612, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(13, 622, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(14, 623, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(15, 627, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(16, 629, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(17, 632, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(18, 645, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(19, 650, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(20, 651, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(21, 654, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(22, 663, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(23, 668, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(24, 679, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(25, 684, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(26, 687, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(27, 688, 29, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(28, 624, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(29, 634, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(30, 639, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(31, 672, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(32, 689, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(33, 695, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(34, 707, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(35, 709, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(36, 714, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(37, 717, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(38, 722, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(39, 728, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(40, 735, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(41, 737, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(42, 749, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(43, 756, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(44, 760, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(45, 769, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(46, 772, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(47, 792, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(48, 796, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(49, 798, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(50, 812, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(51, 821, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(52, 832, 30, NULL, 1, '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(53, 563, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(54, 610, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(55, 618, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(56, 619, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(57, 621, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(58, 644, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(59, 652, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(60, 656, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(61, 660, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(62, 662, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(63, 667, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(64, 671, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(65, 698, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(66, 745, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(67, 750, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(68, 752, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(69, 753, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(70, 754, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(71, 758, 31, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(72, 701, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(73, 708, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(74, 710, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(75, 711, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(76, 713, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(77, 761, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(78, 765, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(79, 766, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(80, 773, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(81, 795, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(82, 797, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(83, 799, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(84, 800, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(85, 805, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(86, 810, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(87, 815, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(88, 817, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54'),
(89, 830, 32, NULL, 1, '2026-08-06 22:39:54', '2026-08-06 22:39:54');

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

--
-- Dumping data for table `ekstrakurikulers`
--

INSERT INTO `ekstrakurikulers` (`id`, `siswa_id`, `master_ekstrakurikuler_id`, `tahun_ajaran_id`, `semester`, `status`, `created_at`, `updated_at`, `catatan_guru`) VALUES
(3, 557, 1, 1, 'Ganjil', 'Aktif', '2026-08-05 21:05:11', '2026-08-05 21:05:11', 'Sangat Baik'),
(4, 557, 2, 1, 'Ganjil', 'Aktif', '2026-08-05 21:05:11', '2026-08-05 21:05:11', 'baik');

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
  `jenis_pengajar` enum('Kepala Sekolah','Wali Kelas','Guru PAI','Guru PJOK','Operator') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_guru` enum('Aktif','Mutasi Keluar','Pensiun') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mapel_id` bigint UNSIGNED DEFAULT NULL,
  `kelas_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `user_id`, `nip`, `nuptk`, `nik`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `email`, `status_kepegawaian`, `jenis_ptk`, `jabatan_ptk`, `jenis_pengajar`, `status_guru`, `created_at`, `updated_at`, `mapel_id`, `kelas_id`) VALUES
(89, 97, '196806051990031009', '6937746649200082', '3203110506680014', 'Jajang Budiman, S.Pd', 'L', 'Cianjur', '1968-06-05', NULL, NULL, 'jajang45@sdncimanahayu.sch.id', 'PNS', 'Kepala Sekolah', 'Kepala Sekolah', 'Kepala Sekolah', 'Aktif', '2026-07-06 06:52:34', '2026-07-15 02:50:35', NULL, NULL),
(90, 98, '197102092023211002', '3236750652200043', '3203111210710003', 'Agam Kurnia', 'L', 'CIANJUR', '1971-02-09', NULL, NULL, '6a4bb322d899d@sdncimanahayu.sch.id', 'PPPK', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:35', '2026-07-06 06:52:35', NULL, NULL),
(91, 99, '198208262025212033', '1158760661230183', '3173076608820004', 'Lina Mariana', 'P', 'Cianjur', '1982-08-26', NULL, NULL, '6a4bb3236f335@sdncimanahayu.sch.id', 'PPPK Paruh Waktu', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:35', '2026-07-06 06:52:35', NULL, NULL),
(92, 100, NULL, '3156748652200003', '3203112408700003', 'Nanang Sukmana', 'L', 'CIANJUR', '1970-08-24', NULL, NULL, '6a4bb323e91ac@sdncimanahayu.sch.id', 'Guru Honor Sekolah', 'Tenaga Kependidikan', 'Tenaga Administrasi Sekolah', 'Operator', 'Aktif', '2026-07-06 06:52:36', '2026-07-06 06:52:36', NULL, NULL),
(93, 101, '197009092008012004', '7241748652300003', '3203014909700008', 'Nani Rohani', 'P', 'CIANJUR', '1970-09-09', NULL, NULL, '6a4bb3246c096@sdncimanahayu.sch.id', 'PNS', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:36', '2026-07-06 06:52:36', NULL, NULL),
(94, 102, '199010012025211115', '9442768669110002', '3203010110900006', 'Oky Pratama Ibrahim', 'L', 'Cianjur', '1990-10-01', NULL, NULL, '6a4bb324de5b3@sdncimanahayu.sch.id', 'PPPK Paruh Waktu', 'Guru', 'Guru Penjasorkes', 'Guru PJOK', 'Aktif', '2026-07-06 06:52:37', '2026-07-06 06:52:37', NULL, NULL),
(95, 103, '198402022014072004', '1534762663300102', '3203114202840027', 'Sri Eriani Pebrianti', 'P', 'Cianjur', '1984-02-02', NULL, NULL, '6a4bb3254f0c5@sdncimanahayu.sch.id', 'PNS', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:37', '2026-07-06 06:52:37', NULL, NULL),
(96, 104, '197008242000122004', '0156748651300023', '3203116408700001', 'Sri Mulyani', 'P', 'CIANJUR', '1970-08-24', NULL, NULL, '6a4bb325b1725@sdncimanahayu.sch.id', 'PNS', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:38', '2026-07-06 06:52:38', NULL, NULL),
(97, 105, '199510182023212022', '1350773674230213', '3204355810950004', 'TATI SUSANTI', 'P', 'BANDUNG', '1995-10-18', NULL, NULL, '6a4bb32630c68@sdncimanahayu.sch.id', 'PPPK', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:38', '2026-07-06 06:52:38', NULL, NULL),
(98, 106, '198105042024212002', '3737759660300122', '3203114405810007', 'Ucu Nurhasanah', 'P', 'CIANJUR', '1981-05-04', NULL, '087829292222', 'ucu1234@guru.sd.belajar.id', 'PPPK', 'Guru', 'Guru Agama Islam', 'Guru PAI', 'Aktif', '2026-07-06 06:52:39', '2026-07-12 21:15:49', NULL, NULL),
(99, 107, '197804292014072001', '0761756658300042', '3203116904780004', 'Yati Sulistiasari', 'P', 'CIANJUR', '1978-04-29', NULL, '081462265374', 'yatisulistiasari99@guru.sd.belajar.id', 'PNS', 'Guru', 'Guru Kelas', 'Wali Kelas', 'Aktif', '2026-07-06 06:52:39', '2026-07-11 20:48:58', NULL, NULL);

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
  `jenis_jadwal` enum('Wajib','Kokurikuler') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wajib',
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
(8, 1, 8, '10:50:00', '11:25:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(9, 1, 9, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(10, 2, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(11, 2, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(12, 2, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(13, 2, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(14, 2, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(15, 2, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(16, 2, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(17, 2, 8, '10:50:00', '11:25:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(18, 2, 9, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(19, 3, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(20, 3, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(21, 3, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(22, 3, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(23, 3, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(24, 3, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(25, 3, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(26, 3, 8, '10:50:00', '11:25:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(27, 3, 9, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(28, 4, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(29, 4, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(30, 4, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(31, 4, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(32, 4, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(33, 4, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(34, 4, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(35, 4, 8, '10:50:00', '11:25:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(36, 4, 9, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(37, 5, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(38, 5, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(39, 5, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(40, 5, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(41, 5, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(42, 5, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(43, 5, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(44, 5, 8, '10:50:00', '11:25:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(45, 5, 9, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(46, 6, 1, '06:30:00', '07:05:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(47, 6, 2, '07:05:00', '07:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(48, 6, 3, '07:40:00', '08:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(49, 6, 4, '08:15:00', '08:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(50, 6, 5, '09:05:00', '09:40:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(51, 6, 6, '09:40:00', '10:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(52, 6, 7, '10:15:00', '10:50:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(53, 6, 8, '10:50:00', '11:25:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45'),
(54, 6, 9, '11:40:00', '12:15:00', 35, '2026-07-10 19:10:45', '2026-07-10 19:10:45');

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

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `tingkat`, `tahun_ajaran_id`, `wali_kelas_id`, `ruang_kelas`, `status`, `created_at`, `updated_at`) VALUES
(7, '2A', '2', 1, 95, NULL, 'Aktif', '2026-07-20 22:08:29', '2026-08-06 22:40:13'),
(8, '2B', '2', 1, 97, NULL, 'Aktif', '2026-07-20 22:08:29', '2026-08-06 22:40:13'),
(9, '4A', '4', 1, 91, NULL, 'Aktif', '2026-07-20 22:08:36', '2026-08-06 22:40:13'),
(10, '4B', '4', 1, NULL, NULL, 'Aktif', '2026-07-20 22:08:36', '2026-07-20 22:08:36'),
(17, '1A', '1', 1, 90, 'Ruang 2a', 'Aktif', '2026-07-21 01:09:28', '2026-08-06 22:40:13'),
(18, '1B', '1', 1, 91, NULL, 'Aktif', '2026-07-21 01:09:28', '2026-08-06 22:40:13'),
(21, '5A', '5', 1, NULL, NULL, 'Aktif', '2026-08-04 19:15:07', '2026-08-04 19:15:07'),
(22, '5B', '5', 1, NULL, NULL, 'Aktif', '2026-08-04 19:15:07', '2026-08-04 19:15:07'),
(29, '3A', '3', 1, 99, NULL, 'Aktif', '2026-08-05 20:53:27', '2026-08-06 22:40:13'),
(30, '3B', '3', 1, NULL, NULL, 'Aktif', '2026-08-05 20:53:27', '2026-08-05 20:53:27'),
(31, '6A', '6', 1, 93, NULL, 'Aktif', '2026-08-06 22:39:54', '2026-08-06 22:40:13'),
(32, '6B', '6', 1, 96, NULL, 'Aktif', '2026-08-06 22:39:54', '2026-08-06 22:40:13');

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

--
-- Dumping data for table `kelulusans`
--

INSERT INTO `kelulusans` (`id`, `siswa_id`, `tahun_ajaran_id`, `tanggal_kelulusan`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 563, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(2, 610, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(3, 618, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(4, 619, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(5, 621, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(6, 644, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(7, 652, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(8, 656, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(9, 660, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(10, 662, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(11, 667, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(12, 671, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(13, 698, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(14, 745, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(15, 750, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(16, 752, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(17, 753, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(18, 754, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(19, 758, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(20, 701, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:44', '2026-08-06 23:41:44'),
(21, 708, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(22, 710, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(23, 711, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(24, 713, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(25, 761, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(26, 765, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(27, 766, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(28, 773, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(29, 795, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(30, 797, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(31, 799, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(32, 800, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(33, 805, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(34, 810, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(35, 815, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(36, 817, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45'),
(37, 830, 1, '2026-08-07', 'Belum Lulus', 'Anyaman belum diinput, Bahasa Indonesia belum diinput, Bahasa Inggris belum diinput, Bahasa Sunda belum diinput, IPAS belum diinput, Koding & Kecerdasan Artifisial belum diinput, Matematika belum diinput, Pendidikan Agama Islam belum diinput, Pendidikan Pancasila belum diinput, PJOK belum diinput, Seni Budaya belum diinput', '2026-08-06 23:41:45', '2026-08-06 23:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `lingkup_materis`
--

CREATE TABLE `lingkup_materis` (
  `id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `kode_lm` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lingkup_materis`
--

INSERT INTO `lingkup_materis` (`id`, `mapel_id`, `tahun_ajaran_id`, `kode_lm`, `nama_lm`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '1', 'BAB 1 AYO, MAIN!', 'Ganjil', 'Aktif', '2026-08-04 01:12:06', '2026-08-04 01:18:17'),
(3, 3, 1, '2', 'BAB 2: KAWAN SEIRING', 'Ganjil', 'Aktif', '2026-08-04 01:18:04', '2026-08-04 01:18:04'),
(4, 3, 1, '3', 'BAB 3: PENGOBAR SEMANGAT', 'Ganjil', 'Aktif', '2026-08-04 18:27:22', '2026-08-04 18:27:22'),
(5, 3, 1, '4', 'BAB 4: SENYUM DI SEKITARKU', 'Ganjil', 'Aktif', '2026-08-04 18:30:53', '2026-08-04 18:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint UNSIGNED NOT NULL,
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

INSERT INTO `mapels` (`id`, `kategori_mapel_id`, `kode_mapel`, `nama_mapel`, `kelompok`, `jenis`, `kkm`, `status`, `created_at`, `updated_at`, `guru_id`) VALUES
(1, 1, 'PAI', 'Pendidikan Agama Islam', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(2, 1, 'PKN', 'Pendidikan Pancasila', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(3, 1, 'BIN', 'Bahasa Indonesia', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(4, 1, 'MTK', 'Matematika', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(5, 2, 'IPAS', 'IPAS', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(6, 1, 'SBK', 'Seni Budaya', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(7, 1, 'PJOK', 'PJOK', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(8, 1, 'BSD', 'Bahasa Sunda', 'Intrakurikuler', 'Muatan Lokal', 75, 'Aktif', '2026-07-07 20:07:01', '2026-07-07 20:07:01', NULL),
(15, 2, 'BIG', 'Bahasa Inggris', 'Intrakurikuler', 'Wajib', 75, 'Aktif', '2026-07-22 11:48:05', '2026-07-22 11:48:05', NULL),
(16, 3, 'KKA', 'Koding & Kecerdasan Artifisial', 'Mapel Pilihan', 'Pilihan', 75, 'Aktif', '2026-07-22 11:48:05', '2026-07-22 11:48:05', NULL),
(17, 3, 'ANY', 'Anyaman', 'Mapel Pilihan', 'Pilihan', 75, 'Aktif', '2026-07-22 11:48:05', '2026-07-22 11:48:05', NULL);

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
(74, '2026_08_07_061141_create_alumnis_table', 34);

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

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `siswa_id`, `mapel_id`, `tahun_ajaran_id`, `semester`, `rata_formatif`, `asts`, `asas`, `asat`, `ujian_tulis`, `ujian_lisan`, `nilai_akhir`, `nilai_awal`, `nilai_remedial`, `tanggal_remedial`, `created_at`, `updated_at`, `deskripsi`) VALUES
(126, 557, 3, 1, 'Ganjil', '70.14', '87.50', '90.00', '0.00', NULL, NULL, '83.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(127, 562, 3, 1, 'Ganjil', '59.79', '41.50', '20.00', '0.00', NULL, NULL, '90.00', NULL, '90.00', '2026-08-06', '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(128, 569, 3, 1, 'Ganjil', '32.50', '49.00', '12.00', '0.00', NULL, NULL, '80.00', NULL, '80.00', '2026-08-06', '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(129, 571, 3, 1, 'Ganjil', '49.50', '38.50', '0.00', '0.00', NULL, NULL, '90.00', '29.00', '90.00', '2026-08-06', '2026-08-05 23:45:42', '2026-08-06 06:54:47', NULL),
(130, 574, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(131, 582, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(132, 583, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(133, 587, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(134, 597, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(135, 606, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:35', NULL),
(136, 609, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:36', NULL),
(137, 612, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:36', NULL),
(138, 622, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:42', '2026-08-06 06:36:36', NULL),
(139, 623, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(140, 627, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(141, 629, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(142, 632, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(143, 645, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(144, 650, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(145, 651, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(146, 654, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(147, 663, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(148, 668, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(149, 679, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(150, 684, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(151, 687, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL),
(152, 688, 3, 1, 'Ganjil', '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', NULL, NULL, NULL, '2026-08-05 23:45:43', '2026-08-06 06:36:36', NULL);

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
  `nilai` decimal(5,2) NOT NULL DEFAULT '0.00',
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

--
-- Dumping data for table `nilai_asts_details`
--

INSERT INTO `nilai_asts_details` (`id`, `nilai_id`, `lingkup_materi_id`, `nilai`, `created_at`, `updated_at`) VALUES
(22, 126, 2, '90.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(23, 126, 3, '80.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(24, 126, 4, '90.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(25, 126, 5, '90.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(26, 127, 2, '77.00', '2026-08-06 05:42:39', '2026-08-06 06:36:35'),
(27, 127, 3, '23.00', '2026-08-06 05:42:39', '2026-08-06 06:36:35'),
(28, 127, 4, '43.00', '2026-08-06 05:42:39', '2026-08-06 06:36:35'),
(29, 127, 5, '23.00', '2026-08-06 05:42:39', '2026-08-06 06:36:35'),
(30, 128, 2, '90.00', '2026-08-06 06:08:22', '2026-08-06 06:36:35'),
(31, 128, 3, '1.00', '2026-08-06 06:08:22', '2026-08-06 06:36:35'),
(32, 128, 4, '45.00', '2026-08-06 06:08:22', '2026-08-06 06:36:35'),
(33, 128, 5, '60.00', '2026-08-06 06:08:22', '2026-08-06 06:36:35'),
(34, 129, 2, '90.00', '2026-08-06 06:36:35', '2026-08-06 06:36:35'),
(35, 129, 3, '31.00', '2026-08-06 06:36:35', '2026-08-06 06:36:35'),
(36, 129, 4, '33.00', '2026-08-06 06:36:35', '2026-08-06 06:36:35'),
(37, 129, 5, '0.00', '2026-08-06 06:36:35', '2026-08-06 06:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tp`
--

CREATE TABLE `nilai_tp` (
  `id` bigint UNSIGNED NOT NULL,
  `nilai_id` bigint UNSIGNED NOT NULL,
  `tp_id` bigint UNSIGNED NOT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_tp`
--

INSERT INTO `nilai_tp` (`id`, `nilai_id`, `tp_id`, `nilai`, `created_at`, `updated_at`) VALUES
(71, 126, 2, '14.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(72, 126, 3, '60.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(73, 126, 4, '90.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(74, 126, 5, '90.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(75, 126, 6, '69.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(76, 126, 7, '45.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(77, 126, 8, '78.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(78, 126, 9, '90.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(79, 126, 10, '45.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(80, 126, 11, '89.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(81, 126, 12, '87.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(82, 126, 13, '46.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(83, 126, 14, '89.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(84, 126, 15, '90.00', '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(85, 127, 2, '60.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(86, 127, 3, '30.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(87, 127, 4, '80.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(88, 127, 5, '23.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(89, 127, 6, '88.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(90, 127, 7, '9.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(91, 127, 8, '89.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(92, 127, 9, '78.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(93, 127, 10, '22.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(94, 127, 11, '70.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(95, 127, 12, '98.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(96, 127, 13, '76.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(97, 127, 14, '43.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(98, 127, 15, '71.00', '2026-08-05 23:45:42', '2026-08-06 05:42:39'),
(99, 128, 2, '12.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(100, 128, 3, '22.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(101, 128, 4, '45.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(102, 128, 5, '88.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(103, 128, 6, '32.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(104, 128, 7, '44.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(105, 128, 8, '21.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(106, 128, 9, '30.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(107, 128, 10, '12.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(108, 128, 11, '33.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(109, 128, 12, '20.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(110, 128, 13, '82.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(111, 128, 14, '14.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(112, 128, 15, '0.00', '2026-08-05 23:45:42', '2026-08-06 06:08:22'),
(113, 129, 2, '90.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(114, 129, 3, '40.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(115, 129, 4, '21.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(116, 129, 5, '66.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(117, 129, 6, '45.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(118, 129, 7, '76.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(119, 129, 8, '31.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(120, 129, 9, '34.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(121, 129, 10, '90.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(122, 129, 11, '30.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(123, 129, 12, '23.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(124, 129, 13, '90.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(125, 129, 14, '44.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(126, 129, 15, '13.00', '2026-08-05 23:45:42', '2026-08-06 06:36:35'),
(127, 130, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(128, 130, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(129, 130, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(130, 130, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(131, 130, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(132, 130, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(133, 130, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(134, 130, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(135, 130, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(136, 130, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(137, 130, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(138, 130, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(139, 130, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(140, 130, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(141, 131, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(142, 131, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(143, 131, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(144, 131, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(145, 131, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(146, 131, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(147, 131, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(148, 131, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(149, 131, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(150, 131, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(151, 131, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(152, 131, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(153, 131, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(154, 131, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(155, 132, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(156, 132, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(157, 132, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(158, 132, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(159, 132, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(160, 132, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(161, 132, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(162, 132, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(163, 132, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(164, 132, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(165, 132, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(166, 132, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(167, 132, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(168, 132, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(169, 133, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(170, 133, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(171, 133, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(172, 133, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(173, 133, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(174, 133, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(175, 133, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(176, 133, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(177, 133, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(178, 133, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(179, 133, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(180, 133, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(181, 133, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(182, 133, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(183, 134, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(184, 134, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(185, 134, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(186, 134, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(187, 134, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(188, 134, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(189, 134, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(190, 134, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(191, 134, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(192, 134, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(193, 134, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(194, 134, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(195, 134, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(196, 134, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(197, 135, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(198, 135, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(199, 135, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(200, 135, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(201, 135, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(202, 135, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(203, 135, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(204, 135, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(205, 135, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(206, 135, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(207, 135, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(208, 135, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(209, 135, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(210, 135, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(211, 136, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(212, 136, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(213, 136, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(214, 136, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(215, 136, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(216, 136, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(217, 136, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(218, 136, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(219, 136, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(220, 136, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(221, 136, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(222, 136, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(223, 136, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(224, 136, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(225, 137, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(226, 137, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(227, 137, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(228, 137, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(229, 137, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(230, 137, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(231, 137, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(232, 137, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(233, 137, 10, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(234, 137, 11, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(235, 137, 12, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(236, 137, 13, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(237, 137, 14, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(238, 137, 15, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(239, 138, 2, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(240, 138, 3, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(241, 138, 4, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(242, 138, 5, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(243, 138, 6, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(244, 138, 7, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(245, 138, 8, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(246, 138, 9, NULL, '2026-08-05 23:45:42', '2026-08-05 23:45:42'),
(247, 138, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(248, 138, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(249, 138, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(250, 138, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(251, 138, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(252, 138, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(253, 139, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(254, 139, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(255, 139, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(256, 139, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(257, 139, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(258, 139, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(259, 139, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(260, 139, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(261, 139, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(262, 139, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(263, 139, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(264, 139, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(265, 139, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(266, 139, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(267, 140, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(268, 140, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(269, 140, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(270, 140, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(271, 140, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(272, 140, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(273, 140, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(274, 140, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(275, 140, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(276, 140, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(277, 140, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(278, 140, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(279, 140, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(280, 140, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(281, 141, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(282, 141, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(283, 141, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(284, 141, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(285, 141, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(286, 141, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(287, 141, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(288, 141, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(289, 141, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(290, 141, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(291, 141, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(292, 141, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(293, 141, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(294, 141, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(295, 142, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(296, 142, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(297, 142, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(298, 142, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(299, 142, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(300, 142, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(301, 142, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(302, 142, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(303, 142, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(304, 142, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(305, 142, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(306, 142, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(307, 142, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(308, 142, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(309, 143, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(310, 143, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(311, 143, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(312, 143, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(313, 143, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(314, 143, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(315, 143, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(316, 143, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(317, 143, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(318, 143, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(319, 143, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(320, 143, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(321, 143, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(322, 143, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(323, 144, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(324, 144, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(325, 144, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(326, 144, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(327, 144, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(328, 144, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(329, 144, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(330, 144, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(331, 144, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(332, 144, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(333, 144, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(334, 144, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(335, 144, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(336, 144, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(337, 145, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(338, 145, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(339, 145, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(340, 145, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(341, 145, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(342, 145, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(343, 145, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(344, 145, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(345, 145, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(346, 145, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(347, 145, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(348, 145, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(349, 145, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(350, 145, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(351, 146, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(352, 146, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(353, 146, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(354, 146, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(355, 146, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(356, 146, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(357, 146, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(358, 146, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(359, 146, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(360, 146, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(361, 146, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(362, 146, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(363, 146, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(364, 146, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(365, 147, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(366, 147, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(367, 147, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(368, 147, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(369, 147, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(370, 147, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(371, 147, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(372, 147, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(373, 147, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(374, 147, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(375, 147, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(376, 147, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(377, 147, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(378, 147, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(379, 148, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(380, 148, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(381, 148, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(382, 148, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(383, 148, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(384, 148, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(385, 148, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(386, 148, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(387, 148, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(388, 148, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(389, 148, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(390, 148, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(391, 148, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(392, 148, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(393, 149, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(394, 149, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(395, 149, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(396, 149, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(397, 149, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(398, 149, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(399, 149, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(400, 149, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(401, 149, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(402, 149, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(403, 149, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(404, 149, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(405, 149, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(406, 149, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(407, 150, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(408, 150, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(409, 150, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(410, 150, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(411, 150, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(412, 150, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(413, 150, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(414, 150, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(415, 150, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(416, 150, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(417, 150, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(418, 150, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(419, 150, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(420, 150, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(421, 151, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(422, 151, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(423, 151, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(424, 151, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(425, 151, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(426, 151, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(427, 151, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(428, 151, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(429, 151, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(430, 151, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(431, 151, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(432, 151, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(433, 151, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(434, 151, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(435, 152, 2, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(436, 152, 3, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(437, 152, 4, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(438, 152, 5, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(439, 152, 6, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(440, 152, 7, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(441, 152, 8, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(442, 152, 9, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(443, 152, 10, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(444, 152, 11, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(445, 152, 12, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(446, 152, 13, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(447, 152, 14, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43'),
(448, 152, 15, NULL, '2026-08-05 23:45:43', '2026-08-05 23:45:43');

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

--
-- Dumping data for table `ranking_siswas`
--

INSERT INTO `ranking_siswas` (`id`, `siswa_id`, `kelas_id`, `tahun_ajaran_id`, `semester`, `rata_rata`, `kehadiran`, `ranking`, `created_at`, `updated_at`) VALUES
(1, 557, 29, 1, 'Ganjil', 83, '0.00', 1, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(2, 562, 29, 1, 'Ganjil', 0, '0.00', 2, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(3, 569, 29, 1, 'Ganjil', 0, '0.00', 3, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(4, 571, 29, 1, 'Ganjil', 0, '0.00', 4, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(5, 574, 29, 1, 'Ganjil', 0, '0.00', 5, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(6, 582, 29, 1, 'Ganjil', 0, '0.00', 6, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(7, 583, 29, 1, 'Ganjil', 0, '0.00', 7, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(8, 587, 29, 1, 'Ganjil', 0, '0.00', 8, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(9, 597, 29, 1, 'Ganjil', 0, '0.00', 9, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(10, 606, 29, 1, 'Ganjil', 0, '0.00', 10, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(11, 609, 29, 1, 'Ganjil', 0, '0.00', 11, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(12, 612, 29, 1, 'Ganjil', 0, '0.00', 12, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(13, 622, 29, 1, 'Ganjil', 0, '0.00', 13, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(14, 623, 29, 1, 'Ganjil', 0, '0.00', 14, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(15, 627, 29, 1, 'Ganjil', 0, '0.00', 15, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(16, 629, 29, 1, 'Ganjil', 0, '0.00', 16, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(17, 632, 29, 1, 'Ganjil', 0, '0.00', 17, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(18, 645, 29, 1, 'Ganjil', 0, '0.00', 18, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(19, 650, 29, 1, 'Ganjil', 0, '0.00', 19, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(20, 651, 29, 1, 'Ganjil', 0, '0.00', 20, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(21, 654, 29, 1, 'Ganjil', 0, '0.00', 21, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(22, 663, 29, 1, 'Ganjil', 0, '0.00', 22, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(23, 668, 29, 1, 'Ganjil', 0, '0.00', 23, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(24, 679, 29, 1, 'Ganjil', 0, '0.00', 24, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(25, 684, 29, 1, 'Ganjil', 0, '0.00', 25, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(26, 687, 29, 1, 'Ganjil', 0, '0.00', 26, '2026-08-05 23:46:11', '2026-08-05 23:46:11'),
(27, 688, 29, 1, 'Ganjil', 0, '0.00', 27, '2026-08-05 23:46:11', '2026-08-05 23:46:11');

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
  `nisn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `tingkat`, `kelas_id`, `alamat`, `created_at`, `updated_at`, `nipd`, `tempat_lahir`, `tanggal_lahir`, `agama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status_siswa`, `nama_wali`, `pekerjaan_wali`, `telepon_orangtua`, `tahun_masuk`, `kk`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `jarak_rumah`, `transportasi`, `jalan`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jenis_tinggal`, `nik_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `nik_wali`, `pendidikan_wali`, `penghasilan_wali`, `email`, `skhun`, `penerima_kps`, `no_kps`, `tahun_lahir_ayah`, `tahun_lahir_ibu`, `tahun_lahir_wali`, `no_akta`, `bank`, `rekening`, `nama_rekening`, `kip`, `no_kip`, `nama_kip`, `layak_pip`, `alasan_layak`, `latitude`, `longitude`, `tanggal_kk`, `no_registrasi_akta`) VALUES
(557, '3153158668', '3203112006150004', 'ABDUL HALIM AS\'ARI', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301001', 'CIANJUR', '2015-06-20', 'Islam', 'HAMDAN HADIAT', 'IMAS AISYAH', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112006680003', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115909740003', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(558, '3161124534', '3203110910160003', 'ABDUL RASYID NABHANI', 'L', '2', NULL, 'KP. KUTA', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401001', 'CIANJUR', '2016-10-09', 'Islam', 'YUSUF SYARIPUDIN', 'NENDEN DINI ALAWIYAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085724980626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203281607940001', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203115711940001', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(559, '3173780245', '3203112101170003', 'ADIPATI TAMA BUANA', 'L', '2', NULL, 'KP GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401002', 'CIANJUR', '2017-01-21', 'Islam', 'EDI NURYANI', 'TUTI RAHMAWATI', 'Karyawan Swasta', 'Wiraswasta', 'Aktif', NULL, NULL, '0813380087726', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3216010706820012', 'S1', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116711830002', 'D3', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(560, '3161646072', '3203110602160007', 'ADITYA PUTRA HERMAWAN', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401003', 'CIANJUR', '2016-02-06', 'Islam', 'HERU SARMONO', 'YENI HERIYAWATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083143139305', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111212640010', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114101780055', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(561, '0145708223', '3203114110140002', 'ADWA RAYA AZZAHRA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201001', 'CIANJUR', '2014-10-01', 'Islam', 'AGUS RUSTANDI', 'WIWI MARWIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529266', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110808880026', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115102910009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(562, '3151200324', '3203117003150001', 'AFIFA FITRIYA AZMI', 'P', '3', NULL, 'KP.GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301002', 'CIANJUR', '2015-03-30', 'Islam', 'RALLY HENDRAYANA', 'NURHASANAH SOPIANTI', 'Buruh', 'Lainnya', 'Aktif', NULL, NULL, '085797437982', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110510790003', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114603840005', 'Tidak sekolah', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(563, '3122929146', '3203114907120001', 'AGNIA NURSHILA FUTRI', 'P', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '192001001', 'CIANJUR', '2012-07-09', 'Islam', 'ARIFIN', 'SUSANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529097', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110805710002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115801820010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(564, '0134867764', '3203110104130002', 'AHMAD NASIR', 'L', '5', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101001', 'CIANJUR', '2013-04-01', 'Islam', 'M SAMBAS', 'NURHAYATI', 'Pedagang Kecil', 'Pedagang Kecil', 'Aktif', NULL, NULL, '083842945539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '2', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111505630002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114505710006', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(565, '3170295039', '3203110709170002', 'AHMAD RAZQA ATAYA SUDARYA', 'L', '0', NULL, 'Kp Panahegan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501001', 'CIANJUR', '2017-09-07', 'Islam', 'ERRI RESTIYANDI', 'FITRI SAFITRI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '089510001037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '1', '2', NULL, 'Gasol', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110602880003', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116709960011', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(566, '3138213647', '3203111109130003', 'AHMAD SAPUTRA', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222303067', 'CIANJUR', '2013-09-11', 'Islam', 'AMUN', 'ADAH', 'Buruh', 'Sudah Meninggal', 'Aktif', 'ENI SUMARTINI', 'Tidak bekerja', '088210091720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111708600014', 'SD / sederajat', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', '3203114812730005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(567, '3169338386', '3203112011160003', 'AHMAD WAHIDIN AZMI', 'L', '1', NULL, 'Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501002', 'CIANJUR', '2016-11-20', 'Islam', 'AHMAD SOPARI', 'NARTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083180391780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111004850019', 'SD / sederajat', 'Tidak Berpenghasilan', '3203115005890011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(568, '3147284885', '3203041707140001', 'AKHDAN SONI RAMADHAN', 'L', '4', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201002', 'CIANJUR', '2014-07-17', 'Islam', 'IRPAN SETIAWAN', 'RENI ANGGRAENI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085798724976', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '2', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203040301740002', 'SMP / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(569, '3150614907', '3203116112150002', 'ALENA PUTRI NUGRAHA', 'P', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301004', 'CIANJUR', '2015-12-21', 'Islam', 'ASEP SUDIRMAN', 'ERNA AGUSTIANA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085624570161', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112005820010', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114808870028', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(570, '3178452340', '3203115508170009', 'ALFIA AGUSTINA', 'P', '2', NULL, 'KUTA', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401004', 'CIANJUR', '2017-08-15', 'Islam', 'CAHYADI', 'ANISA SARI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111510670002', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115512900011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(571, '3140610047', '3203115602140001', 'ALFIAH PURWANSIH', 'P', '3', NULL, 'KP. KUTA KULON', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232402038', 'CIANJUR', '2014-02-16', 'Islam', 'ADE PURWANA', 'AYI SUTINAH', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083840155768', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '3', '6', NULL, 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112404630003', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116505850012', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(572, '3176292698', '3203114308170004', 'ALIFHA IRNI ABITILAH', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501003', 'CIANJUR', '2017-08-03', 'Islam', 'IQBAL SOPANDI', 'RINI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087803850743', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110601900011', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115206950010', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(573, '3154743503', '3205236311150001', 'ALIKA PUTRI AZZAHRA', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401005', 'GARUT', '2015-11-23', 'Islam', 'DEDIH', 'PANI HANDAYANI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3205230504760005', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3205236909770001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(574, '3154257741', '3203116306150002', 'ALIKA SITI RAHMAH', 'P', '3', NULL, 'KP GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232402041', 'CIANJUR', '2015-06-23', 'Islam', 'IRMAN FIRMANSYAH', 'IRMA ROHAENI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085780812106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '4', '8', NULL, 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111404820002', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116804850001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(575, '3177971417', '3203114709170002', 'ALISHA AFWA ANEIRA', 'P', '1', NULL, 'Kp Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501004', 'CIANJUR', '2017-09-07', 'Islam', 'ADE SUPRIATNA', 'NENG ANI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203114709170002', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115206910014', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(576, '3132571244', '3203016901130007', 'ALISYA WAHDA', 'P', '5', NULL, 'KP. GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232404045', 'CIANJUR', '2013-01-29', 'Islam', 'AGUS MULYANA', 'ERLIN ROSLINA', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', 'RIZAL IBRAHIM', 'Wiraswasta', '083822479895', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010408910008', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203014601930014', 'SMA / sederajat', 'Tidak Berpenghasilan', '3203111704930004', 'S1', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(577, '3175381025', '3203114302170002', 'ALLFIYAH TAUFIK SIDIK AROSID ARRAS', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501005', 'CIANJUR', '2017-02-03', 'Islam', 'MOHAMAD TAUPIK', 'CUCU KARMILA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085721482398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112610950007', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115112000009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(578, '3125480819', '3203114812120001', 'ALSHIFA ZAHRA', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101005', 'CIANJUR', '2012-12-08', 'Islam', 'ANDI', 'ALIAH WAHYUNI', 'Buruh', 'Sudah Meninggal', 'Aktif', NULL, NULL, '083141529287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111007810020', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116105850010', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(579, '3177225288', '3203111103170001', 'ALTHAF GHAZI AL AHZA', 'L', '1', NULL, 'Jln. Mangunkerta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501006', 'CIANJUR', '2017-03-11', 'Islam', 'YUDI RUSMAYA', 'RATIH SITI WIDIANTI', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085722704414', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '8', 'Gintung', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111208770007', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116202860002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(580, '0141691401', '3203115011140002', 'AMBARADZANA PAHLAWANI', 'P', '4', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201004', 'CIANJUR', '2014-11-10', 'Islam', 'AGUS FRIYANTO', 'ANI HARDIANI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087717245712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110308720001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116408900001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(581, '3155633824', '3203076202150003', 'AMIRA RUBY KURNIA', 'P', '4', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201005', 'CIANJUR', '2015-05-22', 'Islam', 'IRWAN RAHMAT KURNIAWAN', 'NENENG KURNIASIH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203071809740004', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203074905730006', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(582, '3151037689', '3203114706150003', 'ANDINI NUR HOPIPAH ZAHRA', 'P', '3', NULL, 'PLTA SENTRAL', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301005', 'CIANJUR', '2015-06-07', 'Islam', 'TIMI', 'IDAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', 'GINTUNG', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110309600006', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203116502730004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(583, '3162235680', '3203114901160001', 'ANFAL MAULANI', 'P', '3', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301006', 'CIANJUR', '2016-01-09', 'Islam', 'OPAN SOPANDI', 'IMAS NURHAYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083148736357', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111204710003', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116008780011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(584, '3166078230', '3203114506160003', 'ANISA SHAKILA MULYANA', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401006', 'CIANJUR', '2016-06-05', 'Islam', 'ENA SUMPENA', 'YANI MARYANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085798019657', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111707770002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114304790009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(585, '3128336284', '3203115811120002', 'ANISA WARDAH MUPIDAH', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101006', 'CIANJUR', '2012-11-18', 'Islam', 'YAN YAN SOPIAN SAORI', 'DEDAH HASANAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110511880004', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203075207920009', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(586, '0135349976', '3203116109130002', 'ANNISA ADILA SUHENDAR', 'P', '5', NULL, 'Kp. Sarampad', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101007', 'CIANJUR', '2013-09-21', 'Islam', 'DADANG SUHENDAR', 'WINDA WIDIAWATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '3', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203211501900004', 'S1', 'Rp. 500,000 - Rp. 999,999', '3203114811930008', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(587, '3144812635', '3206146506140001', 'ANNISA CIKAL NURAENI', 'P', '3', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301009', 'TASIKMALAYA', '2014-06-25', 'Islam', 'MARIO', 'EVI ERPIYANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3206141707910004', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3206145504910005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(588, '3139322300', '3203285605130003', 'ANNISA RAHANI', 'P', '5', NULL, 'Kp Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101008', 'CIANJUR', '2013-05-16', 'Islam', 'BUNJANA', 'SITI AISYAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203281801760001', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203285512820005', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(589, '3144755872', '3203111209140002', 'ANUGRAH DWI SEPTIAWAN', 'L', '4', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201006', 'CIANJUR', '2014-09-12', 'Islam', 'ADI PRIYANTO', 'YUYUN YUNINGSIH', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110403700001', 'SMP / sederajat', 'Tidak Berpenghasilan', '3203115403840002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(590, '3182174052', '3203115002180004', 'AQILA FEBRIYANTI', 'P', '1', NULL, 'Kp Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501007', 'CIANJUR', '2018-02-10', 'Islam', 'JEJEN JENAL', 'TINA SUPRIYANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110107850486', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114509930006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(591, '3179098749', '3203114110170001', 'ARETA KHAIRA FAATINA ARIFIN', 'P', '1', NULL, 'Mangunkerta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501008', 'CIANJUR', '2017-10-01', 'Islam', 'BUSTANIL ARIFIN', 'FRISKA PURNAMA SARI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085798163738', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '2', '8', 'Gintung', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110311880002', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '1371016007920004', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(592, '3172951069', '3203112704170002', 'ARKHAN ABDULOH BAHRI', 'L', '1', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501009', 'CIANJUR', '2017-04-27', 'Islam', 'ASEP SAEPUL BAHRI', 'ROZA NURHAYATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', '1', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111604910006', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '1809044709930002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(593, '3180107107', '3203114102180001', 'ARSAKHA VIRENDRA INSAN', 'L', '1', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501010', 'CIANJUR', '2018-02-01', 'Islam', 'MOHAMAD TAUFIK INSAN', 'YUNITA DAMIAN SARI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '08992372372', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110201920013', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116006960001', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(594, '3177102649', '3203111806170006', 'ARSYLA RAMADHANI', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501011', 'CIANJUR', '2017-06-18', 'Islam', 'AHMAD RIJAL', 'DEDEH KOMALASARI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110809880005', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203117112900002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(595, '3180086165', '3203114801180001', 'ARSYLLA ROMESSA DAHLAN', 'P', '1', NULL, 'Kp Cangklek', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501012', 'CIANJUR', '2018-01-08', 'Islam', 'ZAENUL DAHLAN', 'GHINA ROCHADATUL AISY SUJANA', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085793422361', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '2', '1', NULL, 'Sukamanah', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203113012950006', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116605950001', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(596, '3128877003', '3203110912120003', 'ASEP APAN HASBUNALOH', 'L', '4', NULL, 'Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201007', 'CIANJUR', '2012-12-09', 'Islam', 'APIPUDIN', 'JANAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111401650003', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114507800007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(597, '3159373481', '3203114508150004', 'ASILA SALWIAH', 'P', '3', NULL, 'PLTA SENTRAL', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301010', 'CIANJUR', '2015-08-05', 'Islam', 'EMAN SUHERMAN', 'ELA LAELA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', 'GINTUNG', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203220905690001', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114110820002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(598, '3169322668', '3203104207160006', 'AWALIA AZILATUSIVA RAMADHANIHANI', 'P', '2', NULL, 'KP.CINENGAH GIRANG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242502061', 'CIANJUR', '2016-07-02', 'Islam', 'RIDWAN ANDRIYANTO', 'NURHAYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda', NULL, '3', '13', NULL, 'Sukanagalih', 'Kec. Pacet', NULL, NULL, '43253', NULL, NULL, 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(599, '3180424695', '3202334703180001', 'AZRINA RAHMATUNNISA ALHIDAYAH', 'P', '1', NULL, 'Kp Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501013', 'SUKABUMI', '2018-03-07', 'Islam', 'M HIDAYAT', 'DEVI RAHMAWATI', 'Karyawan Swasta', 'Karyawan Swasta', 'Aktif', NULL, NULL, '087838666727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3202331507900018', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114301950009', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(600, '3176128313', '3203112709170001', 'AZZAM KHALIF PUTRA', 'L', '1', NULL, 'Kp Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501014', 'CIANJUR', '2017-09-27', 'Islam', 'YADI MULYADI', 'AI KOMALA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111608790007', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115506820012', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(601, '3137292064', '3203110306130005', 'BISMA DIRENDRA', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101009', 'CIANJUR', '2013-06-03', 'Islam', 'TAR SIDI', 'IRA PURNAMA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529289', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110702890011', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114909900007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(602, '3169167056', '3203115605160003', 'BUNGA YUMNA PARIHA', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401007', 'CIANJUR', '2016-05-16', 'Islam', 'SUKARSA', 'RATNASARI', 'Petani', 'Tidak bekerja', 'Aktif', NULL, NULL, '083847259046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110707770021', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114305770011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(603, '3148091274', '3203110902140001', 'CHANTIKA ALMUKARROMAH SOMANTRI', 'P', '5', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212202054', 'CIANJUR', '2014-02-09', 'Islam', 'AGUS SOMANTRI', 'SITI SOPARIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203070701800028', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114110960024', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(604, '3162802909', '3203115206160003', 'CINTA RAYADINATA', 'P', '2', NULL, 'KUTA WETAN', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401008', 'CIANJUR', '2016-06-12', 'Islam', 'ERWIN SUSANTO', 'IKAH KARTIKA NINGSIH', 'Sudah Meninggal', 'Lainnya', 'Aktif', NULL, NULL, '085860486969', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SMA / sederajat', 'Tidak Berpenghasilan', '3203115403890014', 'S1', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(605, '3142654995', '3203066904140003', 'D. NATA ANGGRAENI PUTRI', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201008', 'CIANJUR', '2014-04-29', 'Islam', 'DEDE SUPRIADI', 'EPI NJURAENI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087735343603', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111707800003', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203066201940003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(606, '3168927738', '3203112608150002', 'DAFA KUMARA', 'L', '3', NULL, 'Kp. Babakan Cikadu', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232402039', 'CIANJUR', '2015-08-26', 'Islam', 'HENRA RUKMANA', 'ELSA MAROKA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '089605460013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '5', '1', 'Babakan Cikadu', 'Gasol', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111307920003', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115403920014', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(607, '3143479459', '3203115612140004', 'DARA AZAHRA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201009', 'CIANJUR', '2014-12-16', 'Islam', 'ASEP PERDANA', 'RIKA FITRIANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085721590005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112401880008', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115803950008', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(608, '3177221256', '3203114610170001', 'DELISA FADILAH', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501015', 'CIANJUR', '2017-10-06', 'Islam', 'DENY DARYAMAN', 'HARTINI FITRI LESTARI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083817746817', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203042802910002', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115503940014', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(609, '3156681662', '3210134612150001', 'DESTIANA CARSA CHOIRUNISA', 'P', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301069', 'MAJALENGKA', '2015-12-06', 'Islam', 'ENCO CARSA', 'INA MARLINA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, 'Tidak bekerja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3210131008800081', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116707790005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(610, '3122923902', '3203114712130001', 'DESTIARA DWI AENI SABILA', 'P', '6', NULL, 'Kp. Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '192001004', 'CIANJUR', '2012-12-07', 'Islam', 'RAHMAT NURWIDAYA', 'LIAH HOLILATUL KODARIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529099', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ojek', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111707830001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116810870006', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(611, '3132771970', '3203106209130002', 'DEVI KOMALASARI', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101010', 'CIANJUR', '2013-09-22', 'Islam', 'ROHMAN', 'DEDE DAENAH', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529315', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', '3203104110750020', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(612, '3144889743', '3203117012140003', 'DEVITA ANGGRAENI', 'P', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301012', 'CIANJUR', '2014-12-30', 'Islam', 'DAHLAN', 'POPON', 'Petani', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', 'GINTUNG', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43225', NULL, '3203111203690006', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115907750003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(613, '3185345506', '3203065705180001', 'FAHIRA SHAUMI R', 'P', '1', NULL, 'JL RAYA BOJONGPICUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501016', 'CIANJUR', '2018-05-17', 'Islam', 'MIPTAH PARID', 'WIDYA WIDAYANTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '5', 'KP. RAWASALAK', 'SUKAJAYA', 'Kec. Bojong Picung', NULL, NULL, '43252', NULL, '3203060909870008', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203054202940005', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(614, '3148379427', '3203112808140003', 'FAHRI MUHAMAD ANUGRAH', 'L', '4', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201010', 'CIANJUR', '2014-08-28', 'Islam', 'ROHMAN', 'ISNI ARIYANTI', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SD / sederajat', 'Tidak Berpenghasilan', '3203115406940011', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(615, '3164760008', '3203112712160002', 'FARHAN SATRIA', 'L', '2', NULL, 'PANAHEGAN', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401009', 'CIANJUR', '2016-12-27', 'Islam', 'RIAN HERMAWAN', 'SUWITRI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087735252921', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '1', '2', NULL, 'Gasol', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111609950006', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115710980009', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(616, '3125011225', '3275074506120003', 'FATHIMAH', 'P', '5', NULL, 'Kp. Mangun', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101011', 'BEKASI', '2012-06-05', 'Islam', 'ARIF RAHMAN', 'LILIS WIDIYANINGSIH', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '5', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3275071710750009', 'SMA / sederajat', 'Tidak Berpenghasilan', '3275075309790011', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(617, '3150455730', '3203116901150002', 'FAUZIAH DEMIANTI PUTRI', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201011', 'CIANJUR', '2015-01-29', 'Islam', 'DERI JUNAEDI', 'AMI NURHASANAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110309930007', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(618, '0131438066', '3203044602130002', 'FEBY TESYA HADIYANI', 'P', '6', NULL, 'Kp. Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202102058', 'CIANJUR', '2013-02-06', 'Islam', 'TEDI', 'SITI FATIMAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '0', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43285', NULL, '3203040509840008', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203046112910005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(619, '0128932083', '3203110905120002', 'GALANG MAULANA MUSTOPA', 'L', '6', NULL, 'Kp. Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '192001005', 'CIANJUR', '2012-05-09', 'Islam', 'IYEP MUSTOPA', 'DE ERNI MARLIN', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '3', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111508760001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115201850002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(620, '3143158082', '3203110504140002', 'GIAN SAPUTRA', 'L', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201012', 'CIANJUR', '2014-04-05', 'Islam', 'SUGIARTO', 'DEDE NURJANAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3210172212920041', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115111950023', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(621, '3126177951', '3203116304120001', 'GISA RULI APRIL MULYANTI', 'P', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '192001006', 'CIANJUR', '2012-04-23', 'Islam', 'OMAN', 'CUCU', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110101810040', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115006920018', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(622, '3146119167', '3203116010140006', 'HANA OKTAVIANA', 'P', '3', NULL, 'KP.GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301013', 'CIANJUR', '2014-10-20', 'Islam', 'NALIM', 'LILIS HENDRAYANI', 'Buruh', 'Lainnya', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110502590004', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203110502590004', 'SMA / sederajat', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(623, '3166685988', '3203065101160002', 'HANAA GHAITSAA PUTRI', 'P', '3', NULL, 'KP. DARMAGA', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242503060', 'CIANJUR', '2016-01-11', 'Islam', 'ISAN SANUSI', 'GINA NOVIANA', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '08319314044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '10', NULL, 'SUKARATU', 'Kec. Bojong Picung', NULL, NULL, '43283', NULL, NULL, 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(624, '3146678529', '3203116010140007', 'HANI OKTAVIANI', 'P', '3', NULL, 'GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301014', 'CIANJUR', '2014-10-20', 'Islam', 'NALIM', 'LILIS HENDRAYANI', 'Buruh', 'Lainnya', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110502590004', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203110502590004', 'SMA / sederajat', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `siswas` (`id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `tingkat`, `kelas_id`, `alamat`, `created_at`, `updated_at`, `nipd`, `tempat_lahir`, `tanggal_lahir`, `agama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status_siswa`, `nama_wali`, `pekerjaan_wali`, `telepon_orangtua`, `tahun_masuk`, `kk`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `jarak_rumah`, `transportasi`, `jalan`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jenis_tinggal`, `nik_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `nik_wali`, `pendidikan_wali`, `penghasilan_wali`, `email`, `skhun`, `penerima_kps`, `no_kps`, `tahun_lahir_ayah`, `tahun_lahir_ibu`, `tahun_lahir_wali`, `no_akta`, `bank`, `rekening`, `nama_rekening`, `kip`, `no_kip`, `nama_kip`, `layak_pip`, `alasan_layak`, `latitude`, `longitude`, `tanggal_kk`, `no_registrasi_akta`) VALUES
(625, '3166308958', '3203114306160001', 'HANI PEBRIANTI', 'P', '2', NULL, 'PERKEBUNAN GEDEH GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401011', 'CIANJUR', '2016-06-03', 'Islam', 'AHMAD PERI PEBRIANI', 'SUNARTI', 'Buruh', 'Buruh', 'Aktif', NULL, NULL, '087813673007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112909770001', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116109860004', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(626, '3149280149', '3203015605140002', 'HANIFAH HILYATUL ASFIYA', 'P', '5', NULL, 'Kp. Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101012', 'CIANJUR', '2014-05-16', 'Islam', 'YADI SUPRIYADI', 'FATYA ULFAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010711800019', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203016109820011', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(627, '3158763054', '3203112412150004', 'HASBI', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301015', 'CIANJUR', '2015-12-24', 'Islam', 'OMAN', 'CUCU', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110101810040', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115006920018', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(628, '3185491937', '3203114408180002', 'IKLIMA SALIMATUNNAZIYA ADITYA', 'P', '1', NULL, 'Kp Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501017', 'CIANJUR', '2018-08-04', 'Islam', 'YADI SUPRIYADI', 'FATYA ULFAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087728377231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010711800019', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203016109820011', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(629, '3153472224', '3203111408150003', 'ILHAM PUTRA AFIAR', 'L', '3', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301016', 'CIANJUR', '2015-07-14', 'Islam', 'RULI AFIAR', 'SRI MARLINA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115709740006', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(630, '0164292440', '3203115007160002', 'INDRIA PUTRI NUGRAHA', 'P', '2', NULL, 'SARAMPAD', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401012', 'CIANJUR', '2016-07-10', 'Islam', 'INDRA NUGRAHA ALAM', 'MULYATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085659069629', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '3', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203021002850003', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203116709910005', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(631, '3146813009', '3203114201140003', 'IRMA RUBINA MAHMUDAH', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201013', 'CIANJUR', '2014-01-02', 'Islam', 'MAHMUDIN', 'SITI AISYAH', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110711710003', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115103770003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(632, '3154104110', '3203111809150001', 'JANI KUSNADI', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301017', 'CIANJJUR', '2015-09-18', 'Islam', 'ENGKUS KUSNADI', 'NANI SURYANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111401820009', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114907870006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(633, '3170185518', '3203281601170003', 'JOVI JUANSYAH ABBASY', 'L', '2', NULL, 'Kp Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401052', 'JAKARTA', '2017-01-16', 'Islam', 'YOSI ALFANDI', 'SITI BERKAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '0', '0', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203031408880010', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203285012920004', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(634, '3150391220', '3203116410150001', 'KAILA SYAINA SALSABILA', 'P', '3', NULL, 'KP.GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301018', 'CIANJUR', '2015-10-24', 'Islam', 'WAWAN SOPYAN', 'SITI SAADAH', 'Buruh', 'Lainnya', 'Aktif', NULL, NULL, '08572159005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110601810011', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114605870016', 'SD / sederajat', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(635, '3146638606', '3203114202140001', 'KALISTA FEBRIANI', 'P', '5', NULL, 'Kp Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '202101016', 'CIANJUR', '2014-02-02', 'Islam', 'RENDRA SARIPUDIN', 'AI NURAINI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3217070707800006', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114205930001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(636, '3149739162', '3203116809140002', 'KHAIRUNA SITI MARYAM', 'P', '4', NULL, 'KP. TAJUR', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242504058', 'CIANJUR', '2014-09-28', 'Islam', NULL, 'ITA SITI ROHMAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '5', '3', NULL, 'MUARASARI', 'Kec. Kota Bogor Selatan', NULL, NULL, NULL, NULL, NULL, 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(637, '3187427503', '3203117003180002', 'KHAIRUNNISA SALSABILA PUTRI', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501018', 'CIANJUR', '2018-03-30', 'Islam', 'DUDAN ABDUL HALIM', 'ITA SITI ROHMAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '089687595626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203091010910012', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203115303910007', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(638, '3162877659', '3203116707160001', 'KHANSA AZIZAH PUTRINA SETIAWAN', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '232401013', 'CIANJUR', '2016-07-27', 'Islam', 'ENDANG SETIAWAN', 'AYU GITA DWI SEPTIANI', 'Wiraswasta', 'Lainnya', 'Aktif', NULL, NULL, '087714305556', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110712810001', 'S1', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116509870004', 'S1', 'Rp. 1,000,000 - Rp. 1,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(639, '3155677619', '3203116507150004', 'KHAYLA ALESA ALMIRA', 'P', '3', NULL, 'Kp. Cisarua', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '222301019', 'CIANJUR', '2015-07-25', 'Islam', 'SATYA PERMANA', 'ICHA VIRGITA', 'Buruh', 'Tidak bekerja', 'Aktif', 'ENUNG', 'Tidak bekerja', '083185565452', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203116507150004', 'Tidak sekolah', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115708930016', 'SMP / sederajat', 'Tidak Berpenghasilan', '3203114508650010', 'Tidak sekolah', 'Rp. 500,000 - Rp. 999,999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(640, '3176838854', '3203116912170002', 'LULU SAMROTUL AFIFAH', 'P', '1', NULL, 'kp Kuta', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '242501019', 'CIANJUR', '2017-12-29', 'Islam', 'ENCE', 'SITI NURHAENI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110504850022', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116107880005', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(641, '3141273558', '3203115706140006', 'LUTHFIA FATMA AZZAHRA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:49', '2026-08-05 20:52:49', '212201014', 'CIANJUR', '2014-07-17', 'Islam', 'GUNAWAN', 'ZULVIANI FAUZIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083153290959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111711960006', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203116503970010', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(642, '3177141608', '3203111506170003', 'M AKRAM HARSA', 'L', '1', NULL, 'Kp Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501020', 'CIANJUR', '2017-06-15', 'Islam', 'HARY RIZKI', 'IRA SOPIYANTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085794277151', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203071805860002', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114701920006', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(643, '3158698622', '3203111711150004', 'M ALFAN HALIM AL MAJDANI', 'L', '2', NULL, 'CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401014', 'CIANJUR', '2015-11-17', 'Islam', 'ASEP ROMLI RAMDANI', 'ATIK KARTIKA', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083876066411', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110107610089', 'SD / sederajat', 'Tidak Berpenghasilan', '3203085311800001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(644, '3123520535', '3203110106120010', 'M ANDRI KURNIAWAN', 'L', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001007', 'CIANJUR', '2012-06-01', 'Islam', 'WAHYUDIN', 'SITI NURHALIMAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203125080788000', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203125680494000', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(645, '3163179750', '3203112201160006', 'M ARSYAD ARYA SAURI', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301021', 'CIANJUR', '2016-01-22', 'Islam', 'H AYUNG SUNARYA', 'IDA FARIDA', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111911630003', 'SMA / sederajat', 'Tidak Berpenghasilan', '3203115502720001', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(646, '0139891769', '3203110908130002', 'M AZHKA RAMADHAN', 'L', '5', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101018', 'CIANJUR', '2013-08-09', 'Islam', 'JEJEN JENAL', 'TINA SUPRIYANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529293', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110107850486', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114509930006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(647, '3187276383', '3203112804180003', 'M DALWA SUBANDI', 'L', '1', NULL, 'KP GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501021', 'CIANJUR', '2018-04-28', 'Islam', 'MUHAMAD YUSUP SUPIANDI', 'HETI KUSMIYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '0857222544075', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112307840003', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114202900019', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(648, '3186084513', '3203112804180004', 'M DALWI SUBANDI', 'L', '1', NULL, 'KP GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501022', 'CIANJUR', '2018-04-28', 'Islam', 'MUHAMAD YUSUP SUPIANDI', 'HETI KUSMIYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '0857222544075', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112307840003', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114202900019', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(649, '3175476705', '3203111104170004', 'M ERLANGGA AL MALIK', 'L', '1', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501023', 'CIANJUR', '2017-04-11', 'Islam', 'RUDI SAPRUDI', 'ELAH NURLAELA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', '2', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110202820011', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114805850002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(650, '3158149794', '3203113008150001', 'M FAHRI HARDIANSYAH', 'L', '3', NULL, 'KP. CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301023', 'CIANJUR', '2015-08-30', 'Islam', 'RUDI HARDIAN SOPANDI', 'DIDAH PARIDA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081462241915', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ojek', NULL, '1', '4', '1', 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110707790008', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115504850003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(651, '3158362968', '3203112404150001', 'M FARDAN SUNARYA', 'L', '3', NULL, 'KP.GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301024', 'CIANJUR', '2015-04-24', 'Islam', 'ATENG SUNARYA', 'NYINYI', 'Buruh', 'Lainnya', 'Aktif', NULL, NULL, '083141529659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110311690002', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116909790001', 'SD / sederajat', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(652, '3129355877', '3203111112120002', 'M FIKRI ADRIAN', 'L', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212203063', 'CIANJUR', '2012-12-11', 'Islam', 'ANDRI ABDULAH', 'SITI NURLIAWATI', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', 'ENENG M', 'Buruh', '081222515755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111902790009', 'SMP / sederajat', 'Tidak Berpenghasilan', '3203115010900031', 'SD / sederajat', 'Tidak Berpenghasilan', '3203111902790009', 'Tidak sekolah', 'Rp. 500,000 - Rp. 999,999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(653, '0144296139', '3203112103140002', 'M FIKRI ALFARIZI', 'L', '5', NULL, 'KP. CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222303060', 'CIANJUR', '2014-03-21', 'Islam', 'UJANG RAHMAT', 'SINTA SUSILAWATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083829814786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', '1', 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110203790008', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3201256309820002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(654, '3152489105', '3203111507150002', 'M HAIKAL LUTFAN', 'L', '3', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301025', 'CIANJUR', '2015-07-15', 'Islam', 'AJAT SUDRAJAT', 'WIWIN WINDARSIH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '0878891661390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111511840003', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114109870010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(655, '3135902300', '3203112903130004', 'M HASAN', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101013', 'CIANJUR', '2013-03-29', 'Islam', 'SUMARDI', 'DEDE ELI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110510640012', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114511750008', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(656, '0127862888', '3203110707120003', 'M HASBI ASYABANI AMARULLOH', 'L', '6', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001010', 'CIANJUR', '2012-07-07', 'Islam', 'USEP', 'OMAT', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111502820021', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114606890014', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(657, '3134248453', '3203112903130005', 'M HUSEN', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101014', 'CIANJUR', '2013-03-29', 'Islam', 'SUMARDI', 'DEDE ELI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081462265373', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110510640012', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114511750008', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(658, '0149500677', '3203110107140001', 'M IHSAN ARDI NUGRAHA', 'L', '4', NULL, 'K. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201015', 'CIANJUR', '2014-07-01', 'Islam', 'GANDA PERMANA', 'YANI MULYANI', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085795300638', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111111630004', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116110750002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(659, '3149687980', '3203112903140004', 'M IKSAN FAUZI', 'L', '4', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201016', 'CIANJUR', '2014-03-29', 'Islam', 'D PALAHUDIN', 'SITI HALIMAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083168591241', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '4', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110510850006', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3217125604930014', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(660, '3139676456', '3203112602130002', 'M RAJA PRATAMA', 'L', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001043', 'CIANJUR', '2013-02-26', 'Islam', 'SYAMSUL HASAN', 'ULFI ULFIANISA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SMA / sederajat', 'Kurang dari Rp. 500,000', NULL, 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(661, '3172704768', '3203112605170007', 'M RENDY JAINAL MUTTAKIN', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501024', 'CIANJUR', '2017-05-26', 'Islam', 'OPIK HIDAYAT', 'SUSI ROSITA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110111900023', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116512930005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(662, '3138826622', '3203113006130001', 'M RIBHAN AWALUDIN', 'L', '6', NULL, 'Kp Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001008', 'CIANJUR', '2013-06-30', 'Islam', 'ADE BUDI RAHMAWAN', 'DEUIS AIDATUL FARIDAH', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', '3203115703930001', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(663, '3158958247', '3203110405150001', 'M SOLEHUDIN AL-FATIH', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301026', 'CIANJUR', '2015-05-04', 'Islam', 'OLEH DIN SUTISNO', 'AI PATONAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081911427054', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110202830007', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114208890003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(664, '3146704863', '3203110301140002', 'M TAUFIQ HIDAYAT', 'L', '4', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201017', 'CIANJUR', '2014-01-13', 'Islam', 'UJANG SAEPUDIN', 'EVI SOPIAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110801810001', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114808880003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(665, '3162795303', '3203116412160003', 'M. IBNU HISAMUDIN', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401015', 'CIANJUR', '2016-12-24', 'Islam', 'DODO RUSMANA', 'LISNA EFENDI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083869763396', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112009780001', 'SD / sederajat', 'Tidak Berpenghasilan', '3203115302960015', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(666, '0145080362', '3203112403140001', 'M. PARHAN AL BUHORI', 'L', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201018', 'CIANJUR', '2014-03-24', 'Islam', 'RUSLAN', 'SUMARTINI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085860034226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111306780002', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114107830328', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(667, '3129686572', '3203111106120004', 'M. SAEFUL INDRA CAHYA', 'L', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001009', 'CIANJUR', '2012-06-11', 'Islam', 'OPIK HIDAYAT', 'SUSI ROSITA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110111900023', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116512930005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(668, '3158323207', '3203070711150003', 'MAULANA SYAHRIL IBRAHIM', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232402049', 'CIANJUR', '2015-11-07', 'Islam', 'HENDI FIRMANSYAH', 'ELSA YUNI YULIANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '0895325717926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203071512880014', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203075006970004', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(669, '0146637613', '3203116701140005', 'MAULIDA SARI', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101019', 'CIANJUR', '2014-01-27', 'Islam', 'USEP ISKANDAR', 'SITI SANIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085724567736', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203070510910009', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116210870006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(670, '3172819334', '3203115711170001', 'MELA NURMALASARI', 'P', '1', NULL, 'Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501025', 'CIANJUR', '2017-11-17', 'Islam', 'UJANG MUJTAHIDIN', 'AI ROHAYATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '082717592031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111304840003', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115702870001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(671, '3127832624', '3203116907120001', 'MELANI PEBRIAYANI', 'P', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001011', 'CIANJUR', '2012-07-29', 'Islam', 'PERI', 'SUNARTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112909770001', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116109860009', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(672, '0159852586', '3203116808150001', 'META ALDILLA', 'P', '3', NULL, 'Kp. Kutawetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301027', 'CIANJUR', '2015-08-28', 'Islam', 'WAWAN HERMAWAN', 'DEDE WIDANINGSIH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085861400826', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111207650009', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203110107770003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(673, '3168150900', '3203112911160001', 'MIKO WIDIYANTO', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401016', 'CIANJUR', '2016-11-29', 'Islam', 'AGUS WIDIANTO', 'NINA HERLINA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085795949521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111008790002', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116207770003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(674, '3138438908', '3203072908130004', 'MILKI DIN ISNAEN', 'L', '5', NULL, 'KP. GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232404042', 'CIANJUR', '2013-08-29', 'Islam', 'MOCH LUTFIYANSYAH', 'PIPIT PITRIANI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083822479896', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203070503880011', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203075107870017', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(675, '3158915234', '3203110807140005', 'MOCH ABDUL KHOLIQ', 'L', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201019', 'CIANJUR', '2014-07-08', 'Islam', 'DODO RUSMANA', 'LISNA EFENDI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112009780001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115302960015', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(676, '3170989620', '3203112408170002', 'MOCH ALIF GUNAWAN', 'L', '1', NULL, 'JL PLTA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501026', 'CIANJUR', '2017-08-24', 'Islam', 'NYANYANG SUPRIYATNA', 'KOMALASARI', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', 'KP. GINTUNG', 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203101508670002', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203104704710005', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(677, '3177720488', '3203112112170002', 'MOCH KAMIL AL WANDIYANSYAH', 'L', '1', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501027', 'CIANJUR', '2017-12-21', 'Islam', 'WANDI HERMANSYAH', 'ULPAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '0858214690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010701850016', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203015504870014', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(678, '0139150900', '3203010901130004', 'MOCH MUSLIM ABDUL JABBAR', 'L', '5', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101022', 'CIANJUR', '2013-01-09', 'Islam', 'IPIT KARDIAN', 'SITI MULYANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3202011403750005', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203016409760002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(679, '3150951616', '3203111207150004', 'MOCH RIZQI FATHUL RAHMAN', 'L', '3', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301028', 'CIANJUR', '2015-07-12', 'Islam', 'HANDI', 'SITI HALIMAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087727304282', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203090208900008', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114107940404', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(680, '3158547685', '3203040905150005', 'MOCH SAIK ABDUL MALIK', 'L', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201020', 'CIANJUR', '2015-05-09', 'Islam', 'AJAT AHMAD SUDRAJAT', 'DEDE FITRIA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111101900007', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203044510900014', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(681, '3177922147', '3203111007170001', 'MOCHAMAD DAIROBY KAMIL', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501028', 'CIANJUR', '2017-07-10', 'Islam', 'DADANG SOLEHUDIN', 'MILAH ZAKIATUL ADNAS', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087797390570', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114811950005', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(682, '0132358383', '3203113012130001', 'MOCHAMAD RAYA SAPUTRA', 'L', '4', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201021', 'CIANJUR', '2013-12-30', 'Islam', 'AYI SUNARYA', 'RAHMA SOLIHAT', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087721220963', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110508750002', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116612850006', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(683, '3171139465', '3203112604170003', 'MOCHAMAD REZZA SAMUDRA', 'L', '1', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501029', 'CIANJUR', '2017-04-26', 'Islam', 'AYI SUNARYA', 'RAHMA SOLIHAT', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', '2', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110508750002', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116612850006', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(684, '3153402765', '3203112508150006', 'MOHAMAD MAULANA MANSYUR', 'L', '3', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301030', 'CIANJUR', '2015-08-25', 'Islam', 'DEDE', 'SITI NURHAYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110206800012', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114906890009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(685, '3186758373', '3203111902180001', 'MUH HAFIZ HASANNUDIN', 'L', '1', NULL, 'KP GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501030', 'CIANJUR', '2018-02-19', 'Islam', 'KANDI SUKANDI', 'SITI HINDUN', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '08315751361', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111005780023', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203116707860011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(686, '3171478570', '3203111509170006', 'MUHAMAD AHSAN MAULANA', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501031', 'CIANJUR', '2017-09-15', 'Islam', 'HERU HERYANDI', 'YENI FEBRIANI', 'Wiraswasta', 'Sudah Meninggal', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110509870009', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203117001950007', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(687, '3154978376', '3203111905150003', 'MUHAMAD AKBAR AROHHMAT', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301031', 'CIANJUR', '2015-05-19', 'Islam', 'RAHMAT ARIPIN', 'PATIMAH', 'Buruh', 'Tenaga Kerja Indonesia', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111011820003', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114406800004', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(688, '3146310604', '3203112812140003', 'MUHAMAD ALBI FIRMANSYAH', 'L', '3', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301032', 'CIANJUR', '2014-12-28', 'Islam', 'ATEP', 'SINI SOPIANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087719305886', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110502910002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114107910411', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(689, '0162493497', '3203110103160001', 'MUHAMAD ALIF ALGAZALI', 'L', '3', NULL, 'KP. SARAMPAD', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242503062', 'CIANJUR', '2016-03-01', 'Islam', 'DJAYA NURMANSYAH', 'DESTY NURUL RIZKI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085314779589', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '2', NULL, 'SARAMPAD', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114602960005', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, '(tidak diisi)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(690, '3163091485', '3203112107160001', 'MUHAMAD ARIFKI', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401017', 'CIANJUR', '2016-07-21', 'Islam', 'AHMAD SOLEHUDIN', 'HOLIPAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087774410602', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112807850002', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3206384404920001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(691, '3132195149', '3203112009130004', 'MUHAMAD AZKA RIPAI', 'L', '5', NULL, 'Kp. Kutakulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212202055', 'CIANJUR', '2013-09-20', 'Islam', 'RUSMAN NASIR', 'NANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110611880010', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114107920357', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(692, '3136741064', '3203110305130004', 'MUHAMAD CANDRIKA', 'L', '4', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201022', 'CIANJUR', '2013-05-03', 'Islam', 'CAHYADI', 'ANISA SARI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111510670002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115512900011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(693, '3162908105', '3203110403160003', 'MUHAMAD DAHLAN JAENUL ARIPIN', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401018', 'CIANJUR', '2016-03-04', 'Islam', 'JAJANG', 'NANI', 'Buruh', 'Sudah Meninggal', 'Aktif', NULL, NULL, '085862992510', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111207750059', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114610790006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `siswas` (`id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `tingkat`, `kelas_id`, `alamat`, `created_at`, `updated_at`, `nipd`, `tempat_lahir`, `tanggal_lahir`, `agama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status_siswa`, `nama_wali`, `pekerjaan_wali`, `telepon_orangtua`, `tahun_masuk`, `kk`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `jarak_rumah`, `transportasi`, `jalan`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jenis_tinggal`, `nik_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `nik_wali`, `pendidikan_wali`, `penghasilan_wali`, `email`, `skhun`, `penerima_kps`, `no_kps`, `tahun_lahir_ayah`, `tahun_lahir_ibu`, `tahun_lahir_wali`, `no_akta`, `bank`, `rekening`, `nama_rekening`, `kip`, `no_kip`, `nama_kip`, `layak_pip`, `alasan_layak`, `latitude`, `longitude`, `tanggal_kk`, `no_registrasi_akta`) VALUES
(694, '3147267802', '3203111401140004', 'MUHAMAD ELFAN NURIZKI', 'L', '5', NULL, 'KP. GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232404044', 'CIANJUR', '2014-01-14', 'Islam', 'LUTFI ISKANDAR', 'TINA KARTINI', 'Buruh', 'Tidak bekerja', 'Aktif', 'SYARIP HIDAYAT', 'Buruh', '083822479897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112202850004', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114204920015', 'SD / sederajat', 'Tidak Berpenghasilan', '3203110707520006', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(695, '3159352708', '3203113011150006', 'MUHAMAD FAHRI SUTISNA', 'L', '3', NULL, 'Kp. Kutawetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301033', 'CIANJUR', '2015-11-30', 'Islam', 'AJAT SUTISNA', 'PIPIH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110111850004', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115003880004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(696, '3180688626', '3203110401180001', 'MUHAMAD FATIR AL FAHREZI', 'L', '1', NULL, 'KP GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501032', 'CIANJUR', '2018-01-04', 'Islam', 'M YUSUF', 'SITI AISYAH', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112102690004', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203115703800004', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(697, '3165752856', '3203110609160003', 'MUHAMAD HAIDAR AKBAR', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401019', 'CIANJUR', '2016-09-06', 'Islam', 'ENCEP SUPRIYATNA', 'ELIS SITI SAADAH', 'Lainnya', 'Tidak bekerja', 'Aktif', NULL, NULL, '085795535649', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111209800006', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116703870001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(698, '0126282183', '3203053101120002', 'MUHAMAD HAIKAL AL RIZKI', 'L', '6', NULL, 'Kp. Karangsari', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001012', 'CIANJUR', '2012-01-31', 'Islam', 'AHMAD APANDI', 'TINI', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, '083823091021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Desa/Kel. Karangwangi', 'Kec. Ciranjang', NULL, NULL, '43282', NULL, '3203050204890002', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203055202910010', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(699, '3135098468', '3203112905130002', 'MUHAMAD HAIKAL NURIZQI', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101024', 'CIANJUR', '2013-05-29', 'Islam', 'UJANG SUPERI', 'DEDE RINI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '082320380487', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112107840003', 'Tidak sekolah', 'Rp. 500,000 - Rp. 999,999', '3203116106870005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(700, '3149271154', '3203111101140001', 'MUHAMAD HASBY AL FARIZI', 'L', '4', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201024', 'CIANJUR', '2014-01-11', 'Islam', 'ABDUL SUKUR', 'NURHAYATI', 'Petani', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '4', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203113006700002', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114404820020', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(701, '0127651738', '3203110806120003', 'MUHAMAD IBNU SINA', 'L', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001013', 'CIANJUR', '2012-06-08', 'Islam', 'AHMAD RIJAL', 'DEDEH KOMALASARI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110809880005', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203117112900002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(702, '0142975230', '3203111002140001', 'MUHAMAD IBRAHIM SOPIAN SAPUTRA', 'L', '4', NULL, 'Kp. Sarampad', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201025', 'CIANJUR', '2014-02-10', 'Islam', 'KIKIH SOPANDI', 'DEDEH KARTIKA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '2', '3', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110107640011', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114305760007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(703, '3162789999', '3203110107160001', 'MUHAMAD JAENAL ANWAR MUTTAKIN', 'L', '2', NULL, 'KUTA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401020', 'CIANJUR', '2016-07-01', 'Islam', 'ENJANG', 'SITI NENGSIH', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081461626810', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110802850009', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114709970001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(704, '0132901643', '3203111708130005', 'MUHAMAD NABIL ALPARIJ', 'L', '5', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101025', 'CIANJUR', '2013-08-17', 'Islam', 'SUGIMAN', 'YANTI HARYANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081214695392', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111510620002', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114709820004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(705, '3158717558', '3203112407150005', 'MUHAMAD NAHDIP ALGIPARI', 'L', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201026', 'CIANJUR', '2015-07-24', 'Islam', 'SUGIMAN', 'YANTI HARYATI', 'Lainnya', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111510620002', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114709820004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(706, '3154932809', '3203110303150006', 'MUHAMAD NAUVAL CHAIRRUDDIN', 'L', '4', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201027', 'CIANJUR', '2015-03-03', 'Islam', 'BUDI RUBIYANTO', 'YANTI SUMIATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081909787496', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110303750007', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116107820004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(707, '3156316990', '3203050403150004', 'MUHAMAD RAFA ALPANSYAH', 'L', '3', NULL, 'KP. GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232402051', 'CIANJUR', '2015-03-04', 'Islam', 'AHMAD APANDI', 'TINI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083143235622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ojek', NULL, '2', '8', NULL, 'Desa/Kel. Karangwangi', 'Kec. Ciranjang', NULL, NULL, '43282', NULL, '3203050204890002', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203055202910010', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(708, '0127062343', '3203112611120005', 'MUHAMAD RAFA SULTANA', 'L', '6', NULL, 'Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232405050', 'CIANJUR', '2012-11-26', 'Islam', 'SULTANDI', 'EVA ERFAYANA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Neglasari', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111011910001', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115504890018', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(709, '3150787761', '3203113108150002', 'MUHAMAD RANGGA RAFHANAN', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301034', 'CIANJUR', '2015-08-31', 'Islam', 'ENDANG USMAN', 'SANTI SITI NURJANAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085723191021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110910850007', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116912910002', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(710, '0127804509', '3203080503120004', 'MUHAMAD RIDWAN', 'L', '6', NULL, 'Kp Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001014', 'CIANJUR', '2012-03-05', 'Islam', 'KUSNADI', 'LILIS SOLIHAH', 'Wiraswasta', 'Wiraswasta', 'Aktif', NULL, NULL, '083141529111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203080101800034', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(711, '3123730343', '3203111904120004', 'MUHAMAD RIJKI', 'L', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001015', 'CIANJUR', '2012-04-19', 'Islam', 'M ENUH', 'SITI AMINAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111704880008', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114611930006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(712, '3161635780', '3203111107160001', 'MUHAMAD RIZKI SYAPUTRA JULIANA', 'L', '2', NULL, 'Kp. Pasirgombong', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242502065', 'CIANJUR', '2016-07-11', 'Islam', 'IMAN YANA', 'YUNI AULIANI', 'Wiraswasta', 'Lainnya', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '2', '2', 'Desa/Kel. Sukamulya', 'Kec. Cugenang', NULL, NULL, NULL, NULL, '3203110510820012', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115507860014', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(713, '0106790355', '3203112004100006', 'MUHAMAD SAEPUL ILHAM', 'L', '6', NULL, 'KP. Gununglanjung I', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222304063', 'CIANJUR', '2010-04-20', 'Islam', 'INDRA SAEPUL', 'IMAS NURSIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083142079634', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '6', NULL, 'Cijedil', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112605840011', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115012840010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(714, '3147362518', '3203110311140001', 'MUHAMAD SAEPUL RADIT SETIAWAN', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301035', 'CIANJUR', '2014-11-03', 'Islam', 'INDRA SAEPUL', 'IMAS NURSIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112606840011', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115012640010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(715, '3172707854', '3203110610170001', 'MUHAMAD SAEPULOH', 'L', '1', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501033', 'CIANJUR', '2017-10-06', 'Islam', 'SUMANTA', 'MILAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085711030250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110501690006', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114702740003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(716, '3178820508', '3203111309170001', 'MUHAMAD TEGUH NURUL PALAH', 'L', '1', NULL, 'Kp Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242502034', 'CIANJUR', '2017-09-13', 'Islam', 'NANANG SURYANA', 'DEVI DEPIRA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110306820002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116008920007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(717, '3145968804', '3203111010140003', 'MUHAMAD VIKRI GUNAWAN', 'L', '3', NULL, 'KP.GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301041', 'CIANJUR', '2014-10-10', 'Islam', 'ATAN', 'IMAS M', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111207660012', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203116606750008', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(718, '3165279940', '3203112508160003', 'MUHAMAD WILDAN HAPIZ', 'L', '2', NULL, 'CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401021', 'CIANJUR', '2016-08-25', 'Islam', 'JAFAR SIDIK', 'AI HAMDANAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083894411952', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110412850004', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114102920029', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(719, '3143157388', '3203111202140001', 'MUHAMMAD AHZA PUTRA AFFANDY', 'L', '5', NULL, 'Kp. Salaeurih', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101026', 'CIANJUR', '2014-02-12', 'Islam', 'YUDDY HARUN AFFANDY', 'PEBRIANI PAUZIAH', 'Karyawan Swasta', 'PNS/TNI/Polri', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '2', '1', NULL, 'Benjot', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203012103830018', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115702890001', 'D3', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(720, '3179960850', '3203110611170004', 'MUHAMMAD ALDIRA KAYANA NOVYAN', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501035', 'CIANJUR', '2017-11-06', 'Islam', 'JAJAM S', 'ELLY SYAAIRILAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085798726178', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110607730009', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115404780007', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(721, '3179884157', '3203112612170002', 'MUHAMMAD ALFARIQ ATTALA', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501036', 'CIANJUR', '2017-08-26', 'Islam', 'YUDI MULYADI', 'NIA SUNARTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111907870002', 'SMP / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116504910003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(722, '3158311598', '3203111611150002', 'MUHAMMAD ALI AL-FATAH', 'L', '3', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301036', 'CIANJUR', '2015-11-16', 'Islam', 'AGUS SETIAWAN', 'ETI KUSMAYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111408850002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3202365809790002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(723, '3170370027', '3203072502170003', 'MUHAMMAD ARSYA', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501037', 'CIANJUR', '2017-02-25', 'Islam', 'ARIS IRAWAN', 'NURAENI', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', 'MILAH ZAKIATUL ADNAS', 'Tidak bekerja', '087797390570', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, NULL, NULL, '3203071501960013', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203076408950008', 'SMA / sederajat', 'Tidak Berpenghasilan', '3203114811950005', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(724, '3177384344', '3203111402170001', 'MUHAMMAD BAQIR AL FATHIR', 'L', '1', NULL, 'KP KUTA WETAN', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501038', 'CIANJUR', '2017-02-14', 'Islam', 'RAMLAN', 'NUR\'AENI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', '1', 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203113103890005', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3210045206850021', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(725, '0143348928', '3203112407140003', 'MUHAMMAD ERPHAN RAMADHANI', 'L', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201029', 'CIANJUR', '2014-07-24', 'Islam', 'ERWIN', 'LINA SRI NURWATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087780245342', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111202820013', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114107840178', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(726, '0137635959', '3203111809130003', 'MUHAMMAD FELIX D', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101029', 'CIANJUR', '2013-09-18', 'Islam', 'EMUS MULYADI', 'IIS NURHIMAT', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010304800023', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114501780003', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(727, '0139572202', '3203111303130004', 'MUHAMMAD FHAISAL', 'L', '5', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101030', 'CIANJUR', '2013-03-13', 'Islam', 'MUHAMMAD ISEP SAEPUL IMAM', 'DEWI MARIAM', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112003940005', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114101940055', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(728, '3150240306', '3203111209150002', 'MUHAMMAD HAFIZ', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301038', 'CIANJUR', '2015-09-12', 'Islam', 'RAHMAT', 'TUTI RUSMIATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087839137866', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111806870006', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114811890003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(729, '3173467685', '3203110209170005', 'MUHAMMAD HAIDAR MUKTAFA ULUM', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501039', 'CIANJUR', '2017-09-02', 'Islam', 'DEDEN AHMAD SADULOH', 'EUIS RAHMAWATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '08987567842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111108910005', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116207920003', 'S1', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(730, '3163248189', '3203100910160002', 'MUHAMMAD HAIKAL SAPUTRA', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401023', 'CIANJUR', '2016-10-09', 'Islam', 'ANDRI IRAWAN', 'LAILAN NIRMALASARI', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085925065588', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '42325', NULL, '3203111011860008', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203106908910011', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(731, '0134373339', '3203111911130002', 'MUHAMMAD IBNU HABIB ARIFIN', 'L', '5', NULL, 'kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101031', 'CIANJUR', '2013-11-19', 'Islam', 'BUSTANIL ARIFIN', 'FRISKA PURNAMA SARI', 'Wirausaha', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529302', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110311880002', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '1371016007920004', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(732, '3170888977', '3203112204170003', 'MUHAMMAD MAHARDHIKI SAUZI', 'L', '1', NULL, 'Mangunkerta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501040', 'CIANJUR', '2017-04-22', 'Islam', 'MAMAT', 'ANI SAADAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '6', 'Kuta Kulon', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111205790013', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203044808790024', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(733, '3180526499', '3203111703180006', 'MUHAMMAD NOFAL', 'L', '1', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501041', 'CIANJUR', '2018-03-17', 'Islam', 'ALWI', 'ROHAYATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083140935357', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203130107940708', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115512950016', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(734, '3171199408', '3203110411170004', 'MUHAMMAD RAFIF MUZAKI', 'L', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501042', 'CIANJUR', '2017-11-04', 'Islam', 'RALLY HENDRAYANA', 'NURHASANAH SOPIANTI', 'Wirausaha', 'Tidak bekerja', 'Aktif', NULL, NULL, '085797437982', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110510790003', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114603840005', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(735, '3153864882', '3203113010150005', 'MUHAMMAD RAYHAN', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301039', 'CIANJUR', '2015-10-30', 'Islam', 'SUGIANTO', 'DEWI SRI MULYANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110507970017', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116012970001', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(736, '3178399306', '3203111602170002', 'MUHAMMAD RIAZKA MULYADI', 'L', '1', NULL, 'KP CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501043', 'CIANJUR', '2017-02-16', 'Islam', 'INDRA WAHYUDIN', 'PIPIH SOPIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ojek', NULL, '1', '4', '1', 'SARAMPAD', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111410940012', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114811000001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(737, '3169435717', '3203111305160001', 'MUHAMMAD RIDWAN ZAENUL ABIDIN', 'L', '3', NULL, 'Kp. Kutawetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301040', 'CIANJUR', '2016-05-13', 'Islam', 'RUDI FUAD HASAN', 'DEA AMINAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085323010516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111106890008', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115403950002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(738, '0144233441', '3203110703140001', 'MUHAMMAD RIZQI', 'L', '5', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101032', 'CIANJUR', '2014-03-07', 'Islam', 'RAHMAT SOBANA', 'RANI ANGGRAENI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529636', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112005810007', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116210890002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(739, '3173409656', '3203112105170001', 'MUHAMMAD ROVI', 'L', '1', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501044', 'CIANJUR', '2017-05-21', 'Islam', 'DIDIN', 'AI ILAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', '2', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111203790008', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115003790010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(740, '0132053371', '3203111605130001', 'MUHAMMAD RUSDI AL PARISI', 'L', '5', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101033', 'CIANJUR', '2013-05-16', 'Islam', 'DEDE PERMANA', 'ROHANIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081223069531', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112010820001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116306880002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(741, '3166531300', '3203111008160002', 'MUHAMMAD SEHAN', 'L', '2', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401024', 'CIANJUR', '2016-08-10', 'Islam', 'ALWI', 'ROHAYATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087881576314', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203130107940708', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115512950016', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(742, '3168093096', '3203112106160001', 'MUHAMMAD SHAHEER RAMADANI', 'L', '2', NULL, 'KP. CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401025', 'CIANJUR', '2016-06-21', 'Islam', 'DADAN', 'TIA SETIAWIDI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083829812568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111802800007', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114409930007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(743, '3160818246', '3203111411160003', 'MUHAMMAD SHEHAN', 'L', '1', NULL, 'Kp Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401045', 'CIANJUR', '2016-11-14', 'Islam', 'UJANG SAEPUDIN', 'EVI SOPIAH', 'Petani', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110801810001', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114808880003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(744, '3168263205', '3203114911160003', 'MUTIA NUR AENI', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401026', 'CIANJUR', '2016-11-09', 'Islam', 'EKO SUHERMAN', 'CUCU JUBAEDAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087751689991', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110705700012', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114801750008', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(745, '0121296834', '3203114707120003', 'NADILA RISNAWATI MARWAH', 'P', '6', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001018', 'CIANJUR', '2012-07-07', 'Islam', 'USUP SUPRIADI', 'RIKA RISNAWATI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529115', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111409790001', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114611900010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(746, '3137739384', '3203116208130003', 'NAFIISA SALSABILA KHAIRULLAH', 'P', '5', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101035', 'CIANJUR', '2013-08-22', 'Islam', 'DEDE SUPARDI', 'IIS NURLIAH', 'Pensiunan', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529638', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110704580013', 'S1', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114504830013', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(747, '3174093604', '3203114805170002', 'NAFISA SHABIA MUFIA', 'P', '2', NULL, 'KUTA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401027', 'CIANJUR', '2017-05-08', 'Islam', 'ENCEP FIRMAN', 'SUSILAWATI', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '0858813063083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203041203920007', 'SMP / sederajat', 'Tidak Berpenghasilan', '3203116107900010', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(748, '3167409640', '3203116704160003', 'NAJWA PADILAH', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401028', 'CIANJUR', '2016-04-27', 'Islam', 'DADANG SOLEHUDIN', 'MILAH ZAKIATUL ADNAS', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087719051448', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3023070103870013', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114811950005', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(749, '3151864439', '3203116110150001', 'NATASYA AZZAHRA', 'P', '3', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301042', 'CIANJUR', '2015-10-21', 'Islam', 'ADE RIZAL', 'HABIBAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085717342968', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112110800005', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116109830002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(750, '0127010140', '3203115508120001', 'NAZMA RAMADANI SIREGAR', 'P', '6', NULL, 'Kp Kutakulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001019', 'CIANJUR', '2012-08-15', 'Islam', 'HAIDIR SIREGAR', 'LENI BAHAR SUDIRMAN', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '4', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110507720018', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116806780004', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(751, '3134063489', '3203115004130003', 'NAZWA A R', 'P', '5', NULL, 'Kp. Babakan Cikadu', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232404040', 'CIANJUR', '2013-04-10', 'Islam', 'MISAD SURATMAN', 'LINA MARIANA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ojek', NULL, '5', '1', NULL, 'Cijedil', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3173070702770005', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'S1', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(752, '0129362381', '3203107003120001', 'NAZYATURAHMAT SALSYABILA', 'P', '6', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '181901033', 'CIANJUR', '2012-03-30', 'Islam', 'RAHMATULOH', 'SANTI YULYANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203101308800008', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203105505930018', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(753, '0122526070', '3203115109120001', 'NENG SALSA AYUDISTIRA', 'P', '6', NULL, 'Kp Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001020', 'CIANJUR', '2012-09-11', 'Islam', 'ENCE', 'SITI NURHAENI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110504850022', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116107880005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(754, '0128014814', '3203116712120001', 'NIKMA FAIZA ALDZIKRA', 'P', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001021', 'CIANJUR', '2012-12-27', 'Islam', 'YUDI RUSMAYA', 'RATIH SITI WIDIANTI', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111208770007', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116202860002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(755, '3143182124', '3203116109140001', 'NURZIA AJI ZALFA NAQIYYA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201032', 'CIANJUR', '2014-09-21', 'Islam', 'AJI PUJIJAT', 'NURDIANA AGUSTINA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081563726177', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111410880001', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114108910020', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(756, '3159848688', '3203111901150001', 'PADIL PADLALUDIN', 'L', '3', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301043', 'CIANJUR', '2015-01-19', 'Islam', 'DIDIN', 'AI ILAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111203790008', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115003790010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(757, '3137984180', '3203116512130003', 'PUTRI', 'P', '5', NULL, 'KP. JAMARAS', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222303068', 'CIANJUR', '2013-12-25', 'Islam', 'ANDI SOPIAN', 'SUMINAR', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083142089427', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SD / sederajat', 'Tidak Berpenghasilan', '3203114802920006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(758, '3123148770', '3203115204120003', 'PUTRI HARNIKA SALSA BAYINAH', 'P', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001022', 'CIANJUR', '2012-04-12', 'Islam', 'JAJAM', 'ELLY SYAAIRILAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085798726178', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110607730009', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115404780007', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(759, '3126089120', '3203114403120003', 'QORY NOVIKA', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101036', 'CIANJUR', '2012-03-04', 'Islam', 'ADE USNUDIN', 'ENAH SUTIANAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529639', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110103690004', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115010730001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(760, '3156724773', '3203112911150002', 'RADIT NAUVAL AKBAR', 'L', '3', NULL, 'Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301044', 'CIANJUR', '2015-11-29', 'Islam', 'JAMALUDIN', 'MELY MELIANA', 'Buruh', 'Lainnya', 'Aktif', NULL, NULL, '083126248556', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203060107840430', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203117006940001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(761, '3126461695', '3203110903120006', 'RADITYA', 'L', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001023', 'CIANJUR', '2012-03-29', 'Islam', 'HARUN', 'SRI HARYATI', 'Wiraswasta', 'Buruh', 'Aktif', NULL, NULL, '083141529121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112005820007', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203114804840011', 'SMP / sederajat', 'Kurang dari Rp. 500,000', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(762, '3139771990', '3203115110130002', 'RAHMA ARSILA SHIFA', 'P', '5', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101037', 'CIANJUR', '2013-10-11', 'Islam', 'EMAN', 'AAS ASIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111405830005', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114607880004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `siswas` (`id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `tingkat`, `kelas_id`, `alamat`, `created_at`, `updated_at`, `nipd`, `tempat_lahir`, `tanggal_lahir`, `agama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status_siswa`, `nama_wali`, `pekerjaan_wali`, `telepon_orangtua`, `tahun_masuk`, `kk`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `jarak_rumah`, `transportasi`, `jalan`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jenis_tinggal`, `nik_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `nik_wali`, `pendidikan_wali`, `penghasilan_wali`, `email`, `skhun`, `penerima_kps`, `no_kps`, `tahun_lahir_ayah`, `tahun_lahir_ibu`, `tahun_lahir_wali`, `no_akta`, `bank`, `rekening`, `nama_rekening`, `kip`, `no_kip`, `nama_kip`, `layak_pip`, `alasan_layak`, `latitude`, `longitude`, `tanggal_kk`, `no_registrasi_akta`) VALUES
(763, '0143103249', '3203116709140002', 'RAIDA PUTRI', 'P', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201033', 'CIANJUR', '2014-09-27', 'Islam', 'RAHMAT HIDAYAT', 'SRI NOVIYANTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085724579511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111305820002', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116304920007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(764, '3176668446', '3202331203170002', 'RAIHAN ABDUL HAFIZ', 'L', '1', NULL, 'KP CISARUA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501046', 'CIANJUR', '2017-03-12', 'Islam', 'EGI RIZKI MUHAMMAD', 'VITRIA YASAN', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '2', '4', '1', 'SARAMPAD', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3202331705920001', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116503930002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(765, '3125418702', '3203112102120001', 'RAMLAN SEPTIADI', 'L', '6', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001024', 'CIANJUR', '2012-02-21', 'Islam', 'ADE DORIP', 'ENUNG', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110706750004', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114503810001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(766, '0129983121', '3203114110120004', 'RATIKA RAHMA', 'P', '6', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001025', 'CIANJUR', '2012-10-01', 'Islam', 'GUNAWAN', 'ENTAT', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110107710122', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114107760141', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(767, '0143046701', '3203116006140001', 'RATU PUTRI NAKAMI', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201034', 'CIANJUR', '2014-06-20', 'Islam', 'ASEP SODIKIN', 'ADE WAHYUNINGSIH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081461239466', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112406740004', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116912790011', 'D4', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(768, '3164826410', '3203112908160002', 'RENDI SAPUTRA', 'L', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401033', 'CIANJUR', '2016-08-29', 'Islam', 'SAEPULOH', 'EROS ROSITA', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '085794005748', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110206640006', 'SD / sederajat', 'Tidak Berpenghasilan', '3203116107730009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(769, '3159368832', '3203281609150001', 'REVAN SEPTHIANDI', 'L', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301047', 'CIANJUR', '2015-09-16', 'Islam', 'TATAN SUHENDI', 'IKAH NURSILAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087714516024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111101830009', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203284206870006', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(770, '3136495037', '3203111601130002', 'RICO SATRIA PERMANA', 'L', '5', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212203059', 'CIANJUR', '2013-01-16', 'Islam', 'TIA SATYA PERMANA', 'ICHA VIRGITA', 'Buruh', 'Buruh', 'Aktif', NULL, NULL, '083141584497', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '2', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115708930016', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(771, '3126250558', '3203110512120001', 'RIZKI MAULANA ARPAH', 'L', '5', NULL, 'Kp. Kutakulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101039', 'CIANJUR', '2012-12-05', 'Islam', 'SOLEH SOPIANDI', 'RATIH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085795409563', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '2', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112009840011', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114205910023', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(772, '3154606005', '3203111401150002', 'SAFA MAULIDIA PUTRI', 'P', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301048', 'CIANJUR', '2015-01-14', 'Islam', 'ADE RIDWAN', 'TATI SULASTRI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '082130727464', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110101740040', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116008790003', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(773, '3138607314', '3203111703130002', 'SAHRUL GUNAWAN', 'L', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001026', 'CIANJUR', '2013-03-17', 'Islam', 'ACENG', 'MUMUN', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529127', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110306570001', 'Tidak sekolah', 'Tidak Berpenghasilan', '3203111703130002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(774, '3152751121', '3203116001150002', 'SALMA MAULIDA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201035', 'CIANJUR', '2015-01-20', 'Islam', 'ILHAM SURYANA', 'CUCU SALAMAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085864587249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112608080042', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116102830002', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(775, '3132416577', '3203114906130004', 'SALMAH WIDIYA', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101041', 'CIANJUR', '2013-06-09', 'Islam', 'EKO SUHERMAN', 'CUCU JUBAEDAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, 'Lainnya', '083141529642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110705700012', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114801750008', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(776, '3149291199', '3203115706140008', 'SALSABILA NADIFA NISA', 'P', '4', NULL, 'JLN.H.HALIM KP.WAAS RT02/RW15', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201064', 'CIANJUR', '2014-06-17', 'Islam', NULL, 'MERY MERIAM', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087720012273', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, NULL, NULL, NULL, 'Sabandar', 'Kec. Cugenang', NULL, NULL, NULL, NULL, NULL, 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', NULL, 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(777, '3146768122', '3203115011140003', 'SALWA HUMAIRA NABILA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201037', 'CIANJUR', '2014-11-10', 'Islam', 'ENANG HIDAYAT', 'KARSIDAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110307690006', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114504780010', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(778, '0148076268', '3203116309140004', 'SALWA NURSAFITRI', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201038', 'CIANJUR', '2014-09-23', 'Islam', 'EMUS MULYADI', 'IIS NURHIMAT', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010304800023', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114501780003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(779, '3141814381', '3203044206140004', 'SANY AIRA FITRI', 'P', '4', NULL, 'Kp. Kuta Kidul', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201039', 'CIANJUR', '2014-06-02', 'Islam', 'IPIN MAULANA', 'ERNI KUSMAYANTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '1', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203040711860007', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203045011900014', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(780, '3187399072', '3203114907180002', 'SAPITRI ALAWIYAH', 'P', '1', NULL, 'Kp Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501047', 'CIANJUR', '2018-07-09', 'Islam', 'HERI', 'NENG NAHDIHATUL KAROMAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085920586535', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110407890006', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203106702950007', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(781, '3172973012', '3203115811170001', 'SAQILLA FARIZA MUFIA YUSUF', 'P', '1', NULL, 'Kp Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501048', 'CIANJUR', '2017-11-18', 'Islam', 'H YUSUP', 'SITI ROHIMAT', 'Sudah Meninggal', 'Sudah Meninggal', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(782, '3179792861', '3203276212170001', 'SARAH ARSYILA', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501049', 'CIANJUR', '2017-12-22', 'Islam', 'TAKI YUDIN', 'FITRI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203271702890001', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203274706970003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(783, '0141014187', '3203115109140001', 'SEPTI NURROSMAYANTI', 'P', '4', NULL, 'Kp. Kuts Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201040', 'CIANJUR', '2014-09-11', 'Islam', 'UTIN SOLEHUDIN', 'SITI ROHMAH', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '085721372430', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010810830023', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114611850007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(784, '3175998554', '3203111809170004', 'SIHAB BUDIN NUROHMAN', 'L', '1', NULL, 'Kp Kutawetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501050', 'CIANJUR', '2017-09-18', 'Islam', 'ECEP NASIRUDIN', 'MIMAH MAEMUNAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083896999441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110711760003', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114508850011', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(785, '3168524134', '3203114106160001', 'SILFI ANJANI', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401034', 'CIANJUR', '2016-06-01', 'Islam', 'ATAN', 'IMAS M', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085624626539', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111207660012', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203116606750008', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(786, '0144081816', '3203016301140003', 'SILVIA RAHMAWATI', 'P', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201041', 'CIANJUR', '2014-01-23', 'Islam', 'WANDI HERMANSYAH', 'ULPAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010701850016', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203015504870014', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(787, '3172543748', '3203116007170003', 'SITI AQILA MAULIDA', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501051', 'CIANJUR', '2017-07-20', 'Islam', 'DADANG RUSMANA', 'ELA NURLAELA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '0831141529699', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111010800016', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116109870003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(788, '3146254117', '3203115903140002', 'SITI DINAR SUNDUSAH', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201042', 'CIANJUR', '2014-03-19', 'Islam', 'ARIEF SYARIFULLOH', 'SITI AISYAH', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112411640003', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115006680004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(789, '0153492777', '3203115205130005', 'SITI FATIMAH', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101042', 'CIANJUR', '2013-05-12', 'Islam', 'SOBUR', 'AAN NURJANAH', 'Lainnya', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529643', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'Tidak sekolah', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114509900004', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(790, '0134682590', '3203114105130001', 'SITI FATIMAH AZZAHRA', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101043', 'CIANJUR', '2013-05-01', 'Islam', 'TAIFUR YUSUP', 'IDA YUHANIDA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111607759997', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114205850006', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(791, '3142298566', '3203116109140002', 'SITI HALIMAH', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201043', 'CIANJUR', '2014-09-21', 'Islam', 'BAEHAKI', 'MASNUNIH', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111702710001', 'SD / sederajat', 'Tidak Berpenghasilan', '3203115710830003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(792, '3150236833', '3203114312150002', 'SITI HALIMAH MAULANA', 'P', '3', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301051', 'CIANJUR', '2015-12-03', 'Islam', 'IRWAN MAULANA', 'JUARSIH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081211389897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '3', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203011611890012', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114801930005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(793, '3183113609', '3203116501180002', 'SITI HUSNA GUNAWAN', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501052', 'CIANJUR', '2018-01-25', 'Islam', 'GUNAWAN', 'AI SUBAEKAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087719886417', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110101910067', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203116807950012', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(794, '3142238438', '3203116807140005', 'SITI HUSNA NURPITRIA', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201044', 'CIANJUR', '2014-07-28', 'Islam', 'NURDIN', 'SUSI NURSILAH', 'Buruh', 'Sudah Meninggal', 'Aktif', 'ULOH SAEPULOH', 'Buruh', '089510687027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, NULL, 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, 'Tidak sekolah', 'Tidak Berpenghasilan', '3203112206600004', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(795, '3128870512', '3203116712120003', 'SITI INAYAH', 'P', '6', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001027', 'CIANJUR', '2012-12-27', 'Islam', 'DAHLAN', 'POPON', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529128', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111203690006', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115907750003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(796, '3151619648', '3203114302150004', 'SITI INAYAH', 'P', '3', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301052', 'CIANJUR', '2015-02-03', 'Islam', 'ASOM', 'SITI NURJANAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203120404760016', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115610950001', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(797, '3127371604', '3203115008120002', 'SITI JUARIAH RISWANDI', 'P', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001028', 'CIANJUR', '2012-08-10', 'Islam', 'ROHMAN RISWANDI', 'SITI MULYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110609880001', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115411950011', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(798, '3157772407', '3203115303150004', 'SITI KIBTIAH', 'P', '3', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301053', 'CIANJUR', '2015-03-13', 'Islam', 'DUDUN', 'AI SOLIHAT', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110404640002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115202770003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(799, '3125891790', '3203116705120003', 'SITI MARWAH', 'P', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001030', 'CIANJUR', '2012-05-27', 'Islam', 'KANDI SUKANDI', 'SITI HINDUN', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111005780023', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203116707820008', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(800, '0137320732', '3203114102130003', 'SITI NURAISAH', 'P', '6', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001031', 'CIANJUR', '2013-02-01', 'Islam', 'SAEPULOH', 'NAENAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083194227851', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '1', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203072112830005', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203074208830010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(801, '3176057762', '3203116506170004', 'SITI NURAJMI SYAFITRI', 'P', '1', NULL, 'Mangunkerta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501053', 'CIANJUR', '2017-06-25', 'Islam', 'ALWANUDIN', 'AI SITI SUANSAH', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, '087721262223', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '4', '8', 'Gintung', 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112207810001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115708820003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(802, '0145671584', '3203096001140002', 'SITI NURLALAH', 'P', '5', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101046', 'CIANJUR', '2014-01-02', 'Islam', 'NURJAMAN', 'TITA LAELA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529307', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203090405900004', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203094908990013', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(803, '3148754728', '3203116005140003', 'SITI NURTISYA MEIDINA ARIFIN', 'P', '5', NULL, 'Kp. Mangun', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101047', 'CIANJUR', '2014-05-20', 'Islam', 'UJANG JAENAL ARIFIN', 'NENI PURWANTI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081572487784', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '2', '5', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110105810015', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114812860005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(804, '3134851002', '3203105904130002', 'SITI RAHMAWATI', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101048', 'CIANJUR', '2013-04-19', 'Islam', 'SOPIAN', 'RIRIN ARYANI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203102909810007', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203105709820011', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(805, '3121664311', '3203115107120007', 'SITI ROBIATUL ADAWIAH', 'P', '6', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001032', 'CIANJUR', '2011-07-11', 'Islam', 'DUDUN', 'AI SOLIHAT', 'Petani', 'Tidak bekerja', 'Aktif', NULL, NULL, '083168590962', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110404640002', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115202770003', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(806, '0132605293', '3203114712130002', 'SITI ROHIMAH', 'P', '5', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101049', 'CIANJUR', '2013-12-07', 'Islam', 'ANDRI WAHYU SAPUTRA', 'PITRI SUMIATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529122', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '3', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112808880009', 'SMA / sederajat', 'Kurang dari Rp. 500,000', '3203114704960014', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(807, '0143695148', '3203115209140001', 'SITI SAHILA', 'P', '4', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201047', 'CIANJUR', '2014-09-12', 'Islam', 'UJANG SOPANDI', 'LIA NUR SADIAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087867410736', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111508790016', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114707830017', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(808, '3148794508', '3203116212140001', 'SITI SALMAH', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201048', 'CIANJUR', '2014-12-22', 'Islam', 'AHMAD NYANYANG', 'SITI NURAENI', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110806760008', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203116506840003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(809, '3131028511', '3203116608130005', 'SITI SALMAH ADAWIAH', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101050', 'CIANJUR', '2013-08-26', 'Islam', 'MOCHAMAD SOPYAN', 'S. ROHIMAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110808740002', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203115608870002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(810, '3125866264', '3203114309120003', 'SITI SALSIAH AZIZAH', 'P', '6', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001033', 'CIANJUR', '2012-09-03', 'Islam', 'MOCHAMAD SOPYAN', 'S. ROHIMAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110808740002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115608870002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(811, '3172417913', '3203117107170002', 'SITI SAPA SOPIAH', 'P', '1', NULL, 'KP. GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501054', 'CIANJUR', '2017-07-31', 'Islam', 'ADE', 'ANI SADIYAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111510640001', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203114705740013', 'Tidak sekolah', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(812, '3157850614', '3203116708150008', 'SITI SHALWA', 'P', '3', NULL, 'KP.GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301055', 'CIANJUR', '2015-08-27', 'Islam', 'ADE MISBAHUDIN', 'SITI NUR LELA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085723513239', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110407660002', 'Tidak sekolah', 'Kurang dari Rp. 500,000', '3203115208740009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(813, '3154674028', '3203285311150003', 'SITI SILVA NOVIANA', 'P', '1', NULL, 'Kp Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501055', 'CIANJUR', '2015-11-13', 'Islam', 'ANDI KUSNADI', 'AI GEUGEU', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111605820007', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116202910005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(814, '3140478956', '3203116208140008', 'SITI SOPIAH NASYA', 'P', '4', NULL, 'Jl. Agropolitan, Kp. Jolok', '2026-08-05 20:52:50', '2026-08-05 20:52:50', NULL, 'CIANJUR', '2014-08-22', 'Islam', 'SUNARYA', 'NUR ALIAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '5', '2', NULL, 'Sindangjaya', 'Kec. Cipanas', NULL, NULL, '43253', NULL, '3203110106920027', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203285009940005', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(815, '3137865716', '3203116703130004', 'SITI TAMIMATUS SAADAH', 'P', '6', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001034', 'CIANJUR', '2013-03-27', 'Islam', 'DIDIN', 'AI ILAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529135', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111203790008', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115003790010', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(816, '3146226583', '3203115410140005', 'SITI TANTRI HIDAYAT', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201049', 'CIANJUR', '2014-10-14', 'Islam', 'TATANG HIDAYAT', 'SITI SAADAH', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '087728925037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112610840002', 'SMP / sederajat', 'Kurang dari Rp. 500,000', '3203024607940013', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(817, '3129894195', '3203114509120009', 'SITI ULFAH', 'P', '6', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001035', 'CIANJUR', '2012-09-05', 'Islam', 'SOLIHIN', 'IDAH', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110804690001', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203115510740007', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(818, '3137969095', '3203115604130003', 'SITI ZAHRA KHUMAIRA', 'P', '5', NULL, 'SADANG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232404046', 'CIANJUR', '2013-04-16', 'Islam', 'JAMAL SOPYAN', 'ITA SARININGSIH', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '5', '8', NULL, 'MARGAHAYU TENGAH', 'Kec. Margahayu', NULL, NULL, '40225', NULL, '3203070603860014', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203075308880003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(819, '3151775968', '3203116601150003', 'SITY AZERA NUR HINDAYAH', 'P', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201050', 'CIANJUR', '2015-01-26', 'Islam', 'KOMARUDIN', 'ERNI RUSTINI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083162760025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203112511840005', 'SD / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203114509900009', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(820, '3183226373', '3203114105180003', 'SYAFIRA MEIDA ARYANTI', 'P', '1', NULL, 'JL PLTA', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501056', 'CIANJUR', '2018-05-01', 'Islam', 'YULIANTO', 'RANTI RATNAWATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '082118572337', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', 'KP. GINTUNG', 'MANGUNKERTA', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3301070807940001', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116601880003', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(821, '3155937875', '3203114308150001', 'SYALWA BUNGA CINTA PUTRI MULYADI', 'P', '3', NULL, 'Kp. Kuta Wetan', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301058', 'CIANJUR', '2015-08-03', 'Islam', 'DEDI MULYADI', 'PUTRI NONA SRI RAHAYU', 'Karyawan Swasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '0812204917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111204860004', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116010870004', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(822, '3160364210', '3203115503160002', 'SYEHANNA FADILLAH', 'P', '2', NULL, 'CUGENANG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401035', 'CIANJUR', '2016-03-15', 'Islam', 'HANWANG FADILLAH', 'MAYLOLI', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Angkutan umum/bus/pete-pete', NULL, '3', '1', NULL, 'Cijedil', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111503900009', 'SMA / sederajat', 'Tidak Berpenghasilan', '3203114205770003', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(823, '3180260844', '3203115702180002', 'SYIFA NUR ISWANTI', 'P', '1', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '242501057', 'CIANJUR', '2018-02-17', 'Islam', 'EMUS MULYADI', 'IIS NURHIMAT', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, '087764622544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203010304800023', 'SMP / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203114501780003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(824, '3132167677', '3203114703130001', 'TIARA PUTRI ALPAHIRA', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101051', 'CIANJUR', '2013-03-07', 'Islam', 'IRPA SUNGKAWA', 'RISMA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529310', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '4', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111311860002', 'SD / sederajat', 'Kurang dari Rp. 500,000', '3203116409920003', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(825, '3145878424', '3203106606140002', 'TIARA SEPTIANI', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201051', 'CIANJUR', '2014-06-26', 'Islam', 'A MUJIB', 'NURMAYANTI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203100303840024', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115809860002', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(826, '0134367596', '3203115301130001', 'TRISYA MAULIDA', 'P', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222303061', 'CIANJUR', '2013-01-13', 'Islam', 'RISMAN', 'DEDE IKA', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '083142455387', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111207870016', 'SMA / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203115006920016', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(827, '0142918488', '3203116806140002', 'YUMNA SYAKHIRAH', 'P', '4', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201052', 'CIANJUR', '2014-06-28', 'Islam', 'HERU', 'HANI AGUSTINI', 'Wiraswasta', 'Karyawan Swasta', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111703840009', 'SMA / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116308850004', 'SMA / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(828, '3160289231', '3203110410160004', 'YUSUF AWAL MUHARAM', 'L', '2', NULL, 'KUTA WETAN', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401036', 'CIANJUR', '2016-10-04', 'Islam', 'RIZAL MUBAROK', 'DIAN MARLIANI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '085862637557', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '1', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110809890011', 'SD / sederajat', 'Rp. 2,000,000 - Rp. 4,999,999', '3203114703910010', 'SMA / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(829, '0149806442', '3203111201140001', 'YUSUP RASYID HIDAYAT', 'L', '5', NULL, 'Kp. Kuta Kulon', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101052', 'CIANJUR', '2014-01-12', 'Islam', 'RAHMAT HIDAYAT', 'YATI SULISTIASARI', 'Karyawan Swasta', 'PNS/TNI/Polri', 'Aktif', NULL, NULL, '087820292221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sepeda motor', NULL, '4', '6', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111002720011', 'S1', 'Rp. 2,000,000 - Rp. 4,999,999', '3203116904780004', 'S1', 'Rp. 2,000,000 - Rp. 4,999,999', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(830, '3123340668', '3203116208120001', 'ZAHRA SYAWALIA AGUSTINA', 'P', '6', NULL, 'Kp. Kuta', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '192001038', 'CIANJUR', '2012-08-22', 'Islam', 'ACE MUPLIHUDIN', 'SUSILAWATI', 'Sudah Meninggal', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '7', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111605700011', 'SMP / sederajat', 'Tidak Berpenghasilan', '3203116107900010', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(831, '0147449978', '3203116503140005', 'ZAKIRA AFTANI', 'P', '4', NULL, 'Kp. Cisarua', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '212201053', 'CIANJUR', '2014-03-25', 'Islam', 'YADI MULYADI', 'AI KOMALA', 'Wiraswasta', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '2', '4', NULL, 'Sarampad', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111608790007', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115506820012', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `siswas` (`id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `tingkat`, `kelas_id`, `alamat`, `created_at`, `updated_at`, `nipd`, `tempat_lahir`, `tanggal_lahir`, `agama`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status_siswa`, `nama_wali`, `pekerjaan_wali`, `telepon_orangtua`, `tahun_masuk`, `kk`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `jarak_rumah`, `transportasi`, `jalan`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jenis_tinggal`, `nik_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `nik_wali`, `pendidikan_wali`, `penghasilan_wali`, `email`, `skhun`, `penerima_kps`, `no_kps`, `tahun_lahir_ayah`, `tahun_lahir_ibu`, `tahun_lahir_wali`, `no_akta`, `bank`, `rekening`, `nama_rekening`, `kip`, `no_kip`, `nama_kip`, `layak_pip`, `alasan_layak`, `latitude`, `longitude`, `tanggal_kk`, `no_registrasi_akta`) VALUES
(832, '3159965207', '3203111911150001', 'ZAMZAM ABDUL MUGNI', 'L', '3', NULL, 'Kp Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '222301059', 'CIANJUR', '2015-11-19', 'Islam', 'DINDIN TAJMUDIN', 'AI MARYATI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203111203800016', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116312790001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(833, '0131094480', '3203111802130003', 'ZAQI MUHAMMAD ARKAN', 'L', '5', NULL, 'Kp. Gintung', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '202101053', 'CIANJUR', '2013-02-18', 'Islam', 'DENY DARYAMAN', 'HARTINI FITRI LESTARI', 'Buruh', 'Tidak bekerja', 'Aktif', NULL, NULL, '081945472938', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203042802910002', 'SMP / sederajat', 'Rp. 1,000,000 - Rp. 1,999,999', '3203115503940014', 'SMP / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(834, '3174091201', '3203116503170004', 'ZIA HAYATUL HIKAM', 'P', '2', NULL, 'GINTUNG', '2026-08-05 20:52:50', '2026-08-05 20:52:50', '232401037', 'CIANJUR', '2017-03-25', 'Islam', 'ATENG SUNARYA', 'NYINYI', 'Pedagang Kecil', 'Tidak bekerja', 'Aktif', NULL, NULL, '083141529659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan kaki', NULL, '3', '8', NULL, 'Mangunkerta', 'Kec. Cugenang', NULL, NULL, '43252', NULL, '3203110311690002', 'SD / sederajat', 'Rp. 500,000 - Rp. 999,999', '3203116909790001', 'SD / sederajat', 'Tidak Berpenghasilan', NULL, 'Tidak sekolah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajarans`
--

INSERT INTO `tahun_ajarans` (`id`, `created_at`, `updated_at`, `tahun_ajaran`, `semester`, `status`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, NULL, '2026-07-07 23:21:31', '2026/2027', 'Ganjil', 'Aktif', '2026-07-13', '2027-06-25');

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

--
-- Dumping data for table `tujuan_pembelajarans`
--

INSERT INTO `tujuan_pembelajarans` (`id`, `lingkup_materi_id`, `kode_tp`, `deskripsi`, `deskripsi_tinggi`, `deskripsi_rendah`, `jumlah_jp`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'TP01', 'Peserta didik mampu \r\nmemahami ide pokok \r\ndari teks lisan/aural \r\ntentang permainan \r\ntradisional.', NULL, NULL, 8, 1, 'Aktif', '2026-08-04 01:13:57', '2026-08-04 01:15:41'),
(3, 2, 'TP02', 'Peserta didik mampu \r\nmembaca kata-kata baru \r\ntentang permainan \r\ndengan fasih.', NULL, NULL, 6, 2, 'Aktif', '2026-08-04 01:16:29', '2026-08-04 01:16:29'),
(4, 2, 'TP03', 'Peserta didik mampu \r\nmenceritakan kembali \r\naturan permainan dengan \r\ngestur yang sesuai.', NULL, NULL, 6, 3, 'Aktif', '2026-08-04 01:16:55', '2026-08-04 01:16:55'),
(5, 2, 'TP04', 'Peserta didik mampu \r\nmenulis cerita sederhana \r\nmengenai pengalaman \r\nbermain.', NULL, NULL, 6, 4, 'Aktif', '2026-08-04 01:17:23', '2026-08-04 01:17:23'),
(6, 3, 'TP01', 'Peserta didik mampu \r\nmemahami isi teks sastra \r\nlisan tentang pertemanan.', NULL, NULL, 8, 1, 'Aktif', '2026-08-04 01:19:02', '2026-08-04 01:46:17'),
(7, 3, 'TP02', 'Peserta didik mampu \r\nmenemukan ide \r\npendukung dan pesan \r\ndari cerita.', NULL, NULL, 6, 2, 'Aktif', '2026-08-04 01:19:34', '2026-08-04 01:46:28'),
(8, 3, 'TP03', 'Peserta didik mampu \r\nmenanggapi diskusi \r\ntentang kerja sama secara \r\nsantun.', NULL, NULL, 6, 3, 'Aktif', '2026-08-04 01:20:01', '2026-08-04 01:46:39'),
(9, 3, 'TP04', 'Peserta didik mampu \r\nmenulis pendapat \r\nmenggunakan kalimat \r\nberagam (denotatif).', NULL, NULL, 8, 4, 'Aktif', '2026-08-04 01:20:32', '2026-08-04 01:46:47'),
(10, 4, 'TP01', 'Peserta didik mampu \r\nmemahami ide pokok \r\ninformasi cetak bertema \r\nsemangat.', NULL, NULL, 8, 1, 'Aktif', '2026-08-04 18:28:36', '2026-08-04 18:29:49'),
(11, 4, 'TP02', 'Peserta didik mampu \r\nmenyajikan pendapat \r\ntentang tokoh dengan \r\nintonasi tepat.', NULL, NULL, 8, 2, 'Aktif', '2026-08-04 18:29:04', '2026-08-04 18:30:05'),
(12, 4, 'TP03', 'Peserta didik mampu \r\nmenggunakan kosakata \r\nbaru bermakna denotatif.', NULL, NULL, 10, 3, 'Aktif', '2026-08-04 18:29:25', '2026-08-04 18:30:19'),
(13, 5, 'TP01', 'Peserta didik mampu \r\nmenyimak informasi', NULL, NULL, 8, 1, 'Aktif', '2026-08-04 18:31:21', '2026-08-04 18:31:21'),
(14, 5, 'TP02', 'Peserta didik mampu \r\nmenceritakan kembali \r\nhal-hal menarik di \r\nsekitarnya.', NULL, NULL, 8, 2, 'Aktif', '2026-08-04 18:31:38', '2026-08-04 18:31:38'),
(15, 5, 'TP03', 'Peserta didik mampu \r\nmenulis teks deskripsi \r\nsederhana tentang \r\nlingkungan.', NULL, NULL, 10, 3, 'Aktif', '2026-08-04 18:31:59', '2026-08-04 18:31:59');

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
(100, 'Nanang Sukmana', '6a4bb323e91ac@sdncimanahayu.sch.id', NULL, '$2y$12$RLgZ6hJ96Aj0FbR3dY5rM.2Liim5QPnc9LlImDsf99aL6pO18aRCK', 'guru', NULL, '2026-07-06 06:52:36', '2026-07-06 06:52:36', NULL, NULL),
(101, 'Nani Rohani', '6a4bb3246c096@sdncimanahayu.sch.id', NULL, '$2y$12$9Jlu8DFCgmcBCxgmNe8G7OgUeYNirYYWbza8rJLtrM/LzoKiZgAZq', 'guru', NULL, '2026-07-06 06:52:36', '2026-07-06 06:52:36', NULL, NULL),
(102, 'Oky Pratama Ibrahim', '6a4bb324de5b3@sdncimanahayu.sch.id', NULL, '$2y$12$zHX6amJ8OvZn4QxBSdArguiOu.S9TsgOyPDSi/shaKb6yLh56qL0K', 'guru', NULL, '2026-07-06 06:52:37', '2026-07-06 06:52:37', NULL, NULL),
(103, 'Sri Eriani Pebrianti', '6a4bb3254f0c5@sdncimanahayu.sch.id', NULL, '$2y$12$bLN6gcfOv6mZcxz9hL5ZWeZexA0yxoJbjaH2f6EQxsfKhhahnbpf.', 'guru', NULL, '2026-07-06 06:52:37', '2026-07-06 06:52:37', NULL, NULL),
(104, 'Sri Mulyani', '6a4bb325b1725@sdncimanahayu.sch.id', NULL, '$2y$12$ikSCDDx65F0if8T0quHW1OQlu7lwVYkAFonE628OsAq0buFZ97TFW', 'guru', NULL, '2026-07-06 06:52:38', '2026-07-06 06:52:38', NULL, NULL),
(105, 'TATI SUSANTI', '6a4bb32630c68@sdncimanahayu.sch.id', NULL, '$2y$12$fRkBKja6.gnT7inoXvAoYehMT2GxPKcOTNngoNv1hq1gXECVFlXJO', 'guru', NULL, '2026-07-06 06:52:38', '2026-07-06 06:52:38', NULL, NULL),
(106, 'Ucu Nurhasanah', 'ucu1234@guru.sd.belajar.id', NULL, '$2y$12$kno4CtyAXTAv/3OJ8ujTOeRDATWx2ONIjfxWyLNLpRQ.pcI2GnCPy', 'guru', NULL, '2026-07-06 06:52:39', '2026-07-12 21:15:49', NULL, NULL),
(107, 'Yati Sulistiasari', 'yatisulistiasari99@guru.sd.belajar.id', NULL, '$2y$12$v3Vjy.3x6/5ACwIDWwvIxeOkdqZh7XfKbBzFqUZV3D6MoZLBX6mle', 'guru', NULL, '2026-07-06 06:52:39', '2026-07-11 20:48:58', NULL, NULL);

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
  ADD KEY `mapels_kategori_mapel_id_foreign` (`kategori_mapel_id`);

--
-- Indexes for table `master_ekstrakurikulers`
--
ALTER TABLE `master_ekstrakurikulers`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `ekstrakurikulers`
--
ALTER TABLE `ekstrakurikulers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kelulusans`
--
ALTER TABLE `kelulusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `lingkup_materis`
--
ALTER TABLE `lingkup_materis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `master_ekstrakurikulers`
--
ALTER TABLE `master_ekstrakurikulers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `nilai_asts`
--
ALTER TABLE `nilai_asts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_asts_details`
--
ALTER TABLE `nilai_asts_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `nilai_tp`
--
ALTER TABLE `nilai_tp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking_siswas`
--
ALTER TABLE `ranking_siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rapors`
--
ALTER TABLE `rapors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `rapor_details`
--
ALTER TABLE `rapor_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=835;

--
-- AUTO_INCREMENT for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tujuan_pembelajarans`
--
ALTER TABLE `tujuan_pembelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  ADD CONSTRAINT `mapels_kategori_mapel_id_foreign` FOREIGN KEY (`kategori_mapel_id`) REFERENCES `kategori_mapels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
