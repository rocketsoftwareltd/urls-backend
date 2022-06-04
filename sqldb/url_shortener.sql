-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2022 at 11:16 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_shortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `group` varchar(32) NOT NULL,
  `ip_address` varchar(64) DEFAULT NULL,
  `browser` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `first_name`, `last_name`, `password`, `group`, `ip_address`, `browser`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'rocketsoftwareltd@gmail.com', 'Rocket', 'Software', '$2y$10$KxNfQU/vKONXcJpI7ZrsQ.y9ji4XBBo0NY4hLLHcpV9YaBiWURVsu', '1', NULL, NULL, '2022-06-02 03:59:45', NULL, NULL),
(2, 'lopwusjethro@gmail.com', 'Jethro', 'Bitrus', '$2y$10$cW/yF9sszYFcmy1LmYh01eERGOwE74ycB.zL166iQKI9f6DV/z9QG', '1', NULL, NULL, '2022-06-02 04:03:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `short_url` varchar(128) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `clicks` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `group` varchar(32) NOT NULL,
  `ip_address` varchar(64) DEFAULT NULL,
  `browser` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `group`, `ip_address`, `browser`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'rocketsoftwareltd@gmail.com', 'Rocket', 'Software', '$2y$10$KxNfQU/vKONXcJpI7ZrsQ.y9ji4XBBo0NY4hLLHcpV9YaBiWURVsu', '1', NULL, NULL, '2022-06-02 03:59:45', NULL, NULL),
(2, 'lopwusjethro@gmail.com', 'Jethro', 'Bitrus', '$2y$10$cW/yF9sszYFcmy1LmYh01eERGOwE74ycB.zL166iQKI9f6DV/z9QG', '1', NULL, NULL, '2022-06-02 04:03:07', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUsersLinks` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `fkUsersLinks` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
