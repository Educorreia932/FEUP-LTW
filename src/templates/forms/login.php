<section class="authentication-form">
	<h1>Enter In Your Account</h1>
	<form action="../actions/action_login.php" method="post">
		<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
		<label>
			Username <input type="text" pattern="[\w]{1,20}" name="username" required>
		</label>
		
		<label>
			Password <input type="password" name="password" required>
		</label>
		
		<input type="submit" value="Login">
	</form>
</section>