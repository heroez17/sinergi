-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Sep 2018 pada 09.18
-- Versi server: 10.2.18-MariaDB
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibenk_kassir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_menu` varchar(20) DEFAULT NULL,
  `id_menu_master` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `id_user`, `id_menu`, `id_menu_master`) VALUES
(21, '32', '10', NULL),
(22, '32', '11', NULL),
(25, '32', '14', 2),
(26, '32', '15', 2),
(39, '32', '1', 6),
(40, '32', '2', 1),
(41, '32', '3', 1),
(42, '32', '4', 1),
(43, '32', '5', 1),
(44, '32', '6', 1),
(45, '32', '7', 2),
(46, '32', '8', 3),
(47, '32', '9', NULL),
(57, '32', '12', 4),
(58, '32', '13', 5),
(61, '36', '13', 5),
(62, '36', '8', 3),
(64, '36', '15', 2),
(65, '36', '7', 2),
(68, '32', '17', 3),
(69, '32', '16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `app`
--

CREATE TABLE `app` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `tentang` longtext DEFAULT NULL,
  `telpon` varchar(13) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `photo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app`
--

INSERT INTO `app` (`id`, `nama`, `alamat`, `tentang`, `telpon`, `email`, `photo`) VALUES
(2, 'TOKO BERKAH', 'Sukabumi', 'Monngo Mampir adalah warung sederhana', '026679890', 'demo@gmail.com', '9222dbb1784e922f0d0a06d9fbf54c11.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_gdg`
--

CREATE TABLE `barang_gdg` (
  `id_barang` varchar(20) NOT NULL,
  `id_satuan_gudang` int(11) DEFAULT NULL,
  `id_satuan_pcs` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stts` enum('AKTIF','TIDAK') DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga_jual_gudang` varchar(20) DEFAULT NULL,
  `harga_jual_pcs` varchar(20) DEFAULT NULL,
  `qty_pcs` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_gdg`
--

INSERT INTO `barang_gdg` (`id_barang`, `id_satuan_gudang`, `id_satuan_pcs`, `id_supplier`, `id_kategori`, `nama_barang`, `stts`, `harga_beli`, `harga_jual_gudang`, `harga_jual_pcs`, `qty_pcs`) VALUES
('0001', 28, 27, 14, 30, 'KEJU', 'AKTIF', '30000', '31000', '3500', '10'),
('0002', 28, 35, 14, 30, 'COKLAT', 'AKTIF', '20000', '21000', '2300', '10'),
('0231', 28, 30, 14, 31, 'TEST MINUM', 'AKTIF', '70000', '71000', '6000', '12'),
('089686010343', 28, 29, 13, 33, 'INDOMIE', 'AKTIF', '50000', '55000', '3000', '40'),
('089686060126', 28, 29, 13, 33, 'POP MIE', 'AKTIF', '54000', '55000', '4000', '24'),
('0909', 27, 27, 13, 31, 'FANTA 100 ML', 'AKTIF', '4000', '4500', '4500', '1'),
('8991002103238', 35, 29, 14, 31, 'GODDAY MOCCACINO', 'AKTIF', '10500', '12000', '1500', '10'),
('8991111112091', 29, 29, 14, 32, 'CLEAN & CLEAR 100G ', 'AKTIF', '22000', '22500', '22500', '1'),
('8991906101019', 28, 32, 16, 32, 'DJARUM SUPER', 'AKTIF', '130000', '140000', '13500', '10'),
('8991906101101', 29, 29, 14, 32, 'LA 16 BATANG', 'AKTIF', '10', '300000', '20900', '1'),
('8992761136185', 30, 30, 13, 31, 'FANTA 1 L', 'AKTIF', '9000', '10000', '10000', '1'),
('8992761164546', 30, 30, 13, 31, 'NUTRIBOOST', 'AKTIF', '6000', '7000', '7000', '1'),
('8993989311699', 29, 29, 13, 32, 'CLASSMILD 16', 'AKTIF', '19000', '20000', '20000', '1'),
('8996001600146', 30, 30, 13, 31, 'TEH PUCUK', 'AKTIF', '2800', '3000', '3000', '1'),
('8998667100206', 34, 29, 16, 32, 'PARAMEX 250 MG', 'AKTIF', '2000', '2300', '600', '4'),
('8999909096004', 32, 33, 16, 32, 'SAMPOERNA MILD 16', 'AKTIF', '150000', '160000', '23000', '10'),
('989', 28, 30, 14, 31, 'SEGAR', 'AKTIF', '10000', '11000', '2000', '6'),
('C0371033B07C', 28, 29, 13, 31, 'PC', 'AKTIF', '1', '16000', '16000', '1'),
('PA1504V102338', 27, 28, 13, 31, 'VGVGHHH', 'AKTIF', '1', '300000', '300000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_gdg_keluar`
--

CREATE TABLE `barang_gdg_keluar` (
  `no_keluar` varchar(30) NOT NULL,
  `tanggal` varchar(12) DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga_jual` varchar(20) DEFAULT NULL,
  `qty` varchar(6) DEFAULT NULL,
  `qty_isi` varchar(6) DEFAULT NULL,
  `stts` enum('PROSES','SELESAI') DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `usr_input` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_gdg_keluar`
--

INSERT INTO `barang_gdg_keluar` (`no_keluar`, `tanggal`, `id_barang`, `harga_beli`, `harga_jual`, `qty`, `qty_isi`, `stts`, `satuan`, `usr_input`) VALUES
('KO20180603001', '2018-06-03', '0001', '', '1300', '1', '10', 'SELESAI', '29', 'admin'),
('KS20180603002', '2018-06-03', '0001', '0', '13000', '1', '0', 'SELESAI', '', 'admin'),
('KO20180603002', '2018-06-03', '0002', '', '1300', '1', '10', 'SELESAI', '29', 'admin'),
('KS20180603004', '2018-06-03', '0002', '0', '13000', '1', '0', 'SELESAI', '', 'admin'),
('KO20180604001', '2018-06-04', '0001', '', '1200', '2', '20', 'SELESAI', '29', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_gdg_pesan`
--

CREATE TABLE `barang_gdg_pesan` (
  `no_faktur` varchar(30) NOT NULL,
  `tanggal` varchar(12) DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga_jual` varchar(20) DEFAULT NULL,
  `qty` varchar(6) DEFAULT NULL,
  `qty_terima` varchar(6) DEFAULT NULL,
  `stts` enum('PROSES','KIRIM','TERIMA') DEFAULT NULL,
  `tanggal_terima` varchar(12) DEFAULT NULL,
  `usr_psn` varchar(10) NOT NULL,
  `usr_trm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_gdg_pesan`
--

INSERT INTO `barang_gdg_pesan` (`no_faktur`, `tanggal`, `id_barang`, `harga_beli`, `harga_jual`, `qty`, `qty_terima`, `stts`, `tanggal_terima`, `usr_psn`, `usr_trm`) VALUES
('PO20180916001', '2018-09-16', '0001', '30000', '31000', '10', '100', 'TERIMA', '', 'admin', ''),
('PO20180916002', '2018-09-16', '0002', '20000', '21000', '1', '10', 'TERIMA', '', 'admin', ''),
('PO20180916003', '2018-09-16', '0001', '30000', '31000', '1', '10', 'TERIMA', '', 'admin', ''),
('PO20180916004', '2018-09-16', '0001', '30000', '31000', '5', '50', 'TERIMA', '', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_gdg_titipan`
--

CREATE TABLE `barang_gdg_titipan` (
  `tanggal` varchar(12) DEFAULT NULL,
  `id_barang` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `stts` enum('AKTIF','TIDAK') DEFAULT NULL,
  `usr_input` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_gdg_titipan`
--

INSERT INTO `barang_gdg_titipan` (`tanggal`, `id_barang`, `nama`, `satuan`, `supplier`, `stts`, `usr_input`) VALUES
('2018-06-04', 'K003', 'KUE', '29', 'ibu ibu', NULL, 'admin'),
('2018-06-04', 'K009', 'KUE2', '29', 'ibu obu', NULL, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_jual`
--

CREATE TABLE `barang_jual` (
  `no_jual` varchar(30) NOT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `harga_jual` varchar(20) DEFAULT NULL,
  `qty` varchar(6) DEFAULT NULL,
  `stts` enum('PROSES','SELESAI','KREDIT') DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `usr_input` varchar(10) DEFAULT NULL,
  `jenis` enum('gudang','pcs') DEFAULT NULL,
  `ket` longtext DEFAULT NULL,
  `nofak` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_jual`
--

INSERT INTO `barang_jual` (`no_jual`, `tanggal`, `id_barang`, `harga_jual`, `qty`, `stts`, `satuan`, `usr_input`, `jenis`, `ket`, `nofak`) VALUES
('NT20180915001', '2018-09-15 16:04:03', '0002', '2300', '1', 'SELESAI', 'plastik', 'admin', 'pcs', '', ''),
('NT20180915002', '2018-09-15 22:24:04', '0001', '3500', '1', 'SELESAI', 'kaleng', 'admin', 'pcs', 'jjj', '01/INV/KOP-PTM/IX/2018'),
('NT20180916001', '2018-09-16', '0001', '3500', '1', 'SELESAI', 'kaleng', 'admin', 'pcs', '', ''),
('NT20180916001', '2018-09-16', '0001', '3500', '115', 'SELESAI', 'kaleng', 'admin', 'pcs', '', ''),
('NT20180918001', '2018-09-18', '0231', '6000', '10', 'PROSES', 'botol', 'admin', 'pcs', '', ''),
('NT20180918001', '2018-09-18', '0231', '71000', '1', 'PROSES', 'dus', 'admin', 'gudang', '', ''),
('NT20180922001', '2018-09-22', '8993989311699', '20000', '1', 'SELESAI', 'pcs', 'admin', 'pcs', '', ''),
('NT20180922001', '2018-09-22', '8993989311699', '20000', '1', 'SELESAI', 'pcs', 'admin', 'pcs', '', ''),
('NT20180922002', '2018-09-22', '089686060126', '4000', '12', 'SELESAI', 'pcs', 'admin', 'pcs', '', ''),
('NT20180922002', '2018-09-22', '8991002103238', '12000', '2', 'SELESAI', 'plastik', 'admin', 'gudang', '', ''),
('NT20180922003', '2018-09-22', '8992761136185', '10000', '12', 'SELESAI', 'botol', 'admin', 'pcs', 'andri', '01/INV/KOP-PTM/IX/2018'),
('NT20180922003', '2018-09-22', '8991111112091', '22500', '13', 'SELESAI', 'pcs', 'admin', 'gudang', 'andri', '01/INV/KOP-PTM/IX/2018'),
('NT20180922004', '2018-09-22', '8991906101101', '20900', '1', 'PROSES', 'pcs', 'admin', 'pcs', '', ''),
('NT20180922004', '2018-09-22', '8991906101101', '20900', '1', 'PROSES', 'pcs', 'admin', 'pcs', '', ''),
('NT20180925001', '2018-09-25', '8993989311699', '20000', '1', 'SELESAI', 'pcs', 'admin', 'pcs', '', ''),
('NT20180925001', '2018-09-25', '8993989311699', '20000', '1', 'SELESAI', 'pcs', 'admin', 'pcs', '', ''),
('NT20180927001', '2018-09-27', '0001', '3500', '1', 'SELESAI', 'kaleng', 'admin', 'pcs', '', ''),
('NT20180927002', '2018-09-27', '0001', '3500', '2', 'SELESAI', 'kaleng', 'admin', 'pcs', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_titipan_datang`
--

CREATE TABLE `barang_titipan_datang` (
  `no_terima` varchar(30) NOT NULL,
  `tanggal` varchar(12) DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga_jual` varchar(20) DEFAULT NULL,
  `qty` varchar(6) DEFAULT NULL,
  `qty_return` varchar(6) DEFAULT NULL,
  `stts` enum('PROSES','SELESAI') DEFAULT NULL,
  `usr_input` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_titipan_datang`
--

INSERT INTO `barang_titipan_datang` (`no_terima`, `tanggal`, `id_barang`, `harga_beli`, `harga_jual`, `qty`, `qty_return`, `stts`, `usr_input`) VALUES
('TI20180604001', '2018-06-04', 'K003', '900', '1000', '2', '8', 'SELESAI', 'admin'),
('TI20180604001', '2018-06-04', 'K009', '900', '1000', '10', '', 'SELESAI', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_dasar`
--

CREATE TABLE `tab_dasar` (
  `id_dasar` varchar(12) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `set_jadi` varchar(12) DEFAULT NULL,
  `satuan_komposisi` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_faktur`
--

CREATE TABLE `tab_faktur` (
  `no_faktur` varchar(30) NOT NULL,
  `pelanggan` varchar(20) DEFAULT NULL,
  `tgl_order` varchar(20) DEFAULT NULL,
  `stts` enum('PROSES','SELESAI','KREDIT','LUNAS') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_faktur`
--

INSERT INTO `tab_faktur` (`no_faktur`, `pelanggan`, `tgl_order`, `stts`) VALUES
('01/INV/KOP-PTM/IX/2018', '2', '2018-09-15', 'KREDIT'),
('02/INV/KOP-PTM/IX/2018', '3', '2018-09-22', 'KREDIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_karyawan`
--

CREATE TABLE `tab_karyawan` (
  `nik` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` longtext NOT NULL,
  `jk` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tem_lah` varchar(30) DEFAULT NULL,
  `tgl_lah` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_karyawan`
--

INSERT INTO `tab_karyawan` (`nik`, `nama`, `alamat`, `jk`, `phone`, `jabatan`, `tem_lah`, `tgl_lah`) VALUES
(60, 'IBENK', 'administrator', 'LAKI-LAKI', '1234567', 'dsfdf', 'sukabumi', '16-05-2018'),
(62, 'BUDI', 'hJawa Tengah', 'LAKI-LAKI', '021654', 'Surti', 'Jawa Tengah', '05-01-2009'),
(64, 'KASIR', 'kasir', 'PEREMPUAN', '0857', 'kasir', 'kasir', '01-05-2018'),
(66, 'GUDANG', 'jakarta', 'LAKI-LAKI', '0813', 'gudang', 'jakarta', '12-04-1966');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_kategori`
--

CREATE TABLE `tab_kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` varchar(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_kategori`
--

INSERT INTO `tab_kategori` (`id_kategori`, `nama`, `userinput`, `userupdate`, `tglinput`, `tglupdate`, `userdelete`, `tgldelete`, `stts`) VALUES
(30, 'MAKANAN', 60, 0, '2018-05-03', '', '60', '2018-06-28', 'NONAKTIF'),
(31, 'MINUMAN', 60, 0, '2018-05-03', '', NULL, NULL, 'AKTIF'),
(32, 'OBAT-OBATAN', 60, 60, '2018-05-03', '2018-05-03', NULL, NULL, 'AKTIF'),
(33, 'INDOMIE', 60, 0, '2018-05-03', '', NULL, NULL, 'AKTIF'),
(34, 'BERAS1', 60, 60, '2018-05-03', '2018-05-03', '60', '2018-05-03', 'NONAKTIF'),
(35, 'BISKUIT', 60, 0, '2018-05-08', '', NULL, NULL, 'AKTIF'),
(36, 'DEWASA', 60, 0, '2018-06-30', '', NULL, NULL, 'AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_login`
--

CREATE TABLE `tab_login` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_key` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nik` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `photo` longtext COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tab_login`
--

INSERT INTO `tab_login` (`user_id`, `user_name`, `user_key`, `nik`, `photo`) VALUES
(32, 'admin', '21232f297a57a5a743894a0e4a801fc3', '60', 'd370482bbd723e53f95a37d55986d723.gif'),
(36, 'kasir', 'c7911af3adbd12a035b289556d96470a', '62', 'ee68d57b6c2e48e7fa4e75abddfede49.jpg'),
(37, 'gudang', '202446dd1d6028084426867365b0c7a1', '66', '6b9f9c39cd0161bb1bbf861f3af3c1fe.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_menu`
--

CREATE TABLE `tab_menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nama_lihat` varchar(30) DEFAULT NULL,
  `id_menu_master` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_menu`
--

INSERT INTO `tab_menu` (`id_menu`, `nama`, `nama_lihat`, `id_menu_master`) VALUES
(1, 'dashboard', 'HOME', 6),
(2, 'karyawan', 'KARYAWAN', 1),
(3, 'user', 'USER', 1),
(4, 'kategori', 'KATEGORI', 1),
(5, 'satuan', 'SATUAN', 1),
(6, 'supplier', 'SUPPLIER', 1),
(7, 'barang_gdg', 'DATA BARANG', 2),
(8, 'barang_etls', 'CASH', 3),
(12, 'laporan', 'LAPORAN', 4),
(13, 'setting', 'SETTING', 5),
(14, 'barang_gdg/pesan', 'KEDATANGAN BARANG', 2),
(15, 'barang_gdg/stk', 'STOCK', 2),
(16, 'pelanggan', 'PELANGGAN', 1),
(17, 'faktur', 'KREDIT', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_menu_master`
--

CREATE TABLE `tab_menu_master` (
  `id_menu_master` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_menu_master`
--

INSERT INTO `tab_menu_master` (`id_menu_master`, `nama`) VALUES
(1, 'MASTER'),
(2, 'BARANG'),
(3, 'KASIR'),
(4, 'LAPORAN'),
(5, 'SETTING'),
(6, 'HOME');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_pelanggan`
--

CREATE TABLE `tab_pelanggan` (
  `nik` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` longtext NOT NULL,
  `jk` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tem_lah` varchar(30) DEFAULT NULL,
  `tgl_lah` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_pelanggan`
--

INSERT INTO `tab_pelanggan` (`nik`, `nama`, `alamat`, `jk`, `phone`, `jabatan`, `tem_lah`, `tgl_lah`) VALUES
(3, 'CV DSN', 'Sukabumi', '', '0867878777', 'RUDI', '', ''),
(2, 'CV ALAMABA', 'Jl Raden Intent no 2 Jakarta Timur', '', '021 0909090', 'Andre', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_pemasok`
--

CREATE TABLE `tab_pemasok` (
  `id_pemasok` int(2) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_pemasok_detail`
--

CREATE TABLE `tab_pemasok_detail` (
  `id_pemasok` int(11) NOT NULL,
  `id_pemasok_detail` int(11) NOT NULL,
  `id_dasar` varchar(12) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_satuan`
--

CREATE TABLE `tab_satuan` (
  `id_satuan` int(2) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_satuan`
--

INSERT INTO `tab_satuan` (`id_satuan`, `nama`, `userinput`, `userupdate`, `tglinput`, `tglupdate`, `userdelete`, `tgldelete`, `stts`) VALUES
(27, 'kaleng', 60, 60, '2018-05-03', '2018-05-03', NULL, NULL, 'AKTIF'),
(28, 'dus', 60, 60, '2018-05-03', '2018-05-03', NULL, NULL, 'AKTIF'),
(29, 'pcs', 60, 0, '2018-05-03', '', NULL, NULL, 'AKTIF'),
(30, 'botol', 60, 0, '2018-05-03', '', 60, '2018-05-03', 'AKTIF'),
(31, 'Liter', 60, 60, '2018-05-07', '2018-05-07', NULL, NULL, 'AKTIF'),
(32, 'Packs', 60, 0, '2018-05-08', '', 60, '2018-05-08', 'NONAKTIF'),
(33, 'box', 60, 0, '2018-05-08', '', 60, '2018-06-28', 'AKTIF'),
(34, 'strip', 60, 0, '2018-05-08', '', NULL, NULL, 'AKTIF'),
(35, 'plastik', 60, 0, '2018-06-29', '', NULL, NULL, 'AKTIF'),
(36, 'renceng', 60, 0, '2018-06-30', '', NULL, NULL, 'AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_supplier`
--

CREATE TABLE `tab_supplier` (
  `id_supplier` int(2) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sales` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','TIDAK') DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_supplier`
--

INSERT INTO `tab_supplier` (`id_supplier`, `id_kategori`, `nama`, `sales`, `userinput`, `userupdate`, `tglinput`, `tglupdate`, `userdelete`, `tgldelete`, `stts`, `alamat`, `phone`, `email`) VALUES
(13, 30, 'PT SUMBER SUKSES ', 'TEST', NULL, NULL, NULL, NULL, NULL, NULL, 'AKTIF', 'jakarta', '025664456', 'test@gmail.com'),
(14, 32, 'PT MAJU KENA', 'JUARA 1', NULL, NULL, NULL, NULL, NULL, NULL, 'AKTIF', 'sukabumi 1', '0857', 'maju@dev.com'),
(16, 32, 'PT KESANA KEMARI', 'OTIS', NULL, NULL, NULL, NULL, NULL, NULL, 'AKTIF', 'jakarta', '087', 'otis@gmail.com'),
(17, 35, 'AROGAN', 'TONI', NULL, NULL, NULL, NULL, NULL, NULL, 'AKTIF', 'Sucipto', '0266233456', 'demo@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_trans`
--

CREATE TABLE `tab_trans` (
  `no_transaksi` varchar(20) NOT NULL,
  `no_faktur` varchar(30) DEFAULT NULL,
  `pelanggan` varchar(30) DEFAULT NULL,
  `tgl` varchar(12) DEFAULT NULL,
  `nominal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_trans`
--

INSERT INTO `tab_trans` (`no_transaksi`, `no_faktur`, `pelanggan`, `tgl`, `nominal`) VALUES
('BY180915102448', '01/INV/KOP-PTM/IX/2018', 'huhu', '2018-09-15', '500'),
('BY180922094452', '01/INV/KOP-PTM/IX/2018', 'andri', '2018-09-22', '100000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_gdg`
--
ALTER TABLE `barang_gdg`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_gdg_titipan`
--
ALTER TABLE `barang_gdg_titipan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tab_dasar`
--
ALTER TABLE `tab_dasar`
  ADD PRIMARY KEY (`id_dasar`);

--
-- Indeks untuk tabel `tab_faktur`
--
ALTER TABLE `tab_faktur`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `tab_karyawan`
--
ALTER TABLE `tab_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tab_kategori`
--
ALTER TABLE `tab_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tab_login`
--
ALTER TABLE `tab_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tab_menu`
--
ALTER TABLE `tab_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tab_menu_master`
--
ALTER TABLE `tab_menu_master`
  ADD PRIMARY KEY (`id_menu_master`);

--
-- Indeks untuk tabel `tab_pelanggan`
--
ALTER TABLE `tab_pelanggan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tab_pemasok`
--
ALTER TABLE `tab_pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `tab_pemasok_detail`
--
ALTER TABLE `tab_pemasok_detail`
  ADD PRIMARY KEY (`id_pemasok_detail`);

--
-- Indeks untuk tabel `tab_satuan`
--
ALTER TABLE `tab_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tab_supplier`
--
ALTER TABLE `tab_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tab_trans`
--
ALTER TABLE `tab_trans`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `app`
--
ALTER TABLE `app`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tab_karyawan`
--
ALTER TABLE `tab_karyawan`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tab_kategori`
--
ALTER TABLE `tab_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tab_login`
--
ALTER TABLE `tab_login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tab_menu`
--
ALTER TABLE `tab_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tab_menu_master`
--
ALTER TABLE `tab_menu_master`
  MODIFY `id_menu_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tab_pelanggan`
--
ALTER TABLE `tab_pelanggan`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tab_pemasok`
--
ALTER TABLE `tab_pemasok`
  MODIFY `id_pemasok` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tab_pemasok_detail`
--
ALTER TABLE `tab_pemasok_detail`
  MODIFY `id_pemasok_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tab_satuan`
--
ALTER TABLE `tab_satuan`
  MODIFY `id_satuan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tab_supplier`
--
ALTER TABLE `tab_supplier`
  MODIFY `id_supplier` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
