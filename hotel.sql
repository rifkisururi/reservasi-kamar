-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2020 pada 17.19
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(120) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `nomor`, `deskripsi`, `gambar`, `fasilitas`, `harga`, `updated_at`) VALUES
(4, '301', '<p>Sebuah tempat peristirahatan yang nyaman, dan tenang dengan harga terjangkau</p>\r\n\r\n<p>Bagi Anda yang menginginkan kualitas pelayanan oke dengan harga yang ramah di kantong, Surabaya Homey near ITS [Syariah] adalah pilihan yang tepat. Karena meski murah, akomodasi ini menyediakan fasilitas memadai dan pelayanan yang tetap terjaga mutunya.</p>', '1605187906kamar1.jpg', 'ac', 100000, '2020-11-12 13:31:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `harga` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `user_id`, `kamar_id`, `check_in`, `check_out`, `harga`, `status`, `tanggal_pembayaran`, `updated_at`) VALUES
(4, 2, 4, '2020-11-12', '2020-11-14', 200000, 'sudah dibayar', NULL, '2020-11-12 16:06:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role`, `updated_at`) VALUES
(1, 'siffiyan assauri', 'siffiyan', 'siffiyanassauri@gmail.com', '$2y$10$F8TEJCs/JZ6noWo4tPvnmukEYBOdb2grmt3Mweu1elJZAnodgvC2W', 'admin', '2020-11-12 11:29:24'),
(2, 'kevin andhika', 'kevin', 'kevinandhikaramadhan@gmail.com', '$2y$10$/v6/fluSFhpKaXMWvVZLiOX/i16PJIa.SEFyoD7OGvnPDy5fQrYJ.', 'pengguna', '2020-11-12 14:30:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
