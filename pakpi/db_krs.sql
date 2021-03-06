/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.33 : Database - db_prognet_krs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `mahasiswas` */

DROP TABLE IF EXISTS `mahasiswas`;

CREATE TABLE `mahasiswas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `program_studi` enum('Teknologi Informasi','Teknik Mesin','Teknik Sipil','Teknik Arsitektur') NOT NULL,
  `angkatan` year(4) NOT NULL,
  `foto_mahasiswa` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mahasiswas` */

insert  into `mahasiswas`(`id`,`nim`,`nama`,`alamat`,`telepon`,`email`,`password`,`program_studi`,`angkatan`,`foto_mahasiswa`,`created_at`,`updated_at`) values 
(1,'1905551029','Lidya Yanti','Moahino, Sulawesi','081246082357','lidyayanti2511@gmail.com','$2y$10$.LfOru5Yi19FSS.qQzGaNO4fwA2bya6ZaCS4rqD.qUs94jy7WNk52','Teknologi Informasi',2019,'default.jpg','2021-11-29 15:11:23','2021-11-29 15:11:30');

/*Table structure for table `matakuliahs` */

DROP TABLE IF EXISTS `matakuliahs`;

CREATE TABLE `matakuliahs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `prodi` enum('Teknologi Informasi','Teknik Mesin','Teknik Sipil','Teknik Arsitektur') DEFAULT NULL,
  `status_mk` enum('Wajib','Pilihan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `matakuliahs` */

/*Table structure for table `trx_krss` */

DROP TABLE IF EXISTS `trx_krss`;

CREATE TABLE `trx_krss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` year(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `nilai` enum('Tunda','A','B','C','D','E') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  KEY `matakuliah_id` (`matakuliah_id`),
  CONSTRAINT `trx_krss_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`),
  CONSTRAINT `trx_krss_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliahs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_krss` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
