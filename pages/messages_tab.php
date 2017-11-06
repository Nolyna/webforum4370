
	<div class="">
		<h2>Messages</h2>
		<?php
			$messages = array_filter(getAllMessages());
			if (empty($messages)) {
				echo '<div class="jumbotron jumbotron-fluid">
						<div class="container">
							<p class="lead">No messages yet.</p>
						</div>
					  </div>';
			}else{
				echo '<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Email</th>
					  <th scope="col">Message</th>
					</tr>
				  </thead>
				  <tbody>' ;
				foreach ($messages as $message) {
					echo '
					  <tr>
						<td>'.$message["email"].'</td>
						<td>'.$message["messageText"].'</td>
					  </tr>';
				}
				echo' </tbody></table>';
			}
		?>
	</div>

	