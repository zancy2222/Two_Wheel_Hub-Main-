 -- Create the database
CREATE DATABASE IF NOT EXISTS AV_MOTO;
USE AV_MOTO;

-- Create the Users table
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    complete_address VARCHAR(255) NOT NULL,
    unit_no_house_no_building VARCHAR(50),
    street VARCHAR(50),
    barangay VARCHAR(50),
    city VARCHAR(50),
    province VARCHAR(50),
    zip_code VARCHAR(10),
    mobile_phone_no VARCHAR(20)
);

-- Create the GuestAppointment table
CREATE TABLE GuestAppointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_category VARCHAR(50) NOT NULL,
    service VARCHAR(100) NOT NULL,
    preferred_date DATE NOT NULL,
    preferred_time TIME NOT NULL,
    email_address VARCHAR(100) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    complete_address VARCHAR(255) NOT NULL,
    unit_no_house_no_building VARCHAR(50),
    street VARCHAR(50),
    barangay VARCHAR(50),
    city VARCHAR(50),
    province VARCHAR(50),
    zip_code VARCHAR(10),
    mobile_phone_no VARCHAR(20)
);

-- Create the Categories table
CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_image VARCHAR(255) NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE product_variations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    size VARCHAR(50) NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
-- CURRENT (USED)
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);


CREATE TABLE AdminLogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE RegisteredCart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE purchased (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    size VARCHAR(50) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE RegisteredPurchased (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    size VARCHAR(50) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create the Appointment table
CREATE TABLE Appointment (
    user_id INT NOT NULL,
    service_category VARCHAR(50) NOT NULL,
    service VARCHAR(100) NOT NULL,
    preferred_date DATE NOT NULL,
    preferred_time TIME NOT NULL,
    reference_code VARCHAR(6) NOT NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);
CREATE TABLE slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    period ENUM('AM', 'PM') NOT NULL,
    slots_remaining INT NOT NULL DEFAULT 20,
    UNIQUE KEY (date, period)
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    selected_date DATE NOT NULL,
    preferred_time VARCHAR(10) NOT NULL,
    service_category VARCHAR(50) NOT NULL,
    service VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    complete_address VARCHAR(255) NOT NULL,
    unit_no VARCHAR(50),
    street VARCHAR(100) NOT NULL,
    barangay VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    zip_code VARCHAR(10) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    reference_code VARCHAR(6) NOT NULL
);


-- NEW ADDED
CREATE TABLE ServiceCategories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

CREATE TABLE Services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    service_name VARCHAR(100) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES ServiceCategories(id) ON DELETE CASCADE
);

CREATE TABLE GuestBuyedProducts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    delivery_option VARCHAR(50) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100),
    last_name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    barangay VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    zip_code VARCHAR(20) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    payment_option VARCHAR(50) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    receipt_path VARCHAR(255),
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE GuestBuyedProducts ADD COLUMN reference_code VARCHAR(6) NOT NULL;
ALTER TABLE GuestBuyedProducts ADD COLUMN status ENUM('Processing', 'Shipped', 'Delivered') DEFAULT 'Processing';

CREATE TABLE GuestBuyedProductItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buyed_product_id INT NOT NULL,
    product_id INT NOT NULL,
    size VARCHAR(50),
    color VARCHAR(50),
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (buyed_product_id) REFERENCES GuestBuyedProducts(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
CREATE TABLE RegisteredBuyedProducts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    delivery_option VARCHAR(50) NOT NULL,
    payment_option VARCHAR(50) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    purchased_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);
ALTER TABLE RegisteredBuyedProducts ADD COLUMN reference_code VARCHAR(6) NOT NULL;
ALTER TABLE RegisteredBuyedProducts ADD COLUMN status ENUM('Processing', 'Shipped', 'Delivered') DEFAULT 'Processing';
ALTER TABLE RegisteredBuyedProducts ADD COLUMN receipt_image VARCHAR(255);

CREATE TABLE RegisteredBuyedProductItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buyed_product_id INT NOT NULL,
    product_id INT NOT NULL,
    size VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (buyed_product_id) REFERENCES RegisteredBuyedProducts(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- NEW ADDED


-- OLD
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
