-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 17.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `doc_akta_lahir` text NOT NULL,
  `doc_pas_foto` text NOT NULL,
  `doc_kk` text NOT NULL,
  `doc_lain` text NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forms`
--

CREATE TABLE `forms` (
  `form_id` int(11) NOT NULL,
  `form_status_id` int(11) NOT NULL,
  `no_induk_siswa` varchar(11) DEFAULT NULL,
  `form_no_register` varchar(50) NOT NULL DEFAULT '',
  `form_fullname` varchar(100) NOT NULL,
  `form_callname` varchar(100) DEFAULT NULL,
  `form_agama` varchar(50) DEFAULT NULL,
  `form_gender` enum('L','P') NOT NULL,
  `form_tempat_lahir` varchar(50) DEFAULT NULL,
  `form_tanggal_lahir` date NOT NULL,
  `form_alamat` text NOT NULL,
  `form_jenis_alamat` enum('ortu','numpang','asrama') DEFAULT 'ortu',
  `form_wali` varchar(100) DEFAULT NULL,
  `form_orang_tua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`form_orang_tua`)),
  `form_pendidikan_orang_tua` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `form_pekerjaan_jabatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`form_pekerjaan_jabatan`)),
  `form_hubungan_anak` varchar(50) DEFAULT NULL,
  `form_telp` varchar(17) DEFAULT NULL,
  `form_as` enum('baru','pindahan') DEFAULT 'baru',
  `form_from` enum('rt','tk') DEFAULT 'rt',
  `form_asal_sekolah` text DEFAULT NULL,
  `form_tanggal_pindah` date DEFAULT NULL,
  `form_dari_kelas` int(11) DEFAULT NULL,
  `form_tk` text DEFAULT NULL,
  `form_tahun_tk` varchar(50) DEFAULT NULL,
  `form_lama_tk` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `accepted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `forms`
--

INSERT INTO `forms` (`form_id`, `form_status_id`, `no_induk_siswa`, `form_no_register`, `form_fullname`, `form_callname`, `form_agama`, `form_gender`, `form_tempat_lahir`, `form_tanggal_lahir`, `form_alamat`, `form_jenis_alamat`, `form_wali`, `form_orang_tua`, `form_pendidikan_orang_tua`, `form_pekerjaan_jabatan`, `form_hubungan_anak`, `form_telp`, `form_as`, `form_from`, `form_asal_sekolah`, `form_tanggal_pindah`, `form_dari_kelas`, `form_tk`, `form_tahun_tk`, `form_lama_tk`, `user_id`, `created_at`, `updated_at`, `accepted_at`) VALUES
(59, 2, '2318141003', 'J620230001', 'King Arthur', '', '', 'L', '', '2014-06-08', 'Perum Jenglot', 'ortu', '', '{\"ayah\":\"\",\"ibu\":\"\"}', NULL, '{\"pekerjaan\":\"\",\"jabatan\":\"\"}', NULL, '085695186848', 'baru', 'tk', NULL, NULL, NULL, 'TK Alfida 2', '2019', 1, 64, '2023-06-08 22:07:52', '2023-06-13 11:22:38', '2023-06-13 11:28:27'),
(60, 2, '2318141001', 'J620230002', 'Queen Bee', 'Bee', 'Islam', 'P', 'Bandung', '2009-06-08', 'Jauh', 'numpang', 'ucok', '{\"ayah\":\"Presdir Jang\",\"ibu\":\"Burang keng\"}', NULL, '{\"pekerjaan\":\"Karyawan Swasta\",\"jabatan\":\"Head Officer of Someday\"}', NULL, '081283', 'pindahan', 'tk', 'SD Fitrah Haniyah', '2023-06-13', 3, NULL, NULL, NULL, 65, '2023-06-08 23:14:02', '2023-06-13 10:42:42', '2023-06-13 11:28:12'),
(62, 2, '2318141002', 'J620230004', 'Aldi', 'Di', 'Islam', 'L', 'bekasi', '2023-02-07', 'jl. setia budi', 'ortu', '', '{\"ayah\":\"herli\",\"ibu\":\"nita\"}', NULL, '{\"pekerjaan\":\"bisnis\",\"jabatan\":\"kurir\"}', NULL, '09', 'baru', 'tk', '', '0000-00-00', 1, 'el hurriyah', '2009', 1, 67, '2023-06-11 21:03:59', '2023-06-11 21:19:35', '2023-06-13 11:28:23'),
(63, 2, '2318141004', 'J620230005', 'Cuy University', 'Cuy', 'Kristen', 'L', 'Bantul', '2002-06-15', 'Jakarta Pusat', 'ortu', 'Sang Wali', '{\"ayah\":\"Sang Ayah\",\"ibu\":\"Sang Ibu\"}', NULL, '{\"pekerjaan\":\"Bisnisman\",\"jabatan\":\"Sales\"}', NULL, '2002002002', 'baru', 'tk', NULL, NULL, NULL, 'TKIT Bantul', '2020', 2, 69, '2023-06-12 16:24:51', '2023-06-13 14:55:24', '2023-06-13 14:55:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_status`
--

CREATE TABLE `form_status` (
  `form_status_id` int(11) NOT NULL,
  `form_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_status`
--

INSERT INTO `form_status` (`form_status_id`, `form_status`) VALUES
(1, 'Pending'),
(2, 'Diterima'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `email`, `created_at`, `updated_at`, `role_id`) VALUES
(60, 'admin', '$2y$10$3SkJNnL.Z78kYp5zC6Afoug//vxKbI49.ucqgUDgkIJZ/uiGkKxZi', 'Reza Riyaldi Irawan', 'admin@admin.com', '2023-06-07 21:04:56', '2023-06-07 21:04:56', 1),
(64, 'arthur', '$2y$10$5O9FZRhK5.5CfszcxPttnOiN3f4L9np.uzSWauTtqWjxyn6wmJicW', 'King Arthur', 'arthur@king.com', '2023-06-08 22:07:52', '2023-06-08 22:07:52', 2),
(65, 'bee', '$2y$10$AyxSGkNIx/jE1xhgSIjVd.fgbLNYjZUWRskpCCrG8ZDF.jY/bN/16', 'Queen Bee', 'bee@queen.com', '2023-06-08 23:14:02', '2023-06-08 23:14:02', 2),
(67, 'aldi', '$2y$10$iKopDW.xii6XCMTamHh95ezaTUc0WOU8xdBRfoeQzEKSEYA/sa48e', 'Aldi', 'nadhirprasetya@gmail.com', '2023-06-11 21:03:59', '2023-06-11 21:03:59', 2),
(69, 'cuy', '$2y$10$V0uSQJON6X686RrwK7SGOOOoRIDk5As6UnuEOzwo0XocNrk1qzppO', 'Cuy University', 'cuy@university.com', '2023-06-12 16:24:51', '2023-06-12 16:24:51', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indeks untuk tabel `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `formulir_status_id` (`form_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `form_status`
--
ALTER TABLE `form_status`
  ADD PRIMARY KEY (`form_status_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `form_status`
--
ALTER TABLE `form_status`
  MODIFY `form_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `FK_documents_forms` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `FK_forms_form_status` FOREIGN KEY (`form_status_id`) REFERENCES `form_status` (`form_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_forms_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
