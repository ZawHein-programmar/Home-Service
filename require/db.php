<?php
$host = 'localhost';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
create_database($mysqli);
function create_database($mysqli)
{
    $sql = "CREATE DATABASE IF NOT EXISTS `home_services` 
        DEFAULT CHARACTER SET utf8mb4 
        COLLATE utf8mb4_general_ci";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}
function select_db($mysqli)
{
    if ($mysqli->select_db("home_services")) {
        return true;
    }
    return false;
}
select_db($mysqli);
create_table($mysqli);
function create_table($mysqli)
{
    // User
    $user_sql = "CREATE TABLE IF NOT EXISTS `users`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                phone VARCHAR(50) NOT NULL,
                password VARCHAR(200) NOT NULL,
                role ENUM('admin','customer', 'service_provider') NOT NULL,
                home_no VARCHAR(200) NOT NULL,
                street VARCHAR(200) NOT NULL,
                ward VARCHAR(200) NOT NULL,
                township_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (township_id) REFERENCES townships(id))";
    if ($mysqli->query($user_sql) === false) return false;

    // Township
    $township_sql = "CREATE TABLE IF NOT EXISTS `townships` (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL, 
                    city_id INT NOT NULL,
                    FOREIGN KEY (city_id) REFERENCES cities(id))";
    if ($mysqli->query($township_sql) === false) return false;

    // City
    $city_sql = "CREATE TABLE IF NOT EXISTS `cities` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL)";
    if ($mysqli->query($city_sql) === false) return false;

    // Township Neighbors
    $townshipneighbor_sql = 
                "CREATE TABLE IF NOT EXISTS `townshipNeighbors` 
                (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                township_id INT NOT NULL,
                neighbor_township_id INT NOT NULL,
                FOREIGN KEY (township_id) REFERENCES townships(id),
                FOREIGN KEY (neighbor_township_id) REFERENCES townships(id),
                UNIQUE(township_id, neighbor_township_id))";
    if ($mysqli->query($townshipneighbor_sql) === false) return false;

    // Provider Areas
    $providerArea_sql = "CREATE TABLE IF NOT EXISTS `providerAreas` (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        provider_id INT NOT NULL,
                        township_id INT NOT NULL,
                        FOREIGN KEY (provider_id) REFERENCES users(id),
                        FOREIGN KEY (township_id) REFERENCES townships(id),
                        UNIQUE(provider_id, township_id))";
    if ($mysqli->query($providerArea_sql) === false) return false;

    // Category
    $category_sql = "CREATE TABLE IF NOT EXISTS `categories`
                    (id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL UNIQUE,
                    description TEXT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
    if ($mysqli->query($category_sql) === false) return false;

    // Service 
    $service_sql = "CREATE TABLE IF NOT EXISTS `services` (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    provider_id INT NOT NULL,
                    category_id INT NOT NULL,
                    title VARCHAR(150) NOT NULL,
                    description TEXT NULL,
                    price DECIMAL(10,2) NOT NULL,
                    duration_minutes INT NULL DEFAULT 60,
                    created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                    updated_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY (provider_id) REFERENCES users(id),
                    FOREIGN KEY (category_id) REFERENCES categories(id))";
    if ($mysqli->query($service_sql) === false) return false;

    // Service Image
    $serviceImage_sql = "CREATE TABLE IF NOT EXISTS `serviceImages` (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        service_id INT NOT NULL,
                        image VARCHAR(200) NOT NULL,
                        is_primary BOOLEAN NOT NULL DEFAULT FALSE,
                        created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                        uploaded_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (service_id) REFERENCES services(id)) ON DELETE CASCADE";
    if ($mysqli->query($serviceImage_sql) === false) return false;

    // Schedule
    $schedule_sql = "CREATE TABLE IF NOT EXISTS `schedules` (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    service_id INT NOT NULL,
                    day_of_week ENUM('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
                    start_time TIME NOT NULL,
                    end_time TIME NOT NULL,
                    updated_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (service_id) REFERENCES Services(id)
                    )";


    // Discount
    $discount_sql = "CREATE TABLE IF NOT EXISTS `discounts`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                start_date DATE NOT NULL,
                end_date DATE NULL,
                percent VARCHAR(3) NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
    if ($mysqli->query($discount_sql) === false) return false;

    // Product
    $product_sql = "CREATE TABLE IF NOT EXISTS `products`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                category_id INT NOT NULL,
                discount_id INT NOT NULL,
                stock_count INT NOT NULL,
                sale_price INT NOT NULL,
                purchase_price INT NOT NULL,
                description TEXT NULL,
                expire_date DATE NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
                FOREIGN KEY (discount_id) REFERENCES discounts(id) ON DELETE CASCADE
                )";
    if ($mysqli->query($product_sql) === false) return false;

    // Product Image
    $product_img_sql = "CREATE TABLE IF NOT EXISTS `product_img`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                image VARCHAR(200) NOT NULL,
                product_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
                )";
    if ($mysqli->query($product_img_sql) === false) return false;

    // Cart 
    $cart_sql = "CREATE TABLE IF NOT EXISTS `carts`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT NOT NULL,
                customer_id INT NOT NULL,
                qty INT NOT NULL,
                description TEXT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
                FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
                )";
    if ($mysqli->query($cart_sql) === false) return false;

    // Payment
    $payment_sql = "CREATE TABLE IF NOT EXISTS `payments`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
    if ($mysqli->query($payment_sql) === false) return false;

    // Order
    $order_sql = "CREATE TABLE IF NOT EXISTS `orders`
                (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT NOT NULL,
                customer_id INT NOT NULL,
                payment_id INT NOT NULL,
                qty INT NOT NULL,
                description TEXT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
                FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
                FOREIGN KEY (payment_id) REFERENCES payments(id) ON DELETE CASCADE
                )";
    if ($mysqli->query($order_sql) === false) return false;
}
