/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - reservasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reservasi` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `reservasi`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `user_admin` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`idadmin`,`email`,`name`,`user_admin`,`password`) values 
(1,'imi@gmail.com','imi','imi','imi'),
(2,'admin@gmail.com','admin',NULL,'$2y$10$j0taCVRcSIepxLbY31Yps.ute17SNsGbQuqxtCJO7k1fsgEGjkkRi');

/*Table structure for table `paket_wisata` */

DROP TABLE IF EXISTS `paket_wisata`;

CREATE TABLE `paket_wisata` (
  `idpaket_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(45) NOT NULL,
  `destinasi_wisata` varchar(45) NOT NULL,
  `durasi_wisata` varchar(45) NOT NULL,
  `kategori_wisata` varchar(45) NOT NULL,
  `harga` varchar(45) NOT NULL,
  PRIMARY KEY (`idpaket_wisata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `paket_wisata` */

/*Table structure for table `reservasi` */

DROP TABLE IF EXISTS `reservasi`;

CREATE TABLE `reservasi` (
  `idreservasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(45) DEFAULT NULL,
  `jumlah_orang` varchar(45) DEFAULT NULL,
  `paket_wisata_idpaket_wisata` int(11) NOT NULL,
  PRIMARY KEY (`idreservasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reservasi` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transaksi` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_telp` varchar(12) DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `wisata_idwisata` int(11) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`iduser`,`name`,`email`,`alamat`,`nomor_telp`,`jenis_kelamin`,`username`,`password`,`wisata_idwisata`) values 
(1,'imi','imi@gmail.com','imi','imi','imi','imi','imi',0),
(3,'imi baru','yusuf@gmail.com','Paras Banjarejo',NULL,'Laki-laki','imi','$2y$10$.EMxd0w79uGaTavL4g0uyOa/llJgDN/EbvIlbeSdHCjXYDb307vVC',NULL),
(4,'asiap santuy','asa@gmail.com','paras',NULL,'Laki-laki','admin@gmail.com','admin123',NULL);

/*Table structure for table `wisata` */

DROP TABLE IF EXISTS `wisata`;

CREATE TABLE `wisata` (
  `idwisata` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_wisata` varchar(45) NOT NULL,
  `nama_wisata` varchar(45) NOT NULL,
  `alamat_wisata` varchar(255) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`idwisata`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `wisata` */

insert  into `wisata`(`idwisata`,`jenis_wisata`,`nama_wisata`,`alamat_wisata`,`harga`) values 
(2,'sumber','jiput','kediri',2500);

/*Table structure for table `wisata_favorit` */

DROP TABLE IF EXISTS `wisata_favorit`;

CREATE TABLE `wisata_favorit` (
  `idwisata_favorit` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_like` int(11) NOT NULL,
  `nama_wisata` varchar(45) NOT NULL,
  `wisata_idwisata` int(11) NOT NULL,
  PRIMARY KEY (`idwisata_favorit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `wisata_favorit` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
