DELIMITER //
CREATE PROCEDURE detail_fetch(
  IN category_id int(11),
  IN location_id int(11)
  )

  BEGIN
    SELECT t1.name AS subcategory, t2.name AS category FROM tbl_category AS t1 LEFT JOIN tbl_category AS t2 ON t1.parent = t2.catid WHERE t1.catid = category_id
    
    SELECT t1.name AS sublocation, t2.name AS location FROM tbl_location AS t1 LEFT JOIN tbl_location AS t2 ON t1.parent = t2.locid WHERE t1.locid = location_id

	END //
DELIMITER ;
