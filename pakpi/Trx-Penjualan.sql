/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 10.4.14-MariaDB : Database - aa_toko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` enum('Kilogram','Ons','Buah','Kotak','Kaleng') NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier` enum('PT. Indah Sejahtera','PT. Sukses Berusaha','CV. Untung Terus') NOT NULL,
  `harga_jual` double NOT NULL,
  `foto_barang` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barangs` */

/*Table structure for table `trx_penjualan_details` */

DROP TABLE IF EXISTS `trx_penjualan_details`;

CREATE TABLE `trx_penjualan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trx_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_jual` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `trx_id` (`trx_id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `trx_penjualan_details_ibfk_1` FOREIGN KEY (`trx_id`) REFERENCES `trx_penjualans` (`id`),
  CONSTRAINT `trx_penjualan_details_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_penjualan_details` */

/*Table structure for table `trx_penjualans` */

DROP TABLE IF EXISTS `trx_penjualans`;

CREATE TABLE `trx_penjualans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_nota` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `total_pembelian` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx_penjualans` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
