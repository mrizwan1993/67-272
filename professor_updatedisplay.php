
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
#professors {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#professors td, #courses th {
    border: 1px solid #ddd;
    padding: 8px;
}

#professors tr:nth-child(even){background-color: #f2f2f2;}

#professors tr:hover {background-color: #ddd;}

#professors th {
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

<h2 id = "heading"> List for Updating Professors </h2>

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

//sql statement to select one guest based on last name
$sql = "SELECT * FROM Professor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
echo "<table id = 'professors'>
		<tr>
			<td>
				<b>
					Andrew ID
				</b>
			</td>
			<td>
				<b>
					Password
				</b>
			</td>
			<td>
				<b>
					First Name
				</b>
			</td>
			<td>
				<b>
					Last Name
				</b>
			</td>
			<td>
				<b>
					Rank
				</b>
			</td>
			<td>
				<b>
					Date of Birth
				</b>
			</td>
			<td>
				<b>
					Contact Info
				</b>
			</td>
			<td>
				<b>
					Is Advisor? (1 = Yes, 0 = No)
				</b>
			</td>
		</tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
	  	<td> " . $row["andrewID"]. "  
	  	</td>
	  	<td> " . $row["password"]. "  
	  	</td>
	  	<td> " . $row["firstName"]. "  
	  	</td>
	  	<td> " . $row["lastName"]. "  
	  	</td>
	  	<td> " . $row["rank"]. "  
	  	</td>
	  	<td> " . $row["dateOfBirth"]. "  
	  	</td>
	  	<td> " . $row["contactInfo"]. "  
	  	</td>
	  	<td> " . $row["isAdvisor"]. "  
	  	</td> ";
	  	$professorid = $row["andrewID"];
	  	echo   
	  	"
	  	<td> 
	  		<form method='POST' action='professor_updateform.php'>
	  			<input type='hidden' name='professorid' value='$professorid'>
    			<input type='submit' value='Update'>
			</form>
	  	</td>
	  </tr>";

}
} else {
echo "<h2 id = 'heading'>No professor data found</h2>";
}
$conn->close();
?>
</html>