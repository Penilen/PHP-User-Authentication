# PHP-User-Authentication
A simple PHP user registration and login system using salted bcrypt password hashing and PDO for database access.
This project is a basic PHP user authentication system that allows users to register and log in securely. Passwords are salted and hashed using bcrypt. The system uses PDO for database communication with MySQL.

Features:

User registration with unique username check

Password salting and hashing (bcrypt)

User login with password verification

Simple and clean PHP code

Requirements:

PHP 7.4 or higher

MySQL database named auth_project

PDO extension enabled

Setup:

Create the database auth_project and a table users with columns:

id (INT, primary key, auto-increment)

username (VARCHAR, unique)

password (VARCHAR)

salt (VARCHAR)

Update the db.php file with your database credentials and port.

Run the project on a local PHP server like XAMPP.

Usage:

Open register.php in your browser to create a new user.

Open login.php to log in with existing credentials.

Security Notes:

Passwords are stored securely using bcrypt with a unique salt per user.

Keep your database credentials private.

For production, consider using environment variables or secure config files.
