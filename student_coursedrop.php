<?php

session_start();
$user = $_SESSION["currentUser"];
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


$courseid = $_POST["courseid"];
$sectionid = $_POST["sectionid"];

$sql = "DELETE FROM StudentSectionEnrolls WHERE studentID = '$user' AND courseID = '$courseid'";



if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> Student deleted successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT * FROM StudentSectionEnrolls WHERE WaitlistPosition = 1";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$studentID = $row["studentID"];
}





$sql = "UPDATE StudentSectionEnrolls SET WaitlistPosition = 0 WHERE studentID = '$studentID'";

$conn->query($sql);

$sql = "UPDATE StudentSectionEnrolls SET enrollmentStatus = 1 WHERE studentID = '$studentID'";

$conn->query($sql);



$sql = "UPDATE StudentSectionEnrolls SET WaitlistPosition = WaitlistPosition - 1 WHERE WaitlistPosition > 0";



if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> Waitlist updated successfully</h2>";

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql = "DELETE FROM StudentSectionAssigned WHERE andrewID = '$user' AND courseID = '$courseid'";



if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'>Student deleted successfully</h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$date = date("Y/m/d");
$sql = "INSERT INTO StudentSectionDrops VALUES ('$date','$user','$sectionid','$courseid')";



if ($conn->query($sql) === TRUE) {
echo "<h2 id = 'heading'> Student deleted successfully </h2>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: student_coursedropdisplay.php');
$conn->close();
?>
