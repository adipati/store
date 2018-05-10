# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: inventory
# Generation Time: 2018-05-10 11:00:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table distributors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `distributors`;

CREATE TABLE `distributors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `point` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `distributors` WRITE;
/*!40000 ALTER TABLE `distributors` DISABLE KEYS */;

INSERT INTO `distributors` (`id`, `name`, `email`, `phone`, `city`, `status`, `point`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'New Pallapa','tes@tes.com','08111111111','Yogyakarta',1,NULL,'2018-05-08 15:10:03','2018-05-08 15:11:56',NULL),
	(2,'Monata','monata@mail.com','08123123123','Wakanda City',1,NULL,'2018-05-08 15:24:32','2018-05-08 15:24:32',NULL);

/*!40000 ALTER TABLE `distributors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,1,2200,3,'2018-05-10 07:59:37','2018-05-10 07:59:37',NULL),
	(2,2,2,2500,3,'2018-05-10 08:04:34','2018-05-10 08:04:34',NULL),
	(3,2,1,2200,5,'2018-05-10 08:04:34','2018-05-10 08:04:34',NULL),
	(4,3,1,2200,4,'2018-05-10 10:33:23','2018-05-10 10:33:23',NULL),
	(5,3,2,2500,20,'2018-05-10 10:33:23','2018-05-10 10:33:23',NULL);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sku` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` varchar(11) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,12345,'Sarimi','2200','Ayam Bawang','2018-05-08 15:13:20','2018-05-08 15:13:20',NULL),
	(2,54321,'Indomie','2500','Mi Goreng','2018-05-09 17:56:18','2018-05-09 17:56:18',NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;

INSERT INTO `transactions` (`id`, `distributor_id`, `date`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'2018-05-02','2018-05-10 07:59:37','2018-05-10 07:59:37',NULL),
	(2,2,'2018-05-05','2018-05-10 08:04:34','2018-05-10 08:04:34',NULL),
	(3,2,'2018-05-10','2018-05-10 10:33:23','2018-05-10 10:33:23',NULL);

/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remember_token` char(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `name`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin@mail.com','$2y$10$6ZTg5WxRejnh0klAbFXlHOReWj8vHth73Qp1Q3obUnD0j1970gUYW','Admin','4JmMTNIb43Cjvb0mtqQgCU4nYgdroCZd9Sd6h1hDfjT7zqKVp8mREfka9kuA','2018-04-08 15:30:28','2018-04-08 15:30:28');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
