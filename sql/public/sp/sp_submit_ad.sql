DELIMITER //
CREATE PROCEDURE submit_ad(
  IN id varchar(12),
  IN title varchar(100),
  IN itemcondition tinyint(1),
  IN description varchar(1000),
  IN price decimal(10, 2),
  IN negotiable tinyint(1),
  IN created_date datetime,
  IN user_id int(11),
  IN location_id int(11),
  IN category_id int(11),
  IN image_1 varchar(40),
  OUT ad_created INT
  )

  BEGIN
    DECLARE rowcount INT;

    INSERT INTO tbl_adverts(adid, title, itemcondition, description, price, negotiable, created_date, status, flag, user_id, location_id, category_id) 
    VALUES(id, title, itemcondition, description, price, negotiable, created_date, 0, 0, user_id, location_id, category_id);

    SET rowcount = ROW_COUNT();

    IF 
        (rowcount = 1)
    THEN
        SET ad_created = 1;
        INSERT INTO tbl_adimage(img_1, ad_id, timestamp) 
        VALUES(image_1, last_insert_id(), CURRENT_TIMESTAMP());
    ELSE 
        SET ad_created = 0;
    END IF;

    SELECT ad_created;

	END //
DELIMITER ;
