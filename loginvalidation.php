<?php
session_start();
$user =  $_SESSION['currentUser'];
$password = $_SESSION['currentPass'];
$role = $_SESSION['currentRole'];



$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";

/*
$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";
*/

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


function array_getIndex ($needle, array $haystack){
	for ($i = 0; $i < sizeof($haystack); $i++){
		for ($j = 0; $j < 3; $j++){
			if (strcmp($haystack[$i][$j], $needle) == 0){
			return $i;
			}
		}
	}	
	return -1;
}


if ($role == "admin") {
	$sql = "SELECT adminID, password from Admin";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$currid = $row["adminID"];
			$currPword = $row["password"];
			if($currid == $user && $currPword == $password){
				header('Location: adminpage.html');
				$_SESSION['inadminif'] = true;
				exit();
			}
		}
	} else {
		echo "<h2 id = 'heading'>No data found</h2>";
	}
} else {
	//header('Location: loginpage.php');
	//exit();
}

if ($role == "student") {
	$sql = "SELECT andrewID, password from Student";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$currid = $row["andrewID"];
			$currPword = $row["password"];
			echo "\n";
			echo $currid;
			echo "\n";
			echo $currPword;
			echo "\n";
			if($currid == $user && $currPword == $password){
				echo "IN IF";
				header('Location: studentpage.html');
				exit();
			}
		}
	} else {
		echo "<h2 id = 'heading'>No data found</h2>";
	}
}


if ($role == "professor") {
	$sql = "SELECT andrewID, password from Professor";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$currid = $row["andrewID"];
			$currPword = $row["password"];
			if($currid == $user && $currPword == $password){
				header('Location: professorpage.html');
				exit();
			}
		}
	} else {
		echo "<h2 id = 'heading'>No data found</h2>";
	}
}

$_SESSION['wrongUserPass'] = true;
header('Location: loginpage.php');
exit();

?>
