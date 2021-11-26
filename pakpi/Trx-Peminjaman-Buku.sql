/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 10.4.14-MariaDB : Database - aa_perpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `bukus` */

DROP TABLE IF EXISTS `bukus`;

CREATE TABLE `bukus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `penerbit` enum('Tiga Serangkai','Balai Pustaka') NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `kondisi` enum('Baik','Sedang','Rusak') NOT NULL,
  `status` enum('Bebas','Terpinjam') NOT NULL,
  `foto_sampul` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bukus` */

/*Table structure for table `peminjams` */

DROP TABLE IF EXISTS `peminjams`;

CREATE TABLE `peminjams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `peminjams` */

/*Table structure for table `trx_pinjaman_details` */

DROP TABLE IF EXISTS `trx_pinjaman_details`;

CREATE TABLE `trx_pinjaman_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trx_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `status` enum('Masih dipinjamn','Sudah kembali') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `trx_id` (`trx_id`),
  KEY `buku_id` (`buku_id`),
  CONSTRAINT `trx_pinjaman_details_ibfk_1` FOREIGN KEY (`trx_id`) REFERENCES `trx_pinjamans` (`id`),
  CONSTRAINT `trx_pinjaman_details_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_pinjaman_details` */

/*Table structure for table `trx_pinjamans` */

DROP TABLE IF EXISTS `trx_pinjamans`;

CREATE TABLE `trx_pinjamans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peminjam_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `peminjam_id` (`peminjam_id`),
  CONSTRAINT `trx_pinjamans_ibfk_1` FOREIGN KEY (`peminjam_id`) REFERENCES `peminjams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_pinjamans` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
