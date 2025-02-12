<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize user inputs
$username = $conn->real_escape_string($_POST['username']);
$password = $_POST['password']; // Do not sanitize password here

// SQL query to check credentials
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['loginMessage'] = "Login successful!";
        header("Location: welcome.php"); // Redirect to the welcome page
    } else {
        $_SESSION['loginMessage'] = "Invalid password.";
        header("Location: login.php"); // Redirect back to login form
    }
} else {
    $_SESSION['loginMessage'] = "Invalid username.";
    header("Location: login.php"); // Redirect back to login form
}

$conn->close();
?>
