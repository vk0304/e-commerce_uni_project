<?php

$con = mysqli_connect('localhost','root' , '' , 'e-shopping');

if(!$con){
    die(mysqli_error($con));
}



// creating admin table

// $admin_query = "CREATE TABLE admin_table (
//     admin_id INT(11) PRIMARY KEY AUTO_INCREMENT,
//     admin_name VARCHAR(100),
//     admin_email VARCHAR(100),
//     admin_password VARCHAR(255),
//     admin_image VARCHAR(255)
// )";
// $result_admin = mysqli_query($con, $table_query);




// creating brand table 


// $brand_query = "CREATE TABLE brands (
// brand_id Primary	int(11)			
// brand_title	varchar(40)	
// )";
// $result_brand = mysqli_query($con, $brand_query);






// creating category table 


// $category_query = "CREATE TABLE categories (
// category_id Primary	int(11)			
// category_title	varchar(40)	
// )";
// $result_category = mysqli_query($con, $category_query);



// creating cart table

// $cart_query = "CREATE TABLE cart_details (
//     product_id INT(11) PRIMARY KEY,
//     ip_address VARCHAR(255),
//     quantity INT(11)
// )";
// $result_cart = mysqli_query($con, $cart_query);




// creating pending orders table

// $p_orders_query = "CREATE TABLE pending_orders (
//     order_id INT(11) PRIMARY KEY AUTO_INCREMENT,
//     user_id INT(11),
//     invoice_num VARCHAR(255),
//     product_id INT(11),
//     quantity INT(255),
//     order_status VARCHAR(255)
// )";
// $result_p_orders = mysqli_query($con, $p_orders_query);



// creating orders table

// $orders_query = "CREATE TABLE user_orders (
//     order_id INT(11) PRIMARY KEY AUTO_INCREMENT,
//     user_id INT(11),
//     amount_due INT(255),
//     invoice_num VARCHAR(255),
//     total_products INT(255),
//     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     order_status VARCHAR(255)
// )";
// $result_orders = mysqli_query($con, $orders_query);



// // // creating product table

// $products_query = "CREATE TABLE products (
//     product_id INT(11) PRIMARY KEY AUTO_INCREMENT,
//     product_title VARCHAR(100),
//     product_description VARCHAR(300),
//     product_keywords VARCHAR(255),
//     category_id INT(11),
//     brand_id INT(11),
//     product_image1 VARCHAR(255),
//     product_image2 VARCHAR(255),
//     product_image3 VARCHAR(255),
//     product_price VARCHAR(100),
//     date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     status VARCHAR(100)
// )";
// $result_products = mysqli_query($con, $products_query);



// creating users table



// $users_query = "CREATE TABLE uuser_table (
//     user_id INT(11) PRIMARY KEY AUTO_INCREMENT,
//     username VARCHAR(100),
//     user_email VARCHAR(100),
//     user_password VARCHAR(255),
//     user_image VARCHAR(255),
//     user_ip VARCHAR(100),
//     user_address VARCHAR(255),
//     user_phone VARCHAR(20)
// )";
// $result_users = mysqli_query($con, $users_query);



// creating payments table

// $payment_query = "CREATE TABLE user_payments (
//     payment_id INT(11) PRIMARY KEY AUTO_INCREMENT,
//     order_id INT(11),
//     invoice_num INT(11),
//     amount INT(11),
//     payment_mode VARCHAR(255),
//     date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// $result_payment = mysqli_query($con, $payment_query);






// creating view


// $view_query = "CREATE VIEW users_detail_view AS
//     SELECT u.user_id, u.username, COUNT(o.order_id) AS total_orders,
//            SUM(CASE WHEN o.order_status = 'Complete' THEN 1 ELSE 0 END) AS total_completed,
//            SUM(CASE WHEN o.order_status = 'pending' THEN 1 ELSE 0 END) AS total_pending
//     FROM uuser_table u
//     LEFT JOIN user_orders o ON u.user_id = o.user_id
//     GROUP BY u.user_id, u.username";

// $result_view_query = mysqli_query($con, $view_query);




?>