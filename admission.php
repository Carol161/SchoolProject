<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

elseif ($_SESSION['usertype'] == 'student') {
    header("Location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "school_management";

$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM admission";
$result = mysqli_query($data, $sql);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php include 'admin_css.php'; ?>
    <div class="content">
      <center>
        <h1>Apply For Admission</h1>
        <br><br>
        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">Name</th>
                <th style="padding: 20px; font-size: 15px;">Email</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">Message</th>
            </tr>

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>

            <tr>
                <td style="padding: 20px">
                    <?php echo "{$info['name']}"; ?>
                </td>
                <td style="padding: 20px">
                    <?php echo "{$info['email']}"; ?>
                </td>
                <td style="padding: 20px">
                    <?php echo "{$info['phone']}"; ?>
                </td>
                <td style="padding: 20px">
                    <?php echo "{$info['message']}"; ?>
                </td>
            </tr>

            <?php
            }
            ?>

        </table>
      </center>
    </div>
</body>
</html>
