-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.10 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for homemanager
CREATE DATABASE IF NOT EXISTS `homemanager` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `homemanager`;


-- Dumping structure for table homemanager.form
CREATE TABLE IF NOT EXISTS `form` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) NOT NULL,
  `own` varchar(250) NOT NULL,
  `rent` varchar(250) NOT NULL,
  `monthly` varchar(250) NOT NULL,
  `rent1` varchar(250) NOT NULL,
  `hlong` varchar(250) NOT NULL,
  `othername1` varchar(250) NOT NULL,
  `otherdob1` varchar(250) NOT NULL,
  `othername2` varchar(250) NOT NULL,
  `otherdob2` varchar(250) NOT NULL,
  `othername3` varchar(250) NOT NULL,
  `otherdob3` varchar(250) NOT NULL,
  `othername4` varchar(250) NOT NULL,
  `otherdob4` varchar(250) NOT NULL,
  `bname` varchar(250) NOT NULL,
  `employename` varchar(250) NOT NULL,
  `employephone` varchar(250) NOT NULL,
  `employeaddress` varchar(250) NOT NULL,
  `employecity` varchar(250) NOT NULL,
  `employestate` varchar(250) NOT NULL,
  `employezip` varchar(250) NOT NULL,
  `employerelation` varchar(250) NOT NULL,
  `emergencyname` varchar(250) NOT NULL,
  `emergencyphone` varchar(250) NOT NULL,
  `emergencyaddress` varchar(250) NOT NULL,
  `emergencycity` varchar(250) NOT NULL,
  `emergencystate` varchar(250) NOT NULL,
  `emergencyzip` varchar(250) NOT NULL,
  `emergencyrelation` varchar(250) NOT NULL,
  `coaname` varchar(250) NOT NULL,
  `coaphone` varchar(250) NOT NULL,
  `coaaddress` varchar(250) NOT NULL,
  `coacity` varchar(250) NOT NULL,
  `coastate` varchar(250) NOT NULL,
  `coazip` varchar(250) NOT NULL,
  `coaown` varchar(250) NOT NULL,
  `coarent` varchar(250) NOT NULL,
  `coamonthly` varchar(250) NOT NULL,
  `coarent1` varchar(250) NOT NULL,
  `coahlong` varchar(250) NOT NULL,
  `coapaddress` varchar(250) NOT NULL,
  `coapcity` varchar(250) NOT NULL,
  `coapstate` varchar(250) NOT NULL,
  `coapzip` varchar(250) NOT NULL,
  `coapown` varchar(250) NOT NULL,
  `coaprent` varchar(250) NOT NULL,
  `coapmonthly` varchar(250) NOT NULL,
  `coaprent1` varchar(250) NOT NULL,
  `coahplong` varchar(250) NOT NULL,
  `coaename` varchar(250) NOT NULL,
  `coaephone` varchar(250) NOT NULL,
  `coaeaddress` varchar(250) NOT NULL,
  `coaecity` varchar(250) NOT NULL,
  `coaestate` varchar(250) NOT NULL,
  `coaezip` varchar(250) NOT NULL,
  `coaeemail` varchar(250) NOT NULL,
  `coaefax` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `hourly` varchar(250) NOT NULL,
  `salary` varchar(250) NOT NULL,
  `annualIncome` varchar(250) NOT NULL,
  `rname1` varchar(250) NOT NULL,
  `raddress1` varchar(250) NOT NULL,
  `rphone1` varchar(250) NOT NULL,
  `rname2` varchar(250) NOT NULL,
  `rphone2` varchar(250) NOT NULL,
  `rname3` varchar(250) NOT NULL,
  `raddress3` varchar(250) NOT NULL,
  `rphone3` varchar(250) NOT NULL,
  `rname4` varchar(250) NOT NULL,
  `raddress4` varchar(250) NOT NULL,
  `rphone4` varchar(250) NOT NULL,
  `authorize` varchar(250) NOT NULL,
  `autoyear` varchar(250) NOT NULL,
  `make` varchar(250) NOT NULL,
  `autophone` varchar(250) NOT NULL,
  `lnumber` varchar(250) NOT NULL,
  `yes1` varchar(250) NOT NULL,
  `no1` varchar(250) NOT NULL,
  `yes2` varchar(250) NOT NULL,
  `no2` varchar(250) NOT NULL,
  `yes3` varchar(250) NOT NULL,
  `no3` varchar(250) NOT NULL,
  `yes4` varchar(250) NOT NULL,
  `no4` varchar(250) NOT NULL,
  `yes5` varchar(250) NOT NULL,
  `no5` varchar(250) NOT NULL,
  `yes6` varchar(250) NOT NULL,
  `no6` varchar(250) NOT NULL,
  `status` enum('Not Approved','Approved') NOT NULL DEFAULT 'Not Approved',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table homemanager.multi_form_data
CREATE TABLE IF NOT EXISTS `multi_form_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_fname` varchar(250) NOT NULL,
  `p_lname` varchar(250) NOT NULL,
  `p_question1` varchar(250) NOT NULL,
  `p_question2` varchar(250) NOT NULL,
  `p_question3` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) NOT NULL,
  `own` varchar(250) NOT NULL,
  `rent` varchar(250) NOT NULL,
  `month` varchar(250) NOT NULL,
  `hlong` varchar(250) NOT NULL,
  `rdaf1` varchar(250) NOT NULL,
  `rdaf2` varchar(250) NOT NULL,
  `rdaf3` varchar(250) NOT NULL,
  `rdaf4` varchar(250) NOT NULL,
  `rdaf5` varchar(250) NOT NULL,
  `ri1` varchar(250) NOT NULL,
  `ri2` varchar(250) NOT NULL,
  `ri3` varchar(250) NOT NULL,
  `ri4` varchar(250) NOT NULL,
  `ri5` varchar(250) NOT NULL,
  `ri6` varchar(250) NOT NULL,
  `ri7` varchar(250) NOT NULL,
  `ri8` varchar(250) NOT NULL,
  `ri9` varchar(250) NOT NULL,
  `ri10` varchar(250) NOT NULL,
  `status` enum('Not Approved','Approved') NOT NULL DEFAULT 'Not Approved',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
