# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 192.168.0.2 (MySQL 5.1.73)
# Database: itt_isd
# Generation Time: 2015-06-18 12:22:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `last_name` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `gender` varchar(10) COLLATE latin1_general_ci DEFAULT '',
  `age` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `age`)
VALUES
	(1,'Jenny','Brown','j.brown@leedsmet.ac.uk','brown01','Female',23),
	(2,'Ray','Green','r.green@leedsmet.ac.uk','green01','Male',19),
	(3,'Arjun','Patel','a.patel@leedsmet.ac.uk','patel01','Male',20),
	(4,'Steve','Rich','s.rich@leedsmet.ac.uk','rich01','Male',27),
	(5,'Amy','Park','a.park@leedsmet.ac.uk','park01','Female',20),
	(6,'Rehana','Hashmi','r.hashmi@leedsmet.ac.uk','hashmi01','Female',22),
	(8,'Tony','Ampomah','tony@itechytony.com','5f4dcc3b5aa765d61d8327deb882cf99','Male',23);

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `shipping` float NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `shipping`, `quantity`)
VALUES
	(1,'book','This is a book',3.99,1.99,10),
	(2,'fish','This is a plaice holder',4.99,0.99,3),
	(456,'cod','A tasty fish',4.99,0.99,34);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testproducts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testproducts`;

CREATE TABLE `testproducts` (
  `ProductID` int(8) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `ProductPrice` float NOT NULL,
  `ImageName` varchar(15) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `testproducts` WRITE;
/*!40000 ALTER TABLE `testproducts` DISABLE KEYS */;

INSERT INTO `testproducts` (`ProductID`, `ProductName`, `ProductPrice`, `ImageName`)
VALUES
	(1,'Cap',3.99,'caps.jpg'),
	(2,'Mugs',2.99,'mugs.jpg'),
	(3,'T-Shirt',10.99,'t-shirt.jpg'),
	(4,'Book',6.99,'book.jpg'),
	(5,'Calendar',11.99,'calendar.jpg');

/*!40000 ALTER TABLE `testproducts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `HouseNumber` float NOT NULL,
  `StreetName` varchar(20) NOT NULL,
  `MobileNumber` varchar(12) NOT NULL,
  `Postcode` varchar(9) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
