<html>

<head>
<style>


#heading {
  text-align: center;
  font-size: 50px;
}
#link {
	font-size: 20px;
	margin-left: 15px;

}

#professors {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#professors td, #professors th {
    border: 1px solid #ddd;
    padding: 8px;
}

#professors tr:nth-child(even){background-color: #f2f2f2;}

#professors tr:hover {background-color: #ddd;}

#professors th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
	table, th, td {
		border: 1px solid black;
	}
	table, th, td {
		border: 1px solid black;
	}

body { 
  background-color: #1e90ff6;
}
</style>


<div class="topnav">
  <a class="active" href="adminpage.html">Home</a>
  <a href="admin_viewprofile.php">View Profile</a>
  <a href="index.html" class = "last">Logout</a>
</div>


<link rel="stylesheet" href="external.css">



</head>


<br/>
<h2 id = "heading"> List of All Professors </h2>


<?php
$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//sql statement to select one guest based on last name
$sql = "SELECT andrewID, firstName, lastName, rank, dateOfBirth, contactInfo, isAdvisor FROM Professor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table id = 'professors'>
		<tr>
			<td>
				<b>
					Andrew ID
				</b>
			</td>
			<td>
				<b>
					First Name
				</b>
			</td>
			<td>
				<b>
					Last Name
				</b>
			</td>
			<td>
				<b>
					Rank
				</b>
			</td>
			<td>
				<b>
					Birth Date
				</b>
			</td>
			<td>
				<b>
					 contact Info
				</b>
			</td>
			<td>
				<b>
					 Advisor status (1 = Advisor, 0 = Not Advisor)
				</b>
			</td>
		</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
	  	<td> " . $row["andrewID"]. "  
	  	</td>
	  	<td> " . $row["firstName"]. "  
	  	</td>
	  	<td> " . $row["lastName"]. "  
	  	</td>
	  	<td> " . $row["rank"]. "
	  	</td>
	  	<td> " . $row["dateOfBirth"]. "
	  	</td>
	  	<td> " . $row["contactInfo"]. "
	  	</td>
	  	<td> " . $row["isAdvisor"]. "
	  	</td>
	  </tr>";

}
} else {
echo "<h2 id = 'heading'>No professor data found</h2>";
}
$conn->close();
?>
</html>
