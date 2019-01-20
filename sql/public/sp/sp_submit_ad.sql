DELIMITER //
CREATE PROCEDURE submit_ad(
  IN title varchar(100),
  IN itemcondition tinyint(1),
  IN description varchar(1000),
  IN price decimal(10, 2),
  IN negotiable varchar(5),
  IN slug varchar(200),
  IN usid int(11),
  IN location_id int(11),
  IN category_id int(11),
  IN mainimg varchar(80),
  IN subimg varchar(400),
  IN path varchar(60)
  )

  BEGIN
    INSERT INTO tbl_adverts(title, item_condition, description, price, negotiable, created_date, slug, status, flag, user_id, location_id, category_id) 
    VALUES(title, itemcondition, description, price, negotiable, CURRENT_TIMESTAMP(), slug, 0, 0, usid, location_id, category_id);

    INSERT INTO tbl_adimage(ad_id, main_image, sub_images, path_string, timestamp) 
    VALUES(LAST_INSERT_ID(), mainimg, subimg, path,  CURRENT_TIMESTAMP());

	END //
DELIMITER ;
