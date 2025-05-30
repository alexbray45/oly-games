-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2025 at 06:24 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funolympicgamesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `Country_ID` int NOT NULL AUTO_INCREMENT,
  `Country_Name` varchar(100) NOT NULL,
  `Continent` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Country_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Country_ID`, `Country_Name`, `Continent`) VALUES
(1, 'Afghanistan', 'Asia'),
(2, 'Albania', 'Europe'),
(3, 'Algeria', 'Africa'),
(4, 'Andorra', 'Europe'),
(5, 'Angola', 'Africa'),
(6, 'Antigua and Barbuda', 'North America'),
(7, 'Argentina', 'South America'),
(8, 'Armenia', 'Asia'),
(9, 'Australia', 'Oceania'),
(10, 'Austria', 'Europe'),
(11, 'Azerbaijan', 'Asia'),
(12, 'Bahamas', 'North America'),
(13, 'Bahrain', 'Asia'),
(14, 'Bangladesh', 'Asia'),
(15, 'Barbados', 'North America'),
(16, 'Belarus', 'Europe'),
(17, 'Belgium', 'Europe'),
(18, 'Belize', 'North America'),
(19, 'Benin', 'Africa'),
(20, 'Bhutan', 'Asia'),
(21, 'Bolivia', 'South America'),
(22, 'Bosnia and Herzegovina', 'Europe'),
(23, 'Botswana', 'Africa'),
(24, 'Brazil', 'South America'),
(25, 'Brunei', 'Asia'),
(26, 'Bulgaria', 'Europe'),
(27, 'Burkina Faso', 'Africa'),
(28, 'Burundi', 'Africa'),
(29, 'Cabo Verde', 'Africa'),
(30, 'Cambodia', 'Asia'),
(31, 'Cameroon', 'Africa'),
(32, 'Canada', 'North America'),
(33, 'Central African Republic', 'Africa'),
(34, 'Chad', 'Africa'),
(35, 'Chile', 'South America'),
(36, 'China', 'Asia'),
(37, 'Colombia', 'South America'),
(38, 'Comoros', 'Africa'),
(39, 'Congo, Democratic Republic of the', 'Africa'),
(40, 'Congo, Republic of the', 'Africa'),
(41, 'Costa Rica', 'North America'),
(42, 'Croatia', 'Europe'),
(43, 'Cuba', 'North America'),
(44, 'Cyprus', 'Asia'),
(45, 'Czech Republic', 'Europe'),
(46, 'Denmark', 'Europe'),
(47, 'Djibouti', 'Africa'),
(48, 'Dominica', 'North America'),
(49, 'Dominican Republic', 'North America'),
(50, 'Ecuador', 'South America'),
(51, 'Egypt', 'Africa'),
(52, 'El Salvador', 'North America'),
(53, 'Equatorial Guinea', 'Africa'),
(54, 'Eritrea', 'Africa'),
(55, 'Estonia', 'Europe'),
(56, 'Eswatini', 'Africa'),
(57, 'Ethiopia', 'Africa'),
(58, 'Fiji', 'Oceania'),
(59, 'Finland', 'Europe'),
(60, 'France', 'Europe'),
(61, 'Gabon', 'Africa'),
(62, 'Gambia', 'Africa'),
(63, 'Georgia', 'Asia'),
(64, 'Germany', 'Europe'),
(65, 'Ghana', 'Africa'),
(66, 'Greece', 'Europe'),
(67, 'Grenada', 'North America'),
(68, 'Guatemala', 'North America'),
(69, 'Guinea', 'Africa'),
(70, 'Guinea-Bissau', 'Africa'),
(71, 'Guyana', 'South America'),
(72, 'Haiti', 'North America'),
(73, 'Honduras', 'North America'),
(74, 'Hungary', 'Europe'),
(75, 'Iceland', 'Europe'),
(76, 'India', 'Asia'),
(77, 'Indonesia', 'Asia'),
(78, 'Iran', 'Asia'),
(79, 'Iraq', 'Asia'),
(80, 'Ireland', 'Europe'),
(81, 'Israel', 'Asia'),
(82, 'Italy', 'Europe'),
(83, 'Jamaica', 'North America'),
(84, 'Japan', 'Asia'),
(85, 'Jordan', 'Asia'),
(86, 'Kazakhstan', 'Asia'),
(87, 'Kenya', 'Africa'),
(88, 'Kiribati', 'Oceania'),
(89, 'Kuwait', 'Asia'),
(90, 'Kyrgyzstan', 'Asia'),
(91, 'Laos', 'Asia'),
(92, 'Latvia', 'Europe'),
(93, 'Lebanon', 'Asia'),
(94, 'Lesotho', 'Africa'),
(95, 'Liberia', 'Africa'),
(96, 'Libya', 'Africa'),
(97, 'Liechtenstein', 'Europe'),
(98, 'Lithuania', 'Europe'),
(99, 'Luxembourg', 'Europe'),
(100, 'Madagascar', 'Africa'),
(101, 'Malawi', 'Africa'),
(102, 'Malaysia', 'Asia'),
(103, 'Maldives', 'Asia'),
(104, 'Mali', 'Africa'),
(105, 'Malta', 'Europe'),
(106, 'Marshall Islands', 'Oceania'),
(107, 'Mauritania', 'Africa'),
(108, 'Mauritius', 'Africa'),
(109, 'Mexico', 'North America'),
(110, 'Micronesia', 'Oceania'),
(111, 'Moldova', 'Europe'),
(112, 'Monaco', 'Europe'),
(113, 'Mongolia', 'Asia'),
(114, 'Montenegro', 'Europe'),
(115, 'Morocco', 'Africa'),
(116, 'Mozambique', 'Africa'),
(117, 'Myanmar', 'Asia'),
(118, 'Namibia', 'Africa'),
(119, 'Nauru', 'Oceania'),
(120, 'Nepal', 'Asia'),
(121, 'Netherlands', 'Europe'),
(122, 'New Zealand', 'Oceania'),
(123, 'Nicaragua', 'North America'),
(124, 'Niger', 'Africa'),
(125, 'Nigeria', 'Africa'),
(126, 'North Korea', 'Asia'),
(127, 'North Macedonia', 'Europe'),
(128, 'Norway', 'Europe'),
(129, 'Oman', 'Asia'),
(130, 'Pakistan', 'Asia'),
(131, 'Palau', 'Oceania'),
(132, 'Panama', 'North America'),
(133, 'Papua New Guinea', 'Oceania'),
(134, 'Paraguay', 'South America'),
(135, 'Peru', 'South America'),
(136, 'Philippines', 'Asia'),
(137, 'Poland', 'Europe'),
(138, 'Portugal', 'Europe'),
(139, 'Qatar', 'Asia'),
(140, 'Romania', 'Europe'),
(141, 'Russia', 'Europe'),
(142, 'Rwanda', 'Africa'),
(143, 'Saint Kitts and Nevis', 'North America'),
(144, 'Saint Lucia', 'North America'),
(145, 'Saint Vincent and the Grenadines', 'North America'),
(146, 'Samoa', 'Oceania'),
(147, 'San Marino', 'Europe'),
(148, 'Sao Tome and Principe', 'Africa'),
(149, 'Saudi Arabia', 'Asia'),
(150, 'Senegal', 'Africa'),
(151, 'Serbia', 'Europe'),
(152, 'Seychelles', 'Africa'),
(153, 'Sierra Leone', 'Africa'),
(154, 'Singapore', 'Asia'),
(155, 'Slovakia', 'Europe'),
(156, 'Slovenia', 'Europe'),
(157, 'Solomon Islands', 'Oceania'),
(158, 'Somalia', 'Africa'),
(159, 'South Africa', 'Africa'),
(160, 'South Korea', 'Asia'),
(161, 'South Sudan', 'Africa'),
(162, 'Spain', 'Europe'),
(163, 'Sri Lanka', 'Asia'),
(164, 'Sudan', 'Africa'),
(165, 'Suriname', 'South America'),
(166, 'Sweden', 'Europe'),
(167, 'Switzerland', 'Europe'),
(168, 'Syria', 'Asia'),
(169, 'Taiwan', 'Asia'),
(170, 'Tajikistan', 'Asia'),
(171, 'Tanzania', 'Africa'),
(172, 'Thailand', 'Asia'),
(173, 'Timor-Leste', 'Asia'),
(174, 'Togo', 'Africa'),
(175, 'Tonga', 'Oceania'),
(176, 'Trinidad and Tobago', 'North America'),
(177, 'Tunisia', 'Africa'),
(178, 'Turkey', 'Asia'),
(179, 'Turkmenistan', 'Asia'),
(180, 'Tuvalu', 'Oceania'),
(181, 'Uganda', 'Africa'),
(182, 'Ukraine', 'Europe'),
(183, 'United Arab Emirates', 'Asia'),
(184, 'United Kingdom', 'Europe'),
(185, 'United States of America', 'North America'),
(186, 'Uruguay', 'South America'),
(187, 'Uzbekistan', 'Asia'),
(188, 'Vanuatu', 'Oceania'),
(189, 'Vatican City', 'Europe'),
(190, 'Venezuela', 'South America'),
(191, 'Vietnam', 'Asia'),
(192, 'Yemen', 'Asia'),
(193, 'Zambia', 'Africa'),
(194, 'Zimbabwe', 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `funolympiccommittee`
--

DROP TABLE IF EXISTS `funolympiccommittee`;
CREATE TABLE IF NOT EXISTS `funolympiccommittee` (
  `Committee_ID` int NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Committee_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `funolympiccommittee`
--

INSERT INTO `funolympiccommittee` (`Committee_ID`, `Firstname`, `Surname`, `Username`, `Password`) VALUES
(1, 'William', 'Johnson', 'willjon', '99c84f28e5867153870df43c83168197'),
(3, 'Sophia', 'Davis', 'sopdav', 'bc1bcc8edb7c876d9f0ad2ef959a918c'),
(4, 'Michael', 'Miller', 'mikem', '4c3e1ec04215f69d6a8e9c023c9e4572'),
(5, 'Emma', 'Brown', 'emmabrown', '1f050242921954f2c734eec74ce2ecb6'),
(6, 'Alex', 'Bray', 'alexbray', 'b75bd008d5fecb1f50cf026532e8ae67');

-- --------------------------------------------------------

--
-- Table structure for table `publicuser`
--

DROP TABLE IF EXISTS `publicuser`;
CREATE TABLE IF NOT EXISTS `publicuser` (
  `User_ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Sport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publicuser`
--

INSERT INTO `publicuser` (`User_ID`, `Name`, `Country`, `Email`, `Sport`) VALUES
(3, 'Alexander Bray', 'Ghana', 'alex.bray@gmail.com', 'Football'),
(4, 'Lawrence Bray', 'Ghana', 'larry.bray45@gmail.com', 'Athletics'),
(5, 'James King', 'England ', 'j.king@gmail.com', 'Football'),
(6, 'Dan Will', 'Spain', 'd.will11@co.uk', 'Gymnastics'),
(7, 'Li Kim', 'China', 'likim76@yahoo.com', 'Athletics'),
(9, 'David Jones', 'Canada', 'djones@gmail.com', 'Cycling'),
(10, 'Simon Andrews', 'Canada', 's.andrews@gmail.com', 'Table Tennis'),
(11, 'Kim Andrews', 'Italy', 'kim@gmail.com', 'Cycling'),
(12, 'Hope Anderson', 'United Kingdom', 'h.anderson@gmail.com', 'Gymnastics'),
(13, 'Amy Lee', 'Canada', 'lee@gmail.com', 'Cycling'),
(14, 'Amy Anderson', 'United States', 'a.anderson@gmail.com', 'Hockey'),
(15, 'Luiz Diaz', 'Colombia', 'l.diaz@gmail.com', 'Football'),
(16, 'Luke White', 'Cuba', 'l.white@gmail.com', 'Judo'),
(17, 'Ben White', 'United Kingdom', 'b.white@gmail.com', 'Football'),
(18, 'chikati', 'Zimbabwe', 'chikati@gmail.com', 'Sports'),
(19, 'alex', 'Austria', 'alex@gmail.com', 'Sailing'),
(20, 'Lucho', 'Mexico', 'luc@sporting.co.za', 'Cycling'),
(21, 'Bray', 'Australia', 'luc@sporting.co.za', 'Rowing');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `Registration_ID` int NOT NULL AUTO_INCREMENT,
  `User_ID` int DEFAULT NULL,
  `Sport_ID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Registration_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Sport_ID` (`Sport_ID`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `Sport_ID` varchar(25) NOT NULL,
  `Sport_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Sport_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`Sport_ID`, `Sport_Name`) VALUES
('SP1', 'Aquatics'),
('SP2', 'Archery'),
('SP3', 'Athletics'),
('SP4', 'Badminton'),
('SP5', 'Basketball'),
('SP6', 'Boxing'),
('SP7', 'Canoeing'),
('SP8', 'Cycling'),
('SP9', 'Equestrian'),
('SP10', 'Fencing'),
('SP11', 'Football'),
('SP12', 'Gymnastics'),
('SP13', 'Handball'),
('SP14', 'Hockey'),
('SP15', 'Judo'),
('SP16', 'Modern Pentathlon'),
('SP17', 'Rowing'),
('SP18', 'Sailing'),
('SP19', 'Shooting'),
('SP20', 'Table Tennis'),
('SP21', 'Taekwondo'),
('SP22', 'Tennis'),
('SP23', 'Triathlon'),
('SP24', 'Volleyball'),
('SP25', 'Weightlifting'),
('SP26', 'Wrestling');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
