<?php
	/*punca error tadi adalah dari include db_configuration. since action dia 
	redirect ke page lain. so include page dekat index tadi jadi tak valid*/
    include "db_configuration.php";
	global $conn;

	
	include('errors.php');


	if (isset($_POST['register_user'])){

		//Get input from form
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
	

		$username = mysqli_real_escape_string($conn,$username);
		$email = mysqli_real_escape_string($conn,$email);
		$password_1 = mysqli_real_escape_string($conn,$password_1);
		$password_2 = mysqli_real_escape_string($conn,$password_2);

		//form validation
		if (empty($username)){
			array_push($error, "Username is required");
		}

		if (empty($email)){
			array_push($error, "Email is required");
		}

		if (empty($password_1)){
			array_push($error, "Password is required");
		}
		//password confirmation
		if ($password_2 != $password_1){
			array_push($error, "Password does not match");
		}

		/*
		CHECK DATABASE FOR EXISTING USERNAMES
		*/
		//query set-up
		$user_check_query = "SELECT * FROM user WHERE UserName = '$username' or Email = '$email' LIMIT 1"; 
		//query the database
		$results = mysqli_query($conn, $user_check_query);
		//store the returned database objects as an associative array
		$user = mysqli_fetch_assoc($results);
		//if user exists
		//echo $user['UserName'];
		//die();
		if($user === TRUE){
			if($user['username'] === $username){
				array_push($error, "Username already exists");
			}
			if($user['email'] === $email){
				array_push($error, "Email has already been registered");
			}
		}
		echo count($error);
		if(count($error) == 0){
			$password = md5($password_1);
			$query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

			mysqli_query($conn, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
		}

		
	}

?>