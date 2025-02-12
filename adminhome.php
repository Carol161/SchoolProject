<?php

session_start();

 if(!isset($_SESSION['username'])){
	header("location:login.php");
 }

  elseif($_SESSION['usertype']=='student')
  {
  	header("location:login.php");

  }


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	
</head>
<body>

		<?php
	include 'admin_sidebar.php';
	?>
	
	<div class="content">
		<h1>Admin Dashboard</h1>
	</div>

	<form action="login_check.php" method="POST" class="login_form">
				<div>
					<label class="label_deg">Username</label>
					<input type="text" name="username">
				</div>

				<div>
					<label class="label_deg">Password</label>
					<input type="password" name="password">
				</div>

				<div>
					<input class="btn btn-primary" type="submit" name="Submit" value="Login">
				</div>
			</form>

</body>
</html>