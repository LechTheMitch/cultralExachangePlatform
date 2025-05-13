-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 05:59 PM
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
    (25, 'im happy', 'hello', 'EG', 'fishing', 'hello', 31465468465, '2025-05-28 00:00:00', 'help', '123', 'ar');

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
                                                                                           (52, 20, 15, 'ef', 0, '2025-05-08 15:20:08'),
                                                                                           (53, 21, 20, 'gj', 0, '2025-05-08 15:58:40'),
                                                                                           (54, 21, 15, 'tjt', 0, '2025-05-08 15:58:45'),
                                                                                           (55, 21, 15, 'nkjk', 0, '2025-05-08 16:01:09');

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
                                                                                                                               (15, 'Fisthing', '0000-00-00 00:00:00', NULL, '', '2025-05-08 14:45:21', 0),
                                                                                                                               (20, 'apple', '0000-00-00 00:00:00', NULL, '', '2025-05-08 15:15:41', 0),
                                                                                                                               (21, 'peace', '0000-00-00 00:00:00', NULL, '', '2025-05-08 15:58:25', 0),
                                                                                                                               (23, 'peace', '0000-00-00 00:00:00', NULL, '', '2025-05-08 17:11:19', 0),
                                                                                                                               (24, 'mine', '0000-00-00 00:00:00', NULL, '', '2025-05-08 17:23:25', 0);

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
                                                                                          (15, 'AhmedNagah', '6546842', '202cb962ac59075b964b07152d234b70', 'Ahmed@123.com', 'traveler', '../images/1746704721download (2).jpg'),
                                                                                          (20, 'diaa', '165165', '81dc9bdb52d04dc20036dbd8313ed055', 'diaa@1234.com', 'traveler', '../images/default.jpg'),
                                                                                          (21, ' gamal', '45465', '202cb962ac59075b964b07152d234b70', 'gamal@123.com', 'traveler', '../images/1746709105download3.jpg'),
                                                                                          (23, 'AhmedMostafa', '5646465', 'c20ad4d76fe97759aa27a0c99bff6710', 'AM@12.com', 'traveler', '../images/1746713479beautiful-anime-landscape-cartoon-scene.jpg'),
                                                                                          (24, 'khaled', '3545434', '202cb962ac59075b964b07152d234b70', 'khaled@123.com', 'traveler', '../images/1746714205anime-style-clouds.jpg'),
                                                                                          (25, 'gooda', '3546845', '202cb962ac59075b964b07152d234b70', 'gooda@123.com', 'host', '../images/1746715996anime-girl-alone-comet-milky-way-sunset-night-scenery-4k-wallpaper-uhdpaper.com-564@5@e1.jpg');

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
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
