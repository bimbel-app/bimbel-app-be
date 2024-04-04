-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 06:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `belajar`
--

CREATE TABLE `belajar` (
  `id_belajar` int(255) NOT NULL,
  `id_siswa` int(30) NOT NULL,
  `id_tentor` int(255) NOT NULL,
  `id_jadwal` int(255) NOT NULL,
  `id_mapel` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `belajar`
--

INSERT INTO `belajar` (`id_belajar`, `id_siswa`, `id_tentor`, `id_jadwal`, `id_mapel`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, '2024-01-17 07:17:12', '2024-01-17 07:17:12'),
(3, 2, 2, 2, 1, '2024-01-17 00:22:30', '2024-01-17 07:22:30'),
(4, 2, 1, 2, 3, '2024-01-17 07:27:32', '2024-01-17 07:27:32'),
(5, 5, 2, 5, 2, '2024-01-17 00:27:24', '2024-01-17 07:27:24'),
(6, 7, 2, 5, 2, '2024-01-17 02:01:58', '2024-01-17 09:01:58'),
(7, 3, 1, 1, 3, '2024-01-18 21:23:10', '2024-01-19 04:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(255) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `waktu` varchar(25) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `waktu`, `hari`, `created_at`, `updated_at`) VALUES
(1, '1 January 2023', '06.00', 'Minggu', '2024-01-16 16:50:29', '2024-01-16 23:50:29'),
(2, '2 January 2023', '07.00', 'Senin', '2024-01-16 16:50:59', '2024-01-16 23:50:59'),
(3, '3 January 2023', '08.00', 'Selasa', '2024-01-16 16:51:24', '2024-01-16 23:51:24'),
(4, '4 January 2023', '09.00', 'Rabu', '2024-01-16 16:51:44', '2024-01-16 23:51:44'),
(5, '21 Maret 2024', '10.00', 'Senin', '2024-03-25 13:18:06', '2024-03-25 13:18:06'),
(6, '12 April 2024', '10.00', 'Jumat', '2024-03-31 01:55:18', '2024-03-31 08:55:18'),
(7, '12 April 2024', '10.00', 'Jumat', '2024-03-31 01:56:00', '2024-03-31 08:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(255) NOT NULL,
  `nama_mapel` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Fisika', '2024-01-16 22:24:49', '2024-01-17 05:24:49'),
(2, 'Matematika', '2024-01-16 22:26:45', '2024-01-17 05:26:45'),
(3, 'Komputer', '2024-01-18 05:11:23', '2024-01-18 05:11:23'),
(5, 'Agama', '2024-01-17 22:11:52', '2024-01-18 05:11:52'),
(6, 'Ekonomi', '2024-01-17 22:15:20', '2024-01-18 05:15:20'),
(7, 'asdf', '2024-03-31 01:45:44', '2024-03-31 08:45:44'),
(8, 'asdf', '2024-03-31 01:46:44', '2024-03-31 08:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(8, '2014_10_12_000000_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(255) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `asal_sekolah` varchar(25) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `asal_sekolah`, `pendidikan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Chiya', 'Brigjend Katamso', 'SMP 3', 'Sri Gunting Medan', '2024-01-16 22:06:32', '2024-01-16 22:06:32'),
(2, 'Sepsa', 'Brigjend Katamso', 'SD', 'Medan', '2024-01-16 15:02:20', '2024-01-16 22:02:20'),
(3, 'Nay', 'Jagakarsa', 'SMP', 'Jakarta', '2024-01-16 15:02:46', '2024-01-16 22:02:46'),
(5, 'Ilham', 'SMA Purbalingga', 'SMA 1', 'Purbalingga', '2024-01-16 15:03:51', '2024-01-16 22:03:51'),
(6, 'Sisi', 'SD Purwokerto', 'SD', 'Purwokertoo', '2024-03-25 16:14:52', '2024-03-25 16:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `id_tentor` int(255) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `asal_sekolah` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `pengalaman` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`id_tentor`, `nama`, `asal_sekolah`, `alamat`, `pendidikan`, `pengalaman`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Aini', 'Unsoad', 'Purwokerto', 'S1', 'Guru SD', 'Mengajar guru SD', '2024-01-16 16:37:19', '2024-01-16 23:37:19'),
(2, 'Bubu', 'Unimed', 'Medan', 'S1 PGSD', 'Guru SD', 'Mengajar SD', '2024-01-16 16:38:35', '2024-01-16 23:38:35'),
(3, 'Cici', 'ITTP', 'Purbalingga', 'S1', 'Guru SMP', 'Mengajar guru SMP', '2024-01-16 16:39:40', '2024-01-16 23:39:40'),
(4, 'Dodo', 'USU', 'Banten', 'S2', 'Guru Bimbel', 'Mengajar guru SMA', '2024-01-16 16:40:40', '2024-01-16 23:40:40'),
(5, 'Eli', 'UI', 'Jakarta', 'S1', 'Guru Bimbel', 'Mengajar siswa SMA', '2024-01-16 16:41:24', '2024-01-16 23:41:24'),
(7, 'asdf', 'asd', 'asdf', 'asdf', 'asdf', 'asdf', '2024-03-30 22:09:14', '2024-03-31 05:09:14'),
(8, 'asdf', 'asd', 'asdf', 'asdf', 'asdf', 'asdf', '2024-03-30 22:09:31', '2024-03-31 05:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asdf', 'asdf@asdf.com', '37482374', NULL, '$2y$10$z5vtceHxazccACW9IMQYkOa8OANXkcUSQvc17jEcOjF0bZFJ8fcvu', NULL, '2024-02-26 05:54:45', '2024-02-26 05:54:45'),
(2, 'asdasd', 'asda', 'asdas@asdas.com', '187281723', NULL, '$2y$10$Gl7x1XB8wvyenkEVzp5FAO08cPqMuv5Re9eqqqBjKWx50gwIVBnq2', NULL, '2024-02-26 05:55:30', '2024-02-26 05:55:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`id_tentor`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tentor`
--
ALTER TABLE `tentor`
  MODIFY `id_tentor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
