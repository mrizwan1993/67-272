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
  <a class="active" href="studentpage.html">Home</a>
  <a href="student_viewprofile.php">View Profile</a>
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

//need to get this from the session
$studentid = $_SESSION['currentUser'];

//these are fine
$courseid = $_POST["courseid"];
$sectionid = $_POST["sectionid"];
$days = $_POST["daysOfTheWeek"];
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];


$sql = "SELECT * FROM StudentSectionEnrolls WHERE studentID = '$studentid' AND courseID = '$courseid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<h2 id = 'heading'> You are already registered for this course </h2>";
}

else {

	$sql = "SELECT * FROM StudentSectionEnrolls sse, Course c WHERE sse.courseID = c.courseID AND sse.studentID = '$studentid' AND sse.enrollmentStatus = '1'";
	$result = $conn->query($sql);
	$currentUnits = 0;
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$currentUnits += $row["units"];
		 }
	}

	$sql = "SELECT sec.courseID, sec.startTime, sec.endTime, sec.daysOfTheWeek
	FROM StudentSectionEnrolls sse, Section sec 
	WHERE studentID = '$studentid' AND enrollmentStatus = 1
	AND sec.courseID = sse.courseID 
	AND sec.sectionID = sse.sectionID
	AND sec.daysOfTheWeek LIKE '$days%'
	AND '$startTime' < sec.endTime
	AND '$endTime' > sec.startTime";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		echo "<h2 id = 'heading'> You have a time conflict. Cannot register </h2>";
	}

	else {

		$sql = "SELECT * FROM Course WHERE courseID = '$courseid'";
		$result = $conn->query($sql);
		$courseUnits = 0;
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$courseUnits = $row["units"];
		}

		$currentUnits += $courseUnits;
		if ($currentUnits >= 51) {
			echo "<h2 id = 'heading'> Cannot register for course as maximum units are excedded </h2>";
			$currentUnits -= $courseUnits;
			echo "<h2 id = 'heading'> current units are: </h2>" .$currentUnits;
		}


		else {
			$numEnrolled = 0;
			$netEnrollment = 0;
			$waitlistPosition = 0;

			$numSeats = 0;


			$sql = "SELECT seatNum FROM Section WHERE courseID = '$courseid'";
			
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$numSeats = $row["seatNum"];
			}


			


			$sql = "SELECT COUNT(*) FROM StudentSectionEnrolls WHERE courseID = '$courseid' AND sectionID = '$sectionid'";
			
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$numEnrolled = $row["COUNT(*)"];
			}

			
			$netEnrollment = $numSeats - $numEnrolled;

			if ($netEnrollment > 0) {

				$date = date("Y/m/d");
				$sql = "INSERT INTO StudentSectionEnrolls VALUES (1,0,'$date','$studentid','$sectionid','$courseid')";



				if ($conn->query($sql) === TRUE) {
					echo "<h2 id = 'heading'> Student enrolled successfully</h2>";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}



				$sql = "INSERT INTO StudentSectionAssigned (andrewID,sectionID,courseID) VALUES ('$studentid','$sectionid','$courseid')";

				if ($conn->query($sql) === TRUE) {
					echo "<h2 id = 'heading'> Student assigned successfully </h2>";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				echo "<h2 id = 'heading'> Student successfully registered </h2>";
				header("Location: studentpage.html");	
				exit();
			}


			else {
				$enrollment = $numEnrolled -$numSeats;

				$waitlistPosition = $enrollment + 1;

				if ($waitlistPosition > 0){
					$date = date("Y/m/d");
					$sql = "INSERT INTO StudentSectionEnrolls VALUES (0,'$waitlistPosition','$date','$studentid','$sectionid','$courseid')";



					if ($conn->query($sql) === TRUE) {
						echo "<h2 id = 'heading'> Student put on the waitlist </h2>";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

				}
			}
		}
	}
}
$conn->close();

?>
</html>