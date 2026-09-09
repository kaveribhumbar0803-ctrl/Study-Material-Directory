Study Material Directory



1\. Student Details



Detail| Information

Student Name| Kaveri Manoharrao Bhumbar

Roll No.| MLU24F082

Division| B

Statement No.| 34

Project Title| Study Material Directory



\---



2\. Project Overview



The Study Material Directory is a web-based database management system developed to store, manage, search, and display academic study materials in an organized manner.



The system provides a centralized platform where study material information such as title, subject, unit, resource link, and uploader name can be stored and accessed easily.



The project demonstrates the practical implementation of DBMS concepts, SQL queries, PHP, MySQL, database connectivity, validation, and security techniques.



\---



3\. Problem Statement



Students often have difficulty finding study materials because resources are scattered across different platforms, messages, and files.



The Study Material Directory provides a centralized database where study-material details can be stored systematically and searched whenever required.



\---



4\. Objectives



The main objectives of the project are:



\- To create a centralized directory for study materials.

\- To store study-material information in a MySQL database.

\- To provide an easy way to add and view study materials.

\- To provide search functionality for finding required materials.

\- To organize materials according to subject and unit.

\- To demonstrate database operations using PHP and MySQL.

\- To implement basic input validation and database security.

\- To make the system accessible through a web browser.



\---



5\. Features



The major features of the Study Material Directory are:



5.1 Add Study Material



Users can enter study-material details and store them in the database.



5.2 View Study Materials



Stored study-material records can be displayed from the database.



5.3 Search Materials



Users can search for required study materials.



5.4 Subject and Unit Organization



Materials can be organized using subject and unit information.



5.5 Resource Links



Each material can contain a resource link for accessing the required study resource.



5.6 Uploader Information



The name of the person who uploaded the material can be stored.



5.7 Database Connectivity



PHP is connected with the MySQL database to perform database operations.



5.8 Input Validation



Input values are checked before processing to reduce invalid data.



5.9 Secure Database Queries



Prepared/binded SQL statements are used where applicable to reduce the risk of SQL injection.



\---



6\. Technology Stack



Technology| Purpose

HTML| Structure of web pages

CSS| Styling and page design

PHP| Server-side programming

MySQL| Database management

XAMPP| Local development environment

InfinityFree| Web hosting



\---



7\. Project Structure



study\_material/

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



File| Description

"index.php"| Main page/interface of the system

"save.php"| Processes and saves study-material information

"search.php"| Performs search operations

"view.php"| Displays stored study materials

"config.php"| Contains database connection/configuration

"style.css"| Contains styling for the web pages

"database.sql"| Contains database/table SQL commands

"README.md"| Project documentation



\---



8\. Database Design



The project uses a MySQL database to store study-material information.



Study Material Table



Field| Description

ID| Unique identifier for each material

Title| Title/name of the study material

Subject| Subject related to the material

Unit| Unit number or unit name

Resource Link| Link to the study resource

Uploader Name| Name of the person who uploaded the material



Basic Relationship



&#x20;             STUDY MATERIAL DIRECTORY

&#x20;                      |

&#x20;                      |

&#x20;             STUDY MATERIAL TABLE

&#x20;                      |

&#x20;      ┌───────────────┼────────────────┐

&#x20;      ↓               ↓                ↓

&#x20;    Title           Subject           Unit

&#x20;      |

&#x20;      ↓

&#x20;Resource Link

&#x20;      |

&#x20;      ↓

&#x20;Uploader Name



\---



9\. Application Flow



User

&#x20; |

&#x20; ↓

Open Study Material Directory

&#x20; |

&#x20; ├── Add Study Material

&#x20; |       |

&#x20; |       ↓

&#x20; |   Enter Details

&#x20; |       |

&#x20; |       ↓

&#x20; |   Validate Input

&#x20; |       |

&#x20; |       ↓

&#x20; |   Insert into MySQL

&#x20; |

&#x20; ├── View Materials

&#x20; |       |

&#x20; |       ↓

&#x20; |   Fetch Records

&#x20; |       |

&#x20; |       ↓

&#x20; |   Display Materials

&#x20; |

&#x20; └── Search Material

&#x20;         |

&#x20;         ↓

&#x20;     Enter Search

&#x20;         |

&#x20;         ↓

&#x20;     Execute Query

&#x20;         |

&#x20;         ↓

&#x20;     Display Results



\---



10\. Database Operations



The project demonstrates the basic CRUD/database operations.



INSERT



Used to add new study-material records.



INSERT INTO study\_material

(title, subject, unit, resource\_link, uploader\_name)

VALUES (?, ?, ?, ?, ?);



SELECT



Used to retrieve stored study materials.



SELECT \* FROM study\_material;



SEARCH



Search queries are used to find materials based on relevant information such as title, subject, or unit.



UPDATE



If implemented in the project, update operations can be used to modify existing material details.



DELETE



If implemented in the project, delete operations can be used to remove unwanted records.



\---



11\. Security Features



The project considers basic database and application security practices.



Prepared Statements



Prepared/binded SQL statements are used for database operations where applicable. This helps protect the application from SQL Injection.



Input Validation



User input is validated before it is processed or stored.



Output Escaping



Database/user-provided values should be escaped before displaying them in HTML to reduce the risk of cross-site scripting.



Database Credentials



Database connection details are maintained in the configuration file rather than being repeatedly written in every PHP page.



\---



12\. Testing



The following test cases can be used to verify the system.



Test Case| Input/Action| Expected Result

Add Material| Enter valid material details| Record should be stored

Empty Input| Submit incomplete details| Validation should handle invalid input

View Materials| Open view page| Stored records should be displayed

Search Material| Enter a subject/title| Matching records should be displayed

Invalid Search| Enter unavailable keyword| No matching record/message should be displayed

Database Connection| Open application| Application should connect to MySQL successfully

Resource Link| Open stored link| Required resource should open if the link is valid



\---



13\. Hosting



The project was developed using XAMPP and MySQL during local development and was also hosted online using InfinityFree.



The hosted version allows the project to be accessed through a web browser.



\---



14\. Advantages



\- Easy to use.

\- Centralized storage of study materials.

\- Faster searching of academic resources.

\- Reduces scattered study-material information.

\- Uses a structured relational database.

\- Demonstrates practical DBMS concepts.

\- Can be accessed through a web browser.



\---



15\. Future Scope



The project can be enhanced in the future by adding:



\- Student and admin role-based login.

\- Material upload functionality.

\- PDF/document storage.

\- Download functionality.

\- Material categories.

\- Advanced search and filtering.

\- Edit and delete controls for authorized users.

\- Improved authentication and authorization.

\- Pagination for large numbers of records.



\---



16\. Conclusion



The Study Material Directory successfully demonstrates the use of database management concepts in a practical web-based application.



The system provides a structured method to store and retrieve study-material information using PHP and MySQL. It also demonstrates SQL operations, database connectivity, searching, validation, and basic security practices.



This project provides a useful foundation for managing academic resources digitally and can be further expanded with additional features in the future.



\---



17\. Declaration



I hereby declare that the Study Material Directory project has been developed as part of my academic DBMS project work. The project demonstrates the practical application of database concepts using PHP, MySQL, HTML, and CSS.



Student Name: Kaveri Manoharrao Bhumbar

Roll No.: MLU24F082

Division: B

Statement No.: 34



\---



18\. Project Screenshots



Screenshots of the following pages can be added to the final report:



1\. Home/Main Page

2\. Add Study Material Page

3\. Successfully Added Material

4\. View Study Materials Page

5\. Search Page

6\. Search Results

7\. Login Page

8\. Logout/Session Result

9\. MySQL Database

10\. Hosted Website on InfinityFree



\---



19\. Project Repository



GitHub Repository:

Add your final GitHub repository link here.



Hosted Website:

Add your final InfinityFree website link here.

