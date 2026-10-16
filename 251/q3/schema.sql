-- not mandatory
CREATE DATABASE uiutech_final;

CREATE TABLE employee_final (
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeName VARCHAR(50) NOT NULL,
    DepartmentID INT,
    DepartmentName VARCHAR(50),
    Salary DECIMAL(10,2),
    PerformanceRating VARCHAR(5)
);

INSERT INTO employee_final (EmployeeName, DepartmentID, DepartmentName, Salary, PerformanceRating)
VALUES
('Arif Rahman', 201, 'Software Development', 45000, 'B'),
('Marium Khan', 201, 'Software Development', 52000, 'A'),
('Sabbir Hossain', 202, 'Quality Assurance', 38000, 'C'),
('Samira Begum', 203, 'UI/UX Design', 42000, 'B');

-- Q1: Total employees per performance rating
SELECT PerformanceRating, COUNT(*) AS total_employees
FROM employee_final
GROUP BY PerformanceRating;

-- Q2: Salary below 40,000 -> change rating to 'C' (if not 'D')
UPDATE employee_final
SET PerformanceRating = 'C'
WHERE Salary < 40000 AND PerformanceRating != 'D';

-- Q3: 5,000 bonus for salary > 50,000 (max 60,000)
UPDATE employee_final
SET Salary = Salary + 5000
WHERE Salary > 50000 AND (Salary + 5000) <= 60000;

-- Q4: Department names and employee counts (largest department first)
SELECT DepartmentName, COUNT(*) AS num_employees
FROM employee_final
GROUP BY DepartmentName
ORDER BY num_employees DESC;
