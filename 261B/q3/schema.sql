-- not mandatory
CREATE DATABASE uiu_bookshop;

CREATE TABLE book_info (
    BookID INT PRIMARY KEY AUTO_INCREMENT,
    BookTitle VARCHAR(50) NOT NULL,
    Author VARCHAR(50) NOT NULL,
    Category VARCHAR(50),
    Price DECIMAL(10,2),
    Stock INT
);

INSERT INTO book_info (BookTitle, Author, Category, Price, Stock)
VALUES
('Web Basics', 'John Smith', 'Programming', 450.00, 10),
('Database Guide', 'Alice Roy', 'Programming', 550.00, 8),
('English Grammar', 'Mary Khan', 'Language', 300.00, 15),
('Business Math', 'David Lee', 'Business', 400.00, 12),
('Python Mastery', 'Sara Ahmed', 'Programming', 600.00, 5),
('French Made Easy', 'Paul Costa', 'Language', 350.00, 7);

-- Q1: Programming books sorted by Price descending
SELECT BookID, BookTitle, Author, Category, Price, Stock
FROM book_info
WHERE Category = 'Programming'
ORDER BY Price DESC;

-- Q2: Programming books with Price > 400
SELECT BookTitle, Author, Price
FROM book_info
WHERE Price > 400.00 AND Category = 'Programming';

-- Q3: Number of books available in each category
SELECT Category, COUNT(*) AS total_books
FROM book_info
GROUP BY Category;

-- Q4: Total net worth of the entire bookshop
SELECT SUM(Price * Stock) AS total_net_worth
FROM book_info;

-- Q5: 10% price reduction for 'Language' category
UPDATE book_info
SET Price = Price * 0.90
WHERE Category = 'Language';

SELECT BookTitle, Price
FROM book_info
WHERE Category = 'Language';
