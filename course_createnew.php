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


$sql = "INSERT INTO Course (courseID, name, units, courseType) VALUES ('$courseNum', '$courseName', '$units', '$courseType')";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'>New record added successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO Section (sectionID, seatNum, classroom, startTime, endTime, daysOfTheWeek, semesterOffered, 
	courseID, professorID) VALUES ('$section', '$seatNum', '$classRoom', '$startTime', '$endTime', '$daysOfTheWeek'
	, '$semesterOffered', '$courseNum', '$instructorID')";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'>New record added successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: adminpage.html');
?>
</body>
</html>
