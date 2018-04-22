``-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table homemanager.alpha_employees: ~5 rows (approximately)
DELETE FROM `alpha_employees`;
/*!40000 ALTER TABLE `alpha_employees` DISABLE KEYS */;
INSERT INTO `alpha_employees` (`f_name`, `l_name`, `phone`, `username`, `email`, `password`) VALUES
	('CALEB', 'KIPTOO', '+2547772727', 'alex', 'serrr@gmail.com', 'Korir9993'),
	('ALLAN', 'KIPTOO', '+4567272783', 'allank', 'allank@gmail.com', '33c78148ceb29deaa609140dfaa36e60'),
	('CLEOPSA', 'KORIR', '+25472494954', 'cleopaskor', 'cleopaskor7@gmail.com', '33c78148ceb29deaa609140dfaa36e60'),
	('JUSTINE', 'KIPLAGAT', '+25470224683', 'justinek', 'justinekiplagat@gmail.com', '33c78148ceb29deaa609140dfaa36e60'),
	('cornelius', 'kipkorir kilimo', '+25472792213', 'kilimoc', 'kilimoc@gmail.com', 'Korir9993');
/*!40000 ALTER TABLE `alpha_employees` ENABLE KEYS */;

-- Dumping data for table homemanager.homes: ~8 rows (approximately)
DELETE FROM `homes`;
/*!40000 ALTER TABLE `homes` DISABLE KEYS */;
INSERT INTO `homes` (`h_address`, `h_name`, `rent`, `description`, `profile_name`, `client_id`) VALUES
	('142325 Jsuusu', 'Cornelius', 4500.00, 'Two bedroom apartments', '', NULL),
	('142525 Jsuusu', 'Cornelius', 4500.00, 'Two bedroom apartments', '', 0),
	('ELD0123Ter', 'Eldoret racecourse', 500.00, '                                    This is a two bedroomed apartments', '15219535412741733011454.jpg', NULL),
	('ELD3242FR', 'KABISA', 500.00, '                                    3BEDROOM HOME', 'WhatsApp Image 2018-03-23 at 13.23.23.jpeg', NULL),
	('Home', 'away', 4500.00, 'one bedroom', '', 2),
	('NY234ERRI45', 'Hornbill apartments', 500.00, '                                    Yes', 'midterm2.txt', 3),
	('Woow', 'hheheh', 500.00, '                                    Teesrsrsrrs', '', NULL),
	('Yeap3445s', 'Home away', 3400.00, '                                   This is a two bedroomed house.', '', 1);
/*!40000 ALTER TABLE `homes` ENABLE KEYS */;

-- Dumping data for table homemanager.multi_form_data: 3 rows
DELETE FROM `multi_form_data`;
/*!40000 ALTER TABLE `multi_form_data` DISABLE KEYS */;
INSERT INTO `multi_form_data` (`id`, `p_fname`, `p_lname`, `p_question1`, `p_question2`, `p_question3`, `name`, `Phone`, `address`, `city`, `state`, `zip`, `own`, `rent`, `month`, `hlong`, `rdaf1`, `rdaf2`, `rdaf3`, `rdaf4`, `rdaf5`, `ri1`, `ri2`, `ri3`, `ri4`, `ri5`, `ri6`, `ri7`, `ri8`, `ri9`, `ri10`, `status`) VALUES
	(1, 'CORNELIUS', 'KIPKORIR', 'Where did', 'hdhdhhd', 'ffsfsfs', 'dds', 'd8884', 'ffddf', 'hello', 'fffdf', '454554', 'on', 'on', '', '', '12ffd', 'fdff', '20', '123', 'ffsfsf', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'Approved'),
	(2, 'CORNELIUS', 'KIPKORIR', 'Where did', 'hdhdhhd', 'ffsfsfs', 'dds', 'd8884', 'ffddf', 'hello', 'fffdf', '454554', 'on', 'on', '', '', '12ffd', 'fdff', '20', '123', 'ffsfsf', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'Approved'),
	(3, 'sasas', 'sasdd', 'dsds', 'dsdd', 'dsdsd', 'ERIC', 'MUCHENAH', '134 MERU', 'MERU', 'MERU', '234567', '', '', '', 'on', '12HORNBILL', '20', '201', 'HORNBILL APARTS', 'HORNBILL', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'Approved');
/*!40000 ALTER TABLE `multi_form_data` ENABLE KEYS */;

-- Dumping data for table homemanager.prequel: ~1 rows (approximately)
DELETE FROM `prequel`;
/*!40000 ALTER TABLE `prequel` DISABLE KEYS */;
INSERT INTO `prequel` (`email`, `first_name`, `last_name`, `phone`, `question1`, `question2`, `question3`) VALUES
	('kilimoc@gmail.com', 'CORNELIUS', 'KIPKORIR KILIMO', '+254727922132', 'Do you have a home in LA?', 'What are your rental charges?', 'What are the deadlines?');
/*!40000 ALTER TABLE `prequel` ENABLE KEYS */;

-- Dumping data for table homemanager.received_payments: ~6 rows (approximately)
DELETE FROM `received_payments`;
/*!40000 ALTER TABLE `received_payments` DISABLE KEYS */;
INSERT INTO `received_payments` (`transaction_id`, `client_id`, `amount_payed`, `month_payed`) VALUES
	(8, 1, 600.00, '2018-02-26 14:28:53'),
	(9, 1, 600.00, '2018-02-26 14:30:48'),
	(10, 1, 2400.00, '2018-01-26 15:38:04'),
	(11, 2, 4500.00, '2018-03-26 16:58:06'),
	(12, 1, 3400.00, '2018-03-26 19:21:13'),
	(14, 3, 4500.00, '2018-03-26 22:51:33');
/*!40000 ALTER TABLE `received_payments` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
