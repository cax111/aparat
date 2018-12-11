-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 08:23 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id_user`, `username`, `password`, `nama_user`, `nama_perusahaan`, `alamat_perusahaan`, `npwp`, `no_telp`, `email`) VALUES
(1, 'lubnaindo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Beki Subaeki', 'CV. Lubna Indonesia', 'Jl. Babakan Simpar RT. 14 RW. 06 Subang', '72.418.436.1-439.000', '085353505082', 'lubnaindonesia@gmail.com'),
(2, 'dutakencana', 'e10adc3949ba59abbe56e057f20f883e', 'Yuni Kurniati', 'CV. Duta Kencana Indonesia', 'Komp. De Green Mansion No. B14 Jl. Cilengkrang I RT. 09 RT. 03 Cisurupan Cibiru Bandung', '82.638.568.4-429.000', '(022)87882229', 'dutakencanaindonesia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `spesifikasi`, `volume`, `satuan`, `id_surat`, `gambar`, `link`) VALUES
(58, 'laptop', 'metal', '3', 'Buah', 4, '', ''),
(63, 'pintu', 'metal', '6', 'Buah', 4, '', ''),
(64, 'lemari', 'metal', '3', 'Unit', 4, '', ''),
(65, 'Keyboard', '2.4GHz Wireless Connection, USB, Durable, UV-coated keys', '5', 'Unit', 6, '665-Keyboard.jpg', 'https://www.google.com/'),
(66, 'Mouse', '800 dpi, usb, Wired Optical Mouse', '10', 'Unit', 6, '666-Mouse.jpg', 'https://www.google.com/'),
(68, 'Sarung', 'Gajah Mada', '5', 'Buah', 6, '668-Sarung.png', 'https://www.bukalapak.com/'),
(69, 'Batu Bata', 'Supreme', '10', 'Batang', 6, '669-Batu Bata.jpg', 'https://www.bukalapak.com/p/komputer/aksesoris-226/keyboard/8kf9sw-jual-logitech-k-270-wireless-keyboard?from=list-product&'),
(73, 'Aplikasi Simak I', 'PMB, KemahasiswUKM', '1', 'Unit', 8, '', ''),
(76, 'Buku Praktik Ibadah', 'A4, 20 Hal. Color', '676', 'Exp', 10, '1076-Buku Praktik Ibadah.jpg', 'https://www.bukalapak.com/');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `id_universitas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `id_universitas`, `nama_fakultas`) VALUES
(1, 1, 'Ushuludin'),
(2, 1, 'Tarbiyah dan Keguruan'),
(3, 1, 'Syariah dan Hukum'),
(4, 1, 'Dakwah dan Komunikasi'),
(5, 1, 'Adab dan Humaniora'),
(6, 1, 'Psikologi'),
(7, 1, 'Sains dan Teknologi'),
(8, 1, 'Ilmu Sosial dan Politik'),
(9, 1, 'lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`) VALUES
(1, 1, 'Aqidah dan Filsafat Islam'),
(2, 1, 'Studi Agama-Agama'),
(3, 1, 'Ilmu Al-Quran dan Tafsir'),
(4, 1, 'Tasawuf dan Psikoterapi'),
(5, 1, 'Ilmu Hadits'),
(6, 2, 'Manajemen Pendidikan Islam'),
(7, 2, 'Pendidikan Agama Islam'),
(8, 2, 'Pendidikan Bahasa Arab'),
(9, 2, 'Pendidikan Bahasa Inggris'),
(10, 2, 'Pendidikan Matematika'),
(11, 2, 'Pendidikan Biologi'),
(12, 2, 'Pendidikan Fisika'),
(13, 2, 'Pendidikan Kimia'),
(14, 2, 'Pendidikan Guru MI (PGMI)'),
(15, 2, 'Pendidikan Islam Anak Usia Dini'),
(16, 3, 'Hukum Keluarga (Ahwal Al-Syakhsiyah)'),
(17, 3, 'Hukum Ekonomi Syariah (Muamalah)'),
(18, 3, 'Hukum Tata Negara (Siyasah)'),
(19, 3, 'Perbandingan Madzhab dan Hukum'),
(20, 3, 'Ilmu Hukum'),
(21, 3, 'Hukum Pidana Islam\r\n\r\n'),
(22, 3, 'Manajemen Keuangan Syariah'),
(23, 3, 'Akuntansi Syariah'),
(24, 3, 'Ekonomi Syariah'),
(25, 4, ' Bimbingan Penyuluhan Islam\r\n'),
(26, 4, 'Komunikasi dan Penyiaran Islam'),
(27, 4, 'Manajemen Dakwah'),
(28, 4, 'Pengembangan Masyarakat Islam'),
(29, 4, 'Ilmu Komunikasi Jurnalistik'),
(30, 4, 'Ilmu Komunikasi Humas'),
(31, 5, 'Sejarah Peradaban Islam'),
(32, 5, 'Bahasa dan Sastra Arab'),
(33, 5, 'Sastra Inggris'),
(34, 6, 'Psikologi'),
(35, 7, 'Matematika'),
(36, 7, 'Biologi'),
(37, 7, 'Fisika'),
(38, 7, 'Kimia'),
(39, 7, 'Teknik Informatika'),
(40, 7, 'Agroteknologi'),
(41, 7, 'Teknik Elektro'),
(42, 8, 'Administrasi Negara'),
(43, 8, 'Manajemen'),
(44, 8, 'Sosiologi'),
(45, 9, 'PTIPD'),
(46, 9, 'Al-Jamiah'),
(47, 9, 'Ma’had Al-Jami’ah'),
(48, 9, 'Pusat Pengembangan Bahasa'),
(49, 9, 'Pusat Teknologi Informasi dan Pangkalan Data'),
(50, 9, 'Fakultas Sains dan Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `pagu`
--

CREATE TABLE `pagu` (
  `id_pagu` int(11) NOT NULL,
  `harga_dasar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keuntungan_pagu` int(11) NOT NULL,
  `jumlah_keuntungan_pagu` int(11) NOT NULL,
  `ppn_pagu` int(11) NOT NULL,
  `hps_pagu` int(11) NOT NULL,
  `total_harga_pagu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagu`
--

INSERT INTO `pagu` (`id_pagu`, `harga_dasar`, `id_barang`, `keuntungan_pagu`, `jumlah_keuntungan_pagu`, `ppn_pagu`, `hps_pagu`, `total_harga_pagu`) VALUES
(54, 800000, 58, 80000, 880000, 88000, 968000, 2904000),
(59, 900000, 63, 90000, 990000, 99000, 1089000, 6534000),
(60, 3223800, 64, 322380, 3546180, 354618, 3900798, 11702394),
(61, 300000, 65, 30000, 330000, 33000, 363000, 1815000),
(62, 100000, 66, 10000, 110000, 11000, 121000, 1210000),
(64, 200000, 68, 20000, 220000, 22000, 242000, 1210000),
(65, 500000, 69, 50000, 550000, 55000, 605000, 6050000),
(69, 1000000, 73, 100000, 1100000, 110000, 1210000, 1210000),
(72, 20661, 76, 2066, 22727, 2273, 25000, 16900000);

-- --------------------------------------------------------

--
-- Table structure for table `panitia_pengawas`
--

CREATE TABLE `panitia_pengawas` (
  `id_panitia` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nama_panitia` varchar(100) NOT NULL,
  `jabatan_panitia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia_pengawas`
--

INSERT INTO `panitia_pengawas` (`id_panitia`, `id_surat`, `nama_panitia`, `jabatan_panitia`) VALUES
(2, 1, 'Dr. Yani Suryani, S.Pd., M.Si.', 'Ketua'),
(3, 1, 'Mohamad Irfan, ST., M.Kom.', 'Sekretaris'),
(4, 1, 'Drs. Hendra Gumilar.', 'anggota'),
(5, 1, 'Cecep Nurul Alam, MT.', 'Panitia Penerima Hasil Kerja 1'),
(6, 1, 'Agung Wahana, MT.', 'Panitia Penerima Hasil Kerja 2'),
(7, 1, 'Muhammad Indra NS, ST', 'Panitia Penerima Hasil Kerja 3'),
(8, 2, 'a', 'Ketua'),
(9, 2, 'a', 'Sekretaris'),
(10, 2, 'a', 'Anggota'),
(11, 2, 'a', 'Panitia Penerima Hasil Kerja 1'),
(12, 2, 'a', 'Panitia Penerima Hasil Kerja 2'),
(13, 2, 'a', 'Panitia Penerima Hasil Kerja 3'),
(14, 3, 'a', 'Ketua'),
(15, 3, 'a', 'Sekretaris'),
(16, 3, 'a', 'Anggota'),
(17, 3, 'a', 'Panitia Penerima Hasil Kerja 1'),
(18, 3, 'a', 'Panitia Penerima Hasil Kerja 2'),
(19, 3, 'a', 'Panitia Penerima Hasil Kerja 3'),
(20, 4, 'ab', 'Ketua'),
(21, 4, 'bc', 'Sekretaris'),
(22, 4, 'cb', 'Anggota'),
(23, 4, 'hh', 'Panitia Penerima Hasil Kerja 1'),
(24, 4, 'hi', 'Panitia Penerima Hasil Kerja 2'),
(25, 4, 'ho', 'Panitia Penerima Hasil Kerja 3'),
(32, 6, 'Dr. Yani Suryani, S.Pd., M.Si.', 'Ketua'),
(33, 6, 'Mohamad Irfan, ST., M.Kom.', 'Sekretaris'),
(34, 6, 'Drs. Hendra Gumilar.', 'Anggota'),
(35, 6, 'Cecep Nurul Alam, MT.', 'Panitia Penerima Hasil Kerja 1'),
(36, 6, 'Agung Wahana, MT.', 'Panitia Penerima Hasil Kerja 2'),
(37, 6, 'Muhammad Indra NS, ST', 'Panitia Penerima Hasil Kerja 3'),
(38, 7, 'v', 'Ketua'),
(39, 7, 'x', 'Sekretaris'),
(40, 7, 'qw', 'Anggota'),
(41, 7, 'e', 'Panitia Penerima Hasil Kerja 1'),
(42, 7, 'a', 'Panitia Penerima Hasil Kerja 2'),
(43, 7, 'f', 'Panitia Penerima Hasil Kerja 3'),
(44, 8, 'Bambang Tejo', 'Ketua'),
(45, 8, 'Nia Ramadhani', 'Sekretaris'),
(46, 8, 'Dadang Sumatri', 'Anggota'),
(47, 8, 'Agus Murad', 'Panitia Penerima Hasil Kerja 1'),
(48, 8, 'Cepy Selamat', 'Panitia Penerima Hasil Kerja 2'),
(49, 8, 'Agung Wahyudin', 'Panitia Penerima Hasil Kerja 3'),
(50, 1, '197804172005011005', ''),
(51, 2, '197804172005011005', ''),
(52, 3, '197804172005011005', ''),
(53, 4, '197804172005011005', ''),
(55, 6, '197804172005011005', ''),
(56, 7, '197804172005011005', ''),
(57, 8, '197804172005011005', ''),
(65, 10, 'Dr. Yani Suryani, S.Pd., M.Si.', 'Ketua'),
(66, 10, 'M. Masâ€™ud, S.Ag., M. MPd.', 'Sekretaris'),
(67, 10, 'Drs. Hendra Gumilar', 'Anggota'),
(68, 10, 'Momon Sulaeman SH. I.', 'Panitia Penerima Hasil Kerja 1'),
(69, 10, 'Deny Fauzy M. Kom.', 'Panitia Penerima Hasil Kerja 2'),
(70, 10, 'Edi Rohaedi', 'Panitia Penerima Hasil Kerja 3'),
(71, 10, '196604032000031003', 'NIP Panitia Penerima Hasil Kerja 1');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `harga_dasar_penawaran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keuntungan_penawaran` int(11) NOT NULL,
  `jumlah_keuntungan_penawaran` int(11) NOT NULL,
  `ppn_penawaran` int(11) NOT NULL,
  `hps_penawaran` int(11) NOT NULL,
  `total_harga_penawaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id_penawaran`, `harga_dasar_penawaran`, `id_barang`, `keuntungan_penawaran`, `jumlah_keuntungan_penawaran`, `ppn_penawaran`, `hps_penawaran`, `total_harga_penawaran`) VALUES
(38, 700000, 58, 70000, 770000, 77000, 847000, 2541000),
(39, 500000, 63, 50000, 550000, 55000, 605000, 3630000),
(40, 3200000, 64, 320000, 3520000, 352000, 3872000, 11616000),
(41, 50000, 65, 5000, 55000, 5500, 60500, 302500),
(42, 9000, 66, 900, 9900, 990, 10890, 108900),
(43, 100000, 68, 10000, 110000, 11000, 121000, 605000),
(44, 499999, 69, 49999, 549998, 54999, 604997, 6049970),
(45, 950000, 73, 95000, 1045000, 104500, 1149500, 1149500),
(48, 20590, 76, 2059, 22649, 2264, 24900, 16832400);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(2, 'Buah'),
(3, 'Pasang'),
(4, 'Lembar'),
(5, 'Keping'),
(6, 'Batang'),
(7, 'Bungkus'),
(8, 'Potong'),
(9, 'Tablet'),
(10, 'Ekor'),
(11, 'Rim'),
(12, 'Karat'),
(13, 'Botol'),
(14, 'Butir'),
(15, 'Roll'),
(16, 'Dus'),
(17, 'Karung'),
(18, 'Koli'),
(19, 'Sak'),
(20, 'Bal'),
(21, 'Kaleng'),
(22, 'Set'),
(23, 'Slop'),
(24, 'Gulung'),
(25, 'Ton'),
(26, 'Kilogram'),
(27, 'Gram'),
(28, 'Miligram'),
(29, 'Meter'),
(30, 'Meter Kuadrat'),
(31, 'Meter Kubik'),
(32, 'Inchi'),
(33, 'Cc'),
(34, 'Liter'),
(35, 'Exp');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int(11) NOT NULL,
  `harga_dasar_spk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keuntungan_spk` int(11) NOT NULL,
  `jumlah_keuntungan_spk` int(11) NOT NULL,
  `ppn_spk` int(11) NOT NULL,
  `hps_spk` int(11) NOT NULL,
  `total_harga_spk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `harga_dasar_spk`, `id_barang`, `keuntungan_spk`, `jumlah_keuntungan_spk`, `ppn_spk`, `hps_spk`, `total_harga_spk`) VALUES
(10, 100000, 63, 10000, 110000, 11000, 121000, 726000),
(11, 500000, 58, 50000, 550000, 55000, 605000, 1815000),
(12, 3161000, 64, 316100, 3477100, 347710, 3824810, 11474430),
(13, 49000, 65, 4900, 53900, 5390, 59290, 296450),
(14, 8000, 66, 800, 8800, 880, 9680, 96800),
(15, 90000, 68, 9000, 99000, 9900, 108900, 544500),
(16, 499998, 69, 49999, 549997, 54999, 604996, 6049960),
(17, 900000, 73, 90000, 990000, 99000, 1089000, 1089000),
(20, 20476, 76, 2047, 22523, 2252, 24775, 16747900);

-- --------------------------------------------------------

--
-- Table structure for table `surat_kontrak`
--

CREATE TABLE `surat_kontrak` (
  `id_surat` int(11) NOT NULL,
  `judul_surat` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun_surat` int(11) NOT NULL,
  `tipe_pagu` varchar(10) NOT NULL,
  `nama_ppk` varchar(100) NOT NULL,
  `nip_ppk` varchar(20) NOT NULL,
  `nama_ppb` varchar(100) NOT NULL,
  `nip_ppb` varchar(20) NOT NULL,
  `nomor_oe` varchar(100) NOT NULL,
  `tanggal_oe` date NOT NULL,
  `nomor_pph` varchar(100) NOT NULL,
  `tanggal_pph` date NOT NULL,
  `tanggal_penawaran_pph` date NOT NULL,
  `nomor_bappsph` varchar(100) NOT NULL,
  `tanggal_bappsph` date NOT NULL,
  `waktu_pengerjaan_bappsph` int(11) NOT NULL,
  `waktu_ppsph` varchar(5) NOT NULL,
  `nomor_bapph` varchar(100) NOT NULL,
  `tanggal_bapph` date NOT NULL,
  `hari_bapph` varchar(20) NOT NULL,
  `nomor_uknh` varchar(100) NOT NULL,
  `tanggal_uknh` date NOT NULL,
  `waktu_uknh` varchar(5) NOT NULL,
  `nomor_baknh` varchar(100) NOT NULL,
  `tanggal_baknh` date NOT NULL,
  `nomor_bahpl` varchar(100) NOT NULL,
  `tanggal_bahpl` date NOT NULL,
  `nomor_pp` varchar(100) NOT NULL,
  `tanggal_pp` date NOT NULL,
  `tanggal_spk_pp` date NOT NULL,
  `waktu_pp` varchar(5) NOT NULL,
  `nomor_bapp` varchar(100) NOT NULL,
  `nomor_spk` varchar(100) NOT NULL,
  `tanggal_spk` date NOT NULL,
  `nomor_sp` varchar(100) NOT NULL,
  `nomor_bapb` varchar(100) NOT NULL,
  `nomor_bastb` varchar(100) NOT NULL,
  `nomor_bap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_kontrak`
--

INSERT INTO `surat_kontrak` (`id_surat`, `judul_surat`, `id_jurusan`, `id_user`, `tahun_surat`, `tipe_pagu`, `nama_ppk`, `nip_ppk`, `nama_ppb`, `nip_ppb`, `nomor_oe`, `tanggal_oe`, `nomor_pph`, `tanggal_pph`, `tanggal_penawaran_pph`, `nomor_bappsph`, `tanggal_bappsph`, `waktu_pengerjaan_bappsph`, `waktu_ppsph`, `nomor_bapph`, `tanggal_bapph`, `hari_bapph`, `nomor_uknh`, `tanggal_uknh`, `waktu_uknh`, `nomor_baknh`, `tanggal_baknh`, `nomor_bahpl`, `tanggal_bahpl`, `nomor_pp`, `tanggal_pp`, `tanggal_spk_pp`, `waktu_pp`, `nomor_bapp`, `nomor_spk`, `tanggal_spk`, `nomor_sp`, `nomor_bapb`, `nomor_bastb`, `nomor_bap`) VALUES
(4, 'Surat Lemari', 45, 1, 2018, 'DIPA', 'aa', 'bb', 'cc', '2382938', '0246/Un.05/III.7/KS.01.7/02/2018', '2018-07-02', '0247/Un.05/III.7/KS.01.7/02/2018', '2018-07-12', '2018-07-13', '0248/Un.05/III.7/KS.01.7/02/2018', '2018-07-14', 7, '09.00', '0249/Un.05/III.7/KS.01.7/02/2018', '2018-07-19', 'Kamis', '0250/Un.05/III.7/KS.01.7/02/2018', '2018-07-19', '09.00', '0251/Un.05/III.7/KS.01.7/02/2018', '2018-07-19', '0252/Un.05/III.7/KS.01.7/02/2018', '0000-00-00', '0253/Un.05/III.7/KS.01.7/02/2018', '2018-07-18', '2018-07-19', '09.00', '0254/Un.05/III.7/KS.01.7/02/2018', '0255/Un.05/III.7/KS.01.7/02/2018', '2018-07-20', '0256/Un.05/III.7/KS.01.7/02/2018', '0257/Un.05/III.7/KS.01.7/02/2018', '0258/Un.05/III.7/KS.01.7/02/2018', '0259/Un.05/III.7/KS.01.7/02/2018'),
(6, 'Pengadaan Belanja Pemeliharaan', 39, 1, 2018, 'BOPTN', 'Dr. H. Opik Taupik Kurahman', '196812141996031001', 'M. Irfan, S.Sos.I.', '197903152009101001', '0240/Un.05/III.7/KS.01.7/02/2018', '2018-02-05', '0241/Un.05/III.7/KS.01.7/02/2018', '2018-02-07', '2018-02-12', '0242/Un.05/III.7/KS.01.7/02/2018', '2018-07-12', 7, '09.00', '0243/Un.05/III.7/KS.01.7/02/2018', '2018-03-13', 'Selasa', '0244/Un.05/III.7/KS.01.7/02/2018', '2018-02-13', '09.00', '0245/Un.05/III.7/KS.01.7/02/2018', '2018-02-15', '0246/Un.05/III.7/KS.01.7/02/2018', '0000-00-00', '0247/Un.05/III.7/KS.01.7/02/2018', '2018-02-19', '2018-02-21', '09.00', '0248/Un.05/III.7/KS.01.7/02/2018', '0249/Un.05/III.7/KS.01.7/02/2018', '2018-02-21', '0250/Un.05/III.7/KS.01.7/02/2018', '0251/Un.05/III.7/KS.01.7/02/2018', '0252/Un.05/III.7/KS.01.7/02/2018', '0253/Un.05/III.7/KS.01.7/02/2018'),
(7, 'a', 2, 1, 2018, 'BOPTN', 'a', 'd', 'v', 'x', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', 0, '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '', ''),
(8, 'Aplikasi SIMAK', 39, 1, 2018, 'BOPTN', 'Dr. H. Opik Taupik Kurahman', '196812141996031001', 'Asep', '123', '0240/Un.05/III.7/KS.01.7/02/2018', '2018-10-18', '0241/Un.05/III.7/KS.01.7/02/2018', '2018-10-18', '2018-10-19', '0242/Un.05/III.7/KS.01.7/02/2018', '2018-10-22', 30, '09.00', '0243/Un.05/III.7/KS.01.7/02/2018', '2018-10-25', 'Kamis', '0244/Un.05/III.7/KS.01.7/02/2018', '2018-10-25', '09.00', '0245/Un.05/III.7/KS.01.7/02/2018', '2018-10-25', '0246/Un.05/III.7/KS.01.7/02/2018', '0000-00-00', '0247/Un.05/III.7/KS.01.7/02/2018', '2018-10-26', '2018-10-29', '09.00', '0248/Un.05/III.7/KS.01.7/02/2018', '0249/Un.05/III.7/KS.01.7/02/2018', '2018-10-30', '0250/Un.05/III.7/KS.01.7/02/2018', '0251/Un.05/III.7/KS.01.7/02/2018', '0252/Un.05/III.7/KS.01.7/02/2018', '0253/Un.05/III.7/KS.01.7/02/2018'),
(10, 'Pengadaan Buku Praktik Ibadah', 50, 2, 2018, 'DIPA', 'Dr. H. Opik Taupik Kurahman', '196812141996031001', 'Dr. Yani Suryani, S.Pd., M.Si.', '197205181998012001', 'B.0380/Un.05/III.7/KS.01.7/08/2018', '2018-08-06', 'B.0381/Un.05/III.7/KS.01.7/08/2018', '2018-08-07', '2018-08-10', 'B.0382/Un.05/III.7/KS.01.7/08/2018', '2018-08-10', 7, '', 'B.0383/Un.05/III.7/KS.01.7/08/2018', '2018-08-14', 'Selasa', 'B.0384/Un.05/III.7/KS.01.7/08/2018', '2018-08-14', '09.00', 'B.0385/Un.05/III.7/KS.01.7/08/2018', '2018-08-16', 'B.0386/Un.05/III.7/KS.01.7/08/2018', '2018-08-21', 'B.0387/Un.05/III.7/KS.01.7/08/2018', '2018-08-23', '2018-08-24', '13.00', 'B.0388/Un.05/III.7/KS.01.7/08/2018', 'B.0389/Un.05/III.7/KS.01.7/08/2018', '2018-08-24', 'B.0390/Un.05/III.7/KS.01.7/08/2018', 'B.0391/Un.05/III.7/KS.01.7/08/2018', 'B.0392/Un.05/III.7/KS.01.7/08/2018', 'B.0393/Un.05/III.7/KS.01.7/08/2018');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pt`
--

CREATE TABLE `surat_pt` (
  `id_surat_pt` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nomor_ph` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pt`
--

INSERT INTO `surat_pt` (`id_surat_pt`, `id_surat`, `nomor_ph`) VALUES
(1, 6, '001/II/II/LI/20181'),
(2, 4, '11'),
(3, 8, '0245/Un.05/III.7/KS.'),
(4, 10, '010/II/VIII/DKI/2018');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id_universitas` int(11) NOT NULL,
  `nama_universitas` varchar(100) NOT NULL,
  `alamat_universitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_universitas`, `nama_universitas`, `alamat_universitas`) VALUES
(1, 'Universitas Islam Negeri Sunan Gunung Djati', 'Jl. AH. Nasution No. 105 Cibiru Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_universitas` (`id_universitas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `pagu`
--
ALTER TABLE `pagu`
  ADD PRIMARY KEY (`id_pagu`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `panitia_pengawas`
--
ALTER TABLE `panitia_pengawas`
  ADD PRIMARY KEY (`id_panitia`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `surat_kontrak`
--
ALTER TABLE `surat_kontrak`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `surat_pt`
--
ALTER TABLE `surat_pt`
  ADD PRIMARY KEY (`id_surat_pt`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id_universitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `pagu`
--
ALTER TABLE `pagu`
  MODIFY `id_pagu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `panitia_pengawas`
--
ALTER TABLE `panitia_pengawas`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `surat_kontrak`
--
ALTER TABLE `surat_kontrak`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `surat_pt`
--
ALTER TABLE `surat_pt`
  MODIFY `id_surat_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_universitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat_kontrak` (`id_surat`);

--
-- Constraints for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fakultas_ibfk_1` FOREIGN KEY (`id_universitas`) REFERENCES `universitas` (`id_universitas`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `pagu`
--
ALTER TABLE `pagu`
  ADD CONSTRAINT `pagu_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD CONSTRAINT `penawaran_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `spk`
--
ALTER TABLE `spk`
  ADD CONSTRAINT `spk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
