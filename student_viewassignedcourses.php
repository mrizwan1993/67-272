<html>

<br/>
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


<h2 id="heading"> Your Assigned Courses </h2>
<?php

session_start();
$user = $_SESSION['currentUser'];

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
$sql = "SELECT ssa.courseID, c.name, ssa.sectionID, c.units, c.courseType,
sec.classroom, sec.startTime, sec.endTime, sec.daysOfTheWeek, 
sec.professorID, prof.firstName, prof.lastName
FROM Course c, Professor prof, StudentSectionAssigned ssa, Section sec, Student st
WHERE sec.courseID = c.courseID
AND ssa.andrewID = st.andrewID
AND sec.courseID = ssa.courseID
AND ssa.courseID = c.courseID
AND ssa.sectionID = sec.sectionID
AND prof.andrewID = sec.professorID
AND st.andrewID = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table id = 'courses'>
		<tr>
			<td>
				<b>
					Course ID
				</b>
			</td>
			<td>
				<b>
					Course Name
				</b>
			</td>
			<td>
				<b>
					Section
				</b>
			</td>
			<td>
				<b>
					Number of Units
				</b>
			</td>
			<td>
				<b>
					Course Type
				</b>
			</td>
			<td>
				<b>
					Classroom
				</b>
			</td>
			<td>
				<b>
					Start Time
				</b>
			</td>
			<td>
				<b>
					End Time
				</b>
			</td>
			<td>
				<b>
					Days of the Week
				</b>
			</td>
			<td>
				<b>
					Professor ID
				</b>
			</td>
			<td>
				<b>
					Professor First Name
				</b>
			</td>
			<td>
				<b>
					Professor Last Name
				</b>
			</td>
		</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
	  	<td> " . $row["courseID"]. "  
	  	</td>
	  	<td> " . $row["name"]. "  
	  	</td>
	  	<td> " . $row["sectionID"]. "  
	  	</td>
	  	<td> " . $row["units"]. "  
	  	</td>
	  	<td> " . $row["courseType"]. "
	  	</td>
	  	<td> " . $row["classroom"] . "
	  	</td>
	  	<td>" . $row["startTime"] . "
	  	</td>
	  	<td>" . $row["endTime"] . "
	  	</td>
	  	<td>" . $row["daysOfTheWeek"] . "
	  	</td>
	  	<td>" . $row["professorID"]. "
	  	</td>
	  	<td> " . $row["firstName"]. "
	  	</td>
	  	<td> " . $row["lastName"]. "
	  	</td>
	  </tr>";

}
} else {
echo "<h2 id = 'heading'>No courses found</h2>";
}
$conn->close();
?>
</html>
