<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "t337c674", "aegh7eit", "t337c674");
/* check connection */
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
echo '<head>';
echo '</head>';
echo '<body>';
echo '<div class="block">';

$user = "SELECT user_id FROM Users";
$result = $mysqli->query($user);

if(mysqli_num_rows($result) > 0)
{
	echo '<h2>Users</h2>';
	echo '<table>';
	echo '<tr><th>user_id</th></tr>';
	while ($user = $result->fetch_assoc())
  {
		echo "<tr><td>" . $user['user_id'] . "</td></tr>";
	}
	echo '</table>';
}
else
{
	echo '<h2>There are no users</h2>';
}
$result->free();
echo '</div>';
echo '</body>';
$mysqli->close();
?>