<section class="authentication-form">
	<h1>Create a new account</h1>
	<form action="actions/action_register.php" method="post">
		<label>
			Name <input type="text" name="name" required>
		</label>
		
		<label>
			Username <input type="text" name="username" required>
		</label>
		
		<label>
			Password <input type="password" name="password" required>
		</label>

		<button type="submit">Register</button>
	</form>
</section>