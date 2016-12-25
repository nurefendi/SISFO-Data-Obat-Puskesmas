-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 11:44 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses`
--

CREATE TABLE IF NOT EXISTS `tbl_akses` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tbl_akses`
--

INSERT INTO `tbl_akses` (`id_user`, `nip`, `nama_user`, `jabatan`, `jenis_kelamin`, `status`, `username`, `password`) VALUES
(1, '15.21.0910', 'Iswatunnisa', 'Admin', 'Perempuan', 'Administrator', 'Nisa', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '15.21.09011', 'Nirmala Hapsari', 'Admin', 'Perempuan', 'Administrator', 'Mala', 'e10adc3949ba59abbe56e057f20f883e'),
(3, '15.21.0878', 'Nur Efendi', 'Admin', 'Laki-laki', 'Administrator', 'Fendi', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(4) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Vitamin'),
(2, 'Gel'),
(3, 'Sirup'),
(4, 'Kapsul'),
(5, 'Tablet'),
(6, 'Serbuk'),
(7, 'Salep'),
(8, 'antibiotik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE IF NOT EXISTS `tbl_obat` (
  `id_obat` int(3) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(3) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `produsen` varchar(50) NOT NULL,
  `distributor` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `expired` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_edit` date NOT NULL,
  `counter` int(5) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `id_kategori`, `nama_obat`, `kode_obat`, `produsen`, `distributor`, `satuan`, `harga_beli`, `harga`, `stok`, `expired`, `tgl_masuk`, `tgl_edit`, `counter`) VALUES
(1, 3, 'Adem Sari', 'SE001', 'PT. Kimia Farma', 'CV. Kencana', 'Sachet', '1500', '2000', 43, '2017-11-17', '2016-11-17', '2016-12-14', 20),
(2, 6, 'Konimex', 'SS001', 'Glaxo', 'CV. BioFarma', 'Sachet', '2000', '2500', 24, '2018-02-22', '2016-11-15', '2016-12-14', 2),
(3, 3, 'Vegeta', 'SE002', 'Coronet', 'CV. BioFarma', 'Sachet', '3000', '4000', 7, '2018-07-20', '2016-12-14', '2016-12-14', 1),
(4, 4, 'Panadol', 'TB001', 'Kinocare', 'CV. BioFarma', 'Pcs', '8500', '9500', 11, '2017-12-28', '2016-12-16', '2016-12-16', 0),
(5, 6, 'Kiranti', 'SS002', 'PT. Kimia Farma', 'CV. Kencana', 'Botol', '12000', '15000', 14, '2018-11-27', '2016-11-16', '2016-11-16', 2),
(6, 4, 'Amoxilin', 'TB002', 'PT. Bison', 'CV. Kencana', 'Pcs', '9000', '11000', 22, '2017-08-11', '2016-12-17', '2016-12-17', 0),
(7, 2, 'Counterpain', 'SL001', 'PT. Medical', 'PT. Centre', 'Pcs', '23000', '25000', 36, '2018-06-06', '2016-12-24', '2016-12-17', 4),
(8, 5, 'Nuriskin', 'KP001', 'PT. Medical', 'PT. Centre', 'Pcs', '18000', '20000', 27, '2015-12-16', '2016-12-22', '2016-12-22', 20),
(9, 3, 'Antangin', 'AT003', 'PT. Antangin', 'PT. Antangin', 'Sachet', '1500', '2000', 18, '2018-12-19', '2016-12-18', '2016-12-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(20) NOT NULL AUTO_INCREMENT,
  `id_obat` int(4) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_obat`, `id_kategori`, `nama`, `jenis_kelamin`, `tanggal`, `jumlah`) VALUES
(1, 8, 5, 'Laudya Bella', 'Perempuan', '2016-12-14', 2),
(2, 3, 3, 'Andika Pratama', 'Laki-Laki', '2016-12-14', 3),
(3, 7, 2, 'Mario Teguh', 'Laki-Laki', '2016-12-17', 5),
(4, 1, 3, 'Isyana Larastanti', 'Perempuan', '2016-12-18', 7),
(5, 7, 2, 'Nadia Vega', 'Perempuan', '2016-12-19', 3),
(6, 8, 5, 'Agnes Monica', 'Perempuan', '2016-12-21', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
