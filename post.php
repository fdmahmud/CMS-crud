<?php include 'includes/db.php'; ?>

    <!-- Header -->
<?php include 'includes/header.php'; ?>

    <!-- Navigation -->   
<?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];

                $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 ";
                $view_query .= "WHERE post_id = {$the_post_id} ";

                $send_query = mysqli_query($connection, $view_query);
                confirm($send_query);

                $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";

                $select_all_posts_query = mysqli_query($connection, $query);



                if (empty($select_all_posts_query)) { // This should be something else.
                    header("Location: /index.php");
                } else {

                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];


            ?>

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
 -->
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?a_id=<?php echo $post_author ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <hr>       

            <?php  
                    }
                } 
            } else {
                    header("Location: ../index.php");
                }
            
            ?>





             <!-- Blog Comments -->


             <?php  

                if (isset($_POST['create_comment'])) {

                    $the_post_id = $_GET['p_id']; // 

                    $comment_author_email = $_POST['comment_author_email'];
                    $comment_author_name = $_POST['comment_author'];
                    $comment_content = $_POST['comment_content'];

                    if (!empty($comment_author_email) &&  !empty($comment_author_name) && !empty($comment_content)) {

                        $query = "INSERT INTO comments ";
                        $query .= "(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES('{$the_post_id}', '{$comment_author_name}', '{$comment_author_email}', '{$comment_content}', 'unapproved', now()) ";

                        $submitting_comment = mysqli_query($connection, $query);

                        confirm($submitting_comment); // my method.
                        echo "Comment Submitted.";

 


                        // $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        // $query .= "WHERE post_id = '{$the_post_id}'";

                        // $update_comment_count = mysqli_query($connection, $query);

                    } else {
                        echo "<script>alert('Fields cannot be empty')</script>";
                    }

                   
                }


             ?>








                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Name:</label>
                            <input type="Text" class="form-control" name="comment_author" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="comment_author_email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment:</label>

                            <textarea  class="form-control" rows="3" id="" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

        <?php 


                $query = "SELECT * FROM comments WHERE comment_post_id = '{$the_post_id}' ";
                $query .= "AND comment_status = 'approved' ";   ///// THIS IS HOW WE SHOW APPREVED COMMENTS.
                $query .= "ORDER BY comment_id DESC ";

                $show_comment = mysqli_query($connection, $query);

                confirm($show_comment);
                
                   while ($row = mysqli_fetch_assoc($show_comment)) {
                    $comment_date1 = $row['comment_date'];
                    $comment_author1 = $row['comment_author'];
                    $comment_status = $row['comment_status'];
                    $comment_content1 = $row['comment_content']; 
                

        ?>




                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="images/Annotation 2020-02-07 223718.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author1; ?>
                            <small><?php echo $comment_date1; ?></small>
                        </h4>
                        <?php echo $comment_content1; ?>
                    </div>
                </div>

        <?php 

                    } 
        ?>


                <!-- Comment -->
               <!--  <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->
                        <!-- Nested Comment -->
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->
                        <!-- End Nested Comment -->
                   <!--  </div>
                </div> -->

            </div>

    <!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php' ?>
            

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
<?php include 'includes/footer.php' ?>

        