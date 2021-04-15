-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2021 pada 17.52
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `res_booking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `res_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `make_date` date DEFAULT NULL,
  `make_time` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `bill` float DEFAULT NULL,
  `transactionid` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0- reject, 1-confirmed',
  `reject` int(11) DEFAULT 0,
  `booked_service` varchar(255) DEFAULT NULL,
  `booked_barber_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `res_id`, `c_id`, `make_date`, `make_time`, `name`, `phone`, `booking_date`, `booking_time`, `bill`, `transactionid`, `status`, `reject`, `booked_service`, `booked_barber_name`) VALUES
(18, 'RoIJ8KUJ17', 18, 25, '2021-04-08', '05:05:23pm', 'pepianjing', '98372198378921', '2021-04-09', '14:05:00', 0, 'epfojapidjwa9d33readw', 1, 0, 'Cukur Pompadour + Bilas | Rp. 100000', 'pepi barbershop'),
(19, 'XkK0I7TE7g', 18, 25, '2021-04-08', '05:20:44pm', 'pepianjing', '98372198378921', '2021-04-10', '14:20:00', 0, '', 0, 0, 'Cukur + Bilas + Massage | Rp. 8500', 'pepi barbershop'),
(20, 'jQM6hUIoRt', 18, 25, '2021-04-08', '07:06:41pm', 'pepianjing', '98372198378921', '2021-04-09', '11:07:00', 0, '', 0, 0, 'Cukur + Beard Trim | Rp. 10000', 'pepi barbershop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_menus`
--

CREATE TABLE `booking_menus` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking_menus`
--

INSERT INTO `booking_menus` (`id`, `booking_id`, `item_id`, `qty`) VALUES
(4, '60640226efebb', 10, 1),
(5, '60646be328e92', 10, 1),
(6, '6064871dca31f', 12, 1),
(7, '6064871dca31f', 13, 1),
(8, '60657812c6f9f', 12, 1),
(9, '60657812c6f9f', 13, 1),
(10, '606578b100305', 11, 1),
(11, '606578b100305', 12, 1),
(12, '606578b100305', 13, 1),
(13, 'ol10IpHbWE', 12, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `location_name`) VALUES
(2, 'Dayeuhkolot'),
(3, 'ciwastra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `res_id` int(11) DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `servis_type` varchar(100) NOT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_item`
--

INSERT INTO `menu_item` (`id`, `res_id`, `item_name`, `servis_type`, `price`, `image`) VALUES
(10, 18, 'Cukur Biasa', 'Paket', 10000, 'julie-laiymani-F-X05iw4bCQ-unsplash.jpg'),
(11, 18, 'Beard Trim', 'Tambahan', 5000, 'artworks-VLDTtOE6MxLKuy6b-JRJjTQ-t500x500.jpg'),
(12, 18, 'Cukur Pompadour + Bilas', 'Paket', 100000, 'nanikore.jpeg'),
(13, 18, 'Cukur + Bilas + Massage', 'Paket', 8500, '1408676464__400x400__.jpg'),
(14, 18, 'Cukur + Beard Trim', 'Paket', 10000, 'julie-laiymani-F-X05iw4bCQ-unsplash.jpg'),
(15, 33, 'Mohawk + Pomade', 'Rambut', 75000, '5322c2cad533e12e552d0dfdc89b4c25.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis_type_table`
--

CREATE TABLE `servis_type_table` (
  `id` int(11) NOT NULL,
  `servis_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servis_type_table`
--

INSERT INTO `servis_type_table` (`id`, `servis_type`) VALUES
(1, 'Paket'),
(2, 'Tambahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `users_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` int(11) NOT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `bkashnumber` varchar(20) DEFAULT NULL,
  `approve_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-not approve,1-approve ',
  `role` int(20) DEFAULT NULL COMMENT '1 = barbershop, 2 = customer '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_info`
--

INSERT INTO `users_info` (`id`, `users_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `bkashnumber`, `approve_status`, `role`) VALUES
(17, 'tes', 'tes@gmail.com', '8211544444', 'lubang buaya', 0, 'Webp.net-resizeimage.jpg', '123', NULL, 0, 2),
(18, 'pepi barbershop', 'tes1@gmail.com', '8554454545', 'dayeuhmuda no21', 2, 'tim-mossholder-imlD5dbcLM4-unsplash.jpg', '$2y$10$lTmhXPi5ypsbcWPtYMEH3..rFPwZK4dHzeolhImNggIqSKItTf.8.', NULL, 0, 1),
(19, 'Meki sanjaya', 'ngetest@gmail.com', '08132312312', 'Parapatan Rebel', 0, 'Meme_Man_HD.png', '123', NULL, 0, 2),
(20, 'The Jancuks Barber', 'jancuksbarbs@gmail.com', '0832312432', 'Kolong jembatan dekat indomaret', 2, 'kisspng-telkom-indonesia-telecommunication-business-telkom-5b29b8975e6352.0557019215294608873866.jpg', '123', NULL, 0, 1),
(21, 'Jonathan Sutrisna', 'sutis@gmail.com', '08231212421', 'Supreme Gucci Gang lil pump no23', 0, 'half-life-scientist-stahp-5a9d2f589df81.png', '123', NULL, 0, 2),
(22, 'Julda ndut', 'juludut@gmail.com', '021323123', 'bruh', 0, 'profile (2).jpg', '123', NULL, 0, 2),
(25, 'pepianjing', 'pepi@gmail.com', '98372198378921', 'cianjur', 0, NULL, '$2y$10$/cYUChGNS2AsUkyRjyI.cuyXupiv6ZvUclSp7gMSPGmeMnJ.Egacy', NULL, 0, 2),
(26, 'reg', 'reg@gmail.com', '983721987389127312', '97u8ljkndsakjbdkjnas', 0, 'Meme_Man_HD.png', '$2y$10$MLdW.LDVLXACKJEnA8nP8uE4GqNLHB7S1.p66Dk18YcyiIxN7yy.q', NULL, 0, 1),
(27, 'tes2', 'tes2@gmail.com', '3209188321890321', 'kljmndsakjndjksanjkdnasjkndjkasnjkdasnjk', 0, NULL, '$2y$10$lTmhXPi5ypsbcWPtYMEH3..rFPwZK4dHzeolhImNggIqSKItTf.8.', NULL, 0, 2),
(28, 'tes3', 'tes3@gmail.com', '09382109839021', 'lkdmsaklmdsaklmdklsa', 0, NULL, '$2y$10$fR2/WPaVHhqyZ.JTg1oZHek8w8Vz/I7.40LrIAZgJVRV.MvIumP3G', NULL, 0, 2),
(30, 'img2', 'img2@gmail.com', '0983812890839021', 'kjndsjkandjksanjkdsnajk', 0, NULL, '$2y$10$w0bW04x7IzqHgp.eSaKYKOogiihQt8uDXeQtA0TDnIByO920gwgma', NULL, 0, 2),
(31, 'contoh', 'contoh@gmail.com', '39021809381290', 'jkdnsajkndjksanjkdas', 0, NULL, '$2y$10$duthCkzrylc1ckFAUkB5ze.8CnvulOu0ob8xDy0CwPdAwMiNpuGQe', NULL, 0, 2),
(32, 'conto', 'conto@gmail.com', '123390218', 'lkdsaklm', 0, NULL, '$2y$10$B.jZCDen743TwtzDmMQcsOFzIGDzf5FqXlKnJKZSNjKIySd7eo9ly', NULL, 0, 2),
(33, 'nuranjign', 'nur@gmail.com', '30219890381290312', 'fdslikhbfasdlkhj', 2, NULL, '$2y$10$o4NSGKRAL8lLN67I21v5AOw7MofXWqSUA.cSkATU2B4MNn.x4QsaG', NULL, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking_menus`
--
ALTER TABLE `booking_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `servis_type_table`
--
ALTER TABLE `servis_type_table`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `booking_menus`
--
ALTER TABLE `booking_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `servis_type_table`
--
ALTER TABLE `servis_type_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
