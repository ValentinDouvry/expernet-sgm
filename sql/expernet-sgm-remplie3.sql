-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 01:18 PM
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
(1, 'chapeau', 0),
(2, 'ticket', 1),
(3, 'haut', 0),
(4, 'bas', 0),
(5, 'test', 0);

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
(3, 'Groupe CDA 2020-2022', 'G8T1G6', 'channel-3');

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
(1, 0, 1, 1, 1),
(2, 1, 1, 3, 3),
(3, 1, 1, 1, 5),
(4, 1, 1, 2, 4),
(5, 1, 1, 2, 5),
(6, 0, 1, 4, 1),
(7, 0, 3, 1, 2),
(8, 0, 1, 2, 1);

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
(1, 'Chapeau de Cow-boy', 150, 'chapeauCowBow1.png', 0, 1),
(2, 'Ticket petit-déjeuner', 500, 'ticketPetitDejeuner.png', 0, 2),
(3, 'Sombrero', 600, 'sombrero1.png', 0, 1),
(4, 'T-shirt rouge', 100, 'tshirtRouge.png', 0, 3),
(5, 'Jean bleu', 125, 'jeanBleu.png', 0, 4),
(6, 'Chapeau de bob', 250, 'chapeauBob1.png', 1, 1),
(11, 'àppppppp', 152, '99557638_2638729229736758_1815622923881283584_n.jpg', 0, 2);

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
  `password` varchar(50) NOT NULL,
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
(1, 'Douvry', 'Valentin', 'douvry.valentin.gmail.com', 'TheSDF', 'passwordDouvry', 10, 5000, 30000, 1, 2, 3),
(2, 'Huet', 'David', 'huet.david@gmail.com', 'al', 'pass', 5000, 1000, 150, 0, 1, 3),
(3, 'Domen', 'Dylan', 'domen.dylan@gmail.com', 'domenDylan974', 'passwordDomen', 80, 1670, 100, 1, 3, 3),
(4, 'Roger', 'Jean', 'roger.jean974@gmail.com', 'xX-Jean-Xx', 'passwordRoger', 800, 150, 600, 0, 4, 1),
(5, 'a', 'a', 'ogeiwa@hawwiz.gg', 'a', 'a', 0, 0, 0, 0, 1, 1),
(6, 'david', 'david', 'david.huet.j.e@gmail.com', 'david', 'david', 0, 0, 0, 0, 1, 2),
(7, 'bob', 'boad', 'sdfg@gmail.com', 'bab', 'aze', 0, 0, 0, 0, 1, 2),
(8, 'Bien', 'Venu', 'bienvenu@wel.come', 'az', 'az', 0, 0, 0, 0, 1, 1),
(9, 'roger', 'bob', 'roger@roger.com', 'test', '1', 0, 0, 0, 0, 1, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
