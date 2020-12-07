<section class="authentication-form">
	<h1>Create a new account</h1>
	<form action="actions/action_register.php" method="post">
		<label>
			Name <input type="text" pattern="^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)" name="name" required
					title="Capitalized first and last name, separated by a single space.">
		</label>
		
		<label>
			Username <input type="text" pattern="[\w]{4,20}" name="username" required title="Must have length between 4 and 20.">
		</label>
		
		<label>
			Password <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="password" required
						title="Must contain at least one number, one lowercase letter, a special character and at least 8 or more characters.">
		</label>

		<button type="submit">Register</button>
	</form>
</section>