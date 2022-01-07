-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 02:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodreads`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delBook` (IN `isbn` INT(10))  BEGIN
DELETE FROM book WHERE ISBN=isbn;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEvent` (IN `eventID` INT)  BEGIN
        DELETE FROM signing_event
        where ID = eventID;
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletepublishhouse` (IN `publishhouse_id` INT(10))  BEGIN   
           DELETE FROM publishing_house WHERE ID = publishhouse_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteStore` (IN `store_id` INT(10))  BEGIN   
           DELETE FROM store WHERE ID = store_id;  
           END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAuthorDataForBook` (`AuthorHandle` VARCHAR(30))  BEGIN
SELECT Fname,Minit,Lname FROM author WHERE Handle=AuthorHandle;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetRating` (IN `bookIS` INT(10))  BEGIN
SELECT sum(RatingValue)/count(RatingValue) rating FROM rate_book WHERE BookISBN=bookIS;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllAuthors` ()  BEGIN
SELECT Fname,ProfileImage,Minit,Lname,facebook,twitter,linkedin,handle FROM author;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Fname` varchar(100) NOT NULL,
  `Minit` char(1) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Bio` varchar(1000) DEFAULT NULL,
  `Handle` varchar(30) NOT NULL,
  `ProfileImage` varchar(100) NOT NULL DEFAULT '../images/undraw_male_avatar_323b.svg',
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Fname`, `Minit`, `Lname`, `Password`, `Nationality`, `Bio`, `Handle`, `ProfileImage`, `facebook`, `twitter`, `linkedin`) VALUES
('Adham', 'A', 'Abdel-Aal', '123456789A', 'Argantina', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id quibusdam quos ratione ipsum itaque consequuntur sit doloribus? Earum, sed ipsa beatae eum eius nesciunt nisi quia doloribus facilis officia nobis delectus ipsum, dicta voluptatum labore, necessitatibus sit minus quo. Harum tempora placeat consequuntur ipsam ad, repellendus, suscipit laborum ex distinctio modi similique animi laudantium. Ea officia, eius neque quisquam delectus cupiditate doloribus voluptatum rerum natus cum? Quasi magni iure est id? Libero consequuntur voluptates omnis, odit debitis earum natus atque sequi architecto quas consequatur optio esse commodi sapiente! Facilis, reprehenderit autem perspiciatis totam mollitia debitis aspernatur quidem omnis accusamus.', 'Adham_Ali', 'IMG_20200331_215814_726.jpg', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/'),
('Eslam', 'A', 'Ebraheem', '1234567A', NULL, NULL, 'eslam_asharf', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Hamdy', 'M', 'Fathi', '1234567A', NULL, NULL, 'hamdy_fathi', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Hassan', 'M', 'Mahmoud', '1234567A', 'Naigeria', 'lContextual classes also work with .list-group-item-action. Note the addition of the hover styles here not present in the previous example. Also supported is the .active state; apply it to indicate an active selection on a contextual list group item.', 'Hassan_Ayman', 'IMG_20191215_232051_268.jpg', '', '', ''),
('Mohsen ', 'D', 'Derballah', '1234567A', 'Unknown', 'erhfghfdghdg', 'Mohsen', '116562028_1257664504576304_5569883113548775320_o.jpg', '', '', ''),
('Mohamed', 'W', 'Bonegah', '1234567A', NULL, NULL, 'NOAH', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mohamed', 'W', 'Bonegahhhh', '1234567A', NULL, NULL, 'NOAHaaaa', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Sohaila', 'M', 'Elnagy', '1234567A', 'Sweden', NULL, 'sooo', '../images/pic-2.png', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/'),
('Adham', 'M', 'Hameed', '1234567A', NULL, NULL, 'unkown_one', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Adham', 'M', 'Hameed', '1234567A', NULL, NULL, 'unkown_onee', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Adham', 'M', 'Hameed', '1234567A', NULL, NULL, 'unkown_oneee', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mohamed', 'W', 'Walid', '12345678M', 'Russian', NULL, 'Walid', '../images/tet.jpg', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/'),
('Mohamed', 'W', 'Walid', '1234567A', NULL, NULL, 'Walid_Moh', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `author_create_signing_event`
--

CREATE TABLE `author_create_signing_event` (
  `Creator` varchar(30) NOT NULL,
  `bookIsbn` int(10) UNSIGNED NOT NULL,
  `SE_ID` int(10) UNSIGNED NOT NULL,
  `Clocation` varchar(100) DEFAULT NULL,
  `Creation_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(10) UNSIGNED DEFAULT 0,
  `numberOfCopies` int(10) UNSIGNED DEFAULT 0,
  `BookAuthor` varchar(30) DEFAULT NULL,
  `BookPH` int(10) UNSIGNED DEFAULT NULL,
  `BookStore` int(10) UNSIGNED DEFAULT NULL,
  `Pubdate` date DEFAULT current_timestamp(),
  `description` varchar(500) DEFAULT NULL,
  `numberOfPages` int(10) UNSIGNED DEFAULT NULL,
  `bookLanguage` varchar(30) DEFAULT NULL,
  `bookImage` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `price`, `numberOfCopies`, `BookAuthor`, `BookPH`, `BookStore`, `Pubdate`, `description`, `numberOfPages`, `bookLanguage`, `bookImage`) VALUES
(8788, 'Orabi', 23, 295, 'Mohsen', 15, 15, '2022-01-07', 'Ahmed ʻUrabi, also known as Ahmed Ourabi or Orabi Pasha, also spelled Arabi or Araby Pasha, was an an officer of the Egyptian army.', 633, 'Arabic', 'ee.jpeg'),
(36612, 'Hitler', 83, 82378, 'Mohsen', 14, 12, '2022-01-07', 'Adolf Hitler was an Austrian-born German politician who was the dictator of Germany from 1933 until his death in 1945. He rose to power as the leader of the Nazi Party, becoming the chancellor in 1933 and then assuming the title of Führer und Reichskanzler in 1934', 4378, 'German', 'book2.jpeg'),
(3674367, 'Okda Nafsya', 7688, 8482, 'Adham_Ali', 15, 12, '2022-01-05', 'The book description is the pitch to the reader about why they should buy your book. When done right, it directly drives book sales. There are so many examples of how book descriptions lead to huge changes in sales. ... So we dove into the book description, figured out the flaws, and completely revamped it.', 123, 'English', 'rr.jpeg'),
(63265456, 'Arwah W Ashbah', 1277, 748, 'hamdy_fathi', 15, 12, '2022-01-05', 'The book description is the pitch to the reader about why they should buy your book. When done right, it directly drives book sales. There are so many examples of how book descriptions lead to huge changes in sales. ... So we dove into the book description, figured out the flaws, and completely revamped it.', 123, 'Arabic', 'lo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `BookISBN` int(10) UNSIGNED NOT NULL,
  `buyer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`BookISBN`, `buyer`) VALUES
(3674367, '@dokkaa'),
(3674367, '@esso11'),
(63265456, '@adhamali');

-- --------------------------------------------------------

--
-- Table structure for table `dislike_reaction`
--

CREATE TABLE `dislike_reaction` (
  `Reactor` varchar(100) NOT NULL,
  `Reviewer` varchar(100) NOT NULL,
  `bookIsbn` int(10) UNSIGNED NOT NULL,
  `ReviewID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dislike_reaction`
--

INSERT INTO `dislike_reaction` (`Reactor`, `Reviewer`, `bookIsbn`, `ReviewID`) VALUES
('@adhamali', '@esso11', 63265456, 21),
('@adhamaliii', '@esso11', 63265456, 21);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 'eee.png', '2022-01-07 14:12:35', '1'),
(2, 'IMG_20190910_052330_537.jpg', '2022-01-07 14:12:55', '1'),
(3, 'IMG_20200418_230205_415.jpg', '2022-01-07 14:16:19', '1'),
(4, 'ee.jpeg', '2022-01-07 14:22:05', '1'),
(5, 'book2.jpeg', '2022-01-07 14:53:28', '1'),
(6, '116562028_1257664504576304_5569883113548775320_o.jpg', '2022-01-07 15:13:58', '1'),
(7, '116562028_1257664504576304_5569883113548775320_o.jpg', '2022-01-07 15:14:21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `like_reaction`
--

CREATE TABLE `like_reaction` (
  `Reactor` varchar(100) NOT NULL,
  `Reviewer` varchar(100) NOT NULL,
  `bookIsbn` int(10) UNSIGNED NOT NULL,
  `ReviewID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_reaction`
--

INSERT INTO `like_reaction` (`Reactor`, `Reviewer`, `bookIsbn`, `ReviewID`) VALUES
('@adhamali', '@adhamaliii', 3674367, 23);

-- --------------------------------------------------------

--
-- Table structure for table `publishing_house`
--

CREATE TABLE `publishing_house` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Publishing_house_Image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishing_house`
--

INSERT INTO `publishing_house` (`ID`, `NAME`, `Address`, `Publishing_house_Image`) VALUES
(14, 'Moscco-ELgded', 'Helmya', 'blog-4.jpg'),
(15, 'Mahmmoud PUBLISH', 'Bahteem', 'worldmap.png');

-- --------------------------------------------------------

--
-- Table structure for table `rate_author`
--

CREATE TABLE `rate_author` (
  `RatingValue` int(10) UNSIGNED DEFAULT 0,
  `rated` varchar(100) NOT NULL,
  `rater` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_author`
--

INSERT INTO `rate_author` (`RatingValue`, `rated`, `rater`) VALUES
(5, 'Adham_Ali', '@adhamali'),
(4, 'Adham_Ali', '@dokkaa'),
(4, 'Adham_Ali', '@esso11'),
(5, 'Adham_Ali', '@far'),
(5, 'Adham_Ali', '@hamzaa'),
(5, 'Walid', '@adhamaliii'),
(3, 'Walid', '@esso11');

-- --------------------------------------------------------

--
-- Table structure for table `rate_book`
--

CREATE TABLE `rate_book` (
  `RatingValue` int(10) UNSIGNED DEFAULT 0,
  `BookISBN` int(10) UNSIGNED NOT NULL,
  `rater` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_book`
--

INSERT INTO `rate_book` (`RatingValue`, `BookISBN`, `rater`) VALUES
(1, 3674367, '@adhamali'),
(5, 3674367, '@adhamaliii'),
(1, 3674367, '@esso11'),
(3, 63265456, '@esso11');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(10) UNSIGNED NOT NULL,
  `BOOKISBN` int(10) UNSIGNED NOT NULL,
  `URName` varchar(100) NOT NULL,
  `ReviewText` varchar(1000) DEFAULT NULL,
  `DateOfReview` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `BOOKISBN`, `URName`, `ReviewText`, `DateOfReview`) VALUES
(23, 3674367, '@adhamaliii', 'good job', '2022-01-05'),
(21, 63265456, '@esso11', 'ana bagarab', '2022-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `signing_event`
--

CREATE TABLE `signing_event` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `StoreImage` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`ID`, `NAME`, `Location`, `StoreImage`) VALUES
(11, 'Layla', '22 Tolba hussin st', 'blog-1.jpg'),
(12, 'Sorya', '12 Red corner', 'blog-3.jpg'),
(15, 'El-Nozha', '12 Nasr City', 'blog-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Fname` varchar(100) NOT NULL,
  `Minit` char(1) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL DEFAULT '../images/undraw_male_avatar_323b.svg',
  `facebookacc` varchar(100) DEFAULT NULL,
  `twitteracc` varchar(100) DEFAULT NULL,
  `linkedinacc` varchar(100) DEFAULT NULL,
  `Nationality` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Fname`, `Minit`, `Lname`, `Password`, `Username`, `Image`, `facebookacc`, `twitteracc`, `linkedinacc`, `Nationality`) VALUES
('Adham', 'A', 'Ali', '1234567A', '@adhamali', 'IMG_20191024_133534_828.jpg', '', '', '', 'Unknown'),
('Adham', 'm', 'Hazem', '1234567A', '@adhamaliii', '../images/undraw_male_avatar_323b.svg', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/', 'Egyptian'),
('Ali', 'A', 'Sayed', '1234567A', '@aliaa', '../images/undraw_male_avatar_323b.svg	', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/', 'Brazilian'),
('Mohamed', 'M', 'Ali', '3276267A', '@dokkaa', 'دراسة الجدوى الفنية للمشروع - YouTube - Google Chrome 12_7_2021 7_37_58 PM.png', '', '', '', 'Unknown'),
('Eslam', 'A', 'Ebraheem', '123456789A', '@esso11', 'IMG_20191024_133534_828.jpg', '', '', '', 'Unknown'),
('Fahab', 'U', 'Monir', '1234567A', '@far', '../images/undraw_male_avatar_323b.svg	', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Sayed', '1234567A', '@gggg', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Hamdy', '1234567A', '@hamdy', '../images/pic-6.png', '', '', '', 'Unknown'),
('Hamza', 'A', 'Sayed', '1234567A', '@hamza', '../images/undraw_male_avatar_323b.svg	', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Mohamed', '1234567A', '@hamzaa', '../images/undraw_male_avatar_323b.svg	', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/', 'Amarican'),
('Muhammed', 'A', 'Osman', '12345678A', '@mohamed', '../images/undraw_male_avatar_323b.svg	', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Handle`);

--
-- Indexes for table `author_create_signing_event`
--
ALTER TABLE `author_create_signing_event`
  ADD PRIMARY KEY (`Creator`,`bookIsbn`,`SE_ID`),
  ADD KEY `bookIsbn` (`bookIsbn`),
  ADD KEY `SE_ID` (`SE_ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `book_ibfk_1` (`BookAuthor`),
  ADD KEY `book_ibfk_2` (`BookStore`),
  ADD KEY `book_ibfk_3` (`BookPH`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`BookISBN`,`buyer`),
  ADD KEY `buyer` (`buyer`);

--
-- Indexes for table `dislike_reaction`
--
ALTER TABLE `dislike_reaction`
  ADD PRIMARY KEY (`Reactor`,`Reviewer`,`bookIsbn`,`ReviewID`),
  ADD KEY `bookIsbn` (`bookIsbn`,`Reviewer`,`ReviewID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_reaction`
--
ALTER TABLE `like_reaction`
  ADD PRIMARY KEY (`Reactor`,`Reviewer`,`bookIsbn`,`ReviewID`),
  ADD KEY `bookIsbn` (`bookIsbn`,`Reviewer`,`ReviewID`);

--
-- Indexes for table `publishing_house`
--
ALTER TABLE `publishing_house`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`);

--
-- Indexes for table `rate_author`
--
ALTER TABLE `rate_author`
  ADD PRIMARY KEY (`rated`,`rater`),
  ADD KEY `rate_author_ibfk_2` (`rater`);

--
-- Indexes for table `rate_book`
--
ALTER TABLE `rate_book`
  ADD PRIMARY KEY (`BookISBN`,`rater`),
  ADD KEY `rate_book_ibfk_2` (`rater`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`BOOKISBN`,`URName`,`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `review_ibfk_2` (`URName`);

--
-- Indexes for table `signing_event`
--
ALTER TABLE `signing_event`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `publishing_house`
--
ALTER TABLE `publishing_house`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `signing_event`
--
ALTER TABLE `signing_event`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_create_signing_event`
--
ALTER TABLE `author_create_signing_event`
  ADD CONSTRAINT `IFK` FOREIGN KEY (`SE_ID`) REFERENCES `signing_event` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `author_create_signing_event_ibfk_1` FOREIGN KEY (`Creator`) REFERENCES `author` (`Handle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ifk2` FOREIGN KEY (`bookIsbn`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`BookAuthor`) REFERENCES `author` (`Handle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`BookStore`) REFERENCES `store` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`BookPH`) REFERENCES `publishing_house` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`BookISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`buyer`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dislike_reaction`
--
ALTER TABLE `dislike_reaction`
  ADD CONSTRAINT `dislike_reaction_ibfk_1` FOREIGN KEY (`Reactor`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dislike_reaction_ibfk_2` FOREIGN KEY (`bookIsbn`,`Reviewer`,`ReviewID`) REFERENCES `review` (`BOOKISBN`, `URName`, `ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_reaction`
--
ALTER TABLE `like_reaction`
  ADD CONSTRAINT `like_reaction_ibfk_1` FOREIGN KEY (`Reactor`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_reaction_ibfk_2` FOREIGN KEY (`bookIsbn`,`Reviewer`,`ReviewID`) REFERENCES `review` (`BOOKISBN`, `URName`, `ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_author`
--
ALTER TABLE `rate_author`
  ADD CONSTRAINT `rate_author_ibfk_1` FOREIGN KEY (`rated`) REFERENCES `author` (`Handle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_author_ibfk_2` FOREIGN KEY (`rater`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_book`
--
ALTER TABLE `rate_book`
  ADD CONSTRAINT `rate_book_ibfk_1` FOREIGN KEY (`BookISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_book_ibfk_2` FOREIGN KEY (`rater`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`BOOKISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`URName`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
