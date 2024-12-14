# WEB2-PROJECT-EELU | User Management System (A Simple PHP Web Dynamic APP)

## Project Overview

### Purpose
The User Management System is a web application designed to provide a simple, efficient, and user-friendly interface for managing user records using PHP, MySQL, and modern web technologies.

## System Requirements

### Software Prerequisites
- Web Server: Apache (recommended via XAMPP)
- PHP: Version 7.4 or higher
- MySQL: Version 5.7 or higher

## Installation Guide

### Step 1: Environment Setup
1. Download and install XAMPP from https://www.apachefriends.org/
2. Ensure Apache and MySQL services are running
3. Place project files in `htdocs` directory

### Step 2: Database Configuration
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Create database: `web-app-db`
3. Create `users` table with following schema:
   ```sql
   CREATE TABLE `users` (
       `id` INT AUTO_INCREMENT PRIMARY KEY,
       `name` VARCHAR(100) NOT NULL,
       `email` VARCHAR(100) NOT NULL,
       `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

## Project Structure

### File Breakdown
- `db_config.php`: Database connection management
- `index.php`: Main application interface
- `user.php`: User management logic
- `style.css`: Application styling

### Key Components

#### Database Class (`db_config.php`)
- Manages database connection

#### User Manager (`user.php`)
Supports CRUD operations:
- Create new users
- Read user information
- Update existing user details
- Delete user records

#### User Interface (`index.php`)
Features:
- Dynamic form for user input
- User listing
- Edit and delete functionality
- Responsive design

## Features

1. User Creation
   - Add new users with name and email
   - Automatic timestamp generation
   - Input validation

2. User Management
   - View all users
   - Edit user information
   - Delete user records
   - Responsive table display
==
## Technologies Used
- Backend: PHP
- Database: MySQL
- Frontend: HTML5, CSS3

## Support and Contact

For support, feature requests, or bug reports:
- Email: khalidelshawadfy771@gmail.com
- GitHub: https://github.com/yatara21
