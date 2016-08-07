-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 08:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE `tbl_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father's name` varchar(255) NOT NULL,
  `mother's name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `current_workplace` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `web_address` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `profile_image` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`id`, `user_id`, `first_name`, `last_name`, `father's name`, `mother's name`, `gender`, `birth_date`, `nationality`, `religion`, `occupation`, `current_workplace`, `education`, `marital_status`, `blood_group`, `language`, `height`, `skills`, `hobbies`, `bio`, `address`, `mobile`, `fax`, `web_address`, `national_id`, `passport`, `profile_image`) VALUES
(1, 2, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `unique_id`, `username`, `password`, `email`, `verification_id`, `is_active`, `is_admin`, `created_at`, `modified_at`, `deleted`) VALUES
(1, '57a57f0ed2738', 'admin', '123456', 'admin@gmail.com', '57a57f0ed2738', 1, 1, '2016-08-06 12:09:18', '0000-00-00 00:00:00', 0),
(2, '57a5f1490cbb0', 'shahriar', '123456', 'shahriar@gmail.com', '57a5f1490cbb0', 1, 0, '2016-08-06 20:16:41', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
