/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 10.4.14-MariaDB : Database - aa_simpanan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `nasabahs` */

DROP TABLE IF EXISTS `nasabahs`;

CREATE TABLE `nasabahs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `foto_nasabah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `nasabahs` */

/*Table structure for table `trx_bungas` */

DROP TABLE IF EXISTS `trx_bungas`;

CREATE TABLE `trx_bungas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `nominal_bunga` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `nasabah_id` (`nasabah_id`),
  CONSTRAINT `trx_bungas_ibfk_1` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabahs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_bungas` */

/*Table structure for table `trx_simpanan` */

DROP TABLE IF EXISTS `trx_simpanan`;

CREATE TABLE `trx_simpanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `jenis_trx` enum('Simpanan','Penarikan','Koreksi') NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `nominal_trx` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `nasabah_id` (`nasabah_id`),
  CONSTRAINT `trx_simpanan_ibfk_1` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabahs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_simpanan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
