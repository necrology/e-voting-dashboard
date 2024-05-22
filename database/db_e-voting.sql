-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2021 pada 08.44
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
-- Database: `db_e-voting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) DEFAULT NULL,
  `admin_jenkel` varchar(2) DEFAULT NULL,
  `admin_username` varchar(30) DEFAULT NULL,
  `admin_password` varchar(35) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_nohp` varchar(20) DEFAULT NULL,
  `admin_status` int(2) DEFAULT 1,
  `admin_level` varchar(3) DEFAULT NULL,
  `admin_register` timestamp NULL DEFAULT current_timestamp(),
  `admin_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_jenkel`, `admin_username`, `admin_password`, `admin_email`, `admin_nohp`, `admin_status`, `admin_level`, `admin_register`, `admin_photo`) VALUES
(2, 'Admin', 'L', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '08999228241', 1, '1', '2020-08-18 02:23:29', 'admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_calonketuart`
--

CREATE TABLE `tbl_calonketuart` (
  `id_calon` int(11) NOT NULL,
  `nama_calon` varchar(20) NOT NULL,
  `noNik_calon` varchar(20) NOT NULL,
  `noKK_calon` varchar(20) NOT NULL,
  `photo_calon` varchar(200) NOT NULL,
  `jenisKelamin_calon` varchar(10) NOT NULL,
  `tempatLahir_calon` varchar(20) NOT NULL,
  `tglLahir_calon` date NOT NULL,
  `umur_calon` varchar(10) NOT NULL,
  `agama_calon` varchar(10) NOT NULL,
  `calonNo_urut` varchar(5) NOT NULL,
  `visi_calon` text NOT NULL,
  `misi_calon` text NOT NULL,
  `rt` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil_pemilihan`
--

CREATE TABLE `tbl_hasil_pemilihan` (
  `hasil_pemilihan_id` int(11) NOT NULL,
  `hasil_pemilihan_rt` varchar(5) NOT NULL,
  `calon_noUrut` varchar(5) NOT NULL,
  `nik_calon` varchar(20) NOT NULL,
  `hasil_pemilihan_calon` varchar(20) NOT NULL,
  `hasil_pemilihan_suara` int(10) NOT NULL,
  `hasil_pemilihan_golput` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_pemilihan`
--

CREATE TABLE `tbl_jadwal_pemilihan` (
  `id` int(11) NOT NULL,
  `rt_pemilih` varchar(5) DEFAULT NULL,
  `mulai` varchar(20) DEFAULT NULL,
  `selesai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemilih`
--

CREATE TABLE `tbl_pemilih` (
  `id_pemilih` int(10) NOT NULL,
  `nama_pemilih` varchar(20) NOT NULL,
  `noNik_pemilih` varchar(20) NOT NULL,
  `noKK_pemilih` varchar(20) NOT NULL,
  `jenisKelamin_pemilih` varchar(10) NOT NULL,
  `tempatLahir_pemilih` varchar(20) NOT NULL,
  `tglLahir_pemilih` varchar(10) NOT NULL,
  `tahunMenetap_pemilih` varchar(10) NOT NULL,
  `agama_pemilih` varchar(10) NOT NULL,
  `umur_pemilih` varchar(5) NOT NULL,
  `statusKeluarga_pemilih` varchar(20) NOT NULL,
  `rt_pemilih` varchar(5) NOT NULL,
  `nilai_PmPemilih` varchar(10) NOT NULL,
  `izin_pemilih` varchar(20) NOT NULL,
  `statusMemilih_pemilih` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pemilih`
--

INSERT INTO `tbl_pemilih` (`id_pemilih`, `nama_pemilih`, `noNik_pemilih`, `noKK_pemilih`, `jenisKelamin_pemilih`, `tempatLahir_pemilih`, `tglLahir_pemilih`, `tahunMenetap_pemilih`, `agama_pemilih`, `umur_pemilih`, `statusKeluarga_pemilih`, `rt_pemilih`, `nilai_PmPemilih`, `izin_pemilih`, `statusMemilih_pemilih`) VALUES
(49, 'Maulana Gandawijaya', '12345678231', '12345678321', 'L', 'bogor', '1996-07-19', '2003-09-19', 'islam', '25', 'Kepala Keluarga', '1', '5', 'diizinkan', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_judul` varchar(200) DEFAULT NULL,
  `pengumuman_isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_calonketuart`
--
ALTER TABLE `tbl_calonketuart`
  ADD PRIMARY KEY (`id_calon`),
  ADD UNIQUE KEY `nik` (`noNik_calon`),
  ADD KEY `noNik_calon` (`noNik_calon`);

--
-- Indeks untuk tabel `tbl_hasil_pemilihan`
--
ALTER TABLE `tbl_hasil_pemilihan`
  ADD PRIMARY KEY (`hasil_pemilihan_id`),
  ADD UNIQUE KEY `nik` (`nik_calon`);

--
-- Indeks untuk tabel `tbl_jadwal_pemilihan`
--
ALTER TABLE `tbl_jadwal_pemilihan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rt` (`rt_pemilih`);

--
-- Indeks untuk tabel `tbl_pemilih`
--
ALTER TABLE `tbl_pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD UNIQUE KEY `nik` (`noNik_pemilih`);

--
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_calonketuart`
--
ALTER TABLE `tbl_calonketuart`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil_pemilihan`
--
ALTER TABLE `tbl_hasil_pemilihan`
  MODIFY `hasil_pemilihan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal_pemilihan`
--
ALTER TABLE `tbl_jadwal_pemilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemilih`
--
ALTER TABLE `tbl_pemilih`
  MODIFY `id_pemilih` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
