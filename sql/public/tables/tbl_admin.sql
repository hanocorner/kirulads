--
-- Database: `kirulads_db`
--

-- --------------------------------------------------------

--
-- Table structure for `Admin`
--
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `username` int(20) NOT NULL,
  `password` varchar(300) NOT NULL, 
  `created_date` date NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Admin_log`
--

CREATE TABLE IF NOT EXISTS `tbl_users_log` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_agent` varchar(60) NOT NULL,
  `ip_address` varchar(60) NOT NULL,
  `platform` varchar(60) NOT NULL,
  `admin_id` int(11),
  PRIMARY KEY (`logid`),
  CONSTRAINT FK_adminLog FOREIGN KEY (admin_id)
  REFERENCES `tbl_admin`(`adminid`)
  ON DELETE CASCADE
)Engine InnoDB DEFAULT CHARSET=utf8;