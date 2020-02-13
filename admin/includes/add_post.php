
<?php 
	if (isset($_POST['create_post'])) {
	
				$post_author = $_POST['post_author'];
				$post_title = $_POST['title1'];
				$post_category_id = $_POST['post_category'];
				$post_status = $_POST['post_status'];
				$post_image = $_FILES['image']['name'];
				$post_image_temp = $_FILES['image']['tmp_name'];
				$post_tags = $_POST['post_tags'];
				$post_content = $_POST['post_content'];
				$post_date = date('d-m-y');
				$post_comment_count = 0;

				move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "INSERT INTO posts";
	$query .= "(post_catagory_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) " ;
	$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') ";
				$create_post_query = mysqli_query($connection, $query);

				confirm($create_post_query);
				echo "Post Created: " . " " . "<a class='btn btn-primary' href='posts.php'>View Users</a>";

	}


?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title1">


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
		<input type="text" class="form-control" name="post_author">
	</div>
	<div class="form-group">
		<label for="title">Post Status</label>
		<select name="post_status">
			<option value="draft">Draft</option>
			<option value="published">Published</option>
		</select>

		<!-- <input type="text" class="form-control" name="post_status"> -->
	</div>
	<div class="form-group">
		<label for="title">Post Image</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="title">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<label for="title">Post Content</label>
		<textarea type="text" class="form-control" id="body" cols="30" rows="10" name="post_content"></textarea>
	</div>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>
</form>