Study Material Directory

1. Student Details

Detail Information
Student Name: Kaveri Manoharrao Bhumbar
Roll No.: MLU24F082
Division: B
Statement No.: 34
Project Title: Study Material Directory

---

2. Project Overview

The Study Material Directory is a web-based database management system developed to store, manage, search, and display academic study materials in an organized manner.

The system provides a centralized platform where study material information such as title, subject, unit, resource link, and uploader name can be stored and accessed easily.

The project demonstrates the practical implementation of DBMS concepts, SQL queries, PHP, MySQL, database connectivity, validation, and security techniques.

---

3. Problem Statement

Students often have difficulty finding study materials because resources are scattered across different platforms, messages, and files.

The Study Material Directory provides a centralized database where study-material details can be stored systematically and searched whenever required.

---

4. Objectives

The main objectives of the project are:

- To create a centralized directory for study materials.
- To store study-material information in a MySQL database.
- To provide an easy way to add and view study materials.
- To provide search functionality for finding required materials.
- To organize materials according to subject and unit.
- To demonstrate database operations using PHP and MySQL.
- To implement basic input validation and database security.
- To make the system accessible through a web browser.

---

5. Features

The major features of the Study Material Directory are:

1. Add Study Material

Users can enter study-material details and store them in the database.

2. View Study Materials

Stored study-material records can be displayed from the database.

3. Search Materials

Users can search for required study materials.

4. Subject and Unit Organization

Materials can be organized using subject and unit information.

5. Resource Links

Each material can contain a resource link for accessing the required study resource.

6. Uploader Information

The name of the person who uploaded the material can be stored.

7. Database Connectivity

PHP is connected with the MySQL database to perform database operations.

8. Input Validation

Input values are checked before processing to reduce invalid data.

9. Secure Database Queries

Prepared/binded SQL statements are used where applicable to reduce the risk of SQL injection.

---

6. Technology Stack

HTML: Structure of web pages
CSS: Styling and page design
PHP: Server-side programming
MySQL: Database management
XAMPP: Local development environment
InfinityFree: Web hosting

---

7. Project Structure

study_material/
│
├── index.php
├── save.php
├── search.php
├── view.php
├── config.php
├── style.css
├── database.sql
└── README.md

File Description

"index.php": Main page/interface of the system
"save.php": Processes and saves study-material information
"search.php": Performs search operations
"view.php": Displays stored study materials
"config.php": Contains database connection/configuration
"style.css": Contains styling for the web pages
"database.sql": Contains database/table SQL commands
"README.md": Project documentation

---

8. Application Flow

User
  |
  ↓
Open Study Material Directory
  |
  ├── Add Study Material
  |       |
  |       ↓
  |   Enter Details
  |       |
  |       ↓
  |   Validate Input
  |       |
  |       ↓
  |   Insert into MySQL
  |
  ├── View Materials
  |       |
  |       ↓
  |   Fetch Records
  |       |
  |       ↓
  |   Display Materials
  |
  └── Search Material
          |
          ↓
      Enter Search
          |
          ↓
      Execute Query
          |
          ↓
      Display Results

---

9. Database Operations

The project demonstrates the following database operations:

1. INSERT: Used to add new study material records.

INSERT INTO study_material (title, subject, unit, resource_link, uploader_name)
VALUES (?, ?, ?, ?, ?);

2. SELECT: Used to retrieve and display stored study materials.

SELECT * FROM study_material;

3. SEARCH: Used to find study materials based on relevant information such as title, subject, or unit. The search operation uses SQL queries with the "LIKE" condition.

These operations allow users to add, view, and search study materials efficiently.

---

10. Security Features

The project considers basic database and application security practices.

-Prepared Statements

Prepared/binded SQL statements are used for database operations where applicable. This helps protect the application from SQL Injection.

-Input Validation

User input is validated before it is processed or stored.

-Output Escaping

Database/user-provided values should be escaped before displaying them in HTML to reduce the risk of cross-site scripting.

-Database Credentials

Database connection details are maintained in the configuration file rather than being repeatedly written in every PHP page.

---

11. Hosting

The project was developed using XAMPP and MySQL during local development and was also hosted online using InfinityFree.

The hosted version allows the project to be accessed through a web browser.

---

12. Advantages

- Easy to use.
- Centralized storage of study materials.
- Faster searching of academic resources.
- Reduces scattered study-material information.
- Uses a structured relational database.
- Demonstrates practical DBMS concepts.
- Can be accessed through a web browser.

---

13. Future Scope

The project can be enhanced in the future by adding:

- Adding Student and admin role-based login.
- Material upload functionality.
- PDF/document storage.
- Download functionality.
- Material categories.
- Advanced search and filtering.
- Edit and delete controls for authorized users.
- Improved authentication and authorization.
- Pagination for large numbers of records.

---

14. Project Screenshots

Screenshots of the following pages can be added to the final report:

1. Home/Main Page
2. Add Study Material Page
3. Successfully Added Material
4. View Study Materials Page
5. Search Result
6. Hosted Website on InfinityFree

---

15. Project Repository

GitHub Repository:
https://github.com/kaveribhumbar0803-ctrl/Study-Material-Directory

Hosted Website:
https://collegedemo08.infinityfree.io/
---

16. Conclusion

The Study Material Directory successfully demonstrates the use of database management concepts in a practical web-based application.

The system provides a structured method to store and retrieve study-material information using PHP and MySQL. It also demonstrates SQL operations, database connectivity, searching, validation, and basic security practices.

This project provides a useful foundation for managing academic resources digitally and can be further expanded with additional features in the future.

---

17. Declaration

I hereby declare that the Study Material Directory project has been developed as part of my academic DBMS project work. The project demonstrates the practical application of database concepts using PHP, MySQL, HTML, and CSS.

Student Name: Kaveri Manoharrao Bhumbar
Roll No.: MLU24F082
Division: B
Statement No.: 34
