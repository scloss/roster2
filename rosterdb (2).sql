-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 11:07 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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

CREATE TABLE `admintable` (
  `role_row_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`role_row_id`, `user_id`) VALUES
(1, 'showmen.barua');

-- --------------------------------------------------------

--
-- Table structure for table `daytable`
--

CREATE TABLE `daytable` (
  `day_row_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_member` varchar(255) NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `day_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eveningtable`
--

CREATE TABLE `eveningtable` (
  `evening_row_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_member` varchar(255) NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `evening_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidaytable`
--

CREATE TABLE `holidaytable` (
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

CREATE TABLE `leavetable` (
  `leave_row_id` int(11) NOT NULL,
  `leave_requester` varchar(255) NOT NULL,
  `leave_date_from` date NOT NULL,
  `leave_date_to` date NOT NULL,
  `leave_status` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nighttable`
--

CREATE TABLE `nighttable` (
  `night_row_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_member` varchar(255) NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `night_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rostertable`
--

CREATE TABLE `rostertable` (
  `roster_table_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_position` varchar(255) NOT NULL,
  `shift_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shifttable`
--

CREATE TABLE `shifttable` (
  `shift_id` int(11) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `swaptable`
--

CREATE TABLE `swaptable` (
  `swap_row_id` int(11) NOT NULL,
  `swapRequester` varchar(255) NOT NULL,
  `swapAccepter` varchar(255) NOT NULL,
  `swapShift1` date NOT NULL,
  `swapShift2` date NOT NULL,
  `swapStatus` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL
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
  MODIFY `role_row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daytable`
--
ALTER TABLE `daytable`
  MODIFY `day_row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eveningtable`
--
ALTER TABLE `eveningtable`
  MODIFY `evening_row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leavetable`
--
ALTER TABLE `leavetable`
  MODIFY `leave_row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nighttable`
--
ALTER TABLE `nighttable`
  MODIFY `night_row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rostertable`
--
ALTER TABLE `rostertable`
  MODIFY `roster_table_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shifttable`
--
ALTER TABLE `shifttable`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `swaptable`
--
ALTER TABLE `swaptable`
  MODIFY `swap_row_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
