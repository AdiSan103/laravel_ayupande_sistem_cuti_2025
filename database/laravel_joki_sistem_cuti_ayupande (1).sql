-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2025 at 08:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_joki_sistem_cuti_ayupande`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_jenis_cuti` bigint UNSIGNED NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `lama_hari` int NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_user_1` tinyint(1) NOT NULL DEFAULT '0',
  `verifikasi_user_2` tinyint(1) NOT NULL DEFAULT '0',
  `verifikasi_bupati` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sudah_ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `id_user`, `id_jenis_cuti`, `alasan`, `tgl_awal`, `tgl_akhir`, `lama_hari`, `alamat`, `verifikasi_user_1`, `verifikasi_user_2`, `verifikasi_bupati`, `status`, `created_at`, `updated_at`, `file_pendukung`, `file_sudah_ttd`, `no_surat`, `catatan_admin`) VALUES
(3, 8, 2, 'tolong perbaiki file pendukung!', '2025-09-06', '2025-09-07', 2, 'Qui voluptates offic', 1, 1, 1, 'disetujui', '2025-09-06 21:26:28', '2025-09-12 21:07:46', 'uploads/file_pendukung/EjULuG4DW1ITVT86zWuy.pdf', 'uploads/file_sudah_ttd/E4C67HWUq3S1z2jvK7ls.pdf', NULL, NULL),
(4, 8, 1, 'Pariatur Dolor fuga', '2025-09-12', '2025-09-13', 2, 'Et sapiente ducimus', 1, 1, 1, 'ditolak', '2025-09-12 21:59:53', '2025-09-17 21:53:28', NULL, NULL, NULL, NULL),
(5, 9, 2, 'demam tinggi', '2025-09-18', '2025-09-22', 5, 'Jl.rara 45', 1, 1, 1, 'disetujui', '2025-09-17 22:18:51', '2025-09-17 22:22:18', 'uploads/file_pendukung/7hx8U2Q6lCbTh5mFeOZ2.pdf', 'uploads/file_sudah_ttd/zOOISL5n7sTXoaPilQHO.pdf', NULL, NULL),
(6, 13, 2, 'Pusing dan demam tinggi', '2025-09-18', '2025-09-19', 2, 'Jl. Raya Ubud No. 15, Gianyar', 1, 1, 1, 'pending', '2025-09-18 03:47:42', '2025-09-18 03:51:09', 'uploads/file_pendukung/0bmRyNKK0JMFwtpu28ge.pdf', 'uploads/file_sudah_ttd/b1ImdvgUaiGnS9z2ibkZ.pdf', NULL, NULL),
(7, 13, 2, 'User1 Tidak Hadir karena Sakit- Disetujui', '2025-09-19', '2025-09-21', 3, 'Jl. Teuku Umar Barat No. 28, Denpasar', 1, 1, 1, 'disetujui', '2025-09-18 03:53:04', '2025-09-18 05:14:04', 'uploads/file_pendukung/VgvJqDxCoegP9c3a6cqT.pdf', 'uploads/file_sudah_ttd/tL3NFGHCZUpGyQgoj0V9.pdf', NULL, NULL),
(8, 13, 2, 'Surat Sakit harus dari RSU', '2025-09-22', '2025-09-26', 5, 'Jl. Danau Tamblingan No. 7, Denpasar', 1, 1, 1, 'ditolak', '2025-09-18 03:56:22', '2025-09-18 05:15:04', 'uploads/file_pendukung/JT2qdV1uBAofP9lzl5G2.pdf', 'uploads/file_sudah_ttd/jz9wyaVVFegxwKrkErDB.pdf', NULL, NULL),
(9, 13, 3, 'Untuk menjalani persiapan persalinan.', '2025-09-18', '2025-12-16', 90, 'Jl. Sunset Road No. 99, Kuta', 1, 1, 1, 'pending', '2025-09-18 04:00:36', '2025-09-18 04:03:03', 'uploads/file_pendukung/jzMGqFUpwuXFzT1TUkq3.webp', 'uploads/file_sudah_ttd/IPxdicR0I4kVFmq5yQO2.pdf', NULL, NULL),
(10, 13, 3, 'User1 cuti melahirkan-Disetujui', '2025-09-18', '2025-12-16', 90, 'Jl. Raya Seminyak No. 42, Seminyak', 1, 1, 1, 'disetujui', '2025-09-18 04:04:13', '2025-09-18 05:15:50', 'uploads/file_pendukung/yJjWsL22fPiyWGiObD16.webp', 'uploads/file_sudah_ttd/D58d06h8IqKb1U59yLAe.pdf', NULL, NULL),
(11, 13, 3, 'Surat harus melampirkan keterangan dokter kandungan', '2025-09-20', '2025-12-18', 90, 'Jl. Monkey Forest No. 18, Ubud', 1, 1, 1, 'ditolak', '2025-09-18 04:06:42', '2025-09-18 05:34:17', 'uploads/file_pendukung/jK7PozMLTY4EhG9guafd.webp', 'uploads/file_sudah_ttd/3tfEmJ6oIFPlmU6pSDMm.pdf', NULL, NULL),
(12, 13, 4, 'Melangsungkan pernikahan.', '2025-09-21', '2025-09-23', 3, 'Jl. By Pass Ngurah Rai No. 301, Nusa Dua', 1, 1, 1, 'pending', '2025-09-18 04:09:44', '2025-09-18 04:12:35', 'uploads/file_pendukung/UkGsGIsrsS4otjsO978n.webp', 'uploads/file_sudah_ttd/JeJDzGCV3vNhmxs8WFnE.pdf', NULL, NULL),
(13, 13, 4, 'User1 Cuti alasan penting- Disetujui', '2025-09-24', '2025-09-28', 5, 'Jl. Raya Canggu No. 55, Badung', 1, 1, 1, 'disetujui', '2025-09-18 04:14:00', '2025-09-18 05:17:50', 'uploads/file_pendukung/3Hb8wdBMj2T8LTGsSMCq.jpg', 'uploads/file_sudah_ttd/rl1Qe3wb2UfWjKh87tKd.pdf', NULL, NULL),
(14, 13, 4, 'Surat cuti tidak di cap basah', '2025-09-18', '2025-09-24', 7, 'Jl. Imam Bonjol No. 23, Denpasar', 1, 1, 1, 'ditolak', '2025-09-18 04:17:48', '2025-09-18 05:19:02', 'uploads/file_pendukung/a0xemFMkxqp5YKWDS7vl.webp', 'uploads/file_sudah_ttd/spXjZ0LGJjXJCQUjyVJ8.pdf', NULL, NULL),
(15, 13, 1, 'Melaksanakan rencana liburan tahunan.', '2025-09-18', '2025-09-21', 4, 'Jl. Gatot Subroto No. 88, Denpasar', 1, 1, 1, 'pending', '2025-09-18 04:23:08', '2025-09-18 04:23:42', NULL, 'uploads/file_sudah_ttd/ywgoUsavvnzBXwpHroFU.pdf', NULL, NULL),
(16, 13, 1, 'User1 cuti tahunan- Disetujui', '2025-09-21', '2025-09-22', 2, 'Jl. Raya Kerobokan No. 27, Badung', 1, 1, 1, 'disetujui', '2025-09-18 04:25:59', '2025-09-18 05:19:56', NULL, 'uploads/file_sudah_ttd/L67wyh4H4bjTS4Mz5if1.pdf', NULL, NULL),
(17, 13, 1, 'Surat tidak ditanda tangan kepala dinas dengan pulpen biru', '2025-09-23', '2025-09-25', 3, 'Jl. Diponegoro No. 10, Denpasar', 1, 1, 1, 'ditolak', '2025-09-18 04:28:28', '2025-09-18 05:20:26', NULL, 'uploads/file_sudah_ttd/Bgc58UEEgoIrc8yI5kUG.pdf', NULL, NULL),
(18, 14, 2, 'Atas saran dokter, perlu menjalani perawatan dan pemulihan.', '2025-09-18', '2025-09-20', 3, 'Jl. Raya Uluwatu No. 54, Jimbaran', 1, 1, 1, 'pending', '2025-09-18 04:31:46', '2025-09-18 04:35:12', 'uploads/file_pendukung/TAuadPtB8OqN0lK7mocW.webp', 'uploads/file_sudah_ttd/vZtd79WmQ7mdveZn5hG3.pdf', NULL, NULL),
(19, 14, 2, 'User2 Tidak Hadir karena Sakit- Disetujui', '2025-09-19', '2025-09-20', 2, 'Jl. Hayam Wuruk No. 35, Denpasar', 1, 1, 1, 'disetujui', '2025-09-18 04:36:36', '2025-09-18 05:21:04', 'uploads/file_pendukung/WKXAdaiyNgUTjsjrSgdp.webp', 'uploads/file_sudah_ttd/tUkHwh7c4wrQinkdhjzR.pdf', NULL, NULL),
(20, 14, 2, 'User2- DITOLAK - Surat sakit tidak dari RSU', '2025-09-18', '2025-09-20', 3, 'Jl. Raya Tegallalang No. 19, Gianyar', 1, 1, 1, 'ditolak', '2025-09-18 04:38:13', '2025-09-18 05:22:00', 'uploads/file_pendukung/Uu8ekNI2UDpn326MnlDJ.webp', 'uploads/file_sudah_ttd/I42EMNLtUbTU99WzSz30.pdf', NULL, NULL),
(21, 14, 3, 'Untuk proses kelahiran anak', '2025-09-18', '2025-12-16', 90, 'Jl. Raya Sayan No. 11, Ubud, Gianyar', 1, 1, 1, 'pending', '2025-09-18 04:43:49', '2025-09-18 04:44:22', 'uploads/file_pendukung/hvdphumWrvtQSUTqcmlW.webp', 'uploads/file_sudah_ttd/LGgCt5Ct8yZS6JIXkog4.pdf', NULL, NULL),
(22, 14, 3, 'User2- Cuti melahirkan-Disetujui', '2025-09-20', '2025-12-18', 90, 'Jl. Nusa Indah No. 24, Denpasar Timur', 1, 1, 1, 'disetujui', '2025-09-18 04:45:22', '2025-09-18 05:22:42', 'uploads/file_pendukung/5Ohjob5STivfheaDhcWL.png', 'uploads/file_sudah_ttd/kdn4Rp8gbM6biXouFrN0.pdf', NULL, NULL),
(23, 14, 3, 'User2-Tanggal surat cuti tidak sesuai dengan surat melahirkan- Ditolak', '2025-09-19', '2025-12-17', 90, 'Jl. Raya Petitenget No. 88, Seminyak', 1, 1, 1, 'ditolak', '2025-09-18 04:47:05', '2025-09-18 05:23:57', 'uploads/file_pendukung/idiTRzUBXhyBLN6xoJhT.jpg', 'uploads/file_sudah_ttd/cAd8lvQX4REnxCm8Iwfm.pdf', NULL, NULL),
(24, 14, 4, 'untuk melangsungkan pernikahan.', '2025-09-18', '2025-09-22', 5, 'Jl. Tukad Badung No. 17, Renon', 1, 1, 1, 'pending', '2025-09-18 04:51:20', '2025-09-18 04:52:49', 'uploads/file_pendukung/4VRex0iULvDxfjy5MmBI.webp', 'uploads/file_sudah_ttd/0aKhe6zHYg5CrwPnFlBj.pdf', NULL, NULL),
(25, 14, 4, 'User2- cuti alasan penting- Disetujui', '2025-09-21', '2025-09-22', 2, 'Jl. Griya Anyar No. 29, Sanur', 1, 1, 1, 'disetujui', '2025-09-18 04:56:24', '2025-09-18 05:24:31', 'uploads/file_pendukung/aDKwkoQt9O8NeF1Png1Z.webp', 'uploads/file_sudah_ttd/ECGep242xPaJu6gjNlmc.pdf', NULL, NULL),
(26, 14, 4, 'User2- surat cuti salah verifikator- Ditolak', '2025-09-24', '2025-09-25', 2, 'Jl. Raya Penelokan No. 52, Kintamani', 1, 1, 1, 'ditolak', '2025-09-18 04:58:46', '2025-09-18 05:25:43', 'uploads/file_pendukung/AOJ6AJtZKX9m9ZU3gQGn.webp', 'uploads/file_sudah_ttd/DTkfvc97N4TxsLzlrMIp.pdf', NULL, NULL),
(27, 14, 1, 'Berlibur atau bepergian keluar kota.', '2025-09-18', '2025-09-24', 7, 'Jl. Dewi Sartika No. 41, Gianyar', 1, 1, 1, 'pending', '2025-09-18 05:01:35', '2025-09-18 05:02:07', NULL, 'uploads/file_sudah_ttd/0nIR6vogquRdavxeslo8.pdf', NULL, NULL),
(28, 14, 1, 'User2- Cuti Tahunan-Disetujui', '2025-09-18', '2025-09-20', 3, 'Jl. Uluwatu II No. 15, Ungasan', 1, 1, 1, 'disetujui', '2025-09-18 05:03:42', '2025-09-18 05:26:08', NULL, 'uploads/file_sudah_ttd/W5Hidk2hEWedmMycbPfg.pdf', NULL, NULL),
(29, 14, 1, 'User2-Cuti tahunan tidak di cap basah- Ditolak', '2025-09-19', '2025-09-20', 2, 'Jl. Raya Seririt No. 7, Lovina, Buleleng', 1, 1, 1, 'ditolak', '2025-09-18 05:04:49', '2025-09-18 05:27:21', NULL, 'uploads/file_sudah_ttd/kewBpCRaAnRjhzABkTuV.pdf', NULL, NULL),
(30, 9, 2, 'Ipsam sed repellendu', '2010-04-04', '2017-02-14', 2509, 'Ea aperiam molestiae', 1, 1, 1, 'pending', '2025-09-20 07:50:07', '2025-09-20 07:50:07', NULL, NULL, 'Aut nisi neque odit', NULL),
(31, 9, 1, 'libur', '2025-09-18', '2025-09-19', 2, 'jalan raya', 1, 1, 0, 'pending', '2025-09-20 07:51:57', '2025-09-20 07:51:57', NULL, NULL, '011111', NULL),
(32, 9, 1, 'Labore adipisci enim', '2025-09-21', '2025-09-21', 1, 'Culpa quo corrupti', 1, 1, 1, 'disetujui', '2025-09-20 08:14:30', '2025-09-20 08:18:43', NULL, NULL, 'Ad est in ullamco te', 'tambah keterangan'),
(33, 13, 1, 'libur', '2025-09-15', '2025-09-16', 2, 'jalan raya', 1, 1, 0, 'pending', '2025-09-20 08:22:09', '2025-09-20 08:22:09', NULL, NULL, '011111', NULL),
(34, 13, 2, 'Tipes', '2025-09-21', '2025-09-24', 4, 'rsu udayana', 1, 1, 0, 'ditolak', '2025-09-20 08:27:51', '2025-09-20 08:32:55', 'uploads/file_pendukung/emAtDEJOjNanB91FM38c.png', 'uploads/file_sudah_ttd/kRrlb6EIxcx7DN1HBIKa.png', '1212121212', 'Surat Salah'),
(35, 9, 3, 'Minus quis excepturi', '2025-09-21', '2025-09-21', 1, 'Facilis dolor fugiat', 1, 1, 1, 'pending', '2025-09-20 16:40:04', '2025-09-20 16:40:04', NULL, NULL, 'Repudiandae autem mi', NULL),
(36, 13, 3, 'melahirkan', '2025-09-22', '2025-09-25', 4, 'puri bunda', 1, 1, 0, 'disetujui', '2025-09-20 16:42:17', '2025-09-20 16:44:14', 'uploads/file_pendukung/2oRoQcQgNdpd2E96dybi.png', 'uploads/file_sudah_ttd/lFPc72kwcALRP2xBZxlb.png', '333333333', 'SESUAI');

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
-- Table structure for table `jatah_cuti`
--

CREATE TABLE `jatah_cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `tahun` year NOT NULL,
  `jatah_cuti` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jatah_cuti`
--

INSERT INTO `jatah_cuti` (`id`, `id_user`, `tahun`, `jatah_cuti`, `created_at`, `updated_at`) VALUES
(1, 9, 2025, 12, '2025-09-17 21:16:16', '2025-09-17 21:16:16'),
(2, 12, 2025, 12, '2025-09-17 21:20:25', '2025-09-17 21:20:25'),
(3, 8, 2025, 12, '2025-09-18 03:19:58', '2025-09-18 03:19:58'),
(4, 10, 2025, 12, '2025-09-18 03:21:13', '2025-09-18 03:21:13'),
(5, 13, 2025, 12, '2025-09-18 03:34:41', '2025-09-18 03:34:41'),
(6, 14, 2025, 12, '2025-09-18 04:30:00', '2025-09-18 04:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_cuti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id`, `nama_cuti`, `created_at`, `updated_at`) VALUES
(1, 'Cuti Tahunan', NULL, NULL),
(2, 'Cuti Sakit', NULL, NULL),
(3, 'Cuti Melahirkan', NULL, NULL),
(4, 'Cuti Alasan Penting', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_31_082204_create_users_table', 2),
(6, '2025_08_31_082205_create_jatah_cuti_table', 2),
(7, '2025_08_31_082205_create_jenis_cuti_table', 2),
(8, '2025_08_31_082206_create_cuti_table', 2);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_kerja` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `soft_delete` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `foto`, `nip`, `nama`, `password`, `tempat_lahir`, `tanggal_lahir`, `telp`, `email`, `jabatan`, `masa_kerja`, `created_at`, `updated_at`, `soft_delete`) VALUES
(1, 'admin', NULL, '12345678', 'Verifikator 1', '', 'Denpasar', '2024-08-22', '12345678', 'verifikator@gmail.com', 'Verifikator', 14, '2025-08-01 08:38:35', '2025-08-01 08:38:35', NULL),
(5, 'admin', NULL, '13213233', 'verfikator 2', '', 'Bangli', '2018-08-02', NULL, 'verifikator12@gmail.com', 'Verifikator', 24, '2025-08-01 08:40:38', '2025-08-01 08:40:38', NULL),
(8, 'employee', 'uploads/users/yikTrdutSDTg9h1HHmh3.png', '12312638213', 'Employee 1', '$2y$12$tDMbSzoa7LKVsKn00riHAub.pqiFwCVxrFffoV4Wm67tUpaYehyBm', 'Ad est mollit amet123', '1980-07-04', '08873132213612', 'employee@passwordjuga.samaini', 'Aut in laborum eveni', 17, '2025-09-06 07:05:14', '2025-09-12 20:51:20', NULL),
(9, 'admin', 'uploads/users/82pxcmKJNXhWlcEsXkB5.png', '36183612863', 'I Wayan Ari Sudana', '$2y$12$lOpFZlWt/cpCqRrhlqCH4O8XKyjJhXd2vNQExSxJNiiianTR9pf2W', 'Denpasar', '2025-09-13', '082247798588', 'admin@passwordjuga.samaini', 'Penata Layanan Operasional', 1, '2025-09-06 07:05:47', '2025-09-13 05:19:28', NULL),
(10, 'employee', 'uploads/users/0cxdgugizgYrGhgwHnFZ.jpg', '123123', 'employee@passwordjuga.samaini', '$2y$12$rFjc8XydWdezFXH4WHbaZ.Y6EvE2sIaI54nG1Ryg0JpgHSJDINhM2', 'Dps', '2025-09-12', '0981273', 'employee123@passwordjuga.samaini', 'Employee', 20, '2025-09-12 19:35:49', '2025-09-18 05:32:04', NULL),
(11, 'employee', 'uploads/users/74p1RfhQJTXvCS0FnyqP.jpg', '199009132025211008', 'I Wayan Ari Sudana', '$2y$12$5l4HbVSgovRq4xyJLLnc.eNZSiIUnsn66KMwsJGNJhrmeJFPRk1EK', 'Denpasar', '2025-09-13', '082247798588', 'arisudana928@yahoo.com', 'Penata Layanan Operasional', 10, '2025-09-13 02:57:15', '2025-09-13 02:57:15', NULL),
(12, 'employee', 'uploads/users/T3JzyLEY12ewx21xB1YS.png', 'Dicta aut omnis dolo', 'TESTING DEVELOPER', '$2y$12$7g0Vb2.PjeraKTl4V.nyB.XlsoL0GlS1AkX1owwhaSXmZC1R.cLtO', 'Vero quis praesentiu', '2006-01-23', 'Anim dolores quos ma', 'testing-dev@samaini.passwordnya', 'Hic voluptatum ea qu', 72, '2025-09-17 21:19:56', '2025-09-17 21:19:56', NULL),
(13, 'employee', 'uploads/users/aTGDfntVDGkx5H0fOG4w.png', '112233', 'User1', '$2y$12$NaKsnbUOl/q3eeYt6exQm.zqjOK7vweWuW0fdaU0u9g3GrYow2nF2', 'Denpasar', '2000-02-09', '081226335467', 'user1@gitudulu', 'Employee', 2, '2025-09-18 03:30:20', '2025-09-18 03:30:20', NULL),
(14, 'employee', 'uploads/users/EIqYj3VT1ia13TNd52LC.png', '334455', 'user2', '$2y$12$pl7cD/uXfaWNJlqp2ZnMuuzWsjYP96q/wXo6gc/QNb7Oysp3gaYdu', 'Petang', '1998-05-11', '083556444782', 'user2@gitudulu', 'Employee', 5, '2025-09-18 03:31:49', '2025-09-18 03:31:49', NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_id_jenis_cuti_foreign` (`id_jenis_cuti`),
  ADD KEY `cuti_id_user_foreign` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jatah_cuti`
--
ALTER TABLE `jatah_cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jatah_cuti_id_user_foreign` (`id_user`);

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_nip_unique` (`nip`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jatah_cuti`
--
ALTER TABLE `jatah_cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_id_jenis_cuti_foreign` FOREIGN KEY (`id_jenis_cuti`) REFERENCES `jenis_cuti` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cuti_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jatah_cuti`
--
ALTER TABLE `jatah_cuti`
  ADD CONSTRAINT `jatah_cuti_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
