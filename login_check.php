<?php
session_start();

// Dummy credentials for demonstration
$valid_username = "admin";
$valid_password = "password";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging: Print the username and password to see what was entered
    echo "Username entered: " . htmlspecialchars($username) . "<br>";
    echo "Password entered: " . htmlspecialchars($password) . "<br>";

    // Validate user credentials
    if (strtolower($username) === strtolower($valid_username) && $password === $valid_password) {
        $_SESSION['loggedin'] = true; // Set a session variable to indicate the user is logged in
        $_SESSION['username'] = $username; // Store the username
        header("Location: welcome.php"); // Redirect to a new page after successful login
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>

    <center>
    <form method="POST" action="login_check.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    </center>
</body>
</html>
