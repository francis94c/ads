#
# TABLE: ad_type
#
CREATE TABLE ad_types (id INT(1) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(10))
Engine=InnoDB;

INSERT INTO ad_types (id, name) VALUES
(1, "text"),
(2, "image"),
(3, "v-text"),
(4, "v-image");

#
# TABLE: ads
#
CREATE TABLE ads (id INT(7) AUTO_INCREMENT PRIMARY KEY, ad_type INT(1),
name VARCHAR(100) NOT NULL, _text TEXT, image VARCHAR(20), clicks INT(7) DEFAULT 0,
max_clicks INT (7) DEFAULT 0, expire DATETIME,FOREIGN KEY (ad_type) REFERENCES
ad_types(id)) Engine=InnoDB;
