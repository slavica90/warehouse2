/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.6.12-log : Database - warehouse
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`warehouse` /*!40100 DEFAULT CHARACTER SET utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`image_url`,`date_create`,`date_update`,`user_id`) values (11,'Перални','Категорија за перални и делови за перални','washing-machine.jpg','2014-02-18 14:53:10','2014-02-25 15:41:25',3),(12,'Фрижидери','Категорија за фрижидери','fridge.jpg','2014-02-18 14:53:42','2014-02-25 15:43:25',3),(13,'Клима уреди','Категорија за клима уреди','Samsung-Split-Air-Conditioner.jpg','2014-02-18 14:54:08','2014-02-25 15:45:13',3),(14,'Машини за садови','Ова е категрија во која ќе има машини за садови','dishwasher.jpg','2014-02-24 14:54:48','2014-02-25 15:45:47',3);

/*Table structure for table `category_product` */

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `category_product` */

insert  into `category_product`(`id`,`category_id`,`product_id`) values (27,12,14),(28,11,15),(29,11,17),(30,11,18),(31,11,19),(32,11,20),(33,11,21),(34,11,22),(35,12,22),(42,12,23),(43,13,23),(44,11,13);

/*Table structure for table `firma` */

DROP TABLE IF EXISTS `firma`;

CREATE TABLE `firma` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `firma` */

insert  into `firma`(`id`,`name`,`address`,`phone_number`,`lat`,`lng`) values (1,'Горење Сервис','Партизански Одреди','078 990 987',NULL,NULL);

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
  `date_out` date DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `instock` tinyint(1) NOT NULL,
  `user_id` int(10) NOT NULL,
  `firma_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`name`,`code`,`purchase_price`,`sell_price`,`amount`,`measurement`,`date_create`,`date_update`,`date_out`,`date_in`,`image_url`,`instock`,`user_id`,`firma_id`) values (13,'Црево за перална','1234',100,150,9,'br','2014-02-18 14:56:44','2014-02-24 15:39:03','2014-02-22','2014-02-18','C:/wamp/www/warehouse/images/upload/productphotos/1392823950',1,3,1),(14,'Фреон Р600','1233',1200,1500,10,'l','2014-02-18 14:59:42','2014-02-18 16:16:03','2014-02-18','2014-02-22','C:/wamp/www/warehouse/images/upload/productphotos/',1,3,0),(15,'Врата за перална','3456',600,800,5,'br','2014-02-18 16:07:34','2014-02-19 15:49:20','2014-02-19','2014-02-26','C:/wamp/www/warehouse/images/upload/productphotos/',1,3,0),(16,'Програматор','12345',2340,4000,5,'br','2014-02-19 15:51:50','2014-02-19 15:51:50','2014-02-20','2014-02-20','C:/wamp/www/warehouse/images/upload/productphotos/',1,3,0),(17,'Програматор за горење','12345',600,800,5,'br','2014-02-19 15:58:30','2014-02-19 15:58:30','2014-02-20','2014-02-28','C:/wamp/www/warehouse/images/upload/productphotos/',1,3,0),(18,'Програматор за беко','BeKo',1500,4000,10,'br','2014-02-19 16:08:42','2014-02-19 16:08:42','2014-02-20','2014-02-21','C:/wamp/www/warehouse/images/upload/productphotos/',1,3,0),(19,'Програматор за зануси','ZNSII',1500,3000,10,'br','2014-02-19 16:14:05','2014-02-20 17:26:28','2014-02-20','2014-02-28','Desert.jpg',1,3,0),(20,'Филтер за горење','FLT111',150,400,15,'br','2014-02-20 17:31:09','2014-02-20 17:31:09','2014-02-21','2014-02-28','Desert.jpg',1,3,0),(21,'Филтер за беко','FLTBKO',300,600,10,'br','2014-02-21 14:31:32','2014-02-21 14:31:32','2014-02-22','2014-02-28','Jellyfish.jpg',1,3,0),(22,'Програматор за перална','PRG123',500,700,25,'br','2014-02-21 14:33:55','2014-02-21 15:11:43','2014-02-22','2014-02-27','Chrysanthemum.jpg',1,3,0),(23,'Фреон Р610','FR1123',1240,3000,10,'l','2014-02-21 15:13:07','2014-02-21 15:59:40','2014-02-22','2014-02-27','Jellyfish.jpg',1,3,0);

/*Table structure for table `sale` */

DROP TABLE IF EXISTS `sale`;

CREATE TABLE `sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_create` datetime NOT NULL,
  `sold_products` int(11) NOT NULL,
  `comment` text,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sale` */

insert  into `sale`(`id`,`date_create`,`sold_products`,`comment`,`product_id`) values (1,'0000-00-00 00:00:00',5,'asdsdf',1);

/*Table structure for table `supply` */

DROP TABLE IF EXISTS `supply`;

CREATE TABLE `supply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_create` date NOT NULL,
  `bought_products` int(11) NOT NULL,
  `comment` text,
  `product_id` int(11) NOT NULL,
  `firma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `supply` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`firstname`,`email`,`username`,`password`) values (1,'slavica','slavica90@gmail.com','slavica90','2fd655d2e5a8b7c5845a9f6e91d75a52de2c2f39'),(2,'bojan','bojan123@yahoo.com','bojan','7c4a8d09ca3762af61e59520943dc26494f8941b'),(3,'kostadinova','slavica_kostadinova@yahoo.com','slavica','7c4a8d09ca3762af61e59520943dc26494f8941b'),(4,'ivana','ivana@yahoo.com','ivana','7c4a8d09ca3762af61e59520943dc26494f8941b'),(5,'igor','igor@gmail.com','igorigor','7c4a8d09ca3762af61e59520943dc26494f8941b');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
