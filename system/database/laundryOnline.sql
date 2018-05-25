/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.29-MariaDB : Database - laundry
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laundry` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `laundry`;

/*Table structure for table `detail_transaksi` */

DROP TABLE IF EXISTS `detail_transaksi`;

CREATE TABLE `detail_transaksi` (
  `id_det_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_jenis_pakaian` int(11) NOT NULL,
  `jml_pakaian` int(11) DEFAULT NULL,
  `harga_det` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_trans`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_jenis` (`id_jenis_pakaian`),
  CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`),
  CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_jenis_pakaian`) REFERENCES `jenis_pakaian` (`id_jenis_pakaian`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `detail_transaksi` */

insert  into `detail_transaksi`(`id_det_trans`,`id_transaksi`,`id_jenis_pakaian`,`jml_pakaian`,`harga_det`) values 
(73,80,2,1,1100),
(74,80,3,2,3000),
(75,80,4,3,15000);

/*Table structure for table `jenis_pakaian` */

DROP TABLE IF EXISTS `jenis_pakaian`;

CREATE TABLE `jenis_pakaian` (
  `id_jenis_pakaian` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `harga` int(5) NOT NULL,
  PRIMARY KEY (`id_jenis_pakaian`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_pakaian` */

insert  into `jenis_pakaian`(`id_jenis_pakaian`,`nama`,`harga`) values 
(1,'kiloan',8000),
(2,'T-Shirt',1100),
(3,'Shirt',1500),
(4,'Jaket',5000),
(5,'Jaket Kulit',6000),
(6,'Jaket Jeans',5500),
(7,'Celana Pendek Kain',1000),
(8,'Celana Pendek Jeans',1500),
(9,'Celana Panjang Kain',1500),
(10,'Celana Panjang Jeans',2000),
(11,'Handuk Mandi Kecil',6000),
(12,'Handuk Mandi Besar',8000),
(13,'Rok',1500),
(14,'Singlet',1000),
(15,'Celana Dalam',50000);

/*Table structure for table `kabupaten` */

DROP TABLE IF EXISTS `kabupaten`;

CREATE TABLE `kabupaten` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `id_propinsi` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_propinsi` (`id_propinsi`),
  CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_propinsi`) REFERENCES `propinsi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `kabupaten` */

insert  into `kabupaten`(`id`,`nama`,`id_propinsi`) values 
(18,'Denpasar',2),
(19,'Klungkung',2),
(20,'Karangasem',2),
(21,'Singaraja',2),
(22,'Tabanan',2),
(23,'Negara',2),
(24,'Bangli',2);

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `id_kabupaten` int(10) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status_member` enum('Premium','Biasa') DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cookie` varchar(100) DEFAULT NULL,
  `status_login` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kabupaten` (`id_kabupaten`),
  CONSTRAINT `member_ibfk_2` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `member` */

insert  into `member`(`id`,`nama`,`no_telp`,`email`,`alamat`,`id_kabupaten`,`jenis_kelamin`,`create_at`,`tgl_lahir`,`status_member`,`username`,`password`,`cookie`,`status_login`) values 
(32,'I Kadek Owen','086367363716','owen.nirvana98@gmail.com','Jln. Gong Suling',20,'Laki-Laki','2018-05-24','1998-08-14','Premium','owen','202cb962ac59075b964b07152d234b70','False',NULL),
(33,'Praba Hridayami','039383737173','prabahridayami97@gmail.com','Jln Sedap Malam',18,'Perempuan','2018-05-24','2018-04-29','Biasa','baba','81dc9bdb52d04dc20036dbd8313ed055','LP0j2HgZyDWcM1oqLkf1ThlHp7aA4RzEghq4cuQ9UsyVP03XFbuVix97QpfeoK8r','true');

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id_paket` int(10) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(20) NOT NULL,
  `durasi/hari` int(3) NOT NULL,
  `harga_paket` int(5) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

insert  into `paket`(`id_paket`,`nama_paket`,`durasi/hari`,`harga_paket`) values 
(1,'6 Jam',6,15000),
(2,'Kilat',24,10000),
(3,'Wajar',48,5000);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `create_at` date NOT NULL,
  `id_kabupaten` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `jabatan` enum('admin','driver') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_loginPegawai` (`username`),
  KEY `id_kabupaten` (`id_kabupaten`),
  CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id`,`nama`,`no_telp`,`alamat`,`tgl_lahir`,`jenis_kelamin`,`create_at`,`id_kabupaten`,`username`,`password`,`jabatan`) values 
(8,'Owen Nirvana','085829706523','Jln. Gong Suling','1998-08-14','Laki-Laki','2018-05-25',20,'owen','driver','driver'),
(9,'Praba Hridayami','0837369463','Jln. Sedap Malam','2009-01-25','Perempuan','2018-05-25',18,'baba','admin','admin'),
(10,'Bayu Bahari','087363536876','Jln. Mahajaya','2000-02-01','Laki-Laki','2018-05-25',24,'bayu','admin','admin'),
(12,'Risky Krisna','083738376261','Jln. Udayana','1980-02-13','Laki-Laki','2018-05-25',22,'risky','driver','driver'),
(13,'Tita','087637645876','Jln. Bamamama','2010-04-02','Perempuan','2018-05-25',21,'tita','admin','admin');

/*Table structure for table `propinsi` */

DROP TABLE IF EXISTS `propinsi`;

CREATE TABLE `propinsi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `propinsi` */

insert  into `propinsi`(`id`,`nama`) values 
(2,'Bali'),
(3,'Jawa Timur'),
(4,'Jawa Tengah'),
(5,'Jawa Barat'),
(6,'Jakarta'),
(7,'Nusa Tenggara Barat'),
(8,'Nusa Tenggara Timur');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `status` enum('Not Checked','Proses','Selesai','Diantar','Sampai','Cancel') DEFAULT NULL,
  `berat_pakaian` int(10) DEFAULT NULL,
  `total_biaya` int(7) DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas','Cancel') DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status_login` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_paket` (`id_paket`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`),
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`),
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_member`,`id_paket`,`tgl_transaksi`,`id_pegawai`,`status`,`berat_pakaian`,`total_biaya`,`status_pembayaran`,`image`,`status_login`) values 
(79,33,2,'2018-05-26',8,'Not Checked',1,16000,'Belum Lunas',NULL,NULL),
(80,33,1,'2018-05-26',8,'Proses',0,34100,'Lunas','80.jpg',NULL),
(81,33,2,'2018-05-25',8,'Sampai',3,28000,'Lunas','81.jpg',NULL);

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `Cancel` */

/*!50106 DROP EVENT IF EXISTS `Cancel`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `Cancel` ON SCHEDULE EVERY 1 SECOND STARTS '2018-05-24 15:41:45' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    call Cancel();
END */$$
DELIMITER ;

/* Procedure structure for procedure `Cancel` */

/*!50003 DROP PROCEDURE IF EXISTS  `Cancel` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Cancel`()
BEGIN
	UPDATE transaksi
	SET transaksi.`status_pembayaran`='Cancel'
	WHERE transaksi.`status_pembayaran`='Belum Lunas' AND NOW()>transaksi.`tgl_transaksi`;	
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
