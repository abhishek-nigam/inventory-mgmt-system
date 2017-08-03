-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dmrc_inventory
CREATE DATABASE IF NOT EXISTS `dmrc_inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dmrc_inventory`;

-- Dumping structure for table dmrc_inventory.computer_repair
CREATE TABLE IF NOT EXISTS `computer_repair` (
  `Repair ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `Username` varchar(40) DEFAULT NULL,
  `Department` varchar(30) DEFAULT NULL,
  `Receipt Date` date DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL,
  `Emp No` int(11) DEFAULT NULL,
  `Contact No` int(11) DEFAULT NULL,
  `Wing` varchar(20) DEFAULT NULL,
  `HW Detail` varchar(50) DEFAULT NULL,
  `Item Description` varchar(100) DEFAULT NULL,
  `Fault Description` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `Warranty Up To` date DEFAULT NULL,
  `Update Status` varchar(50) DEFAULT NULL,
  `Update Time` time DEFAULT NULL,
  `Update Date` date DEFAULT NULL,
  `Pending Status` varchar(50) DEFAULT NULL,
  `Add Date` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `IT Lab` varchar(40) DEFAULT NULL,
  `HW Part` varchar(30) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Repair ID`),
  UNIQUE KEY `UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dmrc_inventory.computer_repair: ~3 rows (approximately)
/*!40000 ALTER TABLE `computer_repair` DISABLE KEYS */;
INSERT INTO `computer_repair` (`Repair ID`, `ID`, `Username`, `Department`, `Receipt Date`, `Location`, `Emp No`, `Contact No`, `Wing`, `HW Detail`, `Item Description`, `Fault Description`, `Remarks`, `Warranty Up To`, `Update Status`, `Update Time`, `Update Date`, `Pending Status`, `Add Date`, `Email`, `IT Lab`, `HW Part`, `Status`) VALUES
	(4, 123, 'Rahul', 'Personnel', '0000-00-00', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '00:00:00', '0000-00-00', 'No', '0000-00-00', '', '', '', ''),
	(5, 34, 'Abhishek Nigam', 'HR', '0000-00-00', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '00:00:00', '0000-00-00', '', '0000-00-00', '', '', '', ''),
	(6, 56, 'Anshul', 'Training', '0000-00-00', '', 0, 0, '', '', '', '', '', '0000-00-00', '', '00:00:00', '0000-00-00', '', '0000-00-00', '', '', '', '');
/*!40000 ALTER TABLE `computer_repair` ENABLE KEYS */;

-- Dumping structure for table dmrc_inventory.computer_stock
CREATE TABLE IF NOT EXISTS `computer_stock` (
  `Stock ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `Old ID` int(11) DEFAULT NULL,
  `Username` varchar(40) DEFAULT NULL,
  `Emp No` int(11) DEFAULT NULL,
  `Department` varchar(30) DEFAULT NULL,
  `Detail` varchar(50) DEFAULT NULL,
  `Serial No` varchar(20) DEFAULT NULL,
  `Model No` varchar(20) DEFAULT NULL,
  `Delivery Date` date DEFAULT NULL,
  `Bill No` varchar(20) DEFAULT NULL,
  `PO No` varchar(20) DEFAULT NULL,
  `Asset No` varchar(20) DEFAULT NULL,
  `Indent No` varchar(20) DEFAULT NULL,
  `Vendor Name` varchar(40) DEFAULT NULL,
  `Warranty Up To` date DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL,
  `Wing` varchar(20) DEFAULT NULL,
  `HOD` varchar(40) DEFAULT NULL,
  `In Stock Quantity` int(11) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Stock ID`),
  UNIQUE KEY `UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table dmrc_inventory.computer_stock: ~2 rows (approximately)
/*!40000 ALTER TABLE `computer_stock` DISABLE KEYS */;
INSERT INTO `computer_stock` (`Stock ID`, `ID`, `Old ID`, `Username`, `Emp No`, `Department`, `Detail`, `Serial No`, `Model No`, `Delivery Date`, `Bill No`, `PO No`, `Asset No`, `Indent No`, `Vendor Name`, `Warranty Up To`, `Location`, `Wing`, `HOD`, `In Stock Quantity`, `Status`) VALUES
	(17, 92, 0, 'Yogesh', 0, 'Safety', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', 0, ''),
	(18, 456, 0, 'Shubham', 0, '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', 0, '');
/*!40000 ALTER TABLE `computer_stock` ENABLE KEYS */;

-- Dumping structure for table dmrc_inventory.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dmrc_inventory.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
	(1, 'abhishek12', '9a1996efc97181f0aee18321aa3b3b12', 'Abhishek', 'Nigam'),
	(2, 'ashish23', 'b4af804009cb036a4ccdc33431ef9ac9', 'Ashish', 'Nigam'),
	(3, 'prafull25', '2ed2696afa278838f8124a458ba5551d', 'Prafull', 'Mishra'),
	(4, 'kapil123', 'cf8b62bf3a2a166ca52c348b8c4f2033', 'Kapil', ''),
	(5, 'abhay', 'cc03e747a6afbbcbf8be7668acfebee5', 'Abhay', 'Nigam'),
	(6, 'popli', 'f30aa7a662c728b7407c54ae6bfd27d1', 'Abhishek', 'Popli');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
