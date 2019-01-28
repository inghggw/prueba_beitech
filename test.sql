-- --------------------------------------------------------
-- Host:                         beitech-sas.ccnlcdeiv1f1.us-east-1.rds.amazonaws.com
-- Versión del servidor:         5.6.40 - Source distribution
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

-- Volcando estructura para tabla test.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla test.customer: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`customer_id`, `name`, `email`) VALUES
	(1, 'juan soto', 'juan_soto@testbeitech.com'),
	(2, 'laura acosta', 'laura_acosta@testbeitech.com'),
	(3, 'maria medrano', 'maria_medrano@testbeitech.com'),
	(4, 'daniela martinez', 'daniela_martinez@testbeitech.com'),
	(5, 'stefany florez', 'stefany_florez@testbeitech.com'),
	(6, 'jose ruiz', 'jose_ruiz@testbeitech.com'),
	(7, 'leticia aguirre', 'leticia_aguirre@testbeitech.com'),
	(8, 'lida pineda', 'lida_pineda@testbeitech.com'),
	(9, 'alicia llorente', 'alicia_llorente@testbeitech.com'),
	(10, 'samuel rojas', 'samuel_rojas@testbeitech.com'),
	(11, 'luis ortiz', 'luis_ortiz@testbeitech.com'),
	(12, 'pablo castro', 'pablo_castro@testbeitech.com'),
	(13, 'lina molina', 'lina_molina@testbeitech.com'),
	(14, 'dana moreno', 'dana_moreno@testbeitech.com'),
	(15, 'jesus luna', 'jesus_luna@testbeitech.com'),
	(16, 'david morales', 'david_morales@testbeitech.com'),
	(17, 'diana castillo', 'diana_castillo@testbeitech.com'),
	(18, 'sandra silva', 'sandra_silva@testbeitech.com'),
	(19, 'oscar arias', 'oscar_arias@testbeitech.com'),
	(20, 'tomas vargas', 'tomas_vargas@testbeitech.com'),
	(21, 'andrea ramos', 'andrea_ramos@testbeitech.com'),
	(22, 'vanessa Bravo', 'vanessa_bravo@testbeitech.com'),
	(23, 'vilma duarte', 'vilma_duarte@testbeitech.com'),
	(24, 'fernanda escobar', 'fernanda_escobar@testbeitech.com'),
	(25, 'maria herrera', 'maria_herrera@testbeitech.com');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Volcando estructura para tabla test.customer_product
CREATE TABLE IF NOT EXISTS `customer_product` (
  `customer_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `customer_product_customer_id_foreign` (`customer_id`),
  KEY `customer_product_product_id_foreign` (`product_id`),
  CONSTRAINT `customer_product_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `customer_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla test.customer_product: ~86 rows (aproximadamente)
/*!40000 ALTER TABLE `customer_product` DISABLE KEYS */;
INSERT INTO `customer_product` (`customer_id`, `product_id`) VALUES
	(1, 10),
	(1, 15),
	(1, 16),
	(1, 18),
	(2, 3),
	(2, 13),
	(2, 17),
	(3, 2),
	(3, 7),
	(3, 9),
	(3, 19),
	(4, 5),
	(4, 13),
	(4, 15),
	(5, 1),
	(5, 7),
	(5, 11),
	(5, 17),
	(5, 20),
	(6, 3),
	(6, 4),
	(6, 7),
	(7, 7),
	(7, 10),
	(7, 15),
	(8, 2),
	(8, 11),
	(8, 12),
	(8, 20),
	(9, 4),
	(9, 7),
	(9, 13),
	(10, 3),
	(10, 7),
	(10, 15),
	(11, 1),
	(11, 5),
	(11, 9),
	(11, 15),
	(11, 19),
	(12, 5),
	(12, 16),
	(12, 20),
	(13, 2),
	(13, 15),
	(13, 20),
	(14, 1),
	(14, 3),
	(14, 7),
	(14, 14),
	(15, 7),
	(15, 11),
	(15, 17),
	(16, 5),
	(16, 9),
	(16, 12),
	(16, 17),
	(17, 2),
	(17, 16),
	(17, 17),
	(18, 14),
	(18, 20),
	(19, 5),
	(19, 7),
	(19, 9),
	(19, 15),
	(19, 19),
	(20, 12),
	(20, 15),
	(20, 17),
	(21, 1),
	(21, 4),
	(21, 6),
	(22, 2),
	(22, 6),
	(22, 12),
	(22, 16),
	(23, 2),
	(23, 7),
	(23, 18),
	(24, 8),
	(24, 10),
	(24, 16),
	(24, 18),
	(25, 2),
	(25, 13);
/*!40000 ALTER TABLE `customer_product` ENABLE KEYS */;

-- Volcando estructura para tabla test.order
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `creation_date` date NOT NULL,
  `delivery_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(15,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla test.order: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`order_id`, `customer_id`, `creation_date`, `delivery_address`, `total`) VALUES
	(1, 1, '2019-01-10', 'This is the first delivery address', 106000.00),
	(2, 2, '2019-01-10', 'Cra 23 # 56 - 35J', 79600.00),
	(4, 9, '2019-01-26', '', 2000.00);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Volcando estructura para tabla test.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_detail_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla test.order_detail: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` (`order_detail_id`, `product_description`, `price`, `order_id`, `quantity`) VALUES
	(1, 'descripcion del producto j', 50000.00, 1, 1),
	(2, 'descripcion del producto z', 56000.00, 1, 1),
	(3, 'descripcion del producto c', 15000.00, 2, 1),
	(4, 'descripcion del producto m', 4500.00, 2, 1),
	(5, 'descripcion del producto p', 60100.00, 2, 1),
	(6, 'descripcion del producto d', 2000.00, 4, 1),
	(7, 'descripcion del producto d', 2000.00, 4, 1),
	(8, 'descripcion del producto d', 2000.00, 4, 1),
	(9, 'descripcion del producto d', 2000.00, 4, 1),
	(10, 'descripcion del producto d', 2000.00, 4, 1);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Volcando estructura para tabla test.product
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla test.product: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`product_id`, `name`, `product_description`, `price`) VALUES
	(1, 'producto a', 'descripcion del producto a', 12000.00),
	(2, 'producto b', 'descripcion del producto b', 2100.00),
	(3, 'producto c', 'descripcion del producto c', 15000.00),
	(4, 'producto d', 'descripcion del producto d', 2000.00),
	(5, 'producto e', 'descripcion del producto e', 59900.00),
	(6, 'producto f', 'descripcion del producto f', 3000.00),
	(7, 'producto g', 'descripcion del producto g', 5800.00),
	(8, 'producto h', 'descripcion del producto h', 6900.00),
	(9, 'producto i', 'descripcion del producto i', 8000.00),
	(10, 'producto j', 'descripcion del producto j', 50000.00),
	(11, 'producto k', 'descripcion del producto k', 42000.00),
	(12, 'producto l', 'descripcion del producto l', 30000.00),
	(13, 'producto m', 'descripcion del producto m', 4500.00),
	(14, 'producto n', 'descripcion del producto n', 47500.00),
	(15, 'producto z', 'descripcion del producto z', 56000.00),
	(16, 'producto o', 'descripcion del producto o', 20500.00),
	(17, 'producto p', 'descripcion del producto p', 60100.00),
	(18, 'producto q', 'descripcion del producto q', 91800.00),
	(19, 'producto r', 'descripcion del producto r', 34000.00),
	(20, 'producto s', 'descripcion del producto s', 78900.00);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
