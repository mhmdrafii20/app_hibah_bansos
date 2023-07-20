-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 04:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_hibah_bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_pencairan_hibah_bansos`
--

CREATE TABLE `arsip_pencairan_hibah_bansos` (
  `id_arsip_pencairan_hibah_bansos` int(11) NOT NULL,
  `No_NPHD` varchar(50) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `tanggal_pencairan` date NOT NULL,
  `file_arsip` text NOT NULL,
  `tanggal_arsip` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip_pencairan_hibah_bansos`
--

INSERT INTO `arsip_pencairan_hibah_bansos` (`id_arsip_pencairan_hibah_bansos`, `No_NPHD`, `nama_penerima`, `tanggal_pencairan`, `file_arsip`, `tanggal_arsip`) VALUES
(6, '451.2/008/KESRA.2023', 'Udin Saja', '2023-07-19', '8721707d32c7609edf3274161e1880e5.pdf', '2023-07-19 14:04:11'),
(7, '451.2/006/KESRA.2023', 'Aditiya Muslim', '2023-07-12', '3e85e861d271152b256c01cb0aa88964.pdf', '2023-07-19 14:07:20'),
(8, '451.2/007/KESRA.2023', 'Baihaki', '2023-07-12', '297684d835cf3717b906bd9ba1c529db.pdf', '2023-07-19 14:17:14'),
(9, '451.2/009/KESRA.2023', 'Baihaki', '2023-07-20', '36c153fa8ca634af44e219e7acb621b3.pdf', '2023-07-20 12:25:07'),
(10, '451.2/011/KESRA.2023', 'Rafi Ahamd', '2023-07-20', '3de8333f56e9b452c7f1df71125d3338.pdf', '2023-07-20 12:40:24'),
(11, '451.2/012/KESRA.2023', 'Jaya', '2023-07-20', '3b7005c0b30a0f96b28cca01522d91f2.pdf', '2023-07-20 13:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(25) NOT NULL,
  `nama_golongan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'IV/a'),
(2, 'IV/b'),
(3, 'IV/c'),
(4, 'IV/d'),
(5, 'IV/e'),
(6, 'III/a'),
(7, 'III/b'),
(8, 'III/c'),
(9, 'III/d'),
(10, 'II/a'),
(11, 'II/b'),
(12, 'II/c'),
(13, 'II/d');

-- --------------------------------------------------------

--
-- Table structure for table `history_penggunaan`
--

CREATE TABLE `history_penggunaan` (
  `id_history_penggunaan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_jam` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_penggunaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_penggunaan`
--

INSERT INTO `history_penggunaan` (`id_history_penggunaan`, `id_pengguna`, `tanggal_jam`, `jenis_penggunaan`) VALUES
(1, 1, '2022-01-30 04:06:06', 'Update data Golongan'),
(2, 1, '2022-01-30 04:13:11', 'Update data Pegawai'),
(3, 1, '2022-01-30 04:13:59', 'Tambah data Surat Masuk'),
(4, 1, '2022-01-30 04:14:13', 'Mengisi Disposisi'),
(5, 1, '2022-01-30 04:42:01', 'Update data Pengguna'),
(88, 1, '2022-01-30 11:20:24', 'Update data Surat Masuk'),
(89, 1, '2022-01-30 11:22:19', 'Update data Surat Keluar'),
(90, 1, '2022-01-30 11:22:49', 'Update data Surat Keluar'),
(91, 1, '2022-01-30 11:23:03', 'Update data Surat Keluar'),
(92, 1, '2022-01-30 11:23:25', 'Update data Surat Keluar'),
(93, 1, '2022-01-30 11:24:26', 'Update data Surat Keluar'),
(94, 1, '2022-01-30 11:25:16', 'Update data Surat Keluar'),
(95, 1, '2022-01-30 11:30:42', 'Update data Pengguna'),
(96, 1, '2022-01-30 19:01:29', 'Tambah data Surat Masuk'),
(97, 1, '2022-01-30 19:01:52', 'Hapus data Surat Masuk'),
(98, 1, '2022-01-30 21:06:03', 'Hapus data Pengguna'),
(99, 1, '2022-01-30 22:40:45', 'Tambah data Kode Surat'),
(100, 1, '2022-01-30 22:43:12', 'Hapus data Kode Surat'),
(101, 1, '2022-01-31 03:24:46', 'Tambah data Kode Surat'),
(102, 1, '2022-01-31 03:25:59', 'Tambah data Kode Surat'),
(103, 1, '2022-01-31 06:03:20', 'Tambah data Surat Masuk'),
(104, 1, '2022-01-31 06:03:51', 'Hapus data Surat Masuk'),
(105, 1, '2022-01-31 11:47:15', 'Tambah data Surat Masuk'),
(106, 1, '2022-01-31 12:01:26', 'Hapus data Surat Masuk'),
(107, 1, '2022-02-01 10:32:51', 'Tambah data Surat Keluar'),
(108, 1, '2022-02-01 10:32:57', 'Hapus data Surat Keluar'),
(109, 1, '2022-06-03 09:47:57', 'Tambah data Pengguna'),
(110, 1, '2022-06-03 10:22:41', 'Update data SPPD'),
(111, 1, '2022-06-03 10:33:55', 'Update data Pegawai'),
(112, 1, '2022-06-03 11:23:58', 'Update data SPPD'),
(113, 1, '2022-06-03 11:35:07', 'Konfirmasi data Pengajuan Cuti'),
(114, 1, '2022-06-03 11:35:57', 'Konfirmasi data Pengajuan Cuti'),
(115, 1, '2022-06-03 11:36:34', 'Hapus data Pengajuan Cuti'),
(116, 1, '2022-06-03 11:36:37', 'Hapus data Pengajuan Cuti'),
(117, 1, '2022-06-03 12:27:53', 'Update data SPT'),
(118, 1, '2022-06-03 12:28:31', 'Update data SPT'),
(119, 1, '2022-06-03 12:28:41', 'Hapus data SPT'),
(120, 1, '2022-06-03 12:33:02', 'Tambah data SPPD'),
(121, 1, '2022-06-03 12:35:21', 'Tambah data SPT'),
(122, 1, '2022-06-03 12:37:03', 'Tambah data Undangan'),
(123, 1, '2022-06-03 12:38:01', 'Update data Pegawai'),
(124, 1, '2022-06-03 12:41:25', 'Konfirmasi data Pengajuan Cuti'),
(125, 1, '2022-06-03 12:42:31', 'Konfirmasi data Pengajuan Cuti'),
(126, 1, '2022-06-14 07:46:04', 'Update data Pengguna'),
(127, 1, '2022-06-19 08:20:25', 'Update data Pegawai'),
(128, 1, '2022-06-19 08:27:46', 'Tambah data Pengguna'),
(129, 1, '2022-08-17 10:31:25', 'Hapus data Pegawai'),
(130, 1, '2022-08-17 10:31:29', 'Hapus data Pegawai'),
(131, 1, '2022-08-17 10:31:32', 'Hapus data Pegawai'),
(132, 1, '2022-10-24 12:59:57', 'Hapus data Pengguna'),
(133, 1, '2022-10-24 13:04:26', 'Update data Pengguna'),
(134, 1, '2022-10-24 13:05:00', 'Update data Pengguna'),
(135, 1, '2022-10-24 13:05:06', 'Update data Pengguna'),
(136, 1, '2022-10-24 13:05:38', 'Update data Pengguna'),
(137, 1, '2022-10-24 13:05:44', 'Update data Pengguna'),
(138, 1, '2022-10-24 13:06:43', 'Update data Pengguna'),
(139, 1, '2022-10-24 13:06:52', 'Update data Pengguna'),
(140, 1, '2022-10-24 13:07:05', 'Update data Pengguna'),
(141, 1, '2022-10-24 13:07:28', 'Update data Jabatan'),
(142, 1, '2022-10-24 13:07:33', 'Update data Jabatan'),
(143, 1, '2022-10-24 13:07:39', 'Update data Jabatan'),
(144, 1, '2022-10-24 13:08:02', 'Update data Jabatan'),
(145, 1, '2022-10-24 13:08:10', 'Update data Jabatan'),
(146, 1, '2022-10-24 13:08:21', 'Update data Jabatan'),
(147, 1, '2022-10-24 13:08:30', 'Update data Jabatan'),
(148, 1, '2022-10-24 13:08:41', 'Hapus data Jabatan'),
(149, 1, '2022-10-24 13:08:43', 'Hapus data Jabatan'),
(150, 1, '2022-10-24 13:08:50', 'Hapus data Jabatan'),
(151, 1, '2022-10-24 13:08:54', 'Hapus data Jabatan'),
(152, 1, '2022-10-24 13:08:59', 'Hapus data Jabatan'),
(153, 1, '2022-10-24 13:10:09', 'Hapus data Jabatan'),
(154, 1, '2022-10-24 13:10:12', 'Hapus data Jabatan'),
(155, 1, '2022-10-24 13:10:16', 'Hapus data Jabatan'),
(156, 1, '2022-10-24 13:10:19', 'Hapus data Jabatan'),
(157, 1, '2022-10-24 13:10:23', 'Hapus data Jabatan'),
(158, 1, '2022-10-24 13:10:27', 'Hapus data Jabatan'),
(159, 1, '2022-10-24 13:10:31', 'Hapus data Jabatan'),
(160, 1, '2022-10-24 13:10:34', 'Hapus data Jabatan'),
(161, 1, '2022-10-24 13:10:37', 'Hapus data Jabatan'),
(162, 1, '2022-10-24 13:10:43', 'Hapus data Jabatan'),
(163, 1, '2022-10-24 13:11:03', 'Update data Jabatan'),
(164, 1, '2022-10-24 13:14:28', 'Update data Jabatan'),
(165, 1, '2022-10-24 13:14:58', 'Update data Jabatan'),
(166, 1, '2022-10-24 13:15:17', 'Update data Jabatan'),
(167, 1, '2022-10-24 13:16:19', 'Update data Jabatan'),
(168, 1, '2022-10-24 13:16:33', 'Update data Jabatan'),
(169, 1, '2022-10-24 13:17:10', 'Update data Jabatan'),
(170, 1, '2022-10-24 13:17:37', 'Update data Jabatan'),
(171, 1, '2022-10-24 13:17:47', 'Update data Jabatan'),
(172, 1, '2022-10-24 13:18:03', 'Update data Jabatan'),
(173, 1, '2022-10-24 13:19:53', 'Update data Pengguna'),
(174, 1, '2022-10-24 13:22:49', 'Tambah data Pegawai'),
(175, 1, '2022-10-24 13:22:56', 'Update data Pegawai'),
(176, 1, '2022-10-24 13:23:02', 'Hapus data Pegawai'),
(177, 1, '2022-10-24 13:24:37', 'Tambah data Pegawai'),
(178, 1, '2022-10-24 13:24:47', 'Update data Pegawai'),
(179, 1, '2022-10-24 13:24:51', 'Hapus data Pegawai'),
(180, 1, '2022-10-25 03:17:11', 'Tambah data Arsip Pencairan Hibah Bansos'),
(181, 1, '2022-10-25 03:55:16', 'Tambah data Arsip Pencairan Hibah Bansos'),
(182, 1, '2022-10-25 03:55:59', 'Tambah data Arsip Pencairan Hibah Bansos'),
(183, 1, '2022-10-25 03:59:20', 'Hapus data SPPD'),
(184, 1, '2022-10-25 04:02:18', 'Update data Pegawai'),
(185, 1, '2022-10-25 04:02:35', 'Update data Pegawai'),
(186, 1, '2022-10-25 04:02:51', 'Update data Pegawai'),
(187, 1, '2022-10-25 04:56:55', 'Tambah data Surat Masuk'),
(188, 1, '2022-10-25 04:59:57', 'Update data Surat Masuk'),
(189, 1, '2022-10-25 05:51:58', 'Update data Surat Masuk'),
(190, 1, '2022-10-25 05:52:25', 'Update data Surat Masuk'),
(191, 1, '2022-10-25 05:52:51', 'Update data Surat Masuk'),
(192, 1, '2022-10-25 05:53:20', 'Update data Surat Keluar'),
(193, 1, '2022-10-25 05:53:35', 'Update data Surat Keluar'),
(194, 1, '2022-10-25 05:53:44', 'Update data Surat Keluar'),
(195, 1, '2022-10-25 05:53:53', 'Hapus data Surat Keluar'),
(196, 1, '2022-10-25 12:19:24', 'Tambah data Pegawai'),
(197, 1, '2022-10-25 12:19:41', 'Hapus data Pegawai'),
(198, 1, '2022-10-25 12:20:52', 'Tambah data Surat Masuk'),
(199, 1, '2022-10-25 12:22:54', 'Tambah data SPPD'),
(200, 1, '2022-10-25 12:24:17', 'Tambah data Arsip Pencairan Hibah Bansos'),
(201, 1, '2022-10-25 12:24:45', 'Hapus data Arsip Pencairan Hibah Bansos'),
(202, 1, '2022-12-24 16:45:09', 'Tambah data SPPD'),
(203, 1, '2022-12-24 16:45:29', 'Tambah data SPPD'),
(204, 1, '2022-12-24 16:50:18', 'Mengisi Disposisi'),
(205, 1, '2022-12-24 16:50:23', 'Mengisi Disposisi'),
(206, 1, '2022-12-24 16:50:30', 'Mengisi Disposisi'),
(207, 1, '2022-12-24 16:50:37', 'Mengisi Disposisi'),
(208, 1, '2022-12-24 16:50:42', 'Mengisi Disposisi'),
(209, 1, '2022-12-24 16:50:48', 'Mengisi Disposisi'),
(210, 1, '2022-12-24 16:51:00', 'Mengisi Disposisi'),
(211, 1, '2022-12-24 16:58:31', 'Mengisi Disposisi'),
(212, 1, '2022-12-30 12:25:48', 'Tambah data Pegawai'),
(213, 1, '2023-02-15 08:08:54', 'Hapus data Pegawai'),
(214, 1, '2023-07-12 12:23:22', 'Update data Pegawai'),
(215, 1, '2023-07-12 12:23:31', 'Update data Pegawai'),
(216, 1, '2023-07-12 12:27:13', 'Update data Pegawai'),
(217, 1, '2023-07-12 12:27:57', 'Update data Pegawai'),
(218, 1, '2023-07-12 14:01:55', 'Update data SPPD'),
(219, 1, '2023-07-12 14:02:05', 'Update data SPPD'),
(220, 1, '2023-07-12 14:02:13', 'Update data SPPD'),
(221, 1, '2023-07-12 14:03:00', 'Update data Pegawai'),
(222, 1, '2023-07-17 14:01:57', 'Update data Pegawai'),
(223, 1, '2023-07-19 14:03:34', 'Tambah data Arsip Pencairan Hibah Bansos'),
(224, 1, '2023-07-19 14:03:43', 'Hapus data Arsip Pencairan Hibah Bansos'),
(225, 1, '2023-07-19 14:04:11', 'Tambah data Arsip Pencairan Hibah Bansos'),
(226, 1, '2023-07-19 14:04:17', 'Hapus data Arsip Pencairan Hibah Bansos'),
(227, 1, '2023-07-19 14:04:19', 'Hapus data Arsip Pencairan Hibah Bansos'),
(228, 1, '2023-07-19 14:07:20', 'Tambah data Arsip Pencairan Hibah Bansos'),
(229, 1, '2023-07-19 14:17:14', 'Tambah data Arsip Pencairan Hibah Bansos'),
(230, 1, '2023-07-20 11:51:31', 'Update data Jabatan'),
(231, 1, '2023-07-20 11:51:43', 'Update data Jabatan'),
(232, 1, '2023-07-20 11:52:00', 'Update data Jabatan'),
(233, 1, '2023-07-20 11:52:07', 'Update data Jabatan'),
(234, 1, '2023-07-20 11:52:16', 'Update data Jabatan'),
(235, 1, '2023-07-20 11:52:22', 'Update data Jabatan'),
(236, 1, '2023-07-20 11:52:46', 'Update data Jabatan'),
(237, 1, '2023-07-20 11:53:13', 'Tambah data Golongan'),
(238, 1, '2023-07-20 11:53:22', 'Update data Golongan'),
(239, 1, '2023-07-20 11:53:29', 'Update data Golongan'),
(240, 1, '2023-07-20 11:53:35', 'Update data Golongan'),
(241, 1, '2023-07-20 11:53:41', 'Update data Golongan'),
(242, 1, '2023-07-20 11:53:48', 'Update data Golongan'),
(243, 1, '2023-07-20 11:53:54', 'Update data Golongan'),
(244, 1, '2023-07-20 11:54:00', 'Update data Golongan'),
(245, 1, '2023-07-20 11:54:07', 'Update data Golongan'),
(246, 1, '2023-07-20 11:54:13', 'Update data Golongan'),
(247, 1, '2023-07-20 11:54:21', 'Update data Golongan'),
(248, 1, '2023-07-20 11:54:27', 'Tambah data Golongan'),
(249, 1, '2023-07-20 11:54:38', 'Update data Golongan'),
(250, 1, '2023-07-20 11:54:48', 'Tambah data Golongan'),
(251, 1, '2023-07-20 11:55:26', 'Update data Pengguna'),
(252, 1, '2023-07-20 11:56:02', 'Update data Pengguna'),
(253, 1, '2023-07-20 11:56:25', 'Hapus data Pegawai'),
(254, 1, '2023-07-20 11:56:30', 'Hapus data Pegawai'),
(255, 1, '2023-07-20 11:56:33', 'Hapus data Pegawai'),
(256, 1, '2023-07-20 11:56:37', 'Hapus data Pegawai'),
(257, 1, '2023-07-20 11:56:40', 'Hapus data Pegawai'),
(258, 1, '2023-07-20 11:56:43', 'Hapus data Pegawai'),
(259, 1, '2023-07-20 11:57:39', 'Tambah data Pegawai'),
(260, 1, '2023-07-20 11:58:00', 'Tambah data Jabatan'),
(261, 1, '2023-07-20 11:58:05', 'Tambah data Jabatan'),
(262, 1, '2023-07-20 11:58:17', 'Update data Pegawai'),
(263, 1, '2023-07-20 11:59:10', 'Tambah data Pegawai'),
(264, 1, '2023-07-20 11:59:16', 'Update data Pegawai'),
(265, 1, '2023-07-20 12:00:36', 'Hapus data SPPD'),
(266, 1, '2023-07-20 12:00:40', 'Hapus data SPPD'),
(267, 1, '2023-07-20 12:01:12', 'Hapus data SPPD'),
(268, 1, '2023-07-20 12:02:26', 'Update data Pengguna'),
(269, 1, '2023-07-20 12:02:47', 'Update data Pengguna'),
(270, 1, '2023-07-20 12:03:04', 'Hapus data Pegawai'),
(271, 1, '2023-07-20 12:03:08', 'Hapus data Pegawai'),
(272, 1, '2023-07-20 12:03:11', 'Hapus data Pegawai'),
(273, 1, '2023-07-20 12:03:14', 'Hapus data Pegawai'),
(274, 1, '2023-07-20 12:03:18', 'Hapus data Pegawai'),
(275, 1, '2023-07-20 12:03:21', 'Hapus data Pegawai'),
(276, 1, '2023-07-20 12:04:04', 'Tambah data Pegawai'),
(277, 1, '2023-07-20 12:04:49', 'Tambah data Pegawai'),
(278, 1, '2023-07-20 12:05:00', 'Update data Pegawai'),
(279, 1, '2023-07-20 12:05:06', 'Update data Pegawai'),
(280, 1, '2023-07-20 12:05:57', 'Tambah data Pegawai'),
(281, 1, '2023-07-20 12:06:04', 'Update data Pegawai'),
(282, 1, '2023-07-20 12:07:05', 'Tambah data SPPD'),
(283, 1, '2023-07-20 12:25:07', 'Tambah data Arsip Pencairan Hibah Bansos'),
(284, 1, '2023-07-20 12:40:24', 'Tambah data Arsip Pencairan Hibah Bansos'),
(285, 1, '2023-07-20 13:27:58', 'Tambah data Arsip Pencairan Hibah Bansos');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(25) NOT NULL,
  `nama_jabatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Asisten Pemerintahan dan Kesejahteraan Rakyat'),
(2, 'Asisten Perekonomian dan Pembangunan'),
(3, 'Asisten Administrasi Umum'),
(4, 'Kepala Bagian Tata Pemerintahan'),
(5, 'Kepala Bagian Kesejahteraan Rakyat'),
(6, 'Kepala Bagian Umum'),
(7, 'Kepala Bagian Organisasi'),
(8, 'Kepala Bagian Perencanaan dan Keuangan'),
(22, 'Analis Kebijakan Ahli Muda'),
(23, 'Pelaksana');

-- --------------------------------------------------------

--
-- Table structure for table `lpj_bantuan`
--

CREATE TABLE `lpj_bantuan` (
  `id_lpj_bantuan` int(11) NOT NULL,
  `id_proposal_pencairan` int(11) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `realisasi_anggaran` int(11) NOT NULL,
  `sisa_anggaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_bukti` text NOT NULL,
  `foto_bukti2` text NOT NULL,
  `foto_bukti3` text NOT NULL,
  `foto_bukti4` text NOT NULL,
  `foto_bukti5` text NOT NULL,
  `tanggal_lpj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lpj_bantuan`
--

INSERT INTO `lpj_bantuan` (`id_lpj_bantuan`, `id_proposal_pencairan`, `bendahara`, `uraian`, `realisasi_anggaran`, `sisa_anggaran`, `keterangan`, `foto_bukti`, `foto_bukti2`, `foto_bukti3`, `foto_bukti4`, `foto_bukti5`, `tanggal_lpj`) VALUES
(4, 7, 'Udin', 'tes', 10000000, 0, 'adwqw', '654023852b2f555cb04abb0d04a7ae02.PNG', '55d6aabe7eb3c8032011a7eb58aaaccf.PNG', '2981d9587e4d71448758b4e0de9e14fa.PNG', '0e17ce1421f32c532f54b6fead90a686.PNG', 'd20eb9335d0d777697706aea57af5745.PNG', '2023-07-12'),
(7, 6, 'Udin', 'asd', 5000000, 5000000, 'asdas', 'b603a6725ebe253b04f7be3badfe87b8.pdf', '92e5e1a256007cda8e670f8d65e9b07d.pdf', '', '', '', '2023-07-17'),
(8, 11, 'Supri', 'Laporan Pertanggung Jawaban Masjid Nurul Hidayah', 50000000, 0, '', '9293cdf117f945aa33c7588e1a0feb6f.pdf', '', '', '', '', '2023-07-24'),
(9, 11, 'Supriadi', 'LPJ', 50000000, 0, '', '8d48066b05c95c0cbbdb23bf17674cd2.pdf', '', '', '', '', '2023-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(25) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `nip` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `id_jabatan` int(25) NOT NULL,
  `id_golongan` int(25) NOT NULL,
  `foto_pegawai` text NOT NULL,
  `tmt_peg` date NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `jenis_kelamin`, `alamat`, `no_telp`, `id_jabatan`, `id_golongan`, `foto_pegawai`, `tmt_peg`, `password`) VALUES
(10, 'FITRIYADI, S.Kom., S.H.', '198805182011011003', 'Laki-Laki', 'Jl.Satagen', '081347475709', 16, 7, '145eb085fa5779673606290b967037b1.jpg', '2022-02-06', ''),
(11, 'YUNITA SITINJAK, S.Kom.', '198706032015032003', 'Perempuan', 'Jl.Stagen', '081345437600', 18, 7, 'd3d60d3c7e839dbcf39ede003a4a75f4.jpg', '2022-06-05', ''),
(12, 'MUHAMMAD ALIMNI YAMIN, S.H.', '196212031990031005', 'Laki-Laki', 'Jl.Ahmad Yani', '081367654533', 13, 9, 'fb75d1f67dd0cab0b68f4109ec0bc1e7.jpg', '2022-03-14', ''),
(13, 'HERMAYANA', '196712311989032011', 'Perempuan', 'Jl.Mandin', '087765008765', 13, 8, 'fae81a4b3a44e7dc529434d7eed4ed61.jpg', '2022-02-13', ''),
(14, 'ADITYA SUKMA OJANA RAHARDI, S.H.', '198906022012121001', 'Laki-Laki', 'JL.Mega Sari', '082299450987', 13, 8, '172511bbffefba617b41f319100e0d58.jpg', '2022-02-21', ''),
(15, 'RATNA YULIANA MANALU, S.H.', '198707212012122003 ', 'Perempuan', 'Jl.Perumnas', '082290908788', 10, 8, '5fd09c5f630cd8eb62647574c46d7d0d.jpg', '2022-04-03', ''),
(16, 'FIRDAUS', '197509072002121001', 'Laki-Laki', 'Jl.Gunung Ulin', '081247261116', 14, 6, '820d96c42ad463798107ff06182b394b.jpg', '2022-06-06', ''),
(17, 'RISTI EKAWATI, S.H.', '199701122020122007', 'Perempuan', 'Jl.Stagen', '081279854211', 21, 6, '9d75765d4470a455ea7973c77a2165bf.png', '2022-05-01', ''),
(18, 'SENO PRIBANDONO, S.E.', '198408302019031002', 'Laki-Laki', 'Jl.Mandin', '087770541232', 17, 6, 'dcdb42d2efb769056c4404261c85f84a.jpeg', '2022-02-14', ''),
(19, 'NOPRI GITARIUS SITEPU, A.Md.Kom.', '199111292020121004', 'Laki-Laki', 'JL.Mega Sari', '087766409987', 20, 8, '7766ad7d42625da66ef0810478d3255d.jpg', '2022-01-10', ''),
(20, 'MUHAMMAD IDRUS', '197007171993031003', 'Laki-Laki', 'Jl.Ahmad Yani', '081288643100', 15, 6, '99dfee0b649b212a9c6dd64324436e0e.jpg', '2022-02-21', ''),
(25, 'DEWI OKTAVINA, SE., ME', '19801031 200501 2 012', 'Perempuan', 'Jl. Barito Gg. 12 Baru', '085278975434', 22, 1, '', '2005-01-24', '$2y$10$VlKgSSBJFrJoZxUy82hBiezYwZKLj601mH7aCgOAVRItHMD88ONPa'),
(26, 'INDAH SUSANTI, S.Th', '19760127 200901 2 001', 'Perempuan', 'Jl. Tiung 1', '089789635624', 23, 9, '', '2009-01-26', '$2y$10$wvw9vcyHkVJN6gnpy.GSwufrDvuAIfqjYJla4QfInCd56YfnqdO1G'),
(27, 'Ir. RIDUANTO', '19670614 199403 1 010', 'Laki-Laki', 'Jl. Manunggal 1', '085267893462', 5, 2, '', '1994-03-07', '$2y$10$gkJLsrsid.V.wa8m1raNDOcOcYTVjQxzELh2LDk/fWtuTP3h31OQO');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status_perkawinan` varchar(30) NOT NULL,
  `file_ktp` text NOT NULL,
  `tanggal_mendaftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` text NOT NULL,
  `status_pemohon` varchar(50) NOT NULL,
  `catatan_petugas` text NOT NULL,
  `jenis_penerima` varchar(100) NOT NULL,
  `no_hp_pemohon` varchar(20) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status_perkawinan`, `file_ktp`, `tanggal_mendaftar`, `password`, `status_pemohon`, `catatan_petugas`, `jenis_penerima`, `no_hp_pemohon`, `nama_penerima`, `alamat_penerima`) VALUES
(6, '6203022010000001', 'Rafi Ahamd', 'Laki-Laki', 'Kuala Kapuas', '2000-10-20', 'Sei Pasah', 'Belum Menikah', '', '2023-07-20 12:35:03', '$2y$10$aw94PL0LD4DtZDfGh53Dw.DM0zbyluNn4H.lo95Jppj/RedTSMP.2', 'Disetujui', 'harap tunggu sampai anggaran disetujui', 'Rumah Ibadah', '081350108223', 'Masjid At-Taqwa', 'Jl. Bintara Sei PAsah'),
(7, '6203021999019201', 'Jaya', 'Laki-Laki', 'Kuala Kapuas', '1995-05-15', 'Sei Baras', 'Belum Menikah', '1908262c2e6e1a9fa2b8cf7ef8a382e3.pdf', '2023-07-20 13:15:19', '$2y$10$p3MpAcPyc6fQN7Qp8Y5fyeEKOz.2gqqeGnTV18XA537Gy0s4ImEq.', 'Disetujui', 'silahkan lanjut permohonan proposal', 'Rumah Ibadah', '081350108223', 'Langgar Nurul Taqwa', 'Sei Barasa'),
(8, '6203021999019202', 'JOKO', 'Laki-Laki', 'Kuala Kapuas', '1996-05-14', 'Sei Baras', 'Belum Menikah', '4504cb92749bb4ad283b868e094a427a.pdf', '2023-07-20 13:10:30', '$2y$10$t6UABAQUhDRi0STskrt5IOVvgcUuIkOFsTnuX60sBeLDbgBRWzbZy', 'Ditolak', 'harap lebih jelas lgi foto KTP', 'Rumah Ibadah', '081350108223', 'Langgar Jami At-Taqwa', 'Sei Baras Selat Hilir');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jenis_cuti` enum('Cuti Besar','Cuti Sakit','Cuti Melahirkan','Cuti Karena Alasan Penting','Cuti Diluar Tanggungan Negara') NOT NULL,
  `keterangan` text NOT NULL,
  `status_pengajuan` enum('Menunggu Konfirmasi','Disetujui','Ditolak') NOT NULL,
  `catatan_pimpinan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `tanggal_mulai`, `tanggal_selesai`, `jenis_cuti`, `keterangan`, `status_pengajuan`, `catatan_pimpinan`) VALUES
(2, 4, '2023-07-12', '2023-07-12', 'Cuti Besar', 'tes', 'Disetujui', 'oke'),
(3, 9, '2023-07-12', '2023-07-14', 'Cuti Karena Alasan Penting', 'tes', 'Disetujui', ''),
(4, 8, '2023-07-20', '2023-07-20', 'Cuti Sakit', 'mohon diberikan izin cuti karena sakit', 'Disetujui', 'oke laksanakan'),
(5, 6, '2023-07-20', '2023-07-21', 'Cuti Sakit', 'mohon diproses', 'Menunggu Konfirmasi', ''),
(6, 25, '2023-07-24', '2023-07-28', 'Cuti Besar', 'mohon diacc', 'Disetujui', ''),
(7, 26, '2023-07-24', '2023-07-28', 'Cuti Sakit', '', 'Menunggu Konfirmasi', ''),
(8, 26, '2023-07-20', '2023-07-27', 'Cuti Melahirkan', '', 'Menunggu Konfirmasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nip` varchar(40) NOT NULL,
  `foto_pengguna` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `nip`, `foto_pengguna`, `alamat`, `no_hp`, `level`) VALUES
(1, 'Admin', '$2y$10$cX3u2kozyEyz2PZ/81zJM.I2qo5o41NCbaHW/kB1gC7IDR/7jkSAy', 'Muhamad Rafi\'i', '2000102020201002', '', 'Jl. Sei Asam', '081350108223', 'admin'),
(2, 'pimpinan', '$2y$10$jLPc0MYdk79SDxIXO3fXp.05d7hPQTE8o77gItjRFoom9hyf1tWly', 'Drs. SEPTEDY, M.Si', '19690924 199012 1 002', '', 'Jl. Keruing', '08123456777', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran_bansos`
--

CREATE TABLE `penyaluran_bansos` (
  `id_penyaluran_bansos` int(11) NOT NULL,
  `kode_penyaluran_bansos` varchar(10) NOT NULL,
  `id_proposal_pencairan` int(11) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyaluran_bansos`
--

INSERT INTO `penyaluran_bansos` (`id_penyaluran_bansos`, `kode_penyaluran_bansos`, `id_proposal_pencairan`, `tanggal_transfer`, `bukti_transfer`) VALUES
(5, 'PS001', 6, '2023-07-17', 'd53cd8f90b74a6db5fe803724ea3d14b.png'),
(6, 'PS006', 7, '2023-07-19', '4f47d6d9b462c380307808ae91eddcb0.png'),
(7, 'PS007', 8, '2023-07-20', '36b2cf8da0206b777709219f84fee6b7.pdf'),
(8, 'PS008', 9, '2023-07-20', '3a67fae9922c87d92ea9eed228e5c19e.pdf'),
(9, 'PS009', 11, '2023-07-21', '6f2d742487b5cb07f8c95a942d22d60c.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pertimbangan`
--

CREATE TABLE `pertimbangan` (
  `id_pertimbangan` int(11) NOT NULL,
  `kode_pertimbangan` varchar(10) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `anggaran_yg_disetujui` int(11) NOT NULL,
  `tanggal_pertimbangan` date NOT NULL,
  `bukti_survey` text NOT NULL,
  `status_pertimbangan` enum('Ditunda','Ditolak','Diterima') NOT NULL,
  `catatan_petugas_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertimbangan`
--

INSERT INTO `pertimbangan` (`id_pertimbangan`, `kode_pertimbangan`, `id_proposal`, `anggaran_yg_disetujui`, `tanggal_pertimbangan`, `bukti_survey`, `status_pertimbangan`, `catatan_petugas_`) VALUES
(1, 'PB001', 2, 10000000, '2023-07-11', 'bfd9998cb9dede1a6bb37b8bb6453d15.PNG', 'Ditunda', 'oke'),
(9, 'PB002', 4, 15000000, '2023-07-12', 'fc0c0972653e5248e0441c03ebe6ce63.jpg', 'Diterima', ''),
(10, 'PB010', 6, 12000000, '2023-07-19', '33da16d4b58050f1ea260908ec024ab5.jpg', 'Diterima', ''),
(11, 'PB011', 7, 50000000, '2023-07-21', '', 'Diterima', 'segera proses pencairan'),
(12, 'PB012', 8, 50000000, '2023-07-20', '7263a92ceedb844c5f339790d8d045e0.pdf', 'Diterima', 'lanjut proposal pencairna');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `kode_proposal` varchar(10) NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `judul_proposal` varchar(100) NOT NULL,
  `anggaran_yg_diajukan` int(11) NOT NULL,
  `file_proposal` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status_proposal` enum('Belum Diverifikasi','Diverifikasi','Ditolak') NOT NULL,
  `catatan_petugas_` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `kode_proposal`, `id_pemohon`, `judul_proposal`, `anggaran_yg_diajukan`, `file_proposal`, `tanggal_pengajuan`, `status_proposal`, `catatan_petugas_`) VALUES
(2, 'PP001', 3, 'Mohon Bantuan perbaikan', 10000000, 'ad16e017e6bc431117d0a3b4dfb68414.PNG', '2023-07-11', 'Diverifikasi', ''),
(4, 'PP003', 4, 'Pembelian Sapi Idul Adha', 18500000, '190935adb0d39310f43ffb74d5cd08cd.jpg', '2023-07-12', 'Diverifikasi', ''),
(6, 'PP006', 5, 'Pembelian Sapi Idul Adha', 18000000, '89f6f974ce6f720e4a9b2df21c801963.jpg', '2023-07-19', 'Diverifikasi', ''),
(7, 'PP007', 6, 'permohonan perbaikan Masjid Nurul Hidayah Desa Sei Asam', 250000000, 'ddfffdb602565ac3f91555959c686afd.pdf', '2023-07-20', 'Diverifikasi', 'acc'),
(8, 'PP008', 7, 'Mohon Bantuan Dana Perbaikan Halaman', 75000000, 'fa70d0e60222b0bedc94ffbca381e991.pdf', '2023-07-20', 'Diverifikasi', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_pencairan`
--

CREATE TABLE `proposal_pencairan` (
  `id_proposal_pencairan` int(11) NOT NULL,
  `kode_proposal_pencairan` varchar(10) NOT NULL,
  `id_pertimbangan` int(11) NOT NULL,
  `tanggal_proposal_pencairan` date NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `file_proposal_pencairan` text NOT NULL,
  `catatan_pemohon` text NOT NULL,
  `penerimaan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal_pencairan`
--

INSERT INTO `proposal_pencairan` (`id_proposal_pencairan`, `kode_proposal_pencairan`, `id_pertimbangan`, `tanggal_proposal_pencairan`, `nama_bank`, `nomor_rekening`, `file_proposal_pencairan`, `catatan_pemohon`, `penerimaan`) VALUES
(6, 'PR001', 1, '2023-07-12', 'tes', '8786137517', 'dd47d5217eeb52254f3abd0359c0d41d.jpg', 'Mohon Segera Dicairkan', 1),
(7, 'PR007', 9, '2023-07-12', 'BRI', '201381983194', '43bef67d83934695d5d61561554ff2c9.PNG', 'Mohon Segera Dicairkan', 1),
(8, 'PR008', 10, '2023-07-19', 'Udin Saja', '19381331311', '5814bea794c5bc3a0e59f771a4e7ffe2.jpg', 'Mohon Segera Dicairkan', 1),
(9, 'PR009', 9, '2023-07-20', 'Masjid Jami At-Taqwa', '6209875355252', '', 'Mohon Segera Dicairkan', 1),
(10, 'PR010', 9, '2023-07-20', 'Masjid Jami At-Taqwa Desa Mantangai Hilir', '600028963', '1518f395d1a7efc2f900a8394e7198c8.pdf', 'Mohon Segera Dicairkan', 0),
(11, 'PR011', 11, '2023-07-20', 'Masjid Nurul Hidayah Desa Sei Asam', '6000245672', '7aa41ae1478e25442e1e0edb41e8952c.pdf', 'Mohon Segera Dicairkan', 1),
(12, 'PR012', 12, '2023-07-20', 'Masjid Jami At-Taqwa Sei Baras', '6000189233', '96ca47cee40b34b62693aca88bc0e71d.pdf', 'Mohon Segera Dicairkan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_perintah_perjalanan_dinas`
--

CREATE TABLE `surat_perintah_perjalanan_dinas` (
  `id_surat_perintah_perjalanan_dinas` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `maksud_perjalanan` varchar(100) NOT NULL,
  `alat_angkut` varchar(100) NOT NULL,
  `tempat_berangkat` varchar(100) NOT NULL,
  `tempat_tujuan` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_harus_kembali` date NOT NULL,
  `id_pengikut` varchar(100) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_biaya_pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_perintah_perjalanan_dinas`
--

INSERT INTO `surat_perintah_perjalanan_dinas` (`id_surat_perintah_perjalanan_dinas`, `id_pegawai`, `maksud_perjalanan`, `alat_angkut`, `tempat_berangkat`, `tempat_tujuan`, `tgl_berangkat`, `tgl_harus_kembali`, `id_pengikut`, `tanggal_input`, `total_biaya_pengeluaran`) VALUES
(3, '1', 'ekspedisi covid-19', 'bus', 'banjarmasin', 'banjarbaru', '2022-06-02', '2022-06-03', '6,8', '2022-06-03 11:23:58', 0),
(8, '27', 'Dalam rangka koordinasi dan konsultasi tentang sinkronisasi agenda kegiatan Usaha Kesehatan Sekolah ', 'Mobil Dinas', 'Kuala Kapuas', 'Palangka Raya', '2023-07-24', '2023-07-25', '25,26', '2023-07-20 12:07:05', 3675000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_pencairan_hibah_bansos`
--
ALTER TABLE `arsip_pencairan_hibah_bansos`
  ADD PRIMARY KEY (`id_arsip_pencairan_hibah_bansos`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `history_penggunaan`
--
ALTER TABLE `history_penggunaan`
  ADD PRIMARY KEY (`id_history_penggunaan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `lpj_bantuan`
--
ALTER TABLE `lpj_bantuan`
  ADD PRIMARY KEY (`id_lpj_bantuan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`id_pengajuan_cuti`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyaluran_bansos`
--
ALTER TABLE `penyaluran_bansos`
  ADD PRIMARY KEY (`id_penyaluran_bansos`);

--
-- Indexes for table `pertimbangan`
--
ALTER TABLE `pertimbangan`
  ADD PRIMARY KEY (`id_pertimbangan`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `proposal_pencairan`
--
ALTER TABLE `proposal_pencairan`
  ADD PRIMARY KEY (`id_proposal_pencairan`),
  ADD KEY `id_pertimbangan` (`id_pertimbangan`);

--
-- Indexes for table `surat_perintah_perjalanan_dinas`
--
ALTER TABLE `surat_perintah_perjalanan_dinas`
  ADD PRIMARY KEY (`id_surat_perintah_perjalanan_dinas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_pencairan_hibah_bansos`
--
ALTER TABLE `arsip_pencairan_hibah_bansos`
  MODIFY `id_arsip_pencairan_hibah_bansos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history_penggunaan`
--
ALTER TABLE `history_penggunaan`
  MODIFY `id_history_penggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lpj_bantuan`
--
ALTER TABLE `lpj_bantuan`
  MODIFY `id_lpj_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyaluran_bansos`
--
ALTER TABLE `penyaluran_bansos`
  MODIFY `id_penyaluran_bansos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pertimbangan`
--
ALTER TABLE `pertimbangan`
  MODIFY `id_pertimbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proposal_pencairan`
--
ALTER TABLE `proposal_pencairan`
  MODIFY `id_proposal_pencairan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_perintah_perjalanan_dinas`
--
ALTER TABLE `surat_perintah_perjalanan_dinas`
  MODIFY `id_surat_perintah_perjalanan_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
