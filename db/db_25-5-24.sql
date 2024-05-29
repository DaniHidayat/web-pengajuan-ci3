-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 11:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengajuananggaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `No` varchar(255) DEFAULT NULL,
  `Program` varchar(255) DEFAULT NULL,
  `Kegiatan` varchar(255) DEFAULT NULL,
  `KRO` varchar(255) DEFAULT NULL,
  `RO` varchar(255) DEFAULT NULL,
  `Komponen` varchar(255) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `id_pengajuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`id`, `No`, `Program`, `Kegiatan`, `KRO`, `RO`, `Komponen`, `Satuan`, `Qty`, `subtotal`, `total`, `id_pengajuan`) VALUES
(240, '1', 'dddd', 'ddd', 'ddd', 'ddd', 'dd', 'd', 2, 3000.00, 6000.00, 86),
(241, '2', 'dddd', 'ddd', 'ddd', 'ddd', 'dd', 'd', 3, 2000.00, 6000.00, 86);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kegiatan_code` varchar(100) DEFAULT NULL,
  `kegiatan_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kegiatan_code`, `kegiatan_name`) VALUES
(1, '2147', 'Pelayanan Haji Dalam Negeri'),
(2, '2148', 'Pembinaan Haji');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id_komponen` int(11) NOT NULL,
  `komponen_code` varchar(100) DEFAULT NULL,
  `komponen_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `komponen_code`, `komponen_name`) VALUES
(1, '057', ' Penyelesaian Dokumen/Perlengkapan Jemaah Haji di Tingkat Kab/Kota'),
(2, '051', 'Rekrutmen/Seleksi PPIH Kloter');

-- --------------------------------------------------------

--
-- Table structure for table `kota_kabupaten`
--

CREATE TABLE `kota_kabupaten` (
  `ID_KotaKab` int(11) NOT NULL,
  `Nama_KotaKab` varchar(255) DEFAULT NULL,
  `ID_Provinsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota_kabupaten`
--

INSERT INTO `kota_kabupaten` (`ID_KotaKab`, `Nama_KotaKab`, `ID_Provinsi`) VALUES
(1, 'Kota Tasikmalaya', 1),
(2, 'Kota Sukabumi', 1),
(3, 'Kabupaten Tasikmalaya', 1),
(4, 'Kabupaten Sumedang', 1),
(5, 'Kabupaten Pangandaran', 1),
(6, 'Kabupaten Banjarnegara', 2),
(7, 'Kabupaten Banyumas', 2),
(8, 'Kota Magelang', 2),
(9, 'Kabupaten Bangkalan', 3),
(10, 'Kabupaten Banyuwangi', 3),
(11, 'Kota Kediri', 3),
(12, 'Kabupaten Lebak', 4),
(13, 'Kabupaten Pandeglang', 4),
(14, 'Kota Tangerang Selatan', 4),
(15, 'Kabupaten Administrasi Kepulauan Seribu', 5),
(16, 'Kota Administrasi Jakarta Pusat', 5),
(17, 'Kota Administrasi Jakarta Timur', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kro`
--

CREATE TABLE `kro` (
  `id_kro` int(11) NOT NULL,
  `kro_code` varchar(100) DEFAULT NULL,
  `kro_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kro`
--

INSERT INTO `kro` (`id_kro`, `kro_code`, `kro_name`) VALUES
(1, '2147.QAA', 'Pelayanan Publik kepada masyarakat'),
(2, '2148.QDC', ' Fasilitasi dan Pembinaan Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_anggaran`
--

CREATE TABLE `pengajuan_anggaran` (
  `id` int(11) NOT NULL,
  `kode_daerah` varchar(100) NOT NULL,
  `nilai_anggaran` decimal(20,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_anggaran`
--

INSERT INTO `pengajuan_anggaran` (`id`, `kode_daerah`, `nilai_anggaran`, `status`, `keterangan`, `created_at`) VALUES
(1, '03/Jawa barat', 8500000000.00, 'Approved', 'revisi wilayah bandung', '2024-05-03 06:34:30'),
(2, '04/Jawa timur', 9300000000.00, 'Pending', NULL, '2024-05-03 06:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kabkota`
--

CREATE TABLE `pengajuan_kabkota` (
  `id_pengajuan` int(11) NOT NULL,
  `kodenama_daerah` varchar(100) NOT NULL,
  `anggaran` decimal(15,2) DEFAULT NULL,
  `keterangan` varchar(200) NOT NULL,
  `Nama_pengajuan` varchar(200) NOT NULL,
  `tanggal_pengajuan` varchar(200) NOT NULL,
  `file_bukti` varchar(200) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `is_imported` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_kabkota`
--

INSERT INTO `pengajuan_kabkota` (`id_pengajuan`, `kodenama_daerah`, `anggaran`, `keterangan`, `Nama_pengajuan`, `tanggal_pengajuan`, `file_bukti`, `status`, `is_imported`) VALUES
(86, '2', NULL, '', 'DANI HIDAYAT', '2024-05-25', 'uploads/contoh1.xlsx', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `program_code` varchar(100) DEFAULT NULL,
  `program_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `program_code`, `program_name`) VALUES
(1, '025.09.DC', 'KERUKUNAN UMAT DAN LAYANAN KEHIDUPAN BERAGAMA'),
(2, '025.09.WA', 'DUKUNGAN MANAJEMEN');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `ID_Provinsi` int(11) NOT NULL,
  `Nama_Provinsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`ID_Provinsi`, `Nama_Provinsi`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Tengah'),
(3, 'Jawa Timur'),
(4, 'Banten'),
(5, 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `ro`
--

CREATE TABLE `ro` (
  `id_ro` int(11) NOT NULL,
  `ro_code` varchar(100) DEFAULT NULL,
  `ro_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ro`
--

INSERT INTO `ro` (`id_ro`, `ro_code`, `ro_name`) VALUES
(1, '2147.QAA.001', 'Layanan Administrasi Haji Dalam Negeri'),
(2, '2148.QDC.001', 'Petugas Haji yang Profesional');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan_name`) VALUES
(1, 'Lembaga');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akun_provinsi`
--

CREATE TABLE `tabel_akun_provinsi` (
  `id` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','kabupaten_kota','provinsi','pusat','monitoring','departement') NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_prov` varchar(200) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ID_Provinsi` int(200) NOT NULL,
  `ID_KotaKab` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `name_prov`, `wilayah`, `email`, `ID_Provinsi`, `ID_KotaKab`) VALUES
(1, 'superadmin', 'password_superadmin', 'super_admin', '', '', '', '', 0, 0),
(2, 'kabkota1', 'password_kabkota1', 'kabupaten_kota', '', '', '', '', 0, 0),
(3, 'provinsi1', 'password_provinsi1', 'provinsi', '', '', '', '', 0, 0),
(4, 'pusat1', 'password_pusat1', 'pusat', '', '', '', '', 0, 0),
(21, 'admin', 'aaa', 'kabupaten_kota', 'indoa123', '', 'jawa barat', 'rifkimuhammad2829@gmail.com', 0, 0),
(24, 'monitoring', 'monitoring', 'monitoring', '', '', '', '', 0, 0),
(26, 'kemitraan1', '$2y$10$tB2pnPPX.a1tFsuIaJvD4ubP2bcpgbl.SURCA6QRpu0j.SG1KLVN6', 'pusat', 'kemitraan1', '', '', 'kemitraan1@gmail.com', 0, 0),
(31, 'pegawai', '$2y$10$yBu1olaQT5Pz6OVPAdB2PeGmaO69.RuL3rgny1Cqk/0Ozp1JVLBLy', 'provinsi', '', 'jawa barat ', '', 'rifkimochfauzi@gmail.com', 1, 0),
(32, 'departement', 'departement_password', 'departement', 'departement1', 'jabar', 'Wilayah pusat', 'contoh_email@example.com', 0, 0),
(33, 'kabkota2', 'password_kabkota2', 'kabupaten_kota', '', '', '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_import_pengajuan_kabkota` (`id_pengajuan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  ADD PRIMARY KEY (`ID_KotaKab`),
  ADD KEY `ID_Provinsi` (`ID_Provinsi`);

--
-- Indexes for table `kro`
--
ALTER TABLE `kro`
  ADD PRIMARY KEY (`id_kro`);

--
-- Indexes for table `pengajuan_anggaran`
--
ALTER TABLE `pengajuan_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_kabkota`
--
ALTER TABLE `pengajuan_kabkota`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`ID_Provinsi`);

--
-- Indexes for table `ro`
--
ALTER TABLE `ro`
  ADD PRIMARY KEY (`id_ro`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tabel_akun_provinsi`
--
ALTER TABLE `tabel_akun_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kro`
--
ALTER TABLE `kro`
  MODIFY `id_kro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan_anggaran`
--
ALTER TABLE `pengajuan_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan_kabkota`
--
ALTER TABLE `pengajuan_kabkota`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ro`
--
ALTER TABLE `ro`
  MODIFY `id_ro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_akun_provinsi`
--
ALTER TABLE `tabel_akun_provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `fk_import_pengajuan_kabkota` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kabkota` (`id_pengajuan`);

--
-- Constraints for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  ADD CONSTRAINT `kota_kabupaten_ibfk_1` FOREIGN KEY (`ID_Provinsi`) REFERENCES `provinsi` (`ID_Provinsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
