<?php
session_start();

$user = $_SESSION["currentUser"];

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
#courses {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#courses td, #courses th {
    border: 1px solid #ddd;
    padding: 8px;
}

#courses tr:nth-child(even){background-color: #f2f2f2;}

#courses tr:hover {background-color: #ddd;}

#courses th {
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
  <a class="active" href="studentpage.html">Home</a>
  <a href="student_viewprofile.php">View Profile</a>
  <a href="index.html" class = "last">Logout</a>
</div>


<link rel="stylesheet" href="external.css">
</head>
<body>
</head>





<h2 id = "heading"> List for Dropping courses </h2>

<?php
$sql = "SELECT ssa.courseID, c.name, ssa.sectionID  
FROM StudentSectionAssigned ssa, Course c
WHERE ssa.andrewID = '$user'
AND c.courseID = ssa.courseID";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'courses'> <tr><td><b>Course ID</b></td><td><b> Course Name</b></td><td><b> Section</b></td></tr>";
while($row = $result->fetch_assoc()) {
	$courseid = $row["courseID"];
	$sectionid = $row["sectionID"];
echo "<tr><td> " . $row["courseID"]. "  </td><td> " . $row["name"]. "  </td><td> " . $row["sectionID"] . "</td><td>	<form method='POST' action='student_coursedrop.php'>
	  			<input type='hidden' name='courseid' value='$courseid'>
	  			<input type='hidden' name='sectionid' value='$sectionid'>
    			<input type='submit' value='delete'>
			</form></td></tr>";

}
}

else {
echo "<h2 id = 'heading'>No course data found</h2>";
}


$conn->close();
?>