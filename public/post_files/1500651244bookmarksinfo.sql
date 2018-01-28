-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2017 at 04:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `username` varchar(16) NOT NULL,
  `bm_URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`username`, `bm_URL`) VALUES
('annie', 'http://google.com/'),
('annie', 'http://ebay.com'),
('annie', 'http://amazon.com'),
('annie', 'http://yahoo.com'),
('annie', 'http://yabshop.com'),
('annie', 'http://valyria.com'),
('annie', 'http://valyriajewelry.com'),
('123', 'http://google.com/'),
('123', 'http://ebay.com'),
('123', 'http://amazon.com'),
('123', 'http://yahoo.com'),
('456', 'http://google.com/'),
('456', 'http://ebay.com'),
('456', 'http://valyriajewelry.com'),
('444', 'http://ebay.com'),
('444', 'http://google.com/'),
('444', 'http://amazon.com'),
('444', 'http://Youtube.com'),
('444', 'http://Facebook.com'),
('444', 'http://Baidu.com'),
('444', 'http://Wikipedia.org'),
('444', 'http://yahoo.com'),
('444', 'http://Qq.com'),
('444', 'http://Reddit.com'),
('111', 'http://Reddit.com'),
('111', 'http://Qq.com'),
('111', 'http://Wikipedia.org'),
('111', 'http://google.com/'),
('111', 'http://Youtube.com'),
('111', 'http://Facebook.com'),
('111', 'http://Yahoo.com'),
('111', 'http://Twitter.com'),
('111', 'http://Amazon.com'),
('111', 'http://Sohu.com'),
('222', 'http://Sohu.com'),
('222', 'http://Reddit.com'),
('222', 'http://Taobao.com'),
('222', 'http://Live.com'),
('222', 'http://ebay.com'),
('222', 'http://Qq.com'),
('222', 'http://Weibo.com'),
('222', 'http://Linkedin.com'),
('222', 'http://Yahoo.co.jp'),
('222', 'http://Onclkds.com'),
('333', 'http://Reddit.com'),
('333', 'http://ebay.com'),
('333', 'http://Facebook.com'),
('333', 'http://google.com/'),
('333', 'http://Baidu.com'),
('333', 'http://Wikipedia.org'),
('333', 'http://Bing.com'),
('333', 'http://Hao123.com'),
('333', 'http://Tumblr.com'),
('333', 'http://Twitch.tv'),
('555', 'http://Reddit.com'),
('555', 'http://google.com/'),
('555', 'http://Facebook.com'),
('555', 'http://Alipay.com'),
('555', 'http://Google.com.mx'),
('555', 'http://Google.ca'),
('555', 'http://Livejasmin.com'),
('555', 'http://Microsoft.com'),
('555', 'http://Msn.com'),
('555', 'http://Bing.com'),
('666', 'http://google.com/'),
('666', 'http://Reddit.com'),
('666', 'http://ebay.com'),
('666', 'http://Onclkds.com'),
('666', 'http://Imgur.com'),
('666', 'http://Google.it'),
('666', 'http://Yahoo.co.jp'),
('666', 'http://Yandex.ru'),
('666', 'http://Facebook.com'),
('666', 'http://Qq.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `passwd` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `passwd`, `email`, `user_pic`) VALUES
('111', '3f196cfb6c4cffe3002c0495a1bc822521b6aa36', '111@111.com', NULL),
('222', '0d343a34ee781f51d57935a6c19a72eb39aebca6', '222@222.com', NULL),
('333', '95e229d8aca716874c8feca1501379e06f239d03', '333@333.com', '3-17.png'),
('444', 'de80ad51bf670f0786d705d5fcc654544303458b', '444@444.com', NULL),
('555', '0d1e92ece8e9c44a4be8971bae7abe6b6bceac3f', '555@555.com', NULL),
('666', '4e990d5a3b46448665ed12dacb235676c51deac5', '666@666.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD KEY `username` (`username`),
  ADD KEY `bm_URL` (`bm_URL`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
