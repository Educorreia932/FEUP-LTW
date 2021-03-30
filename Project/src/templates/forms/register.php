<section class="authentication-form">
	<h1>Create a new account</h1>
	<form action="../actions/action_register.php" method="post">
		<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
		<label>
			Name <input type="text" pattern="^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)" name="name" required
					title="Capitalized first and last name, separated by a single space.">
		</label>
		
		<label>
			Username <input type="text" pattern="[\w]{4,20}" name="username" required title="Must have length between 4 and 20.">
		</label>
		
		<label>
			Password <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&\-_])[A-Za-z\d@$!%*#?&\-_]{8,}$" name="password" required
						title="Must contain at least one number, one letter, a special character and at least 8 or more characters.">
		</label>

		<input type="submit" value="Register">
	</form>
</section>