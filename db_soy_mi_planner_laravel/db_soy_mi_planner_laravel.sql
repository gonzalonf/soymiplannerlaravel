CREATE DATABASE  IF NOT EXISTS `soy_mi_planner_laravel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `soy_mi_planner_laravel`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: soy_mi_planner_laravel
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `subcategory_child_of_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_cat_hijo_de_idx` (`subcategory_child_of_id`),
  CONSTRAINT `sub_cat_hijo_de` FOREIGN KEY (`subcategory_child_of_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Lugar',NULL),(2,'Decoracion',NULL),(3,'Catering',NULL),(4,'Servicios',NULL),(5,'Productos',NULL),(6,'Salones',1),(7,'Quintas',1),(8,'Otros',1),(9,'Decoracion y ambientacion',2),(10,'Moviliario',2),(11,'Otros',2),(12,'Catering gral',3),(13,'Mesa dulce',3),(14,'Tortas de boda y cumpleaños',3),(15,'DJs y sonido',4),(16,'Foto y video',4),(17,'Animacion y shows',4),(18,'Cotillon',5),(19,'Vestidos y trajes a medida',5),(20,'Ramos y souvenirs',5),(21,'',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('maria@ferraro.com','$2y$10$96I3kenIBF5goYKnVtHaM.tG.iLyRjKGXzprfxPF8KHQGwtHGmH2C','2017-07-09 14:25:02'),('juan@perez.com','$2y$10$uzDenkiBLvc8hwq0jqF7oelWwaX0popawqDFHdPcvq3znQzvkeUHu','2017-07-09 14:25:31');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(45) DEFAULT NULL,
  `user_seller_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria_idx` (`category_id`),
  KEY `id_user_idx` (`user_seller_id`),
  CONSTRAINT `id_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_user` FOREIGN KEY (`user_seller_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Quinta \"Delta Parana\"','Quinta con hermosa arboleda.Capacidad entre 50 y 250 invitados.En el jardín se pueden celebrar ceremonias civiles o religiosas.La laguna es ideal para altares rodeados de cañas de bambú.','Desde $20.000',4,1),(2,'Salon \"Fiesta Inolvidable\"','Ofrecemos un espacio diseñado para la realización de eventos sociales y empresariales, con una alta calidad en sus servicios y atención al cliente.','Desde $18.000',9,1),(3,'Foto y Video \"José\"','Empresa con mas de 10 Años en el mercado ofreciendo Fotografía, Video y Gráficas para eventos.','A convenir',5,4),(4,'Catering \"Asian Delight\"','Somos una cadena de sushi y wraps y les ofrecemos el servicio de catering para cualquier tipo de evento. Una opción sana, rica y muy económica, puede incluir la preparación en vivo!','A convenir',2,3),(5,'Catering \"Sabores Criollos\"','Realizamos catering para todo tipo de eventos, tanto sociales como corporativos. Cubrimos todas sus necesidades, con menúes personalizados y soluciones integrales para cada evento.','A convenir',11,3),(6,'Cotillon \"Los Piratas\"','Fabricación de cotillón temático artesanal. Desde hace más de 20 años hacemos de las fiestas un evento exclusivo y diferente, con un estilo único y personal. ','A convenir',6,5),(7,'DJ \"Manija\"','Discjockey, música y sonido para todo tipo de eventos.','A convenir',1,4),(8,'Cotillon \"Carnaval toda al vida\"','Cotillón y accesorios para que tu fiesta sea la más original y divertida.','A convenir',7,5),(9,'Banda \"Los Cachengues\"','Banda de Covers para Eventos. Cumbia Retro, Carnaval Carioca, Cumbia Pop, Bailable Retro. 6 años de experiencia. Músicos profesionales.','Desde $3.000',8,4),(10,'Moviliario para eventos \"Silla&Sillon\"','Somos una empresa familiar dedicada al alquiler de mesas, sillas y sillones para eventos.','A convenir',3,2),(11,'Tortas de Boda \"Ensueño\"','Ofrecemos servicios de y pastelería cuidando siempre cada detalle y utilizando las mejores materias primas.','Desde $1.000',11,3),(12,'Iluminacion \"Que flash!\"','Imagen e iluminación, proyecciones, luminarias leds, ambientación, efectos ópticos, iluminación robotizada, cabezales móviles, scanners, laser shows, máquinas de humo, efectos y más.','A convenir',1,2);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `items` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_buyer_id` int(11) unsigned NOT NULL,
  `user_seller_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_comprador_idx` (`user_buyer_id`),
  KEY `id_usuario_vendedor_idx` (`user_seller_id`),
  CONSTRAINT `id_usuario_comprador` FOREIGN KEY (`user_buyer_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario_vendedor` FOREIGN KEY (`user_seller_id`) REFERENCES `products` (`user_seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(15) CHARACTER SET latin1 NOT NULL,
  `home` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juan','Perez','Caballito','juan@perez.com','$2y$10$lDRDfYDJxaW6pqgQwSAcCONRg5ZTuf6fodeUQx107sihY87QYfqJ.','ePGD2dmyi054j8iZvCFiPfOh0585wDRwWgo752vzgaAWrflZ6bW1neKLhNLr','2017-07-07 08:20:40','2017-07-07 08:20:40',NULL,0),(2,'Maria','Lopez','Colegiales','maria@lopez.com','$2y$10$ro3ulXdyJsVqUh3afugGt.k/b9ERLn1Jc1OdNEiUJpbaqoCWc5opq','fB9P6sIncnVGw8XtoVUuto9zb8Q4GwZi3QSCHqKHJtc4EzOVDvcb7bs7Oreu','2017-07-07 09:06:05','2017-07-07 09:06:05',NULL,0),(3,'Carlos','Diaz','Palermo','carloz@diaz.com','$2y$10$vtCrsRY.ss.YzacHAkLLI.7Q5nR7ExsPxVkESZEIQH8lMXQ2vqheG','d1sgJCALIiBksHznM3PqX8CPyaZ0QkWBIv6m56R1ScpNBJJVrGpJsFX0Cr8h','2017-07-07 09:07:09','2017-07-07 09:07:09',NULL,0),(4,'Romina','Gomez','Recoleta','romina@gomez.com','$2y$10$vt2ih0upXmgoVZpYMCr11eSbngE9SxNalsqr4sAywHPl4pD8dNm36','bDhytozyDR3eEXsSOaFzU48d8AEkd9nksRTwiPvg5Xd0RJlv67eyyQ15INJ4','2017-07-07 09:11:00','2017-07-07 09:11:00',NULL,0),(5,'Jose','Juarez','San Nicolas','jose@juarez.com','$2y$10$xkCyw3dQ/.FhTYQ2YH3A4ee2DPMHjrYi47bAZg8FgUDcavRe.4kjG','bNymrjgmzPVls5xij5WX5OtWBq64IV2KYqclfGm31EH77jHrQ0NPKS9L6hKj','2017-07-07 09:26:58','2017-07-07 09:26:58',NULL,0),(6,'Marcelo','Garcia','Abasto','marcelo@garcia.com','$2y$10$2dSUoCVl0Jx9z7pnwdS9.ORR/q7B58JTj/v5I7e/AfVJhbNeFRY4i','pUHNkaXSKAnj4Rg6jQNdEX9CKvz4d25QVU2Jdxg6A6X8bQWHes4VNM2PEXZ4','2017-07-07 09:57:16','2017-07-07 09:57:16',NULL,0),(7,'Martin','Carrazco','La Boca','martin@carrazco.com','$2y$10$xkCyw3dQ/.FhTYQ2YH3A4ee2DPMHjrYi47bAZg8FgUDcavRe.4kjG',NULL,'2017-07-07 09:57:17','2017-07-07 09:57:17',NULL,0),(8,'Miguel','Blanco','Constitucion','miguel@blanco.com','$2y$10$vtCrsRY.ss.YzacHAkLLI.7Q5nR7ExsPxVkESZEIQH8lMXQ2vqheG',NULL,'2017-07-07 09:57:18','2017-07-07 09:57:18',NULL,0),(9,'Marta','Sosa','San Nicolas','marta@sosa.com','$2y$10$xkCyw3dQ/.FhTYQ2YH3A4ee2DPMHjrYi47bAZg8FgUDcavRe.4kjG',NULL,'2017-07-07 09:57:19','2017-07-07 09:57:19',NULL,0),(10,'Lautaro','Gonzalez','Belgrano','lautaro@gonzales.com','$2y$10$vtCrsRY.ss.YzacHAkLLI.7Q5nR7ExsPxVkESZEIQH8lMXQ2vqheG',NULL,'2017-07-07 09:57:20','2017-07-07 09:57:20',NULL,0),(11,'Analia','Ortega','Parque Patricios','analia@ortega','$2y$10$ro3ulXdyJsVqUh3afugGt.k/b9ERLn1Jc1OdNEiUJpbaqoCWc5opq',NULL,'2017-07-07 09:57:21','2017-07-07 09:57:21',NULL,0),(12,'Mariela','Ferraro','Villa Urquiza','maria@ferraro.com','$2y$10$HY9j9eYMjBS69MjSpTU5buOSQAf.MjKF/Be7FGenh4PMRLULOclPe','7N8tcyzIwpS3HhpmvU6aLQbYnX90JYnzFBCCILRJP8RhFThGL0mzG3mK30NH','2017-07-09 14:08:33','2017-07-09 14:08:33',NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-11 21:21:16
