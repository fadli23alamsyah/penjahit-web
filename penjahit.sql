-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2020 pada 11.59
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjahit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_akun` varchar(22) NOT NULL,
  `nik_akun` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_profil` varchar(22) NOT NULL,
  `hak_akses` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username`, `password`, `nama_akun`, `nik_akun`, `alamat`, `foto_profil`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Pajai\'', '7371112312980001', 'btn bkp c/23', '', '@dm1n'),
(2, 'putri', '4093fed663717c843bea100d17fb67c8', 'Putri', '12121212121', 'Sudiang', '5d06388609953.png', 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_pakaian`
--

CREATE TABLE `tb_daftar_pakaian` (
  `id_pakaian` int(11) NOT NULL,
  `nama_pakaian` varchar(22) NOT NULL,
  `kategori_pakaian` varchar(22) NOT NULL,
  `ukuran_pakaian` varchar(11) NOT NULL,
  `harga_jual` int(22) NOT NULL,
  `gambar_jual` varchar(22) NOT NULL,
  `status_post` varchar(11) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar_pakaian`
--

INSERT INTO `tb_daftar_pakaian` (`id_pakaian`, `nama_pakaian`, `kategori_pakaian`, `ukuran_pakaian`, `harga_jual`, `gambar_jual`, `status_post`, `tgl_upload`) VALUES
(1, 'Cetar Emas', 'Kebaya', 'L', 400000, '1.jpg', 'terjual', '2019-05-12'),
(2, 'Cetar Ungu', 'Blouse', 'M', 350000, '2.jpg', 'aktif', '2019-05-12'),
(3, 'Emas Hitam', 'Batik', 'L', 250000, '3.jpg', 'aktif', '2019-05-12'),
(4, 'Hitam Manis', 'Kebaya', 'L', 370000, '4.jpg', 'aktif', '2019-05-12'),
(5, 'The Pink', 'Gamis', 'L', 240000, '5.jpg', 'aktif', '2019-05-12'),
(6, 'Pink Flower', 'Kebaya', 'M', 340000, '6.jpg', 'aktif', '2019-05-12'),
(7, 'Blouse', 'Batik', 'L', 400000, '7.jpg', 'aktif', '2019-05-12'),
(8, 'Pink Ikat Lucu', 'Gamis', 'M', 460000, '8.jpg', 'aktif', '2019-05-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jahitan`
--

CREATE TABLE `tb_jahitan` (
  `id_jahitan` int(22) NOT NULL,
  `nik_akun` varchar(16) NOT NULL,
  `lebar_pundak` int(22) NOT NULL,
  `kerung_lengan` int(22) NOT NULL,
  `pergelangan_tangan` int(22) NOT NULL,
  `panjang_lengan` int(22) NOT NULL,
  `lingkar_badan` int(22) NOT NULL,
  `lingkar_pinggang` int(22) NOT NULL,
  `lingkar_pinggul` int(22) NOT NULL,
  `panjang_punggung` int(22) NOT NULL,
  `panjang_baju` int(22) NOT NULL,
  `gambar_desain` varchar(22) NOT NULL,
  `jenis_kain` varchar(22) NOT NULL,
  `panjang_kain` int(22) NOT NULL,
  `desain_tambahan` longtext NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_penyelesaian` date NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jahitan`
--

INSERT INTO `tb_jahitan` (`id_jahitan`, `nik_akun`, `lebar_pundak`, `kerung_lengan`, `pergelangan_tangan`, `panjang_lengan`, `lingkar_badan`, `lingkar_pinggang`, `lingkar_pinggul`, `panjang_punggung`, `panjang_baju`, `gambar_desain`, `jenis_kain`, `panjang_kain`, `desain_tambahan`, `tgl_pesan`, `tgl_penyelesaian`, `status`) VALUES
(1, '12121212121', 1, 1, 1, 1, 1, 1, 1, 1, 12, '1', '1', 1, '1', '2019-06-28', '2019-07-09', 'Selesai'),
(2, '12121212121', 11, 13, 12, 23, 23, 23, 23, 20, 13, '5cfe79ec84b3d.png', 'wol', 12, 'menambahkan pernak pernik', '2019-06-07', '2019-07-11', ''),
(3, '12121212121', 12, 12, 12, 21, 12, 12, 12, 12, 12, '5d22e77b13d93.png', 'balotelli', 200, 'pake payet', '2019-07-08', '2019-07-17', 'Dikerjakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `nik_akun` varchar(16) NOT NULL,
  `komentar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `nik_akun`, `komentar`) VALUES
(1, '12121212121', 'Pelayanan sangat baik dan hasilnya memuaskan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(22) NOT NULL,
  `nik_akun` varchar(16) NOT NULL,
  `pilihan` varchar(22) NOT NULL,
  `gambar_baju` varchar(22) NOT NULL,
  `harga_pakaian` int(22) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `konfirmasi_transaksi` varchar(22) NOT NULL,
  `gambar_bukti_transaksi` varchar(22) NOT NULL,
  `id_jahitan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nik_akun`, `pilihan`, `gambar_baju`, `harga_pakaian`, `tgl_transaksi`, `konfirmasi_transaksi`, `gambar_bukti_transaksi`, `id_jahitan`) VALUES
(1, '12121212121', 'Beli', '1.jpg', 400000, '2019-06-10', 'Dikonfirmasi', '5cfe7a94a876f.png', ''),
(2, '12121212121', 'Jahit', '5d189b2882aed.png', 300000, '0000-00-00', '', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tb_daftar_pakaian`
--
ALTER TABLE `tb_daftar_pakaian`
  ADD PRIMARY KEY (`id_pakaian`);

--
-- Indeks untuk tabel `tb_jahitan`
--
ALTER TABLE `tb_jahitan`
  ADD PRIMARY KEY (`id_jahitan`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_pakaian`
--
ALTER TABLE `tb_daftar_pakaian`
  MODIFY `id_pakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_jahitan`
--
ALTER TABLE `tb_jahitan`
  MODIFY `id_jahitan` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
