<div class="row">
	<div class="col-md-7">
		<form action = "messages_tab.php" method = "post">
			<h2>Send Messages</h2>
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
		<?php
			$db = dbconnect();
			$email = $_POST["email"];
			$message = $_POST["messageText"];
			$st = $db->prepare("INSERT INTO message VALUES ($email, $message)");
			$st->execute(); 
			$db = null;
		?>
	</div>
</div>
	