<?php
session_start();

$user = $_SESSION['currentUser'];

$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";


$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error)
{
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
?>
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
  <a class="active" href="professorpage.html">Home</a>
  <a href="professor_viewprofile.php">View Profile</a>
  <a href="index.html" class = "last">Logout</a>
</div>


<link rel="stylesheet" href="external.css">



</head>
<body>

<h2 id = "heading"> View Your Course Drops </h2>
<br/><br/>
<br/>

<?php
$sql = "SELECT ssd.studentID, ssd.courseID, ssd.sectionID, ssd.Drop_date, c.name from StudentSectionDrops ssd, Section s, Course c 
where ssd.courseID = s.courseID AND ssd.courseID = c.courseID AND s.courseID = c.courseID 
AND ssd.sectionID = s.sectionID AND s.professorID = '$user'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'courses'> <tr><td><b>Student ID</b></td><td><b> Course ID </b></td><td><b> Course Name </b></td><td><b>
        Section </b></td><td><b> Drop Date </b></td></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td> " . $row["studentID"]. "  </td><td> " . $row["courseID"]. "  </td><td> " . $row["name"]. " </td><td> " . $row["sectionID"]
        . "</td><td> " . $row["Drop_date"] . "</td></tr> ";

}
}

else {
echo "<h2 id = 'heading'>No course data found</h2>";
}


$conn->close();
?>
</body>
</html>