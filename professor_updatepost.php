
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

$andrewID = $_POST["Andrewid"];
$password = $_POST['password'];
$firstName = $_POST["firstName"];
$lastName = $_POST['lastName'];
$rank = $_POST['rank'];
$bdate = $_POST['bdate'];
$contact = $_POST['contact'];
$isAdvisor = $_POST['advisor'];
$professorid = $_POST['professorid'];


$sql = "UPDATE Professor SET andrewID='$andrewID', password='$password', firstName='$firstName', lastName='$lastName', 
rank='$rank', dateOfBirth='$bdate', contactInfo='$contact', isAdvisor='$isAdvisor' WHERE andrewID='$professorid'";

if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'>New record added successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: professor_updatedisplay.php");
exit();
?>
</body>
</html>



