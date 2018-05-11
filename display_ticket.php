<html><head>
<title>Display Ticket</title>
<style>
{margin: 0;padding:0;}
html { 
        background: url('picture/pic1.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
	input[type=button], input[type=submit], input[type=reset]{
    
    border: none;
    color: white;
	border-radius:25px;
	
    padding: 8px 16px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	width:15%;
	background-color:#46aece;
}
 #textbox1{
	text-align:center;
	margin: 4px 2px;
    width:20%;
	margin:5px;
	padding: 8px 16px;
	border-radius:5px;
	border: none;
 }
table {
    border-collapse: collapse;
    width: 100%;
}
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
    background-color: #111;			//pitch black
}

.active {
    background-color: #db4144;	//green
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}
tr:nth-child(odd){background-color:#ffffff;}
th {
    background-color: #333;
    color: white;
}
.widthadd{
		float:right;
		
	}
</style>
</head>
<body>
<ul class="topmenu">
  <li><a href="http://localhost/example/page1.php">Home</a></li>
  <li><a href="http://localhost/example/cancel.php" class="right">Cancellation</a></li>
  <li><a class="active" href="http://localhost/example/display_ticket.php">Booked Ticket Details</a></li>
  <li><a href="http://localhost/example/about.php" >About</a></li>
   <li id="signout1" class="widthadd"><a href="http://localhost/example/index.html">Sign Out</a></li>

</ul>
<form action="http://localhost/example/display_ticket.php" method="POST"><center><br><br>
<h4><b>ENTER THE PNR NO OF BOOKED TICKET:</b><h4><input type:"text" name="pnr_inp" id="textbox1" placeholder="ENTER PNR NO"><br>
<br><input type="submit" name="button2" value="Display Ticket"><br></center>

</form>
<?php

	$conn = mysqli_connect("localhost:3306","root","");
	mysqli_select_db($conn,"railway");

	if(isset($_POST['button2'])){ 
		$pnrno=$_POST["pnr_inp"];
	$valueret="select * from ticket where pnr_no='$pnrno'";
	$result=mysqli_query($conn,$valueret);
	echo '<center><h3>Reservation details</h3><table id="table0" style="width:80%;text-transform:uppercase">
		<tr>
			<th>Unique id</th>
			<th>PNR NO</th>
			<th>Train no</th>
			<th>traveller name</th>
			<th>traveller idproof</th>
			<th>traveller age</th>
			</tr>';
	
	while($row = mysqli_fetch_assoc($result)) {
		
		
		
		echo "<tr>";
		echo '  <td>'.$row["uniq_pass_id"].'</td>
				<td>'.$row["pnr_no"].'</td>
				<td>'.$row["train_no"].'</td>
				<td>'.$row["traveller_name"].'</td>
				<td>'.$row["traveller_idproof"].'</td>
				<td>'.$row["traveller_age"].'</td>
				
           		</tr>';
	}
	echo '</table>';
	}
	?>

</body>
<html>