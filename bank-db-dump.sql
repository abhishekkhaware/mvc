-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2014 at 03:38 AM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.8-3+sury.org~saucy+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--
CREATE DATABASE IF NOT EXISTS `bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bank`;

-- --------------------------------------------------------

--
-- Table structure for table `branchdetails`
--

CREATE TABLE IF NOT EXISTS `branchdetails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(120) NOT NULL,
  `branch_manager` varchar(80) NOT NULL,
  `location` text NOT NULL,
  `email` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `branchdetails`
--

INSERT INTO `branchdetails` (`id`, `branch_name`, `branch_manager`, `location`, `email`) VALUES
(1, 'MayurVihar-II', 'Santosh Kumar', 'Pocket -A, Mayur Vihar-II, New Delhi-92', 'santoshkumar@yahoo.com'),
(2, 'MayurVihar-I', 'Rajeev Ranjan', 'Pocket -C, Mayur Vihar-I, New Delhi-92', 'rajeevranjan@gmail.com'),
(3, 'South Ex', 'Pinki Sharma', 'K16, South Ex-I, New Delhi-92', 'pinkisharma@rediffmail.com'),
(4, 'Vinod Nagar', 'Abhishek Khaware', '124, West Vinod Nagar, New Delhi-92', 'abhishekkhaware@gmail.com'),
(5, 'Laxmi Nagar', 'Manish Raana', 'S-86, Laxmi Nagar, New Delhi-92', 'manishraana@hotmail.com'),
(6, 'Rajender Nagar', 'Anjana Agarwal', 'F-186, New Rajender Nagar, New Delhi-92', 'anjana86@hotmail.com'),
(7, 'Janakpuri', 'Jyoti Rajpal', 'D-186, Janakpuri East, New Delhi-92', 'jyoti.rajpal@gmail.com'),
(8, 'Sagar Pur', 'Avinash Tiwari', 'A-86/2, Sagar Pur, New Delhi-92', 'avinash.t1991@gmail.com'),
(9, 'Lajpat Nagar', 'Manoj Gupta', 'C-12, Lajpat Nagar -II, New Delhi', 'manojgupta@gmail.com'),
(10, 'Munirka', 'Sushant Kumar', 'R-332, Munirka Village, New Delhi-67', 'sshnt26@gmail.com'),
(11, 'Rajnagar Ext', 'Priya Gupta', 'D-23, Rajnagar Extension, New Delhi', 'priya.gupta91@gmail.com'),
(12, 'Rajnagar Ext', 'Priya Gupta', 'D-23, Rajnagar Extension, New Delhi', 'priya.gupta91@gmail.com'),
(13, 'Pandav Nagar', 'Deepak Jha', 'D-155, Pandav Nagar, New Delhi-92', 'deepak.jha91@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `branchissues`
--

CREATE TABLE IF NOT EXISTS `branchissues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `branchdetail_id` int(11) unsigned NOT NULL,
  `issue_ticket` varchar(20) NOT NULL,
  `issue_ticket_created_at` datetime NOT NULL,
  `issue` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `result` varchar(255) NOT NULL DEFAULT 'unresolved',
  `issue_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branchdetail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `branchissues`
--

INSERT INTO `branchissues` (`id`, `branchdetail_id`, `issue_ticket`, `issue_ticket_created_at`, `issue`, `status`, `result`, `issue_updated_at`) VALUES
(1, 1, 'TK-ICICI-001', '2014-02-01 07:23:12', 'AC Not Working.', 0, 'unresolved', NULL),
(2, 1, 'TK-ICICI-201', '2014-01-29 12:18:42', 'Manager''s Chair is not adjustable.', 0, 'unresolved', NULL),
(3, 2, 'TK-ICICI-373', '2014-02-01 12:08:43', 'Broken Chair.', 1, 'j jhj hjkh gjhjg ', '2014-02-10 03:05:34'),
(4, 1, 'TK-ICICI-045', '2014-01-28 09:41:35', 'Fan Not Working Properly.', 0, 'Sent asda', '2014-02-10 02:41:44'),
(5, 1, 'TK-ICICI-820', '2014-02-27 17:22:37', 'Water Leakage in Bathroom', 1, 'Plumber Sent For Repair.', '2014-02-01 13:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `role` enum('general','admin') NOT NULL DEFAULT 'general',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'abhishekkhaware', 'c9b180442e314ee20adc4a262b96f46b', 'abhishekkhaware@gmail.com', 'admin', '2013-07-13 09:15:11', '2013-07-15 18:23:20'),
(2, 'sujitlca', 'aa79f6482a1b873ad79ec04921386813', 'sujitlca@gmail.com', 'general', '2013-07-13 09:54:59', '2013-07-15 19:20:03'),
(3, 'sushant26', 'aa79f6482a1b873ad79ec04921386813', 'sushant26@gmail.com', 'general', '2013-07-16 01:29:41', '2013-07-17 20:27:30'),
(4, 'shaileshkhaware', 'c9b180442e314ee20adc4a262b96f46b', 'shailesh.khaware@gmail.com', 'general', '2013-07-16 01:30:34', '2013-07-17 20:30:54'),
(5, 'saifazad', 'aa79f6482a1b873ad79ec04921386813', 'saif.azad90@gmail.com', 'general', '2013-07-16 01:31:22', '2013-07-16 01:32:47'),
(6, 'avinashtiwari', 'aa79f6482a1b873ad79ec04921386813', 'avinash.t1992@gmail.com', 'general', '2013-07-16 01:38:09', '2013-07-16 01:38:56'),
(7, '8882157881', 'c9b180442e314ee20adc4a262b96f46b', 'abhishekkhaware@hotmail.com', 'general', '2013-07-16 01:48:24', '2013-07-16 01:48:24'),
(8, 'abhishek', 'c9b180442e314ee20adc4a262b96f46b', 'abhishek.khaware@yahoo.co.in', 'general', '2013-07-16 01:49:43', '2013-07-16 01:49:43');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branchissues`
--
ALTER TABLE `branchissues`
  ADD CONSTRAINT `branchissues_ibfk_1` FOREIGN KEY (`branchdetail_id`) REFERENCES `branchdetails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
