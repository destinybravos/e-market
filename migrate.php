<?php
    $server_hostname = 'localhost';
    $server_username = 'root';
    $server_password = '';
    $database = 'emarket';

    $conn = new MySQLi($server_hostname, $server_username, $server_password, $database);

    if($conn->connect_error){
        echo $conn->connect_error;
    }

    // Creeate table Users
    $create_users = "CREATE TABLE IF NOT EXISTS tbl_users(
        id INT PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(50),
        lastname VARCHAR(50) NULL,
        phone VARCHAR(30) UNIQUE,
        email VARCHAR(30) UNIQUE,
        dob DATE NULL,
        password VARCHAR(100) UNIQUE,
        created_at DATETIME DEFAULT(CURRENT_TIMESTAMP)
    )";

    if($conn->query($create_users)){
        echo "<p>User table created</p>";
    }else{
        echo "Error! " . $conn->error;
    }

    // Creeate table Category
    $create_category = "CREATE TABLE IF NOT EXISTS tbl_category(
        id INT PRIMARY KEY AUTO_INCREMENT,
        category VARCHAR(100) UNIQUE,
        created_at DATETIME DEFAULT(CURRENT_TIMESTAMP)
    )";

    if($conn->query($create_category)){
        echo "<p>category table created</p>";
    }else{
        echo "Error! " . $conn->error;
    }

    
    // Creeate table Products
    $create_product = "CREATE TABLE IF NOT EXISTS tbl_products(
        id INT PRIMARY KEY AUTO_INCREMENT,
        product VARCHAR(50),
        category_id INT NOT NULL,
        price FLOAT(10,2),
        discount VARCHAR(30) NULL,
        image VARCHAR(50) NULL,
        description VARCHAR(500),
        created_at DATETIME DEFAULT(CURRENT_TIMESTAMP)
    )";

    if($conn->query($create_product)){
        echo "<p>Products table created</p>";
    }else{
        echo "Error! " . $conn->error;
    }


?>