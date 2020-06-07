-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for zkm
CREATE DATABASE IF NOT EXISTS `zkm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zkm`;

-- Dumping structure for table zkm.student
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `lnaam` varchar(50) NOT NULL,
  `lnummer` varchar(50) NOT NULL,
  `klas` varchar(50) NOT NULL,
  `lstatus` varchar(50) NOT NULL DEFAULT 'gezond',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table zkm.student: ~3 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`sid`, `lnaam`, `lnummer`, `klas`, `lstatus`) VALUES
	(1, 'Aurelien Paulino Oggier', '122286', 'IB1B', 'gezond'),
	(2, 'Jhon Jhonsen', '145667', 'IB1B', 'gezond'),
	(3, 'Luna Maan', '127596', 'IB1B', 'gezond');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table zkm.ziekmelding
CREATE TABLE IF NOT EXISTS `ziekmelding` (
  `zid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `datumZ` varchar(50) NOT NULL,
  `datumB` varchar(50) DEFAULT '0',
  PRIMARY KEY (`zid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table zkm.ziekmelding: ~6 rows (approximately)
/*!40000 ALTER TABLE `ziekmelding` DISABLE KEYS */;
INSERT INTO `ziekmelding` (`zid`, `sid`, `datumZ`, `datumB`) VALUES
	(1, 2, '2020/06/03', '2020/06/07'),
	(2, 1, '2020/06/07', '2020/06/07'),
	(3, 3, '2020/06/07', '2020/06/07'),
	(4, 1, '2020/06/07', '2020/06/07'),
	(5, 1, '2020/06/06', '2020/06/10'),
	(7, 1, '2020/06/07', '2020/06/07');
/*!40000 ALTER TABLE `ziekmelding` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
