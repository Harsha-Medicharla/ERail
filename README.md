# ERail - Railway Reservation System

ERail is a web-based railway reservation system that allows users to book train tickets, check train statuses, and perform PNR inquiries. The application is built using PHP, MySQL, Bootstrap, and JavaScript, providing a user-friendly interface for managing train bookings and related functionalities. It supports user authentication, train search, passenger details management, payment processing, and ticket confirmation.

## Features

- **User Authentication**:
  - Register and log in with secure password hashing (MD5).
  - Session management for authenticated users.
  - Logout functionality.

- **Train Search and Booking**:
  - Search for trains based on source, destination, journey date, and class (Sleeper, 1A, 2A, 3A).
  - Display available trains with details such as train number, name, departure/arrival times, and fare.
  - Reverse route functionality to swap source and destination stations.

- **Passenger Details Management**:
  - Input passenger details (name, age, gender) for multiple passengers.
  - Store booking and passenger details in the database.

- **Payment Portal**:
  - Simulated credit/debit card payment interface with client-side validation for card details.
  - Updates booking status to "CONFIRMED" upon successful payment.

- **PNR Enquiry**:
  - Retrieve booking and passenger details using a PNR number.
  - Display journey details (train number, fare, journey date) and passenger information.

- **Train Status Tracking**:
  - Check train schedules and real-time train location based on the current time.
  - Display train status with source, destination, and expected arrival/departure times.

## Technologies Used

- **Frontend**:
  - HTML5, CSS3
  - Bootstrap 4.5.3 (CDN)
  - jQuery 3.5.1 (CDN)
  - Font Awesome 4.7.0 (CDN)
  - Google Material Icons
  - Custom CSS (`style.css`, `style2.css`)

- **Backend**:
  - PHP 7.x
  - MySQL (Database: `registration`)

- **Database**:
  - MySQL with tables: `train_info`, `train_schedule`, `pass_details`, `pass_details2`, `users`
  - Trigger to ensure passenger age is non-negative

## Project Structure

```
ERail/
├── confirm.php        # Displays available trains and allows search modification
├── errors.php         # Displays error messages for user actions
├── footer.php         # Common footer for all pages
├── index.php          # Home page for train search and booking initiation
├── login.php          # User login page
├── passenger.php      # Passenger details input page
├── payment.php        # Payment portal for booking confirmation
├── pnr.php            # PNR enquiry page
├── pnr2.php           # Ticket details display after payment
├── register.php       # User registration page
├── server.php         # Handles user authentication (login/register/logout)
├── server2.php        # Handles train search and reverse route logic
├── train_stas.php     # Train status tracking page
├── style.css          # Custom styles for forms and error messages
├── style2.css         # Additional styles for layout and tables
├── style2.php         # Duplicate of style2.css (possible typo)
├── registration.sql   # Database schema and sample data
└── README.md          # Project documentation
```

## Prerequisites

- **Web Server**: Apache or any PHP-compatible server (e.g., XAMPP, WAMP)
- **PHP**: Version 7.x or higher
- **MySQL**: Version 5.7 or higher
- **Browser**: Modern web browser (Chrome, Firefox, Edge, etc.)

## Setup Instructions

1. **Clone or Download the Project**:
   - Clone the repository or download the project files to your local machine.

2. **Set Up the Web Server**:
   - Install XAMPP/WAMP or any web server with PHP and MySQL support.
   - Place the project folder in the web server's root directory (e.g., `htdocs` for XAMPP).

3. **Configure the Database**:
   - Start the MySQL server.
   - Create a database named `registration`:
     ```sql
     CREATE DATABASE registration;
     ```
   - Import the `registration.sql` file into the `registration` database to set up tables and sample data:
     ```bash
     mysql -u root -p registration < registration.sql
     ```

4. **Update Database Configuration**:
   - Ensure the database connection settings in `server.php`, `payment.php`, `pnr2.php`, and other files match your MySQL credentials:
     ```php
     $db = mysqli_connect('localhost', 'root', '', 'registration');
     ```
     Replace `'root'` and `''` (empty password) with your MySQL username and password if different.

5. **Start the Web Server**:
   - Start Apache and MySQL services (e.g., via XAMPP Control Panel).
   - Access the application by navigating to `http://localhost/ERail/index.php` in your browser.

## Usage

1. **Register/Login**:
   - Navigate to `register.php` to create a new account.
   - Use `login.php` to log in with your credentials.
   - Logout via the "Logout" link in the navigation bar.

2. **Book a Ticket**:
   - On `index.php`, select source, destination, journey date, and class, then click "Find Trains".
   - View available trains on `confirm.php` and modify the search if needed.
   - Select a train and proceed to `passenger.php` to enter passenger details.
   - Complete the booking on `payment.php` by entering card details.
   - View the confirmed ticket on `pnr2.php`.

3. **PNR Enquiry**:
   - Go to `pnr.php`, enter the PNR number, and view booking and passenger details.

4. **Train Status**:
   - Visit `train_stas.php` to check train schedules or track a train's live status.


## Future Improvements

- Implement a real payment gateway (e.g., Stripe, PayPal).
- Enhance security with `password_hash()` and prepared statements to prevent SQL injection.
- Add seat selection and availability checks.
- Add error handling for database connection failures.
## Contributing

Contributions are welcome! Please fork the repository, make changes, and submit a pull request. Ensure your code follows the existing structure and includes appropriate documentation.


## Contact

For questions or support, contact **Harsha** at [harsha.231it038@nitk.edu.in](mailto:harsha.231it038@nitk.edu.in)
