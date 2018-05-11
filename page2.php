<html><head>
<title>Form Details</title>
<style>
body {margin:0;}
{margin: 0;padding:0;}
html { 
        background: url('picture/pic1.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
	

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
table, th, td{
	border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}
th {
    text-align: left;
	
	
}


input#pno[type=number]::-webkit-inner-spin-button, 
input#pno[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
#form3{
	padding-left:20px;
	padding-right:20px;
	
}
.widthadd{
		float:right;
		
	}
	input [type=text]{
	margin:5px;
	padding: 8px 16px;
	border-radius:5px;
	border: none;
	}
.btndec{
    
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
.textbox1{
	
	
	margin: 2px 1px;
    //width:66%;
	margin:5px;
	padding: 2px 6px;
	border-radius:2px;
	border: none;
 }
 

</style>
</head>
<body>
<center>
<ul class="topmenu">
  <li><a  href="http://localhost/example/page1.php">Home</a></li>
  <li><a href="http://localhost/example/cancel.php">Cancellation</a></li>
  <li><a  href="http://localhost/example/display_ticket.php">Booked Ticket Details</a></li>
  <li><a href="#none" class="active" >Details</a></li>
  <li><a href="http://localhost/example/about.php" >About</a></li>
   <li id="signout1" class="widthadd"><a href="http://localhost/example/index.html">Sign Out</a></li>

  </ul>
<h1><br>Enter the passenger details for the listed train</b></h1>


<?php 
 

$radiobtn=$_POST["radbtn"];

$conn = mysqli_connect("localhost:3306","root","");
mysqli_select_db($conn,"railway");
//$sqlupdate="update train set available_seats = available_seats-1 where train_no='$radiobtn'";

//mysqli_query($conn,$sqlupdate);
					//DONE---> notice the value is continuosly decreasing reset it back to original state first and if there is no booking return to originalstate 
												// the no of available tickets to book
//$check="select available_seats from train where train_no='$radiobtn'";
//$avail_tick=mysqli_query($conn,$check);

$sql="select * from train where train_no='".$radiobtn."'";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<center><br><br>";
	
	
	//echo '<form action="http://localhost/example/page3.php" method="post">';
	//echo '<input type="hidden" name="trainNo" value="'.htmlentities($radiobtn).'">';
	echo '<table id="table2" style="width:80%;text-transform:uppercase" ><center>';	// width change here to if you want it depends upon you
	echo "<tr>
			<th>Train no</th>
			<th>Train Name</th>
			<th>Total Seats</th>
			<th>Available Seats</th>
			<th>Base Fare</th>
			<th>Arrival Time</th>
			<th>Departure time</th>
			</tr>";
    while($row = mysqli_fetch_assoc($result)) {
		$GLOBALS['farebas']=$row["baseFare"];
		$GLOBALS['trainnm']=$row["train_name"];
		$GLOBALS['arrivaltime']=$row["arriv_time"];
		$GLOBALS['deprttime']=$row["depr_time"];
		echo "<tr>";
		echo '  <td>'.$row["train_no"].'</td>
				<td>'.$row["train_name"].'</td>
				<td>'.$row["total_Seats"].'</td>
				<td>'.$row["available_seats"].'</td>
				<td>'.$row["baseFare"].'</td>
				<td>'.$row["arriv_time"].'</td>
				<td>'.$row["depr_time"].'</td>
           		</tr>';
	}
	echo '</center></table></form>';
	} else {
    echo '<span class="text-danger">Database Error</span></form>';
	}



?>
<br><br><form id="form3" action="http://localhost/example/page3.php" method="POST">
<input type="hidden" name="trainNo" value="<?php echo $radiobtn;?>">
<input type="hidden" name="bfare" value="<?php echo $farebas;?>">
<input type="hidden" name="nmtrain" value="<?php echo $trainnm;?>">
<input type="hidden" name="arrivtime" value="<?php echo $arrivaltime;?>">

<input type="hidden" name="deprtime" value="<?php echo $deprttime;?>">


<table id="table3" style="width:80%;text-transform:uppercase " >		<!-- check the width if u wanna inc or decr -->
	<tr><th>#</th>
		<th>Aadhar No.</th>
		<th>Name</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Contact no.</th>
	</tr>
	<tr><td>1</td>
			
		<td><input type="text" name="inpid1" class="textbox1"  required></td>
		<td><input type="text" name="inpnm1" class="textbox1" required></td>
		<td><select name="inp_gen1"><option value="male">MALE</option>
								   <option value="female">FEMALE</option></select></td>
		<td><input type="number" name="inpag1" class="textbox1" style="width:50px" min="0" max="100" required></td>
		<td><input type="number" name="inpno1" class="textbox1" id="pno" min="0" max="9999999999" required></td>
	</tr>
	</tr><tr><td>2</td>
		<td><input type="text" class="textbox1" name="inpid2"></td>
		<td><input type="text" class="textbox1" name="inpnm2"></td>
		<td><select name="inp_gen2"><option value="male">MALE</option>
								   <option value="female">FEMALE</option></select></td>
		<td><input type="number" class="textbox1" name="inpag2" style="width:50px" min="0" max="100"></td>
		<td><input type="number" class="textbox1" name="inpno2" id="pno" min="0" max="9999999999"></td>
	</tr>
	</tr><tr><td>3</td>
		<td><input type="text" class="textbox1" name="inpid3"></td>
		<td><input type="text" class="textbox1" name="inpnm3"></td>
		<td><select name="inp_gen3"><option value="male">MALE</option>
								   <option value="female">FEMALE</option></select></td>
		<td><input type="number" name="inpag3" class="textbox1" style="width:50px" min="0" max="100"></td>
		<td><input type="number" name="inpno3" class="textbox1" id="pno" min="0" max="9999999999"></td>
	</tr>
	</table><br><br>
	<div style="text-align: center">
	<input class="btndec"type="submit" name="subpass" value="submit">
	&nbsp;&nbsp;
	<input class="btndec" type="reset" name="resetform" value="Reset">
	</div>
</form></center></body>
<html>