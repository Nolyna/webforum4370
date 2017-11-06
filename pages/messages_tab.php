<div class="row">
	<div class="col-md-7">
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
				foreach ($messages as $i => $messages) {
					echo '
					  <tr">
						<td>'.$messages["email"].'</td>
						<td>'.$messages["messageText"].'</td>
					  </tr>';
				}
				echo' </tbody></table>';
			}
		?>
		<form action = "" method = "post">
			<h2>Send a Message</h2>
			<div class="form-group">
				<label for="username">Email</label>
				<input type="text" class="form-control" id="email" name = "email" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="firstname">Message</label>
				<input type="text" class="form-control" id="message" name = "message" placeholder="Message">
			</div>
			 <button type="submit" class="btn btn-primary">Send</button>
		</form>
	</div>
</div>
	