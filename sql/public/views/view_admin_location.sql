CREATE VIEW admin_location_data AS
SELECT IFNULL(t1.locid, t2.locid) AS locid, IFNULL(t2.name, t1.name) AS location, t1.name AS sublocation, IFNULL(t1.slug, t2.slug) AS slug
FROM tbl_location AS t1 
LEFT JOIN tbl_location AS t2 ON t2.locid = t1.parent
ORDER BY t1.parent Desc;