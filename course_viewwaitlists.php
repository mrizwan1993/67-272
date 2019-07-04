<?php
session_start();

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

#waitlists {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#waitlists td, #waitlists th {
    border: 1px solid #ddd;
    padding: 8px;
}

#waitlists tr:nth-child(even){background-color: #f2f2f2;}

#waitlists tr:hover {background-color: #ddd;}

#waitlists th {
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
<body>
</head>
<body>

<h2 id = "heading"> View Course Waitlists </h2>
<br/><br/>
<br/>

<?php
//sql statement to select all courses
$sql = "SELECT sse.studentID, sse.courseID, c.name, sse.sectionID, sse.WaitlistPosition, sse.RegistrationDate 
FROM StudentSectionEnrolls sse, Section s, Course c
WHERE sse.sectionID = s.sectionID AND sse.enrollmentStatus = 0
AND s.courseID = c.courseID AND sse.courseID = c.courseID";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'waitlists'> <tr><td><b>Student ID</b></td><td><b> Course ID </b></td><td><b> Course Name </b></td><td><b>
Section </b></td><td><b>Waitlist Position</b></td><td><b>Registration Date</b></td></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td> " . $row["studentID"]. "  </td><td> " . $row["courseID"]. "  </td><td> " . $row["name"]. " </td><td> " . $row["sectionID"] . 
"</td><td>" . $row["WaitlistPosition"] . "</td><td>" . $row["RegistrationDate"] . "</td></tr> ";

}
}

else {
echo "<h2 id = 'heading'>No waitlisted students in any courses</h2>";
}


$conn->close();
?>
</body>
</html>