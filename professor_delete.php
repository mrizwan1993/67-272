<?php

$dbServerName = "localhost";
$dbUsername = "fjoad";
$dbPassword = "fhKhanj#1";
$dbName = "projectdb1";
	


if (!isset($_GET["id"]))
{
    echo "<h2 id = 'heading'>No ID was given...</h2>";
    exit;
}

$con = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
if ($con->connect_error)
{
    die('Connect Error (' . $con->connect_errno . ') ' . $con->connect_error);
}

$target = $_GET["id"];


$sql = "DELETE FROM Professor WHERE andrewID = '$target'";


if (!$result = $con->prepare($sql))
{
    die('Query failed: (' . $con->errno . ') ' . $con->error);
}



if (!$result->execute())
{
    die('Execute failed: (' . $result->errno . ') ' . $result->error);
}

if ($result->affected_rows > 0)
{
    echo "<h2 id = 'heading' >The ID was deleted with success</h2>";
}
else
{
    echo "<h2 id = 'heading'>Couldn't delete the ID</h2>";
}

$result->close();
$con->close();
header('Location: professor_deletedisplay.php');
exit();

?>
