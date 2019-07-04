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
?>

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
#admins {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#admins td, #admins th {
    border: 1px solid #ddd;
    padding: 8px;
}

#admins tr:nth-child(even){background-color: #f2f2f2;}

#admins tr:hover {background-color: #ddd;}

#admins th {
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
  <a class="active" href="adminpage.html">Home</a>
  <a href="admin_viewprofile.php">View Profile</a>
  <a href="index.html" class = "last">Logout</a>
</div>


<link rel="stylesheet" href="external.css">



</head>




<h2 id = "heading"> View Profile </h2>

<?php
session_start();
$user = $_SESSION["currentUser"];
//sql statement to select all courses
$sql = "SELECT adminID, password, role FROM Admin 
WHERE adminID = '$user'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1 id = 'admins'> <tr><td><b>Andrew ID</b></td><td><b> Password </b></td><td><b> Role</b></td></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td> " . $row["adminID"]. "  </td><td> " . $row["password"]. "  </td><td> " . $row["role"]. " </td></tr>";

}
}

else {
echo "<h2 id = 'heading'>No profile data found</h2>";
}


$conn->close();
?>