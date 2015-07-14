-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2015 at 03:43 PM
-- Server version: 5.0.95
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `femacdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fmc_brand`
--

CREATE TABLE IF NOT EXISTS `fmc_brand` (
  `brand_id` int(10) unsigned NOT NULL auto_increment,
  `supplier_id` int(10) unsigned NOT NULL default '0',
  `brand_code` varchar(45) NOT NULL default '',
  `brand_name` varchar(255) NOT NULL default '',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`brand_id`),
  KEY `FK_fmc_brand_1` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `fmc_brand`
--

INSERT INTO `fmc_brand` (`brand_id`, `supplier_id`, `brand_code`, `brand_name`, `modified_user`, `modified_date`) VALUES
(28, 3, '', 'Sveba Dahlen', 'eddie', '1307599852'),
(29, 4, '', 'Dynasty', 'eddie', '1307606531'),
(30, 5, '', 'Eka', 'eddie', '1307607351'),
(31, 6, '', 'Unox', 'eddie', '1307611674'),
(32, 7, '', 'Escher', 'eddie', '1309763582'),
(33, 9, '', 'Gram', 'eddie', '1309836648'),
(34, 8, '', 'Hoshizaki', 'eddie', '1309836658'),
(35, 10, '', 'Bear', 'eddie', '1313393864'),
(36, 2, '', 'Diosna', 'eddie', '1319178263'),
(37, 12, '', 'Tecno Stamap', 'eddie', '1319426072'),
(38, 13, '', 'BTH', 'eddie', '1320140932'),
(39, 14, '', 'Ram', 'eddie', '1320903665'),
(40, 15, '', 'BakeEquip', 'eddie', '1323326864'),
(41, 16, '', 'Friul', 'eddie', '1323331215'),
(42, 17, '', 'Kolb', 'eddie', '1364783844'),
(43, 18, '', 'Hoonved', 'eddie', '1364895603');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_category`
--

CREATE TABLE IF NOT EXISTS `fmc_category` (
  `category_id` int(10) unsigned NOT NULL auto_increment,
  `category_name` varchar(255) NOT NULL default '',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `fmc_category`
--

INSERT INTO `fmc_category` (`category_id`, `category_name`, `modified_user`, `modified_date`) VALUES
(17, 'Ovens', 'eddie', '1365553299'),
(18, 'Mixers', 'eddie', '1365553295'),
(19, 'Refrigeration Products', 'eddie', '1365553292'),
(20, 'Miscellaneous', 'eddie', '1313045389'),
(21, 'Bakeware', 'eddie', '1317182095'),
(22, 'Bread Slicers', 'eddie', '1317182695'),
(23, 'Ice Cream Equipment', 'eddie', '1317182718'),
(25, 'Dough Processing', 'eddie', '1365553287');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_faq`
--

CREATE TABLE IF NOT EXISTS `fmc_faq` (
  `faq_id` int(10) unsigned NOT NULL auto_increment,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sequance` int(10) unsigned NOT NULL default '0',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fmc_faq`
--

INSERT INTO `fmc_faq` (`faq_id`, `question`, `answer`, `sequance`, `modified_user`, `modified_date`) VALUES
(5, 'How do we go about enquiring about the item(s)?', 'Feel free to contact our sales department at +65 6454 7277 or drop us an email at info@femac.com.sg', 1, 'eddie', '1313375193'),
(6, 'After we have decided on the item(s) required, how do we go about ordering it? (Within Mainland Singapore)', 'A Purchasing Order has to be sent to us via fax, + 65 6458 7701 or email, info@femac.com.sg and also a 50% deposit prior to your order', 2, 'eddie', '1313375748'),
(7, 'What about the balance of payment? (Within Mainland Singapore)', 'The balance of payment has to be paid just before the delivery and installation of goods.', 3, 'eddie', '1313375665'),
(8, 'What is the validity of the quotation', 'All quotations given by FEMAC SINGAPORE PTE LTD,  must be accepted in writing within 30 days of\r\nthe date of the quotation. If any quotation given by Femac is not  accepted within 30days, such quotation will no\r\nlonger be binding , and is subjected to further confirmation with our sales personnel.', 4, 'eddie', '1367826092'),
(9, 'How long will the goods take to arrive?', 'The time frame for delivery depends on circumstances. Please check with our service staff for more details.', 5, 'eddie', '1367818182');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_member`
--

CREATE TABLE IF NOT EXISTS `fmc_member` (
  `member_id` int(10) unsigned NOT NULL auto_increment,
  `full_name` varchar(255) NOT NULL default '',
  `username` varchar(45) NOT NULL default '',
  `password` varchar(45) NOT NULL default '',
  `member_group` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fmc_member`
--

INSERT INTO `fmc_member` (`member_id`, `full_name`, `username`, `password`, `member_group`) VALUES
(1, 'Lucky Wong', 'luckywong', 'femac2008', 'admin'),
(2, 'Eddie Chua', 'eddie', 'femac2008', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_product`
--

CREATE TABLE IF NOT EXISTS `fmc_product` (
  `product_id` int(10) unsigned NOT NULL auto_increment,
  `sub_category_id` int(10) unsigned NOT NULL default '0',
  `brand_id` int(10) unsigned NOT NULL default '0',
  `product_model` varchar(45) NOT NULL default '',
  `product_name` varchar(255) NOT NULL default '',
  `product_description` text NOT NULL,
  `product_price` double default '0',
  `product_image_thumbnail` varchar(255) default NULL,
  `product_image_original` varchar(255) default NULL,
  `product_spec` varchar(255) default NULL,
  `product_video` text,
  `product_hit` int(11) NOT NULL default '0',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`product_id`),
  KEY `FK_fmc_product_1` (`sub_category_id`),
  KEY `FK_fmc_product_2` (`brand_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `fmc_product`
--

INSERT INTO `fmc_product` (`product_id`, `sub_category_id`, `brand_id`, `product_model`, `product_name`, `product_description`, `product_price`, `product_image_thumbnail`, `product_image_original`, `product_spec`, `product_video`, `product_hit`, `modified_user`, `modified_date`) VALUES
(11, 46, 28, 'Trendy Pizza Oven', 'Sveba Dahlen Trendy Pizza', 'The Trendy Pizza oven represents a new generation of pizza ovens from Sveba-Dahlen. This new approach includes our co-operation with experienced pizza bakers, has given us a modern and easy-to-use compact oven.\r\n\r\nThe oven¡¯s capacity and user-friendly panels (with built-in thermostat and an automatic ¡°turbo function¡±) give you an oven which lowers your operating costs. If you want to upgrade your restaurant, the Trendy Pizza oven is the obvious choice.', 0, 'upload_files/product_image/thumbnail/Trendy Pizza 4df077ae24f9d.jpg', 'upload_files/product_image/original/Trendy Pizza 4df077ae24f9d.jpg', 'upload_files/attachment/Trendy Pizza4ea11d8485753515d1e938de0a.pdf', '', 1585, 'eddie', '1368242838'),
(12, 71, 28, 'Deck Oven', 'Sveba Dahlen Classic Deck', 'The Classic Deck Oven can rightfully be called a baker''s classic. We designed the first model in 1992 and today Classic can be found all over the world. Anyone who has ever used a Classic has something good to say about it.\r\n\r\nMany praise its'' flexibility. The module system with six different oven sizes, and a wide range of accessories such as D-panel, stone soles, steam generator, underbuilt prover and turbo start, give each bakery the opportunity to create an oven which suits its requirements.\r\n\r\nOthers emphasize the quality. The important parts of the oven are built in stainless steel to ensure a maximum lifetime and minimal maintenance. \r\n\r\nWe are all satisfied with the baking results. Classic is an oven which appeals to bakers who want to bake in a genuinely traditional way, but with the most modern technology.\r\n\r\nWe can summarise the general consensus of opinion about Classic like this: it''s probably the best deck oven in the world.', 0, 'upload_files/product_image/thumbnail/Sveba Dahlen Template5164b7f4d0e0b.jpg', 'upload_files/product_image/original/Sveba Dahlen Template5164b7f4d0e0b.jpg', 'upload_files/attachment/Classic Deck4ea125a0554dc515d1e3ea5ccd.pdf', '', 2631, 'eddie', '1368242624'),
(13, 46, 28, 'DC-22P', 'Sveba Dahlen Classic Pizza', 'Sveba-Dahlen has delivered pizza ovens all over the world since 1970.The Classic Pizza Oven is a robust and reliable oven designed to meet every user''s requirements for functionality and convenience.\r\n\r\nThe classic pizza oven is a reliable and durable oven that comes in many sizes. It is built to withstand high loads. The well-insulated oven chamber keeps the heat inside the chamber, where it should be, and it has double halogen lighting. The instrument panel is angled towards the oven door so it''s easy to work with. The oven reaches the set temperature fast and each oven section, as well as, the top, bottom and front heat are separately controlled.\r\n\r\nThe Classic pizza ovens are modular, this means that you can tailor your oven according to your production. The ovens are available in four different widths from\r\n635 mm up to 1580 mm wide and can be built up to three decks high.', 0, 'upload_files/product_image/thumbnail/Classic Pizza4df0778d469a4.jpg', 'upload_files/product_image/original/Classic Pizza4df0778d469a4.jpg', 'upload_files/attachment/Classic Pizza4ea11c26aabed515d1e0ec50ce.pdf', '', 1261, 'eddie', '1368242453'),
(14, 47, 28, 'C-Series', 'C-Series', 'The C-series is the Sveba-Dahlen range of compact rack ovens, designed for installation in restricted spaces, to bake efficiently, evenly and easily.The C-series is available in four different sizes and all can be fuelled by electricity, oil or gas. Effective and even baking is obtained thanks to a well-balanced coordination of  large volume air flow, the high performance heat exchanger and the controllable steam system. This combination ensures flexible oven operation. The C-series is suitable for a wide range of products; baguettes, rolls and fancy breads as well as heavier bread types. This oven not only ensures superior baking quality, it is also easy to use.\r\n\r\nThe C-series is supplied as standard with the easy to use Sveba-Dahlen E-paneL With the E-panel, both manually controlled and pre-programmed baking can be selected, the different stages of the baking process being indicated by the symbols presented.  The ovens of the C-series are easy to keep clean due to the smooth surfaces of the stainless steel enclosure (both externally and internally). The large window in the oven door permits easy supervision of the baking process. The C-series has a small carbon footprint, highly effective, easy to use and flexible. \r\n\r\nFeatures:\r\n- Available in 4 different sizes\r\n- Thick insulation- the heat stays inside the oven chamber\r\n- Stainless steel exterior and interior for easy maintenance\r\n- IBS as standard; faster and more even baking\r\n- Large and effective heat exchange allows for quick heating and low energy consumption.\r\n- Easy control of the oven- it''s easy to learn how to use it\r\n- Large door window, made of heat-reflecting glass and good lighting allows the monitoring of the baking process.', 0, 'upload_files/product_image/thumbnail/Untitled-64df0766bdf32b.jpg', 'upload_files/product_image/original/Untitled-64df0766bdf32b.jpg', 'upload_files/attachment/C-Series4ea4c26544e9a515d1ddb00c24.pdf', '', 888, 'eddie', '1368174075'),
(15, 47, 28, 'V-Series', 'V-Series', 'The V-series of rack ovens is designed and manufactured to give you the best baking results, reliably and economically. Day and night, year after year.\r\n\r\nIBS, the Sveba-Dahlen patented system for alternating the direction of the rack rotation gives even and effective baking. The patented Cascad steam system incorporated in the V-series produces a powerful, clean and evenly distributed steam supply to give the best baking result.\r\n\r\nStandard Features:\r\n- Available in 3 different sizes\r\n- Ovens of all sizes can be heated by gas, electricity or oil\r\n- Thick insulation allows heat to remain within the oven chamber\r\n- Both exterior and interior of the oven is made out of stainless steel; keep temperature low and enables easy maintenance \r\n- Large door window made out of heat reflecting glass allows one to monitor the entire baking process\r\n- A large effective heat exchanger; quick heating and low energy consumption\r\n- User-friendly control panel\r\n- Double fans enable significant air flow to be distributed evenly inside the oven chamber', 0, 'upload_files/product_image/thumbnail/V-Series4df079b6b42f4.jpg', 'upload_files/product_image/original/V-Series4df079b6b42f4.jpg', 'upload_files/attachment/V-Series4ea4cf008be04515d1dbaa6863.pdf', '', 873, 'eddie', '1368242654'),
(16, 47, 28, 'S-Series', 'S-Series', 'In order to bake high-quality bread, it is not enough to use raw materials and bake-off products of high quality. You will also need ovens that utilizes and refines the raw materials! Sveba-Dahlen¡¯s mini rack ovens S200 and S400 are such ovens.\r\nSmall ovens which has the qualities that achieve baking results of a big oven. \r\n  \r\nThanks to its efficient steam capacity and heat which is evenly distributed\r\nthroughout the entire oven it raises all kinds of bread and gives them an attractive scent, taste and appearance. The fact that the ovens are quick and energy-efficient makes it an easy choice. Besides that, it is simple to install since it can pass through a standard door opening.\r\n\r\nFeatures:\r\n- Programmable for up to 35 recipes\r\n- Easy maintenance\r\n- Stainless-steel interior and exterior maintains a low temperature for the oven casing\r\n- Heavy-duty insulation ensuresthat the heat remains in the oven chamber\r\n- Large heat-reflecting double glazed door window and good lighting gives a good overview of the baking process', 0, 'upload_files/product_image/thumbnail/S-Series4df07c205ebbe.jpg', 'upload_files/product_image/original/S-Series4df07c205ebbe.jpg', 'upload_files/attachment/S-Series4ea4c9a1c0251515d1d7e510f8.pdf', '', 816, 'eddie', '1368172580'),
(17, 48, 30, 'KF 723 M', 'Eka KF 723 M', 'Average size perfect to place on bar or on small restaurants counters to cook pizzas, croissants, pasta dishes and other frozen foods.\r\n\r\nEquipped with 8 different settings, perfect for gastronomy, to cook also with grill or with the top or bottom heating elements (static cooking).\r\n\r\nFunctions:\r\n- Top heating-elem. + bottom heating-elem. (static cooking)\r\n- Top heating-element / bottom heating-element\r\n- Grill heating-element\r\n- Fan + grill heating-element\r\n- Fan + top heating-element - bottom heating-element\r\n- Fan + Circular heating-elem. (pressurised ventilation cooking)\r\n- Fan only (defreezing)\r\n\r\nProduct specifications:\r\nDimensions:690 x 545 x 510H mm\r\nTemperature Range: 50 - 300 Deg C\r\nTimer: 0 - 120 min\r\nWeight: 31kg\r\nVoltage:220-230V 50Hz\r\nNumber of Trays: 4 (425 x 345 mm)\r\n\r\nFunctions:\r\n- Top heating-elem. + bottom heating-elem. (static cooking)\r\n- Top heating-element / bottom heating-element\r\n- Grill heating-element\r\n- Fan + grill heating-element\r\n- Fan + top heating-element - bottom heating-element\r\n- Fan + Circular heating-elem. (pressurised ventilation cooking)\r\n- Fan only (defreezing)', 0, 'upload_files/product_image/thumbnail/Eka 723M4df082397e4f4.jpg', 'upload_files/product_image/original/Eka 723M4df082397e4f4.jpg', 'upload_files/attachment/KF 723M4e0d87ef47c39.pdf', '', 2350, 'eddie', '1368170652'),
(18, 48, 30, 'KF 965 M', 'Eka KF 965 M', 'This is the most powerful oven of the 4 tray series. It is equipped with 2 automatic reversing motors that allow an optimal hot air circulation within the cooking chamber, guaranteeing the best possible results and reduction of cooking times.\r\n\r\nEquipped with 8 different settings, perfect for gastronomy, to cook also with grill or with the top or bottom heating elements (static cooking).\r\n\r\nDimensions: 900 x 680 x 570H mm\r\nTemperature Range: 50 - 300 Deg C\r\nTimer: 0 - 120 min\r\nNumber of Trays: 4 (600 x 400 mm)', 0, 'upload_files/product_image/thumbnail/KF 965 M4df08951a2434.jpg', 'upload_files/product_image/original/KF 965 M4df08951a2434.jpg', '', '', 1286, 'eddie', '1365414165'),
(19, 48, 30, 'KF 981 UD', 'Eka KF 981 UD', 'Suitable for gastronomy, Bakery & Pastry.\r\nParticularly suitable for medium size restaurants (6 trays) which require contained ovens buy aim to combine big quantity with high quantity.\r\n\r\nThe immediate humidification in the cooking chamber guarantees a successful outcome to those dishes requiring a particularly humid atmosphere. \r\n\r\nProduct specifications:\r\nDimensions: 910 x 750 x 775H mm\r\nTemperature Range: 50 - 300 Deg C\r\nTimer: 0 - 120 min\r\nNumber of Trays: 6 (600 x 400 mm)\r\nWeight:87 kg', 0, 'upload_files/product_image/thumbnail/KF 981 UD4df08edf7744b.jpg', 'upload_files/product_image/original/KF 981 UD4df08edf7744b.jpg', '', '', 1472, 'eddie', '1368171006'),
(20, 48, 31, 'XF 133', 'Arianna', 'The LineMiss&#8482; line is the ideal solution for bakeries and pastry shops, LineMiss&#8482; obtain performances comparable to those of a large oven in a compact oven. Simplicity and perfection are the key deliveries of this oven line, which include many of the Unox technologies.\r\n\r\nThree possible control panel configurations are available to choose from to meet the user¡¯s needs. A wide range of accessories makes line LineMiss a complete oven line: High quality and simple design make it original and suitable for all baking needs.\r\n\r\nProduct specifications:\r\nDimensions: 600x509x650H mm\r\nMaximum temperature:300 Deg C\r\nTimer: 60 min\r\nNumber of Trays: 4 (460 x 330 mm)\r\nWeight: 31kg', 0, 'upload_files/product_image/thumbnail/Unox Template5158ed6e10bf4.jpg', 'upload_files/product_image/original/Unox Template5158ed6e10bf4.jpg', '', '', 1781, 'eddie', '1368171734'),
(21, 48, 30, 'KF 1010 UD', 'Eka KF 1010 UD', 'Functions:\r\nThe new KF 1010 UD is the most powerful electric oven of the Tecnoeka product range. Conceived for the gastronomy sector, it is also able to fully satisfy the demands of bakers and pastry chefs who search for quality and reliability. It is ideal for the medium and large restaurants/gastronomies which need an equipment which is able to cook  big quantities of food in short times, without renouncing quality. The regulated outlet steam device allows to optimize dishes without drying of food. Using the new KF1010 UD, food cooked will have no compromise in texture.  The 3 reversing motors allow the correct heat distribution in the cooking chambe. It supports 2 cooking methods: convection and convection with direct humidification. It is equipped with a thermo digital probe.\r\n\r\nQuality:\r\nThe materials and electrical components used to manufacture this product are conformed to the EC regulations.\r\n\r\nEXTRAS:\r\n- Presence of a manually adjustable exhausting steam control device for the cooking chamber.\r\n- Presence of a continuous discharge tank to collect water drops and condensation.\r\n- Presence of 2 halogen lamps on the door which generates all round illumination to light up all the trays.\r\n- Inspectable external glass even when the door is closed.\r\n- Possibility to set the fans at half speed which is fundamental in pastry for delicate\r\ncooking,\r\n\r\nDimensions (LXWXH): 965 x 845 X1250 mm\r\nTemperature Range: 50 - 270 Deg C\r\nWeight: 152kg\r\nNumber of Trays: 10 (600 x 400 mm)\r\nPower Supply:16kW\r\nVoltage:AC380/400V 3N 50/60Hz', 0, 'upload_files/product_image/thumbnail/KF 1010 UD4df0959d50191.jpg', 'upload_files/product_image/original/KF 1010 UD4df0959d50191.jpg', '', '', 2209, 'eddie', '1368170354'),
(22, 46, 28, 'TP-32', 'Sveba Dahlen Tunnel Pizza Oven', 'Sveba-Dahlen has developed, marketed and manufactured pizza ovens for over 30 years, and the TP tunnel pizza oven has been produced on the basis of this experience and know-how. The TP is a rapid and compact oven. The use of radiant heat technology allows oven temperature to reach up to 400¡ãC. This allows  high capacity and controlled baking of pizzas and other products, for example, pies and pitta bread. Sveba-Dahlen¡¯s TP tunnel pizza oven is available in two sizes, TP-1 and TP-2, with band widths of 585 and 900 mm respectively, both comprises of up to three sections vertically.The baking time required is between 2-10mins. This oven can churn out 500 pizza per hour.\r\n\r\nStandard features:\r\n- Two standard widths up to three section height\r\n- Stainless steel exterior and well-insulated oven chamber\r\n- Easy to use touch screen\r\n- Energy saving mode\r\n- Baking chambers in 2 zones\r\n- Canopies at infeed and outfeed ends\r\n- Removable extraction tray at infeed and outfeed\r\n- Self-cleaning oven chamber\r\n- Stainless steel mesh belt', 0, 'upload_files/product_image/thumbnail/Sveba Dahlen Template4ea121498a9fb.jpg', 'upload_files/product_image/original/Sveba Dahlen Template4ea121498a9fb.jpg', 'upload_files/attachment/Tunnel Pizza4ea120940a0b0515d1d2b6a3ad.pdf', '', 1203, 'eddie', '1368241812'),
(25, 65, 29, 'GM12', 'Dynasty 12L', 'This mixer has an advanced design and is a highly reliable professional food processing tool. This mixer is equipped with powerful 1/2HP motors and a strong gear driven desgin. Gears are made of heat- treated alloy steel and a hardness steel worm wheel. The mixer comes with 3 speeds. It also comes with 3 different type of accessories. All of which can be used to obtained optimum results for your products.\r\n\r\nStandard Accessories:\r\n- 1 Stainless steel bowl\r\n- 1 Mixing hook\r\n- 1 Flat beater\r\n- 1 Wire Whip\r\n\r\nOptional Accessories:\r\n- Safety guard (GM12A model)\r\n\r\nProduct Specifications:\r\n- Bowl: 11.4 L\r\n- Motor: 1/2 HP (0.375kW)\r\n- Agitator Speed (RPM): 60Hz: 151/272/530\r\n- Std 30 min timer\r\n- Nett weight: 35kg', 0, 'upload_files/product_image/thumbnail/GM124e0d560946982.jpg', 'upload_files/product_image/original/GM124e0d560946982.jpg', 'upload_files/attachment/GM 124e0d7d9bc3590515d1cc602730.pdf', '', 1148, 'eddie', '1368158091'),
(29, 63, 29, '17025k', '30kg Flour Spiral Mixer', '30kg Flour', 0, 'upload_files/product_image/thumbnail/17025K4e0d774ba0bf2.jpg', 'upload_files/product_image/original/17025K4e0d774ba0bf2.jpg', 'upload_files/attachment/Dynasty - HL-17025K4e48adda0d353515d1c41eae04.pdf', '', 1254, 'eddie', '1365496654'),
(26, 65, 29, 'HL-11012', 'Dynasty 19L', 'Features:\r\n- Table Model\r\n- Three fixed speed\r\n- Easy speed-shifting\r\n- 100% gear driven\r\n- Long-life gear box\r\n- Heavy duty construction\r\n- Powerful motor\r\n\r\nStandard Accessories\r\n- Spiral Dough arm\r\n- Flat beater\r\n- Wire whip\r\n- 19 L bowl\r\n\r\nOptional accessories:\r\n- C-Type Hook\r\n- 9.5L bowl\r\n- Spiral dough arm (for 9.5L bowl)\r\n- Flat beater (for 9.5L bowl)\r\n- Wire whip (for 9.5L bowl)\r\n- 15 min Timer\r\n- Safety Guard\r\n- Vegetable Slicer Attachment\r\n- Meat Grinder Attachment\r\n- Digital Control Panel\r\n\r\nProduct Specifications:\r\n- Bowl Capacity: 19L\r\n- Motor: 1/2HP (0.375Kw)\r\n- Agitator Speed (RPM): 60-cycle motor\r\n- Hub: Std\r\n- Nett Weight: 95kg w/o safety guard; 98kg with safety guard', 0, 'upload_files/product_image/thumbnail/110124e0d5899b1e5f.jpg', 'upload_files/product_image/original/110124e0d5899b1e5f.jpg', 'upload_files/attachment/HL-110124e0d7d7bf1a6a515d1ca9422ec.pdf', '', 1149, 'eddie', '1368157499'),
(27, 65, 29, 'HL-11030', 'Dynasty 30L', 'Features:\r\n- Stand Model\r\n- Three fixed speed\r\n- Easy Speed-Shifting\r\n- 100% gear driven\r\n- Long life gear-box\r\n- Heavy Duty Construction \r\n- Powerful Motor\r\n\r\nStandard Accessories\r\n- Spiral Dough arm\r\n- Flat beater\r\n- Wire whip\r\n- 28.5 L bowl\r\n\r\nOptional accessories:\r\n- 19 L bowl\r\n- Spiral dough arm (for 19 L bowl)\r\n- Flat beater (for 19 L bowl)\r\n- Wire whip (for 19 L bowl)\r\n- 15 min Timer\r\n- Safety Guard\r\n- Vegetable Slicer Attachment\r\n- Meat Grinder Attachment\r\n- Digital Control Panel\r\n\r\nProduct Specifications:\r\n- Bowl Capacity: 28.5L\r\n- Motor: 1HP (0.75Kw)\r\n- Agitator Speed (RPM): 60-cycle motor\r\n- Hub: Std\r\n- Nett Weight: 180kg w/o safety guard; 185kg with safety guard', 0, 'upload_files/product_image/thumbnail/110304e0d6b569be40.jpg', 'upload_files/product_image/original/110304e0d6b569be40.jpg', 'upload_files/attachment/HL-110304e0d7e3e59ef6515d1c89c120d.pdf', '', 609, 'eddie', '1368158655'),
(28, 65, 29, 'HL-11040', 'Dynasty 38L', 'Features:\r\n- Stand Model\r\n- Three fixed speed\r\n- Easy Speed-Shifting\r\n- 100% gear driven\r\n- Long life gear-box\r\n- Heavy Duty Construction \r\n- Powerful Motor\r\n\r\nStandard Accessories\r\n- Spiral Dough arm\r\n- Flat beater\r\n- Wire whip\r\n- 38 L bowl\r\n\r\nOptional accessories:\r\n- 19 L bowl\r\n- Spiral dough arm (for 19 L bowl)\r\n- Flat beater (for 19 L bowl)\r\n- Wire whip (for 19 L bowl)\r\n- 15 min Timer\r\n- Safety Guard\r\n- Vegetable Slicer Attachment\r\n- Meat Grinder Attachment\r\n- Digital Control Panel\r\n\r\nProduct Specifications:\r\n- Bowl Capacity: 38L\r\n- Motor: 1.5HP (1.125Kw)\r\n- Agitator Speed (RPM): 60-cycle motor\r\n- Hub: Std\r\n- Nett Weight: 200kg w/o safety guard; 205kg with safety guard', 0, 'upload_files/product_image/thumbnail/110404e0d6c20424b1.jpg', 'upload_files/product_image/original/110404e0d6c20424b1.jpg', 'upload_files/attachment/HL-110404e0d7ea8e6724515d1c5f68bfb.pdf', '', 529, 'eddie', '1368578285'),
(24, 49, 28, 'Tunnel', 'Tunnel Oven', 'Sveba-Dahlen has manufactured baking ovens in Sweden for more than 60 years. Today we have supplied more than 350 tunnel ovens to clients all over the world.\r\n\r\nOur extensive experience aims to provide correct appliances adapted to our clients needs. This enable us to offer a unique tunnel oven concept suitable for all conceivable types of products and requirements.\r\n\r\nSveba-Dahlen tunnel ovens are produced to match our client''s specific needs and can be used to bake products of all types.\r\n\r\nSveba-Dahlen tunnel ovens are well known all over the world for their flexibility, energy efficiency, high performance, high reliability and low maintenance cost.', 0, 'upload_files/product_image/thumbnail/tunnel Oven4e0d56ad08026.jpg', 'upload_files/product_image/original/tunnel Oven4e0d56ad08026.jpg', 'upload_files/attachment/Tunnel Oven4e0d872c47500515d1ced319a5.pdf', '', 1068, 'eddie', '1368241360'),
(43, 55, 33, 'Gram F930', 'F930', 'The 930 Series comprises top-quality refrigerator / freezers featuring competitive prices and economical operation. They are available in stainless steel. The 25 angle rails for baking plates (60x80cm) can be used individually.', 0, 'upload_files/product_image/thumbnail/Gram M9304e52f6fae67b8.jpg', 'upload_files/product_image/original/Gram M9304e52f6fae67b8.jpg', 'upload_files/attachment/F9304ea0c699996ec515d1a235ff3e.pdf', '', 1231, 'eddie', '1365411007'),
(41, 65, 35, 'RN 20', 'Bear 20L', 'Essential feature of the new 20L Bear Varimixer machines has been improved inside and out. Brand-new motors and new control systems make them more powerful than ever and they run faster at top speed. The standard model of the machine isnow in stainless steel and the three tools - whip, beater and hook - are also in stainless steel. Finally, the latest new feature is the Vari-Logic control panel with a REMIX function that makes it possible to develop your own work programs.\r\n\r\nStandard Accessories:\r\n- Stainless-steel bowl\r\n- Stainless-steel dough hook\r\n- Stainless-steel whip\r\n- Stainless-steel beater\r\n- Feed-Funnel', 0, 'upload_files/product_image/thumbnail/Bear RN204e520cf46cdaf.jpg', 'upload_files/product_image/original/Bear RN204e520cf46cdaf.jpg', 'upload_files/attachment/AR20 AR104ea0d6d0c4408515d1a85e6049.pdf', '', 724, 'eddie', '1368161057'),
(39, 65, 35, 'AR 30 VL-1', 'Bear 30L 40L 60L', 'Meet the daring new and stylish AR mixers and bring style and endurance into your kitchen or bakery.\r\n\r\nWe have kept the trusted sturdiness and high capacity engine and enhanced some of the decisive features of the AR models 30, 40 and 60 litres. Without compromising the all-familiar quality.\r\n\r\nFor the first time ever, power, function and design have been brought together. Experience the unique, all-inclusive performance:\r\n\r\n- Black stainless steel exterior\r\n- Digital Timer\r\n- Soft bowl lowring\r\n- Stainless steel beater\r\n\r\nBe the first to bring style and boldness to your production, without\r\ncompromising the trusted quality.\r\n\r\n30, 40 and 60 litres AR models available in black, stainless steel and of course, classic white.', 0, 'upload_files/product_image/thumbnail/Bear AR 30-40 VL-14e48cfd777335.jpg', 'upload_files/product_image/original/Bear AR 30-40 VL-14e48cfd777335.jpg', 'upload_files/attachment/AR30 40 604ea0dbf2c66fa515d1ac7c8efd.pdf', '', 712, 'eddie', '1368161188'),
(32, 83, 33, 'M 610', 'M610', 'Unique air distribution system prevents product drying and ensures the cabinet maintains a correct and uniform temperature throughout.\r\n\r\nElectronic control with built-in alarms and emergency programs for optimal food protection.\r\n\r\nThe cabinets are designed with a durable one piece easy to clean moulded grey ABS inner lining. The external front and side walls are in stainless or white finish, inside of the door, shelf supports and wall rails are stainless steel.\r\n\r\nFitted with 10 Pairs of support for bakery plates 40 x 60 cm, adjustable with a distance of 25mm', 0, 'upload_files/product_image/thumbnail/Gram M6104e128739e735f.jpg', 'upload_files/product_image/original/Gram M6104e128739e735f.jpg', 'upload_files/attachment/6104ea0eccc8452e515d1bb5cd992.pdf', '', 572, 'eddie', '1365413445'),
(75, 72, 29, 'HL-32004', 'Dynasty HL-32004', 'The most widely used reversible sheeter, designed for the Baking Industry Sanitation Standards, suitable for sheeting and stretching puff pastry, Danish bread, croissant dough, pie dough, cookie dough, strudel, marzipan and pizza dough\r\n\r\nFeatures:\r\n- Heavy duty aluminium alloy head housing\r\n- Safety guard on both sides of rollers\r\n- Easy control\r\n- Thickness adjustable between 3-50mm\r\n- Roller speed is approximate 540mm per second\r\n\r\nProduct specifications:\r\nBelt size (WXL mm): 500x2000\r\nRoller size (diameter X L mm): 88 x 520\r\nMotor: 1/2 Hp\r\nDimensions (LX WX H inches):2100X900 X1100\r\nNett weight: 160Lbs', 0, 'upload_files/product_image/thumbnail/HL-32004516378ba11a92.jpg', 'upload_files/product_image/original/HL-32004516378ba11a92.jpg', 'upload_files/attachment/HL3200451637ddc00d3a.pdf', '', 533, 'eddie', '1368167747'),
(76, 72, 29, 'HL-32005', 'Dynasty HL-32005', 'The most widely use reversible sheeter, designed for the Baking Industry Sanitation Standards. It is suitable for sheeting and stretching of puff pastry, Danish bread, croissant dough, pie dough, cookie dough, strudel, marzipan and pizza dough.\r\n\r\nFeatures:\r\n- Heavy duty aluminium alloy head housing\r\n- Safety guard on both sides of rollers\r\n- Easy control\r\n- Thickness adjustable between 3-50mm\r\n- Roller speed is approximate 540mm per second\r\n\r\nProduct Specifications:\r\nBelt size (WXL mm): 500x1700\r\nRoller size (diameter X L mm): 88 x 520\r\nMotor: 1/2 Hp\r\nDimensions (LX WX H inches):1800X900 X600\r\nNett weight: 130Lbs', 0, 'upload_files/product_image/thumbnail/HL-32005516379b858781.jpg', 'upload_files/product_image/original/HL-32005516379b858781.jpg', 'upload_files/attachment/HL3200551637d60b47c0.pdf', '', 318, 'eddie', '1368167691'),
(34, 68, 33, 'SF 930', 'Gram Upright Quick Chiller / Freezer', 'High capacity refrigeration system assures a quick chilling / freezing of products.\r\n\r\nUnique air distribution system prevents product drying and ensures the cabinet maintains a correct and uniform temperature throughout.\r\n\r\nElectronic control with time or temperature controlled chilling / freezing processes.\r\n\r\nCan be applied as:\r\n- Bakery Quick Chiller and Freezer\r\n- Bakery Storage Refrigerator and Freezer\r\n- Thawing cabinet\r\n\r\nFinish exterior/interior: Stainless/Stainless', 0, 'upload_files/product_image/thumbnail/Gram M9304e12a08a1921b.jpg', 'upload_files/product_image/original/Gram M9304e12a08a1921b.jpg', 'upload_files/attachment/SF 9304e12a08a4000e515d1b8ee11c2.pdf', '', 744, 'eddie', '1365415333'),
(35, 68, 33, 'SF 1500', 'Gram Roll-In Quick Chiller / Freezer', 'The SF 1500 Roll-In Quick Chiller / Freezer has a high capacity refrigeration system assures a quick chilling / freezing of products.\r\n\r\nUnique air distribution system prevents products drying and ensures the cabinet maintains a correct and uniform temperature throughout.\r\n\r\nElectronic control with time and temperature controlled chilling / freezing process', 0, 'upload_files/product_image/thumbnail/SF15004e12a3761502e.jpg', 'upload_files/product_image/original/SF15004e12a3761502e.jpg', 'upload_files/attachment/Gram SF15004ea0e3b098579515d1b4f042d1.pdf', '', 740, 'eddie', '1365415324'),
(38, 58, 40, 'CR1', 'Crepe Machine', 'The CR1 crepe machine is an automated crepe machine which is easy to use. This machine is suitable for both professional and non-professional chefs.\r\n\r\nA must-have for every gastronomists.\r\n\r\nProduct Specifications:\r\nVoltage: 220V 50/60 Hz\r\nDiameter: 200mm\r\nThickness: 0.8-1.2mm\r\nTemperature Range: 150-200 degree celsius\r\nTimer: 0-60s\r\nCapacity: 100-150pcs/hr\r\nMachine weight: 20kg\r\nDimensions (L X W X H mm): 428 X 320 X 542', 0, 'upload_files/product_image/thumbnail/Crepe Machine4e437fac11db0.jpg', 'upload_files/product_image/original/Crepe Machine4e437fac11db0.jpg', 'upload_files/attachment/Crepe Machine - BE-C2005164cfed21be7.pdf', '', 2450, 'eddie', '1367931053'),
(37, 57, 29, 'HL-G12SS', 'Meat Grinder', 'The Dynasty Meat Grinder is intended for heavy duty work in commercial food processing applications.\r\n\r\nFeatures:\r\n- Strict compliance with hygiene standard\r\n- Reliable under the most demanding conditions\r\n- Energy efficient motor and precision gear drive\r\n- Compact size, no sharp corners and seams\r\n- Attractive design suitable for any kitchen and supermarket\r\n- Forward & reverse switch\r\n- Design for easy maintenance \r\n- Conforms to all safety standards\r\n\r\nProduct Specifications:\r\n- Productivity: 120 kg/hr\r\n- Blade speed: 170RPM\r\n- Motor: 3/4HP\r\n- Dimensions: 250 X410 X410 mm\r\n- Weight: 30kg', 0, 'upload_files/product_image/thumbnail/Meat Grinder4e437ed06493a.jpg', 'upload_files/product_image/original/Meat Grinder4e437ed06493a.jpg', 'upload_files/attachment/Dynasty Meat Grinder4e437ed091281515d1b2a73f9f.pdf', '', 1020, 'eddie', '1368159005'),
(40, 65, 35, 'RN 10', 'Bear 10L', 'Essential feature of the new 10L Bear Varimixer machines has been improved inside and out. Brand-new motors and new control systems make them more powerful than ever and they run faster at top speed. The standard model of the machine isnow in stainless steel and the three tools - whip, beater and hook - are also in stainless steel. Finally, the latest new feature is the Vari-Logic control panel with a REMIX function that makes it possible to develop your own work programs.\r\n\r\nStandard Accessories:\r\n- Stainless-steel bowl\r\n- Stainless-steel dough hook\r\n- Stainless-steel whip\r\n- Stainless-steel beater\r\n- Feed-Funnel', 0, 'upload_files/product_image/thumbnail/Bear RN104e5201823caaf.jpg', 'upload_files/product_image/original/Bear RN104e5201823caaf.jpg', 'upload_files/attachment/AR20 AR104ea0d6e5e7546515d1aaa0e6bf.pdf', '', 987, 'eddie', '1368161072'),
(42, 65, 35, 'Bear Teddy', 'Bear 5L', 'The smallest Bear Varimixer, Teddy, is an exceptionally sturdy, useful table machine for daily production in bakeries, patisseries and kitchems or as a laboratory machine. Teddy is mobile and flexible due to its size. The multi-functional operation button is placed ergonomically correct on both sides of the mixer. Thus, Teddy can be operated from both sides which provides flexible placements possibilities.\r\n\r\nFunctions:\r\n- Cutting\r\n- Mincing\r\n- Mixing \r\n- Whipping\r\n\r\nBasic Accessories\r\n- Stainless-steel safety guard\r\n- Stainless-steel Bowl\r\n- Stainless-steel Whip\r\n- Stainless-steel Hook\r\n- Stainless-steel Beater\r\n- Feed Tray\r\n\r\nProduct specifications:\r\nDimensions (WX LX H mm): 222 X 462 X400 mm\r\nPower supply: 230V/ 2.5A\r\nHigh perfomance motor: 500W\r\n\r\nThe Teddy comes in multiple colors.\r\nAttachment drive is also standard.', 0, 'upload_files/product_image/thumbnail/Bear Teddy4e52157768118.jpg', 'upload_files/product_image/original/Bear Teddy4e52157768118.jpg', 'upload_files/attachment/Teddy4ea0ceae0c365515d1a452fe05.pdf', '', 1539, 'eddie', '1368160533'),
(44, 51, 29, 'HL-40T', 'Dynasty 40L Dual Head', '40L Dual Head Mixer\r\n\r\nPlease feel free to contact our staff if you have any queries.', 0, 'upload_files/product_image/thumbnail/Twin Head4e52fc1a7e478.jpg', 'upload_files/product_image/original/Twin Head4e52fc1a7e478.jpg', '', '', 975, 'eddie', '1338531799'),
(45, 83, 33, 'Gram K210', 'K210', 'With their width of 60cm and depth of 64cm the cabinets are ideal for kitchens with limited space.\r\nLower height Compact 210 Models are designed to fit under worktops in commercial workplaces', 0, 'upload_files/product_image/thumbnail/Gram Template4ea0e8c1d60ab.jpg', 'upload_files/product_image/original/Gram Template4ea0e8c1d60ab.jpg', 'upload_files/attachment/210 4104ea0e8c21d210515d194a5a1d1515d19e99bc73.pdf', '', 697, 'eddie', '1365415482'),
(46, 83, 33, 'Gram K410', 'K410', 'With their width of 60cm and depth of 64cm the cabinets are ideal for kitchens with limited space.', 0, 'upload_files/product_image/thumbnail/6104ea0ea74bda3a.jpg', 'upload_files/product_image/original/6104ea0ea74bda3a.jpg', 'upload_files/attachment/210 4104ea0ea74e8158515d19003f001515d19289f372.pdf', '', 537, 'eddie', '1365415462'),
(47, 83, 33, 'Gram F610', 'F610', 'Unique air distribution system prevents product drying and ensures the cabinet maintains a correct and uniform temperature throughout.\r\n\r\nElectronic control with built-in alarms and emergency programs for optimal food protection.\r\n\r\nThe cabinets are designed with a durable one piece easy to clean moulded grey ABS inner lining. The external front and side walls are in stainless or white finish, inside of the door, shelf supports and wall rails are stainless steel.\r\n\r\nFitted with 10 Pairs of support for bakery plates 40 x 60 cm, adjustable with a distance of 25mm', 0, 'upload_files/product_image/thumbnail/Gram M6104ea0ed227650d.jpg', 'upload_files/product_image/original/Gram M6104ea0ed227650d.jpg', 'upload_files/attachment/6104ea0ed22a0c34515d18d364dcc.pdf', '', 734, 'eddie', '1365413418'),
(48, 83, 33, 'Gram F210', 'F210', 'With their width of 60cm and depth of 64cm the cabinets are ideal for kitchens with limited space.\r\nLower height Compact 210 Models are designed to fit under worktops in commercial workplaces', 0, 'upload_files/product_image/thumbnail/Gram Template4ea0ef6fdaf6f.jpg', 'upload_files/product_image/original/Gram Template4ea0ef6fdaf6f.jpg', 'upload_files/attachment/210 4104ea0ef70104c0515d18b38c631.pdf', '', 708, 'eddie', '1365411055'),
(49, 83, 33, 'Gram F410', 'F410', 'With their width of 60cm and depth of 64cm the cabinets are ideal for kitchens with limited space.', 0, 'upload_files/product_image/thumbnail/410 Temp4ea0f027a19ab.jpg', 'upload_files/product_image/original/410 Temp4ea0f027a19ab.jpg', 'upload_files/attachment/210 4104ea0f027ccc81515d1889ec57a.pdf', '', 701, 'eddie', '1365411067'),
(50, 81, 33, 'Gram Gastro07', 'Gram Gastro M07', 'The Gastro 07 Series comprises of:\r\n\r\n1/1 GN counters,with two, three or four sections.\r\nFlat worktop or saladette worktop or without worktop.\r\nDoors, 1/2 drawers or 1/3 drawers.', 0, 'upload_files/product_image/thumbnail/Gram Gastro074ea1068ad7e79.jpg', 'upload_files/product_image/original/Gram Gastro074ea1068ad7e79.jpg', 'upload_files/attachment/Gastro Counter4ea1061ca4784515d18674b7bf.pdf', '', 719, 'eddie', '1367989283'),
(51, 81, 33, 'Gram Gastro08', 'Gram Gastro M08', 'The Gastro 08 series comprises of:\r\n\r\n2/1 GN counters with 2 or 3 sections. \r\nDoor on one to two sides. \r\nFlat worktop or saladette worktop or without worktop.\r\nWith or without rack', 0, 'upload_files/product_image/thumbnail/Gastro 084ea1075c18966.jpg', 'upload_files/product_image/original/Gastro 084ea1075c18966.jpg', 'upload_files/attachment/Gastro-Counter4ea1075c44a4f515d0e494d821.pdf', '', 624, 'eddie', '1367989189'),
(52, 81, 34, 'RTC-120/150/180SDA', 'Hoshizaki Undercounter Chiller (Depth 750mm series)', 'Features:\r\n- Cabinet defrost cycles are time initiated and temperature terminated\r\n- Compact slide out refrigeration unit for easy maintenance\r\n- Easy to clean\r\n- Intelligent temperature control with additional energy saving mode', 0, 'upload_files/product_image/thumbnail/180SNA4ea10b86a3aa7.jpg', 'upload_files/product_image/original/180SNA4ea10b86a3aa7.jpg', 'upload_files/attachment/RTC-180SNA4ea10b86d23ca4edf1885488eb515d18226f5fe.pdf', '', 740, 'eddie', '1368162407'),
(53, 63, 36, 'Diosna', 'Diosna SPV', 'The Diosna Spiral Mixer SPV will convince you with its performance in preparing all kinds of dough: from demanding wheatmeal dough to mixed bread dough to wholemeal dough.\r\n\r\nA unique characteristic of the Diosna spiral mixer is its large mixing tool, with its large working range from the bowl wall to beyond the centre of the bowl. Its special form ensures homogenous mixing and intesive kneading.\r\n\r\nBatches of every size are mixed with optimum results.\r\n\r\nFeatures:\r\n- Mobile stationary with a wheeled bowl\r\n- For 120kg,160kg, 200kg, and 240kg of dough\r\n- Smooth surfaces and floor clearance for easy cleaning\r\n- Standard clamp lock\r\n- Compact construction, also ideal for small and medium sized businesses\r\n- Easy to operate\r\n- Optical program memory with membrane keyboard and temperature control', 0, 'upload_files/product_image/thumbnail/Diosna SPV4ea11059521e0.jpg', 'upload_files/product_image/original/Diosna SPV4ea11059521e0.jpg', 'upload_files/attachment/Diosna SPV4ea1105987c52515d17fd54bfa.pdf', '', 741, 'eddie', '1368168499'),
(54, 63, 32, 'MR', 'Escher MR Premium', 'Our line of spiral mixers with removable bowl is only available in the Premium version. These mixers are capable of using all the power produced by the motor:\r\nthey are the ideal solution for stiff dough and intense use.\r\n\r\n These mixers can be used with one or more bowls which gives greater productivity and flexibility.\r\n\r\nTwo sturdy clamps are used to hook and position the trolley. When the bowl is placed against the frame of the machine, an electromagnetic induction feeler detects the presence of the trolley and the green push button located on the  controlpanel next to the bowl lights up. By holding this button down, the clamps hook onto the bowl and the mixer head is lowered.\r\n\r\nA rubber friction wheel transmits movement of the bowl: apart from its noise-free operation during the work cycle, this large-diameter wheel guarantees years of maintenance-free performance.', 0, 'upload_files/product_image/thumbnail/Escher4ea115a60c2c2.jpg', 'upload_files/product_image/original/Escher4ea115a60c2c2.jpg', 'upload_files/attachment/Escher4ea115a63794d515d17dbe2186.pdf', '', 716, 'eddie', '1368169657'),
(55, 72, 37, 'Lam', 'Tekno Stamap Lam', 'The LAM line of reversible Sheeters were specifically designed with the particular consideration for use within small bread-pastry bakeries, hotels and restaurants.  \r\n\r\nDimensions of the machine are quite compact, more so when the machine is in its storage position.  \r\n\r\nOnce you have finished, the conveyor tables can be raised up into a resting position, thereby occupying less space within the work area. This position also facilitates effective cleaning of the unit.  \r\n\r\nThe absence of uncovered and unprotected electrical components, motors, and chords, the detailed conformity of exterior panels, the simplicity of the removable and replaceable dough scrapers without use of tools and minimal time to do so, make this unit particularly simple and expedient to clean. Ergonomically designed handles facilitate ease of dough thickness selection with a high degree of accuracy and confidence. All of these features coupled with the general ease of use make this machine unparalled.', 0, 'upload_files/product_image/thumbnail/Tecno Stamap4ea4da1e4219b.jpg', 'upload_files/product_image/original/Tecno Stamap4ea4da1e4219b.jpg', 'upload_files/attachment/Lam Bench4ea4d95eedd7b515d17ae0b414.pdf', '', 920, 'eddie', '1368159185'),
(57, 74, 39, 'Ram SP Plus', 'Ram SP Plus', 'SP Plus 3/4 Automatic\r\n\r\nWorking Cycle: Automated Pressing and Cutting.\r\nRounding by Lever.\r\nDough cutting pressure and rounding chamber height adjustable by 20 Programs PLC.', 0, 'upload_files/product_image/thumbnail/Polin SP Plus4ebb670a47ce7.jpg', 'upload_files/product_image/original/Polin SP Plus4ebb670a47ce7.jpg', 'upload_files/attachment/Ram Plus4ebb670a79d03515d17659f35b.pdf', '', 679, 'eddie', '1368168094'),
(58, 74, 39, 'SPH Plus Fully Auto', 'SPH Plus Fully Auto', 'Work Cycle is completely automated: pressing, cutting and rounding.\r\nDough cutting under pressure and rounding chamber height adjustable by 20 programs.', 0, 'upload_files/product_image/thumbnail/RAM SPH4ebb695e3eaee.jpg', 'upload_files/product_image/original/RAM SPH4ebb695e3eaee.jpg', 'upload_files/attachment/Ram SPH Plus Ram4ebb695e6da7f515d16d9f018f.pdf', '', 716, 'eddie', '1368168060'),
(67, 79, 40, 'BE-604', '3 Tier Display with Straight Glass', '3 Tier Display with Straight Glass, an elegant addition to your Boutique Patisserie.\r\n\r\nAvailable in these dimensions: \r\n\r\n90 X 75 X 124 (cm)\r\n120 X75 X 124 (cm)\r\n150 X 75 X 124 (cm)\r\n180 X 75 X 124 (cm)\r\n210  X 75 X 124 (cm)\r\n\r\nPlease feel free to contact our staff if you have any queries.', 0, 'upload_files/product_image/thumbnail/BE 6044fc6e326ef498.jpg', 'upload_files/product_image/original/BE 6044fc6e326ef498.jpg', 'upload_files/attachment/BakeEquip-6044fc6e32722ae0.pdf', '', 739, 'luckywong', '1365054337'),
(66, 79, 40, 'BE-605-1', 'Single Tier Cake/Chocolate Display Showcase', 'Display chiller with an under-built storage drawer. \r\n\r\nAn elegant addition to your Boutique Patisserie. \r\n\r\nAvailable in these dimensions:\r\n\r\n124 X 78 X 112 (cm)\r\n154 X 78 X 112 (cm)\r\n184 X 78 X 112 (cm)\r\n214 X 78 X 112 (cm)\r\n\r\nAvailable in an assortment of colors.\r\n\r\nPlease feel free to contact our staff if you have any queries.', 0, 'upload_files/product_image/thumbnail/BakeEquip4fc6e162dd54b.jpg', 'upload_files/product_image/original/BakeEquip4fc6e162dd54b.jpg', 'upload_files/attachment/Bake-Equip-605-14fc6e082a2bea515d142b01cef.pdf', '', 1011, 'luckywong', '1365054507'),
(60, 75, 33, 'GA 930', 'Gram GA 930', 'The GA 930 is multi-functional (freezer / retarder / prover). It is ideal for use in bakeries and supermarkets with in-store bakery or bake-off outlet shops. It has an electronic control system and steam generator\r\n\r\nIt is designed to ensure that the baker has complete control over freezing, thawing, retarding and proving all types of dough.\r\n\r\nThe user-friendly electronic control has 5 individual programs, which determines the time and temperature for freezing, thawing, retarding and proving as well as air humidity for the retarding and proving period.\r\n\r\nThe program can also be set for continuously freezing, retarding or proving.\r\n\r\nThe innovative air distribution system ensures uniform air distribution, temperature and humidity throughout the cabinet.\r\n\r\nFinish, exterior/interior: Stainless/Stainless\r\n\r\nRight hand hinged self-closing door with lock.', 0, 'upload_files/product_image/thumbnail/Gram Template4ee05accbef8f.jpg', 'upload_files/product_image/original/Gram Template4ee05accbef8f.jpg', 'upload_files/attachment/Gram-GA9304ee05accea5f9515d169d00177.pdf', '', 958, 'eddie', '1367988300'),
(61, 77, 40, 'BE-OP300', 'BE-OPL300 / OPL400', 'Product specification\r\n\r\nModel: TA-OP300\r\n\r\nRefrigerant£º	R22\r\nSize (LDH): 960 X 700 X 1925 (mm)\r\n\r\nTemperature£º	 3~7 degrees C \r\nCompressor£º	Tecumseh\r\n\r\nElectrical connection	220V/50-60Hz/Sinlge Phase', 0, 'upload_files/product_image/thumbnail/Da An Avatar4ee05d608d542.jpg', 'upload_files/product_image/original/Da An Avatar4ee05d608d542.jpg', 'upload_files/attachment/TA-OP30050cff189e9535.pdf', '', 679, 'eddie', '1367988102'),
(71, 48, 30, 'KF 725 E UD', 'Eka KF 725 E UD', 'Functions:\r\nDesigned for the most demanding gastronomy, it also fully satisfies the bakery and pastry sector thanks to its precision.\r\n\r\nThe new 5 Tray 2/3 GN Eka is ideal for the medium restaurants/gastronomies that need versatile equipment able to cook in less time reaching high temperatures due to the powerful heating elements and allowing a perfect cooking uniformity.\r\nThe reversing motor allows the correct heat distribution in the cooking chamber.\r\n\r\nQuality:\r\nAll materials and electrical components used to manudacture this product are prodced in Europe and conformed to the EC regulations.\r\n\r\nPlus:\r\n99 Programs with 4 steps each\r\nSerial connector for PC\r\nCore Probe\r\n\r\nProduct Specifications:\r\nDimensions (WXDXH mm): 610X620X660\r\nWeight: 47 Kg\r\nCapacity: 5 Trays or Grids 2/3GN\r\nTrays distance: 80mm\r\nTemperature: 50-270 degree celsius\r\nVoltage: AC220/230V 50/60Hz\r\nPower supply: 3.2 kW\r\nAccessories: Water Tank and Pump Kit with pipe and filter, core probe and serial connector for PC.', 0, 'upload_files/product_image/thumbnail/72550d13c25b7ede.jpg', 'upload_files/product_image/original/72550d13c25b7ede.jpg', 'upload_files/attachment/Eka-725-Catalogue50d12a5059aa1515d10844ebc7.pdf', '', 862, 'eddie', '1368170321'),
(62, 78, 41, 'M30', 'M30', 'Pizza Sprint is designed and constructed to flatten and extend pizza dough. With Pizza Sprint the dough is worked cold and retains the same characteristics as pastry made by hand but with enormous savings in time and staff handling.\r\nAdjutable control for thickness and diameter. Construction\r\ncomplied with internation safety standards.\r\n\r\nThis machine churns out 800 pcs/hr.\r\n\r\nSpecifications subject to changes without notifications.\r\n\r\nProduct specifications:\r\nNett Weight: 30kg\r\nGross Weight: 40kg\r\nPower: 370W / 2.5A\r\nElectrical: 230v / 50Hz\r\nDough Weight: 100 - 210g\r\nDough Diameter: 19 - 30cm\r\nDimensions (LXWXH cm): 47x42x53\r\nThickness: 0.5-5.5mm', 0, 'upload_files/product_image/thumbnail/Friul Avatar4ee06ec0dc080.jpg', 'upload_files/product_image/original/Friul Avatar4ee06ec0dc080.jpg', 'upload_files/attachment/Friul-M304ee06ec11fa0f515d16414bca5.pdf', '', 729, 'eddie', '1368161850'),
(84, 78, 41, 'M33', 'M33', 'Heavy- Duty Dough Sheeter:\r\n- Completely in Stainless steel\r\n- Vanguard mechanics in stainless steel with chain transmission\r\n- Very quick\r\n- Obtain pizza diameters from 18~33 cm\r\n- Used as dough flattener\r\n- Adjustable dough thickness\r\n- Works pizza dough portions from 18~33 cm\r\n\r\nProduct Specifications:\r\nNett weight: 33kg\r\nGross weight: 49kg\r\nPower: 370W/ 2.5A\r\nCurrent-Tension: 230V/50Hz\r\nDimension (WxLXH cm): 41x42x72', 0, 'upload_files/product_image/thumbnail/Friul m33 Avatar4ee19c1d4b1c45189ef18abd58.jpg', 'upload_files/product_image/original/Friul m33 Avatar4ee19c1d4b1c45189ef18abd58.jpg', '', '', 299, 'eddie', '1368161592'),
(85, 63, 32, 'Escher M Premium', 'Escher M Premium', 'Fixed bowl spiral mixers with two motors suitable for bakeries of all sizes.\r\n-Two speeds\r\n-Two motors\r\n-Two way bowl rotation allowing to reverse the bowl in 1st speed\r\n-Belt transmission\r\n-Automatic timers\r\n-Stainless steel bowl, spiral tool and breaker bar\r\n-Optional stainless steel finish, stainless steel lid, touch screen and infrared   temperature measurement.\r\n\r\nCapacity available,\r\n50kg, 60kg, 80kg, 100kg, 120kg, 160kg, 200kg and 240kg', 0, 'upload_files/product_image/thumbnail/Escher5189f8e4d3954.jpg', 'upload_files/product_image/original/Escher5189f8e4d3954.jpg', 'upload_files/attachment/M Line & M Premium Line - 50 60 80 100 120 160 200 2405189f8e4f159d.pdf', '', 744, 'eddie', '1367998336'),
(64, 74, 41, 'M44/300', 'M44/300', 'Machine composed of one dough divider and one dough rounder.This machine is manufactured according to sanitary and safety norms.\r\n\r\nFeatures:\r\n- Completely automated, to prepare dough portions of different weights without accessories change.\r\n- Easy to disassemble and clean. \r\n- Completely in Stainless steel\r\n- Very strong and easy to use\r\n\r\nProduct specifications:\r\nNett Weight: 185kg\r\nGross Weight: 200kg\r\nDimension: 91X81X117cm\r\nPortion weight: 50-300grams\r\nTank Capacity: 44 lt\r\nHourly Production: 70-120kg/hr', 0, 'upload_files/product_image/thumbnail/Friul M44 Avatar4ee1a209c66eb.jpg', 'upload_files/product_image/original/Friul M44 Avatar4ee1a209c66eb.jpg', 'upload_files/attachment/Friul-M44.3004ee1a2dbcb30f515d15119f06a.pdf', '', 753, 'eddie', '1368159577'),
(65, 65, 40, 'VM 07A', 'VM 07A', 'The VM 07A has 3 main speeds and 5 variation within each speed.\r\nIn total, the VM 07A has a total of 15 Speeds. Planetary mixing action ensures perfect results.\r\n\r\nFeatures:\r\n\r\nDigital Timer\r\nPresence of safety guard with microswitch\r\nSimple hand lift for tool change and bowl removal\r\nPower-on overload reset button\r\n\r\nDimensions (HX L XW mm): 485 X430 X350 mm\r\n\r\nStandard Attachment: \r\n1 piece stainless steel bowl (7 liters)\r\n1 piece mixing hook\r\n1 piece flat beater\r\n1 piece whip', 0, 'upload_files/product_image/thumbnail/Untitled-151c10d36b9919.jpg', 'upload_files/product_image/original/Untitled-151c10d36b9919.jpg', 'upload_files/attachment/VM0751c10366e0e21.pdf', '', 635, 'eddie', '1371606326'),
(68, 79, 40, 'BE-903', '3 Tier Curve Glass Display', '3 Tier Curve Glass Display, the perfect addition to your Boutique Patisserie.\r\n\r\nBase comes in either marble or glass.\r\n(Glass base allows for logo printing.)\r\n\r\nAvailable in these dimensions: \r\n\r\n120 X 75 X 147 (cm)\r\n150 X 75 X 147 (cm)\r\n180 X 75 X 147 (cm)\r\n210 X 75 X 147 (cm)\r\n240 X 75 X 147 (cm)\r\n\r\nAvailable in an assortment of colors.\r\n\r\nPlease feel free to contact our staff if you have any queries.', 0, 'upload_files/product_image/thumbnail/BE-9034fc6ebc7332e5.jpg', 'upload_files/product_image/original/BE-9034fc6ebc7332e5.jpg', 'upload_files/attachment/BakeEquip 9034fc6ebc75a5b5515d130ed8aaa.pdf', '', 580, 'luckywong', '1365054286'),
(69, 80, 40, 'BE-804', 'Upright Refrigeration', 'A reliable addition to your ever growing need for cold storage.', 0, 'upload_files/product_image/thumbnail/4-door upright50bc6cc72dbd7.jpg', 'upload_files/product_image/original/4-door upright50bc6cc72dbd7.jpg', 'upload_files/attachment/Bake Equip Upright freezer - chiller50bc6d2a41ff9515d12b3b67c6.pdf', '', 468, 'luckywong', '1365054131');
INSERT INTO `fmc_product` (`product_id`, `sub_category_id`, `brand_id`, `product_model`, `product_name`, `product_description`, `product_price`, `product_image_thumbnail`, `product_image_original`, `product_spec`, `product_video`, `product_hit`, `modified_user`, `modified_date`) VALUES
(70, 81, 40, 'BE-UC 120', 'BakeEquip BE-UC 120', 'Stainless steel top for easy cleaning.\r\n\r\nProduct specifications:\r\n\r\n                                   Chiller                                                       Freezer\r\nRefrigerant                R134                                                          R404a\r\nTemperature           0-5 degree celsius                               up to -20 degree celsius\r\nCompressor             Danfoss                                                     Danfoss\r\nVoltage                   220V/1phase/50Hz                                     220V/1phase/50Hz', 0, 'upload_files/product_image/thumbnail/120 2d Counter50bc70b11e0ba.jpg', 'upload_files/product_image/original/120 2d Counter50bc70b11e0ba.jpg', 'upload_files/attachment/Bake-Equip-Undercounter-Refrigeration50bc70b151546515d11056f6ae.pdf', '', 472, 'eddie', '1367829966'),
(72, 71, 29, 'HL-41006', 'Dynasty HL-41006', 'A Single Phase Deck Oven of 15Amp which is great for small bakery and restaurants.\r\n\r\nMachine specifications:\r\nEGO temperature control\r\nDeck: 1\r\nTrays: 1\r\nTray size: 720 X460mm\r\nInternal dimension: 520 X760X 200mm\r\nExternal dimensions: 1120 X710 X490mm\r\nElectrical Load: 230 V/ 1 phase/ 3.5 kW\r\nMaximum Temperature: 300 degree celsius', 0, 'upload_files/product_image/thumbnail/17025K4e0d774ba0bf250f666a825333.jpg', 'upload_files/product_image/original/17025K4e0d774ba0bf250f666a825333.jpg', 'upload_files/attachment/Dynasty-Deck-Oven-HL4100650f666a8600f1515d0fe1b11b0 (3)5163af1c421aa.pdf', '', 704, 'eddie', '1368167447'),
(73, 82, 42, 'Atoll Speed 300', 'Atoll Speed 300', 'The most recent innovation from Kolb is the Atoll Speed, developed in joint effort of specialists from Switzerland, Germany and France. \r\n\r\nAtoll Speed perfectly combines powerful microwave and convection technologies and is able to significantly shorten baking times for a large variety of foods, while maintaining a freshly baked flavor and a crispy golden surface. \r\n\r\nAtoll Speed is ideally suited for Coffee Chains, QSR, Convenient Stores, Snack Bars, Restaurants, and Bakeries, where customers, who have little patience, appreciate warm food of high quality.\r\n\r\nAtoll speed 300:\r\n- Defrosts, re-heat, cook, bake and brown in one process. Start counting cooking time in seconds and not minutes.\r\n- Fully adjustable microwave power and hot air flow to reach your required result with any product.\r\n- Highly insulated baking chamber, low running costs.\r\n\r\nProduct specifications:\r\n- External dimensions (WXDXH mm): 540X695X420\r\n- Baking Chamer Dimensions (WXDXHmm): 320X320X170\r\n- Weight: 61kg\r\n- Voltage:230V\r\n- Current: 15A\r\n- Power: 3.4 kW', 0, 'upload_files/product_image/thumbnail/Kolb5158f3509d1fa.jpg', 'upload_files/product_image/original/Kolb5158f3509d1fa.jpg', 'upload_files/attachment/Kolb5158f350c0072515cd6dc287ae.pdf', '', 577, 'eddie', '1368162101'),
(74, 55, 33, 'Gram M930', 'M930', 'The M930 bakery refrigerator is ideal for storing products such as dough, cream cakes and any finished products. It''s ability to be used as a dry refrigerator and it''s flexible temperature range allows sensitive products can be stored under ideal conditions at all times.\r\n\r\nAll Baker930 cabinets offer low energy consumption with minimum environmental impact.', 0, 'upload_files/product_image/thumbnail/Gram M9305162898fcf2e3.jpg', 'upload_files/product_image/original/Gram M9305162898fcf2e3.jpg', 'upload_files/attachment/Gram M9305162898fe330a.pdf', '', 941, 'eddie', '1367928922'),
(77, 74, 29, 'HL-2130', 'Dynasty HL-2130', '&#8226;	Divides and rounds dough evenly\r\n&#8226;	Tilting of machine head for easy cleaning of cutting blades\r\n&#8226;	Easy adjustments for different dough weights\r\n&#8226;	Minimum maintenance required\r\n\r\n\r\nMachine specifications\r\n\r\nDough weight range: 30-110g\r\nNumber of pieces: 30\r\nMotor Power:  0.75KW (3-Phase)\r\n                       1.07 KW (1-phase)\r\nNet weight: 352 kg\r\nGross weight: 421 kg\r\nPacking dimension: 86 x76X 153cm', 0, 'upload_files/product_image/thumbnail/HL-21030516386a1df465.jpg', 'upload_files/product_image/original/HL-21030516386a1df465.jpg', 'upload_files/attachment/HL-2130 & 213651638912b01fa.pdf', '', 416, 'eddie', '1368167510'),
(78, 75, 33, 'GA 500', 'Gram GA 500', 'In these tailor-made cabinets (Euro-norm dimensions, 40x60 cm), wasted space is at an absolute minimum.\r\n\r\nThey are compact and occupy less than &frac12; m2 of floor space. Thus, there is always room for a BAKER 500 cabinet.\r\n\r\nStandard equipment for GA 500 is a set of 20 bakery rails which can later be supplemented to give a total of 33 rails. Flexible and adjustable bakery rails - reliable and rational work with dough products - compact storage and high refrigeration capacity - design that make cleaning easier and gives optimum hygiene; these are the bywords for BAKER 500 Bakery cabinets.', 0, 'upload_files/product_image/thumbnail/GA 5005163c04cc4abd.jpg', 'upload_files/product_image/original/GA 5005163c04cc4abd.jpg', 'upload_files/attachment/GA 5005163c4d0a8938.pdf', '', 408, 'eddie', '1367826665'),
(80, 84, 29, 'HL-310', 'Dynasty HL-310', 'Dough is guided through 2 set of rollers: upper and lower.  Dough is next moved to a flexible curling wire-net and pressure board. This aids in the curling and moulding of dough pieces gently. This ensures a smooth moulding process.\r\n\r\nProduct specifications:\r\nMolding range: 30-250g/240mm\r\nBelt width: 350mm\r\nDimensions (WXLXH mm): 900X580X1080mm\r\nWeight: 120 kg\r\n Motor: 1/2 Hp', 0, 'upload_files/product_image/thumbnail/HL3105163ccb02cc21.jpg', 'upload_files/product_image/original/HL3105163ccb02cc21.jpg', 'upload_files/attachment/HL-310 HL-31032 MM-2305163ccb032a3a.pdf', '', 474, 'eddie', '1367827606'),
(81, 84, 29, 'HL-31032', 'Dynasty HL-31032', 'Dough is guided through 2 set of rollers: upper and lower.  Dough is next moved to a flexible curling wire-net and pressure board. This aids in the curling and moulding of dough pieces gently. This ensures a smooth moulding process.\r\n\r\nProduct specifications:\r\nMolding range: 30-285g/350mm\r\nBelt width: 380mm\r\nDimensions (WXLXH mm): 1360X680X1100mm\r\nWeight: 200 kg\r\n Motor: 1 Hp', 0, 'upload_files/product_image/thumbnail/HL-310325163cf33a36f6.jpg', 'upload_files/product_image/original/HL-310325163cf33a36f6.jpg', 'upload_files/attachment/HL-310 HL-31032 MM-2305163ceec44f30.pdf', '', 575, 'eddie', '1367827085'),
(82, 84, 29, 'MM-230', 'Dynasty MM-230', 'Dough is guided through 2 set of rollers: upper and lower.  Dough is next moved to a flexible curling wire-net and pressure board. This aids in the curling and moulding of dough pieces gently. This ensures a smooth moulding process.\r\n\r\nProduct specifications:\r\nMolding range: 30-350g/240mm\r\nBelt width: 340mm\r\nDimensions (WXLXH mm): 830X520X1050mm\r\nWeight: 145 kg\r\n Motor: 1/2 Hp', 0, 'upload_files/product_image/thumbnail/MM-2305163cf173688e.jpg', 'upload_files/product_image/original/MM-2305163cf173688e.jpg', 'upload_files/attachment/HL-310 HL-31032 MM-2305163cf173c630.pdf', '', 447, 'eddie', '1367826933'),
(83, 73, 38, 'BKW(S) 7000', 'BTH BKW(S) 7000', 'Description:\r\n\r\nThe BKW(S) 7000 is an essential addition to your egg industry for the process of          efficiently breaking and the seperation of egg yolks and whites.\r\n\r\nBuilt: Stainless Steel\r\nRate: Up to 7000 eggs/hour', 0, 'upload_files/product_image/thumbnail/BTH5163d29b9f06e.jpg', 'upload_files/product_image/original/BTH5163d29b9f06e.jpg', 'upload_files/attachment/BKW(S) 70005163d29baf28a.pdf', '', 752, 'eddie', '1368158743');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_site_content`
--

CREATE TABLE IF NOT EXISTS `fmc_site_content` (
  `content_id` int(10) unsigned NOT NULL auto_increment,
  `page_id` int(10) unsigned NOT NULL default '0',
  `content` text NOT NULL,
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`content_id`,`page_id`),
  KEY `FK_fmc_site_content_1` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fmc_site_content`
--

INSERT INTO `fmc_site_content` (`content_id`, `page_id`, `content`, `modified_user`, `modified_date`) VALUES
(7, 1, 'Femac is the leading supplier of of bakery equipment and other food processing equipment.\r\n\r\nOur range of equipment includes the followings:\r\n\r\n1) Mixers ¨C Planetary, Spiral & Horizontal Mixers\r\n2) Bread Makeup Equipment ¨C Bun Divider & Rounder, Continuous Divider Rounder System, Industrial bread, pizza & donut production plant.\r\n3) Pastry Equipment ¨C Pastry Sheeters & Pastry production Equipment.\r\n4) Baking Ovens ¨C Deck, Rack & Tunnel Ovens\r\n5) Bake-off Equipment, kitchen equipment and stainless steel equipment \r\n6) Food Encrusting Machine \r\n7) Egg process Equipment ¨C Egg Cracker, Egg White & Yolk Separator, Egg washer & cleaner equipment.\r\n8) Baking Accessories and Baking Utensils ¨C a wide range of baking trays for your baking needs.\r\n\r\nThrough years of experience, we have built up an understanding of our customers and have learnt how to adapt our products to our customers needs.\r\n\r\nBeing in constant touch with our customers and our principles, Femac not only meets the customers'' requirements, and, at the same time, provide practical solutions to our customers.\r\n\r\nFor Femac, success in baking depends on a number of factors. An investment in quality equipment from a reliable supplier cannot be compromised.', 'eddie', '1367819041'),
(8, 3, '<ul type="square">\r\n<li><a href="index.php">Home</a></li>\r\n<li><a href="aboutus.php">About Us</a></li>\r\n<li><a href="products.php">Products</a></li>\r\n<ol type="1">\r\n<li><b>Miscellaneous</b></li>\r\n<ol type="a">\r\n<li>Crepe Machine</li>\r\n<li>Food Processor</li>\r\n<li>Meat Grinder</li>\r\n</ol>\r\n<li><b>Mixer</b></li>\r\n<ol type="a">\r\n<li>Dual Head</li>\r\n<li>Horizontal</li>\r\n<li>Planetary</li>\r\n<li>Spiral</li>\r\n</ol>\r\n<li><b>Oven</b></li>\r\n<ol type="a">\r\n<li>Convection</li>\r\n<li>Deck</li>\r\n<li>Pizza</li>\r\n<li>Rotary Rack</li>\r\n<li>Tunnel</li>\r\n</ol>\r\n<li><b>Refrigeration</b></li>\r\n<ol type="a">\r\n<li>Blast Freezer</li>\r\n<li>Chiller</li>\r\n<li>Freezer</li>\r\n</ol>\r\n</ol>\r\n<li><a href="services.php">Services</a></li>\r\n<li><a href="faq.php">FAQ</a></li>\r\n<li><a href="contactus.php">Contact Us</a></li>\r\n</ul>																																	', 'eddie', '1313132880'),
(9, 2, 'With our motto ¡°Customer satisfaction guaranteed¡± in mind, we, at Femac Singapore Pte Ltd, strive to be the ¡°bakery equipment supplier and service provider of choice¡± by providing superior services to our valued customers. We will ensure a stress-free working experience with us by being the most customer-focused and cost efficient bakery equipment company in every market we serve.\r\n\r\nThe following are a list of services that we provide:\r\n\r\nSales:\r\n&#8226;	Local and export sales (Bakery machinery and Spare parts)\r\n\r\nBakery Machinery\r\nOur range of equipment includes: \r\n&#10146;	Mixers ¨C Planetary, Spiral & Horizontal Mixers\r\n&#10146;	Bread Makeup Equipment ¨C Bun Divider & Rounder, Continuous Divider Rounder System, Industrial bread, pizza & donut production plant.\r\n&#10146;	Pastry Equipment ¨C Pastry Sheeters & Pastry production Equipment.\r\n&#10146;	Baking Ovens ¨C Deck, Convection, Rack & Tunnel Ovens\r\n&#10146;	Bake-off Equipment, kitchen equipment and stainless steel equipment \r\n&#10146;	Food Encrusting Machine \r\n&#10146;	Egg processing Equipment ¨C Egg Cracker, Egg White & Yolk Separator, Egg washer & cleaner equipment.\r\n&#10146;	Baking Accessories and Baking Utensils ¨C a wide range of baking trays for you baking needs.\r\nSpare Parts\r\n&#10146;	We supply spare parts for a wide range of brands (If you need it, we will get it for you !!!!)\r\n\r\n&#8226;	Sales consultation\r\n\r\nServicing of Equipment:\r\n\r\n&#8226;	Maintenance and repair', 'eddie', '1367827171');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_site_page`
--

CREATE TABLE IF NOT EXISTS `fmc_site_page` (
  `page_id` int(10) unsigned NOT NULL auto_increment,
  `page_name` varchar(45) NOT NULL default '',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fmc_site_page`
--

INSERT INTO `fmc_site_page` (`page_id`, `page_name`, `modified_user`, `modified_date`) VALUES
(1, 'About Us', 'luckywong', ''),
(2, 'Services', 'luckywong', ''),
(3, 'Site Map', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_sub_category`
--

CREATE TABLE IF NOT EXISTS `fmc_sub_category` (
  `sub_category_id` int(10) unsigned NOT NULL auto_increment,
  `category_id` int(10) unsigned NOT NULL default '0',
  `sub_category_name` varchar(255) NOT NULL default '',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`sub_category_id`,`category_id`),
  KEY `FK_fmc_sub_category_1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `fmc_sub_category`
--

INSERT INTO `fmc_sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `modified_user`, `modified_date`) VALUES
(46, 17, 'Pizza', 'eddie', '1365414105'),
(47, 17, 'Rotary Rack', 'eddie', '1365414096'),
(48, 17, 'Convection / Combi', 'eddie', '1365414090'),
(49, 17, 'Tunnel', 'eddie', '1365414079'),
(51, 18, 'Dual Head', 'eddie', '1309496149'),
(53, 18, 'Horizontal', 'eddie', '1309496105'),
(55, 19, 'Bakery Cabinet', 'eddie', '1366017052'),
(57, 20, 'Meat Grinder', 'eddie', '1313045420'),
(58, 20, 'Crepe Machine', 'eddie', '1313045434'),
(63, 18, 'Spiral', 'eddie', '1365496672'),
(65, 18, 'Planetary', 'eddie', '1365412817'),
(68, 19, 'Quick Chillers / Freezers', 'eddie', '1365414608'),
(71, 17, 'Deck', 'eddie', '1365414002'),
(72, 25, 'Reversible Sheeter', 'eddie', '1365412652'),
(73, 20, 'Egg Processing Machine', 'eddie', '1320140765'),
(74, 25, 'Dough Divider / Rounder', 'eddie', '1365493052'),
(75, 25, 'Bakery Cabinet', 'eddie', '1365412556'),
(77, 19, 'Open Refrigeration Showcase', 'eddie', '1365412625'),
(78, 25, 'Pizza / Dough Flattener', 'eddie', '1365412620'),
(79, 19, 'Display Showcase', 'eddie', '1338433066'),
(80, 19, 'Upright Refrigeration', 'eddie', '1365412613'),
(81, 19, 'Counter Chiller', 'eddie', '1365412608'),
(82, 17, 'Microwave Convection', 'eddie', '1364784214'),
(83, 19, 'Compact Refrigerators & Freezers', 'eddie', '1365412597'),
(84, 25, 'Dough Moulder', 'eddie', '1365493966');

-- --------------------------------------------------------

--
-- Table structure for table `fmc_supplier`
--

CREATE TABLE IF NOT EXISTS `fmc_supplier` (
  `supplier_id` int(10) unsigned NOT NULL auto_increment,
  `supplier_name` varchar(45) NOT NULL default '',
  `modified_user` varchar(45) NOT NULL default '',
  `modified_date` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `fmc_supplier`
--

INSERT INTO `fmc_supplier` (`supplier_id`, `supplier_name`, `modified_user`, `modified_date`) VALUES
(2, 'Diosna', 'eddie', '1241703399'),
(3, 'Sveba Dahlen', 'eddie', '1307599729'),
(4, 'Hsiao Lin', 'eddie', '1307606516'),
(5, 'TeknoEka', 'eddie', '1307607427'),
(6, 'Unox', 'eddie', '1307611662'),
(7, 'Escher', 'eddie', '1309763553'),
(8, 'Hoshizaki', 'eddie', '1309836612'),
(9, 'Gram', 'eddie', '1309836636'),
(10, 'Wodchow', 'eddie', '1313393852'),
(11, 'Hoshizaki', 'eddie', '1319176678'),
(12, 'Tekno Stamap', 'eddie', '1365493553'),
(13, 'BTH', 'eddie', '1320140924'),
(14, 'Polin', 'eddie', '1320903655'),
(15, 'BakeEquip', 'eddie', '1323326828'),
(16, 'Friul', 'eddie', '1323331204'),
(17, 'Kolb', 'eddie', '1364783827'),
(18, 'Hoonved', 'eddie', '1364895612');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fmc_brand`
--
ALTER TABLE `fmc_brand`
  ADD CONSTRAINT `FK_fmc_brand_1` FOREIGN KEY (`supplier_id`) REFERENCES `fmc_supplier` (`supplier_id`);

--
-- Constraints for table `fmc_site_content`
--
ALTER TABLE `fmc_site_content`
  ADD CONSTRAINT `FK_fmc_site_content_1` FOREIGN KEY (`page_id`) REFERENCES `fmc_site_page` (`page_id`);

--
-- Constraints for table `fmc_sub_category`
--
ALTER TABLE `fmc_sub_category`
  ADD CONSTRAINT `FK_fmc_sub_category_1` FOREIGN KEY (`category_id`) REFERENCES `fmc_category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
