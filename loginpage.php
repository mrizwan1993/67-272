<?php
session_start();
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
  color: #FF0000;
}

#instr{
  margin-left: 250px;
}

.textfield{
  margin-left: 100px;
}


#heading {
  text-align: center;
}



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

input[type = password], select {
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


div {
  margin: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 100px 100px 50px 350px;
}

</style>
</head>
<body>  

<?php
// define variables and set to empty values
$userNameErr = $passErr = "";
$userName = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["userName"])) {
    $userNameErr = "username is required";
  } else {
    $userName = test_input($_POST["userName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
      $userNameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["password"])) {
    $passErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if password is well-formed
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
      $passErr = "Only letters whitespace and numbers allowed"; 
    }
  }

  //add form valdation for role 
  if($userNameErr == "" && $passErr == ""){
    $_SESSION['currentUser'] = $_POST["userName"];
    $_SESSION['currentPass'] = $_POST["password"];
    $_SESSION['currentRole'] = $_POST["role"];
    if(isset($_SESSION['wrongUserPass'])){
      unset($_SESSION['wrongUserPass']);
    }
    header('Location: loginvalidation.php');
    exit();
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<h2 id = "heading">The HUB Login Page</h2>
<div>
  <p><span class="error" id = "instr">(* required field )</span></p>
  <?php
    if(isset($_SESSION['wrongUserPass'])){
      echo "<p><span class='error' id = 'instr'>Wrong username or password or role</span></p>";
      unset($_SESSION['wrongUserPass']);
    }
    ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <b>Username: </b><input type="text" id = "uname" name="userName" value= "<?php echo $userName;?>">
    <span class="error">* <?php echo $userNameErr;?></span>
    <br><br>
    <b> Password: </b><input type="password" id ="pwd" name="password" value= "<?php echo $password;?>">
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>
    
    <body><b>Role:  </b></body>
      <select name="role" id = "role">
        <option value="student">Student</option>
        <option value="admin">Admin</option>
        <option value="professor">Professor</option>
      </select>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>
</div>


</body>
</html>