-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2022 pada 04.41
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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'Artikel Januari Minggu Pertama', '<p>Isi Artikel Januari Minggu Pertama hehe</p>', '61e9128456ab2.jpg', '2022-01-20 07:47:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `nama_pendonasi` varchar(200) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `id_kucing` int(11) NOT NULL,
  `nominal` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(60, 'lokal', 'Berat 5kg,umur  8 bln,kelamin jantan,jenis bulu long hair ekor kemoceng,kondisi sudah di steril dan vaksin 3x.', 1, '61e2ea97bea75.png'),
(61, 'persia', 'persia', 1, '61e3dd289e3f5.png'),
(62, 'lokal satu', 'lokal satu', 1, '61e3dd449f7b8.png'),
(63, 'anggora dua', 'anggora dua', 1, '61e3dd6029397.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `gmail` varchar(300) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `gmail`, `level`) VALUES
(2, 'reza irfan wijaya', '$2y$10$YG.PIYmZb/7yCks1eZnAjuO3Ma7rlnx2oDUJGCu3orzb2lCNIzZ72', 'reza@gmail.com', 'user'),
(9, 'reza', '$2y$10$pQa8.dMjk.C6cwG8SiYtMeCahAG43qXgY2gMMnpkFhdAxUFB4m.xW', 'reza@gmail.com', 'user'),
(10, 'abdas', '$2y$10$AINqbT.jsg9adO/DMH3X6u6Nl3PBtWzYanJuLePm24SMnzZhZ15tC', '1@gmail.com', 'user'),
(11, 'reza irfan', '$2y$10$zSGefWuFUMQgE9QbRCwMxOA06TNIWsWGlvNwOkjtpRZXWcLLWV1ti', '1@gmail.com', 'user'),
(12, 'ifan', '$2y$10$g77YqdkyPYJTLVe9Q0BVQ.oYNdJJ/vV5PMB9rf3hWkTS3.u4xywb2', '1@gmail.com', 'user'),
(13, 'admin', '$2y$10$dFqUBs8mQPD8E2p/pjK6PeOBJDnOzHIaYtGkOD3ko1FHEv3s/Bq5G', 'admin@gmail.com', 'admin'),
(14, 'abc', '$2y$10$Gsmkz61.hBQQDW0/9ROiS.C/1bGt8BqZoPdNTinE71uCqBqoJR4BS', 'abc@gmail.com', 'user'),
(15, 'reza ipang reza ipin', '$2y$10$dkblmSGEIFi.naDrnGh0YetMx/nG9vlEhq42HQ6uHwEZPq89AXwNG', 'rezaipangrezaipin@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  ADD PRIMARY KEY (`id_adopsi`),
  ADD KEY `fk_adopsi_kucing` (`id_kucing`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `fk_donasi_kucing` (`id_kucing`);

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
  MODIFY `id_adopsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kucing`
--
ALTER TABLE `kucing`
  MODIFY `id_kucing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  ADD CONSTRAINT `fk_adopsi_kucing` FOREIGN KEY (`id_kucing`) REFERENCES `kucing` (`id_kucing`);

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `fk_donasi_kucing` FOREIGN KEY (`id_kucing`) REFERENCES `kucing` (`id_kucing`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
