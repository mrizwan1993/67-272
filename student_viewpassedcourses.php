
<html>

<head>
<style>
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
<h2 id = "heading"> View Your Passed Courses </h2>

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

//sql statement to select one guest based on last name
$sql = "SELECT PassedCourses, grade FROM StudentPassedCourses WHERE andrewID = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table id = 'courses'>
		<tr>
			<td>
				<b>
					PassedCourses
				</b>
			</td>
			<td>
				<b>
					Grade
				</b>
			</td>
		</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
	  	<td> " . $row["PassedCourses"]. "  
	  	</td><td> " . $row["grade"] . "</td>
	  </tr>";

}
} else {
echo "<h2 id = 'heading'>No courses found</h2>";
}
$conn->close();
?>
</html>