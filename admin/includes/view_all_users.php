


<table class="table table-bordered table-hover">
                    	<thead>
                    		<tr>
                    			<th>User Id</th>
                    			<th>Username</th>
                    			<th>Firstname</th>
                    			<th>Lastname</th>
                    			<th>Email</th>
                    			<th>User Image</th>
                    			<th colspan="5">Role</th>
                                   <!-- <th>Extra</th>
                                   <th>Delete</th> -->
                    			 
                    		</tr>
                    	</thead>
                    	<tbody>
                    			<?php showAllusers(); ?>
	                    			<!-- <td>12</td>
	                    			<td>Ferdous</td>
	                    			<td>Bootstrap Framework</td>
	                    			<td>Bootstrap</td>
	                    			<td>Status</td>
	                    			<td>Imaeg</td>
	                    			<td>Tags</td>
	                    			<td>Data</td>
	                    			<td>Comments</td> -->

               <?php deleteUser(); ?>
               <?php changeToAdmin(); ?>
               <?php changeToSubscriber(); ?>


                    		</tr>
                    	</tbody>
                    </table>