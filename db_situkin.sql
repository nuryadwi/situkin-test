-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 08:27 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_situkin`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_alternatif`
--

CREATE TABLE `t_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hasil_alternatif` double DEFAULT NULL,
  `ket_alternatif` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_alternatif`
--

INSERT INTO `t_alternatif` (`id_alternatif`, `id_user`, `hasil_alternatif`, `ket_alternatif`) VALUES
(5, 58, 83.18, 'Mendapat Tunjangan'),
(7, 54, NULL, 'Tidak Mendapat Tunjangan');

-- --------------------------------------------------------

--
-- Table structure for table `t_alternatif_kriteria`
--

CREATE TABLE `t_alternatif_kriteria` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif_kriteria` double DEFAULT NULL,
  `bobot_alternatif_kriteria` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_alternatif_kriteria`
--

INSERT INTO `t_alternatif_kriteria` (`id_alternatif`, `id_kriteria`, `nilai_alternatif_kriteria`, `bobot_alternatif_kriteria`) VALUES
(5, 29, 100, 23.214285714285),
(5, 30, 100, 19.523809523809),
(5, 31, 80, 14.142857142857),
(5, 32, 80, 10.238095238095),
(5, 33, 100, 9.732142857143),
(5, 34, 80, 6.3333333333333),
(5, 35, 0, 0),
(5, 36, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_bobot1`
--

CREATE TABLE `t_bobot1` (
  `id_kriteria` int(11) NOT NULL,
  `bobot1` varchar(50) NOT NULL,
  `norm1` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bobot1`
--

INSERT INTO `t_bobot1` (`id_kriteria`, `bobot1`, `norm1`) VALUES
(29, '100', 0.25),
(30, '80', 0.2),
(31, '70', 0.175),
(32, '50', 0.125),
(33, '35', 0.0875),
(34, '30', 0.075),
(35, '25', 0.0625),
(36, '10', 0.025);

-- --------------------------------------------------------

--
-- Table structure for table `t_bobot2`
--

CREATE TABLE `t_bobot2` (
  `id_kriteria` int(11) NOT NULL,
  `bobot2` varchar(50) NOT NULL,
  `norm2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bobot2`
--

INSERT INTO `t_bobot2` (`id_kriteria`, `bobot2`, `norm2`) VALUES
(29, '90', 0.21428571428571),
(30, '80', 0.19047619047619),
(31, '75', 0.17857142857143),
(32, '55', 0.13095238095238),
(33, '45', 0.10714285714286),
(34, '35', 0.083333333333333),
(35, '30', 0.071428571428571),
(36, '10', 0.023809523809524);

-- --------------------------------------------------------

--
-- Table structure for table `t_departemen`
--

CREATE TABLE `t_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_departemen`
--

INSERT INTO `t_departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'Pemerintahan'),
(2, 'Kesejateraan'),
(3, 'Pelayanan'),
(4, 'Keuangan'),
(5, 'Tata Usaha dan Umum'),
(6, 'Perencaan');

-- --------------------------------------------------------

--
-- Table structure for table `t_golongan`
--

CREATE TABLE `t_golongan` (
  `id_golongan` int(8) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `masa_kerja` varchar(30) NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_golongan`
--

INSERT INTO `t_golongan` (`id_golongan`, `golongan`, `pangkat`, `masa_kerja`, `gaji_pokok`) VALUES
(7, 'III-A', 'PNS2', '1', '1500000'),
(9, 'III-D', 'PNS4', '2', '2000000'),
(10, 'III-B', 'PNS5', '3', '3000000'),
(11, 'III-F', 'PNS5', '3', '2000000'),
(12, 'III-C', 'PNS6', '6', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `t_hak_akses`
--

CREATE TABLE `t_hak_akses` (
  `id` int(2) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hak_akses`
--

INSERT INTO `t_hak_akses` (`id`, `id_role`, `id_menu`) VALUES
(7, 1, 15),
(9, 1, 2),
(12, 1, 9),
(15, 1, 12),
(16, 1, 13),
(17, 1, 14),
(18, 1, 16),
(19, 1, 17),
(20, 1, 18),
(21, 1, 19),
(22, 1, 20),
(23, 1, 21),
(24, 1, 22),
(25, 1, 23),
(26, 1, 24),
(27, 1, 25),
(28, 1, 26),
(29, 1, 27),
(30, 1, 28),
(31, 1, 29),
(37, 3, 31),
(38, 3, 3),
(39, 3, 4),
(40, 3, 6),
(41, 3, 8),
(43, 5, 3),
(44, 5, 9),
(45, 5, 10),
(51, 1, 31),
(52, 1, 33),
(53, 1, 32),
(54, 1, 7),
(58, 1, 6),
(59, 5, 4),
(60, 1, 35),
(61, 2, 35),
(88, 6, 42),
(94, 6, 35),
(100, 6, 10),
(106, 6, 48),
(107, 1, 1),
(108, 2, 1),
(109, 6, 1),
(110, 1, 40),
(113, 2, 49),
(114, 6, 50),
(115, 6, 44),
(117, 6, 53),
(118, 6, 52),
(119, 6, 38),
(121, 2, 51),
(122, 2, 54),
(123, 6, 55),
(124, 6, 56),
(125, 6, 57),
(142, 1, 8),
(143, 6, 4),
(144, 2, 58),
(146, 6, 59);

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `id_departemen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`id_jabatan`, `nama_jabatan`, `id_departemen`) VALUES
(22, 'Ka.Sie', 1),
(23, 'Ka.Sie', 2),
(24, 'Ka.Sie', 3),
(25, 'Ka.Sie', 4),
(26, 'Ka.Sie', 5),
(27, 'Ka.Sie', 6),
(28, 'Staff', 1),
(29, 'Staff', 2),
(30, 'Staff', 3),
(31, 'Staff', 4),
(32, 'Staff', 5),
(34, 'Staff', 6);

-- --------------------------------------------------------

--
-- Table structure for table `t_konfigurasi`
--

CREATE TABLE `t_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `name_app` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `metatext` varchar(200) NOT NULL,
  `instansi` varchar(200) NOT NULL,
  `pimpinan` varchar(200) NOT NULL,
  `sekretaris` varchar(200) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_konfigurasi`
--

INSERT INTO `t_konfigurasi` (`id_konfigurasi`, `name_app`, `logo`, `phone`, `alamat`, `email`, `keywords`, `metatext`, `instansi`, `pimpinan`, `sekretaris`, `about`) VALUES
(1, 'SI-Tukin', 'logo-SI-Tukin.png', '0811-2651-333', 'Plebengan, Sidomulyo, Bambanglipuro, Bantul', 'desa.sidomulyo@bantulkab.go.id', '', '', 'Kantor Kelurahan Desa Sidomulyo', 'Lurah', 'Sekretaris', 'Sistem Pendukung Keputusan Penerima Tunjangan                                                                                                                                                                                                                                                                                                                                                                                                                                          ');

-- --------------------------------------------------------

--
-- Table structure for table `t_kriteria`
--

CREATE TABLE `t_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot_rerata` double DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kriteria`
--

INSERT INTO `t_kriteria` (`id_kriteria`, `kriteria`, `nama_kriteria`, `bobot_rerata`, `deskripsi`) VALUES
(29, 'K1', 'Pelanggaran', 0.23214285714285, 'Jumlah pelanggaran kinerja selama satu bulan'),
(30, 'K2', 'Kehadiran', 0.19523809523809, 'Jumlah Ketidakhadiran/absen selama satu bulan'),
(31, 'K3', 'Nilai SKP', 0.17678571428571, 'Nilai Sasaran Kinerja Pegawai yang di dapatkan'),
(32, 'K4', 'Nilai Perilaku Kerja', 0.12797619047619, 'Nilai Perilaku Kerja Pegawai yang di dapat'),
(33, 'K5', 'Tugas Harian Pegawai', 0.09732142857143, 'Jumlah tugas tambahan yang dikirimkan pegawai dalam satu bulan ini'),
(34, 'K6', 'Pelayanan Masyarakat', 0.079166666666666, 'Nilai Sikap atau perilaku pegawai dalam memberikan pelayanan'),
(35, 'K7', 'Lembur', 0.066964285714286, 'Jumlah lemburan pegawai'),
(36, 'K8', 'Penghargaan', 0.024404761904762, 'Jumlah Penghargaan yang di terima oleh pegawai dalam satu bulan');

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Beranda', 'home', 'ion ion-ios-home', 0, 'y'),
(2, 'Master Data', '#', 'ion ion-ios-albums-outline', 0, 'y'),
(4, 'Data Penilaian', '#', 'ion ion-university', 0, 'y'),
(6, 'Kelola Pengguna', 'user', 'ion ion-android-people', 0, 'y'),
(7, 'Level Pengguna', 'userlevel', 'ion ion-android-unlock', 0, 'y'),
(8, 'Pengaturan', 'setting', 'ion ion-ios-gear', 0, 'y'),
(10, 'Data Pegawai', 'pegawai', 'ion ion-ios-circle-outline', 48, 'y'),
(31, 'Data Jabatan', 'jabatan', 'ion ion-ios-circle-outline', 2, 'y'),
(32, 'Data Departemen', 'departemen', 'ion ion-ios-circle-outline', 2, 'y'),
(33, 'Data Golongan', 'golongan', 'ion ion-ios-circle-outline', 2, 'n'),
(35, 'Edit Profil', 'profil', 'ion ion-android-contact', 0, 'y'),
(38, 'Penilaian', 'smart', 'ion ion-ios-circle-outline', 4, 'y'),
(40, 'Kelola Menu', 'kelolamenu', 'ion ion-ios-circle-outline', 2, 'y'),
(44, 'Data Tugas', '#', 'ion ion-clipboard', 0, 'y'),
(48, 'Data Master', '#', 'ion ion-social-buffer', 0, 'y'),
(49, 'Buku Pegawai', 'bukupegawai', 'ion ion-ios-book', 0, 'y'),
(50, 'Laporan Tugas Pegawai', 'tugas', 'ion ion-ios-circle-outline', 44, 'y'),
(51, 'Raport', 'raport', 'ion ion-trophy', 0, 'y'),
(52, 'Data Kriteria', 'kriteria', 'ion ion-ios-circle-outline', 48, 'y'),
(53, 'Data Parameter', 'parameter', 'ion ion-ios-circle-outline', 48, 'y'),
(55, 'Laporan Penilaian', 'smart_report', 'ion ion-ios-circle-outline', 4, 'y'),
(56, 'Laporan Tugas Pegawai', 'cetaklaporantugas', 'ion ion-ios-circle-outline', 0, 'n'),
(57, 'Cetak Laporan Penilaian', 'cetaklaporanpenilaian', 'ion ion-ios-circle-outline', 0, 'n'),
(58, 'Cetak Raport', 'cetakraport', 'ion ion-ios-circle-outline', 0, 'n'),
(59, 'Tugas Masuk', 'tugasmasuk', 'ion ion-ios-circle-outline', 44, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai_awal`
--

CREATE TABLE `t_nilai_awal` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_awal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_nilai_awal`
--

INSERT INTO `t_nilai_awal` (`id_alternatif`, `id_kriteria`, `nilai_awal`) VALUES
(5, 29, 0),
(5, 30, 0),
(5, 31, 80),
(5, 32, 80),
(5, 33, 10),
(5, 34, 80),
(5, 35, 0),
(5, 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_parameter`
--

CREATE TABLE `t_parameter` (
  `id_kriteria` int(11) NOT NULL,
  `min` double DEFAULT NULL,
  `maks` double DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_parameter`
--

INSERT INTO `t_parameter` (`id_kriteria`, `min`, `maks`, `type`) VALUES
(29, 0, 4, '2'),
(30, 0, 20, '2'),
(31, 40, 90, '1'),
(32, 40, 90, '1'),
(33, 0, 10, '1'),
(34, 40, 90, '1'),
(35, 0, 5, '1'),
(36, 0, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User'),
(6, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `t_setting`
--

CREATE TABLE `t_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_setting`
--

INSERT INTO `t_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `t_tugas`
--

CREATE TABLE `t_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jml` int(1) DEFAULT NULL,
  `tugas` varchar(100) DEFAULT NULL,
  `waktu_mulai` varchar(10) DEFAULT NULL,
  `waktu_selesai` varchar(10) DEFAULT NULL,
  `tanggal` varchar(20) NOT NULL,
  `pemberi_tugas` varchar(200) NOT NULL,
  `file_tambahan` varchar(250) DEFAULT NULL,
  `ket` text NOT NULL,
  `create_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tugas`
--

INSERT INTO `t_tugas` (`id_tugas`, `id_user`, `jml`, `tugas`, `waktu_mulai`, `waktu_selesai`, `tanggal`, `pemberi_tugas`, `file_tambahan`, `ket`, `create_at`) VALUES
(1, 54, 1, 'Penyuluhan KB di dusun selo', '08:00', '09:00', '2019-09-07', 'Dinkes Bantul', 'Penyuluhan_KB_di_dusun_selo_541.docx', 'Penyuluhan program KB serentak Di desa', '2019-09-07 13:32:54'),
(2, 54, 1, 'Penyuluhan Air Bersih', '08:30', '11:00', '2019-09-11', 'Pemda DIY', 'kosong', 'Penyuluhan untuk desa desa', '2019-09-11 13:32:54'),
(3, 58, 1, 'Rapat Kinerja di Pemda Bantul', '10:00', '12:00', '2019-12-04', 'Pemda Bantul', 'kosong', 'Dalam rangka menyongsong 17 Agustus dilakukan rapat koordinasi setiap pengurus desa.\r\nDalam hal ini saya mewakili rapat umum', '2019-12-04 13:32:54'),
(4, 54, 1, 'Menghadiri senam sehat dusun Turi', '06:00', '08:00', '2019-09-20', 'Dukuh Turi', 'kosong', 'Senam sehat bersama mendampingi Lurah', '2019-09-20 13:32:54'),
(5, 54, 1, 'Kumpulan Ibu Ibu PKK dusun selo', '16:00', '17:30', '2019-09-28', 'PKK dusun Selo', 'kosong', 'Pelatihan Pembuatan Nugget', '2019-09-28 13:32:54'),
(6, 54, 1, 'Menghadiri acara Pagelaran wayang di dusun selo', '20:00', '22:00', '2019-11-07', 'Dukuh Dusun Selo', 'kosong', 'Pagelaran wayang kulit di dusun selo mendampingi Lurah', '2019-11-07 13:32:54'),
(9, 58, 1, 'Apel pagi hari senin', '07:30', '08:00', '2019-12-05', 'Lurah', 'kosong', 'Apel pagi membahas kedisiplinan dan etos kerja', '2019-12-05 13:32:54'),
(10, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-03 13:32:54'),
(11, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-04 13:32:54'),
(12, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-05 13:32:54'),
(13, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-06 13:32:54'),
(14, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-07 13:32:54'),
(15, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-08 13:32:54'),
(16, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-09 13:32:54'),
(17, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-10 13:32:54'),
(18, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-11 13:32:54'),
(19, 58, 1, NULL, NULL, NULL, '2019-12-05', '', NULL, '', '2019-12-12 13:32:54'),
(20, 58, 0, 'Rapat Bulanan di Pemda Bantul', '09:00', '12:00', '2019-12-04', 'Kades', 'file-Rapat_Bulanan_di_Pemda_Bantul-Sujiman_Kuntoto-08-12-2019.docx', 'Mengikuti rapat Bulanan yang diadakan oleh pemda bantul', '2019-12-13 13:32:54'),
(21, 58, 1, 'coba', '07:30', '09:00', '2019-12-13', 'coba', 'kosong', 'coba coba', '2019-12-13 14:32:54'),
(22, 54, 0, 'coba2', '08:00', '09:00', '2019-12-14', 'coba2', 'kosong', 'hahhahahahahahhahahaa', '2019-12-14 05:28:37'),
(23, 54, 1, 'coba 3', '08:00', '10:00', '2019-12-14', 'coba3', 'kosong', 'coba coba coba coba coba', '2019-12-14 17:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `images` varchar(200) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `alamat` text,
  `last_login` varchar(50) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `create_on` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id_user`, `username`, `password`, `nip`, `status`, `online`, `id_role`, `id_jabatan`, `nik`, `email`, `id_golongan`, `images`, `phone`, `gender`, `alamat`, `last_login`, `full_name`, `create_on`) VALUES
(1, 'admin', '$2y$04$2tmnLndJXW9nfGi0XVlrduCuiFd7APvdWUAW8MxiKFRXmef2aOJiy', 'admin', 1, 0, 1, 0, NULL, NULL, NULL, 'user.png', NULL, NULL, NULL, '2019-12-14 22:15:18', 'admin', '2019-07-02 17:45:55'),
(2, 'operator', '$2y$04$3tCWON77skxZNeOyPlWE5efVzT9QfOFLfMf6TAhEvXaqZMSzTZGAC', 'operator', 1, 1, 6, 0, '', '', NULL, 'user.png', '', NULL, '                                                        ', '2019-12-14 22:26:38', 'operator', '2019-09-02 14:13:35'),
(54, 'kuncoro', '$2y$04$tYavcOnmaOaE60255rk9.umWKF3p2Q16tVxmMGPnEv1Jko8Fz0f2a', '1300016056', 1, 0, 2, 34, '2147483647', 'anung21@gmail.com', 7, '541.jpg', '087667553445', 'laki-Laki', 'Jl. Samas Km.21, Bambanglipuro', '2019-12-14 05:26:41', 'Kuncoro Anung', '2019-09-16 14:12:59'),
(58, 'sujiman', '$2y$04$kW57Fu7lYTQP9R0mv/npzeSeW4dskBkpB.VfGF9aXhVbS8EQc1gGy', '1300016058', 1, 0, 2, 32, '2147483647', 'sujiman@gmail.com', 7, 'foto-profil-58-1300016058.jpg', '08566776655', 'laki-Laki', 'Jl. Kenari No.35, Yogyakarta                                                        ', '2019-12-14 22:25:14', 'Sujiman Kuntoro', '2019-09-18 12:54:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_alternatif`
--
ALTER TABLE `t_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `t_alternatif_kriteria`
--
ALTER TABLE `t_alternatif_kriteria`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`);

--
-- Indexes for table `t_bobot1`
--
ALTER TABLE `t_bobot1`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `t_bobot2`
--
ALTER TABLE `t_bobot2`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `t_departemen`
--
ALTER TABLE `t_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `t_golongan`
--
ALTER TABLE `t_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `t_kriteria`
--
ALTER TABLE `t_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `t_nilai_awal`
--
ALTER TABLE `t_nilai_awal`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`);

--
-- Indexes for table `t_parameter`
--
ALTER TABLE `t_parameter`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_setting`
--
ALTER TABLE `t_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `t_tugas`
--
ALTER TABLE `t_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_alternatif`
--
ALTER TABLE `t_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_bobot1`
--
ALTER TABLE `t_bobot1`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `t_departemen`
--
ALTER TABLE `t_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_golongan`
--
ALTER TABLE `t_golongan`
  MODIFY `id_golongan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_kriteria`
--
ALTER TABLE `t_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `t_nilai_awal`
--
ALTER TABLE `t_nilai_awal`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_setting`
--
ALTER TABLE `t_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_tugas`
--
ALTER TABLE `t_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
