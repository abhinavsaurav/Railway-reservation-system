<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Homepage</title>
<style>
html { 
        background: url('picture/pic1.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
	{margin: 0;padding:0;}
	
body {margin:0;}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;				//light black
    position: fixed;
    top: 0;
    width: 100%;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color:  #111;			//pitch black
}
:hover:not(.active) {
		background-color:;
}

.active {
    background-color:#db4144; 				//#4CAF50;	green
}
.active1{
	background-color:#4caf50;
}
	#div0{
		margin-left:100px;
	}
	
	#div1{
		position:relative;
		float:left;
		width:25%;
		padding-left:30px;
		padding-right:30px;
		overflow:50%;
	}
	#div2{
		float:right;
		position:relative;
		width:48%;
		height:500px;
		
		margin-right:250px;		
		
	}
	#resiz{
		//margin-right:160px;
		//width:80%;
		//padding-right:40px;
	}
	
	input[type=button], input[type=submit], input[type=reset]{
    
    border: none;
    color: white;
	border-radius:25px;
	
    padding: 8px 16px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	//width:50%;
	background-color:#46aece;
}
 input[type=text], input[type=password]{
	text-align:center;
	
	margin: 4px 2px;
    //width:66%;
	margin:5px;
	padding: 8px 16px;
	border-radius:5px;
	border: none;
 }
 .bordAdd{	
    border: 2px solid;
    border-radius: 25px;
	
	
	} 
	hr{
		 display: block;
			height: 1px;
			border: 0;
			border-top: 1px solid #ccc;
			margin: 1em 0;
			padding: 0; 
			border-color:black;
	}
	.widthadd{
		float:right;
		
	}
	#signout1:hover{
		background-color:#db4144;
	}
	
	
</style>
</head>

<body>


<ul class="topmenu">
  <li><a class="active" href="http://localhost/example/page1.php">Home</a></li>
  <li><a href="http://localhost/example/cancel.php" class="right">Cancellation</a></li>
  <li><a  href="http://localhost/example/display_ticket.php">Booked Ticket Details</a></li>
  <li><a href="http://localhost/example/station_code.php">Station Code</a></li>
  <li><a href="http://localhost/example/about.php" >About</a></li>
   <li id="signout1" class="widthadd"><a href="http://localhost/example/index.html">Sign Out</a></li>
</ul>
<h1><center>Train Between Stations</center></h1><hr><br>
<div id="div0">
	<div id="div1">
		<div class="bordAdd"><center>
			<form action="http://localhost/example/page1.php" method="POST">
				<h2>SEARCH</h2><hr>
				SOURCE:<br><input type="text" name="source" placeholder="source station">
				<br><br>
				DESTINATION:<br><input type="text" name="dest" placeholder="destination station">
				<br><br>
				<input type='submit' name="but1">
				
			</form></center>
			<br><br>
		</div>
	</div>
	<div id="div2" class="bordAdd">
		<div id="resiz">
		<center>
		<h2>TRAINS</h2><hr>
		<?php 
			if(isset($_POST['but1'])){
				echo '';
				include('page1_list.php');
				
			}
			
		?></center>
		</div>
	</div>

</div>

</body>

</html>