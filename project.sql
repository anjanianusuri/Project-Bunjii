-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2019 at 08:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
CREATE TABLE IF NOT EXISTS `coaches` (
  `venue_id` int(11) DEFAULT NULL,
  `coach_id` int(11) NOT NULL,
  `coach_name` tinytext,
  `coach_desc` longtext,
  PRIMARY KEY (`coach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`venue_id`, `coach_id`, `coach_name`, `coach_desc`) VALUES
(1, 1, 'Frank Calabaria', 'Director of our Performance Program, an RSTA Business Director. Frank is a career coach and has been operating a professional tennis coaching business since 1998. He is a qualified Club Professional coach will Tennis Australia as well as an Mentor for the ANZ Tennis Hot Shots program at Tennis Australia. and also Coach Developer for Tennis Australia Franks passion and gifts lay in the love he has for the game of tennis and his desire to show share this with students of the game, both the young and young at heart. His passion for the game and the desire to make the tennis experience fun has seen Frank has twice been rewarded with State Coach of the Year honours and well as a nominee for Excellence in Hot Shots Coach of the Year at Tennis Australias Newcombe Medal annual awards in 2012 and also again in 2017 for coaching excellence in the club coach category.');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

DROP TABLE IF EXISTS `courts`;
CREATE TABLE IF NOT EXISTS `courts` (
  `venue_id` int(11) DEFAULT NULL,
  `court_id` int(11) NOT NULL,
  `court_name` tinytext,
  PRIMARY KEY (`court_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`venue_id`, `court_id`, `court_name`) VALUES
(1, 1, 'Green Court'),
(1, 2, 'Red Court');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `signupid` int(11) DEFAULT NULL,
  `customer_name` tinytext,
  `customer_age` int(2) DEFAULT NULL,
  `customer_gender` tinytext,
  `customer_phone` int(11) DEFAULT NULL,
  `customer_address` longtext,
  `customer_email` tinytext,
  `customer_interests` longtext,
  `customer_desc` longtext,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `signupid`, `customer_name`, `customer_age`, `customer_gender`, `customer_phone`, `customer_address`, `customer_email`, `customer_interests`, `customer_desc`) VALUES
(1, 1, 'Bhargav Bandi', NULL, NULL, NULL, NULL, 'bhargavbandi@live.in', NULL, NULL),
(2, 2, 'Anjani Anusuri', 26, 'Female', 435661027, '33/2311 Logan Road, Eight Mile Plains', 'anjani.anusuri@gmail.com', 'Basketball, Reading books, Travelling', 'I am a 26 year old basketball player. I started playing since I was a child. Apart from basketball I love travelling, reading books and cooking. I am here to network and build good connections in my sporting field and outside'),
(3, 3, 'Test', NULL, NULL, NULL, NULL, 'test@gmail.com', NULL, NULL),
(4, 6, 'Anjani', NULL, NULL, NULL, NULL, 'a@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

DROP TABLE IF EXISTS `timings`;
CREATE TABLE IF NOT EXISTS `timings` (
  `court_id` int(11) DEFAULT NULL,
  `timing_id` int(11) NOT NULL,
  `time_range` tinytext,
  PRIMARY KEY (`timing_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`court_id`, `timing_id`, `time_range`) VALUES
(1, 1, '9.00 - 10.00'),
(1, 2, '10.00 - 11.00'),
(1, 3, '12.00 - 1.00'),
(1, 4, '1.00 - 2.00'),
(1, 5, '2.00 - 3.00'),
(1, 6, '3.00 - 4.00'),
(1, 7, '4.00 - 5.00'),
(1, 8, '5.00 - 6.00'),
(1, 9, '6.00 - 7.00'),
(1, 10, '7.00 - 8.00'),
(2, 11, '9.00 - 10.00'),
(2, 12, '10.00 - 11.00'),
(2, 13, '12.00 - 1.00'),
(2, 14, '1.00 - 2.00'),
(2, 15, '2.00 - 3.00'),
(2, 16, '3.00 - 4.00'),
(2, 17, '4.00 - 5.00'),
(2, 18, '5.00 - 6.00'),
(2, 19, '6.00 - 7.00'),
(2, 20, '7.00 - 8.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `signupid` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `type` tinytext NOT NULL,
  PRIMARY KEY (`signupid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`signupid`, `name`, `email`, `password`, `type`) VALUES
(1, 'Bhargav Bandi', 'bhargavbandi@live.in', '$2y$10$7OaMAoe96SPR7vUkjoo1guUTFCYTKtupVGQY60fIOJ7tU.MMieZrK', 'venue'),
(2, 'Anjani Anusuri', 'anjani.anusuri@gmail.com', '$2y$10$0oqhXSinynQpPf0YWFQ1X.Z/PBvr2MbQ3/qwOXNWajITdK24MXKj2', 'customer'),
(3, 'Test', 'test@gmail.com', '$2y$10$rrVhytUTVQ7CbPvugQ8hi.VJz7AxESLb1sSOmczch9pvKOEDGCQ2m', 'customer'),
(4, 'B', 'c@gmail.com', '', 'venue'),
(5, 'D', 'd@gmail.com', '', 'venue'),
(6, 'Anjani', 'a@gmail.com', '$2y$10$W28psGJtPZi1fRYpfj.rvOUTZ3VGTSs7SZ9aXa7Szb43SDdXL2JMu', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT,
  `signupid` int(11) DEFAULT NULL,
  `venue_name` tinytext,
  `venue_desc` longtext,
  `venue_phone` int(12) DEFAULT NULL,
  `venue_type` tinytext,
  PRIMARY KEY (`venue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES
(1, 1, 'UQ Rugby', 'The UQ Rugby Football Club (UQRFC) is widely regarded as one of Australias premier rugby union clubs. Since its foundation in 1911, UQRFC has produced 60 Wallabies players (eight as captain) and over 200 Queensland representatives. This decorated club - Brisbanes most successful - provides playing pathways for male and female of all standards. If youre a lover of The Greatest Game of All, check out the UQ Rugby League Club! Known as the Hounds, the club fields a successful mens team in the University Rugby League Queensland competition. Theres also the option to join the UQ Touch Football Club, with the club competing in an array of junior and senior competitions across Brisbane!', 435661027, 'football'),
(2, 2, 'Scorpion Tennis', 'Scorpion Tennis of Queensland is Australias leading builder and supplier of tennis courts as well as a full range of leisure and sports surfaces including netball and basketball courts, aged care sporting facilities, bowling greens, mini courts, cricket pitches, pickle ball courts and an extensive range of surfaces for driveways, airstrips, wharves and industrial spaces. Whatever your sporting or commercial surfaces needs, we can offer the best advice on which surface to choose and the most efficient method of installation. As tennis players and professionals, we offer superior advice in terms of where to position your court in relation to the rest of your property, ensuring a seamless playing experience and a good looking solution for your home and lifestyle. You can try our tennis court surfaces at our Carseldine headquarters where we also offer a full range of coaching services.', 415796265, 'tennis'),
(3, 3, 'The Gabba', 'The Gabba is an icon of the Brisbane landscape and is the home ground for the Brisbane Lions, Brisbane Heat and Queensland Bulls. It is regarded as an impenetrable fortress for the Australian cricket team, with one of the best cricket wickets in the world. First established in 1895, the Gabba has hosted many major events including cricket, AFL, baseball, rugby league, rugby union, Olympic soccer and most recently two sell-out Adele concerts. The venue has 42,000 capacity and a range of function and meeting spaces that are used extensively throughout the year. The stadium boasts unrestricted views of the oval playing surface from all areas making it ideal to host international sporting and entertainment events. The Gabba is one of nine major sporting and entertainment facilities owned and operated by Stadiums Queensland.', 414529654, 'cricket'),
(4, 4, 'Jordyn Sports', 'As experienced basketball court construction experts for over thirty years, the team at Jordin Sports are able to create highly functional outdoor basketball courts for your property. Whether you require a court for your school or sports centre, we are able to efficiently build a high-quality basketball court to suit your needs. In addition to handling the entire planning and construction process, we are also able to add the finishing touches such as any necessary outdoor lighting.', 456284795, 'tennis'),
(5, 5, 'Logan Sports Center', 'Sky Badminton Centre was founded in February 2017 by champion coaches, Ricky Yu and Rosy Tang. They have dedicated their careers to badminton competition and coaching. Ricky and Rosy provide nine of the highest quality badminton courts in Brisbane - all of which meet international standards for international competition. The Sky Badminton Centre is available to the public for training, court hire and badminton promotions. Players of all ages are welcome to join Rick and Rosy for their badminton training programmes, or you can simply book a court for a badminton session.', 411785236, 'badminton'),
(6, 6, 'Morning Side Tenni', 'The Morningside Tennis Centre is committed to providing professional programs and personalised service for the Brisbane tennis community. The organisation also aims to be a socially-responsible leader through its delivery of and participation in community events. We want to be the number one place to go for tennis in Brisbane and welcome players of all ages and playing standards whether it be for a social hit or for something more serious.', 425678812, 'tennis'),
(7, 7, 'Brisbane Cricket Ground', 'Situated in the Brisbane suburb of Woolloongabba - it is shortened to the Gabba - the ground has gone through some drastic redevelopment during the last decade. The grassy banks, Moreton Bay figs and dogtrack have been replaced with modern, concrete stands, which may have removed some charm, but mean the ground offers superb facilities for the players and public. However, the most famous moment on the ground is one firmly from the past. The image of the deciding run-out in the tied Test of 1960-61, between Australia and West Indies, is one of the best known cricketing images of all time. In more recent times it has become a favourite haunt of Shane Warne, with the extra bounce from the often excellent wickets helping his legspin. In early 2006 a record crowd of 38,894 watched the first Twenty20 international in the country. This mark was promptly beaten six days later when Australia played South Africa in a full ODI.', 456379360, 'cricket'),
(8, 8, 'Basketball Victoria', 'The Basketball Victoria 2017 Facility Master Plan follows on from the first Master Plan presented in\r\nNovember 2012. The basketball and indoor sports market has undergone significant change in the last five years. Basketball numbers have grown at a significant rate. Government needs to continue increasing funding for facility development to meet current and projected growth figures. These facilities must now be designed to support multiple sports and athletes with special needs.', 411785236, 'badminton'),
(9, 9, 'Cricket Ground Victoria', 'Ask any Victorian and theyll be aware of the Melbourne Cricket Grounds status as the home of sport. But it is also steeped in a rich history; established in 1853, less than 20 years after the founding of Melbourne, it is often described as the beating heart of this fantastic city. It has been the home of Australian football since 1859, and was the birthplace of Test cricket in 1877 and one-day international cricket in 1971.', 425678812, 'tennis'),
(10, 5, 'D', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
