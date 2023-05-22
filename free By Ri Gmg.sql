-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Jan 2021 pada 08.01
-- Versi server: 10.3.27-MariaDB-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insidewe_demo2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `waktu` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `method` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `note` text COLLATE utf8_swedish_ci NOT NULL,
  `pengirim` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `unik` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `sistem` enum('Auto','Manual') COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Pending','Success','Error') COLLATE utf8_swedish_ci NOT NULL,
  `place_from` enum('WEB','API') COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `tf` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit_method`
--

CREATE TABLE `deposit_method` (
  `id` int(10) NOT NULL,
  `sistem` enum('Auto','Manual') COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `rate` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `note` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `deposit_method`
--

INSERT INTO `deposit_method` (`id`, `sistem`, `name`, `rate`, `note`) VALUES
(1, 'Auto', 'Telkomsel', '1', 'Isi nomor mu'),
(2, 'Manual', 'Isi nama metode deposit', '1', 'Isi nomor mu\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hof`
--

CREATE TABLE `hof` (
  `id` int(10) NOT NULL,
  `type` enum('Sosmed','Pulsa','Deposit') COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `hof`
--

INSERT INTO `hof` (`id`, `type`, `user`, `price`) VALUES
(1, 'Sosmed', 'Imam', 5190),
(2, 'Sosmed', 'Cantika', 40200),
(3, 'Sosmed', 'Dekpo', 16988),
(4, 'Sosmed', 'AdityaTri', 48635),
(9, 'Sosmed', 'AdityaTri', 87680),
(10, 'Deposit', 'Idnun', 9000),
(11, 'Deposit', 'Idnun', 9000),
(12, 'Sosmed', 'Idnun', 5700),
(13, 'Sosmed', 'Dekpo', 9380),
(14, 'Sosmed', 'Idnun', 5700),
(15, 'Deposit', 'AdityaTri', 270000),
(16, 'Sosmed', 'AdityaTri', 5625),
(17, 'Sosmed', 'AdityaTri', 5625),
(18, 'Sosmed', 'AdityaTri', 6850),
(19, 'Sosmed', 'AdityaTri', 27400),
(20, 'Sosmed', 'prima', 13700),
(21, 'Sosmed', 'AdityaTri', 3750),
(22, 'Sosmed', 'Dekpo', 14100),
(23, 'Sosmed', 'AdityaTri', 27400),
(24, 'Sosmed', 'AdityaTri', 2500),
(25, 'Deposit', 'AdityaTri', 270000),
(26, 'Sosmed', 'AdityaTri', 3750),
(27, 'Sosmed', 'Dekpo', 14100),
(28, 'Sosmed', 'AdityaTri', 46200),
(29, 'Deposit', 'AdityaTri1', 18000),
(30, 'Deposit', 'AdityaTri1', 18000),
(31, 'Deposit', 'AdityaTri', 18000),
(32, 'Sosmed', 'imam', 6660),
(33, 'Sosmed', 'AdityaTri', 15400),
(34, 'Deposit', 'Casyhtn', 4867),
(35, 'Sosmed', 'AdityaTri1', 15400),
(36, 'Sosmed', 'AdityaTri', 68500),
(37, 'Sosmed', 'AdityaTri', 95900),
(38, 'Sosmed', 'AdityaTri', 3020),
(39, 'Sosmed', 'Dekpo', 17700),
(40, 'Sosmed', 'AdityaTri', 14450),
(41, 'Sosmed', 'AdityaTri', 5125),
(42, 'Deposit', 'AdityaTri', 810000),
(43, 'Sosmed', 'Casyhtn', 1325),
(44, 'Deposit', 'imam', 425000),
(45, 'Sosmed', 'Casyhtn', 1876),
(46, 'Sosmed', 'AdityaTri', 12500),
(47, 'Sosmed', 'Dekpo', 5500),
(48, 'Deposit', 'imam', 9000),
(49, 'Sosmed', 'imam', 13700),
(50, 'Sosmed', 'AdityaTri', 14450),
(51, 'Sosmed', 'AdityaTri', 14450),
(52, 'Sosmed', 'AdityaTri', 6250),
(53, 'Sosmed', 'imam', 68500),
(54, 'Sosmed', 'AdityaTri', 2500),
(55, 'Sosmed', 'AdityaTri', 137000),
(56, 'Sosmed', 'AdityaTri', 411000),
(57, 'Sosmed', 'imam', 13700),
(58, 'Sosmed', 'imam', 22200),
(59, 'Sosmed', 'AdityaTri', 6250),
(60, 'Sosmed', 'AdityaTri', 14450),
(61, 'Sosmed', 'imam', 35250),
(62, 'Sosmed', 'AdityaTri', 14450),
(63, 'Sosmed', 'AdityaTri', 15400),
(64, 'Sosmed', 'AdityaTri', 14450),
(65, 'Sosmed', 'AdityaTri', 15400),
(66, 'Deposit', 'AdityaTri', 810000),
(67, 'Sosmed', 'AdityaTri', 5000),
(68, 'Sosmed', 'Dekpo', 5306),
(69, 'Sosmed', 'AdityaTri', 12500),
(70, 'Sosmed', 'AdityaTri', 12500),
(71, 'Sosmed', 'AdityaTri', 28900),
(72, 'Sosmed', 'AdityaTri', 558),
(73, 'Sosmed', 'AdityaTri', 13280),
(74, 'Sosmed', 'AdityaTri', 5780),
(75, 'Sosmed', 'imam', 2858),
(76, 'Sosmed', 'imam', 6436),
(77, 'Deposit', 'rezalihaidir', 90000),
(78, 'Deposit', 'AdityaTri', 450000),
(79, 'Sosmed', 'AdityaTri', 113160),
(80, 'Sosmed', 'rezalihaidir', 3218),
(81, 'Sosmed', 'AdityaTri', 116080),
(82, 'Sosmed', 'AdityaTri', 40080);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `content` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `date`, `type`, `content`) VALUES
(14, '2020-04-23', 'UPDATE', '(NEW) Layanan JamTayang Youtube.\r\nMohon BACA DESKRIPSI TERLEBIH DAHULU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `poid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `link` text COLLATE utf8_swedish_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `remains` int(10) NOT NULL,
  `start_count` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` enum('Pending','Processing','Error','Partial','Success') COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `provider` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `place_from` enum('WEB','API') COLLATE utf8_swedish_ci NOT NULL,
  `refund` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_pulsa`
--

CREATE TABLE `orders_pulsa` (
  `id` int(10) NOT NULL,
  `oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `poid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `target` text COLLATE utf8_swedish_ci NOT NULL,
  `nometer` text COLLATE utf8_swedish_ci NOT NULL,
  `price` int(10) NOT NULL,
  `status` enum('Pending','Processing','Error','Partial','Success') COLLATE utf8_swedish_ci NOT NULL,
  `catatan` text COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  `provider` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `place_from` enum('WEB','API') COLLATE utf8_swedish_ci NOT NULL,
  `refund` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_tsel`
--

CREATE TABLE `pesan_tsel` (
  `id` int(11) NOT NULL,
  `isi` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('UNREAD','READ') NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_tsel`
--

INSERT INTO `pesan_tsel` (`id`, `isi`, `status`, `date`) VALUES
(421, 'Anda mendapatkan penambahan pulsa Rp 27000 dari nomor 6282272193971 tgl 2020-04-19. Cek pulsa melalui *888#. Info CS: 188', 'UNREAD', '2020-04-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provider`
--

CREATE TABLE `provider` (
  `id` int(10) NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `api_key` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `api_id` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `provider`
--

INSERT INTO `provider` (`id`, `code`, `link`, `api_key`, `api_id`) VALUES
(1, 'IRVANKEDE', 'https://irvankede-smm.co.id/api/order', '0619a7-fb39c7-4391bb-fce1c0-06d16a', '6320'),
(2, 'SM-PULSA', 'https://spetr-media.com/api/pulsa', 'Isi Api-Key Mu', ''),
(3, 'PM-PULSA', 'https://penajam-media.com/api/pulsa', 'CMLD8O22UdmsBuO0TNh5', ''),
(4, 'PM-SOSMED', 'https://penajam-media/api/sosmed', 'OnsHGnYqZMaxhhJLIW3a', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `category` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `service` text COLLATE utf8_swedish_ci NOT NULL,
  `note` text COLLATE utf8_swedish_ci NOT NULL,
  `min` int(10) NOT NULL,
  `max` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` enum('Active','Not active') COLLATE utf8_swedish_ci NOT NULL,
  `pid` int(10) NOT NULL,
  `provider` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_pulsa`
--

CREATE TABLE `services_pulsa` (
  `id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `service` varchar(100) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `services_pulsa`
--

INSERT INTO `services_pulsa` (`id`, `sid`, `pid`, `service`, `operator`, `price`, `status`, `provider`) VALUES
(17937, 1367, '62323', 'ORANGE TV 1.000.000', 'ORANGE TV', '920715', 'Not Active', 'PM-PULSA'),
(17934, 1361, '62320', 'ORANGE TV 100.000', 'ORANGE TV', '92715', 'Not Active', 'PM-PULSA'),
(17935, 1363, '62321', 'ORANGE TV 150.000', 'ORANGE TV', '138715', 'Not Active', 'PM-PULSA'),
(17936, 1365, '62322', 'ORANGE TV 300.000', 'ORANGE TV', '276715', 'Not Active', 'PM-PULSA'),
(17932, 1357, '62318', 'ORANGE TV 50.000', 'ORANGE TV', '46715', 'Not Active', 'PM-PULSA'),
(17933, 1359, '62319', 'ORANGE TV 80.000', 'ORANGE TV', '74315', 'Not Active', 'PM-PULSA'),
(17929, 1351, '62315', 'Voucher PLN 200000', 'PLN S1', '200710', 'Active', 'PM-PULSA'),
(17930, 1353, '62316', 'Voucher PLN 500000', 'PLN S1', '500710', 'Active', 'PM-PULSA'),
(17931, 1355, '62317', 'Voucher PLN 1000000', 'PLN S1', '1000710', 'Active', 'PM-PULSA'),
(17928, 1349, '62314', 'Voucher PLN 100000', 'PLN S1', '100715', 'Active', 'PM-PULSA'),
(17926, 1345, '62312', 'Voucher PLN 20000', 'PLN S1', '20710', 'Active', 'PM-PULSA'),
(17927, 1347, '62313', 'Voucher PLN 50000', 'PLN S1', '50710', 'Active', 'PM-PULSA'),
(17925, 1343, '62311', 'Telepon Luar Negeri 20Mnt 1Hr', 'XL TELEPON LUAR NEGERI S1', '8040', 'Active', 'PM-PULSA'),
(17923, 1339, '62309', 'Telepon 300mnt ALL 90Hr', 'XL TELEPON S1', '86740', 'Active', 'PM-PULSA'),
(17924, 1341, '62310', 'Telepon Luar Negeri 80Mnt 1Hr', 'XL TELEPON LUAR NEGERI S1', '24765', 'Active', 'PM-PULSA'),
(17922, 1337, '62308', 'Telepon 500mnt ALL 90Hr', 'XL TELEPON S1', '131590', 'Active', 'PM-PULSA'),
(17920, 1333, '62306', 'Telepon 500mnt Sesama 30Hr', 'XL TELEPON S1', '35465', 'Active', 'PM-PULSA'),
(17921, 1335, '62307', 'Telepon 200mnt Sesama 14Hr', 'XL TELEPON S1', '15240', 'Active', 'PM-PULSA'),
(17919, 1331, '62305', 'Telepon 200mnt Sesama+400sms Sesama 30Hr', 'XL TELEPON S1', '35615', 'Active', 'PM-PULSA'),
(17918, 1329, '62304', 'Telepon 300mnt ALL 30Hr', 'XL TELEPON S1', '72865', 'Active', 'PM-PULSA'),
(17917, 1327, '62303', 'Telepon 350mnt Sesama+50mnt ALL 7Hr', 'XL TELEPON S1', '10840', 'Active', 'PM-PULSA'),
(17914, 1321, '62300', 'HotRod XTRA 8GB,225mnt,30hr,Rp159rb', 'XL INTERNET HOTROD EXTRA S1', '127265', 'Active', 'PM-PULSA'),
(17915, 1323, '62301', 'HotRod XTRA 10GB,250mnt,30hr,Rp179rb', 'XL INTERNET HOTROD EXTRA S1', '146165', 'Not Active', 'PM-PULSA'),
(17916, 1325, '62302', 'HotRod XTRA 16GB,300mnt,30hr,Rp239rb', 'XL INTERNET HOTROD EXTRA S1', '192265', 'Active', 'PM-PULSA'),
(17913, 1319, '62299', 'HotRod XTRA 6GB,200mnt,30hr,Rp129rb', 'XL INTERNET HOTROD EXTRA S1', '116165', 'Not Active', 'PM-PULSA'),
(17912, 1317, '62298', 'HotRod XTRA 4GB,150mnt,30hr,Rp89rb', 'XL INTERNET HOTROD EXTRA S1', '81165', 'Not Active', 'PM-PULSA'),
(17911, 1315, '62297', 'HotRod XTRA 1GB, 60mnt,30hr,Rp39rb', 'XL INTERNET HOTROD EXTRA S1', '36165', 'Not Active', 'PM-PULSA'),
(17910, 1313, '62296', 'HotRod 24Jam, 30hr, 1.5GB', 'XL INTERNET HOTROD S1', '47590', 'Active', 'PM-PULSA'),
(17909, 1311, '62295', 'HotRod 24Jam, 30hr, 16GB', 'XL INTERNET HOTROD S1', '198690', 'Active', 'PM-PULSA'),
(17908, 1309, '62294', 'HotRod 24Jam, 30hr, 12GB', 'XL INTERNET HOTROD S1', '163690', 'Active', 'PM-PULSA'),
(17907, 1307, '62293', 'HotRod 24Jam, 30hr, 8GB', 'XL INTERNET HOTROD S1', '118765', 'Active', 'PM-PULSA'),
(17906, 1305, '62292', 'HotRod 24Jam, 30hr, 6GB', 'XL INTERNET HOTROD S1', '91765', 'Active', 'PM-PULSA'),
(17903, 1299, '62289', 'COMBO XTRA 15GB+15GB ytb+60mnt 30hr', 'XL INTERNET COMBO XTRA S1', '118690', 'Active', 'PM-PULSA'),
(17905, 1303, '62291', 'HotRod 24Jam, 30hr, 3GB', 'XL INTERNET HOTROD S1', '55765', 'Active', 'PM-PULSA'),
(17904, 1301, '62290', 'HotRod 24Jam, 30hr, 800MB', 'XL INTERNET HOTROD S1', '30540', 'Active', 'PM-PULSA'),
(17901, 1295, '62287', 'COMBO XTRA 35GB+35GB ytb+60mnt, 30hr', 'XL INTERNET COMBO XTRA S1', '217490', 'Active', 'PM-PULSA'),
(17902, 1297, '62288', 'COMBO XTRA 20GB+20GB ytb+60mnt 30hr', 'XL INTERNET COMBO XTRA S1', '162990', 'Active', 'PM-PULSA'),
(17898, 1289, '62284', 'XL REGULER 30000', 'XL S1', '30215', 'Active', 'PM-PULSA'),
(17899, 1291, '62285', 'COMBO XTRA 5GB+5GB ytb+20Mnt 30Hr', 'XL INTERNET COMBO XTRA S1', '54590', 'Active', 'PM-PULSA'),
(17900, 1293, '62286', 'COMBO XTRA 10GB+10GB ytb+40mnt 30Hr', 'XL INTERNET COMBO XTRA S1', '82690', 'Active', 'PM-PULSA'),
(17896, 1285, '62282', 'XL REGULER 100000', 'XL S1', '98740', 'Active', 'PM-PULSA'),
(17897, 1287, '62283', 'XL REGULER 15000', 'XL S1', '15405', 'Active', 'PM-PULSA'),
(17893, 1279, '62279', 'XL REGULER 10000', 'XL S1', '11165', 'Active', 'PM-PULSA'),
(17895, 1283, '62281', 'XL REGULER 50000', 'XL S1', '49940', 'Active', 'PM-PULSA'),
(17894, 1281, '62280', 'XL REGULER 25000', 'XL S1', '25290', 'Active', 'PM-PULSA'),
(17892, 1277, '62278', 'XL REGULER 5000', 'XL S1', '6035', 'Active', 'PM-PULSA'),
(17891, 1275, '62277', 'TRI TRANSFER PULSA 30k + Masa Aktif', 'TRI TRANSFER PULSA S1', '30190', 'Active', 'PM-PULSA'),
(17890, 1273, '62276', 'TRI TRANSFER PULSA 50k + Masa Aktif', 'TRI TRANSFER PULSA S1', '49740', 'Not Active', 'PM-PULSA'),
(17889, 1271, '62275', 'TRI TRANSFER PULSA 100k + Masa Aktif', 'TRI TRANSFER PULSA S1', '98640', 'Active', 'PM-PULSA'),
(17888, 1269, '62274', 'TRI TRANSFER PULSA 5k + Masa Aktif', 'TRI TRANSFER PULSA S1', '5840', 'Active', 'PM-PULSA'),
(17887, 1267, '62273', 'TRI TRANSFER PULSA 10k + Masa Aktif', 'TRI TRANSFER PULSA S1', '10735', 'Not Active', 'PM-PULSA'),
(17886, 1265, '62272', 'TRI TRANSFER PULSA 20k + Masa Aktif', 'TRI TRANSFER PULSA S1', '20265', 'Active', 'PM-PULSA'),
(17885, 1263, '62271', 'TRI TRANSFER PULSA 25k + Masa Aktif', 'TRI TRANSFER PULSA S1', '25290', 'Active', 'PM-PULSA'),
(17884, 1261, '62270', 'Telepon 150menit 30Hr All Operator', 'TRI TELEPON S1', '31365', 'Active', 'PM-PULSA'),
(17883, 1259, '62269', 'Telepon 60menit 30Hr All Operator', 'TRI TELEPON S1', '16115', 'Active', 'PM-PULSA'),
(17881, 1255, '62267', 'REGULER 80MB', 'TRI DATA REGULER S1', '6415', 'Active', 'PM-PULSA'),
(17882, 1257, '62268', 'Telepon 20menit 7Hr All Operator', 'TRI TELEPON S1', '5790', 'Active', 'PM-PULSA'),
(17878, 1249, '62264', 'REGULER 1.25GB', 'TRI DATA REGULER S1', '33440', 'Active', 'PM-PULSA'),
(17879, 1251, '62265', 'REGULER 20MB', 'TRI DATA REGULER S1', '3565', 'Active', 'PM-PULSA'),
(17880, 1253, '62266', 'REGULER 300MB', 'TRI DATA REGULER S1', '11165', 'Active', 'PM-PULSA'),
(17877, 1247, '62263', 'REGULER 650MB', 'TRI DATA REGULER S1', '20940', 'Active', 'PM-PULSA'),
(17876, 1245, '62262', 'REGULER 4.25GB', 'TRI DATA REGULER S1', '81690', 'Active', 'PM-PULSA'),
(17875, 1243, '62261', 'GETMORE 2GB 60Hr', 'TRI DATA GETMORE S1', '31040', 'Active', 'PM-PULSA'),
(17874, 1241, '62260', 'GETMORE 3GB 60Hr', 'TRI DATA GETMORE S1', '38990', 'Active', 'PM-PULSA'),
(17873, 1239, '62259', 'GETMORE 5GB 60Hr', 'TRI DATA GETMORE S1', '54190', 'Active', 'PM-PULSA'),
(17872, 1237, '62258', 'CINTA 6GB 90Hr + 3GB 4G + 19GB Weekend + 20GB Malam 30Hr', 'TRI DATA CINTA S1', '75890', 'Active', 'PM-PULSA'),
(17871, 1235, '62257', 'CINTA 10GB 90Hr + 5GB 4G + 30GB Weekend + 20GB Malam 30Hr', 'TRI DATA CINTA S1', '103190', 'Active', 'PM-PULSA'),
(17870, 1233, '62256', 'BM 500MB + 500MB Malam 30Hr', 'TRI DATA BM S1', '16890', 'Active', 'PM-PULSA'),
(17869, 1231, '62255', 'BM 1GB + 500MB Malam 30Hr', 'TRI DATA BM S1', '26890', 'Active', 'PM-PULSA'),
(17868, 1229, '62254', 'KUOTA 10 GB 30hr', 'TRI DATA S1', '123465', 'Active', 'PM-PULSA'),
(17867, 1227, '62253', 'KUOTA 6 GB 30hr', 'TRI DATA S1', '76240', 'Active', 'PM-PULSA'),
(17866, 1225, '62252', 'KUOTA 4 GB 30hr', 'TRI DATA S1', '50765', 'Active', 'PM-PULSA'),
(17865, 1223, '62251', 'KUOTA 3 GB 30hr', 'TRI DATA S1', '47990', 'Active', 'PM-PULSA'),
(17864, 1221, '62250', 'KUOTA 2 GB 30hr', 'TRI DATA S1', '33240', 'Active', 'PM-PULSA'),
(17861, 1215, '62247', 'KUOTA 5 GB 30hr', 'TRI DATA S1', '68240', 'Active', 'PM-PULSA'),
(17863, 1219, '62249', 'KUOTA 1 GB 30hr', 'TRI DATA S1', '21315', 'Active', 'PM-PULSA'),
(17862, 1217, '62248', 'KUOTA 8 GB 30hr', 'TRI DATA S1', '101965', 'Active', 'PM-PULSA'),
(17859, 1211, '62245', 'THREE 150000', 'TRI S1', '148190', 'Active', 'PM-PULSA'),
(17860, 1213, '62246', 'THREE 25000', 'TRI S1', '24915', 'Active', 'PM-PULSA'),
(17857, 1207, '62243', 'THREE 75000', 'TRI S1', '74478', 'Active', 'PM-PULSA'),
(17858, 1209, '62244', 'THREE 100000', 'TRI S1', '98265', 'Active', 'PM-PULSA'),
(17856, 1205, '62242', 'THREE 50000', 'TRI S1', '49515', 'Active', 'PM-PULSA'),
(17855, 1203, '62241', 'THREE 40000', 'TRI S1', '39990', 'Active', 'PM-PULSA'),
(17854, 1201, '62240', 'THREE 30000', 'TRI S1', '29865', 'Active', 'PM-PULSA'),
(17852, 1197, '62238', 'THREE 10000', 'TRI S1', '10688', 'Active', 'PM-PULSA'),
(17853, 1199, '62239', 'THREE 20000', 'TRI S1', '20085', 'Active', 'PM-PULSA'),
(17851, 1195, '62237', 'THREE 9000', 'TRI S1', '9901', 'Active', 'PM-PULSA'),
(17849, 1191, '62235', 'THREE 7000', 'TRI S1', '7936', 'Active', 'PM-PULSA'),
(17850, 1193, '62236', 'THREE 8000', 'TRI S1', '8918', 'Active', 'PM-PULSA'),
(17848, 1189, '62234', 'THREE 6000', 'TRI S1', '6953', 'Active', 'PM-PULSA'),
(17846, 1185, '62232', 'THREE 4000', 'TRI S1', '4871', 'Active', 'PM-PULSA'),
(17847, 1187, '62233', 'THREE 5000', 'TRI S1', '5833', 'Active', 'PM-PULSA'),
(17844, 1181, '62230', 'THREE 2000', 'TRI S1', '2731', 'Active', 'PM-PULSA'),
(17845, 1183, '62231', 'THREE 3000', 'TRI S1', '3704', 'Active', 'PM-PULSA'),
(17843, 1179, '62229', 'THREE 1000', 'TRI S1', '1733', 'Active', 'PM-PULSA'),
(17842, 1177, '62228', 'TSEL TRANSFER PULSA 5000', 'TELKOMSEL TRANSFER PULSA S1', '6990', 'Active', 'PM-PULSA'),
(17839, 1171, '62225', 'TSEL TRANSFER PULSA 25000', 'TELKOMSEL TRANSFER PULSA S1', '26185', 'Active', 'PM-PULSA'),
(17840, 1173, '62226', 'TSEL TRANSFER PULSA 50000', 'TELKOMSEL TRANSFER PULSA S1', '49820', 'Active', 'PM-PULSA'),
(17841, 1175, '62227', 'TSEL TRANSFER PULSA 100000', 'TELKOMSEL TRANSFER PULSA S1', '96290', 'Active', 'PM-PULSA'),
(17838, 1169, '62224', 'TSEL TRANSFER PULSA 20000', 'TELKOMSEL TRANSFER PULSA S1', '21440', 'Active', 'PM-PULSA'),
(17837, 1167, '62223', 'TSEL TRANSFER PULSA 10000', 'TELKOMSEL TRANSFER PULSA S1', '11740', 'Active', 'PM-PULSA'),
(17831, 1155, '62217', 'Telepon Sesama Tsel 85menit + ALL 15menit (1Hr)', 'TELKOMSEL TELEPON S1', '6090', 'Active', 'PM-PULSA'),
(17832, 1157, '62218', 'Telepon Sesama Tsel 370menit + ALL 30menit (3Hr)', 'TELKOMSEL TELEPON S1', '14840', 'Active', 'PM-PULSA'),
(17833, 1159, '62219', 'Telepon Sesama Tsel 185menit + ALL 15menit (1Hr)', 'TELKOMSEL TELEPON S1', '8840', 'Active', 'PM-PULSA'),
(17834, 1161, '62220', 'Telepon Sesama Tsel 550menit + ALL 50menit (7Hr)', 'TELKOMSEL TELEPON S1', '25740', 'Active', 'PM-PULSA'),
(17835, 1163, '62221', 'Telepon Sesama Tsel 6250menit + ALL 250menit (30Hr)', 'TELKOMSEL TELEPON S1', '120540', 'Active', 'PM-PULSA'),
(17836, 1165, '62222', 'Telepon Sesama Tsel 2000menit + ALL 100menit (30Hr)', 'TELKOMSEL TELEPON S1', '70340', 'Active', 'PM-PULSA'),
(17830, 1153, '62216', 'Telepon Sesama Tsel 170menit + ALL 30menit (3Hr)', 'TELKOMSEL TELEPON S1', '11065', 'Active', 'PM-PULSA'),
(17827, 1147, '62213', 'Telepon Sesama Tsel 2250menit + ALL 250menit (30Hr)', 'TELKOMSEL TELEPON S1', '100065', 'Active', 'PM-PULSA'),
(17828, 1149, '62214', 'Telepon Sesama Tsel 350menit + ALL 50menit (7Hr)', 'TELKOMSEL TELEPON S1', '25990', 'Active', 'PM-PULSA'),
(17829, 1151, '62215', 'Telepon Sesama Tsel 350menit + ALL 50menit (7Hr)', 'TELKOMSEL TELEPON S1', '20765', 'Active', 'PM-PULSA'),
(17826, 1145, '62212', 'Telepon Sesama Tsel 1000menit + ALL 100menit (30Hr)', 'TELKOMSEL TELEPON S1', '53765', 'Active', 'PM-PULSA'),
(17825, 1143, '62211', '1000 SMS ke semua 5 hari', 'TELKOMSEL SMS S1', '5387', 'Active', 'PM-PULSA'),
(17824, 1141, '62210', '200 SMS ke semua 1 hari', 'TELKOMSEL SMS S1', '1564', 'Active', 'PM-PULSA'),
(17823, 1139, '62209', 'BULK 2GB + 2GB VideoMax 30hr', 'TELKOMSEL DATA BULK S1', '39040', 'Active', 'PM-PULSA'),
(17822, 1137, '62208', 'BULK 12GB + 2GB VideoMax 30hr', 'TELKOMSEL DATA BULK S1', '102240', 'Active', 'PM-PULSA'),
(17821, 1135, '62207', 'BULK 25GB + 2GB VideoMax 30hr', 'TELKOMSEL DATA BULK S1', '168540', 'Active', 'PM-PULSA'),
(17820, 1133, '62206', 'BULK 50GB + 2GB VideoMax 30hr', 'TELKOMSEL DATA BULK S1', '194290', 'Active', 'PM-PULSA'),
(17819, 1131, '62205', 'BULK 4.5GB + 2GB VideoMax 30hr', 'TELKOMSEL DATA BULK S1', '65290', 'Active', 'PM-PULSA'),
(17818, 1129, '62204', 'BULK 8GB + 2GB VideoMax 30hr', 'TELKOMSEL DATA BULK S1', '88390', 'Active', 'PM-PULSA'),
(17817, 1127, '62203', 'AS 8GB + 2GB VideoMax 30Hr', 'TELKOMSEL DATA AS S1', '89340', 'Active', 'PM-PULSA'),
(17816, 1125, '62202', 'AS 15GB + 2GB VideoMax 30Hr', 'TELKOMSEL DATA AS S1', '116715', 'Active', 'PM-PULSA'),
(17815, 1123, '62201', 'AS 30GB + 2GB VideoMax 30Hr', 'TELKOMSEL DATA AS S1', '179065', 'Active', 'PM-PULSA'),
(17814, 1121, '62200', 'AS 1GB 7Hr', 'TELKOMSEL DATA AS S1', '30790', 'Active', 'PM-PULSA'),
(17813, 1119, '62199', 'AS 2GB 7Hr', 'TELKOMSEL DATA AS S1', '37940', 'Active', 'PM-PULSA'),
(17812, 1117, '62198', 'AS 2GB + 2GB VideoMax + (100Menit & 100SMS) 30Hr', 'TELKOMSEL DATA AS S1', '67540', 'Active', 'PM-PULSA'),
(17811, 1115, '62197', 'AS 3GB + 2GB VideoMax 30Hr', 'TELKOMSEL DATA AS S1', '62089', 'Active', 'PM-PULSA'),
(17810, 1113, '62196', 'AS 7GB + 2GB VideoMax 30Hr', 'TELKOMSEL DATA AS S1', '176990', 'Not Active', 'PM-PULSA'),
(17809, 1111, '62195', 'AS 1GB + 2GB VIDEOMAX 30Hr', 'TELKOMSEL DATA AS S1', '42915', 'Active', 'PM-PULSA'),
(17806, 1105, '62192', '800MB-1.5GB (+2GB VideoMax) 30hr', 'TELKOMSEL DATA S1', '49665', 'Active', 'PM-PULSA'),
(17807, 1107, '62193', '2.5GB-4.5GB (+2GB VideoMax) 30hr', 'TELKOMSEL DATA S1', '97565', 'Active', 'PM-PULSA'),
(17808, 1109, '62194', '270MB-750MB 30hr', 'TELKOMSEL DATA S1', '25265', 'Active', 'PM-PULSA'),
(17804, 1101, '62190', '50MB-110MB 7hr', 'TELKOMSEL DATA S1', '10840', 'Active', 'PM-PULSA'),
(17805, 1103, '62191', '200MB-420MB 7hr', 'TELKOMSEL DATA S1', '20490', 'Active', 'PM-PULSA'),
(17803, 1099, '62189', '20MB-40MB 7hr', 'TELKOMSEL DATA S1', '6190', 'Active', 'PM-PULSA'),
(17801, 1095, '62187', 'TELKOMSEL 300000', 'TELKOMSEL S1', '292565', 'Active', 'PM-PULSA'),
(17802, 1097, '62188', 'TELKOMSEL 1000', 'TELKOMSEL S1', '2355', 'Active', 'PM-PULSA'),
(17798, 1089, '62184', 'TELKOMSEL 100000', 'TELKOMSEL S1', '98165', 'Active', 'PM-PULSA'),
(17799, 1091, '62185', 'TELKOMSEL 200000', 'TELKOMSEL S1', '197990', 'Active', 'PM-PULSA'),
(17800, 1093, '62186', 'TELKOMSEL 150000', 'TELKOMSEL S1', '148425', 'Active', 'PM-PULSA'),
(17797, 1087, '62183', 'TELKOMSEL 50000', 'TELKOMSEL S1', '49865', 'Active', 'PM-PULSA'),
(17795, 1083, '62181', 'TELKOMSEL 20000', 'TELKOMSEL S1', '20440', 'Active', 'PM-PULSA'),
(17796, 1085, '62182', 'TELKOMSEL 25000', 'TELKOMSEL S1', '25240', 'Active', 'PM-PULSA'),
(17794, 1081, '62180', 'TELKOMSEL 10000', 'TELKOMSEL S1', '10645', 'Active', 'PM-PULSA'),
(17793, 1079, '62179', 'TELKOMSEL 5000', 'TELKOMSEL S1', '5760', 'Active', 'PM-PULSA'),
(17792, 1077, '62178', 'SMARTFREN KUOTA 14GB+14GB 30hr', 'SMARTFREN INTERNET S1', '200040', 'Not Active', 'PM-PULSA'),
(17791, 1075, '62177', 'SMARTFREN KUOTA 9GB+9GB 30hr', 'SMARTFREN INTERNET S1', '149840', 'Not Active', 'PM-PULSA'),
(17786, 1065, '62172', 'SMARTFREN KUOTA 1.75GB 30hr', 'SMARTFREN INTERNET S1', '50815', 'Not Active', 'PM-PULSA'),
(17790, 1073, '62176', 'SMARTFREN KUOTA 650MB 7hr', 'SMARTFREN INTERNET S1', '25890', 'Not Active', 'PM-PULSA'),
(17789, 1071, '62175', 'SMARTFREN KUOTA 3GB+3GB 30hr', 'SMARTFREN INTERNET S1', '75515', 'Not Active', 'PM-PULSA'),
(17788, 1069, '62174', 'SMARTFREN KUOTA 300MB 7hr', 'SMARTFREN INTERNET S1', '12940', 'Not Active', 'PM-PULSA'),
(17782, 1057, '62168', 'SMARTFREN VOLUME 15GB + 15GB Malam 30Hr', 'SMARTFREN DATA VOLUME S1', '90790', 'Active', 'PM-PULSA'),
(17787, 1067, '62173', 'SMARTFREN KUOTA 5GB+12GB MDS 30hr', 'SMARTFREN INTERNET S1', '100640', 'Not Active', 'PM-PULSA'),
(17785, 1063, '62171', 'SMARTFREN KUOTA 2GB+12GB MDS 30hr', 'SMARTFREN INTERNET S1', '60740', 'Not Active', 'PM-PULSA'),
(17784, 1061, '62170', 'SMARTFREN VOLUME 4GB + 4GB Malam 14Hr', 'SMARTFREN DATA VOLUME S1', '28890', 'Active', 'PM-PULSA'),
(17783, 1059, '62169', 'SMARTFREN VOLUME 8GB + 8GB Malam 30Hr', 'SMARTFREN DATA VOLUME S1', '54990', 'Active', 'PM-PULSA'),
(17779, 1051, '62165', 'SMARTFREN VOLUME 2GB + 2GB Malam 7Hr', 'SMARTFREN DATA VOLUME S1', '19740', 'Active', 'PM-PULSA'),
(17781, 1055, '62167', 'SMARTFREN VOLUME 22.5GB + 22.5GB Malam 30Hr', 'SMARTFREN DATA VOLUME S1', '143490', 'Active', 'PM-PULSA'),
(17780, 1053, '62166', 'SMARTFREN VOLUME 30GB + 30GB Malam 30Hr', 'SMARTFREN DATA VOLUME S1', '191090', 'Active', 'PM-PULSA'),
(17778, 1049, '62164', 'SMARTFREN 75000', 'SMARTFREN S1', '75215', 'Active', 'PM-PULSA'),
(17777, 1047, '62163', 'SMARTFREN 60000', 'SMARTFREN S1', '59440', 'Active', 'PM-PULSA'),
(17776, 1045, '62162', 'SMARTFREN 100000', 'SMARTFREN S1', '99390', 'Active', 'PM-PULSA'),
(17775, 1043, '62161', 'SMARTFREN 50000', 'SMARTFREN S1', '49540', 'Active', 'PM-PULSA'),
(17774, 1041, '62160', 'SMARTFREN 30000', 'SMARTFREN S1', '30215', 'Active', 'PM-PULSA'),
(17773, 1039, '62159', 'SMARTFREN 25000', 'SMARTFREN S1', '25190', 'Active', 'PM-PULSA'),
(17772, 1037, '62158', 'SMARTFREN 20000', 'SMARTFREN S1', '20315', 'Active', 'PM-PULSA'),
(17771, 1035, '62157', 'SMARTFREN 10000', 'SMARTFREN S1', '10465', 'Active', 'PM-PULSA'),
(17770, 1033, '62156', 'SMARTFREN 5000', 'SMARTFREN S1', '5540', 'Active', 'PM-PULSA'),
(17769, 1031, '62155', 'SALDO OVO 10000', 'OVO S1', '11540', 'Not Active', 'PM-PULSA'),
(17767, 1027, '62153', 'SALDO OVO 50000', 'OVO S1', '51390', 'Active', 'PM-PULSA'),
(17768, 1029, '62154', 'SALDO OVO 25000', 'OVO S1', '26490', 'Active', 'PM-PULSA'),
(17766, 1025, '62152', 'SALDO OVO 100000', 'OVO S1', '101390', 'Active', 'PM-PULSA'),
(17764, 1021, '62150', 'SALDO OVO 300000', 'OVO S1', '301790', 'Active', 'PM-PULSA'),
(17765, 1023, '62151', 'SALDO OVO 200000', 'OVO S1', '201790', 'Active', 'PM-PULSA'),
(17763, 1019, '62149', 'SALDO OVO 400000', 'OVO S1', '401790', 'Active', 'PM-PULSA'),
(17762, 1017, '62148', 'SALDO OVO 500000', 'OVO S1', '501790', 'Active', 'PM-PULSA'),
(17761, 1015, '62147', 'SALDO OVO 600000', 'OVO S1', '606790', 'Active', 'PM-PULSA'),
(17760, 1013, '62146', 'SALDO OVO 700000', 'OVO S1', '706790', 'Active', 'PM-PULSA'),
(17756, 1005, '62142', 'iTunes Gift Card $100', 'iTunes Gift Card S1', '1375715', 'Active', 'PM-PULSA'),
(17757, 1007, '62143', 'SALDO OVO 1000000', 'OVO S1', '1006790', 'Active', 'PM-PULSA'),
(17758, 1009, '62144', 'SALDO OVO 900000', 'OVO S1', '906790', 'Active', 'PM-PULSA'),
(17759, 1011, '62145', 'SALDO OVO 800000', 'OVO S1', '806790', 'Active', 'PM-PULSA'),
(17754, 1001, '62140', 'iTunes Gift Card $25', 'iTunes Gift Card S1', '325715', 'Active', 'PM-PULSA'),
(17755, 1003, '62141', 'iTunes Gift Card $50', 'iTunes Gift Card S1', '655715', 'Active', 'PM-PULSA'),
(17753, 999, '62139', 'iTunes Gift Card $15', 'iTunes Gift Card S1', '195715', 'Active', 'PM-PULSA'),
(17751, 995, '62137', 'KUOTA 1GB 3hr', 'INDOSAT YELLOW S1', '3990', 'Active', 'PM-PULSA'),
(17752, 997, '62138', 'iTunes Gift Card $10', 'iTunes Gift Card S1', '145715', 'Active', 'PM-PULSA'),
(17750, 993, '62136', 'KUOTA 1GB 7hr', 'INDOSAT YELLOW S1', '9190', 'Active', 'PM-PULSA'),
(17749, 991, '62135', 'KUOTA 1GB 15hr', 'INDOSAT YELLOW S1', '12690', 'Active', 'PM-PULSA'),
(17746, 985, '62132', 'INDOSAT TRANSFER PULSA 15000', 'INDOSAT TRANSFER PULSA S1', '15765', 'Active', 'PM-PULSA'),
(17747, 987, '62133', 'INDOSAT TRANSFER PULSA 30000', 'INDOSAT TRANSFER PULSA S1', '30065', 'Active', 'PM-PULSA'),
(17748, 989, '62134', 'KUOTA 1GB 1hr', 'INDOSAT YELLOW S1', '2640', 'Active', 'PM-PULSA'),
(17742, 977, '62128', 'INDOSAT TRANSFER PULSA 25000', 'INDOSAT TRANSFER PULSA S1', '24965', 'Active', 'PM-PULSA'),
(17743, 979, '62129', 'INDOSAT TRANSFER PULSA 50000', 'INDOSAT TRANSFER PULSA S1', '49690', 'Active', 'PM-PULSA'),
(17744, 981, '62130', 'INDOSAT TRANSFER PULSA 100000', 'INDOSAT TRANSFER PULSA S1', '98940', 'Active', 'PM-PULSA'),
(17745, 983, '62131', 'INDOSAT TRANSFER PULSA 20000', 'INDOSAT TRANSFER PULSA S1', '20265', 'Active', 'PM-PULSA'),
(17740, 973, '62126', 'INDOSAT TRANSFER PULSA 5000', 'INDOSAT TRANSFER PULSA S1', '6190', 'Not Active', 'PM-PULSA'),
(17741, 975, '62127', 'INDOSAT TRANSFER PULSA 10000', 'INDOSAT TRANSFER PULSA S1', '11065', 'Active', 'PM-PULSA'),
(17739, 971, '62125', 'Telepon Sesama Isat 1000 menit, 1Hr', 'INDOSAT TELEPON S1', '3215', 'Active', 'PM-PULSA'),
(17737, 967, '62123', 'Telepon Sesama ISAT Unlimited + 60menit ALL, 30Hr', 'INDOSAT TELEPON S1', '26340', 'Active', 'PM-PULSA'),
(17738, 969, '62124', 'Telepon Sesama ISAT Unlimited + 50menit ALL, 7Hr', 'INDOSAT TELEPON S1', '15065', 'Active', 'PM-PULSA'),
(17735, 963, '62121', 'Telepon Sesama ISAT Unlimited, 30Hr', 'INDOSAT TELEPON S1', '25260', 'Active', 'PM-PULSA'),
(17736, 965, '62122', 'Telepon Sesama ISAT Unlimited + 30menit ALL, 7Hr', 'INDOSAT TELEPON S1', '13340', 'Active', 'PM-PULSA'),
(17734, 961, '62120', 'Telepon Sesama ISAT Unlimited + 250menit ALL, 30Hr', 'INDOSAT TELEPON S1', '49465', 'Active', 'PM-PULSA'),
(17733, 959, '62119', '2000 SMS sesama Isat + 500 SMS operator lain', 'INDOSAT SMS S1', '28465', 'Active', 'PM-PULSA'),
(17732, 957, '62118', '600 SMS sesama Isat + 200 SMS operator lain', 'INDOSAT SMS S1', '12390', 'Active', 'PM-PULSA'),
(17729, 951, '62115', 'KUOTA 15GB + SMS&Telp Sesama 30hr', 'INDOSAT DATA REGULER S1', '112140', 'Active', 'PM-PULSA'),
(17730, 953, '62116', 'KUOTA Unlimited + SMS&Telp Sesama 30hr', 'INDOSAT DATA REGULER S1', '153540', 'Active', 'PM-PULSA'),
(17731, 955, '62117', '300 SMS sesama Isat + 100 SMS operator lain', 'INDOSAT SMS S1', '6890', 'Active', 'PM-PULSA'),
(17725, 943, '62111', 'KUOTA 2GB 30hr', 'INDOSAT DATA REGULER S1', '32840', 'Active', 'PM-PULSA'),
(17726, 945, '62112', 'KUOTA 3GB + SMS Sesama 30hr', 'INDOSAT DATA REGULER S1', '48425', 'Active', 'PM-PULSA'),
(17727, 947, '62113', 'KUOTA 10GB + SMS&Telp Sesama 30hr', 'INDOSAT DATA REGULER S1', '88040', 'Active', 'PM-PULSA'),
(17728, 949, '62114', 'KUOTA 7GB + SMS Sesama 30hr', 'INDOSAT DATA REGULER S1', '67640', 'Active', 'PM-PULSA'),
(17722, 937, '62108', 'MINI 2GB+500MB Lokal+3.5GB Malam+500MB Apps 30Hr', 'INDOSAT DATA MINI S1', '33615', 'Active', 'PM-PULSA'),
(17723, 939, '62109', 'MINI 1GB+500MB Lokal+1GB Malam+500MB Apps 30Hr', 'INDOSAT DATA MINI S1', '16815', 'Active', 'PM-PULSA'),
(17724, 941, '62110', 'KUOTA 1GB 30hr', 'INDOSAT DATA REGULER S1', '20465', 'Active', 'PM-PULSA'),
(17721, 935, '62107', 'Freedom XXL, 12+25GB 4G, 30hr', 'INDOSAT DATA FREEDOM S1', '141390', 'Active', 'PM-PULSA'),
(17717, 927, '62103', 'EXTRA 6GB', 'INDOSAT DATA EXTRA S1', '71265', 'Active', 'PM-PULSA'),
(17718, 929, '62104', 'Freedom M, 2+3GB 4G, 30hr', 'INDOSAT DATA FREEDOM S1', '55665', 'Active', 'PM-PULSA'),
(17720, 933, '62106', 'Freedom XL, 8+12GB 4G, 30hr', 'INDOSAT DATA FREEDOM S1', '118115', 'Active', 'PM-PULSA'),
(17719, 931, '62105', 'Freedom L, 4+8GB 4G, 30hr', 'INDOSAT DATA FREEDOM S1', '82890', 'Active', 'PM-PULSA'),
(17716, 925, '62102', 'EXTRA 4GB', 'INDOSAT DATA EXTRA S1', '53140', 'Active', 'PM-PULSA'),
(17715, 923, '62101', 'EXTRA 2GB', 'INDOSAT DATA EXTRA S1', '37490', 'Active', 'PM-PULSA'),
(17714, 921, '62100', '20GB+10GB(01-06)+5GB 4G, 60Hr', 'INDOSAT BOMBER S1', '86490', 'Not Active', 'PM-PULSA'),
(17713, 919, '62099', '9GB+16GB(01-06)+5GB 4G, 60Hr', 'INDOSAT BOMBER S1', '60290', 'Not Active', 'PM-PULSA'),
(17712, 917, '62098', '3GB+18GB(01-06)+4GB 4G, 30Hr', 'INDOSAT BOMBER S1', '44140', 'Not Active', 'PM-PULSA'),
(17711, 915, '62097', 'INDOSAT 30000', 'INDOSAT S1', '30265', 'Active', 'PM-PULSA'),
(17710, 913, '62096', 'INDOSAT 20000', 'INDOSAT S1', '20480', 'Active', 'PM-PULSA'),
(17709, 911, '62095', 'INDOSAT 100000', 'INDOSAT S1', '97890', 'Active', 'PM-PULSA'),
(17708, 909, '62094', 'INDOSAT 50000', 'INDOSAT S1', '49515', 'Active', 'PM-PULSA'),
(17707, 907, '62093', 'INDOSAT 25000', 'INDOSAT S1', '25115', 'Active', 'PM-PULSA'),
(17706, 905, '62092', 'INDOSAT 10000', 'INDOSAT S1', '11440', 'Active', 'PM-PULSA'),
(17705, 903, '62091', 'INDOSAT 5000', 'INDOSAT S1', '6440', 'Active', 'PM-PULSA'),
(17703, 899, '62089', 'SALDO GRAB 20K', 'GRAB S1', '21115', 'Active', 'PM-PULSA'),
(17704, 901, '62090', 'SALDO GRAB 10K', 'GRAB S1', '11265', 'Active', 'PM-PULSA'),
(17702, 897, '62088', 'SALDO GRAB 25K', 'GRAB S1', '26115', 'Active', 'PM-PULSA'),
(17701, 895, '62087', 'SALDO GRAB 40K', 'GRAB S1', '41115', 'Active', 'PM-PULSA'),
(17700, 893, '62086', 'SALDO GRAB 50K', 'GRAB S1', '51115', 'Active', 'PM-PULSA'),
(17699, 891, '62085', 'SALDO GRAB 100K', 'GRAB S1', '101115', 'Active', 'PM-PULSA'),
(17697, 887, '62083', 'SALDO GRAB 200K', 'GRAB S1', '201265', 'Active', 'PM-PULSA'),
(17698, 889, '62084', 'SALDO GRAB 150K', 'GRAB S1', '151115', 'Active', 'PM-PULSA'),
(17696, 885, '62082', 'SALDO GRAB 300K', 'GRAB S1', '301265', 'Active', 'PM-PULSA'),
(17694, 881, '62080', 'Google Play ID 300rb', 'GOOGLE PLAY ID S1', '339690', 'Active', 'PM-PULSA'),
(17695, 883, '62081', 'SALDO GRAB 500K', 'GRAB S1', '501265', 'Active', 'PM-PULSA'),
(17692, 877, '62078', 'Google Play ID 50rb', 'GOOGLE PLAY ID S1', '58365', 'Active', 'PM-PULSA'),
(17693, 879, '62079', 'Google Play ID 500rb', 'GOOGLE PLAY ID S1', '564690', 'Active', 'PM-PULSA'),
(17691, 875, '62077', 'Google Play ID 100rb', 'GOOGLE PLAY ID S1', '115690', 'Active', 'PM-PULSA'),
(17690, 873, '62076', 'Google Play ID 150rb', 'GOOGLE PLAY ID S1', '171690', 'Active', 'PM-PULSA'),
(17689, 871, '62075', 'Google Play ID 20rb', 'GOOGLE PLAY ID S1', '23715', 'Active', 'PM-PULSA'),
(17682, 857, '62068', 'SALDO GOJEK DRIVER 150K', 'GOJEK DRIVER S1', '151840', 'Active', 'PM-PULSA'),
(17683, 859, '62069', 'SALDO GOJEK DRIVER 100K', 'GOJEK DRIVER S1', '101840', 'Active', 'PM-PULSA'),
(17688, 869, '62074', 'GOOGLE PLAY - $100', 'GOOGLE PLAY S1', '1384665', 'Not Active', 'PM-PULSA'),
(17687, 867, '62073', 'GOOGLE PLAY - $50', 'GOOGLE PLAY S1', '704715', 'Not Active', 'PM-PULSA'),
(17686, 865, '62072', 'GOOGLE PLAY - $25', 'GOOGLE PLAY S1', '360715', 'Not Active', 'PM-PULSA'),
(17685, 863, '62071', 'GOOGLE PLAY - $15', 'GOOGLE PLAY S1', '215465', 'Not Active', 'PM-PULSA'),
(17684, 861, '62070', 'GOOGLE PLAY - $10', 'GOOGLE PLAY S1', '148315', 'Not Active', 'PM-PULSA'),
(17681, 855, '62067', 'SALDO GOJEK DRIVER 200K', 'GOJEK DRIVER S1', '201840', 'Active', 'PM-PULSA'),
(17680, 853, '62066', 'SALDO GOJEK DRIVER 20K', 'GOJEK DRIVER S1', '21840', 'Active', 'PM-PULSA'),
(17679, 851, '62065', 'SALDO GOJEK DRIVER 50K', 'GOJEK DRIVER S1', '51840', 'Active', 'PM-PULSA'),
(17678, 849, '62064', 'SALDO GOJEK DRIVER 75K', 'GOJEK DRIVER S1', '76840', 'Active', 'PM-PULSA'),
(17677, 847, '62063', 'SALDO GOJEK 10K', 'GOJEK S1', '11690', 'Active', 'PM-PULSA'),
(17674, 841, '62060', 'SALDO GOJEK 25K', 'GOJEK S1', '26690', 'Active', 'PM-PULSA'),
(17675, 843, '62061', 'SALDO GOJEK 20K', 'GOJEK S1', '21690', 'Active', 'PM-PULSA'),
(17676, 845, '62062', 'SALDO GOJEK 5K', 'GOJEK S1', '6690', 'Active', 'PM-PULSA'),
(17673, 839, '62059', 'SALDO GOJEK 50K', 'GOJEK S1', '51690', 'Active', 'PM-PULSA'),
(17671, 835, '62057', 'SALDO GOJEK 150K', 'GOJEK S1', '152690', 'Active', 'PM-PULSA'),
(17672, 837, '62058', 'SALDO GOJEK 100K', 'GOJEK S1', '101740', 'Active', 'PM-PULSA'),
(17670, 833, '62056', 'SALDO GOJEK 200K', 'GOJEK S1', '202190', 'Active', 'PM-PULSA'),
(17669, 831, '62055', 'SALDO GOJEK 250K', 'GOJEK S1', '252190', 'Active', 'PM-PULSA'),
(17668, 829, '62054', 'CERIA 100000', 'CERIA S1', '97640', 'Not Active', 'PM-PULSA'),
(17667, 827, '62053', 'CERIA 50000', 'CERIA S1', '49140', 'Not Active', 'PM-PULSA'),
(17666, 825, '62052', 'CERIA 20000', 'CERIA S1', '19040', 'Not Active', 'PM-PULSA'),
(17665, 823, '62051', 'CERIA 10000', 'CERIA S1', '9840', 'Not Active', 'PM-PULSA'),
(17664, 821, '62050', 'CERIA 5000', 'CERIA S1', '5240', 'Not Active', 'PM-PULSA'),
(17663, 819, '62049', 'BOLT Kuota 17GB 30Hri', 'BOLT KUOTA S1', '194515', 'Not Active', 'PM-PULSA'),
(17662, 817, '62048', 'BOLT Kuota 13GB 30Hri', 'BOLT KUOTA S1', '145890', 'Not Active', 'PM-PULSA'),
(17661, 815, '62047', 'BOLT Kuota 8GB 30Hri', 'BOLT KUOTA S1', '97265', 'Not Active', 'PM-PULSA'),
(17659, 811, '62045', 'BOLT Kuota 1.5GB 30Hri', 'BOLT KUOTA S1', '29215', 'Not Active', 'PM-PULSA'),
(17660, 813, '62046', 'BOLT Kuota 3GB 30Hri', 'BOLT KUOTA S1', '48665', 'Not Active', 'PM-PULSA'),
(17658, 809, '62044', 'PULSA BOLT 200000', 'BOLT S1', '195240', 'Not Active', 'PM-PULSA'),
(17657, 807, '62043', 'PULSA BOLT 150000', 'BOLT S1', '146615', 'Not Active', 'PM-PULSA'),
(17654, 801, '62040', 'PULSA BOLT 25000', 'BOLT S1', '25190', 'Not Active', 'PM-PULSA'),
(17655, 803, '62041', 'PULSA BOLT 50000', 'BOLT S1', '49690', 'Not Active', 'PM-PULSA'),
(17656, 805, '62042', 'PULSA BOLT 100000', 'BOLT S1', '98015', 'Not Active', 'PM-PULSA'),
(17653, 799, '62039', 'BRONET 8GB 30Hr', 'AXIS DATA BRONET S1', '76840', 'Active', 'PM-PULSA'),
(17652, 797, '62038', 'BRONET 5GB 30Hr', 'AXIS DATA BRONET S1', '55965', 'Active', 'PM-PULSA'),
(17649, 791, '62035', 'BRONET 1GB 30Hr', 'AXIS DATA BRONET S1', '18865', 'Active', 'PM-PULSA'),
(17650, 793, '62036', 'BRONET 2GB 30Hr', 'AXIS DATA BRONET S1', '27865', 'Active', 'PM-PULSA'),
(17651, 795, '62037', 'BRONET 3GB 30Hr', 'AXIS DATA BRONET S1', '37365', 'Active', 'PM-PULSA'),
(17648, 789, '62034', 'BRONET 300MB 7Hr', 'AXIS DATA BRONET S1', '11040', 'Active', 'PM-PULSA'),
(17647, 787, '62033', 'VOUCHER AIGO MINI 1GB 5Hr', 'AXIS AIGO MINI (AKTIVASI *838*KODE#) S1', '9140', 'Active', 'PM-PULSA'),
(17646, 785, '62032', 'VOUCHER AIGO MINI 2GB 7Hr', 'AXIS AIGO MINI (AKTIVASI *838*KODE#) S1', '16340', 'Active', 'PM-PULSA'),
(17645, 783, '62031', 'VOUCHER AIGO MINI 3GB 15Hr', 'AXIS AIGO MINI (AKTIVASI *838*KODE#) S1', '20890', 'Active', 'PM-PULSA'),
(17644, 781, '62030', 'VOUCHER AIGO MINI 5GB 15Hr', 'AXIS AIGO MINI (AKTIVASI *838*KODE#) S1', '33440', 'Active', 'PM-PULSA'),
(17643, 779, '62029', 'VOUCHER AIGO 8GB 30Hr', 'AXIS AIGO (AKTIVASI *838*KODE#) S1', '58840', 'Active', 'PM-PULSA'),
(17642, 777, '62028', 'VOUCHER AIGO 2GB 30Hr', 'AXIS AIGO (AKTIVASI *838*KODE#) S1', '23490', 'Active', 'PM-PULSA'),
(17641, 775, '62027', 'VOUCHER AIGO 3GB 30Hr', 'AXIS AIGO (AKTIVASI *838*KODE#) S1', '29390', 'Active', 'PM-PULSA'),
(17640, 773, '62026', 'VOUCHER AIGO 5GB 30Hr', 'AXIS AIGO (AKTIVASI *838*KODE#) S1', '43540', 'Active', 'PM-PULSA'),
(17639, 771, '62025', 'VOUCHER AIGO 1GB 30Hr', 'AXIS AIGO (AKTIVASI *838*KODE#) S1', '13740', 'Active', 'PM-PULSA'),
(17635, 763, '62021', 'AXIS 30000', 'AXIS S1', '30215', 'Active', 'PM-PULSA'),
(17636, 765, '62022', 'AXIS 50000', 'AXIS S1', '49940', 'Active', 'PM-PULSA'),
(17637, 767, '62023', 'AXIS 100000', 'AXIS S1', '98885', 'Active', 'PM-PULSA'),
(17638, 769, '62024', 'AXIS 15000', 'AXIS S1', '15430', 'Active', 'PM-PULSA'),
(17634, 761, '62020', 'AXIS 25000', 'AXIS S1', '25290', 'Active', 'PM-PULSA'),
(17633, 759, '62019', 'AXIS 10000', 'AXIS S1', '11165', 'Active', 'PM-PULSA'),
(17631, 755, '62017', 'ZYNGA 100.000', 'ZYNGA S1', '130745', 'Active', 'PM-PULSA'),
(17632, 757, '62018', 'AXIS 5000', 'AXIS S1', '6035', 'Active', 'PM-PULSA'),
(17630, 753, '62016', 'ZYNGA 50.000', 'ZYNGA S1', '65745', 'Not Active', 'PM-PULSA'),
(17629, 751, '62015', 'ZYNGA 20.000', 'ZYNGA S1', '26745', 'Not Active', 'PM-PULSA'),
(17628, 749, '62014', 'Voucher Wavegame 1088 Coin', 'Wavegame S1', '225745', 'Active', 'PM-PULSA'),
(17627, 747, '62013', 'Voucher Wavegame 435 Coin', 'Wavegame S1', '90745', 'Active', 'PM-PULSA'),
(17626, 745, '62012', 'Voucher Wavegame 210 Coin', 'Wavegame S1', '45745', 'Active', 'PM-PULSA'),
(17625, 743, '62011', 'Voucher Wavegame 82 Coin', 'Wavegame S1', '18745', 'Active', 'PM-PULSA'),
(17624, 741, '62010', 'Voucher Wavegame 40 Coin', 'Wavegame S1', '9745', 'Active', 'PM-PULSA'),
(17623, 739, '62009', 'Winner Card 160.000 GP', 'Winner Card S1', '214045', 'Active', 'PM-PULSA'),
(17622, 737, '62008', 'Winner Card 80.000 GP', 'Winner Card S1', '107895', 'Active', 'PM-PULSA'),
(17621, 735, '62007', 'Winner Card 40.000 GP', 'Winner Card S1', '54370', 'Active', 'PM-PULSA'),
(17620, 733, '62006', 'Winner Card 24.000 GP', 'Winner Card S1', '32995', 'Active', 'PM-PULSA'),
(17619, 731, '62005', 'Winner Card 16.000 GP', 'Winner Card S1', '22245', 'Active', 'PM-PULSA'),
(17618, 729, '62004', 'Winner Card 8.000 GP', 'Winner Card S1', '11645', 'Active', 'PM-PULSA'),
(17617, 727, '62003', 'Winner Card 4.000 GP', 'Winner Card S1', '6145', 'Active', 'PM-PULSA'),
(17616, 725, '62002', 'Viwawa Voucher 60.000', 'Viwawa S1', '54745', 'Active', 'PM-PULSA'),
(17615, 723, '62001', 'Viwawa Voucher 30.000', 'Viwawa S1', '27745', 'Active', 'PM-PULSA'),
(17614, 721, '62000', 'Viwawa Voucher 15.000', 'Viwawa S1', '14245', 'Active', 'PM-PULSA'),
(17612, 717, '61998', 'VTC Online 100 Vcoin', 'VTC Online S1', '45745', 'Active', 'PM-PULSA'),
(17613, 719, '61999', 'VTC Online 200 Vcoin', 'VTC Online S1', '90745', 'Active', 'PM-PULSA'),
(17611, 715, '61997', 'VTC Online 60 Vcoin', 'VTC Online S1', '27745', 'Active', 'PM-PULSA'),
(17610, 713, '61996', 'VTC Online 40 Vcoin', 'VTC Online S1', '18745', 'Active', 'PM-PULSA'),
(17606, 705, '61992', 'UNIPIN VOUCHER 20000', 'UNIPIN S1', '19895', 'Active', 'PM-PULSA'),
(17607, 707, '61993', 'UNIPIN VOUCHER 10000', 'UNIPIN S1', '10295', 'Active', 'PM-PULSA'),
(17608, 709, '61994', 'VTC Online 5 Vcoin', 'VTC Online S1', '5245', 'Active', 'PM-PULSA'),
(17609, 711, '61995', 'VTC Online 20 Vcoin', 'VTC Online S1', '9745', 'Active', 'PM-PULSA'),
(17605, 703, '61991', 'UNIPIN VOUCHER 50000', 'UNIPIN S1', '48795', 'Active', 'PM-PULSA'),
(17603, 699, '61989', 'UNIPIN VOUCHER 300000', 'UNIPIN S1', '287595', 'Active', 'PM-PULSA'),
(17604, 701, '61990', 'UNIPIN VOUCHER 100000', 'UNIPIN S1', '96795', 'Active', 'PM-PULSA'),
(17602, 697, '61988', 'UNIPIN VOUCHER 500000', 'UNIPIN S1', '479595', 'Active', 'PM-PULSA'),
(17601, 695, '61987', 'Ultimate Game Card 2.000 Points', 'PLAYSPAN S1', '239745', 'Active', 'PM-PULSA'),
(17600, 693, '61986', 'Ultimate Game Card 1.000 Points', 'PLAYSPAN S1', '123245', 'Active', 'PM-PULSA'),
(17599, 691, '61985', 'Ultimate Game Card 500 Points', 'PLAYSPAN S1', '61945', 'Active', 'PM-PULSA'),
(17598, 689, '61984', 'Ultimate Game Card 250 Points', 'PLAYSPAN S1', '25745', 'Active', 'PM-PULSA'),
(17597, 687, '61983', 'Travian Voucher 265.000', 'Travian S1', '351745', 'Active', 'PM-PULSA'),
(17596, 685, '61982', 'Travian Voucher 137.500', 'Travian S1', '182745', 'Active', 'PM-PULSA'),
(17593, 679, '61979', 'STEAM - 400000', 'STEAM S1', '477745', 'Active', 'PM-PULSA'),
(17594, 681, '61980', 'Travian Voucher 27.000', 'Travian S1', '35745', 'Active', 'PM-PULSA'),
(17595, 683, '61981', 'Travian Voucher 63.500', 'Travian S1', '85245', 'Active', 'PM-PULSA'),
(17592, 677, '61978', 'STEAM - 600000', 'STEAM S1', '718745', 'Active', 'PM-PULSA'),
(17591, 675, '61977', 'STEAM - 250000', 'STEAM S1', '294295', 'Active', 'PM-PULSA'),
(17590, 673, '61976', 'STEAM - 120000', 'STEAM S1', '144245', 'Active', 'PM-PULSA'),
(17589, 671, '61975', 'STEAM - 90000', 'STEAM S1', '102245', 'Not Active', 'PM-PULSA'),
(17588, 669, '61974', 'STEAM - 60000', 'STEAM S1', '72985', 'Active', 'PM-PULSA'),
(17587, 667, '61973', 'STEAM - 45000', 'STEAM S1', '54245', 'Active', 'PM-PULSA'),
(17586, 665, '61972', 'STEAM - 12000', 'STEAM S1', '15420', 'Active', 'PM-PULSA'),
(17585, 663, '61971', 'Serenity Voucher 30000 Koin', 'Serenity S1', '91745', 'Active', 'PM-PULSA'),
(17584, 661, '61970', 'Serenity Voucher 15000 Koin', 'Serenity S1', '46245', 'Active', 'PM-PULSA'),
(17583, 659, '61969', 'Serenity Voucher 8000 Koin', 'Serenity S1', '28045', 'Active', 'PM-PULSA'),
(17582, 657, '61968', 'Serenity Voucher 2500 Koin', 'Serenity S1', '9845', 'Active', 'PM-PULSA'),
(17581, 655, '61967', 'Spin voucher 100000', 'Spin S1', '109545', 'Active', 'PM-PULSA'),
(17579, 651, '61965', 'Spin voucher 30000', 'Spin S1', '33495', 'Active', 'PM-PULSA'),
(17580, 653, '61966', 'Spin voucher 50000', 'Spin S1', '55195', 'Active', 'PM-PULSA'),
(17578, 649, '61964', 'Spin voucher 20000', 'Spin S1', '22595', 'Active', 'PM-PULSA'),
(17577, 647, '61963', 'Spin voucher 10000', 'Spin S1', '11645', 'Active', 'PM-PULSA'),
(17576, 645, '61962', 'Spin voucher 2500', 'Spin S1', '3495', 'Active', 'PM-PULSA'),
(17575, 643, '61961', 'Game Softnyx Voucher 100000', 'Softnyx S1', '90745', 'Active', 'PM-PULSA'),
(17574, 641, '61960', 'Game Softnyx Voucher 50000', 'Softnyx S1', '45745', 'Active', 'PM-PULSA'),
(17573, 639, '61959', 'Game Softnyx Voucher 20000', 'Softnyx S1', '18745', 'Active', 'PM-PULSA'),
(17572, 637, '61958', 'Playnexia 200.000', 'Playnexia S1', '180745', 'Active', 'PM-PULSA'),
(17570, 633, '61956', 'Playnexia 50.000', 'Playnexia S1', '45745', 'Active', 'PM-PULSA'),
(17571, 635, '61957', 'Playnexia 100.000', 'Playnexia S1', '90745', 'Active', 'PM-PULSA'),
(17567, 627, '61953', 'PUBG MOBILE 50 UC', 'PUBG S1', '12845', 'Not Active', 'PM-PULSA'),
(17568, 629, '61954', 'Game facebook - Pico World Voucher 100.000', 'Game facebook - Pico World S1', '90745', 'Active', 'PM-PULSA'),
(17569, 631, '61955', 'Playnexia 25.000', 'Playnexia S1', '23245', 'Active', 'PM-PULSA'),
(17565, 623, '61951', 'PUBG MOBILE 500 UC', 'PUBG S1', '102845', 'Not Active', 'PM-PULSA'),
(17566, 625, '61952', 'PUBG MOBILE 250 UC', 'PUBG S1', '52845', 'Not Active', 'PM-PULSA'),
(17561, 615, '61947', 'Game facebook - Pool Live Tour Voucher 100.000', 'Game facebook - Pool Live Tour S1', '90745', 'Active', 'PM-PULSA'),
(17562, 617, '61948', 'PUBG MOBILE 5000 UC', 'PUBG S1', '1002845', 'Not Active', 'PM-PULSA'),
(17563, 619, '61949', 'PUBG MOBILE 2500 UC', 'PUBG S1', '502845', 'Not Active', 'PM-PULSA'),
(17564, 621, '61950', 'PUBG MOBILE 1250 UC', 'PUBG S1', '252845', 'Not Active', 'PM-PULSA'),
(17560, 613, '61946', 'Game facebook - Joombi Voucher 50.000', 'Game facebook - Joombi S1', '45745', 'Active', 'PM-PULSA'),
(17557, 607, '61943', 'Game Facebook Boyaa Poker Voucher 20.000', 'Game facebook - Boyaa Poker S1', '18745', 'Active', 'PM-PULSA'),
(17559, 611, '61945', 'Game facebook - Pico World Voucher 50.000', 'Game facebook - Pico World S1', '45745', 'Active', 'PM-PULSA'),
(17558, 609, '61944', 'Game facebook - Pool Live Tour Voucher 50.000', 'Game facebook - Pool Live Tour S1', '45745', 'Active', 'PM-PULSA'),
(17554, 601, '61940', 'Game facebook - Pool Live Tour Voucher 20.000', 'Game facebook - Pool Live Tour S1', '18745', 'Active', 'PM-PULSA'),
(17556, 605, '61942', 'Game Facebook - Joombi Voucher 20.000', 'Game facebook - Joombi S1', '18745', 'Active', 'PM-PULSA'),
(17555, 603, '61941', 'Game Facebook Pico World Voucher 20.000', 'Game facebook - Pico World S1', '18745', 'Active', 'PM-PULSA'),
(17553, 599, '61939', 'Voucher Playpoint 260000', 'Playpoint S1', '90745', 'Active', 'PM-PULSA'),
(17552, 597, '61938', 'Voucher Playpoint 130000', 'Playpoint S1', '45745', 'Active', 'PM-PULSA'),
(17551, 595, '61937', 'Voucher Playpoint 78000', 'Playpoint S1', '27745', 'Active', 'PM-PULSA'),
(17550, 593, '61936', 'Voucher Playpoint 26000', 'Playpoint S1', '9745', 'Not Active', 'PM-PULSA'),
(17546, 585, '61932', 'Playcircle Voucher 100.000', 'Playcircle S1', '90745', 'Active', 'PM-PULSA'),
(17543, 579, '61929', 'Playcircle Voucher 10.000', 'Playcircle S1', '9745', 'Active', 'PM-PULSA'),
(17549, 591, '61935', 'Playfish Coupon 100.000', 'Playfish S1', '90745', 'Active', 'PM-PULSA'),
(17548, 589, '61934', 'Playfish Coupon 50.000', 'Playfish S1', '45745', 'Active', 'PM-PULSA'),
(17547, 587, '61933', 'Playfish Coupon 20.000', 'Playfish S1', '18745', 'Active', 'PM-PULSA'),
(17545, 583, '61931', 'Playcircle Voucher 50.000', 'Playcircle S1', '45745', 'Active', 'PM-PULSA'),
(17544, 581, '61930', 'Playcircle Voucher 30.000', 'Playcircle S1', '27745', 'Active', 'PM-PULSA'),
(17542, 577, '61928', 'MyCard 1000 Points', 'MyCard S1', '464065', 'Active', 'PM-PULSA'),
(17541, 575, '61927', 'MyCard 450 Points', 'MyCard S1', '210955', 'Active', 'PM-PULSA'),
(17537, 567, '61923', 'Metin 2 Voucher 545.000', 'Metin 2 S1', '491245', 'Active', 'PM-PULSA'),
(17540, 573, '61926', 'MyCard 350 Points', 'MyCard S1', '163765', 'Active', 'PM-PULSA'),
(17539, 571, '61925', 'MyCard 150 Points', 'MyCard S1', '73675', 'Active', 'PM-PULSA'),
(17538, 569, '61924', 'MyCard 50 Points', 'MyCard S1', '25198', 'Active', 'PM-PULSA'),
(17535, 563, '61921', 'Metin 2 Voucher 120.000', 'Metin 2 S1', '108745', 'Active', 'PM-PULSA'),
(17536, 565, '61922', 'Metin 2 Voucher 285.000', 'Metin 2 S1', '257245', 'Active', 'PM-PULSA'),
(17531, 555, '61917', '500 MOL Point', 'MOLPoints S1', '52995', 'Active', 'PM-PULSA'),
(17532, 557, '61918', '1000 MOL Point', 'MOLPoints S1', '105245', 'Active', 'PM-PULSA'),
(17533, 559, '61919', '2000 MOL Point', 'MOLPoints S1', '209745', 'Active', 'PM-PULSA'),
(17534, 561, '61920', 'Metin 2 Voucher 60.000', 'Metin 2 S1', '54745', 'Active', 'PM-PULSA'),
(17530, 553, '61916', '200 MOL Point', 'MOLPoints S1', '21645', 'Active', 'PM-PULSA'),
(17529, 551, '61915', '100 MOL Point', 'MOLPoints S1', '11195', 'Active', 'PM-PULSA'),
(17528, 549, '61914', 'MOGPLAY 500.000', 'MOGPLAY S1', '450745', 'Active', 'PM-PULSA'),
(17527, 547, '61913', 'MOGPLAY 200.000', 'MOGPLAY S1', '180745', 'Active', 'PM-PULSA'),
(17526, 545, '61912', 'MOGPLAY 100.000', 'MOGPLAY S1', '90745', 'Active', 'PM-PULSA'),
(17525, 543, '61911', 'MOGPLAY 50.000', 'MOGPLAY S1', '45745', 'Active', 'PM-PULSA'),
(17524, 541, '61910', 'MOGPLAY 20.000', 'MOGPLAY S1', '18745', 'Active', 'PM-PULSA'),
(17523, 539, '61909', 'Voucher Megaxus 500.000', 'Megaxus S1', '539770', 'Active', 'PM-PULSA'),
(17522, 537, '61908', 'Voucher Megaxus 200.000', 'Megaxus S1', '216370', 'Active', 'PM-PULSA'),
(17521, 535, '61907', 'Voucher Megaxus 100.000', 'Megaxus S1', '108570', 'Active', 'PM-PULSA'),
(17520, 533, '61906', 'Voucher Megaxus 50.000', 'Megaxus S1', '54670', 'Active', 'PM-PULSA'),
(17518, 529, '61904', 'Voucher Megaxus 10.000', 'Megaxus S1', '11550', 'Active', 'PM-PULSA'),
(17519, 531, '61905', 'Voucher Megaxus 20.000', 'Megaxus S1', '22330', 'Active', 'PM-PULSA'),
(17517, 527, '61903', 'MOGCAZ - 200000', 'MOGCAZ S1', '200745', 'Active', 'PM-PULSA'),
(17516, 525, '61902', 'MOGCAZ - 100000', 'MOGCAZ S1', '100745', 'Active', 'PM-PULSA'),
(17513, 519, '61899', 'Mobius - Voucher 100', 'Mobius S1', '90745', 'Active', 'PM-PULSA'),
(17515, 523, '61901', 'MOGCAZ - 50000', 'MOGCAZ S1', '50745', 'Active', 'PM-PULSA'),
(17514, 521, '61900', 'Mobius - Voucher 200', 'Mobius S1', '180745', 'Active', 'PM-PULSA'),
(17512, 517, '61898', 'Mobius - Voucher 50', 'Mobius S1', '45745', 'Active', 'PM-PULSA'),
(17511, 515, '61897', 'Mobius - Voucher 30', 'Mobius S1', '27745', 'Active', 'PM-PULSA'),
(17510, 513, '61896', 'Mobius - Voucher 10', 'Mobius S1', '9745', 'Active', 'PM-PULSA'),
(17509, 511, '61895', 'Voucher Mainkan.com 100.000 I-poin', 'Mainkan.com S1', '106245', 'Active', 'PM-PULSA'),
(17508, 509, '61894', 'Voucher Mainkan.com 50.000 I-poin', 'Mainkan.com S1', '53545', 'Active', 'PM-PULSA'),
(17507, 507, '61893', 'Voucher Mainkan.com 25.000 I-poin', 'Mainkan.com S1', '27220', 'Active', 'PM-PULSA'),
(17506, 505, '61892', 'Voucher Mainkan.com 10.000 I-poin', 'Mainkan.com S1', '11445', 'Active', 'PM-PULSA'),
(17504, 501, '61890', 'KOIN LYTO Voucher 500', 'LYTO S1', '485745', 'Active', 'PM-PULSA'),
(17505, 503, '61891', 'Voucher Mainkan.com 5.000 I-poin', 'Mainkan.com S1', '6070', 'Active', 'PM-PULSA'),
(17502, 497, '61888', '20000 KOIN LYTO', 'LYTO S1', '63795', 'Active', 'PM-PULSA'),
(17503, 499, '61889', '57000 KOIN LYTO', 'LYTO S1', '170495', 'Active', 'PM-PULSA'),
(17501, 495, '61887', '10000 KOIN LYTO', 'LYTO S1', '34695', 'Active', 'PM-PULSA'),
(17499, 491, '61885', '2500 KOIN LYTO', 'LYTO S1', '10445', 'Active', 'PM-PULSA'),
(17500, 493, '61886', '5500 KOIN LYTO', 'LYTO S1', '20145', 'Active', 'PM-PULSA'),
(17498, 489, '61884', 'kiwi card Online Voucher 300.000', 'kiwi card S1', '279745', 'Active', 'PM-PULSA'),
(17497, 487, '61883', 'kiwi card Online Voucher 200.000', 'kiwi card S1', '186745', 'Active', 'PM-PULSA'),
(17496, 485, '61882', 'kiwi card Online Voucher 100.000', 'kiwi card S1', '93745', 'Active', 'PM-PULSA'),
(17495, 483, '61881', 'kiwi card Online Voucher 50.000', 'kiwi card S1', '47245', 'Active', 'PM-PULSA'),
(17493, 479, '61879', 'kiwi card Online Voucher 20.000', 'kiwi card S1', '19345', 'Active', 'PM-PULSA'),
(17494, 481, '61880', 'kiwi card Online Voucher 30.000', 'kiwi card S1', '28645', 'Active', 'PM-PULSA'),
(17492, 477, '61878', 'kiwi card Online Voucher 10.000', 'kiwi card S1', '10045', 'Active', 'PM-PULSA'),
(17490, 473, '61876', 'Koram Game Voucher 500000', 'Koram S1', '524745', 'Active', 'PM-PULSA'),
(17491, 475, '61877', 'Koram Game Voucher 1000000', 'Koram S1', '1047745', 'Active', 'PM-PULSA'),
(17489, 471, '61875', 'Koram Game Voucher 200000', 'Koram S1', '211045', 'Active', 'PM-PULSA'),
(17488, 469, '61874', 'Koram Game Voucher 100000', 'Koram S1', '106245', 'Active', 'PM-PULSA'),
(17487, 467, '61873', 'Koram Game Voucher 50000', 'Koram S1', '53545', 'Active', 'PM-PULSA'),
(17485, 463, '61871', 'Game facebook - Joombi Voucher 100.000', 'Game facebook - Joombi S1', '90745', 'Active', 'PM-PULSA'),
(17486, 465, '61872', 'Koram Game Voucher 10000', 'Koram S1', '11445', 'Active', 'PM-PULSA'),
(17484, 461, '61870', 'Playstation Store Prepaid Card v400', 'Playstation Store Prepaid Card S1', '570745', 'Active', 'PM-PULSA'),
(17483, 459, '61869', 'Playstation Store Prepaid Card v200', 'Playstation Store Prepaid Card S1', '285745', 'Active', 'PM-PULSA'),
(17480, 453, '61866', 'Gameweb Voucher 50.000', 'Gameweb S1', '46745', 'Active', 'PM-PULSA'),
(17481, 455, '61867', 'Gameweb Voucher 100.000', 'Gameweb S1', '92745', 'Active', 'PM-PULSA'),
(17482, 457, '61868', 'Playstation Store Prepaid Card v100', 'Playstation Store Prepaid Card S1', '143245', 'Active', 'PM-PULSA'),
(17479, 451, '61865', 'Gameweb Voucher 20.000', 'Gameweb S1', '19145', 'Active', 'PM-PULSA'),
(17477, 447, '61863', 'Gamewave Voucher 3000 V-Cash', 'Gamewave S1', '900745', 'Active', 'PM-PULSA'),
(17478, 449, '61864', 'Gameweb Voucher 10.000', 'Gameweb S1', '9945', 'Not Active', 'PM-PULSA'),
(17476, 445, '61862', 'Gamewave Voucher 1500 V-Cash', 'Gamewave S1', '450745', 'Active', 'PM-PULSA'),
(17475, 443, '61861', 'Gamewave Voucher 600 V-Cash', 'Gamewave S1', '180745', 'Active', 'PM-PULSA'),
(17470, 433, '61856', '10.000 Tera - TS2', 'TERACORD S1', '90745', 'Active', 'PM-PULSA'),
(17471, 435, '61857', '20.000 Tera - TS2', 'TERACORD S1', '180745', 'Active', 'PM-PULSA'),
(17472, 437, '61858', '30.000 Tera - TS2', 'TERACORD S1', '270745', 'Active', 'PM-PULSA'),
(17473, 439, '61859', 'Gamewave Voucher 150 V-Cash', 'Gamewave S1', '45745', 'Active', 'PM-PULSA'),
(17474, 441, '61860', 'Gamewave Voucher 300 V-Cash', 'Gamewave S1', '90745', 'Active', 'PM-PULSA'),
(17469, 431, '61855', '5.000 Tera - TS2', 'TERACORD S1', '45745', 'Active', 'PM-PULSA'),
(17465, 423, '61851', 'ROSE ONLINE 30000 KOIN', 'ROSE ONLINE S1', '90745', 'Not Active', 'PM-PULSA'),
(17466, 425, '61852', '1.000 Tera - TS2', 'TERACORD S1', '9745', 'Active', 'PM-PULSA'),
(17468, 429, '61854', '3.000 Tera - TS2', 'TERACORD S1', '27745', 'Active', 'PM-PULSA'),
(17467, 427, '61853', '2.000 Tera - TS2', 'TERACORD S1', '18745', 'Active', 'PM-PULSA'),
(17463, 419, '61849', 'ROSE ONLINE 8000 KOIN', 'ROSE ONLINE S1', '27745', 'Not Active', 'PM-PULSA'),
(17464, 421, '61850', 'ROSE ONLINE 15000 KOIN', 'ROSE ONLINE S1', '45745', 'Not Active', 'PM-PULSA'),
(17462, 417, '61848', 'Voucher Qash 230.000', 'Qash S1', '900745', 'Active', 'PM-PULSA'),
(17459, 411, '61845', 'Voucher Qash 23.000', 'Qash S1', '94745', 'Active', 'PM-PULSA'),
(17460, 413, '61846', 'Voucher Qash 69.000', 'Qash S1', '270745', 'Active', 'PM-PULSA'),
(17461, 415, '61847', 'Voucher Qash 115.000', 'Qash S1', '450745', 'Active', 'PM-PULSA'),
(17458, 409, '61844', 'Voucher Qash 11.500', 'Qash S1', '47745', 'Active', 'PM-PULSA'),
(17457, 407, '61843', 'Voucher Qash 6.900', 'Qash S1', '28945', 'Active', 'PM-PULSA'),
(17456, 405, '61842', 'Voucher Qash 2.300', 'Qash S1', '10145', 'Active', 'PM-PULSA'),
(17455, 403, '61841', '260.000 Playpoint-Playon', 'Playon S1', '90745', 'Active', 'PM-PULSA'),
(17454, 401, '61840', '130.000 Playpoint-Playon', 'Playon S1', '45745', 'Active', 'PM-PULSA'),
(17453, 399, '61839', '78.000 Playpoint-Playon', 'Playon S1', '27745', 'Active', 'PM-PULSA'),
(17452, 397, '61838', '26.000 Playpoint-Playon', 'Playon S1', '9745', 'Active', 'PM-PULSA'),
(17451, 395, '61837', '10.000 O-cash OrangeGame', 'OrangeGame S1', '92745', 'Active', 'PM-PULSA'),
(17450, 393, '61836', '5.000 O-cash OrangeGame', 'OrangeGame S1', '46745', 'Active', 'PM-PULSA'),
(17449, 391, '61835', '3.000 O-cash OrangeGame', 'OrangeGame S1', '28345', 'Active', 'PM-PULSA'),
(17448, 389, '61834', '1.000 O-cash OrangeGame', 'OrangeGame S1', '9945', 'Active', 'PM-PULSA'),
(17447, 387, '61833', 'Voucher Gemscool 30.000 G-cash', 'Gemscool S1', '279720', 'Active', 'PM-PULSA'),
(17446, 385, '61832', 'Voucher Gemscool 20.000 G-cash', 'Gemscool S1', '186720', 'Active', 'PM-PULSA'),
(17445, 383, '61831', 'Voucher Gemscool 10.000 G-cash', 'Gemscool S1', '93720', 'Active', 'PM-PULSA'),
(17444, 381, '61830', 'Voucher Gemscool 5.000 G-cash', 'Gemscool S1', '47220', 'Active', 'PM-PULSA'),
(17443, 379, '61829', 'Voucher Gemscool 3.000 G-cash', 'Gemscool S1', '28620', 'Active', 'PM-PULSA'),
(17442, 377, '61828', 'Voucher Gemscool 2.000 G-cash', 'Gemscool S1', '19320', 'Active', 'PM-PULSA'),
(17441, 375, '61827', 'Voucher Gemscool 1.000 G-cash', 'Gemscool S1', '10020', 'Active', 'PM-PULSA'),
(17440, 373, '61826', 'MatchMove 1160 Mcash', 'MatchMove S1', '180745', 'Active', 'PM-PULSA'),
(17439, 371, '61825', 'MatchMove 980 Mcash', 'MatchMove S1', '90745', 'Active', 'PM-PULSA'),
(17438, 369, '61824', 'MatchMove 490 Mcash', 'MatchMove S1', '45745', 'Active', 'PM-PULSA'),
(17437, 367, '61823', 'MatchMove 250 Mcash', 'MatchMove S1', '23245', 'Active', 'PM-PULSA'),
(17436, 365, '61822', 'MatchMove 100 Mcash', 'MatchMove S1', '9745', 'Active', 'PM-PULSA'),
(17435, 363, '61821', 'MatchMove 50 Mcash', 'MatchMove S1', '5245', 'Active', 'PM-PULSA'),
(17434, 361, '61820', 'Showtime karaoke 400 inCash', 'INGAME S1', '90745', 'Active', 'PM-PULSA'),
(17433, 359, '61819', 'Showtime karaoke 200 inCash', 'INGAME S1', '45745', 'Active', 'PM-PULSA'),
(17432, 357, '61818', 'Showtime karaoke 80 inCash', 'INGAME S1', '18745', 'Active', 'PM-PULSA'),
(17431, 355, '61817', 'Showtime karaoke 40 inCash', 'INGAME S1', '9745', 'Active', 'PM-PULSA'),
(17430, 353, '61816', '100.000 iCredits IAH Games', 'IAH Games S1', '90745', 'Active', 'PM-PULSA'),
(17429, 351, '61815', '50.000 iCredits IAH Games', 'IAH Games S1', '45745', 'Active', 'PM-PULSA'),
(17428, 349, '61814', '20.000 iCredits IAH Games', 'IAH Games S1', '18745', 'Active', 'PM-PULSA'),
(17427, 347, '61813', '10.000 iCredits IAH Games', 'IAH Games S1', '9745', 'Active', 'PM-PULSA');
INSERT INTO `services_pulsa` (`id`, `sid`, `pid`, `service`, `operator`, `price`, `status`, `provider`) VALUES
(17426, 345, '61812', 'Voucher GOGAME 200.000', 'GOGAME S1', '210945', 'Active', 'PM-PULSA'),
(17424, 341, '61810', 'Voucher GOGAME 50.000', 'GOGAME S1', '53545', 'Active', 'PM-PULSA'),
(17425, 343, '61811', 'Voucher GOGAME 100.000', 'GOGAME S1', '106245', 'Active', 'PM-PULSA'),
(17423, 339, '61809', 'Voucher GOGAME 20.000', 'GOGAME S1', '21945', 'Active', 'PM-PULSA'),
(17422, 337, '61808', '624 Mall Coin', 'GOLONLINE S1', '95745', 'Active', 'PM-PULSA'),
(17421, 335, '61807', '309 Mall Coin', 'GOLONLINE S1', '48245', 'Active', 'PM-PULSA'),
(17420, 333, '61806', '121 Mall Coin', 'GOLONLINE S1', '19745', 'Active', 'PM-PULSA'),
(17419, 331, '61805', '60 Mall Coin', 'GOLONLINE S1', '10245', 'Active', 'PM-PULSA'),
(17416, 325, '61802', 'game Magic Campus - 110 Dasa Coin', 'DASA GAME S1', '19145', 'Active', 'PM-PULSA'),
(17417, 327, '61803', 'game Magic Campus - 275 Dasa Coin', 'DASA GAME S1', '46745', 'Active', 'PM-PULSA'),
(17418, 329, '61804', 'game Magic Campus - 550 Dasa Coin', 'DASA GAME S1', '92745', 'Active', 'PM-PULSA'),
(17413, 319, '61799', 'ASIASOFT - 5.000-cash', 'ASIASOFT S1', '45745', 'Active', 'PM-PULSA'),
(17414, 321, '61800', 'ASIASOFT - 10.000-cash', 'ASIASOFT S1', '90745', 'Active', 'PM-PULSA'),
(17415, 323, '61801', 'game Magic Campus - 55 Dasa Coin', 'DASA GAME S1', '9945', 'Active', 'PM-PULSA'),
(17409, 311, '61795', 'Voucher Fastblack 200 OP', 'Fastblack S1', '45745', 'Active', 'PM-PULSA'),
(17410, 313, '61796', 'Voucher Fastblack 400 OP', 'Fastblack S1', '90745', 'Active', 'PM-PULSA'),
(17411, 315, '61797', 'ASIASOFT - 1.000-cash', 'ASIASOFT S1', '9745', 'Active', 'PM-PULSA'),
(17412, 317, '61798', 'ASIASOFT - 2.000-cash', 'ASIASOFT S1', '18745', 'Active', 'PM-PULSA'),
(17407, 307, '61793', 'Voucher Fastblack 40 OP', 'Fastblack S1', '9745', 'Active', 'PM-PULSA'),
(17408, 309, '61794', 'Voucher Fastblack 100 OP', 'Fastblack S1', '23245', 'Active', 'PM-PULSA'),
(17406, 305, '61792', 'Facebook Game Card - 100000', 'FBCARD S1', '97045', 'Active', 'PM-PULSA'),
(17405, 303, '61791', 'Facebook Game Card - 50000', 'FBCARD S1', '48895', 'Active', 'PM-PULSA'),
(17404, 301, '61790', 'Facebook Game Card - 30000', 'FBCARD S1', '29995', 'Active', 'PM-PULSA'),
(17402, 297, '61788', 'Game Faveo Voucher 50000', 'Faveo S1', '45745', 'Active', 'PM-PULSA'),
(17403, 299, '61789', 'Game Faveo Voucher 100000', 'Faveo S1', '90745', 'Active', 'PM-PULSA'),
(17401, 295, '61787', 'Game Faveo Voucher 20000', 'Faveo S1', '18745', 'Active', 'PM-PULSA'),
(17400, 293, '61786', 'Voucher Digicash 250.000', 'Digicash S1', '225745', 'Not Active', 'PM-PULSA'),
(17399, 291, '61785', 'Voucher Digicash 100.000', 'Digicash S1', '92745', 'Not Active', 'PM-PULSA'),
(17398, 289, '61784', 'Voucher Digicash 50.000', 'Digicash S1', '46745', 'Not Active', 'PM-PULSA'),
(17397, 287, '61783', 'Voucher Digicash 20.000', 'Digicash S1', '18745', 'Not Active', 'PM-PULSA'),
(17396, 285, '61782', 'Voucher Digicash 10.000', 'Digicash S1', '9745', 'Not Active', 'PM-PULSA'),
(17395, 283, '61781', 'e-PINS 20000 Cherry Credits', 'e-PINS S1', '169245', 'Active', 'PM-PULSA'),
(17394, 281, '61780', 'e-PINS 14000 Cherry Credits', 'e-PINS S1', '118845', 'Active', 'PM-PULSA'),
(17393, 279, '61779', 'e-PINS 10000 Cherry Credits', 'e-PINS S1', '90745', 'Active', 'PM-PULSA'),
(17392, 277, '61778', 'e-PINS 5000 Cherry Credits', 'e-PINS S1', '45745', 'Active', 'PM-PULSA'),
(17391, 275, '61777', 'Cabal Online 10000 Gold', 'Cabal Online S1', '92745', 'Active', 'PM-PULSA'),
(17390, 273, '61776', 'Cabal Online 5000 Gold', 'Cabal Online S1', '46745', 'Active', 'PM-PULSA'),
(17388, 269, '61774', 'Cabal Online 1000 Gold', 'Cabal Online S1', '10045', 'Not Active', 'PM-PULSA'),
(17389, 271, '61775', 'Cabal Online 3000 Gold', 'Cabal Online S1', '28345', 'Active', 'PM-PULSA'),
(17387, 267, '61773', 'BSF Voucher 500.000', 'BSF S1', '450745', 'Active', 'PM-PULSA'),
(17385, 263, '61771', 'BSF Voucher 50.000', 'BSF S1', '45745', 'Active', 'PM-PULSA'),
(17386, 265, '61772', 'BSF Voucher 100.000', 'BSF S1', '90745', 'Active', 'PM-PULSA'),
(17384, 261, '61770', 'BSF Voucher 25.000', 'BSF S1', '23245', 'Active', 'PM-PULSA'),
(17381, 255, '61767', 'Game facebook - Boyaa Poker Voucher 100.000', 'Game facebook - Boyaa Poker S1', '90745', 'Active', 'PM-PULSA'),
(17380, 253, '61766', 'Game facebook - Boyaa Poker Voucher 50.000', 'Game facebook - Boyaa Poker S1', '45745', 'Active', 'PM-PULSA'),
(17383, 259, '61769', 'BSF Voucher 10.000', 'BSF S1', '9745', 'Active', 'PM-PULSA'),
(17382, 257, '61768', 'BSF Voucher 5.000', 'BSF S1', '5245', 'Active', 'PM-PULSA'),
(17379, 251, '61765', 'Xbox Live Gift Card $50', 'Xbox Live Gift Card S1', '643745', 'Not Active', 'PM-PULSA'),
(17378, 249, '61764', 'Xbox Live Gift Card $25', 'Xbox Live Gift Card S1', '325745', 'Not Active', 'PM-PULSA'),
(17375, 243, '61761', 'GARENA V100 333 SHELL', 'GARENA', '91645', 'Active', 'PM-PULSA'),
(17376, 245, '61762', 'Xbox Live Gift Card $10', 'Xbox Live Gift Card S1', '140745', 'Not Active', 'PM-PULSA'),
(17377, 247, '61763', 'Xbox Live Gift Card $15', 'Xbox Live Gift Card S1', '206745', 'Not Active', 'PM-PULSA'),
(17372, 237, '61758', 'GARENA V10 33 SHELL', 'GARENA', '9770', 'Active', 'PM-PULSA'),
(17373, 239, '61759', 'GARENA V20 66 SHELL', 'GARENA', '18870', 'Active', 'PM-PULSA'),
(17374, 241, '61760', 'GARENA V50 165 SHELL', 'GARENA', '46170', 'Active', 'PM-PULSA'),
(17367, 227, '61753', '40 BIG CAT COIN', 'RAGNAROK', '100570', 'Active', 'PM-PULSA'),
(17368, 229, '61754', '80 BIG CAT COIN', 'RAGNAROK', '200570', 'Active', 'PM-PULSA'),
(17369, 231, '61755', '120 BIG CAT COIN', 'RAGNAROK', '230470', 'Active', 'PM-PULSA'),
(17370, 233, '61756', '202 BIG CAT COIN', 'RAGNAROK', '500570', 'Active', 'PM-PULSA'),
(17371, 235, '61757', '298 BIG CAT COIN', 'RAGNAROK', '740470', 'Active', 'PM-PULSA'),
(17366, 225, '61752', '30 BIG CAT COIN', 'RAGNAROK', '75670', 'Active', 'PM-PULSA'),
(17364, 221, '61750', '8 BIG CAT COIN', 'RAGNAROK', '20570', 'Active', 'PM-PULSA'),
(17365, 223, '61751', '20 BIG CAT COIN', 'RAGNAROK', '50670', 'Active', 'PM-PULSA'),
(17363, 219, '61749', '4 BIG CAT COIN', 'RAGNAROK', '10570', 'Active', 'PM-PULSA'),
(17362, 217, '61748', '1 BIG CAT COIN', 'RAGNAROK', '4570', 'Active', 'PM-PULSA'),
(17361, 215, '61747', 'SALDO MTIX 500.000', 'SALDO M-TIX S1', '507970', 'Active', 'PM-PULSA'),
(17360, 213, '61746', 'SALDO MTIX 400.000', 'SALDO M-TIX S1', '407970', 'Active', 'PM-PULSA'),
(17359, 211, '61745', 'SALDO MTIX 300.000', 'SALDO M-TIX S1', '307970', 'Active', 'PM-PULSA'),
(17357, 207, '61743', 'SALDO MTIX 100.000', 'SALDO M-TIX S1', '107970', 'Active', 'PM-PULSA'),
(17358, 209, '61744', 'SALDO MTIX 200.000', 'SALDO M-TIX S1', '207970', 'Active', 'PM-PULSA'),
(17356, 205, '61742', 'SALDO E-CASH 500.000', 'MANDIRI E-CASH S1', '501470', 'Active', 'PM-PULSA'),
(17355, 203, '61741', 'SALDO E-CASH 400.000', 'MANDIRI E-CASH S1', '401470', 'Active', 'PM-PULSA'),
(17354, 201, '61740', 'SALDO E-CASH 300.000', 'MANDIRI E-CASH S1', '301470', 'Active', 'PM-PULSA'),
(17353, 199, '61739', 'SALDO E-CASH 200.000', 'MANDIRI E-CASH S1', '201470', 'Active', 'PM-PULSA'),
(17352, 197, '61738', 'SALDO E-CASH 100.000', 'MANDIRI E-CASH S1', '101470', 'Active', 'PM-PULSA'),
(17351, 195, '61737', 'SALDO E-CASH 50.000', 'MANDIRI E-CASH S1', '51470', 'Active', 'PM-PULSA'),
(17349, 191, '61735', 'SALDO E-CASH 30.000', 'MANDIRI E-CASH S1', '31470', 'Active', 'PM-PULSA'),
(17350, 193, '61736', 'SALDO E-CASH 40.000', 'MANDIRI E-CASH S1', '41470', 'Active', 'PM-PULSA'),
(17348, 189, '61734', 'SALDO E-CASH 20.000', 'MANDIRI E-CASH S1', '21470', 'Active', 'PM-PULSA'),
(17344, 181, '61730', '355 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '53470', 'Active', 'PM-PULSA'),
(17345, 183, '61731', '720 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '102970', 'Active', 'PM-PULSA'),
(17346, 185, '61732', '1450 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '202970', 'Active', 'PM-PULSA'),
(17347, 187, '61733', 'SALDO E-CASH 10.000', 'MANDIRI E-CASH S1', '11470', 'Active', 'PM-PULSA'),
(17343, 179, '61729', '140 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE\r\n', '20570', 'Active', 'PM-PULSA'),
(17342, 177, '61728', '70 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '10570', 'Active', 'PM-PULSA'),
(17341, 175, '61727', '50 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '8570', 'Active', 'PM-PULSA'),
(17340, 173, '61726', '12 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '2570', 'Active', 'PM-PULSA'),
(17339, 171, '61725', '5 FREE FIRE DIAMONDS', 'DIAMOND FREE FIRE', '1570', 'Active', 'PM-PULSA'),
(17338, 169, '61724', 'GRAB DRIVER 250RB', 'SALDO GRAB DRIVER', '252470', 'Active', 'PM-PULSA'),
(17337, 167, '61723', 'GRAB DRIVER 200RB', 'SALDO GRAB DRIVER', '202470', 'Active', 'PM-PULSA'),
(17336, 165, '61722', 'GRAB DRIVER 150RB', 'SALDO GRAB DRIVER', '152470', 'Active', 'PM-PULSA'),
(17335, 163, '61721', 'GRAB DRIVER 100RB', 'SALDO GRAB DRIVER', '102470', 'Active', 'PM-PULSA'),
(17333, 159, '61719', 'TOKEN PLN PROMO 50RB', 'TOKEN PLN PROMO', '50720', 'Active', 'PM-PULSA'),
(17334, 161, '61720', 'TOKEN PLN PROMO 100RB', 'TOKEN PLN PROMO', '100720', 'Active', 'PM-PULSA'),
(17332, 157, '61718', 'TOKEN PLN PROMO 20RB', 'TOKEN PLN PROMO', '20670', 'Active', 'PM-PULSA'),
(17331, 155, '61717', 'PUBG MOBILE 5000+1000 UC', 'PUBG MOBILE', '1001470', 'Active', 'PM-PULSA'),
(17330, 153, '61716', 'PUBG MOBILE 2500+375 UC', 'PUBG MOBILE', '500570', 'Active', 'PM-PULSA'),
(17329, 151, '61715', 'PUBG MOBILE 1250+125 UC', 'PUBG MOBILE', '250570', 'Active', 'PM-PULSA'),
(17328, 149, '61714', 'PUBG MOBILE 500+25 UC', 'PUBG MOBILE', '100570', 'Active', 'PM-PULSA'),
(17327, 147, '61713', 'PUBG MOBILE 250+13 UC', 'PUBG MOBILE', '50570', 'Active', 'PM-PULSA'),
(17326, 145, '61712', 'PUBG MOBILE 125+6 UC', 'PUBG MOBILE', '27470', 'Active', 'PM-PULSA'),
(17325, 143, '61711', 'PUBG MOBILE 50+3 UC', 'PUBG MOBILE', '10570', 'Active', 'PM-PULSA'),
(17324, 141, '61710', 'SALDO OVO NEW 250K', 'SALDO OVO', '251170', 'Active', 'PM-PULSA'),
(17323, 139, '61709', 'SALDO DANA 100K', 'DANA', '101170', 'Active', 'PM-PULSA'),
(17322, 137, '61708', 'SALDO DANA 90K', 'DANA', '91170', 'Active', 'PM-PULSA'),
(17321, 135, '61707', 'SALDO DANA 80K', 'DANA', '81170', 'Active', 'PM-PULSA'),
(17320, 133, '61706', 'SALDO DANA 70K', 'DANA', '71170', 'Active', 'PM-PULSA'),
(17319, 131, '61705', 'SALDO DANA 60K', 'DANA', '61170', 'Active', 'PM-PULSA'),
(17318, 129, '61704', 'SALDO DANA 50K', 'DANA', '51170', 'Active', 'PM-PULSA'),
(17317, 127, '61703', 'SALDO DANA 40K', 'DANA', '41170', 'Active', 'PM-PULSA'),
(17316, 125, '61702', 'SALDO DANA 30K', 'DANA', '31170', 'Active', 'PM-PULSA'),
(17315, 123, '61701', 'SALDO DANA 20K', 'DANA', '21170', 'Active', 'PM-PULSA'),
(17314, 121, '61700', 'SALDO DANA 10K', 'DANA', '11170', 'Active', 'PM-PULSA'),
(17313, 119, '61699', 'SALDO OVO 1JT', 'SALDO OVO', '1001170', 'Active', 'PM-PULSA'),
(17312, 117, '61698', 'SALDO OVO NEW 500K', 'SALDO OVO', '501170', 'Active', 'PM-PULSA'),
(17311, 115, '61697', 'SALDO OVO NEW 400K', 'SALDO OVO', '401170', 'Active', 'PM-PULSA'),
(17310, 113, '61696', 'SALDO OVO NEW 300K', 'SALDO OVO', '301170', 'Active', 'PM-PULSA'),
(17309, 111, '61695', 'SALDO OVO NEW 200K', 'SALDO OVO', '201170', 'Active', 'PM-PULSA'),
(17308, 109, '61694', 'SALDO OVO NEW 100K', 'SALDO OVO', '101170', 'Active', 'PM-PULSA'),
(17307, 107, '61693', 'SALDO OVO NEW 90K', 'SALDO OVO', '91170', 'Active', 'PM-PULSA'),
(17306, 105, '61692', 'SALDO OVO NEW 80K', 'SALDO OVO', '81170', 'Active', 'PM-PULSA'),
(17305, 103, '61691', 'SALDO OVO NEW 70K', 'SALDO OVO', '71170', 'Active', 'PM-PULSA'),
(17304, 101, '61690', 'SALDO OVO NEW 60K', 'SALDO OVO', '61170', 'Active', 'PM-PULSA'),
(17303, 99, '61689', 'SALDO OVO NEW 50K', 'SALDO OVO', '51170', 'Active', 'PM-PULSA'),
(17302, 97, '61688', 'SALDO OVO NEW 40K', 'SALDO OVO', '41170', 'Active', 'PM-PULSA'),
(17301, 95, '61687', 'SALDO OVO NEW 30K', 'SALDO OVO', '31170', 'Active', 'PM-PULSA'),
(17294, 81, '61680', 'SALDO GOPAY NEW 45.000', 'SALDO GOPAY', '45720', 'Active', 'PM-PULSA'),
(17295, 83, '61681', 'SALDO GOPAY NEW 80.000', 'SALDO GOPAY', '80670', 'Active', 'PM-PULSA'),
(17296, 85, '61682', 'SALDO GOPAY NEW 85.000', 'SALDO GOPAY', '85670', 'Active', 'PM-PULSA'),
(17297, 87, '61683', 'SALDO OVO NEW 10K', 'SALDO OVO', '11170', 'Active', 'PM-PULSA'),
(17298, 89, '61684', 'SALDO OVO NEW 15K', 'SALDO OVO', '16170', 'Active', 'PM-PULSA'),
(17299, 91, '61685', 'SALDO OVO NEW 20K', 'SALDO OVO', '21170', 'Active', 'PM-PULSA'),
(17300, 93, '61686', 'SALDO OVO NEW 25K', 'SALDO OVO', '26170', 'Active', 'PM-PULSA'),
(17292, 77, '61678', 'SALDO GOPAY NEW 75.000', 'SALDO GOPAY', '75770', 'Active', 'PM-PULSA'),
(17293, 79, '61679', 'SALDO GOPAY NEW 35.000', 'SALDO GOPAY', '35720', 'Active', 'PM-PULSA'),
(17291, 75, '61677', 'SALDO GOPAY NEW 70.000', 'SALDO GOPAY', '70770', 'Active', 'PM-PULSA'),
(17290, 73, '61676', 'SALDO GOPAY NEW 60.000', 'SALDO GOPAY', '60770', 'Active', 'PM-PULSA'),
(17289, 71, '61675', 'SALDO GOPAY NEW 55.000', 'SALDO GOPAY', '55920', 'Active', 'PM-PULSA'),
(17288, 69, '61674', 'SALDO GOPAY NEW 200.000', 'SALDO GOPAY', '200970', 'Active', 'PM-PULSA'),
(17287, 67, '61673', 'SALDO GOPAY NEW 150.000', 'SALDO GOPAY', '150870', 'Active', 'PM-PULSA'),
(17286, 65, '61672', 'SALDO GOPAY NEW 100.000', 'SALDO GOPAY', '100870', 'Active', 'PM-PULSA'),
(17285, 63, '61671', 'SALDO GOPAY NEW 50.000', 'SALDO GOPAY', '50870', 'Active', 'PM-PULSA'),
(17284, 61, '61670', 'SALDO GOPAY NEW 40.000', 'SALDO GOPAY', '40920', 'Active', 'PM-PULSA'),
(17283, 59, '61669', 'SALDO GOPAY NEW 30.000', 'SALDO GOPAY', '30920', 'Active', 'PM-PULSA'),
(17282, 57, '61668', 'SALDO GOPAY NEW 25.000', 'SALDO GOPAY', '25920', 'Active', 'PM-PULSA'),
(17281, 55, '61667', 'SALDO GOPAY NEW 20.000', 'SALDO GOPAY', '20870', 'Active', 'PM-PULSA'),
(17280, 53, '61666', 'SALDO GOPAY NEW 15.000', 'SALDO GOPAY', '15920', 'Active', 'PM-PULSA'),
(17279, 51, '61665', 'SALDO GOPAY NEW 10.000', 'SALDO GOPAY', '10920', 'Active', 'PM-PULSA'),
(17278, 49, '61664', 'SALDO GOPAY NEW 5000', 'SALDO GOPAY', '5920', 'Active', 'PM-PULSA'),
(17277, 47, '61663', 'SALDO GOPAY NEW 4000', 'SALDO GOPAY', '4920', 'Active', 'PM-PULSA'),
(17276, 45, '61662', 'SALDO GOPAY NEW 3000', 'SALDO GOPAY', '3920', 'Active', 'PM-PULSA'),
(17275, 43, '61661', 'SALDO GOPAY NEW 2000', 'SALDO GOPAY', '2920', 'Active', 'PM-PULSA'),
(17274, 41, '61660', 'SALDO GOPAY NEW 1000', 'SALDO GOPAY', '1920', 'Active', 'PM-PULSA'),
(17273, 39, '61659', 'SALDO LinkAja 100.000', 'SALDO LinkAja', '101370', 'Active', 'PM-PULSA'),
(17272, 37, '61658', 'SALDO LinkAja 90.000', 'SALDO LinkAja', '91370', 'Active', 'PM-PULSA'),
(17269, 31, '61655', 'SALDO LinkAja 60.000', 'SALDO LinkAja', '61370', 'Active', 'PM-PULSA'),
(17270, 33, '61656', 'SALDO LinkAJa 70.000', 'SALDO LinkAja', '71370', 'Active', 'PM-PULSA'),
(17271, 35, '61657', 'SALDO LinkAja 80.000', 'SALDO LinkAja', '81370', 'Active', 'PM-PULSA'),
(17268, 29, '61654', 'SALDO LinkAja 50.000', 'SALDO LinkAja', '51370', 'Active', 'PM-PULSA'),
(17266, 25, '61652', 'SALDO LinkAja 25.000', 'SALDO LinkAja', '26370', 'Active', 'PM-PULSA'),
(17267, 27, '61653', 'SALDO LinkAja 30.000', 'SALDO LinkAja', '31370', 'Active', 'PM-PULSA'),
(17265, 23, '61651', 'SALDO LinkAja 20.000', 'SALDO LinkAja', '21370', 'Active', 'PM-PULSA'),
(17260, 13, '61646', '1230 Diamonds Speed Drifters', 'Garena Speed Drifters', '200570', 'Active', 'PM-PULSA'),
(17261, 15, '61647', '1845 Diamonds Speed Drifters', 'Garena Speed Drifters', '300570', 'Active', 'PM-PULSA'),
(17262, 17, '61648', '3134 Diamonds Speed Drifters', 'Garena Speed Drifters', '500570', 'Active', 'PM-PULSA'),
(17263, 19, '61649', '6279 Diamonds Speed Drifters', 'Garena Speed Drifters', '1000520', 'Active', 'PM-PULSA'),
(17264, 21, '61650', 'SALDO LinkAja 10.000', 'SALDO LinkAja', '11470', 'Active', 'PM-PULSA'),
(17259, 11, '61645', '579 Diamonds Speed Drifters', 'Garena Speed Drifters', '100570', 'Active', 'PM-PULSA'),
(17258, 9, '61644', '282 Diamonds Speed Drifters', 'Garena Speed Drifters', '50620', 'Active', 'PM-PULSA'),
(17257, 7, '61643', '112 Diamonds Speed Drifters', 'Garena Speed Drifters', '20620', 'Active', 'PM-PULSA'),
(17256, 5, '61642', '56 Diamonds Speed Drifters', 'Garena Speed Drifters', '10620', 'Active', 'PM-PULSA'),
(17255, 3, '61641', '25 Diamonds Speed Drifters', 'Garena Speed Drifters', '5620', 'Active', 'PM-PULSA'),
(17254, 1, '61640', '10 Diamonds Speed Drifters', 'Garena Speed Drifters', '2670', 'Active', 'PM-PULSA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_cat`
--

CREATE TABLE `service_cat` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `service_cat`
--

INSERT INTO `service_cat` (`id`, `name`, `code`) VALUES
(1, 'Instagram Highlights / Profile Visits / Reach', 'Instagram Highlights / Profile Visits / Reach'),
(2, 'APROMO [TERMURAH DI MANAPUN ON OFF]', 'APROMO [TERMURAH DI MANAPUN ON OFF]'),
(3, 'Facebook Followers / Friends / Group Members', 'Facebook Followers / Friends / Group Members'),
(4, 'Facebook Page Likes', 'Facebook Page Likes'),
(5, 'Facebook Post Likes / Comments / Shares / Events', 'Facebook Post Likes / Comments / Shares / Events'),
(6, 'Facebook Video Views / Live Stream', 'Facebook Video Views / Live Stream'),
(7, 'Google', 'Google'),
(8, 'Instagram Auto Likes [Per Minute] ', 'Instagram Auto Likes [Per Minute] '),
(9, 'Instagram Followers [Refill] [Guaranteed] [NonDrop]', 'Instagram Followers [Refill] [Guaranteed] [NonDrop'),
(10, 'Instagram Followers Indonesia', 'Instagram Followers Indonesia'),
(11, 'Instagram Followers No Refill/Not Guaranteed', 'Instagram Followers No Refill/Not Guaranteed'),
(12, 'Instagram Likes', 'Instagram Likes'),
(13, 'Instagram Likes / Likes + Impressions', 'Instagram Likes / Likes + Impressions'),
(14, 'Instagram Likes Indonesia', 'Instagram Likes Indonesia'),
(15, 'Instagram Live Video', 'Instagram Live Video'),
(16, 'Instagram Story / Impressions / Saves / Reach', 'Instagram Story / Impressions / Saves / Reach'),
(17, 'Instagram TV', 'Instagram TV'),
(18, 'Instagram Views', 'Instagram Views'),
(19, 'Pinterest', 'Pinterest'),
(20, 'Shopee/BukaLapak/Tokopedia / BIGO / CubeTV / NimoTV/', 'Shopee/BukaLapak/Tokopedia / BIGO / CubeTV / NimoT'),
(21, 'SoundCloud', 'SoundCloud'),
(22, 'Spotify', 'Spotify'),
(23, 'Telegram', 'Telegram'),
(24, 'TIKTOK', 'TIKTOK'),
(25, 'Twitter Followers', 'Twitter Followers'),
(26, 'Twitter Poll Votes', 'Twitter Poll Votes'),
(27, 'Twitter Views / Impressions / Live / Comments', 'Twitter Views / Impressions / Live / Comments'),
(28, 'Website Traffic', 'Website Traffic'),
(29, 'Website Traffic [Targeted]', 'Website Traffic [Targeted]'),
(30, 'Youtube Likes / Comments /', 'Youtube Likes / Comments /'),
(31, 'Youtube Live Stream', 'Youtube Live Stream'),
(32, 'Youtube Subscribers ', 'Youtube Subscribers '),
(33, 'Youtube Views', 'Youtube Views'),
(34, '(NEW) Youtube Jam Tayang', 'Youtube Watchtime');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_cat_pulsa`
--

CREATE TABLE `service_cat_pulsa` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `service_cat_pulsa`
--

INSERT INTO `service_cat_pulsa` (`id`, `name`, `code`, `type`) VALUES
(1, 'Xbox Live Gift Card', 'Xbox Live Gift Card S1', 'VGAME S1'),
(2, 'Game facebook - Boyaa Poker', 'Game facebook - Boyaa Poker S1', 'VGAME S1'),
(3, 'BSF', 'BSF S1', 'VGAME S1'),
(4, 'Cabal Online', 'Cabal Online S1', 'VGAME S1'),
(5, 'e-PINS', 'e-PINS S1', 'VGAME S1'),
(6, 'Digicash', 'Digicash S1', 'VGAME S1'),
(7, 'Faveo', 'Faveo S1', 'VGAME S1'),
(8, 'FBCARD', 'FBCARD S1', 'VGAME S1'),
(9, 'Fastblack', 'Fastblack S1', 'VGAME S1'),
(10, 'ASIASOFT', 'ASIASOFT S1', 'VGAME S1'),
(11, 'DASA GAME', 'DASA GAME S1', 'VGAME S1'),
(12, 'GOLONLINE', 'GOLONLINE S1', 'VGAME S1'),
(13, 'GOGAME', 'GOGAME S1', 'VGAME S1'),
(14, 'IAH Games', 'IAH Games S1', 'VGAME S1'),
(15, 'INGAME', 'INGAME S1', 'VGAME S1'),
(16, 'MatchMove', 'MatchMove S1', 'VGAME S1'),
(17, 'Gemscool', 'Gemscool S1', 'VGAME S1'),
(18, 'OrangeGame', 'OrangeGame S1', 'VGAME S1'),
(19, 'Playon', 'Playon S1', 'VGAME S1'),
(20, 'Qash', 'Qash S1', 'VGAME S1'),
(21, 'GARENA S1', 'GARENA', 'VGAME S2'),
(22, 'RappelzOnline', 'RappelzOnline S1', 'VGAME S1'),
(23, 'ROSE ONLINE', 'ROSE ONLINE S1', 'VGAME S1'),
(24, 'TERACORD', 'TERACORD S1', 'VGAME S1'),
(25, 'Gamewave', 'Gamewave S1', 'VGAME S1'),
(26, 'Gameweb', 'Gameweb S1', 'VGAME S1'),
(27, 'Playstation Store Prepaid Card', 'Playstation Store Prepaid Card S1', 'VGAME S1'),
(28, 'Game facebook - Joombi', 'Game facebook - Joombi S1', 'VGAME S1'),
(29, 'Koram', 'Koram S1', 'VGAME S1'),
(30, 'kiwi card', 'kiwi card S1', 'VGAME S1'),
(31, 'LYTO', 'LYTO S1', 'VGAME S1'),
(32, 'Mainkan.com', 'Mainkan.com S1', 'VGAME S1'),
(33, 'Mobius', 'Mobius S1', 'VGAME S1'),
(34, 'MOGCAZ', 'MOGCAZ S1', 'VGAME S1'),
(35, 'Megaxus', 'Megaxus S1', 'VGAME S1'),
(36, 'MOGPLAY', 'MOGPLAY S1', 'VGAME S1'),
(37, 'MOLPoints', 'MOLPoints S1', 'VGAME S1'),
(38, 'Metin 2', 'Metin 2 S1', 'VGAME S1'),
(39, 'MyCard', 'MyCard S1', 'VGAME S1'),
(40, 'Playcircle', 'Playcircle S1', 'VGAME S1'),
(41, 'Playfish', 'Playfish S1', 'VGAME S1'),
(42, 'Playpoint', 'Playpoint S1', 'VGAME S1'),
(43, 'Game facebook - Pool Live Tour', 'Game facebook - Pool Live Tour S1', 'VGAME S1'),
(44, 'Game facebook - Pico World', 'Game facebook - Pico World S1', 'VGAME S1'),
(45, 'Playnexia', 'Playnexia S1', 'VGAME S1'),
(46, 'Softnyx', 'Softnyx S1', 'VGAME S1'),
(47, 'Spin', 'Spin S1', 'VGAME S1'),
(48, 'Serenity', 'Serenity S1', 'VGAME S1'),
(49, 'STEAM', 'STEAM S1', 'VGAME S1'),
(50, 'Travian', 'Travian S1', 'VGAME S1'),
(51, 'PLAYSPAN', 'PLAYSPAN S1', 'VGAME S1'),
(52, 'UNIPIN', 'UNIPIN S1', 'VGAME S1'),
(53, 'VTC Online', 'VTC Online S1', 'VGAME S1'),
(54, 'Viwawa', 'Viwawa S1', 'VGAME S1'),
(55, 'Winner Card', 'Winner Card S1', 'VGAME S1'),
(56, 'Wavegame', 'Wavegame S1', 'VGAME S1'),
(57, 'ZYNGA', 'ZYNGA S1', 'VGAME S1'),
(58, 'PLN', 'PLN S1', 'TOKEN S1'),
(59, 'AXIS', 'AXIS S1', 'PULSA S1'),
(60, 'AXIS AIGO (AKTIVASI *838*KODE#)', 'AXIS AIGO (AKTIVASI *838*KODE#) S1', 'DATA S1'),
(61, 'AXIS DATA BRONET', 'AXIS DATA BRONET S1', 'DATA S1'),
(62, 'BOLT', 'BOLT S1', 'PULSA S1'),
(63, 'BOLT KUOTA', 'BOLT KUOTA S1', 'DATA S1'),
(64, 'CERIA', 'CERIA S1', 'PULSA S1'),
(65, 'GOJEK', 'GOJEK S1', 'DRIVER S1'),
(66, 'GOOGLE PLAY', 'GOOGLE PLAY S1', 'VGAME S1'),
(67, 'GRAB', 'GRAB S1', 'DRIVER S1'),
(68, 'INDOSAT', 'INDOSAT S1', 'PULSA S1'),
(69, 'INDOSAT DATA EXTRA', 'INDOSAT DATA EXTRA S1', 'DATA S1'),
(70, 'INDOSAT DATA FREEDOM', 'INDOSAT DATA FREEDOM S1', 'DATA S1'),
(71, 'INDOSAT DATA HARIAN', 'INDOSAT DATA HARIAN S1', 'DATA S1'),
(72, 'INDOSAT DATA REGULER', 'INDOSAT DATA REGULER S1', 'DATA S1'),
(73, 'INDOSAT SMS', 'INDOSAT SMS S1', 'SMS S1'),
(74, 'INDOSAT TRANSFER PULSA', 'INDOSAT TRANSFER PULSA S1', 'PULSA TF S1'),
(75, 'iTunes Gift Card', 'iTunes Gift Card S1', 'VGAME S1'),
(76, 'SMARTFREN', 'SMARTFREN S1', 'PULSA S1'),
(77, 'SMARTFREN INTERNET', 'SMARTFREN INTERNET S1', 'DATA S1'),
(78, 'TELKOMSEL', 'TELKOMSEL S1', 'PULSA S1'),
(79, 'TELKOMSEL DATA', 'TELKOMSEL DATA S1', 'DATA S1'),
(80, 'TELKOMSEL DATA AS', 'TELKOMSEL DATA AS S1', 'DATA S1'),
(81, 'TELKOMSEL DATA BULK', 'TELKOMSEL DATA BULK S1', 'DATA S1'),
(82, 'TELKOMSEL SMS', 'TELKOMSEL SMS S1', 'SMS S1'),
(83, 'TELKOMSEL TELEPON', 'TELKOMSEL TELEPON S1', 'TELP S1'),
(84, 'TELKOMSEL TRANSFER PULSA', 'TELKOMSEL TRANSFER PULSA S1', 'PULSA TF S1'),
(85, 'TRI', 'TRI S1', 'PULSA S1'),
(86, 'TRI DATA', 'TRI DATA S1', 'DATA S1'),
(87, 'TRI DATA BM', 'TRI DATA BM S1', 'DATA S1'),
(88, 'TRI DATA CINTA', 'TRI DATA CINTA S1', 'DATA S1'),
(89, 'TRI DATA GETMORE', 'TRI DATA GETMORE S1', 'DATA S1'),
(90, 'TRI DATA REGULER', 'TRI DATA REGULER S1', 'DATA S1'),
(91, 'TRI TELEPON', 'TRI TELEPON S1', 'TELP S1'),
(92, 'TRI TRANSFER PULSA', 'TRI TRANSFER PULSA S1', 'PULSA TF S1'),
(93, 'XL', 'XL S1', 'PULSA S1'),
(94, 'XL INTERNET COMBO XTRA', 'XL INTERNET COMBO XTRA S1', 'DATA S1'),
(95, 'XL INTERNET HOTROD', 'XL INTERNET HOTROD S1', 'DATA S1'),
(96, 'XL INTERNET HOTROD EXTRA', 'XL INTERNET HOTROD EXTRA S1', 'DATA S1'),
(97, 'Cherry Credits S2', 'Cherry Credits S2', 'VGAME S2'),
(98, 'Digicash S2', 'Digicash S2', 'VGAME S2'),
(99, 'Faveoe S2', 'Faveoe S2', 'VGAME S2'),
(100, 'Gamewave S2', 'Gamewave S2', 'VGAME S2'),
(101, 'GARENA S2', 'Garena S2', 'VGAME S2'),
(102, 'Gemscool S2', 'Gemscool S2', 'VGAME S2'),
(103, 'Google Play IDR S2', 'Google Play IDR S2', 'VGAME S2'),
(104, 'Google Play US S2', 'Google Play US S2', 'VGAME S2'),
(105, 'IAH Online S2', 'IAH Online S2', 'VGAME S2'),
(106, 'Itunes IDR S2', 'Itunes IDR S2', 'VGAME S2'),
(107, 'Itunes US S2', 'Itunes US S2', 'VGAME S2'),
(108, 'Lyto S2', 'Lyto S2', 'VGAME S2'),
(109, 'Main Games S2', 'Main Games S2', 'VGAME S2'),
(110, 'Megaxus S2', 'Megaxus S2', 'VGAME S2'),
(112, 'MOL Point S2', 'MOL Point S2', 'VGAME S2'),
(113, 'My Card S2', 'My Card S2', 'VGAME S2'),
(114, 'Nintendo Eshop S2', 'Nintendo Eshop S2', 'VGAME S2'),
(115, 'Olleh4U S2', 'Olleh4U S2', 'VGAME S2'),
(116, 'Orange Game S2', 'Orange Game S2', 'VGAME S2'),
(117, 'Playfish S2', 'Playfish S2', 'VGAME S2'),
(118, 'Playpoint S2', 'Playpoint S2', 'VGAME S2'),
(119, 'Playstation ID S2', 'Playstation ID S2', 'VGAME S2'),
(120, 'Playstation US S2', 'Playstation US S2', 'VGAME S2'),
(121, 'Qeon S2', 'Qeon S2', 'VGAME S2'),
(122, 'Steam S2', 'Steam S2', 'VGAME S2'),
(123, 'Ultimate Game S2', 'Ultimate Game S2', 'VGAME S2'),
(124, 'VTC Online S2', 'VTC Online S2', 'VGAME S2'),
(125, 'Wave Point S2', 'Wave Point S2', 'VGAME S2'),
(126, 'Winner S2', 'Winner S2', 'VGAME S2'),
(127, 'Zynga S2', 'Zynga S2', 'VGAME S2'),
(162, 'INDOSAT BOMBER', 'INDOSAT BOMBER S1', 'DATA S1'),
(163, 'INDOSAT DATA MINI', 'INDOSAT DATA MINI S1', 'DATA S1'),
(164, 'INDOSAT YELLOW', 'INDOSAT YELLOW S1', 'DATA S1'),
(165, 'SMARTFREN DATA VOLUME', 'SMARTFREN DATA VOLUME S1', 'DATA S1'),
(166, 'PUBG', 'PUBG MOBILE', 'GAMEID'),
(167, 'OVO', 'OVO S1', 'DRIVER S1'),
(168, 'XL TELEPON', 'XL TELEPON S1', 'TELP S1'),
(169, 'TRI TELEPON', 'TRI TELEPON S1', 'TELP S1'),
(171, 'INDOSAT TELEPON', 'INDOSAT TELEPON S1', 'TELP S1'),
(172, 'XL TELEPON LUAR NEGERI', 'XL TELEPON LUAR NEGERI S1', 'TELP S1'),
(173, 'SALDO E-MONEY MANDIRI', 'Mandiri S2', 'DRIVER S1'),
(174, 'SALDO TAPCASH BNI', 'Tapcash BNI S2', 'DRIVER S1'),
(175, 'DIAMOND MOBILE LEGENDS', 'Mobile Legend S2', 'GAMEID'),
(176, 'SALDO M-TIX', 'SALDO M-TIX S1', 'DRIVER S1'),
(177, 'MANDIRI E-CASH', 'MANDIRI E-CASH S1', 'DRIVER S1'),
(178, 'SALDO GRAB DRIVER', 'SALDO GRAB DRIVER', 'DRIVER S1'),
(179, 'TOKEN PLN PROMO', 'TOKEN PLN PROMO', 'TOKEN S1'),
(180, 'DIAMOND FREE FIRE', 'DIAMOND FREE FIRE', 'GAMEID'),
(181, 'RAGNAROK', 'RAGNAROK', 'GAMEID'),
(182, 'SALDO GOPAY', 'SALDO GOPAY', 'DRIVER S1'),
(183, 'Garena Speed Drifters', 'Garena Speed Drifters', 'GAMEID'),
(184, 'SALDO DANA', 'DANA', 'DRIVER S1'),
(185, 'SALDO OVO NEW', 'SALDO OVO', 'DRIVER S1'),
(186, 'UC PUBGM', 'PUBG S1', 'GAMEID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_balance`
--

CREATE TABLE `transfer_balance` (
  `id` int(10) NOT NULL,
  `sender` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `receiver` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `transfer_balance`
--

INSERT INTO `transfer_balance` (`id`, `sender`, `receiver`, `quantity`, `date`) VALUES
(19, 'AdityaTri', 'Cantika', 42500, '2020-04-06'),
(20, 'AdityaTri', 'Dekpo', 17000, '2020-04-07'),
(21, 'AdityaTri', 'Dekpo', 17000, '2020-04-07'),
(22, 'AdityaTri', 'Dekpo', 15300, '2020-04-08'),
(23, 'AdityaTri', 'Idnun', 9000, '2020-04-08'),
(24, 'AdityaTri', 'prima', 17000, '2020-04-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `balance` int(10) NOT NULL,
  `level` enum('Member','Agen','Admin','Reseller') COLLATE utf8_swedish_ci NOT NULL,
  `registered` date NOT NULL,
  `status` enum('Active','Suspended') COLLATE utf8_swedish_ci NOT NULL,
  `api_key` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `uplink` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `balance`, `level`, `registered`, `status`, `api_key`, `uplink`, `email`) VALUES
(93, 'admin', '$2y$10$KOLjKuQVrhn8Z6vFlMrdeePcjeckVNGoSPjjUqMyacO63CowSMsD6', 500000, 'Admin', '2021-01-11', 'Active', 'iLd66-89V2l-7q3Wr-z3muM-6eYzM', 'Server', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id` int(10) NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `balance` int(10) NOT NULL,
  `status` enum('On','Off') COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deposit_method`
--
ALTER TABLE `deposit_method`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hof`
--
ALTER TABLE `hof`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_pulsa`
--
ALTER TABLE `orders_pulsa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_tsel`
--
ALTER TABLE `pesan_tsel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services_pulsa`
--
ALTER TABLE `services_pulsa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_cat`
--
ALTER TABLE `service_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_cat_pulsa`
--
ALTER TABLE `service_cat_pulsa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transfer_balance`
--
ALTER TABLE `transfer_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1368;

--
-- AUTO_INCREMENT untuk tabel `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `deposit_method`
--
ALTER TABLE `deposit_method`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hof`
--
ALTER TABLE `hof`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `orders_pulsa`
--
ALTER TABLE `orders_pulsa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `pesan_tsel`
--
ALTER TABLE `pesan_tsel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4380;

--
-- AUTO_INCREMENT untuk tabel `services_pulsa`
--
ALTER TABLE `services_pulsa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17938;

--
-- AUTO_INCREMENT untuk tabel `service_cat`
--
ALTER TABLE `service_cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `service_cat_pulsa`
--
ALTER TABLE `service_cat_pulsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT untuk tabel `transfer_balance`
--
ALTER TABLE `transfer_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
