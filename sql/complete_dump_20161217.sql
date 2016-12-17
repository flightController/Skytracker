# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16-0ubuntu0.16.04.1)
# Datenbank: skytracker
# Erstellt am: 2016-12-17 13:23:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle data_rows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`)
VALUES
	(1,1,'id','PRI','ID',1,0,1,1,0,1,''),
	(2,1,'author_id','text','Author',1,0,1,1,0,1,''),
	(3,1,'title','text','Title',1,1,1,1,1,1,''),
	(4,1,'excerpt','text_area','excerpt',1,0,1,1,1,1,''),
	(5,1,'body','rich_text_box','Body',1,0,1,1,1,1,''),
	(6,1,'image','image','Post Image',0,1,1,1,1,1,'{\n\"resize\": {\n\"width\": \"1000\",\n\"height\": \"null\"\n},\n\"quality\": \"70%\",\n\"upsize\": true,\n\"thumbnails\": [\n{\n\"name\": \"medium\",\n\"scale\": \"50%\"\n},\n{\n\"name\": \"small\",\n\"scale\": \"25%\"\n},\n{\n\"name\": \"cropped\",\n\"crop\": {\n\"width\": \"300\",\n\"height\": \"250\"\n}\n}\n]\n}'),
	(7,1,'slug','text','slug',1,0,1,1,1,1,''),
	(8,1,'meta_description','text_area','meta_description',1,0,1,1,1,1,''),
	(9,1,'meta_keywords','text_area','meta_keywords',1,0,1,1,1,1,''),
	(10,1,'status','select_dropdown','status',1,1,1,1,1,1,'{\n\"default\": \"DRAFT\",\n\"options\": {\n\"PUBLISHED\": \"published\",\n\"DRAFT\": \"draft\",\n\"PENDING\": \"pending\"\n}\n}'),
	(11,1,'created_at','timestamp','created_at',0,1,1,1,0,1,''),
	(12,1,'updated_at','timestamp','updated_at',0,0,1,1,0,1,''),
	(13,2,'id','PRI','id',1,0,0,0,0,0,''),
	(14,2,'author_id','text','author_id',1,0,0,0,0,0,''),
	(15,2,'title','text','title',1,1,1,1,1,1,''),
	(16,2,'excerpt','text_area','excerpt',1,0,1,1,1,1,''),
	(17,2,'body','rich_text_box','body',1,0,1,1,1,1,''),
	(18,2,'slug','text','slug',1,0,1,1,1,1,''),
	(19,2,'meta_description','text','meta_description',1,0,1,1,1,1,''),
	(20,2,'meta_keywords','text','meta_keywords',1,0,1,1,1,1,''),
	(21,2,'status','select_dropdown','status',1,1,1,1,1,1,'{\n\"default\": \"INACTIVE\",\n\"options\": {\n\"INACTIVE\": \"INACTIVE\",\n\"ACTIVE\": \"ACTIVE\"\n}\n}'),
	(22,2,'created_at','timestamp','created_at',1,1,1,1,0,1,''),
	(23,2,'updated_at','timestamp','updated_at',1,0,0,0,0,0,''),
	(24,2,'image','image','image',0,1,1,1,1,1,''),
	(25,3,'id','PRI','id',1,0,0,0,0,0,''),
	(26,3,'name','text','name',1,1,1,1,1,1,''),
	(27,3,'email','text','email',1,1,1,1,1,1,''),
	(28,3,'password','password','password',1,0,0,1,1,0,''),
	(29,3,'remember_token','text','remember_token',0,0,0,0,0,0,''),
	(30,3,'created_at','timestamp','created_at',0,1,1,1,0,1,''),
	(31,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),
	(32,3,'avatar','image','avatar',0,1,1,1,1,1,''),
	(33,5,'id','PRI','id',1,0,0,0,0,0,''),
	(34,5,'name','text','name',1,1,1,1,1,1,''),
	(35,5,'created_at','timestamp','created_at',0,0,0,1,0,1,''),
	(36,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),
	(37,4,'id','PRI','id',1,0,0,0,0,0,''),
	(38,4,'parent_id','text','parent_id',0,0,1,1,1,1,''),
	(39,4,'order','text','order',1,1,1,1,1,1,''),
	(40,4,'name','text','name',1,1,1,1,1,1,''),
	(41,4,'slug','text','slug',1,1,1,1,1,1,''),
	(42,4,'created_at','timestamp','created_at',0,0,1,0,0,1,''),
	(43,4,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),
	(44,6,'id','PRI','id',1,0,0,0,0,0,''),
	(45,6,'name','text','Name',1,1,1,1,1,1,''),
	(46,6,'created_at','timestamp','created_at',0,0,0,0,0,0,''),
	(47,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),
	(48,6,'display_name','text','Display Name',1,1,1,1,1,1,''),
	(49,1,'seo_title','text','seo_title',0,1,1,1,1,1,''),
	(50,1,'featured','checkbox','featured',1,1,1,1,1,1,''),
	(51,3,'role_id','text','role_id',1,0,0,1,1,0,'');

/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle data_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `description`, `generate_permissions`, `created_at`, `updated_at`)
VALUES
	(1,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','',1,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page','',1,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(3,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','',1,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category','',1,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu','',1,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role','',1,'2016-12-17 12:45:31','2016-12-17 12:45:31');

/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`)
VALUES
	(1,1,'Dashboard','/admin','_self','voyager-boat',NULL,NULL,1,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(2,1,'Media','/admin/media','_self','voyager-images',NULL,NULL,5,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(3,1,'Posts','/admin/posts','_self','voyager-news',NULL,NULL,6,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(4,1,'Users','/admin/users','_self','voyager-person',NULL,NULL,3,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(5,1,'Categories','/admin/categories','_self','voyager-categories',NULL,NULL,8,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(6,1,'Pages','/admin/pages','_self','voyager-file-text',NULL,NULL,7,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(7,1,'Roles','/admin/roles','_self','voyager-lock',NULL,NULL,2,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(8,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(9,1,'Menu Builder','/admin/menus','_self','voyager-list',NULL,8,10,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(10,1,'Database','/admin/database','_self','voyager-data',NULL,8,11,'2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(11,1,'Settings','/admin/settings','_self','voyager-settings',NULL,NULL,12,'2016-12-17 12:45:31','2016-12-17 12:45:31');

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2016-12-17 12:45:31','2016-12-17 12:45:31');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(16,'2014_10_12_000000_create_users_table',1),
	(17,'2014_10_12_100000_create_password_resets_table',1),
	(18,'2016_01_01_000000_add_user_avatar',1),
	(19,'2016_01_01_000000_create_data_types_table',1),
	(20,'2016_01_01_000000_create_pages_table',1),
	(21,'2016_01_01_000000_create_posts_table',1),
	(22,'2016_02_15_204651_create_categories_table',1),
	(23,'2016_05_19_173453_create_menu_table',1),
	(24,'2016_10_21_190000_create_roles_table',1),
	(25,'2016_10_21_190000_create_settings_table',1),
	(26,'2016_10_30_000000_set_user_avatar_nullable',1),
	(27,'2016_11_30_131710_add_user_role',1),
	(28,'2016_11_30_135954_create_permission_table',1),
	(29,'2016_11_30_141208_create_permission_role_table',1),
	(30,'2016_12_17_123458_user_settings',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(26,1),
	(27,1),
	(28,1),
	(29,1),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`)
VALUES
	(1,'browse_admin','admin','2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(2,'browse_database','admin','2016-12-17 12:45:31','2016-12-17 12:45:31'),
	(3,'browse_media','admin','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(4,'browse_settings','admin','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(5,'browse_menus','menus','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(6,'read_menus','menus','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(7,'edit_menus','menus','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(8,'add_menus','menus','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(9,'delete_menus','menus','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(10,'browse_pages','pages','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(11,'read_pages','pages','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(12,'edit_pages','pages','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(13,'add_pages','pages','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(14,'delete_pages','pages','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(15,'browse_roles','roles','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(16,'read_roles','roles','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(17,'edit_roles','roles','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(18,'add_roles','roles','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(19,'delete_roles','roles','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(20,'browse_users','users','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(21,'read_users','users','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(22,'edit_users','users','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(23,'add_users','users','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(24,'delete_users','users','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(25,'browse_posts','posts','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(26,'read_posts','posts','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(27,'edit_posts','posts','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(28,'add_posts','posts','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(29,'delete_posts','posts','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(30,'browse_categories','categories','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(31,'read_categories','categories','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(32,'edit_categories','categories','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(33,'add_categories','categories','2016-12-17 12:45:32','2016-12-17 12:45:32'),
	(34,'delete_categories','categories','2016-12-17 12:45:32','2016-12-17 12:45:32');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Administrator','2016-12-17 12:40:16','2016-12-17 12:40:16'),
	(2,'user','Normal User','2016-12-17 12:45:31','2016-12-17 12:45:31');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle user_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_settings`;

CREATE TABLE `user_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `number_of_flights` int(11) DEFAULT NULL,
  `refresh_time` int(11) DEFAULT NULL,
  `test_mode` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_settings` WRITE;
/*!40000 ALTER TABLE `user_settings` DISABLE KEYS */;

INSERT INTO `user_settings` (`id`, `user_id`, `number_of_flights`, `refresh_time`, `test_mode`)
VALUES
	(1,1,5,300,1);

/*!40000 ALTER TABLE `user_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'users/default.png',
  `role_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `role_id`)
VALUES
	(1,'mauro','maurostehle@gmail.com','$2y$10$YMNDl6tWKA.9jOCig/n5Ieq7fNp.wI4GJ3la68oaWTzUfNjxqrJl2',NULL,'2016-12-17 12:40:16','2016-12-17 12:40:16','users/default.png',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
