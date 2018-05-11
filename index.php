<html>
<?php
$userid=$_REQUEST["userid"];
$pass=$_REQUEST["pass"];
$message="USERID OR PASSWORD INCORRECT";
$conn = mysqli_connect("localhost:3306","root","");
mysqli_select_db($conn,"railway");

$var="select * from login where userid = '$userid' and pass = '$pass'";

if(mysqli_num_rows(mysqli_query($conn,$var))== 1){
		echo "<br><br><center>Welcome</center>";
		header("location: http://localhost/example/page1.php");
}
else{
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<br><br><br><br><h1><center>Go back and Try again</center></h1>";
	}
?>
<html> 