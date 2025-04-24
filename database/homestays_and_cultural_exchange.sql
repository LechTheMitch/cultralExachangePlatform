-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 10:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestays_and_cultural_exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `accommodation` text NOT NULL,
  `country` text NOT NULL,
  `requiredHelp` text NOT NULL,
  `title` text NOT NULL,
  `stateID` bigint(20) NOT NULL,
  `datesAvailable` datetime NOT NULL,
  `category` text NOT NULL,
  `learningOpportunities` text NOT NULL,
  `spokenLanguages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `description`, `accommodation`, `country`, `requiredHelp`, `title`, `stateID`, `datesAvailable`, `category`, `learningOpportunities`, `spokenLanguages`) VALUES
(2, 'Friendly host', 'Private room', 'Egypt', 'Gardening', 'Eco Farm Stay', 101, '2025-06-01 00:00:00', 'Farming', 'Learn sustainable farming', 'Arabic, English'),
(5, 'Beach cleanup and yoga retreat host', 'Tent by the sea', 'Egypt', 'Beach Cleaning, Yoga', 'Help Us Clean the Coast', 202, '2025-07-01 00:00:00', 'Environmental', 'Yoga classes and environmental awareness', 'Arabic, English'),
(6, 'Host in a traditional Moroccan Riad', 'Private room in Riad', 'Morocco', 'Tourism Help, Housekeeping', 'Cultural Exchange in Fes', 203, '2025-08-01 00:00:00', 'Cultural', 'Learn Moroccan traditions', 'Arabic, French'),
(7, 'Mountain hostel needs volunteers', 'Dormitory-style hostel', 'Lebanon', 'Reception, Cleaning', 'Stay in the Mountains', 204, '2025-09-15 00:00:00', 'Hospitality', 'Learn hospitality skills and Arabic', 'Arabic, English'),
(11, 'hello', 'jewbvkjewbf', 'IN', 'kjbdwjbw', 'sdljalj', 0, '2025-04-22 00:00:00', 'oadbcojj', 'dljsjldns', 'sv');

-- --------------------------------------------------------

--
-- Table structure for table `host_images`
--

CREATE TABLE `host_images` (
  `image_id` int(10) UNSIGNED NOT NULL,
  `host_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `senderID` int(10) UNSIGNED NOT NULL,
  `receiverID` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `senderID`, `receiverID`, `content`, `isRead`, `sent_at`) VALUES
(1, 1, 2, 'Hello! I would love to volunteer on your farm.', 1, '2025-04-16 17:05:08'),
(2, 2, 1, 'Hi Ahmed! You are welcome to join us. Let’s chat.', 1, '2025-04-16 17:05:08'),
(3, 1, 2, 'Hello', 1, '2025-04-21 02:33:36'),
(4, 1, 2, 'hello', 1, '2025-04-21 02:50:17'),
(5, 1, 2, 'i want to meet you', 1, '2025-04-21 02:50:26'),
(6, 1, 3, 'hello', 0, '2025-04-21 02:50:46'),
(7, 2, 1, 'oh hey', 1, '2025-04-21 03:03:39'),
(8, 1, 2, 'nice to meet you', 1, '2025-04-21 03:04:01'),
(9, 2, 1, 'i love you', 1, '2025-04-21 03:04:08'),
(10, 2, 1, 'hey', 1, '2025-04-21 03:04:12'),
(11, 1, 2, 'hello', 1, '2025-04-21 03:04:52'),
(12, 1, 2, 'hi', 1, '2025-04-21 03:04:59'),
(13, 1, 6, 'hello', 0, '2025-04-21 03:08:58'),
(14, 2, 1, 'hi', 1, '2025-04-21 03:13:49'),
(15, 1, 2, 'hello', 1, '2025-04-21 03:30:29'),
(16, 1, 2, 'hello', 1, '2025-04-21 03:30:40'),
(17, 1, 2, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 1, '2025-04-21 03:31:24'),
(18, 1, 2, 'i want to live in peacful place and marry my endless love in peace i hope that so much', 1, '2025-04-21 03:32:11'),
(19, 1, 2, 'gue', 1, '2025-04-21 03:45:57'),
(20, 1, 2, 'say hi', 1, '2025-04-21 03:46:04'),
(21, 1, 2, 'helli', 1, '2025-04-21 03:50:44'),
(22, 1, 2, 'hello', 1, '2025-04-21 03:50:52'),
(23, 1, 3, 'test', 0, '2025-04-21 03:51:59'),
(24, 1, 3, 'test2', 0, '2025-04-21 03:52:14'),
(25, 1, 2, 'hello', 1, '2025-04-21 04:00:21'),
(26, 1, 2, 'hekk', 1, '2025-04-21 04:00:26'),
(27, 1, 2, 'hi', 1, '2025-04-21 04:00:29'),
(28, 2, 1, 'heelo', 1, '2025-04-21 04:11:07'),
(29, 1, 2, 'eo;h', 1, '2025-04-21 04:11:37'),
(30, 2, 1, 'hello', 1, '2025-04-21 04:13:29'),
(31, 1, 2, 'oh hey ', 1, '2025-04-21 04:13:40'),
(32, 2, 1, 'you chatting me in real-time , do you know that>', 1, '2025-04-21 04:13:58'),
(33, 1, 2, 'yes i know its great thing', 1, '2025-04-21 04:14:11'),
(34, 2, 3, 'lets begin talking', 0, '2025-04-21 04:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `travelerID` int(10) UNSIGNED NOT NULL,
  `hostID` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `travelerID`, `hostID`, `rating`, `comment`, `date`) VALUES
(1, 1, 2, 5, 'Amazing experience! Learned a lot about farming.', '2025-04-16 17:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `traveler`
--

CREATE TABLE `traveler` (
  `id` int(10) UNSIGNED NOT NULL,
  `skills` text NOT NULL,
  `dayBooked` datetime NOT NULL,
  `currentHostID` int(10) UNSIGNED DEFAULT NULL,
  `cardInformation` text NOT NULL,
  `dateSubscribed` datetime NOT NULL DEFAULT current_timestamp(),
  `isSubscribed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `traveler`
--

INSERT INTO `traveler` (`id`, `skills`, `dayBooked`, `currentHostID`, `cardInformation`, `dateSubscribed`, `isSubscribed`) VALUES
(1, 'Painting, Cooking', '2025-06-10 00:00:00', 2, '', '2025-04-24 16:14:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `role` enum('host','traveler','admin') NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone_number`, `password`, `email`, `role`, `img`) VALUES
(1, 'Ahmed Traveler', '1234567890', 'hashedpass1', 'ahmed@example.com', 'traveler', NULL),
(2, 'Mona Host', '0987654321', 'hashedpass2', 'mona@example.com', 'host', NULL),
(3, 'Admin User', '1112223333', 'hashedadmin', 'admin@example.com', 'admin', NULL),
(5, 'Omar Zidan', '01098765432', 'pass_omar', 'omar@example.com', 'host', NULL),
(6, 'Nour Hamdy', '01123456789', 'pass_nour', 'nour@example.com', 'host', NULL),
(7, 'Khaled Mansour', '01234567890', 'pass_khaled', 'khaled@example.com', 'host', NULL),
(10, 'Ahmed', '12345678', 'Ahmed', 'mido@gmail.com', 'traveler', NULL),
(11, 'AhmedNagah', '01234567', '81dc9bdb52d04dc20036dbd8313ed055', 'mido29092005@gmail.com', 'host', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `host_images`
--
ALTER TABLE `host_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `host_id` (`host_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderID` (`senderID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travelerID` (`travelerID`),
  ADD KEY `hostID` (`hostID`);

--
-- Indexes for table `traveler`
--
ALTER TABLE `traveler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currentHostID` (`currentHostID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `host_images`
--
ALTER TABLE `host_images`
  MODIFY `image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `host`
--
ALTER TABLE `host`
  ADD CONSTRAINT `host_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `host_images`
--
ALTER TABLE `host_images`
  ADD CONSTRAINT `host_images_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `host` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`travelerID`) REFERENCES `traveler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`hostID`) REFERENCES `host` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `traveler`
--
ALTER TABLE `traveler`
  ADD CONSTRAINT `traveler_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `traveler_ibfk_2` FOREIGN KEY (`currentHostID`) REFERENCES `host` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
