<html>
<head>
<style>


#link {
  padding-left: 130px;
  text-align: center;
  font-family: "Times New Roman", Times, serif; 
  font-style: bold;
  font-size: 20px;
}

#admins {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#admins td, #students th {
    border: 1px solid #ddd;
    padding: 8px;
}

#admins tr:nth-child(even){background-color: #f2f2f2;}

#admins tr:hover {background-color: #ddd;}

body { 
  background-color: #1e90ff6;
}

#admins th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
	table, th, td {
		border: 1px solid black;
	}
</style>

<div class="topnav">
  <a class="active" href="adminpage.html">Home</a>
  <a href="admin_viewprofile.php">View Profile</a>
  <a href="index.html" class = "last">Logout</a>
</div>


<link rel="stylesheet" href="external.css">



</head>



<h2 id = "heading"> List of All Admins </h2>

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
$sql = "SELECT adminID, role FROM Admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'admins'>
		<tr>
			<td>
				<b>
					Andrew ID
				</b>
			</td>
			<td>
				<b>
					Role
				</b>
			</td>
		</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
	  	<td> " . $row["adminID"]. "  
	  	</td>
	  	<td> " . $row["role"]. "  
	  	</td>
	  </tr>";

}
} else {
echo "<h2 id = 'heading'>No data found</h2>";
}
$conn->close();
?>
</html>
