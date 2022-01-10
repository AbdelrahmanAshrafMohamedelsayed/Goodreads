-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 06:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `delBook` (IN `isbnN` INT(10))  BEGIN
DELETE FROM book WHERE ISBN=isbnN;
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
('Adham', 'A', 'Abdel-Aal', '123456789A', 'Argantina', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur id quibusdam quos ratione ipsum itaque consequuntur sit doloribus? Earum, sed ipsa beatae eum eius nesciunt nisi quia doloribus facilis officia nobis delectus ipsum, dicta voluptatum labore, necessitatibus sit minus quo. Harum tempora placeat consequuntur ipsam ad, repellendus, suscipit laborum ex distinctio modi similique animi laudantium. Ea officia, eius neque quisquam delectus cupiditate doloribus voluptatum rerum natus cum? Quasi magni iure est id? Libero consequuntur voluptates omnis, odit debitis earum natus atque sequi architecto quas consequatur optio esse commodi sapiente! Facilis, reprehenderit autem perspiciatis totam mollitia debitis aspernatur quidem omnis accusamus.', 'Adham_Ali', 'IMG_٢٠١٩١٢٢٤_٠٠٥٤٠١.jpg', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/'),
('Ahmed', 'A', 'Mahmoud', '1234567A', NULL, NULL, 'Ahmed231', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Aly', 'A', 'Maloul', '1234567A', NULL, NULL, 'Aly', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Eslam', 'A', 'Ebraheem', '1234567A', NULL, NULL, 'eslam_asharf', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Hamdy', 'M', 'Fathi', '1234567A', NULL, NULL, 'hamdy_fathi', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Hassan', 'M', 'Mahmoud', '1234567A', 'Naigeria', 'lContextual classes also work with .list-group-item-action. Note the addition of the hover styles here not present in the previous example. Also supported is the .active state; apply it to indicate an active selection on a contextual list group item.', 'Hassan_Ayman', 'IMG_20191215_232051_268.jpg', '', '', ''),
('Khaled', 'M', 'Mahmoud', '1234567A', NULL, NULL, 'Khaled', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mahmoud', 'W', 'Okasha', '1234567A', NULL, NULL, 'Mahmoud', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mahmoud', 'M', 'Mahmoud', '1234567A', NULL, NULL, 'Mahmoud129', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mohsen ', 'D', 'Derballah', '1234567A', 'Unknown', 'erhfghfdghdg', 'Mohsen', '116562028_1257664504576304_5569883113548775320_o.jpg', '', '', ''),
('Mustafa', 'A', 'Walid', '1234567A', NULL, NULL, 'Mustafa', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mohamed', 'W', 'Bonegah', '1234567A', NULL, NULL, 'NOAH', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Mohamed', 'W', 'Bonegahhhh', '1234567A', NULL, NULL, 'NOAHaaaa', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
('Pong', 'F', 'Micro', '1234567A', NULL, NULL, 'Pong', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL),
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

--
-- Dumping data for table `author_create_signing_event`
--

INSERT INTO `author_create_signing_event` (`Creator`, `bookIsbn`, `SE_ID`, `Clocation`, `Creation_date`) VALUES
('Adham_Ali', 2323, 82, 'Aswan', '2022-01-15'),
('Adham_Ali', 32211, 85, 'Alexandria', '2022-01-23'),
('Adham_Ali', 212198, 86, 'Port Said', '2022-01-19'),
('Adham_Ali', 2323216, 83, 'Alexandria', '2022-01-16'),
('Adham_Ali', 3674367, 74, 'Alexandria', '2022-01-25'),
('Adham_Ali', 3674367, 76, 'Giza', '2022-01-19'),
('Adham_Ali', 3674367, 77, 'Alexandria', '2022-01-24'),
('eslam_asharf', 6574, 78, 'Luxor', '2022-01-21'),
('eslam_asharf', 12987, 79, 'Cairo', '2022-01-23'),
('eslam_asharf', 2213207, 80, 'Aswan', '2022-01-21'),
('eslam_asharf', 22132402, 81, 'Cairo', '2022-01-14'),
('hamdy_fathi', 12432, 95, 'Port Said', '2022-01-23'),
('hamdy_fathi', 242164, 92, 'Alexandria', '2022-01-21'),
('hamdy_fathi', 332432, 93, 'Alexandria', '2022-01-15'),
('hamdy_fathi', 32321435, 94, 'Berlin', '2022-01-27'),
('Walid', 3242, 89, 'Cairo', '2022-01-15'),
('Walid', 4643, 87, 'Alexandria', '2022-01-14'),
('Walid', 6573, 88, 'Giza', '2022-01-21'),
('Walid', 45354, 90, 'Cairo', '2022-01-14'),
('Walid', 324143, 91, 'Port Said', '2022-01-22');

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
(2323, 'Is it over?', 80, 123, 'Adham_Ali', 15, 11, '2022-01-10', 'Who knows? The author doesn\'t.', 232, 'Arabic', 'book-8.png'),
(3242, 'Pangram', 233, 500, 'Walid', 15, 11, '2022-01-10', 'His whole life turned upside down', 232, 'English', 'book-3.png'),
(4643, '2001: A space odyssey', 40, 200, 'Walid', 14, 15, '2022-01-10', 'Exploring Space', 444, 'English', 'book-7.png'),
(6573, 'Lolita', 21, 300, 'Walid', 14, 11, '2022-01-10', 'Died for his principles, but none heard of him', 333, 'English', 'book-10.png'),
(6574, 'A Short Book About Killing', 23, 100, 'eslam_asharf', 14, 15, '2022-01-10', 'Just the last.', 123, 'English', 'ui.jpeg'),
(12432, 'Not Over Till It Is Over', 23, 100, 'hamdy_fathi', 14, 11, '2022-01-10', 'The story of a project submission gone wrong', 232, 'Arabic', 'book-3.png'),
(12987, 'A Confessoin', 50, 100, 'eslam_asharf', 17, 15, '2022-01-10', 'Tolstoy confesses, his art isn\'t art, his religious self is prominent here as he reflects on his life and times', 112, 'Russian', 'uu.jpeg'),
(32211, 'Hunger', 33, 100, 'Adham_Ali', 14, 15, '2022-01-10', 'When a hunger strike starts in an Irish prison, authority has to take action.', 112, 'English', 'book-10.png'),
(45354, 'MARS', 43, 120, 'Walid', 17, 15, '2022-01-10', 'A trip to Mars gone wrong', 423, 'Arabic', 'book-4.png'),
(212198, 'Gone Girl', 23, 100, 'Adham_Ali', 15, 15, '2022-01-10', 'A girl, gone, but her spectre not.', 232, 'English', 'book5.png'),
(221309, 'My Son! My Son! What Have Ye Done?', 20, 100, 'eslam_asharf', 14, 12, '2022-01-10', 'Looking for his child in jungles of Vietnam, but the beauty of nature made him forget his sorrows.', 112, 'English', 'book-9.png'),
(242164, 'The Great Dictator', 43, 100, 'hamdy_fathi', 14, 15, '2022-01-10', 'Sequel to the underknown Hitler book, give it a try first.', 232, 'German', 'book2.jpeg'),
(324143, 'As above so below', 22, 700, 'Walid', 17, 15, '2022-01-10', 'Avant-Garde artist shows his inner self.', 331, 'English', 'book-6.png'),
(332432, 'Casablanca', 32, 100, 'hamdy_fathi', 15, 11, '2022-01-10', 'We will always have Paris.', 112, 'French', 'book-5.png'),
(2213207, 'O Brother! Where Art Thou?', 43, 100, 'eslam_asharf', 14, 12, '2022-01-10', 'Another place, another missing person, but same hero with a knack for losing family members', 123, 'English', 'gg.jpeg'),
(2323216, '12 Years a Slave', 25, 100, 'Adham_Ali', 17, 15, '2022-01-10', 'From a master to master, 12 years in mud.', 400, 'English', 'book-1.png'),
(3674367, 'Okda Nafsya', 7688, 8481, 'Adham_Ali', 15, 12, '2022-01-05', 'The book description is the pitch to the reader about why they should buy your book. When done right, it directly drives book sales. There are so many examples of how book descriptions lead to huge changes in sales. ... So we dove into the book description, figured out the flaws, and completely revamped it.', 123, 'English', 'rr.jpeg'),
(22132402, 'If This Is It, So Be It', 23, 100, 'eslam_asharf', 15, 12, '2022-01-10', 'This time, lost in Africa, a man\'s sanity nearly gone but....', 112, 'English', 'book-9.png'),
(32321435, 'Hitler', 43, 100, 'hamdy_fathi', 17, 15, '2022-01-10', 'From top of the world to ashes, the author takes us deep into the Nazi party and concentration camps.', 232, 'German', 'book2.jpeg'),
(63265456, 'Arwah W Ashbah', 1277, 746, 'hamdy_fathi', 15, 12, '2022-01-05', 'The book description is the pitch to the reader about why they should buy your book. When done right, it directly drives book sales. There are so many examples of how book descriptions lead to huge changes in sales. ... So we dove into the book description, figured out the flaws, and completely revamped it.', 123, 'Arabic', 'lo.jpeg');

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
(63265456, '@adhamali'),
(63265456, '@esso11');

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
('@adhamali', 'mohamed@Walid', 3674367, 33);

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
(15, 'Mahmmoud PUBLISH', 'Bahteem', 'worldmap.png'),
(17, 'Al_Fajr', '27 El-Nahda st.', 'blog-1.jpg'),
(18, 'El-Ahram', 'Downtown', 'blog-1.jpg'),
(19, 'DarELkotob', 'Cairo', 'blog-1.jpg'),
(20, 'El-Gareda', 'Giza', 'blog-1.jpg'),
(21, 'Blaze Vox', 'London', 'blog-1.jpg'),
(22, 'Diversion Books', 'Madrid', 'blog-3.jpg'),
(23, 'Bean', 'Roma', 'blog-3.jpg'),
(24, 'Quirk Books', 'Banha', 'blog-3.jpg'),
(25, 'Turner Publishing Company', 'Milan', 'blog-1.jpg'),
(26, 'Quarto Knows', 'Manchester', 'blog-3.jpg'),
(27, 'Avon Romance', 'Paris', 'blog-3.jpg'),
(28, 'Akhbar', 'Cairo', 'blog-3.jpg'),
(29, 'DarELMaarif', 'Cairo', 'blog-1.jpg'),
(30, 'El-Haqeeqa', 'Giza', 'blog-3.jpg'),
(31, 'People Vox', 'London', 'blog-3.jpg'),
(32, 'Diversion Shows', 'Madrid', 'blog-3.jpg'),
(33, 'Ponging', 'Roma', 'blog-1.jpg'),
(34, 'Quirky Magazines', 'Banha', 'blog-3.jpg'),
(35, 'Heisenberg Publishing Company', 'Milan', 'blog-1.jpg'),
(36, 'Who Knows', 'Manchester', 'blog-3.jpg'),
(37, 'A For Action', 'Paris', 'blog-1.jpg');

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
(3, 'eslam_asharf', '@adhamali'),
(4, 'hamdy_fathi', '@adhamali'),
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
(5, 3674367, '@esso11'),
(4, 63265456, '@esso11');

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
(53, 324143, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(54, 324143, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(36, 3674367, '@adhamali', 'I can\'t delete other reviews, Working well', '2022-01-10'),
(46, 3674367, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(47, 3674367, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(48, 3674367, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(49, 3674367, '@mosalah', '', '2022-01-10'),
(50, 3674367, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(51, 3674367, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(52, 3674367, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(33, 3674367, 'mohamed@Walid', 'WOW', '2022-01-10'),
(34, 3674367, 'mohamed@Walid', 'Hmmm, less than average', '2022-01-10'),
(35, 32321435, '@mohy', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(37, 32321435, '@mohy', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(45, 32321435, '@mosalah', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(38, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(39, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(40, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(41, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(42, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(43, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10'),
(44, 63265456, '@zizo', 'Brené Brown is a research professor at the University of Houston, where she holds the Huffington Foundation-Brené Brown Endowed Chair at the Graduate College of Social Work. She is also a visiting professor in management at the University of Texas at Austin\'s McCombs School of Business. Brown has spent the past two decades studying courage, vulnerability, shame, and empathy and is the author of five #1 New York Times bestsellers: The Gifts of Imperfection, Daring Greatly, Rising Strong, Braving the Wilderness, and Dare to Lead, which is the culmination of a seven-year study on courage and leadership. With Tarana Burke, she co-edited the bestselling anthology You Are Your Best Thing: Vulnerability, Shame Resilience, and the Black Experience. She hosts the Unlocking Us and Dare to Lead podcasts, and her TEDx talk, \"The Power of Vulnerability,\" is one of the top five most-viewed TED talks in the world with more than 50 million views. Her Netflix special, The Call to Courage, is the first ', '2022-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `signing_event`
--

CREATE TABLE `signing_event` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signing_event`
--

INSERT INTO `signing_event` (`ID`, `Title`, `image`) VALUES
(74, 'EventONE', 'blog-2.jpg'),
(76, 'EventSIX', 'successful-book-signing-event.jpg'),
(77, 'EventFOUR', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(78, 'Kill! Kill! Kill!', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(79, 'Let Me Show You', 'successful-book-signing-event.jpg'),
(80, 'Gone But Found Waiting (for you)', 'successful-book-signing-event.jpg'),
(81, 'My Book, My Event', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(82, 'NotOver', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(83, 'Freed!!!!!', 'successful-book-signing-event.jpg'),
(85, 'Thirst', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(86, 'Never Back', 'successful-book-signing-event.jpg'),
(87, 'Kubrick Event', 'successful-book-signing-event.jpg'),
(88, 'Kubrick Revisited', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(89, 'Not Kubrick But Close', 'successful-book-signing-event.jpg'),
(90, 'For Space Fanatics', 'successful-book-signing-event.jpg'),
(91, 'Somewhere, Some Event', 'successful-book-signing-event.jpg'),
(92, 'Chaplin', 'blog-2.jpg'),
(93, 'Bogart', 'successful-book-signing-event.jpg'),
(94, 'Fassbinder', 'book-launch-flyer-template-psd-creative-market-7-.jpg'),
(95, 'Tis Over', 'successful-book-signing-event.jpg');

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
(15, 'El-Nozha', '12 Nasr City', 'blog-1.jpg'),
(17, 'The Secret Garden Bookstore', 'Cairo', 'blog-3.jpg'),
(18, 'Books By the Ocean', 'Cairo', 'blog-1.jpg'),
(19, 'Book Addicts', 'Giza', 'blog-1.jpg'),
(20, 'Books-R-Us', 'Fayoum', 'blog-1.jpg'),
(21, 'Sunshine Book Shop', 'New York', 'blog-1.jpg'),
(22, 'Rain or Shine Books', 'Luxor', 'blog-1.jpg'),
(23, 'The Book Train', 'Aswan', 'blog-1.jpg'),
(24, 'Reading Rhonda\'s Bookstore', 'Istanbul', 'blog-1.jpg'),
(25, 'Paging All Readers!', 'Manchester', 'blog-1.jpg'),
(26, 'Peepers and Pages Bookstore', 'Manchester', 'blog-1.jpg'),
(27, 'Peepers Books', 'Manchester', 'blog-1.jpg'),
(28, 'We Love Books!', 'Manchester', 'blog-1.jpg'),
(29, 'Imagine Bookstore', 'Manchester', 'blog-1.jpg'),
(30, 'Books By the Ocean-2', 'Cairo', 'blog-1.jpg'),
(31, 'Book Addicts-2', 'Giza', 'blog-1.jpg'),
(32, 'Books-R-Us-2', 'Fayoum', 'blog-1.jpg'),
(33, 'Sunshine Book Shop-2', 'New York', 'blog-1.jpg');

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
('Adham', 'A', 'Ali', '1234567A', '@adhamali', 'IMG_20191024_133534_828.jpg', '', '', '', 'Chinese'),
('Adham', 'm', 'Hazem', '1234567A', '@adhamaliii', '../images/undraw_male_avatar_323b.svg', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/', 'Egyptian'),
('Ali', 'A', 'Sayed', '1234567A', '@aliaa', '../images/undraw_male_avatar_323b.svg	', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/', 'Brazilian'),
('Eduardo', 'V', 'Mendy', '3819yuhhfskj', '@bejamin', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Ashraf', '1234567A', '@body', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Patric', 'K', 'Carlos', '873628hjKJS', '@carlosss', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Mohamed', 'M', 'Ali', '3276267A', '@dokkaa', 'دراسة الجدوى الفنية للمشروع - YouTube - Google Chrome 12_7_2021 7_37_58 PM.png', '', '', '', 'Unknown'),
('Eslam', 'A', 'Ebraheem', '123456789A', '@esso11', 'IMG_20191024_133534_828.jpg', '', '', '', 'Unknown'),
('Fahab', 'U', 'Monir', '1234567A', '@far', '../images/undraw_male_avatar_323b.svg	', NULL, NULL, NULL, NULL),
('Abdo', 'B', 'Kolibaly', '12345675iJHF', '@fasido', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Fathi', 'K', 'El-Sammak', '1234567A', '@fathi', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Sayed', '1234567A', '@gggg', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Hamdy', '1234567A', '@hamdy', '../images/pic-6.png', '', '', '', 'Unknown'),
('Hamza', 'A', 'Sayed', '1234567A', '@hamza', '../images/undraw_male_avatar_323b.svg	', NULL, NULL, NULL, NULL),
('Abdelarhman', 'M', 'Mohamed', '1234567A', '@hamzaa', '../images/undraw_male_avatar_323b.svg	', 'https://www.facebook.com/profile.php?id=100009982989915', 'https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09', 'https://www.linkedin.com/feed/', 'Amarican'),
('Muhammed', 'A', 'Osman', '12345678A', '@mohamed', '../images/undraw_male_avatar_323b.svg	', NULL, NULL, NULL, NULL),
('Mohy', 'M', 'El-Sharkawy', '1234567A', '@mohy', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Mohamed', 'M', 'Salah', '1234567A', '@mosalah', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Simon', 'N', 'Fakhry', '1234567A', '@sola', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Tamem', 'A', 'Younis', '1234567A', '@tamem', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL),
('Ahmed', 'S', 'Zizo', '1234567Aa', '@zizo', 'pic-1.png', '', '', '', 'Unknown'),
('mohamed', 'W', 'Fathy', '00998877M', 'mohamed@Walid', '../images/undraw_male_avatar_323b.svg', NULL, NULL, NULL, NULL);

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
-- AUTO_INCREMENT for table `publishing_house`
--
ALTER TABLE `publishing_house`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `signing_event`
--
ALTER TABLE `signing_event`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
