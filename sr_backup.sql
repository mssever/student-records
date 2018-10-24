-- THIS FILE CONTAINS SAMPLE DATA. DELETE IT BEFORE USING THE APP FOR REAL!
--
--
-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 05:40 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.6-1ubuntu1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `attendance` enum('Present','Absent','Tardy','Early Departure','Tardy/Early Departure') CHARACTER SET utf8 NOT NULL DEFAULT 'Present',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=345 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `class_id`, `student_id`, `date`, `attendance`) VALUES
(1, 2, 15, '2013-10-28', 'Absent'),
(2, 2, 1, '2013-10-28', 'Present'),
(3, 2, 5, '2013-10-28', 'Absent'),
(4, 2, 10, '2013-10-28', 'Present'),
(5, 2, 14, '2013-10-28', 'Absent'),
(6, 2, 7, '2013-10-28', 'Absent'),
(7, 2, 6, '2013-10-28', 'Absent'),
(8, 2, 4, '2013-10-28', 'Present'),
(9, 2, 13, '2013-10-28', 'Absent'),
(10, 2, 8, '2013-10-28', 'Present'),
(11, 2, 2, '2013-10-28', 'Absent'),
(12, 2, 3, '2013-10-28', 'Present'),
(13, 2, 12, '2013-10-28', 'Present'),
(14, 2, 16, '2013-10-28', 'Absent'),
(15, 2, 9, '2013-10-28', 'Present'),
(16, 2, 11, '2013-10-28', 'Present'),
(17, 2, 15, '2013-10-29', 'Absent'),
(18, 2, 1, '2013-10-29', 'Absent'),
(19, 2, 5, '2013-10-29', 'Present'),
(20, 2, 10, '2013-10-29', 'Absent'),
(21, 2, 14, '2013-10-29', 'Present'),
(22, 2, 7, '2013-10-29', 'Present'),
(23, 2, 6, '2013-10-29', 'Present'),
(24, 2, 4, '2013-10-29', 'Absent'),
(25, 2, 13, '2013-10-29', 'Present'),
(26, 2, 8, '2013-10-29', 'Present'),
(27, 2, 2, '2013-10-29', 'Present'),
(28, 2, 3, '2013-10-29', 'Present'),
(29, 2, 12, '2013-10-29', 'Present'),
(30, 2, 16, '2013-10-29', 'Absent'),
(31, 2, 9, '2013-10-29', 'Absent'),
(32, 2, 11, '2013-10-29', 'Present'),
(33, 2, 15, '2013-10-31', 'Present'),
(34, 2, 1, '2013-10-31', 'Present'),
(35, 2, 5, '2013-10-31', 'Absent'),
(36, 2, 10, '2013-10-31', 'Absent'),
(37, 2, 14, '2013-10-31', 'Present'),
(38, 2, 7, '2013-10-31', 'Present'),
(39, 2, 6, '2013-10-31', 'Present'),
(40, 2, 4, '2013-10-31', 'Present'),
(41, 2, 13, '2013-10-31', 'Present'),
(42, 2, 8, '2013-10-31', 'Present'),
(43, 2, 2, '2013-10-31', 'Present'),
(44, 2, 3, '2013-10-31', 'Present'),
(45, 2, 12, '2013-10-31', 'Present'),
(46, 2, 16, '2013-10-31', 'Present'),
(47, 2, 9, '2013-10-31', 'Absent'),
(48, 2, 11, '2013-10-31', 'Present'),
(49, 1, 19, '2013-10-31', 'Present'),
(50, 1, 17, '2013-10-31', 'Tardy'),
(51, 1, 18, '2013-10-31', 'Tardy'),
(53, 1, 17, '2013-11-04', 'Absent'),
(54, 1, 20, '2013-11-04', 'Present'),
(56, 1, 19, '2013-11-04', 'Present'),
(58, 1, 18, '2013-11-04', 'Present'),
(60, 2, 15, '2013-11-04', 'Tardy'),
(61, 2, 1, '2013-11-04', 'Present'),
(62, 2, 5, '2013-11-04', 'Present'),
(63, 2, 10, '2013-11-04', 'Absent'),
(64, 2, 14, '2013-11-04', 'Absent'),
(65, 2, 7, '2013-11-04', 'Present'),
(66, 2, 6, '2013-11-04', 'Present'),
(67, 2, 4, '2013-11-04', 'Present'),
(68, 2, 21, '2013-11-04', 'Present'),
(69, 2, 13, '2013-11-04', 'Present'),
(70, 2, 16, '2013-11-04', 'Absent'),
(71, 2, 8, '2013-11-04', 'Present'),
(72, 2, 2, '2013-11-04', 'Present'),
(73, 2, 3, '2013-11-04', 'Present'),
(74, 2, 12, '2013-11-04', 'Present'),
(75, 2, 11, '2013-11-04', 'Present'),
(76, 2, 9, '2013-11-04', 'Absent'),
(77, 2, 21, '2013-10-28', 'Present'),
(78, 2, 21, '2013-10-29', 'Present'),
(79, 2, 21, '2013-10-30', 'Present'),
(80, 2, 21, '2013-10-31', 'Present'),
(81, 1, 20, '2013-11-05', 'Present'),
(82, 1, 18, '2013-11-05', 'Tardy'),
(83, 1, 19, '2013-11-05', 'Present'),
(84, 1, 23, '2013-11-05', 'Tardy'),
(85, 2, 15, '2013-11-05', 'Absent'),
(86, 2, 1, '2013-11-05', 'Present'),
(87, 2, 5, '2013-11-05', 'Present'),
(88, 2, 10, '2013-11-05', 'Absent'),
(89, 2, 14, '2013-11-05', 'Absent'),
(90, 2, 7, '2013-11-05', 'Present'),
(91, 2, 6, '2013-11-05', 'Present'),
(92, 2, 4, '2013-11-05', 'Present'),
(93, 2, 21, '2013-11-05', 'Present'),
(94, 2, 13, '2013-11-05', 'Present'),
(95, 2, 16, '2013-11-05', 'Absent'),
(96, 2, 8, '2013-11-05', 'Present'),
(97, 2, 2, '2013-11-05', 'Present'),
(98, 2, 3, '2013-11-05', 'Present'),
(99, 2, 12, '2013-11-05', 'Absent'),
(100, 2, 11, '2013-11-05', 'Present'),
(101, 2, 9, '2013-11-05', 'Absent'),
(103, 1, 20, '2013-11-06', 'Absent'),
(104, 1, 18, '2013-11-06', 'Present'),
(105, 1, 19, '2013-11-06', 'Present'),
(106, 1, 23, '2013-11-06', 'Tardy'),
(107, 2, 15, '2013-11-06', 'Tardy'),
(108, 2, 1, '2013-11-06', 'Present'),
(109, 2, 5, '2013-11-06', 'Absent'),
(110, 2, 10, '2013-11-06', 'Absent'),
(111, 2, 14, '2013-11-06', 'Present'),
(112, 2, 7, '2013-11-06', 'Present'),
(113, 2, 6, '2013-11-06', 'Present'),
(114, 2, 4, '2013-11-06', 'Present'),
(115, 2, 21, '2013-11-06', 'Present'),
(116, 2, 13, '2013-11-06', 'Absent'),
(117, 2, 16, '2013-11-06', 'Absent'),
(118, 2, 8, '2013-11-06', 'Early Departure'),
(119, 2, 2, '2013-11-06', 'Present'),
(120, 2, 3, '2013-11-06', 'Present'),
(121, 2, 12, '2013-11-06', 'Present'),
(122, 2, 11, '2013-11-06', 'Present'),
(123, 1, 20, '2013-11-07', 'Present'),
(124, 1, 18, '2013-11-07', 'Tardy'),
(125, 1, 19, '2013-11-07', 'Present'),
(126, 1, 23, '2013-11-07', 'Tardy'),
(127, 2, 15, '2013-11-07', 'Present'),
(128, 2, 1, '2013-11-07', 'Absent'),
(129, 2, 5, '2013-11-07', 'Present'),
(130, 2, 10, '2013-11-07', 'Absent'),
(131, 2, 14, '2013-11-07', 'Present'),
(132, 2, 7, '2013-11-07', 'Early Departure'),
(133, 2, 6, '2013-11-07', 'Present'),
(134, 2, 4, '2013-11-07', 'Early Departure'),
(135, 2, 21, '2013-11-07', 'Present'),
(136, 2, 13, '2013-11-07', 'Present'),
(137, 2, 16, '2013-11-07', 'Absent'),
(138, 2, 8, '2013-11-07', 'Present'),
(139, 2, 2, '2013-11-07', 'Absent'),
(140, 2, 3, '2013-11-07', 'Present'),
(141, 2, 12, '2013-11-07', 'Present'),
(142, 2, 11, '2013-11-07', 'Early Departure'),
(143, 3, 24, '2013-10-28', 'Present'),
(144, 3, 29, '2013-10-28', 'Present'),
(145, 3, 26, '2013-10-28', 'Absent'),
(146, 3, 25, '2013-10-28', 'Absent'),
(147, 3, 27, '2013-10-28', 'Present'),
(148, 3, 30, '2013-10-28', 'Absent'),
(149, 3, 31, '2013-10-28', 'Absent'),
(150, 3, 28, '2013-10-28', 'Present'),
(151, 3, 33, '2013-10-28', 'Tardy'),
(152, 3, 32, '2013-10-28', 'Present'),
(153, 3, 24, '2013-10-29', 'Present'),
(154, 3, 29, '2013-10-29', 'Present'),
(155, 3, 26, '2013-10-29', 'Absent'),
(156, 3, 25, '2013-10-29', 'Absent'),
(157, 3, 27, '2013-10-29', 'Present'),
(158, 3, 30, '2013-10-29', 'Absent'),
(159, 3, 31, '2013-10-29', 'Absent'),
(160, 3, 28, '2013-10-29', 'Absent'),
(161, 3, 33, '2013-10-29', 'Absent'),
(162, 3, 32, '2013-10-29', 'Present'),
(163, 3, 24, '2013-10-30', 'Tardy'),
(164, 3, 29, '2013-10-30', 'Tardy'),
(165, 3, 26, '2013-10-30', 'Absent'),
(166, 3, 25, '2013-10-30', 'Absent'),
(167, 3, 27, '2013-10-30', 'Tardy'),
(168, 3, 30, '2013-10-30', 'Absent'),
(169, 3, 31, '2013-10-30', 'Absent'),
(170, 3, 28, '2013-10-30', 'Absent'),
(171, 3, 33, '2013-10-30', 'Tardy'),
(172, 3, 32, '2013-10-30', 'Tardy'),
(173, 3, 24, '2013-10-31', 'Absent'),
(174, 3, 29, '2013-10-31', 'Present'),
(175, 3, 26, '2013-10-31', 'Absent'),
(176, 3, 25, '2013-10-31', 'Absent'),
(177, 3, 27, '2013-10-31', 'Absent'),
(178, 3, 30, '2013-10-31', 'Absent'),
(179, 3, 31, '2013-10-31', 'Absent'),
(180, 3, 28, '2013-10-31', 'Absent'),
(181, 3, 33, '2013-10-31', 'Present'),
(182, 3, 32, '2013-10-31', 'Present'),
(183, 3, 24, '2013-11-04', 'Present'),
(184, 3, 29, '2013-11-04', 'Tardy'),
(185, 3, 26, '2013-11-04', 'Absent'),
(186, 3, 25, '2013-11-04', 'Absent'),
(187, 3, 27, '2013-11-04', 'Present'),
(188, 3, 30, '2013-11-04', 'Absent'),
(189, 3, 31, '2013-11-04', 'Absent'),
(190, 3, 28, '2013-11-04', 'Present'),
(191, 3, 33, '2013-11-04', 'Present'),
(192, 3, 32, '2013-11-04', 'Present'),
(194, 3, 32, '2013-11-05', 'Present'),
(195, 3, 29, '2013-11-05', 'Present'),
(196, 3, 26, '2013-11-05', 'Absent'),
(199, 3, 31, '2013-11-05', 'Absent'),
(201, 3, 27, '2013-11-05', 'Tardy'),
(203, 3, 24, '2013-11-05', 'Present'),
(207, 3, 25, '2013-11-05', 'Absent'),
(208, 3, 30, '2013-11-05', 'Absent'),
(210, 3, 28, '2013-11-05', 'Absent'),
(212, 3, 33, '2013-11-05', 'Absent'),
(224, 3, 24, '2013-11-11', 'Absent'),
(225, 3, 32, '2013-11-11', 'Present'),
(226, 3, 29, '2013-11-11', 'Present'),
(229, 3, 30, '2013-11-11', 'Absent'),
(230, 3, 31, '2013-11-11', 'Absent'),
(232, 3, 27, '2013-11-11', 'Present'),
(233, 3, 33, '2013-11-11', 'Absent'),
(234, 3, 24, '2013-11-06', 'Present'),
(235, 3, 32, '2013-11-06', 'Present'),
(236, 3, 29, '2013-11-06', 'Present'),
(237, 3, 26, '2013-11-06', 'Absent'),
(238, 3, 25, '2013-11-06', 'Absent'),
(239, 3, 30, '2013-11-06', 'Absent'),
(240, 3, 31, '2013-11-06', 'Absent'),
(241, 3, 28, '2013-11-06', 'Absent'),
(242, 3, 27, '2013-11-06', 'Present'),
(243, 3, 33, '2013-11-06', 'Absent'),
(244, 3, 24, '2013-11-07', 'Present'),
(245, 3, 32, '2013-11-07', 'Present'),
(246, 3, 29, '2013-11-07', 'Present'),
(247, 3, 26, '2013-11-07', 'Absent'),
(248, 3, 25, '2013-11-07', 'Absent'),
(249, 3, 30, '2013-11-07', 'Absent'),
(250, 3, 31, '2013-11-07', 'Absent'),
(251, 3, 28, '2013-11-07', 'Absent'),
(252, 3, 27, '2013-11-07', 'Present'),
(253, 3, 33, '2013-11-07', 'Present'),
(254, 3, 24, '2013-11-12', 'Tardy'),
(255, 3, 32, '2013-11-12', 'Early Departure'),
(256, 3, 29, '2013-11-12', 'Present'),
(258, 3, 27, '2013-11-12', 'Tardy'),
(259, 3, 33, '2013-11-12', 'Tardy'),
(260, 3, 24, '2013-11-13', 'Absent'),
(261, 3, 32, '2013-11-13', 'Present'),
(262, 3, 29, '2013-11-13', 'Present'),
(263, 3, 27, '2013-11-13', 'Tardy'),
(264, 3, 33, '2013-11-13', 'Tardy/Early Departure'),
(265, 3, 24, '2013-11-14', 'Tardy'),
(266, 3, 32, '2013-11-14', 'Present'),
(267, 3, 29, '2013-11-14', 'Present'),
(268, 3, 27, '2013-11-14', 'Tardy'),
(269, 3, 33, '2013-11-14', 'Absent'),
(270, 3, 24, '2013-11-18', 'Tardy'),
(271, 3, 32, '2013-11-18', 'Present'),
(272, 3, 29, '2013-11-18', 'Tardy'),
(273, 3, 27, '2013-11-18', 'Absent'),
(274, 3, 33, '2013-11-18', 'Absent'),
(275, 3, 28, '2013-11-18', 'Tardy'),
(276, 3, 24, '2013-11-19', 'Tardy'),
(277, 3, 32, '2013-11-19', 'Absent'),
(278, 3, 29, '2013-11-19', 'Present'),
(279, 3, 28, '2013-11-19', 'Absent'),
(280, 3, 27, '2013-11-19', 'Tardy'),
(281, 3, 33, '2013-11-19', 'Absent'),
(282, 3, 24, '2013-11-20', 'Tardy'),
(283, 3, 32, '2013-11-20', 'Present'),
(284, 3, 29, '2013-11-20', 'Present'),
(285, 3, 28, '2013-11-20', 'Absent'),
(286, 3, 27, '2013-11-20', 'Tardy'),
(287, 3, 33, '2013-11-20', 'Tardy'),
(288, 3, 24, '2013-11-21', 'Tardy'),
(289, 3, 32, '2013-11-21', 'Absent'),
(290, 3, 29, '2013-11-21', 'Present'),
(291, 3, 28, '2013-11-21', 'Absent'),
(292, 3, 27, '2013-11-21', 'Tardy'),
(293, 3, 33, '2013-11-21', 'Absent'),
(314, 5, 39, '2013-12-02', 'Tardy/Early Departure'),
(317, 5, 39, '2013-12-03', 'Absent'),
(323, 5, 39, '2013-12-04', 'Absent'),
(329, 5, 39, '2013-12-10', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  `type` enum('Grammar','Reading') DEFAULT NULL,
  `time` time NOT NULL COMMENT 'The time the class starts every day',
  `term_begins` date NOT NULL COMMENT 'The first day of the term',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `level`, `type`, `time`, `term_begins`) VALUES
(1, '4', 'Grammar', '08:30:00', '2013-10-28'),
(2, '6', 'Reading', '11:05:00', '2013-10-28'),
(3, '12', 'Grammar', '08:30:00', '2013-10-28'),
(4, '12', 'Reading', '11:05:00', '2013-10-28'),
(5, '4', 'Grammar', '18:00:00', '2013-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `class_roster`
--

DROP TABLE IF EXISTS `class_roster`;
CREATE TABLE `class_roster` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `class_roster`
--

INSERT INTO `class_roster` (`id`, `class_id`, `student_id`) VALUES
(7, 2, 2),
(9, 2, 4),
(11, 2, 15),
(12, 2, 1),
(13, 2, 5),
(14, 2, 3),
(15, 2, 7),
(16, 2, 13),
(18, 2, 16),
(19, 2, 12),
(20, 2, 6),
(21, 2, 11),
(22, 2, 14),
(23, 2, 8),
(24, 2, 10),
(25, 1, 19),
(26, 1, 18),
(29, 1, 20),
(30, 2, 21),
(33, 1, 23),
(34, 3, 24),
(37, 3, 27),
(39, 3, 29),
(42, 3, 32),
(43, 3, 33),
(44, 4, 24),
(45, 4, 25),
(46, 4, 26),
(47, 4, 27),
(48, 4, 28),
(49, 4, 29),
(50, 4, 30),
(51, 4, 31),
(52, 4, 32),
(53, 4, 33),
(56, 3, 28),
(57, 3, 25),
(58, 3, 26),
(59, 3, 30),
(60, 3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `score` decimal(5,2) unsigned NOT NULL,
  `score_possible` tinyint(3) unsigned NOT NULL DEFAULT '100',
  `final_test` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `class_id`, `student_id`, `date`, `score`, `score_possible`, `final_test`, `description`) VALUES
(1, 2, 15, '2013-10-31', 0.00, 22, 0, 'Vocab quiz 1'),
(2, 2, 1, '2013-10-31', 19.00, 22, 0, 'Vocab quiz 1'),
(3, 2, 5, '2013-10-31', 0.00, 22, 0, 'Vocab quiz 1'),
(4, 2, 10, '2013-10-31', 0.00, 22, 0, 'Vocab quiz 1'),
(5, 2, 14, '2013-10-31', 11.00, 22, 0, 'Vocab quiz 1'),
(6, 2, 7, '2013-10-31', 19.00, 22, 0, 'Vocab quiz 1'),
(7, 2, 6, '2013-10-31', 20.00, 22, 0, 'Vocab quiz 1'),
(8, 2, 4, '2013-10-31', 20.00, 22, 0, 'Vocab quiz 1'),
(9, 2, 21, '2013-10-31', 0.00, 22, 0, 'Vocab quiz 1'),
(10, 2, 13, '2013-10-31', 20.00, 22, 0, 'Vocab quiz 1'),
(11, 2, 16, '2013-10-31', 10.00, 22, 0, 'Vocab quiz 1'),
(12, 2, 8, '2013-10-31', 20.00, 22, 0, 'Vocab quiz 1'),
(13, 2, 2, '2013-10-31', 14.00, 22, 0, 'Vocab quiz 1'),
(14, 2, 3, '2013-10-31', 18.00, 22, 0, 'Vocab quiz 1'),
(15, 2, 12, '2013-10-31', 22.00, 22, 0, 'Vocab quiz 1'),
(16, 2, 11, '2013-10-31', 21.50, 22, 0, 'Vocab quiz 1'),
(17, 2, 15, '2013-11-07', 12.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(18, 2, 1, '2013-11-07', 2.50, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(19, 2, 5, '2013-11-07', 5.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(20, 2, 10, '2013-11-07', 0.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(21, 2, 14, '2013-11-07', 2.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(22, 2, 7, '2013-11-07', 11.50, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(23, 2, 6, '2013-11-07', 15.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(24, 2, 4, '2013-11-07', 14.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(25, 2, 21, '2013-11-07', 4.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(26, 2, 13, '2013-11-07', 13.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(27, 2, 16, '2013-11-07', 0.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(28, 2, 8, '2013-11-07', 12.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(29, 2, 2, '2013-11-07', 15.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(30, 2, 3, '2013-11-07', 10.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(31, 2, 12, '2013-11-07', 15.00, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(32, 2, 11, '2013-11-07', 14.50, 14, 0, 'Vocab Quiz 2 (Unit 10/7)'),
(33, 3, 24, '2013-11-13', 0.00, 20, 0, 'Grammar quiz - modals'),
(34, 3, 32, '2013-11-13', 15.50, 20, 0, 'Grammar quiz - modals'),
(35, 3, 29, '2013-11-13', 11.50, 20, 0, 'Grammar quiz - modals'),
(36, 3, 27, '2013-11-13', 14.50, 20, 0, 'Grammar quiz - modals'),
(37, 3, 33, '2013-11-13', 14.00, 20, 0, 'Grammar quiz - modals'),
(38, 3, 24, '2013-11-14', 3.00, 10, 0, 'Vocab quiz - chapter 14'),
(39, 3, 32, '2013-11-14', 8.00, 10, 0, 'Vocab quiz - chapter 14'),
(40, 3, 29, '2013-11-14', 7.00, 10, 0, 'Vocab quiz - chapter 14'),
(42, 3, 27, '2013-11-14', 9.75, 10, 0, 'Vocab quiz - chapter 14'),
(43, 3, 33, '2013-11-14', 0.00, 10, 0, 'Vocab quiz - chapter 14'),
(44, 3, 24, '2013-11-19', 2.00, 10, 0, 'Vocab quiz - chapter 15'),
(45, 3, 32, '2013-11-19', 9.75, 10, 0, 'Vocab quiz - chapter 15'),
(46, 3, 29, '2013-11-19', 9.00, 10, 0, 'Vocab quiz - chapter 15'),
(47, 3, 28, '2013-11-19', 0.00, 10, 0, 'Vocab quiz - chapter 15'),
(48, 3, 27, '2013-11-19', 10.00, 10, 0, 'Vocab quiz - chapter 15'),
(49, 3, 33, '2013-11-19', 0.00, 10, 0, 'Vocab quiz - chapter 15'),
(50, 3, 24, '2013-11-20', 38.00, 42, 1, 'Listening final'),
(51, 3, 32, '2013-11-20', 29.50, 42, 1, 'Listening final'),
(52, 3, 29, '2013-11-20', 31.50, 42, 1, 'Listening final'),
(53, 3, 28, '2013-11-20', 0.00, 42, 1, 'Listening final'),
(54, 3, 27, '2013-11-20', 36.50, 42, 1, 'Listening final'),
(55, 3, 33, '2013-11-20', 31.50, 42, 1, 'Listening final'),
(56, 3, 24, '2013-11-20', 49.00, 42, 1, 'Grammar final'),
(57, 3, 32, '2013-11-20', 49.25, 42, 1, 'Grammar final'),
(58, 3, 29, '2013-11-20', 40.50, 42, 1, 'Grammar final'),
(59, 3, 28, '2013-11-20', 0.00, 42, 1, 'Grammar final'),
(60, 3, 27, '2013-11-20', 55.00, 42, 1, 'Grammar final'),
(61, 3, 33, '2013-11-20', 43.00, 42, 1, 'Grammar final'),
(62, 3, 24, '2013-11-21', 20.00, 26, 1, 'Reading final'),
(63, 3, 32, '2013-11-21', 21.00, 26, 1, 'Reading final'),
(64, 3, 29, '2013-11-21', 23.00, 26, 1, 'Reading final'),
(65, 3, 28, '2013-11-21', 0.00, 26, 1, 'Reading final'),
(66, 3, 27, '2013-11-21', 24.00, 26, 1, 'Reading final'),
(67, 3, 33, '2013-11-21', 0.00, 26, 1, 'Reading final');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `nickname`) VALUES
(1, 'Joan', 'Johnson', 'Joan Johnson'),
(2, 'Henry', 'Moore', 'Henry'),
(3, 'Nancy', 'Bennett', 'Nancy'),
(4, 'Fiona', 'Richards', 'Fiona'),
(5, 'Jeremy', 'Richards', 'Jeremy Richards'),
(6, 'Daniel', 'Martinez', 'Daniel'),
(7, 'Anne', 'Harris', 'Anne'),
(8, 'Lewis', 'Walker', 'Lewis'),
(9, 'Juan', 'Hernandez', 'Juan'),
(10, 'Jeremy', 'Morgan', 'Jeremy Morgan'),
(11, 'Yu Ting', 'Huang', 'Vivi'),
(12, 'Carlos', 'Ramirez', 'Carlos'),
(13, 'Mihee', 'Kim', 'Kim'),
(14, 'Alejandro', 'Gomez', 'Alejandro'),
(15, 'John', 'Richards', 'John'),
(16, 'Junho', 'Lee', 'Kyle'),
(17, 'Mina', 'Lee', 'Laura'),
(18, 'Xiaoli', 'Lee', 'Lisa'),
(19, 'Amanda', 'Watson', 'Amanda'),
(20, 'Jeremy', 'Wilson', 'Jeremy'),
(21, 'Michael', 'Evans', 'Mike'),
(23, 'Theresa', 'Williams', 'Teri'),
(24, 'Benjamin', 'Shotwell', 'Ben'),
(25, 'Kathy', 'Edwards', 'Kathy'),
(26, 'Stephen', 'Bailey', 'Steve'),
(27, 'Hung-Hsi', 'Huang', 'Sirena'),
(28, 'Na-Hun', 'Choi', 'Na-Hun'),
(29, 'Tina', 'Ramos', 'Tina'),
(30, 'Ok-Sun', 'Park', 'Janice'),
(31, 'Jun-Ho', 'Jo', 'Jun'),
(32, 'Irene', 'Powell', 'Irene'),
(33, 'Wayne', 'West', 'Wayne'),
(39, 'Aaron', 'Ortiz', 'Aaron');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
