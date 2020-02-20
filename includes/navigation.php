

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                	<?php 

                		$query = "SELECT * FROM catagories";
                		$select_all_catagories_query = mysqli_query($connection, $query);

                		while ($row = mysqli_fetch_assoc($select_all_catagories_query)) {
                			$cat_title = $row['cat_title'];

                			//echo "<li>" . $cat_title . "</li>"; //Both works
                			echo "<li><a href='#''>{$cat_title}</a></li>";
                		}
                	?>
                    <?php 
                        if (isset($_SESSION['user_role'])) {
                            echo "<li><a href='admin'>Admin</a></li>";
                        } else {
                            echo "<li><a href='registration.php'>Sign Up</a></li>";

                        }
                    ?>

                    <li><a href='registration.php'>Sign Up</a></li>


<?php 

    if (isset($_SESSION['user_role'])) {

// echo  "<li><a href='#'>Edit</a></li>";

        if (isset($_GET['p_id'])) {
            $the_post_id =  $_GET['p_id'];
            echo  "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit This Post</a></li>";
            }
        }

        
    
?>
<!-- <li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit This Post</a></li> -->




                  
                 <!--       <li>
                        <a href="#">Contact</a>
                    </li> -->


                </ul>



               <!--  Index user ul -->
                <ul class="nav navbar-nav navbar-right top-nav">



                <!-- <li ><a href="../index.php">Home Page</a></li> -->
                
                

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <?php 

                        if (isset($_SESSION['username'])) {
                       
                        ?>

                        <img width="35" src="../images/<?php echo $_SESSION['user_image']; ?>"> 
                        <?php echo $_SESSION['username']; }else { ?> <b class="caret"></b></a>
                        <?php
                         
                            echo "<img width='35' src=' '>No user<";
                        }
                        ?>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>