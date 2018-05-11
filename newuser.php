<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>

<style>
{margin: 0;padding:0;}
html { 
        background: url('picture/pic1.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

h1{
	font-size:45px;
	word-spacing:5px;
	
}
table {
  border-spacing: 15px;
}

input[type=button], input[type=submit], input[type=reset]{
    
    border: none;
    color: white;
	border-radius:25px;
	
    padding: 8px 16px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	width:50%;
	background-color:#46aece;
}
 input[type=text], input[type=password]{
	 text-align:center;
	margin: 4px 2px;
    width:72%;
	margin:5px;
	padding: 8px 16px;
	border-radius:5px;
	border: none;
 }
 .bordAdd{	
    border: 2px solid;
    border-radius: 25px;
	margin-left:35%;
	margin-right:35%;
	
	}




</style>
</head>
<title>NEW USER</title>
<meta charset="ISO-8859-1">
<body><br><center><h1>NEW USER REGISTRATION</h1></center><br><br><br><center><div class="bordAdd"><br><br>
<form action="http://localhost/example/newuser.php" method="POST">

<b>NEW USERID:</b><br><input type="text" name="newuser" placeholder="ENTER A NEW USERID"><br><br>

<b>NEW PASSWORD:</b><br><input type="password" name="newpass" placeholder="ENTER PASSWORD"><br><br>
<input type="submit" name="newcheck" value="SUBMIT"><br><br>
<a href="http://localhost/example/index.html"><input type="button" value="BACK"></a>
</form><br><br></div>


</center>
<?php
	if(isset($_POST['newcheck'])){
			$newuser=$_POST['newuser'];
			$newpass=$_POST['newpass'];
			$conn = mysqli_connect("localhost:3306","root","");
			mysqli_select_db($conn,"railway");
			$check="select * from login where userid='$newuser'";
			$result=mysqli_query($conn,$check);
			$message="user id exists";
			if(mysqli_num_rows($result)!=0){
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{
			$sql="insert into login values('$newuser','$newpass')";
			mysqli_query($conn,$sql);
			echo "<script type='text/javascript'>alert('New user id created');</script>";
						
			}


			
			
		}
		

?>

</body><html>