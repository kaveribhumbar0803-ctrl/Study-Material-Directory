CREATE DATABASE IF NOT EXISTS study_material_db;

USE study_material_db;

CREATE TABLE IF NOT EXISTS study_material (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    unit VARCHAR(50) NOT NULL,
    resource_link VARCHAR(500) NOT NULL,
    uploader_name VARCHAR(100) NOT NULL
);

INSERT INTO study_material
(title, subject, unit, resource_link, uploader_name)
VALUES
('DBMS Unit 1 Notes', 'DBMS', 'Unit 1', 'https://example.com/dbms1', 'Student'),
('DBMS Unit 2 Notes', 'DBMS', 'Unit 2', 'https://example.com/dbms2', 'Student'),
('Python Programming Notes', 'Python', 'Unit 1', 'https://example.com/python1', 'Student'),
('AI Fundamentals Notes', 'Artificial Intelligence', 'Unit 2', 'https://example.com/ai2', 'Student'),
('Web Development Notes', 'Web Development', 'Unit 3', 'https://example.com/web3', 'Student');