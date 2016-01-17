-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2016 at 01:38 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k5`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `permission` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `nickname`, `email`, `mobile`, `password`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@k5.co', '10010', '0e1939706306e981378f2b8454a9ebaa', '["index","session","summary","talent","enterprise","log","message","article","account","billboard"]', '2015-09-19 00:00:00', '2016-01-17 05:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `editor` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `show` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `billboard`
--

CREATE TABLE IF NOT EXISTS `billboard` (
`id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `author` int(10) unsigned NOT NULL,
  `editor` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE IF NOT EXISTS `enterprise` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('私营企业','股份制企业','集体所有制企业','联营企业','国有企业','联营企业','外商投资企业','港、澳、台','股份合作企业') NOT NULL,
  `capital` int(10) unsigned NOT NULL,
  `office_address` varchar(100) NOT NULL,
  `area` varchar(20) NOT NULL,
  `staff_scale` enum('20人以下','20-100人','100-500人','100-500人','2000人以上') NOT NULL,
  `operation_scale` enum('100万以下','100-1000万','1000万-1亿','1-10亿','10亿以上') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `editor` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` enum('个人','企业') NOT NULL DEFAULT '个人',
  `content` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `checked` enum('未审核','已审核') NOT NULL DEFAULT '未审核',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `title`, `type`, `content`, `name`, `mobile`, `email`, `checked`, `created_at`, `updated_at`) VALUES
(1, '这个留言有什么用', '个人', '不知道思密达', '王五', '10010', '10010@10010.com', '未审核', '2016-01-10 17:00:40', '2016-01-10 17:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE IF NOT EXISTS `talent` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('未知','男','女') NOT NULL DEFAULT '未知',
  `nationality` enum('阿拉伯联合酋长国','阿富汗','安提瓜和巴布达','安圭拉岛','阿尔巴尼亚','亚美尼亚','阿森松','安哥拉','阿根廷','奥地利','澳大利亚','阿塞拜疆','巴巴多斯','孟加拉国','比利时','布基纳法索','保加利亚','巴林','布隆迪','贝宁','巴勒斯坦','百慕大群岛','文莱','玻利维亚','巴西','巴哈马','博茨瓦纳','白俄罗斯','伯利兹','加拿大','开曼群岛','中非共和国','刚果','瑞士','库克群岛','智利','喀麦隆','中国','哥伦比亚','哥斯达黎加','捷克','古巴','塞浦路斯','捷克','德国','吉布提','丹麦','多米尼加共和国','阿尔及利亚','厄瓜多尔','爱沙尼亚','埃及','西班牙','埃塞俄比亚','芬兰','斐济','法国','加蓬','英国','格林纳达','格鲁吉亚','法属圭亚那','加纳','直布罗陀','冈比亚','几内亚','希腊','危地马拉','关岛','圭亚那','香港特别行政区','洪都拉斯','海地','匈牙利','印度尼西亚','爱尔兰','以色列','印度','伊拉克','伊朗','冰岛','意大利','科特迪瓦','牙买加','约旦','日本','肯尼亚','吉尔吉斯坦','柬埔寨','朝鲜','韩国','科特迪瓦共和国','科威特','哈萨克斯坦','老挝','黎巴嫩','圣卢西亚','列支敦士登','斯里兰卡','利比里亚','莱索托','立陶宛','卢森堡','拉脱维亚','利比亚','摩洛哥','摩纳哥','摩尔多瓦','马达加斯加','马里','缅甸','蒙古','澳门','蒙特塞拉特岛','马耳他','马里亚那群岛','马提尼克','毛里求斯','马尔代夫','马拉维','墨西哥','马来西亚','莫桑比克','纳米比亚','尼日尔','尼日利亚','尼加拉瓜','荷兰','挪威','尼泊尔','荷属安的列斯','瑙鲁','新西兰','阿曼','巴拿马','秘鲁','法属玻利尼西亚','巴布亚新几内亚','菲律宾','巴基斯坦','波兰','波多黎各','葡萄牙','巴拉圭','卡塔尔','留尼旺','罗马尼亚','俄罗斯','沙特阿拉伯','所罗门群岛','塞舌尔','苏丹','瑞典','新加坡','斯洛文尼亚','斯洛伐克','塞拉利昂','圣马力诺','东萨摩亚','西萨摩亚','塞内加尔','索马里','苏里南','圣多美和普林西比','萨尔瓦多','叙利亚','斯威士兰','乍得','多哥','泰国','塔吉克斯坦','土库曼斯坦','突尼斯','汤加','土耳其','特立尼达和多巴哥','台湾省','坦桑尼亚','乌克兰','乌干达','美国','乌拉圭','乌兹别克斯坦','圣文森特岛','委内瑞拉','越南','也门','南斯拉夫','南非','赞比亚','扎伊尔','津巴布韦') NOT NULL DEFAULT '中国',
  `nation` enum('汉族','蒙古族','回族','藏族','维吾尔族','苗族','彝族','壮族','布依族','朝鲜族','满族','侗族','瑶族','白族','土家族','哈尼族','哈萨克族','傣族','黎族','傈僳族','佤族','畲族','高山族','拉祜族','水族','东乡族','纳西族','景颇族','柯尔克孜族','土族','达斡尔族','仫佬族','羌族','布朗族','撒拉族','毛南族','仡佬族','锡伯族','阿昌族','普米族','塔吉克族','怒族','乌孜别克族','俄罗斯族','鄂温克族','德昂族','保安族','裕固族','京族','塔塔尔族','独龙族','鄂伦春族','赫哲族','门巴族','珞巴族','基诺族','其他') NOT NULL DEFAULT '汉族',
  `birth` varchar(7) NOT NULL DEFAULT '0000-00',
  `marital` enum('未婚','已婚','离异') NOT NULL DEFAULT '未婚',
  `birthAddress` varchar(100) NOT NULL DEFAULT '',
  `registeredAddress` varchar(100) NOT NULL DEFAULT '',
  `politicsStatus` enum('群众','共青团员','共产党员','民主党派','无党派') NOT NULL DEFAULT '群众',
  `degree` enum('博士','硕士','本科','大专','高中','初中','小学') NOT NULL DEFAULT '本科',
  `professionalTitle` varchar(50) NOT NULL DEFAULT '',
  `workYear` varchar(20) NOT NULL DEFAULT '0',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `school1` varchar(50) NOT NULL DEFAULT '',
  `major1` varchar(50) NOT NULL DEFAULT '',
  `school2` varchar(50) NOT NULL DEFAULT '',
  `major2` varchar(50) NOT NULL DEFAULT '',
  `school3` varchar(50) NOT NULL DEFAULT '',
  `major3` varchar(50) NOT NULL DEFAULT '',
  `returnee` enum('是','否') NOT NULL DEFAULT '否',
  `foreignOffice` varchar(100) NOT NULL DEFAULT '',
  `office` varchar(100) NOT NULL DEFAULT '',
  `position` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `category` varchar(20) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `talent_evaluation`
--

CREATE TABLE IF NOT EXISTS `talent_evaluation` (
`id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `date` varchar(7) NOT NULL DEFAULT '0000-00',
  `batch` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT '',
  `category` varchar(50) NOT NULL DEFAULT '',
  `result` varchar(100) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `talent_experience`
--

CREATE TABLE IF NOT EXISTS `talent_experience` (
`id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '',
  `office` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `start` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `talent_office`
--

CREATE TABLE IF NOT EXISTS `talent_office` (
`id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `office` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL DEFAULT '',
  `start` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `talent_project`
--

CREATE TABLE IF NOT EXISTS `talent_project` (
`id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '',
  `progress` varchar(20) NOT NULL DEFAULT '',
  `start` date NOT NULL DEFAULT '0000-00-00',
  `end` date NOT NULL DEFAULT '0000-00-00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `talent_relation`
--

CREATE TABLE IF NOT EXISTS `talent_relation` (
`id` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `relation` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `office` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `office_fax` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`name`,`email`), ADD KEY `nickname` (`nickname`), ADD KEY `mobile` (`mobile`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billboard`
--
ALTER TABLE `billboard`
 ADD PRIMARY KEY (`id`), ADD KEY `author` (`author`,`editor`);

--
-- Indexes for table `enterprise`
--
ALTER TABLE `enterprise`
 ADD PRIMARY KEY (`id`), ADD KEY `name` (`name`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`id`), ADD KEY `author` (`author`), ADD KEY `editor` (`editor`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
 ADD PRIMARY KEY (`id`), ADD KEY `name` (`name`,`mobile`,`email`);

--
-- Indexes for table `talent_evaluation`
--
ALTER TABLE `talent_evaluation`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`tid`);

--
-- Indexes for table `talent_experience`
--
ALTER TABLE `talent_experience`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`tid`);

--
-- Indexes for table `talent_office`
--
ALTER TABLE `talent_office`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_project`
--
ALTER TABLE `talent_project`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`tid`);

--
-- Indexes for table `talent_relation`
--
ALTER TABLE `talent_relation`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `billboard`
--
ALTER TABLE `billboard`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enterprise`
--
ALTER TABLE `enterprise`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talent_evaluation`
--
ALTER TABLE `talent_evaluation`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talent_experience`
--
ALTER TABLE `talent_experience`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talent_office`
--
ALTER TABLE `talent_office`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talent_project`
--
ALTER TABLE `talent_project`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talent_relation`
--
ALTER TABLE `talent_relation`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
