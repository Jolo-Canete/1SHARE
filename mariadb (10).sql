-- Adminer 4.8.1 MySQL 10.4.33-MariaDB-1:10.4.33+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adUsername` varchar(45) NOT NULL,
  `adPassword` varchar(45) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `admin` (`adminID`, `adUsername`, `adPassword`) VALUES
(1,	'MariaCristina',	'creditstar'),
(2,	'chairman',	'.barangayFalls');

DROP TABLE IF EXISTS `barter`;
CREATE TABLE `barter` (
  `barterID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(45) NOT NULL,
  `requestID` int(11) DEFAULT NULL,
  `item1` int(11) DEFAULT NULL,
  `item2` int(11) DEFAULT NULL,
  `item3` int(11) DEFAULT NULL,
  `DateTimeMeet` datetime DEFAULT NULL,
  `DateTimeCompleted` datetime DEFAULT NULL,
  PRIMARY KEY (`barterID`),
  KEY `fk_barter_Request1_idx` (`requestID`),
  KEY `fk_barter_item1_idx` (`item1`),
  KEY `fk_barter_item2_idx` (`item2`),
  KEY `fk_barter_item3_idx` (`item3`),
  CONSTRAINT `barter_ibfk_1` FOREIGN KEY (`requestID`) REFERENCES `Request` (`requestID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_barter_item1` FOREIGN KEY (`item1`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_barter_item2` FOREIGN KEY (`item2`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_barter_item3` FOREIGN KEY (`item3`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `barter` (`barterID`, `Status`, `requestID`, `item1`, `item2`, `item3`, `DateTimeMeet`, `DateTimeCompleted`) VALUES
(1,	'Cancelled',	115,	97,	NULL,	NULL,	'2024-04-30 09:07:00',	'2024-04-28 10:08:18'),
(2,	'pending',	117,	97,	NULL,	NULL,	'2024-04-20 11:43:00',	'2024-04-28 23:45:18'),
(3,	'pending',	121,	97,	NULL,	NULL,	'2024-04-30 13:29:00',	NULL),
(4,	'pending',	126,	92,	NULL,	NULL,	'2024-04-20 11:36:00',	NULL),
(5,	'pending',	127,	101,	NULL,	NULL,	'2024-04-21 21:25:00',	'2024-04-30 09:30:03');

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE `borrow` (
  `borrowID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(45) NOT NULL,
  `requestID` int(11) DEFAULT NULL,
  `item1` int(11) DEFAULT NULL,
  `DateTimeMeet` datetime DEFAULT NULL,
  `DateTimeCompleted` datetime DEFAULT NULL,
  `OwnerProof` varchar(25) DEFAULT NULL,
  `RequesterProof` varchar(25) DEFAULT NULL,
  `handed` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`borrowID`),
  KEY `fk_barter_Request1_idx` (`requestID`),
  KEY `fk_barter_item2_idx` (`item1`),
  CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`requestID`) REFERENCES `Request` (`requestID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_barter_item200` FOREIGN KEY (`item1`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `borrow` (`borrowID`, `Status`, `requestID`, `item1`, `DateTimeMeet`, `DateTimeCompleted`, `OwnerProof`, `RequesterProof`, `handed`) VALUES
(27,	'Ongoing',	118,	91,	'2024-04-23 11:43:00',	'2024-04-28 23:50:49',	'662e701002212.jpg',	NULL,	'Yes');

DROP TABLE IF EXISTS `buy`;
CREATE TABLE `buy` (
  `buyID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(45) NOT NULL,
  `requestID` int(11) DEFAULT NULL,
  `item1` int(11) DEFAULT NULL,
  `DateTimeMeet` datetime DEFAULT NULL,
  `DateTimeCompleted` datetime DEFAULT NULL,
  PRIMARY KEY (`buyID`),
  KEY `fk_barter_Request1_idx` (`requestID`),
  KEY `fk_barter_item2_idx` (`item1`),
  CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`requestID`) REFERENCES `Request` (`requestID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_barter_item20` FOREIGN KEY (`item1`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `buy` (`buyID`, `Status`, `requestID`, `item1`, `DateTimeMeet`, `DateTimeCompleted`) VALUES
(39,	'Ongoing',	116,	89,	'2024-04-20 10:16:00',	'2024-04-28 18:24:09'),
(40,	'Ongoing',	119,	97,	'2024-04-20 09:28:00',	'2024-04-30 09:30:58'),
(41,	'Ongoing',	120,	89,	'2024-04-30 13:07:00',	NULL),
(45,	'Ongoing',	125,	89,	'2024-04-30 11:35:00',	NULL),
(46,	'Ongoing',	128,	91,	'2024-04-30 10:30:00',	NULL),
(47,	'Ongoing',	129,	91,	'2024-04-30 09:30:00',	NULL);

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cartID`),
  KEY `fk_cart_item1_idx` (`itemID`),
  KEY `fk_cart_user1_idx` (`userID`),
  CONSTRAINT `fk_cart_item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `cart` (`cartID`, `itemID`, `userID`, `quantity`) VALUES
(29,	89,	6,	1),
(37,	96,	6,	1),
(38,	88,	14,	6),
(39,	91,	8,	1),
(40,	97,	6,	1),
(41,	95,	6,	1),
(42,	89,	14,	1),
(43,	92,	14,	3),
(44,	98,	18,	1);

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(45) NOT NULL,
  `ItemDescription` varchar(84) NOT NULL,
  `category` varchar(45) NOT NULL,
  `itemImage_path` varchar(45) NOT NULL,
  `buyPrice` float DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `borrowPrice` float DEFAULT NULL,
  `borrowDuration` int(3) DEFAULT NULL,
  `itemQuantity` int(11) NOT NULL,
  `DateTimePosted` datetime NOT NULL,
  `itemAvailability` varchar(45) NOT NULL,
  `requestType` varchar(45) NOT NULL,
  `itemReports` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemID`),
  UNIQUE KEY `itemImage_path_UNIQUE` (`itemImage_path`),
  KEY `fk_Item_User1_idx` (`userID`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `item` (`itemID`, `itemName`, `ItemDescription`, `category`, `itemImage_path`, `buyPrice`, `userID`, `borrowPrice`, `borrowDuration`, `itemQuantity`, `DateTimePosted`, `itemAvailability`, `requestType`, `itemReports`) VALUES
(87,	'Nigger Horsy',	'HWAHAHWAHWHAHWAHWHAHWAHWHAHW',	'Toys',	'6615075310df0.jpg',	200.6,	6,	NULL,	NULL,	2,	'2024-04-09 09:16:03',	'Available',	'Barter,Buy',	NULL),
(88,	'Dino Toy',	'Yesie',	'Toys',	'66208d7669a54.jpg',	NULL,	6,	300,	6,	99,	'2024-04-09 09:17:13',	'Available',	'Barter,Borrow',	NULL),
(89,	'Shark Costume',	'shark costume for kids only',	'Cloths',	'662fbf0bdcca1.jpg',	100,	6,	150,	3,	20,	'2024-04-09 09:19:10',	'Available',	'Borrow,Buy',	NULL),
(90,	'Toolbox',	'Complete set',	'Tools',	'662fbddaa6e5d.png',	500,	6,	600,	3,	10,	'2024-04-09 09:20:29',	'Available',	'Borrow,Buy',	NULL),
(91,	'Magnitude 1.1',	'White, size 41',	'Others',	'661508cb91906.jpg',	3000,	6,	NULL,	NULL,	7,	'2024-04-09 09:22:19',	'Available',	'Buy',	NULL),
(92,	'ShoeNami',	'Very comfortable, b&w, size 40',	'Others',	'6615090a7464e.jpg',	2000,	6,	NULL,	NULL,	10,	'2024-04-09 09:23:22',	'Available',	'Barter,Buy',	NULL),
(93,	'Magnitude 1.2',	'Color white, size 45',	'Others',	'661509565d6d7.jpg',	3600,	6,	NULL,	NULL,	10,	'2024-04-09 09:24:38',	'Available',	'Barter,Buy',	NULL),
(94,	'Vacuum Cleaner',	'new, just used once',	'Others',	'662fbfedd5c19.jpg',	1000,	8,	NULL,	NULL,	1,	'2024-04-09 10:22:56',	'Available',	'Barter,Buy',	NULL),
(95,	'Asus Laptop',	'new, not been used',	'Others',	'662fc13debe4c.jpg',	30000,	8,	NULL,	NULL,	1,	'2024-04-09 11:50:18',	'Available',	'Barter,Buy',	NULL),
(96,	'Book',	'To read',	'School Supply',	'66153492e59d9.jpg',	NULL,	8,	NULL,	NULL,	99,	'2024-04-09 12:29:06',	'Available',	'Barter',	NULL),
(97,	'Cabinet',	'blue, old',	'Others',	'662fc286eec31.png',	500,	14,	NULL,	NULL,	1,	'2024-04-16 08:17:40',	'Available',	'Barter,Buy',	NULL),
(98,	'Dino Toy',	'cute toy',	'Toys',	'662fba9cefefb.jpg',	100,	14,	NULL,	NULL,	10,	'2024-04-29 15:19:56',	'Available',	'Buy',	NULL),
(99,	'Monoblock Chairs',	'good',	'Furniture',	'662fc9fa3aae3.jpg',	NULL,	14,	100,	7,	100,	'2024-04-29 16:25:30',	'Available',	'Borrow',	NULL),
(100,	'Table',	'easy to use, convenient',	'Furniture',	'662fca7a766ef.jpg',	NULL,	14,	300,	7,	5,	'2024-04-29 16:27:38',	'Available',	'Borrow',	NULL),
(101,	'Lambo',	'this is very fast toy',	'Toys',	'663047e261427.webp',	3000,	18,	NULL,	NULL,	199,	'2024-04-30 01:21:46',	'Available',	'Buy',	NULL),
(102,	'JBL Speaker',	'abot pikas baryo ang volume',	'Gadgets',	'6630509f9ffbb.jpg',	NULL,	14,	1000,	3,	1,	'2024-04-30 01:59:59',	'Available',	'Borrow',	NULL);

DROP TABLE IF EXISTS `itemRating`;
CREATE TABLE `itemRating` (
  `itemRatingID` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(45) NOT NULL,
  `rate_path` varchar(20) DEFAULT NULL,
  `userID` int(20) NOT NULL,
  `DateTimeRate` datetime DEFAULT NULL,
  PRIMARY KEY (`itemRatingID`),
  KEY `fk_ItemRating_Item1_idx` (`itemID`),
  KEY `fk_user` (`userID`),
  CONSTRAINT `fk_ItemRating_Item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `itemRating` (`itemRatingID`, `itemID`, `rate`, `comment`, `rate_path`, `userID`, `DateTimeRate`) VALUES
(7,	89,	5,	'Yey',	'a760d2.jpg',	14,	'2024-04-29 03:44:16'),
(8,	91,	5,	'okay ',	'2a9726.jpg',	14,	'2024-04-29 03:53:21'),
(9,	88,	5,	'Great wall of china ',	'cbef65.webp',	14,	'2024-04-29 03:55:19'),
(10,	97,	4,	'Who?',	'227766.jpg',	6,	'2024-04-29 04:15:49'),
(11,	88,	3,	'Ahhh not bad but not good',	'b9254b.jpg',	18,	'2024-04-30 09:30:46');

DROP TABLE IF EXISTS `reportedItem`;
CREATE TABLE `reportedItem` (
  `reportedItemID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `dateTime` varchar(45) NOT NULL,
  `reason` varchar(45) NOT NULL,
  `ss_path` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`reportedItemID`),
  KEY `fk_user_has_item_item1_idx` (`itemID`),
  KEY `fk_user_has_item_user1_idx` (`userID`),
  CONSTRAINT `fk_user_has_item_item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_item_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `reportedItem` (`reportedItemID`, `userID`, `itemID`, `dateTime`, `reason`, `ss_path`) VALUES
(1,	14,	88,	'2024-04-25 13:08:10',	'!!!',	'662a55baa9d491.73598540.png'),
(2,	14,	88,	'2024-04-25 13:11:36',	'sakit kaayo ka sa heart!!',	'662a568800b617.75369386.jpg'),
(3,	14,	88,	'2024-04-25 13:12:27',	'Nigger',	'662a56bbbd51e1.14084067.jpg');

DROP TABLE IF EXISTS `Request`;
CREATE TABLE `Request` (
  `requestID` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  `requestType` varchar(45) NOT NULL,
  `request_DateTime` datetime NOT NULL,
  `request_DateTimeClosed` datetime DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `dismiss` varchar(10) DEFAULT NULL,
  `incomingDismiss` varchar(10) DEFAULT NULL,
  `remove` varchar(30) DEFAULT NULL,
  `complete` varchar(30) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `failed` varchar(30) DEFAULT NULL,
  `ownerSuccess` varchar(50) DEFAULT NULL,
  `requesterSuccess` varchar(50) DEFAULT NULL,
  `requesterTranDismiss` varchar(20) DEFAULT NULL,
  `ownerTranDismiss` varchar(20) DEFAULT NULL,
  `meetDissmiss` varchar(20) DEFAULT NULL,
  `rated` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`requestID`),
  KEY `fk_Request_User1_idx` (`userID`),
  KEY `fk_Request_Item1_idx` (`itemID`),
  CONSTRAINT `fk_Request_Item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Request_User1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `Request` (`requestID`, `status`, `requestType`, `request_DateTime`, `request_DateTimeClosed`, `userID`, `itemID`, `dismiss`, `incomingDismiss`, `remove`, `complete`, `quantity`, `failed`, `ownerSuccess`, `requesterSuccess`, `requesterTranDismiss`, `ownerTranDismiss`, `meetDissmiss`, `rated`) VALUES
(115,	'Accepted',	'Barter',	'2024-04-28 18:07:41',	'2024-04-28 10:08:02',	14,	93,	NULL,	NULL,	'Yes',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(116,	'Accepted',	'Buy',	'2024-04-28 18:16:13',	'2024-04-28 10:21:37',	14,	89,	'Yes',	NULL,	NULL,	'Yes',	1,	NULL,	'662e23c9e23da.png',	NULL,	NULL,	'Yes',	NULL,	'yes'),
(117,	'Accepted',	'Barter',	'2024-04-28 23:43:12',	'2024-04-28 15:44:18',	14,	88,	'Yes',	NULL,	NULL,	'Yes',	NULL,	NULL,	'662e6f0e3ba21.jpg',	NULL,	NULL,	NULL,	NULL,	'yes'),
(118,	'Accepted',	'Borrow',	'2024-04-28 23:43:29',	'2024-04-28 15:44:22',	14,	91,	'Yes',	NULL,	NULL,	'Yes',	2,	NULL,	'662e70595e147.png',	NULL,	NULL,	NULL,	NULL,	'yes'),
(119,	'Accepted',	'Buy',	'2024-04-29 09:28:12',	'2024-04-29 01:32:08',	6,	97,	NULL,	NULL,	NULL,	'Yes',	2,	NULL,	NULL,	'663049d202b0f.png',	NULL,	NULL,	NULL,	NULL),
(120,	'Accepted',	'Buy',	'2024-04-29 13:07:55',	'2024-04-29 15:21:40',	14,	89,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(121,	'Accepted',	'Barter',	'2024-04-29 13:29:05',	'2024-04-29 15:21:48',	14,	92,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(125,	'Accepted',	'Buy',	'2024-04-29 23:35:32',	'2024-04-29 15:36:13',	14,	89,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(126,	'pending',	'Barter',	'2024-04-29 23:36:30',	NULL,	6,	96,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(127,	'Accepted',	'Barter',	'2024-04-30 09:25:53',	'2024-04-30 01:28:04',	18,	88,	NULL,	NULL,	NULL,	'Yes',	NULL,	NULL,	NULL,	'6630499bcfd4f.png',	NULL,	NULL,	NULL,	'yes'),
(128,	'Accepted',	'Buy',	'2024-04-30 09:26:53',	'2024-04-30 01:28:14',	14,	91,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(129,	'Accepted',	'Buy',	'2024-04-30 09:29:16',	'2024-04-30 01:29:42',	14,	91,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `contactNumber` varchar(45) NOT NULL,
  `zone` varchar(45) NOT NULL,
  `purok` varchar(45) NOT NULL,
  `dateJoined` datetime NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `recoveryNumber` int(45) DEFAULT NULL,
  `recentPassword` varchar(45) DEFAULT NULL,
  `userImage_path` varchar(45) DEFAULT NULL,
  `verifyImage_path` varchar(45) DEFAULT NULL,
  `birthDay` datetime DEFAULT NULL,
  `userReports` int(11) DEFAULT NULL,
  `hiddenTran` varchar(20) DEFAULT 'Yes',
  `hiddenItem` varchar(20) DEFAULT 'Yes',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `userImage_path_UNIQUE` (`userImage_path`),
  UNIQUE KEY `verifyImage_path_UNIQUE` (`verifyImage_path`),
  UNIQUE KEY `recoveryNumber_UNIQUE` (`recoveryNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `user` (`userID`, `firstName`, `middleName`, `lastName`, `contactNumber`, `zone`, `purok`, `dateJoined`, `userEmail`, `status`, `username`, `password`, `recoveryNumber`, `recentPassword`, `userImage_path`, `verifyImage_path`, `birthDay`, `userReports`, `hiddenTran`, `hiddenItem`) VALUES
(6,	'nipo',	'iyot',	'jasmine',	'09120883618',	'1',	'2',	'2024-04-02 15:09:51',	'excaliboburdz@gmail.com',	'Verified',	'nipo',	'$2y$10$seEjyq4/zU97haaEX0NfFeyl8u5kuY.pyHeY1.gSsyyYzYM9GD0Gm',	NULL,	NULL,	'img_66208cf17c6b6.jpg',	'6.jpg',	'2005-10-25 00:00:00',	NULL,	'Yes',	'Yes'),
(8,	'white',	'taguran',	'jiot',	'09454584872',	'2',	'2',	'2024-04-02 15:27:00',	'pukeEaterss@gmail.com',	'Verified',	'apogss',	'$2y$10$6wRi/d/mlQoEykdMR995AOOCQv.Sg7TmJunXyQt5ui3D9HexrM.NS',	NULL,	NULL,	'img_661e1fe6df379.jpg	',	'8.jpg',	'1970-01-01 00:00:00',	NULL,	'No',	'No'),
(14,	'Jolo',	'Anghag',	'Canete',	'09123123123',	'1',	'2',	'2024-04-13 18:01:25',	'carl@gmail.com',	'Verified',	'Licoresh',	'$2y$10$zjk4qvu3egN7.BAPDfr5DeCUuJAYUCZgDopYp6BiexctXAjsVrLui',	NULL,	NULL,	'img_661e1fe6df379.jpg',	'14.jpg',	'2005-10-25 00:00:00',	NULL,	'Yes',	'Yes'),
(16,	'King',	'Lion',	'Simba',	'09952554803',	'12',	'21',	'2024-04-20 17:15:04',	'lionking@gmail.com',	'Verified',	'lionking',	'$2y$10$2Q36L4aKxh7.XGvW5Wk/CeKjzseOzIoeMH9ZmmbpCuy63gifGJhIq',	NULL,	NULL,	'img_662f1a182a00d.jpg',	'16.jpg',	'2024-04-21 00:00:00',	NULL,	NULL,	NULL),
(17,	'nipo',	'cyrus',	'apog',	'09543215468',	'picop',	'5',	'2024-04-29 17:11:57',	'apog.nipocyrus@ici.edu.ph',	'Verified',	'userCreator',	'$2y$10$W9s8GtDDtfpjzzUOvWq4iu4ZuWWQ0eP762N7IffGg/mdT0pLytjae',	NULL,	NULL,	'img_66301e0162aa2.jpg',	'17.jpg',	'2006-02-20 00:00:00',	NULL,	'No',	'No'),
(18,	'Jazleen',	'Paula',	'Septimo',	'09213123123',	'3',	'2',	'2024-04-30 00:47:31',	'canetejolo3@gmail.com',	'Verified',	'paula',	'$2y$10$PAVLwRqtEcklsPw7qT45gu4WjB/OAJs0IVrlR6C7vY.LLEpKTINIy',	NULL,	NULL,	'img_663046f11d81b.jpg',	'18.jpg',	'2004-07-30 00:00:00',	NULL,	'Yes',	'Yes');

DROP TABLE IF EXISTS `userRating`;
CREATE TABLE `userRating` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `userComment` varchar(45) DEFAULT NULL,
  `userRate` int(10) NOT NULL,
  `userID` int(11) NOT NULL,
  `reportedID` int(11) DEFAULT NULL,
  `DateTimeRated` datetime DEFAULT NULL,
  PRIMARY KEY (`ratingID`),
  KEY `fk_userRating_user1_idx` (`userID`),
  KEY `reportedID` (`reportedID`),
  CONSTRAINT `fk_userRating_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userRating_ibfk_1` FOREIGN KEY (`reportedID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `userRating` (`ratingID`, `userComment`, `userRate`, `userID`, `reportedID`, `DateTimeRated`) VALUES
(1,	'Yeserrr',	5,	6,	14,	'2024-04-29 10:28:31');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `userreport`;
CREATE TABLE `userreport` (
  `userReportID` int(11) NOT NULL AUTO_INCREMENT,
  `userReportReason` varchar(700) NOT NULL,
  `userReportImage_path` varchar(450) NOT NULL,
  `userReportDate` datetime NOT NULL,
  `userReporter` int(11) NOT NULL,
  `userReported` int(11) NOT NULL,
  PRIMARY KEY (`userReportID`),
  KEY `fk_userReport_user1_idx` (`userReported`),
  CONSTRAINT `fk_userReport_user` FOREIGN KEY (`userReported`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `userreport` (`userReportID`, `userReportReason`, `userReportImage_path`, `userReportDate`, `userReporter`, `userReported`) VALUES
(1,	'sadadad',	'662f4a6a7633f7.49687295.jpg',	'2024-04-29 15:21:14',	14,	6);

DROP TABLE IF EXISTS `verifyUser`;
CREATE TABLE `verifyUser` (
  `verifyUserID` int(11) NOT NULL AUTO_INCREMENT,
  `adminID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `verifyDate` datetime NOT NULL,
  PRIMARY KEY (`verifyUserID`),
  KEY `fk_admin_has_user_user1_idx` (`userID`),
  KEY `fk_admin_has_user_admin1_idx` (`adminID`),
  CONSTRAINT `fk_admin_has_user_admin1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_admin_has_user_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2024-04-30 02:01:24
