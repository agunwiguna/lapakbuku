-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2018 pada 18.50
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapakbuku`
--
CREATE DATABASE IF NOT EXISTS lapakbuku;

USE lapakbuku;
-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(6) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  `price` int(12) NOT NULL,
  `foto` blob NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `name`, `pengarang`, `penerbit`, `quantity`, `price`, `foto`, `isbn`, `kategori`, `bahasa`, `deskripsi`) VALUES
(3, 'Untuk Matamu', 'Kharisma P. Lanang', 'Orbit', 5, 70000, 0x646f776e6c6f6164202831292e6a7067, '8899755566', 'Fiksi', 'Indonesia', 'Untuk Matamu adalah buku puisi karya Karisma P. Lanang. Buku ini berisi puluhan puisi yang ia tulis sebagai rekam jejak kepenulisannya.'),
(6, 'Algoritma dan Pemrograman', 'Rinaldi Munir', 'Informatika', 2, 65000, 0x616c676f7269746d612064616e2070656d726f6772616d616e6c2e6a7067, '435345435435', 'Umum', 'Indonesia', 'Belajar logika di algoritma pemrograman'),
(7, 'Belajar Codeigniter', 'Awan Pribadi Basuki', 'Loko Media', 2, 70000, 0x313370726f79656b2d6d656d62616e67756e2d776562736974652d62657262617369732d7068702d64656e67616e2d636f646569676e697465722e6a7067, '33434343545', 'Umum', 'Indonesia', 'Membangun website dengan framework codeigniter'),
(8, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Merah', 3, 90000, 0x313339383033342e6a7067, '445667343', 'Fiksi', 'Indonesia', 'Bumi Manusia adalah buku pertama dari Tetralogi Buru karya Pramoedya Ananta Toer yang pertama kali diterbitkan oleh Hasta Mitra pada tahun 1980.\r\n\r\nBuku ini ditulis Pramoedya Ananta Toer ketika masih mendekam di Pulau Buru. Sebelum ditulis pada tahun 1975, sejak tahun 1973 terlebih dahulu telah diceritakan ulang kepada teman-temannya.'),
(9, 'Belajar Framework Laravel', 'Aminudin', 'Loko Media', 4, 65000, 0x61612e6a7067, '233433224342', 'Umum', 'Indonesia', 'Belajar dasar-dasar framework laravel sampai studi kasus'),
(10, 'Bulid Web with Node JS', 'Piyas De', 'Java Code Geeks', 2, 80000, 0x4275696c64696e675f7765625f617070735f776974685f4e6f64655f6a732e6a7067, '234234355423', 'Umum', 'Inggris', 'Membuat website dengan nodejs'),
(11, 'Learn Ruby 24 Hours', 'Robert Dwight', 'Ascapela', 3, 70000, 0x353177582b50455339314c2e6a7067, '2131232233', 'Umum', 'Inggris', 'Belajar ruby selama 24 jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_transaksi` varchar(8) NOT NULL,
  `id` int(6) NOT NULL,
  `harga` int(6) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `total` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_transaksi`, `id`, `harga`, `jumlah`, `total`) VALUES
('41674776', 8, 90000, 1, 90000),
('22652885', 7, 70000, 1, 150000),
('22652885', 10, 80000, 1, 150000),
('83852649', 11, 70000, 2, 140000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(6) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_transaksi` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(12) NOT NULL,
  `bank_kami` text NOT NULL,
  `kirim_dari` varchar(50) NOT NULL,
  `tipe_order` varchar(50) NOT NULL,
  `nama_rek` varchar(50) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `nama_pembeli`, `email`, `no_transaksi`, `tanggal`, `nominal`, `bank_kami`, `kirim_dari`, `tipe_order`, `nama_rek`, `no_rek`, `pesan`) VALUES
(8, 'Agun Wiguna', 'wgnagun@gmail.com', '83852649', '2018-08-04', 140000, 'BNI Bandung. No. 465123678, a/n Agun Wiguna', 'BRI', 'ATM', 'Agun Wiguna', '234234234234', 'Lunas bruh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(6) NOT NULL,
  `nama_pembeli` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `level` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email`, `username`, `password`, `no_telp`, `alamat`, `level`) VALUES
(1, 'Admin Lapak', 'info@lapakbuku.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '082316369078', 'Bandung', 'admin'),
(16, 'Agun Wiguna', 'wgnagun@gmail.com', 'agunwgn', 'd8578edf8458ce06fbc5bb76a58c5ca4', '082345678654', 'Dusun Cikatomas RT 04 / RW 03,\\r\\nDesa Gunungsari,\\r\\nKecamatan Sadananya\\r\\nKabupaten Ciamis 46256', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(8) NOT NULL,
  `id_pembeli` int(6) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `total_harga` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `id_pembeli`, `tanggal_beli`, `total_harga`, `status`) VALUES
('83852649', 16, '2018-08-04', '140000', 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
