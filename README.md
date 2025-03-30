# IFSC Code Finder PHP Project

This project is an enhanced version of the [IFSC Code Finder PHP Project](https://github.com/Nikit-370/IFSC-Code-Finder-PHP-Project), which allows users to find the IFSC (Indian Financial System Code) based on a city name, zip code, or bank name. The enhanced version introduces additional features and improvements for better usability and functionality.

## Features
- Find IFSC code by city name
- Find IFSC code by zip code
- Find IFSC code by bank name
- Admin panel for managing and updating bank details
- Enhanced search functionality for faster lookups
- Improved database structure and management

---

## How to Run the IFSC Code Finder Project Using PHP

Follow the instructions below to set up and run the project on your local machine.

### Prerequisites
- A local web server like XAMPP, WAMP, or LAMP
- PHP version 7.0 or higher
- MySQL database (for XAMPP, it is included)
- PHPMyAdmin to manage your database

---

### Step-by-Step Setup Guide

1. Download the ZIP File  
   Download the IFSC Code Finder project zip file from the provided source.

2. Extract the ZIP File  
   Extract the zip file and find the folder named ifscfinder.

3. Move the Folder to the Web Server's Root Directory  
   - For XAMPP, move the ifscfinder folder to xampp/htdocs.
   - For WAMP, move the folder to wamp/www.
   - For LAMP, move the folder to /var/www/html.

4. Set Up the Database  
   - Open PHPMyAdmin on your local server by visiting http://localhost/phpmyadmin in your web browser.
   - Create a new database called ifscdb using the PHPMyAdmin interface.

5. Import the Database File  
   - Inside the project folder, locate the ifscdb.sql file (this is the SQL database dump provided in the ZIP file).
   - In PHPMyAdmin, select the ifscdb database, then click on the "Import" tab.
   - Select the ifscdb.sql file and click "Go" to import the database into your MySQL server.

6. Run the Application
- After importing the database, you can run the script by visiting http://localhost/ifscfinder in your browser.
   - The frontend will appear, allowing you to search for IFSC codes based on city name, zip code, or bank name.

---

## Admin Panel Credentials

To manage and update the database, you can log in to the admin panel using the following credentials:

- Username: admin
- Password: Test@123

The admin panel will allow you to add, delete, or modify bank details in the database.

---

## Database Information

The database used in this project is based on the official Razorpay IFSC Database. Razorpay provides an open-source IFSC database which is comprehensive and regularly updated.

You can access the database release on the official Razorpay GitHub page:
[https://github.com/razorpay/ifsc/releases](https://github.com/razorpay/ifsc/releases)

### Database Structure

The ifscdb database consists of a single table that stores the following fields:

- IFSC_Code: The unique IFSC code for the branch.
- Bank_Name: The name of the bank.
- Branch_Name: The name of the bank branch.
- Address: The address of the bank branch.
- City: The city in which the bank branch is located.
- State: The state in which the bank branch is located.
- Zip_Code: The zip code of the bank branch location.

### Key Points:
- The database includes over 1,00,000 entries for various branches across India.
- The IFSC code, bank name, branch name, city, state, and zip code are used to fetch details in the application.
- The IFSC_Code field is indexed for fast searching.
  
### How to Update the Database

To keep the database up-to-date with the latest branch details, you can periodically download the new releases of the Razorpay IFSC Database and import them into the ifscdb table.

---

## Additional Notes

- Frontend Search: The frontend allows users to search for an IFSC code by entering a bank name, city, or zip code.
- Admin Features: As an admin, you can add new records or update existing ones using the admin panel.
- Responsive UI: The frontend is designed to be responsive and user-friendly, working seamlessly on desktops and mobile devices.

---

## License

This project is open source and distributed under the MIT license.

---

Feel free to contribute to the project by reporting bugs or submitting pull requests with new features.

