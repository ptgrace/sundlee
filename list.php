<?php include('session.php'); ?>
<?php include('header.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="comment_script.js"></script>

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
        <hr/>
        <div id="control">
			<div class="btn-group" role="group" aria-label="...">
				<input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default  btn-lg"/>
				<input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default btn-lg"/>
			</div>
			<a href="http://localhost/write.php" class="btn btn-success btn-lg">write</a>
			<?php
			if(empty($_GET['id']) === false ) {
				echo '<a href="http://localhost/update.php?id='.$_GET['id'].'" class="btn btn-success btn-lg">update</a>'."\n";
				echo '<a href="http://localhost/delete_process.php?id='.$_GET['id'].'" class="btn btn-success btn-lg">delete</a>'."\n";
			}
			?>
		</div>

		<?php
			if(empty($_GET['id']) === false ) {
				echo "<hr/>";
				echo "<h2>Comments.....</h2>";
			}
		?>
		<div class="comment-block">
		<?php
			if(empty($_GET['id']) === false ) {
				$sql = "SELECT comment.id, name, created, comment FROM comment LEFT JOIN user ON comment.author = user.id WHERE comment.topic=".$_GET['id'];
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
		?>
					<div class='comment-item'>
						<h3><?php echo $row['name'] ?> <span>said....</span></h3>
						<p><?php echo $row['created'] ?></p>
						<p><?php echo $row['comment'] ?></p>
					</div>
		<?php
				}
			}
		?>
		</div>
		<?php
		if(empty($_GET['id']) === false ) {
	   		echo "<h2>Submit new comment</h2>";
	    	echo "<form id='form' method='post'>";
			echo "    <input type='hidden' name='topicid' value='".$_GET['id']."'>";
			echo "    <label>";
			echo " 	    <span>Name *</span>";
			echo "	    <input type='text' name='name' id='comment-name' placeholder='Your name here....' required>";
			echo "	</label>";
	    	echo "	<label>";
			echo "	<span>Your comment *</span>";
			echo "    	<textarea name='comment' id='comment' cols='30' rows='10' placeholder='Type your comment here....'' required></textarea>";
			echo "    </label>";
			echo "    <input type='submit' id='submit' value='Submit Comment'>";
			echo "</form>";
		}
		?>
	  </div>
    </div>
  </div>

  
  
<?php include("footer.php"); ?>
