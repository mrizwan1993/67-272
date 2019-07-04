<html>
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
#admins {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#admins td, #admins th {
    border: 1px solid #ddd;
    padding: 8px;
}

#admins tr:nth-child(even){background-color: #f2f2f2;}

#admins tr:hover {background-color: #ddd;}

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

<h2 id = "heading"> View Student Grades </h2>

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
$sql = "SELECT andrewID, PassedCourses, grade FROM StudentPassedCourses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table id = 'admins'>
		<tr>
			<td>
				<b>
					andrewid
				</b>
			</td>
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
	  	<td> " . $row["andrewID"]. "  
	  	</td>
	  	<td> " . $row["PassedCourses"]. "  
	  	</td><td> " . $row["grade"] . 
	  	"</td>
	  	<td><a href='admin_updategradesform.html?id=" . $row["andrewID"] . "'>Edit Record</a></td>
	  </tr>";

}
} else {
echo "<h2 id = 'heading'>No data found</h2>";
}



$conn->close();
?>

<a href="admin_addstudentgrade.html">Add grade for a student</a>
<br/>
<br/>
</html>