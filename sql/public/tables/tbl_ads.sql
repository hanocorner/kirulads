--
-- Database: `kirulads_db`
--

-- --------------------------------------------------------

--
-- Table structure for `Ads`
--
CREATE TABLE IF NOT EXISTS `tbl_adverts` (
  `adid` varchar(12) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `condition` tinyint(1) NOT NULL,
  `description` varchar(1000) NOT NULL, 
  `price` decimal(10, 2) NOT NULL,
  `negotiable` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Insert default query for advert table
-- 

INSERT INTO `tbl_adverts`(adid, created_date, status, flag) VALUES(CONCAT('KADS', '-', 1000000), 2018-12-29, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for `Category`
--
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `parent` INT DEFAULT NULL,
  `image` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for `Location`
--
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `locid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `parent` INT DEFAULT NULL,
  `image` VARCHAR(60),
  PRIMARY KEY (`locid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for `Ad Image`
--
CREATE TABLE IF NOT EXISTS `tbl_adimage` (
  `imgid` INT(11) NOT NULL AUTO_INCREMENT,
  `img_1` VARCHAR(40) NOT NULL,
  `ad_id`  varchar(12) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SELECT t1.title, t1.category_id, t1.created_date FROM tbl_adverts AS t1 LEFT JOIN tbl_category AS t2 ON t1.category_id = t2.catid LEFT JOIN tbl_category AS t3 ON t2.parent = t3.catid WHERE t3.name = 'Property';

SELECT t1.title, t1.category_id, t1.created_date FROM tbl_adverts AS t1 LEFT JOIN tbl_category AS t2 ON t1.category_id = t2.catid LEFT JOIN tbl_category AS t3 ON t2.parent = t3.catid WHERE t3.name = 'Property' AND t2.name = 'Land';