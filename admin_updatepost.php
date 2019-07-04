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

$userName = $_POST["userName"];
$password = $_POST["password"];
$role = $_POST['role'];

$adminid1 = $_POST['adminid1'];


$sql = "UPDATE Admin SET adminID='$userName', password='$password', role='$role' WHERE adminID='$adminid1'";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'>New record added successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: admin_updatedisplay.php");
exit();
?>
</body>
</html>



