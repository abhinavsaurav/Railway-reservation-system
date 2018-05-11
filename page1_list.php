<html><head>
<style>
#adjust1{
	//padding-left:5px;
	//padding-right:5px;
	//margin-right:80px
	
}
#table1{
	margin-left:10px;
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

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color:#f2f2f2;}
th {
    background-color: #333;
    color: white;
}

</style>
</head>
<body>
<div id="adjust1">
<?php
	$source=$_REQUEST["source"];
	$dest=$_REQUEST["dest"];

	$conn = mysqli_connect("localhost:3306","root","");
	mysqli_select_db($conn,"railway");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * from train_betwn_stations where source_st='$source' and dest_st = '$dest'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		echo '<div id="">';
		
		
		echo '<form  action="http://localhost/example/page2.php" method="post">';
		echo '<table id="table1" style="width:80%;text-transform:uppercase">';
		echo 
		   '<tr>
				<th> # </th>
				<th>Train no</th>
				<th>source</th>
				<th>Destination</th>
				<th>Train Name</th>
			</tr>';
		while($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<label><td><input type="radio" name="radbtn" value="'.$row["train_no"].'"></td>';
			echo '  <td>'.$row["train_no"].'</td>
					<td>'.$row["source_st"].'</td>
					<td>'.$row["dest_st"].'</td>
					<td>'.$row["train_name"].'</td>
					</tr>';
			echo "</label><br>";
		}
		echo '</table><br><br><center><input type="submit" name="trybutton" value="select"></center></form></div>' ;
		if(isset($_POST['radbtn'])){
			header("location: http://localhost/example/page2.php");
		}
	} else {
		echo "<script type='text/javascript'>alert('No trains Found!');</script></div>";	//add code to go back to the html page again
		
}

?></div></body>
<html>