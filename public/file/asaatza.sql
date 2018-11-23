-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2018 at 02:13 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asaatza`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_deactivate`
--

DROP TABLE IF EXISTS `account_deactivate`;
CREATE TABLE IF NOT EXISTS `account_deactivate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_awards`
--

DROP TABLE IF EXISTS `centre_awards`;
CREATE TABLE IF NOT EXISTS `centre_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `occassion` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_favourites`
--

DROP TABLE IF EXISTS `centre_favourites`;
CREATE TABLE IF NOT EXISTS `centre_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fav_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_gallery`
--

DROP TABLE IF EXISTS `centre_gallery`;
CREATE TABLE IF NOT EXISTS `centre_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `size` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_level`
--

DROP TABLE IF EXISTS `centre_level`;
CREATE TABLE IF NOT EXISTS `centre_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centre_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_personal_detail`
--

DROP TABLE IF EXISTS `centre_personal_detail`;
CREATE TABLE IF NOT EXISTS `centre_personal_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tag_line` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `language` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `lat-long` varchar(50) NOT NULL,
  `about` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `view` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `block` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centre_personal_detail`
--

INSERT INTO `centre_personal_detail` (`id`, `name`, `tag_line`, `email`, `contact`, `fax`, `skype`, `language`, `url`, `country`, `state`, `city`, `lat-long`, `about`, `created_on`, `view`, `status`, `featured`, `verified`, `rating`, `tag`, `suspended`, `block`) VALUES
(1, 'noman', 'null', 'nomanhussain45@gmail.com', '2147483647', '2147483647', 'nomanhussain624', 'english', 'nomanhussain345', 'pakistan', 'sindh', 'karachi', 'null', 'web developer ', '2017-07-12', 27, 1, 1, 1, 0, '', 1, 0),
(2, 'a', 'a', 'a', '123', '123', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', '2017-07-12', 9, 1, 0, 1, 0, '', 0, 0),
(3, 'a', 'a', 'a', '123', '123', 'a', 'a', 'a', 'a', 'a', 'a', 'aa', 'a', '2017-07-12', 50, 1, 1, 1, 0, '', 0, 0),
(4, 'a', 'a', 'a', '2147483647', '2147483647', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', 1500, 1, 0, 1, 0, '', 1, 1),
(5, 'a', 'a', 'a', '123456789098765432345678', '2147483647', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-07-12', 200, 1, 0, 0, 0, '', 0, 0),
(6, 'a', 'a', 'a', '123456789098765432345678', '2147483647', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2017-07-12', 359, 1, 0, 0, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `centre_schedule`
--

DROP TABLE IF EXISTS `centre_schedule`;
CREATE TABLE IF NOT EXISTS `centre_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(50) NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_social_detail`
--

DROP TABLE IF EXISTS `centre_social_detail`;
CREATE TABLE IF NOT EXISTS `centre_social_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centre_videos`
--

DROP TABLE IF EXISTS `centre_videos`;
CREATE TABLE IF NOT EXISTS `centre_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `change_pass_requested`
--

DROP TABLE IF EXISTS `change_pass_requested`;
CREATE TABLE IF NOT EXISTS `change_pass_requested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `for` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `pay_type` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `rate_per` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age_range` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `time_slot` varchar(25) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `lat_long` varchar(75) DEFAULT NULL,
  `job_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `for`, `qualification`, `subject`, `pay_type`, `title`, `rate`, `rate_per`, `gender`, `age_range`, `description`, `phone`, `fax`, `view`, `email`, `skype`, `time_slot`, `country`, `state`, `city`, `lat_long`, `job_by`, `user_id`, `status`, `created_on`) VALUES
(1, 'Montessori', 'Primary', NULL, 'Rupee', 'Need Tutor For Monterssori', '45', 'Per Hour', 'Male', '20-22', 'need a good tuto for my child he is sharp and just need some guideline ', NULL, NULL, NULL, NULL, NULL, NULL, 'Pakistan', 'Sindh', 'Karachi', '45678945,45678', NULL, NULL, 1, '2017-12-25 12:07:21'),
(2, 'Nursery', 'Primary', NULL, 'Rupee', 'Need Tutor For Nursery', '50', 'Per Hour', 'Male', '20-22', 'need a good tuto for my child he is sharp and just need some guideline ', NULL, NULL, NULL, NULL, NULL, NULL, 'Pakistan', 'Sindh', 'Karachi', '45678945,45678', NULL, NULL, 1, '2017-12-25 12:07:42'),
(4, 'Matric', 'Phd', NULL, 'Rupee', 'asdasdasd', '5000', 'Per Month', 'Male', '45-50', 'asdas', NULL, NULL, NULL, NULL, NULL, NULL, 'Pakistan', 'Sindh', 'Karachi', '4654654', NULL, NULL, 1, '2017-12-27 23:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `job_skill`
--

DROP TABLE IF EXISTS `job_skill`;
CREATE TABLE IF NOT EXISTS `job_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`id`, `job_id`, `skill`) VALUES
(1, 23, 'new'),
(2, 23, 'old'),
(3, 25, 'aaaaaaaa'),
(4, 25, 'aaaaaaaa'),
(5, 27, 'aaaaaa'),
(6, 27, 'aaaaaa'),
(7, 28, 'aaaaaaa'),
(8, 29, 'aaaaaaa'),
(9, 34, 'aaaaaaaaa'),
(10, 35, 'aaaaaaaaa'),
(11, 36, 'aaaaaaa'),
(12, 37, 'a'),
(13, 38, 'aaaaaaa'),
(14, 39, 'aaaa'),
(15, 40, 'aaa'),
(16, 41, 'aaaaaaa'),
(17, 42, 'a'),
(18, 43, 'aa'),
(19, 43, 'aa'),
(20, 44, 'Fuck you '),
(21, 44, 'Fuck you '),
(22, 45, 'asdas'),
(23, 45, 'asdasweew'),
(24, 46, 'nnnn'),
(25, 47, 'masood'),
(26, 47, 'english communication skill'),
(27, 48, 'asdas'),
(28, 49, 'kokok'),
(29, 50, 'asd'),
(30, 50, 'asdee'),
(31, 51, 'check'),
(32, 52, 'test 1 '),
(33, 52, 'test 2'),
(34, 53, 'test 1 '),
(35, 53, 'test 2'),
(36, 54, 'test 1 '),
(37, 54, 'test 2'),
(38, 55, 'test 1 '),
(39, 55, 'test 2'),
(40, 56, 'test 1 '),
(41, 56, 'test 2'),
(42, 57, 'test 1 '),
(43, 57, 'test 2'),
(44, 1, 'test1 '),
(45, 1, 'test 2'),
(46, 1, 'test 3'),
(47, 1, 'test 4'),
(48, 2, 'test1 '),
(49, 2, 'test 2'),
(50, 2, 'test 3'),
(51, 2, 'test 4'),
(52, 3, 'test1 '),
(53, 3, 'test 2'),
(54, 3, 'test 3'),
(55, 3, 'test 4'),
(56, 4, 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `job_subject`
--

DROP TABLE IF EXISTS `job_subject`;
CREATE TABLE IF NOT EXISTS `job_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_subject`
--

INSERT INTO `job_subject` (`id`, `job_id`, `subject_id`, `created_on`) VALUES
(1, 7, 2, '2017-09-10 09:20:55'),
(2, 7, 3, '2017-09-10 09:20:55'),
(3, 7, 4, '2017-09-10 09:20:55'),
(4, 7, 5, '2017-09-10 09:20:55'),
(5, 8, 1, '2017-09-10 09:35:40'),
(6, 8, 2, '2017-09-10 09:35:40'),
(7, 8, 3, '2017-09-10 09:35:40'),
(8, 8, 4, '2017-09-10 09:35:40'),
(9, 9, 1, '2017-09-10 09:37:21'),
(10, 9, 2, '2017-09-10 09:37:21'),
(11, 9, 3, '2017-09-10 09:37:21'),
(12, 9, 4, '2017-09-10 09:37:21'),
(13, 9, 5, '2017-09-10 09:37:22'),
(14, 10, 1, '2017-09-10 09:41:22'),
(15, 10, 2, '2017-09-10 09:41:22'),
(16, 10, 3, '2017-09-10 09:41:22'),
(17, 10, 4, '2017-09-10 09:41:22'),
(18, 10, 5, '2017-09-10 09:41:22'),
(19, 11, 0, '2017-09-10 09:41:47'),
(20, 12, 0, '2017-09-10 09:43:42'),
(21, 13, 0, '2017-09-10 09:44:23'),
(22, 14, 0, '2017-09-10 09:46:09'),
(23, 15, 0, '2017-09-10 09:48:37'),
(24, 16, 0, '2017-09-10 09:51:19'),
(25, 17, 0, '2017-09-10 09:57:07'),
(26, 18, 0, '2017-09-10 09:57:43'),
(27, 19, 0, '2017-09-10 09:58:59'),
(28, 20, 0, '2017-09-10 09:59:33'),
(29, 21, 0, '2017-09-10 10:00:18'),
(30, 22, 0, '2017-09-10 10:01:12'),
(31, 23, 0, '2017-09-10 10:09:34'),
(32, 24, 0, '2017-09-10 11:12:58'),
(33, 25, 0, '2017-09-10 11:13:28'),
(34, 26, 0, '2017-09-10 11:15:27'),
(35, 27, 0, '2017-09-10 11:15:35'),
(36, 28, 0, '2017-09-11 08:37:44'),
(37, 29, 0, '2017-09-11 08:37:53'),
(38, 30, 0, '2017-09-11 08:43:22'),
(39, 31, 0, '2017-09-11 08:44:08'),
(40, 32, 0, '2017-09-11 08:44:17'),
(41, 33, 0, '2017-09-11 08:44:23'),
(42, 34, 0, '2017-09-11 08:44:31'),
(43, 35, 0, '2017-09-11 08:46:22'),
(44, 36, 0, '2017-09-11 08:47:43'),
(45, 37, 0, '2017-09-11 08:49:24'),
(46, 38, 0, '2017-09-11 08:55:34'),
(47, 39, 0, '2017-09-11 09:35:36'),
(48, 40, 0, '2017-09-11 09:38:00'),
(49, 41, 0, '2017-09-11 09:38:56'),
(50, 42, 0, '2017-09-11 09:40:45'),
(51, 43, 3, '2017-09-11 10:04:45'),
(52, 43, 4, '2017-09-11 10:04:45'),
(53, 43, 5, '2017-09-11 10:04:45'),
(54, 44, 1, '2017-12-10 20:31:47'),
(55, 44, 4, '2017-12-10 20:31:47'),
(56, 44, 6, '2017-12-10 20:31:47'),
(57, 45, 3, '2017-12-10 22:35:13'),
(58, 45, 2, '2017-12-10 22:35:13'),
(59, 46, 5, '2017-12-10 22:44:13'),
(60, 47, 3, '2017-12-11 09:05:31'),
(61, 47, 2, '2017-12-11 09:05:31'),
(62, 47, 5, '2017-12-11 09:05:31'),
(63, 48, 3, '2017-12-19 17:39:02'),
(64, 48, 2, '2017-12-19 17:39:02'),
(65, 48, 6, '2017-12-19 17:39:02'),
(66, 49, 2, '2017-12-19 21:58:28'),
(67, 49, 4, '2017-12-19 21:58:28'),
(68, 49, 6, '2017-12-19 21:58:28'),
(69, 49, 7, '2017-12-19 21:58:28'),
(70, 49, 5, '2017-12-19 21:58:28'),
(71, 49, 3, '2017-12-19 21:58:28'),
(72, 50, 2, '2017-12-23 18:30:45'),
(73, 50, 4, '2017-12-23 18:30:45'),
(74, 50, 6, '2017-12-23 18:30:45'),
(75, 51, 0, '2017-12-24 19:07:50'),
(76, 51, 0, '2017-12-24 19:07:50'),
(77, 51, 0, '2017-12-24 19:07:50'),
(78, 51, 0, '2017-12-24 19:07:50'),
(79, 52, 0, '2017-12-25 11:11:42'),
(80, 52, 0, '2017-12-25 11:11:42'),
(81, 52, 0, '2017-12-25 11:11:42'),
(82, 53, 0, '2017-12-25 11:11:42'),
(83, 53, 0, '2017-12-25 11:11:42'),
(84, 53, 0, '2017-12-25 11:11:43'),
(85, 54, 0, '2017-12-25 11:11:43'),
(86, 54, 0, '2017-12-25 11:11:43'),
(87, 54, 0, '2017-12-25 11:11:43'),
(88, 55, 0, '2017-12-25 11:11:44'),
(89, 55, 0, '2017-12-25 11:11:44'),
(90, 55, 0, '2017-12-25 11:11:44'),
(91, 56, 0, '2017-12-25 11:11:45'),
(92, 56, 0, '2017-12-25 11:11:45'),
(93, 56, 0, '2017-12-25 11:11:45'),
(94, 57, 0, '2017-12-25 11:11:46'),
(95, 57, 0, '2017-12-25 11:11:46'),
(96, 57, 0, '2017-12-25 11:11:46'),
(97, 1, 0, '2017-12-25 12:07:21'),
(98, 1, 0, '2017-12-25 12:07:21'),
(99, 2, 0, '2017-12-25 12:07:42'),
(100, 2, 0, '2017-12-25 12:07:42'),
(101, 3, 0, '2017-12-25 12:07:59'),
(102, 3, 0, '2017-12-25 12:07:59'),
(103, 4, 0, '2017-12-27 23:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_template`
--

DROP TABLE IF EXISTS `newsletter_template`;
CREATE TABLE IF NOT EXISTS `newsletter_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_template`
--

INSERT INTO `newsletter_template` (`id`, `name`, `path`) VALUES
(1, 'Boxed-1', 'newsletter.Boxed-1.index'),
(2, 'Boxed-2', 'newsletter.Boxed-2.index'),
(3, 'Boxed-3', 'newsletter.Boxed-3.index'),
(4, 'Boxed-4', 'newsletter.Boxed-4.index'),
(5, 'Catalog', 'newsletter.Catalog.index'),
(6, 'Checkout', 'newsletter.Checkout.index'),
(7, 'Container', 'newsletter.Container.index'),
(8, 'Feature-1', 'newsletter.Feature-1.index'),
(9, 'Feature-2', 'newsletter.Feature-2.index'),
(10, 'Invite', 'newsletter.Invite.index'),
(11, 'Main', 'newsletter.Main.index'),
(12, 'Main-2', 'newsletter.Main-2.index'),
(13, 'Main-3', 'newsletter.Main-3.index'),
(14, 'Main-4', 'newsletter.Main-4.index'),
(15, 'Main-Container', 'newsletter.Main-Container.index'),
(16, 'Notification-1', 'newsletter.Notification-1.index'),
(17, 'Notification-2', 'newsletter.Notification-2.index'),
(18, 'Notification-3', 'newsletter.Notification-3.index'),
(19, 'Notification-4', 'newsletter.Notification-4.index'),
(20, 'Notification-5', 'newsletter.Notification-5.index'),
(21, 'Notification-6', 'newsletter.Notification-6.index'),
(22, 'Notification-7', 'newsletter.Notification-7.index'),
(23, 'Notification-8', 'newsletter.Notification-8.index'),
(24, 'Notification-9', 'newsletter.Notification-9.index'),
(25, 'Notification-10', 'newsletter.Notification-10.index'),
(26, 'Notification-11', 'newsletter.Notification-11.index'),
(27, 'Notification-12', 'newsletter.Notification-12.index'),
(28, 'Notification-13', 'newsletter.Notification-13.index'),
(29, 'Notification-14', 'newsletter.Notification-14.index'),
(30, 'Promotion-1', 'newsletter.Promotion-1.index'),
(31, 'Promotion-2', 'newsletter.Promotion-2.index'),
(32, 'Promotion-3', 'newsletter.Promotion-3.index'),
(33, 'Promotion-4', 'newsletter.Promotion-4.index'),
(34, 'VedioPresent', 'newsletter.VideoPresent.index');

-- --------------------------------------------------------

--
-- Table structure for table `parent_fav`
--

DROP TABLE IF EXISTS `parent_fav`;
CREATE TABLE IF NOT EXISTS `parent_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent_personal`
--

DROP TABLE IF EXISTS `parent_personal`;
CREATE TABLE IF NOT EXISTS `parent_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `age` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `nic` varchar(25) DEFAULT NULL,
  `country` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `lat-long` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `about` varchar(200) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_expiry` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_personal`
--

INSERT INTO `parent_personal` (`id`, `name`, `gender`, `age`, `email`, `contact`, `fax`, `skype`, `nic`, `country`, `state`, `city`, `lat-long`, `image`, `about`, `package_id`, `package_expiry`, `status`, `suspended`, `block`, `created_on`) VALUES
(1, 'ahfsf', 1, 32, 'parent@email.com', 'dfasf', 'safaasf', 'asdfsdaf', '3287648732648763284763', 'pak', 'sindh', 'khi', 'pata nahe', 'boy.png', 'asdfsaf', 0, '0000-00-00', 1, 1, 0, '0000-00-00'),
(2, 'ahfsf', 1, 32, 'parent@email.com', 'dfasf', 'safaasf', 'asdfsdaf', '', '', '', '', '', 'boy.png', 'asdfsaf', 0, '0000-00-00', 1, 0, 1, '0000-00-00'),
(3, 'hogyayagaygdaydgaydgajsdgaud', 1, 0, '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 0, 0, '0000-00-00'),
(4, 'ahad ali', 1, 0, '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 1, 0, 0, '0000-00-00'),
(5, 'Masood', 1, 0, '', '', '', '', NULL, '', '', '', '', NULL, '', NULL, NULL, 1, 0, 0, '0000-00-00'),
(6, 'asd', 1, 0, 'as@gmail.com', '2323', 'asddsa', 'undefined', NULL, 'United States', 'Sindh', 'New York', '', NULL, 'asdsaadsdsad', NULL, NULL, 1, 0, 0, '0000-00-00'),
(7, 'wqe', 1, 0, 'w@gmail.com', '23232', '232323', 'undefined', NULL, 'United States', 'Sindh', 'Karachi', '', NULL, 'asdsaasd', NULL, NULL, 1, 0, 0, '0000-00-00'),
(8, 'qwe', 1, 0, 'asd@gmail.com', '789', '8798', 'undefined', NULL, 'United States', 'Sindh', 'Karachi', '', NULL, 'sadwfadcwcc cwxcrrav rv ', NULL, NULL, 1, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `parent_social`
--

DROP TABLE IF EXISTS `parent_social`;
CREATE TABLE IF NOT EXISTS `parent_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `meta` varchar(50) NOT NULL,
  `key` varchar(25) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_awards`
--

DROP TABLE IF EXISTS `tutor_awards`;
CREATE TABLE IF NOT EXISTS `tutor_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `occassion` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_exp`
--

DROP TABLE IF EXISTS `tutor_exp`;
CREATE TABLE IF NOT EXISTS `tutor_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `company` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_favourite`
--

DROP TABLE IF EXISTS `tutor_favourite`;
CREATE TABLE IF NOT EXISTS `tutor_favourite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_gallery`
--

DROP TABLE IF EXISTS `tutor_gallery`;
CREATE TABLE IF NOT EXISTS `tutor_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_location`
--

DROP TABLE IF EXISTS `tutor_location`;
CREATE TABLE IF NOT EXISTS `tutor_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_personal`
--

DROP TABLE IF EXISTS `tutor_personal`;
CREATE TABLE IF NOT EXISTS `tutor_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `skype` varchar(200) NOT NULL,
  `website_url` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `rate_per` int(11) NOT NULL,
  `about` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `block` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_personal`
--

INSERT INTO `tutor_personal` (`id`, `name`, `gender`, `age`, `subject_id`, `email`, `contact`, `fax`, `skype`, `website_url`, `rate`, `rate_per`, `about`, `status`, `view`, `suspended`, `block`, `image`, `created_on`) VALUES
(1, 'a', 1, 24, 2, 'abc@gmail.com', '1234567890', '1234567890', 'abcnew', 'abc.com', 24, 12, 'nothing', 1, 1500, 0, 0, 'boy.png', '2017-07-12'),
(2, 'abc', 1, 13, 1, 'abc@new.com', '123456789', '1234567890', 'skype', 'skype.com', 1200, 800, 'nothing but space', 1, 78, 1, 1, 'boy.png', '2017-07-13'),
(3, 'abc', 1, 13, 1, 'abc@new.com', '123456789', '1234567890', 'skype', 'skype.com', 1200, 800, 'nothing but space', 1, 678, 0, 0, 'boy.png', '2017-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_qualification`
--

DROP TABLE IF EXISTS `tutor_qualification`;
CREATE TABLE IF NOT EXISTS `tutor_qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `major` varchar(200) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_request`
--

DROP TABLE IF EXISTS `tutor_request`;
CREATE TABLE IF NOT EXISTS `tutor_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `request_type` varchar(200) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_reviews`
--

DROP TABLE IF EXISTS `tutor_reviews`;
CREATE TABLE IF NOT EXISTS `tutor_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_schedule`
--

DROP TABLE IF EXISTS `tutor_schedule`;
CREATE TABLE IF NOT EXISTS `tutor_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `day_id` int(1) NOT NULL,
  `starting_time` date NOT NULL,
  `ending_time` date NOT NULL,
  `is_working` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_setting`
--

DROP TABLE IF EXISTS `tutor_setting`;
CREATE TABLE IF NOT EXISTS `tutor_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` date NOT NULL,
  `charged_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_skills`
--

DROP TABLE IF EXISTS `tutor_skills`;
CREATE TABLE IF NOT EXISTS `tutor_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_social`
--

DROP TABLE IF EXISTS `tutor_social`;
CREATE TABLE IF NOT EXISTS `tutor_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `meta_key` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_videos`
--

DROP TABLE IF EXISTS `tutor_videos`;
CREATE TABLE IF NOT EXISTS `tutor_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Parent'),
(2, 'Tutor'),
(3, 'Institute');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `user_id`, `role_id`, `verified`, `created_on`) VALUES
(1, 'kk', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'noman', 'hussain', '0', '123', 1, NULL, NULL, NULL),
(3, 'nomanhussain', 'usmani', '0', '799', 2, NULL, NULL, NULL),
(4, 'Noman', 'hussain', 'nomanhussain45@gmail.com', '123', NULL, NULL, NULL, NULL),
(5, 'Ahad', 'Ali', 'ahadali96@gmail.com', 'aadee', NULL, NULL, NULL, NULL),
(6, 'test', 'teset', 'test@gmail.com', '789', NULL, 1, NULL, NULL),
(7, 'isqh', 'khan', 'noman@gmail.com', '456', NULL, 1, NULL, NULL),
(8, 'a', 'a', 'a', 'aaaa', NULL, 1, NULL, NULL),
(9, 'a', 'a', '', '', NULL, 0, NULL, NULL),
(10, 'a', 'a', '', '', NULL, 0, NULL, NULL),
(11, 'a', 'b', 'ccc', 'c', NULL, 1, NULL, NULL),
(12, 'a', 'a', 'a', 'a', NULL, 0, NULL, NULL),
(13, 'a', 'a', 'a', 'a', NULL, 1, NULL, NULL),
(14, '', '', '', '', NULL, 0, NULL, NULL),
(15, 'a', '', '', '', NULL, 0, NULL, NULL),
(16, '', '', '', '', NULL, 0, NULL, NULL),
(17, '', '', '', '', NULL, 0, NULL, NULL),
(18, '', '', '', '', NULL, 0, NULL, NULL),
(19, '', '', '', '', NULL, 0, NULL, NULL),
(20, 'gg', 'hhh', 'g', 'd', NULL, 3, NULL, NULL),
(21, '', '', '', '', NULL, 0, NULL, NULL),
(22, '', '', '', '', NULL, 0, NULL, NULL),
(23, '', '', '', '', NULL, 0, NULL, NULL),
(24, '', '', '', '', NULL, 0, NULL, NULL),
(25, '', '', '', '', NULL, 0, NULL, NULL),
(26, '', '', '', '', NULL, 0, NULL, NULL),
(27, '', '', '', '', NULL, 0, NULL, NULL),
(28, '', '', '', '', NULL, 0, NULL, NULL),
(29, '', '', '', '', NULL, 0, NULL, NULL),
(30, '', '', '', '', NULL, 0, NULL, NULL),
(31, '', '', '', '', NULL, 0, NULL, NULL),
(32, '', '', '', '', NULL, 0, NULL, NULL),
(33, '', '', '', '', NULL, 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
