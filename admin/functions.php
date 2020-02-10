

<?php 


function confirm($result) {
	global $connection;

	if (!$result) {
			die(" Query Failed. " . mysqli_error($connection));
		}
		
	}

function insertCategories() {

	global $connection;

	if (isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];

			if ($cat_title == " " || empty($cat_title)) {
				echo "This field should not be empty";

			} else {

				$query = "INSERT INTO catagories(cat_title) ";
				$query .= "VALUES ('$cat_title')";

				$create_category_query = mysqli_query($connection, $query);
					if (!$create_category_query) {
					die("Query Failde" . mysqli_error($connection));
					}
				}
			}
		}


	function findAllCategories() {
		global $connection;

		$query = "SELECT * FROM catagories"; // SELECT * FROM catagories LIMIT 3
	    $select_catagories = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_catagories)) {

            	$cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];


                echo "<tr>";
                echo "<td>{$cat_id }</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
                echo "<td><a href='categories.php?edit=$cat_id'>Edit</a></td>";
                echo "</tr>";

                				
                			}
	}
 
	function deleteCategories() {
		global $connection;

		if (isset($_GET['delete'])) {
 
        	$the_cat_id = $_GET['delete'];            	
            $query = "DELETE FROM catagories WHERE cat_id = {$the_cat_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
		}
	}

	function showAllPosts() {
		global $connection;

		$query = "SELECT * FROM posts";
			$show_All_Posts = mysqli_query($connection, $query);

			if (!$show_All_Posts) {
				die("error" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($show_All_Posts)) {

				$post_id = $row['post_id'];
				$post_author = $row['post_author'];
				$post_title = $row['post_title'];
				$post_category_id = $row['post_catagory_id'];
				$post_status = $row['post_status'];
				$post_image = $row['post_image'];
				$post_tags = $row['post_tags'];
				$post_comment_count = $row['post_comment_count'];
				$post_date = $row['post_date'];

				echo "<tr>";
				echo "<td>{$post_id}</td>";
				echo "<td>{$post_author}</td>";
				echo "<td>{$post_title}</td>";

					$query = "SELECT * FROM catagories WHERE cat_id = {$post_category_id} "; 
	            		$select_catagories_id = mysqli_query($connection, $query);

	                    while ($row = mysqli_fetch_assoc($select_catagories_id)) {

	        			$cat_id = $row['cat_id'];
	        			$cat_title = $row['cat_title'];
	        		}


				echo "<td>{$cat_title}</td>";



				echo "<td>{$post_status}</td>";
				echo "<td><img width='90' src='../images/$post_image'></td>";
				echo "<td>$post_tags</td>";
				echo "<td>$post_comment_count</td>";
				echo "<td>$post_date</td>";
				echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
				echo "<td><a class='btn btn-danger' href='posts.php?delete={$post_id}'>Delete</a></td>";
				echo "</tr>";

			}
		}

	function deletePost() {
		global $connection;

		if (isset($_GET['delete'])) {
                    $the_post_id = $_GET['delete'];

                    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                    $delete_query = mysqli_query($connection, $query);
                    header("Location: posts.php");

                    if (!$delete_query) {
                         die("You are dead" . mysqli_error($connection));
                    }

                   
                    
               }
               
	}



	function showAllComments() {
		global $connection;

		$query = "SELECT * FROM comments ";
        $query .= "ORDER BY comment_id DESC ";

			$show_All_Comments = mysqli_query($connection, $query);

			confirm($show_All_Comments);

			while ($row = mysqli_fetch_assoc($show_All_Comments)) {

				$comment_id = $row['comment_id'];
				$comment_author = $row['comment_author'];
				//$comment_title = $row['post_title']; No comment title
				$comment_email = $row['comment_email'];
				$comment_post_id = $row['comment_post_id'];
				$comment_status = $row['comment_status'];
				$comment_content = $row['comment_content'];
				$comment_date = $row['comment_date'];

				echo "<tr>";
				echo "<td>{$comment_id}</td>";
				echo "<td>{$comment_author}</td>";
				echo "<td>{$comment_content}</td>";

					// $query = "SELECT * FROM catagories WHERE cat_id = {$post_category_id} "; 
	    //         		$select_catagories_id = mysqli_query($connection, $query);

	    //                 while ($row = mysqli_fetch_assoc($select_catagories_id)) {

	    //     			$cat_id = $row['cat_id'];
	    //     			$cat_title = $row['cat_title'];
	    //     		}

				echo "<td>{$comment_status}</td>";
				echo "<td>{$comment_email}</td>";

				$query = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";

						$show_All_Posts = mysqli_query($connection, $query);

						if (!$show_All_Posts) {
							die("error" . mysqli_error($connection));
						}

						while ($row = mysqli_fetch_assoc($show_All_Posts)) {
							$post_title12 = $row['post_title'];
							$post_id12 = $row['post_id'];

							if ($post_title12 == null) {
								echo "No post id";
							}

							echo "<td><a href='../post.php?p_id=$post_id12'>$post_title12</a></td>";
						}
						

				echo "<td>$comment_date</td>";
				echo "<td><a class='btn btn-primary' href='comments.php?approve={$comment_id}'>Aporove</a></td>";
				echo "<td><a class='btn btn-primary' href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
				echo "<td><a class='btn btn-danger' href='comments.php?delete={$comment_id}'>Delete</a></td>";
				echo "</tr>";

			}
		}



		function deleteComment() {

			global $connection;

			if (isset($_GET['delete'])) {
	 
	        	$the_comment_id = $_GET['delete'];            	
	            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
	            $delete_comment_query = mysqli_query($connection, $query);
	            header("Location: comments.php");

	            // $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
             //    $query .= "WHERE post_id = '{$the_post_id}' ";

	            // $delete_comment_count = mysqli_query($connection, $query);

			}
		}

		function approveComment() {

			global $connection;

			if (isset($_GET['approve'])) {
	 
	        	$the_comment_id = $_GET['approve']; 

	            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '{$the_comment_id}' ";
	            $approve_comment_query = mysqli_query($connection, $query);
	            header("Location: comments.php");
			}
		}

		function unapproveComment() {

			global $connection;

			if (isset($_GET['unapprove'])) {
	 
	        	$the_comment_id = $_GET['unapprove']; 

	            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = '{$the_comment_id}' ";
	            $unapprove_comment_query = mysqli_query($connection, $query);
	            header("Location: comments.php");
			}
		}



function showAllusers() {
		global $connection;

		$query = "SELECT * FROM users ";
        //$query .= "ORDER BY comment_id DESC ";

			$show_All_Users = mysqli_query($connection, $query);

			confirm($show_All_Users);

			while ($row = mysqli_fetch_assoc($show_All_Users)) {

				$user_id = $row['user_id'];
				$username = $row['username'];
				$password = $row['password'];
				//$comment_title = $row['post_title']; No comment title
				$firstname = $row['user_firstname'];
				$lastname = $row['user_lastname'];
				$email = $row['user_email'];
				$userimage = $row['user_image'];
				$user_role = $row['user_role'];

				echo "<tr>";
				echo "<td>{$user_id}</td>";
				echo "<td>{$username}</td>";
				echo "<td>{$firstname}</td>";


				echo "<td>{$lastname}</td>";
				echo "<td>{$email}</td>";
				echo "<td><img width='90' src='../images/{$userimage}'></td>";
				echo "<td>{$user_role}</td>";
				echo "<td><a class='btn btn-primary' href='users.php?source=edit_user&u_id={$user_id}''>Edit User</a></td>";
				echo "<td><a class='btn btn-primary' href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
				echo "<td><a class='btn btn-primary' href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
				echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";
				echo "</tr>";
			}
		}

	function deleteUser() {

			global $connection;

			if (isset($_GET['delete'])) {
	 
	        	$the_delete_id = $_GET['delete'];            	
	            $query = "DELETE FROM users WHERE user_id = {$the_delete_id} ";
	            $delete_user_query = mysqli_query($connection, $query);
	            header("Location: users.php");
			}
		}
		
	function changeToAdmin() {

		global $connection;

		if (isset($_GET['change_to_admin'])) {
 
        	$the_user_id = $_GET['change_to_admin'];            	
            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '{$the_user_id}' ";
            $update_user_query = mysqli_query($connection, $query);
            header("Location: users.php");
		}
	}

	function changeToSubscriber() {

		global $connection;

		if (isset($_GET['change_to_sub'])) {
 
        	$the_user_id = $_GET['change_to_sub'];            	
            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '{$the_user_id}' ";
            $update_user_query = mysqli_query($connection, $query);
            header("Location: users.php");
		}
	}

function logIn() {

	global $connection;
	
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$query = "SELECT * FROM users WHERE username = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);

		confirm($select_user_query);
		while ($row = mysqli_fetch_assoc($select_user_query)) {
			$db_user_firstname = $row['user_firstname'];
			$db_user_lastname = $row['user_lastname'];
			$db_user_role = $row['user_role'];
			$db_user_email = $row['user_email'];
			$db_username = $row['username'];
			$db_user_password = $row['password'];
			$db_user_id = $row['user_id'];
		
		}

		if ($username !== $db_username && $password !== $db_user_password) {
			header("Location: ../index.php");
		} else if ($username == $db_username && $password == $db_user_password) {

			$_SESSION['username'] = $db_username;
			//$_SESSION['password'] = $db_user_password;
			$_SESSION['firstname'] = $db_user_firstname;
			$_SESSION['lastname'] = $db_user_lastname;
			$_SESSION['user_role'] = $db_user_role;


			header("Location: ../admin");
			
		} else {
			header("Location: ../index.php");

		}

	}
}

// function editPost() {
	// 	global $connection;



	// }

?>