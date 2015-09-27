CREATE TABLE customers (
customer_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
PRIMARY KEY (customer_id),
INDEX full_name (last_name, first_name)
) ENGINE = INNODB;