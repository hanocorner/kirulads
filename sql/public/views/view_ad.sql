CREATE VIEW fetch_ad AS
SELECT t1.adid, t1.title, t1.item_condition, t1.description, t1.negotiable, DATE_FORMAT(t1.created_date, "%M %e, %Y") AS date, t1.price, t1.slug, t2.main_image, t2.sub_images, t2.path_string, t3.name AS subcategory, t4.name AS category, t5.name AS sublocation, t6.name AS location, t7.fullname, t7.phone_number
FROM tbl_adverts AS t1 
LEFT JOIN tbl_adimage AS t2 ON t1.adid = t2.ad_id
LEFT JOIN tbl_category AS t3 ON t1.category_id = t3.catid
LEFT JOIN tbl_category AS t4 ON t3.parent = t4.catid
LEFT JOIN tbl_location AS t5 ON t1.location_id = t5.locid
LEFT JOIN tbl_location AS t6 ON t5.parent = t6.locid
LEFT JOIN tbl_users AS t7 ON t1.user_id = t7.userid
WHERE t1.status = 1 
AND t1.flag = 0;