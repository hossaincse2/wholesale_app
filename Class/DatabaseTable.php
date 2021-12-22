<?php
class DatabaseTable{

    public function __construct(){
          // users sql to create table
            $sql = "CREATE TABLE users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                user_type VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                mobile VARCHAR(50),
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                
                if ($conn->query($sql) === TRUE) {
                echo "Table users created successfully";
                } else {
                echo "Error creating table: " . $conn->error;
                }

            // users sql to create table
            $sql = "CREATE TABLE products (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                product_title VARCHAR(30) NOT NULL,
                product_desc VARCHAR(30) NOT NULL,
                retail_price VARCHAR(50),
                wholesale_pricc VARCHAR(50),
                prodcut_image VARCHAR(50),
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                
                if ($conn->query($sql) === TRUE) {
                echo "Table products created successfully";
                } else {
                echo "Error creating table: " . $conn->error;
                }

            // users sql to create table
            $sql = "CREATE TABLE orders (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT(50),
                product_id INT(50), 
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                
                if ($conn->query($sql) === TRUE) {
                echo "Table orders created successfully";
                } else {
                echo "Error creating table: " . $conn->error;
                }
    }
}