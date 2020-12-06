<section class="authentication-form">
	<h1>Enter In Your Account</h1>
	<form action="actions/action_login.php" method="post">
		<label>
			Username <input type="text" pattern="[\w]{1,20}" name="username" required>
		</label>
		
		<label>
			Password <input type="password" name="password" required>
		</label>
		
		<button type="submit" value="Submit">Login</button>
	</form>
</section>