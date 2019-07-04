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



img {
  width = 10px;
  height = 10px;
}

#link {
	font-size: 20px;
	margin-left: 15px;

}

#formdiv {
  margin: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 0px 100px 50px 350px;
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
	<a href="adminpage.html" id = "link">Back to Admin Page</a>
	<div id = "formdiv">
		<?php
		$studentid = $_POST["studentid"];
		  ?>
		<form method='POST' action="student_updatepost.php">
			<br/>
			<h2 id = "heading">
			update student 
			</h2>
			<body>Andrew ID:  </body>
			&emsp;&emsp;&emsp;&nbsp;
			<input type="text" name="Andrewid">
			<br/>
			<body>Password:  </body>
			&emsp;&emsp;&emsp;&nbsp;
			<input type="text" name="password">
			<br/>
			<body>Student First Name:  </body>
			<input type="text" name="firstName">
			<br/>
			<body>Student Last Name:  </body>
			&nbsp;
			<input type="text" name="lastName">
			<br/>
			<body>year:  </body>
			&nbsp;
			<input type="text" name="year">
			<br/>
			<body>Birth Date:  </body>
			&emsp;&emsp;&emsp;&nbsp;
			<input type="text" name="bdate">
			<br/>
			<body>full time status:  </body>
				Full Time
				<input type="radio" name="fulltimestatus" value="1">
				Part Time
				<input type="radio" name="fulltimestatus" value="">
			<br/>
			<input type='hidden' name='studentid' value='<?php echo $studentid; ?>'>
			<input type="submit" value="Submit"> 
		</form>
	</div>

</html>