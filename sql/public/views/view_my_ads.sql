--
-- Database: `kirulads_db`
--

-- --------------------------------------------------------

--
-- View for `MY Ads`
--
CREATE VIEW my_ad_data AS
SELECT t1.adid, t1.title, t1.status, t1.user_id AS userid, t2.img_1, t3.name AS subcategory, t4.name AS category
FROM tbl_adverts AS t1 
LEFT JOIN tbl_adimage AS t2 ON t1.adid = t2.ad_id
LEFT JOIN tbl_category AS t3 ON t1.category_id = t3.catid
LEFT JOIN tbl_category AS t4 ON t3.parent = t4.catid
WHERE t1.user_id = t2.usid
ORDER BY adid DESC
