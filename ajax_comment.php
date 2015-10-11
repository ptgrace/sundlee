<?php
require("config/config.php");
require("lib/db.php");

$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] )) {
	if (!empty($_POST['name']) AND !empty($_POST['comment']) AND !empty($_POST['topicid'])) {
		$name = htmlspecialchars($_POST['name']);
		$comment = htmlspecialchars($_POST['comment']);
		$topicid = htmlspecialchars($_POST['topicid']);
		
		$sql = "SELECT * FROM user WHERE name='".$name."'";
		$result  = mysqli_query($conn, $sql);

		/* if there is not the name inputed in user table */
		if ($result->num_rows == 0) { 
			/* add new name to user table */
		  $sql = "INSERT INTO user (name, password) VALUES('".$name."', '123456')";
		  mysqli_query($conn, $sql);
		  $user_id = mysqli_insert_id($conn);
		}
		else {
			/* use the existing user id */
		  $row = mysqli_fetch_assoc($result);
		  $user_id = $row['id'];
		}

		$sql = "INSERT INTO comment VALUES(null, '".$topicid."', '".$user_id."', now(), '".$comment."')";
//		echo '<h1>'.$sql.'</h1>';
		mysqli_query($conn, $sql);
?>

<div class="comment-item">
	<h3><?php echo $name ?> <span>said....</span></h3>
	<p><?php date("Y-m-d H:i:s") ?></p>
	<p><?php echo $comment ?></p>
</div>
<?php
	}
}
?>

