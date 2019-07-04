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


$sql = "INSERT INTO StudentPassedCourses VALUES('$andrewID','$courseID','$newGrade')";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> New record added successfully </h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: admin_viewstudentpassedcoursesandgrades.php");
exit();
?>




