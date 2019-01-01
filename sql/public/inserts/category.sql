INSERT INTO tbl_category(catid, name, parent, image)
VALUES
(100, 'Electronics', 0, 'electronics.png'),
(101, 'Vehicles', 0, 'vehicles.png'),
(102, 'Property', 0, 'property.png'),
(103, 'Home & Garden', 0, 'home-garden.png'),
(104, 'Fashion, Health & Beauty', 0, 'fashion-health-beauty.png'),
(105, 'Hobby, Sport & Kids', 0, 'hobby-sport.png'),
(107, 'Business & Industry', 0, 'business-industry.png'),
(108, 'Services', 0, 'services.png'),
(109, 'Education', 0, 'education.png'),
(110, 'Animals', 0, 'animals.png'),
(111, 'Food & Agriculture', 0, 'food-agriculture.png'),
(112, 'Other', 0, 'other.png');

INSERT INTO tbl_category(catid, name, parent, image)
VALUES
(113, 'Mobile Phones', 100, 'no'),
(114, 'Mobile Phone Accessories', 100, 'no'),
(115, 'Computers & Tablets', 100, 'no'),
(116, 'Computer Accessories', 100, 'no'),
(117, 'TVs', 100, 'no'),
(118, 'TV & Video Accessories', 100, 'no'),
(119, 'Cameras & Camcorders', 100, 'no'),
(120, 'Audio & MP3', 100, 'no'),
(121, 'Electronic Home Appliances', 100, 'no'),
(122, 'Air Conditions & Electrical fittings', 100, 'no'),
(123, 'Video Games & Consoles', 100, 'no'),
(124, 'Other Electronics', 100, 'no');

SELECT t1.name, t1.catid FROM tbl_category AS t1 
LEFT JOIN tbl_category AS t2 ON t1.catid = t2.parent
WHERE t1.catid = 100