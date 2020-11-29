-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2019 pada 18.25
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_haze`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dataperjam`
--

CREATE TABLE `tbl_dataperjam` (
  `id_dataperjam` int(11) NOT NULL,
  `waktu_jam` time NOT NULL,
  `waktu_tanggal` date NOT NULL,
  `temperatur` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `kecepatan_angin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dataperjam`
--

INSERT INTO `tbl_dataperjam` (`id_dataperjam`, `waktu_jam`, `waktu_tanggal`, `temperatur`, `kelembapan`, `kecepatan_angin`) VALUES
(3, '21:54:20', '2019-04-10', 24, 93, 5),
(4, '21:55:57', '2019-04-10', 24, 94, 5),
(5, '21:22:21', '2019-04-11', 24, 94, 5),
(6, '10:33:30', '2019-04-13', 30, 70, 8),
(7, '13:42:31', '2019-04-13', 28, 77, 13),
(8, '14:03:43', '2019-04-13', 30, 69, 13),
(9, '14:20:57', '2019-04-13', 29, 73, 11),
(10, '14:25:58', '2019-04-13', 29, 67, 11),
(11, '14:26:22', '2019-04-13', 29, 73, 11),
(12, '14:43:25', '2019-04-13', 27, 82, 11),
(13, '14:51:36', '2019-04-13', 27, 82, 11),
(14, '14:52:01', '2019-04-13', 26, 93, 7),
(15, '14:52:40', '2019-04-13', 32, 8, 9),
(16, '14:54:42', '2019-04-13', 27, 82, 11),
(17, '14:58:34', '2019-04-13', 27, 82, 11),
(18, '15:33:33', '2019-04-13', 27, 82, 11),
(19, '16:07:21', '2019-04-13', 28, 80, 11),
(20, '20:26:10', '2019-04-13', 25, 95, 2),
(21, '22:07:21', '2019-04-13', 24, 97, 3),
(22, '22:28:00', '2019-04-13', 24, 96, 3),
(23, '14:44:12', '2019-04-14', 29, 71, 13),
(24, '16:03:51', '2019-04-14', 29, 75, 11),
(25, '18:14:50', '2019-04-14', 26, 87, 6),
(26, '19:59:07', '2019-04-14', 25, 90, 3),
(27, '21:49:51', '2019-04-14', 25, 94, 5),
(28, '22:56:50', '2019-04-14', 24, 95, 3),
(29, '19:08:21', '2019-04-15', 25, 94, 3),
(30, '22:10:22', '2019-04-15', 24, 96, 3),
(31, '22:12:42', '2019-04-15', 24, 96, 3),
(32, '01:39:20', '2019-04-16', 24, 98, 3),
(33, '04:00:00', '2019-05-10', 30, 75, 5),
(34, '05:00:00', '2019-05-10', 27, 40, 0),
(35, '06:00:00', '2019-05-10', 25, 80, 0),
(36, '07:00:00', '2019-05-10', 28, 80, 5),
(37, '08:00:00', '2019-05-10', 27, 80, 5),
(38, '09:00:00', '2019-05-10', 25, 80, 5),
(39, '10:00:00', '2019-05-10', 25, 80, 10),
(40, '11:00:00', '2019-05-10', 27, 90, 10),
(41, '12:00:00', '2019-05-10', 31, 64, 7),
(42, '13:00:00', '2019-04-24', 24, 93, 5),
(43, '14:00:00', '2019-04-24', 24, 93, 5),
(44, '15:00:00', '2019-04-24', 29, 73, 11),
(45, '16:00:00', '2019-04-24', 29, 67, 11),
(46, '17:00:00', '2019-04-24', 24, 97, 3),
(47, '18:00:00', '2019-04-24', 25, 95, 2),
(48, '19:00:00', '2019-04-22', 24, 94, 5),
(49, '20:00:00', '2019-04-22', 24, 95, 3),
(51, '21:00:00', '2019-04-22', 32, 62, 13),
(52, '22:00:00', '2019-04-22', 31, 63, 13),
(53, '19:46:33', '2019-05-11', 29, 82, 2),
(54, '19:47:02', '2019-05-11', 29, 83, 1),
(55, '19:47:31', '2019-05-11', 29, 81, 4),
(56, '19:48:00', '2019-05-11', 29, 81, 3),
(57, '19:48:29', '2019-05-11', 28, 82, 2),
(58, '19:48:58', '2019-05-11', 28, 83, 2),
(59, '19:49:27', '2019-05-11', 28, 83, 1),
(60, '19:49:56', '2019-05-11', 28, 84, 2),
(61, '19:50:25', '2019-05-11', 28, 85, 1),
(62, '19:50:54', '2019-05-11', 28, 84, 1),
(63, '19:51:23', '2019-05-11', 28, 85, 3),
(64, '19:51:52', '2019-05-11', 28, 85, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dataset`
--

CREATE TABLE `tbl_dataset` (
  `id_dataset` int(11) NOT NULL,
  `temperatur` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `kecepatan_angin` int(11) NOT NULL,
  `prediksi_cuaca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dataset`
--

INSERT INTO `tbl_dataset` (`id_dataset`, `temperatur`, `kelembapan`, `kecepatan_angin`, `prediksi_cuaca`) VALUES
(1, 27, 86, 8, 'Hujan'),
(2, 28, 82, 9, 'Hujan'),
(3, 28, 79, 10, 'Hujan'),
(4, 30, 72, 11, 'Hujan'),
(5, 30, 70, 11, 'Hujan'),
(6, 31, 68, 11, 'Hujan'),
(7, 31, 68, 10, 'Hujan'),
(8, 28, 77, 13, 'Hujan'),
(9, 26, 90, 13, 'Hujan'),
(10, 25, 94, 12, 'Hujan'),
(11, 25, 95, 11, 'Hujan'),
(12, 25, 95, 11, 'Hujan'),
(13, 30, 72, 9, 'Hujan'),
(14, 25, 94, 12, 'Hujan'),
(15, 29, 80, 6, 'Hujan'),
(16, 29, 77, 8, 'Hujan'),
(17, 30, 75, 10, 'Hujan'),
(18, 31, 73, 12, 'Hujan'),
(19, 31, 72, 12, 'Hujan'),
(20, 81, 83, 7, 'Hujan'),
(21, 27, 86, 11, 'Hujan'),
(22, 27, 87, 10, 'Hujan'),
(23, 26, 92, 9, 'Hujan'),
(24, 26, 91, 6, 'Hujan'),
(25, 28, 81, 6, 'Hujan'),
(26, 29, 77, 8, 'Hujan'),
(27, 29, 76, 10, 'Hujan'),
(28, 30, 76, 12, 'Hujan'),
(29, 30, 75, 12, 'Hujan'),
(30, 29, 76, 12, 'Hujan'),
(31, 28, 80, 10, 'Hujan'),
(32, 30, 73, 8, 'Hujan'),
(33, 30, 73, 10, 'Hujan'),
(34, 30, 74, 11, 'Hujan'),
(35, 29, 76, 12, 'Hujan'),
(36, 27, 91, 8, 'Hujan'),
(37, 26, 95, 5, 'Hujan'),
(38, 25, 99, 4, 'Hujan'),
(39, 28, 82, 12, 'Hujan'),
(40, 28, 84, 11, 'Hujan'),
(41, 27, 82, 11, 'Hujan'),
(42, 29, 73, 13, 'Hujan'),
(43, 29, 74, 12, 'Hujan'),
(44, 24, 99, 1, 'Hujan'),
(45, 24, 99, 3, 'Hujan'),
(46, 30, 76, 8, 'Hujan'),
(47, 30, 75, 11, 'Hujan'),
(48, 30, 76, 12, 'Hujan'),
(49, 30, 77, 13, 'Hujan'),
(50, 29, 79, 13, 'Hujan'),
(51, 28, 83, 11, 'Hujan'),
(52, 28, 84, 10, 'Hujan'),
(53, 27, 89, 8, 'Hujan'),
(54, 26, 93, 6, 'Hujan'),
(55, 25, 96, 5, 'Hujan'),
(56, 30, 73, 7, 'Hujan'),
(57, 31, 71, 9, 'Hujan'),
(58, 31, 70, 9, 'Hujan'),
(59, 30, 72, 10, 'Hujan'),
(60, 29, 76, 10, 'Hujan'),
(61, 27, 82, 13, 'Hujan'),
(62, 29, 77, 8, 'Hujan'),
(63, 29, 77, 10, 'Hujan'),
(64, 29, 79, 11, 'Hujan'),
(65, 28, 81, 11, 'Hujan'),
(66, 28, 82, 11, 'Hujan'),
(67, 27, 87, 10, 'Hujan'),
(68, 26, 89, 10, 'Hujan'),
(69, 25, 92, 8, 'Hujan'),
(70, 24, 96, 5, 'Hujan'),
(71, 24, 98, 4, 'Hujan'),
(72, 30, 74, 6, 'Hujan'),
(73, 31, 73, 9, 'Hujan'),
(74, 30, 75, 11, 'Hujan'),
(75, 29, 77, 11, 'Hujan'),
(76, 28, 83, 9, 'Hujan'),
(77, 27, 85, 9, 'Hujan'),
(78, 27, 89, 7, 'Hujan'),
(79, 26, 94, 5, 'Hujan'),
(80, 30, 74, 6, 'Hujan'),
(81, 31, 73, 9, 'Hujan'),
(82, 31, 72, 10, 'Hujan'),
(83, 30, 75, 11, 'Hujan'),
(84, 29, 77, 11, 'Hujan'),
(85, 28, 83, 9, 'Hujan'),
(86, 27, 85, 9, 'Hujan'),
(87, 27, 89, 7, 'Hujan'),
(88, 26, 94, 5, 'Hujan'),
(89, 26, 93, 4, 'Hujan'),
(90, 30, 77, 10, 'Hujan'),
(91, 30, 77, 12, 'Hujan'),
(92, 29, 79, 13, 'Hujan'),
(93, 30, 76, 8, 'Hujan'),
(94, 30, 77, 10, 'Hujan'),
(95, 30, 77, 12, 'Hujan'),
(96, 29, 79, 13, 'Hujan'),
(97, 29, 79, 11, 'Hujan'),
(98, 28, 84, 10, 'Hujan'),
(99, 30, 76, 12, 'Hujan'),
(100, 30, 78, 14, 'Hujan'),
(101, 25, 93, 5, 'Berawan'),
(102, 25, 94, 4, 'Berawan'),
(103, 24, 95, 4, 'Berawan'),
(104, 24, 96, 4, 'Berawan'),
(105, 25, 92, 4, 'Berawan'),
(106, 25, 93, 3, 'Berawan'),
(107, 28, 78, 5, 'Berawan'),
(108, 23, 98, 2, 'Berawan'),
(109, 26, 90, 6, 'Berawan'),
(110, 23, 85, 9, 'Berawan'),
(111, 26, 70, 9, 'Berawan'),
(112, 26, 94, 5, 'Berawan'),
(113, 25, 95, 4, 'Berawan'),
(114, 26, 94, 3, 'Berawan'),
(115, 25, 96, 4, 'Berawan'),
(116, 25, 95, 4, 'Berawan'),
(117, 25, 97, 3, 'Berawan'),
(118, 24, 98, 3, 'Berawan'),
(119, 24, 98, 2, 'Berawan'),
(120, 24, 100, 3, 'Berawan'),
(121, 24, 100, 2, 'Berawan'),
(122, 30, 69, 13, 'Berawan'),
(123, 25, 94, 5, 'Berawan'),
(124, 23, 100, 2, 'Berawan'),
(125, 26, 88, 3, 'Berawan'),
(126, 25, 94, 6, 'Berawan'),
(127, 25, 96, 4, 'Berawan'),
(128, 25, 95, 3, 'Berawan'),
(129, 24, 96, 3, 'Berawan'),
(130, 23, 98, 2, 'Berawan'),
(131, 27, 84, 3, 'Berawan'),
(132, 24, 98, 3, 'Berawan'),
(133, 25, 92, 3, 'Berawan'),
(134, 29, 77, 5, 'Berawan'),
(135, 26, 97, 6, 'Berawan'),
(136, 25, 97, 5, 'Berawan'),
(137, 29, 73, 11, 'Berawan'),
(138, 27, 87, 10, 'Berawan'),
(139, 26, 93, 7, 'Berawan'),
(140, 26, 96, 6, 'Berawan'),
(141, 24, 100, 3, 'Berawan'),
(142, 26, 97, 7, 'Berawan'),
(143, 28, 82, 11, 'Berawan'),
(144, 27, 88, 7, 'Berawan'),
(145, 26, 91, 5, 'Berawan'),
(146, 25, 94, 4, 'Berawan'),
(147, 25, 93, 3, 'Berawan'),
(148, 24, 97, 4, 'Berawan'),
(149, 24, 97, 3, 'Berawan'),
(150, 23, 98, 3, 'Berawan'),
(151, 23, 100, 2, 'Berawan'),
(152, 28, 81, 11, 'Berawan'),
(153, 27, 86, 10, 'Berawan'),
(154, 27, 90, 7, 'Berawan'),
(155, 26, 91, 7, 'Berawan'),
(156, 28, 81, 10, 'Berawan'),
(157, 27, 87, 7, 'Berawan'),
(158, 26, 90, 5, 'Berawan'),
(159, 24, 99, 2, 'Berawan'),
(160, 24, 99, 3, 'Berawan'),
(161, 25, 96, 4, 'Berawan'),
(162, 25, 95, 6, 'Berawan'),
(163, 24, 97, 4, 'Berawan'),
(164, 24, 98, 3, 'Berawan'),
(165, 24, 100, 3, 'Berawan'),
(166, 23, 99, 3, 'Berawan'),
(167, 23, 100, 2, 'Berawan'),
(168, 26, 87, 4, 'Berawan'),
(169, 24, 96, 2, 'Berawan'),
(170, 23, 100, 2, 'Berawan'),
(171, 22, 100, 1, 'Berawan'),
(172, 25, 99, 4, 'Berawan'),
(173, 25, 98, 3, 'Berawan'),
(174, 24, 99, 3, 'Berawan'),
(175, 27, 81, 6, 'Berawan'),
(176, 29, 72, 7, 'Berawan'),
(177, 24, 99, 2, 'Berawan'),
(178, 23, 100, 3, 'Berawan'),
(179, 25, 99, 4, 'Berawan'),
(180, 25, 98, 3, 'Berawan'),
(181, 24, 99, 3, 'Berawan'),
(182, 27, 85, 3, 'Berawan'),
(183, 29, 79, 5, 'Berawan'),
(184, 25, 96, 4, 'Berawan'),
(185, 24, 97, 4, 'Berawan'),
(186, 23, 100, 4, 'Berawan'),
(187, 24, 100, 3, 'Berawan'),
(188, 24, 99, 5, 'Berawan'),
(189, 25, 93, 5, 'Berawan'),
(190, 28, 83, 7, 'Berawan'),
(191, 30, 78, 8, 'Berawan'),
(192, 26, 95, 6, 'Berawan'),
(193, 24, 100, 5, 'Berawan'),
(194, 28, 85, 6, 'Berawan'),
(195, 29, 78, 7, 'Berawan'),
(196, 26, 94, 6, 'Berawan'),
(197, 24, 100, 5, 'Berawan'),
(198, 26, 95, 6, 'Berawan'),
(199, 28, 85, 6, 'Berawan'),
(200, 29, 78, 7, 'Berawan'),
(201, 22, 58, 7, 'Cerah'),
(202, 24, 56, 6, 'Cerah'),
(203, 24, 56, 9, 'Cerah'),
(204, 29, 28, 7, 'Cerah'),
(205, 28, 29, 8, 'Cerah'),
(206, 27, 34, 10, 'Cerah'),
(207, 25, 40, 11, 'Cerah'),
(208, 22, 49, 13, 'Cerah'),
(209, 23, 45, 12, 'Cerah'),
(210, 29, 48, 12, 'Cerah'),
(211, 29, 50, 13, 'Cerah'),
(212, 31, 17, 12, 'Cerah'),
(213, 34, 15, 13, 'Cerah'),
(214, 23, 77, 5, 'Cerah'),
(215, 35, 15, 19, 'Cerah'),
(216, 24, 51, 5, 'Cerah'),
(217, 25, 74, 8, 'Cerah'),
(218, 27, 67, 20, 'Cerah'),
(219, 26, 68, 18, 'Cerah'),
(220, 26, 70, 14, 'Cerah'),
(221, 25, 49, 4, 'Cerah'),
(222, 26, 46, 4, 'Cerah'),
(223, 30, 38, 9, 'Cerah'),
(224, 24, 75, 7, 'Cerah'),
(225, 24, 74, 7, 'Cerah'),
(226, 33, 41, 13, 'Cerah'),
(227, 24, 72, 7, 'Cerah'),
(228, 26, 65, 9, 'Cerah'),
(229, 26, 73, 12, 'Cerah'),
(230, 25, 75, 9, 'Cerah'),
(231, 25, 76, 8, 'Cerah'),
(232, 31, 9, 8, 'Cerah'),
(233, 32, 8, 9, 'Cerah'),
(234, 33, 8, 9, 'Cerah'),
(235, 33, 8, 11, 'Cerah'),
(236, 34, 8, 12, 'Cerah'),
(237, 34, 9, 12, 'Cerah'),
(238, 34, 12, 14, 'Cerah'),
(239, 35, 16, 17, 'Cerah'),
(240, 31, 20, 19, 'Cerah'),
(241, 26, 25, 10, 'Cerah'),
(242, 32, 25, 13, 'Cerah'),
(243, 31, 27, 8, 'Cerah'),
(244, 30, 27, 7, 'Cerah'),
(245, 30, 28, 7, 'Cerah'),
(246, 28, 28, 8, 'Cerah'),
(247, 28, 29, 8, 'Cerah'),
(248, 28, 28, 8, 'Cerah'),
(249, 28, 28, 9, 'Cerah'),
(250, 32, 15, 10, 'Cerah'),
(251, 30, 50, 7, 'Cerah'),
(252, 27, 77, 7, 'Cerah'),
(253, 23, 77, 5, 'Cerah'),
(254, 24, 72, 6, 'Cerah'),
(255, 26, 66, 10, 'Cerah'),
(256, 28, 60, 12, 'Cerah'),
(257, 27, 67, 17, 'Cerah'),
(258, 26, 69, 14, 'Cerah'),
(259, 32, 33, 12, 'Cerah'),
(260, 31, 48, 15, 'Cerah'),
(261, 31, 51, 13, 'Cerah'),
(262, 24, 76, 6, 'Cerah'),
(263, 24, 78, 6, 'Cerah'),
(264, 24, 79, 6, 'Cerah'),
(265, 24, 79, 6, 'Cerah'),
(266, 23, 79, 6, 'Cerah'),
(267, 28, 23, 7, 'Cerah'),
(268, 27, 26, 9, 'Cerah'),
(269, 31, 21, 5, 'Cerah'),
(270, 33, 18, 8, 'Cerah'),
(271, 27, 26, 10, 'Cerah'),
(272, 31, 33, 5, 'Cerah'),
(273, 33, 28, 12, 'Cerah'),
(274, 32, 30, 9, 'Cerah'),
(275, 30, 33, 4, 'Cerah'),
(276, 30, 34, 3, 'Cerah'),
(277, 29, 36, 3, 'Cerah'),
(278, 35, 26, 17, 'Cerah'),
(279, 28, 38, 3, 'Cerah'),
(280, 30, 34, 3, 'Cerah'),
(281, 32, 30, 6, 'Cerah'),
(282, 34, 38, 6, 'Cerah'),
(283, 35, 26, 12, 'Cerah'),
(284, 36, 25, 14, 'Cerah'),
(285, 37, 25, 17, 'Cerah'),
(286, 33, 41, 17, 'Cerah'),
(287, 31, 48, 5, 'Cerah'),
(288, 38, 19, 22, 'Cerah'),
(289, 37, 20, 21, 'Cerah'),
(290, 36, 23, 19, 'Cerah'),
(291, 35, 26, 17, 'Cerah'),
(292, 31, 49, 12, 'Cerah'),
(293, 30, 53, 9, 'Cerah'),
(294, 29, 54, 8, 'Cerah'),
(295, 29, 56, 6, 'Cerah'),
(296, 29, 58, 5, 'Cerah'),
(297, 29, 57, 5, 'Cerah'),
(298, 33, 42, 13, 'Cerah'),
(299, 32, 47, 8, 'Cerah'),
(300, 34, 42, 23, 'Cerah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Roy Andri', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prediksi`
--

CREATE TABLE `tbl_prediksi` (
  `id` int(11) NOT NULL,
  `waktu_tanggal` date NOT NULL,
  `waktu_jam` time NOT NULL,
  `temperatur` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `kecepatan_angin` int(11) NOT NULL,
  `prediksi_cuaca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prediksi`
--

INSERT INTO `tbl_prediksi` (`id`, `waktu_tanggal`, `waktu_jam`, `temperatur`, `kelembapan`, `kecepatan_angin`, `prediksi_cuaca`) VALUES
(1, '2019-04-07', '22:29:00', 31, 64, 7, 'Hujan'),
(2, '0000-00-00', '00:20:19', 24, 94, 5, 'Berawan'),
(3, '0000-00-00', '00:20:19', 24, 94, 5, 'Berawan'),
(4, '0000-00-00', '00:20:19', 30, 70, 8, 'Hujan'),
(5, '0000-00-00', '00:20:19', 28, 77, 13, 'Hujan'),
(6, '0000-00-00', '00:20:19', 30, 69, 13, 'Hujan'),
(7, '0000-00-00', '00:20:19', 29, 73, 11, 'Hujan'),
(8, '0000-00-00', '00:20:19', 29, 67, 11, 'Hujan'),
(9, '0000-00-00', '00:20:19', 29, 73, 11, 'Hujan'),
(10, '0000-00-00', '00:20:19', 27, 82, 11, 'Hujan'),
(11, '0000-00-00', '00:20:19', 27, 82, 11, 'Hujan'),
(12, '0000-00-00', '00:20:19', 26, 93, 7, 'Berawan'),
(13, '0000-00-00', '00:20:19', 32, 8, 9, 'Cerah'),
(14, '0000-00-00', '00:20:19', 27, 82, 11, 'Hujan'),
(15, '0000-00-00', '00:20:19', 27, 82, 11, 'Hujan'),
(16, '0000-00-00', '00:20:19', 27, 82, 11, 'Hujan'),
(17, '2016-07-21', '00:20:19', 28, 80, 11, 'Hujan'),
(18, '0000-00-00', '00:20:19', 25, 95, 2, 'Berawan'),
(19, '2022-07-21', '00:20:19', 24, 97, 3, 'Berawan'),
(20, '0000-00-00', '00:20:19', 24, 96, 3, 'Berawan'),
(21, '0000-00-00', '00:20:19', 29, 71, 13, 'Cerah'),
(22, '0000-00-00', '00:20:19', 29, 75, 11, 'Hujan'),
(23, '0000-00-00', '00:20:19', 26, 87, 6, 'Berawan'),
(24, '0000-00-00', '00:20:19', 25, 90, 3, 'Berawan'),
(25, '0000-00-00', '00:20:19', 25, 94, 5, 'Berawan'),
(26, '0000-00-00', '00:20:19', 24, 95, 3, 'Berawan'),
(27, '2019-08-21', '00:20:19', 25, 94, 3, 'Berawan'),
(28, '2022-10-22', '00:20:19', 24, 96, 3, 'Berawan'),
(29, '2019-04-15', '22:12:42', 24, 96, 3, 'Berawan'),
(30, '2019-04-16', '01:39:20', 24, 98, 3, 'Berawan'),
(31, '2019-04-16', '12:15:29', 30, 75, 5, 'Hujan'),
(32, '2019-04-16', '12:17:29', 27, 40, 0, 'Cerah'),
(33, '2019-04-16', '12:18:03', 25, 80, 0, 'Berawan'),
(34, '2019-04-16', '12:18:40', 28, 80, 5, 'Berawan'),
(35, '2019-04-16', '12:19:14', 27, 80, 5, 'Berawan'),
(36, '2019-04-16', '12:19:30', 25, 80, 5, 'Berawan'),
(37, '2019-04-16', '12:19:54', 25, 80, 10, 'Hujan'),
(38, '2019-04-16', '12:20:16', 27, 90, 10, 'Hujan'),
(39, '2019-04-21', '23:53:01', 24, 94, 5, 'Berawan'),
(40, '2019-04-22', '15:05:44', 32, 62, 13, 'Cerah'),
(41, '2019-04-22', '20:35:35', 26, 90, 5, 'Berawan'),
(42, '2019-04-22', '21:01:45', 26, 90, 4, 'Berawan'),
(43, '2019-04-22', '21:04:12', 25, 90, 6, 'Berawan'),
(44, '2019-04-22', '21:05:09', 27, 85, 5, 'Berawan'),
(45, '2019-04-23', '09:11:57', 29, 72, 11, 'Hujan'),
(46, '2019-04-23', '09:15:35', 29, 72, 11, 'Hujan'),
(47, '2019-04-23', '09:20:10', 30, 71, 11, 'Hujan'),
(48, '2019-04-23', '09:24:48', 30, 71, 11, 'Hujan'),
(49, '2019-04-23', '09:32:42', 31, 69, 11, 'Hujan'),
(50, '2019-04-23', '22:30:03', 25, 92, 6, 'Berawan'),
(51, '2019-04-30', '09:34:13', 29, 76, 5, 'Hujan'),
(52, '2019-05-08', '13:36:58', 31, 63, 16, 'Cerah'),
(53, '2019-05-08', '13:39:32', 31, 63, 15, 'Cerah'),
(54, '2019-05-08', '13:40:17', 31, 63, 15, 'Cerah'),
(55, '2019-05-08', '13:42:13', 31, 63, 15, 'Cerah'),
(56, '2019-05-08', '13:43:08', 31, 63, 15, 'Cerah'),
(57, '2019-05-08', '13:43:52', 31, 63, 15, 'Cerah'),
(58, '2019-05-08', '13:47:12', 31, 63, 16, 'Cerah'),
(59, '2019-05-08', '14:23:55', 28, 76, 16, 'Hujan'),
(60, '2019-05-08', '14:34:56', 25, 76, 16, 'Hujan'),
(61, '2019-05-08', '14:35:43', 28, 76, 17, 'Cerah'),
(62, '2019-05-08', '14:38:09', 28, 76, 16, 'Hujan'),
(63, '2019-05-08', '14:39:46', 28, 76, 16, 'Hujan'),
(64, '2019-05-08', '14:40:15', 28, 76, 16, 'Hujan'),
(65, '2019-05-08', '14:40:59', 28, 76, 16, 'Hujan'),
(66, '2019-05-08', '14:41:29', 28, 76, 16, 'Hujan'),
(67, '2019-05-08', '14:43:59', 28, 76, 16, 'Hujan'),
(68, '2019-05-09', '21:38:07', 29, 82, 3, 'Berawan'),
(69, '2019-05-09', '21:38:36', 29, 82, 3, 'Berawan'),
(70, '2019-05-09', '21:39:05', 29, 82, 3, 'Berawan'),
(71, '2019-05-09', '21:39:34', 29, 82, 2, 'Berawan'),
(72, '2019-05-09', '21:40:03', 29, 82, 1, 'Berawan'),
(73, '2019-05-09', '21:40:32', 29, 82, 0, 'Berawan'),
(74, '2019-05-09', '21:41:01', 29, 81, 1, 'Berawan'),
(75, '2019-05-09', '21:41:30', 29, 81, 1, 'Berawan'),
(76, '2019-05-09', '21:42:00', 29, 81, 0, 'Berawan'),
(77, '2019-05-09', '21:42:28', 29, 81, 2, 'Berawan'),
(78, '2019-05-09', '21:42:57', 29, 81, 1, 'Berawan'),
(79, '2019-05-09', '21:43:26', 29, 81, 2, 'Berawan'),
(80, '2019-05-09', '21:43:55', 29, 81, 2, 'Berawan'),
(81, '2019-05-09', '21:44:24', 29, 81, 2, 'Berawan'),
(82, '2019-05-09', '21:44:53', 29, 81, 1, 'Berawan'),
(83, '2019-05-09', '21:45:22', 29, 81, 1, 'Berawan'),
(84, '2019-05-09', '21:45:51', 29, 81, 2, 'Berawan'),
(85, '2019-05-09', '21:46:20', 29, 81, 2, 'Berawan'),
(86, '2019-05-09', '21:46:49', 29, 81, 1, 'Berawan'),
(87, '2019-05-09', '21:47:18', 29, 81, 1, 'Berawan'),
(88, '2019-05-09', '21:47:47', 29, 81, 1, 'Berawan'),
(89, '2019-05-09', '21:48:16', 29, 81, 2, 'Berawan'),
(90, '2019-05-09', '21:48:45', 29, 81, 2, 'Berawan'),
(91, '2019-05-09', '21:50:56', 29, 81, 2, 'Berawan'),
(92, '2019-05-09', '21:51:25', 29, 82, 2, 'Berawan'),
(93, '2019-05-09', '21:51:54', 29, 82, 2, 'Berawan'),
(94, '2019-05-09', '21:52:23', 29, 82, 2, 'Berawan'),
(95, '2019-05-09', '21:52:52', 29, 83, 3, 'Berawan'),
(96, '2019-05-09', '21:53:21', 29, 82, 3, 'Berawan'),
(97, '2019-05-09', '21:53:50', 29, 82, 2, 'Berawan'),
(98, '2019-05-09', '21:54:19', 29, 82, 2, 'Berawan'),
(99, '2019-05-09', '21:54:48', 29, 82, 2, 'Berawan'),
(100, '2019-05-09', '21:55:17', 29, 82, 2, 'Berawan'),
(101, '2019-05-11', '19:46:33', 29, 82, 2, 'Berawan'),
(102, '2019-05-11', '19:47:02', 29, 83, 1, 'Berawan'),
(103, '2019-05-11', '19:47:31', 29, 81, 4, 'Berawan'),
(104, '2019-05-11', '19:48:00', 29, 81, 3, 'Berawan'),
(105, '2019-05-11', '19:48:29', 28, 82, 2, 'Berawan'),
(106, '2019-05-11', '19:48:58', 28, 83, 2, 'Berawan'),
(107, '2019-05-11', '19:49:27', 28, 83, 1, 'Berawan'),
(108, '2019-05-11', '19:49:56', 28, 84, 2, 'Berawan'),
(109, '2019-05-11', '19:50:25', 28, 85, 1, 'Berawan'),
(110, '2019-05-11', '19:50:54', 28, 84, 1, 'Berawan'),
(111, '2019-05-11', '19:51:23', 28, 85, 3, 'Berawan'),
(112, '2019-05-11', '19:51:52', 28, 85, 4, 'Berawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prediksi_besok`
--

CREATE TABLE `tbl_prediksi_besok` (
  `id` int(11) NOT NULL,
  `waktu_tanggal` date NOT NULL,
  `waktu_jam` time NOT NULL,
  `temperatur` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `kecepatan_angin` int(11) NOT NULL,
  `prediksi_cuaca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prediksi_besok`
--

INSERT INTO `tbl_prediksi_besok` (`id`, `waktu_tanggal`, `waktu_jam`, `temperatur`, `kelembapan`, `kecepatan_angin`, `prediksi_cuaca`) VALUES
(1, '2019-04-22', '21:04:12', 26, 83, 8, 'Hujan'),
(2, '2019-04-22', '21:05:09', 26, 83, 8, 'Hujan'),
(3, '2019-04-23', '09:20:10', 29, 76, 8, 'Hujan'),
(4, '2019-04-23', '09:24:48', 28, 78, 5, 'Berawan'),
(5, '2019-05-08', '13:39:32', 30, 68, 12, 'Hujan'),
(6, '2019-05-08', '13:40:17', 31, 65, 14, 'Cerah'),
(7, '2019-05-08', '13:42:13', 31, 63, 15, 'Cerah'),
(8, '2019-05-08', '13:43:08', 31, 63, 15, 'Cerah'),
(9, '2019-05-08', '13:43:52', 31, 63, 15, 'Cerah'),
(10, '2019-05-08', '13:47:12', 29, 73, 9, 'Hujan'),
(11, '2019-05-08', '14:23:55', 29, 73, 13, 'Hujan'),
(12, '2019-05-08', '14:34:56', 27, 74, 15, 'Hujan'),
(13, '2019-05-08', '14:35:43', 27, 75, 16, 'Cerah'),
(14, '2019-05-08', '14:38:09', 27, 78, 9, 'Hujan'),
(15, '2019-05-08', '14:39:46', 27, 78, 9, 'Hujan'),
(16, '2019-05-08', '14:40:15', 28, 77, 13, 'Hujan'),
(17, '2019-05-08', '14:40:59', 27, 78, 9, 'Hujan'),
(18, '2019-05-08', '14:41:29', 28, 77, 13, 'Hujan'),
(19, '2019-05-08', '14:43:59', 27, 78, 9, 'Hujan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prediksi_malam`
--

CREATE TABLE `tbl_prediksi_malam` (
  `id` int(11) NOT NULL,
  `waktu_tanggal` date NOT NULL,
  `waktu_jam` time NOT NULL,
  `temperatur` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `kecepatan_angin` int(11) NOT NULL,
  `prediksi_cuaca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prediksi_malam`
--

INSERT INTO `tbl_prediksi_malam` (`id`, `waktu_tanggal`, `waktu_jam`, `temperatur`, `kelembapan`, `kecepatan_angin`, `prediksi_cuaca`) VALUES
(1, '2019-04-23', '09:20:10', 29, 76, 8, 'Hujan'),
(2, '2019-04-23', '09:24:48', 28, 78, 5, 'Berawan'),
(3, '2019-05-08', '13:39:32', 30, 68, 12, 'Hujan'),
(4, '2019-05-08', '13:40:17', 31, 65, 14, 'Cerah'),
(5, '2019-05-08', '13:42:13', 31, 63, 15, 'Cerah'),
(6, '2019-05-08', '13:43:08', 31, 63, 15, 'Cerah'),
(7, '2019-05-08', '13:43:52', 31, 63, 15, 'Cerah'),
(8, '2019-05-08', '13:47:12', 29, 73, 9, 'Hujan'),
(9, '2019-05-08', '14:23:55', 29, 73, 13, 'Hujan'),
(10, '2019-05-08', '14:34:56', 27, 74, 15, 'Hujan'),
(11, '2019-05-08', '14:35:43', 27, 75, 16, 'Cerah'),
(12, '2019-05-08', '14:38:09', 27, 78, 9, 'Hujan'),
(13, '2019-05-08', '14:39:46', 27, 78, 9, 'Hujan'),
(14, '2019-05-08', '14:40:15', 28, 77, 13, 'Hujan'),
(15, '2019-05-08', '14:40:59', 27, 78, 9, 'Hujan'),
(16, '2019-05-08', '14:41:29', 28, 77, 13, 'Hujan'),
(17, '2019-05-08', '14:43:59', 27, 78, 9, 'Hujan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prediksi_siang`
--

CREATE TABLE `tbl_prediksi_siang` (
  `id` int(11) NOT NULL,
  `waktu_tanggal` date NOT NULL,
  `waktu_jam` time NOT NULL,
  `temperatur` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `kecepatan_angin` int(11) NOT NULL,
  `prediksi_cuaca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prediksi_siang`
--

INSERT INTO `tbl_prediksi_siang` (`id`, `waktu_tanggal`, `waktu_jam`, `temperatur`, `kelembapan`, `kecepatan_angin`, `prediksi_cuaca`) VALUES
(1, '2019-04-22', '12:00:00', 26, 90, 5, 'Berawan'),
(2, '2019-04-23', '09:20:10', 29, 76, 8, 'Hujan'),
(3, '2019-04-23', '09:24:48', 29, 76, 8, 'Berawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dataperjam`
--
ALTER TABLE `tbl_dataperjam`
  ADD PRIMARY KEY (`id_dataperjam`);

--
-- Indeks untuk tabel `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_prediksi_besok`
--
ALTER TABLE `tbl_prediksi_besok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_prediksi_malam`
--
ALTER TABLE `tbl_prediksi_malam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_prediksi_siang`
--
ALTER TABLE `tbl_prediksi_siang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dataperjam`
--
ALTER TABLE `tbl_dataperjam`
  MODIFY `id_dataperjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `tbl_prediksi_besok`
--
ALTER TABLE `tbl_prediksi_besok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_prediksi_malam`
--
ALTER TABLE `tbl_prediksi_malam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_prediksi_siang`
--
ALTER TABLE `tbl_prediksi_siang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
