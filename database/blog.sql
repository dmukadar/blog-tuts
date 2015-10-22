-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2015 at 12:11 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_time` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `caption`, `path`, `url`, `post_id`) VALUES
(1, 'test', '/opt/openbravo', '', 1),
(2, 'test', 'image/upload/test_index.jpeg', '', 20),
(21, 'test1', 'image/upload/21/test1/images.jpeg', '', 21),
(22, 'test1', 'image/upload/21/test1/index.jpeg', '', 21),
(23, 'test1', 'image/upload/21/test1/index2.jpeg', '', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE IF NOT EXISTS `tbl_lookup` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author_id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `author_id_2` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `slug`, `author_id`, `image`) VALUES
(1, 'asdsad', 'asdas', 'asdsa', '1', '2015-10-22', '2015-10-22', '', 6, ''),
(7, 'test', '<p>test</p>\r\n', 'test', '1', '2015-10-22', '2015-10-22', '', 6, ''),
(12, 'test', '<p>test</p>\r\n', 'test', '1', '2015-10-22', '2015-10-22', '', 6, ''),
(13, 'test', '<p>test</p>\r\n', 'test', '1', '2015-10-22', '2015-10-22', '', 6, ''),
(14, 'test', '<p>test</p>\r\n', 'test', '1', '2015-10-22', '2015-10-22', '', 6, ''),
(15, 'test', '<p>test</p>\r\n', 'test', '1', '2015-10-22', '2015-10-22', '', 6, ''),
(18, 'test', '<p>test</p>\r\n', 'test', 'test', '2015-10-22', '2015-10-22', '', 6, 'upload/test_images.jpeg'),
(19, 'test', '<p>test</p>\r\n', 'test', 'test', '2015-10-22', '2015-10-22', '', 6, ''),
(20, 'test', '<p>test</p>\r\n', 'test', '2', '2015-10-22', '2015-10-22', '', 6, 'image/upload/test_index.jpeg'),
(21, 'test1', '<p>test1</p>\r\n', 'test1', '1', '2015-10-22', '2015-10-22', '', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `frequency` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `salt`, `email`, `profile`, `create_time`, `update_time`, `authKey`, `accessToken`) VALUES
(6, 'karsa', '1234', '1', 'karsa@gmail.com', 'mochamad karsa syaifudin jupri', '2015-10-20', '2015-10-20', '1', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`);

--
-- Constraints for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD CONSTRAINT `tbl_image_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`);

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `tbl_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
