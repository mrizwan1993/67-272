
<html>
<head>
<style>


#heading {
  text-align: center;
  font-size: 30px;
}




#link {
	padding-left: 130px;
	text-align: center;
	font-family: "Times New Roman", Times, serif; 
	font-style: bold;
	font-size: 20px;
}
#students {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#students td, #courses th {
    border: 1px solid #ddd;
    padding: 8px;
}

#students tr:nth-child(even){background-color: #f2f2f2;}

#students tr:hover {background-color: #ddd;}

#students th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
	table, th, td {
		border: 1px solid black;
	}
	table, th, td {
		border: 1px solid black;
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
<h2 id = "heading"> View Your Dropped Courses </h2>

<?php
session_start();
$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";

$user = $_SESSION['currentUser'];

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//sql statement to select one guest based on last name
$sql = "SELECT studentID, courseID, sectionID, Drop_date FROM StudentSectionDrops WHERE studentID = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'students'>
		<tr>
			<td>
				<b>
					studentid
				</b>
			</td>
			<td>
				<b>
					courseID
				</b>
			</td>
		</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
	  	<td> " . $row["studentID"]. "  
	  	</td>
	  	<td> " . $row["courseID"]. "  
	  	</td>
	  </tr>";

}
} else {
echo "<h5 id = 'heading'>No Dropped Courses</h5>";
}
$conn->close();
?>
</html>