<?php include("header.php"); ?>

          <article>
          <?php
          if(empty($_GET['id']) === false ) {
              $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
              echo '<p>'.htmlspecialchars($row['name']).'</p>';
              echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
          }
          ?>
          </article>

<?php include("footer.php"); ?>
