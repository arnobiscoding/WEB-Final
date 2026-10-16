-- not mandatory
CREATE DATABASE tourism;

CREATE TABLE tourist_spot (
    SpotID INT PRIMARY KEY AUTO_INCREMENT,
    SpotName VARCHAR(50) NOT NULL,
    Region VARCHAR(50),
    Category VARCHAR(50),
    Rating DECIMAL(3,1),
    EntryFee DECIMAL(10,2),
    VisitorsPerYear INT
);

INSERT INTO tourist_spot (SpotName, Region, Category, Rating, EntryFee, VisitorsPerYear)
VALUES
("Cox's Bazar Beach", 'CTG', 'Beach', 4.9, 0.00, 150000),
('Sundarbans Forest', 'KHL', 'Nature', 4.3, 150.00, 80000),
('Ratargul Forest', 'SYL', 'Nature', 4.8, 100.00, 60000),
('Kuakata Beach', 'PTU', 'Beach', 4.5, 0.00, 90000),
('Shat Gambuj Mosque', 'BGH', 'Heritage', 4.7, 30.00, 70000),
('Paharpur', 'NWG', 'Heritage', 4.1, 30.00, 40000);

-- Q1: Rating > 4.5 OR name contains 'Beach' (sorted by Rating descending)
SELECT SpotName, Region, Rating
FROM tourist_spot
WHERE Rating > 4.5 OR SpotName LIKE '%Beach%'
ORDER BY Rating DESC;

-- Q2: Rating between 4.0 and 4.5 & EntryFee > 0 -> Rating + 0.2, EntryFee * 1.10
UPDATE tourist_spot
SET Rating = Rating + 0.2, EntryFee = EntryFee * 1.10
WHERE Rating >= 4.0 AND Rating <= 4.5 AND EntryFee > 0;

-- Q3: Categories with average rating > 4.4 (sorted descending)
SELECT Category, COUNT(*) AS spot_count, AVG(Rating) AS avg_rating, SUM(VisitorsPerYear) AS total_visitors
FROM tourist_spot
GROUP BY Category
HAVING AVG(Rating) > 4.4
ORDER BY avg_rating DESC;

-- Q4: Regions with estimated yearly revenue > 1,000,000 (highest first)
SELECT Region, SUM(EntryFee * VisitorsPerYear) AS total_revenue
FROM tourist_spot
GROUP BY Region
HAVING total_revenue > 1000000
ORDER BY total_revenue DESC;
