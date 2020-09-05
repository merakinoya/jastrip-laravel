-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2020 at 08:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_ilhamdb_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(16,0) DEFAULT NULL,
  `total_participant` int(11) DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `meet_point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `user_id`, `name`, `description`, `price`, `total_participant`, `start_at`, `finish_at`, `meet_point`, `facility`, `terms_condition`, `img`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Merbabu Mountain Trips', '<p>Gunung Rinjani via Sembalun + Explore Lombok&nbsp;</p>', '13000000', 4, '2020-09-06 00:00:00', '2020-09-06 00:00:00', 'Stasiun Yogyakarta', '<p>DESTINASI :ㅤㅤㅤㅤ<br />🔹 Puncak Rinjaniㅤㅤ<br />🔹 Plawangan Sembalunㅤㅤㅤ<br />🔹 Bukit Penyesalanㅤㅤㅤ<br />🔹 Lembah Sembalunㅤㅤㅤ<br />🔹 Bukit Mereseㅤㅤㅤ<br />🔹 Pantai Kuta Mandalikaㅤㅤㅤ<br />🔹 Desa Adat Sadeㅤㅤㅤㅤㅤㅤ<br />ㅤ<br />TANGGAL MAIN:ㅤ<br />🔹9-14 April 2020ㅤㅤㅤㅤ<br />🔹4-9 Juni 2020ㅤ<br />🔹3-8 September 2020ㅤㅤㅤㅤ<br />🔹5-10 November 2020ㅤㅤㅤ<br />🔹24-26 Desember 2020ㅤㅤ<br />ㅤㅤㅤㅤㅤㅤㅤㅤ<br />MEPO &amp; IURAN:ㅤㅤ<br />🔹Jogja : IDR 1.525.000ㅤ<br />🔹Surabaya : IDR 1.325.000ㅤㅤ<br />🔹Lombok : IDR 1.075.000</p>', 'Untuk Detail program silahkan hubungi adminㅤ\r\nㅤㅤㅤ\r\nWhatsApp: 📞+6282269229772', '110192492_948680592237736_4580202782817591938_n.jpg', '2020-09-04 08:03:32', '2020-09-04 21:27:30'),
(2, 1, 1, 'Lawu Trip', 'BT nih di rumah Mulu\r\nTemenin aku naik gunung Yuuu', '340000', 2, '2020-09-13 00:00:00', '2020-09-13 00:00:00', 'Magelang', '<p>&bull; &bull; &bull; &bull; &bull; &bull;<br /><br />MT.Lawu<br />25-27 September 2020<br />Kuota 55 orang<br />Mepo Bandung 350K/pack<br />Mepo Jakarta 450K/pack<br /><br />Include<br /><br />✓Transport PP ( full toll )<br />✓Tips supir<br />✓Simaksi<br />✓Guide team<br />✓Ganci &amp; stiker<br />✓ bonus liwet<br /><br />Exclude<br /><br />- surat sehat<br />- alat camp<br />- logistik<br />- Porter pribadi<br />- air<br />- dan yg tidak di sebut di include<br /><br />DP : 150K/orang<br />Jika cansel DP hangus<br /><br />Info : 08996835512<br />Atw Dateng ke bascamp<br />Jalan karasak lama gang aki endun RT 03 RW 05 cibintinu Bandung</p>', NULL, '1380291_10151967276042722_1088569101_n.jpg', '2020-09-04 21:30:40', '2020-09-04 21:59:20'),
(3, 1, 1, 'OPEN TRIP GUNUNG GEDE 2.958 M Via Putri', 'Harga Paket Perorang :\r\nIDR : 500.000\r\nMeeting point : Pom Bensin Kp.Rambutan', '500000', 1, '2020-09-19 00:00:00', '2020-09-20 00:00:00', 'Pom Bensin Kp.Rambutan', '<p>INCLUDE :<br />✔ Transportasi Elf /Mobil PP Jakarta - BC Putri<br />✔ Simaksi<br />✔ Guide<br />✔ Porter Team<br />✔ Tenda &amp; Cooking set<br />✔ Kebersihan Basecamp<br />✔ Makan Selama Pendakian<br />✔ Makan Sebelum Sesudah 2x<br />✔ Logistik Selama Pendakian<br />✔ Perlengkapan Makan Minum<br />✔ Buah<br />✔ First Aid Kit<br />✔ Dokumentasi<br /><br />EXCLUDE :<br />❎ Porter Pribadi<br />❎ Cemilan dan Air Pribadi<br />❎ Perlengkapan Pribadi<br />❎ Surat Sehat</p>', 'Note :\r\n➡️ Bagi Peserta Di Wajibkan Membawa surat Sehat , Masker & Hansanitizer\r\n➡️ Masker Minimal Bawa 2\r\n\r\nInfo Pemesanan Trip & Private Trip , Trip Family , Tour Gathering\r\n☎️ : 0823-2382-2456\r\n📧 : dolansemeru@gmail.com', 'mountgede.jpg', '2020-09-04 22:14:52', '2020-09-04 22:14:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_seller_id_foreign` (`seller_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
