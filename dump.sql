CREATE DATABASE resto;

USE resto;

CREATE TABLE clients (
    id INT auto_increment PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(50)
);

CREATE TABLE products (
    id INT auto_increment PRIMARY KEY,
    product_image TEXT,
    product_name VARCHAR(50),
    price FLOAT
);

CREATE TABLE shopping_cart (
    id INT auto_increment PRIMARY KEY,
    quantity INT,
    product_id INT,
    client_id INT
);

ALTER TABLE `shopping_cart` ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
ALTER TABLE `shopping_cart` ADD CONSTRAINT `fk_client_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);