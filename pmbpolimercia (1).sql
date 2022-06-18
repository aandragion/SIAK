-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2022 pada 04.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmbpolimercia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_mhs`
--

CREATE TABLE `berkas_mhs` (
  `id_bksmhs` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `ijazah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akta_lhr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dosen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jns_kelamin_dsn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir_dsn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir_dsn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_dsn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_dsn` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_dsn` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nik`, `nidn`, `nama_dosen`, `jabatan`, `jns_kelamin_dsn`, `tempat_lahir_dsn`, `tgl_lahir_dsn`, `alamat_dsn`, `tlp_dsn`, `pendidikan`, `photo_dsn`, `created_at`, `updated_at`) VALUES
(1, '21412', '51215125', 'Sumiati', 'Baru', 'Perempuan', 'Kediri', '2022-05-06', 'Pattimura', '412412521', 'S2', '1653896814.jpg', NULL, '2022-05-30 00:46:54'),
(100, '21412', '51215125', 'Belum Diketahui', 'Belum', 'Belum', 'Belum', 'Belum', 'Belum', 'Belum', 'Belum', '', NULL, NULL),
(101, '1232932910', '3214314', 'Tegar', 'Baru', 'Laki-Laki', 'Surabaya', '2022-05-23', 'Kediri', '0303003', 'S3', '1653896743.jpg', '2022-05-22 20:12:58', '2022-05-30 00:45:43'),
(102, '1232932910', '3214314', 'Sulis', 'Baru', 'Perempuan', 'Tegal', '2022-05-25', 'Kediri', '3231321231', 'S2', '1653896672.png', '2022-05-22 20:14:15', '2022-05-30 00:44:32'),
(113, '31', '431', '4132', '4321', 'Laki-Laki', '3414', '2022-05-10', '3413', '3143', '1342', '1653896258.jpg', '2022-05-30 00:13:33', '2022-05-30 00:37:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_kmatkul` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `kelas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kmatkul`, `id`, `id_dosen`, `kelas`, `hari`, `jam_mulai`, `jam_selesai`, `kapasitas`, `created_at`, `updated_at`) VALUES
(10, 2, 1, 1, 'ABC', 'Kamis', '09:13', '09:12', '50', '2022-04-06 19:10:30', '2022-04-10 19:31:50'),
(14, 5, 1, 1, 'Mat 4', 'Rabu', '10:13', '10:13', '30', '2022-04-10 20:11:43', '2022-04-10 21:33:57'),
(15, 5, 2, 1, 'kelas akun', 'Rabu', '01:21', '02:22', '20', '2022-04-10 20:19:09', '2022-04-12 17:38:52'),
(16, 2, 1, 101, 'D', 'Senin', '07:15', '16:00', '33', '2022-05-22 19:34:00', '2022-05-22 20:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_programstudi` int(11) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` int(10) UNSIGNED NOT NULL,
  `jenjang` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_semester` int(11) NOT NULL,
  `angkatan_prodi` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_programstudi`, `kode_jurusan`, `nama_jurusan`, `id_fakultas`, `jenjang`, `jumlah_semester`, `angkatan_prodi`, `created_at`, `updated_at`) VALUES
(31, '55401', 'Kebidanan', 1, 'D3', 8, 4, '2021-09-09 01:14:06', '2022-03-29 18:16:29'),
(32, '62401', 'Akuntansi', 2, 'D3', 6, 4, '2021-09-09 01:14:32', '2022-03-29 18:16:37'),
(33, '15401', 'Teknologi Informasi', 3, 'D3', 6, 4, '2021-09-09 01:15:03', '2022-05-22 20:00:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_mhs`
--

CREATE TABLE `kesehatan_mhs` (
  `id_kesehatanmhs` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `gdarah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rpenyakit` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tb` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bb` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kmatkul`
--

CREATE TABLE `kmatkul` (
  `id_kmatkul` bigint(20) UNSIGNED NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `semester` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kmatkul`
--

INSERT INTO `kmatkul` (`id_kmatkul`, `id_matkul`, `id_kurikulum`, `semester`, `created_at`, `updated_at`) VALUES
(2, 3, 4, '1', '2022-04-04 17:00:00', '2022-04-04 17:00:00'),
(5, 7, 5, '2', '2022-04-05 00:04:42', '2022-04-05 00:04:42'),
(6, 7, 5, '3', '2022-04-11 21:05:38', '2022-04-11 21:05:38'),
(16, 1, 4, '1', '2022-04-12 17:33:17', '2022-04-12 17:33:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_snilai` int(11) DEFAULT NULL,
  `uts` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_krs` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_jadwal`, `id_mhs`, `id_snilai`, `uts`, `uas`, `tugas`, `status_krs`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 2, '90', '90', '100', 'acc', NULL, '2022-06-09 19:32:49'),
(2, 16, 1, NULL, NULL, NULL, NULL, 'acc', NULL, '2022-06-09 19:32:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` bigint(20) UNSIGNED NOT NULL,
  `id_programstudi` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `nama_kurikulum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `id_programstudi`, `id_periode`, `nama_kurikulum`, `created_at`, `updated_at`) VALUES
(4, 33, 1, 'Kurikulum 2021', '2022-03-27 23:53:42', '2022-06-02 21:34:46'),
(5, 32, 1, 'Kurikulum 2022', '2022-03-30 23:31:57', '2022-05-22 20:47:59'),
(9, 33, 2, 'Kurikulum 2023', '2022-05-22 20:24:39', '2022-05-22 20:24:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) UNSIGNED NOT NULL,
  `nim` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `nama_mhs` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jns_kelamin` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_programstudi` int(11) DEFAULT NULL,
  `angkatan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dusun` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jns_tinggal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alat_tranportasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_saudara` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_jalurmasuk` int(11) DEFAULT NULL,
  `kps` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smt_mahasiswa` int(11) DEFAULT NULL,
  `bayar_mhs` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `id`, `nama_mhs`, `tempat_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `id_programstudi`, `angkatan`, `no_tlp`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `jns_tinggal`, `alat_tranportasi`, `email`, `nik`, `nisn`, `npwp`, `kewarganegaraan`, `photo`, `status`, `anak_ke`, `jml_saudara`, `id_jalurmasuk`, `kps`, `smt_mahasiswa`, `bayar_mhs`, `created_at`, `updated_at`) VALUES
(1, '2123213', 0, 'Mahasiswa Polimercia', 'Kediri', '2021-04-26', 'Laki-Laki', 'Islam', 33, '2021', '081234567890', 'Jl. Dr.Saharjo IIIB No.16', '014', '003', 'Campurejo', 'Campurejo', 'Mojoroto', '64116', NULL, NULL, 'info@polimercia.com', '35012345678901', '1012345678901', '390123456789', 'Indonesia', NULL, 'Aktif', '', '', 0, '', 1, 'LUNAS', '2022-03-29 19:47:53', '2022-05-30 21:05:56'),
(2, '2115401001', 89, 'A\'ISNA DELLA RAHMAWATI', 'TULUNGAGUNG', '21 FEBRUARI 2003', 'Perempuan', 'ISLAM', 31, '2021', '85784304781', 'DUSUN KRAJAN - DESA PANDANSARI - KECAMATAN NGUNUT - KAB.TULUNGAGUNG RT 15 RW 04', '15', '4', 'DUSUN KRAJAN', 'DESA PANDANSARI', 'KECAMATAN NGUNUT', NULL, NULL, NULL, 'rahmawatidella564@gmail.com', '350411610203001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:24', '2022-05-29 18:15:00'),
(3, '2115401002', 90, 'CITRA DIAH AYU KUSUMA', 'TULUNGAGUNG', '18 MARET 2003', 'Perempuan', 'ISLAM', 31, '2021', '85785589687', 'DUSUN GENENGAN - DESA SAWO KECAMATAN CAMPUR DARAT KAB TULUNGAGUNG RT 09 RW 03', '9', '3', 'DUSUN GENENGAN', 'DESA SAWO', 'KECAMATAN CAMPUR', NULL, NULL, NULL, 'citradiahayu1@.com', '3504165803030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:24', '2022-05-19 18:41:24'),
(4, '2115401003', 91, 'GRACE LORENSIA TUPANO', 'KEDIRI', '37722', 'Perempuan', 'Kristen Protestan', 31, '2021', '85895472791', 'DUSUN BULAK - DESA BLIMBING - KECAMATAN TAROKAN - KAB. KEDIRI RT 02 RW 07', '2', '7', 'DUSUN BULAK', 'DESA BLIMBING', 'KECAMATAN TAROKAN', NULL, NULL, NULL, 'gracelorensiaa@gmail.com', '3506205104030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:24', '2022-05-19 18:41:24'),
(5, '2115401004', 92, 'KHAIRATUNNISA ABADIYAH', 'KULON PROGO', '05 JUNI 2002', 'Perempuan', 'ISLAM', 31, '2021', '89697142306', 'DESA BADAL PANDEAN - KECAMATAN NGADILUWIH - KABUPATEN KEDIRI RT 1 RW 1', '1', '1', 'DESA BADAL PANDEAN', 'DESA BADAL PANDEAN', 'KECAMATAN NGADILUWIH', NULL, NULL, NULL, 'nisaabadiah929@gmail.com', '3506044506020000', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:24', '2022-05-20 01:18:47'),
(6, '2115401005', 93, 'NABELLA FITRIA NINGRUM', 'BLITAR', '03 JANUARI 2003', 'Perempuan', 'ISLAM', 31, '2021', '82331743054', 'DUSUN REJOSARI - DESA NGORAN - KECAMATAN NGLEGOK - KAB. BLITAR RT 03 RW 01', '3', '1', 'DUSUN REJOSARI', 'DESA NGORAN', 'KECAMATAN NGLEGOK', NULL, NULL, NULL, 'nabella630@gmail.com', '3505094301030004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:24', '2022-05-19 18:41:24'),
(7, '2115401006', 94, 'NURDYANA YUNITA SARI', 'BLITAR', '30 JUNI 2003', 'Perempuan', 'ISLAM', 31, '2021', '85855211763', 'Ds Modangan RT 1 RW 2 Kec Nglegok Kab Blitar', '1', '2', 'Ds Modangan', 'Ds Modangan', 'Kec Nglegok', NULL, NULL, NULL, 'Opponita072@gmail.com', '3505097006030001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(8, '2115401007', 95, 'PUTRI KURNIA SARI', 'NGANJUK', '24 MEI 2003', 'Perempuan', 'ISLAM', 31, '2021', '0852 3270 5378', 'DUSUN BANGKAK - DESA PINGGIR - KECAMATAN LENGKONG - KAB. NGANJUK RT 02 RW 02', '2', '2', 'DUSUN BANGKAK', 'DESA PINGGIR', 'KECAMATAN LENGKONG', NULL, NULL, NULL, 'putrikurniasari20140@gmail.com', '3518196405030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(9, '2115401008', 96, 'SITI HAJAR FATIMAH', 'NGANJUK', '37516', 'Perempuan', 'ISLAM', 31, '2021', '85706694172', 'DUSUN SUMBERWUNGU- DESA BANJARANYAR- KECAMATAN TANJUNGANOM- KAB. NGANJUK RT 004 RW 002', '4', '2', 'DUSUN SUMBERWUNGU', 'DESA BANJARANYAR', 'KECAMATAN TANJUNGANOM', NULL, NULL, NULL, 'hajarfatimah92@gmail.com', '3518115709020004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(10, '2115401009', 97, 'TUNGGAL PANGESTU', 'KEDIRI', '29 JUNI 2003', 'Perempuan', 'ISLAM', 31, '2021', '085 648 400 651', 'DUSUN SUROWONO - DESA CANGGU - KECAMATAN BADAS - KABUPATEN KEDIRI RT 002 RW 023', '2', '23', 'DUSUN SUROWONO', 'DESA CANGGU', 'KECAMATAN BADAS', NULL, NULL, NULL, 'tunggalpangestu705@gmail.com', '3506262906030003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(11, '2162401001', 98, 'AMELIA RACHMAWATI AYUNINGTIAS', 'KEDIRI', '37520', 'Perempuan', 'ISLAM', 32, '2021', '0858 0748 3761', 'DUSUN BULUSAN DESA BULU KECAMATAN SEMEN KAB. KEDIRI RT 03 RW 05', '3', '5', 'DUSUN BULUSAN', 'DESA BULU', 'KECAMATAN SEMEN', NULL, NULL, NULL, 'ameliatias212@gmail.com', '3506016109020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(12, '2162401002', 99, 'ANDINI MUTIARA SEPTI', 'KEDIRI', '37513', 'Perempuan', 'ISLAM', 32, '2021', '0858 9573 2033', 'DESA TAMBAKREJO - KECAMATAN GURAH - KAB. KEDIRI RT 01 RW 02', '1', '2', 'DESA TAMBAKREJO', 'DESA TAMBAKREJO', 'KECAMATAN GURAH', NULL, NULL, NULL, 'mutiaraandini1402@gmail.com', '3506105409020003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(13, '2162401003', 100, 'ANGGI EKA PUTRI', 'KEDIRI', '38245', 'Perempuan', 'ISLAM', 32, '2021', '0856 4926 9847', 'DUSUN KALASAN - DESA JARAK - KECAMATAN PLOSOKLATEN - KAB. KEDIRI RT 002 RW. 009', '2', '9', 'DUSUN KALASAN', 'DESA JARAK', 'KECAMATAN PLOSOKLATEN', NULL, NULL, NULL, 'anggiekaputri123@gmail.com', '3506095509040002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(14, '2162401004', 101, 'ARGARETA ERFIANA PUTRI', 'KEDIRI', '18 MARET 2003', 'Perempuan', 'ISLAM', 32, '2021', '0877 8538 8091', 'DUSUN MARGOSARI - DESA BANYAKAN - KECAMATAN BANYAKAN - KAB.KEDIRI RT 04 RW 02', '4', '2', 'DUSUN MARGOSARI', 'DESA BANYAKAN', 'KECAMATAN BANYAKAN', NULL, NULL, NULL, 'argaretacell303@gmail.com', '3506225803030001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(15, '2162401005', 102, 'BAYU FAJAR PRATAMA', 'KEDIRI', '37366', 'Laki-laki', 'ISLAM', 32, '2021', '0858 1653 4701', 'DUSUN SAMBIREJO - DESA TIRON - KECAMATAN BANYAKAN - KAB. KEDIRI RT 01 RW 01', '1', '1', 'DUSUN SAMBIREJO', 'DESA TIRON', 'KECAMATAN BANYAKAN', NULL, NULL, NULL, 'BAYUFAJAR060@GMAIL.COM', '3506222004020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(16, '2162401006', 103, 'DILA PUTRI ANGGRAINI', 'KEDIRI', '27 MEI 2003', 'Perempuan', 'ISLAM', 32, '2021', '0858 5487 8562', 'DUSUN DULURAN - DESA GEDANGSEWU - KECAMATAN PARE - KAB. KEDIRI RT 04 RW 13', '4', '3', 'DUSUN DULURAN', 'DESA GEDANGSEWU', 'KECAMATAN PARE', NULL, NULL, NULL, 'dilaputeri57@gmail.com', '3506176705030004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(17, '2162401007', 104, 'ELISA LINDA PUTRI', 'KEDIRI', '09 OKTOBER 2001', 'Perempuan', 'ISLAM', 32, '2021', '0816 1521 0605', 'DUSUN MARGOJOYO - DESA JABANG - KECAMATAN KRAS - KAB KEDIRI RT 25 RW 09', '25', '9', 'DUSUN MARGOJOYO', 'DESA JABANG', 'KECAMATAN KRAS', NULL, NULL, NULL, 'elisalindaputri@gmail.com', '3506034910010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(18, '2162401009', 105, 'GALIH YULIANTO', 'MADIUN', '13 JULI 2002', 'Laki-laki', 'ISLAM', 32, '2021', '85735581226', 'DUSUN SEMEN - DESA DATENGAN- KECAMATAN GROGOL - KAB. KEDIRI RT 09 RW 04', '9', '4', 'DUSUN SEMEN', 'DESA DATENGAN', 'KECAMATAN GROGOL', NULL, NULL, NULL, 'galihyulianto1307@gmail.com', '3506131307020002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:25', '2022-05-19 18:41:25'),
(19, '2162401010', 106, 'LOUIS WIDIATMA EDYTIA PUTRA', 'TULUNGAGUNG', '37199', 'Laki-laki', 'KATOLIK', 32, '2021', '0858 7265 8591', 'DUSUN . JAJAR- REJOTANGAN- KECAMATAN REJOTANGAN-KAB TULUNGAGUNG RT 03 RW 02*', '3', '2', 'DUSUN . JAJAR', 'REJOTANGAN', 'KECAMATAN REJOTANGAN', NULL, NULL, NULL, '@louiswidiatma.@gmail.com', '3504130411010003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(20, '2162401011', 107, 'LULUK APRILIA', 'NGANJUK', '37713', 'Perempuan', 'ISLAM', 32, '2021', '87877058388', 'DUSUN GAREMAN - DESA BABADAN - KECAMATAN PATIANROWO - KAB. NGANJUK RT 12 RW 03', '12', '3', 'DUSUN GAREMAN', 'DESA BABADAN', 'KECAMATAN PATIANROWO', NULL, NULL, NULL, 'aprilialuluk254@gmail.com', '3518094204030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(21, '2162401012', 108, 'NIKI WULAN SEPTIARI', 'KEDIRI', '37506', 'Perempuan', 'ISLAM', 32, '2021', '0858 9534 2381', 'DUSUN KWAGEAN - DESA KRENCENG - KECAMATAN KEPUNG - KABUPATEN KEDIRI - RT: 18 - RW: 06', '18', '6', 'DUSUN KWAGEAN', 'DESA KRENCENG', 'KECAMATAN KEPUNG', NULL, NULL, NULL, 'nikysepty@gmail.com', '350618470920002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(22, '2162401014', 109, 'TRISFIRDAONA RASHAMIDA IQDAM', 'KEDIRI', '01 MEI 2002', 'Perempuan', 'ISLAM', 32, '2021', '0899 0436 684', 'DUSUN DAWUNG -DESA BEDUG - KECAMATAN NGADILUWIH - KAB.KEDIRI RT 05 RW 02', '5', '2', 'DUSUN DAWUNG', 'DESA BEDUG', 'KECAMATAN NGADILUWIH', NULL, NULL, NULL, 'firdaona01@gmail.com', '3506044105020004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(23, '2162401015', 110, 'WAHYU PURNOMO', 'KEDIRI', '18 MARET 2003', 'Laki-laki', 'ISLAM', 32, '2021', '0852 3680 3756', 'DUSUN DAWUHAN - DESA KAWEDUSAN - KECAMATAN PLOSOKLATEN - KABUPATEN KEDIRI RT2 RW1', '2', '1', 'DUSUN DAWUHAN', 'DESA KAWEDUSAN', 'KECAMATAN PLOSOKLATEN', NULL, NULL, NULL, 'wahyupe2003@gmail.com', '3506091803030000', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(24, '2162401016', 111, 'YULINDA MUSDHALIFAH', 'KEDIRI', '06 JULI 2002', 'Perempuan', 'ISLAM', 32, '2021', '85730672339', 'JL.SINGONEGARAN TIMUR GG.2 RT.08 RW.02 KOTA KEDIRI', '8', '2', 'JL.SINGONEGARAN TIMUR', 'SINGONEGARAN', 'KOTA KEDIRI', NULL, NULL, NULL, 'yulindamusdalifah07@gmail.com', '3571034607020004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(25, '2155401001', 112, 'A MAULANA IBRAHIM', 'BLITAR', '30 JUNI 2002', 'Laki', 'ISLAM', 33, '2021', '0858 1527 8461', 'DSN KARANGTENGAH - DSA PIKATAN -KEC WONODADI - KAB. BLITAR', NULL, NULL, 'DSN KARANGTENGAH', 'DSA PIKATAN', 'KEC WONODADI', NULL, NULL, NULL, 'sohermaulana84@gmail.com', '3505013006020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(26, '2155401002', 113, 'ADINAN FATCHUR ROHMAN', 'BLITAR', '37732', 'Laki', 'ISLAM', 33, '2021', '0857 0705 9362', 'DESA TEGALASRI no.14 RT/RW:02/01 - KEC. WINGGI - KAB. BLITAR', '2', '1', 'DESA TEGALASRI', 'DESA TEGALASRI', 'KEC. WINGGI', NULL, NULL, NULL, 'adinan6960@gmail.com', '3505172104030001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(27, '2155401003', 114, 'AMILIA MUVITA', 'KEDIRI', '17 JUNI 2003', 'Perempuan', 'ISLAM', 33, '2021', '0822 2907 8367', 'KELURAHAN KETAMI - KECAMATAN PESANTREN - KOTA KEDIRI', NULL, NULL, 'KELURAHAN KETAMI', 'KELURAHAN KETAMI', 'KECAMATAN PESANTREN', NULL, NULL, NULL, '87.amilia@gmail.com', '3571035706030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(28, '2155401004', 115, 'ARUM SUNNI INDRIANI', 'TULUNGAGUNG', '16 JUNI 2003', 'Perempuan', 'ISLAM', 33, '2021', '0857 8404 9837', 'DUSUN JATIREJO- DESA TULUNGREJO- KEC. KARANGREJO KAB. TULUNGAGUNG RT/RW :03/01', '3', '1', 'DUSUN JATIREJO', 'DESA TULUNGREJO', 'KEC. KARANGREJO', NULL, NULL, NULL, 'arumsunnii@gmail.com', '3504085606030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(29, '2155401006', 116, 'GHIFARI AULIA AZHAR REZA', 'TULUNGAGUNG', '13 JANUARI 2003', 'Laki', 'ISLAM', 33, '2021', '0813 3240 1472', 'DUSUN KRAJAN-DESA KARANGREJO-KECAMATAN KARANGREJO-KABUPATEN TULUNGAGUNG RT 03 RW 02', '3', '2', 'DUSUN KRAJAN', 'DESA KARANGREJO', 'KECAMATAN KARANGREJO', NULL, NULL, NULL, 'azharreza87@gmail.com', '3504081301030001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(30, '2155401007', 117, 'IKHWAN NASA\'I MUSTOFA', 'SORONG', '27 FEBRUARI 2003', 'Laki', 'ISLAM', 33, '2021', '0813 3187 9198', 'DSN. WERU - DESA RINGINSARI - KEC. KANDAT - KAB. KEDIRI RT 03 RW 02', '3', '2', 'DSN. WERU', 'DESA RINGINSARI', 'KEC. KANDAT', NULL, NULL, NULL, 'ikhwayahoo123@gmail.com', '9201072702030001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:26', '2022-05-19 18:41:26'),
(31, '2155401012', 118, 'MUCHAMMAD MAULANA ABBIDEN', 'KEDIRI', '18 AGUSTUS 2002', 'Laki', 'ISLAM', 33, '2021', '0895 36726 1533', 'LINGKUNGAN BORO RT 12 RW 02 - KELURAHAN POJOK - KECAMATAN MOJOROTO - KOTA KEDIRI - KODE POS 64115', '12', '2', 'LINGKUNGAN BORO', 'KELURAHAN POJOK', 'KECAMATAN MOJOROTO', NULL, NULL, NULL, 'abidinmaulana515@gmail.com', '3571011808020003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 2, '', '2022-05-19 18:41:26', '2022-05-29 18:14:42'),
(32, '2155401013', 119, 'MUHAMAD ICHSAN', 'KEDIRI', '14 OKTOBER 2002', 'Laki', 'ISLAM', 33, '2021', '0821 1616 2087', 'DESA GAMPENG, KEC. GAMPENGREJO, KAB. KEDIRI RT/RW :02/01', '2', '1', 'DESA GAMPENG', NULL, ' KEC. GAMPENGREJO', NULL, NULL, NULL, 'Ichsanuciha@gmail.Com', '3506121410020007', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(33, '2155401014', 120, 'MUHAMMAD ALDI ZAKARYA', 'TANJUNG PINANG', '18 MEI 2002', 'Laki', 'ISLAM', 33, '2021', '85856487860', 'DSN. MOJOSARI RT/RW :02/02DS. MOJOAGUNG KEC. NGANTRU KAB.TULUNGAGUNG', '2', '2', 'DSN. MOJOSARI', 'DS. MOJOAGUNG', 'KEC. NGANTRU', NULL, NULL, NULL, 'maldizakarya3@gmail.com', '3504041805020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(34, '2155401015', 121, 'MUHAMMAD NAWAL ISHLAKH', 'KEDIRI', '24 FEBRUARI 2002', 'Laki', 'ISLAM', 33, '2021', '0877 4311 0137', 'JL KH HASYIM ASY\'ARI GG KENANGA RT2/RW8 - KELURAHAN BANJARMLATI - MOJOROTO - KOTA KEDIRI', '2', '8', 'JL KH HASYIM ASY\'ARI GG KENANGA', 'KELURAHAN BANJARMLATI', 'MOJOROTO', NULL, NULL, NULL, 'dawsonjack591@gmail.com', '3571012402020004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(35, '2155401016', 122, 'NILAM SARI', 'KEDIRI', '17 OKTOBER 2003', 'Perempuan', 'ISLAM', 33, '2021', '0812 3264 3022', 'DUSUN PLAOSAN- DESA PLAOSAN - KECAMATAN WATES - KABUPATEN KEDIRI RT.16 RW.04', '16', '14', 'DUSUN PLAOSAN', 'DESA PLAOSAN', 'KECAMATAN WATES', NULL, NULL, NULL, 'nilamkediri87@gmail.com', '3506065710030004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(36, '2155401011', 123, 'MOHAMMAD RAFLI SANJANI', 'MOJOKERTO', '14 OKTOBER 2002', 'Laki', 'ISLAM', 33, '2021', '0815 1566 7352', 'DSN.BELAHAN TENGAH .DS.BELAHAN TENGAH.KEC.MOJOSARI.KOTA MOJOKERTO', NULL, NULL, 'DSN.BELAHAN TENGAH', 'DS.BELAHAN TENGAH', 'KEC.MOJOSARI', NULL, NULL, NULL, 'raflibaik12@gmail.com', '3516081410020005', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(37, '2155401017', 124, 'REGINA EKAGUSTIN NURMILA SARI', 'DENPASAR', '01 AGUSTUS 2002', 'Perempuan', 'ISLAM', 33, '2021', '0855 3656 2650', 'DSN. GEMBONGAN I KEC. PONGGOK KAB BLITAR RT/RW : 04/01', '4', '1', 'DSN. GEMBONGAN I', NULL, 'KEC. PONGGOK', NULL, NULL, NULL, 'nurmilasari08808@gmail.com', '3510034108020003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(38, '2155401018', 125, 'RENDHI ANNORA RICHARD', 'TULUNGAGUNG', '37724', 'Laki', 'ISLAM', 33, '2021', '0812 3275 4785', 'Jl. SETADION Gang6 Rt001/Rw004 DESA KETANON KEC. KEDUNGWARU KAB. TULUNGAGUNG', '1', '4', 'Jl. SETADION Gang6', 'DESA KETANON', 'KEC. KEDUNGWARU', NULL, NULL, NULL, 'Rendhi Annora Richard', '3504031304030002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(39, '2155401019', 126, 'SANDY MUHAMMAD FARHAN', 'JAKARTA', '37936', 'Laki', 'ISLAM', 33, '2021', '0822 3369 4507', 'DUSUN BULUR - DESA NGERCO - KECAMATAN KANDAT - KAB. KEDIRI', NULL, NULL, 'DUSUN BULUR', 'DESA NGERCO', 'KECAMATAN KANDAT', NULL, NULL, NULL, 'farhansandy0@gmail.com', '3506051111030001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(40, '2155401020', 127, 'WHELDA PUTRI AULIA LESTARI', 'KEDIRI', '23 JANUARI 2003', 'Perempuan', 'ISLAM', 33, '2021', '0856 4959 0743', 'DUSUN NGAGLIK-DESA SURAT-KECAMATAN MOJO-KAB.KEDIRI RT 005 RW 002', '5', '2', 'DUSUN NGAGLIK', 'DESA SURAT', 'KECAMATAN MOJO', NULL, NULL, NULL, 'wheldaputri20@gmail.com', '3506066301030004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(41, '2155401021', 128, 'YUSUF FATHONI ASH SHIDIQ', 'KEDIRI', '36048', 'Laki', 'ISLAM', 33, '2021', '89505492590', 'BANDAR LOR GG 4 NO 19 - DESA BANDAR LOR - KECAMATAN MOJOROTO - KOTA KEDIRI RT 16 RW 3', '16', '3', 'BANDAR LOR GG 4 NO 19', 'DESA BANDAR LOR', 'KECAMATAN MOJOROTO', NULL, NULL, NULL, 'fathoniyusuf44@gmail.com', '3571011009980005', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(42, '20.001', 129, 'Alfi Riqhotul Khoyriyah', 'Nganjuk', '14-02-2002', 'Perempuan', 'ISLAM', 31, '2020', '85784755185', 'Dsn. Bulurejo Desa Kedungombo RT/RW 002/002 Kec. Tanjunganom', '2', '2', 'Dsn. Bulurejo', 'Desa Kedungombo', 'Kec. Tanjunganom', NULL, NULL, NULL, 'alfirikahmm@gmail.com', '3518115402020004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(43, '20.002', 130, 'Ana Azizah', 'Kediri', '37170', 'Perempuan', 'ISLAM', 31, '2020', '85755178767', 'Dsn. Santren Lor Desa Cerme RT/RW 017/004 Kec. Grogol', '17', '4', 'Dsn. Santren Lor', 'Desa Cerme', 'Kec. Grogol', NULL, NULL, NULL, 'aziizahnaa25gmail.com', '3506135006010002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(44, '20.003', 131, 'Anggita Ika Putri Kristianti', 'Tulungagung', '37439', 'Perempuan', 'ISLAM', 31, '2020', '81232815124', 'Dsn. Pangutan Desa Tamban RT/RW 001/008 Kec. Pakel', '1', '8', 'Dsn. Pangutan', 'Desa Tamban', 'Kec. Pakel', NULL, NULL, NULL, 'putrianggita341@gmail.com', '3504184702020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:27', '2022-05-19 18:41:27'),
(45, '20.004', 132, 'Artian Farrihna Febri Valentina', 'Ponorogo', '37409', 'Perempuan', NULL, 31, '2020', '85816985862', 'DSN. SANGGRONG DESA KUNTI RT/RW 001/001 KEC. SAMPUNG', '1', '1', 'DSN. SANGGRONG', 'DESA KUNTI', 'KEC. SAMPUNG', NULL, NULL, NULL, 'Artianvalentina8@gmail.com', '3502144602020003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(46, '20.005', 133, 'Devi Anggrila', 'Nganjuk', '25-04-2001', 'Perempuan', 'ISLAM', 31, '2020', '089603067414', 'Dsn. Musirlor Desa Musirlor RT/RW 002/002 Kec. Rejoso', '2', '2', 'Dsn. Musirlor', 'Desa Musirlor', 'Kec. Rejoso', NULL, NULL, NULL, 'devianggrila@gamil.com', '3518166504010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(47, '20.006', 134, 'Dwi Fitri Wahyuni', 'Kasongan', '28-06-2002', 'Perempuan', 'ISLAM', 31, '2020', '895339748201', 'Desa Bukit Tunggal RT/RW 004/002 Kec. Jekan Raya Jalan Rajawali VIII Nomor 14 ', '4', '2', 'Desa Bukit Tunggal', 'Desa Bukit Tunggal', 'Kec. Jekan Raya', NULL, NULL, NULL, 'dwifitriwahyuni04@gmail.com', '6271036806020003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(48, '20.007', 135, 'Elvina Dian Permata Sari', 'Nganjuk', '26-05-2001', 'Perempuan', 'ISLAM', 31, '2020', '85748081488', 'Dsn. Kandeg Desa Waung RT/RW 003/003 Kec. Baron', '3', '3', 'Dsn. Kandeg', 'Desa Waung', 'Kec. Baron', NULL, NULL, NULL, 'elvinadianpermatasari@gmail.com', '3518106605010007', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(49, '20.008', 136, 'Fatma Putri Utami', 'Kediri', '24-12-2001', 'Perempuan', 'ISLAM', 31, '2020', '85819908728', 'Dsn. Petok Desa Petok RW/RW 002/004 Kec. Mojo', '2', '4', 'Dsn. Petok', 'Desa Petok', 'Kec. Mojo', NULL, NULL, NULL, 'fatmaaptr24@gmail.com', '3506026412010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(50, '20.009', 137, 'Feby Ira Mayasanti', 'Trenggalek', '18-02-2002', 'Perempuan', 'ISLAM', 31, '2020', '82357135767', 'Dsn. Krajan Desa Jatiprahu RT/RW 020/002 Kec. Karangan', '20', '2', 'Dsn. Krajan', 'Desa Jatiprahu', 'Kec. Karangan', NULL, NULL, NULL, 'febysanti01@gmail.com', '3503065802020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(51, '20.010', 138, 'Hidayatul Fitria Nisa Putri A. S.', 'Madiun', '37347', 'Perempuan', NULL, 31, '2020', '81559940028', 'Dsn. Nglongko Desa Kebon Temu RT/RW 019/004 Kec. Peterongan', '19', '4', 'Dsn. Nglongko', 'Desa Kebon Temu', 'Kec. Peterongan', NULL, NULL, NULL, 'hidayatulfitria49@gmail.com', '3517104401020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(52, '20.011', 139, 'Indhah Suci Wati', 'Kediri', '37327', 'Perempuan', 'ISLAM', 31, '2020', '85895188323', 'Dsn. Sadon Desa Kewedusan RT/RW 001/002 Kec. Plosoklaten', '1', '2', 'Dsn. Sadon', 'Desa Kewedusan', 'Kec. Plosoklaten', NULL, NULL, NULL, 'indhahsuciwati@gmail.com ', '3506094312020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(53, '20.013', 140, 'Lutfiana', 'Ngawi', '22-09-2001', 'Perempuan', 'ISLAM', 31, '2020', '81803308549', 'Dsn. Klempun Desa Sawo RT/RW 006/001 Kec. Karangjati', '6', '1', 'Dsn. Klempun', 'Desa Sawo', 'Kec. Karangjati', NULL, NULL, NULL, 'lutfianangawi2209@gmail.com', '3521106209010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(54, '20.014', 141, 'Nada Ajeng Suci Sugiarti', 'Trenggalek', '25-05-2002', 'Perempuan', 'ISLAM', 31, '2020', '82233629709', 'Dsn. Gentungan Desa Craken RT/RW 017/005 Kec. Munjungan', '17', '5', 'Dsn. Gentungan', 'Desa Craken', 'Kec. Munjungan', NULL, NULL, NULL, 'nadaajeng2505@gmail.com', '3503026502050002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(55, '20.015', 142, 'Nanda Nurista', 'Trenggalek', '17-01-2002', 'Perempuan', NULL, 31, '2020', '82264113406', 'Dsn. Jedung Desa Karanganyar RT/RW 004/002 Kec. Gandusari', '4', '2', 'Dsn. Jedung', 'Desa Karanganyar', 'Kec. Gandusari', NULL, NULL, NULL, 'nandanurista@gmail.com', '3503105701020007', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(56, '20.016', 143, 'Restin Dwi Pujiastuti', 'Trenggalek', '20-04-2002', 'Perempuan', 'ISLAM', 31, '2020', '85745622303', 'Dsn. Setri Desa Wonorejo RT/RW 007/002 Kec. Gandusari', '7', '2', 'Dsn. Setri', 'Desa Wonorejo', 'Kec. Gandusari', NULL, NULL, NULL, 'puputresty253@gmail.com', '3503106004020004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:28', '2022-05-19 18:41:28'),
(57, '20.017', 144, 'Ririn Dwi Kusumawati', 'Trenggalek', '37233', 'Perempuan', 'ISLAM', 31, '2020', '081336789997', 'Dsn. Ngleban Desa Karangrejo RT/RW 029/009 Kec. Kampak', '29', '9', 'Dsn. Ngleban', 'Desa Karangrejo', 'Kec. Kampak', NULL, NULL, NULL, 'kr1606134@gmail.com', '3503075208010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(58, '20.018', 145, 'Susan Prasetya Ningsih', 'Jombang', '37443', 'Perempuan', 'ISLAM', 31, '2020', '85806909259', 'Dsn. Tebon Desa Kayangan RT/RW 006/0007 Kec. Diwek', '6', '7', 'Dsn. Tebon', 'Desa Kayangan', 'Kec. Diwek', NULL, NULL, NULL, 'susanprasetya2020@gmail.com', '3517084705020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(59, '20.019', 146, 'Ulvi Eitalia', 'Trenggalek', '19-08-2002', 'Perempuan', 'ISLAM', 31, '2020', '82245481852', 'Dsn. Jambe Desa Botoputih RT/RW 001/001 Kec. Bendungan', '1', '1', 'Dsn. Jambe', 'Desa Botoputih', 'Kec. Bendungan', NULL, NULL, NULL, 'ulvieitalia@gmail.com', '3503095908020001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(60, '20.021', 147, 'Umi Nur Khabibah', 'Nganjuk', '26-08-1999', 'Perempuan', NULL, 31, '2020', '85604710391', 'Dsn. DK Ngepeh Desa Ngepeh RT/RW 002/004 Kec. Loceret', '2', '4', 'Dsn. DK Ngepeh', 'Desa Ngepeh', 'Kec. Loceret', NULL, NULL, NULL, 'uminurkabibah@gmail.com', '3518046608990006', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(61, '20.022', 148, 'Wahyu Trias Nopitasari', 'Trenggalek', '22-11-2001', 'Perempuan', 'ISLAM', 31, '2020', '85843904533', 'Dsn. Jatisari Desa Pogalan RT/RW 022/011 Kec. Pogalan', '22', '11', 'Dsn. Jatisari', 'Desa Pogalan', 'Kec. Pogalan', NULL, NULL, NULL, 'wahyutriasnopitasari@gmail.com', '3503126211010002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(62, '20.023', 149, 'Winda Pramudya Wardani', 'Ngawi', '26-01-2002', 'Perempuan', 'ISLAM', 31, '2020', '85693725302', 'DS .POJOK DESA POJOK RT/RW 002/002 KEC.KWADUNGAN', '2', '2', 'DS .POJOK', 'DESA POJOK', 'KEC.KWADUNGAN', NULL, NULL, NULL, 'Windapramudya01@gmail.com', '3521066601020002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(63, '19.005', 150, 'Cintya Dewi Sari Putri', 'Surabaya', '23-11-1999', 'Perempuan', 'ISLAM', 31, '2019', '85732780205', 'Dsn. Randengan Desa Warugunung RT/RW 004/002 Kec. Pacet', '4', '2', 'Dsn. Randengan', 'Desa Warugunung', 'Kec. Pacet', NULL, NULL, NULL, 'cintya@medika.ac.id', '3516035311990003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(64, '19.001', 151, 'ALFINA KARTIKA ANGGRAENI', 'Jombang', '20-03-2001', 'Perempuan', NULL, 31, '2019', '81558986636', 'Ds. Banjaragung RT/RW 021/008 Kec. Bareng Jalan Ngeblak.', '21', '8', 'Ds. Banjaragung', 'Ds. Banjaragung', 'Kec. Bareng Jalan Ngeblak.', NULL, NULL, NULL, 'alfinaaakartika20@gmail.com', '3517046003010005', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(65, '19.002', 152, 'ALMIRA NASWA TRILESTARI', 'Lampung', '15-03-2000', 'Perempuan', NULL, 31, '2019', '81251827562', 'Dsn.Ampelgading Ds. Ngembel RT/RW 010/003 Kec. Watulimo', '10', '3', 'Dsn.Ampelgading', 'Ds. Ngembel', 'Kec. Watulimo', NULL, NULL, NULL, 'almira201709@gmail.com', '3503085503000004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(66, '19.004', 153, 'ANI SETYOWATI', 'Nganjuk', '17-07-2001', 'Perempuan', NULL, 31, '2019', '82139065367', 'Dsn.Kedunggalih Ds. Kedungglugu RT/RW 002/004 Kec.Gondang', '2', '4', 'Dsn.Kedunggalih', 'Ds. Kedungglugu', 'Kec.Gondang', NULL, NULL, NULL, 'setyowatiani369@gmail.com', '3518175707010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(67, '19.006', 154, 'DEVIRA RENIKAWATI', 'Tulungaggung', '15-07-2000', 'Perempuan', NULL, 31, '2019', '83117111907', 'DSN.JOGOUDAN DS GOMBANG RT/RW 001/002 KEC.PAKEL', '1', '2', 'DSN.JOGOUDAN', 'DS GOMBANG', 'KEC.PAKEL', NULL, NULL, NULL, 'devirarenika56@gmail.com ', '3504185507000002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(68, '19.007', 155, 'DILA AYU PURNANDASARI', 'Blitar', '15-05-2001', 'Perempuan', NULL, 31, '2019', '81615172707', 'Dsn. Langon Ds. Langon RT/RW 003/003 Kec. Ponggok', '3', '3', 'Dsn. Langon', 'Ds. Langon', 'Kec. Ponggok', NULL, NULL, NULL, 'dilaayu@gmail.com', '3505065505010003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(69, '19.008', 156, 'DINDA PUSPITA SARI', 'Sepaku', '29-12-2000', 'Perempuan', NULL, 31, '2019', '85748156331', 'DSN. BIRO DS.NWOOREJO RT/RW 003/002 KEC PUNCU', '3', '2', 'DSN. BIRO', 'DS.NWOOREJO', 'KEC PUNCU', NULL, NULL, NULL, 'dindakann29@gmail.com', '6409046912960001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:29', '2022-05-19 18:41:29'),
(70, '19.009', 157, 'ERLINDA EKA OKTAVIANI', 'Bojonegoro', '13-10-2000', 'Perempuan', NULL, 31, '2019', '082142934981', 'DSN. KEDUNGPANDAN DS. KESONGO RT/RW 022/009 KEC. KEDUNGADEM', '22', '9', 'DSN. KEDUNGPANDAN', 'DS. KESONGO', 'KEC. KEDUNGADEM', NULL, NULL, NULL, 'erlindaekaoktaviani@gmail.com', '3522085010000004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(71, '19.010', 158, 'GALUH MUSTIKANING KAWEDAR', 'Tulungaggung', '30-08-2001', 'Perempuan', NULL, 31, '2019', '085852465262', 'Dsn. Jambe Ds. Sodo RT/RW 003/003 Kec. Pakel', '3', '3', 'Dsn. Jambe', 'Ds. Sodo', 'Kec. Pakel', NULL, NULL, NULL, 'kawedargaluh2324@gmail.com', '3504187008010002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(72, '19.011', 159, 'INTAN AYU MU\'ALIMAH', 'Tulungagung', '26-01-2001', 'Perempuan', NULL, 31, '2019', '85256019317', 'Dsn. Toro Ds. Sidomulyo RT/RW 005/003 Kec. Pagerwojo', '5', '3', 'Dsn. Toro', 'Ds. Sidomulyo', 'Kec. Pagerwojo', NULL, NULL, NULL, 'intanayu485@gmail.com', '3504066601010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(73, '19.014', 160, 'JIHAN AULIA', 'Nganjuk', '25-01-2001', 'Perempuan', NULL, 31, '2019', '82244669676', 'Dsn. Nglarangan Ds. Banjulan RT/RW 002/003 Kec. Loceret', '2', '3', 'Dsn. Nglarangan', 'Ds. Banjulan', 'Kec. Loceret', NULL, NULL, NULL, 'auliajihan189@gmail.com', '3518046501010002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(74, '19.015', 161, 'LISTY SULISTIYASARI', 'Jombang', '37012', 'Perempuan', NULL, 31, '2019', '85536836205', 'Dsn. Mutersari Ds. Ngrimbi RT/RW 001/003 Kec. Bareng', '1', '2', 'Dsn. Mutersari', 'Ds. Ngrimbi', 'Kec. Bareng', NULL, NULL, NULL, 'listysulis@gmail.com', '3517044501010003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(75, '19.016', 162, 'LUSI WAHYUNITA SARI', 'Jayapura', '35348', 'Perempuan', NULL, 31, '2019', '85335379095', 'Dsn. Tumpangsari Ds. Pucung lor RT/RW 002/001 Kec. Ngantru', '2', '1', 'Dsn. Tumpangsari', 'Ds. Pucung lor', 'Kec. Ngantru', NULL, NULL, NULL, 'lusiwahyunitasary@gmail.com', '3504045010960001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(76, '19.017', 163, 'MONICA SALSABILA CANTIKA AMANJA', 'Kediri', '24-01-2001', 'Perempuan', NULL, 31, '2019', '85732080472', 'DS.NGRONGGO RT/RW 001/003 KEC.KOTA JALAN PERINTIS KEMERDEKAAN GG.SEMPOL BLOK', '1', '3', 'DS.NGRONGGO', 'DS.NGRONGGO', 'KEC.KOTA JALAN PERINTIS KEMERDEKAAN', NULL, NULL, NULL, ' monicasabila12345@gmail.com', '3571026401010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(77, '19.018', 164, 'NURO NOVA LARISA', 'Ponorogo', '15-03-2001', 'Perempuan', NULL, 31, '2019', '89603630913', 'Ds. Beduri RT/RW 001/003 Kec. Ponorogo Jalan Nuri', '1', '3', 'Ds. Beduri', 'Ds. Beduri', 'Kec. Ponorogo Jalan Nuri', NULL, NULL, NULL, 'nuronova15@gmail.com', '3502175503010003', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(78, '19.019', 165, 'RINI', 'Segulang', '28-08-1999', 'Perempuan', NULL, 31, '2019', '85648709428', 'DSN. KORONG PENABUN DS. NANGA SEGULUNG RT/RW 000/000 KEC. SERAWAI', NULL, NULL, 'DSN. KORONG PENABUN', 'DS. NANGA SEGULUNG', 'KEC. SERAWAI', NULL, NULL, NULL, 'riniririn928@gmail.com', '6105106908990002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(79, '19.020', 166, 'RISMA AMALIA PUTRI', 'Kediri', '23-04-2001', 'Perempuan', NULL, 31, '2019', '85807404521', 'Ds. Ketawang RT/RW 001/004 Kec. Purwoasri Jalan Manggis', '1', '4', 'Ds. Ketawang', 'Ds. Ketawang', 'Kec. Purwoasri Jalan Manggis', NULL, NULL, NULL, 'amaliarisma866@gmail.com', '3506156304010002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(80, '19.021', 167, 'SEPTA WEDA DWIYANA', 'Kediri', '19-10-1999', 'Perempuan', NULL, 31, '2019', '85812356584', 'Ds. Tosaren RT/RW 030/011 Kec. Pesantren Jalan Tirtoudan Raya/120', '30', '11', 'Ds. Tosaren', 'Ds. Tosaren', 'Kec. Pesantren Jalan Tirtoudan Raya/120', NULL, NULL, NULL, 'tataweda02@gmail.com', '3571035909990001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(81, '19.022', 168, 'SUSI PURNAMASARI', 'Bojonegoro', '13-05-2001', 'Perempuan', NULL, 31, '2019', '85855271151', 'Dsn. Sumengko Ds. Tondomulyo RT/RW 004/010 Kec. Kedungadem', '4', '10', 'Dsn. Sumengko', 'Ds. Tondomulyo', 'Kec. Kedungadem', NULL, NULL, NULL, 'purnamasarisusi69@gmail.com', '3522085305010001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(82, '19.023', 169, 'SYNTYA AMANDA AGUSTIN', 'Kediri', '36565', 'Perempuan', NULL, 31, '2019', '85850861969', 'DSN. MANUKA DS. JABON RT/RW 001/008 KEC. BANYAKAN', '1', '8', 'DSN. MANUKA', 'DS. JABON', 'KEC. BANYAKAN', NULL, NULL, NULL, 'syntyaamanda2@gmail.com', '3506224209000001', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:30', '2022-05-19 18:41:30'),
(83, '19.024', 170, 'TRIANA SASONGKO', 'Kediri', '28-11-1997', 'Perempuan', NULL, 31, '2019', '081515055505', 'Dsn. Ngampel Ds. Ngampel RT/RW 015/003 Kec. Mojoroto Kota Kediri', '15', '3', 'Dsn. Ngampel', 'Ds. Ngampel', 'Kec. Mojoroto Kota Kediri', NULL, NULL, NULL, 'trianaa.sasongko@gmail.com', '3571016811970004', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:31', '2022-05-19 18:41:31'),
(84, '19.025', 171, 'VARICHAH AULIA INDINA', 'Lampung Selatan', '24-04-2000', 'Perempuan', NULL, 31, '2019', '87714487357', 'Dsn. Tempursari Ds. Sukoanyar RT/RW 001/001 Kec. Mojo ', '1', '1', 'Dsn. Tempursari', 'Ds. Sukoanyar', 'Kec. Mojo ', NULL, NULL, NULL, 'kadekvarichah44@gmail.com', '3506026404000002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:31', '2022-05-19 18:41:31'),
(85, '19.026', 172, 'WIDIA ANGGUN PERTIWI', 'Kediri', '18-07-2001', 'Perempuan', NULL, 31, '2019', '85806170535', 'Dsn. Gethuk Ds. Pagung RT/RW 004/008 Kec. Semen', '4', '8', 'Dsn. Gethuk', 'Ds. Pagung', 'Kec. Semen', NULL, NULL, NULL, 'widia2@medikawiyata.ac.id', '3506015807010002', NULL, NULL, 'Indonesia', NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-19 18:41:31', '2022-05-19 18:41:31'),
(164, '220431001', 87, 'Ody Guys', NULL, NULL, NULL, NULL, 33, '2022', '08282828828282', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'odytrisyahrial@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-20 06:48:08', '2022-05-20 06:48:08'),
(165, '220411001', 77, 'contoh', NULL, NULL, NULL, NULL, 31, '2022', '08563377164', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'polimerciasi@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-20 06:49:10', '2022-05-20 06:49:10'),
(166, '220431002', 84, 'coba', NULL, NULL, NULL, NULL, 33, '2022', '08123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'coba_lagi@coba.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-20 06:49:24', '2022-05-20 06:49:24'),
(167, '220431003', 79, 'YUSUF MAHENDRA', NULL, NULL, NULL, NULL, 33, '2022', '085602672509', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yusufmahendra2609@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-20 06:49:44', '2022-05-20 06:49:44'),
(168, '220411002', 83, 'coba', NULL, NULL, NULL, NULL, 31, '2022', '08123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'coba@coba.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', '2022-05-20 06:51:13', '2022-05-20 06:51:13'),
(174, '220421002', 78, 'emir', NULL, NULL, NULL, NULL, 32, '2022', '085704057291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'firzaqemir12345@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(175, '220421001', 80, 'Firzaq Emir Pranowo', NULL, NULL, NULL, NULL, 32, '2022', '085704057291', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'firzaqemirpranowo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(176, NULL, 1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@polimercia.com', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` bigint(20) UNSIGNED NOT NULL,
  `id_programstudi` int(11) NOT NULL,
  `kode_matkul` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `id_programstudi`, `kode_matkul`, `nama_matkul`, `sks`, `created_at`, `updated_at`) VALUES
(1, 33, 'TIKK2022', 'Desain WEB', 2, '2022-03-24 19:05:38', '2022-04-03 19:00:26'),
(3, 33, 'TIKK2021', 'Pemrograman WEB', 1, '2022-03-25 01:32:42', '2022-04-03 19:14:42'),
(6, 31, 'TIKK2023', 'kebidanan', 1, '2022-04-03 19:02:00', '2022-04-03 19:02:00'),
(7, 32, 'AKKK2022', 'Akutansi', 2, '2022-04-03 19:02:42', '2022-04-03 19:02:42'),
(10, 33, 'SSTRK', 'Struktur Pemrograman', 3, '2022-05-22 19:39:13', '2022-05-22 19:39:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_10_14_014253_create_uploadbuktis_table', 2),
(4, '2022_03_10_041646_create_posts_table', 3),
(5, '2019_08_19_000000_create_failed_jobs_table', 4),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(7, '2022_03_23_065357_create_ruangans_table', 5),
(8, '2022_03_24_062445_create_jurusans_table', 6),
(9, '2022_03_24_065805_create_kurikulums_table', 6),
(10, '2022_03_24_071022_create_periodes_table', 7),
(11, '2022_03_24_072520_create_matkuls_table', 8),
(12, '2022_03_29_012055_create_jadwals_table', 9),
(13, '2022_03_30_015027_create_mahasiswas_table', 10),
(14, '2022_03_30_072817_create_skala_nilais_table', 11),
(15, '2022_04_04_023450_create_kmatkuls_table', 12),
(16, '2022_04_05_041811_create_dosens_table', 13),
(17, '2022_04_05_064500_create_krs_table', 14),
(18, '2022_04_13_013009_create_berkas_mhs_table', 15),
(19, '2022_04_13_013740_create_pendidikan_mhs_table', 15),
(20, '2022_04_13_015048_create_kesehatan_mhs_table', 15),
(21, '2022_04_13_020551_create_ortu_mhs_table', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu_mhs`
--

CREATE TABLE `ortu_mhs` (
  `id_ortumhs` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nik_ayah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllhr_ayah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsl_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ibu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllhr_ibu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsl_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllhr_wali` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_wali` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_wali` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsl_wali` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ortu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_wali` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_ortu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_wali` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_mhs`
--

CREATE TABLE `pendidikan_mhs` (
  `id_pdmhs` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_sekolah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_sekolah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `nama_periode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smt_periode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_awal` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_akhir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `nama_periode`, `smt_periode`, `tgl_awal`, `tgl_akhir`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', 'Ganjil', '2022-03-29', '2022-06-29', NULL, '2022-03-28 18:08:37'),
(2, '2021/2022', 'Genap', '', '', NULL, NULL),
(4, '2022/2023', 'Ganjil', '2022-04-13', '2022-08-13', '2022-04-12 17:46:36', '2022-04-12 17:46:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '856c138693955e4af0c935aa0907aa02b4f2e013a6f93f067b2bc2e943a1cb5b', '[\"*\"]', NULL, '2022-03-14 18:20:44', '2022-03-14 18:20:44'),
(2, 'App\\Models\\User', 1, 'auth_token', 'b290b7b55969807a47771eabc1c601da982d812365a937c4b40a981d08c53360', '[\"*\"]', NULL, '2022-03-14 18:26:44', '2022-03-14 18:26:44'),
(3, 'App\\Models\\User', 1, 'auth_token', '9be689226fbf87b1c7827dbc0e20ac831efbbbdded5bd58a0a0aad54202ae7ad', '[\"*\"]', NULL, '2022-03-14 18:27:19', '2022-03-14 18:27:19'),
(4, 'App\\Models\\User', 81, 'auth_token', '6deb30961834e78592e473e59f7358e4fc2a495d6bf58028b9ca41679d13935a', '[\"*\"]', NULL, '2022-03-14 19:41:38', '2022-03-14 19:41:38'),
(5, 'App\\Models\\User', 82, 'auth_token', 'a8bec6bfd72cf57cfdbcdd01927491a4abc8bdb6654639660156e1f9223da02c', '[\"*\"]', NULL, '2022-03-14 19:46:04', '2022-03-14 19:46:04'),
(6, 'App\\Models\\User', 83, 'auth_token', '6a49e9fd94e471c63406eacba74407c3056a2a34b70939d1b96ce9b602c54add', '[\"*\"]', NULL, '2022-03-14 19:46:28', '2022-03-14 19:46:28'),
(7, 'App\\Models\\User', 84, 'auth_token', 'ba27473f1e15db323136840cd04f165152e93361c3cded6bcf7b606d7c37e952', '[\"*\"]', NULL, '2022-03-14 20:03:18', '2022-03-14 20:03:18'),
(8, 'App\\Models\\User', 85, 'auth_token', 'fd42fba5d599e3aa659159924e8f3f8256ae06c7ca82a1e4878c574086a1764a', '[\"*\"]', NULL, '2022-03-14 20:03:59', '2022-03-14 20:03:59'),
(9, 'App\\Models\\User', 1, 'auth_token', '86540a41070b09d896eda4517dd83616dfda83c33397c761cc24e78d2e978d62', '[\"*\"]', NULL, '2022-03-15 18:28:22', '2022-03-15 18:28:22'),
(10, 'App\\Models\\User', 1, 'auth_token', '682af955276ffe10aa76db4967a7163faa8c4428134074dad602790ecba6fab6', '[\"*\"]', '2022-03-15 19:10:19', '2022-03-15 18:33:53', '2022-03-15 19:10:19'),
(11, 'App\\Models\\User', 1, 'auth_token', '25303885c7972aed5e13f89c62614dbf2f0caa6c5c9896903ffe48031e1da1e1', '[\"*\"]', '2022-03-15 21:37:22', '2022-03-15 21:06:43', '2022-03-15 21:37:22'),
(12, 'App\\Models\\User', 1, 'auth_token', 'a9ab7af2e1927d796a9c6bd14ffb7b8753c27e8d50c867e85470158c61639b0c', '[\"*\"]', NULL, '2022-03-15 21:09:10', '2022-03-15 21:09:10'),
(13, 'App\\Models\\User', 1, 'auth_token', 'f2fb724896141cb50101c216368bac42d7136cc1d991380819a3d72f4032cb36', '[\"*\"]', '2022-03-15 23:22:09', '2022-03-15 21:48:42', '2022-03-15 23:22:09'),
(14, 'App\\Models\\User', 1, 'auth_token', '1042cc6240f67cb31ec77fed2694d34821f7212936a0e3522fbf5421083e6c65', '[\"*\"]', NULL, '2022-03-16 21:31:07', '2022-03-16 21:31:07'),
(15, 'App\\Models\\User', 1, 'auth_token', '7cb6aba05c9e2b6a832efa3dd06e36a369ea7f14e6b2b08cec1419463d283362', '[\"*\"]', NULL, '2022-04-21 00:33:08', '2022-04-21 00:33:08'),
(16, 'App\\Models\\User', 86, 'auth_token', 'ae781bc52ca3ed5402f843be059d44a744a166377fcdda8c991cf9e1aaa3a1bf', '[\"*\"]', NULL, '2022-04-21 19:55:46', '2022-04-21 19:55:46'),
(17, 'App\\Models\\User', 87, 'auth_token', '67fdd7c7b784641e4b2b767849e78230f1af0fcb1400b4f0e4534baeda2a2e86', '[\"*\"]', NULL, '2022-04-21 23:14:07', '2022-04-21 23:14:07'),
(18, 'App\\Models\\User', 87, 'auth_token', '101fb9807aacc86334ded7ff17f2707c8900b871be7320c61bb5f7877d5464bc', '[\"*\"]', NULL, '2022-04-24 18:53:19', '2022-04-24 18:53:19'),
(19, 'App\\Models\\User', 87, 'auth_token', '4e8d9c33422b674a30aae823deca17a6a4df48eaf0218dc3e5d85c15152ec3dd', '[\"*\"]', NULL, '2022-04-25 21:07:38', '2022-04-25 21:07:38'),
(20, 'App\\Models\\User', 87, 'auth_token', 'd6d58d70c1d5f06cde3ab50ca79da3177e1d3511b239ba56bb349acdbeba487f', '[\"*\"]', NULL, '2022-04-25 21:07:51', '2022-04-25 21:07:51'),
(21, 'App\\Models\\User', 87, 'auth_token', 'f48c305af292e79080adc0ed81c2a7262ee88d48eb766bd58973849a31630586', '[\"*\"]', NULL, '2022-04-25 21:08:08', '2022-04-25 21:08:08'),
(22, 'App\\Models\\User', 87, 'auth_token', 'a6b7565fba249429982a793ea8bca1b925074b73f89e96c6325aadcaedd3d87f', '[\"*\"]', NULL, '2022-04-25 21:10:05', '2022-04-25 21:10:05'),
(23, 'App\\Models\\User', 87, 'auth_token', 'b79458841138f323044c8b86404c62df78b36e4be6e850e6dc40038287ca4254', '[\"*\"]', NULL, '2022-04-26 00:06:13', '2022-04-26 00:06:13'),
(24, 'App\\Models\\User', 87, 'auth_token', 'ef44954a99eb86a1f7575743d4fd77f44a7d0b97761e7568e0837bcee3c6e6b6', '[\"*\"]', NULL, '2022-04-26 00:07:45', '2022-04-26 00:07:45'),
(25, 'App\\Models\\User', 87, 'auth_token', '801a813242350cbac79614ae54a874d83ea6245c98a29e9a6f5d571ce1995c12', '[\"*\"]', NULL, '2022-04-26 00:52:20', '2022-04-26 00:52:20'),
(26, 'App\\Models\\User', 87, 'auth_token', '74c429ecde7dd1fe30be93b208ebeb574843c64fd3c2793602e13e534df9d839', '[\"*\"]', NULL, '2022-04-26 18:12:12', '2022-04-26 18:12:12'),
(27, 'App\\Models\\User', 87, 'auth_token', '956ac769c57b12d9519c2cef7e8b39328b046866ab8ff0805e830058b702033a', '[\"*\"]', NULL, '2022-04-26 19:09:02', '2022-04-26 19:09:02'),
(28, 'App\\Models\\User', 87, 'auth_token', '83e990592ca85a7ede1942adf0f806f95464a426c803ed67f533d028eac9d2af', '[\"*\"]', NULL, '2022-04-26 19:09:14', '2022-04-26 19:09:14'),
(29, 'App\\Models\\User', 87, 'auth_token', '0d4d5ae6877a1e1608ee08aa7428b67b2719693649ee07771364f3cce4a0a537', '[\"*\"]', NULL, '2022-04-26 19:09:42', '2022-04-26 19:09:42'),
(30, 'App\\Models\\User', 87, 'auth_token', '01d3d1a6e5ce8701d852a61cdc20e73de48d9e73f0e4a6e75a0c5f2efdf4d129', '[\"*\"]', NULL, '2022-04-26 19:09:48', '2022-04-26 19:09:48'),
(31, 'App\\Models\\User', 87, 'auth_token', 'e2b72ec8d4da9f4ed5cab2ae6f4e8195f30fe5260389e3cbd5809f50b582206f', '[\"*\"]', NULL, '2022-04-26 19:10:31', '2022-04-26 19:10:31'),
(32, 'App\\Models\\User', 87, 'auth_token', '8080f06cda4a6c3f2761d71873b3e9e34ab28086b07e196140ca626a66aee761', '[\"*\"]', NULL, '2022-04-26 19:19:43', '2022-04-26 19:19:43'),
(33, 'App\\Models\\User', 87, 'auth_token', 'be25399642622b18022caac99dce05be4a5836921563cfbc81a7dc37c6c5f369', '[\"*\"]', NULL, '2022-04-26 19:20:17', '2022-04-26 19:20:17'),
(34, 'App\\Models\\User', 87, 'auth_token', '915404ad0a4a5f07f161825c850d301183c825f3aeacc7beec6d0632d49392b9', '[\"*\"]', NULL, '2022-04-26 19:20:20', '2022-04-26 19:20:20'),
(35, 'App\\Models\\User', 87, 'auth_token', '1f31010db0d5c3e2fdbc86b6c1b8d022c5dc56463eac6165829c195bdb1543f3', '[\"*\"]', NULL, '2022-04-26 20:27:03', '2022-04-26 20:27:03'),
(36, 'App\\Models\\User', 1, 'auth_token', '463bd8903bc1a44aaf3ad6a0ff818c12a5186211f0339c8654023b55a951769f', '[\"*\"]', NULL, '2022-06-01 21:54:38', '2022-06-01 21:54:38'),
(37, 'App\\Models\\User', 1, 'auth_token', '36f8c6c9e56c870885fdf595db4f24181a2a7effa11bcf107341b77182c7643f', '[\"*\"]', NULL, '2022-06-01 21:54:39', '2022-06-01 21:54:39'),
(38, 'App\\Models\\User', 1, 'auth_token', 'c996a38ef782ed052cd913922d735abf5b67b7eaa4d3b05635dc7bcd48c8ea1a', '[\"*\"]', NULL, '2022-06-01 21:54:52', '2022-06-01 21:54:52'),
(39, 'App\\Models\\User', 1, 'auth_token', 'b8da1d6a231c172e6122cb18d14ba2db0b1087e648fd43889ae683c8ed1d0091', '[\"*\"]', NULL, '2022-06-01 21:55:56', '2022-06-01 21:55:56'),
(40, 'App\\Models\\User', 1, 'auth_token', '623cb20bbd53e878832e3a1a7e651112e8b081019576b8198b5328378e5a4d5c', '[\"*\"]', NULL, '2022-06-01 22:07:37', '2022-06-01 22:07:37'),
(41, 'App\\Models\\User', 1, 'auth_token', '199d0e564e3bfbb3fa9944a1901d5234cc76519334fd853462e9ba615dcbe698', '[\"*\"]', NULL, '2022-06-01 22:08:30', '2022-06-01 22:08:30'),
(42, 'App\\Models\\User', 1, 'auth_token', '98b384d733736258760773e40033abc7ac52e032fcb328c85fbbef273d8a3b20', '[\"*\"]', NULL, '2022-06-01 22:09:24', '2022-06-01 22:09:24'),
(43, 'App\\Models\\User', 1, 'auth_token', 'ffff732521b8d88535d20467ca62ce2d082a97d3d6899a5e54d188aa564a2f8e', '[\"*\"]', NULL, '2022-06-01 23:41:05', '2022-06-01 23:41:05'),
(44, 'App\\Models\\User', 1, 'auth_token', '356308aa9a4ba29b8b0649d53f5ff1e2ff9fa923f92c9392e05e3c57ab09b436', '[\"*\"]', NULL, '2022-06-01 23:41:37', '2022-06-01 23:41:37'),
(45, 'App\\Models\\User', 1, 'auth_token', '19fe33a7ef296928fbcaf3831d6168afb6505192c316098c9425eddf416d3631', '[\"*\"]', NULL, '2022-06-01 23:42:07', '2022-06-01 23:42:07'),
(46, 'App\\Models\\User', 1, 'auth_token', '4f4f6f5b67846476d43b68a47e44c6167877d35280636100def72bce39fdb630', '[\"*\"]', NULL, '2022-06-01 23:42:07', '2022-06-01 23:42:07'),
(47, 'App\\Models\\User', 1, 'auth_token', '3c31c02e0a07bf8f5c21064cfbdabff6a29af7e909b061819bd033a9e00d37d9', '[\"*\"]', NULL, '2022-06-01 23:48:17', '2022-06-01 23:48:17'),
(48, 'App\\Models\\User', 1, 'auth_token', 'a305bdfbd082da27c3a025bf132657b0c5d163c4386b5f35ce1d8e1d2de77113', '[\"*\"]', NULL, '2022-06-01 23:48:28', '2022-06-01 23:48:28'),
(49, 'App\\Models\\User', 1, 'auth_token', '7267d8bf50ef86d5d8b9eb147e2cd3db2d8bb2731fe8faa322ecf717e7c2f730', '[\"*\"]', NULL, '2022-06-01 23:48:39', '2022-06-01 23:48:39'),
(50, 'App\\Models\\User', 1, 'auth_token', '79442597e0cd15a90489496562a65ccc4bd662cc075e6bffb2775358171fa45f', '[\"*\"]', NULL, '2022-06-01 23:50:14', '2022-06-01 23:50:14'),
(51, 'App\\Models\\User', 1, 'auth_token', '3329c460b8a023584a3ab80fd8ebbf9efed56b516b3e8c9d90d8426120ac7f63', '[\"*\"]', NULL, '2022-06-01 23:50:26', '2022-06-01 23:50:26'),
(52, 'App\\Models\\User', 1, 'auth_token', 'f23a7d3210c2640c54b66e071cbf37b6df49412ed400cf949c42b3527e38322e', '[\"*\"]', NULL, '2022-06-01 23:51:25', '2022-06-01 23:51:25'),
(53, 'App\\Models\\User', 1, 'auth_token', '607a087bb1672db542520ca216232fa88e294b4abe894d4df1339fbda7f46ee8', '[\"*\"]', NULL, '2022-06-01 23:52:12', '2022-06-01 23:52:12'),
(54, 'App\\Models\\User', 1, 'auth_token', 'a2d18786e5b26c98fa41349b494f482fef11df640b486bf060e4c778ffb36151', '[\"*\"]', NULL, '2022-06-01 23:56:31', '2022-06-01 23:56:31'),
(55, 'App\\Models\\User', 1, 'auth_token', '7d2e75b7ad6f671f03791c44b8afbe4f49f38848eb9dbc372eb5bd56fd5368fa', '[\"*\"]', NULL, '2022-06-01 23:56:58', '2022-06-01 23:56:58'),
(56, 'App\\Models\\User', 1, 'auth_token', 'df39be76384d4bfd2bd14b25fc4dca2bfcb1abcddc2bf6408a371f5d73c8f523', '[\"*\"]', NULL, '2022-06-01 23:59:36', '2022-06-01 23:59:36'),
(57, 'App\\Models\\User', 1, 'auth_token', '0477b07ea8228d8952e1e5f09d5051c5afce2a7e5227f8b6a1171eccac79ca7c', '[\"*\"]', NULL, '2022-06-02 00:01:10', '2022-06-02 00:01:10'),
(58, 'App\\Models\\User', 1, 'auth_token', 'd47df312ee474731c9798b68ac3b19c9b66566287a9c8fd0d1b50a35bba50a37', '[\"*\"]', NULL, '2022-06-02 00:06:57', '2022-06-02 00:06:57'),
(59, 'App\\Models\\User', 1, 'auth_token', '3ab8520ed37a4d54aa15e0ae2f75b1291f3b91da4887e2c69ee5f70fb81beb10', '[\"*\"]', NULL, '2022-06-02 00:13:17', '2022-06-02 00:13:17'),
(60, 'App\\Models\\User', 1, 'auth_token', '4de5d68040713bde140d626719aea69cb9207d0121d90a20983e1222b7d1e19c', '[\"*\"]', NULL, '2022-06-02 00:13:21', '2022-06-02 00:13:21'),
(61, 'App\\Models\\User', 1, 'auth_token', '99274c63e307db4790c62d08397af78c6ccdbd3372ea3d70d0a51ca3cfd22197', '[\"*\"]', NULL, '2022-06-02 00:13:57', '2022-06-02 00:13:57'),
(62, 'App\\Models\\User', 1, 'auth_token', 'dc05e10fc1b281abf04bce9b11dbb14f8be4de55a5d9a69c4242fe60c14cda0e', '[\"*\"]', NULL, '2022-06-02 00:14:48', '2022-06-02 00:14:48'),
(63, 'App\\Models\\User', 1, 'auth_token', '0865eaf2a3e45048114ebb1dee24486abe7fbd851bda981f735e5eb422d4a8bb', '[\"*\"]', NULL, '2022-06-02 00:17:39', '2022-06-02 00:17:39'),
(64, 'App\\Models\\User', 1, 'auth_token', '75bdd472ce989fa6b5a4c91e25aa77564e1062e23e1db66d2338da3236d0d3ff', '[\"*\"]', NULL, '2022-06-02 00:21:01', '2022-06-02 00:21:01'),
(65, 'App\\Models\\User', 1, 'auth_token', 'c8103093c27ec83412fc78907414db862edd53a1f4703ded03ebd6adfa7f2353', '[\"*\"]', NULL, '2022-06-02 00:24:57', '2022-06-02 00:24:57'),
(66, 'App\\Models\\User', 1, 'auth_token', 'a5608f3ec748d873961953af317081904a8548e9110e45da5b76864f77094944', '[\"*\"]', NULL, '2022-06-02 00:31:01', '2022-06-02 00:31:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'cobaimage', 'coba title', 'coba content', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'lab pemrograman', 'lantai 2', '2022-03-23 18:11:06', '2022-05-11 23:58:45'),
(2, 'adf', 'cob', '2022-03-23 20:07:39', '2022-05-11 23:58:54'),
(5, 'Lab Bidan', 'Lantai 3', '2022-05-22 19:37:53', '2022-05-22 19:37:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skala_nilai`
--

CREATE TABLE `skala_nilai` (
  `id_snilai` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_atas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_bawah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skala_nilai`
--

INSERT INTO `skala_nilai` (`id_snilai`, `grade`, `mutu`, `n_atas`, `n_bawah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'A', '4', '100', '80', 'Lulus', '2022-03-30 22:36:55', '2022-03-30 22:36:55'),
(2, 'B', '3', '79', '68', 'Lulus', '2022-03-30 22:42:53', '2022-03-30 22:48:36'),
(3, 'C', '2', '67', '56', 'Lulus', '2022-03-30 22:43:24', '2022-03-30 22:43:24'),
(4, 'D', '1', '55', '45', 'Tidak Lulus', '2022-03-30 22:49:50', '2022-03-30 22:49:50'),
(5, 'E', '0', '44', '0', 'Tidak Lulus', '2022-03-30 22:51:01', '2022-03-30 22:51:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aturpembayaran`
--

CREATE TABLE `tb_aturpembayaran` (
  `id_biaya` int(11) NOT NULL,
  `id_programstudi` int(11) UNSIGNED NOT NULL,
  `biayapendaftaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aturpembayaran`
--

INSERT INTO `tb_aturpembayaran` (`id_biaya`, `id_programstudi`, `biayapendaftaran`, `created_at`, `updated_at`) VALUES
(1, 32, '250.000', '2022-05-11 06:35:35', '2022-05-11 06:35:35'),
(2, 31, '350.000', '2022-05-11 06:35:35', '2022-05-11 06:35:35'),
(3, 33, '250.000', '2022-05-11 06:35:35', '2022-05-11 06:35:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aturpembayaranspp`
--

CREATE TABLE `tb_aturpembayaranspp` (
  `id_spp` int(11) NOT NULL,
  `id_programstudi` int(11) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aturpembayaranspp`
--

INSERT INTO `tb_aturpembayaranspp` (`id_spp`, `id_programstudi`, `biaya`, `keterangan`) VALUES
(1, 31, '495000', 'D3 Kebidanan'),
(2, 32, '345000', 'D3 Teknologi Informasi 1'),
(3, 33, '345000', 'D3 Akutansi'),
(4, 32, '400000', 'D3 Teknologi Informasi '),
(5, 32, '500000', 'D3 Teknologi Informasi 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jalurmasuk`
--

CREATE TABLE `tb_jalurmasuk` (
  `id_jalurmasuk` int(11) NOT NULL,
  `jalur_masuk` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jalurmasuk`
--

INSERT INTO `tb_jalurmasuk` (`id_jalurmasuk`, `jalur_masuk`, `created_at`, `updated_at`) VALUES
(1, 'Prestasi Akademik', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(2, 'Prestasi Non Akademik', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(3, 'Reguler', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(4, 'Undangan', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(5, 'Kemitraan', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(6, 'Beasiswa KIP', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(7, 'Beasiswa Hafiz', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(8, 'Beasiswa Yatim Piatu', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(9, 'Beasiswa Kemitraan', '2022-03-16 05:47:31', '2022-03-16 05:47:31'),
(10, 'coba masuk', '2022-03-15 22:47:43', '2022-03-15 22:47:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jalurpendaftaran`
--

CREATE TABLE `tb_jalurpendaftaran` (
  `id_jalurpendaftaran` int(11) NOT NULL,
  `jalur_pendaftaran` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jalurpendaftaran`
--

INSERT INTO `tb_jalurpendaftaran` (`id_jalurpendaftaran`, `jalur_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, 'Mahasiswa Baru', '2022-03-16 05:57:02', '2022-03-16 05:57:02'),
(2, 'Alih Jenjang', '2022-03-16 05:57:02', '2022-03-16 05:57:02'),
(3, 'Pindahan', '2022-03-16 05:57:02', '2022-03-16 05:57:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaranpmb`
--

CREATE TABLE `tb_pembayaranpmb` (
  `id_pembayaranpmb` int(11) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `no_tagihan` int(11) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_pembayaranpmb`
--

INSERT INTO `tb_pembayaranpmb` (`id_pembayaranpmb`, `no_registrasi`, `no_tagihan`, `tanggal_setor`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(1, 20220081, 6567765, '2021-09-02', '1', '2022-03-16 05:58:41', '2022-03-16 05:58:41'),
(2, 20220080, 34234, '2021-09-02', '1', '2022-03-16 05:58:41', '2022-03-16 05:58:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaranspp`
--

CREATE TABLE `tb_pembayaranspp` (
  `id_pembayaranspp` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tanggal_setor` datetime NOT NULL,
  `bayar` varchar(1000) NOT NULL,
  `statusspp` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaranspp`
--

INSERT INTO `tb_pembayaranspp` (`id_pembayaranspp`, `id_mhs`, `id_spp`, `bulan`, `tanggal_setor`, `bayar`, `statusspp`, `created_at`, `updated_at`) VALUES
(14, 5, 1, 'Mei', '2022-05-25 08:17:36', '495000', 'Lunas', '2022-05-24 18:18:07', '2022-05-24 18:19:03'),
(15, 9, 1, 'Januari', '2022-05-25 08:36:30', '495000', 'Lunas', '2022-05-24 18:36:45', '2022-05-24 18:36:45'),
(16, 13, 3, 'Januari', '2022-05-25 15:38:24', '345000', 'Lunas', '2022-05-25 01:39:17', '2022-05-25 01:39:17'),
(17, 6, 3, 'Februari', '2022-05-25 15:39:18', '345000', 'Lunas', '2022-05-25 01:39:32', '2022-05-25 01:39:32'),
(18, 7, 2, 'Februari', '2022-05-25 15:39:55', '400000', 'Lunas', '2022-05-25 01:40:01', '2022-05-25 01:40:01'),
(19, 18, 1, 'Maret', '2022-05-25 15:40:01', '495000', 'Lunas', '2022-05-25 01:40:18', '2022-05-25 01:40:18'),
(20, 19, 2, 'Oktober', '2022-05-25 15:40:18', '345000', 'Lunas', '2022-05-25 01:40:31', '2022-05-25 01:40:31'),
(21, 55, 2, 'November', '2022-05-25 15:40:31', '345000', 'Lunas', '2022-05-25 01:40:47', '2022-05-25 01:40:47'),
(22, 12, 2, 'September', '2022-05-25 15:40:48', '345000', 'Lunas', '2022-05-25 01:41:07', '2022-05-25 01:41:07'),
(23, 46, 2, 'Oktober', '2022-05-25 15:41:07', '345000', 'Lunas', '2022-05-25 01:41:24', '2022-05-25 01:41:24'),
(24, 167, 2, 'November', '2022-05-25 15:41:24', '345000', 'Lunas', '2022-05-25 01:41:41', '2022-05-25 01:41:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periodependaftaran`
--

CREATE TABLE `tb_periodependaftaran` (
  `id_periodependaftaran` int(11) NOT NULL,
  `nama_periode` varchar(250) NOT NULL,
  `awal_periode` date DEFAULT NULL,
  `selesai_periode` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_periodependaftaran`
--

INSERT INTO `tb_periodependaftaran` (`id_periodependaftaran`, `nama_periode`, `awal_periode`, `selesai_periode`, `created_at`, `updated_at`) VALUES
(1, 'Periode 1', '2021-07-02', '2021-07-31', '2022-03-16 05:57:51', '2022-03-16 05:57:51'),
(2, 'Periode 2', '2021-09-01', '2021-09-30', '2022-03-16 05:57:51', '2022-03-16 05:57:51'),
(3, 'Periode 3', '2021-10-02', '2022-12-31', '2022-03-16 05:57:51', '2022-03-16 05:57:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usertype`
--

CREATE TABLE `tb_usertype` (
  `usertype` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_usertype`
--

INSERT INTO `tb_usertype` (`usertype`, `role`) VALUES
(1, 'admin'),
(2, 'adminpmb'),
(3, 'mahasiswa'),
(4, 'calon mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploadbuktis`
--

CREATE TABLE `uploadbuktis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_registrasi` int(11) DEFAULT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_pembayaran` tinyint(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uploadbuktis`
--

INSERT INTO `uploadbuktis` (`id`, `no_registrasi`, `gambar`, `created_at`, `updated_at`, `status_pembayaran`) VALUES
(34, 20220078, '1643270500744.jpg', '2022-01-27 01:01:40', '2022-01-27 01:01:40', 0),
(35, 20220080, '1643957535305.PNG', '2022-02-03 23:52:15', '2022-02-03 23:52:15', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_registrasi` int(11) DEFAULT NULL,
  `id_jalurmasuk` int(11) DEFAULT NULL,
  `id_jalurpendaftaran` int(11) DEFAULT NULL,
  `id_programstudi` int(11) DEFAULT NULL,
  `id_periodependaftaran` int(11) DEFAULT NULL,
  `nama_calon_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `asal_sekolah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `no_registrasi`, `id_jalurmasuk`, `id_jalurpendaftaran`, `id_programstudi`, `id_periodependaftaran`, `nama_calon_mahasiswa`, `email`, `no_hp`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `asal_sekolah`) VALUES
(1, 0, NULL, 0, 33, 0, 'admin', 'admin@polimercia.com', '', 'admin', NULL, '$2y$10$zxSDwm6L/VQHc.7xuiz.zuY8Rllq5gGnS3xc2Ms1eS5qRhDgs4GuS', NULL, '2021-09-16 18:09:53', '2021-09-16 18:09:53', ''),
(3, 0, NULL, 0, 30, 0, 'konten', 'konten@gmail.com', '', 'konten', NULL, '$2y$10$f.8TsI7HcugVOmS1d9.DreCHlI9q0N5V06l8SXAVQtRdls6qioTHy', NULL, '2021-09-16 18:26:40', '2021-09-16 18:26:40', ''),
(60, 20210060, 1, 1, 32, 3, 'WIDIYA KUSUMA', 'widiyakusumaa18@gmail.com', '085723170976', 'user', NULL, '$2y$10$xYW6WGVFQIIZ0xKUaX7MY.KZW7aW.uXGK7SA0lTQgZEjC645qFyiq', NULL, '2021-12-15 20:31:07', '2021-12-15 20:31:07', ''),
(61, 20210061, 1, 1, 33, 3, 'ACHMAD SYAHRONI', 'roniever6@gmail.com', '082338391535', 'user', NULL, '$2y$10$J5vG0AKC9fxbt/ALVbPfKuYa2mq5tOedQooOp7AOh4OG6rbWy7CYK', NULL, '2021-12-15 21:23:12', '2021-12-15 21:23:12', ''),
(62, 20210062, 1, 1, 33, 3, 'AFANDO BUDI SATRIO', 'Af.satrio901@gmail.com', '089510066025', 'user', NULL, '$2y$10$SsQVsJNiXLnC9bQ6jxsUN.GEs7im75hgepu7Y1oI6xk8zyNDZ/FXu', NULL, '2021-12-15 21:24:09', '2021-12-15 21:24:09', ''),
(63, 20210063, 1, 1, 33, 3, 'ERLYN YELIANA', 'Erlynyeliana167@gmail.com', '085648114906', 'user', NULL, '$2y$10$TOm3cFK0pK7eFQ9T/wq2Aez.z5/1C5W6WRPcjB15GpIMYJK1TsyUy', NULL, '2021-12-15 21:24:25', '2021-12-15 21:24:25', ''),
(65, 20210065, 1, 1, 33, 3, 'Maya Meidayanti', 'Meimaya72@gmail.com', '085732164729', 'user', NULL, '$2y$10$nY0/bOwSk.gDlqTZRkAPQeYEnUG1wvdojxNLONaPApkD.U.VEdIGa', NULL, '2021-12-15 21:27:35', '2021-12-15 21:27:35', ''),
(72, 20210072, 1, 1, 31, 3, 'Ilham The Fuck Boy', 'humaspolimercia@gmail.com', '085704057291', 'user', NULL, '$2y$10$oaksD82ezyt5P4hbaFgn3e702DXFiLhR5zlbKtEiOK6FvlI2yKaMm', NULL, '2021-12-20 21:46:11', '2021-12-20 21:46:11', ''),
(76, 20210073, 2, 1, 32, 3, 'Emir', 'firzaqemir68644@gmail.com', '+6285704057291', 'user', NULL, '$2y$10$/rpQ7uzx0shfa5i3L7w6duI3ts6kb5VD.xpb80JRUo1BXF2eQxTFe', NULL, '2021-12-27 06:50:59', '2021-12-27 06:50:59', ''),
(77, 20220077, 1, 1, 31, 3, 'contoh', 'polimerciasi@gmail.com', '08563377164', 'mhs', NULL, '$2y$10$z.cH3ERUX5vP37zOt9FzfuU.xVRGXVAx7k8EVB0GHOCJIGzXyR6NG', NULL, '2022-01-05 19:29:28', '2022-05-20 06:49:10', ''),
(78, 20220078, 1, 1, 32, 3, 'emir', 'firzaqemir12345@gmail.com', '085704057291', 'mhs', NULL, '$2y$10$ozTt26Wvau4SQ2z2ZU6jTe9K8jvbLnn/Umt8LuccvE3kPD0H0g8cS', NULL, '2022-01-27 01:00:01', '2022-05-25 07:21:31', ''),
(79, 20220079, 1, 1, 33, 3, 'YUSUF MAHENDRA', 'yusufmahendra2609@gmail.com', '085602672509', 'mhs', NULL, '$2y$10$ezOevObPNUe0hLSVg4Vb1ecLVs8Lf10nvKL7mEVVUbxSWl2Wfk0LC', NULL, '2022-01-31 02:52:41', '2022-05-20 06:49:44', ''),
(80, 20220080, 1, 1, 32, 3, 'Firzaq Emir Pranowo', 'firzaqemirpranowo@gmail.com', '085704057291', 'mhs', NULL, '$2y$10$cnXjwA/8vjN3a2kBSklqPuwSEE1Abi2phxVywx2dAbBRn/MkZ1iey', NULL, '2022-02-03 23:50:37', '2022-05-25 07:21:39', ''),
(83, 20220081, 1, 1, 31, 3, 'coba', 'coba@coba.com', '08123456789', 'mhs', NULL, '$2y$10$HD.4trEETiJgkvHkMhRkn.mj//p69irC4bFtu5uLzwqxXRFHevKVe', NULL, '2022-03-14 19:46:28', '2022-05-20 06:51:13', 'sma n coba'),
(84, 1212212, 1, 1, 33, 3, 'coba', 'coba_lagi@coba.com', '08123456789', 'mhs', NULL, '$2y$10$CRzwsCWM7wY7es1EokX7gum/xCjjBF3JjmW2uvwgGYrjvVRuGwX5O', NULL, '2022-03-14 20:03:18', '2022-05-20 06:49:24', 'sma n coba'),
(85, 20220085, 1, 1, 33, 3, 'coba', 'coba_lagi_ngen@coba.com', '08123456789', 'user', NULL, '$2y$10$GDk6PfYUHXmJCeNgCzr4e.8OAuJUKWSoB7cmW5jXtjR5dc9KaH2Fi', NULL, '2022-03-14 20:03:59', '2022-05-20 06:24:32', 'sma n coba'),
(87, 20220086, 1, 1, 33, 3, 'Ody Guys', 'odytrisyahrial@gmail.com', '08282828828282', 'mhs', NULL, '$2y$10$23HpyaQNMpc2ahPsK9yilOsI1yfEaCU1bcvA3EJaF.0egf4zC922e', NULL, '2022-04-21 23:14:07', '2022-05-20 06:48:07', 'sman 7'),
(88, 20220088, 2, 1, 33, NULL, 'Ody Baru Cuy', 'odytri@gmail.com', '2020020202', 'user', NULL, '$2y$10$z.yKhnc8T5T5.xIqT43LTe6.k13fbFp.PESWA5DnWv3cISq7XqkAO', NULL, '2022-05-12 21:19:20', '2022-05-20 06:46:47', NULL),
(89, NULL, NULL, NULL, 31, NULL, 'A\'ISNA DELLA RAHMAWATI', 'rahmawatidella564@gmail.com', '85784304781', 'mhs', NULL, '$2y$10$Zg2LzN0WFuMBlEIkrIWBUuPnkwr/6HnIijVPN2.rlV3Qy4uR1pmKq', NULL, '2022-05-19 18:41:24', '2022-05-19 18:41:24', NULL),
(90, NULL, NULL, NULL, 31, NULL, 'CITRA DIAH AYU KUSUMA', 'citradiahayu1@.com', '85785589687', 'mhs', NULL, '$2y$10$nVk31nDh4jzIO7.Sg4rqze7oW8OLJJSqxNuuHVECX17Aff/eJ5BE.', NULL, '2022-05-19 18:41:24', '2022-05-19 18:41:24', NULL),
(91, NULL, NULL, NULL, 31, NULL, 'GRACE LORENSIA TUPANO', 'gracelorensiaa@gmail.com', '85895472791', 'mhs', NULL, '$2y$10$YIdmlEC.hxp6SxiQrlNG8etlT.vSpDT.MxEmluCec9P1osZFjALEO', NULL, '2022-05-19 18:41:24', '2022-05-19 18:41:24', NULL),
(92, NULL, NULL, NULL, 31, NULL, 'KHAIRATUNNISA ABADIYAH', 'nisaabadiah929@gmail.com', '89697142306', 'mhs', NULL, '$2y$10$w5X.d.niI.MEWqi/nUJGZ.wxJzOyWZ8qXIUnMWJUO8ai.ZD2EJqWm', NULL, '2022-05-19 18:41:24', '2022-05-19 18:41:24', NULL),
(93, NULL, NULL, NULL, 31, NULL, 'NABELLA FITRIA NINGRUM', 'nabella630@gmail.com', '82331743054', 'mhs', NULL, '$2y$10$1L0kdrTzcCsnAI9Ugd1qhOBisc5NdgH2tVyLnX6LMPNQxymIDgZR.', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(94, NULL, NULL, NULL, 31, NULL, 'NURDYANA YUNITA SARI', 'Opponita072@gmail.com', '85855211763', 'mhs', NULL, '$2y$10$dp.34sl3y1siyC9IQv.gu.Z6Z9c8.MgVWvM4TQEnlWPQzdyqwBVbq', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(95, NULL, NULL, NULL, 31, NULL, 'PUTRI KURNIA SARI', 'putrikurniasari20140@gmail.com', '0852 3270 5378', 'mhs', NULL, '$2y$10$BG.3mcrBrw.mijck7qPaPuWXe4OQH7X8C6KWasJLiePkGU4UK.NYW', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(96, NULL, NULL, NULL, 31, NULL, 'SITI HAJAR FATIMAH', 'hajarfatimah92@gmail.com', '85706694172', 'mhs', NULL, '$2y$10$z6bxQk/lxY2ip95Q8kn1O.bxzlc9G52gcvQZWejzWVW6BEougAqES', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(97, NULL, NULL, NULL, 31, NULL, 'TUNGGAL PANGESTU', 'tunggalpangestu705@gmail.com', '085 648 400 651', 'mhs', NULL, '$2y$10$jZJJoY3fEB0gs7XKAPWC/ezejPgB6UrPn9gt8p/qhopsf43PmAS42', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(98, NULL, NULL, NULL, 32, NULL, 'AMELIA RACHMAWATI AYUNINGTIAS', 'ameliatias212@gmail.com', '0858 0748 3761', 'mhs', NULL, '$2y$10$/jzddIjtHCfopadlZsMEr.DplUIWNishY9yx4bBYNQq/q3Hxzejey', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(99, NULL, NULL, NULL, 32, NULL, 'ANDINI MUTIARA SEPTI', 'mutiaraandini1402@gmail.com', '0858 9573 2033', 'mhs', NULL, '$2y$10$/WRPGxM069xmKosvbHfXhOLhWXnSCsoRYIv00hyejaEG6MQMhsHqq', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(100, NULL, NULL, NULL, 32, NULL, 'ANGGI EKA PUTRI', 'anggiekaputri123@gmail.com', '0856 4926 9847', 'mhs', NULL, '$2y$10$pp6xiB3QXfemUFbghJYa6esvRwDbEak1bxj4zDLECBMCtim2bgQv6', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(101, NULL, NULL, NULL, 32, NULL, 'ARGARETA ERFIANA PUTRI', 'argaretacell303@gmail.com', '0877 8538 8091', 'mhs', NULL, '$2y$10$ZJuDprO5kfp/OClhZLzBGO3lLvG6fPjrqsD4TLYCCgcLhmOQlWLd.', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(102, NULL, NULL, NULL, 32, NULL, 'BAYU FAJAR PRATAMA', 'BAYUFAJAR060@GMAIL.COM', '0858 1653 4701', 'mhs', NULL, '$2y$10$fg/TjjUBSoUvhKO..QqQT.JvXjhjstQ5Iqs6.4euDjA4frpVa/eUy', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(103, NULL, NULL, NULL, 32, NULL, 'DILA PUTRI ANGGRAINI', 'dilaputeri57@gmail.com', '0858 5487 8562', 'mhs', NULL, '$2y$10$qQQ9B62UxpxuSLl7HBaH2Od9qkO7rwv.J1gSWQBuaCoTjuD0xE5Pu', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(104, NULL, NULL, NULL, 32, NULL, 'ELISA LINDA PUTRI', 'elisalindaputri@gmail.com', '0816 1521 0605', 'mhs', NULL, '$2y$10$llQim1CAJhDWD1cHyVZx5.HDhaDW/GG.S8pyTlprKX37EvRFIZh9u', NULL, '2022-05-19 18:41:25', '2022-05-19 18:41:25', NULL),
(105, NULL, NULL, NULL, 32, NULL, 'GALIH YULIANTO', 'galihyulianto1307@gmail.com', '85735581226', 'mhs', NULL, '$2y$10$S5iVx/YDOF8u7jUmA83Bu.UMT/nGaPVJA3av45ioAN9jGice7qBj.', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(106, NULL, NULL, NULL, 32, NULL, 'LOUIS WIDIATMA EDYTIA PUTRA', '@louiswidiatma.@gmail.com', '0858 7265 8591', 'mhs', NULL, '$2y$10$HFACS/u8SKBLISsqDdITQOR1Rdv.2Hu6wl6AoGRF8Tdt4a9aR1Fpe', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(107, NULL, NULL, NULL, 32, NULL, 'LULUK APRILIA', 'aprilialuluk254@gmail.com', '87877058388', 'mhs', NULL, '$2y$10$xxjJ/EQUCHGv53S3KP1buuPsopByxuUYd5MGlbQrbN0eOYIdktXMK', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(108, NULL, NULL, NULL, 32, NULL, 'NIKI WULAN SEPTIARI', 'nikysepty@gmail.com', '0858 9534 2381', 'mhs', NULL, '$2y$10$7WrFyZuQx4g9Mwh7d1iv0OiAQ6gaFQQeWzSlzsDQONljHiI4KntvC', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(109, NULL, NULL, NULL, 32, NULL, 'TRISFIRDAONA RASHAMIDA IQDAM', 'firdaona01@gmail.com', '0899 0436 684', 'mhs', NULL, '$2y$10$ojtmQc4Y1.ojAD10e4cWmuFH1KDa4Lx6Wz/NqQ5GUq4.8hIeSMph.', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(110, NULL, NULL, NULL, 32, NULL, 'WAHYU PURNOMO', 'wahyupe2003@gmail.com', '0852 3680 3756', 'mhs', NULL, '$2y$10$urQS8CpkMf3fRMjURNd.ROZlipJKszRUBlWwlsCQIW/HoW0JphckC', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(111, NULL, NULL, NULL, 32, NULL, 'YULINDA MUSDHALIFAH', 'yulindamusdalifah07@gmail.com', '85730672339', 'mhs', NULL, '$2y$10$hVcjSYZuAKLoi7QNRcXU5encj3sVxhhp8p/D2hgfzfI3CBjWXy1yS', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(112, NULL, NULL, NULL, 33, NULL, 'A MAULANA IBRAHIM', 'sohermaulana84@gmail.com', '0858 1527 8461', 'mhs', NULL, '$2y$10$MbLtMBZq7HxlHCjDzCeIEek6uJ8ifWimkXnWMiV/L3huUlviLktbm', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(113, NULL, NULL, NULL, 33, NULL, 'ADINAN FATCHUR ROHMAN', 'adinan6960@gmail.com', '0857 0705 9362', 'mhs', NULL, '$2y$10$34LQP36wVGMPeo5cYq5kt.qrDOH5l3wneCP1mEKMhZ93DXH/BhzL6', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(114, NULL, NULL, NULL, 33, NULL, 'AMILIA MUVITA', '87.amilia@gmail.com', '0822 2907 8367', 'mhs', NULL, '$2y$10$gGLkzi.k36LgzPQp.0ytx.X16KH1w171lBgJmpKAPWCiPrDnR/E22', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(115, NULL, NULL, NULL, 33, NULL, 'ARUM SUNNI INDRIANI', 'arumsunnii@gmail.com', '0857 8404 9837', 'mhs', NULL, '$2y$10$rJNGAxvm1XuymDhSeN4U5OLNVwJZsQnFRIMXv2WXbAvpR9aIOAPJq', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(116, NULL, NULL, NULL, 33, NULL, 'GHIFARI AULIA AZHAR REZA', 'azharreza87@gmail.com', '0813 3240 1472', 'mhs', NULL, '$2y$10$FNsdktpM2MpIm16KA3XfxOH6BvxVAMKAgQiT/bXRYjPf0fYJpC6Wa', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(117, NULL, NULL, NULL, 33, NULL, 'IKHWAN NASA\'I MUSTOFA', 'ikhwayahoo123@gmail.com', '0813 3187 9198', 'mhs', NULL, '$2y$10$VhvN.CnuwFwyWXwZl0YozOsmz.0cogwpVMaA/TTL88pl3JtmB7bRS', NULL, '2022-05-19 18:41:26', '2022-05-19 18:41:26', NULL),
(118, NULL, NULL, NULL, 33, NULL, 'MUCHAMMAD MAULANA ABBIDEN', 'abidinmaulana515@gmail.com', '0895 36726 1533', 'mhs', NULL, '$2y$10$hJ5QJsDcz0tZWRlIkfxBPODSxns1xkGN8TPlfHQT4k0j3ero4NJ3K', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(119, NULL, NULL, NULL, 33, NULL, 'MUHAMAD ICHSAN', 'Ichsanuciha@gmail.Com', '0821 1616 2087', 'mhs', NULL, '$2y$10$hOhl/Tdfbe15/GvQA1jXy.qO1BnlhVk5zly1xl0XXgSCQEG8V7SYO', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(120, NULL, NULL, NULL, 33, NULL, 'MUHAMMAD ALDI ZAKARYA', 'maldizakarya3@gmail.com', '85856487860', 'mhs', NULL, '$2y$10$LKQ/5qP/u0qp.hgH0OZXNeyn5Gqv4pj7/O9IwDJJx0FjXQK5zHdNe', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(121, NULL, NULL, NULL, 33, NULL, 'MUHAMMAD NAWAL ISHLAKH', 'dawsonjack591@gmail.com', '0877 4311 0137', 'mhs', NULL, '$2y$10$HHSL.y747.xKvFtVmOVm6.YYawGLdKXsu2GsPuxDqSASJqHzRDOvC', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(122, NULL, NULL, NULL, 33, NULL, 'NILAM SARI', 'nilamkediri87@gmail.com', '0812 3264 3022', 'mhs', NULL, '$2y$10$qNp8teLqi18WygJVD9SD2uQXKI5WK0ea21voj1RVOKfu4KDDtflba', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(123, NULL, NULL, NULL, 33, NULL, 'MOHAMMAD RAFLI SANJANI', 'raflibaik12@gmail.com', '0815 1566 7352', 'mhs', NULL, '$2y$10$NVLzw50jY0CjQMsyeb1DrOgZPhc.zNYeQ2SU2zPDq.xkqWJs0U8S6', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(124, NULL, NULL, NULL, 33, NULL, 'REGINA EKAGUSTIN NURMILA SARI', 'nurmilasari08808@gmail.com', '0855 3656 2650', 'mhs', NULL, '$2y$10$TBBnYGZuILgpEnCIDulLmOlz/5OSthtPehtQS3ewYRIIpgsbOlwg6', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(125, NULL, NULL, NULL, 33, NULL, 'RENDHI ANNORA RICHARD', 'Rendhi Annora Richard', '0812 3275 4785', 'mhs', NULL, '$2y$10$AqZ2LlDbafnZ8W8rw3.gMOyvRqvqb6PLuHkkCTXskK3OqrMj3MLFi', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(126, NULL, NULL, NULL, 33, NULL, 'SANDY MUHAMMAD FARHAN', 'farhansandy0@gmail.com', '0822 3369 4507', 'mhs', NULL, '$2y$10$.skJl.wyzc6pYtoVxbAWvedq11.0y4VHzMKxctMc3ariXVkTV.JJS', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(127, NULL, NULL, NULL, 33, NULL, 'WHELDA PUTRI AULIA LESTARI', 'wheldaputri20@gmail.com', '0856 4959 0743', 'mhs', NULL, '$2y$10$7H6KabERaH7u6KxRbQMThubAQt1ax/JA3FkWaDp9iBPG84FISvhpC', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(128, NULL, NULL, NULL, 33, NULL, 'YUSUF FATHONI ASH SHIDIQ', 'fathoniyusuf44@gmail.com', '89505492590', 'mhs', NULL, '$2y$10$NJCTcjnLIk/q7/qccnoAOeBQ42mhtX7wyMznhyfZ3yudhqAJt96bu', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(129, NULL, NULL, NULL, 31, NULL, 'Alfi Riqhotul Khoyriyah', 'alfirikahmm@gmail.com', '85784755185', 'mhs', NULL, '$2y$10$3.9RlFcHAB3xQb2.wDFV.uGF6uhfJiJddHVewiOVDzv5UInbS7f4q', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(130, NULL, NULL, NULL, 31, NULL, 'Ana Azizah', 'aziizahnaa25gmail.com', '85755178767', 'mhs', NULL, '$2y$10$/QSVWLiBqVSez.O.DfWuDu7BDaYF/38KwUzWOQsfiEQxzAINsQIeK', NULL, '2022-05-19 18:41:27', '2022-05-19 18:41:27', NULL),
(131, NULL, NULL, NULL, 31, NULL, 'Anggita Ika Putri Kristianti', 'putrianggita341@gmail.com', '81232815124', 'mhs', NULL, '$2y$10$tlPfNjIINtZ2VEwZKVVNFexnNJnZy6Bvz8gUCykHvNqvhlGiOTlTq', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(132, NULL, NULL, NULL, 31, NULL, 'Artian Farrihna Febri Valentina', 'Artianvalentina8@gmail.com', '85816985862', 'mhs', NULL, '$2y$10$rjO1KIcgQmqgIdNhmLCw1.PyfKvyQi.pyJH54EExum79ouE6v3DCi', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(133, NULL, NULL, NULL, 31, NULL, 'Devi Anggrila', 'devianggrila@gamil.com', '089603067414', 'mhs', NULL, '$2y$10$fJrmVdrmka.OELM2IZVO0.1QAe9UH54CjbqYsIeTrHoQIAACnaWO.', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(134, NULL, NULL, NULL, 31, NULL, 'Dwi Fitri Wahyuni', 'dwifitriwahyuni04@gmail.com', '895339748201', 'mhs', NULL, '$2y$10$uEb5UkLbxljxRsXewMTc6Ov5iIlJou7I8krzJYuLaXz7bNiEB7CsC', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(135, NULL, NULL, NULL, 31, NULL, 'Elvina Dian Permata Sari', 'elvinadianpermatasari@gmail.com', '85748081488', 'mhs', NULL, '$2y$10$BCrfETT4oTCEklIOri79WOqUKGaunS5QLeUtRyqKRW9VsVc8D6E5.', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(136, NULL, NULL, NULL, 31, NULL, 'Fatma Putri Utami', 'fatmaaptr24@gmail.com', '85819908728', 'mhs', NULL, '$2y$10$TqFd4UW5Mydu4gMZKKWZAOWzm7MXA.3YgRYIm9597jMNFg4nXy3Vq', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(137, NULL, NULL, NULL, 31, NULL, 'Feby Ira Mayasanti', 'febysanti01@gmail.com', '82357135767', 'mhs', NULL, '$2y$10$YndbZ4lq7KWqMs7GQr0Qw.lnYWYbS5KWrf.w0Rs3RMnFdbwl6t3p6', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(138, NULL, NULL, NULL, 31, NULL, 'Hidayatul Fitria Nisa Putri A. S.', 'hidayatulfitria49@gmail.com', '81559940028', 'mhs', NULL, '$2y$10$puMJxuhlaAHnPmaougyqLOcqCeTGFBANUIf7UqBqBStFwU4v.fny6', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(139, NULL, NULL, NULL, 31, NULL, 'Indhah Suci Wati', 'indhahsuciwati@gmail.com ', '85895188323', 'mhs', NULL, '$2y$10$/pMYlM0gUWC9Wg./cCoHYOsUSw5ZT12DBb5iKgUnBGwSMEeTz8ASy', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(140, NULL, NULL, NULL, 31, NULL, 'Lutfiana', 'lutfianangawi2209@gmail.com', '81803308549', 'mhs', NULL, '$2y$10$rHNiqGJBJiopmVM7VtBJvOOokzeSX4xlsjCStBM99EsNIbfkhMlra', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(141, NULL, NULL, NULL, 31, NULL, 'Nada Ajeng Suci Sugiarti', 'nadaajeng2505@gmail.com', '82233629709', 'mhs', NULL, '$2y$10$wi7dKBj46H8f5YSMGqnIwejA8KZSe1SFkbkhw09R0N3IUuuU6.QMi', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(142, NULL, NULL, NULL, 31, NULL, 'Nanda Nurista', 'nandanurista@gmail.com', '82264113406', 'mhs', NULL, '$2y$10$/MpRgIL6tN51xECTqnBrK.BR9Hn5f3MZVxNMij7x3t5CdLHTLGbmG', NULL, '2022-05-19 18:41:28', '2022-05-19 18:41:28', NULL),
(143, NULL, NULL, NULL, 31, NULL, 'Restin Dwi Pujiastuti', 'puputresty253@gmail.com', '85745622303', 'mhs', NULL, '$2y$10$Jbh77IXO8a/K8L6NeBfUR.XnzIqmjUaW.64aij4mIr.e4RXpap8BK', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(144, NULL, NULL, NULL, 31, NULL, 'Ririn Dwi Kusumawati', 'kr1606134@gmail.com', '081336789997', 'mhs', NULL, '$2y$10$2hC5fyfN1cdLOyfVQ2MAve1/X2hBkR/d.BaoGbAsZbJ3lufscAkya', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(145, NULL, NULL, NULL, 31, NULL, 'Susan Prasetya Ningsih', 'susanprasetya2020@gmail.com', '85806909259', 'mhs', NULL, '$2y$10$4rlt2xKeHlnQeOAJ1HMhr.LMn6f1a7kUP1p7nffaciVD6I.fC7iG.', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(146, NULL, NULL, NULL, 31, NULL, 'Ulvi Eitalia', 'ulvieitalia@gmail.com', '82245481852', 'mhs', NULL, '$2y$10$8KPaNnQanINOvbVOD9l8r.kapQsQaPRSrKH5BGDixau8eRO423wma', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(147, NULL, NULL, NULL, 31, NULL, 'Umi Nur Khabibah', 'uminurkabibah@gmail.com', '85604710391', 'mhs', NULL, '$2y$10$73mUUrKiQpe3S1MeswiRMO5NDrQloWKvZs0kN/pFsnaQAIj5dsJiK', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(148, NULL, NULL, NULL, 31, NULL, 'Wahyu Trias Nopitasari', 'wahyutriasnopitasari@gmail.com', '85843904533', 'mhs', NULL, '$2y$10$es2QJSH0uqtTHNjVTozpCu9gjFW6wLtCYbK7G372MjjEaBLO8pRoK', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(149, NULL, NULL, NULL, 31, NULL, 'Winda Pramudya Wardani', 'Windapramudya01@gmail.com', '85693725302', 'mhs', NULL, '$2y$10$aw92YyV7GiSP5t6OYUKuVuPWUytJqIlKAmXufsHcrZd2ZdNgLE/2a', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(150, NULL, NULL, NULL, 31, NULL, 'Cintya Dewi Sari Putri', 'cintya@medika.ac.id', '85732780205', 'mhs', NULL, '$2y$10$/vRs1qbMbHnVsU9VyeMR2uFSwDCAfvOEoXE/T.mdTYRDxLVqBEsHC', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(151, NULL, NULL, NULL, 31, NULL, 'ALFINA KARTIKA ANGGRAENI', 'alfinaaakartika20@gmail.com', '81558986636', 'mhs', NULL, '$2y$10$npYHMYufb4k2yLkhaucKMO12alhXwzRMAy6z2flvIiilA/LCQkMZC', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(152, NULL, NULL, NULL, 31, NULL, 'ALMIRA NASWA TRILESTARI', 'almira201709@gmail.com', '81251827562', 'mhs', NULL, '$2y$10$vYJb8A/LCSgecs4xLlDJM.WmOxe7v3yI8yHx.rCMxdJMEMyQG20ui', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(153, NULL, NULL, NULL, 31, NULL, 'ANI SETYOWATI', 'setyowatiani369@gmail.com', '82139065367', 'mhs', NULL, '$2y$10$HInWc3UhARzvE4jNx86LyuS/e44en/XSr.YV307FG1344.wDBMEMq', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(154, NULL, NULL, NULL, 31, NULL, 'DEVIRA RENIKAWATI', 'devirarenika56@gmail.com ', '83117111907', 'mhs', NULL, '$2y$10$Nk1r6PJ6EdRvgCupteJ/P.LtKVOqY39ozOOTUK5VGe4m2b9.Z3QgK', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(155, NULL, NULL, NULL, 31, NULL, 'DILA AYU PURNANDASARI', 'dilaayu@gmail.com', '81615172707', 'mhs', NULL, '$2y$10$.JuvE5kJ9yF4iek0pR2mUuunrr7n4Ng/qc0H6WCUXTYSFA.qzhq1e', NULL, '2022-05-19 18:41:29', '2022-05-19 18:41:29', NULL),
(156, NULL, NULL, NULL, 31, NULL, 'DINDA PUSPITA SARI', 'dindakann29@gmail.com', '85748156331', 'mhs', NULL, '$2y$10$OrcZLr.7c8VoBwiwEWNBbeImXbR.v4oj7AAEIanofXjt5/SaX0Nfa', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(157, NULL, NULL, NULL, 31, NULL, 'ERLINDA EKA OKTAVIANI', 'erlindaekaoktaviani@gmail.com', '082142934981', 'mhs', NULL, '$2y$10$v0ez75wvuh3iTakcRKYk/eTIwB1K77Y1BgEhTS39ft3Q41H5xRzBu', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(158, NULL, NULL, NULL, 31, NULL, 'GALUH MUSTIKANING KAWEDAR', 'kawedargaluh2324@gmail.com', '085852465262', 'mhs', NULL, '$2y$10$iV1XitWstJ1a.BCjg0nR7.V4S1IZSC5K8avy3Oj6zxbU6w2GkddcW', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(159, NULL, NULL, NULL, 31, NULL, 'INTAN AYU MU\'ALIMAH', 'intanayu485@gmail.com', '85256019317', 'mhs', NULL, '$2y$10$2JgvtKTKbHYNnbVCdTjUwuJRxDaNlDXADpqHjGsjCWP0xNTHbUo4G', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(160, NULL, NULL, NULL, 31, NULL, 'JIHAN AULIA', 'auliajihan189@gmail.com', '82244669676', 'mhs', NULL, '$2y$10$lxa2VExEUVtpZj890s0Hd.ihZa0uBDgpO0qq/vweqeiEbTv3abFPG', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(161, NULL, NULL, NULL, 31, NULL, 'LISTY SULISTIYASARI', 'listysulis@gmail.com', '85536836205', 'mhs', NULL, '$2y$10$68NMTvV8M8GY.BS4Qmh8HuYbVNH/LY8iLygoZb820QmHrD1dh89wO', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(162, NULL, NULL, NULL, 31, NULL, 'LUSI WAHYUNITA SARI', 'lusiwahyunitasary@gmail.com', '85335379095', 'mhs', NULL, '$2y$10$sNgODYEe67.h7tRH1zJgLeTbaj6TviG9VfdxS5jD4pgf8qwkkOt26', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(163, NULL, NULL, NULL, 31, NULL, 'MONICA SALSABILA CANTIKA AMANJA', ' monicasabila12345@gmail.com', '85732080472', 'mhs', NULL, '$2y$10$gWHhQ1C6cMZpG2/KpqL8ie9op8FSXDT7Y/UPnUHQxoHYBzUxA3WFa', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(164, NULL, NULL, NULL, 31, NULL, 'NURO NOVA LARISA', 'nuronova15@gmail.com', '89603630913', 'mhs', NULL, '$2y$10$dm8PL.UqhwrmVzvv/e7B6.GKOZVsSKl8FexstvYljfcaggs3jiDU2', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(165, NULL, NULL, NULL, 31, NULL, 'RINI', 'riniririn928@gmail.com', '85648709428', 'mhs', NULL, '$2y$10$.2KqRMMyVqX0qoWBKjJYIu9ME2GTbLO6mMkmJnBXImnlUTV1unfOS', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(166, NULL, NULL, NULL, 31, NULL, 'RISMA AMALIA PUTRI', 'amaliarisma866@gmail.com', '85807404521', 'mhs', NULL, '$2y$10$P8kMD3ezoLpkTq9WhCXP4.Hrim/uUJedTp49oYxAokxkfYHz1J2YC', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(167, NULL, NULL, NULL, 31, NULL, 'SEPTA WEDA DWIYANA', 'tataweda02@gmail.com', '85812356584', 'mhs', NULL, '$2y$10$VixjJ2uCDGNz4YwBCXcbPe6R4m1Wacd2TgvDGueasje.2D0XwLM4m', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(168, NULL, NULL, NULL, 31, NULL, 'SUSI PURNAMASARI', 'purnamasarisusi69@gmail.com', '85855271151', 'mhs', NULL, '$2y$10$HBlr4uobrnYzy/Q0TiKZ4uZr.iKlfImcqKNRoa8AocSbMtTHc7j2u', NULL, '2022-05-19 18:41:30', '2022-05-19 18:41:30', NULL),
(169, NULL, NULL, NULL, 31, NULL, 'SYNTYA AMANDA AGUSTIN', 'syntyaamanda2@gmail.com', '85850861969', 'mhs', NULL, '$2y$10$1MMpAe1Eb6GW6RPlNQn2g.LUMEutP3SA.6HS4IJpGI0jcN.5Jvbae', NULL, '2022-05-19 18:41:31', '2022-05-19 18:41:31', NULL),
(170, NULL, NULL, NULL, 31, NULL, 'TRIANA SASONGKO', 'trianaa.sasongko@gmail.com', '081515055505', 'mhs', NULL, '$2y$10$xVs77d7.wzYlQsqo/f97q.IYt6YnXrHYwZOuxnD5yUjPzSd6faHsq', NULL, '2022-05-19 18:41:31', '2022-05-19 18:41:31', NULL),
(171, NULL, NULL, NULL, 31, NULL, 'VARICHAH AULIA INDINA', 'kadekvarichah44@gmail.com', '87714487357', 'mhs', NULL, '$2y$10$fhL3UEb2srf96gOkfFJ0WO24W6VZcB9YiIRt.ElRmjf6otdtrffPO', NULL, '2022-05-19 18:41:31', '2022-05-19 18:41:31', NULL),
(172, NULL, NULL, NULL, 31, NULL, 'WIDIA ANGGUN PERTIWI', 'widia2@medikawiyata.ac.id', '85806170535', 'mhs', NULL, '$2y$10$UN5zmw3yyTlEO8twMGf/puhfNBYWnXa2R.KpGosbh26Bqaacob.Di', NULL, '2022-05-19 18:41:31', '2022-05-19 18:41:31', NULL),
(173, 202200170, 2, NULL, 33, NULL, 'Ody51', 'ody51@gmail.com', '2020020202', 'mhs', NULL, '$2y$10$X6azS.keJ5CycvLNXMpSxeltaKjZ1od3/0sm3qSzExVGeldCiIueS', NULL, '2022-05-20 00:53:29', '2022-05-20 00:53:29', NULL),
(174, NULL, NULL, NULL, NULL, NULL, 'odyts', 'odyts@gmail.com', NULL, 'mhs', NULL, '$2y$10$zxSDwm6L/VQHc.7xuiz.zuY8Rllq5gGnS3xc2Ms1eS5qRhDgs4GuS', NULL, NULL, NULL, NULL),
(175, NULL, NULL, NULL, NULL, NULL, 'machrus', 'machrus@gmail.com', NULL, 'admin', NULL, '$2y$10$roLqg.rYb6SAWeXPKLWPN.o85/QU0axKmlT8rn3rvPMU00TXhYMf6', NULL, '2022-06-03 01:45:23', '2022-06-03 01:45:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas_mhs`
--
ALTER TABLE `berkas_mhs`
  ADD PRIMARY KEY (`id_bksmhs`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_programstudi`),
  ADD UNIQUE KEY `jurusan_kode_jurusan_unique` (`kode_jurusan`),
  ADD KEY `jurusan_id_fakultas_foreign` (`id_fakultas`);

--
-- Indeks untuk tabel `kesehatan_mhs`
--
ALTER TABLE `kesehatan_mhs`
  ADD PRIMARY KEY (`id_kesehatanmhs`);

--
-- Indeks untuk tabel `kmatkul`
--
ALTER TABLE `kmatkul`
  ADD PRIMARY KEY (`id_kmatkul`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ortu_mhs`
--
ALTER TABLE `ortu_mhs`
  ADD PRIMARY KEY (`id_ortumhs`);

--
-- Indeks untuk tabel `pendidikan_mhs`
--
ALTER TABLE `pendidikan_mhs`
  ADD PRIMARY KEY (`id_pdmhs`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skala_nilai`
--
ALTER TABLE `skala_nilai`
  ADD PRIMARY KEY (`id_snilai`);

--
-- Indeks untuk tabel `tb_aturpembayaran`
--
ALTER TABLE `tb_aturpembayaran`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `tb_aturpembayaranspp`
--
ALTER TABLE `tb_aturpembayaranspp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `tb_jalurmasuk`
--
ALTER TABLE `tb_jalurmasuk`
  ADD PRIMARY KEY (`id_jalurmasuk`);

--
-- Indeks untuk tabel `tb_jalurpendaftaran`
--
ALTER TABLE `tb_jalurpendaftaran`
  ADD PRIMARY KEY (`id_jalurpendaftaran`);

--
-- Indeks untuk tabel `tb_pembayaranpmb`
--
ALTER TABLE `tb_pembayaranpmb`
  ADD PRIMARY KEY (`id_pembayaranpmb`);

--
-- Indeks untuk tabel `tb_pembayaranspp`
--
ALTER TABLE `tb_pembayaranspp`
  ADD PRIMARY KEY (`id_pembayaranspp`);

--
-- Indeks untuk tabel `tb_periodependaftaran`
--
ALTER TABLE `tb_periodependaftaran`
  ADD PRIMARY KEY (`id_periodependaftaran`);

--
-- Indeks untuk tabel `tb_usertype`
--
ALTER TABLE `tb_usertype`
  ADD PRIMARY KEY (`usertype`);

--
-- Indeks untuk tabel `uploadbuktis`
--
ALTER TABLE `uploadbuktis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas_mhs`
--
ALTER TABLE `berkas_mhs`
  MODIFY `id_bksmhs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_programstudi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_mhs`
--
ALTER TABLE `kesehatan_mhs`
  MODIFY `id_kesehatanmhs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kmatkul`
--
ALTER TABLE `kmatkul`
  MODIFY `id_kmatkul` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ortu_mhs`
--
ALTER TABLE `ortu_mhs`
  MODIFY `id_ortumhs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_mhs`
--
ALTER TABLE `pendidikan_mhs`
  MODIFY `id_pdmhs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `skala_nilai`
--
ALTER TABLE `skala_nilai`
  MODIFY `id_snilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_aturpembayaran`
--
ALTER TABLE `tb_aturpembayaran`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_aturpembayaranspp`
--
ALTER TABLE `tb_aturpembayaranspp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_jalurmasuk`
--
ALTER TABLE `tb_jalurmasuk`
  MODIFY `id_jalurmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_jalurpendaftaran`
--
ALTER TABLE `tb_jalurpendaftaran`
  MODIFY `id_jalurpendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaranpmb`
--
ALTER TABLE `tb_pembayaranpmb`
  MODIFY `id_pembayaranpmb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaranspp`
--
ALTER TABLE `tb_pembayaranspp`
  MODIFY `id_pembayaranspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_periodependaftaran`
--
ALTER TABLE `tb_periodependaftaran`
  MODIFY `id_periodependaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_usertype`
--
ALTER TABLE `tb_usertype`
  MODIFY `usertype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `uploadbuktis`
--
ALTER TABLE `uploadbuktis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
