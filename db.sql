/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.5-10.1.28-MariaDB : Database - ibenk_kassir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ibenk_kassir` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ibenk_kassir`;

/*Table structure for table `akses` */

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(20) DEFAULT NULL,
  `id_menu` varchar(20) DEFAULT NULL,
  `id_menu_master` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `akses` */

insert  into `akses`(`id`,`id_user`,`id_menu`,`id_menu_master`) values (21,'32','10',NULL),(22,'32','11',NULL),(25,'32','14',2),(26,'32','15',2),(27,'32','16',NULL),(28,'32','17',NULL),(39,'32','1',6),(40,'32','2',1),(41,'32','3',1),(42,'32','4',1),(43,'32','5',1),(44,'32','6',1),(45,'32','7',2),(46,'32','8',3),(47,'32','9',NULL),(57,'32','12',4),(58,'32','13',5),(61,'36','13',5),(62,'36','8',3),(64,'36','15',2),(65,'36','7',2);

/*Table structure for table `app` */

DROP TABLE IF EXISTS `app`;

CREATE TABLE `app` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` longtext,
  `tentang` longtext,
  `telpon` varchar(13) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `photo` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `app` */

insert  into `app`(`id`,`nama`,`alamat`,`tentang`,`telpon`,`email`,`photo`) values (2,'TOKO BERKAH','Sukabumi','Monngo Mampir adalah warung sederhana','026679890','demo@gmail.com','9222dbb1784e922f0d0a06d9fbf54c11.gif');

/*Table structure for table `barang_gdg` */

DROP TABLE IF EXISTS `barang_gdg`;

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
  `qty_pcs` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_gdg` */

insert  into `barang_gdg`(`id_barang`,`id_satuan_gudang`,`id_satuan_pcs`,`id_supplier`,`id_kategori`,`nama_barang`,`stts`,`harga_beli`,`harga_jual_gudang`,`harga_jual_pcs`,`qty_pcs`) values ('0001',28,27,14,30,'KEJU','AKTIF','30000','31000','3500','10'),('0002',28,35,14,30,'COKLAT','AKTIF','20000','21000','2300','10'),('089686010343',28,29,13,33,'INDOMIE','AKTIF','50000','55000','3000','40'),('089686060126',28,29,13,33,'POP MIE','AKTIF','54000','55000','4000','24'),('0909',27,27,13,31,'FANTA 100 ML','AKTIF','4000','4500','4500','1'),('711844120440',30,30,13,33,'SAUS ABC 275ML','AKTIF','10000','11000','11000','1'),('8991002103238',35,29,14,31,'GODDAY MOCCACINO','AKTIF','10500','12000','1500','10'),('8991111112091',29,29,14,32,'CLEAN & CLEAR 100G ','AKTIF','22000','22500','22500','1'),('8991906101019',28,32,16,32,'DJARUM SUPER','AKTIF','130000','140000','13500','10'),('8992761136185',30,30,13,31,'FANTA 1 L','AKTIF','9000','10000','10000','1'),('8992761164546',30,30,13,31,'NUTRIBOOST','AKTIF','6000','7000','7000','1'),('8993989311699',29,29,13,32,'CLASSMILD 16','AKTIF','19000','20000','20000','1'),('8996001600146',30,30,13,31,'TEH PUCUK','AKTIF','2800','3000','3000','1'),('8998667100206',34,29,16,32,'PARAMEX 250 MG','AKTIF','2000','2300','600','4'),('8999909096004',32,33,16,32,'SAMPOERNA MILD 16','AKTIF','150000','160000','23000','10'),('989',28,30,14,31,'SEGAR','AKTIF','10000','11000','2000','6');

/*Table structure for table `barang_gdg_keluar` */

DROP TABLE IF EXISTS `barang_gdg_keluar`;

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

/*Data for the table `barang_gdg_keluar` */

insert  into `barang_gdg_keluar`(`no_keluar`,`tanggal`,`id_barang`,`harga_beli`,`harga_jual`,`qty`,`qty_isi`,`stts`,`satuan`,`usr_input`) values ('KO20180603001','2018-06-03','0001','','1300','1','10','SELESAI','29','admin'),('KS20180603002','2018-06-03','0001','0','13000','1','0','SELESAI','','admin'),('KO20180603002','2018-06-03','0002','','1300','1','10','SELESAI','29','admin'),('KS20180603004','2018-06-03','0002','0','13000','1','0','SELESAI','','admin'),('KO20180604001','2018-06-04','0001','','1200','2','20','SELESAI','29','admin');

/*Table structure for table `barang_gdg_pesan` */

DROP TABLE IF EXISTS `barang_gdg_pesan`;

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

/*Data for the table `barang_gdg_pesan` */

insert  into `barang_gdg_pesan`(`no_faktur`,`tanggal`,`id_barang`,`harga_beli`,`harga_jual`,`qty`,`qty_terima`,`stts`,`tanggal_terima`,`usr_psn`,`usr_trm`) values ('PO20180629001','2018-06-29','0909','4000','4500','8','8','TERIMA','','admin',''),('PO20180629001','2018-06-29','0001','30000','31000','10','100','TERIMA','','admin',''),('PO20180629001','2018-06-29','0002','20000','21000','10','100','TERIMA','','admin',''),('PO20180629001','2018-06-29','989','10000','11000','10','60','TERIMA','','admin',''),('PO20180630001','2018-06-30','0002','20000','21000','70','700','TERIMA','','admin',''),('PO20180630002','2018-06-30','0909','4000','4500','80','80','TERIMA','','admin',''),('PO20180630002','2018-06-30','0001','30000','31000','8','80','TERIMA','','admin',''),('PO20180630002','2018-06-30','0002','20000','21000','9','90','TERIMA','','admin',''),('PO20180630002','2018-06-30','989','10000','11000','7','42','TERIMA','','admin','');

/*Table structure for table `barang_gdg_titipan` */

DROP TABLE IF EXISTS `barang_gdg_titipan`;

CREATE TABLE `barang_gdg_titipan` (
  `tanggal` varchar(12) DEFAULT NULL,
  `id_barang` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `stts` enum('AKTIF','TIDAK') DEFAULT NULL,
  `usr_input` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_gdg_titipan` */

insert  into `barang_gdg_titipan`(`tanggal`,`id_barang`,`nama`,`satuan`,`supplier`,`stts`,`usr_input`) values ('2018-06-04','K003','KUE','29','ibu ibu',NULL,'admin'),('2018-06-04','K009','KUE2','29','ibu obu',NULL,'admin');

/*Table structure for table `barang_jual` */

DROP TABLE IF EXISTS `barang_jual`;

CREATE TABLE `barang_jual` (
  `no_jual` varchar(30) NOT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `id_barang` varchar(50) DEFAULT NULL,
  `harga_jual` varchar(20) DEFAULT NULL,
  `qty` varchar(6) DEFAULT NULL,
  `stts` enum('PROSES','SELESAI') DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `usr_input` varchar(10) DEFAULT NULL,
  `jenis` enum('gudang','pcs') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_jual` */

insert  into `barang_jual`(`no_jual`,`tanggal`,`id_barang`,`harga_jual`,`qty`,`stts`,`satuan`,`usr_input`,`jenis`) values ('KS20180630001','2018-06-30 05:31:28','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180630002','2018-06-30 05:44:48','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180630002','2018-06-30 05:45:01','0001','31000','1','SELESAI','dus','admin','gudang'),('KS20180630003','2018-06-30 06:02:01','0002','2300','1','SELESAI','plastik','admin','pcs'),('KS20180630004','2018-06-30 06:29:02','989','11000','1','SELESAI','dus','admin','gudang'),('KS20180630005','2018-06-30 06:30:01','989','2000','1','SELESAI','botol','admin','pcs'),('KS20180630006','2018-06-30 08:43:55','0909','4500','4','SELESAI','kaleng','admin','pcs'),('KS20180630007','2018-06-30 12:06:41','989','11000','5','SELESAI','dus','admin','gudang'),('KS20180630008','2018-06-30 17:10:12','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630008','2018-06-30 17:10:24','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630009','2018-06-30 17:21:40','8991002103238','1500','1','SELESAI','pcs','admin','pcs'),('KS20180630009','2018-06-30 17:22:09','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630009','2018-06-30 17:22:28','8992761136185','10000','1','SELESAI','botol','admin','pcs'),('KS20180630010','2018-06-30 17:30:15','8991906101019','140000','1','SELESAI','dus','admin','gudang'),('KS20180630010','2018-06-30 17:30:27','8991002103238','12000','1','SELESAI','plastik','admin','gudang'),('KS20180630010','2018-06-30 17:30:49','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630010','2018-06-30 17:30:54','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630010','2018-06-30 17:30:55','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630010','2018-06-30 17:30:56','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630011','2018-06-30 19:33:30','8991002103238','1500','1','SELESAI','pcs','admin','pcs'),('KS20180630011','2018-06-30 19:33:31','8991002103238','1500','1','SELESAI','pcs','admin','pcs'),('KS20180630011','2018-06-30 19:33:32','8991002103238','1500','1','SELESAI','pcs','admin','pcs'),('KS20180630011','2018-06-30 19:33:33','8991002103238','1500','1','SELESAI','pcs','admin','pcs'),('KS20180630011','2018-06-30 19:33:36','8991002103238','1500','1','SELESAI','pcs','admin','pcs'),('KS20180630011','2018-06-30 19:33:49','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180630012','2018-06-30 19:37:37','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180701001','2018-07-01 06:58:00','8998667100206','2300','1','SELESAI','strip','admin','gudang'),('KS20180701001','2018-07-01 06:58:31','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701002','2018-07-01 07:02:11','0001','3500','2','SELESAI','kaleng','admin','pcs'),('KS20180701002','2018-07-01 07:02:25','8999909096004','160000','1','SELESAI','Packs','admin','gudang'),('KS20180701003','2018-07-01 07:08:25','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180701003','2018-07-01 07:09:18','8998667100206','600','1','SELESAI','pcs','admin','pcs'),('KS20180701004','2018-07-01 07:12:04','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180701004','2018-07-01 07:12:08','0001','31000','1','SELESAI','dus','admin','gudang'),('KS20180701005','2018-07-01 07:12:50','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701005','2018-07-01 07:13:05','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701006','2018-07-01 12:49:13','0002','2300','7','SELESAI','plastik','admin','pcs'),('KS20180701006','2018-07-01 12:49:20','8991906101019','13500','8','SELESAI','Packs','admin','pcs'),('KS20180701006','2018-07-01 12:49:26','8992761136185','10000','8','SELESAI','botol','admin','pcs'),('KS20180701007','2018-07-01 12:55:17','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180701007','2018-07-01 12:55:21','0909','4500','1','SELESAI','kaleng','admin','pcs'),('KS20180701008','2018-07-01 12:58:24','989','2000','1','SELESAI','botol','admin','pcs'),('KS20180701008','2018-07-01 12:58:28','0002','2300','7','SELESAI','plastik','admin','pcs'),('KS20180701008','2018-07-01 12:58:33','8991002103238','1500','8','SELESAI','pcs','admin','pcs'),('KS20180701009','2018-07-01 13:00:14','0001','3500','7','SELESAI','kaleng','admin','pcs'),('KS20180701009','2018-07-01 13:00:18','0909','4500','9','SELESAI','kaleng','admin','pcs'),('KS20180701010','2018-07-01 13:03:05','0001','3500','8','SELESAI','kaleng','admin','pcs'),('KS20180701010','2018-07-01 13:03:09','0909','4500','9','SELESAI','kaleng','admin','pcs'),('KS20180701011','2018-07-01 16:59:07','8993989311699','20000','1','SELESAI','pcs','admin','pcs'),('KS20180701011','2018-07-01 16:59:20','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701011','2018-07-01 16:59:45','711844120440','11000','1','SELESAI','botol','admin','pcs'),('KS20180701011','2018-07-01 17:00:46','8996001600146','3000','1','SELESAI','botol','admin','pcs'),('KS20180701011','2018-07-01 17:01:00','089686010343','3000','1','SELESAI','pcs','admin','pcs'),('KS20180701011','2018-07-01 17:01:16','8991111112091','22500','1','SELESAI','pcs','admin','pcs'),('KS20180701011','2018-07-01 17:01:33','8992761136185','10000','1','SELESAI','botol','admin','pcs'),('KS20180701011','2018-07-01 17:02:17','089686060126','4000','1','SELESAI','pcs','admin','pcs'),('KS20180701012','2018-07-01 17:07:55','8991111112091','22500','1','SELESAI','pcs','admin','pcs'),('KS20180701012','2018-07-01 17:12:16','089686060126','4000','1','SELESAI','pcs','admin','pcs'),('KS20180701013','2018-07-01 17:19:24','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701013','2018-07-01 17:21:26','8991111112091','22500','1','SELESAI','pcs','admin','pcs'),('KS20180701013','2018-07-01 17:21:55','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701013','2018-07-01 19:44:42','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180701013','2018-07-01 19:44:57','8993989311699','20000','1','SELESAI','pcs','admin','pcs'),('KS20180702001','2018-07-02 07:01:52','8991111112091','22500','1','SELESAI','pcs','admin','pcs'),('KS20180702001','2018-07-02 07:01:52','8991111112091','22500','1','SELESAI','pcs','admin','pcs'),('KS20180702002','2018-07-02 07:04:36','8993989311699','20000','1','SELESAI','pcs','admin','pcs'),('KS20180702002','2018-07-02 07:04:41','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180702002','2018-07-02 07:04:46','089686060126','4000','1','SELESAI','pcs','admin','pcs'),('KS20180702003','2018-07-02 07:21:50','8999909096004','23000','1','SELESAI','box','admin','pcs'),('KS20180702003','2018-07-02 07:21:56','8993989311699','20000','1','SELESAI','pcs','admin','pcs'),('KS20180702003','2018-07-02 07:22:05','089686060126','4000','1','SELESAI','pcs','admin','pcs'),('KS20180702003','2018-07-02 07:22:14','8993989311699','20000','1','SELESAI','pcs','admin','pcs'),('KS20180702003','2018-07-02 07:22:20','089686060126','4000','1','SELESAI','pcs','admin','pcs'),('KS20180705001','2018-07-05 07:38:48','0001','3500','1','SELESAI','kaleng','kasir','pcs'),('KS20180705002','2018-07-05 10:15:42','0001','3500','1','SELESAI','kaleng','admin','pcs'),('KS20180705002','2018-07-05 10:16:11','0001','3500','9','SELESAI','kaleng','kasir','pcs');

/*Table structure for table `barang_titipan_datang` */

DROP TABLE IF EXISTS `barang_titipan_datang`;

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

/*Data for the table `barang_titipan_datang` */

insert  into `barang_titipan_datang`(`no_terima`,`tanggal`,`id_barang`,`harga_beli`,`harga_jual`,`qty`,`qty_return`,`stts`,`usr_input`) values ('TI20180604001','2018-06-04','K003','900','1000','2','8','SELESAI','admin'),('TI20180604001','2018-06-04','K009','900','1000','10','','SELESAI','admin');

/*Table structure for table `tab_dasar` */

DROP TABLE IF EXISTS `tab_dasar`;

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
  `satuan_komposisi` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_dasar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tab_dasar` */

/*Table structure for table `tab_karyawan` */

DROP TABLE IF EXISTS `tab_karyawan`;

CREATE TABLE `tab_karyawan` (
  `nik` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `alamat` longtext NOT NULL,
  `jk` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tem_lah` varchar(30) DEFAULT NULL,
  `tgl_lah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

/*Data for the table `tab_karyawan` */

insert  into `tab_karyawan`(`nik`,`nama`,`alamat`,`jk`,`phone`,`jabatan`,`tem_lah`,`tgl_lah`) values (60,'IBENK','administrator','LAKI-LAKI','1234567','dsfdf','sukabumi','16-05-2018'),(62,'BUDI','hJawa Tengah','LAKI-LAKI','021654','Surti','Jawa Tengah','05-01-2009'),(64,'KASIR','kasir','PEREMPUAN','0857','kasir','kasir','01-05-2018'),(66,'GUDANG','jakarta','LAKI-LAKI','0813','gudang','jakarta','12-04-1966');

/*Table structure for table `tab_kategori` */

DROP TABLE IF EXISTS `tab_kategori`;

CREATE TABLE `tab_kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` varchar(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `tab_kategori` */

insert  into `tab_kategori`(`id_kategori`,`nama`,`userinput`,`userupdate`,`tglinput`,`tglupdate`,`userdelete`,`tgldelete`,`stts`) values (30,'MAKANAN',60,0,'2018-05-03','','60','2018-06-28','NONAKTIF'),(31,'MINUMAN',60,0,'2018-05-03','',NULL,NULL,'AKTIF'),(32,'OBAT-OBATAN',60,60,'2018-05-03','2018-05-03',NULL,NULL,'AKTIF'),(33,'INDOMIE',60,0,'2018-05-03','',NULL,NULL,'AKTIF'),(34,'BERAS1',60,60,'2018-05-03','2018-05-03','60','2018-05-03','NONAKTIF'),(35,'BISKUIT',60,0,'2018-05-08','',NULL,NULL,'AKTIF'),(36,'DEWASA',60,0,'2018-06-30','',NULL,NULL,'AKTIF');

/*Table structure for table `tab_login` */

DROP TABLE IF EXISTS `tab_login`;

CREATE TABLE `tab_login` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_key` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nik` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `photo` longtext COLLATE latin1_general_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tab_login` */

insert  into `tab_login`(`user_id`,`user_name`,`user_key`,`nik`,`photo`) values (32,'admin','21232f297a57a5a743894a0e4a801fc3','60','d370482bbd723e53f95a37d55986d723.gif'),(36,'kasir','c7911af3adbd12a035b289556d96470a','62','ee68d57b6c2e48e7fa4e75abddfede49.jpg'),(37,'gudang','202446dd1d6028084426867365b0c7a1','66','6b9f9c39cd0161bb1bbf861f3af3c1fe.jpg');

/*Table structure for table `tab_menu` */

DROP TABLE IF EXISTS `tab_menu`;

CREATE TABLE `tab_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nama_lihat` varchar(30) DEFAULT NULL,
  `id_menu_master` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tab_menu` */

insert  into `tab_menu`(`id_menu`,`nama`,`nama_lihat`,`id_menu_master`) values (1,'dashboard','HOME',6),(2,'karyawan','KARYAWAN',1),(3,'user','USER',1),(4,'kategori','KATEGORI',1),(5,'satuan','SATUAN',1),(6,'supplier','SUPPLIER',1),(7,'barang_gdg','DATA BARANG',2),(8,'barang_etls','KASIR',3),(12,'laporan','LAPORAN',4),(13,'setting','SETTING',5),(14,'pesan','KEDATANGAN BARANG',2),(15,'barang_gdg/stk','STOCK',2);

/*Table structure for table `tab_menu_master` */

DROP TABLE IF EXISTS `tab_menu_master`;

CREATE TABLE `tab_menu_master` (
  `id_menu_master` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu_master`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tab_menu_master` */

insert  into `tab_menu_master`(`id_menu_master`,`nama`) values (1,'MASTER'),(2,'BARANG'),(3,'KASIR'),(4,'LAPORAN'),(5,'SETTING'),(6,'HOME');

/*Table structure for table `tab_pemasok` */

DROP TABLE IF EXISTS `tab_pemasok`;

CREATE TABLE `tab_pemasok` (
  `id_pemasok` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL,
  `alamat` longtext,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pemasok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tab_pemasok` */

/*Table structure for table `tab_pemasok_detail` */

DROP TABLE IF EXISTS `tab_pemasok_detail`;

CREATE TABLE `tab_pemasok_detail` (
  `id_pemasok` int(11) NOT NULL,
  `id_pemasok_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_dasar` varchar(12) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL,
  PRIMARY KEY (`id_pemasok_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tab_pemasok_detail` */

/*Table structure for table `tab_satuan` */

DROP TABLE IF EXISTS `tab_satuan`;

CREATE TABLE `tab_satuan` (
  `id_satuan` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `userinput` int(11) DEFAULT NULL,
  `userupdate` int(11) DEFAULT NULL,
  `tglinput` varchar(10) DEFAULT NULL,
  `tglupdate` varchar(10) DEFAULT NULL,
  `userdelete` int(11) DEFAULT NULL,
  `tgldelete` varchar(10) DEFAULT NULL,
  `stts` enum('AKTIF','NONAKTIF') DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `tab_satuan` */

insert  into `tab_satuan`(`id_satuan`,`nama`,`userinput`,`userupdate`,`tglinput`,`tglupdate`,`userdelete`,`tgldelete`,`stts`) values (27,'kaleng',60,60,'2018-05-03','2018-05-03',NULL,NULL,'AKTIF'),(28,'dus',60,60,'2018-05-03','2018-05-03',NULL,NULL,'AKTIF'),(29,'pcs',60,0,'2018-05-03','',NULL,NULL,'AKTIF'),(30,'botol',60,0,'2018-05-03','',60,'2018-05-03','AKTIF'),(31,'Liter',60,60,'2018-05-07','2018-05-07',NULL,NULL,'AKTIF'),(32,'Packs',60,0,'2018-05-08','',60,'2018-05-08','NONAKTIF'),(33,'box',60,0,'2018-05-08','',60,'2018-06-28','AKTIF'),(34,'strip',60,0,'2018-05-08','',NULL,NULL,'AKTIF'),(35,'plastik',60,0,'2018-06-29','',NULL,NULL,'AKTIF'),(36,'renceng',60,0,'2018-06-30','',NULL,NULL,'AKTIF');

/*Table structure for table `tab_supplier` */

DROP TABLE IF EXISTS `tab_supplier`;

CREATE TABLE `tab_supplier` (
  `id_supplier` int(2) NOT NULL AUTO_INCREMENT,
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
  `alamat` longtext,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tab_supplier` */

insert  into `tab_supplier`(`id_supplier`,`id_kategori`,`nama`,`sales`,`userinput`,`userupdate`,`tglinput`,`tglupdate`,`userdelete`,`tgldelete`,`stts`,`alamat`,`phone`,`email`) values (13,30,'PT SUMBER SUKSES ','TEST',NULL,NULL,NULL,NULL,NULL,NULL,'AKTIF','jakarta','025664456','test@gmail.com'),(14,32,'PT MAJU KENA','JUARA 1',NULL,NULL,NULL,NULL,NULL,NULL,'AKTIF','sukabumi 1','0857','maju@dev.com'),(16,32,'PT KESANA KEMARI','OTIS',NULL,NULL,NULL,NULL,NULL,NULL,'AKTIF','jakarta','087','otis@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
