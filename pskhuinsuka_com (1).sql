-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2019 at 11:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pskhuinsuka.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `akun_keterangan` int(1) DEFAULT NULL,
  `akun_username` varchar(50) NOT NULL,
  `akun_password` varchar(32) NOT NULL,
  `akun_terakhirmasuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`akun_keterangan`, `akun_username`, `akun_password`, `akun_terakhirmasuk`) VALUES
(1, 'azisalvriyanto', 'dfa3e0429b7f161f0d9551773e9a3765', '2019-03-20 11:24:17'),
(0, 'raatihnfa', 'b045df5751af02ef0fad2e049f4b1fde', '2019-03-28 11:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_keterangan` int(1) NOT NULL,
  `artikel_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `artikel_penerbit` varchar(50) NOT NULL,
  `artikel_judul` varchar(500) NOT NULL,
  `artikel_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_keterangan`, `artikel_waktu`, `artikel_penerbit`, `artikel_judul`, `artikel_isi`) VALUES
(7, 2, '2019-03-30 04:10:07', 'raatihnfa', 'vsdvsdfv vd', '<p>vdfvdfvdfvf  duihibvf fdf hdc hhhhhhhhhhsd csh hhhhh hh h ds fhn sjkdh fashdfjhfid sifgsb gdsfdgfdg fdgs dfgdvdfvdfv d fvfdui hibvffd fhdc hhhhhhhh hhv dfvd fvdf vfduih ibvffdfhdc hhhhhhhhh hhvdfvdfvdfvf d duihibvf fdsdsdfhdcd hhhhhhhhhhh</p>'),
(8, 1, '2019-04-08 03:11:32', 'azisalvriyanto', 'eddded', '<p>asawqwdedassqwqwqwdedfrvrv</p>');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_keterangan`
--

CREATE TABLE `artikel_keterangan` (
  `artikel_keterangan_id` int(1) NOT NULL,
  `artikel_keterangan_keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel_keterangan`
--

INSERT INTO `artikel_keterangan` (`artikel_keterangan_id`, `artikel_keterangan_keterangan`) VALUES
(1, 'Telah diterbitkan'),
(2, 'Disimpan dalam draf');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `berita__keterangan` int(1) NOT NULL,
  `berita_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `berita_penerbit` varchar(50) NOT NULL,
  `berita_judul` varchar(500) NOT NULL,
  `berita_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `bulan_id` int(2) NOT NULL,
  `bulan_keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`bulan_id`, `bulan_keterangan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `divisi_id` int(1) NOT NULL,
  `divisi_keterangan` varchar(50) NOT NULL,
  `divisi_penjelasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`divisi_id`, `divisi_keterangan`, `divisi_penjelasan`) VALUES
(1, 'Pengurus Harian', ''),
(2, 'Bidang Pendidikan dan Pengkaderan', ''),
(3, 'Bidang Penelitian dan Pengembangan', ''),
(4, 'Bidang Publikasi dan Relasi', ''),
(5, 'Biro Konsultasi dan Advokasi Hukum', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(1) NOT NULL,
  `jabatan_keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_keterangan`) VALUES
(1, 'Ketua'),
(2, 'Sekretaris'),
(3, 'Bendahara'),
(6, 'Kordinator'),
(7, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_x`
--

CREATE TABLE `jabatan_x` (
  `jabatan_x_id` int(2) NOT NULL,
  `jabatan_x_divisi` int(1) NOT NULL,
  `jabatan_x_jabatan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_x`
--

INSERT INTO `jabatan_x` (`jabatan_x_id`, `jabatan_x_divisi`, `jabatan_x_jabatan`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 6),
(5, 2, 7),
(6, 3, 6),
(7, 3, 7),
(8, 4, 6),
(9, 4, 7),
(10, 5, 6),
(11, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `jpendapat`
--

CREATE TABLE `jpendapat` (
  `jpendapat_id` int(11) NOT NULL,
  `jpendapat_nama` varchar(100) NOT NULL,
  `jpendapat_jabatan` varchar(200) NOT NULL,
  `jpendapat_pendapat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpendapat`
--

INSERT INTO `jpendapat` (`jpendapat_id`, `jpendapat_nama`, `jpendapat_jabatan`, `jpendapat_pendapat`) VALUES
(1, 'Azis Alvriyanto', 'Menteri Perdagangan Nasional', 'Bagus sekali sangat rekomendasi untuk uin sunan kaijaga'),
(2, 'Ratih Nur Fatimah', 'Miss Indonesia 2109', 'Sangat menginspirasi'),
(3, 'Alvriyanto Azis', 'Mentri Perhubungn Keagamaan', 'sdcjs sdcjsdhcn');

-- --------------------------------------------------------

--
-- Table structure for table `keanggotaan`
--

CREATE TABLE `keanggotaan` (
  `keanggotaan_periode` int(2) NOT NULL,
  `keanggotaan_username` varchar(50) NOT NULL,
  `keanggotaan_nama` varchar(100) NOT NULL,
  `keanggotaan_angkatan` year(4) NOT NULL,
  `keanggotaan_divisi` int(1) NOT NULL,
  `keanggotaan_jabatan` int(2) NOT NULL,
  `keanggotaan_email` varchar(200) NOT NULL,
  `keanggotaan_telepon` varchar(15) NOT NULL,
  `keanggotaan_motto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keanggotaan`
--

INSERT INTO `keanggotaan` (`keanggotaan_periode`, `keanggotaan_username`, `keanggotaan_nama`, `keanggotaan_angkatan`, `keanggotaan_divisi`, `keanggotaan_jabatan`, `keanggotaan_email`, `keanggotaan_telepon`, `keanggotaan_motto`) VALUES
(1, 'azisalvriyanto', 'Alvriyanto Azis', 2016, 1, 1, 'aalvriyanto@gmail.com', '082350952330', 'Still kiddie, keep wannabe.'),
(1, 'raatihnfa', 'Ratih Nur Fatimah', 2017, 1, 2, 'raatihnf@gmail.com', '082350952330', 'Still alone, but never alone.');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `keuangan_id` int(11) NOT NULL,
  `keuangan_periode` int(2) NOT NULL,
  `keuangan_tanggal` date NOT NULL,
  `keuangan_judul` varchar(200) NOT NULL,
  `keuangan_jumlah` int(5) NOT NULL,
  `keuangan_keterangan` int(1) NOT NULL,
  `keuangan_nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`keuangan_id`, `keuangan_periode`, `keuangan_tanggal`, `keuangan_judul`, `keuangan_jumlah`, `keuangan_keterangan`, `keuangan_nominal`) VALUES
(1, 1, '2018-03-11', 'Saldo Pengurus 2017-2018', 0, 1, 3316700),
(2, 1, '2018-03-11', 'Iuran Pengurus', 17, 1, 340000),
(3, 1, '2018-03-13', 'Snack Pelantikan', 60, 2, 192000),
(4, 1, '2018-03-18', 'Iuran Pengurus', 20, 1, 400000),
(24, 1, '2019-03-29', 'pengeluaran', 2, 2, 3000),
(31, 1, '2019-04-02', 'pemasukan', 0, 1, 100000),
(32, 1, '2019-02-12', 'beli air minum', 2, 2, 150000),
(33, 3, '2019-02-03', 'keuangan baru', 0, 1, 100000),
(37, 4, '2019-04-30', 'pemasukan', 1, 1, 2000000),
(43, 4, '2019-04-27', '1', 1, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_keterangan`
--

CREATE TABLE `keuangan_keterangan` (
  `keuangan_keterangan_id` int(1) NOT NULL,
  `keuangan_keterangan_keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_keterangan`
--

INSERT INTO `keuangan_keterangan` (`keuangan_keterangan_id`, `keuangan_keterangan_keterangan`) VALUES
(1, 'pemasukkan'),
(2, 'pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `organisasi_periode` int(2) NOT NULL,
  `organisasi_nama_lengkap` varchar(100) NOT NULL,
  `organisasi_nama_pendek` varchar(50) NOT NULL,
  `organisasi_visi` text NOT NULL,
  `organisasi_misi` text NOT NULL,
  `organisasi_deskripsi` varchar(300) NOT NULL,
  `organisasi_tentang` varchar(200) NOT NULL,
  `organisasi_sejarah` text NOT NULL,
  `organisasi_alamat` varchar(200) NOT NULL,
  `organisasi_email` varchar(100) NOT NULL,
  `organisasi_telepon` varchar(15) NOT NULL,
  `organisasi_facebook` varchar(100) NOT NULL,
  `organisasi_twitter` varchar(100) NOT NULL,
  `organisasi_instagram` varchar(100) NOT NULL,
  `organisasi_youtube` varchar(100) NOT NULL,
  `organisasi_peta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`organisasi_periode`, `organisasi_nama_lengkap`, `organisasi_nama_pendek`, `organisasi_visi`, `organisasi_misi`, `organisasi_deskripsi`, `organisasi_tentang`, `organisasi_sejarah`, `organisasi_alamat`, `organisasi_email`, `organisasi_telepon`, `organisasi_facebook`, `organisasi_twitter`, `organisasi_instagram`, `organisasi_youtube`, `organisasi_peta`) VALUES
(1, 'Pusat Studi dan Konsultasi Hukum', 'PSKH', 'Menumbuhkembangkan basic hukum demi terciptanya masyarakat yang berkeadilan.', 'Penguatan intelektualitas dan profesionalitas anggota dalam bidang hukum. Internalisasi menuju sikap kritis, konstuktif dan solutif terhadap dinamika kampus. Terciptanya masyarakat yang mandiri dan berkeadilan.', 'Pusat Studi dan Konsultasi Hukum', 'PSKH, bisa!!', 'Sejarah kelahiran PSKH dilatarbelakangi atas dasar keinginan para aktivis akademika Syari’ah yang sadar akan kekurangan Metodis maupun Praktis dalam penguasaan wawasan hukum bagi mahasiswa Syar’ah. Melihat kenyataan ini maka, perlu adanya sarana yang memberikan ruang partisipasi aktif mahasiswa dalam pergulatan hukum dan daya saing dalam menciptakan kader hukum yang peduli dengan lingkugan masyarakat. Lembaga ini diharapakan akan menjadi wahana pengembangan wawasan hukum baik dari sisi koqnitif, efektif mupun psikomotorik.\nPada alanya organisasi ini bernama KSBH (Kelompok Studi dan Bantuan Hukum) yang berdiri pada tanggal 23 Oktober 1991. pada perjalanan selanjutnya, tepatnya pada tanggal 27 Mei 2000 KSBH diubah menjadi PSKH (Pusat Studi dan Konsultasi Hukum) perubahan ini dilakukan dengan tujuan untuk lebih menfokuskan pada studi Hukum dan memberikan jasa konsultasi bagi mahasiswa dan masyarakat yang membutuhkan. Langkah ini ditembpuh dalam rangka mencari stressing pada kedua bidang tersebut.\nPada tahapan selanjutnya PSKH lebih menfokuskan aktifitasnya pada bidang kajian dan advokasi mahasiswa. Upaya sadar dan sistematis untuk memberdayakan mahasiswa senantiasa dilakukan melalui berbagai aktivitas.\nDalam rangka merealisasikan visi dan misinya PSKH berusaha menjalin kerja sama dengan berbagai institusi baik pemerintah, swadaya mayarakat, maupun lingkungan akademisi.', 'Jalan Marsda Adisucipto, Gedung Student Center, Lantai 2, Nomor 2.42', 'pskhuinsuka@gmail.com', '087736704264', 'pskh.uinsuka', 'pskhuinsuka', 'pskhuinsuka', 'UCb_yUzv5XvPKXcMgz9MwD_A', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.2615162668211!2d110.39576782916086!3d-7.784940999649359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDcnMDUuOCJTIDExMMKwMjMnNDYuNyJF!5e0!3m2!1sen!2sid!4v1551943630767');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `periode_id` int(2) NOT NULL,
  `periode_keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`periode_id`, `periode_keterangan`) VALUES
(1, '2018-2019'),
(3, '2020-2021'),
(4, '2021-2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`akun_username`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `artikel_penerbit` (`artikel_penerbit`),
  ADD KEY `artikel_keterangan` (`artikel_keterangan`);

--
-- Indexes for table `artikel_keterangan`
--
ALTER TABLE `artikel_keterangan`
  ADD PRIMARY KEY (`artikel_keterangan_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `berita_penerbit` (`berita_penerbit`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`bulan_id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`divisi_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jabatan_x`
--
ALTER TABLE `jabatan_x`
  ADD PRIMARY KEY (`jabatan_x_id`),
  ADD KEY `jabatan_divisi` (`jabatan_x_divisi`),
  ADD KEY `jabatan_keterangan` (`jabatan_x_jabatan`);

--
-- Indexes for table `jpendapat`
--
ALTER TABLE `jpendapat`
  ADD PRIMARY KEY (`jpendapat_id`);

--
-- Indexes for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  ADD PRIMARY KEY (`keanggotaan_username`),
  ADD KEY `keanggotaan_divisi` (`keanggotaan_divisi`),
  ADD KEY `keanggotaan_jabatan` (`keanggotaan_jabatan`),
  ADD KEY `keanggotaan_periode` (`keanggotaan_periode`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`keuangan_id`),
  ADD KEY `keuangan_keterangan` (`keuangan_keterangan`),
  ADD KEY `keuangan_periode` (`keuangan_periode`);

--
-- Indexes for table `keuangan_keterangan`
--
ALTER TABLE `keuangan_keterangan`
  ADD PRIMARY KEY (`keuangan_keterangan_id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`organisasi_periode`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`periode_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `bulan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jabatan_x`
--
ALTER TABLE `jabatan_x`
  MODIFY `jabatan_x_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jpendapat`
--
ALTER TABLE `jpendapat`
  MODIFY `jpendapat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `keuangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `keuangan_keterangan`
--
ALTER TABLE `keuangan_keterangan`
  MODIFY `keuangan_keterangan_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `periode_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_username` FOREIGN KEY (`akun_username`) REFERENCES `keanggotaan` (`keanggotaan_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_keterangan` FOREIGN KEY (`artikel_keterangan`) REFERENCES `artikel_keterangan` (`artikel_keterangan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_penerbit` FOREIGN KEY (`artikel_penerbit`) REFERENCES `keanggotaan` (`keanggotaan_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_penerbit` FOREIGN KEY (`berita_penerbit`) REFERENCES `keanggotaan` (`keanggotaan_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jabatan_x`
--
ALTER TABLE `jabatan_x`
  ADD CONSTRAINT `jabatan_divisi` FOREIGN KEY (`jabatan_x_divisi`) REFERENCES `divisi` (`divisi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jabatan_keterangan` FOREIGN KEY (`jabatan_x_jabatan`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  ADD CONSTRAINT `keanggotaan_divisi` FOREIGN KEY (`keanggotaan_divisi`) REFERENCES `divisi` (`divisi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keanggotaan_jabatan` FOREIGN KEY (`keanggotaan_jabatan`) REFERENCES `jabatan_x` (`jabatan_x_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keanggotaan_periode` FOREIGN KEY (`keanggotaan_periode`) REFERENCES `periode` (`periode_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_keterangan` FOREIGN KEY (`keuangan_keterangan`) REFERENCES `keuangan_keterangan` (`keuangan_keterangan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keuangan_periode` FOREIGN KEY (`keuangan_periode`) REFERENCES `periode` (`periode_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD CONSTRAINT `organisasi_periode` FOREIGN KEY (`organisasi_periode`) REFERENCES `periode` (`periode_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
