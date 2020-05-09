CREATE DATABASE php_crud_products;
use php_crud_products;

CREATE TABLE products (
	id int(6) AUTO_INCREMENT PRIMARY KEY,
	product_name varchar(30) NOT NULL,
	product_price varchar(30) NOT NULL,
	product_sku varchar(30) NOT NULL UNIQUE
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;