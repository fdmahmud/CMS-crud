

 <?php 

     if (isset($_GET['p_id'])) {
         $the_post_id =  $_GET['p_id'];
     }
                    $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                    $show_Posts_by_id = mysqli_query($connection, $query);

                    confirm($show_Posts_by_id); // my method to check db connection.

                    while ($row = mysqli_fetch_assoc($show_Posts_by_id)) {

                         $post_id = $row['post_id'];
                         $post_author = $row['post_author'];
                         $post_title = $row['post_title'];
                         $post_category = $row['post_catagory_id'];
                         $post_status = $row['post_status'];
                         $post_image = $row['post_image'];
                         $post_tags = $row['post_tags'];
                         $post_comment_count = $row['post_comment_count'];
                         $post_date = $row['post_date'];
                         $post_content = $row['post_content'];
                    }
        if (isset($_POST['update_post'])) {
        		$post_author = $_POST['post_author'];
				$post_title = $_POST['title1'];
				$post_category_id = $_POST['post_category'];
				$post_status = $_POST['post_status'];
				$post_image = $_FILES['image']['name'];
				$post_image_temp = $_FILES['image']['tmp_name'];
				$post_tags = $_POST['post_tags'];
				$post_content = $_POST['post_content'];

			move_uploaded_file($post_image_temp, "../images/$post_image");

			if (empty($post_image)) {
				$query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
				$select_image = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_array($select_image)) {
					$post_image = $row['post_image'];
				}

			}

	$query = "UPDATE posts SET ";
	$query .= "post_catagory_id = '{$post_category_id}', ";
	$query .= "post_title = '{$post_title}', ";
	$query .= "post_author = '{$post_author}', ";
	$query .= "post_date = now(), ";
	$query .= "post_image = '{$post_image}', ";
	$query .= "post_content = '{$post_content}', ";
	$query .= "post_tags = '{$post_tags}', ";
	//$query .= "post_comment_count = '{$post_comment_count}', ";
	$query .= "post_status = '{$post_status}' ";
	$query .= "WHERE post_id = {$the_post_id}";
	
			$update_post_query = mysqli_query($connection, $query);

			confirm($update_post_query); // my method to check db connection.
			header("Location: ../admin/posts.php");
	}

 

?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="submit" name="reset_view" value="Reset View">
		<?php resetView(); ?>
	</div>
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title1" value="<?php echo $post_title; ?>">
	</div>
	<div class="form-group">
		<select name="post_category" id="">

			
<?php 

	$query = "SELECT * FROM catagories";  // WHERE cat_id = {$cat_id} 
	$select_catagories = mysqli_query($connection, $query);

	confirm($select_catagories);

        while ($row = mysqli_fetch_assoc($select_catagories)) {

		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];

			echo "<option value='$cat_id'>{$cat_title}</option>";

		}


?>

		</select>
	</div>
	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
	</div>
	<div class="form-group">
		<select name="post_status" id="">
			<option value="<?php echo $post_status; ?>"><?php echo ucfirst($post_status); ?></option>
	<?php

		if ($post_status == 'draft') {
			echo "<option value='published'>Published</option>";
		} else {
			echo "<option value='draft'>Draft</option>";
		}

	 ?>


		</select>
	</div>
	<!-- <div class="form-group">
		<label for="title">Post Status</label>
		<input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
	</div> -->



	<div class="form-group">
		<label for="title">Post Image</label>
		<div class="form-group">
			<img width="90" src="../images/<?php echo $post_image;  ?>">
		</div>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="title">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
	</div>
	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea type="text" class="form-control" id="body" cols="30" rows="10" name="post_content"><?php echo $post_content; ?></textarea>
	</div>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
	</div>
</form>