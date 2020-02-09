 <form action="" method="post">
	                        	<label for="cat-title">Update Category</label>



	                        	<?php 

	                        	if (isset($_GET['edit'])) {

                					$cat_id = $_GET['edit'];

	                        		$query = "SELECT * FROM catagories WHERE cat_id = {$cat_id} "; 
			                		$select_catagories_id = mysqli_query($connection, $query);

		                            while ($row = mysqli_fetch_assoc($select_catagories_id)) {

		                			$cat_id = $row['cat_id'];
		                			$cat_title = $row['cat_title'];

		                			?>

		                			<div class="form-group">
		                			<input type="text" value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" name="cat_title">
		                			</div>
		                <!-- <input value="" type="text" class="from-control" name="cat_title"/> -->
		                			
	                        	<?php 

	                        	} }

	                        	?>

	                    	<?php  ////////// UPDATE query

	                        	if (isset($_POST['update_category'])) {
	 
		                        	$the_cat_title = $_POST['cat_title'];
		                        	
		                        	$query = "UPDATE catagories SET cat_title = '$the_cat_title' WHERE cat_id = {$cat_id} ";

		                        	$update_query = mysqli_query($connection, $query);

		                        	if (!$update_query) {
		                        		die("Error" . mysqli_error($connection));
		                        	}
		                        	//header("Location: categories.php");


	                        	}
	                    ?>



	                        	
	                        		
	                        	
	                        	<div class="form-group">
	                        		<input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
	                        	</div>
	                        </form>