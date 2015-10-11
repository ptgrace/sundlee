<?php
/* Initialize database */
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

/* Escape string for security reason */
$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

$sql = "SELECT * FROM user WHERE name='".$author."'";
$result  = mysqli_query($conn, $sql);

/* if there is not the author inputed in user table */
if ($result->num_rows == 0) {
	/* add new author to user table */
  $sql = "INSERT INTO user (name, password) VALUES('".$author."', '123456')";
  mysqli_query($conn, $sql);
  $user_id = mysqli_insert_id($conn);
}
else {
	/* use the existing user id */
  $row = mysqli_fetch_assoc($result);
  $user_id = $row['id'];
}

/* Update topic inpued by user */
$sql = "UPDATE topic SET title='".$title."', description='".$description."' WHERE id=".$_POST['id'];
echo $sql;
$result = mysqli_query($conn, $sql);

/* Redirect to index.php after inserting new topic */
$url = "Location: http://localhost/list.php?id=".$_POST['id'];
header($url);
?>
