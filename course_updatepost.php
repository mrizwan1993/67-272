
<head>
<style>


#heading {
  text-align: center;
  font-size: 30px;
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




<?php
session_start();

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

$courseNum = $_POST["courseNum"];
$courseName = $_POST["courseName"];
$units = $_POST["units"];
$courseType = $_POST["courseType"];
$instructorID = $_POST['instructorID'];
$section = $_POST['section'];
$department = $_POST['department'];
$seatNum = $_POST["seatNum"];
$classRoom = $_POST["classroom"];
$startTime = $_POST["starttime"];
$endTime = $_POST["endtime"];
$daysOfTheWeek = $_POST["daysoftheweek"];
$semesterOffered = $_POST["semoffered"];
$courseid = $_POST["courseid"];


$sql = "UPDATE Course SET courseID='$courseNum', name='$courseName', units='$units', 
courseType='$courseType' WHERE courseID='$courseid'";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> New record added successfully </h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE Section SET sectionID ='$section', seatNum='$seatNum', courseID='$courseNum', 
classroom = '$classRoom', startTime = '$startTime', endTime = '$endTime', daysOfTheWeek = '$daysOfTheWeek',
semesterOffered = '$semesterOffered', professorID='$instructorID' WHERE courseID='$courseid'";


if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> New record added successfully </h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


header("Location: course_updatedisplay.php");
exit();
?>




