SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
(14, '2024_01_01_000006_add_photo_profile_to_users_table', 2);

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
(2, 2, 1, 3, '2026-04-06', 1, 'confirmed', '2026-04-05 19:19:53', '2026-04-05 19:19:53');

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
(1, 'Administrator', 'admin@kaiexpress.id', '$2y$12$9QynFrOOpGk0WStMHtgIrOPOQzRdQ9SnFR1GGmU5B7KLKUstRcsxe', 'admin', '081100000001', NULL, NULL, NULL, 'njo8PLr4wQGrLKRNEos02LCZK9GhXzbVfstZ7L93zBop707KEbLVGLp0DQaU', '2026-04-05 16:24:19', '2026-04-05 16:24:19'),
(2, 'BadutZY', 'badut@gmail.com', '$2y$12$IA8MHDhxQZFX3x3DFbhiqucMVpS6FLpxnOYl8Xt/zPzU5Sm2FpX4u', 'user', '089718276782', '3201234567890000', 'profile_photos/k52AnqEnjHcFa2VRY3AyEDtCXsH9AK4mS1KlnAj5.jpg', NULL, '6bs2q17oJRtokiZuVZMA6llK3pCy8hV3LYRPGT1WxhOr8JgdYKjLYYqz33Q8', '2026-04-05 16:24:19', '2026-04-05 19:16:36');

ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_id_kereta_foreign` (`id_kereta`);

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

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `kereta`
  MODIFY `id_kereta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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