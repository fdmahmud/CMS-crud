
<?php 
	if (isset($_POST['create_user'])) {
	
				$user_firstname = $_POST['user_firstname'];
				$user_lastname = $_POST['user_lastname'];
				$username = $_POST['username'];
				$user_email = $_POST['user_email'];
				$user_image = $_FILES['image']['name'];
				$user_image_temp = $_FILES['image']['tmp_name'];
				$user_password = $_POST['password'];
				$user_roll = $_POST['user_roll'];
				

				move_uploaded_file($user_image_temp, "../images/$user_image");

	$query = "INSERT INTO users";
	$query .= "(username, password, user_firstname, user_lastname, user_email, user_image, user_roll) " ;
	$query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_roll}') ";
				$create_user_query = mysqli_query($connection, $query);

				confirm($create_user_query);
	}


?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">First name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="title">Last name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>


	<div class="form-group">
		<select name="user_roll" id="">
			<option value="subscriber">Select Option</option>

			<option value="admin">admin</option>
			<option value="subscriber">subscriber</option>
			
		</select>
	</div>


	<div class="form-group">
		<label for="title">User name</label>
		<input type="text" class="form-control" name="username">
	</div>
	
	<div class="form-group">
		<label for="title">Email:</label>
		<input type="email" class="form-control" name="user_email">
	</div>
	<div class="form-group">
		<label for="title">Passowrd</label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label for="title">Profile Image</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary" name="create_user" value="Sign up">
	</div>
</form>