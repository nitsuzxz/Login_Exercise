<?php
	session_start();

	//INITIALIZE VARIABLES
	$username = "";
	$email = "";

	//ERROR HANDLING
	$error = array();

	//DATABASE CONNECTION
	$db = mysqli_connect('localhost', 'root','', 'practice') or die("cannot connect to database");

	/*
	INPUT RETRIEVAL
	gets every input from form & checks for escape characters
	that can cause security issues
	*/
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	/*
	FORM VALIDATION
	any empty fields would result in error
	*/
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
	$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1"; 
	//query the database
	$results = mysqli_query($db, $user_check_query);
	//store the returned database objects as an associative array
	$user = mysqli_fetch_assoc($results);
	//if user exists
	if($user === TRUE){
		if($user['username'] === $username){
			array_push($error, "Username already exists");
		}
		if($user['email'] === $email){
			array_push($error, "Email has already been registered");
		}
	}

	/*
	REGISTER USER
	Once error checking is complete, proceed to registering the user
	*/
	if(count($error) == 0){
		$password = md5($password_1);
		$query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
	}

	mysqli_query($db, $query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now logged in";

	header('location: index.php');

	/*
	LOGIN USER
	*/

	if (isset($_POST['login_user'])){
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

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

			if (mysqli_num_results($results)){
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Logged in successfully";
				header("location: index.php");
			}
			else{
				 array_push($err, "Wrong username/input. Please try again");
			}
		}

	}
?>