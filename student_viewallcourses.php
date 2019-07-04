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


#heading {
  text-align: center;
  font-size: 50px;
}
#link {
	font-size: 20px;
	margin-left: 15px;

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

<
<h2 id = "heading"> List of all Courses </h2>

<?php
$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//sql statement to select all courses
$sql = "SELECT c.courseID, name, units, courseType, sectionID, seatNum, classroom, startTime, endTime, daysOfTheWeek, semesterOffered, 
  professorID FROM Course c, Section s
  WHERE c.courseID = s.courseID";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border=1 id = 'courses'> <tr><td><b>Course ID</b></td><td><b> Course Name 
    </b></td><td><b> Number of Units</b></td><td><b>Course Type (Mini/Regular) </b></td>
    <td><b> Section </b></td><td><b>Number of Seats </b></td>
    <td><b> Classroom </b></td><td><b>Start Time</b></td><td><b> End Time </b></td>
    <td><b> Days Of the Week </b></td><td><b> Semester Offered </b></td>
    <td><b> Professor ID </b></td></tr>";
    while($row = $result->fetch_assoc()) {
            echo "<tr><td> " . $row["courseID"]. "  </td><td> " . $row["name"]. "  </td><td> " . $row["units"]. " </td><td> " 
            . $row["courseType"] . "</td><td>" . $row["sectionID"] . "</td><td>" . $row["seatNum"] . "</td><td>" . 
            $row["classroom"] . "</td><td>" . $row["startTime"] . "</td><td>" . $row["endTime"] . "</td><td>" . 
            $row["daysOfTheWeek"] . "</td><td>" . $row["semesterOffered"] . "</td><td>" . $row["professorID"] .
            "</td></tr>";
        }
}
else {
echo "<h2 id = 'heading'>No courses found</h2>";
}
$conn->close();
?>
</html>
