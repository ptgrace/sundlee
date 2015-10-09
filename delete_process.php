<?php
require("config/config.php");
require("lib/db.php");

$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$sql = "DELETE FROM topic WHERE id='".$_GET['id']."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/list.php');
?>
