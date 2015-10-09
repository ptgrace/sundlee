<?php include('session.php'); ?>
<?php include("header.php"); ?>

          <article>
            <form action="write_process.php" method="post">
              <div class="form-group">
                <label for="form-title">Title</label>
                <input type="text" class="form-control" name="title" id="form-title" placeholder="Fill in title here.">
              </div>
              <div class="form-group">
                <label for="form-author">Author</label>
                <input type="text" class="form-control" name="author" id="form-author" placeholder="Fill in author here.">
              </div>
              <div class="form-group">
                <label for="form-author">Description</label>
                <textarea class="form-control" rows="10" name="description"  id="form-author" placeholder="Fill in description here."></textarea>
              </div>
              <input type="submit" name="name" class="btn btn-default  btn-lg">
            </form>
          </article>

<?php include("footer.php"); ?>
