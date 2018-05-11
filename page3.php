<html>
<head>
<title>Ticket</title>
<style>
#container {
	border:9px black ridge;
	margin:5px; padding:0px; 
	width:98%; height:96%;
}
body {margin:0;}
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
.widthadd{
		float:right;
		
	}

</style>
</head>
<body>
<ul class="topmenu">
  <li><a  href="http://localhost/example/page1.php">Home</a></li>
  <li><a href="http://localhost/example/cancel.php">Cancellation</a></li>
  <li><a href="#none" class="active">Details</a></li>
  <li><a href="http://localhost/example/about.php" >About</a></li>
   <li id="signout1" class="widthadd"><a href="http://localhost/example/index.html">Sign Out</a></li>

  </ul>
  <div id="container">
<center><br><br><h1>Ticket</h1></center>
<br>
<?php
$trainval=$_POST["trainNo"];
$basefare=$_POST["bfare"];
$train_name=$_POST["nmtrain"];
$arriv_time=$_POST["arrivtime"];
$depr_time=$_POST["deprtime"];

$totalfare=$basefare+(($basefare*15)/100);
$whole_tick_cost=$totalfare;
$var=time();							// for generating unique numbers it gives value in unix timestamp(1970-till)


$id1=$_POST["inpid1"];
$name1=$_POST["inpnm1"];
$gen1=$_POST["inp_gen1"];
$age1=$_POST["inpag1"];
$contact1=$_POST["inpno1"];
$conn = mysqli_connect("localhost:3306","root","");
mysqli_select_db($conn,"railway");

$sql1="insert into passenger values(".$id1.",'".$name1."','".$gen1."',".$age1.",".$contact1.")";
mysqli_query($conn,$sql1);
$tic1="insert into ticket values(DEFAULT,$var,$trainval,'$name1',$id1,$age1,$totalfare)";
mysqli_query($conn,$tic1);

$dec="call autoDecrementer($trainval)";
mysqli_query($conn,$dec);

echo '<center><h4>Train Detail</h4><table id="table3" style="width:80%;text-transform:uppercase">
		<tr>
			<th>Train no</th>
			<th>Train Name</th>
			<th>pnr no</th>
			
			
			<th>Base Fare per seat</th>
			<th>Arrival Time</th>
			<th>Departure time</th>
			</tr>';
echo	'<tr>
			<td>'.$trainval.'</td>
			<td>'.$train_name.'</td>
			<td>'.$var.'</td>			
			<td>'.$basefare.'</td>
			<td>'.$arriv_time.'</td>
			<td>'.$depr_time.'</td>
			</tr></table></center>';
echo '<br><center><h4>Passenger Details</h4><table id="table4" style="width:80%;text-transform:uppercase">
		<tr>
			<th>#</td>
			<th>Passenger Name</th>
			<th>ID Proof</th>
			<th>Age</th>
			<th>Gender</th>
		</tr>';
echo	'<tr>
			<td>1</td>
			<td>'.$name1.'</td>
			
			<td>'.$id1.'</td>
			<td>'.$age1.'</td>
			<td>'.$gen1.'</td>
			</tr>';
			
			
if((!empty($_POST["inpid2"])) && (!empty($_POST["inpnm2"])) && (!empty($_POST["inpag2"])) && (!empty($_POST["inpno2"] ))){
	$id2=$_POST["inpid2"];
	$name2=$_POST["inpnm2"];
	$gen2=$_POST["inp_gen2"];
	$age2=$_POST["inpag2"];
	$contact2=$_POST["inpno2"];
	$trainval=$_POST["trainNo"];
	$tic2="insert into ticket values(DEFAULT,$var,$trainval,'$name2',$id2,$age2,$totalfare)";		//ticket table
	mysqli_query($conn,$tic2);
	$whole_tick_cost+=$totalfare;
	
	echo	'<tr>
			<td>1</td>
			<td>'.$name2.'</td>
			<td>'.$id2.'</td>
			<td>'.$age2.'</td>
			<td>'.$gen2.'</td>
			</tr>';
	$sql2="insert into passenger values(".$id2.",'".$name2."','".$gen2."',".$age2.",".$contact2.")";	//passenger table
	mysqli_query($conn,$sql2);
	$dec2="call autoDecrementer($trainval)";
	mysqli_query($conn,$dec2);
}

if((!empty($_POST["inpid3"]))&& (!empty($_POST["inpnm3"])) && (!empty($_POST["inpag3"])) && (!empty($_POST["inpno3"]))){
	$id3=$_POST["inpid3"];
	$name3=$_POST["inpnm3"];
	$gen3=$_POST["inp_gen3"];
	$age3=$_POST["inpag3"];
	$contact3=$_POST["inpno3"];
	$tic3="insert into ticket values(DEFAULT,$var,$trainval,'$name3',$id3,$age3,$totalfare)";		//ticket table
	mysqli_query($conn,$tic3);
	$whole_tick_cost+=$totalfare;
	echo	'<tr>
			<td>3</td>
			<td>'.$name3.'</td>			
			<td>'.$id3.'</td>
			<td>'.$age3.'</td>
			<td>'.$gen3.'</td>
			</tr>';
	$sql3="insert into passenger values(".$id3.",'".$name3."','".$gen3."',".$age3.",".$contact3.")";	//passenger table
	mysqli_query($conn,$sql3);
	$trainval=$_POST["trainNo"];
	$dec3="call autoDecrementer($trainval)";
	mysqli_query($conn,$dec3);
}


  /*  while($row = mysqli_fetch_assoc($result)) {
		$GLOBALS['farebas']=$row["baseFare"];
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
*/

	echo "</table></center><center><br><h3>Total cost of ticket: Rs.".$whole_tick_cost."</h3></center>"









?>

</div>
</body>
<html>