DROP DATABASE IF EXISTS pawsrus;
CREATE DATABASE pawsrus;
USE pawsrus;

CREATE TABLE users (
	user_id INT AUTO_INCREMENT NOT NULL,
	user_email VARCHAR(255) NOT NULL UNIQUE,
	user_password VARCHAR(255) NOT NULL,
	PRIMARY KEY (user_id)
);

CREATE TABLE orders (
	order_id INT AUTO_INCREMENT NOT NULL,
	order_date DATE NOT NULL,
	order_price DECIMAL(10, 2) NOT NULL,
    user_id INT NOT NULL,
	PRIMARY KEY (order_id),
	INDEX cusomer_id (user_id)
);

CREATE TABLE orderIndex (
	order_id INT NOT NULL,
	product_id INT NOT NULL,
	INDEX order_id (order_id),
	INDEX product_id (product_id)
);

CREATE TABLE products (
	product_id INT AUTO_INCREMENT NOT NULL,
    product_name VARCHAR(255),
	product_description VARCHAR(255),
	product_price DECIMAL (10,2) NOT NULL,
	PRIMARY KEY (product_id)
);

INSERT INTO users (user_email, user_password) VALUES ('test@mail.com', SHA1('cis477DEVRY'));
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Classic', 'Kong classic is our orignal model. Made in the USA from natural rubber. Classic is recommended for dogs wighing up to 20 lbs.', '12.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Large', 'Kong large is made from the same material as our classic it is just scaled up to accommodate larger dogs ranging from 30-65 lbs.', '16.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Medium', 'Kong medium is made from the same material as our classic it is just scaled up to accomdate larger dogs ranging from 15-35 lbs.', '14.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Small', 'Kong small is made from the material as our classic it is just scaled up to accommodate smaller dogs weighing up to 10 lbs.', '8.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Extreme', 'Kong extreme is made of the same materials as the classic but has added bumpers for a more unpredictable bounce. Recommended for dogs weighing up to 20 lbs.', '13.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Dog Treats', 'Our world famous kong dog treats. Made with all natural ingrediants.', '8.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Dog Leash', 'Pair you favorite dog toy with a matching dog leash.', '6.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Dog Whistle', 'Kong themed doggie whistle.', '3.00');
INSERT INTO products (product_name, product_description, product_price) VALUES ('Kong Dog Collar', 'Kong themed collar.', '5.00');

INSERT INTO orders (order_date, order_price, user_id) VALUES ('2019-9-9', '28.00', '1');
INSERT INTO orders (order_date, order_price, user_id) VALUES ('2019-9-12', '8.00', '1');
INSERT INTO orders (order_date, order_price, user_id) VALUES ('2019-9-16', '16.00', '1');
INSERT INTO orders (order_date, order_price, user_id) VALUES ('2019-9-19', '36.00', '1');

INSERT INTO orderIndex (order_id, product_id) VALUES ('1', '1');
INSERT INTO orderIndex (order_id, product_id) VALUES ('1', '2');
INSERT INTO orderIndex (order_id, product_id) VALUES ('2', '4');
INSERT INTO orderIndex (order_id, product_id) VALUES ('3', '2');
INSERT INTO orderIndex (order_id, product_id) VALUES ('4', '1');
INSERT INTO orderIndex (order_id, product_id) VALUES ('4', '2');
INSERT INTO orderIndex (order_id, product_id) VALUES ('4', '4');



















