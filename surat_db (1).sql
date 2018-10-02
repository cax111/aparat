-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2018 at 07:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_db`
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
  `npwp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`id_user`, `username`, `password`, `nama_user`, `nama_perusahaan`, `alamat_perusahaan`, `npwp`) VALUES
(1, 'lubnaindo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Beki Subaeki', 'CV. Lubna Indonesia', 'Jl. Babakan Simpar RT. 14 RW. 06 Subang', '72.418.436.1-439.000'),
(2, 'dutakencana', 'e10adc3949ba59abbe56e057f20f883e', 'Beki Subaeki', 'CV. Duta Kencana Indonesia', 'Komp. De Green Mansion No. B14 Jl. Cilengkrang I RT. 09 RT. 03 Cisurupan Cibiru Bandung', '82.638.568.4-429.000');

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
  `id_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 1, 'Ilmu Sosial dan Politik');

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
(44, 8, 'Sosiologi');

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
(1, 4, 'Dr. Yani Suryani, S.Pd., M.Si.', 'Ketua'),
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
(26, 5, 'b', 'Ketua'),
(27, 5, 'b', 'Sekretaris'),
(28, 5, 'b', 'Anggota'),
(29, 5, 'b', 'Panitia Penerima Hasil Kerja 1'),
(30, 5, 'b', 'Panitia Penerima Hasil Kerja 2'),
(31, 5, 'b', 'Panitia Penerima Hasil Kerja 3');

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
(34, 'Liter');

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

INSERT INTO `surat_kontrak` (`id_surat`, `judul_surat`, `id_jurusan`, `id_user`, `tahun_surat`, `nama_ppk`, `nip_ppk`, `nama_ppb`, `nip_ppb`, `nomor_oe`, `tanggal_oe`, `nomor_pph`, `tanggal_pph`, `tanggal_penawaran_pph`, `nomor_bappsph`, `tanggal_bappsph`, `waktu_pengerjaan_bappsph`, `waktu_ppsph`, `nomor_bapph`, `tanggal_bapph`, `hari_bapph`, `nomor_uknh`, `tanggal_uknh`, `waktu_uknh`, `nomor_baknh`, `tanggal_baknh`, `nomor_bahpl`, `nomor_pp`, `tanggal_pp`, `tanggal_spk_pp`, `waktu_pp`, `nomor_bapp`, `nomor_spk`, `tanggal_spk`, `nomor_sp`, `nomor_bapb`, `nomor_bastb`, `nomor_bap`) VALUES
(4, 'Surat Lemari', 39, 1, 2018, 'aa', 'bb', 'cc', '2382938', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', 0, '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '', ''),
(5, 'surat hp', 31, 1, 2018, 'a', '43434335', 'b', '8989797', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', 0, '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pagu`
--
ALTER TABLE `pagu`
  MODIFY `id_pagu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `panitia_pengawas`
--
ALTER TABLE `panitia_pengawas`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_kontrak`
--
ALTER TABLE `surat_kontrak`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
