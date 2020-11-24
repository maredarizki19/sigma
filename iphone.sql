/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.38-MariaDB : Database - iphone
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iphone` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `iphone`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `kd_barang` char(4) NOT NULL,
  `kd_kategori` char(3) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

/*Table structure for table `detail_pesan` */

DROP TABLE IF EXISTS `detail_pesan`;

CREATE TABLE `detail_pesan` (
  `kd_pesan` char(9) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_pesan` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `kd_pelanggan` char(8) NOT NULL,
  `nm_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`kd_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pelanggan` */

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `kd_pengguna` varchar(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kd_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengguna` */

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `kd_pesan` char(9) NOT NULL,
  `kd_pelanggan` char(8) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `total` double NOT NULL,
  `bayar` double NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_pesan` varchar(25) NOT NULL,
  `status_kirim` varchar(25) NOT NULL,
  `status_bayar` varchar(25) NOT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesan` */

/*Table structure for table `retur` */

DROP TABLE IF EXISTS `retur`;

CREATE TABLE `retur` (
  `kd_pesan` char(9) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `alasan` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `retur` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
