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

$andrewID = $_POST["Andrewid"];
$firstName = $_POST["firstName"];
$lastName = $_POST['lastName'];
$year = $_POST['year'];
$bdate = $_POST['bdate'];
$password = $_POST['password'];
$status = $_POST['fulltimestatus'];

$studentid = $_POST['studentid'];


$sql = "UPDATE Student SET andrewID='$andrewID', password='$password', firstName='$firstName', lastName='$lastName', year='$year', dateOfBirth='$bdate', 
fullTimeStatus='$status' WHERE andrewID='$studentid'";

if ($conn->query($sql) === TRUE) {
echo "New record added successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: student_updatedisplay.php");
exit();
?>
</body>
</html>



