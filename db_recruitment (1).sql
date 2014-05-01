-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2014 at 04:57 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_recruitment`
--
-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `idlistabsensi` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `nokaryawan` varchar(5) NOT NULL,
  `hadir` int(3) NOT NULL,
  `terlambat` int(3) NOT NULL,
  `lembur` int(3) NOT NULL,
  `jamlembur` int(3) NOT NULL,
  PRIMARY KEY (`idlistabsensi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idlistabsensi`, `tanggal`, `nokaryawan`, `hadir`, `terlambat`, `lembur`, `jamlembur`) VALUES
('2014-01-02 001', '2014-01-02', '001', 0, 0, 0, 0),
('2014-01-02 02', '2014-01-02', '02', 0, 0, 0, 0),
('2014-01-02 03', '2014-01-02', '03', 1, 0, 0, 0),
('2014-01-02 04', '2014-01-02', '04', 0, 0, 0, 0),
('2014-01-02 06', '2014-01-02', '06', 0, 0, 0, 0),
('2014-01-02 07', '2014-01-02', '07', 0, 0, 0, 0),
('2014-04-01 001', '2014-04-01', '001', 1, 0, 0, 0),
('2014-04-01 02', '2014-04-01', '02', 1, 0, 1, 4),
('2014-04-01 03', '2014-04-01', '03', 1, 0, 0, 0),
('2014-04-01 04', '2014-04-01', '04', 0, 0, 0, 0),
('2014-04-01 06', '2014-04-01', '06', 1, 0, 1, 4),
('2014-04-01 07', '2014-04-01', '07', 0, 0, 0, 0),
('2014-04-02 001', '2014-04-02', '001', 1, 0, 0, 0),
('2014-04-02 02', '2014-04-02', '02', 0, 0, 0, 0),
('2014-04-02 03', '2014-04-02', '03', 0, 0, 0, 0),
('2014-04-02 04', '2014-04-02', '04', 1, 0, 1, 0),
('2014-04-02 06', '2014-04-02', '06', 0, 0, 0, 0),
('2014-04-02 07', '2014-04-02', '07', 1, 0, 1, 0),
('2014-04-03 001', '2014-04-03', '001', 1, 0, 1, 0),
('2014-04-03 02', '2014-04-03', '02', 0, 0, 0, 0),
('2014-04-03 03', '2014-04-03', '03', 0, 0, 0, 0),
('2014-04-03 04', '2014-04-03', '04', 0, 0, 0, 0),
('2014-04-03 06', '2014-04-03', '06', 0, 0, 0, 0),
('2014-04-03 07', '2014-04-03', '07', 0, 0, 0, 0),
('2014-04-15 001', '2014-04-15', '001', 0, 0, 0, 0),
('2014-04-15 02', '2014-04-15', '02', 0, 0, 0, 0),
('2014-04-15 03', '2014-04-15', '03', 0, 0, 0, 0),
('2014-04-15 04', '2014-04-15', '04', 0, 0, 0, 0),
('2014-04-15 06', '2014-04-15', '06', 0, 0, 0, 0),
('2014-04-15 07', '2014-04-15', '07', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE IF NOT EXISTS `anak` (
  `idanak` int(11) NOT NULL AUTO_INCREMENT,
  `idkeluarga` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  PRIMARY KEY (`idanak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE IF NOT EXISTS `bahasa` (
  `idbahasa` int(3) NOT NULL AUTO_INCREMENT,
  `iduser` int(3) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `bicara` varchar(15) NOT NULL,
  `menulis` varchar(15) NOT NULL,
  PRIMARY KEY (`idbahasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`idbahasa`, `iduser`, `bahasa`, `bicara`, `menulis`) VALUES
(1, 47, 'Indonesia', 'baik', 'baik'),
(2, 48, 'Indonesia', 'baik', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE IF NOT EXISTS `cuti` (
  `idcuti` int(3) NOT NULL AUTO_INCREMENT,
  `nokaryawan` varchar(5) NOT NULL,
  `tanggalmulai` date NOT NULL,
  `tanggalselesai` date NOT NULL,
  `range` int(3) DEFAULT NULL,
  `alasan` varchar(45) NOT NULL,
  `suratdokter` int(3) NOT NULL,
  `pengganti` varchar(5) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`idcuti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`idcuti`, `nokaryawan`, `tanggalmulai`, `tanggalselesai`, `range`, `alasan`, `suratdokter`, `pengganti`, `status`) VALUES
(1, '03', '2014-05-02', '2014-05-06', 3, '1', 2, '07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `iddepartment` int(3) NOT NULL AUTO_INCREMENT,
  `department` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iddepartment`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`iddepartment`, `department`) VALUES
(1, 'Human Resource Development'),
(2, 'Finance'),
(3, 'Creative'),
(4, 'Media'),
(5, 'Account Executive'),
(6, 'IT'),
(7, 'Traffic'),
(8, 'Monitoring');

-- --------------------------------------------------------

--
-- Table structure for table `detailpelatihan`
--

CREATE TABLE IF NOT EXISTS `detailpelatihan` (
  `iddetailpelatihan` int(3) NOT NULL AUTO_INCREMENT,
  `idpelatihan` int(3) NOT NULL,
  `nokaryawan` varchar(5) NOT NULL,
  PRIMARY KEY (`iddetailpelatihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `detailpelatihan`
--

INSERT INTO `detailpelatihan` (`iddetailpelatihan`, `idpelatihan`, `nokaryawan`) VALUES
(1, 1, '07');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `idjabatan` int(3) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idjabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `jabatan`) VALUES
(1, 'hrdstaff'),
(2, 'hrdmanager'),
(3, 'direktur'),
(5, 'keuangan'),
(6, 'karyawan'),
(7, 'pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `idjawaban` int(3) NOT NULL AUTO_INCREMENT,
  `idpertanyaan` int(3) NOT NULL,
  `iduser` int(3) NOT NULL,
  `jawab` int(3) DEFAULT NULL,
  `uraian` varchar(100) NOT NULL,
  PRIMARY KEY (`idjawaban`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `idpertanyaan`, `iduser`, `jawab`, `uraian`) VALUES
(1, 1, 47, 1, 'sfsdf'),
(2, 2, 47, 1, 'sdf'),
(3, 3, 47, 1, 'sdf'),
(4, 4, 47, 1, 'sdf'),
(5, 5, 47, 0, 'sf'),
(6, 6, 47, 0, 'sdf'),
(7, 7, 47, 0, 'sdf'),
(8, 1, 48, 1, 'satu'),
(9, 2, 48, 1, 'dua'),
(10, 3, 48, 1, 'tiga'),
(11, 4, 48, 1, 'empat'),
(12, 5, 48, 0, 'lima'),
(13, 6, 48, 0, 'enam'),
(14, 7, 48, 0, 'tujuh');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `iduser` int(3) NOT NULL,
  `iddepartment` int(3) NOT NULL,
  `nokaryawan` varchar(5) NOT NULL,
  `norekening` varchar(15) NOT NULL,
  `namabank` varchar(20) NOT NULL,
  `gaji` decimal(10,0) NOT NULL,
  `tunjanganjabatan` decimal(10,0) NOT NULL,
  `tunjangan_harian` decimal(10,0) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`nokaryawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`iduser`, `iddepartment`, `nokaryawan`, `norekening`, `namabank`, `gaji`, `tunjanganjabatan`, `tunjangan_harian`, `status`) VALUES
(7, 1, '001', '234', 'BCA', 6000000, 3000000, 20000, 0),
(46, 1, '02', '893758394', 'BCA ', 9000000, 2000000, 20000, 0),
(47, 6, '03', '234234', 'BCA', 50000000, 3000000, 20000, 0),
(25, 2, '04', '234342', 'BTN', 6000000, 3000000, 20000, 0),
(9, 1, '06', '234342', 'BCA', 99000000, 60000000, 20000, 0),
(48, 6, '07', '12344325', 'sdffd', 4000000, 300000, 15000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `idkeluarga` int(3) NOT NULL AUTO_INCREMENT,
  `iduser` int(3) NOT NULL,
  `suamiistri` varchar(30) NOT NULL,
  `umur` int(3) DEFAULT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  PRIMARY KEY (`idkeluarga`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`idkeluarga`, `iduser`, `suamiistri`, `umur`, `pekerjaan`) VALUES
(1, 47, '', 0, ''),
(2, 48, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `kursuspelatihan`
--

CREATE TABLE IF NOT EXISTS `kursuspelatihan` (
  `idkursuspelatihan` int(3) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(15) DEFAULT NULL,
  `lokasi` varchar(20) DEFAULT NULL,
  `subjek` varchar(25) DEFAULT NULL,
  `iduser` int(3) NOT NULL,
  PRIMARY KEY (`idkursuspelatihan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE IF NOT EXISTS `lamaran` (
  `idlamaran` int(3) NOT NULL AUTO_INCREMENT,
  `gaji` decimal(10,0) DEFAULT NULL,
  `mulaikerja` date DEFAULT NULL,
  `alasan` text,
  `status` int(3) NOT NULL,
  `iduser` int(3) NOT NULL,
  `idlowongan` int(3) NOT NULL,
  PRIMARY KEY (`idlamaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`idlamaran`, `gaji`, `mulaikerja`, `alasan`, `status`, `iduser`, `idlowongan`) VALUES
(1, 5000000, '2014-07-05', 'sefse', 1, 47, 1),
(2, 8000000, '2014-04-07', 'dfgdfg', 1, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `idlowongan` int(3) NOT NULL AUTO_INCREMENT,
  `iddepartment` int(3) NOT NULL,
  `posisi` varchar(25) NOT NULL,
  `judul` varchar(45) NOT NULL,
  `uraian` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `tanggalpost` date NOT NULL,
  `tanggalakhir` date NOT NULL,
  PRIMARY KEY (`idlowongan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`idlowongan`, `iddepartment`, `posisi`, `judul`, `uraian`, `foto`, `tanggalpost`, `tanggalakhir`) VALUES
(1, 6, 'IT Support', 'Lowongan IT Support', '<h2><strong>Job Description</strong></h2>\n\n<ul>\n	<li>Instalasi Windows Server 2008</li>\n	<li>Melakukan Instalasi Jaringan LAN/Internet</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>Requirements</strong></p>\n\n<p>Menguasai Jaringan LAN/Internet</p>\n\n<p>Menguasai Linux</p>\n\n<p>Menguasai Hardware</p>\n\n<p>Memahami Trouble Shooting</p>\n\n<p>Pendidikan min SMK/D3 MI/TI Komputer</p>\n\n<p>Pria</p>\n', 'Lowongan IT Support.jpg', '2014-05-01', '2014-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `idnotifikasi` int(3) NOT NULL AUTO_INCREMENT,
  `nokaryawan` varchar(5) NOT NULL,
  `refid` varchar(15) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  PRIMARY KEY (`idnotifikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`idnotifikasi`, `nokaryawan`, `refid`, `jenis`) VALUES
(1, '02', '1', 'Cuti'),
(2, '02', '1', 'Request Pelatihan'),
(4, '04', '1', 'Approve Pelatihan'),
(5, '02', '1', 'Konfirmasi Pelatihan'),
(6, '07', '1', 'Pelatihan'),
(7, '001', '1', 'Approve Pelatihan'),
(8, '03', '1', 'Cuti'),
(9, '03', '1', 'Pelatihan'),
(12, '04', '2014-1', 'Absensi'),
(13, '04', '2014-4', 'Absensi');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `idpelatihan` int(3) NOT NULL AUTO_INCREMENT,
  `tanggalmulai` date NOT NULL,
  `tanggalselesai` date NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `biaya` decimal(10,0) DEFAULT NULL,
  `norekening` varchar(20) NOT NULL,
  `atasnama` varchar(25) NOT NULL,
  `namabank` varchar(20) NOT NULL,
  `dp` decimal(10,0) DEFAULT NULL,
  `pelunasan` decimal(10,0) DEFAULT NULL,
  `kuota` int(3) DEFAULT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`idpelatihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`idpelatihan`, `tanggalmulai`, `tanggalselesai`, `tempat`, `judul`, `uraian`, `biaya`, `norekening`, `atasnama`, `namabank`, `dp`, `pelunasan`, `kuota`, `status`) VALUES
(1, '2014-05-02', '2014-05-05', 'Jakarta', 'Pelatihan Outbond', '<p>sdfdfsdsfsdfefrwefrv dfes&nbsp;</p>\r\n', 4000000, '220491883345', 'Aji', 'CIMB Niaga', 2000000, 2000000, 39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `idpendidikan` int(3) NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(15) DEFAULT NULL,
  `namasekolah` varchar(45) DEFAULT NULL,
  `masapendidikan` varchar(10) DEFAULT NULL,
  `ijazah` varchar(10) DEFAULT NULL,
  `iduser` int(3) NOT NULL,
  PRIMARY KEY (`idpendidikan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`idpendidikan`, `jenjang`, `namasekolah`, `masapendidikan`, `ijazah`, `iduser`) VALUES
(1, 'SMA', 'SMA N 1 Pamulang', '2012-2013', 'ada', 47),
(2, 'S1', 'UIN Syarif Hidayatullah Jakarta', '2014-2019', 'ada', 47),
(3, 'SMA', 'SMA N 1 Cisauk', '2009-2014', 'ada', 48);

-- --------------------------------------------------------

--
-- Table structure for table `pengalamankerja`
--

CREATE TABLE IF NOT EXISTS `pengalamankerja` (
  `idpengalamankerja` int(3) NOT NULL AUTO_INCREMENT,
  `namaperusahaan` varchar(25) DEFAULT NULL,
  `bidang` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `gaji` decimal(10,0) NOT NULL,
  `tunjangan` decimal(10,0) NOT NULL,
  `namaatasan` varchar(30) NOT NULL,
  `masakerja` varchar(25) DEFAULT NULL,
  `alasankeluar` varchar(45) NOT NULL,
  `iduser` int(3) NOT NULL,
  PRIMARY KEY (`idpengalamankerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengundurandiri`
--

CREATE TABLE IF NOT EXISTS `pengundurandiri` (
  `idpengundurandiri` int(3) NOT NULL AUTO_INCREMENT,
  `nokaryawan` varchar(5) NOT NULL,
  `kepada` varchar(25) NOT NULL,
  `tanggalsurat` date NOT NULL,
  `isi` text NOT NULL,
  `alasan` varchar(45) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`idpengundurandiri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `idpertanyaan` int(3) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(200) NOT NULL,
  PRIMARY KEY (`idpertanyaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`idpertanyaan`, `pertanyaan`) VALUES
(1, 'Pernahkah Anda dipecat karena kelakuan dan pekerjaan Anda tidak memuaskan?'),
(2, 'Apakah Anda menerima penghasilan lain seperti pensiun, tunjangan kecelakaan, dan lain sebagainya?'),
(3, 'Pernahkah Anda ditahan dan dihukum karena kejahatan?'),
(4, 'Bolehkah Kami menanyakan kepada atasan Anda sekarang mengenai kompetisi dan sikap Anda?'),
(5, 'Apakah Anda anggota dari Serikat Buruh?'),
(6, 'Sebutkah dua hal yang Anda telah capai dengan sangat memuaskan?'),
(7, 'Didalam hal apa Anda merasa paling menonjol?');

-- --------------------------------------------------------

--
-- Table structure for table `referensi`
--

CREATE TABLE IF NOT EXISTS `referensi` (
  `idreferensi` int(3) NOT NULL AUTO_INCREMENT,
  `iduser` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  PRIMARY KEY (`idreferensi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settingcuti`
--

CREATE TABLE IF NOT EXISTS `settingcuti` (
  `idsettingcuti` int(3) NOT NULL AUTO_INCREMENT,
  `jeniscuti` varchar(50) NOT NULL,
  `jumlahhari` varchar(40) NOT NULL,
  PRIMARY KEY (`idsettingcuti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `settingcuti`
--

INSERT INTO `settingcuti` (`idsettingcuti`, `jeniscuti`, `jumlahhari`) VALUES
(1, 'Total Cuti', '12'),
(2, 'Cuti Menikah', '30'),
(3, 'Cuti Hamil', '120'),
(4, 'Cuti Keluarga Meninggal', '3'),
(5, 'Cuti Menikah / Anak Khitanan', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(60) DEFAULT NULL,
  `nama_panggilan` varchar(20) DEFAULT NULL,
  `alamat` text,
  `kode_pos` varchar(5) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `warga_negara` varchar(20) DEFAULT NULL,
  `no_passport` varchar(15) DEFAULT NULL,
  `no_ktp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `berat_badan` int(3) DEFAULT NULL,
  `tinggi_badan` int(3) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `status_kawin` int(1) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `idjabatan` int(3) NOT NULL,
  `kacamata` int(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `email`, `password`, `nama_lengkap`, `nama_panggilan`, `alamat`, `kode_pos`, `no_telp`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `warga_negara`, `no_passport`, `no_ktp`, `jenis_kelamin`, `berat_badan`, `tinggi_badan`, `foto`, `status_kawin`, `agama`, `idjabatan`, `kacamata`) VALUES
(7, 'hrdstaff', 'hrdstaff@wangwha.com', '$2y$10$IBgx7A.MQj9l0JuJqq.Wsebh/eqmbfTrM.8vmnbqB0UTjq1cmjn.G', 'Admin', 'Admin', 'sdfsdf', '3453', '0217416922', '085772018069', 'sdf', '1970-01-01', 'Indonesia', '', '12233', '1', 98, 178, 'Admin_7.jpg', 1, '1', 1, 2),
(9, 'direktur', 'direktur@wangwha.com', '$2y$10$WO1w5prpSua9DThFSUtkNuPuF4VSUvMdrEjyyCUsaCis2sVjoF5bu', 'Direktur', 'Direktur', 'sefs', '23423', NULL, '32432', 'dsafads', '1970-01-01', 'Indonesia', '234', NULL, '2', 234, 234, 'Direktur_9.jpg', 1, '1', 3, 2),
(25, 'keuangan', 'keuangan@wangwha.com', '$2y$10$GyQCvTLpQ5VnCmmXLeD9w.hW06mLp2kQHil31PrmOdY3/g24cF.Z.', 'Keuangan', 'Keuangan', NULL, NULL, NULL, NULL, NULL, NULL, 'Indonesia', '', NULL, NULL, NULL, NULL, NULL, 0, '1', 5, 0),
(46, 'hrdmanager', 'hrdmanager@ehrd.com', '$2y$10$9CvJTpRtPa7n.bOSDSq5BeT8997MjkVMYpmxnbcT.7kY/QYUrCD2K', 'HRD Manager', 'HRD Manager', 'JL. Swadaya 2 No. 188 Rt 05/017 Pasar Minggu', '15341', '0217416922', '0857772018069', 'Jakarta', '0000-00-00', 'Indonesia', '', '1000022041991', '1', 76, 175, '', 1, '1', 2, 1),
(47, 'syahid', 'syahidzakwan@gmail.com', '$2y$10$lm/8K8YfdZfSqL8376dRmOvJrT/tSzTtvhx.JW5nsO06zpJbMj3pq', 'Syahid Zakwan', 'Syahid', 'JL. Benda Timur 8 B No. 32 Rt 04/10 Pamulang, Tangerang Selatan', '15415', '0219373833', '0853254234', 'Jakarta', '1990-02-06', 'Indonesia', NULL, '4353534', '1', 0, 0, 'Syahid_47.jpg', 1, '1', 6, 1),
(48, 'donny', 'donny@gmail.com', '$2y$10$BsjrE2qIjN22WIA/7MWBR.j1AKb3AQQ0isR5P7.qqCFYGaiMYu/fi', 'Donny Ananda', 'Donny', 'sdafdsfds', '15415', '0219373833', '0853254234', 'Jakarta', '1994-07-13', 'Indonesia', NULL, '23423', '1', 0, 0, '', 1, '1', 6, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laporanabsensi`
--
CREATE TABLE IF NOT EXISTS `vw_laporanabsensi` (
`idlistabsensi` varchar(16)
,`tanggal` date
,`nokaryawan` varchar(5)
,`hadir` int(0)
,`terlambat` int(0)
,`lembur` int(0)
,`jamlembur` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_listabsensi`
--
CREATE TABLE IF NOT EXISTS `vw_listabsensi` (
`idlistabsensi` varchar(16)
,`tanggal` date
,`nokaryawan` varchar(5)
,`masuk` time
,`keluar` time
,`kehadiran` varchar(5)
,`telat` varchar(8)
,`pulang` varchar(8)
,`lembur` varchar(8)
);
-- --------------------------------------------------------

--
-- Structure for view `vw_laporanabsensi`
--
DROP TABLE IF EXISTS `vw_laporanabsensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laporanabsensi` AS (select `vw_listabsensi`.`idlistabsensi` AS `idlistabsensi`,`vw_listabsensi`.`tanggal` AS `tanggal`,`vw_listabsensi`.`nokaryawan` AS `nokaryawan`,(case when (`vw_listabsensi`.`kehadiran` <> 'hadir') then 0 else 1 end) AS `hadir`,(case when (`vw_listabsensi`.`telat` = 'check') then 0 when (`vw_listabsensi`.`telat` = '-') then 0 else 1 end) AS `terlambat`,(case when (`vw_listabsensi`.`lembur` = 'check') then 0 when (`vw_listabsensi`.`lembur` = '-') then 0 else 1 end) AS `lembur`,(case when (`vw_listabsensi`.`lembur` = 'check') then 0 when (`vw_listabsensi`.`lembur` = '-') then 0 when ((`vw_listabsensi`.`lembur` = 'check') and (`vw_listabsensi`.`pulang` = 'check')) then 0 else (`vw_listabsensi`.`lembur` - (select `db_absensi`.`settingabsensi`.`settingvalue` from `db_absensi`.`settingabsensi` where (`db_absensi`.`settingabsensi`.`id` = 3))) end) AS `jamlembur` from `vw_listabsensi`);

-- --------------------------------------------------------

--
-- Structure for view `vw_listabsensi`
--
DROP TABLE IF EXISTS `vw_listabsensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listabsensi` AS (select concat(`a`.`tanggal`,' ',`a`.`nokaryawan`) AS `idlistabsensi`,`a`.`tanggal` AS `tanggal`,`a`.`nokaryawan` AS `nokaryawan`,`a`.`masuk` AS `masuk`,`a`.`keluar` AS `keluar`,(case when (isnull(`a`.`masuk`) and (`a`.`tanggal` >= (select `ct`.`tanggalmulai` from (`cuti` `ct` join `karyawan` `kr`) where ((`ct`.`nokaryawan` = `kr`.`nokaryawan`) and (`kr`.`nokaryawan` = `a`.`nokaryawan`) and (`ct`.`status` = 2) and (`ct`.`idcuti` = (select max(`cuti`.`idcuti`) AS `idcuti` from `cuti` where ((`cuti`.`nokaryawan` = `a`.`nokaryawan`) and (`cuti`.`status` = 2))))) limit 0,1)) and (`a`.`tanggal` <= (select `ct2`.`tanggalselesai` from (`cuti` `ct2` join `karyawan` `kr2`) where ((`ct2`.`nokaryawan` = `kr2`.`nokaryawan`) and (`kr2`.`nokaryawan` = `a`.`nokaryawan`) and (`ct2`.`status` = 2) and (`ct2`.`idcuti` = (select max(`cuti`.`idcuti`) AS `idcuti` from `cuti` where ((`cuti`.`nokaryawan` = `a`.`nokaryawan`) and (`cuti`.`status` = 2))))) limit 0,1))) then 'cuti' when isnull(`a`.`masuk`) then 'absen' else 'hadir' end) AS `kehadiran`,(case when (`a`.`masuk` > (select cast(`b`.`settingvalue` as time) AS `ss` from `db_absensi`.`settingabsensi` `b` where (`b`.`id` = 1))) then `a`.`masuk` when isnull(`a`.`masuk`) then '-' else 'check' end) AS `telat`,(case when (`a`.`keluar` < (select cast(`b`.`settingvalue` as time) AS `ss` from `db_absensi`.`settingabsensi` `b` where (`b`.`id` = 2))) then `a`.`keluar` when isnull(`a`.`keluar`) then '-' else 'check' end) AS `pulang`,(case when (`a`.`keluar` > (select cast(`b`.`settingvalue` as time) AS `ss` from `db_absensi`.`settingabsensi` `b` where (`b`.`id` = 3))) then `a`.`keluar` when isnull(`a`.`keluar`) then '-' else 'check' end) AS `lembur` from (`db_absensi`.`vw_absensi` `a` join `karyawan` `z` on((`a`.`nokaryawan` = `z`.`nokaryawan`))));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
