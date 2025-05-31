-- Database for Ayam Goreng Joss Restaurant
-- Created for CRUD operations

-- Drop database if exists to avoid conflicts
DROP DATABASE IF EXISTS ayam_goreng_joss;

-- Create database
CREATE DATABASE ayam_goreng_joss;

-- Use the database
USE ayam_goreng_joss;

-- Create users table for authentication
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'manager') NOT NULL DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create categories table for menu categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create products table for menu items
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    spice_level INT DEFAULT 1 COMMENT 'Scale of 1-5 for spiciness',
    is_premium BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Create customers table
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create promos table for promotional codes
CREATE TABLE promos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    discount_percent DECIMAL(5, 2),
    discount_amount DECIMAL(10, 2),
    min_order_amount DECIMAL(10, 2),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_number VARCHAR(20) NOT NULL UNIQUE,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    payment_method ENUM('cash', 'credit_card', 'debit_card', 'e-wallet') NOT NULL,
    payment_status ENUM('pending', 'paid', 'failed') NOT NULL DEFAULT 'pending',
    promo_id INT,
    discount_amount DECIMAL(10, 2) DEFAULT 0.00,
    delivery_address TEXT,
    delivery_fee DECIMAL(10, 2) DEFAULT 0.00,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
    FOREIGN KEY (promo_id) REFERENCES promos(id) ON DELETE SET NULL
);

-- Create order_items table for items within each order
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    spice_level INT DEFAULT 1 COMMENT 'Selected spice level for this order',
    special_instructions TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Create reviews table for customer feedback
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    customer_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

-- Create locations table for restaurant branches
CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    opening_hours VARCHAR(255),
    map_url TEXT,
    is_main_branch BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data for categories
INSERT INTO categories (name, description) VALUES
('Ayam Original', 'Ayam goreng original dengan berbagai level kepedasan'),
('Ayam Premium', 'Ayam goreng premium dengan bumbu spesial'),
('Sides', 'Makanan pendamping'),
('Minuman', 'Minuman segar');

-- Insert sample data for products
INSERT INTO products (category_id, name, description, price, spice_level, is_premium) VALUES
(1, 'Ayam Goreng Original', 'Ayam goreng renyah dengan bumbu original yang gurih, cocok untuk yang tidak terlalu suka pedas.', 25000, 1, FALSE),
(1, 'Ayam Goreng Medium Spicy', 'Ayam goreng dengan tingkat kepedasan sedang, cocok untuk penikmat pedas pemula.', 28000, 3, FALSE),
(1, 'Ayam Goreng Extreme Spicy', 'Ayam goreng dengan tingkat kepedasan ekstrim, tantangan bagi pecinta pedas sejati!', 35000, 5, TRUE),
(2, 'Ayam Cheese Explosion', 'Ayam goreng dengan saus keju meleleh yang creamy dan lezat, sedikit pedas.', 32000, 2, FALSE),
(2, 'Ayam BBQ Spicy', 'Ayam goreng dengan saus BBQ pedas yang smoky dan menggugah selera.', 30000, 3, FALSE),
(2, 'Ayam Sambal Matah', 'Ayam goreng dengan sambal matah khas Bali yang segar dan pedas.', 33000, 4, TRUE),
(3, 'French Fries', 'Kentang goreng renyah', 15000, 1, FALSE),
(3, 'Cheese Balls', 'Bola-bola keju yang lezat', 18000, 1, FALSE),
(4, 'Es Teh Manis', 'Teh manis dingin yang menyegarkan', 8000, 1, FALSE),
(4, 'Es Jeruk', 'Jeruk segar dengan es', 10000, 1, FALSE);

-- Insert sample data for users
INSERT INTO users (name, email, password, role) VALUES
('Admin', 'admin@ayamgorengjoss.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'), -- password: password
('Staff', 'staff@ayamgorengjoss.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'staff'); -- password: password

-- Insert sample data for promos
INSERT INTO promos (code, description, discount_percent, min_order_amount, start_date, end_date) VALUES
('JOSSEXTREME', 'Beli 2 Ayam Goreng Extreme Spicy, Gratis 1 Minuman Segar', 10.00, 70000, '2023-11-01', '2023-11-30'),
('WELCOME10', 'Diskon 10% untuk pelanggan baru', 10.00, 50000, '2023-11-01', '2023-12-31');

-- Insert sample data for locations
INSERT INTO locations (name, address, phone, email, opening_hours, is_main_branch) VALUES
('Ayam Goreng Joss - Cabang Utama', 'Jl. Sono Indah Utara Rt.02/05, Jakarta Selatan', '+62 813-8742-1054', 'info@ayamgorengjoss.com', 'Setiap Hari: 10.00 - 22.00 WIB', TRUE),
('Ayam Goreng Joss - Cabang Kemang', 'Jl. Kemang Raya No. 45, Jakarta Selatan', '+62 812-3456-7890', 'kemang@ayamgorengjoss.com', 'Setiap Hari: 10.00 - 22.00 WIB', FALSE);

-- Create a view for active products with category information
CREATE VIEW vw_active_products AS
SELECT 
    p.id, 
    p.name, 
    p.description, 
    p.price, 
    p.image, 
    p.spice_level, 
    p.is_premium,
    c.name AS category_name,
    c.id AS category_id
FROM 
    products p
JOIN 
    categories c ON p.category_id = c.id
WHERE 
    p.is_active = TRUE AND c.is_active = TRUE;

-- Create a view for order details
CREATE VIEW vw_order_details AS
SELECT 
    o.id AS order_id,
    o.order_number,
    o.order_date,
    o.total_amount,
    o.status,
    o.payment_method,
    o.payment_status,
    c.name AS customer_name,
    c.email AS customer_email,
    c.phone AS customer_phone,
    o.delivery_address,
    o.delivery_fee,
    o.notes,
    p.code AS promo_code,
    o.discount_amount
FROM 
    orders o
JOIN 
    customers c ON o.customer_id = c.id
LEFT JOIN 
    promos p ON o.promo_id = p.id;

-- Create a view for order items with product details
CREATE VIEW vw_order_items_details AS
SELECT 
    oi.id,
    oi.order_id,
    o.order_number,
    p.name AS product_name,
    p.id AS product_id,
    oi.quantity,
    oi.price,
    oi.spice_level,
    oi.special_instructions,
    (oi.quantity * oi.price) AS subtotal
FROM 
    order_items oi
JOIN 
    orders o ON oi.order_id = o.id
JOIN 
    products p ON oi.product_id = p.id;

-- Create a stored procedure for creating a new order
DELIMITER //
CREATE PROCEDURE sp_create_order(
    IN p_customer_id INT,
    IN p_payment_method VARCHAR(20),
    IN p_delivery_address TEXT,
    IN p_delivery_fee DECIMAL(10, 2),
    IN p_promo_code VARCHAR(50),
    IN p_notes TEXT,
    OUT p_order_id INT,
    OUT p_order_number VARCHAR(20)
)
BEGIN
    DECLARE v_promo_id INT;
    DECLARE v_discount_amount DECIMAL(10, 2) DEFAULT 0;
    DECLARE v_order_number VARCHAR(20);
    
    -- Generate order number (format: AGJ-YYYYMMDD-XXXX)
    SET v_order_number = CONCAT('AGJ-', DATE_FORMAT(NOW(), '%Y%m%d'), '-', LPAD(FLOOR(RAND() * 10000), 4, '0'));
    
    -- Find promo if code provided
    IF p_promo_code IS NOT NULL THEN
        SELECT id, discount_percent, discount_amount 
        INTO v_promo_id, v_discount_amount, v_discount_amount
        FROM promos 
        WHERE code = p_promo_code 
        AND is_active = TRUE 
        AND CURDATE() BETWEEN start_date AND end_date
        LIMIT 1;
    END IF;
    
    -- Insert the order with 0 total (will be updated later)
    INSERT INTO orders (
        customer_id, 
        order_number, 
        payment_method, 
        promo_id, 
        discount_amount,
        delivery_address,
        delivery_fee,
        notes,
        total_amount
    ) VALUES (
        p_customer_id,
        v_order_number,
        p_payment_method,
        v_promo_id,
        v_discount_amount,
        p_delivery_address,
        p_delivery_fee,
        p_notes,
        0 -- Initial total, will be updated after adding items
    );
    
    -- Return the order ID and number
    SET p_order_id = LAST_INSERT_ID();
    SET p_order_number = v_order_number;
END //
DELIMITER ;

-- Create a stored procedure for adding items to an order
DELIMITER //
CREATE PROCEDURE sp_add_order_item(
    IN p_order_id INT,
    IN p_product_id INT,
    IN p_quantity INT,
    IN p_spice_level INT,
    IN p_special_instructions TEXT
)
BEGIN
    DECLARE v_price DECIMAL(10, 2);
    
    -- Get the current price of the product
    SELECT price INTO v_price FROM products WHERE id = p_product_id;
    
    -- Insert the order item
    INSERT INTO order_items (
        order_id,
        product_id,
        quantity,
        price,
        spice_level,
        special_instructions
    ) VALUES (
        p_order_id,
        p_product_id,
        p_quantity,
        v_price,
        p_spice_level,
        p_special_instructions
    );
    
    -- Update the order total
    UPDATE orders o
    SET o.total_amount = (
        SELECT SUM(oi.quantity * oi.price) 
        FROM order_items oi 
        WHERE oi.order_id = o.id
    ) - o.discount_amount + o.delivery_fee
    WHERE o.id = p_order_id;
END //
DELIMITER ;

-- Create a stored procedure for updating order status
DELIMITER //
CREATE PROCEDURE sp_update_order_status(
    IN p_order_id INT,
    IN p_status VARCHAR(20),
    IN p_payment_status VARCHAR(20)
)
BEGIN
    UPDATE orders
    SET 
        status = p_status,
        payment_status = p_payment_status,
        updated_at = CURRENT_TIMESTAMP
    WHERE id = p_order_id;
END //
DELIMITER ;

-- Create a trigger to update product prices in order_items when product prices change
DELIMITER //
CREATE TRIGGER trg_product_price_history
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
    IF OLD.price != NEW.price THEN
        -- You could create a price_history table to track changes
        -- For now, we'll just log a message
        INSERT INTO product_price_history (product_id, old_price, new_price)
        VALUES (NEW.id, OLD.price, NEW.price);
    END IF;
END //
DELIMITER ;

-- Create product_price_history table for the trigger
CREATE TABLE product_price_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    old_price DECIMAL(10, 2) NOT NULL,
    new_price DECIMAL(10, 2) NOT NULL,
    changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
