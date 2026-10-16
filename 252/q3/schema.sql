-- not mandatory
CREATE DATABASE sundarban;

CREATE TABLE sales_data (
    SaleID INT PRIMARY KEY AUTO_INCREMENT,
    ProductName VARCHAR(50) NOT NULL,
    CategoryID INT,
    CategoryName VARCHAR(50),
    Quantity INT,
    Revenue DECIMAL(12,2)
);

INSERT INTO sales_data (ProductName, CategoryID, CategoryName, Quantity, Revenue)
VALUES
('Laptop', 301, 'Electronics', 5, 350000),
('Mouse', 301, 'Electronics', 15, 45000),
('Chair', 302, 'Furniture', 8, 64000),
('Desk', 302, 'Furniture', 6, 72000),
('Bottle', 303, 'Accessories', 20, 30000),
('Pen', 303, 'Accessories', 25, 20000);

-- Q1: Total revenue per category
SELECT CategoryName, SUM(Revenue) AS total_revenue
FROM sales_data
GROUP BY CategoryName;

-- Q2: Revenue below 40,000 -> "Low Performing"
UPDATE sales_data
SET CategoryName = 'Low Performing'
WHERE Revenue < 40000;

-- Q3: 10% bonus for revenue above 70,000
UPDATE sales_data
SET Revenue = Revenue * 1.10
WHERE Revenue > 70000;

-- Q4: Top Seller / Regular Seller (runs after Q2 and Q3)
-- option 1 -> nested query
SELECT s1.ProductName, s1.CategoryName,
CASE
    WHEN s1.Revenue > (
        SELECT AVG(s2.Revenue)
        FROM sales_data s2
        WHERE s2.CategoryName = s1.CategoryName
    ) THEN 'Top Seller'
    ELSE 'Regular Seller'
END AS seller_label
FROM sales_data s1;

-- option 2 -> use two separate queries
-- php code uses option 2
SELECT CategoryName, AVG(Revenue) AS avg_rev
FROM sales_data
GROUP BY CategoryName;

SELECT ProductName, CategoryName, Revenue FROM sales_data;
