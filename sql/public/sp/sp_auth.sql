DELIMITER //
CREATE PROCEDURE auth_user(
  IN uemail varchar(20),
  OUT user_exists INT,
  )

  BEGIN

    IF EXISTS 
    (SELECT userid, email, upassword FROM tbl_users WHERE email = uemail LIMIT 1)
    THEN 
      SET user_exists = 1;
    ELSE 
      SET user_exists = 0;
    END IF;

    SELECT user_exists;

	END //
DELIMITER ;
