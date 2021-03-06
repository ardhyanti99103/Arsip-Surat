/*
SQLyog Professional
MySQL - 10.1.38-MariaDB : Database - db_arsip2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_arsip2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_arsip2`;

/*Table structure for table `arsip_surat` */

DROP TABLE IF EXISTS `arsip_surat`;

CREATE TABLE `arsip_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `arsip_surat` */

insert  into `arsip_surat`(`id`,`no_surat`,`id_kategori`,`judul`,`file`,`tanggal`) values 
(21,'1212022/pengumuman/XII',2,'Pengumuman bantuan sosial','506191405_Pengumuman Bantuan BST.pdf','2021-11-23'),
(22,'321/Undangan/IV',1,'Undangan rapat desa','1776841237_Pengumuman Bantuan BST.pdf','2021-11-24'),
(23,'4279/Nota Dinas/XII',3,'Arsip Nota Dinas','242910663_Pengumuman Bantuan BST.pdf','2021-11-24');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama`) values 
(1,'Undangan'),
(2,'Pengumuman'),
(3,'Nota Dinas'),
(4,'Pemberitahuan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
