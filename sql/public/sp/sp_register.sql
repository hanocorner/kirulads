DELIMITER //
CREATE PROCEDURE register_user(
  IN uname varchar(20),
  IN uemail varchar(20),
  IN unumber varchar(20),
  IN upass varchar(300),
  IN regDate date,
  IN lastlogin varchar(20),
  IN ipAddress varchar(20),
  IN os varchar(20),
  IN useragent varchar(20),
  OUT user_created INT
  )

  BEGIN
    DECLARE rowcount int;
    INSERT INTO tbl_users(fullname, email, phone_number, u_password, registered_date) VALUES(uname, uemail, unumber, upass, regDate);

    SET rowcount = ROW_COUNT();

    IF 
        (rowcount = 1)
    THEN
        SET user_created = 1;
        INSERT INTO tbl_users_log(last_login, ip_address, platform, user_agent, users_id) VALUES(lastlogin, ipAddress, os, useragent, LAST_INSERT_ID());
    ELSE 
        SET user_created = 0;
    END IF;

    SELECT user_created;

	END //
DELIMITER ;
