/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.37-MariaDB : Database - dieumi_api
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2014_10_12_000000_create_users_table',1);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`provider`,`provider_id`,`gmail_id`,`remember_token`,`created_at`,`updated_at`) values (5,'My Trương','dieumipo@gmail.com','ya29.GltrByld4RVqpmgGJk9h9o4YFsJnR-eNCe8Fg3Hmt2IVEDhHnTqZjRXmWCGYZZY5AcyGMdEuZHltv1JUMg4a7hqRcDWgbt4qzXGtn8D6bygbbPy7yqI4wfoHmooO',NULL,NULL,'109401603813997126137','AkFcCGNJDICcdV1rJHUTpXPcV3dapwQu5aiMT3oeg7kaBp4i42D71KNlx1jt','2019-08-21 04:14:17','2019-08-21 04:14:17'),(6,'DieuMy Truong','mimi@gmail.com','EAAIcUpSzpJYBAIW46V7NNPZAaQrrqjHYPhKAMZArZCI8Imo3LbLko5LDxK2l6Hq8sfVZAAQwTxO5tZBMexB89wnWB15I1wZA6oFyPflMStQskhE2dmIRzb68HqjJNJVCVuZAuIcbPny7jrpBFtpR0ARFxV7Fak9lx9d710q6TxgskGyb9nnXOwbdBtN9N2WkCMZD','100208391354053','100208391354053',NULL,'J9fpFEtnxoeKjjuRjWZw6AoQdmi3h7iTOZXaJ8TnVncmN73viddFRnjWGFvi','2019-08-21 04:14:49','2019-08-21 04:14:49'),(7,'hoai nam','hoainam@gmail.com','',NULL,NULL,NULL,NULL,NULL,NULL),(8,'linh chân','linhchan@gamil.com','',NULL,NULL,NULL,NULL,NULL,NULL),(9,'hoài phong','phong@gmail.com','',NULL,NULL,NULL,NULL,NULL,NULL),(10,'ngọc phú','phú@gmail.com','',NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
