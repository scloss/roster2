-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 07:30 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rosterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE IF NOT EXISTS `admintable` (
  `role_row_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`role_row_id`, `user_id`) VALUES
(1, 'showmen.barua'),
(2, 'sakib.ullah'),
(4, 'saeed.naser'),
(5, 'mahbub.hasan'),
(6, 'emtiaz.hossain'),
(7, 'razib.hasan'),
(8, 'mir.raihan'),
(9, 'raihan.parvez');

-- --------------------------------------------------------

--
-- Table structure for table `daytable`
--

CREATE TABLE IF NOT EXISTS `daytable` (
  `day_row_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_member` varchar(255) NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `day_last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daytable`
--

INSERT INTO `daytable` (`day_row_id`, `shift_id`, `shift_member`, `shift_position`, `day_last_updated`) VALUES
(1, 1, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(2, 1, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(3, 1, 'nowrin.karim,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(4, 1, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(5, 1, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(6, 2, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(7, 2, 'nafisa.sayed,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(8, 2, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(9, 2, 'tanveer.ahmed,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(10, 2, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(11, 3, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(12, 3, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(13, 3, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(14, 3, 'rahul.biswas,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(15, 3, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(16, 4, 'mir.raihan,saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(17, 4, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(18, 4, 'etanvir.ahmed,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(19, 4, 'iftakhar.jahan,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(20, 4, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(21, 5, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(22, 5, 'umar.rafaet,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(23, 5, 'sarbik.sahan,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(24, 5, 'rahul.biswas,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(25, 5, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(26, 6, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(27, 6, 'umar.rafaet,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(28, 6, 'sarbik.sahan,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(29, 6, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(30, 6, 'ahsan.zaki,rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(31, 7, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(32, 7, 'nafisa.sayed,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(33, 7, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(34, 7, 'tahsinul.ferdous,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(35, 7, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(36, 8, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(37, 8, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(38, 8, 'nowrin.karim,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(39, 8, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(40, 8, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(41, 9, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(42, 9, 'nafisa.sayed,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(43, 9, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(44, 9, 'tanveer.ahmed,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(45, 9, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(46, 10, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(47, 10, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(48, 10, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(49, 10, 'rahul.biswas,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(50, 10, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(51, 11, 'mir.raihan,saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(52, 11, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(53, 11, 'etanvir.ahmed,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(54, 11, 'iftakhar.jahan,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(55, 11, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(56, 12, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(57, 12, 'umar.rafaet,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(58, 12, 'sarbik.sahan,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(59, 12, 'rahul.biswas,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(60, 12, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(61, 13, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(62, 13, 'umar.rafaet,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(63, 13, 'sarbik.sahan,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(64, 13, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(65, 13, 'ahsan.zaki,rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(66, 14, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(67, 14, 'nafisa.sayed,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(68, 14, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(69, 14, 'tahsinul.ferdous,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(70, 14, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(71, 15, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(72, 15, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(73, 15, 'nowrin.karim,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(74, 15, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(75, 15, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(76, 16, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(77, 16, 'nafisa.sayed,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(78, 16, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(79, 16, 'tanveer.ahmed,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(80, 16, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(81, 17, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(82, 17, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(83, 17, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(84, 17, 'rahul.biswas,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(85, 17, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(86, 18, 'mir.raihan,saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(87, 18, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(88, 18, 'etanvir.ahmed,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(89, 18, 'iftakhar.jahan,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(90, 18, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(91, 19, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(92, 19, 'umar.rafaet,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(93, 19, 'sarbik.sahan,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(94, 19, 'rahul.biswas,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(95, 19, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(96, 20, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(97, 20, 'umar.rafaet,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(98, 20, 'sarbik.sahan,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(99, 20, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(100, 20, 'ahsan.zaki,rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(101, 21, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(102, 21, 'nafisa.sayed,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(103, 21, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(104, 21, 'tahsinul.ferdous,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(105, 21, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(106, 22, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(107, 22, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(108, 22, 'nowrin.karim,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(109, 22, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(110, 22, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(111, 23, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(112, 23, 'nafisa.sayed,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(113, 23, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(114, 23, 'tanveer.ahmed,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(115, 23, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(116, 24, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(117, 24, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(118, 24, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(119, 24, 'rahul.biswas,sadia.afrin', 'iig', '2016-05-06 11:08:19'),
(120, 24, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(226, 46, 'mir.raihan,saeed.naser', 'shift_leader', '2016-05-22 05:52:18'),
(227, 46, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-22 05:52:18'),
(228, 46, 'maruf.mohammad,etanvir.ahmed', 'bo', '2016-05-22 05:52:18'),
(229, 46, 'iftakhar.jahan,rahul.biswas', 'iig', '2016-05-22 05:52:18'),
(230, 46, 'ashiqur.rahman', 'icx', '2016-05-22 05:52:18'),
(231, 47, '', 'shift_leader', '2016-05-22 05:52:18'),
(232, 47, '', 'sur', '2016-05-22 05:52:18'),
(233, 47, '', 'bo', '2016-05-22 05:52:18'),
(234, 47, '', 'iig', '2016-05-22 05:52:18'),
(235, 47, '', 'icx', '2016-05-22 05:52:18'),
(236, 48, '', 'shift_leader', '2016-05-22 05:52:18'),
(237, 48, '', 'sur', '2016-05-22 05:52:18'),
(238, 48, '', 'bo', '2016-05-22 05:52:18'),
(239, 48, '', 'iig', '2016-05-22 05:52:18'),
(240, 48, '', 'icx', '2016-05-22 05:52:18'),
(241, 49, '', 'shift_leader', '2016-05-22 05:52:18'),
(242, 49, '', 'sur', '2016-05-22 05:52:18'),
(243, 49, '', 'bo', '2016-05-22 05:52:18'),
(244, 49, '', 'iig', '2016-05-22 05:52:18'),
(245, 49, '', 'icx', '2016-05-22 05:52:18'),
(246, 50, '', 'shift_leader', '2016-05-22 05:52:18'),
(247, 50, '', 'sur', '2016-05-22 05:52:18'),
(248, 50, '', 'bo', '2016-05-22 05:52:18'),
(249, 50, '', 'iig', '2016-05-22 05:52:18'),
(250, 50, '', 'icx', '2016-05-22 05:52:18'),
(251, 51, '', 'shift_leader', '2016-05-22 05:52:18'),
(252, 51, '', 'sur', '2016-05-22 05:52:18'),
(253, 51, '', 'bo', '2016-05-22 05:52:18'),
(254, 51, '', 'iig', '2016-05-22 05:52:18'),
(255, 51, '', 'icx', '2016-05-22 05:52:18'),
(256, 52, '', 'shift_leader', '2016-05-22 05:52:18'),
(257, 52, '', 'sur', '2016-05-22 05:52:18'),
(258, 52, '', 'bo', '2016-05-22 05:52:18'),
(259, 52, '', 'iig', '2016-05-22 05:52:18'),
(260, 52, '', 'icx', '2016-05-22 05:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `eveningtable`
--

CREATE TABLE IF NOT EXISTS `eveningtable` (
  `evening_row_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_member` varchar(255) NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `evening_last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eveningtable`
--

INSERT INTO `eveningtable` (`evening_row_id`, `shift_id`, `shift_member`, `shift_position`, `evening_last_updated`) VALUES
(1, 1, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(2, 1, 'nasrin.akter,s.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(3, 1, 'sadaf.mahmud,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(4, 1, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(5, 1, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(6, 2, 'mahbub.hasan,mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(7, 2, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(8, 2, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(9, 2, 'tahsinul.ferdous,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(10, 2, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(11, 3, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(12, 3, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(13, 3, 'samar.kumar,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(14, 3, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(15, 3, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(16, 4, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(17, 4, 'nafisa.sayed,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(18, 4, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(19, 4, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(20, 4, 'ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(21, 5, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(22, 5, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(23, 5, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(24, 5, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(25, 5, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(26, 6, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(27, 6, 'anika.sharmin,s.majumder', 'sur', '2016-05-06 11:08:19'),
(28, 6, 'etanvir.ahmed,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(29, 6, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(30, 6, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(31, 7, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(32, 7, 'nasrin.akter,s.majumder', 'sur', '2016-05-06 11:08:19'),
(33, 7, 'sarbik.sahan,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(34, 7, 'imroze.ahmed', 'bo', '2016-05-06 11:08:19'),
(35, 7, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(36, 8, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(37, 8, 'nasrin.akter,s.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(38, 8, 'sadaf.mahmud,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(39, 8, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(40, 8, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(41, 9, 'mahbub.hasan,mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(42, 9, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(43, 9, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(44, 9, 'tahsinul.ferdous,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(45, 9, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(46, 10, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(47, 10, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(48, 10, 'samar.kumar,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(49, 10, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(50, 10, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(51, 11, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(52, 11, 'nafisa.sayed,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(53, 11, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(54, 11, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(55, 11, 'ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(56, 12, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(57, 12, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(58, 12, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(59, 12, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(60, 12, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(61, 13, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(62, 13, 'anika.sharmin,s.majumder', 'sur', '2016-05-06 11:08:19'),
(63, 13, 'etanvir.ahmed,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(64, 13, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(65, 13, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(66, 14, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(67, 14, 'nasrin.akter,s.majumder', 'sur', '2016-05-06 11:08:19'),
(68, 14, 'sarbik.sahan,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(69, 14, 'imroze.ahmed', 'bo', '2016-05-06 11:08:19'),
(70, 14, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(71, 15, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(72, 15, 'nasrin.akter,s.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(73, 15, 'sadaf.mahmud,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(74, 15, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(75, 15, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(76, 16, 'mahbub.hasan,mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(77, 16, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(78, 16, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(79, 16, 'tahsinul.ferdous,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(80, 16, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(81, 17, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(82, 17, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(83, 17, 'samar.kumar,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(84, 17, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(85, 17, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(86, 18, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(87, 18, 'nafisa.sayed,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(88, 18, 'nowrin.karim,samar.kumar', 'bo', '2016-05-06 11:08:19'),
(89, 18, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(90, 18, 'ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(91, 19, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(92, 19, 'nasrin.akter,anika.sharmin', 'sur', '2016-05-06 11:08:19'),
(93, 19, 'nowrin.karim,etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(94, 19, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(95, 19, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(96, 20, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(97, 20, 'anika.sharmin,s.majumder', 'sur', '2016-05-06 11:08:19'),
(98, 20, 'etanvir.ahmed,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(99, 20, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(100, 20, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(101, 21, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(102, 21, 'nasrin.akter,s.majumder', 'sur', '2016-05-06 11:08:19'),
(103, 21, 'sarbik.sahan,maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(104, 21, 'imroze.ahmed', 'bo', '2016-05-06 11:08:19'),
(105, 21, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(106, 22, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(107, 22, 'nasrin.akter,s.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(108, 22, 'sadaf.mahmud,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(109, 22, 'sadia.afrin,imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(110, 22, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(111, 23, 'mahbub.hasan,mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(112, 23, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(113, 23, 'puspita.topu,iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(114, 23, 'tahsinul.ferdous,rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(115, 23, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(116, 24, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(117, 24, 'akramul.tarafdar,rifat.hasan,nafisa.sayed', 'sur', '2016-05-06 11:08:19'),
(118, 24, 'samar.kumar,puspita.topu', 'bo', '2016-05-06 11:08:19'),
(119, 24, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(120, 24, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(226, 46, 'sakib.ullah', 'shift_leader', '2016-05-22 05:52:18'),
(227, 46, 'nafisa.sayed,akramul.tarafdar', 'sur', '2016-05-22 05:52:18'),
(228, 46, 'nowrin.karim,samar.kumar,umar.rafaet', 'bo', '2016-05-22 05:52:18'),
(229, 46, 'tanveer.ahmed', 'iig', '2016-05-22 05:52:18'),
(230, 46, 'ahsan.zaki', 'icx', '2016-05-22 05:52:18'),
(231, 47, '', 'shift_leader', '2016-05-22 05:52:18'),
(232, 47, '', 'sur', '2016-05-22 05:52:18'),
(233, 47, '', 'bo', '2016-05-22 05:52:18'),
(234, 47, '', 'iig', '2016-05-22 05:52:18'),
(235, 47, '', 'icx', '2016-05-22 05:52:18'),
(236, 48, '', 'shift_leader', '2016-05-22 05:52:18'),
(237, 48, '', 'sur', '2016-05-22 05:52:18'),
(238, 48, '', 'bo', '2016-05-22 05:52:18'),
(239, 48, '', 'iig', '2016-05-22 05:52:18'),
(240, 48, '', 'icx', '2016-05-22 05:52:18'),
(241, 49, '', 'shift_leader', '2016-05-22 05:52:18'),
(242, 49, '', 'sur', '2016-05-22 05:52:18'),
(243, 49, '', 'bo', '2016-05-22 05:52:18'),
(244, 49, '', 'bo', '2016-05-22 05:52:18'),
(245, 49, '', 'icx', '2016-05-22 05:52:18'),
(246, 50, '', 'shift_leader', '2016-05-22 05:52:18'),
(247, 50, '', 'sur', '2016-05-22 05:52:18'),
(248, 50, '', 'bo', '2016-05-22 05:52:18'),
(249, 50, '', 'iig', '2016-05-22 05:52:18'),
(250, 50, '', 'icx', '2016-05-22 05:52:18'),
(251, 51, '', 'shift_leader', '2016-05-22 05:52:18'),
(252, 51, '', 'sur', '2016-05-22 05:52:18'),
(253, 51, '', 'bo', '2016-05-22 05:52:18'),
(254, 51, '', 'iig', '2016-05-22 05:52:18'),
(255, 51, '', 'icx', '2016-05-22 05:52:18'),
(256, 52, '', 'shift_leader', '2016-05-22 05:52:18'),
(257, 52, '', 'sur', '2016-05-22 05:52:18'),
(258, 52, '', 'bo', '2016-05-22 05:52:18'),
(259, 52, '', 'iig', '2016-05-22 05:52:18'),
(260, 52, '', 'icx', '2016-05-22 05:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `holidaytable`
--

CREATE TABLE IF NOT EXISTS `holidaytable` (
  `holiday_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidaytable`
--

INSERT INTO `holidaytable` (`holiday_id`, `date`, `Description`) VALUES
(1, '2016-02-21', '2016,?Language Martyrs Day'),
(2, '2016-03-17', '2016,?Bangabandhu''s Birthday'),
(3, '2016-03-26', '2016,?Independence Day'),
(4, '2016-04-14', '2016,?Bengali New Year'),
(5, '2016-01-05', '2016,?International Labour Day'),
(6, '2016-05-25', '2016,?Buddha Purnima'),
(7, '2016-05-23', '2016,?Shab-e-barat'),
(8, '2016-07-01', '2016,?Jummatul Bidah'),
(9, '2016-07-03', '2016,?Shab-e-Qadr'),
(10, '2016-07-05', '2016,?Eid-ul-Fitr Holiday'),
(11, '2016-07-06', '2016,?Eid-ul-Fitr'),
(12, '2016-07-07', '2016,?Eid-ul-Fitr Holiday'),
(13, '2016-08-15', '2016,?National Mourning Day'),
(14, '2016-08-25', '2016,?Janmashtami'),
(15, '2016-09-11', '2016,?Eid-ul-Azha Holiday'),
(16, '2016-09-12', '2016,?Eid-ul-Azha'),
(17, '2016-09-13', '2016,?Eid-ul-Azha Holiday'),
(18, '2016-10-11', '2016,?Durga Puja'),
(19, '2016-10-12', '2016,?Ashura'),
(20, '2016-12-12', '2016,?Eid-e-Milad-un Nabi'),
(21, '2016-12-16', '2016,?Victory Day'),
(22, '2016-12-25', '2016,?Christmas Day');

-- --------------------------------------------------------

--
-- Table structure for table `leavetable`
--

CREATE TABLE IF NOT EXISTS `leavetable` (
  `leave_row_id` int(11) NOT NULL,
  `leave_requester` varchar(255) NOT NULL,
  `leave_date_from` date NOT NULL,
  `leave_date_to` date NOT NULL,
  `leave_status` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetable`
--

INSERT INTO `leavetable` (`leave_row_id`, `leave_requester`, `leave_date_from`, `leave_date_to`, `leave_status`, `approved_by`, `reason`) VALUES
(1, 'rayhan.hossain', '2016-05-27', '2016-05-28', 'Approved', 'mahbub.hasan', 'Due to family purpose.');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE IF NOT EXISTS `log_user` (
  `log_row_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`log_row_id`, `username`, `time`) VALUES
(1, 'ali.mehraj', '2016-05-08 12:34:54'),
(2, 'showmen.barua', '2016-05-08 12:35:43'),
(5, 'jalal.mahedi', '2016-05-08 12:41:06'),
(6, 'biplob.barua', '2016-05-08 18:26:31'),
(7, 'mir.raihan', '2016-05-10 07:32:13'),
(8, 'nasrin.akter', '2016-05-11 04:22:25'),
(9, 'anika.sharmin', '2016-05-11 07:13:30'),
(10, 'etanvir.ahmed', '2016-05-11 08:06:22'),
(11, 'samar.kumar', '2016-05-11 16:40:37'),
(12, 'sarbik.sahan', '2016-05-12 09:19:19'),
(13, 'saeed.naser', '2016-05-12 09:22:49'),
(14, 'niaz.mithu', '2016-05-12 09:55:54'),
(15, 'akramul.tarafdar', '2016-05-12 21:09:57'),
(16, 'saiham.rahman', '2016-05-12 21:12:02'),
(17, 'rifat.hasan', '2016-05-12 21:15:35'),
(18, 'tanveer.ahmed', '2016-05-12 22:06:44'),
(19, 'sadaf.mahmud', '2016-05-13 17:00:30'),
(20, 'mahbub.hasan', '2016-05-18 21:53:41'),
(21, 'md.shariful', '2016-05-20 05:19:32'),
(22, 'razib.hasan', '2016-05-20 05:48:36'),
(23, 'raihan.parvez', '2016-05-20 05:51:21'),
(24, 'umar.rafaet', '2016-05-21 15:19:12'),
(25, 'imroze.ahmed', '2016-05-21 16:31:02'),
(26, 'rayhan.hossain', '2016-05-22 11:03:38'),
(27, 'sakib.ullah', '2016-05-23 01:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nighttable`
--

CREATE TABLE IF NOT EXISTS `nighttable` (
  `night_row_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_member` varchar(255) NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `night_last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nighttable`
--

INSERT INTO `nighttable` (`night_row_id`, `shift_id`, `shift_member`, `shift_position`, `night_last_updated`) VALUES
(1, 1, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(2, 1, 'sarbik.sahan,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(3, 1, 'maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(4, 1, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(5, 1, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(6, 2, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(7, 2, 's.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(8, 2, 'sarbik.sahan', 'bo', '2016-05-06 11:08:19'),
(9, 2, 'imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(10, 2, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(11, 3, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(12, 3, 'iqbal.ahmed,s.majumder', 'sur', '2016-05-06 11:08:19'),
(13, 3, 'sadaf.mahmud', 'bo', '2016-05-06 11:08:19'),
(14, 3, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(15, 3, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(16, 4, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(17, 4, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(18, 4, 'iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(19, 4, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(20, 4, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(21, 5, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(22, 5, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(23, 5, 'samar.kumar', 'bo', '2016-05-06 11:08:19'),
(24, 5, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(25, 5, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(26, 6, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(27, 6, 'samar.kumar', 'sur', '2016-05-06 11:08:19'),
(28, 6, 'tanveer.ahmed', 'bo', '2016-05-06 11:08:19'),
(29, 6, 'rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(30, 6, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(31, 7, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(32, 7, 'umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(33, 7, 'etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(34, 7, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(35, 7, 'ashiqur.rahman,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(36, 8, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(37, 8, 'sarbik.sahan,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(38, 8, 'maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(39, 8, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(40, 8, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(41, 9, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(42, 9, 's.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(43, 9, 'sarbik.sahan', 'bo', '2016-05-06 11:08:19'),
(44, 9, 'imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(45, 9, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(46, 10, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(47, 10, 'iqbal.ahmed,s.majumder', 'sur', '2016-05-06 11:08:19'),
(48, 10, 'sadaf.mahmud', 'bo', '2016-05-06 11:08:19'),
(49, 10, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(50, 10, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(51, 11, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(52, 11, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(53, 11, 'iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(54, 11, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(55, 11, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(56, 12, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(57, 12, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(58, 12, 'samar.kumar', 'bo', '2016-05-06 11:08:19'),
(59, 12, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(60, 12, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(61, 13, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(62, 13, 'samar.kumar', 'sur', '2016-05-06 11:08:19'),
(63, 13, 'tanveer.ahmed', 'bo', '2016-05-06 11:08:19'),
(64, 13, 'rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(65, 13, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(66, 14, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(67, 14, 'umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(68, 14, 'etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(69, 14, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(70, 14, 'ashiqur.rahman,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(71, 15, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(72, 15, 'sarbik.sahan,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(73, 15, 'maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(74, 15, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(75, 15, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(76, 16, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(77, 16, 's.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(78, 16, 'sarbik.sahan', 'bo', '2016-05-06 11:08:19'),
(79, 16, 'imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(80, 16, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(81, 17, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(82, 17, 'iqbal.ahmed,s.majumder', 'sur', '2016-05-06 11:08:19'),
(83, 17, 'sadaf.mahmud', 'bo', '2016-05-06 11:08:19'),
(84, 17, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(85, 17, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(86, 18, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(87, 18, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(88, 18, 'iqbal.ahmed', 'bo', '2016-05-06 11:08:19'),
(89, 18, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(90, 18, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(91, 19, 'sakib.ullah', 'shift_leader', '2016-05-06 11:08:19'),
(92, 19, 'akramul.tarafdar,rifat.hasan', 'sur', '2016-05-06 11:08:19'),
(93, 19, 'samar.kumar', 'bo', '2016-05-06 11:08:19'),
(94, 19, 'tanveer.ahmed', 'iig', '2016-05-06 11:08:19'),
(95, 19, 'saiham.rahman', 'icx', '2016-05-06 11:08:19'),
(96, 20, 'mir.raihan', 'shift_leader', '2016-05-06 11:08:19'),
(97, 20, 'samar.kumar', 'sur', '2016-05-06 11:08:19'),
(98, 20, 'tanveer.ahmed', 'bo', '2016-05-06 11:08:19'),
(99, 20, 'rahul.biswas', 'iig', '2016-05-06 11:08:19'),
(100, 20, 'ashiqur.rahman', 'icx', '2016-05-06 11:08:19'),
(101, 21, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(102, 21, 'umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(103, 21, 'etanvir.ahmed', 'bo', '2016-05-06 11:08:19'),
(104, 21, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(105, 21, 'ashiqur.rahman,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(106, 22, 'saeed.naser', 'shift_leader', '2016-05-06 11:08:19'),
(107, 22, 'sarbik.sahan,umar.rafaet', 'sur', '2016-05-06 11:08:19'),
(108, 22, 'maruf.mohammad', 'bo', '2016-05-06 11:08:19'),
(109, 22, 'iftakhar.jahan', 'iig', '2016-05-06 11:08:19'),
(110, 22, 'shamim.hassan,ahsan.zaki', 'icx', '2016-05-06 11:08:19'),
(111, 23, 'sadaf.mahmud', 'shift_leader', '2016-05-06 11:08:19'),
(112, 23, 's.majumder,nazmul.hasan', 'sur', '2016-05-06 11:08:19'),
(113, 23, 'sarbik.sahan', 'bo', '2016-05-06 11:08:19'),
(114, 23, 'imroze.ahmed', 'iig', '2016-05-06 11:08:19'),
(115, 23, 'shamim.hassan', 'icx', '2016-05-06 11:08:19'),
(116, 24, 'mahbub.hasan', 'shift_leader', '2016-05-06 11:08:19'),
(117, 24, 'iqbal.ahmed,s.majumder', 'sur', '2016-05-06 11:08:19'),
(118, 24, 'sadaf.mahmud', 'bo', '2016-05-06 11:08:19'),
(119, 24, 'tahsinul.ferdous', 'iig', '2016-05-06 11:08:19'),
(120, 24, 'rayhan.hossain', 'icx', '2016-05-06 11:08:19'),
(226, 46, 'mahbub.hasan', 'shift_leader', '2016-05-22 05:52:18'),
(227, 46, 'rifat.hasan,wahidul.ashrafe', 'sur', '2016-05-22 05:52:18'),
(228, 46, 'iqbal.ahmed', 'bo', '2016-05-22 05:52:18'),
(229, 46, 'tahsinul.ferdous', 'iig', '2016-05-22 05:52:18'),
(230, 46, 'saiham.rahman', 'icx', '2016-05-22 05:52:18'),
(231, 47, '', 'shift_leader', '2016-05-22 05:52:18'),
(232, 47, '', 'sur', '2016-05-22 05:52:18'),
(233, 47, '', 'bo', '2016-05-22 05:52:18'),
(234, 47, '', 'iig', '2016-05-22 05:52:18'),
(235, 47, '', 'icx', '2016-05-22 05:52:18'),
(236, 48, '', 'shift_leader', '2016-05-22 05:52:18'),
(237, 48, '', 'sur', '2016-05-22 05:52:18'),
(238, 48, '', 'bo', '2016-05-22 05:52:18'),
(239, 48, '', 'iig', '2016-05-22 05:52:18'),
(240, 48, '', 'icx', '2016-05-22 05:52:18'),
(241, 49, '', 'shift_leader', '2016-05-22 05:52:18'),
(242, 49, '', 'sur', '2016-05-22 05:52:18'),
(243, 49, '', 'bo', '2016-05-22 05:52:18'),
(244, 49, '', 'iig', '2016-05-22 05:52:18'),
(245, 49, '', 'icx', '2016-05-22 05:52:18'),
(246, 50, '', 'shift_leader', '2016-05-22 05:52:18'),
(247, 50, '', 'sur', '2016-05-22 05:52:18'),
(248, 50, '', 'bo', '2016-05-22 05:52:18'),
(249, 50, '', 'iig', '2016-05-22 05:52:18'),
(250, 50, '', 'icx', '2016-05-22 05:52:18'),
(251, 51, '', 'shift_leader', '2016-05-22 05:52:18'),
(252, 51, '', 'sur', '2016-05-22 05:52:18'),
(253, 51, '', 'bo', '2016-05-22 05:52:18'),
(254, 51, '', 'iig', '2016-05-22 05:52:18'),
(255, 51, '', 'icx', '2016-05-22 05:52:18'),
(256, 52, '', 'shift_leader', '2016-05-22 05:52:18'),
(257, 52, '', 'sur', '2016-05-22 05:52:18'),
(258, 52, '', 'bo', '2016-05-22 05:52:18'),
(259, 52, '', 'iig', '2016-05-22 05:52:18'),
(260, 52, '', 'icx', '2016-05-22 05:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rostertable`
--

CREATE TABLE IF NOT EXISTS `rostertable` (
  `roster_table_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `shift_time` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1073 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rostertable`
--

INSERT INTO `rostertable` (`roster_table_id`, `user_id`, `shift_id`, `shift_date`, `shift_position`, `shift_time`) VALUES
(1, 'sakib.ullah', 1, '2016-05-01', 'shift_leader', 'day'),
(2, 'akramul.tarafdar', 1, '2016-05-01', 'sur', 'day'),
(3, 'rifat.hasan', 1, '2016-05-01', 'sur', 'day'),
(4, 'nafisa.sayed', 1, '2016-05-01', 'sur', 'day'),
(5, 'nowrin.karim', 1, '2016-05-01', 'bo', 'day'),
(6, 'iqbal.ahmed', 1, '2016-05-01', 'bo', 'day'),
(7, 'tahsinul.ferdous', 1, '2016-05-01', 'iig', 'day'),
(8, 'saiham.rahman', 1, '2016-05-01', 'icx', 'day'),
(9, 'mahbub.hasan', 1, '2016-05-01', 'shift_leader', 'evening'),
(10, 'nasrin.akter', 1, '2016-05-01', 'sur', 'evening'),
(11, 's.majumder', 1, '2016-05-01', 'sur', 'evening'),
(12, 'nazmul.hasan', 1, '2016-05-01', 'sur', 'evening'),
(13, 'sadaf.mahmud', 1, '2016-05-01', 'bo', 'evening'),
(14, 'puspita.topu', 1, '2016-05-01', 'bo', 'evening'),
(15, 'sadia.afrin', 1, '2016-05-01', 'iig', 'evening'),
(16, 'imroze.ahmed', 1, '2016-05-01', 'iig', 'evening'),
(17, 'rayhan.hossain', 1, '2016-05-01', 'icx', 'evening'),
(18, 'saeed.naser', 1, '2016-05-01', 'shift_leader', 'night'),
(19, 'sarbik.sahan', 1, '2016-05-01', 'sur', 'night'),
(20, 'umar.rafaet', 1, '2016-05-01', 'sur', 'night'),
(21, 'maruf.mohammad', 1, '2016-05-01', 'bo', 'night'),
(22, 'iftakhar.jahan', 1, '2016-05-01', 'iig', 'night'),
(23, 'shamim.hassan', 1, '2016-05-01', 'icx', 'night'),
(24, 'ahsan.zaki', 1, '2016-05-01', 'icx', 'night'),
(25, 'sakib.ullah', 2, '2016-05-02', 'shift_leader', 'day'),
(26, 'nafisa.sayed', 2, '2016-05-02', 'sur', 'day'),
(27, 'anika.sharmin', 2, '2016-05-02', 'sur', 'day'),
(28, 'nowrin.karim', 2, '2016-05-02', 'bo', 'day'),
(29, 'samar.kumar', 2, '2016-05-02', 'bo', 'day'),
(30, 'tanveer.ahmed', 2, '2016-05-02', 'iig', 'day'),
(31, 'sadia.afrin', 2, '2016-05-02', 'iig', 'day'),
(32, 'saiham.rahman', 2, '2016-05-02', 'icx', 'day'),
(33, 'mahbub.hasan', 2, '2016-05-02', 'shift_leader', 'evening'),
(34, 'mir.raihan', 2, '2016-05-02', 'shift_leader', 'evening'),
(35, 'akramul.tarafdar', 2, '2016-05-02', 'sur', 'evening'),
(36, 'rifat.hasan', 2, '2016-05-02', 'sur', 'evening'),
(37, 'puspita.topu', 2, '2016-05-02', 'bo', 'evening'),
(38, 'iqbal.ahmed', 2, '2016-05-02', 'bo', 'evening'),
(39, 'tahsinul.ferdous', 2, '2016-05-02', 'iig', 'evening'),
(40, 'rahul.biswas', 2, '2016-05-02', 'iig', 'evening'),
(41, 'rayhan.hossain', 2, '2016-05-02', 'icx', 'evening'),
(42, 'sadaf.mahmud', 2, '2016-05-02', 'shift_leader', 'night'),
(43, 's.majumder', 2, '2016-05-02', 'sur', 'night'),
(44, 'nazmul.hasan', 2, '2016-05-02', 'sur', 'night'),
(45, 'sarbik.sahan', 2, '2016-05-02', 'bo', 'night'),
(46, 'imroze.ahmed', 2, '2016-05-02', 'iig', 'night'),
(47, 'shamim.hassan', 2, '2016-05-02', 'icx', 'night'),
(48, 'mir.raihan', 3, '2016-05-03', 'shift_leader', 'day'),
(49, 'nasrin.akter', 3, '2016-05-03', 'sur', 'day'),
(50, 'anika.sharmin', 3, '2016-05-03', 'sur', 'day'),
(51, 'nowrin.karim', 3, '2016-05-03', 'bo', 'day'),
(52, 'etanvir.ahmed', 3, '2016-05-03', 'bo', 'day'),
(53, 'rahul.biswas', 3, '2016-05-03', 'iig', 'day'),
(54, 'sadia.afrin', 3, '2016-05-03', 'iig', 'day'),
(55, 'ashiqur.rahman', 3, '2016-05-03', 'icx', 'day'),
(56, 'sakib.ullah', 3, '2016-05-03', 'shift_leader', 'evening'),
(57, 'akramul.tarafdar', 3, '2016-05-03', 'sur', 'evening'),
(58, 'rifat.hasan', 3, '2016-05-03', 'sur', 'evening'),
(59, 'nafisa.sayed', 3, '2016-05-03', 'sur', 'evening'),
(60, 'samar.kumar', 3, '2016-05-03', 'bo', 'evening'),
(61, 'puspita.topu', 3, '2016-05-03', 'bo', 'evening'),
(62, 'tanveer.ahmed', 3, '2016-05-03', 'iig', 'evening'),
(63, 'saiham.rahman', 3, '2016-05-03', 'icx', 'evening'),
(64, 'mahbub.hasan', 3, '2016-05-03', 'shift_leader', 'night'),
(65, 'iqbal.ahmed', 3, '2016-05-03', 'sur', 'night'),
(66, 's.majumder', 3, '2016-05-03', 'sur', 'night'),
(67, 'sadaf.mahmud', 3, '2016-05-03', 'bo', 'night'),
(68, 'tahsinul.ferdous', 3, '2016-05-03', 'iig', 'night'),
(69, 'rayhan.hossain', 3, '2016-05-03', 'icx', 'night'),
(70, 'mir.raihan', 4, '2016-05-04', 'shift_leader', 'day'),
(71, 'saeed.naser', 4, '2016-05-04', 'shift_leader', 'day'),
(72, 'nasrin.akter', 4, '2016-05-04', 'sur', 'day'),
(73, 'anika.sharmin', 4, '2016-05-04', 'sur', 'day'),
(74, 'etanvir.ahmed', 4, '2016-05-04', 'bo', 'day'),
(75, 'maruf.mohammad', 4, '2016-05-04', 'bo', 'day'),
(76, 'iftakhar.jahan', 4, '2016-05-04', 'iig', 'day'),
(77, 'rahul.biswas', 4, '2016-05-04', 'iig', 'day'),
(78, 'ashiqur.rahman', 4, '2016-05-04', 'icx', 'day'),
(79, 'sakib.ullah', 4, '2016-05-04', 'shift_leader', 'evening'),
(80, 'nafisa.sayed', 4, '2016-05-04', 'sur', 'evening'),
(81, 'umar.rafaet', 4, '2016-05-04', 'sur', 'evening'),
(82, 'nowrin.karim', 4, '2016-05-04', 'bo', 'evening'),
(83, 'samar.kumar', 4, '2016-05-04', 'bo', 'evening'),
(84, 'tanveer.ahmed', 4, '2016-05-04', 'iig', 'evening'),
(85, 'ahsan.zaki', 4, '2016-05-04', 'icx', 'evening'),
(86, 'mahbub.hasan', 4, '2016-05-04', 'shift_leader', 'night'),
(87, 'akramul.tarafdar', 4, '2016-05-04', 'sur', 'night'),
(88, 'rifat.hasan', 4, '2016-05-04', 'sur', 'night'),
(89, 'iqbal.ahmed', 4, '2016-05-04', 'bo', 'night'),
(90, 'tahsinul.ferdous', 4, '2016-05-04', 'iig', 'night'),
(91, 'saiham.rahman', 4, '2016-05-04', 'icx', 'night'),
(92, 'saeed.naser', 5, '2016-05-05', 'shift_leader', 'day'),
(93, 'umar.rafaet', 5, '2016-05-05', 'sur', 'day'),
(94, 'nazmul.hasan', 5, '2016-05-05', 'sur', 'day'),
(95, 'sarbik.sahan', 5, '2016-05-05', 'bo', 'day'),
(96, 'maruf.mohammad', 5, '2016-05-05', 'bo', 'day'),
(97, 'rahul.biswas', 5, '2016-05-05', 'iig', 'day'),
(98, 'imroze.ahmed', 5, '2016-05-05', 'iig', 'day'),
(99, 'shamim.hassan', 5, '2016-05-05', 'icx', 'day'),
(100, 'ahsan.zaki', 5, '2016-05-05', 'icx', 'day'),
(101, 'mir.raihan', 5, '2016-05-05', 'shift_leader', 'evening'),
(102, 'nasrin.akter', 5, '2016-05-05', 'sur', 'evening'),
(103, 'anika.sharmin', 5, '2016-05-05', 'sur', 'evening'),
(104, 'nowrin.karim', 5, '2016-05-05', 'bo', 'evening'),
(105, 'etanvir.ahmed', 5, '2016-05-05', 'bo', 'evening'),
(106, 'iftakhar.jahan', 5, '2016-05-05', 'iig', 'evening'),
(107, 'ashiqur.rahman', 5, '2016-05-05', 'icx', 'evening'),
(108, 'sakib.ullah', 5, '2016-05-05', 'shift_leader', 'night'),
(109, 'akramul.tarafdar', 5, '2016-05-05', 'sur', 'night'),
(110, 'rifat.hasan', 5, '2016-05-05', 'sur', 'night'),
(111, 'samar.kumar', 5, '2016-05-05', 'bo', 'night'),
(112, 'tanveer.ahmed', 5, '2016-05-05', 'iig', 'night'),
(113, 'saiham.rahman', 5, '2016-05-05', 'icx', 'night'),
(114, 'saeed.naser', 6, '2016-05-06', 'shift_leader', 'day'),
(115, 'umar.rafaet', 6, '2016-05-06', 'sur', 'day'),
(116, 'nazmul.hasan', 6, '2016-05-06', 'sur', 'day'),
(117, 'sarbik.sahan', 6, '2016-05-06', 'bo', 'day'),
(118, 'puspita.topu', 6, '2016-05-06', 'bo', 'day'),
(119, 'sadia.afrin', 6, '2016-05-06', 'iig', 'day'),
(120, 'imroze.ahmed', 6, '2016-05-06', 'iig', 'day'),
(121, 'ahsan.zaki', 6, '2016-05-06', 'icx', 'day'),
(122, 'rayhan.hossain', 6, '2016-05-06', 'icx', 'day'),
(123, 'sadaf.mahmud', 6, '2016-05-06', 'shift_leader', 'evening'),
(124, 'anika.sharmin', 6, '2016-05-06', 'sur', 'evening'),
(125, 's.majumder', 6, '2016-05-06', 'sur', 'evening'),
(126, 'etanvir.ahmed', 6, '2016-05-06', 'bo', 'evening'),
(127, 'maruf.mohammad', 6, '2016-05-06', 'bo', 'evening'),
(128, 'iftakhar.jahan', 6, '2016-05-06', 'iig', 'evening'),
(129, 'shamim.hassan', 6, '2016-05-06', 'icx', 'evening'),
(130, 'mir.raihan', 6, '2016-05-06', 'shift_leader', 'night'),
(131, 'samar.kumar', 6, '2016-05-06', 'sur', 'night'),
(132, 'tanveer.ahmed', 6, '2016-05-06', 'bo', 'night'),
(133, 'rahul.biswas', 6, '2016-05-06', 'iig', 'night'),
(134, 'ashiqur.rahman', 6, '2016-05-06', 'icx', 'night'),
(135, 'mahbub.hasan', 7, '2016-05-07', 'shift_leader', 'day'),
(136, 'nafisa.sayed', 7, '2016-05-07', 'sur', 'day'),
(137, 'nazmul.hasan', 7, '2016-05-07', 'sur', 'day'),
(138, 'puspita.topu', 7, '2016-05-07', 'bo', 'day'),
(139, 'iqbal.ahmed', 7, '2016-05-07', 'bo', 'day'),
(140, 'tahsinul.ferdous', 7, '2016-05-07', 'iig', 'day'),
(141, 'sadia.afrin', 7, '2016-05-07', 'iig', 'day'),
(142, 'rayhan.hossain', 7, '2016-05-07', 'icx', 'day'),
(143, 'sadaf.mahmud', 7, '2016-05-07', 'shift_leader', 'evening'),
(144, 'nasrin.akter', 7, '2016-05-07', 'sur', 'evening'),
(145, 's.majumder', 7, '2016-05-07', 'sur', 'evening'),
(146, 'sarbik.sahan', 7, '2016-05-07', 'bo', 'evening'),
(147, 'maruf.mohammad', 7, '2016-05-07', 'bo', 'evening'),
(148, 'imroze.ahmed', 7, '2016-05-07', 'bo', 'evening'),
(149, 'shamim.hassan', 7, '2016-05-07', 'icx', 'evening'),
(150, 'saeed.naser', 7, '2016-05-07', 'shift_leader', 'night'),
(151, 'umar.rafaet', 7, '2016-05-07', 'sur', 'night'),
(152, 'etanvir.ahmed', 7, '2016-05-07', 'bo', 'night'),
(153, 'iftakhar.jahan', 7, '2016-05-07', 'iig', 'night'),
(154, 'ashiqur.rahman', 7, '2016-05-07', 'icx', 'night'),
(155, 'ahsan.zaki', 7, '2016-05-07', 'icx', 'night'),
(156, 'sakib.ullah', 8, '2016-05-08', 'shift_leader', 'day'),
(157, 'akramul.tarafdar', 8, '2016-05-08', 'sur', 'day'),
(158, 'rifat.hasan', 8, '2016-05-08', 'sur', 'day'),
(159, 'nafisa.sayed', 8, '2016-05-08', 'sur', 'day'),
(160, 'nowrin.karim', 8, '2016-05-08', 'bo', 'day'),
(161, 'iqbal.ahmed', 8, '2016-05-08', 'bo', 'day'),
(162, 'tahsinul.ferdous', 8, '2016-05-08', 'iig', 'day'),
(163, 'saiham.rahman', 8, '2016-05-08', 'icx', 'day'),
(164, 'mahbub.hasan', 8, '2016-05-08', 'shift_leader', 'evening'),
(165, 'nasrin.akter', 8, '2016-05-08', 'sur', 'evening'),
(166, 's.majumder', 8, '2016-05-08', 'sur', 'evening'),
(167, 'nazmul.hasan', 8, '2016-05-08', 'sur', 'evening'),
(168, 'sadaf.mahmud', 8, '2016-05-08', 'bo', 'evening'),
(169, 'puspita.topu', 8, '2016-05-08', 'bo', 'evening'),
(170, 'sadia.afrin', 8, '2016-05-08', 'iig', 'evening'),
(171, 'imroze.ahmed', 8, '2016-05-08', 'iig', 'evening'),
(172, 'rayhan.hossain', 8, '2016-05-08', 'icx', 'evening'),
(173, 'saeed.naser', 8, '2016-05-08', 'shift_leader', 'night'),
(174, 'sarbik.sahan', 8, '2016-05-08', 'sur', 'night'),
(175, 'umar.rafaet', 8, '2016-05-08', 'sur', 'night'),
(176, 'maruf.mohammad', 8, '2016-05-08', 'bo', 'night'),
(177, 'iftakhar.jahan', 8, '2016-05-08', 'iig', 'night'),
(178, 'shamim.hassan', 8, '2016-05-08', 'icx', 'night'),
(179, 'ahsan.zaki', 8, '2016-05-08', 'icx', 'night'),
(180, 'sakib.ullah', 9, '2016-05-09', 'shift_leader', 'day'),
(181, 'nafisa.sayed', 9, '2016-05-09', 'sur', 'day'),
(182, 'anika.sharmin', 9, '2016-05-09', 'sur', 'day'),
(183, 'nowrin.karim', 9, '2016-05-09', 'bo', 'day'),
(184, 'samar.kumar', 9, '2016-05-09', 'bo', 'day'),
(185, 'tanveer.ahmed', 9, '2016-05-09', 'iig', 'day'),
(186, 'sadia.afrin', 9, '2016-05-09', 'iig', 'day'),
(187, 'saiham.rahman', 9, '2016-05-09', 'icx', 'day'),
(188, 'mahbub.hasan', 9, '2016-05-09', 'shift_leader', 'evening'),
(189, 'mir.raihan', 9, '2016-05-09', 'shift_leader', 'evening'),
(190, 'akramul.tarafdar', 9, '2016-05-09', 'sur', 'evening'),
(191, 'rifat.hasan', 9, '2016-05-09', 'sur', 'evening'),
(192, 'puspita.topu', 9, '2016-05-09', 'bo', 'evening'),
(193, 'iqbal.ahmed', 9, '2016-05-09', 'bo', 'evening'),
(194, 'tahsinul.ferdous', 9, '2016-05-09', 'iig', 'evening'),
(195, 'rahul.biswas', 9, '2016-05-09', 'iig', 'evening'),
(196, 'rayhan.hossain', 9, '2016-05-09', 'icx', 'evening'),
(197, 'sadaf.mahmud', 9, '2016-05-09', 'shift_leader', 'night'),
(198, 's.majumder', 9, '2016-05-09', 'sur', 'night'),
(199, 'nazmul.hasan', 9, '2016-05-09', 'sur', 'night'),
(200, 'sarbik.sahan', 9, '2016-05-09', 'bo', 'night'),
(201, 'imroze.ahmed', 9, '2016-05-09', 'iig', 'night'),
(202, 'shamim.hassan', 9, '2016-05-09', 'icx', 'night'),
(203, 'mir.raihan', 10, '2016-05-10', 'shift_leader', 'day'),
(204, 'nasrin.akter', 10, '2016-05-10', 'sur', 'day'),
(205, 'anika.sharmin', 10, '2016-05-10', 'sur', 'day'),
(206, 'nowrin.karim', 10, '2016-05-10', 'bo', 'day'),
(207, 'etanvir.ahmed', 10, '2016-05-10', 'bo', 'day'),
(208, 'rahul.biswas', 10, '2016-05-10', 'iig', 'day'),
(209, 'sadia.afrin', 10, '2016-05-10', 'iig', 'day'),
(210, 'ashiqur.rahman', 10, '2016-05-10', 'icx', 'day'),
(211, 'sakib.ullah', 10, '2016-05-10', 'shift_leader', 'evening'),
(212, 'akramul.tarafdar', 10, '2016-05-10', 'sur', 'evening'),
(213, 'rifat.hasan', 10, '2016-05-10', 'sur', 'evening'),
(214, 'nafisa.sayed', 10, '2016-05-10', 'sur', 'evening'),
(215, 'samar.kumar', 10, '2016-05-10', 'bo', 'evening'),
(216, 'puspita.topu', 10, '2016-05-10', 'bo', 'evening'),
(217, 'tanveer.ahmed', 10, '2016-05-10', 'iig', 'evening'),
(218, 'saiham.rahman', 10, '2016-05-10', 'icx', 'evening'),
(219, 'mahbub.hasan', 10, '2016-05-10', 'shift_leader', 'night'),
(220, 'iqbal.ahmed', 10, '2016-05-10', 'sur', 'night'),
(221, 's.majumder', 10, '2016-05-10', 'sur', 'night'),
(222, 'sadaf.mahmud', 10, '2016-05-10', 'bo', 'night'),
(223, 'tahsinul.ferdous', 10, '2016-05-10', 'iig', 'night'),
(224, 'rayhan.hossain', 10, '2016-05-10', 'icx', 'night'),
(225, 'mir.raihan', 11, '2016-05-11', 'shift_leader', 'day'),
(226, 'saeed.naser', 11, '2016-05-11', 'shift_leader', 'day'),
(227, 'nasrin.akter', 11, '2016-05-11', 'sur', 'day'),
(228, 'anika.sharmin', 11, '2016-05-11', 'sur', 'day'),
(229, 'etanvir.ahmed', 11, '2016-05-11', 'bo', 'day'),
(230, 'maruf.mohammad', 11, '2016-05-11', 'bo', 'day'),
(231, 'iftakhar.jahan', 11, '2016-05-11', 'iig', 'day'),
(232, 'rahul.biswas', 11, '2016-05-11', 'iig', 'day'),
(233, 'ashiqur.rahman', 11, '2016-05-11', 'icx', 'day'),
(234, 'sakib.ullah', 11, '2016-05-11', 'shift_leader', 'evening'),
(235, 'nafisa.sayed', 11, '2016-05-11', 'sur', 'evening'),
(236, 'umar.rafaet', 11, '2016-05-11', 'sur', 'evening'),
(237, 'nowrin.karim', 11, '2016-05-11', 'bo', 'evening'),
(238, 'samar.kumar', 11, '2016-05-11', 'bo', 'evening'),
(239, 'tanveer.ahmed', 11, '2016-05-11', 'iig', 'evening'),
(240, 'ahsan.zaki', 11, '2016-05-11', 'icx', 'evening'),
(241, 'mahbub.hasan', 11, '2016-05-11', 'shift_leader', 'night'),
(242, 'akramul.tarafdar', 11, '2016-05-11', 'sur', 'night'),
(243, 'rifat.hasan', 11, '2016-05-11', 'sur', 'night'),
(244, 'iqbal.ahmed', 11, '2016-05-11', 'bo', 'night'),
(245, 'tahsinul.ferdous', 11, '2016-05-11', 'iig', 'night'),
(246, 'saiham.rahman', 11, '2016-05-11', 'icx', 'night'),
(247, 'saeed.naser', 12, '2016-05-12', 'shift_leader', 'day'),
(248, 'umar.rafaet', 12, '2016-05-12', 'sur', 'day'),
(249, 'nazmul.hasan', 12, '2016-05-12', 'sur', 'day'),
(250, 'sarbik.sahan', 12, '2016-05-12', 'bo', 'day'),
(251, 'maruf.mohammad', 12, '2016-05-12', 'bo', 'day'),
(252, 'rahul.biswas', 12, '2016-05-12', 'iig', 'day'),
(253, 'imroze.ahmed', 12, '2016-05-12', 'iig', 'day'),
(254, 'shamim.hassan', 12, '2016-05-12', 'icx', 'day'),
(255, 'ahsan.zaki', 12, '2016-05-12', 'icx', 'day'),
(256, 'mir.raihan', 12, '2016-05-12', 'shift_leader', 'evening'),
(257, 'nasrin.akter', 12, '2016-05-12', 'sur', 'evening'),
(258, 'anika.sharmin', 12, '2016-05-12', 'sur', 'evening'),
(259, 'nowrin.karim', 12, '2016-05-12', 'bo', 'evening'),
(260, 'etanvir.ahmed', 12, '2016-05-12', 'bo', 'evening'),
(261, 'iftakhar.jahan', 12, '2016-05-12', 'iig', 'evening'),
(262, 'ashiqur.rahman', 12, '2016-05-12', 'icx', 'evening'),
(263, 'sakib.ullah', 12, '2016-05-12', 'shift_leader', 'night'),
(264, 'akramul.tarafdar', 12, '2016-05-12', 'sur', 'night'),
(265, 'rifat.hasan', 12, '2016-05-12', 'sur', 'night'),
(266, 'samar.kumar', 12, '2016-05-12', 'bo', 'night'),
(267, 'tanveer.ahmed', 12, '2016-05-12', 'iig', 'night'),
(268, 'saiham.rahman', 12, '2016-05-12', 'icx', 'night'),
(269, 'saeed.naser', 13, '2016-05-13', 'shift_leader', 'day'),
(270, 'umar.rafaet', 13, '2016-05-13', 'sur', 'day'),
(271, 'nazmul.hasan', 13, '2016-05-13', 'sur', 'day'),
(272, 'sarbik.sahan', 13, '2016-05-13', 'bo', 'day'),
(273, 'puspita.topu', 13, '2016-05-13', 'bo', 'day'),
(274, 'sadia.afrin', 13, '2016-05-13', 'iig', 'day'),
(275, 'imroze.ahmed', 13, '2016-05-13', 'iig', 'day'),
(276, 'ahsan.zaki', 13, '2016-05-13', 'icx', 'day'),
(277, 'rayhan.hossain', 13, '2016-05-13', 'icx', 'day'),
(278, 'sadaf.mahmud', 13, '2016-05-13', 'shift_leader', 'evening'),
(279, 'anika.sharmin', 13, '2016-05-13', 'sur', 'evening'),
(280, 's.majumder', 13, '2016-05-13', 'sur', 'evening'),
(281, 'etanvir.ahmed', 13, '2016-05-13', 'bo', 'evening'),
(282, 'maruf.mohammad', 13, '2016-05-13', 'bo', 'evening'),
(283, 'iftakhar.jahan', 13, '2016-05-13', 'iig', 'evening'),
(284, 'shamim.hassan', 13, '2016-05-13', 'icx', 'evening'),
(285, 'mir.raihan', 13, '2016-05-13', 'shift_leader', 'night'),
(286, 'samar.kumar', 13, '2016-05-13', 'sur', 'night'),
(287, 'tanveer.ahmed', 13, '2016-05-13', 'bo', 'night'),
(288, 'rahul.biswas', 13, '2016-05-13', 'iig', 'night'),
(289, 'ashiqur.rahman', 13, '2016-05-13', 'icx', 'night'),
(290, 'mahbub.hasan', 14, '2016-05-14', 'shift_leader', 'day'),
(291, 'nafisa.sayed', 14, '2016-05-14', 'sur', 'day'),
(292, 'nazmul.hasan', 14, '2016-05-14', 'sur', 'day'),
(293, 'puspita.topu', 14, '2016-05-14', 'bo', 'day'),
(294, 'iqbal.ahmed', 14, '2016-05-14', 'bo', 'day'),
(295, 'tahsinul.ferdous', 14, '2016-05-14', 'iig', 'day'),
(296, 'sadia.afrin', 14, '2016-05-14', 'iig', 'day'),
(297, 'rayhan.hossain', 14, '2016-05-14', 'icx', 'day'),
(298, 'sadaf.mahmud', 14, '2016-05-14', 'shift_leader', 'evening'),
(299, 'nasrin.akter', 14, '2016-05-14', 'sur', 'evening'),
(300, 's.majumder', 14, '2016-05-14', 'sur', 'evening'),
(301, 'sarbik.sahan', 14, '2016-05-14', 'bo', 'evening'),
(302, 'maruf.mohammad', 14, '2016-05-14', 'bo', 'evening'),
(303, 'imroze.ahmed', 14, '2016-05-14', 'bo', 'evening'),
(304, 'shamim.hassan', 14, '2016-05-14', 'icx', 'evening'),
(305, 'saeed.naser', 14, '2016-05-14', 'shift_leader', 'night'),
(306, 'umar.rafaet', 14, '2016-05-14', 'sur', 'night'),
(307, 'etanvir.ahmed', 14, '2016-05-14', 'bo', 'night'),
(308, 'iftakhar.jahan', 14, '2016-05-14', 'iig', 'night'),
(309, 'ashiqur.rahman', 14, '2016-05-14', 'icx', 'night'),
(310, 'ahsan.zaki', 14, '2016-05-14', 'icx', 'night'),
(311, 'sakib.ullah', 15, '2016-05-15', 'shift_leader', 'day'),
(312, 'akramul.tarafdar', 15, '2016-05-15', 'sur', 'day'),
(313, 'rifat.hasan', 15, '2016-05-15', 'sur', 'day'),
(314, 'nafisa.sayed', 15, '2016-05-15', 'sur', 'day'),
(315, 'nowrin.karim', 15, '2016-05-15', 'bo', 'day'),
(316, 'iqbal.ahmed', 15, '2016-05-15', 'bo', 'day'),
(317, 'tahsinul.ferdous', 15, '2016-05-15', 'iig', 'day'),
(318, 'saiham.rahman', 15, '2016-05-15', 'icx', 'day'),
(319, 'mahbub.hasan', 15, '2016-05-15', 'shift_leader', 'evening'),
(320, 'nasrin.akter', 15, '2016-05-15', 'sur', 'evening'),
(321, 's.majumder', 15, '2016-05-15', 'sur', 'evening'),
(322, 'nazmul.hasan', 15, '2016-05-15', 'sur', 'evening'),
(323, 'sadaf.mahmud', 15, '2016-05-15', 'bo', 'evening'),
(324, 'puspita.topu', 15, '2016-05-15', 'bo', 'evening'),
(325, 'sadia.afrin', 15, '2016-05-15', 'iig', 'evening'),
(326, 'imroze.ahmed', 15, '2016-05-15', 'iig', 'evening'),
(327, 'rayhan.hossain', 15, '2016-05-15', 'icx', 'evening'),
(328, 'saeed.naser', 15, '2016-05-15', 'shift_leader', 'night'),
(329, 'sarbik.sahan', 15, '2016-05-15', 'sur', 'night'),
(330, 'umar.rafaet', 15, '2016-05-15', 'sur', 'night'),
(331, 'maruf.mohammad', 15, '2016-05-15', 'bo', 'night'),
(332, 'iftakhar.jahan', 15, '2016-05-15', 'iig', 'night'),
(333, 'shamim.hassan', 15, '2016-05-15', 'icx', 'night'),
(334, 'ahsan.zaki', 15, '2016-05-15', 'icx', 'night'),
(335, 'sakib.ullah', 16, '2016-05-16', 'shift_leader', 'day'),
(336, 'nafisa.sayed', 16, '2016-05-16', 'sur', 'day'),
(337, 'anika.sharmin', 16, '2016-05-16', 'sur', 'day'),
(338, 'nowrin.karim', 16, '2016-05-16', 'bo', 'day'),
(339, 'samar.kumar', 16, '2016-05-16', 'bo', 'day'),
(340, 'tanveer.ahmed', 16, '2016-05-16', 'iig', 'day'),
(341, 'sadia.afrin', 16, '2016-05-16', 'iig', 'day'),
(342, 'saiham.rahman', 16, '2016-05-16', 'icx', 'day'),
(343, 'mahbub.hasan', 16, '2016-05-16', 'shift_leader', 'evening'),
(344, 'mir.raihan', 16, '2016-05-16', 'shift_leader', 'evening'),
(345, 'akramul.tarafdar', 16, '2016-05-16', 'sur', 'evening'),
(346, 'rifat.hasan', 16, '2016-05-16', 'sur', 'evening'),
(347, 'puspita.topu', 16, '2016-05-16', 'bo', 'evening'),
(348, 'iqbal.ahmed', 16, '2016-05-16', 'bo', 'evening'),
(349, 'tahsinul.ferdous', 16, '2016-05-16', 'iig', 'evening'),
(350, 'rahul.biswas', 16, '2016-05-16', 'iig', 'evening'),
(351, 'rayhan.hossain', 16, '2016-05-16', 'icx', 'evening'),
(352, 'sadaf.mahmud', 16, '2016-05-16', 'shift_leader', 'night'),
(353, 's.majumder', 16, '2016-05-16', 'sur', 'night'),
(354, 'nazmul.hasan', 16, '2016-05-16', 'sur', 'night'),
(355, 'sarbik.sahan', 16, '2016-05-16', 'bo', 'night'),
(356, 'imroze.ahmed', 16, '2016-05-16', 'iig', 'night'),
(357, 'shamim.hassan', 16, '2016-05-16', 'icx', 'night'),
(358, 'mir.raihan', 17, '2016-05-17', 'shift_leader', 'day'),
(359, 'nasrin.akter', 17, '2016-05-17', 'sur', 'day'),
(360, 'anika.sharmin', 17, '2016-05-17', 'sur', 'day'),
(361, 'nowrin.karim', 17, '2016-05-17', 'bo', 'day'),
(362, 'etanvir.ahmed', 17, '2016-05-17', 'bo', 'day'),
(363, 'rahul.biswas', 17, '2016-05-17', 'iig', 'day'),
(364, 'sadia.afrin', 17, '2016-05-17', 'iig', 'day'),
(365, 'ashiqur.rahman', 17, '2016-05-17', 'icx', 'day'),
(366, 'sakib.ullah', 17, '2016-05-17', 'shift_leader', 'evening'),
(367, 'akramul.tarafdar', 17, '2016-05-17', 'sur', 'evening'),
(368, 'rifat.hasan', 17, '2016-05-17', 'sur', 'evening'),
(369, 'nafisa.sayed', 17, '2016-05-17', 'sur', 'evening'),
(370, 'samar.kumar', 17, '2016-05-17', 'bo', 'evening'),
(371, 'puspita.topu', 17, '2016-05-17', 'bo', 'evening'),
(372, 'tanveer.ahmed', 17, '2016-05-17', 'iig', 'evening'),
(373, 'saiham.rahman', 17, '2016-05-17', 'icx', 'evening'),
(374, 'mahbub.hasan', 17, '2016-05-17', 'shift_leader', 'night'),
(375, 'iqbal.ahmed', 17, '2016-05-17', 'sur', 'night'),
(376, 's.majumder', 17, '2016-05-17', 'sur', 'night'),
(377, 'sadaf.mahmud', 17, '2016-05-17', 'bo', 'night'),
(378, 'tahsinul.ferdous', 17, '2016-05-17', 'iig', 'night'),
(379, 'rayhan.hossain', 17, '2016-05-17', 'icx', 'night'),
(380, 'mir.raihan', 18, '2016-05-18', 'shift_leader', 'day'),
(381, 'saeed.naser', 18, '2016-05-18', 'shift_leader', 'day'),
(382, 'nasrin.akter', 18, '2016-05-18', 'sur', 'day'),
(383, 'anika.sharmin', 18, '2016-05-18', 'sur', 'day'),
(384, 'etanvir.ahmed', 18, '2016-05-18', 'bo', 'day'),
(385, 'maruf.mohammad', 18, '2016-05-18', 'bo', 'day'),
(386, 'iftakhar.jahan', 18, '2016-05-18', 'iig', 'day'),
(387, 'rahul.biswas', 18, '2016-05-18', 'iig', 'day'),
(388, 'ashiqur.rahman', 18, '2016-05-18', 'icx', 'day'),
(389, 'sakib.ullah', 18, '2016-05-18', 'shift_leader', 'evening'),
(390, 'nafisa.sayed', 18, '2016-05-18', 'sur', 'evening'),
(391, 'umar.rafaet', 18, '2016-05-18', 'sur', 'evening'),
(392, 'nowrin.karim', 18, '2016-05-18', 'bo', 'evening'),
(393, 'samar.kumar', 18, '2016-05-18', 'bo', 'evening'),
(394, 'tanveer.ahmed', 18, '2016-05-18', 'iig', 'evening'),
(395, 'ahsan.zaki', 18, '2016-05-18', 'icx', 'evening'),
(396, 'mahbub.hasan', 18, '2016-05-18', 'shift_leader', 'night'),
(397, 'akramul.tarafdar', 18, '2016-05-18', 'sur', 'night'),
(398, 'rifat.hasan', 18, '2016-05-18', 'sur', 'night'),
(399, 'iqbal.ahmed', 18, '2016-05-18', 'bo', 'night'),
(400, 'tahsinul.ferdous', 18, '2016-05-18', 'iig', 'night'),
(401, 'saiham.rahman', 18, '2016-05-18', 'icx', 'night'),
(402, 'saeed.naser', 19, '2016-05-19', 'shift_leader', 'day'),
(403, 'umar.rafaet', 19, '2016-05-19', 'sur', 'day'),
(404, 'nazmul.hasan', 19, '2016-05-19', 'sur', 'day'),
(405, 'sarbik.sahan', 19, '2016-05-19', 'bo', 'day'),
(406, 'maruf.mohammad', 19, '2016-05-19', 'bo', 'day'),
(407, 'rahul.biswas', 19, '2016-05-19', 'iig', 'day'),
(408, 'imroze.ahmed', 19, '2016-05-19', 'iig', 'day'),
(409, 'shamim.hassan', 19, '2016-05-19', 'icx', 'day'),
(410, 'ahsan.zaki', 19, '2016-05-19', 'icx', 'day'),
(411, 'mir.raihan', 19, '2016-05-19', 'shift_leader', 'evening'),
(412, 'nasrin.akter', 19, '2016-05-19', 'sur', 'evening'),
(413, 'anika.sharmin', 19, '2016-05-19', 'sur', 'evening'),
(414, 'nowrin.karim', 19, '2016-05-19', 'bo', 'evening'),
(415, 'etanvir.ahmed', 19, '2016-05-19', 'bo', 'evening'),
(416, 'iftakhar.jahan', 19, '2016-05-19', 'iig', 'evening'),
(417, 'ashiqur.rahman', 19, '2016-05-19', 'icx', 'evening'),
(418, 'sakib.ullah', 19, '2016-05-19', 'shift_leader', 'night'),
(419, 'akramul.tarafdar', 19, '2016-05-19', 'sur', 'night'),
(420, 'rifat.hasan', 19, '2016-05-19', 'sur', 'night'),
(421, 'samar.kumar', 19, '2016-05-19', 'bo', 'night'),
(422, 'tanveer.ahmed', 19, '2016-05-19', 'iig', 'night'),
(423, 'saiham.rahman', 19, '2016-05-19', 'icx', 'night'),
(424, 'saeed.naser', 20, '2016-05-20', 'shift_leader', 'day'),
(425, 'umar.rafaet', 20, '2016-05-20', 'sur', 'day'),
(426, 'nazmul.hasan', 20, '2016-05-20', 'sur', 'day'),
(427, 'sarbik.sahan', 20, '2016-05-20', 'bo', 'day'),
(428, 'puspita.topu', 20, '2016-05-20', 'bo', 'day'),
(429, 'sadia.afrin', 20, '2016-05-20', 'iig', 'day'),
(430, 'imroze.ahmed', 20, '2016-05-20', 'iig', 'day'),
(431, 'ahsan.zaki', 20, '2016-05-20', 'icx', 'day'),
(432, 'rayhan.hossain', 20, '2016-05-20', 'icx', 'day'),
(433, 'sadaf.mahmud', 20, '2016-05-20', 'shift_leader', 'evening'),
(434, 'anika.sharmin', 20, '2016-05-20', 'sur', 'evening'),
(435, 's.majumder', 20, '2016-05-20', 'sur', 'evening'),
(436, 'etanvir.ahmed', 20, '2016-05-20', 'bo', 'evening'),
(437, 'maruf.mohammad', 20, '2016-05-20', 'bo', 'evening'),
(438, 'iftakhar.jahan', 20, '2016-05-20', 'iig', 'evening'),
(439, 'shamim.hassan', 20, '2016-05-20', 'icx', 'evening'),
(440, 'mir.raihan', 20, '2016-05-20', 'shift_leader', 'night'),
(441, 'samar.kumar', 20, '2016-05-20', 'sur', 'night'),
(442, 'tanveer.ahmed', 20, '2016-05-20', 'bo', 'night'),
(443, 'rahul.biswas', 20, '2016-05-20', 'iig', 'night'),
(444, 'ashiqur.rahman', 20, '2016-05-20', 'icx', 'night'),
(445, 'mahbub.hasan', 21, '2016-05-21', 'shift_leader', 'day'),
(446, 'nafisa.sayed', 21, '2016-05-21', 'sur', 'day'),
(447, 'nazmul.hasan', 21, '2016-05-21', 'sur', 'day'),
(448, 'puspita.topu', 21, '2016-05-21', 'bo', 'day'),
(449, 'iqbal.ahmed', 21, '2016-05-21', 'bo', 'day'),
(450, 'tahsinul.ferdous', 21, '2016-05-21', 'iig', 'day'),
(451, 'sadia.afrin', 21, '2016-05-21', 'iig', 'day'),
(452, 'rayhan.hossain', 21, '2016-05-21', 'icx', 'day'),
(453, 'sadaf.mahmud', 21, '2016-05-21', 'shift_leader', 'evening'),
(454, 'nasrin.akter', 21, '2016-05-21', 'sur', 'evening'),
(455, 's.majumder', 21, '2016-05-21', 'sur', 'evening'),
(456, 'sarbik.sahan', 21, '2016-05-21', 'bo', 'evening'),
(457, 'maruf.mohammad', 21, '2016-05-21', 'bo', 'evening'),
(458, 'imroze.ahmed', 21, '2016-05-21', 'bo', 'evening'),
(459, 'shamim.hassan', 21, '2016-05-21', 'icx', 'evening'),
(460, 'saeed.naser', 21, '2016-05-21', 'shift_leader', 'night'),
(461, 'umar.rafaet', 21, '2016-05-21', 'sur', 'night'),
(462, 'etanvir.ahmed', 21, '2016-05-21', 'bo', 'night'),
(463, 'iftakhar.jahan', 21, '2016-05-21', 'iig', 'night'),
(464, 'ashiqur.rahman', 21, '2016-05-21', 'icx', 'night'),
(465, 'ahsan.zaki', 21, '2016-05-21', 'icx', 'night'),
(466, 'sakib.ullah', 22, '2016-05-22', 'shift_leader', 'day'),
(467, 'akramul.tarafdar', 22, '2016-05-22', 'sur', 'day'),
(468, 'rifat.hasan', 22, '2016-05-22', 'sur', 'day'),
(469, 'nafisa.sayed', 22, '2016-05-22', 'sur', 'day'),
(470, 'nowrin.karim', 22, '2016-05-22', 'bo', 'day'),
(471, 'iqbal.ahmed', 22, '2016-05-22', 'bo', 'day'),
(472, 'tahsinul.ferdous', 22, '2016-05-22', 'iig', 'day'),
(473, 'saiham.rahman', 22, '2016-05-22', 'icx', 'day'),
(474, 'mahbub.hasan', 22, '2016-05-22', 'shift_leader', 'evening'),
(475, 'nasrin.akter', 22, '2016-05-22', 'sur', 'evening'),
(476, 's.majumder', 22, '2016-05-22', 'sur', 'evening'),
(477, 'nazmul.hasan', 22, '2016-05-22', 'sur', 'evening'),
(478, 'sadaf.mahmud', 22, '2016-05-22', 'bo', 'evening'),
(479, 'puspita.topu', 22, '2016-05-22', 'bo', 'evening'),
(480, 'sadia.afrin', 22, '2016-05-22', 'iig', 'evening'),
(481, 'imroze.ahmed', 22, '2016-05-22', 'iig', 'evening'),
(482, 'rayhan.hossain', 22, '2016-05-22', 'icx', 'evening'),
(483, 'saeed.naser', 22, '2016-05-22', 'shift_leader', 'night'),
(484, 'sarbik.sahan', 22, '2016-05-22', 'sur', 'night'),
(485, 'umar.rafaet', 22, '2016-05-22', 'sur', 'night'),
(486, 'maruf.mohammad', 22, '2016-05-22', 'bo', 'night'),
(487, 'iftakhar.jahan', 22, '2016-05-22', 'iig', 'night'),
(488, 'shamim.hassan', 22, '2016-05-22', 'icx', 'night'),
(489, 'ahsan.zaki', 22, '2016-05-22', 'icx', 'night'),
(490, 'sakib.ullah', 23, '2016-05-23', 'shift_leader', 'day'),
(491, 'nafisa.sayed', 23, '2016-05-23', 'sur', 'day'),
(492, 'anika.sharmin', 23, '2016-05-23', 'sur', 'day'),
(493, 'nowrin.karim', 23, '2016-05-23', 'bo', 'day'),
(494, 'samar.kumar', 23, '2016-05-23', 'bo', 'day'),
(495, 'tanveer.ahmed', 23, '2016-05-23', 'iig', 'day'),
(496, 'sadia.afrin', 23, '2016-05-23', 'iig', 'day'),
(497, 'saiham.rahman', 23, '2016-05-23', 'icx', 'day'),
(498, 'mahbub.hasan', 23, '2016-05-23', 'shift_leader', 'evening'),
(499, 'mir.raihan', 23, '2016-05-23', 'shift_leader', 'evening'),
(500, 'akramul.tarafdar', 23, '2016-05-23', 'sur', 'evening'),
(501, 'rifat.hasan', 23, '2016-05-23', 'sur', 'evening'),
(502, 'puspita.topu', 23, '2016-05-23', 'bo', 'evening'),
(503, 'iqbal.ahmed', 23, '2016-05-23', 'bo', 'evening'),
(504, 'tahsinul.ferdous', 23, '2016-05-23', 'iig', 'evening'),
(505, 'rahul.biswas', 23, '2016-05-23', 'iig', 'evening'),
(506, 'rayhan.hossain', 23, '2016-05-23', 'icx', 'evening'),
(507, 'sadaf.mahmud', 23, '2016-05-23', 'shift_leader', 'night'),
(508, 's.majumder', 23, '2016-05-23', 'sur', 'night'),
(509, 'nazmul.hasan', 23, '2016-05-23', 'sur', 'night'),
(510, 'sarbik.sahan', 23, '2016-05-23', 'bo', 'night'),
(511, 'imroze.ahmed', 23, '2016-05-23', 'iig', 'night'),
(512, 'shamim.hassan', 23, '2016-05-23', 'icx', 'night'),
(915, '', 47, '2016-05-26', 'shift_leader', 'day'),
(916, '', 47, '2016-05-26', 'sur', 'day'),
(917, '', 47, '2016-05-26', 'bo', 'day'),
(918, '', 47, '2016-05-26', 'iig', 'day'),
(919, '', 47, '2016-05-26', 'icx', 'day'),
(920, '', 47, '2016-05-26', 'shift_leader', 'evening'),
(921, '', 47, '2016-05-26', 'sur', 'evening'),
(922, '', 47, '2016-05-26', 'bo', 'evening'),
(923, '', 47, '2016-05-26', 'iig', 'evening'),
(924, '', 47, '2016-05-26', 'icx', 'evening'),
(925, '', 47, '2016-05-26', 'shift_leader', 'night'),
(926, '', 47, '2016-05-26', 'sur', 'night'),
(927, '', 47, '2016-05-26', 'bo', 'night'),
(928, '', 47, '2016-05-26', 'iig', 'night'),
(929, '', 47, '2016-05-26', 'icx', 'night'),
(930, '', 48, '2016-05-27', 'shift_leader', 'day'),
(931, '', 48, '2016-05-27', 'sur', 'day'),
(932, '', 48, '2016-05-27', 'bo', 'day'),
(933, '', 48, '2016-05-27', 'iig', 'day'),
(934, '', 48, '2016-05-27', 'icx', 'day'),
(935, '', 48, '2016-05-27', 'shift_leader', 'evening'),
(936, '', 48, '2016-05-27', 'sur', 'evening'),
(937, '', 48, '2016-05-27', 'bo', 'evening'),
(938, '', 48, '2016-05-27', 'iig', 'evening'),
(939, '', 48, '2016-05-27', 'icx', 'evening'),
(940, '', 48, '2016-05-27', 'shift_leader', 'night'),
(941, '', 48, '2016-05-27', 'sur', 'night'),
(942, '', 48, '2016-05-27', 'bo', 'night'),
(943, '', 48, '2016-05-27', 'iig', 'night'),
(944, '', 48, '2016-05-27', 'icx', 'night'),
(945, '', 49, '2016-05-28', 'shift_leader', 'day'),
(946, '', 49, '2016-05-28', 'sur', 'day'),
(947, '', 49, '2016-05-28', 'bo', 'day'),
(948, '', 49, '2016-05-28', 'iig', 'day'),
(949, '', 49, '2016-05-28', 'icx', 'day'),
(950, '', 49, '2016-05-28', 'shift_leader', 'evening'),
(951, '', 49, '2016-05-28', 'sur', 'evening'),
(952, '', 49, '2016-05-28', 'bo', 'evening'),
(953, '', 49, '2016-05-28', 'bo', 'evening'),
(954, '', 49, '2016-05-28', 'icx', 'evening'),
(955, '', 49, '2016-05-28', 'shift_leader', 'night'),
(956, '', 49, '2016-05-28', 'sur', 'night'),
(957, '', 49, '2016-05-28', 'bo', 'night'),
(958, '', 49, '2016-05-28', 'iig', 'night'),
(959, '', 49, '2016-05-28', 'icx', 'night'),
(960, '', 50, '2016-05-29', 'shift_leader', 'day'),
(961, '', 50, '2016-05-29', 'sur', 'day'),
(962, '', 50, '2016-05-29', 'bo', 'day'),
(963, '', 50, '2016-05-29', 'iig', 'day'),
(964, '', 50, '2016-05-29', 'icx', 'day'),
(965, '', 50, '2016-05-29', 'shift_leader', 'evening'),
(966, '', 50, '2016-05-29', 'sur', 'evening'),
(967, '', 50, '2016-05-29', 'bo', 'evening'),
(968, '', 50, '2016-05-29', 'iig', 'evening'),
(969, '', 50, '2016-05-29', 'icx', 'evening'),
(970, '', 50, '2016-05-29', 'shift_leader', 'night'),
(971, '', 50, '2016-05-29', 'sur', 'night'),
(972, '', 50, '2016-05-29', 'bo', 'night'),
(973, '', 50, '2016-05-29', 'iig', 'night'),
(974, '', 50, '2016-05-29', 'icx', 'night'),
(975, '', 51, '2016-05-30', 'shift_leader', 'day'),
(976, '', 51, '2016-05-30', 'sur', 'day'),
(977, '', 51, '2016-05-30', 'bo', 'day'),
(978, '', 51, '2016-05-30', 'iig', 'day'),
(979, '', 51, '2016-05-30', 'icx', 'day'),
(980, '', 51, '2016-05-30', 'shift_leader', 'evening'),
(981, '', 51, '2016-05-30', 'sur', 'evening'),
(982, '', 51, '2016-05-30', 'bo', 'evening'),
(983, '', 51, '2016-05-30', 'iig', 'evening'),
(984, '', 51, '2016-05-30', 'icx', 'evening'),
(985, '', 51, '2016-05-30', 'shift_leader', 'night'),
(986, '', 51, '2016-05-30', 'sur', 'night'),
(987, '', 51, '2016-05-30', 'bo', 'night'),
(988, '', 51, '2016-05-30', 'iig', 'night'),
(989, '', 51, '2016-05-30', 'icx', 'night'),
(990, '', 52, '2016-05-31', 'shift_leader', 'day'),
(991, '', 52, '2016-05-31', 'sur', 'day'),
(992, '', 52, '2016-05-31', 'bo', 'day'),
(993, '', 52, '2016-05-31', 'iig', 'day'),
(994, '', 52, '2016-05-31', 'icx', 'day'),
(995, '', 52, '2016-05-31', 'shift_leader', 'evening'),
(996, '', 52, '2016-05-31', 'sur', 'evening'),
(997, '', 52, '2016-05-31', 'bo', 'evening'),
(998, '', 52, '2016-05-31', 'iig', 'evening'),
(999, '', 52, '2016-05-31', 'icx', 'evening'),
(1000, '', 52, '2016-05-31', 'shift_leader', 'night'),
(1001, '', 52, '2016-05-31', 'sur', 'night'),
(1002, '', 52, '2016-05-31', 'bo', 'night'),
(1003, '', 52, '2016-05-31', 'iig', 'night'),
(1004, '', 52, '2016-05-31', 'icx', 'night'),
(1005, 'mir.raihan', 24, '2016-05-24', 'shift_leader', 'day'),
(1006, 'nasrin.akter', 24, '2016-05-24', 'sur', 'day'),
(1007, 'anika.sharmin', 24, '2016-05-24', 'sur', 'day'),
(1008, 'nowrin.karim', 24, '2016-05-24', 'bo', 'day'),
(1009, 'etanvir.ahmed', 24, '2016-05-24', 'bo', 'day'),
(1010, 'rahul.biswas', 24, '2016-05-24', 'iig', 'day'),
(1011, 'sadia.afrin', 24, '2016-05-24', 'iig', 'day'),
(1012, 'ashiqur.rahman', 24, '2016-05-24', 'icx', 'day'),
(1013, 'sakib.ullah', 24, '2016-05-24', 'shift_leader', 'evening'),
(1014, 'akramul.tarafdar', 24, '2016-05-24', 'sur', 'evening'),
(1015, 'rifat.hasan', 24, '2016-05-24', 'sur', 'evening'),
(1016, 'nafisa.sayed', 24, '2016-05-24', 'sur', 'evening'),
(1017, 'samar.kumar', 24, '2016-05-24', 'bo', 'evening'),
(1018, 'puspita.topu', 24, '2016-05-24', 'bo', 'evening'),
(1019, 'tanveer.ahmed', 24, '2016-05-24', 'iig', 'evening'),
(1020, 'saiham.rahman', 24, '2016-05-24', 'icx', 'evening'),
(1021, 'mahbub.hasan', 24, '2016-05-24', 'shift_leader', 'night'),
(1022, 'iqbal.ahmed', 24, '2016-05-24', 'sur', 'night'),
(1023, 's.majumder', 24, '2016-05-24', 'sur', 'night'),
(1024, 'sadaf.mahmud', 24, '2016-05-24', 'bo', 'night'),
(1025, 'tahsinul.ferdous', 24, '2016-05-24', 'iig', 'night'),
(1026, 'rayhan.hossain', 24, '2016-05-24', 'icx', 'night'),
(1050, 'mir.raihan', 46, '2016-05-25', 'shift_leader', 'day'),
(1051, 'saeed.naser', 46, '2016-05-25', 'shift_leader', 'day'),
(1052, 'nasrin.akter', 46, '2016-05-25', 'sur', 'day'),
(1053, 'anika.sharmin', 46, '2016-05-25', 'sur', 'day'),
(1054, 'maruf.mohammad', 46, '2016-05-25', 'bo', 'day'),
(1055, 'etanvir.ahmed', 46, '2016-05-25', 'bo', 'day'),
(1056, 'iftakhar.jahan', 46, '2016-05-25', 'iig', 'day'),
(1057, 'rahul.biswas', 46, '2016-05-25', 'iig', 'day'),
(1058, 'ashiqur.rahman', 46, '2016-05-25', 'icx', 'day'),
(1059, 'sakib.ullah', 46, '2016-05-25', 'shift_leader', 'evening'),
(1060, 'nafisa.sayed', 46, '2016-05-25', 'sur', 'evening'),
(1061, 'akramul.tarafdar', 46, '2016-05-25', 'sur', 'evening'),
(1062, 'nowrin.karim', 46, '2016-05-25', 'bo', 'evening'),
(1063, 'samar.kumar', 46, '2016-05-25', 'bo', 'evening'),
(1064, 'umar.rafaet', 46, '2016-05-25', 'bo', 'evening'),
(1065, 'tanveer.ahmed', 46, '2016-05-25', 'iig', 'evening'),
(1066, 'ahsan.zaki', 46, '2016-05-25', 'icx', 'evening'),
(1067, 'mahbub.hasan', 46, '2016-05-25', 'shift_leader', 'night'),
(1068, 'rifat.hasan', 46, '2016-05-25', 'sur', 'night'),
(1069, 'wahidul.ashrafe', 46, '2016-05-25', 'sur', 'night'),
(1070, 'iqbal.ahmed', 46, '2016-05-25', 'bo', 'night'),
(1071, 'tahsinul.ferdous', 46, '2016-05-25', 'iig', 'night'),
(1072, 'saiham.rahman', 46, '2016-05-25', 'icx', 'night');

-- --------------------------------------------------------

--
-- Table structure for table `shifttable`
--

CREATE TABLE IF NOT EXISTS `shifttable` (
  `shift_id` int(11) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shifttable`
--

INSERT INTO `shifttable` (`shift_id`, `shift_date`, `shift_last_updated`) VALUES
(1, '2016-05-01', '0000-00-00 00:00:00'),
(2, '2016-05-02', '0000-00-00 00:00:00'),
(3, '2016-05-03', '0000-00-00 00:00:00'),
(4, '2016-05-04', '0000-00-00 00:00:00'),
(5, '2016-05-05', '0000-00-00 00:00:00'),
(6, '2016-05-06', '0000-00-00 00:00:00'),
(7, '2016-05-07', '0000-00-00 00:00:00'),
(8, '2016-05-08', '0000-00-00 00:00:00'),
(9, '2016-05-09', '0000-00-00 00:00:00'),
(10, '2016-05-10', '0000-00-00 00:00:00'),
(11, '2016-05-11', '0000-00-00 00:00:00'),
(12, '2016-05-12', '0000-00-00 00:00:00'),
(13, '2016-05-13', '0000-00-00 00:00:00'),
(14, '2016-05-14', '0000-00-00 00:00:00'),
(15, '2016-05-15', '0000-00-00 00:00:00'),
(16, '2016-05-16', '0000-00-00 00:00:00'),
(17, '2016-05-17', '0000-00-00 00:00:00'),
(18, '2016-05-18', '0000-00-00 00:00:00'),
(19, '2016-05-19', '0000-00-00 00:00:00'),
(20, '2016-05-20', '0000-00-00 00:00:00'),
(21, '2016-05-21', '0000-00-00 00:00:00'),
(22, '2016-05-22', '0000-00-00 00:00:00'),
(23, '2016-05-23', '0000-00-00 00:00:00'),
(24, '2016-05-24', '0000-00-00 00:00:00'),
(46, '2016-05-25', '0000-00-00 00:00:00'),
(47, '2016-05-26', '0000-00-00 00:00:00'),
(48, '2016-05-27', '0000-00-00 00:00:00'),
(49, '2016-05-28', '0000-00-00 00:00:00'),
(50, '2016-05-29', '0000-00-00 00:00:00'),
(51, '2016-05-30', '0000-00-00 00:00:00'),
(52, '2016-05-31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `swaptable`
--

CREATE TABLE IF NOT EXISTS `swaptable` (
  `swap_row_id` int(11) NOT NULL,
  `swapRequester` varchar(255) NOT NULL,
  `swapAccepter` varchar(255) NOT NULL,
  `swapShift1` date NOT NULL,
  `swapShift2` date NOT NULL,
  `swapStatus` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`role_row_id`);

--
-- Indexes for table `daytable`
--
ALTER TABLE `daytable`
  ADD PRIMARY KEY (`day_row_id`);

--
-- Indexes for table `eveningtable`
--
ALTER TABLE `eveningtable`
  ADD PRIMARY KEY (`evening_row_id`);

--
-- Indexes for table `leavetable`
--
ALTER TABLE `leavetable`
  ADD PRIMARY KEY (`leave_row_id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`log_row_id`);

--
-- Indexes for table `nighttable`
--
ALTER TABLE `nighttable`
  ADD PRIMARY KEY (`night_row_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `rostertable`
--
ALTER TABLE `rostertable`
  ADD PRIMARY KEY (`roster_table_id`);

--
-- Indexes for table `shifttable`
--
ALTER TABLE `shifttable`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `swaptable`
--
ALTER TABLE `swaptable`
  ADD PRIMARY KEY (`swap_row_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `role_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `daytable`
--
ALTER TABLE `daytable`
  MODIFY `day_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `eveningtable`
--
ALTER TABLE `eveningtable`
  MODIFY `evening_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `leavetable`
--
ALTER TABLE `leavetable`
  MODIFY `leave_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `log_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `nighttable`
--
ALTER TABLE `nighttable`
  MODIFY `night_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `rostertable`
--
ALTER TABLE `rostertable`
  MODIFY `roster_table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1073;
--
-- AUTO_INCREMENT for table `shifttable`
--
ALTER TABLE `shifttable`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `swaptable`
--
ALTER TABLE `swaptable`
  MODIFY `swap_row_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
