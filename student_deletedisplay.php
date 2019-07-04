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
?>

<head>
<style>


#heading {
  text-align: center;
  font-size: 30px;
}




#link {
	padding-left: 130px;
	text-align: center;
	font-family: "Times New Roman", Times, serif; 
	font-style: bold;
	font-size: 20px;
}
#students {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#students td, #courses th {
    border: 1px solid #ddd;
    padding: 8px;
}

#students tr:nth-child(even){background-color: #f2f2f2;}

#students tr:hover {background-color: #ddd;}

#students th {
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
<h2 id = "heading"> List for Deleting Students </h2>

<?php
$sql = "SELECT andrewID, password, firstName, lastName, year, dateOfBirth, fullTimeStatus FROM Student";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'students'> <tr><td><b>Andrew ID</b></td><td><b> Password</b></td><td><b> First Name</b></td><td><b>Last Name</b> </td><td><b> Year</b></td><td><b> Date of Birth</b></td><td><b> Full Time Status (1 = full-time, 0 = part-time)</b></td></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td> " . $row["andrewID"]. "  </td><td> " . $row["password"]. 
"  </td><td> " . $row["firstName"]. "  </td><td> " . $row["lastName"]. "</td><td> " 
. $row["year"]. "  </td><td> " . $row["dateOfBirth"]. "</td><td>" . $row["fullTimeStatus"] .
 "</td><td><a href='student_delete.php?id=" . $row["andrewID"] . "'>Delete Student Record</a></td></tr>";

}
}

else {
echo "<h2 id = 'heading'>No student data found</h2>";
}


$conn->close();
?>