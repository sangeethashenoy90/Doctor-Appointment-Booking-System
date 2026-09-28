\# Doctor Appointment Booking System



A web-based \*\*Doctor Appointment Booking System\*\* built with \*\*PHP and MySQL\*\*. The system allows patients to book appointments with doctors, enables doctors to manage their appointments, and provides administrators with tools to manage doctors, patients, and appointment records.



This project is a \*\*redesigned and extended version of an existing open-source project\*\*, with additional functionality, database improvements, interface enhancements, and appointment-management features.



\## 📌 Features



\* 👤 Patient registration and login with duplicate email prevention

\* 📅 Appointment booking based on specialization, doctor, date, and time

\* 💰 Automatic display of the doctor's consultancy fee during appointment booking

\* ❌ Appointment cancellation by patients and doctors

\* 📊 Appointment status tracking

\* 👨‍⚕️ Doctor dashboard for viewing and managing appointments

\* 🔎 Doctor appointment search by patient contact number

\* 👨‍💼 Admin panel for managing doctors, patients, and appointments

\* ➕ Admin option to add doctors

\* 🗑️ Admin option to delete doctors

\* 🔎 Admin search for doctors by email

\* 🔎 Admin search for patients and appointments by contact number

\* 🔐 Session-based authentication for patients, doctors, and administrators

\* 🗄️ MySQL database with unique email and username constraints

\* 🎨 Redesigned user interface with a sidebar dashboard layout

\* 🌙 Dark mode toggle



\## 🛠️ Technologies Used



\* \*\*Frontend:\*\* HTML, CSS, JavaScript

\* \*\*Backend:\*\* PHP

\* \*\*Database:\*\* MySQL

\* \*\*Server:\*\* Apache (XAMPP)

\* \*\*Tools:\*\* VS Code, XAMPP, phpMyAdmin, Git, GitHub



\## 📂 Project Structure



```text

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

├── migrate\_uniqueness.sql

├── myhmsdb.sql

├── newfunc.php

├── services.html             # About us

└── README.md

```



\## ⚙️ Installation and Setup



\### 1. Install XAMPP



Install \[XAMPP](https://www.apachefriends.org/) and start the following services:



\* Apache

\* MySQL



\### 2. Clone the Repository



Open Command Prompt or PowerShell and navigate to the XAMPP `htdocs` directory:



```bash

cd C:\\xampp\\htdocs

```



Clone the repository:



```bash

git clone https://github.com/sangeethashenoy90/Doctor-Appointment-Booking-System.git

```



\### 3. Create the Database



Open phpMyAdmin:



```text

http://localhost/phpmyadmin/

```



Create a database named:



```text

myhmsdb

```



Import the following SQL file into the database:



```text

myhmsdb.sql

```



> \*\*Note:\*\* `migrate\_uniqueness.sql` is intended for databases created from an older version of the project. Do not run it after a fresh import of `myhmsdb.sql`, as the current database script already contains the required uniqueness changes.



\### 4. Run the Application



Make sure the project is located inside:



```text

C:\\xampp\\htdocs\\

```



Then open the application in your browser:



```text

http://localhost/Doctor-Appointment-Booking-System/

```



The URL may vary depending on the name of the project folder.



\## 🗄️ Database Configuration



The application uses the default XAMPP MySQL configuration:



```text

Host: localhost

User: root

Password: (empty)

Database: myhmsdb

```



If your MySQL root account uses a password, update the corresponding `mysqli\_connect()` configuration in the PHP files.



\## 👥 System Modules



\### Patient Module



Patients can:



\* Register for an account

\* Log in securely through the session-based system

\* Search for doctors by specialization

\* Select a doctor, date, and time

\* Book appointments

\* View appointment history

\* Cancel appointments



\### Doctor Module



Doctors can:



\* Log in to their account

\* View appointments booked with them

\* Search appointments using the patient's contact number

\* Cancel appointments

\* Track appointment status



\### Admin Module



Administrators can:



\* Log in to the admin panel

\* View registered doctors

\* View registered patients

\* View appointments

\* Search doctors by email

\* Search patients by contact number

\* Search appointments by contact number

\* Add doctors

\* Delete doctors



\## 🔒 Data Rules



\* Patient email addresses must be unique.

\* Doctor email addresses must be unique.

\* Doctor usernames must be unique.

\* Doctors are deleted using their primary ID rather than their email address.

\* Fields such as names, specializations, and consultancy fees can contain repeated values where appropriate.



\## 🎯 Project Objective



The objective of this project is to develop a centralized web-based platform that simplifies doctor appointment booking and improves the management of patient, doctor, and appointment information.



The system brings different user roles together in a single platform and provides dedicated functionality for patients, doctors, and administrators.



\## 🎨 User Interface



The application includes a redesigned dashboard-based interface with:



\* Sidebar navigation

\* Dashboard layouts

\* Improved form and table presentation

\* Dark mode toggle

\* Role-specific navigation and functionality



\## 🚀 Future Enhancements



\* Online payment integration

\* Email and SMS appointment notifications

\* Doctor availability management

\* Automated appointment reminders

\* Password hashing

\* Prepared SQL statements for improved security

\* Edit functionality for doctor and patient records

\* Fully responsive design for mobile devices

\* Improved role-based access control



\## ⚠️ Security Note



This project is intended for \*\*educational purposes\*\*.



The current implementation uses plain-text passwords and contains SQL queries that are not fully parameterized. Therefore, the application should \*\*not be deployed in a production environment without implementing appropriate security improvements\*\*, including password hashing, prepared statements, input validation, and stronger authentication mechanisms.



\## 🎓 Academic Project



\*\*Project Type:\*\* BCA Group Project



\## 👩‍💻 Contributor



\*\*Contributor:\*\* \[Sangeetha Shenoy](https://github.com/sangeethashenoy90)



\## 🔗 Repository



\[Doctor Appointment Booking System – GitHub](https://github.com/sangeethashenoy90/Doctor-Appointment-Booking-System)



