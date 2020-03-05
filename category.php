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

                if (isset($_GET['category'])) {
                    $post_category_id = $_GET['category'];


                $per_page = 4;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }



                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }


                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

                $query = "SELECT * FROM posts WHERE post_catagory_id = {$post_category_id} LIMIT {$page_1}, $per_page  ";
                
            } else {

                $query = "SELECT * FROM posts WHERE post_catagory_id = {$post_category_id} AND post_status = 'published' LIMIT {$page_1}, $per_page ";

            }

                   // $query = "SELECT * FROM posts WHERE post_catagory_id = {$post_category_id} AND post_status = 'published' ";

                    $select_all_posts_query = mysqli_query($connection, $query);
$count = mysqli_num_rows($select_all_posts_query);

                    if ($count < 1) {
                         echo "<h1 class='text-center'>No post found</h1>";
                       
                    } else {

$count = ceil(($count / $per_page));

                        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_id = $row['post_id'];
                            
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'],0,100);

                ?>

                          <!--   <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>       

                    <?php     
                        }
                    }
                } else {

                        header("Location: index.php");
                    }
                    ?>



                  

            </div>

    <!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php' ?>
            

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
<?php include 'includes/footer.php' ?>

        