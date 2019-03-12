DELIMITER //
CREATE PROCEDURE update_ad(
  IN id int(11),
  IN title varchar(100),
  IN itemcondition tinyint(1),
  IN description varchar(1000),
  IN price decimal(10, 2),
  IN negotiable varchar(5),
  IN slug varchar(200),
  IN location_id int(11),
  IN category_id int(11),
  IN token varchar(18)
  )

  BEGIN
    UPDATE tbl_adverts SET title=title, item_condition=itemcondition, description=description, price=price, negotiable=negotiable, slug=slug, location_id=location_id, category_id=category_id, token=token
    WHERE adid=id;

	END //
DELIMITER ;
