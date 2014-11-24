-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 06 月 28 日 00:27
-- 服务器版本: 5.5.9
-- PHP 版本: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bs`
--

-- --------------------------------------------------------

--
-- 表的结构 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(300) NOT NULL,
  `rsrc` varchar(500) NOT NULL,
  `uid` int(11) NOT NULL,
  `regdate` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `record`
--

INSERT INTO `record` (`rid`, `rname`, `rsrc`, `uid`, `regdate`) VALUES
(7, '精谛JD-258F 多功能料理机（绞肉、豆浆、果汁、果酱、奶昔、创冰、面膜、干粉等） 精谛营养调理机 食物搅拌机 婴儿辅食机 电动果汁机 绞肉机（菜馅、肉馅、包子绞子必备） 精谛\r\n        ', 'http://www.amazon.cn/%E7%B2%BE%E8%B0%9BJD-258F-%E5%A4%9A%E5%8A%9F%E8%83%BD%E6%96%99%E7%90%86%E6%9C%BA-%E7%B2%BE%E8%B0%9B%E8%90%A5%E5%85%BB%E8%B0%83%E7%90%86%E6%9C%BA-%E9%A3%9F%E7%89%A9%E6%90%85%E6%8B%8C%E6%9C%BA-%E5%A9%B4%E5%84%BF%E8%BE%85%E9%A3%9F%E6%9C%BA-%E7%94%B5%E5%8A%A8%E6%9E%9C%E6%B1%81%E6%9C%BA-%E7%BB%9E%E8%82%89%E6%9C%BA/dp/B00KR7Z5BU/ref=sr_1_44/478-6959832-8987259?ie=UTF8&qid=1403877057&sr=8-44&keywords=%E5%8C%85%E5%AD%90', 1, '1403878576'),
(9, '邻家小厨上海小笼包冷冻方便食品上海特色小吃小笼包子 30个/包            \r\n        ', 'http://detail.tmall.com/item.htm?id=39042740553&ad_id=&am_id=&cm_id=140105335569ed55e27b&pm_id=', 1, '1403886251');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `regdate` varchar(40) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `regdate`) VALUES
(1, 'Terry1992', 'e10adc3949ba59abbe56e057f20f883e', '1403855485'),
(2, 'xinxin', 'e10adc3949ba59abbe56e057f20f883e', '1403872201');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
