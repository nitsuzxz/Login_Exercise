<?php
	global $db;

	if (isset($_POST['login'])){
		$username = $_POST['username'];
		echo $username;

		$password = $_POST['password'];
		echo $password;

		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);

		if (empty($username)){
			array_push($error, "Username is required");
		}
		if (empty($password)){
			array_push($error, "Password is required");
		}

		if (count($error) == 0){
			$password = md5($password);
			$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
			$results = mysqli_query($db, $query);

			/*
			if (mysqli_num_results($results)){
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Logged in successfully";
				//header("location: index.php");
			}
			else{
				 array_push($err, "Wrong username/input. Please try again");
			}*/
		}

	

	}
?>