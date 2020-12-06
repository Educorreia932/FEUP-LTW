<section class="authentication-form">
	<h1>Create a new account</h1>
	<form action="actions/action_register.php" method="post">
		<label>
			Name <input type="text" pattern="^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)" name="name" required>
		</label>
		
		<label>
			Username <input type="text" pattern="[\w]{1,20}" name="username" required>
		</label>
		
		<label>
			Password <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="password" required>
		</label>

		<button type="submit">Register</button>
	</form>
</section>