
CREATE TABLE `User` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` TEXT NOT NULL,
    `phone_number` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `role` ENUM('host', 'traveler', 'admin') NOT NULL
);

CREATE TABLE `Host` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY,
    `description` TEXT NOT NULL,
    `accommodation` TEXT NOT NULL,
    `country` TEXT NOT NULL,
    `requiredHelp` TEXT NOT NULL,
    `title` TEXT NOT NULL,
    `stateID` BIGINT NOT NULL,
    `datesAvailable` DATETIME NOT NULL,
    `category` TEXT NOT NULL,
    `learningOpportunities` TEXT NOT NULL,
    `spokenLanguages` TEXT NOT NULL,
    `cardInformation` TEXT NOT NULL,
    FOREIGN KEY (`id`) REFERENCES `User`(`id`) ON DELETE CASCADE
);

CREATE TABLE `Traveler` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY,
    `skills` TEXT NOT NULL,
    `dayBooked` DATETIME NOT NULL,
    `currentHostID` INT,
    FOREIGN KEY (`id`) REFERENCES `User`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`currentHostID`) REFERENCES `Host`(`id`) ON DELETE SET NULL
);

CREATE TABLE `Admin` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY,
    FOREIGN KEY (`id`) REFERENCES `User`(`id`) ON DELETE CASCADE
);

CREATE TABLE `Message` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `senderID` INT NOT NULL,
    `receiverID` INT NOT NULL,
    `content` TEXT NOT NULL,
    `isRead` BOOLEAN NOT NULL DEFAULT FALSE,
    `sent_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`senderID`) REFERENCES `User`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`receiverID`) REFERENCES `User`(`id`) ON DELETE CASCADE
);

CREATE TABLE `Review` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `travelerID` INT NOT NULL,
    `hostID` INT NOT NULL,
    `rating` INT NOT NULL,
    `comment` TEXT NOT NULL,
    `date` DATETIME NOT NULL,
    FOREIGN KEY (`travelerID`) REFERENCES `Traveler`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`hostID`) REFERENCES `Host`(`id`) ON DELETE CASCADE
);
