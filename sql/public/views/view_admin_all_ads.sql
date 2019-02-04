CREATE VIEW admin_all_ads AS
SELECT t1.adid, t1.title, DATE_FORMAT(t1.created_date, "%M %e, %Y") AS date, t1.price, t1.slug, t1.status, 
t2.name AS subcategory, t3.name AS category, 
t4.name AS sublocation, t5.name AS location
FROM tbl_adverts AS t1 
LEFT JOIN tbl_category AS t2 ON t1.category_id = t2.catid
LEFT JOIN tbl_category AS t3 ON t2.parent = t3.catid
LEFT JOIN tbl_location AS t4 ON t1.location_id = t4.locid
LEFT JOIN tbl_location AS t5 ON t4.parent = t5.locid
ORDER BY t1.adid desc;