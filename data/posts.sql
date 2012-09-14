-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 09 月 14 日 11:31
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fecms`
--

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `category` int(4) NOT NULL,
  `addtime` date NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category`, `addtime`, `keywords`, `description`) VALUES
(1, 'aa', 'aaaaaaa', 0, '0000-00-00', '', ''),
(2, 'bb', 'bbbbbb', 0, '0000-00-00', '', ''),
(3, 'cc', 'cccccccc', 0, '0000-00-00', '', ''),
(4, 'dd', 'dddddd', 0, '0000-00-00', '', ''),
(5, '北京青年', '', 1, '2012-09-14', '北京青年', '北京青年'),
(6, '敢死队敢死队', '<p><strong><span style="text-decoration:line-through;font-size:20px;">敢死队</span></strong><br /></p>', 4, '2012-09-14', '敢死队', '敢死队'),
(7, '怒放的生命', '<p>怒放的生命怒放的生命怒放的生命怒放的生命<br /></p>', 10, '2012-09-14', '怒放的生命', ''),
(8, '视频专区', '<p>视频专区视频专区视频专区<br /></p>', 6, '2012-09-14', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
