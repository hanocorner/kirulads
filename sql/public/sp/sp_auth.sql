DELIMITER //
CREATE PROCEDURE authenticate_user(
  IN uemail varchar(50),
  OUT user_exists INT,
  OUT users_id INT,
  OUT u_pass varchar(300)
  )

  BEGIN

    SELECT 1, userid, u_password INTO @user_exists, @userid, @u_password FROM tbl_users WHERE email = uemail LIMIT 1;

    SET user_exists = @user_exists;
    SET users_id = @userid;
    SET u_pass = @u_password;

    SELECT user_exists, users_id, u_pass;

	END //
DELIMITER ;
