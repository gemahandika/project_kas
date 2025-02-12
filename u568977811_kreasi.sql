-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 04:02 AM
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
-- Database: `u568977811_kreasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_akses`
--

CREATE TABLE `admin_akses` (
  `login_id` int(11) NOT NULL,
  `akses_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_akses`
--

INSERT INTO `admin_akses` (`login_id`, `akses_id`) VALUES
(1, 'super_admin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_akses`
--

CREATE TABLE `master_akses` (
  `akses_id` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_akses`
--

INSERT INTO `master_akses` (`akses_id`, `nama`) VALUES
('admin', 'Admin'),
('super_admin', 'Super Admin'),
('user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `status_karyawan` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nip`, `join_date`, `nama_anggota`, `divisi`, `cabang`, `status_karyawan`, `phone`, `alamat`, `saldo`, `status`) VALUES
(1, 'MES01', '2024-04-26', 'TES', 'IT', 'KARYAWAN', 'KARYAWAN TETAP', '081233221122', 'MEDAN', '100000', 'AKTIF'),
(2, 'MES02', '2024-05-27', 'TES02', 'TES', 'CABANG', '-', '082311223322', 'SIANTAR', '100000', 'AKTIF'),
(3, 'MES03', '2024-06-27', 'TES03', 'TES03', 'AGEN', '-', '0823223232', 'MEDAN', '100000', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukubesar`
--

CREATE TABLE `tb_bukubesar` (
  `id_bukubesar` int(11) NOT NULL,
  `jenis_bukubesar` varchar(100) NOT NULL,
  `tgl_bukubesar` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `debit_bukubesar` varchar(100) NOT NULL,
  `kredit_bukubesar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id_daftar` int(11) NOT NULL,
  `nama_daftar` varchar(100) NOT NULL,
  `alamat_daftar` varchar(100) NOT NULL,
  `nik_daftar` varchar(100) NOT NULL,
  `unit_daftar` varchar(100) NOT NULL,
  `hp_daftar` varchar(100) NOT NULL,
  `syarat_daftar` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status_daftar` varchar(100) NOT NULL,
  `status_karyawan` varchar(100) NOT NULL,
  `generate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar`
--

INSERT INTO `tb_daftar` (`id_daftar`, `nama_daftar`, `alamat_daftar`, `nik_daftar`, `unit_daftar`, `hp_daftar`, `syarat_daftar`, `tgl_daftar`, `status_daftar`, `status_karyawan`, `generate`) VALUES
(1, 'TES', 'MEDAN', 'MES01', 'IT', '081233221122', 'SETUJU', '2024-06-27', 'KARYAWAN', 'KARYAWAN TETAP', 'diterima'),
(2, 'TES02', 'SIANTAR', 'MES02', 'TES', '082311223322', 'SETUJU', '2024-06-27', 'CABANG', '-', 'diterima'),
(3, 'TES03', 'MEDAN', 'MES03', 'TES03', '0823223232', 'SETUJU', '2024-06-27', 'AGEN', '-', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_emas`
--

CREATE TABLE `tb_emas` (
  `id_emas` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nik_perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `berat_emas` varchar(100) NOT NULL,
  `lama_tab` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `nama`, `nik`, `tanggal`, `nominal`, `keterangan`) VALUES
(7, 'TES', 'MES01', '2024-06-27', 100000, 'IURAN WAJIB ANGGOTA'),
(8, 'TES02', 'MES02', '2024-06-27', 100000, 'IURAN WAJIB ANGGOTA'),
(9, 'TES03', 'MES03', '2024-06-27', 100000, 'IURAN WAJIB ANGGOTA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kantin`
--

CREATE TABLE `tb_kantin` (
  `id_kantin` int(11) NOT NULL,
  `nama_kantin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kantin`
--

INSERT INTO `tb_kantin` (`id_kantin`, `nama_kantin`) VALUES
(6, 'KANTIN ATC'),
(7, 'KANTIN PELANGI'),
(8, 'KANTIN TOMANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_katagori`
--

CREATE TABLE `tb_katagori` (
  `id_katagori` int(11) NOT NULL,
  `nama_katagori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_katagori`
--

INSERT INTO `tb_katagori` (`id_katagori`, `nama_katagori`) VALUES
(1, 'MODAL'),
(2, 'SIMPANAN ANGGOTA'),
(3, 'KANTIN KOPERASI'),
(4, 'MUDHARABAH'),
(5, 'LELANG UNDEL'),
(6, 'PENGADAAN GA'),
(7, 'PENGADAAN BERAS'),
(8, 'PENGADAAN HC'),
(9, 'MURABAHAH'),
(10, 'PENGADAAN BAZAR'),
(11, 'PENGADAAN BAJU SERAGAM'),
(12, 'PENGADAAN DTB'),
(13, 'PENGADAAN CABANG'),
(14, 'PENGEMBALIAN IURAN ANGGOTA KELUAR'),
(15, 'BIAYA OPERATIONAL KOPERASI'),
(16, 'PEMBELIAN SHOW CASE'),
(17, 'PARCEL ANGGOTA'),
(18, 'BAGI HASIL'),
(19, 'LEGALITAS KOPERASI'),
(20, 'DEPOSIT CORPORATE'),
(21, 'KONTAINER BOX'),
(22, 'PEMBELIAN STELING'),
(23, 'MEETING KOPERASI'),
(24, 'SEDEKAH');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mudharabah`
--

CREATE TABLE `tb_mudharabah` (
  `id_mudharabah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_murabahah`
--

CREATE TABLE `tb_murabahah` (
  `id_murabahah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id_notif` int(11) NOT NULL,
  `nama_notif` varchar(255) NOT NULL,
  `isi_notif` text NOT NULL,
  `tgl_notif` date NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id_report` int(11) NOT NULL,
  `tgl_report` date NOT NULL,
  `nama_report` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `debit_report` varchar(100) NOT NULL,
  `kredit_report` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id_report`, `tgl_report`, `nama_report`, `keterangan`, `debit_report`, `kredit_report`, `status`) VALUES
(2, '2024-02-17', 'MODAL', 'MODAL HIBAH (dari JNE KCU Medan atas Peoject KIS 2016)', '0', '0', 'aktif'),
(3, '2024-02-16', 'SIMPANAN ANGGOTA', 'SIMPANAN Anggota', '0', '0', 'aktif'),
(4, '2024-02-16', 'PENGADAAN GA', 'Hasil Usaha Pengadaan GA', '0', '0', 'aktif'),
(5, '2024-02-16', 'PENGADAAN HC', 'Hasil Usaha Pengadaan HC', '0', '0', 'aktif'),
(6, '2024-02-16', 'PENGADAAN BERAS', 'Hasil Usaha Pengadaan Beras Karyawan', '0', '0', 'aktif'),
(7, '2024-02-16', 'PENGADAAN CABANG', 'Hasil Usaha Pengadaan Cabang', '0', '0', 'aktif'),
(8, '2024-02-16', 'PENGADAAN BAZAR', 'Hasil Usaha Pengadaan Bazar Sembako', '0', '0', 'aktif'),
(9, '2024-02-16', 'PENGADAAN BAJU SERAGAM', 'Hasil Usaha Pengadaan Baju Seragam', '0', '0', 'aktif'),
(10, '2024-02-16', 'PENGADAAN DTB', 'Hasil Usaha Pengadaan DTB', '0', '0', 'aktif'),
(11, '2024-02-16', 'KANTIN KOPERASI', 'Hasil Usaha Kantin Koperasi', '0', '0', 'aktif'),
(12, '2024-02-16', 'MURABAHAH', 'Hasil Usaha Murabahah', '0', '0', 'aktif'),
(13, '2024-02-16', 'MUDHARABAH', 'Hasil Usaha Mudarabah', '0', '0', 'aktif'),
(14, '2024-02-16', 'LELANG UNDEL', 'Hasil Usaha Pengadaan Barang Lelang', '0', '0', 'aktif'),
(15, '2024-02-16', 'BIAYA OPERATIONAL KOPERASI', 'Biaya Operasional Koperasi', '0', '0', 'aktif'),
(16, '2024-02-16', 'SEDEKAH', 'Sedekah', '0', '0', 'aktif'),
(17, '2024-02-16', 'MEETING KOPERASI', 'Meeting Koperasi', '0', '0', 'aktif'),
(18, '2024-02-16', 'PARCEL ANGGOTA', 'Parcel Anggota', '0', '0', 'aktif'),
(19, '2024-02-16', 'PENGEMBALIAN IURAN ANGGOTA KELUAR', 'Pengembalian Iuran Anggota Keluar', '0', '0', 'aktif'),
(20, '2024-02-17', 'BAGI HASIL', 'Bagi Hasil Keuntungan', '0', '0', 'aktif'),
(21, '2024-02-17', 'PEMBELIAN STELING', 'Pembelian Steling', '0', '0', 'aktif'),
(22, '2024-02-17', 'PEMBELIAN SHOW CASE', 'Pembelian Showcase', '0', '0', 'aktif'),
(23, '2024-02-17', 'KONTAINER BOX', 'Kontainer Box', '0', '0', 'aktif'),
(24, '2024-02-17', 'DEPOSIT CORPORATE', 'Deposit Corporate', '0', '0', 'aktif'),
(25, '2024-02-17', 'LEGALITAS KOPERASI', 'Legalitas Koeprasi', '0', '0', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `nama_anggota`, `nik`, `jumlah_tagihan`, `tanggal`, `keterangan`, `status`) VALUES
(7, 'TES', 'MES01', 100000, '2024-06-27', 'IURAN WAJIB ANGGOTA', ''),
(8, 'TES02', 'MES02', 100000, '2024-06-27', 'IURAN WAJIB ANGGOTA', ''),
(9, 'TES03', 'MES03', 100000, '2024-06-27', 'IURAN WAJIB ANGGOTA', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `jenis_transaksi` varchar(100) NOT NULL,
  `jumlah_transaksi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nip`, `nama_anggota`, `jenis_transaksi`, `jumlah_transaksi`, `keterangan`, `tgl_transaksi`) VALUES
(1321, 'MES01', 'TES', 'pemasukan', '100000', 'IURAN WAJIB ANGGOTA', '2024-06-27'),
(1322, 'MES02', 'TES02', 'pemasukan', '100000', 'IURAN WAJIB ANGGOTA', '2024-06-27'),
(1323, 'MES03', 'TES03', 'pemasukan', '100000', 'IURAN WAJIB ANGGOTA', '2024-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer`
--

CREATE TABLE `tb_transfer` (
  `id_transfer` int(11) NOT NULL,
  `nama_transfer` varchar(100) NOT NULL,
  `nip_transfer` varchar(100) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `jenis_transfer` varchar(100) NOT NULL,
  `nominal_transfer` int(11) NOT NULL,
  `status_transfer` varchar(50) NOT NULL,
  `file_transfer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usaha_kantin`
--

CREATE TABLE `usaha_kantin` (
  `id_usaha` int(11) NOT NULL,
  `nama_kantin` varchar(100) NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `komisi` int(11) NOT NULL,
  `pembelian` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usaha_kantin`
--

INSERT INTO `usaha_kantin` (`id_usaha`, `nama_kantin`, `pendapatan`, `komisi`, `pembelian`, `keterangan`, `date`) VALUES
(19, 'KANTIN ATC', 1000000, 0, 0, 'KANTIN ATC PERIODE MEI', '2024-05-31'),
(20, 'KANTIN ATC', 1500000, 0, 0, 'KANTIN ATC PERIODE JUNI', '2024-06-27'),
(21, 'KANTIN PELANGI', 1200000, 0, 0, 'KANTIN PELANGI PERIODE MEI', '2024-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `login_id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login_id`, `nip`, `nama_user`, `username`, `password`, `status`) VALUES
(1, '', 'MES_IT', 'itmes', '202cb962ac59075b964b07152d234b70', 'super_admin'),
(2, '', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(175, 'MES01', 'TES', 'MES01', '123', 'NON AKTIF'),
(176, 'MES02', 'TES02', 'MES02', '123', 'NON AKTIF'),
(177, 'MES03', 'TES03', 'MES03', '123', 'NON AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD PRIMARY KEY (`login_id`,`akses_id`),
  ADD KEY `akses_id` (`akses_id`);

--
-- Indexes for table `master_akses`
--
ALTER TABLE `master_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_bukubesar`
--
ALTER TABLE `tb_bukubesar`
  ADD PRIMARY KEY (`id_bukubesar`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tb_emas`
--
ALTER TABLE `tb_emas`
  ADD PRIMARY KEY (`id_emas`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tb_kantin`
--
ALTER TABLE `tb_kantin`
  ADD PRIMARY KEY (`id_kantin`);

--
-- Indexes for table `tb_katagori`
--
ALTER TABLE `tb_katagori`
  ADD PRIMARY KEY (`id_katagori`);

--
-- Indexes for table `tb_mudharabah`
--
ALTER TABLE `tb_mudharabah`
  ADD PRIMARY KEY (`id_mudharabah`);

--
-- Indexes for table `tb_murabahah`
--
ALTER TABLE `tb_murabahah`
  ADD PRIMARY KEY (`id_murabahah`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  ADD PRIMARY KEY (`id_transfer`);

--
-- Indexes for table `usaha_kantin`
--
ALTER TABLE `usaha_kantin`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bukubesar`
--
ALTER TABLE `tb_bukubesar`
  MODIFY `id_bukubesar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_emas`
--
ALTER TABLE `tb_emas`
  MODIFY `id_emas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kantin`
--
ALTER TABLE `tb_kantin`
  MODIFY `id_kantin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_katagori`
--
ALTER TABLE `tb_katagori`
  MODIFY `id_katagori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_mudharabah`
--
ALTER TABLE `tb_mudharabah`
  MODIFY `id_mudharabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_murabahah`
--
ALTER TABLE `tb_murabahah`
  MODIFY `id_murabahah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1324;

--
-- AUTO_INCREMENT for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usaha_kantin`
--
ALTER TABLE `usaha_kantin`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD CONSTRAINT `admin_akses_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `user` (`login_id`),
  ADD CONSTRAINT `admin_akses_ibfk_2` FOREIGN KEY (`akses_id`) REFERENCES `master_akses` (`akses_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
