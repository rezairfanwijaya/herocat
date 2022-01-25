-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2022 pada 15.40
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herocat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adopsi`
--

CREATE TABLE `adopsi` (
  `id_adopsi` int(11) NOT NULL,
  `pengadopsi` varchar(200) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `id_kucing` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `adopsi`
--

INSERT INTO `adopsi` (`id_adopsi`, `pengadopsi`, `no_telepon`, `alamat`, `id_kucing`, `id_user`, `tanggal`) VALUES
(1, 'reza', 1234, 'cilacap', 66, 2, '2022-01-25 14:32:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `konten`, `gambar`, `tanggal`) VALUES
(3, 'Atikel Ke Tiga Diedit', '<p>isi artikel ke tiga</p>', '61e43ff7579d4.png', '2022-01-19 04:53:56'),
(4, 'Artikel Ke Empat ', '<p>isi artikel ke empat diedit</p>', '61e588f860d02.png', '2022-01-17 15:19:27'),
(11, 'Artikel Januari', '<p>isi artikel januari</p>', '61e79c1d3d747.png', '2022-01-19 05:05:33'),
(13, 'Artikel Januari Minggu Pertama', '<p>Isi Artikel Januari Minggu Pertama hehe diedit</p>', '61e9128456ab2.jpg', '2022-01-25 14:21:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `nama_pendonasi` varchar(200) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `nominal` int(11) DEFAULT NULL,
  `rekening` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `nama_pendonasi`, `no_telpon`, `nominal`, `rekening`, `id_user`, `bank`, `tanggal`) VALUES
(1, 'reza', '432534345', 90000000, 2147483647, 2, 'BNI', '2022-01-25 14:40:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kucing`
--

CREATE TABLE `kucing` (
  `id_kucing` int(11) NOT NULL,
  `jenis_kucing` varchar(50) NOT NULL,
  `deskripsi_kucing` text NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kucing`
--

INSERT INTO `kucing` (`id_kucing`, `jenis_kucing`, `deskripsi_kucing`, `stok`, `gambar`) VALUES
(66, 'anggora', 'Berat 5kg,umur 8 bln,kelamin jantan,jenis bulu long hair ekor kemoceng,kondisi sudah di steril dan vaksin 3x.', 0, '61f0046502194.png'),
(67, 'lokal di edit', 'Berat 5kg,umur 8 bln,kelamin jantan,jenis bulu long hair ekor kemoceng,kondisi sudah di steril dan vaksin 3x.', 1, '61f007548ef87.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `gmail` text DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `gmail`, `level`, `tanggal`) VALUES
(1, 'admin', '$2y$10$X7p4uhvwxjbQrqszQXiaHOO3bEaUPn2s62p.HeDJynBDl/sQzPpIW', 'admin@gmail.com', 'admin', '2022-01-25 14:27:30'),
(2, 'reza ', '$2y$10$VYU8t/W/5YeKpohMnxkfeuoVOBBrFJ/5y.wWzbYOnt6x4p29Pibgm', 'reza@gmail.com', 'user', '2022-01-25 14:28:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  ADD PRIMARY KEY (`id_adopsi`),
  ADD KEY `fk_adopsi_kucing` (`id_kucing`),
  ADD KEY `fk_adopsi_user` (`id_user`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indeks untuk tabel `kucing`
--
ALTER TABLE `kucing`
  ADD PRIMARY KEY (`id_kucing`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  MODIFY `id_adopsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kucing`
--
ALTER TABLE `kucing`
  MODIFY `id_kucing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  ADD CONSTRAINT `fk_adopsi_kucing` FOREIGN KEY (`id_kucing`) REFERENCES `kucing` (`id_kucing`),
  ADD CONSTRAINT `fk_adopsi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
