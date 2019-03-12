--
-- Database: `kirulads_db`
--

-- --------------------------------------------------------

--
-- Table structure for `Ads`
--
CREATE TABLE IF NOT EXISTS `tbl_adverts` (
  `adid` INT(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `item_condition` varchar(5) NOT NULL,
  `description` varchar(5000) NOT NULL, 
  `price` decimal(20) NOT NULL,
  `negotiable` varchar(5) NOT NULL,
  `created_date` datetime NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Let adid starts with 100
--
ALTER TABLE tbl_adverts AUTO_INCREMENT = 100;

-- --------------------------------------------------------

--
-- Let adid starts with 100
--
ALTER TABLE `kirulads_db`.`tbl_adverts` 
ADD UNIQUE INDEX `slug_UNIQUE` (`slug` ASC);

-- --------------------------------------------------------

--
-- Table structure for `Category`
--
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `parent` INT DEFAULT NULL,
  `slug` VARCHAR(60) NOT NULL,
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
  `slug` VARCHAR(60),
  PRIMARY KEY (`locid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for `Ad Image`
--
CREATE TABLE IF NOT EXISTS `tbl_adimage` (
  `imgid` INT(11) NOT NULL AUTO_INCREMENT,
  `ad_id`  INT(11) DEFAULT NULL,
  `main_image` VARCHAR(80) NOT NULL,
  `sub_images` VARCHAR(400) NOT NULL,
  `path_string` VARCHAR(60) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

