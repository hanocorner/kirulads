CREATE VIEW admin_category_data AS
SELECT IFNULL(t1.catid, t2.catid) AS catid, IFNULL(t2.name, t1.name) AS category, t1.name AS subcategory, IFNULL(t1.slug, t2.slug) AS slug
FROM tbl_category AS t1 
LEFT JOIN tbl_category AS t2 ON t2.catid = t1.parent
ORDER BY t1.parent Desc;