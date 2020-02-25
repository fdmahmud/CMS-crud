<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php 
    $message1 = "";
    $message2 = "";
    $message = "";
    if (isset($_POST['submit'])) {
        //echo "<h1>Working</h1>";

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        
                
        if (!empty($username) && !empty($email) && !empty($password)) {


        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);


        $password = password_hash($password, PASSWORD_DEFAULT, ['cost'=> 10]);



        $query = "SELECT user_id FROM users WHERE username = '{$username}' ";

            $check_user = mysqli_query($connection, $query);
            confirm($check_user);

            $row = mysqli_fetch_assoc($check_user);

            if (!empty($row)) {

                $message = "username already exists";
                
            } else {



            $query = "INSERT INTO users (username, user_email, password, user_role) ";
            $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber')";

            $register_user_query = mysqli_query($connection, $query);
                confirm($register_user_query);

                $message1 = "<h3 class='text-success'>Welcome $username</h3>";

                }  


            } else {

                $message2 = "<h3 class='text-warning'>Insert something</h3>";
            }
    
}

?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <?php echo $message1; ?>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <?php echo $message; ?>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <?php echo $message2; ?>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
