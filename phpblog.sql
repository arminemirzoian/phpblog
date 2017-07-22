-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 03:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `meta_d`, `meta_k`, `text`) VALUES
(1, 'HTML coding', 'coding in a language', 'language, HTML', '<p>In this lesson you will find interesting information about one of the easiest programming languages - HTML</p>'),
(2, 'PHP ideas', 'Notes about PHP', 'php', '<p>In this lesson you will find very interesting information about one of the most creative and mysterious programming language - PHP</p>'),
(3, 'Photoshop', 'Information about Photoshop', 'Photoshop', '<p>In this lesson you will find interesting information about the best graphical editor - Photoshop</p>');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `post` int(5) NOT NULL,
  `author` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post`, `author`, `text`, `date`) VALUES
(1, 2, 'Sargis Gevorgyan', 'Հոդվածը շատ օգտակար էր, շնորհակալություն տեղեկատվության համար:', '2017-07-18'),
(2, 2, 'Armen Sargsyan', 'I can\'t implement it in my computer, why?', '2017-07-18'),
(11, 1, 'Michael', 'A great job, congrats!!!', '2017-07-18'),
(12, 1, 'j', 'dhdhd', '2017-07-19'),
(13, 1, 'dthm', 'Hello', '2017-07-19'),
(14, 1, 'dthm', 'Hello', '2017-07-19'),
(15, 1, 'h', 'h', '2017-07-19'),
(16, 1, 'h', 'h', '2017-07-19'),
(17, 1, 'h', 'h', '2017-07-19'),
(18, 1, 'Armine', 'FFFF', '2017-07-19'),
(19, 1, 'ddd', 'ddd', '2017-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `comments_setting`
--

CREATE TABLE `comments_setting` (
  `id` int(1) NOT NULL,
  `img` varchar(255) NOT NULL,
  `sum` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_setting`
--

INSERT INTO `comments_setting` (`id`, `img`, `sum`) VALUES
(1, 'img/sum.gif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(5) NOT NULL,
  `cat` int(1) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `view` int(7) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `mini_img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `secret` int(1) DEFAULT '0',
  `rating` int(10) NOT NULL DEFAULT '5',
  `q_vote` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `cat`, `meta_d`, `meta_k`, `description`, `text`, `view`, `author`, `date`, `mini_img`, `title`, `secret`, `rating`, `q_vote`) VALUES
(2, 1, 'HTML 2', 'HTML 2', '<p>Постраничная навигация</p>\r\n\r\n<p>Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему.\r\nИтак, что нам требуется для реализации постраничной навигации? Для примера возьмем гостевую книгу, содержащую несколько сотен сообщений, в которой требуется выводить на страницу Х сообщений.\r\nРассмотрим задачу более конкретно. Сообщения пользователей хранятся в базе данных post со следующей структурой:</p>', '<p>Постраничная навигация</p>\r\n\r\n<p>Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему.\r\nИтак, что нам требуется для реализации постраничной навигации? Для примера возьмем гостевую книгу, содержащую несколько сотен сообщений, в которой требуется выводить на страницу Х сообщений.\r\nРассмотрим задачу более конкретно. Сообщения пользователей хранятся в базе данных post со следующей структурой:</p>', 40, 'HTML 2', '2017-05-18', 'files/170717/h1/mini.jpg', 'HTML 2', 0, 12, 3),
(3, 1, 'PHP 1', 'PHP 1', '<p>Why get a 1 Per Day or 2 Per Day Plan?\r\nIf you prefer conversation practice over self-study, the 1 Per Day and 2 Per Day plans are ideal for you. For these new plans, there is no requirement that you complete self-study video lessons before booking a GoLive! lesson.</p>', '<p>Why get a 1 Per Day or 2 Per Day Plan?\r\nIf you prefer conversation practice over self-study, the 1 Per Day and 2 Per Day plans are ideal for you. For these new plans, there is no requirement that you complete self-study video lessons before booking a GoLive! lesson.</p>', 4, 'php 1', '2017-04-18', 'files/170717/colors/mini.jpg', 'php1', 1, 5, 1),
(4, 1, 'php 2', 'php 2', '<p>php 2 guai, gyj,gyj dthdrg</p>', '<p>php 2 guai, fhffhfhhfhf shdsddh gyj,gyj dthdrg</p>', 9, 'php 2', '2017-03-18', 'files/170717/translate/mini.jpg', 'php2', 0, 5, 1),
(5, 1, 'photoshop', 'photoshop', '<p>photoshop</p>', '<p>photoshop</p>', 11, 'photoshop', '2017-07-18', 'files/170717/colors/mini.jpg', 'photoshop', 0, 5, 1),
(6, 1, 'photoshop 2', 'photoshop 2', '<p>photoshop 2 guai, gyj,gyj dthdrg</p>', '<p>photoshop 2 guai, fhffhfhhfhf shdsddh gyj,gyj dthdrg</p>', 21, 'photoshop 2', '2017-07-18', 'files/170717/translate/mini.jpg', 'photoshop 2', 0, 5, 1),
(7, 1, 'Color in HTML', 'HTML, color', '<p> In HTML, a color can be specified by using a color name, an RGB value, or a HEX value.</p>\r\n', '<h4>Tokyo</h4>\r\n<p>Tokyo is the capital of Japan, the center of the Greater Tokyo Area,\r\nand the most populous metropolitan area in the world.</p>\r\n<p>Tokyo is the capital of Japan, the center of the Greater Tokyo Area,\r\nand the most populous metropolitan area in the world.</p>\r\n<p>Tokyo is the capital of Japan, the center of the Greater Tokyo Area,\r\nand the most populous metropolitan area in the world.</p>', 12, 'Armine Mirzoyan', '2017-07-19', 'files/190717/mini.jpg', 'How to make your site brighter with HTML colors', 0, 5, 1),
(9, 1, 'short description', 'description', '<h3><p>Постраничная навигация<h3</p>\r\n\r\n<p>Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему.</p>\r\n<p>Итак, что нам требуется для реализации постраничной навигации? Для примера возьмем гостевую книгу, содержащую несколько сотен сообщений, в которой требуется выводить на страницу Х сообщений.</p>\r\n<p>Рассмотрим задачу более конкретно. Сообщения пользователей хранятся в базе данных post со следующей структурой:</p>', '<h3><p>Постраничная навигация<h3</p>\r\n\r\n<p>Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему.</p>\r\n<p>Итак, что нам требуется для реализации постраничной навигации? Для примера возьмем гостевую книгу, содержащую несколько сотен сообщений, в которой требуется выводить на страницу Х сообщений.</p>\r\n<p>Рассмотрим задачу более конкретно. Сообщения пользователей хранятся в базе данных post со следующей структурой:</p>', 3, 'Armine Mirzoyan', '2017-07-20', 'files/190717/mini.jpg', 'HTML coding', 0, 5, 1),
(10, 1, 'Hello dear user! This is for you!', 'user', 'Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему. ', 'Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему. ', 0, 'Armine Mirzoyan', '2017-07-20', 'files/190717/mini.jpg', 'HTML coding', 1, 5, 1),
(11, 2, 'Hello dear user! This is for you!', 'user', 'Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему. ', 'Проблема реализации постраничной навигации часто встает перед начинающими PHP-программистами. К разбиению объёмного текста на отдельные страницы прибегают во многих Web-приложениях от гостевых книг и форумов до различных каталогов. Давайте\r\nрешим эту проблему. ', 23, 'Armine', '2017-07-20', 'files/190717/mini.jpg', 'Specially for you', 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `link`, `title`) VALUES
(1, 'https://www.cba.am/am/SitePages/Default.aspx', 'Central Bank of Armenia'),
(2, 'https://www.w3schools.com/', 'W3school lessons'),
(3, 'https://www.abcfinance.am/', 'ABC Finance Armenia'),
(4, 'https://ruseller.com/', 'Rafo');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(2) NOT NULL,
  `str` int(2) NOT NULL,
  `prcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `str`, `prcode`) VALUES
(1, 3, 433);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_d` varchar(255) NOT NULL,
  `meta_k` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `meta_d`, `meta_k`, `text`, `page`) VALUES
(1, 'Web developer\'s unique blog', 'Blog about web developer', 'HTML, CSS, PHP', '<p>Hello everyone!!!!</p>\r\n<p>It is my pleasure to welcome you in my blog</p>\r\n<p>Here you will be able to get acquainted to the coolest solutions of creating web pages, will receive free templates, logos for your site and will be able to enjoy the discussions with other developers. </p>\r\n<p>Enjoy your time spent with us</p>', 'index'),
(2, 'Description of Subscribe', 'Subscription about programming', 'PHP, CSS, HTML', '\r\n<p><strong>Note:</strong> The audio tag is not supported in Internet Explorer 8 and earlier versions.</p>\r\n<p>This is a paragraph.</p>\r\n<p>This is a paragraph.</p>\r\n', 'subscribe'),
(3, 'Goods by me', 'useful goods', 'goods, phones, clothing, shoes', '<p>Если Вы попали на мой ресурс не случайно, а в поисках информации по созданию сайтов, то уверен</p>\r\n <strong>Вы найдете здесь много интересной и полезной информации.</strong>\r\n<p>Если Вы попали на мой ресурс не случайно, а в поисках информации по созданию сайтов, то уверен</p>', 'goods'),
(4, 'Author', 'About us', 'About the author', '<h3> 1. Youth and Apprenticeship, 1757-1778</h3>\r\n\r\n<p>William Blake ill. 1 was born in London on 28 November 1757 and was christened on 11 December in St. James\'s Church. His mother, born Catherine Wright, was married twice. Evidence has recently emerged that she and her first husband, a hosier named Thomas Armitage, were members of the Moravian Church (Davies and Schuchard), and some readers have detected echoes of Moravian hymns in Blake\'s poems. After Armitage died, Catherine left the Moravians and married James Blake, also a hosier. The Blakes kept a shop at 28 Broad Street and were in their mid-thirties when William arrived. Of his brothers and sisters, Robert (1762-87) was Blake\'s favorite. His eldest brother, James (1753-1827), and a sister, Catherine (1764-1841), also figured prominently in his later life.</p>', 'about'),
(6, 'Secret page of the blog', 'the best lessons here', 'secret, lessons', '<p>You have entered to the secret part of the page. In order to get the lessons you should subscribe my blog</p>', 'secret');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(3) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `user`, `pass`) VALUES
(1, 'phpuser', 'php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_setting`
--
ALTER TABLE `comments_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `data` ADD FULLTEXT KEY `text` (`text`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments_setting`
--
ALTER TABLE `comments_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
