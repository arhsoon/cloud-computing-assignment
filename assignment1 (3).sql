-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 09:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `subtotal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `price` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start`, `end`, `price`, `status`) VALUES
(2, 'Tech Conference', 'Learn about the latest technologies and trends.', '2023-10-10 09:00:00', '2023-10-12 18:00:00', '200.00', 'upcoming'),
(3, 'Charity Walk', 'Help raise money for a good cause.', '2023-07-17 10:00:00', '2023-07-17 12:00:00', 'Free', 'completed'),
(4, 'Food Festival', 'Come and enjoy a variety of delicious cuisines.', '2023-09-22 11:00:00', '2023-09-24 22:00:00', '30.00', 'ongoing'),
(5, 'Art Exhibition', 'View some of the most amazing art pieces.', '2023-06-14 10:00:00', '2023-06-17 20:00:00', 'Free', 'completed'),
(6, 'Book Fair', 'Explore a wide range of books and literature.', '2023-08-25 09:00:00', '2023-08-27 18:00:00', '10.00', 'upcoming'),
(7, 'Science Expo', 'Discover new scientific breakthroughs.', '2023-11-05 10:00:00', '2023-11-07 17:00:00', '50.00', 'upcoming'),
(8, 'Film Festival', 'Experience the best of world cinema.', '2023-09-14 12:00:00', '2023-09-17 23:59:59', '20.00', 'ongoing'),
(9, 'Gaming Tournament', 'Compete with other gamers and win exciting prizes.', '2023-07-08 16:00:00', '2023-07-08 20:00:00', '5.00', 'completed'),
(10, 'Fashion Show', 'Be dazzled by the latest fashion trends.', '2023-10-28 19:00:00', '2023-10-28 22:00:00', '25.00', 'upcoming'),
(11, 'Photography Workshop', 'Learn the art of photography from the experts.', '2023-11-15 10:00:00', '2023-11-15 13:00:00', '15.00', 'upcoming'),
(12, 'Wine Tasting', 'Sample the finest wines from around the world.', '2023-08-12 18:00:00', '2023-08-12 21:00:00', '40.00', 'ongoing'),
(13, 'Fitness Expo', 'Get fit and healthy with the latest fitness trends.', '2023-07-30 09:00:00', '2023-07-31 17:00:00', 'Free', 'completed'),
(14, 'Automotive Show', 'See the latest cars and vehicles on display.', '2023-09-30 11:00:00', '2023-10-01 20:00:00', '15.00', 'upcoming'),
(15, 'Gardening Workshop', 'Learn how to grow your own plants and vegetables.', '2023-06-25 14:00:00', '2023-06-25 16:00:00', 'Free', 'upcoming'),
(16, 'Comedy Show', 'Laugh out loud with some of the best comedians in town.', '2023-08-12 20:00:00', '2023-08-12 22:00:00', '20.00', 'upcoming'),
(17, 'Film Festival', 'Watch a selection of the best films from around the world.', '2023-09-15 10:00:00', '2023-09-19 22:00:00', '40.00', 'upcoming'),
(18, 'Fashion Show', 'See the latest trends and styles on the runway.', '2023-07-30 19:00:00', '2023-07-30 21:00:00', '50.00', 'upcoming'),
(19, 'Wine Tasting', 'Sample some of the finest wines from local wineries.', '2023-08-08 17:00:00', '2023-08-08 19:00:00', '25.00', 'upcoming'),
(20, 'Basketball Tournament', 'Compete against other teams and win prizes.', '2023-06-19 08:00:00', '2023-06-19 16:00:00', '100.00', 'completed'),
(21, 'Marathon Race', 'Run a full or half marathon and challenge yourself.', '2023-09-03 06:00:00', '2023-09-03 12:00:00', '75.00', 'ongoing'),
(22, 'Book Fair', 'Discover new books and meet your favorite authors.', '2023-07-08 10:00:00', '2023-07-12 20:00:00', 'Free', 'ongoing'),
(23, 'Carnival', 'Enjoy a day of rides, games, and entertainment for the whole family.', '2023-08-26 12:00:00', '2023-08-28 23:59:59', '35.00', 'ongoing'),
(24, 'Fitness Class', 'Join a fun and challenging workout with a certified instructor.', '2023-06-29 18:00:00', '2023-06-29 19:00:00', '10.00', 'completed'),
(25, 'Summer Camp', 'A fun-filled summer camp for kids of all ages.', '2023-07-10 09:00:00', '2023-07-15 18:00:00', '150.00', 'upcoming'),
(26, 'Fitness Challenge', 'Join us in our fitness challenge and win exciting prizes.', '2023-09-01 07:00:00', '2023-09-30 19:00:00', 'Free', 'upcoming'),
(27, 'Photography Workshop', 'Learn photography skills from experts in the field.', '2023-06-22 10:00:00', '2023-06-24 17:00:00', '75.00', 'completed'),
(28, 'Film Festival', 'Watch some of the most iconic films of all time.', '2023-08-25 12:00:00', '2023-08-28 23:59:59', '40.00', 'ongoing'),
(29, 'Business Conference', 'Network with professionals and learn business strategies.', '2023-10-18 09:00:00', '2023-10-20 18:00:00', '250.00', 'upcoming'),
(30, 'Fashion Show', 'Experience the latest fashion trends and styles.', '2023-11-11 14:00:00', '2023-11-11 22:00:00', '50.00', 'upcoming'),
(31, 'Cooking Competition', 'Show off your culinary skills and win prizes.', '2023-08-12 10:00:00', '2023-08-12 14:00:00', 'Free', 'completed'),
(32, 'Art Workshop', 'Learn new techniques and create your own art masterpiece.', '2023-07-29 13:00:00', '2023-07-31 16:00:00', '80.00', 'ongoing'),
(33, 'Technology Expo', 'See the latest technology products and gadgets.', '2023-10-05 10:00:00', '2023-10-07 17:00:00', '100.00', 'upcoming'),
(35, 'banana', 'get you family some bananas', '2023-05-24 00:00:00', '2023-06-10 00:00:00', '20.00', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `studentemail` varchar(40) NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`studentemail`, `label`) VALUES
('re@g.com', ''),
('re@g.com', ''),
('re@g.com', 'hi'),
('re@g.com', ' '),
('re@g.com', 'dn'),
('joelwsy-pm22@student.tarc.edu.my', 'test'),
('joelwsy-pm22@student.tarc.edu.my', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `studentemail` varchar(40) NOT NULL,
  `studentemailre` varchar(40) NOT NULL,
  `status` enum('active','archive') NOT NULL DEFAULT 'active',
  `label` varchar(255) NOT NULL,
  `msgid` int(5) NOT NULL,
  `msgtitle` varchar(50) NOT NULL,
  `msgcontent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`studentemail`, `studentemailre`, `status`, `label`, `msgid`, `msgtitle`, `msgcontent`) VALUES
('re@g.com', 'joelwsy-pm22@student.tarc.edu.my', 'active', '', 1, 'testing', 'tetsing<br> Re: re@g.com<br>test'),
('re@g.com', 'joelwsy-pm22@student.tarc.edu.my', 'active', '', 3, 'not', 'no<br> Re: <br>no<br> Re: <br>ggg'),
('joelwsy-pm22@student.tarc.edu.my', 'joelwsy-pm22@student.tarc.edu.my', 'active', 'test', 4, 'g', 'g<br> Re: <br>gg<br> Re: <br>ggg<br> Re: joelwsy-pm22@student.tarc.edu.my<br>gggg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(10) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `studentemail` varchar(40) NOT NULL,
  `studentpass` varchar(16) NOT NULL,
  `studentgender` varchar(1) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user',
  `studentcourse` varchar(20) NOT NULL,
  `studentyear` varchar(5) NOT NULL,
  `studentsem` varchar(10) NOT NULL,
  `sposition` varchar(20) NOT NULL DEFAULT 'Member',
  `pfp` varchar(255) NOT NULL DEFAULT 'profile.jpg',
  `aboutme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentemail`, `studentpass`, `studentgender`, `role`, `studentcourse`, `studentyear`, `studentsem`, `sposition`, `pfp`, `aboutme`) VALUES
('22PMD01000', 'JJ WW', 'helldoo@g.com', 'Qwerty12345@', 'M', 'user', 'DPR', '2', '2', 'Member', 'profile.jpg', ''),
('22PMD01919', 't t', 'ten@srctt.com', 'Qwerty1234!', 'M', 'user', 'RQS', '2', '1', 'Member', 'profile.jpg', ''),
('22PMD02000', 'Joel Wong', 'joelwsy-pm22@student.tarc.edu.my', '123', 'M', 'admin', 'DIT', '1', '1', 'Committee', 'images.jpeg', 'Doing my best'),
('22PMD02001', 'Tan Chan Zhen', 'tcz@src.com', 'Qwerty123!', 'M', 'user', 'DCS', '2', '2', 'President', 'profile.jpg', 'kek'),
('22PMD02002', 'Jia Jun', 'jiajun@tarc.edu.my', '123', 'M', 'user', 'DAC', '2', '2', 'Vice President', 'profile.jpg', 'Vice President of this very cool website!!'),
('22PMD02003', 'Abu Baker', 'abu@tarc.edu.my', '123', 'M', 'user', 'DBA', '2', '3', 'Secretary', 'images (2).jpeg', 'Wo meng ti~~ Wo meng ti~'),
('22PMD02004', 'Alexa', 'alexa@tarc.edu.my', '123', 'F', 'user', 'DCS', '1', '1', 'Member', 'images (4).jpeg', 'Lalalalalala'),
('22PMD02005', 'Adam', 'adam@src.com', '123', 'M', 'user', 'DPR', '2', '2', 'Member', 'profile.jpg', ''),
('22PMD02123', 'q q', 'abc@g.com', 'Qwerty123!', 'M', 'user', 'RQS', '1', '2', 'Member', 'profile.jpg', ''),
('22PMD02191', 'jinn', 'jin@tarc.edu.my', '321', 'M', 'user', 'RIS', '1', '1', 'Member', 'profile.jpg', ''),
('22PMD08796', 'Wong', 'yeongcz@src.com', '123', 'M', 'user', 'RIT', '1', '1', 'Member', 'profile.jpg', ''),
('22PMD09191', 's s', 'ten@ssssrc.com', 'Qwerty123!', 'M', 'user', 'DPR', '3', '1', 'Member', 'profile.jpg', ''),
('22PMD89076', 'r t', 'tcz@srsc.com', 'Qwerty123!', 'F', 'user', 'RPR', '3', '1', 'Member', 'profile.jpg', ''),
('22PMD99999', 'w w', 'hellqoo@g.com', 'Qwerty123!', 'F', 'user', 'RBC', '2', '2', 'Member', 'profile.jpg', ''),
('23PMD09212', 'User Ten', 'te11n@src.com', 'Qwerty123!', 'F', 'user', 'RBC', '3', '1', 'Member', 'profile.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(11) NOT NULL,
  `Buyer` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` char(50) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Date_Created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `Buyer`, `Gender`, `Email`, `ContactNo`, `Total`, `Date_Created`) VALUES
(3, 'YEAP SHU CHYI', 'F', 'yeapsc-pm22@student.tarc.edu.my', 1158975974, 350, '2023-05-16 22:59:31'),
(4, 'Toh Yun Ning', 'F', 'tohyn-pm22@student.tarc.edu', 1158975974, 200, '2023-05-16 23:06:20'),
(7, 'Harmonie Fadell', 'F', 'hfadell1@tripadvisor.com', 123363324, 20, '2023-05-16 23:08:56'),
(8, 'Frans Oertzen', 'M', 'foertzen3@bravesites.com', 164489985, 15, '2023-05-16 23:09:43'),
(9, 'Pearl Gantlett', 'F', 'pgantlett4@instagram.com', 136695698, 40, '2023-05-16 23:11:16'),
(11, 'Consalve Filippyev', 'M', 'cfilippyev6@cbsnews.com', 115789654, 35, '2023-05-16 23:12:46'),
(12, 'Bee Witts', 'F', 'bwitts7@google.com.au', 125478975, 150, '2023-05-16 23:13:38'),
(13, 'Sigismondo Skelcher', 'M', 'sskelcher8@cbc.ca', 164105413, 50, '2023-05-16 23:14:03'),
(14, 'Donnie Inman', 'M', 'dinman9@epa.gov', 198745478, 100, '2023-05-16 23:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_item`
--

CREATE TABLE `transaction_item` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_item`
--

INSERT INTO `transaction_item` (`id`, `transaction_id`, `event_id`, `quantity`, `price`, `subtotal`) VALUES
(5, 2, 4, '1', '30.00', '30.00'),
(4, 2, 1, '3', '50.00', '150'),
(6, 2, 3, '1', 'Free', 'Free'),
(7, 3, 1, '3', '50.00', '150'),
(8, 3, 2, '1', '200.00', '200.00'),
(9, 4, 2, '1', '200.00', '200.00'),
(10, 5, 5, '1', 'Free', 'Free'),
(11, 7, 16, '1', '20.00', '20.00'),
(12, 8, 26, '1', 'Free', 'Free'),
(13, 8, 14, '1', '15.00', '15.00'),
(14, 9, 12, '1', '40.00', '40.00'),
(15, 10, 23, '1', '35.00', '35.00'),
(16, 11, 23, '1', '35.00', '35.00'),
(17, 12, 25, '1', '150.00', '150.00'),
(18, 13, 18, '1', '50.00', '50.00'),
(19, 14, 20, '1', '100.00', '100.00'),
(20, 15, 3, '3', 'Free', 'Free'),
(21, 15, 2, '8', '200.00', '1600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`,`Buyer`);

--
-- Indexes for table `transaction_item`
--
ALTER TABLE `transaction_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction_item`
--
ALTER TABLE `transaction_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
