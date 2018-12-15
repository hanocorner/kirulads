--
-- Database: `kirulads_db`
--

-- --------------------------------------------------------

--
-- Table structure for `Users`
--
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(80) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `u_password` varchar(300) NOT NULL, 
  `registered_date` date NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Let reportid starts with 100
--
ALTER TABLE tbl_users AUTO_INCREMENT = 100;

--
-- Table structure for table `Users_log`
--

CREATE TABLE IF NOT EXISTS `tbl_users_log` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_agent` varchar(60) NOT NULL,
  `ip_address` varchar(60) NOT NULL,
  `platform` varchar(60) NOT NULL,
  `users_id` int(11),
  PRIMARY KEY (`logid`),
  CONSTRAINT FK_usersLog FOREIGN KEY (users_id)
  REFERENCES `tbl_users`(`userid`)
  ON DELETE CASCADE
)Engine InnoDB DEFAULT CHARSET=utf8;