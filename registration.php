<?php include('server.php')?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>
	</head>
	
	<body>
		<div class="container">
			<form action="registration.php" method="post">
				<?php include('errors.php')?>
				
				<div>
					<label for="username">Username:</label>
				</div>
				<div>
					<input type="text" name="username" required>
				</div>

				<div>
					<label for="email">Email:</label>
				</div>
				<div>
					<input type="email" name="email" required>
				</div>

				<div>
					<label for="password">Password:</label>
				</div>
				<div>
					<input type="password" name="password_1" required>
				</div>

				<div>
					<label for="password">Confirm Password:</label>
				</div>
				<div>	
					<input type="password" name="password_2" required>
				</div>

				<button type="submit" name="register_user">Submit</button>
			</form>
		</div>

		<p>Already registered? <a href="login.php">Login</a></p>
	</body>
</html>