-- not mandatory
CREATE DATABASE campus_library;

CREATE TABLE book_loans (
    LoanID INT PRIMARY KEY AUTO_INCREMENT,
    StudentName VARCHAR(50) NOT NULL,
    BookTitle VARCHAR(50) NOT NULL,
    DaysOverdue INT,
    PenaltyFee DECIMAL(10,2),
    Status VARCHAR(20)
);

INSERT INTO book_loans (StudentName, BookTitle, DaysOverdue, PenaltyFee, Status)
VALUES
('Abdul', 'Data Structures', 0, 0.00, 'Returned'),
('Jabbar', 'Operating Systems', 12, 24.00, 'Overdue'),
('Barkat', 'Discrete Math', 5, 10.00, 'Overdue'),
('Rahim', 'Linear Algebra', 2, 4.00, 'Overdue'),
('Karim', 'Data Structures', 15, 30.00, 'Lost'),
('Fahim', 'Operating Systems', 0, 0.00, 'Returned');

-- Q1: Total books for each status (having count > 1)
SELECT Status, COUNT(*) AS total_books
FROM book_loans
GROUP BY Status
HAVING COUNT(*) > 1;

-- Q2: Overdue < 7 days -> change status to 'Grace Period' and fee to 0
UPDATE book_loans
SET Status = 'Grace Period', PenaltyFee = 0.00
WHERE Status = 'Overdue' AND DaysOverdue < 7;

-- Q3: 10% fee increase for fee > 20 (max 50)
UPDATE book_loans
SET PenaltyFee = PenaltyFee * 1.10
WHERE PenaltyFee > 20.00 AND (PenaltyFee * 1.10) <= 50.00;

-- Q4: Total penalty fee collected/owed per book (highest first)
SELECT BookTitle, SUM(PenaltyFee) AS total_penalty
FROM book_loans
GROUP BY BookTitle
ORDER BY total_penalty DESC;
