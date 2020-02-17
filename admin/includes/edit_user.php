
<?php 


	if (isset($_GET['u_id'])) {
		$the_user_id = $_GET['u_id'];
		


		// Pulling information from db


		$query = "SELECT * FROM users ";
		$query .= "WHERE user_id = '{$the_user_id}'";

		$get_all_user_data = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($get_all_user_data)) {
			$f_name = $row['user_firstname'];
			$l_name = $row['user_lastname'];
			$username = $row['username'];
			$email = $row['user_email'];
			$password = $row['password'];
			$image = $row['user_image'];
			$user_role = $row['user_role'];

		}
	}


	editUser();


					// $query = "SELECT randSalt FROM users ";                       //Incription  password
		   //          $select_randSalt_query = mysqli_query($connection, $query);

		   //          confirm($select_randSalt_query);

		   //          $row = mysqli_fetch_assoc($select_randSalt_query); 
		   //          $randSalt = $row['randSalt'];

		   //          $hashed_password = crypt($user_password, $randSalt);


?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">First name</label>
		<input type="text" class="form-control" value="<?php echo $f_name; ?>" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="title">Last name</label>
		<input type="text" class="form-control" value="<?php echo $l_name; ?>" name="user_lastname">
	</div>


	<div class="form-group">
		<select name="user_role" id="">
			<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>


			<?php 
				if ($user_role == 'admin') {
					echo "<option value='subscriber'>subscriber</option>";
				} else {
					echo "<option value='admin'>admin</option>";
				}


			?>



			
			
			
		</select>
	</div>


	<div class="form-group">
		<label for="title">User name</label>
		<input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
	</div>
	
	<div class="form-group">
		<label for="title">Email:</label>
		<input type="email" class="form-control" value="<?php echo $email; ?>" name="user_email">
	</div>
	<div class="form-group">
		<label for="title">Passowrd</label>
		<input type="password" class="form-control" value="<?php echo $password; ?>" name="password">
	</div> 
	<div class="form-group">
		<label for="title">Profile Image</label>
		<img width="90" src="../images/<?php echo $image; ?>">

		<input type="file" name="image">
	</div>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update user">
	</div>
</form>