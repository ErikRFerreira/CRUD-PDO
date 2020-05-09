# Simple CRUD App in PHP with PDO

### Mysql 
First login to phpMyAdmin (or other) and run the following SQL. Alternatively, you can import the `products.sql` file provided
~~~sql
CREATE DATABASE php_crud_products;
use php_crud_products;
CREATE TABLE products (
	id int(6) AUTO_INCREMENT PRIMARY KEY,
	product_name varchar(30) NOT NULL,
	product_price varchar(30) NOT NULL,
	product_sku varchar(30) NOT NULL UNIQUE
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
~~~
### Database connection
In `core/init.php` you will find the Database configuration. Edit as needed.
~~~~php
$GLOBALS['config'] = array(
	'mysql' => array(
		'host'     => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db'       => 'php_crud_products'
	)
);
~~~~

That is all. Take care.












