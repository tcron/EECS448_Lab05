<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "t337c674", "aegh7eit", "t337c674");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else
{
    printf("Connect successful: %s\n", $mysqli->connect_error);
}

$username = $_POST['username']; 

if($username == "")
{
		echo "User Not Added: Entry Was Blank<br>";
}
else
{
	$query = "INSERT INTO Users (user_id) VALUES ('$username')";
	if($result = $mysqli->query($query))
	{
		echo "New user $username was created";
	}
	else
	{
		echo "$mysqli->error";
	}
	$result->free();

	$mysqli->close();
}

?>