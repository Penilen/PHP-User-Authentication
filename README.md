PHP User Authentication System
Overview

A simple PHP-based user authentication system implementing secure registration and login functionality using MySQL and PDO.

This project focuses on understanding authentication fundamentals and secure password handling practices.

Features

User registration

User login

Password hashing using password_hash() (bcrypt)

Secure password verification using password_verify()

PDO prepared statements to prevent SQL injection

Basic session handling

Purpose

The goal of this project was to:

Understand authentication flow (register → login → session)

Implement secure password storage

Practice prepared statements with PDO

Learn backend security fundamentals

Project Structure

register.php – Handles user registration

login.php – Handles login and session creation

db.php – Database connection using PDO

Technologies Used

PHP

MySQL

PDO

XAMPP (local development)

Security Practices Implemented

Password hashing (bcrypt)

Prepared statements

Secure password verification

Separation of DB logic

How to Run

Install XAMPP (or similar PHP/MySQL stack)

Create a database and user table

Update database credentials in db.php

Run locally on localhost

Notes

This project was built for educational purposes and demonstrates secure authentication fundamentals in PHP.
