DROP DATABASE IF EXISTS pawsrus;
CREATE DATABASE pawsrus;
USE pawsrus;

CREATE TABLE users (
	user_id INT AUTO_INCREMENT NOT NULL,
	user_email VARCHAR(255) NOT NULL,
	user_password VARCHAR(255) NOT NULL,
	PRIMARY KEY (user_id)
);

CREATE TABLE orders (
	order_id INT AUTO_INCREMENT NOT NULL,
	order_date DATETIME NOT NULL,
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
