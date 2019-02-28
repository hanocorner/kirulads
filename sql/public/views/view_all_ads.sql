--
-- View for `All Ads`
--
CREATE VIEW all_ads AS
SELECT t1.adid, t1.status, t1.title, DATE_FORMAT(t1.created_date, "%M %e, %Y") AS date, t1.price, t1.slug, t2.main_image, t2.path_string, 
t3.name AS subcategory, t4.name AS category, t3.slug AS cat_child_slug, t4.slug AS cat_parent_slug,
t5.name AS sublocation, t6.name AS location, t5.slug AS loc_child_slug, t6.slug AS loc_parent_slug
FROM tbl_adverts AS t1 
LEFT JOIN tbl_adimage AS t2 ON t1.adid = t2.ad_id
LEFT JOIN tbl_category AS t3 ON t1.category_id = t3.catid
LEFT JOIN tbl_category AS t4 ON t3.parent = t4.catid
LEFT JOIN tbl_location AS t5 ON t1.location_id = t5.locid
LEFT JOIN tbl_location AS t6 ON t5.parent = t6.locid
WHERE t1.flag = 0
ORDER BY t1.adid desc;