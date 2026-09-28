# Doctor Appointment Booking System

A web-based **Doctor Appointment Booking System** developed using **PHP and MySQL**. The system provides separate functionalities for patients, doctors, and administrators to manage doctor appointments and related information through a centralized web application.

Patients can register, search for doctors based on specialization, book appointments, view appointment history, and cancel appointments. Doctors can manage their appointments and search appointment records, while administrators can manage doctors, patients, and appointment information.

## 📌 Features

- 👤 Patient registration and login
- 🔐 Session-based authentication for patients, doctors, and administrators
- 📧 Duplicate email prevention during patient registration
- 🩺 Doctor search based on specialization
- 📅 Appointment booking based on doctor, date, and time
- 💰 Automatic display of the doctor's consultancy fee during appointment booking
- 📋 Appointment history and status tracking
- ❌ Appointment cancellation by patients and doctors
- 👨‍⚕️ Doctor dashboard for viewing and managing appointments
- 🔎 Doctor appointment search using patient contact number
- 👨‍💼 Admin dashboard for managing doctors, patients, and appointments
- ➕ Admin option to add doctors
- 🗑️ Admin option to delete doctors
- 🔎 Admin search for doctors by email
- 🔎 Admin search for patients by contact number
- 🔎 Admin search for appointments by contact number
- 🗄️ MySQL database with unique email and username constraints
- 🎨 Dashboard-based user interface with sidebar navigation
- 🌙 Dark mode toggle
- 📊 Role-specific dashboards and functionality

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache
- **Development Environment:** XAMPP
- **Database Management:** phpMyAdmin
- **Code Editor:** Visual Studio Code
- **Version Control:** Git and GitHub

## 📂 Project Structure

    Doctor-Appointment-Booking-System/
    │
    ├── assets/
    │   ├── app.js
    │   ├── login.png
    │   ├── style.css
    │   └── welcome.png
    │
    ├── admin-panel.php          # Patient dashboard
    ├── admin-panel1.php         # Admin dashboard
    ├── doctor-panel.php         # Doctor dashboard
    ├── appsearch.php            # Admin: search appointments by contact
    ├── doctorsearch.php         # Admin: search doctors by email
    ├── patientsearch.php        # Admin: search patients by contact
    ├── search.php               # Doctor: search own appointments by patient contact
    ├── contact.php
    ├── error.php
    ├── error1.php
    ├── error2.php
    ├── error3.php
    ├── func.php                 # Patient login
    ├── func1.php                # Doctor login
    ├── func2.php                # Patient registration
    ├── func3.php                # Admin login
    ├── index.php                # Home: patient registration, doctor and admin login
    ├── index1.php               # Patient login
    ├── logout.php
    ├── logout1.php
    ├── migrate_uniqueness.sql
    ├── myhmsdb.sql
    ├── newfunc.php
    ├── services.html            # About Us
    └── README.md

## ⚙️ Installation and Setup

### 1. Install XAMPP

Install XAMPP and start the following services from the XAMPP Control Panel:

- Apache
- MySQL

### 2. Clone the Repository

Open Command Prompt or PowerShell and navigate to the XAMPP `htdocs` directory.

Run the following command:

    cd C:\xampp\htdocs

Clone the repository:

    git clone https://github.com/sangeethashenoy90/Doctor-Appointment-Booking-System.git

### 3. Create the Database

Open phpMyAdmin in your browser:

    http://localhost/phpmyadmin/

Create a new database named:

    myhmsdb

Import the following SQL files into the `myhmsdb` database:

1. `myhmsdb.sql`
2. `migrate_uniqueness.sql`

Make sure both SQL files are imported successfully before running the application.

### 4. Run the Application

Make sure the project folder is located inside:

    C:\xampp\htdocs\

Start Apache and MySQL from the XAMPP Control Panel.

Then open the application in your browser:

    http://localhost/Doctor-Appointment-Booking-System/

The URL may vary depending on the name of the project folder.

## 🗄️ Database Configuration

The application uses the default XAMPP MySQL configuration:

    Host: localhost
    User: root
    Password: (empty)
    Database: myhmsdb

If your MySQL `root` account uses a password, update the corresponding `mysqli_connect()` configuration in the PHP files.

## 👥 System Modules

### 👤 Patient Module

Patients can:

- Register for an account
- Log in through the session-based authentication system
- Search for doctors by specialization
- Select a doctor, date, and time
- View the doctor's consultancy fee
- Book appointments
- View appointment history
- Track appointment status
- Cancel appointments

### 👨‍⚕️ Doctor Module

Doctors can:

- Log in to their account
- View appointments booked with them
- Search appointments using the patient's contact number
- View appointment information
- Cancel appointments
- Track appointment status

### 👨‍💼 Admin Module

Administrators can:

- Log in to the admin panel
- View registered doctors
- View registered patients
- View appointments
- Search doctors by email
- Search patients by contact number
- Search appointments by contact number
- Add doctors
- Delete doctors

## 🔒 Data Rules

The system implements the following database rules:

- Patient email addresses must be unique.
- Doctor email addresses must be unique.
- Doctor usernames must be unique.
- Doctors are deleted using their primary ID rather than their email address.
- Names, specializations, and consultancy fees can contain repeated values where appropriate.

## 🎯 Project Objective

The objective of this project is to develop a centralized web-based platform that simplifies doctor appointment booking and improves the management of patient, doctor, and appointment information.

The system brings patients, doctors, and administrators together on a single platform and provides dedicated functionality for each user role.

## 🎨 User Interface

The application includes a redesigned dashboard-based interface with:

- Sidebar navigation
- Role-specific dashboard layouts
- Improved forms and tables
- Organized appointment information
- Role-specific navigation
- Dark mode toggle
- User-friendly navigation and presentation

## 🚀 Future Enhancements

The system can be further enhanced with:

- 💳 Online payment integration
- 📧 Email and SMS appointment notifications
- 🗓️ Doctor availability management
- ⏰ Automated appointment reminders
- 🔐 Password hashing
- 🛡️ Prepared SQL statements for improved security
- ✏️ Edit functionality for doctor and patient records
- 📱 Fully responsive design for mobile devices
- 🔑 Improved role-based access control

## ⚠️ Security Note

This project is intended for **educational purposes**.

The current implementation uses plain-text passwords and contains SQL queries that are not fully parameterized. Therefore, the application should **not be deployed in a production environment without implementing appropriate security improvements**, including password hashing, prepared statements, input validation, and stronger authentication mechanisms.

## 🎓 Academic Project

**Project Type:** BCA Group Project

## 👩‍💻 Contributor

**Contributor:** [Sangeetha Shenoy](https://github.com/sangeethashenoy90)

## 🔗 Repository

[Doctor Appointment Booking System – GitHub](https://github.com/sangeethashenoy90/Doctor-Appointment-Booking-System)
