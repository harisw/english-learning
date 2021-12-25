-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for englearn
CREATE DATABASE IF NOT EXISTS `englearn` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `englearn`;

-- Dumping structure for table englearn.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `word_tokens` varchar(255) DEFAULT NULL,
  `timestamp` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table englearn.question: ~8 rows (approximately)
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `video_id`, `word_tokens`, `timestamp`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 'Maui, shape shifter, demigod of the wind and sea. I am Moana Hero of men. What?', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(2, 2, 'It\'s actually Maui, shape shifter, demigod of the wind and sea, hero of men.', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(3, 2, 'I interrupted, from the top. Hero of men, go', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(4, 2, 'Uh, I am Mo... Sorry, sorry, sorry, sorry, and women, men and women, both, all, not a guy girl thing', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(5, 2, 'You know, Maui is a hero to all. You\'re doing great', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(6, 2, 'What, no, I\'m here to', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(7, 2, 'Oh of course, of course, yes yes yes yes, Maui always has time for his fans', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(8, 2, 'When you use a bird to write with, it\'s called tweeting', NULL, '2021-12-23 09:22:16', '2021-12-23 09:22:16', NULL),
	(9, 3, 'Ninth-grade skirt and eleventh-grade body Perfect', NULL, '2021-12-24 11:44:06', '2021-12-24 11:44:06', NULL),
	(10, 3, 'Nice landing, ace', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(11, 3, 'Well, if you got your driver\'s license,', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(12, 3, 'you wouldn\'t have to put up with my driving. now would you?', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(13, 3, 'Okay, but why would I do that', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(14, 3, 'when I have you as my personal chauffeur? True', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(15, 3, 'Oh and today, fundraiser ideas', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(16, 3, 'Fine thank you', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(17, 3, 'Jeez guys, check out that', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(18, 3, 'Oh my word', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(19, 3, 'Yo I think that\'s Elle Evans', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(20, 3, 'Everybody\'s looking at us', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(21, 3, 'Allow me to revise. Everyone is looking at you', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(22, 3, 'What? No, they\'re not', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(23, 3, 'Elle, you are aware that your lady shape sort of changed over the summer, right?', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(24, 3, 'It was true. This was the moment that happens to all of us', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(25, 3, 'when you suddenly go from invisible to everyone staring at you', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(26, 3, 'What the hell Tuppen? It\'s fine Lee I got this Relax, tiny Flynn', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(27, 3, 'How about I relax your face', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(28, 3, 'Lee it\'s fine! I got this! Lee!', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(29, 3, 'I did not think that through. No, no, no!', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(30, 3, 'Noah! Noah, stop! Enough, Noah! Stop! Are you crazy?', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(31, 3, 'Knock it off! Knock it off!', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL),
	(32, 3, 'Now you three, in my office! Me? Now!', NULL, '2021-12-24 11:44:07', '2021-12-24 11:44:07', NULL);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;

-- Dumping structure for table englearn.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table englearn.video: ~2 rows (approximately)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`id`, `title`, `slug`, `link`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Moana', NULL, 'https://youtube.com/embed/Yh6RYRrsaVs?enablejsapi=1', 0, '2021-12-23 07:33:11', '2021-12-23 18:33:53', NULL),
	(2, 'Moana', NULL, 'https://youtube.com/embed/Yh6RYRrsaVs?enablejsapi=1', 0, '2021-12-23 07:33:30', '2021-12-23 18:36:57', NULL),
	(3, 'Kissing Booth', NULL, 'https://youtube.com/embed/9328CMKzEvU?enablejsapi=1', 0, '2021-12-24 20:26:42', '2021-12-24 20:28:17', NULL);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
