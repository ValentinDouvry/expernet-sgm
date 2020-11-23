#
# TABLE STRUCTURE FOR: Inventories
#

DROP TABLE IF EXISTS `Inventories`;

CREATE TABLE `Inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isEquipped` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign key of user` (`userId`),
  KEY `foreign key of item` (`itemId`),
  CONSTRAINT `foreign key of item` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `foreign key of user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (1, 0, 276820, 1, 1);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (2, 0, 76, 2, 2);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (3, 1, 1789, 3, 3);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (4, 0, 0, 4, 4);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (5, 0, 2, 5, 5);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (6, 1, 26277810, 6, 6);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (7, 0, 0, 7, 7);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (8, 0, 143673718, 8, 8);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (9, 1, 2, 9, 9);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (10, 1, 29, 10, 10);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (11, 1, 3, 11, 11);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (12, 1, 4, 12, 12);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (13, 1, 0, 13, 13);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (14, 0, 719, 14, 14);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (15, 0, 14587, 15, 15);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (16, 1, 0, 16, 16);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (17, 1, 4, 17, 17);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (18, 0, 10, 18, 18);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (19, 0, 932770, 19, 19);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (20, 0, 10383, 20, 20);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (21, 0, 71993406, 21, 21);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (22, 0, 1, 22, 22);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (23, 0, 0, 23, 23);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (24, 0, 24571019, 24, 24);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (25, 1, 56, 25, 25);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (26, 0, 18270778, 26, 26);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (27, 1, 829430, 27, 27);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (28, 1, 2439, 28, 28);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (29, 1, 4629, 29, 29);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (30, 0, 2, 30, 30);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (31, 0, 0, 31, 31);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (32, 0, 4481, 32, 32);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (33, 0, 0, 33, 33);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (34, 1, 1, 34, 34);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (35, 1, 37750740, 35, 35);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (36, 1, 213681037, 36, 36);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (37, 1, 311793547, 37, 37);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (38, 1, 415, 38, 38);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (39, 1, 406, 39, 39);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (40, 0, 300, 40, 40);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (41, 0, 8, 41, 41);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (42, 0, 402204, 42, 42);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (43, 0, 332312, 43, 43);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (44, 1, 1474038, 44, 44);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (45, 0, 7809133, 45, 45);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (46, 0, 3121921, 46, 46);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (47, 0, 5, 47, 47);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (48, 0, 1, 48, 48);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (49, 1, 49758205, 49, 49);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (50, 0, 5, 50, 50);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (51, 0, 79, 51, 51);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (52, 1, 0, 52, 52);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (53, 1, 6426, 53, 53);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (54, 0, 6481, 54, 54);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (55, 1, 371889, 55, 55);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (56, 1, 0, 56, 56);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (57, 0, 3633, 57, 57);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (58, 0, 361, 58, 58);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (59, 0, 163, 59, 59);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (60, 0, 66, 60, 60);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (61, 0, 5, 61, 61);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (62, 0, 1, 62, 62);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (63, 0, 5916757, 63, 63);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (64, 0, 577, 64, 64);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (65, 0, 654685862, 65, 65);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (66, 1, 0, 66, 66);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (67, 0, 10637, 67, 67);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (68, 1, 1079815, 68, 68);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (69, 1, 3090430, 69, 69);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (70, 1, 0, 70, 70);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (71, 1, 0, 71, 71);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (72, 1, 3863, 72, 72);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (73, 0, 14, 73, 73);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (74, 1, 1, 74, 74);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (75, 0, 251, 75, 75);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (76, 1, 1, 76, 76);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (77, 1, 73711164, 77, 77);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (78, 0, 4601, 78, 78);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (79, 1, 912808, 79, 79);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (80, 1, 8, 80, 80);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (81, 1, 11, 81, 81);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (82, 1, 67, 82, 82);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (83, 0, 675469, 83, 83);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (84, 0, 1, 84, 84);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (85, 1, 375484383, 85, 85);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (86, 0, 24467, 86, 86);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (87, 1, 65345, 87, 87);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (88, 0, 7, 88, 88);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (89, 0, 1222, 89, 89);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (90, 1, 101056, 90, 90);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (91, 0, 0, 91, 91);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (92, 1, 6695, 92, 92);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (93, 1, 3592175, 93, 93);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (94, 1, 1853825, 94, 94);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (95, 0, 2, 95, 95);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (96, 0, 364, 96, 96);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (97, 0, 411219, 97, 97);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (98, 0, 0, 98, 98);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (99, 1, 65, 99, 99);
INSERT INTO `Inventories` (`id`, `isEquipped`, `quantity`, `userId`, `itemId`) VALUES (100, 1, 497, 100, 100);


#
# TABLE STRUCTURE FOR: avatars
#

DROP TABLE IF EXISTS `avatars`;

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `avatars` (`id`, `imageName`) VALUES (1, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (2, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (3, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (4, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (5, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (6, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (7, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (8, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (9, 'http://lorempixel.com/640/480/');
INSERT INTO `avatars` (`id`, `imageName`) VALUES (10, 'http://lorempixel.com/640/480/');


#
# TABLE STRUCTURE FOR: categories
#

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isBuyableMultiple` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `name`, `isBuyableMultiple`) VALUES (1, 'sequi', 0);
INSERT INTO `categories` (`id`, `name`, `isBuyableMultiple`) VALUES (2, 'sint', 0);
INSERT INTO `categories` (`id`, `name`, `isBuyableMultiple`) VALUES (3, 'ea', 1);


#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `channel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (1, 'id', 'ijzh', '3');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (2, 'et', 'hyqb', '9');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (3, 'voluptates', 'pcng', '7');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (4, 'dolores', 'vkgb', '5');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (5, 'aut', 'dyco', '5');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (6, 'dolorem', 'xkvj', '9');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (7, 'quaerat', 'ifmq', '8');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (8, 'sunt', 'glsz', '6');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (9, 'qui', 'zdbj', '4');
INSERT INTO `groups` (`id`, `name`, `code`, `channel`) VALUES (10, 'in', 'fnqq', '6');


#
# TABLE STRUCTURE FOR: items
#

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign key of category` (`categoryId`),
  CONSTRAINT `foreign key of category` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (1, 'corporis', 34, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (2, 'sit', 4356288, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (3, 'rerum', 16743, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (4, 'ea', 0, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (5, 'consequuntur', 3251764, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (6, 'nam', 70, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (7, 'praesentium', 1290858, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (8, 'debitis', 8619, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (9, 'perferendis', 36696656, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (10, 'nostrum', 8051, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (11, 'perferendis', 11717, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (12, 'laboriosam', 5643, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (13, 'odio', 180833302, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (14, 'non', 49482928, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (15, 'necessitatibus', 56983235, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (16, 'nam', 208597, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (17, 'repudiandae', 29656, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (18, 'sit', 50705, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (19, 'ut', 522103667, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (20, 'et', 12, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (21, 'occaecati', 6278, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (22, 'et', 146, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (23, 'ducimus', 21687602, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (24, 'libero', 3399204, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (25, 'doloremque', 961462, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (26, 'qui', 0, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (27, 'omnis', 454779482, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (28, 'exercitationem', 3173805, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (29, 'quae', 542, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (30, 'veritatis', 6459, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (31, 'ea', 0, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (32, 'omnis', 414020434, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (33, 'mollitia', 881760, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (34, 'eos', 32435645, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (35, 'qui', 39000, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (36, 'odit', 2876, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (37, 'officia', 59613180, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (38, 'ad', 1, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (39, 'maxime', 2233, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (40, 'iusto', 5, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (41, 'velit', 91474820, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (42, 'magni', 7, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (43, 'quia', 5373, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (44, 'vel', 129920, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (45, 'odio', 1633, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (46, 'recusandae', 49, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (47, 'magni', 23, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (48, 'explicabo', 0, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (49, 'quod', 0, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (50, 'architecto', 18310405, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (51, 'nostrum', 216920, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (52, 'eos', 31214485, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (53, 'harum', 1, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (54, 'quis', 29, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (55, 'voluptas', 174325712, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (56, 'aliquid', 1, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (57, 'molestiae', 593, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (58, 'nihil', 16182995, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (59, 'eius', 3259185, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (60, 'nemo', 1, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (61, 'eum', 789028998, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (62, 'modi', 40, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (63, 'vel', 404438853, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (64, 'voluptatem', 1188433, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (65, 'rem', 185755, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (66, 'consequatur', 32608937, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (67, 'qui', 0, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (68, 'nostrum', 571178135, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (69, 'earum', 337953, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (70, 'ut', 4261, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (71, 'officiis', 253631, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (72, 'recusandae', 24, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (73, 'ipsam', 43665407, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (74, 'et', 38, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (75, 'et', 28387, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (76, 'assumenda', 321686, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (77, 'culpa', 103833210, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (78, 'quam', 608212397, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (79, 'dolores', 44402, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (80, 'rerum', 6279, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (81, 'tenetur', 279, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (82, 'autem', 0, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (83, 'qui', 384431839, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (84, 'et', 257, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (85, 'provident', 14551, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (86, 'quod', 6993100, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (87, 'est', 2, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (88, 'reprehenderit', 3754, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (89, 'tempore', 512681, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (90, 'libero', 0, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (91, 'exercitationem', 608, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (92, 'est', 3868845, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (93, 'occaecati', 8898, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (94, 'illum', 1, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (95, 'quis', 8, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (96, 'quos', 603136, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (97, 'dignissimos', 12447, 'http://lorempixel.com/640/480/', 1);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (98, 'quas', 0, 'http://lorempixel.com/640/480/', 2);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (99, 'quia', 266405396, 'http://lorempixel.com/640/480/', 3);
INSERT INTO `items` (`id`, `name`, `price`, `imageName`, `categoryId`) VALUES (100, 'recusandae', 1715, 'http://lorempixel.com/640/480/', 1);


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `groupId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign key of avatar` (`avatarId`),
  KEY `foreign key of group` (`groupId`),
  CONSTRAINT `foreign key of avatar` FOREIGN KEY (`avatarId`) REFERENCES `avatars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `foreign key of group` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (1, 'Lueilwitz', 'sed', 'leila59@example.com', 'smitham.audie', 'e91a4f2e9621ac12dd88ad707dff170136f58bf0', 4, 0, 5, 1, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (2, 'Dicki', 'harum', 'emmerich.lacy@example.net', 'lrempel', 'ba794554020c18ad021db8f951ed49e4d572ab29', 2, 4, 6, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (3, 'Hammes', 'omnis', 'joannie.hirthe@example.com', 'eichmann.major', 'bd69db3acd6460ab56f83e544f1e7f49abc44cd2', 8, 0, 0, 0, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (4, 'Hartmann', 'corporis', 'bennett.becker@example.net', 'hayes.tyra', 'a3aa13d63d586f2bd66afeb57d68db0c10890768', 2, 0, 9, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (5, 'Windler', 'est', 'cwalker@example.com', 'corkery.manuela', '534f0736d74b55594f75a087bdfd001671366966', 5, 2, 8, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (6, 'Collier', 'vel', 'bernie16@example.net', 'marlene77', '67f53b9f5e60efef39bacc8029d2c24fd87215db', 0, 7, 7, 1, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (7, 'Leannon', 'in', 'heaney.keith@example.org', 'leda62', '61e254555162b1fd5b687a53a6779f0d0010ceec', 5, 8, 5, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (8, 'Reynolds', 'ex', 'santina89@example.com', 'padberg.lauriane', '350f073f059e58284110126dd7fcff1cffd2b2de', 4, 1, 2, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (9, 'Abbott', 'et', 'renner.lynn@example.org', 'alanna58', '42957528ec644bdff65ae881e8c606ce2f04b835', 8, 1, 7, 1, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (10, 'Bechtelar', 'voluptas', 'gjacobs@example.net', 'nicholaus73', '515c2986f1a220b78850a0e8f64c7f7c198c73aa', 7, 8, 5, 1, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (11, 'Barton', 'eaque', 'jhuels@example.net', 'bonnie.kemmer', '47a8d46ab7ff0a15729d2a921e4a07448474838a', 1, 8, 4, 1, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (12, 'Mertz', 'earum', 'mitchell.johan@example.net', 'schaefer.damaris', '51cbdb9a80aeb93b3a30850b489436ce5e5f8964', 5, 4, 1, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (13, 'Block', 'expedita', 'guido.zulauf@example.net', 'abbott.kristina', '9910f4df1af22b4ca5b49322b7aeb0e1f2fc4ca5', 6, 7, 7, 1, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (14, 'Kassulke', 'quia', 'mertz.sandra@example.net', 'frieda.mills', '93b52b5f46d4c5720de19bf10e0ee3c92d781357', 9, 7, 7, 0, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (15, 'Wolf', 'error', 'fiona38@example.org', 'clint.willms', '6b9bfc5064be228f6c065c27c9718adaeeed819f', 5, 0, 1, 1, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (16, 'Toy', 'voluptatem', 'qgusikowski@example.org', 'adickens', 'e1050ba974cbafbc58af83bbbbc65a6ddbd742be', 0, 2, 0, 0, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (17, 'Steuber', 'qui', 'friesen.macy@example.net', 'cody.roob', '6a725b0fc9bff2b524dbb5f1709c1f762629fd8a', 8, 3, 3, 1, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (18, 'Schuster', 'perferendis', 'igottlieb@example.net', 'opouros', 'bcc1cd729ee2aa11db873ef6cee76a28cde1ba09', 1, 2, 6, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (19, 'Littel', 'magnam', 'heller.tyshawn@example.com', 'giuseppe.macejkovic', '52bb7a6d19d3a7830aefe61b38bf61c86f87be3d', 8, 1, 0, 1, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (20, 'Howell', 'suscipit', 'koch.wiley@example.com', 'dean80', '54fea894f500ac208cd1f2108f9e8b8ba4fb8c86', 6, 8, 7, 0, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (21, 'Heller', 'beatae', 'xdonnelly@example.com', 'jennings86', 'c750268b6d8d28d37ab3fae4e30c4de20c22db5e', 4, 1, 0, 1, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (22, 'Stanton', 'delectus', 'oaltenwerth@example.net', 'damian29', '692e5be9d6164998b851c5d52291ed195b0d9756', 6, 1, 4, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (23, 'Pollich', 'enim', 'ruecker.fabiola@example.com', 'ljaskolski', '2fcd37d17fe2743d3e2c22c673d972093c840fcb', 2, 9, 8, 0, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (24, 'Greenholt', 'accusantium', 'torrey.waelchi@example.net', 'thowe', '0abf77843258e86b96333ca2fbed5f52d02403cd', 3, 5, 4, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (25, 'Krajcik', 'est', 'kurt75@example.net', 'ekemmer', '8581f1fd7ce671d0a611222fecd02309d524bc66', 4, 7, 5, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (26, 'Grimes', 'et', 'guiseppe.medhurst@example.com', 'dietrich.abdul', '02042e6b85b2f20889e78ac4a6ffcd6616a8e337', 7, 8, 9, 0, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (27, 'Glover', 'eum', 'bergnaum.adriana@example.net', 'rcronin', '14db2faf8d538e9f91692eda7a1ae455fa36758d', 3, 3, 9, 1, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (28, 'Champlin', 'in', 'donnelly.kristian@example.org', 'earnest.breitenberg', '359a11be22ea58bdfe53f437c0c3297f83d26f84', 8, 9, 2, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (29, 'Hand', 'quia', 'ebrown@example.org', 'jean43', 'ef5e8c0c58ce7658beaf8d5b866e51b80a7c826d', 3, 0, 4, 1, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (30, 'Prohaska', 'vitae', 'walter.deontae@example.com', 'sister00', '370345d012b991771d4628df5865598494a3a0e1', 0, 8, 1, 0, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (31, 'Erdman', 'tenetur', 'jewell.ferry@example.org', 'legros.destin', '05d6c0251234392bc19edcdbdb6204606b314610', 4, 2, 2, 1, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (32, 'Walsh', 'molestiae', 'mbartoletti@example.net', 'jermain32', 'a86f7a3a46fbacfd1706fea89a70708179499552', 8, 8, 1, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (33, 'Daniel', 'dolorem', 'rgrimes@example.org', 'strosin.aylin', '62564e8b5111fa687a5d79854b1984c8c49c7ba0', 3, 6, 1, 1, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (34, 'Stracke', 'vel', 'streich.d\'angelo@example.net', 'jaron.reilly', 'bf889cecbe11e95bb85027c018a20873fa9b406e', 9, 7, 5, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (35, 'Kemmer', 'tenetur', 'xcarter@example.net', 'velda.larson', '5ac076a061226b95d27c263dcd18be13031dcf94', 2, 5, 1, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (36, 'Kozey', 'ex', 'lbarton@example.net', 'yasmine.feest', 'fe758a1bb4a19d179cde1553de5618d8c8f1aa79', 3, 5, 3, 1, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (37, 'Nolan', 'quisquam', 'minnie.schulist@example.net', 'reyes29', 'e712beb7c848e99ea9d51830502a15ac59e461c0', 8, 0, 2, 1, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (38, 'Kessler', 'quo', 'mwilderman@example.net', 'ryder71', 'aec4753bcdef542fb1bba3253682da18c7949f7a', 7, 9, 7, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (39, 'Stamm', 'quaerat', 'jdouglas@example.com', 'naomie.auer', '7f5786a0340b80d8fd4680e0d174442648ad094e', 2, 2, 0, 0, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (40, 'Keebler', 'ab', 'hank31@example.com', 'bwisozk', 'b48fdc088a77aca361a957dacfef3d40012f8d87', 3, 3, 8, 1, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (41, 'Lehner', 'velit', 'lizeth.kerluke@example.com', 'iluettgen', '4d24377d495b9496c40e2cb358659b4eec6ab612', 7, 6, 5, 0, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (42, 'Cummerata', 'est', 'wintheiser.cleta@example.net', 'retta23', '66a7c900441f0867ece69d393a8aceb31e8687c7', 2, 7, 9, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (43, 'Smith', 'ab', 'jon56@example.net', 'jermey09', '8798cae08ddaaf84362c5202c4496a57eeadfa57', 1, 0, 9, 0, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (44, 'Dickinson', 'reiciendis', 'slakin@example.com', 'mcglynn.coralie', '8e30146c565eb3e8a4efa611fb0ef8f38d467e5a', 3, 8, 7, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (45, 'Farrell', 'asperiores', 'marisol10@example.net', 'jenkins.jazmin', 'e578d389e1fe199f473c30ffa57d1c854bb0d350', 8, 9, 8, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (46, 'Skiles', 'voluptate', 'nmills@example.net', 'sarmstrong', '5c28cc2ea21e8fceb782cebaccfab35fed7e3596', 9, 5, 0, 1, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (47, 'Berge', 'eum', 'ethyl.dickens@example.net', 'gutkowski.clovis', '9a4f034292e9a0e35bcc343c8fa2ee1582d119ef', 0, 7, 0, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (48, 'Braun', 'quia', 'kirstin.weimann@example.org', 'lauretta27', '9bde89eff93c0b5506d9e8fd8677d28974fd827a', 7, 0, 5, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (49, 'Rowe', 'sunt', 'lorenz.lowe@example.com', 'talon05', '0ebaeea53c5622ea494783b60c58016c679c1645', 9, 8, 9, 1, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (50, 'Davis', 'necessitatibus', 'laila.stokes@example.org', 'greenholt.ada', '974fcda6cf989d21049171530359fce2b3da959a', 2, 9, 2, 1, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (51, 'Hermann', 'repellat', 'zmacejkovic@example.net', 'igoyette', '4f6dbe25b2fa80aa97509326dd4631796a610e60', 3, 8, 8, 1, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (52, 'Kerluke', 'soluta', 'olson.karolann@example.net', 'russ87', 'cd700b081cb43fa2b6472a21ae81a3008f1debd2', 7, 9, 0, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (53, 'Feest', 'labore', 'antwan.white@example.com', 'loma.kozey', '003093a939e6d913c951d5f91039644082b1eb6e', 0, 1, 4, 1, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (54, 'Heller', 'quia', 'sammie04@example.org', 'fbergnaum', '00310d43523ec2ee9e874db8bc4c87b09ec398ea', 6, 7, 5, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (55, 'Leannon', 'officia', 'skirlin@example.net', 'shaun.schulist', '4c86699cdefb00893f99603d80ed66db3c97734c', 4, 5, 8, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (56, 'Boyer', 'fuga', 'spencer.leopold@example.net', 'baumbach.enrique', '361c55a490f9a4442de863416cb4d024c5e8a437', 1, 4, 0, 1, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (57, 'Walsh', 'nemo', 'satterfield.garrett@example.net', 'fkling', '315012c7d4da6851e9d12e6d8c3600ca8de77d1e', 2, 9, 6, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (58, 'McLaughlin', 'aliquam', 'thiel.nathen@example.com', 'qgutkowski', 'aad392ce7546b684c23ce2d06bfd556644df65be', 8, 5, 5, 0, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (59, 'Hermann', 'sit', 'cleora11@example.com', 'xhackett', '07c1f198d7ec7c8062b3c15d13b14c338406027d', 7, 0, 4, 0, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (60, 'Davis', 'sed', 'gibson.elinor@example.net', 'maggio.tyler', '8d344b19bdaf11f837b0892c3de83fe9a72444a1', 9, 2, 9, 1, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (61, 'Rodriguez', 'quae', 'cassandra.thiel@example.org', 'vidal.kertzmann', 'ce63f983eb7ab78448642a9a306dfb02e2e12a8d', 3, 1, 6, 0, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (62, 'Anderson', 'omnis', 'davis.johnson@example.net', 'irussel', '106452cd77ecfd527169facde00dbb90d2d8ce77', 5, 0, 8, 1, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (63, 'Stark', 'sit', 'payton20@example.org', 'hschoen', '50d8f3ad76c2a72136dc7f93a63af9f0bfc95155', 4, 2, 3, 1, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (64, 'Balistreri', 'aut', 'maximus78@example.org', 'uglover', '81d28f9f73b5b51504ee299480363a7a9ae68738', 6, 1, 8, 0, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (65, 'Bins', 'ut', 'rutherford.christian@example.org', 'abbott.ken', 'd25f14e5ed5e1d1a279971a81088dc7561ab4c25', 9, 3, 7, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (66, 'Davis', 'eum', 'llehner@example.net', 'jayde62', 'fb6bd64d1f1e07735b94762e0fe594b7a25cba99', 4, 4, 4, 1, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (67, 'Gottlieb', 'aliquam', 'brakus.terence@example.org', 'jade.grant', '6a4dce8c8e1ff6fee1c672becf25a8efcbbca5e0', 3, 4, 1, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (68, 'Reynolds', 'doloremque', 'darrion.west@example.org', 'eichmann.davon', 'cbd774fc70e941305059571bddfed6102016908d', 1, 2, 7, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (69, 'Erdman', 'qui', 'alfredo20@example.net', 'konopelski.peggie', '5e01e5fbbaf87885eeb06d40b2f7504c1b3c3ad1', 1, 8, 3, 1, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (70, 'Beahan', 'est', 'anna.hodkiewicz@example.net', 'wo\'kon', 'fc142aa78583a844178e5846d8eab6a350c6e217', 8, 7, 9, 0, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (71, 'O\'Hara', 'quia', 'barrows.casandra@example.com', 'sipes.emily', 'ce675278134e9955c0b9cf270359bee1ca0cf6b2', 3, 0, 6, 0, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (72, 'Stark', 'fuga', 'nathaniel.harvey@example.net', 'kris.heather', '2b4b80591ff9a64758b1f4b0d0b52fc1d6e3a859', 1, 0, 4, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (73, 'Quitzon', 'esse', 'vconn@example.org', 'leonor.stanton', '22d1102b36bb9cf3830d5e48a53cb85993766071', 9, 1, 5, 0, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (74, 'Blick', 'hic', 'kgerlach@example.org', 'sheridan33', '608f8a1783f262450f1c274e60009c6c6768bf70', 1, 8, 4, 0, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (75, 'Erdman', 'sunt', 'cedrick38@example.net', 'raquel86', '70a4349bda420984648169e037fc4a78e8742473', 8, 0, 3, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (76, 'Bednar', 'in', 'ellen64@example.org', 'ybeer', '692c57557408168cc2c18068186661f2004781d4', 4, 6, 1, 0, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (77, 'Lubowitz', 'modi', 'jhermann@example.com', 'blanda.emmanuelle', 'b80408ce7ae8761dbf03fcde41932db12b814b46', 1, 3, 8, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (78, 'Lebsack', 'dolorem', 'cameron.zemlak@example.com', 'clinton.renner', '676744aedf7e9ea9c3a567d4fc1ed353669ceea0', 8, 6, 9, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (79, 'Larson', 'ut', 'bradford32@example.net', 'jacinthe.dare', 'a32b7299b5ff2b6d2d95cbbcae97a9614313c087', 2, 5, 0, 0, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (80, 'Bosco', 'dolor', 'schaefer.maxine@example.net', 'toberbrunner', '25f2694dc34d3cba8b2d1a3c8a4bb41a50289a33', 5, 2, 6, 0, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (81, 'Mertz', 'non', 'champlin.glenda@example.net', 'hans36', '82a19822218f0fa2f29a539c8b5c0b3ffd72969f', 4, 2, 7, 0, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (82, 'Kuhic', 'laudantium', 'gregoria33@example.org', 'romaine33', 'b325d1bd246a58f24a1aff9bc5615a7e9434b7ba', 2, 2, 1, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (83, 'Vandervort', 'placeat', 'icrooks@example.org', 'reinger.sonia', '4596c0cf28aaa2af0d9820be0ee50de1c2aa3381', 3, 1, 2, 0, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (84, 'Hickle', 'expedita', 'rupert33@example.net', 'zschmeler', '4ce1f5b3aaf27d73cc3ef2ef1f9d97f0600c47e7', 8, 9, 5, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (85, 'Gislason', 'ab', 'layla61@example.com', 'mmoore', '3105c8b442c5b79157f3902605f021648cc4d122', 7, 4, 1, 1, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (86, 'Bailey', 'quos', 'jbartell@example.org', 'verner68', '750e0260433070d0d5117bb7552367082ef2113f', 5, 3, 7, 1, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (87, 'Champlin', 'consequatur', 'oeffertz@example.org', 'carmela.boyle', '558373c6ee4e5f3523d9100e5c475da83a20ee94', 1, 5, 2, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (88, 'Moore', 'sed', 'amos.hilll@example.net', 'alberto.lakin', '55461a0f579a95908da50f0dbe6b5b7c3131b592', 5, 8, 3, 1, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (89, 'Bashirian', 'voluptates', 'qschowalter@example.org', 'wyman.kody', 'bdfadacd9d69be876a4b553bcfffd47a4c3c2f73', 7, 9, 6, 0, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (90, 'Jaskolski', 'sapiente', 'maritza.sauer@example.com', 'lonny.johnson', 'c2086abc1e66c70b8d903be34b395b1c6cc9afe7', 9, 8, 2, 1, 10, 10);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (91, 'Hills', 'quibusdam', 'kiara01@example.org', 'linwood.jacobson', 'e1fc9a6ee648554a2d6ab8014fc6d7466e534a57', 7, 3, 5, 1, 1, 1);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (92, 'Rogahn', 'architecto', 'muhammad.leannon@example.org', 'klocko.arely', '149430c896eae39710eeb43f16fa9644449d9065', 1, 5, 1, 0, 2, 2);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (93, 'Kutch', 'suscipit', 'lila14@example.net', 'xmcclure', 'fa1e33cbc719e287e09189d6aa1e1096c03651a9', 5, 4, 3, 0, 3, 3);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (94, 'Gutkowski', 'et', 'vboyle@example.com', 'moses75', '19eb0e40b31cd435eeca134a8e46fa99fecd28a7', 0, 4, 8, 1, 4, 4);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (95, 'Heathcote', 'magnam', 'jacobs.annabell@example.org', 'vivienne25', '5a491885bb2c9d741f2cae22c98fd262197588fb', 3, 6, 6, 0, 5, 5);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (96, 'Daniel', 'odit', 'florian.moore@example.net', 'hmayer', '4f8ccb156046865888db2e6d56c764a9691e66e8', 5, 5, 0, 0, 6, 6);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (97, 'Rosenbaum', 'rerum', 'reece13@example.net', 'boyle.alec', '091fccf97c2f09b820f1d187efb908ebf270c2d9', 9, 8, 3, 0, 7, 7);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (98, 'Hoeger', 'enim', 'hayes.dillon@example.net', 'cheyenne.pollich', '64c5b2a9f58cd62baaf90ebb2ccb868211d456d7', 1, 8, 9, 0, 8, 8);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (99, 'Kris', 'porro', 'renee.zemlak@example.org', 'rachelle.schmitt', '63fc55413aeee6614bf2d9d516430c3abb8b8603', 0, 2, 8, 1, 9, 9);
INSERT INTO `users` (`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (100, 'Quitzon', 'ut', 'cameron64@example.org', 'psteuber', 'f6cd0a45076d4e96b3412fc6ac8ffa57b09c08d3', 2, 5, 0, 0, 10, 10);


