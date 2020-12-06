<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$username = $_POST["username"];
echo "<p> You entered $username as your name, this is for testing</p>";

$mysqli = new mysqli("mysql.eecs.ku.edu", "evanpowell", "ta7puax4",
"evanpowell");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('$username')";

if ($result = $mysqli->query($query)) {
    echo "User added";
}
else
{
    echo "sorry, that did not add. Perhaps that username is already taken";
}

$mysqli->close();

?>