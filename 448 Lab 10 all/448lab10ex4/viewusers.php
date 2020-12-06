<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "evanpowell", "ta7puax4",
"evanpowell");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

echo "Here are the user_id's:</br>";

$query = "SELECT user_id FROM Users ORDER BY user_id";
if($result = $mysqli -> query($query))
{
    while($row = $result -> fetch_row()) 
    {
        printf ("%s \n", $row[0], $row[0]);
        echo "</br>";
    }
    $result -> free_result();
}


$mysqli->close();

?>