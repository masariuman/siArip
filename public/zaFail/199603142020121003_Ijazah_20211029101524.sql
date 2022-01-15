-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2021 at 09:57 PM
-- Server version: 10.4.12-MariaDB-log
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siArip`
--

-- --------------------------------------------------------

--
-- Table structure for table `alhuqulAlfareia`
--

CREATE TABLE `alhuqulAlfareia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heya_id` bigint(20) UNSIGNED NOT NULL,
  `asm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keteranganVerifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('4','3','2','1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `rinku`, `name`, `keterangan`, `keteranganVerifikasi`, `pegawai_id`, `kategori_id`, `file`, `sutattsu`, `created_at`, `updated_at`) VALUES
(9, '$2y$10$PAddgSAbcVrZ7hC$j4A3ouM5rdeU4DJqAjrGU7LhkY9WoZGlmSRPK', 'awas ada', 'sule prikitiew', NULL, 1, 2, '199603142020121003_Akta_20211009203532.pdf', '0', '2021-10-09 08:09:29', '2021-10-09 13:35:32'),
(10, '$2y$10$H1Vnl8GIDYQsmVGXDaG5pOdu63I6UnTSCScSq9CYgdJk4I8A3Xm$q', 'qwdasasd', 'qwedasdqs', NULL, 1, 1, NULL, '0', '2021-10-09 14:16:02', '2021-10-09 14:16:02'),
(11, '$2y$10$MumYihbigKi3LKLMop8gpeTY9exoDX6s5ySUoIrI9gS9N1WM0PpPA', 'qwdasasdqwasd', 'qwedasdqsasdasdasd', NULL, 1, 3, NULL, '0', '2021-10-09 14:16:07', '2021-10-09 14:16:24'),
(12, '$2y$10$ETNv3SxQAWjOSG3K8iIRdA3jAbeR6GQs$Ms7NsNQc2IDMY2oGdhIO', 'wdsa', 'qwdqewasw', NULL, 1, 3, NULL, '0', '2021-10-09 14:16:11', '2021-10-10 01:13:13'),
(13, '$2y$10$yP5S4AmoYerNm6RCqVeesOJi0mn9lu6CFIWARdr2bBDE1TGLftnfK', 'asdasd', 'qwdasddqwdasaasdqcascaaqwd', NULL, 1, 2, '199603142020121003_Akta_20211010104451.pdf', '0', '2021-10-10 03:44:52', '2021-10-10 03:44:52'),
(14, '$2y$10$PURcEvsb1ZRiEvx$4TYG7AkZCLVxSAgMb1FEtntW3A1Mu5m$YiflS', 'ewf', 'sfd', NULL, 1, 3, '199603142020121003_SK CPNS_20211010192607.pdf', '0', '2021-10-10 12:26:07', '2021-10-10 12:26:07'),
(15, '$2y$10$FotI4ExFPROmFX3kAmcrBeiVC4eA6NrplSDLZtMpwshc6GlFJ4OWA', 'qew', 'sda', NULL, 1, 2, '199603142020121003_Akta_20211010213518.pdf', '0', '2021-10-10 14:35:18', '2021-10-10 14:35:18'),
(16, '$2y$10$67Fpue$h7p6rhGsKiF6QBOxMnF2y6QCfFjUayDlsSu4xaqMjo5ASO', 'qewsad', 'sda123sda', NULL, 1, 1, '199603142020121003_KTP_20211010213629.pdf', '0', '2021-10-10 14:36:29', '2021-10-10 14:36:29'),
(17, '$2y$10$MENeDHeUnmgCumsZAbQCbO$LZCXilCH3nkdFRqUmY2ahXbikyWUdO', 'weds', 'asd', NULL, 1, 3, NULL, '0', '2021-10-10 14:38:34', '2021-10-13 07:32:14'),
(18, '$2y$10$5sxtJ17a2bBKIMXTWJcagO5tuCA0E6zVuWjzuEAMgD458xufK1Vb6', 'weds', 'asd', '123123', 1, 3, NULL, '0', '2021-10-10 14:38:37', '2021-10-13 08:46:43'),
(19, '$2y$10$HNpT46WeZpNjsbX6BAhIWulECfgIGDPJrWHhad7APEXC4x2T6RrrO', 'weds', 'asd', NULL, 1, 3, NULL, '0', '2021-10-10 14:38:39', '2021-10-13 13:33:29'),
(20, '$2y$10$JqrlWgEFg7IP5mv63YejBeoitmVO7bqpAOZCXkU1Q1UPNm$eJ1xOm', 'weds', 'asd', 'File Salah', 1, 3, NULL, '0', '2021-10-10 14:38:42', '2021-10-13 08:50:08'),
(21, '$2y$10$lDudUXVfw7Hx3b77SUAicOjyqvDSgOcN6IJC$79QJ6OimRZA6wYmW', 'cth', 'cth', NULL, 9, 3, '199603142020121003_SK CPNS_20211019013706.pdf', '0', '2021-10-18 18:37:06', '2021-10-18 18:37:06'),
(22, '$2y$10$uyYciOuQVrQTPFMO0sQseuJKvXAl8MI2E2saNer36cqLGXAUOE3S2', 'a', 'aw', 'drth', 9, 3, '199603142020121003_SK CPNS_20211019013720.pdf', '0', '2021-10-18 18:37:20', '2021-10-18 18:38:01'),
(23, '$2y$10$SMCVPqZxdloCJDxcrhLzxerx4StbcksHQAF2lWm9NVpaLUPe$1Cj2', 'aqwed', 'awqwd', NULL, 9, 2, '199603142020121003_Akta_20211019013730.pdf', '0', '2021-10-18 18:37:30', '2021-10-18 18:37:54'),
(24, '$2y$10$M8jCjY$Yu7wSxMiGL0M44A1qkUA0pqxmZhPhuWVPy7pZgzSG5WZ4K', 'asdqwea', 'asefaws', NULL, 9, 2, '199603142020121003_Akta_20211019013744.pdf', '0', '2021-10-18 18:37:44', '2021-10-18 18:37:44'),
(25, '$2y$10$DMOdoUHaGOd1iNCHNG9mPuy03Kn0ZprEAvCctAfqUWT9R5$WFl7HC', NULL, NULL, '\\', 9, 3, NULL, '0', '2021-10-20 00:46:16', '2021-10-20 08:00:44'),
(26, '$2y$10$L8CsTNE6uP5wIFHTRDn9hAx7irwpXKmDRk8lowKoi6E9xClcduqKS', '23e4', 'wer', NULL, 3, 3, '199801012020121004_SK CPNS_20211020111312.pdf', '0', '2021-10-20 04:13:12', '2021-10-20 04:13:12'),
(27, '$2y$10$8fRsUvyUdbk03iwZjxLfNACa19DrTGDf3puCNM9S8S265E1EyS7Ke', 'sk jabatan', 'perubahan data jabatan', 'File yang diberukan bukan berupa SK Jabatan', 13, 3, '197902141998032001_Surat Keputusan (SK)_20211021152408.pdf', '4', '2021-10-21 15:24:09', '2021-10-21 15:26:15'),
(28, '$2y$10$oyVLNiYNR1NwC41fCScToAtvBz1MhNSCN5xHONqhTE7swiQAYCXqK', 'surat lamaran', 'surat lamaran', NULL, 13, 10, '197902141998032001_Lainnya (Mohon Ajukan Kategori Baru di Pengajuan dengan Menuliskan pada Keterangan)_20211021152803.pdf', '2', '2021-10-21 15:28:03', '2021-10-21 15:28:25'),
(29, '$2y$10$MG36HQBANpYJho9OlPAmJuYJEl1QIUlrmL8qjAHINyAPsJodix5oK', 'Survey', 'Survey', NULL, 13, 10, '197902141998032001_Lainnya (Mohon Ajukan Kategori Baru di Pengajuan dengan Menuliskan pada Keterangan)_20211021153009.xlsx', '1', '2021-10-21 15:30:10', '2021-10-21 15:30:10'),
(30, '$2y$10$aluHiA9CDaAUZZ9Q8a6FYOqrdNqs74Fcq7drFKQYZFhNbmJlhvdK2', 'tes', 'test', NULL, 9, 10, '199603142020121003_Lainnya (Mohon Ajukan Kategori Baru di Pengajuan dengan Menuliskan pada Keterangan)_20211024133815.pdf', '1', '2021-10-24 13:38:15', '2021-10-24 13:38:15'),
(31, '$2y$10$0BMtEcChkoCPMmfWs0n1DezGFLC5BG0T4JZK8NVxoiTRbQC9JJrH6', 'Pengajuan', 'Pengajuan', NULL, 9, 10, '199603142020121003_Lainnya (Mohon Ajukan Kategori Baru di Pengajuan dengan Menuliskan pada Keterangan)_20211024133927.pdf', '3', '2021-10-24 13:39:27', '2021-10-24 13:39:27'),
(32, '$2y$10$8fX7AVT2BY2kaohrxCS8bAd00IlPbNq7SGabHE195XDO731EqkqoO', 'percobaan contoh', 'percobaan contoh', NULL, 9, 10, '199603142020121003_Lainnya (Mohon Ajukan Kategori Baru di Pengajuan dengan Menuliskan pada Keterangan)_20211025082150.pdf', '1', '2021-10-25 08:21:50', '2021-10-25 08:21:50'),
(33, '$2y$10$$UHhF8jWqHYGNdfMTHvTJOw0CTLy7BaYstaY8tFzPLxVeLhCnQdaS', 'SK CPNS', 'Permintaan update data CPNS', NULL, 3, 3, '199801012020121004_Surat Keputusan (SK)_20211028103000.pdf', '3', '2021-10-28 10:30:00', '2021-10-28 10:30:00'),
(34, '$2y$10$IxhN$LbV3KUjxHOONpX7sO8T5K6bJ04paE2B$uFk1DOkcPkSFc8OC', 'Ijazah Diploma-III', 'Permintaan Update Data Pendidikan', NULL, 3, 8, '199801012020121004_Ijazah_20211028103758.pdf', '3', '2021-10-28 10:37:59', '2021-10-28 10:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `cpnspns`
--

CREATE TABLE `cpnspns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `statusKepegawaian_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nomorSkCpns` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSkCpns` date DEFAULT NULL,
  `tmtCpns` date DEFAULT NULL,
  `namaPejabatPenetapCpns` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nomorSkPns` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSkPns` date DEFAULT NULL,
  `tmtPns` date DEFAULT NULL,
  `nomorSttpl` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSttpl` date DEFAULT NULL,
  `nomorSpmt` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSpmt` date DEFAULT NULL,
  `nomorPertekC2th` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalPertekC2th` date DEFAULT NULL,
  `nomorSkd` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSkd` date DEFAULT NULL,
  `karpeg` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpnspns`
--

INSERT INTO `cpnspns` (`id`, `rinku`, `pegawai_id`, `statusKepegawaian_id`, `nomorSkCpns`, `tanggalSkCpns`, `tmtCpns`, `namaPejabatPenetapCpns`, `nomorSkPns`, `tanggalSkPns`, `tmtPns`, `nomorSttpl`, `tanggalSttpl`, `nomorSpmt`, `tanggalSpmt`, `nomorPertekC2th`, `tanggalPertekC2th`, `nomorSkd`, `tanggalSkd`, `karpeg`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '213', 9, 4, 'asd', '2021-10-16', '2021-10-16', '', '', '2021-10-16', '2021-10-16', '', '2021-10-16', '', '2021-10-16', '', '2021-10-16', '', '2021-10-16', '', '1', NULL, '2021-10-16 15:31:11'),
(2, '$2y$10$O0bUX2kZlRdbasrPuXdMluy284WJM6GxAfsOVYcjZjnvi0ueGIMYa', 3, 3, '', '2021-10-18', '2021-10-18', '', '', '2021-10-18', '2021-10-18', '', '2021-10-18', '', '2021-10-18', '', '2021-10-18', '', '2021-10-18', '', '1', '2021-10-17 21:26:32', '2021-10-17 21:26:32'),
(3, '$2y$10$igk0SLpaZdb44GrCJeahROADmAinudt7ZcjSBUQCQLGA1rjfLnUna', 11, 3, '', '2021-10-20', '2021-10-20', '', '', '2021-10-20', '2021-10-20', '', '2021-10-20', '', '2021-10-20', '', '2021-10-20', '', '2021-10-20', '', '1', '2021-10-20 23:51:21', '2021-10-20 23:51:21'),
(4, '$2y$10$i10uTXxOMU3FlBGXANiPWuz5TN5lZPA6KZ4cfXtu8SEoUFPdAenQC', 12, 3, '', '2021-10-20', '2021-10-20', '', '', '2021-10-20', '2021-10-20', '', '2021-10-20', '', '2021-10-20', '', '2021-10-20', '', '2021-10-20', '', '1', '2021-10-20 23:53:08', '2021-10-20 23:53:08'),
(5, '$2y$10$zMagoMEVLxZxUVpoMOkRtOOdUuysjLQgVI1Kmzba67PwJLmN2wikC', 13, 3, '', '2021-10-21', '2021-10-21', '', '', '2021-10-21', '2021-10-21', '', '2021-10-21', '', '2021-10-21', '', '2021-10-21', '', '2021-10-21', '', '1', '2021-10-21 11:56:16', '2021-10-21 11:56:16'),
(6, '$2y$10$bnJ40ErLdIL7Sv5H6zHqnOGi4M9x8Ae12SFml2k4KMihcaNkJgl1O', 14, 3, '', '2021-10-28', '2021-10-28', '', '', '2021-10-28', '2021-10-28', '', '2021-10-28', '', '2021-10-28', '', '2021-10-28', '', '2021-10-28', '', '1', '2021-10-28 15:22:31', '2021-10-28 15:22:31'),
(7, '$2y$10$4q45ECoOt00u1TxAxmxZiAQveXZdGE3byKG8AosRVAg6Vecux5kOa', 15, 3, '', '2021-10-28', '2021-10-28', '', '', '2021-10-28', '2021-10-28', '', '2021-10-28', '', '2021-10-28', '', '2021-10-28', '', '2021-10-28', '', '1', '2021-10-28 15:23:55', '2021-10-28 15:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `eselonJabatan`
--

CREATE TABLE `eselonJabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eselonJabatan`
--

INSERT INTO `eselonJabatan` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$JeyS5omyA7ze5LSiIawCBA2lEau2nhncosEEPaO3PVZYusnuH8SIO', 'qwe', '1', '2021-09-25 14:14:55', '2021-09-25 14:14:55'),
(2, '$2y$10$fU4B92hiqmwUXCBNCqD3Jue65YMepOaegXSFY74xXPGlp5AZPNAA2', 'asd', '1', '2021-09-25 14:14:59', '2021-09-25 14:14:59'),
(3, '$2y$10$GyUQxH9IwvqN3raMuxDWFu3f7wF5UuvUFgJrRFfzRdQWiACxpc6Yq', 'zx', '1', '2021-09-25 14:15:02', '2021-09-25 14:15:02'),
(4, '$2y$10$VOCNwfQ4P0Rtdwe1uwAynuRd2hfX3yTcRjhIc0qKoA6euKeUAZsze', 'qwe213', '1', '2021-09-25 14:15:05', '2021-09-25 14:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heya`
--

CREATE TABLE `heya` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heyaMei` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitasPegawai`
--

CREATE TABLE `identitasPegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `handphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `emailDinas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `emailPribadi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nomorKK` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `agama_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lokasiKerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `akta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalNpwp` date DEFAULT NULL,
  `bpjs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `karis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `taspen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalTaspen` date DEFAULT NULL,
  `tapera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `kppn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `kelasJabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `identitasPegawai`
--

INSERT INTO `identitasPegawai` (`id`, `rinku`, `pegawai_id`, `alamat`, `telepon`, `handphone`, `emailDinas`, `emailPribadi`, `nik`, `nomorKK`, `agama_id`, `lokasiKerja`, `akta`, `npwp`, `tanggalNpwp`, `bpjs`, `karis`, `taspen`, `tanggalTaspen`, `tapera`, `kppn`, `kelasJabatan`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$TzqkewmUSziTD8x2Qs0YyOb20ZcAVFeYDXS3AzMjwmh$2YWohA4Zu', 3, 'Jl. Sumbawa No. 107, Kelurahan Akcaya, Kecamatan Pontianak Selatan, Kota Pontianak, Provinsi Kalimantan Barat', '0', '089647679589', '-', 'fikryfadhil20@gmail.com', '6171010101980005', '6171012305070044', 1, 'Mempawah', '83/1998', '93.764.748.5-707.000', '2019-12-16', '0000050604772', '0', '0', '0001-01-01', '0', 'Badan Pengelolaan Keuangan dan Aset Daerah Kabupaten Mempawah', '6', '1', '2021-10-13 15:04:13', '2021-10-28 10:54:55'),
(2, '$2y$10$8iQmKOt7Xq5YY9XlLYEzHetxZAAwZkNRqqfc8iNVyASIQqb8EBryq', 4, '', '', '', '', '', '', '', 1, '', '', '', NULL, '', '', '', NULL, '', '', '', '1', '2021-10-13 15:06:36', '2021-10-13 15:06:36'),
(3, '$2y$10$H8er6tReg4je8HYRCUGA7eonPh1DfTNWtCS2M1Drpxb9QUaAr1C2C', 5, '', '', '', '', '', '', '', 1, '', '', '', NULL, '', '', '', NULL, '', '', '', '1', '2021-10-13 17:26:31', '2021-10-13 17:26:31'),
(4, '$2y$10$ewZVvUtySVgyADHuN0q0ceFqdquaDFJymfDz2dZeiqTWce1JDi39m', 9, 'Jalan Ampera, Komplek Permata Ampera Blok A.1', '', '082148302220', '', 'arif_setiawan@engineer.com', '6171051403960004', '6171051710170007', 1, 'Mempawah', '', '91.179.067.3-701.000', '2019-04-10', '0002899118889', '', '', '2021-10-15', '', 'Badan Pengelola Keuangan dan Aset Daerah', '8', '1', '2021-10-14 17:36:17', '2021-10-15 18:41:11'),
(5, '$2y$10$W5qFzvRfOsFgknhaW6AeGO94ZA0g7ZSyWQ00ATqvnAk1AOAuNwKWW', 10, ' ', '', '', '', '', '', '', 15, '', '', '', '2021-10-18', '', '', '', '2021-10-18', '', '', '', '1', '2021-10-17 21:26:32', '2021-10-17 21:26:32'),
(6, '$2y$10$A4dwKe7MDRkNKZ5hkfOnLO042arwkZ8rOPk3FUA$29y8lPfedBQd2', 11, ' ', '', '', '', '', '', '', 1, '', '', '', '2021-10-20', '', '', '', '2021-10-20', '', '', '', '1', '2021-10-20 23:51:21', '2021-10-20 23:51:21'),
(7, '$2y$10$TiTaN8zIXmyat6BjVs9$cAJD2K9B76pHKwJRRAeCYmdXpOTNiEF32', 12, ' ', '', '', '', '', '', '', 16, '', '', '', '2021-10-20', '', '', '', '2021-10-20', '', '', '', '1', '2021-10-20 23:53:07', '2021-10-20 23:53:07'),
(8, '$2y$10$VmbXj20z6Gr0mh217y9iUuRa03s6Yc93Mk0N44krCp0AvwKQZHBEC', 13, '', '', '', '', '', '', '', 1, '', '', '', '2021-10-21', '', '', '520013563', '2021-10-21', '', '', '', '1', '2021-10-21 11:56:16', '2021-10-21 15:21:38'),
(9, '$2y$10$EgwQRmn$afD2qnB7d$x8XekAPTZQnVY9iGY2eptO4$nU$2W2MWwAW', 14, ' ', '', '', '', '', '', '', 1, '', '', '', '2021-10-28', '', '', '', '2021-10-28', '', '', '', '1', '2021-10-28 15:22:31', '2021-10-28 15:22:31'),
(10, '$2y$10$ZRWVNgjcCZd8wgSqWqzhoA7Da4IxfnVZHW5L603EmAjp7FuwzwSCa', 15, ' ', '', '', '', '', '', '', 1, '', '', '', '2021-10-28', '', '', '', '2021-10-28', '', '', '', '1', '2021-10-28 15:23:55', '2021-10-28 15:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `jenisJabatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subbid_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jabatan` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tmtJabatan` date DEFAULT NULL,
  `tmtPelantikan` date DEFAULT NULL,
  `nomorSk` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSk` date DEFAULT NULL,
  `sutattsu` enum('1','0','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `rinku`, `pegawai_id`, `jenisJabatan_id`, `subbid_id`, `jabatan`, `tmtJabatan`, `tmtPelantikan`, `nomorSk`, `tanggalSk`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$kW1W9CsWuWoywAer8NcqROejavtYYMu$Uh9S$IgX1NVGEKamwa4H6', 9, 1, 12, '', '2021-10-18', '2021-10-18', '', '2021-10-18', '2', '2021-10-17 21:26:32', '2021-10-18 18:34:18'),
(2, '$2y$10$kW1W9CsWuWoywAer8NcqROejavtYYMu$Uh9S$IgX1NVGEKamwa4H6', 10, 1, 12, '', '2021-10-18', '2021-10-18', '', '2021-10-18', '1', '2021-10-17 21:26:32', '2021-10-18 18:34:15'),
(3, '$2y$10$a23fAnKQpiU6wRRAYHkIRAUNIE54Qdpj8yJDIwLJfWZDfEc73KiDi', 9, 3, 8, 'a', '2021-10-18', '2021-10-18', 'aaaa', '2021-10-18', '1', '2021-10-18 16:58:08', '2021-10-18 18:34:18'),
(4, '$2y$10$OQRcR$sz3DlR6yt35IK66eDpwF1rGzfjwD2QnSk3vpfnp5ZjAL5VS', 9, 3, 13, '', '2021-10-19', '2021-10-19', '', '2021-10-19', '0', '2021-10-18 18:31:41', '2021-10-18 18:31:44'),
(5, '$2y$10$iQAcBUoLCbNZG9MEEFdOZOJspePJiUJumjvnTShAavKU1fWQ0K7kO', 11, 1, 14, '', '2021-10-20', '2021-10-20', '', '2021-10-20', '2', '2021-10-20 23:51:21', '2021-10-20 23:51:21'),
(6, '$2y$10$pjet8Cfi8PO1XPqblxXtIuRoq8AgKQ6d7HSIB5rt7F9FYJo2t8oCu', 12, 1, 14, '', '2021-10-20', '2021-10-20', '', '2021-10-20', '2', '2021-10-20 23:53:08', '2021-10-20 23:53:08'),
(7, '$2y$10$fGAH87Cb0$e1h4FqtFBT5OJKBni04pc99MwSVGgpaJTyCXcJ$WRdA', 13, 1, 12, 'Kasubbag Umum dan Aparatur', '2021-10-21', '2021-10-21', '', '2021-10-21', '2', '2021-10-21 11:56:16', '2021-10-21 15:25:21'),
(8, '$2y$10$cKmB8UW9k43NJN98Fw9zlugrwRN8UWmv4IjP501gLVRfE95BQhGtu', 14, 1, 11, '', '2021-10-28', '2021-10-28', '', '2021-10-28', '2', '2021-10-28 15:22:31', '2021-10-28 15:22:31'),
(9, '$2y$10$u2Aa3z$k9Ldb6Uu6h$Y6FAfyRhmkVq5AbiRAhyqV5NXA5YMKcoPva', 15, 1, 11, '', '2021-10-28', '2021-10-28', '', '2021-10-28', '2', '2021-10-28 15:23:55', '2021-10-28 15:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heya_id` bigint(20) UNSIGNED NOT NULL,
  `subbid_id` bigint(20) UNSIGNED NOT NULL,
  `tujuanSurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomorSurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalSurat` date DEFAULT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalKirim` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kodeBerkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asalSurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomorSurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalSurat` date DEFAULT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalNaik` date DEFAULT NULL,
  `tanggalTurun` date DEFAULT NULL,
  `heya_id` bigint(20) UNSIGNED NOT NULL,
  `subbid_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kodeBerkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_05_17_082540_create_table_heya', 1),
(2, '2013_04_11_063533_user_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_04_10_112828_create_sessions_table', 1),
(9, '2021_05_27_013639_create_alhuqul_alfareia_table', 1),
(10, '2021_05_28_032157_create_table_surat_masuk', 1),
(11, '2021_05_28_041726_create_table_surat_keluar', 1),
(12, '2021_09_15_113348_create_table_ref_agama', 1),
(13, '2021_09_15_114951_create_table_ref_unor', 1),
(14, '2021_09_15_115157_create_table_ref_bidang', 1),
(15, '2021_09_15_115350_create_table_ref_subbid', 1),
(16, '2021_09_15_115522_create_table_ref_status_kepegawian', 1),
(17, '2021_09_15_115652_create_table_ref_kedudukan_kepegawian', 1),
(18, '2021_09_15_115807_create_table_ref_jenis_kepegawaian', 1),
(19, '2021_09_15_115857_create_table_ref_jenis_hukuman_disiplin', 1),
(20, '2021_09_15_115937_create_table_ref_jenis_penghargaan', 1),
(21, '2021_09_15_120202_create_table_ref_pangkat_golongan_ruang', 1),
(22, '2021_09_15_120435_create_table_ref__s_t_l_u_d', 1),
(23, '2021_09_15_120602_create_table_ref_jenis_naik_pangkat', 1),
(24, '2021_09_15_123645_create_table_ref_tingkat_pendidikan', 1),
(25, '2021_09_24_222619_create_table_jurusan_pendidikan', 2),
(26, '2021_09_25_113012_create_table_diklat_struktural', 3),
(27, '2021_09_25_171247_create_table_diklat_fungsional', 4),
(28, '2021_09_25_171258_create_table_diklat_teknis', 4),
(29, '2021_09_25_171319_create_table_jabatan_fungsional_umum', 4),
(30, '2021_09_25_171331_create_table_jabatan_fungsional_tertentu', 4),
(31, '2021_09_25_171408_create_table_eselon_jabatan', 4),
(32, '2021_09_25_171427_create_table_pejabat_penetap', 4),
(33, '2021_09_25_171438_create_table_pejabat_negara', 4),
(34, '2021_09_25_193534_create_table_jabatan_korpri', 5),
(35, '2021_09_25_193926_create_table_jenis_jabatan', 6),
(36, '2021_09_30_210522_create_table_referensi_kategori_arsip', 7),
(39, '2021_09_30_213535_create_table_arsip', 8),
(42, '2021_10_13_213753_create_table_identitas_pegawai', 9),
(45, '2021_10_16_114131_create_table_cpnspns', 10),
(46, '2021_10_17_150717_create_table_pangkat', 11),
(47, '2021_10_18_000958_create_table_jabatan', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenisNaikPangkat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `masaKerjaGolonganTahun` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `masaKerjaGolonganBulan` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tmtGolongan` date DEFAULT NULL,
  `nomorSk` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalSk` date DEFAULT NULL,
  `nomorPertek` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tanggalPertek` date DEFAULT NULL,
  `sutattsu` enum('1','0','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id`, `rinku`, `pegawai_id`, `pangkat_id`, `jenisNaikPangkat_id`, `masaKerjaGolonganTahun`, `masaKerjaGolonganBulan`, `tmtGolongan`, `nomorSk`, `tanggalSk`, `nomorPertek`, `tanggalPertek`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$0SecUJWI3qwFZ32Z3gmkeetpfFF0ioQIEZJdLYHAWDAbPCBWWOCjK', 9, 13, 15, '0', '0', '2020-12-01', '813.3/6544/BKPSDM-B/2020', '2020-12-16', 'AG-26104000015', '2020-11-30', '2', '2021-10-17 14:38:54', '2021-10-17 16:59:06'),
(2, '$2y$10$lbRjEAfaH1lKV3PkrtOUAeJYtD$gEpWcf3GBk7bLYeAlrzlKCsfwa', 9, 5, 4, '0', '0', '2021-10-17', '0', '2021-10-17', '0', '2021-10-17', '0', '2021-10-17 16:42:39', '2021-10-17 16:42:50'),
(3, '$2y$10$EyZAbtioa81s5gP2gEe4VeBbixOlmBnZX6adXnOjkAcm7hv0jWlXq', 9, 5, 4, '1', '1', '2021-10-17', '1', '2021-10-17', '1', '2021-10-17', '1', '2021-10-17 16:46:28', '2021-10-17 16:58:43'),
(4, '$2y$10$VTA04AGwNZjsKr6VBaXAtAAZ0c07I$DM43PZUkyNzgYd2XixLtSAO', 9, 6, 4, '2', '2', '2021-10-17', '2', '2021-10-17', '2', '2021-10-17', '1', '2021-10-17 16:46:36', '2021-10-17 16:59:06'),
(5, '$2y$10$AqzI25Fm4J3xbQKvHMCTqup$6AlhKWPVAH1YGbolrjsmANkxjZ9tW', 9, 5, 4, '', '', '2021-10-18', '', '2021-10-18', '', '2021-10-18', '1', '2021-10-17 17:00:58', '2021-10-17 17:00:58'),
(6, '$2y$10$bgFKmzUcGf23OqaR1DwhEuEUx0aX2qpA60YT3LTk6OAH6TTzZgtuS', 9, 5, 4, '', '', '2021-10-18', '', '2021-10-18', '', '2021-10-18', '1', '2021-10-17 17:01:03', '2021-10-17 17:01:03'),
(7, '$2y$10$9X5NyCMvxj6dtfoWViNuzukvw9mXPL209pDyZXNiyjO1Yzmnkylam', 9, 5, 4, '', '', '2021-10-18', '', '2021-10-18', '', '2021-10-18', '1', '2021-10-17 17:01:06', '2021-10-17 17:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pejabatNegara`
--

CREATE TABLE `pejabatNegara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabatNegara`
--

INSERT INTO `pejabatNegara` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$cdu7F2pbZYMwlXp3vVX$vO0TluavJRRQjLHW7AYhsdgqtqztGKP5G', 'qwe', '1', '2021-09-25 14:16:43', '2021-09-25 14:16:43'),
(2, '$2y$10$bj9DzhYTi6H3xPbM6w266OfEi01rv$LpHLR3dJEgN7RDVHrs742cK', 'sdf', '1', '2021-09-25 14:16:47', '2021-09-25 14:16:47'),
(3, '$2y$10$XArWiJZe$O9XfE4lgdJg2u9yPzcCsn8LIcTIjX0kOeoiQDrxGp29y', '123324', '1', '2021-09-25 14:16:51', '2021-09-25 14:16:51'),
(4, '$2y$10$wUjtk0Q8LsC4MSBEgBpvQAOFz6ewsNByqbo3P2QxBeTfaFIqn1qsC', 'bnvn', '1', '2021-09-25 14:16:54', '2021-09-25 14:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `pejabatPenetap`
--

CREATE TABLE `pejabatPenetap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabatPenetap`
--

INSERT INTO `pejabatPenetap` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$H92wsA0qhQ1yycqyC4M5Cexcdofpav1JELS6bfZvdB65gyWE9LLIm', 'qwe', '1', '2021-09-25 14:16:22', '2021-09-25 14:16:22'),
(2, '$2y$10$UsjiifNAYOPJMGf8M4QnXe5NiBTZ8Jwrz2VRZjyGO49zYz$JD3LuK', 'ert', '1', '2021-09-25 14:16:26', '2021-09-25 14:16:26'),
(3, '$2y$10$sp6sB7AqqXFQQA$0riuhNuFqPpI7O8uYyWoN2KWgSneCbnfiKW2RA', 'tyu', '1', '2021-09-25 14:16:30', '2021-09-25 14:16:30'),
(4, '$2y$10$shN2UeGbeYAGJBeHp6F9pe4lja08V1wtHPniKN15cj3T6Zpf0GFEG', 'asd', '1', '2021-09-25 14:16:33', '2021-09-25 14:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$dZy5b1hLoJRZO5dAdUVOkeanvS4i3u7ydw1oc5kYXKGr7ryoXftVa', 'Islam', '1', '2021-09-19 04:53:15', '2021-09-19 04:53:15'),
(2, '$2y$10$3ejm7MzbJZ6lzx23ZprU7ARCvkGO0IxPjXyCET9OHKZNzxngYynIy', 'Kristen', '1', '2021-09-19 14:14:48', '2021-10-14 08:30:39'),
(3, '$2y$10$fLcVkS3GZWf0eJlSoBHqHOskvkk2tvYFIhwtYo1UeW2XOATpyUSbK', 'qwe', '0', '2021-10-02 04:38:52', '2021-10-14 08:29:31'),
(4, '$2y$10$fPjrVLJSzaAka1GA4qd$JOuYvGow00QmOL5jyuty2rCqqdFyNIlTK', 'asd', '0', '2021-10-02 04:38:56', '2021-10-14 08:29:56'),
(5, '$2y$10$JLjKBhVm3juQnW2Pppd68OtUr2ET2tTPEUziW7et3A5ZcQMcZiU5i', 'zxc', '0', '2021-10-02 04:39:01', '2021-10-14 08:29:53'),
(6, '$2y$10$Zhezc9eAvMLvemejXl919AGfn2QX5LgNhP9r0uRGouiQz1uCnTaom', '123', '0', '2021-10-02 04:39:05', '2021-10-14 08:29:51'),
(7, '$2y$10$ClYGZg2i3XGr3jkHSR8f1uAfstTlsNEmlABD3Yiq6fsXRsP96xkhA', 'rty', '0', '2021-10-02 04:39:10', '2021-10-14 08:29:48'),
(8, '$2y$10$UkMpi0PLiQTXasq3Bwz6tuK6Ammpj3sXmaqTAtcQrsbl20Az4BiAy', 'fgh', '0', '2021-10-02 04:39:13', '2021-10-14 08:29:46'),
(9, '$2y$10$HTGcQwfgaIzDXhDkhRvdKeyAl4$Dlq$vlmcsK2456F1PfjXkYu33G', 'vbn', '0', '2021-10-02 04:39:17', '2021-10-14 08:29:44'),
(10, '$2y$10$4QsM6MRetis6qcw0oXdNDucJpwSRmO9du2yw4V7TvY0XbKmAvtwq6', 'iop', '0', '2021-10-02 04:39:21', '2021-10-14 08:29:38'),
(11, '$2y$10$A9fvUItS8FVoQIWa9pyKbOlG4s4a$DAgp1AXFg$o0NTikY9ZIBa$W', 'kl;', '0', '2021-10-02 04:39:25', '2021-10-14 08:29:35'),
(12, '$2y$10$8QhBAYdtUAGMYwU3GIvGYOpAEqHD9UTmNA0hexCnTJ32jSSgNQ4D6', 'm,.', '0', '2021-10-02 04:39:29', '2021-10-14 08:29:33'),
(13, '$2y$10$lzEJbOwc7oKjLMgr7CF1nO4RTBVPqJvfS1ELVODnIsYScVBLdMwgG', 'Khatolik', '1', '2021-10-14 08:30:45', '2021-10-14 08:30:45'),
(14, '$2y$10$jAhESg1fqQJrjg774Di1YOU5oHAa0qkYdHlvm$B94AoDNQBT6FMAm', 'Hindu', '1', '2021-10-14 08:30:53', '2021-10-14 08:30:53'),
(15, '$2y$10$CCBPg$TrqtNt0rnbMzMUxOIxe4BeE5iHBZ8RQF6mGR7iFiBbwF8Ii', 'Budha', '1', '2021-10-14 08:30:58', '2021-10-14 08:30:58'),
(16, '$2y$10$9xZ8pHluNstO0o9zYtiOpOKU9lZSMhLS0ZSPsLuKfiDmHjZMFwHIm', 'Kong Hu Cu', '1', '2021-10-14 08:31:06', '2021-10-14 08:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `ref_bidang`
--

CREATE TABLE `ref_bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refUnor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_bidang`
--

INSERT INTO `ref_bidang` (`id`, `rinku`, `refUnor_id`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$J5MyuUFTJOl2LQA$2ond6A1zngDuQeU2jQQGmy7DN77gjWInryZJi', 2, 'Kepegawaiann', '0', '2021-09-19 13:19:30', '2021-10-14 08:32:12'),
(2, '$2y$10$6nunZ0ytr7cCUxgPEj6UVOu13Pu8nd90$69QtIyIa3a13NaVbOYp2', 4, 'Bidang Sana', '0', '2021-09-20 07:10:33', '2021-10-14 08:32:09'),
(3, '$2y$10$W5bM4eZMbzZdNQ35Z9xz3uSjYjztGl2Fm9V0ms$l93yWABOMNXcv2', 3, 'asd', '0', '2021-09-20 07:12:53', '2021-10-14 08:32:07'),
(4, '$2y$10$zLe7nPBn8OfNly82t7o4iAObmtONoCzLyuDkAMLUdzZ8k5fpVGc2q', 4, 'dsad', '0', '2021-09-20 08:21:22', '2021-09-20 13:14:49'),
(5, '$2y$10$Wq9p77FHP14gMbzefFA8pOiV5C3ie7d12rA5crYmr9cYE7vWOdmhm', 3, 'wd', '0', '2021-09-20 08:21:58', '2021-09-20 13:14:19'),
(6, '$2y$10$JQzvObgyArHxqlHNuWTNWOKFPqeaUlQPHLHAzBAHpMvSYUu55R6NS', 3, 'qweas', '0', '2021-09-26 10:39:57', '2021-10-14 08:32:06'),
(7, '$2y$10$BzJfK1JrMERJ05LCSz2bvAoOgA$4cuHz6znkXLtzaqfAnITG5QT2O', 1, 'Bidang Pengadaan, Kepangkatan, Informasi Pegawai dan Pensiun', '1', '2021-10-14 08:33:48', '2021-10-14 08:33:48'),
(8, '$2y$10$RTAt0o6c6OLPAmvsWvplJAe5WCrTJzodopd4R7rADZu43GPC5553A', 1, 'Bidang Diklat, Pengembangan Pegawai dan Disiplin', '1', '2021-10-14 08:35:54', '2021-10-14 08:35:54'),
(9, '$2y$10$t7UvCdwuxfxPpQC93Uym9ucFnLoe9TbFdTbPwEes9EUlaBOulOyAC', 1, 'Sekretariat', '1', '2021-10-14 08:50:28', '2021-10-14 08:50:28'),
(10, '$2y$10$g9ZUcZFWtGTkGeVQfFd2aup3WYUH50S$4ZSpNNRpKnPubYWoFxf8C', 4, 'Kecamatan Sungai Pinyuh', '1', '2021-10-20 19:45:10', '2021-10-20 19:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `ref_diklatFungsional`
--

CREATE TABLE `ref_diklatFungsional` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_diklatFungsional`
--

INSERT INTO `ref_diklatFungsional` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$GPbj$U4uX0AocpifRRAAZebkKOKbt1zOUifk7FEsPzOrGaVayhHTS', 'aa', '0', '2021-09-25 14:10:55', '2021-09-25 14:11:09'),
(2, '$2y$10$32NiCMmwVQRjOwbpUCmROeIJCGoZRM$n1XLRcGp7kDmnoNDAYAWsa', 'b', '1', '2021-09-25 14:10:59', '2021-09-25 14:10:59'),
(3, '$2y$10$L45iYCLP1Bhdw3ZteZzLQO8HvBNNjlHMklL2ZTxqZwhyvRXL41ccu', 'v', '1', '2021-09-25 14:11:03', '2021-09-25 14:11:03'),
(4, '$2y$10$aYRdoSCpJyRlf$VZzXmMfA4f6sr7X9HiYXC2gamfSMD5fJHXA8VNO', 'qwe', '1', '2021-09-25 14:11:37', '2021-09-25 14:11:37'),
(5, '$2y$10$uUrpvkbazrsEkxecuE6Awux4GNJuoi0Y95FwuPdTurAd3nKHU6YHm', 'asd', '1', '2021-09-25 14:11:42', '2021-09-25 14:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `ref_diklatStruktural`
--

CREATE TABLE `ref_diklatStruktural` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_diklatStruktural`
--

INSERT INTO `ref_diklatStruktural` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$pJPIWKnOW8tD90dty1YjWATmtvswdx9qGVQ$nT6awf4YJmD7uLw06', 'struktur 1', '1', '2021-09-25 09:29:16', '2021-09-25 09:29:16'),
(2, '$2y$10$upxtQNEYhD2V4nKh1JTfduGKn9N6RI5Kt5Ma1LwbREtoz3t5CQ9UC', 'struktur 12', '0', '2021-09-25 09:29:21', '2021-09-25 09:29:39'),
(3, '$2y$10$WokovVwIeZvIiplun2o7XeAmvOj2yrgyJB$3PjhPGdfywkQKs46A2', 'struktur', '1', '2021-09-25 09:29:27', '2021-09-25 09:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `ref_diklatTeknis`
--

CREATE TABLE `ref_diklatTeknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_diklatTeknis`
--

INSERT INTO `ref_diklatTeknis` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$$inqr7aUeyIEIFFR7CdpBuXvRxvKnDZ2AH3yqanvnGXJzZzBvO9Qu', 'a', '1', '2021-09-25 14:11:15', '2021-09-25 14:11:15'),
(2, '$2y$10$DeEHFbRpQdPYXb5$O6YgBODyaE$NAOIdYA7WrYhgRrk7kc27AKNUu', 'aa', '1', '2021-09-25 14:11:19', '2021-09-25 14:11:19'),
(3, '$2y$10$QG0johQb$VFIP$bJ$k8Q6eCSTNw9sUjNKNfMmaOZsZmU28zRqDamu', 'aaaa', '0', '2021-09-25 14:11:23', '2021-09-25 14:11:29'),
(4, '$2y$10$UWyuY3rkDToIX9xkPeI2hOEZQ96UJ348iBqK8lev6YZ8p6eLpXf5A', 'qwesad', '1', '2021-09-25 14:13:10', '2021-09-25 14:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jabatanFungsionalTertentu`
--

CREATE TABLE `ref_jabatanFungsionalTertentu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jabatanFungsionalTertentu`
--

INSERT INTO `ref_jabatanFungsionalTertentu` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$qrDmJ4I8XM6tcY9hDHkjLuO8EY185IFw1oHhOSBXv9rvnj8rw6CZG', 'waqds', '1', '2021-09-25 14:13:16', '2021-09-25 14:13:16'),
(2, '$2y$10$VtPLAYZHdpwVE2vfSjDK7O1X5pcmwstqAx8xHL7q8bInOyHeYhz5m', 'xzcasd', '1', '2021-09-25 14:13:20', '2021-09-25 14:13:20'),
(3, '$2y$10$u6fUxafRlQTZA5NYV4UgMA35zYUsjQ1X3eHpUMDaBK5pwBuCVC0hu', '213124qsad', '0', '2021-09-25 14:13:23', '2021-09-25 14:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jabatanFungsionalUmum`
--

CREATE TABLE `ref_jabatanFungsionalUmum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jabatanFungsionalUmum`
--

INSERT INTO `ref_jabatanFungsionalUmum` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$hrVxARDCkvTxsmWTSzeMJOHFWApZHIj3gRxPBT5U3PR5p7ljlKKRe', '234', '1', '2021-09-25 14:12:48', '2021-09-25 14:12:48'),
(2, '$2y$10$ddudAtgngmrFz6j00PJmXOBdDE$egRqYT2ohmKgQGr5fw5UR37Jrm', 'qwe', '1', '2021-09-25 14:12:51', '2021-09-25 14:12:51'),
(3, '$2y$10$Zq6uLRI0kyOvpXAvdAsSEeziNQlpuAcBIU0eldcXebnpE1q8TIXhK', 'asdzxc', '0', '2021-09-25 14:12:55', '2021-09-25 14:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jabatanKORPRI`
--

CREATE TABLE `ref_jabatanKORPRI` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jabatanKORPRI`
--

INSERT INTO `ref_jabatanKORPRI` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$EgP0BcU8MvXnXKsXDAGaxeMA2lCykcsfBzvRyLMFaovwOAEWIIFKG', 'qwe', '1', '2021-09-25 14:13:36', '2021-09-25 14:13:36'),
(2, '$2y$10$1Xw4c$E9ih4YKSkJPdpsXOfJcMryuyWE3kAPXd00pPFFqLR$vyCFy', 'asd', '1', '2021-09-25 14:13:41', '2021-09-25 14:13:41'),
(3, '$2y$10$4iLQv$15$dl3eIpJDhQ1JO1$j4A72YRueFvEZvMlmV9MJhzZ$$6G2', 'zxc', '1', '2021-09-25 14:13:45', '2021-09-25 14:13:45'),
(4, '$2y$10$xaAnIkGm3nkJgnRAlADPbOV1jTlaubW04roOJA$JhlJFMRwF5mKXi', '123', '0', '2021-09-25 14:13:48', '2021-09-25 14:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenisHukumanDisiplin`
--

CREATE TABLE `ref_jenisHukumanDisiplin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jenisHukumanDisiplin`
--

INSERT INTO `ref_jenisHukumanDisiplin` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$DhDMaPY0ZHmmDq0lcVPJTAxF4opXCANrMN8Ptn61QMMYZXwOaicyC', 'qwesad', '1', '2021-09-21 15:59:41', '2021-09-21 15:59:49'),
(2, '$2y$10$JtrSfxmwe2yHdLbuM$vNTAok55bDLKO2dmc4SmPawtLHG6bNHy6eW', 'asdzxc', '0', '2021-09-21 15:59:45', '2021-09-21 15:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenisJabatan`
--

CREATE TABLE `ref_jenisJabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jenisJabatan`
--

INSERT INTO `ref_jenisJabatan` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$DukrLL365niEeZfOAGo71efcHjoTpzJ1JQ4We2LxfjAfa5Qhes1SA', 'Struktural', '1', '2021-09-25 14:16:01', '2021-10-18 16:42:11'),
(2, '$2y$10$nOUOkPG3PeNzdNYf4VLsWuz9GbNU8BZPhUpw$Mr7hXSYkdDQfprVW', 'Fungsional Umum', '1', '2021-09-25 14:16:05', '2021-10-18 16:42:20'),
(3, '$2y$10$efRmg4gn$8Y0tWz5YXyd5Opy7KqmlELJMiwdHG0DKzuRNyaoAeJyu', 'Fungsional Tertentu', '1', '2021-09-25 14:16:08', '2021-10-18 16:42:27'),
(4, '$2y$10$F5Ch2zo6AdpHc3vxvNHpoeYhG4TcaX3dYFDLlzeFs8b1fUI$nzuJu', '123', '0', '2021-09-25 14:16:11', '2021-10-18 16:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenisKepegawaian`
--

CREATE TABLE `ref_jenisKepegawaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jenisKepegawaian`
--

INSERT INTO `ref_jenisKepegawaian` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$YR6FDzVrLTLT59TGOAODCerQM3BSYetAJTe9S69d9NsYdASYZa3nq', 'asd', '0', '2021-09-21 15:59:25', '2021-09-21 15:59:35'),
(2, '$2y$10$q4AgBE7oxoCwmcjsa7quyuD1sEwa3yeBaIsz9elOOIlAzFR1ZbPKS', 'qweqwe', '1', '2021-09-21 15:59:29', '2021-09-21 15:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenisNaikPangkat`
--

CREATE TABLE `ref_jenisNaikPangkat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jenisNaikPangkat`
--

INSERT INTO `ref_jenisNaikPangkat` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$JetMIItt1X5Rbawmq0jUhAd6zKhWboyON5bVb27uQPLtlnqrd1WL6', 'reguler', '0', '2021-09-24 14:36:41', '2021-10-17 08:48:29'),
(2, '$2y$10$OJk43OAFWOgXyswtl2ynIuRMQzTxAzqFdZ2Qv6NPhYMbDAnK$uvCq', 'tidak reguler rrrr', '0', '2021-09-24 14:36:47', '2021-10-17 08:48:26'),
(3, '$2y$10$hvlB9IdbXf5nZZ4KDSuhPOqwam7JOAAVLFRObsVXoI9AlKzSTRmpq', 'nyogok', '0', '2021-09-24 14:36:53', '2021-09-24 14:36:59'),
(4, '$2y$10$S$N9dad2msr2iF7URVFtLeCgjXJ4VrtmIoKJjiruD99c944ELRnTq', 'Reguler', '1', '2021-10-17 08:49:03', '2021-10-17 08:49:03'),
(5, '$2y$10$AYZMi7wHGgR2u5IMaG56uuMLbto97j9kdqs7HHak$FQPl2AkbFOwe', 'Pilihan (Jabatan Struktural)', '1', '2021-10-17 08:49:18', '2021-10-17 08:49:18'),
(6, '$2y$10$OTYjIEAY25goK572N8AIfuA3T3wue18drykwc0BASmlPKWQY3oWnG', 'Pilihan (Jabatan Fungsional Tertentu)', '1', '2021-10-17 08:49:33', '2021-10-17 08:49:33'),
(7, '$2y$10$WVkSHgmMpDCcr586FA3xHew6NZpUSyoUAQmP75hrtPH2mA06EKbSS', 'Pilihan (Penyesuaian Ijazah)', '1', '2021-10-17 08:49:46', '2021-10-17 08:49:46'),
(8, '$2y$10$Ff3Dc1a0tC7$AXyzdkX49uwrzR8DDCre2a1EnxBwwadooUwHLente', 'Pilihan (Sedang Melaksanakan Tugas Belajar)', '1', '2021-10-17 08:50:16', '2021-10-17 08:50:16'),
(9, '$2y$10$rfjnVKetRIFMUEYP6wgfeunhS7lK9b5imu$EUOTjXjXtn2AFyYGKy', 'Pilihan (Setelah Selesai Tugas Belajar)', '1', '2021-10-17 08:50:33', '2021-10-17 08:50:33'),
(10, '$2y$10$pRRObBUhuJxCdZLyAiHYfeO1exAySqHj9Ne8OsAWIIxhqy4dkb20S', 'Pilihan (Diperbantukan / Diperkerjakan Instansi Lain)', '1', '2021-10-17 08:50:55', '2021-10-17 08:51:07'),
(11, '$2y$10$t712qJ08UvjiqYIbsvR5yOY1Q6Na4FWc4b9cL28xwnZ$vYdlTVyKG', 'Pilihan (Penemuan Baru)', '1', '2021-10-17 08:51:25', '2021-10-17 08:51:25'),
(12, '$2y$10$fisCbfXAqjibK5sTiX0W2u7EhPWGe9XSewHQLVsX6QJ7XS60NW0tO', 'Pilihan (Prestasi Luar Biasa)', '1', '2021-10-17 08:51:37', '2021-10-17 08:51:37'),
(13, '$2y$10$e6OwoNJNHCvN2fGd2y473ACotTieUJqc9trF8I3$3KXFa1H0GaVcW', 'Pilihan (Pejabat Negara)', '1', '2021-10-17 08:51:52', '2021-10-17 08:51:52'),
(14, '$2y$10$WSAi0FqgjnHkghCaNw4fje7C4T6sZmR9FAhR3SVOWmDsc29lQTj52', 'Pilihan (Selama DPK/DPB)', '1', '2021-10-17 08:52:08', '2021-10-17 08:52:08'),
(15, '$2y$10$$CpOQa4mNxDicrzmEIFwme1jyAKolAypdILyv$74BWC0ZLnOJyIBe', 'Gol. dari Pengadaan CPNS/PNS', '1', '2021-10-17 08:52:27', '2021-10-17 08:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenisPenghargaan`
--

CREATE TABLE `ref_jenisPenghargaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jenisPenghargaan`
--

INSERT INTO `ref_jenisPenghargaan` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$nEowK9GI8$xKUdDwh3WZMAIRcnxdnpMLzcicUGaEjq76IGvkEVs3u', 'qwe', '0', '2021-09-21 16:00:00', '2021-09-21 16:00:11'),
(2, '$2y$10$QRdFmO10Ne2SDJ9mM8gt1ebESeCwOa7qKEx27UWKIYtcCZwPkLQ6G', 'qweasd', '1', '2021-09-21 16:00:04', '2021-09-21 16:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jurusanPendidikan`
--

CREATE TABLE `ref_jurusanPendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_jurusanPendidikan`
--

INSERT INTO `ref_jurusanPendidikan` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$61s5Q4nHictvVvyDO5tcHA04rI6zcpioju6UDwADm$wuTTBQ7rbWC', 'Teknik Informatika', '1', '2021-09-25 04:19:34', '2021-09-25 04:19:34'),
(2, '$2y$10$baXjucdo343GzahXHBeYAOeA9qTMSccAwsrPSYxuet2k9nDTsUigS', 'Ilmu Hukum', '0', '2021-09-25 04:19:41', '2021-09-25 04:19:59'),
(3, '$2y$10$Y53xHX2akSZGKB7cEvDnoOgwy$6E$oV8TTKdS2AYUkhqVtCC9o056', 'Teknik Sipil', '1', '2021-09-25 04:19:49', '2021-09-25 04:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kategoriArsip`
--

CREATE TABLE `ref_kategoriArsip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kategoriArsip`
--

INSERT INTO `ref_kategoriArsip` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$P7EhqXC$v$Eae6vVXXKWvO9D3sh4Fs9CU8LhrRWftAzl0GI$w9mCK', 'Kartu Identitas (KTP/KIA/SIM/Passport)', '1', '2021-09-30 14:17:46', '2021-10-20 20:13:30'),
(2, '$2y$10$J6OcO4a70Q5mSY0TYcpiQefKm17pUiGZyfRfnrKaSdzi88M$r6t42', 'Akta (Kelahiran/Pernikahan/Kematian)', '1', '2021-09-30 14:17:57', '2021-10-20 20:14:03'),
(3, '$2y$10$7W16n0qLJCbzi$u8wV$7gAzdaRN9W5SAnMsxa0HeZpXayR2$jbZ7K', 'Surat Keputusan (SK)', '1', '2021-09-30 14:18:05', '2021-10-20 08:35:46'),
(4, '$2y$10$2SE66aUuEW$t0RtjNGrDlAnMN3ZfuxazslIpl04Fkpe5kvgfwkW7u', 'Surat Keterangan (SuKet)', '1', '2021-10-20 08:35:58', '2021-10-20 08:35:58'),
(5, '$2y$10$Wc1VKsUEIqFNFNCzqKEFdeUa0Ir7Lxw8dyKFHRV6cAq$7y8AYOMmS', 'Foto', '1', '2021-10-20 20:14:11', '2021-10-20 20:14:11'),
(6, '$2y$10$OApXrAyvD5a67fPVRtn6kuKYOpsQ$7SCe9GjwR3SwOoNkfve9Ek7u', 'Kartu Keanggotaan (BPJS/NPWP/TASPEN/TAPERA/KARPEG/KARIS/KARSU/DLL)', '1', '2021-10-20 20:14:41', '2021-10-20 20:15:02'),
(7, '$2y$10$knmc15DHhitCM0L8SJ6B1A20A2cbyNzz9JNzZ$Bp3hw$dIHuuvSnA', 'Sertifikat', '1', '2021-10-20 20:15:19', '2021-10-20 20:15:19'),
(8, '$2y$10$9E2XATxNH$KErBA5lN6AIuAxcuQAFkL9c3q3wD0KIxzyMKh3OxkIC', 'Ijazah', '1', '2021-10-20 20:15:29', '2021-10-20 20:15:29'),
(9, '$2y$10$UQARre9uENh8yoBDHnecbOd49VlGka1LEmrAzWphxiJLpyKK83Meq', 'Transkrip', '1', '2021-10-20 20:15:38', '2021-10-20 20:15:38'),
(10, '$2y$10$hbOXBXSKBKgAFaOrvGtUEA3NASM3KA8VjxbQabShA5nKIsLIvK5MW', 'Lainnya (Mohon Ajukan Kategori Baru di Pengajuan dengan Menuliskan pada Keterangan)', '1', '2021-10-20 20:16:26', '2021-10-20 20:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kedudukanKepegawaian`
--

CREATE TABLE `ref_kedudukanKepegawaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_kedudukanKepegawaian`
--

INSERT INTO `ref_kedudukanKepegawaian` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$JJ09a8QjFS0dwAB6zq9cYOZAYvKb87ojzWMb0Pp7pRjrOS$ldnmqO', 'asd', '0', '2021-09-21 15:59:07', '2021-09-21 15:59:16'),
(2, '$2y$10$$Gi4dOOE3uaQ5OM5hYWVIA21h4z07q8QR64$kK1r9L1Q0oBt26dO2', 'qweqwe', '0', '2021-09-21 15:59:10', '2021-10-17 07:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pangkatGolonganRuang`
--

CREATE TABLE `ref_pangkatGolonganRuang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_pangkatGolonganRuang`
--

INSERT INTO `ref_pangkatGolonganRuang` (`id`, `rinku`, `name`, `pangkat`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$vHQpa4JUBHswxDj4iq5M$urUSU3YwXBjtRxSmU5WjG0oSdytcNCAO', 'II/b', 'Pengatur Muda TK I', '0', '2021-09-23 15:48:25', '2021-09-23 16:14:45'),
(2, '$2y$10$QyrauPHZTn7TecCD9Tvi2edszg7$KfxXx2xAdgSyAOOOn6WpWBuTC', 'ituloo', NULL, '0', '2021-09-23 15:48:30', '2021-09-23 15:48:44'),
(3, '$2y$10$aWWyx6E5WoaLD6wDJS99DAouLfaK$wt28Kjv13MHTxZ7gmtqZKJTu', 'I/a', 'Juru Muda', '0', '2021-09-23 16:04:22', '2021-10-17 07:28:48'),
(4, '$2y$10$54ftU1WFNuh3TjJTjUF9xut76rTyOprDWCeRHjlRGSJIp5xIaMq$K', 'wq', 'sad', '0', '2021-09-23 16:18:13', '2021-10-17 07:28:50'),
(5, '$2y$10$rv44NIrJqsBl$VpiiQZKtehwfzxw79633fhYNi9Gtok5Kfs6PhkuS', 'I/a', 'Juru Muda', '1', '2021-10-17 07:29:07', '2021-10-17 07:29:07'),
(6, '$2y$10$MHwgsMIKMI$qAJ5AQg9oUOHra9EYBPZMhFkOxc5OEAjD$l8wMcpfu', 'I/b', 'Juru Muda Tingkat I', '1', '2021-10-17 07:29:22', '2021-10-17 07:29:22'),
(7, '$2y$10$dAoV7kU9yNjuX7PrISfZ6AaoJNjk82KAQHeQW635LxF6sQ$BAccQu', 'I/c', 'Juru', '1', '2021-10-17 07:29:32', '2021-10-17 07:29:32'),
(8, '$2y$10$bDVqfGaw3pdAo3bMKYqtzA7SQSqA8XiGJopavBjvLjreAyJV0nRGA', 'I/d', 'Juru Tingkat I', '1', '2021-10-17 07:29:42', '2021-10-17 07:29:55'),
(9, '$2y$10$2AtgzLbBuUyKAniegEYgEugAbPtmNuT3VdvclGihyfDpZEnH30aWG', 'II/a', 'Pengatur Muda', '1', '2021-10-17 07:52:44', '2021-10-17 07:52:44'),
(10, '$2y$10$27MLUjgGDg1Bxdfe2cXTEA9YZITOb1rB9sm4$$SucgX7d1DKGrXGC', 'II/b', 'Pengatur Muda TK I', '1', '2021-10-17 07:52:57', '2021-10-17 07:52:57'),
(11, '$2y$10$PkzFUs$NOUanjl1uiyTMeeHDAMY84qlcNcacWX68vuzF8ZsH$gbJa', 'II/c', 'Pengatur', '1', '2021-10-17 07:53:05', '2021-10-17 07:53:05'),
(12, '$2y$10$u3uBsQDcMVUKTbT4YvdyaeWk0Pt7gpSHr0c3cYgyNhsqr1L3o3ARi', 'II/d', 'Pengatur TK I', '1', '2021-10-17 07:53:15', '2021-10-17 07:53:15'),
(13, '$2y$10$smDIGsY94QUdy1NyQOC9KuCwI3tA7XgTO0vvN2ZAhMf0Y4saD6xAy', 'III/a', 'Penata Muda', '1', '2021-10-17 07:53:28', '2021-10-17 07:53:28'),
(14, '$2y$10$Okzm3C4Zyj4sK$$CizagwuhSP4MMF5EPTqxntW9E3pFUnEaEei2si', 'III/b', 'Penata Muda TK I', '1', '2021-10-17 07:53:42', '2021-10-17 07:53:42'),
(15, '$2y$10$3WNcXQxhAaXtH4fRLzbW9euuTUZ3Tzdw3ytteJMF7pIgOSvEFb4Ty', 'III/c', 'Penata', '1', '2021-10-17 07:53:56', '2021-10-17 07:53:56'),
(16, '$2y$10$YG72U$oOQfz5M1Hed1m7KO3Jnja6BiacPafeWzg6556xyWyDKEPKA', 'III/d', 'Penata TK I', '1', '2021-10-17 07:54:05', '2021-10-17 07:54:05'),
(17, '$2y$10$YRTSdM9fkSCRvofnFHWaJuhfAexD5EAnYRBPZdiDqXozZXgXeqA2a', 'IV/a', 'Pembina', '1', '2021-10-17 07:54:22', '2021-10-17 07:54:22'),
(18, '$2y$10$Zk3NpPHCj$x2qA7cVFLsbuKAEQRxZIy6NeCaOK7qM0ouWvkNXzyLq', 'IV/b', 'Pembina TK I', '1', '2021-10-17 07:54:34', '2021-10-17 07:54:34'),
(19, '$2y$10$Ks1JODcmejDGjNihoC3PmOGoiVtwy1SfDuSw8t0El3ANP6rByRTZA', 'IV/c', 'Pembina Utama Muda', '1', '2021-10-17 07:54:54', '2021-10-17 07:54:54'),
(20, '$2y$10$73DJfvX4GnC8yLBSDpiA0AYyCFO9mqgf0dSQ$c8uG0iSJrLMLQb9e', 'IV/d', 'Pembina Utama Madya', '1', '2021-10-17 07:55:02', '2021-10-17 07:55:02'),
(21, '$2y$10$8F6sstPhxQyq8SjuxlH0jeGLkWQtagTwRmABi$lzuWqONOKV1FQuA', 'IV/e', 'Pembina Utama', '1', '2021-10-17 07:55:12', '2021-10-17 07:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `ref_statusKepegawaian`
--

CREATE TABLE `ref_statusKepegawaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_statusKepegawaian`
--

INSERT INTO `ref_statusKepegawaian` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$Ts6urNS1mmphFc$T7WSBFu7CBNoA49iNzLe0JTa3dpAWBx7xUPYna', 'Cerai', '0', '2021-09-21 13:56:19', '2021-10-16 07:47:48'),
(2, '$2y$10$ncgaV4RYViFLPcOC3g8nHOUM7q45Zvz1LBOqVPNf8dCzGl3wp2X9G', 'Modar', '0', '2021-09-21 13:56:25', '2021-09-21 13:56:40'),
(3, '$2y$10$nHsvg3RHHkWah2TXUwmk6OiiHxsEYeEcqXAZwai3lAaW6M6e0U$CC', 'PNS', '1', '2021-09-21 13:56:31', '2021-09-21 13:56:37'),
(4, '$2y$10$PNl1tYufYDBvNlmPPwDNCuUFMGQmUnkfG2ud3miWd3dsQ5cDvoiEq', 'CPNS', '1', '2021-10-16 07:47:54', '2021-10-16 07:47:54'),
(5, '$2y$10$A9C3hDL2gd6JjZKHFMVFdOXumRwhGBAhyKOhbCPyiU$tlAx47dNvi', 'Pensiun', '1', '2021-10-16 07:48:02', '2021-10-16 07:48:02'),
(6, '$2y$10$OYOZURcJdWh6dCPfPDRb2esEAqJQZUgIxi5pxMoyQA9dk2r3E4OZi', 'Meninggal', '1', '2021-10-16 07:48:21', '2021-10-16 07:48:21'),
(7, '$2y$10$UHDJS$leih$Q$tXfVptrpujyQDEECLUcPAsCLVYU$kgFy7x6j6BjC', 'Pindah', '1', '2021-10-16 07:48:29', '2021-10-16 07:48:29'),
(8, '$2y$10$HDKhFQlsDgNL61mIzB8mGeBmEHIlgrxm$1vj6jJD6ymkYulhLEbgq', 'Berhenti', '1', '2021-10-16 07:48:39', '2021-10-16 07:48:39'),
(9, '$2y$10$SWe2wxdea0LFwpwkNG5IHOC6ypAaKxlyiUTk$1pV9iAAJn9s6Xdi2', 'PPPK', '1', '2021-10-16 07:48:46', '2021-10-16 07:48:46'),
(10, '$2y$10$iP9xUE1aW7$eMXEwOiToIewqqSUsjP4brieKthSJFu6w8ZyYDh7iC', 'Kontrak APBD', '1', '2021-10-16 07:48:51', '2021-10-16 07:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `ref_STLUD`
--

CREATE TABLE `ref_STLUD` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_STLUD`
--

INSERT INTO `ref_STLUD` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$c4FQtgGrZQIoQf0uDvZxcupueEKApNhhAHy036XAJIJgmfcHx4jZW', 'Tingkat 1', '1', '2021-09-24 14:08:17', '2021-09-24 14:08:28'),
(2, '$2y$10$$gbF5QulqKmv3SubRUpoHexvoxwbhKaLTwLjgnoYCeLvkA0YCVOZA', 'Tingkat 2', '1', '2021-09-24 14:08:22', '2021-09-24 14:08:22'),
(3, '$2y$10$BY9wpTFVWvU4RSIC2uIa8ADXMAAylyClCiMuHjgNDkXI7IUBuudj2', 'qweasd', '0', '2021-09-24 14:08:38', '2021-09-24 14:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `ref_subbid`
--

CREATE TABLE `ref_subbid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refBidang_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_subbid`
--

INSERT INTO `ref_subbid` (`id`, `rinku`, `refBidang_id`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$QEcoo597U1M1yHjnkO9vGeyRZnnLVMAnJ2KnDH8j1jipi2td7zctu', 3, 'the subbid', '0', '2021-09-20 15:22:00', '2021-10-14 08:36:01'),
(2, '$2y$10$GAtCjo9IMTMwpXjGSeNA2e1dlhWelWQ65lRcvu6yU1Fkpj4mSE0ZO', 1, 'sdffsd', '0', '2021-09-20 15:23:42', '2021-09-20 16:16:02'),
(3, '$2y$10$NeTT$4pwgmG5X3PWxzG9dO7QB8Dz1A1qafOIONCSsHWuuoGNSoGBC', 3, 'ewrdsf', '0', '2021-09-20 16:16:09', '2021-10-14 08:36:03'),
(4, '$2y$10$NAxHX3vsALpLLXScsVIpdOlDj2NATEwePHdVeZdImVcjqprG31fBS', 1, 'qwdxdas', '0', '2021-09-20 17:09:51', '2021-10-14 08:36:06'),
(5, '$2y$10$29bczVwCfPsH7cbgmeAC4ekUBx7hlcMPvGO0h0O1S9WRoDYQEYTte', 3, 'qwesadf', '0', '2021-09-20 17:09:57', '2021-09-21 13:17:17'),
(6, '$2y$10$ac4h5LaCdVIgrksZd2CGAOlQhu6l4g11x6R$EtBkQ5dS0Bmu14SuG', 8, 'Sub Bidang Pengembangan Pegawai', '1', '2021-10-14 08:36:25', '2021-10-14 08:36:25'),
(7, '$2y$10$4qbCDCJ1faSo5N24HfeyJeX2Ew7ngBKhRxYiMyo7I1k31doUoAbSW', 8, 'Sub Bidang Diklat', '1', '2021-10-14 08:47:26', '2021-10-14 08:47:26'),
(8, '$2y$10$XKz5gOL1MSj5SenQdzcXYu0PEj1hqpAGA4Z1FSxCtC7CdoRiBQqpS', 8, 'Sub Bidang Disiplin', '1', '2021-10-14 08:47:38', '2021-10-14 08:47:38'),
(9, '$2y$10$$Obvc7f4RPJReteeFXnvpO6C0rrTcWEicRR9NA5rABlHdHAvdQvyA', 7, 'Sub Bidang Pengadaan dan Pensiun', '1', '2021-10-14 08:47:56', '2021-10-14 08:47:56'),
(10, '$2y$10$3vWzowNKxya$bT2vlWQjYuktVHBPBeDQY5ltJANmZqN5P1VIpt2Bi', 7, 'Sub Bidang Kepangkatan', '1', '2021-10-14 08:48:09', '2021-10-14 08:48:30'),
(11, '$2y$10$sEm130Nlw9wJiZZcuNlMAA5BGeZS7isYAom4CqZCgpRoYDKJ61VXS', 7, 'Sub Bidang Informasi Kepegawaian', '1', '2021-10-14 08:48:24', '2021-10-14 08:48:24'),
(12, '$2y$10$Sw7TrbqyQPMJQGzuIrAFrAAxRwijJMXbgaMp$ApmyKjzyaZLPSxXa', 9, 'Kasubbag Umum dan Aparatur', '1', '2021-10-14 08:50:59', '2021-10-14 08:50:59'),
(13, '$2y$10$w1mpXH2Id$S8D87ZAZC2kOpsUZhvbHoR9pkVxELgSR669hf88eH2O', 9, 'Kasubbag Perencanaan dan Keuangan', '1', '2021-10-14 08:51:18', '2021-10-14 08:51:18'),
(14, '$2y$10$a17WQu2DVvhaXIzFBld0$APrUTwKEg4PVTr28KCwqA5gO00UUJyZq', 10, 'Sekolah Dasar Negeri 1 Sungai Pinyuh', '1', '2021-10-20 19:50:01', '2021-10-20 19:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tingkatPendidikan`
--

CREATE TABLE `ref_tingkatPendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_tingkatPendidikan`
--

INSERT INTO `ref_tingkatPendidikan` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$NU0nb60jhuknLQrpWdcLWe3AHOJz4P8gmZlVM3tUENMt6AvlLMLhS', 'SD', '1', '2021-09-24 15:23:57', '2021-09-24 15:23:57'),
(2, '$2y$10$OwlNdFuGCaco7xLtVMG46ewhgvnkbKkTFh4EmGwepdLHkL4taAxwC', 'SMP', '1', '2021-09-24 15:24:01', '2021-09-24 15:24:11'),
(3, '$2y$10$twWNlHVhLCXUr2sR9VTBNe0WU7Mbfc92ZMAKn3AajZJMpGoplpd5W', 'SUMU', '0', '2021-09-24 15:24:06', '2021-09-24 15:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `ref_unor`
--

CREATE TABLE `ref_unor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_unor`
--

INSERT INTO `ref_unor` (`id`, `rinku`, `name`, `sutattsu`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$HwOMD$aBBu6lVAkJuSdQUA7qA8OArQvkLsJoR6c4j$xqluA0GUA6e', 'Badan Kepegawaian & Pengembangan Sumber Daya Manusia', '1', '2021-09-19 04:53:36', '2021-09-19 04:53:36'),
(2, '$2y$10$S9NhNQKrFUdMFft55v632OvI8BvkS$njnuG1eN$rrolTb3jo3VA7e', 'Sekretariat Daerah', '1', '2021-09-19 07:05:22', '2021-09-19 07:05:22'),
(3, '$2y$10$V8Qc5dAs56o16pwutdZoDuC1dOXLG8pvox3S$MVAFRjHEn2Kr7vhy', 'Inspektorat Daerah', '1', '2021-09-19 07:05:34', '2021-09-19 07:05:34'),
(4, '$2y$10$ZWuCN2$nv$HcTtoVzHaHoOKyS144Pqsqv$q$AcyInmcqXuiqN9GzW', 'Sekolah', '1', '2021-09-19 12:40:28', '2021-10-20 19:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0cyy8CqY3S95FcAltu45T7rMjtKW0COW3SYI57ca', NULL, '180.248.170.215', 'Mozilla/5.0 (Windows NT 6.1; rv:93.0) Gecko/20100101 Firefox/93.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidUZHdkUyYW9rbEtWMjJPYTFaTW5BMFZBeXBkNkg4YnpPMkxicUE2diI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cHM6Ly9zaWFyaXAubWFzYXJpdW1hbi5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9zaWFyaXAubWFzYXJpdW1hbi5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGNqM0luVjV6YUJjd1JvRzFUVDBIUGV5U3dPSW5ONlB6RzhYZUU2VXE5SzI2OWdJcWJqbmQ2Ijt9', 1635409485),
('CyWHIBnmWOkHlId7VlAtL47XtWK87OApmLKDvHs3', NULL, '180.248.170.215', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkdheThpVHpXNzVVb3dzNW05TjgyVzlsdzdLdXRPSzNzRVJlbU02dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vc2lhcmlwLm1hc2FyaXVtYW4uY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cHM6Ly9zaWFyaXAubWFzYXJpdW1hbi5jb20iO319', 1635410511),
('NdA2R67VIHKQ2447MjVHteHq6cn38UemOw7WHZrj', NULL, '180.248.170.215', 'WhatsApp/2.21.12.21 A', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiamhwaEk4YndvcXlxQmM4aUdNVVhFZ25uVmdQMmlTOG5vNHJWTnFrUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cHM6Ly9zaWFyaXAubWFzYXJpdW1hbi5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9zaWFyaXAubWFzYXJpdW1hbi5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1635407117);

-- --------------------------------------------------------

--
-- Table structure for table `userRoles`
--

CREATE TABLE `userRoles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rinku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `juugyouinBangou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelarDepan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelarBelakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yuuzaaMei` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sashin` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `reberu` enum('3','2','1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '3 = Normal User, 2 = Admin Ruangan, 1 = Super Admin, 0 = Lagendary Admin',
  `subBidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sutattsu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `login` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rinku`, `juugyouinBangou`, `nip9`, `gelarDepan`, `name`, `gelarBelakang`, `tempatLahir`, `tanggalLahir`, `email`, `yuuzaaMei`, `sashin`, `reberu`, `subBidang_id`, `role_id`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `sutattsu`, `login`, `created_at`, `updated_at`) VALUES
(1, '123123', '199603142020121003', NULL, NULL, 'Arif Setiawan', NULL, 'adas', '2010-12-30', 'masariuman@gmail.com', 'masariuman', '199603142020121003_20211004104114.gif', '0', 1, NULL, '2021-09-19 04:02:36', '$2y$10$tyt1HADP9.zXshwSwhbix.v7M/iG5Ud3Vmkhha.TrtQ8cjisi6sKm', NULL, NULL, NULL, NULL, NULL, '0', '1', NULL, '2021-10-04 03:41:14'),
(3, '$2y$10$nyKjkiyXMELFrj$10JUOfOUp3OmJ4NOmtf6xKHntLyfe7UDPe7HfG', '199801012020121004', NULL, '', 'Fikry Fadhilnanto', 'A.Md.Kom', 'Pontianak', '1998-01-01', NULL, '199801012020121004', '199801012020121004_20211013222118.png', '0', 4, NULL, NULL, '$2y$10$5WFL8WWhsiopj2TA1IryZuHk5Jb.r9wMRluLehgIbcoC4stXLYrga', NULL, NULL, NULL, NULL, NULL, '1', '1', '2021-10-13 15:04:13', '2021-10-14 04:00:01'),
(4, '$2y$10$7aBi5KiycysDJoW5AgGmLAcb7qaITo$6GQnStusDrta7snmoo6v8A', 'qwd', NULL, NULL, 'wqed', 'wqe', 'qwe', '2021-12-31', NULL, 'qwd', 'avatar.jpg', '3', 3, NULL, NULL, '$2y$10$ZcvgoubTCytRT29ZXXqUc.q797lF6Bvq/kJJt7XPKDWHCwXmR4OKy', NULL, NULL, NULL, NULL, NULL, '0', '1', '2021-10-13 15:06:36', '2021-10-13 15:06:36'),
(5, '$2y$10$a4G48pkKQayj2X0NATqMaOmwpAzASS$B1czOEXPo$mzehprSES88e', '2132', '123', '213', 'qwe', 'q2ew', 'qwe', '2021-12-31', NULL, '2132', 'avatar.jpg', '3', 3, NULL, NULL, '$2y$10$9QTZqhYIei0SnzSr0uTKV.yO.P73UMMHtcVjIirLsORQQVjdGt0Xa', NULL, NULL, NULL, NULL, NULL, '0', '1', '2021-10-13 17:26:31', '2021-10-13 17:26:31'),
(9, '$2y$10$g0nnrLAGUCNg0kpFeUyUBu326rUodYcAEaxO5bC$BCP6B7ICX8$TW', '199603142020121003', '', '', 'Arif Setiawan', 'S.Kom', 'Pontianak', '1996-03-14', NULL, '199603142020121003', '199603142020121003_20211021153202.png', '0', 11, NULL, NULL, '$2y$10$ryyM.z5KQzx6ps7lMa8/3ud.EympqGF5oXek9HctZu0uRWLFXZnOa', NULL, NULL, NULL, NULL, NULL, '1', '1', '2021-10-14 17:36:17', '2021-10-21 15:32:02'),
(10, '$2y$10$C46ZkrMXrOTOFBPFud0AFOcjUUUiAu1rZiBK2qEnJ2xeG1BtHN8me', '21312', '', '', 'qwew', '', NULL, NULL, NULL, '21312', 'avatar.jpg', '3', 12, NULL, NULL, '$2y$10$EneU8KCEBbejC/L63H/F6uGsONkidczLtOo0Wkm0LV2SAhepDv8C2', NULL, NULL, NULL, NULL, NULL, '0', '1', '2021-10-17 21:26:32', '2021-10-17 21:26:32'),
(11, '$2y$10$jgPnZOIRVI6n07xYkNLxKeAql4S4AWxTYUB0eKqnbNSIRaQH7KdJa', '199611102020121006', '', '', 'Widy Kurniawan', 'S.Pd', 'Sampit', '1996-11-10', NULL, '199611102020121006', '199611102020121006_20211020200339.jpg', '2', 14, NULL, NULL, '$2y$10$2N9bZsxnmeHYVAK/kyzsOOmdwSQAVwygkcA05RlBmXCV1Bv2uNAk.', NULL, NULL, NULL, NULL, NULL, '1', '1', '2021-10-20 23:51:21', '2021-10-20 20:03:39'),
(12, '$2y$10$AlT7NpP8KgRMG2ShpPlfle$8p01M21AkCBZQ7h6I661TgQ6VasHGe', '123', '', '', '123', '213', '213', NULL, NULL, '123', 'avatar.jpg', '2', 14, NULL, NULL, '$2y$10$z/cJok5y9jqAZmLOiT9GOOr/CRoeLCK9W/lMaQpQCM0b90YQm/nmu', NULL, NULL, NULL, NULL, NULL, '0', '1', '2021-10-20 23:53:07', '2021-10-20 23:53:07'),
(13, '$2y$10$GdgJ7iL5sISnvWdYNA9Q3eYzBzlAxdng2y$aPAvgV8MZ39OndXUyi', '197902141998032001', '520013563', '', 'Devi Pebriyanti', '', 'Sintang', '1979-02-14', NULL, '197902141998032001', '197902141998032001_20211021075758.jpg', '2', 12, NULL, NULL, '$2y$10$zO8jh2HBgtZFdUU5lPg.Sugmu2bTlj9WJEb/yvDbK.BZH1H8mipZO', NULL, NULL, NULL, NULL, NULL, '1', '1', '2021-10-21 11:56:16', '2021-10-21 07:57:58'),
(14, '$2y$10$08FociEo1vLzATwQfPFjfuL0KZNlAvM1COKZwb1b2kz$uBSjpNUmu', '198401082009032007', '', '', 'Ella Victoria', '', 'Singkawang', '1984-01-08', NULL, '198401082009032007', '198401082009032007_20211028112532.png', '2', 11, NULL, NULL, '$2y$10$wYxTPsnz/qgDucQjGNTYn.R/ulzH6d.YzGSDhofdWoHcGOcM.sr/O', NULL, NULL, NULL, NULL, NULL, '1', '1', '2021-10-28 15:22:31', '2021-10-28 11:25:32'),
(15, '$2y$10$OFcP$9lIe2DsULnO9dlxYOoDfABlscHk0AcNC6BdCvVu60dx02gI2', '199306152015072002', '', '', 'Reisya Nurfauziah', '', 'Cianjur', '1993-06-15', NULL, '199306152015072002', '199306152015072002_20211028112637.png', '2', 11, NULL, NULL, '$2y$10$cj3InV5zaBcwRoG1TT0HPeySwOInN6PzG8XeE6Uq9K269gIqbjnd6', NULL, NULL, NULL, NULL, NULL, '1', '1', '2021-10-28 15:23:55', '2021-10-28 11:26:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alhuqulAlfareia`
--
ALTER TABLE `alhuqulAlfareia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alhuqulalfareia_heya_id_foreign` (`heya_id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arsip_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `arsip_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `cpnspns`
--
ALTER TABLE `cpnspns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpnspns_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `cpnspns_statuskepegawaian_id_foreign` (`statusKepegawaian_id`);

--
-- Indexes for table `eselonJabatan`
--
ALTER TABLE `eselonJabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `heya`
--
ALTER TABLE `heya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitasPegawai`
--
ALTER TABLE `identitasPegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identitaspegawai_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `identitaspegawai_agama_id_foreign` (`agama_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `jabatan_jenisjabatan_id_foreign` (`jenisJabatan_id`),
  ADD KEY `jabatan_subbid_id_foreign` (`subbid_id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluar_heya_id_foreign` (`heya_id`),
  ADD KEY `keluar_subbid_id_foreign` (`subbid_id`),
  ADD KEY `keluar_user_id_foreign` (`user_id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masuk_heya_id_foreign` (`heya_id`),
  ADD KEY `masuk_subbid_id_foreign` (`subbid_id`),
  ADD KEY `masuk_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pangkat_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `pangkat_pangkat_id_foreign` (`pangkat_id`),
  ADD KEY `pangkat_jenisnaikpangkat_id_foreign` (`jenisNaikPangkat_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pejabatNegara`
--
ALTER TABLE `pejabatNegara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pejabatPenetap`
--
ALTER TABLE `pejabatPenetap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_bidang_refunor_id_foreign` (`refUnor_id`);

--
-- Indexes for table `ref_diklatFungsional`
--
ALTER TABLE `ref_diklatFungsional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_diklatStruktural`
--
ALTER TABLE `ref_diklatStruktural`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_diklatTeknis`
--
ALTER TABLE `ref_diklatTeknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jabatanFungsionalTertentu`
--
ALTER TABLE `ref_jabatanFungsionalTertentu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jabatanFungsionalUmum`
--
ALTER TABLE `ref_jabatanFungsionalUmum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jabatanKORPRI`
--
ALTER TABLE `ref_jabatanKORPRI`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jenisHukumanDisiplin`
--
ALTER TABLE `ref_jenisHukumanDisiplin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jenisJabatan`
--
ALTER TABLE `ref_jenisJabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jenisKepegawaian`
--
ALTER TABLE `ref_jenisKepegawaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jenisNaikPangkat`
--
ALTER TABLE `ref_jenisNaikPangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jenisPenghargaan`
--
ALTER TABLE `ref_jenisPenghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_jurusanPendidikan`
--
ALTER TABLE `ref_jurusanPendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kategoriArsip`
--
ALTER TABLE `ref_kategoriArsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_kedudukanKepegawaian`
--
ALTER TABLE `ref_kedudukanKepegawaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_pangkatGolonganRuang`
--
ALTER TABLE `ref_pangkatGolonganRuang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_statusKepegawaian`
--
ALTER TABLE `ref_statusKepegawaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_STLUD`
--
ALTER TABLE `ref_STLUD`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_subbid`
--
ALTER TABLE `ref_subbid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_subbid_refbidang_id_foreign` (`refBidang_id`);

--
-- Indexes for table `ref_tingkatPendidikan`
--
ALTER TABLE `ref_tingkatPendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_unor`
--
ALTER TABLE `ref_unor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `userRoles`
--
ALTER TABLE `userRoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_heya_id_foreign` (`subBidang_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alhuqulAlfareia`
--
ALTER TABLE `alhuqulAlfareia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cpnspns`
--
ALTER TABLE `cpnspns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eselonJabatan`
--
ALTER TABLE `eselonJabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heya`
--
ALTER TABLE `heya`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identitasPegawai`
--
ALTER TABLE `identitasPegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pejabatNegara`
--
ALTER TABLE `pejabatNegara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pejabatPenetap`
--
ALTER TABLE `pejabatPenetap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_diklatFungsional`
--
ALTER TABLE `ref_diklatFungsional`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_diklatStruktural`
--
ALTER TABLE `ref_diklatStruktural`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_diklatTeknis`
--
ALTER TABLE `ref_diklatTeknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_jabatanFungsionalTertentu`
--
ALTER TABLE `ref_jabatanFungsionalTertentu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_jabatanFungsionalUmum`
--
ALTER TABLE `ref_jabatanFungsionalUmum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_jabatanKORPRI`
--
ALTER TABLE `ref_jabatanKORPRI`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_jenisHukumanDisiplin`
--
ALTER TABLE `ref_jenisHukumanDisiplin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_jenisJabatan`
--
ALTER TABLE `ref_jenisJabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_jenisKepegawaian`
--
ALTER TABLE `ref_jenisKepegawaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_jenisNaikPangkat`
--
ALTER TABLE `ref_jenisNaikPangkat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ref_jenisPenghargaan`
--
ALTER TABLE `ref_jenisPenghargaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_jurusanPendidikan`
--
ALTER TABLE `ref_jurusanPendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_kategoriArsip`
--
ALTER TABLE `ref_kategoriArsip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_kedudukanKepegawaian`
--
ALTER TABLE `ref_kedudukanKepegawaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_pangkatGolonganRuang`
--
ALTER TABLE `ref_pangkatGolonganRuang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ref_statusKepegawaian`
--
ALTER TABLE `ref_statusKepegawaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_STLUD`
--
ALTER TABLE `ref_STLUD`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_subbid`
--
ALTER TABLE `ref_subbid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ref_tingkatPendidikan`
--
ALTER TABLE `ref_tingkatPendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_unor`
--
ALTER TABLE `ref_unor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userRoles`
--
ALTER TABLE `userRoles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alhuqulAlfareia`
--
ALTER TABLE `alhuqulAlfareia`
  ADD CONSTRAINT `alhuqulalfareia_heya_id_foreign` FOREIGN KEY (`heya_id`) REFERENCES `heya` (`id`);

--
-- Constraints for table `arsip`
--
ALTER TABLE `arsip`
  ADD CONSTRAINT `arsip_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `ref_kategoriArsip` (`id`),
  ADD CONSTRAINT `arsip_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cpnspns`
--
ALTER TABLE `cpnspns`
  ADD CONSTRAINT `cpnspns_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cpnspns_statuskepegawaian_id_foreign` FOREIGN KEY (`statusKepegawaian_id`) REFERENCES `ref_statusKepegawaian` (`id`);

--
-- Constraints for table `identitasPegawai`
--
ALTER TABLE `identitasPegawai`
  ADD CONSTRAINT `identitaspegawai_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `ref_agama` (`id`),
  ADD CONSTRAINT `identitaspegawai_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_jenisjabatan_id_foreign` FOREIGN KEY (`jenisJabatan_id`) REFERENCES `ref_jenisJabatan` (`id`),
  ADD CONSTRAINT `jabatan_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `jabatan_subbid_id_foreign` FOREIGN KEY (`subbid_id`) REFERENCES `ref_subbid` (`id`);

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_heya_id_foreign` FOREIGN KEY (`heya_id`) REFERENCES `heya` (`id`),
  ADD CONSTRAINT `keluar_subbid_id_foreign` FOREIGN KEY (`subbid_id`) REFERENCES `alhuqulAlfareia` (`id`),
  ADD CONSTRAINT `keluar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_heya_id_foreign` FOREIGN KEY (`heya_id`) REFERENCES `heya` (`id`),
  ADD CONSTRAINT `masuk_subbid_id_foreign` FOREIGN KEY (`subbid_id`) REFERENCES `alhuqulAlfareia` (`id`),
  ADD CONSTRAINT `masuk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD CONSTRAINT `pangkat_jenisnaikpangkat_id_foreign` FOREIGN KEY (`jenisNaikPangkat_id`) REFERENCES `ref_jenisNaikPangkat` (`id`),
  ADD CONSTRAINT `pangkat_pangkat_id_foreign` FOREIGN KEY (`pangkat_id`) REFERENCES `ref_pangkatGolonganRuang` (`id`),
  ADD CONSTRAINT `pangkat_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  ADD CONSTRAINT `ref_bidang_refunor_id_foreign` FOREIGN KEY (`refUnor_id`) REFERENCES `ref_unor` (`id`);

--
-- Constraints for table `ref_subbid`
--
ALTER TABLE `ref_subbid`
  ADD CONSTRAINT `ref_subbid_refbidang_id_foreign` FOREIGN KEY (`refBidang_id`) REFERENCES `ref_bidang` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_subbid_id_foreign` FOREIGN KEY (`subBidang_id`) REFERENCES `ref_subbid` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `userRoles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
