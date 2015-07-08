<?php include("header.php"); ?>
          <article>
            <?php
            if(empty($_GET['id']) === false ) {
              $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
            }
            ?>

            <form action="update_process.php" method="post">
              <div class="form-group">
                <input type="hidden" class="form-control" name="id" id="form-id" value="<?php echo $row['id'];?>" />
              </div>
              <div class="form-group">
                <label for="form-title">Title</label>
                <input type="text" class="form-control" name="title" id="form-title" value="<?php echo $row['title'];?>" />
              </div>
              <div class="form-group">
                <label for="form-author">Author</label>
                <input type="text" class="form-control" name="author" id="form-author" value="<?php echo $row['name'];?>" readonly />
              </div>
              <div class="form-group">
                <label for="form-author">Description</label>
                <textarea class="form-control" rows="10" name="description"  id="form-description"><?php echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>'); ?></textarea>
              </div>
              <input type="submit" name="name" class="btn btn-default  btn-lg" />
            </form>

          </article>

<?php include("footer.php"); ?>