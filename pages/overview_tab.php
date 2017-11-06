<div class="row">
	<div class="col-md-7">
		<h2>Users</h2>
			<?php
				$users = array_filter(getAllUsers());
				if (empty($users)) {
					echo '<div class="jumbotron jumbotron-fluid">
							<div class="container">
								<p class="lead">Sorry, You do not have any users yet.</p>
							</div>
						  </div>';
				}else{
					echo '<table class="table">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">First Name</th>
								  <th scope="col">Last Name</th>
								  <th scope="col">Username</th>
								  <th scope="col">Email</th>
								</tr>
							  </thead>
							  <tbody>' ;
					foreach ($users as $i => $user) {
						echo '
							<tr">
								<td>'.$i.'</td>
								<td>'.$user["firstName"].' </td>
								<td>'.$user["lastName"].'</td>
								<td>'.$user["username"].'</td>
								<td>'.$user["email"].'</td>
							</tr>';
					}
					echo' </tbody></table>';
				}	
			?>
			
		<h2>Statistics</h2>
			<div>
				
			</div>
		<?php
			/*
				things that could be included in overview:
				messages
				list of users
				forum statistics
			*/
		?>
	</div>
</div>