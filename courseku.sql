-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 10:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseku`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `durasi_jam` int(11) DEFAULT NULL,
  `instruktur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `judul`, `deskripsi`, `harga`, `durasi_jam`, `instruktur`) VALUES
(1, 'Belajar Python', '                                                                                                Kursus ini mengajarkan dasar-dasar pemrograman Python mulai dari tipe data, fungsi, hingga pembuatan proyek sederhana. Cocok untuk pemula yang ingin memulai karir di bidang data science atau pengembangan web.                                                                                ', 500000.00, 15, 'Budi Santoso'),
(2, 'Desain Logo dengan Canva', 'Pelajari cara membuat logo profesional menggunakan Canva tanpa perlu keahlian desain sebelumnya. Materi mencakup teori warna, tipografi, dan studi kasus branding untuk UMKM.', 300000.00, 10, 'Ani Wijaya'),
(3, 'Digital Marketing Dasar', 'Kuasai strategi pemasaran digital mulai dari SEO, iklan sosial media, hingga analisis Google Analytics. Dilengkapi dengan studi kasus dari bisnis lokal dan global.', 450000.00, 15, 'Candra Utama'),
(4, 'Bahasa Inggris Bisnis', 'Kursus intensif untuk meningkatkan kemampuan bahasa Inggris dalam konteks profesional: presentasi, negosiasi, penulisan email, dan komunikasi lintas budaya.', 600000.00, 30, 'Diana Putri'),
(5, 'Manajemen Waktu Produktif', 'Teknik proven untuk mengatur waktu, prioritas, dan produktivitas menggunakan metode Pomodoro, Eisenhower Matrix, dan tools seperti Notion/Trello. Termasuk sesi konseling individu.', 250000.00, 8, 'Eko Prasetyo'),
(12, 'Belajar Java', 'Belajar Java                    ', 12000.00, 4, 'Budi Sosa'),
(15, 'Belajar React JS', 'Belajar sampai mahir', 120000.00, 6, 'Sosa Elber'),
(16, 'Belajar MySQL', 'Membuat database memanglah susah jika anda pemula, dengan course ini anda diajarkan dari hal yang basic hingga profesional', 50000.00, 9, 'Santoso Imam');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_pembayaran` enum('LUNAS','PENDING','GAGAL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_kursus`, `id_siswa`, `tanggal_daftar`, `status_pembayaran`) VALUES
(1, 1, 1, '2025-06-13 07:14:18', 'LUNAS'),
(2, 2, 2, '2025-06-13 07:14:18', 'PENDING'),
(3, 3, 3, '2025-06-13 07:14:18', 'LUNAS'),
(4, 1, 4, '2025-06-13 07:14:18', 'GAGAL'),
(5, 4, 5, '2025-06-13 07:14:18', 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `email`, `no_telepon`) VALUES
(1, 'Rudi Hermawan', 'rudi@email.com', '081234567890'),
(2, 'Siti Rahayu', 'siti.rahayu@email.com', '082345678901'),
(3, 'Agus Setiawan', 'agus.setiawan@email.com', '083456789012'),
(4, 'Dewi Lestari', 'dewi.lestari@email.com', '084567890123'),
(5, 'Fajar Nugroho', 'fajar@email.com', '085678901234'),
(6, 'Ole Romeny', 'ole@example.com', '087657728373');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_kursus` (`id_kursus`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
