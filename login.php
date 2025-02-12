<?php
session_start();


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "school_management"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Prevent SQL injection
    $entered_username = $conn->real_escape_string($entered_username);
    $entered_password = $conn->real_escape_string($entered_password);

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE username = '$entered_username'";
    $result = $conn->query($sql);

    // If a matching user is found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if the password matches (you might want to hash the password in your database for better security)
        if ($entered_password === $row['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $entered_username;
            header("Location: welcome.php");
            exit();
        } else {
            $error_message = "Invalid username or password!";
        }
    } else {
        $error_message = "Invalid username or password!";
    }
}

$conn->close();
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
