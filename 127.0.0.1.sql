-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2021 年 06 月 27 日 09:37
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shop`
--
CREATE DATABASE `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`, `avatar`) VALUES
(1, 'admin', 'admin', './images/user/1.png');

-- --------------------------------------------------------

--
-- 表的结构 `adv`
--

CREATE TABLE IF NOT EXISTS `adv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `adv`
--

INSERT INTO `adv` (`id`, `name`, `keywords`, `picture`) VALUES
(1, '广告1', '轮播', './images/lunbo1.jpg'),
(2, '轮播2', '广告', './images/lunbo3.jpg'),
(4, '广告3', '轮播', './images/lunbo2.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(50) NOT NULL,
  `nums` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `price` (`price`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `goods_id`, `goods_name`, `price`, `picture`, `nums`) VALUES
(17, 10, 26, '儿童毛绒玩偶', 25, './images/goods/60cdb69f3fdb4.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `gonggao`
--

CREATE TABLE IF NOT EXISTS `gonggao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `gonggao`
--

INSERT INTO `gonggao` (`id`, `title`, `author`, `time`, `content`) VALUES
(1, '哆啦购物商城盛大开业！', 'administrator', '2021-05-18 09:53:45', '宝资讯频道致力于打造最新最全的淘宝资讯新闻动态,以便卖家及时快速的掌握第一手淘宝动向,更好的开好淘宝店铺,了解店铺运营发展方向。宝资讯频道致力于打造最新最全的淘宝资讯新闻动态,以便卖家及时快速的掌握第一手淘宝动向,更好的开好淘宝店铺,了解店铺运营发展方向。'),
(2, '如何用算法学习判定“红楼梦（下）”原作者？ ', 'admin', '2017-04-04 04:11:43', ''),
(3, ' oracle 分析函数手册', '匿名', '2017-04-04 04:12:02', ''),
(5, '这是一篇测试文章', 'root', '2017-04-10 04:53:18', '');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` text,
  `old_price` float(4,2) DEFAULT '0.00',
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `goods_name`, `type`, `price`, `description`, `old_price`, `picture`) VALUES
(13, '哆啦a梦毛绒玩具女孩娃娃公仔抖音同款情人节礼物送女友叮当猫布娃娃', '毛绒玩具', 399, '哆啦a梦毛绒玩具女孩娃娃公仔抖音同款情人节礼物送女友叮当猫布娃娃', 99.99, './images/goods4.jpg'),
(25, '蓝胖子抱枕', '毛绒玩具', 95, '日本哆啦A梦公仔送那女朋友生日礼物A', 99.99, './images/goods/60cdb563cb01b.jpg'),
(26, '儿童毛绒玩偶', '毛绒玩具', 25, '艾影授权哆啦A梦公仔官方正品生日礼物', 35.00, './images/goods/60cdb69f3fdb4.jpg'),
(27, '天猫精灵哆啦A梦音响', '其他', 169, '联名定制只能蓝牙音箱家用闹钟生日礼物', 99.99, './images/goods/60cdb7664c3d8.jpg'),
(28, '哆啦A梦婴儿玩具不倒翁点头娃娃', '塑料玩具', 16.8, '哆啦A梦婴儿玩具不倒翁点头娃娃3-6-9-12个月宝宝早教益智0-1岁', 28.00, './images/goods/60cdb9758c5a7.jpg'),
(29, '哆啦A梦马克杯情侣对杯', '其他', 48, '艾影授权哆啦A梦造型杯马克杯情侣对杯带盖带勺陶瓷杯女水杯杯子', 68.00, './images/goods/60cdba16570ed.jpg'),
(30, '哆啦a梦钥匙扣', '金属玩具', 12, '百茂正版哆啦a梦钥匙扣女可爱叮当猫网红汽车钥匙挂件男书包挂饰', 24.00, './images/goods/60cdba438665d.jpg'),
(31, '哆啦A梦积木玩具', '塑料玩具', 39, 'Keeppley哆啦a梦正版拼装积木玩具益智启蒙机器猫联名公仔礼物6岁', 48.00, './images/goods/60cdba89794e8.jpg'),
(32, '手工真皮汽车钥匙扣挂件', '塑料玩具', 78, '手工真皮汽车钥匙扣挂件男女生日礼物哆啦A梦机器猫ins个性创意', 99.00, './images/goods/60cdbb1cdb07a.jpg'),
(33, '官方正版哆啦A梦水杯子机器猫蓝胖子陶瓷', '其他', 28, '官方正版哆啦A梦马克杯带盖水杯子机器猫蓝胖子可爱生日卡通陶瓷', 39.00, './images/goods/60cdbb68bafcd.jpg'),
(34, '哆啦A梦手办飞行小夜灯二次元摆件', '塑料玩具', 48, '哆啦A梦叮当猫手办飞行小夜灯二次元摆件卡通动漫周边蓝胖子礼物', 59.00, './images/goods/60cdbbcf17743.jpg'),
(35, '哆啦A梦桌面可爱眼镜支架', '塑料玩具', 45, '创意卡通哆啦A梦眼镜搁架眼镜店装饰展示架桌面可爱眼镜支架摆件', 55.00, './images/goods/60cdbc389dba0.jpg'),
(36, '哆啦a梦遥控车玩具 ', '塑料玩具', 38, '哆啦a梦遥控车玩具 男孩充电电动遥控汽车儿童玩具车宝宝遥控赛车', 58.00, './images/goods/60cdbc8eea75e.jpg'),
(37, '叮当猫卡通车内饰品', '塑料玩具', 149, '创意哆啦A梦汽车摆件萌睡叮当猫卡通车内饰品车载装饰品汽车香薰', 99.99, './images/goods/60cdbce3cb819.jpg'),
(38, '叮当猫蓝胖子八音盒', '其他', 24, '哆啦A梦水晶球音乐盒飘雪 叮当猫蓝胖子八音盒送同学男生生日礼物', 35.00, './images/goods/60cdbd3b897e9.jpg'),
(39, '卡通叮当猫儿童存钱罐', '金属玩具', 88, '正版哆啦a梦储蓄罐卡通叮当猫儿童存钱罐防摔可存取储钱罐大容量', 99.00, './images/goods/60cdbd951b65f.jpg'),
(40, '哆啦A梦马赛克拼图', '其他', 46, '哆啦A梦马赛克拼图木质1000片益智成人玩具动漫机器猫叮当猫', 46.00, './images/goods/60cdbe6462112.jpg'),
(42, '哆啦A梦运动手表女', '其他', 950, 'casio旗舰店哆啦A梦运动手表女石英电子表 BABY-G 卡西欧官网官方', 99.99, './images/goods/60cdbf414cf78.jpg'),
(43, '哆啦A梦时光机积木玩具儿', '其他', 79, '拼装哆啦A梦时光机积木玩具儿童拼插动漫大雄房间模型创意礼物女9', 79.00, './images/goods/60cdc03acce6e.jpg'),
(44, '哆啦A梦晶彩系列限量手办', '其他', 930, '【独角兽】C现货Macott Station哆啦A梦晶彩系列限量潮玩手办摆件', 99.99, './images/goods/60cdc0cde456e.jpg'),
(45, '正版哆啦A梦磁悬浮飞行手办', '金属玩具', 534, '正版哆啦A梦磁悬浮飞行手办叮当猫公仔女生生日礼物创意模型摆件', 99.99, './images/goods/60cdc14b9ed4e.jpg'),
(46, '哆啦A梦钥匙收纳托盘', '金属玩具', 65, '创意哆啦A梦钥匙收纳托盘可爱卡通摆件客厅玄关桌面装饰品糖果盘', 65.00, './images/goods/60cdc194165bb.jpg'),
(47, '哆啦a梦车载香水', '金属玩具', 78, '车内饰品汽车摆件中控台卡通可爱哆啦a梦网红创意车载香水装饰品', 78.00, './images/goods/60cdc206e673a.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goods_id` varchar(50) NOT NULL,
  `pay` varchar(10) NOT NULL,
  `address` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `date`, `user_id`, `goods_id`, `pay`, `address`) VALUES
(8, '1623764931', 10, '13,24,', '支付宝', '商丘工学院'),
(7, '1623764914', 10, '13,24,', '支付宝', '商丘工学院'),
(6, '1623764858', 10, '13,24,', '支付宝', '商丘工学院'),
(9, '1623765319', 10, '13,24,', '支付宝', '商丘工学院'),
(10, '1623990338', 10, '13,', '支付宝', '商丘工学院'),
(11, '1623990381', 10, '13,', '支付宝', '商丘工学院'),
(13, '2021-06-19', 10, '13,', '支付宝', '商丘工学院'),
(14, '2021-06-19', 10, '13,', '支付宝', '商丘工学院'),
(15, '2021-06-19', 10, '26,', '微信支付', '商丘工学院'),
(16, '2021-06-20', 10, '25,', '支付宝', '商丘工学院');

-- --------------------------------------------------------

--
-- 表的结构 `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_method` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `pay`
--

INSERT INTO `pay` (`id`, `pay_method`) VALUES
(1, '支付宝'),
(2, '微信支付'),
(3, '银联支付');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `uname`, `pwd`, `tel`, `sex`, `email`, `address`, `avatar`) VALUES
(26, 'a1668464290', '1668464290', '15518161620', '男', '1668464290@qq.com', '商丘工学院', NULL),
(27, 'w1668464290', '1668464290', '15518161620', '男', '1668464290@qq.com', '商丘工学院', NULL),
(28, 'ww1668464290', '1668464290', '15518161620', '男', '1668464290@qq.com', '商丘工学院', NULL),
(29, 'wwq1668464290', '161165161165', '15518161062', '男', '1668464290@qq.com', '商丘工学院', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
