-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2021 at 07:15 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) character set latin1 collate latin1_general_ci NOT NULL,
  `level` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') character set latin1 collate latin1_general_ci NOT NULL default 'N',
  `create` datetime default NULL,
  `lastupdate` datetime default NULL,
  `lastlogin` datetime default NULL,
  `ipaddress` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `level`, `blokir`, `create`, `lastupdate`, `lastlogin`, `ipaddress`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-01-21 13:53:42', '127.0.0.1'),
('candra', '827ccb0eea8a706c4c34a16891f84e7b', 'candra wah', 'user', 'N', '0000-00-00 00:00:00', '2021-01-07 19:17:57', '2021-01-07 19:18:30', '127.0.0.1'),
('hdt', '2ad202b4999db3676097a15e7a8d1982', 'help desk technology', 'admin', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
('udin', '36b1f66aab505f87c3952c931472f3fc', 'Udin Sedunia', 'user', 'Y', '0000-00-00 00:00:00', '2020-10-28 20:20:24', '2012-05-04 16:41:05', '::1'),
('user', '21232f297a57a5a743894a0e4a801fc3', 'user', 'user', 'N', NULL, NULL, '2020-12-12 19:12:55', '127.0.0.1'),
('wahyu', '12345', 'candra wahyu', 'user', 'Y', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` char(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` char(10) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  PRIMARY KEY  (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`, `stok_awal`) VALUES
('B001', 'Snailhelter Bussines', 'PCS', 3000, 5000, 10),
('B002', 'Kertas A4', 'PCS', 43000, 45000, 10),
('B003', 'Bolpein Standart', 'PCS', 2000, 4000, 10),
('B004', 'Keyboard', 'PCS', 35000, 45000, 10),
('B005', 'CD RW', 'PCS', 35000, 45000, 10),
('B006', 'Mouse ', 'PCS', 25000, 30000, 10),
('B007', 'Jangka', 'PCS', 13000, 15000, 10),
('B008', 'Penghapus', 'PCS', 1000, 2000, 10),
('B009', 'Cutter', 'PCS', 7000, 9000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `kode_beli` char(15) NOT NULL,
  `tgl_beli` date NOT NULL,
  `kode_supplier` char(5) NOT NULL,
  `kode_barang` char(15) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  PRIMARY KEY  (`kode_beli`,`kode_supplier`,`kode_barang`),
  KEY `kode_barang` (`kode_barang`),
  KEY `kode_supplier` (`kode_supplier`),
  KEY `kode_beli` (`kode_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_beli`, `tgl_beli`, `kode_supplier`, `kode_barang`, `nama_barang`, `jumlah_beli`, `harga_beli`) VALUES
('BL0001', '2021-01-01', 'SP001', 'B002', '', 5, 240000),
('BL0001', '2021-01-01', 'SP001', 'B005', '', 5, 35000),
('BL0002', '2021-01-02', 'SP002', 'B001', '', 2, 230000),
('BL0023', '2021-01-02', 'SP002', 'B006', '', 5, 25000),
('BL0033', '2021-01-02', 'SP001', 'B002', '', 3, 240000),
('BL0036', '2021-01-02', 'SP001', 'B007', '', 2, 13000),
('BL0037', '2021-01-07', 'SP001', 'B001', '', 2, 3000),
('BL0038', '2021-01-07', 'SP001', 'B001', '', 5, 3000),
('BL0039', '2021-01-07', 'SP001', 'B001', '', 5, 3000),
('BL0040', '2021-01-07', 'SP001', 'B001', '', 10, 3000),
('BL0041', '2021-01-09', 'SP001', 'B001', '', 10, 3000),
('BL0042', '2021-01-09', 'SP001', 'B001', '', 2, 3000),
('BL0043', '2021-01-09', 'SP001', 'B001', '', 4, 3000),
('BL0044', '2021-01-09', 'SP001', 'B001', '', 10, 3000),
('BL0045', '2021-01-09', 'SP001', 'B001', '', 2, 3000),
('BL0046', '2021-01-09', 'SP001', 'B001', '', 3, 3000),
('BL0047', '2021-01-09', 'SP001', 'B001', '', 4, 3000),
('BL0048', '2021-01-09', 'SP001', 'B001', '', 5, 3000),
('BL0049', '2021-01-10', 'SP001', 'B005', '', 10, 35000),
('BL0050', '2021-01-21', 'SP001', 'B003', '', 2, 2000),
('BL0051', '2021-01-21', 'SP001', 'B002', '', 5, 43000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `kode_jual` char(15) NOT NULL,
  `tgl_jual` date NOT NULL,
  `kode_barang` char(15) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY  (`kode_jual`,`kode_barang`),
  KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kode_jual`, `tgl_jual`, `kode_barang`, `nama_barang`, `jumlah_jual`, `harga_jual`, `username`) VALUES
('JL0005', '2021-01-09', 'B001', 'Snailhelter Bussines', 2, 3000, 'admin'),
('JL0006', '2021-01-10', 'B008', 'Penghapus', 3, 1000, 'admin'),
('JL0007', '2021-01-10', 'B008', 'Penghapus', 4, 1000, 'admin'),
('JL0008', '2021-01-21', 'B005', 'CD RW', 1, 35000, 'admin'),
('JL0008', '2021-01-21', 'B008', 'Penghapus', 3, 1000, 'admin'),
('JL0008', '2021-01-21', 'B009', 'Cutter', 4, 7000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `retur_pembelian` (
  `kode_retur` char(30) NOT NULL,
  `tgl_retur` date NOT NULL,
  `kode_beli` char(15) NOT NULL,
  `kode_barang` char(15) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  PRIMARY KEY  (`kode_retur`,`kode_beli`,`kode_barang`),
  KEY `kode_beli` (`kode_beli`),
  KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_pembelian`
--

INSERT INTO `retur_pembelian` (`kode_retur`, `tgl_retur`, `kode_beli`, `kode_barang`, `jumlah_retur`) VALUES
('01052012BL0001', '2012-05-01', 'BL0001', 'B002', 2),
('01052012BL0001', '2012-05-01', 'BL0001', 'B005', 3),
('03052012BL0023', '2012-05-03', 'BL0023', 'B006', 6),
('07012021BL0037', '2021-01-07', 'BL0037', 'B001', 2),
('09012021BL0041', '2021-01-09', 'BL0041', 'B001', 4),
('10012021BL0049', '2021-01-10', 'BL0049', 'B005', 5),
('13122020BL0033', '2020-12-13', 'BL0033', 'B002', 1),
('14122020BL0036', '2020-12-14', 'BL0036', 'B007', 1),
('21012021BL0050', '2021-01-21', 'BL0050', 'B003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `kode_supplier` char(5) NOT NULL default '',
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY  (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `username`) VALUES
('SP001', 'Maju Terus,CV.', 'Jl. Woltermonginsidi', 'admin'),
('SP002', 'Barokah,CV.', 'Jl. Ahmad Yani Smg', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD CONSTRAINT `retur_pembelian_ibfk_1` FOREIGN KEY (`kode_beli`) REFERENCES `pembelian` (`kode_beli`),
  ADD CONSTRAINT `retur_pembelian_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);
