<!Doctype html>
<html>

<style>



input[type = text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  margin-left: 50px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    margin-left: 300px;
    cursor: pointer;
}

#heading {
  text-align: center;
  font-size: 50px;
}


input[type = submit]: hover {
  background-color: #45a049;
}

select {
    width: 50%;
    padding: 12px 20px;
    margin-left: 85px;
    border: none;
    border-radius: 4px;
    background-color: #ccc;
}


#link {
	font-size: 20px;
	margin-left: 15px;

}

#formdiv {
  margin: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px 100px 50px 350px;
}


body { 
  background-color: #1e90ff6;
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

	<h2 id = "heading"> Update A Course </h2>

	<div id = "formdiv">

		<form method='POST' action="course_updatepost.php" id="courseForm">
			<br/>
			<body>Course Number:  </body>
			&emsp;
			<input type="text" name="courseNum">
			<br/>
			<body>Course Name:  </body>
			&emsp;&emsp;
			<input type="text" name="courseName">
			<br/>
			<body>Instructor ID:  </body>
			&emsp;
			<input type="text" name="instructorID">
			<br/>
			<body>Section:  </body>
			&emsp;
			<input type="text" name="section">
			<br/>
			<body>Seat Number:  </body>
			&emsp;
			<input type="text" name="seatNum">
			<br/>
			<body>Units:  </body>
			&emsp;
			<input type="text" name="units">
			<br/>
			<body> Classroom:  </body>
			&emsp;
			<input type="text" name="classroom">
			<br/>
			<body> Start Time:  </body>
			&emsp;
			<input type="text" name="starttime">
			<br/>
			<body> End Time:  </body>
			&emsp;
			<input type="text" name="endtime">
			<br/>
			<body> Days of the Week:  </body>
			&emsp;
			<input type="text" name="daysoftheweek">
			<br/>
			<body> Semester Offered:  </body>
			&emsp;
			<input type="text" name="semoffered">

			<br/>
			<br/>
			<body>Course Type:  </body>
			&emsp;
			<select name="courseType" form="courseForm">
				<option value="regular">regular</option>
				<option value="mini">mini</option>
			</select>
			<br/>
			<body>Department:  </body>
			&nbsp;
			<select name="department" form="courseForm">
				<option value="CS">CS</option>
				<option value="IS">IS</option>
				<option value="BS">BS</option>
				<option value="BA">BA</option>
			</select>
			<br/>
			<?php
			$courseid = $_POST["courseid"]; 
			 ?>
			<input type='hidden' name='courseid' value='<?php echo $courseid; ?>'>
			<br/>
			<br/>
			<input type="submit" value="Submit"> 
		</form>
	</div>

</html>