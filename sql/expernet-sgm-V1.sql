-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 02:16 PM
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
(4, 'avatar4.png'),
(5, 'avatar5.png'),
(6, 'avatar6.png'),
(7, 'avatar7.png'),
(8, 'avatar8.png');

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
(1, 'Chapeaux', 0),
(2, 'Tickets', 1),
(6, 'Lunettes', 0),
(11, 'Barbes-Moustaches', 0),
(12, 'Noeuds', 0);

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
(62, 0, 1, 25, 1),
(63, 1, 1, 25, 3),
(64, 0, 1, 25, 6),
(65, 0, 1, 25, 14),
(66, 0, 1, 25, 24),
(67, 0, 1, 25, 27),
(68, 0, 1, 25, 28),
(69, 0, 1, 25, 29),
(70, 0, 1, 25, 32),
(71, 0, 1, 25, 35),
(72, 0, 1, 25, 37),
(73, 0, 1, 25, 40),
(74, 0, 1, 25, 41),
(75, 0, 1, 25, 42),
(76, 0, 4, 25, 2),
(77, 0, 1, 25, 12),
(78, 1, 1, 25, 13),
(79, 0, 1, 25, 26),
(80, 0, 1, 25, 30),
(81, 0, 1, 25, 33),
(82, 0, 1, 25, 38),
(83, 0, 1, 25, 36),
(84, 0, 1, 25, 46),
(85, 0, 1, 25, 47),
(86, 0, 1, 25, 48),
(87, 0, 1, 25, 45),
(88, 1, 1, 25, 43),
(89, 1, 1, 26, 41),
(90, 1, 1, 26, 12),
(91, 0, 1, 26, 13),
(92, 1, 1, 26, 46),
(93, 0, 1, 26, 45),
(94, 1, 1, 26, 43),
(95, 0, 1, 27, 3),
(96, 1, 1, 27, 35),
(97, 0, 1, 27, 30),
(98, 1, 1, 27, 33),
(99, 1, 1, 27, 36),
(100, 1, 1, 28, 28),
(101, 0, 1, 28, 38),
(102, 1, 1, 28, 30),
(103, 0, 1, 28, 43),
(104, 0, 1, 29, 32),
(105, 0, 1, 29, 3),
(106, 1, 1, 29, 14),
(107, 0, 1, 29, 26),
(108, 1, 1, 30, 1),
(109, 1, 1, 30, 26),
(110, 0, 1, 30, 36),
(111, 1, 1, 30, 47),
(112, 1, 1, 31, 40),
(113, 1, 1, 31, 12),
(114, 1, 1, 32, 41),
(115, 1, 1, 35, 42),
(116, 0, 1, 35, 30),
(117, 1, 1, 35, 38),
(118, 1, 1, 36, 24),
(119, 1, 1, 36, 12),
(120, 1, 1, 36, 43),
(121, 1, 1, 36, 46),
(122, 0, 1, 39, 32),
(123, 0, 1, 39, 40),
(124, 1, 1, 39, 3),
(125, 0, 1, 39, 45),
(126, 1, 1, 41, 1),
(127, 1, 1, 41, 36),
(128, 1, 1, 41, 26);

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
(6, 'Chapeau de Bob', 250, 'chapeauDeBob.png', 0, 1),
(12, 'Lunettes 3D', 100, 'lunettes3D.png', 0, 6),
(13, 'Masque et Tuba', 230, 'masqueTuba1.png', 0, 6),
(14, 'Chapeau de Viking', 230, 'casqueViking1.png', 0, 1),
(24, 'Chapeau de Fou', 200, 'chapeauFou.png', 0, 1),
(26, 'Cache-œil de Pirate', 500, 'cacheOeil1.png', 0, 6),
(27, 'Cornes de Démon', 300, 'cornesDemon.png', 0, 1),
(28, 'Couronne de Reine', 750, 'couronneReine.png', 0, 1),
(29, 'Couronne de Roi', 750, 'couronneRoi.png', 0, 1),
(30, 'Lunettes en Coeur', 550, 'lunetteCoeur1.png', 0, 6),
(32, 'Chapeau Indien ', 140, 'chapeauIndienPlume.png', 0, 1),
(33, 'Lunettes avec un Gros Nez', 140, 'lunetteNez1.png', 0, 6),
(35, 'Antennes d\'Insecte', 140, 'antenneInsecte.png', 0, 1),
(36, 'Grosse Barbe Noire', 500, 'barbe1.png', 0, 11),
(37, 'Serre-tête Etoile', 130, 'serreTeteEtoile.png', 0, 1),
(38, 'Masque de Sommeil Rouge', 35, 'masqueSommeil1.png', 0, 6),
(40, 'Oreilles de Lapin Blanc', 190, 'oreillesLapinBlanc.png', 0, 1),
(41, 'Chapeau à Hélice', 400, 'chapeauHelice1.png', 0, 1),
(42, 'Couronne de Wonder Woman', 460, 'couronneWonderWoman.png', 0, 1),
(43, 'Noeud Papillon Rayé', 140, 'noeudPapillon1.png', 0, 12),
(45, 'Noeud Papillon Noir', 100, 'noeudPapillon2.png', 0, 12),
(46, 'Moustache Marron', 400, 'moustache.png', 0, 11),
(47, 'Barbe Rousse', 400, 'barbeRousse1.png', 0, 11),
(48, 'Barbe Courte', 120, 'barbeCourte.png', 0, 11);

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
(25, 'Célaire', 'Jacques', 'jacquesCelaire@hotmail.fr', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$NTZLMkNFeGJhano3MUxxWA$NVWKBMSwlCEDhcfAH6arp7Qe/mOuixq4i+amBOLxpMs', 37, 645, 39625, 1, 3, 1),
(26, 'Ception', 'Alex', 'alexCeption@gmail.com', 'user1', '$argon2i$v=19$m=65536,t=4,p=1$bXdreTNvelVLaXo4UXFGQg$StZKjC9w5EgjgGCpoJyi72/YWLTUdxIIJ06cF5Q34NE', 12, 0, 2350, 0, 8, 1),
(27, 'Atatrack', 'Pat', 'patAtatrack@hotmail.fr', 'user2', '$argon2i$v=19$m=65536,t=4,p=1$YkJOZE1wTEsueTh0c2FqNw$SxMp7BwOFjJnS30TKcg5S0S/2k3ECv27Yu2m5+ZyM/w', 10, 800, 1569, 0, 1, 1),
(28, 'Ateur', 'Nordine', 'NordineAteur@gmail.com', 'user3', '$argon2i$v=19$m=65536,t=4,p=1$ZzkzZnZ0YTZUbmpzNjZwZw$vJPcFvPtmleF+NhoJA5Je2lp+F9lIAeY6ghGzoHU0gA', 13, 740, 145, 0, 2, 1),
(29, 'Sculation', 'Emma', 'emaSculation@hotmail.fr', 'user4', '$argon2i$v=19$m=65536,t=4,p=1$OTM5UDBYVUFSd2dMcHhobA$zz1s5fSsmbbMa1kb+Vnpvpi6dQZ2YXW5URf9vdN1F/Y', 12, 155, 1450, 0, 6, 1),
(30, 'Abé', 'Oscar', 'oscarAbe@gmail.com', 'user5', '$argon2i$v=19$m=65536,t=4,p=1$djlqdnJjT29GUkJBTUQyeA$Z8f4HePnQqTPvLTjNrNviw01ruCZMplKRWIpVJP7UhA', 15, 345, 7500, 0, 3, 1),
(31, 'Iculaire', 'Laure', 'laureIculaire@hotmail.fr', 'user6', '$argon2i$v=19$m=65536,t=4,p=1$c2NHQ2lIY1d2T2J6dTNsbw$alUUyNqSCsuAIG75cP4s2gMXXmwIr/YUSpkZs2uhXMI', 17, 500, 10256, 0, 7, 1),
(32, 'Chaut', 'Artie', 'artieChaud@hotmail.fr', 'user7', '$argon2i$v=19$m=65536,t=4,p=1$UXpSbVgxN1piLlkwT3JKSg$TBARt7jb6Wk0NvnTdEPCtHgLC3k/RrQfP/l2hTYmaqo', 8, 123, 456, 0, 2, 2),
(33, 'Terieur', 'Alain', 'alainTerieur@hotmail.fr', 'user8', '$argon2i$v=19$m=65536,t=4,p=1$N3JhTjBTMHVWRTV1ZHBYdQ$8Yt1zEVvCdWXkleyeVjkSmYpyWANt7pTpwoFWBBeVZ0', 9, 456, 789, 0, 1, 2),
(34, 'Dicule', 'Terry', 'terryDicule@gmail.com', 'user9', '$argon2i$v=19$m=65536,t=4,p=1$OEdGdExCT0t0UU44UkNoaQ$jryvjzUpRH5KCDq9ax76moqRR6Wx5zAnWzRWl+0jooM', 9, 789, 450, 0, 8, 2),
(35, 'Padibonjour', 'Bella', 'bellaPadibonjour@gmail.com', 'user10', '$argon2i$v=19$m=65536,t=4,p=1$WUVVU0NPUG1ZVVlJejMvMw$2KdnUqSRwWfF7n+xWKDXoJpOufbpmcqikeOa51SiYuA', 10, 985, 147, 0, 6, 2),
(36, 'Stocrassie', 'Harry', 'harryStocrassie@gmail.com', 'user11', '$argon2i$v=19$m=65536,t=4,p=1$N2JxbGI2clJtclhzT08uUQ$XWLnu6pgWVtj5RBC2+8IqPa49n0ljWZL+XGUeJ5rnmE', 6, 458, 856, 0, 3, 2),
(37, 'Némarre', 'Jean', 'jeanNemarre@hotmail.fr', 'user12', '$argon2i$v=19$m=65536,t=4,p=1$em95SmlsVUl4UEVQR0ZRdw$+ALlFWWBZQDZM8f3iGseu+rNFIth9x3HXF5xtoNI12c', 8, 784, 954, 0, 5, 2),
(38, 'Cunier', 'Laurent', 'laurentCunier@hotmail.fr', 'user13', '$argon2i$v=19$m=65536,t=4,p=1$aWtrVkpKNEszTC5ITEtLOQ$+/snwGLoh/h/EuKJcizCKpCrhYyxM8Xr3FrPBsiNaqU', 3, 10, 256, 0, 1, 3),
(39, 'Damant', 'Evy', 'evyDamant@gmail.com', 'user14', '$argon2i$v=19$m=65536,t=4,p=1$TmhxbnMxYTFqbGdDa3pUdQ$1oQHNYAfxZQi1BA7xv/ehwXYBsUEXTIowcznPkDpPj4', 3, 785, 233, 0, 7, 3),
(40, 'Malsovage', 'Annie', 'annieMalsovage@gmail.com', 'user15', '$argon2i$v=19$m=65536,t=4,p=1$dnJFQVJvOHBBVjNFaEpreQ$AISxdZ09WTfEy4gQZG5CXzf2d89O9nGpugpUF0ODET8', 2, 369, 854, 0, 2, 3),
(41, 'Corouge', 'Marie', 'marieCorouge@gmail.com', 'user16', '$argon2i$v=19$m=65536,t=4,p=1$SEJNL3MwN0k3NzNGMFBqUA$v9HqOzzimmmUzfDZpg6O3o1+S5WxbDs6Z08K6Cza2yI', 3, 741, 423, 0, 4, 3),
(42, 'Mansoif', 'Gérard', 'gerardMansoif@gmail.com', 'user17', '$argon2i$v=19$m=65536,t=4,p=1$a3ZZeTJIYTVTdng4bi42Tg$+DcwmPpshU3hXcjXx7xF4fRphk/yvkEy5Vj2RB1t9t8', 4, 852, 420, 0, 3, 3),
(43, 'Fujiwara', 'Takumi', 'dejaVu@gmail.com', 'tofu', '$argon2i$v=19$m=65536,t=4,p=1$bDFnWWVrbkJkN09vYWhSdA$NiVc/7sRPIhtH60B07TCZrJ+ChJomEgsnUs2N2B60pI', 11, 854, 69, 0, 8, 1),
(44, 'Menvussa', 'Gérard', 'gerardMenvussa@gmail.Com', 'user18', '$argon2i$v=19$m=65536,t=4,p=1$akxVVUd1a203V0xSTFpCNQ$FOGOKQuaOzFViuuV62Htc+Hcvj6uw1rRH8FvyMFdvQs', 15, 745, 785, 0, 3, 1),
(45, 'He-Ting', 'Marc', 'marcHeTing@gmail.com', 'user19', '$argon2i$v=19$m=65536,t=4,p=1$LnVqNDJhLmVwZlhIWUZkNQ$/mD97Qw7LlJM35RKtpoFKKjsB/ZlUi17SlKOq9cnlBo', 15, 1, 18400, 0, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
