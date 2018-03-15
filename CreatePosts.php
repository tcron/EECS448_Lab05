<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "t337c674", "aegh7eit", "t337c674");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST['user_id'];
$content = $_POST['content'];

echo '<head>';
echo '<link type="text/css" rel="stylesheet" href="../main.css">';
echo '</head>';
echo '<body>';

echo '<div class="block">';
$user_query = "SELECT user_id FROM Users WHERE user_id = '$username'";
$post_query = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";
$result = $mysqli->query($user_query);
if ($username == '')
{
  echo '<h2>Cannot Create Post: Username is blank</h2>';
}
elseif (mysqli_num_rows($result) == 0)
{
  echo "<h2>Cannot Create Post: User $username does not exist</h2>";
}
else 
{
	if ($content == '')
  {
	  echo '<h2>Cannot Create Post: Post is empty</h2>';
	}
	else if ($result2 = $mysqli->query($post_query))
  {
	  echo "<h2>New post for $username was created</h2>";
	}
	else
  {
	  echo "$mysqli->error";
	}
	$result2->free();
}
$result->free();
echo '</div>';
echo '</body>';
$mysqli->close();

?>