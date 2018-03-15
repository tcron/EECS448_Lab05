<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "t337c674", "aegh7eit", "t337c674");

	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$username = $_POST["username"];
	
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

  $query = "SELECT content FROM Posts WHERE author_id='" . $username . "'";
	$result = $mysqli->query($query);

  if ($result->fetch_assoc())
	{
				
					echo $username . "'s Posts";
	
			while($row = $result->fetch_assoc())
			{
		
				echo "<tr>";
				
					echo "<td style=\"border: 1px solid black; text-align: center\">";
				
						echo $row["content"];
				
					echo "</td>";
				
				echo "</tr>";
		
			}
		
		echo "</table>";
	
	}
	else
	{
	
		echo "The user has not posted anything<br>";
	
	}

  $mysqli->close();
	
?>