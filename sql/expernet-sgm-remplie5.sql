-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 10:49 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expernet-sgm`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL,
  `imageName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `imageName`) VALUES
(1, 'avatar1.png'),
(2, 'avatar2.png'),
(3, 'avatar3.png'),
(4, 'avatar4.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isBuyableMultiple` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `isBuyableMultiple`) VALUES
(1, 'Chapeau', 0),
(2, 'Ticket', 1),
(3, 'Haut', 0),
(4, 'Bas', 0),
(5, 'Test', 0),
(6, 'Lunettes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `channel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES
(1, 'Groupe CDA 2018-2020', 'A8R4B5', 'channel-1'),
(2, 'Groupe CDA 2019-2021', 'D8R6B4', 'channel-2'),
(3, 'Groupe CDA 2020-2022', 'G8T1G6', 'channel-3'),
(11, 'Groupe CDA 2016-2018', '865e8f', 'channel-4'),
(12, 'Groupe CDA 2017-2019', '2ff58e', 'channel-5');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `isEquipped` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES
(9, 0, 1, 12, 1),
(11, 0, 1, 14, 3),
(12, 0, 1, 14, 2),
(13, 0, 1, 12, 11),
(14, 0, 1, 19, 3),
(15, 0, 3, 19, 2),
(16, 0, 1, 19, 1),
(17, 1, 1, 13, 3),
(18, 0, 1, 13, 1),
(20, 0, 1, 13, 12),
(21, 0, 1, 13, 6),
(22, 1, 1, 13, 13),
(23, 0, 1, 20, 3),
(24, 0, 1, 20, 1),
(25, 0, 1, 20, 12),
(26, 0, 1, 20, 13),
(27, 0, 1, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `isDesactivated` tinyint(1) NOT NULL DEFAULT 0,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `isDesactivated`, `categoryId`) VALUES
(1, 'Chapeau de Pirate', 150, 'chapeauPirate1.png', 0, 1),
(2, 'Ticket petit-déjeuner', 500, 'ticketPetitDejeuner.png', 0, 2),
(3, 'Sombrero', 600, 'sombrero1.png', 0, 1),
(5, 'Jean bleu', 125, 'jeanBleu.png', 0, 4),
(6, 'Chapeau de Bob', 250, 'chapeauDeBob.png', 1, 1),
(11, 'àppppppp', 152, '99557638_2638729229736758_1815622923881283584_n.jpg', 0, 2),
(12, 'Lunettes 3D', 100, 'lunettes3D.png', 0, 6),
(13, 'Masque et Tuba', 230, 'masqueTuba1.png', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `avatarId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES
(11, 'Bob', 'Roger', 'Bob@gmail.com', 'bob', '$argon2i$v=19$m=65536,t=4,p=1$S01ZczBPbC5XbU9oZXhjYg$+jCCS1F/mB+q4z+C70jCYl6h8sqwQGpExzP54ME8gw0', 50, 152, 800, 1, 1, 1),
(12, 'Roger', 'Bob', 'roger@gmail.com', 'Roger', '$2y$10$SVVRj8dyIP2YcOTktQAWAuffGqpmZgZik0Rc56Jf.NMd35zyp8TKK', 15, 874, 76, 0, 2, 1),
(13, 'Douvry', 'Valentin', 'douvry@gmail.com', 'TheSDF', '$2y$10$mui4CCbaTyT4wKHhTN8Keuj4i/OOTI2Zut4ry3yS3ZMzHD4.cptpS', 100, 500, 30000, 1, 3, 3),
(14, 'David', 'David', 'david@gmail.com', 'david', '$argon2i$v=19$m=65536,t=4,p=1$am4vS1EyTHEwSXV1Skl5Qw$NbKNhgtKKD7mEIktsFMtFXyQuae6fOgmOpwN0V+DLAo', 56, 1500, 136, 0, 1, 2),
(15, 'test', 'test', 'test@gmail.com', 'test', '$2y$10$yvJGdTwmaqwPSgy.B.xsD.0VJUo8jC1ggOW0FYnGzRsnVJRf72G6K', 0, 0, 0, 0, 1, 2),
(17, 'Bob', 'Roger', 'oui@oui.com', 'OUI', '$argon2i$v=19$m=65536,t=4,p=1$dWhLRkI5UUxWUGFsQ1NkZQ$IyQ4+S0/0WmthH06bIDyFhUFJFAlSnR/0v7ohvlUnMc', 0, 0, 0, 0, 2, 1),
(18, 'NOM', 'PEREFr', 'ede@dede', 'salut', '$argon2i$v=19$m=65536,t=4,p=1$VEV4RFNMa2xiQlZwWFdjTg$v4OjB425ayJ4rpupNkrVBYctKv0D2NacNVUfRWunI0Y', 0, 0, 0, 0, 1, 2),
(19, 'gros', 'zeuf', 'groszeuf@gmal.com', 'Grozeuf', '$argon2i$v=19$m=65536,t=4,p=1$Q3U1QnhIMmIwdUFoR1BQMQ$UzWODWkw4ITcqkEt5IymW5Xs4KW5P5SLz/75pccwWUo', 0, 0, 2750, 0, 4, 2),
(20, 'JEAN PAUL ROGER TEST', 'SALUT A TOUS', 'dfed@cece', 'coucou', '$argon2i$v=19$m=65536,t=4,p=1$S1o0eVNVcDdtRlZtTVJlNw$jSzmf36nH0rmtGiOyPUXluTVUxbM+PmvaDEfP1vUtmU', 0, 0, 8795, 0, 1, 2),
(21, 'DEFRFRFRF', 'frfrfrrr', 'ded@ded', 'coucou2', '$argon2i$v=19$m=65536,t=4,p=1$cjN6ckp5R2VMNzdKUHBjbg$kdgHUwFIW672eqafyRtpB+lvxBU6Sb7kdP5tldYjd94', 0, 0, 0, 0, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key of user` (`userId`),
  ADD KEY `foreign key of item` (`itemId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key of category` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `foreign key of avatar` (`avatarId`),
  ADD KEY `foreign key of group` (`groupId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `foreign key of item` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `foreign key of user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `foreign key of category` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `foreign key of avatar` FOREIGN KEY (`avatarId`) REFERENCES `avatars` (`id`),
  ADD CONSTRAINT `foreign key of group` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
