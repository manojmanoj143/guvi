<?php
// Start session to persist login status across pages
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You can perform additional validation or data sanitization here

    // Example: Validate user credentials against database
    // Replace with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user from database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // If user exists, set session variables and redirect to dashboard or home page
        $_SESSION['email'] = $email; // You can store more session variables if needed
        header("Location: ../profile.html"); // Replace with your dashboard or home page URL
        exit();
    } else {
        // If no user found, redirect back to login page with error message
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: ../profile.html");
        exit();
    }

    $conn->close();
} else {
    // Redirect to login page if accessed directly without form submission
    header("Location: ../login.html");
    exit();
}
?>
