<?php 
     
     if (isset($_POST['checkBoxArray'])) {
          foreach ($_POST['checkBoxArray'] as $checkBoxIdValue) {
               $bulk_options = $_POST['bulk_options'];


               switch ($bulk_options) {
                    case 'published':
                         $query = "UPDATE posts SET ";
                         $query .= "post_status = '{$bulk_options}' ";
                         $query .= "WHERE post_id = {$checkBoxIdValue}";
                         
               $update_post_query = mysqli_query($connection, $query);
               confirm($update_post_query);
                         break;
                    case 'draft':
                         $query = "UPDATE posts SET ";
                         $query .= "post_status = '{$bulk_options}' ";
                         $query .= "WHERE post_id = {$checkBoxIdValue}";
                         
               $update_post_query = mysqli_query($connection, $query);
               confirm($update_post_query);
                         break;
                    case 'delete':
                         $query = "DELETE FROM posts ";
                         $query .= "WHERE post_id = {$checkBoxIdValue}";
                         
               $update_post_query = mysqli_query($connection, $query);
               confirm($update_post_query);
                         break;
                    default:
                         # code...
                         break;
               }
          }
     }
     

?>




<form action="" method="post">
     <table class="table table-bordered table-hover">


          <div id="bulkOptionsContainer" class="col-xs-4">
               <select class="form-control" name="bulk_options" id="">
                    <option value="">Select Options</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
               </select>
          </div>
          <div class="col-xs-4"> 
               <input type="submit" name="submit" class="btn btn-success" value="Apply">
               <a class="btn btn-primary" href="posts.php?source=add_post">Add new</a>
          </div>




          <thead>
     		<tr>
                    <th><input id="selectAllBoxes" type="checkbox" name=""></th>
                    <th>SL NO</th>
     			<th>Id</th>
     			<th>Author</th>
     			<th>Title</th>
     			<th>Category</th>
     			<th>Status</th>
     			<th>Image</th>
     			<th>Tags</th>
     			<th>Comments</th>
                    <th>Date</th>
                    <th>Edit</th>
     			<th>Delete</th>

     		</tr>
          </thead>
          <tbody>
               <?php showAllPosts(); ?>
	                    			<!-- <td>12</td>
	                    			<td>Ferdous</td>
	                    			<td>Bootstrap Framework</td>
	                    			<td>Bootstrap</td>
	                    			<td>Status</td>
	                    			<td>Imaeg</td>
	                    			<td>Tags</td>
	                    			<td>Data</td>
	                    			<td>Comments</td> -->

               <?php deletePost(); ?>


               
          </tbody>
     </table>
</form>