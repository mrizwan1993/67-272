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
$status = $_POST['status'];


$sql = "INSERT INTO Student (andrewID, password, firstName, lastName, year, dateOfBirth, fullTimeStatus) VALUES ('$andrewID', '$password', '$firstName', '$lastName', '$year', '$bdate', '$status')";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> New record added successfully </h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: adminpage.html');
?>
</body>
</html>

