CREATE DATABASE IF NOT EXISTS db_online_store;

USE db_online_store;

CREATE TABLE product (
    id_product INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    stock INT NOT NULL,
    price INT NOT NULL
);

CREATE TABLE orders (
    id_order INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    qty INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (product_id)
    REFERENCES product(id_product)
);

INSERT INTO product(name, stock, price)
VALUES
('Flash Sale Produk', 10, 10000);