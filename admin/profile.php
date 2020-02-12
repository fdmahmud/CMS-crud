<?php include 'includes/admin_header.php'; ?>


<?php 

    if (isset($_SESSION['username'])) {
        
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {

            $user_id = $row['user_id'];
            $f_name = $row['user_firstname'];
            $l_name = $row['user_lastname'];
            $username = $row['username'];
            $email = $row['user_email'];
            $password = $row['password'];
            $image = $row['user_image'];
            $user_role = $row['user_role'];
            }

    }

?>
<?php       

    if (isset($_POST['edit_user'])) {
    
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_password = $_POST['password'];
        $user_role = $_POST['user_role'];
                

        move_uploaded_file($user_image_temp, "../images/$user_image");

            if (empty($user_image)) {
                $query = "SELECT * FROM users WHERE user_id = {$user_id} ";
                $select_image = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_image)) {
                    $user_image1 = $row['user_image'];
                }

            }

            $query = "UPDATE users SET ";                           //  ORGANIZE
            $query .= "username = '{$username}', ";                 //  THIS QUERY
            $query .= "password = '{$user_password}', ";            //  WIth VERY
            $query .= "user_firstname = '{$user_firstname}', ";     //  MUTCH
            $query .= "user_lastname = '{$user_lastname}', ";       //  CAUTION!!!!!
            $query .= "user_email = '{$user_email}', ";             //
            $query .= "user_image = '{$user_image1}', ";            //  OR GET
            $query .= "user_role = '{$user_role}' " ;               //  READY TO
            $query .= "WHERE user_id = {$user_id}";                 //  SUFFER!!!


                $create_user_query = mysqli_query($connection, $query);

                confirm($create_user_query);
                header("Location: users.php");
    } ?>









    <div id="wrapper">

        <!-- Navigation -->
<?php include 'includes/admin_navigation.php'; ?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">


                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></small>
                        </h1>  

                    </div>
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
        
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
</form>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->




<!-- footer -->
<?php include 'includes/admin_footer.php'; ?>
