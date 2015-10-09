<?php
require("config/config.php");
require("lib/db.php");

$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>

<body id="target">
  <div class="container">
    <header class="jumbotron text-center">
      <img src="https://s3-ap-northeast-1.amazonaws.com/opentutorialsfile/course/94.png" alt="codingeverybody" class="img-circle" id="logo">
        <h1><a href="/index.php">JavaScript</a></h1>
    </header>
    <div class="row">
        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li><a href="/list.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
          }
          ?>
          </ ol>
        </nav>
        <div class="col-md-9">

          <div id="profile">
          <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
          <b id="logout"><a href="logout.php">Log Out</a></b>
          </div>
