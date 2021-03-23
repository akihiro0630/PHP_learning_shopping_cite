-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 年 3 朁E23 日 09:40
-- サーバのバージョン： 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingdbnishiyama`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `mail` varchar(50) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `kana` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `telNo` varchar(13) DEFAULT NULL,
  `postCode` varchar(7) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birthday` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`mail`, `password`, `kana`, `name`, `telNo`, `postCode`, `address`, `birthday`) VALUES
('a@a.a', 'a', 'a', 'a', '00000000000', '0000000', 'a', '19960630'),
('aaaa@a.a', 'bb', 'にしやま', '西山　陽広', '08078856438', '6000000', '京都府', '19960630'),
('bunshi@katsura.com', 'bunshi', 'かつらぶんし', '桂文枝', '0684004567', '5400003', '大阪府大阪市中央区森ノ宮中央3-4-5', '19430716'),
('hanako@yamada.com', 'hanako', 'やまだはなこ', '山田花子', '0781001234', '6511234', '兵庫県神戸市中央区一宮町1-12-3', '19750310'),
('hiromi@goh.com', 'hiromi', 'ごうひろみ', '郷ひろみ', '0756006789', '6040002', '京都府京都市中京区鏡屋町4-5-6', '19551018'),
('ichiro@suzuki.com', 'ichiro', 'すずきいちろう', '鈴木一郎', '0782002345', '6522345', '兵庫県神戸市中央区二宮町2-12-5', '19731022'),
('isami@kondoh.com', 'isami', 'こんどういさみ', '近藤勇', '0683003456', '5400001', '大阪府大阪市中央区城見2-3-4', '18341009'),
('kiyoshi@hikawa.com', 'kiyoshi', 'ひかわきよし', '氷川きよし', '09088008901', '6040015', '京都府京都市中京区泉町15-2-8', '19770906'),
('masaharu@fukuyama.com', 'masaharu', 'ふくやままさはる', '福山雅治', '08087007890', '6040004', '京都府京都市中京区相生町12-23-34', '19690206'),
('tsurutaro@kataoka.com', 'tsurutaro', 'かたおかつるたろう', '片岡鶴太郎', '0755005678', '6040001', '京都府京都市中京区道場町7-8-9', '19541221');

-- --------------------------------------------------------

--
-- テーブルの構造 `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orders_no` int(6) NOT NULL,
  `lineNo` int(2) NOT NULL,
  `productGroup_code` varchar(2) DEFAULT NULL,
  `productItem_code` varchar(4) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  `productItem_price` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `orderdetails`
--

INSERT INTO `orderdetails` (`orders_no`, `lineNo`, `productGroup_code`, `productItem_code`, `quantity`, `productItem_price`) VALUES
(1, 1, 'AW', '0001', 10, 80),
(2, 1, 'BW', '0001', 10, 1200),
(3, 1, 'CW', '0001', 10, 600),
(4, 1, 'AW', '0001', 15, 80),
(4, 2, 'BW', '0001', 10, 1200),
(5, 1, 'JW', '0001', 10, 6500),
(5, 2, 'JW', '0002', 10, 6500),
(5, 3, 'JW', '0003', 10, 2000),
(5, 4, 'JW', '0004', 10, 2200),
(6, 1, 'BW', '0002', 10, 3000),
(6, 2, 'BW', '0005', 10, 2800),
(6, 3, 'BW', '0008', 10, 1300),
(6, 4, 'BW', '0011', 10, 1500),
(7, 1, 'BW', '0001', 10, 1200),
(7, 2, 'CW', '0001', 10, 600),
(8, 1, 'FW', '0001', 10, 1200),
(8, 2, 'GW', '0001', 10, 120),
(8, 3, 'GW', '0004', 10, 8000),
(8, 4, 'GW', '0005', 10, 120),
(8, 5, 'GW', '0008', 10, 8000),
(9, 1, 'AW', '0001', 2, 80),
(9, 2, 'AW', '0002', 1, 100),
(9, 3, 'AW', '0003', 1, 1000),
(10, 1, 'AW', '0001', 1, 80),
(10, 2, 'AW', '0002', 1, 100),
(10, 3, 'AW', '0003', 1, 1000),
(10, 4, 'AW', '0004', 1, 500),
(10, 5, 'AW', '0005', 1, 1200),
(10, 6, 'AW', '0006', 1, 80),
(10, 7, 'AW', '0008', 1, 1000),
(10, 8, 'AW', '0009', 1, 500),
(11, 1, 'AW', '0002', 2, 100),
(11, 2, 'AW', '0003', 1, 1000),
(11, 3, 'AW', '0005', 1, 1200);

-- --------------------------------------------------------

--
-- テーブルの構造 `orderfavorite`
--

CREATE TABLE `orderfavorite` (
  `customer_mail` varchar(50) NOT NULL,
  `productGroup_code` varchar(2) NOT NULL,
  `productItem_code` varchar(4) NOT NULL,
  `registDate` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `orderfavorite`
--

INSERT INTO `orderfavorite` (`customer_mail`, `productGroup_code`, `productItem_code`, `registDate`) VALUES
('a@a.a', 'AW', '0001', '20210205'),
('a@a.a', 'AW', '0003', '20210205'),
('a@a.a', 'BW', '0008', '20210205'),
('hanako@yamada.com', 'AW', '0005', '20200813'),
('hanako@yamada.com', 'BW', '0012', '20200901'),
('hanako@yamada.com', 'CW', '0003', '20201231'),
('hanako@yamada.com', 'DW', '0016', '20210110'),
('ichiro@suzuki.com', 'FW', '0025', '20210101'),
('ichiro@suzuki.com', 'HW', '0001', '20210110'),
('ichiro@suzuki.com', 'JW', '0004', '20210111');

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `no` int(6) NOT NULL,
  `customer_mail` varchar(50) DEFAULT NULL,
  `tax` int(10) DEFAULT NULL,
  `orderDate` varchar(8) DEFAULT NULL,
  `sendDate` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`no`, `customer_mail`, `tax`, `orderDate`, `sendDate`) VALUES
(1, 'hanako@yamada.com', 80, '20201109', '20201110'),
(2, 'ichiro@suzuki.com', 1200, '20201207', '20201208'),
(3, 'hanako@yamada.com', 600, '20201201', '20201202'),
(4, 'isami@kondoh.com', 1320, '20201209', '20201210'),
(5, 'hanako@yamada.com', 17200, '20210105', '20210106'),
(6, 'isami@kondoh.com', 8600, '20210112', '20210113'),
(7, 'hanako@yamada.com', 1800, '20210114', '20210115'),
(8, 'ichiro@suzuki.com', 17440, '20210115', '20210116'),
(9, 'a@a.a', 115, '20210204', '00000000'),
(10, 'a@a.a', 405, '20210204', '00000000'),
(11, 'a@a.a', 218, '20210204', '00000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `productgroup`
--

CREATE TABLE `productgroup` (
  `code` varchar(2) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `unitName` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `productgroup`
--

INSERT INTO `productgroup` (`code`, `name`, `unitName`) VALUES
('AW', '飲料', '箱'),
('BW', 'にんにく・ゴマ', '箱'),
('CW', '納豆', '箱'),
('DW', '米・麦・酢', '袋'),
('EW', '乳酸飲料・青汁', '箱'),
('FW', 'ビタミン飲料', '箱'),
('GW', '粥', '箱'),
('HW', '低反発まくら', '箱'),
('IW', 'オーダーまくら', '基'),
('JW', '頭髪料', '個');

-- --------------------------------------------------------

--
-- テーブルの構造 `productitem`
--

CREATE TABLE `productitem` (
  `productGroup_code` varchar(2) NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `stock` int(8) DEFAULT NULL,
  `orderPoint` int(8) DEFAULT NULL,
  `caption` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `productitem`
--

INSERT INTO `productitem` (`productGroup_code`, `code`, `name`, `price`, `stock`, `orderPoint`, `caption`) VALUES
('AW', '0001', 'ミネラルウォータ（500ml）', 80, 100000, 70000, ''),
('AW', '0002', 'ミネラルウォーター（2ｌ）', 100, 100000, 70000, ''),
('AW', '0003', 'ミネラルウォーター（業務用）', 1000, 100000, 70000, ''),
('AW', '0004', 'ミネラルウォーター(500ml)x12本', 500, 100000, 70000, ''),
('AW', '0005', 'ミネラルウォーター(2l)x12本', 1200, 100000, 70000, ''),
('AW', '0006', '海洋深層水（500ml）', 80, 100000, 70000, ''),
('AW', '0007', '海洋深層水（2ｌ）', 100, 100000, 70000, ''),
('AW', '0008', '海洋深層水（業務用）', 1000, 100000, 70000, ''),
('AW', '0009', '海洋深層水(500ml)x12本', 500, 100000, 70000, ''),
('AW', '0010', '海洋深層水(2l)x12本', 1200, 100000, 70000, ''),
('BW', '0001', '黄金にんにく・10日分', 1200, 100000, 70000, ''),
('BW', '0002', '黄金にんにく・30日分', 3000, 100000, 70000, ''),
('BW', '0003', '黄金にんにく・ 90日分', 8000, 100000, 70000, ''),
('BW', '0004', '無臭にんにく・10日分', 1000, 100000, 70000, ''),
('BW', '0005', '無臭にんにく・30日分', 2800, 100000, 70000, ''),
('BW', '0006', '無臭にんにく・90日分', 7400, 100000, 70000, ''),
('BW', '0007', '健康黒ゴマ・10日分', 500, 100000, 70000, ''),
('BW', '0008', '健康黒ゴマ・30日分', 1300, 100000, 70000, ''),
('BW', '0009', '健康黒ゴマ・90日分', 3500, 100000, 70000, ''),
('BW', '0010', '黒ゴマセサミン・10日分', 600, 100000, 70000, ''),
('BW', '0011', '黒ゴマセサミン・30日分', 1500, 100000, 70000, ''),
('BW', '0012', '黒ゴマセサミン・90日分', 4000, 100000, 70000, ''),
('CW', '0001', '食べる納豆キナーゼ・10日分', 600, 100000, 70000, ''),
('CW', '0002', '食べる納豆キナーゼ・30日分', 1600, 100000, 70000, ''),
('CW', '0003', '食べる納豆キナーゼ・90日分', 4500, 100000, 70000, ''),
('DW', '0001', '雑穀プラス・10食分', 500, 100000, 70000, ''),
('DW', '0002', '雑穀プラス・30食分', 1300, 100000, 70000, ''),
('DW', '0003', '雑穀プラス・90食分', 3500, 100000, 70000, ''),
('DW', '0004', '五穀米・10食分', 1000, 100000, 70000, ''),
('DW', '0005', '五穀米・30食分', 2800, 100000, 70000, ''),
('DW', '0006', '五穀米・90食分', 8500, 100000, 70000, ''),
('DW', '0007', '十穀米・10食分', 1200, 100000, 70000, ''),
('DW', '0008', '十穀米・30食分', 3400, 100000, 70000, ''),
('DW', '0009', '十穀米・90食分', 9500, 100000, 70000, ''),
('DW', '0010', '健康発芽玄米・10食分', 1000, 100000, 70000, ''),
('DW', '0011', '健康発芽玄米・30食分', 2800, 100000, 70000, ''),
('DW', '0012', '健康発芽玄米・90食分', 8500, 100000, 70000, ''),
('DW', '0013', '健康黒酢（200ml）', 350, 100000, 70000, ''),
('DW', '0014', '健康黒酢（1ｌ）', 900, 100000, 70000, ''),
('DW', '0015', '健康黒酢（200ml）x12本', 3500, 100000, 70000, ''),
('DW', '0016', '健康黒酢（1ｌ）x12本', 9000, 100000, 70000, ''),
('EW', '0001', '乳酸菌飲料ジョイ・6本パック', 280, 100000, 70000, ''),
('EW', '0002', '乳酸菌飲料ジョイ・12本パック', 500, 100000, 70000, ''),
('EW', '0003', '乳酸菌プラス・24袋パック', 2200, 100000, 70000, ''),
('EW', '0004', '乳酸菌プラス・36袋パック', 3000, 100000, 70000, ''),
('EW', '0005', '乳酸菌プラス・36袋パック', 5000, 100000, 70000, ''),
('EW', '0006', '健康青汁・24袋パック', 2200, 100000, 70000, ''),
('EW', '0007', '健康青汁・36袋パック', 3000, 100000, 70000, ''),
('EW', '0008', '健康青汁・60袋パック', 5000, 100000, 70000, ''),
('FW', '0001', 'マルチビタミン&ミネラル・10日分', 1200, 100000, 70000, ''),
('FW', '0002', 'マルチビタミン&ミネラル・30日分', 3500, 100000, 70000, ''),
('FW', '0003', 'マルチビタミン&ミネラル・120日分', 12000, 100000, 70000, ''),
('FW', '0004', 'マルチビタミンforMen・10日分', 1200, 100000, 70000, ''),
('FW', '0005', 'マルチビタミンforMen・30日分', 3500, 100000, 70000, ''),
('FW', '0006', 'マルチビタミンforMen・120日分', 12000, 100000, 70000, ''),
('FW', '0007', 'マルチビタミンforWomen・10日分', 1200, 100000, 70000, ''),
('FW', '0008', 'マルチビタミンforWomen・30日分', 3500, 100000, 70000, ''),
('FW', '0009', 'マルチビタミンforWomen・120日分', 12000, 100000, 70000, ''),
('FW', '0010', 'ビタミン13・10日分', 1000, 100000, 70000, ''),
('FW', '0011', 'ビタミン13・30日分', 3500, 100000, 70000, ''),
('FW', '0012', 'ビタミン13・120日分', 10000, 100000, 70000, ''),
('FW', '0013', 'ビタミンBB・10日分', 900, 100000, 70000, ''),
('FW', '0014', 'ビタミンBB・30日分', 2500, 100000, 70000, ''),
('FW', '0015', 'ビタミンBB・120日分', 9000, 100000, 70000, ''),
('FW', '0016', 'ビタミンC・10日分', 800, 100000, 70000, ''),
('FW', '0017', 'ビタミンC・30日分', 2200, 100000, 70000, ''),
('FW', '0018', 'ビタミンC・120日分', 8000, 100000, 70000, ''),
('FW', '0019', '天然ビタミンＥ・10日分', 900, 100000, 70000, ''),
('FW', '0020', '天然ビタミンＥ・30日分', 2500, 100000, 70000, ''),
('FW', '0021', '天然ビタミンＥ・120日分', 9000, 100000, 70000, ''),
('FW', '0022', '紫蘇・10日分', 300, 100000, 70000, ''),
('FW', '0023', '紫蘇・30日分', 800, 100000, 70000, ''),
('FW', '0024', '紫蘇・120日分', 3000, 100000, 70000, ''),
('FW', '0025', '天然アミノ・10日分', 350, 100000, 70000, ''),
('FW', '0026', '天然アミノ・30日分', 1200, 100000, 70000, ''),
('FW', '0027', '天然アミノ・120日分', 4000, 100000, 70000, ''),
('FW', '0028', '甜茶･10日分', 300, 100000, 70000, ''),
('FW', '0029', '甜茶･30日分', 800, 100000, 70000, ''),
('FW', '0030', '甜茶･120日分', 3000, 100000, 70000, ''),
('FW', '0031', '天然田七人参・10日分', 300, 100000, 70000, ''),
('FW', '0032', '天然田七人参・30日分', 800, 100000, 70000, ''),
('FW', '0033', '天然田七人参・30日分', 3000, 100000, 70000, ''),
('GW', '0001', '健康十穀の粥・1食', 120, 100000, 70000, ''),
('GW', '0002', '健康十穀の粥・10食パック', 1000, 100000, 70000, ''),
('GW', '0003', '健康十穀の粥・30食パック', 2800, 100000, 70000, ''),
('GW', '0004', '健康十穀の粥・90食パック', 8000, 100000, 70000, ''),
('GW', '0005', '健康十穀の粥(カレー)・1食', 120, 100000, 70000, ''),
('GW', '0006', '健康十穀の粥(カレー）・10食パック', 1000, 100000, 70000, ''),
('GW', '0007', '健康十穀の粥(カレー)・30食パック', 2800, 100000, 70000, ''),
('GW', '0008', '健康十穀の粥(カレー)・90食パック', 8000, 100000, 70000, ''),
('HW', '0001', '健康低反発枕S', 12000, 100000, 70000, ''),
('HW', '0002', '健康低反発まくらM', 12500, 100000, 70000, ''),
('HW', '0003', '健康低反発まくらL', 13000, 100000, 70000, ''),
('IW', '0001', '健康オーダーまくらS', 17000, 100000, 70000, ''),
('IW', '0002', '健康オーダーまくらM', 17500, 100000, 70000, ''),
('IW', '0003', '健康オーダーまくらL', 18000, 100000, 70000, ''),
('JW', '0001', '男性用育毛トニック', 6500, 100000, 70000, ''),
('JW', '0002', '女性用育毛トニック', 6500, 100000, 70000, ''),
('JW', '0003', '育毛シャンプー', 2000, 100000, 70000, ''),
('JW', '0004', '育毛コンディショナー', 2200, 100000, 70000, '');

-- --------------------------------------------------------

--
-- ビュー用の代替構造 `v_orderfavorite`
-- (See below for the actual view)
--
CREATE TABLE `v_orderfavorite` (
`customer_mail` varchar(50)
,`customer_name` varchar(40)
,`productGroup_code` varchar(2)
,`productGroup_name` varchar(40)
,`unitName` varchar(2)
,`productItem_code` varchar(4)
,`productItem_name` varchar(40)
,`productItem_price` int(6)
,`registDate` varchar(8)
);

-- --------------------------------------------------------

--
-- ビュー用の代替構造 `v_orders`
-- (See below for the actual view)
--
CREATE TABLE `v_orders` (
`orders_no` int(6)
,`orderDate` varchar(8)
,`customer_mail` varchar(50)
,`customer_name` varchar(40)
,`productGroup_code` varchar(2)
,`productItem_code` varchar(4)
,`productItem_name` varchar(40)
,`quantity` int(6)
,`unitName` varchar(2)
,`productItem_price` int(6)
,`money` bigint(21)
);

-- --------------------------------------------------------

--
-- ビュー用の代替構造 `v_product`
-- (See below for the actual view)
--
CREATE TABLE `v_product` (
`productGroup_name` varchar(40)
,`productGroup_code` varchar(2)
,`productItem_code` varchar(4)
,`productItem_name` varchar(40)
,`price` int(6)
,`stock` int(8)
,`unitName` varchar(2)
,`orderPoint` int(8)
,`caption` varchar(50)
);

-- --------------------------------------------------------

--
-- ビュー用の代替構造 `v_productgroup`
-- (See below for the actual view)
--
CREATE TABLE `v_productgroup` (
`productGroup_code` varchar(2)
,`productGroup_name` varchar(40)
,`unitName` varchar(2)
);

-- --------------------------------------------------------

--
-- ビュー用の構造 `v_orderfavorite`
--
DROP TABLE IF EXISTS `v_orderfavorite`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_orderfavorite`  AS  select `a`.`customer_mail` AS `customer_mail`,`b`.`name` AS `customer_name`,`a`.`productGroup_code` AS `productGroup_code`,`c`.`name` AS `productGroup_name`,`c`.`unitName` AS `unitName`,`a`.`productItem_code` AS `productItem_code`,`d`.`name` AS `productItem_name`,`d`.`price` AS `productItem_price`,`a`.`registDate` AS `registDate` from (((`orderfavorite` `a` join `customer` `b` on((`a`.`customer_mail` = `b`.`mail`))) join `productgroup` `c` on((`a`.`productGroup_code` = `c`.`code`))) join `productitem` `d` on(((`a`.`productGroup_code` = `d`.`productGroup_code`) and (`a`.`productItem_code` = `d`.`code`)))) order by `a`.`customer_mail`,`a`.`productGroup_code`,`a`.`productItem_code` ;

-- --------------------------------------------------------

--
-- ビュー用の構造 `v_orders`
--
DROP TABLE IF EXISTS `v_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_orders`  AS  select `a`.`no` AS `orders_no`,`a`.`orderDate` AS `orderDate`,`a`.`customer_mail` AS `customer_mail`,`c`.`name` AS `customer_name`,`b`.`productGroup_code` AS `productGroup_code`,`b`.`productItem_code` AS `productItem_code`,`e`.`name` AS `productItem_name`,`b`.`quantity` AS `quantity`,`d`.`unitName` AS `unitName`,`b`.`productItem_price` AS `productItem_price`,(`b`.`quantity` * `b`.`productItem_price`) AS `money` from ((((`orders` `a` join `orderdetails` `b` on((`a`.`no` = `b`.`orders_no`))) join `customer` `c` on((`a`.`customer_mail` = `c`.`mail`))) join `productgroup` `d` on((`b`.`productGroup_code` = `d`.`code`))) join `productitem` `e` on(((`b`.`productGroup_code` = `e`.`productGroup_code`) and (`b`.`productItem_code` = `e`.`code`)))) order by `a`.`no`,`b`.`lineNo` ;

-- --------------------------------------------------------

--
-- ビュー用の構造 `v_product`
--
DROP TABLE IF EXISTS `v_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_product`  AS  select `a`.`name` AS `productGroup_name`,`a`.`code` AS `productGroup_code`,`b`.`code` AS `productItem_code`,`b`.`name` AS `productItem_name`,`b`.`price` AS `price`,`b`.`stock` AS `stock`,`a`.`unitName` AS `unitName`,`b`.`orderPoint` AS `orderPoint`,`b`.`caption` AS `caption` from (`productgroup` `a` join `productitem` `b` on((`a`.`code` = `b`.`productGroup_code`))) order by `a`.`code`,`b`.`code` ;

-- --------------------------------------------------------

--
-- ビュー用の構造 `v_productgroup`
--
DROP TABLE IF EXISTS `v_productgroup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_productgroup`  AS  select `v_product`.`productGroup_code` AS `productGroup_code`,min(`v_product`.`productGroup_name`) AS `productGroup_name`,min(`v_product`.`unitName`) AS `unitName` from `v_product` group by `v_product`.`productGroup_code` order by `v_product`.`productGroup_code` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orders_no`,`lineNo`);

--
-- Indexes for table `orderfavorite`
--
ALTER TABLE `orderfavorite`
  ADD PRIMARY KEY (`customer_mail`,`productGroup_code`,`productItem_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `productgroup`
--
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `productitem`
--
ALTER TABLE `productitem`
  ADD PRIMARY KEY (`productGroup_code`,`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
