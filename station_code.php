<html><head>
<style>
{margin: 0;padding:0;}
html { 
        background: url('picture/pic1.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
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
table, th, td{
	border: 1px solid black;
    border-collapse: collapse;
	
	}
tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color:#f2f2f2;}
th {
    background-color: #333;
    color: white;
}
.widthadd{
		float:right;
		
	}
	th, td {
    padding: 10px;
}

</style></head>
<body>
<ul class="topmenu">
  <li><a  href="http://localhost/example/page1.php">Home</a></li>
  <li><a href="http://localhost/example/cancel.php" class="right">Cancellation</a></li>
  <li><a  href="http://localhost/example/display_ticket.php">Booked Ticket Details</a></li>
  <li><a class="active" href="http://localhost/example/station_code.php">Station Code</a></li>
  <li><a href="http://localhost/example/about.php" >About</a></li>
   <li id="signout1" class="widthadd"><a href="http://localhost/example/index.html">Sign Out</a></li>
</ul>
<center><br>
<h2>List of Stations code and their Station name</h2><br>
<table id="table1" style="width:60%;text-transform:uppercase;text-align:center">';
			<tr>
				<th> Station Code </th>
				<th> Station Name</th>
			</tr>
			<tr>
				<td>blr</td>
				<td>Bangalore</td>
				</tr>
			<tr>
				<td>nzm</td>
				<td>New delhi</td>
			</tr>
			<tr>
				<td>guj</td>
				<td>Gandhinagar</td>
			</tr>
			<tr>
				<td>cstm</td>
				<td>mumbai</td>
			</tr>
			<tr>
				<td>maa</td>
				<td>chennai</td>
			</tr>
			<tr>
				<td>lko</td>
				<td>lucknow</td>
			</tr>
			<tr>
				<td>cape</td>
				<td>kanyakumari</td>
			</tr>
			<tr>
				<td>hwh</td>
				<td>howrah</td>
			</tr>
			<tr>
				<td>jp</td>
				<td>jaipur</td>
			</tr>
			<tr>
				<td>jat</td>
				<td>jammu tawai</td>
			</tr>
	</table>
</body>
<html>