
<?php
session_start();
if (isset($_SESSION['message'])) {
    echo "<div class='success-message'>{$_SESSION['message']}</div>";
    unset($_SESSION['message']); // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <label class="logo">W-Schools</label>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="admission.php">Admission</a></li>
          <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>School Management System</h1>
        <form action="add_school.php" method="POST">
            <label for="name">School Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="level">School Level:</label>
            <select name="level" id="level" required>
                <option value="pre-primary">Pre-Primary</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="tertiary">Tertiary</option>
            </select>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <label for="num_students">Number of Students:</label>
            <input type="number" name="num_students" id="num_students" required>

            <button type="submit">Add School</button>
        </form>
        <a href="view_schools.php">View Schools</a>
    </div>

    <footer>
        <h3 class="footer_text">All @copyright reserved by School Management.</h2>
    </footer>
</body>
</html>