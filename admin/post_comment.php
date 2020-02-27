<?php include 'includes/admin_header.php'; ?>


    <div id="wrapper">

        <!-- Navigation -->
<?php include 'includes/admin_navigation.php'; ?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <?php 
          $query = "SELECT * FROM posts WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['id'] . " ");
          $post_title_query = mysqli_query($connection, $query);
                    confirm($post_title_query);
               $row = mysqli_fetch_assoc($post_title_query);
               $post_title = $row['post_title'];
                         ?>

                        <h1 class="page-header">
                            Comment of 
                            <small><?php  echo $post_title; ?></small>
                        </h1>                                
                    </div>


<table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                                   <th>Sl No</th>
                    			<th>Id</th>
                    			<th>Author</th>
                    			<th>Comment</th>
                    			<th>Status</th>
                    			<th>Email</th>
                    			<!-- <th>Comment of</th> -->
                                   <th>Date</th>
                                   <th>Approve</th>
                    			<th>Unpprove</th>
                    			<th>Delete</th>

                    		</tr>
                    	</thead>
                    	<tbody>
     <?php 
         // $shit = $_GET['id'];

     //if (is_array($_GET['id'])) {
     
          $query = "SELECT * FROM comments WHERE comment_post_id = " . mysqli_real_escape_string($connection, $_GET['id'] . " ");
          $spacific_comment_query = mysqli_query($connection, $query);
          confirm($spacific_comment_query);

          $post_counts = 1;

          while ($row = mysqli_fetch_assoc($spacific_comment_query)) {

                    $comment_id = $row['comment_id'];
                    $comment_author = $row['comment_author'];
                    //$comment_title = $row['post_title']; No comment title
                    $comment_email = $row['comment_email'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_status = $row['comment_status'];
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];

                    echo "<tr>";

                         

                    echo "<td>{$post_counts}</td>";
                    $post_counts++;

                    echo "<td>{$comment_id}</td>";



                    echo "<td>{$comment_author}</td>";
                    echo "<td>{$comment_content}</td>";

                         // $query = "SELECT * FROM catagories WHERE cat_id = {$post_category_id} "; 
         //                   $select_catagories_id = mysqli_query($connection, $query);

         //                 while ($row = mysqli_fetch_assoc($select_catagories_id)) {

         //                   $cat_id = $row['cat_id'];
         //                   $cat_title = $row['cat_title'];
         //              }

                    echo "<td>{$comment_status}</td>";
                    echo "<td>{$comment_email}</td>";

                    // $query = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";

                    //           $show_All_Posts = mysqli_query($connection, $query);

                    //           if (!$show_All_Posts) {
                    //                die("error" . mysqli_error($connection));
                    //           }

                    //           while ($row = mysqli_fetch_assoc($show_All_Posts)) {
                    //                $post_title12 = $row['post_title'];
                    //                $post_id12 = $row['post_id'];

                    //                if ($post_title12 == null) {
                    //                     echo "No post id";
                    //                }

                    //                echo "<td><a href='../post.php?p_id=$post_id12'>$post_title12</a></td>";
                    //           }
                              

                    echo "<td>$comment_date</td>";
                    echo "<td><a class='btn btn-primary' href='post_comment.php?id={$_GET['id']}&approve={$comment_id}'>Aporove</a></td>"; 
                    echo "<td><a class='btn btn-primary' href='post_comment.php?id={$_GET['id']}&unapprove={$comment_id}'>Unapprove</a></td>";
                    echo "<td><a class='btn btn-danger' href='post_comment.php?id={$_GET['id']}&delete={$comment_id}'>Delete</a></td>";
                    echo "</tr>";

               }
         // }




     ?>
	                    			<!-- <td>12</td>
	                    			<td>Ferdous</td>
	                    			<td>Bootstrap Framework</td>
	                    			<td>Bootstrap</td>
	                    			<td>Status</td>
	                    			<td>Imaeg</td>
	                    			<td>Tags</td>
	                    			<td>Data</td>
	                    			<td>Comments</td> -->

               <?php 
                    if (isset($_GET['delete'])) {
           
                    $the_comment_id = $_GET['delete'];                
                      $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
                      $delete_comment_query = mysqli_query($connection, $query);
                      header("Location: post_comment.php?id=" . $_GET['id']);
                    } 

                         if (isset($_GET['approve'])) {
                
                         $the_comment_id = $_GET['approve']; 

                           $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '{$the_comment_id}' ";
                           $approve_comment_query = mysqli_query($connection, $query);
                           header("Location: post_comment.php?id=" . $_GET['id']);
                         }

             
                        if (isset($_GET['unapprove'])) {
                
                         $the_comment_id = $_GET['unapprove']; 

                           $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = '{$the_comment_id}' ";
                           $unapprove_comment_query = mysqli_query($connection, $query);
                           header("Location: post_comment.php?id=" . $_GET['id']);
                         }
               ?>


                    		</tr> 
                    	</tbody>
                    </table>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<!-- footer -->
<?php include 'includes/admin_footer.php'; ?>
