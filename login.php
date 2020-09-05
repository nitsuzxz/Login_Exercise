<?php include("./db_configuration.php")?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	
	<body>
		<div class="container">
			<form action="login_logic.php" method="post">
				<div>
					<label for="username">Username:</label>
				</div>
				<div>
					<input type="text" name="username" required>
				</div>

				<div>
					<label for="password">Password:</label>
				</div>
				<div>
					<input type="password" name="password" required>
				</div>

				<button type="submit" name="login">Submit</button>
			</form>
		</div>

		<p>Not registered yet? Register <a href="registration.php">here</a></p>
	</body>
</html>



