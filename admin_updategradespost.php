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

$andrewID = $_POST["andrewID"];
$courseID = $_POST["courseID"];
$newGrade = $_POST['newGrade'];
$studentid = $_POST['studentid'];


$sql = "UPDATE StudentPassedCourses SET grade = '$newGrade' WHERE andrewID='$andrewID' AND 
PassedCourses = '$courseID'";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> New record added successfully </h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("admin_viewstudentpassedcoursesandgrades.html");
exit();
?>




