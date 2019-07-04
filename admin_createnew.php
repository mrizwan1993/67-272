<?php
session_start();
?>
<!Doctype html>
<html>
<style>


#heading {
  text-align: center;
  font-size: 30px;
}


body { 
  background-color: #1e90ff6;
}

#link {
  padding-left: 130px;
  text-align: center;
  font-family: "Times New Roman", Times, serif; 
  font-style: bold;
  font-size: 20px;
}
</style>
<head>
<div class="topnav">
  <a class="active" href="adminpage.html">Home</a>
  <a href="admin_viewprofile.php">View Profile</a>
  <a href="index.html" class = "last">Logout</a>
</div>


<link rel="stylesheet" href="external.css">
</head>

<body>
<br/>

<?php

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


$sql = "INSERT INTO Admin (adminID, password, role) VALUES ('$userName', '$password', '$role')";

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