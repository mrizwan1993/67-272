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
$password = $_POST['password'];
$firstName = $_POST["firstName"];
$lastName = $_POST['lastName'];
$rank = $_POST['rank'];
$bdate = $_POST['bdate'];
$contact = $_POST['contact'];
$isAdvisor = $_POST['advisor'];

$sql = "INSERT INTO Professor (andrewID, password, firstName, lastName, rank, dateOfBirth, contactInfo, isAdvisor) VALUES ('$andrewID', '$password', '$firstName', '$lastName', '$rank', '$bdate', '$contact', '$isAdvisor')";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> New record added successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: adminpage.html');
?>
</body>
</html>



