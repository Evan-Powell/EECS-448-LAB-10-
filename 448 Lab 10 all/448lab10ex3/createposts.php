<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$username = $_POST["username"];
$post_content = $_POST["post"];
echo "<p> You entered $username as your name, this is for testing</p>";
echo "<p> You entered: $post_content </br> this is for testing</p>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "evanpowell", "ta7puax4",
"evanpowell");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id From Users WHERE user_id = '$username'";

if ($result = $mysqli->query($query)) {
    //echo "should be here if user does notexists";
    if(($result->num_rows) == 0) {
        echo "user not found";
    }
    else{
        echo "user found</br>";
        //storing post 
        $query2 = "INSERT INTO Posts (post_id, content, author_id) VALUES (NULL,'$post_content','$username')";
        if($result2 = $mysqli->query($query2))
        {
            echo "post added";
        }
        else{
            echo "post not added, try again";
        }
    }
    $result->free();
}


$mysqli->close();
?>