


<table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                    			<th>Id</th>
                    			<th>Author</th>
                    			<th>Comment</th>
                    			<th>Status</th>
                    			<th>Email</th>
                    			<th>Comment of</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                    			<th>Unpprove</th>
                    			<th>Delete</th>

                    		</tr>
                    	</thead>
                    	<tbody>
                    			<?php showAllComments(); ?>
	                    			<!-- <td>12</td>
	                    			<td>Ferdous</td>
	                    			<td>Bootstrap Framework</td>
	                    			<td>Bootstrap</td>
	                    			<td>Status</td>
	                    			<td>Imaeg</td>
	                    			<td>Tags</td>
	                    			<td>Data</td>
	                    			<td>Comments</td> -->

               <?php deleteComment(); ?>
               <?php approveComment(); ?>
               <?php unapproveComment(); ?>


                    		</tr> 
                    	</tbody>
                    </table>