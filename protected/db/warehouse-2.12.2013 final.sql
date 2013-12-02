/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.34-0ubuntu0.12.04.1 : Database - warehouse
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`warehouse` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `warehouse`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`image_url`,`date_create`,`date_update`,`user_id`) values (1,'klimi','opis za kategorija klimi','url','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(2,'peralni','opis za kategorijata peralni','url2','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(3,'frizideri','opis za kategorijata frizideri','url3','0000-00-00 00:00:00','0000-00-00 00:00:00',1);

/*Table structure for table `category_product` */

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `category_product` */

insert  into `category_product`(`id`,`category_id`,`product_id`) values (1,1,3),(2,2,3);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `amount` float NOT NULL,
  `measurement` varchar(50) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_out` datetime DEFAULT NULL,
  `date_in` datetime DEFAULT NULL,
  `order_from` varchar(100) DEFAULT NULL,
  `order_phone` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `instock` tinyint(1) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`id`,`name`,`code`,`purchase_price`,`sell_price`,`amount`,`measurement`,`date_create`,`date_update`,`date_out`,`date_in`,`order_from`,`order_phone`,`image_url`,`instock`,`user_id`) values (1,'freon-112','123',120,150,5,'l','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','Tehnik servis','070 789 789','url12',0,1),(2,'freon-113','122',150,200,5,'l','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','Tehnomarket','070 252 252','url3',0,1),(3,'guma za peralna gorenje 15','111',500,600,10,'br','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','Tehnik servis','070 789 789','url22',1,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`firstname`,`email`,`username`,`password`) values (1,'slavica','slavica90@gmail.com','slavica90','2fd655d2e5a8b7c5845a9f6e91d75a52de2c2f39'),(2,'bojan','bojan123@yahoo.com','bojan','49c765a9dc9c3a3fc40ec8afed40167d3d9cf0d5'),(3,'kostadinova','slavica_kostadinova@yahoo.com','slavica','7c4a8d09ca3762af61e59520943dc26494f8941b'),(4,'ivana','ivana@yahoo.com','ivana','2fd655d2e5a8b7c5845a9f6e91d75a52de2c2f39'),(5,'igor','igor@gmail.com','igorigor','49c765a9dc9c3a3fc40ec8afed40167d3d9cf0d5');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
