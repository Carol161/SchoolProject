<?php

session_start();
$host="localhost";

$user="root";

$password="";

$db="school_management";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
	die("connection error");
}

if(isset($_POST['Add new school']))
{
$data_name=$_POST['name'];

$data_level=$_POST['level'];

$data_location=$_POST['location'];

$data_no_of_students=$_POST['no_of_students'];

$sql="INSERT INTO school(name,level,location,no_of_students) VALUES('$data_name','$data_level','$data_location','$data_no_of_students')";

$result=mysqli_query($data,$sql);
if($result){
	$_SESSION['message']="Your application sen  Successful";

	header("location:index.php");
}

else{
	echo "Apply Failed";
}


}


?>