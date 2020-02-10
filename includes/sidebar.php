<div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
	                    <div class="input-group">
	                        <input name="search" type="text" class="form-control">
	                        <span class="input-group-btn">
	                            <button class="btn btn-default" name="submit" type="submit">
	                                <span class="glyphicon glyphicon-search"></span>
	                        </button>
	                        </span>
	                    </div>
                	</form> <!-- search form -->
                    <!-- /.input-group -->
                </div>


                <!-- LOG IN -->
                 <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <div class="from-group">
                            <input name="username" type="text" class="form-control" placeholder="username">      
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary"  name="login" type="submit" ><span>Log in</span></button>
                            </span>
                        </div>
                        
                    </form> <!-- login -->
                    <!-- /.input-group -->
                </div>








                <!-- Blog Categories Well -->
                <div class="well">


                	<?php 

                		$query = "SELECT * FROM catagories"; // SELECT * FROM catagories LIMIT 3
                		$select_catagories_sidebar = mysqli_query($connection, $query);

                		
                	?>



                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php 

                            	while ($row = mysqli_fetch_assoc($select_catagories_sidebar)) {

                                $cat_title = $row['cat_title'];
                				$cat_id = $row['cat_id'];
                				echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                				
                				}
                            ?>
                                
                            </ul>
                        </div>



                        <!-- /.col-lg-6 -->
                       <!--  <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
 -->


                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'includes /widget.php' ?>

            </div>