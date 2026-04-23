SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jadwal` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_kereta` bigint(20) UNSIGNED NOT NULL,
  `stasiun_asal` varchar(100) NOT NULL,
  `stasiun_tujuan` varchar(100) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jadwal` (`id_jadwal`, `id_kereta`, `stasiun_asal`, `stasiun_tujuan`, `tanggal_berangkat`, `jam_berangkat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jakarta Gambir', 'Surabaya Pasar Turi', '2025-06-10', '08:00:00', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(2, 2, 'Jakarta Gambir', 'Bandung', '2025-06-11', '10:30:00', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(3, 3, 'Bandung', 'Yogyakarta', '2025-06-12', '14:00:00', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(4, 1, 'Surabaya Pasar Turi', 'Bandung', '2025-06-13', '07:00:00', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(5, 2, 'Yogyakarta', 'Jakarta Gambir', '2025-06-14', '09:15:00', '2026-04-05 16:24:19', '2026-04-05 16:24:19');

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `kereta` (
  `id_kereta` bigint(20) UNSIGNED NOT NULL,
  `nama_kereta` varchar(100) NOT NULL,
  `kelas` enum('Ekonomi','Bisnis','Eksekutif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kereta` (`id_kereta`, `nama_kereta`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'Argo Bromo Anggrek', 'Eksekutif', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(2, 'Gajayana Express', 'Bisnis', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(3, 'Matarmaja', 'Ekonomi', '2026-04-05 16:24:19', '2026-04-05 16:24:19');

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_01_000000_create_users_table', 1),
(2, '2024_01_01_000001_create_penumpang_table', 1),
(3, '2024_01_01_000002_create_kereta_table', 1),
(4, '2024_01_01_000003_create_jadwal_table', 1),
(5, '2024_01_01_000004_create_pemesanan_table', 1),
(6, '2024_01_01_000005_add_user_id_to_pemesanan_table', 1),
(7, '2024_01_01_000000_create_users_table', 1),
(8, '2024_01_01_000001_create_penumpang_table', 1),
(9, '2024_01_01_000002_create_kereta_table', 1),
(10, '2024_01_01_000003_create_jadwal_table', 1),
(11, '2024_01_01_000004_create_pemesanan_table', 1),
(12, '2024_01_01_000005_add_user_id_to_pemesanan_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(14, '2024_01_01_000006_add_photo_profile_to_users_table', 2),
(15, '2024_01_01_000007_create_cache_table', 3),
(16, '2024_01_01_000008_create_sessions_table', 3),
(17, '2024_01_01_000009_create_jobs_table', 3);

CREATE TABLE `pemesanan` (
  `id_pemesanan` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_penumpang` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'confirmed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pemesanan` (`id_pemesanan`, `user_id`, `id_penumpang`, `id_jadwal`, `tanggal_pesan`, `jumlah_tiket`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '2026-04-05', 1, 'confirmed', '2026-04-05 16:26:23', '2026-04-05 16:26:23'),
(2, 2, 1, 3, '2026-04-06', 1, 'cancelled', '2026-04-05 19:19:53', '2026-04-19 09:07:59');

CREATE TABLE `penumpang` (
  `id_penumpang` bigint(20) UNSIGNED NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penumpang` (`id_penumpang`, `nama_penumpang`, `nik`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'BadutZY', '3201234567890000', '089718276782', '2026-04-05 16:26:23', '2026-04-05 16:26:23');

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

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('26hlMZKf75E1eBSeemklHWUG6M6LR6Mq163k0ZoI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2JCUlhZeGNHUWIwdFl1SlF1YXVaa3VRSFc5ZXpLTjI4R2ZXNmxPMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776904071),
('M7StwVHw838oVC5r1Odi1qic7DOFEpwiJqOoDr01', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZGhBMnRPVnBaM21OaTZWOHdmSUg2RmpXTUxtTElIM0pOWlQ4NlY2WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7czo1OiJyb3V0ZSI7czoxNDoidXNlci5kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1776904606);

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `no_hp` varchar(15) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `photo_profile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `no_hp`, `nik`, `photo_profile`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@kaiexpress.id', '$2y$12$9QynFrOOpGk0WStMHtgIrOPOQzRdQ9SnFR1GGmU5B7KLKUstRcsxe', 'admin', '081100000001', NULL, NULL, NULL, 'vlEz4h37zJW2ZmiHvs1G8foylhzZoBVp7X3w2G1MUqRRLV41vDnkD78zGnJe', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(2, 'BadutZY', 'badut@gmail.com', '$2y$12$IA8MHDhxQZFX3x3DFbhiqucMVpS6FLpxnOYl8Xt/zPzU5Sm2FpX4u', 'user', '089718276782', '3201234567890000', 'profile_photos/NmJWPNaHSYqpjAfWRWB3pERa1ZOGrRHICUsEc8hk.jpg', NULL, '8FZzozOusti9IZ8Ts2AUgeDVpZ1qE27az8Akb5QlOUqNdHbWJtqqo2ZgGNyw', '2026-04-05 16:24:19', '2026-04-06 03:21:16');

ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_id_kereta_foreign` (`id_kereta`);

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `pemesanan_user_id_foreign` (`user_id`),
  ADD KEY `pemesanan_id_penumpang_foreign` (`id_penumpang`),
  ADD KEY `pemesanan_id_jadwal_foreign` (`id_jadwal`);

ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD UNIQUE KEY `penumpang_nik_unique` (`nik`);

ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `kereta`
  MODIFY `id_kereta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `penumpang`
  MODIFY `id_penumpang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_kereta_foreign` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`) ON DELETE CASCADE;

ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_id_penumpang_foreign` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id_penumpang`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;