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

  <h2 id = "heading"> Update Admin Profile </h2>
	<div id = "formdiv">
		<?php
		$adminid1 = $_POST["adminid1"];
		  ?>
		<form method='POST' action="admin_updatepost.php">
			<br/>
			<h2 id = "heading">
			update admin 
			</h2>
			<body>adminid:  </body>
			&emsp;&emsp;&emsp;&nbsp;
			<input type="text" name="userName">
			<br/>
			<body>Password:  </body>
			&emsp;&emsp;&emsp;&nbsp;
			<input type="text" name="password">
			<br/>
			<body>role:  </body>
			<input type="text" name="role">
			<br/>
			<input type='hidden' name='adminid1' value='<?php echo $adminid1; ?>'>
			<input type="submit" value="Submit"> 
		</form>
	</div>

</html>