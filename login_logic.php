<?php
	/*punca error tadi adalah dari include db_configuration. since action dia 
	redirect ke page lain. so include page dekat index tadi jadi tak valid*/
    include "db_configuration.php";
	global $conn;

	if (isset($_POST['login'])){

		//Get input from form
		$username = $_POST['username'];
		$password = $_POST['password'];
	

		$username1 = mysqli_real_escape_string($conn,$username);
		$password = mysqli_real_escape_string($conn,$password);

		//login query
		$login_query="SELECT * FROM user WHERE UserName='$username1' ";
		echo $login_query;
		$query= mysqli_query($conn,$login_query);
		$data = mysqli_fetch_array($query); //fetch the data

		/*condition to check either array is empty or not. if empty system will
		echo error invalid username. This is because when we do query we select
		all data from table user and we filter where UserName is equal to
		username input that has been keyin by the user.
		
		So basically if database not return anything this is probably 
		there is no user that has same username like input */

		if(!empty($data)){
			// $data is a array that has been fetch from the query
			// $data['User_ID']; is to access array. make sure User_ID is 
			// case sensitive and must be same like inside database table.
			$user_id=$data['UserID'];
			$user_email=$data['Email'];
			$user_password=$data['Password'];

			echo $user_id;
			echo $user_email;
			echo $user_password;

			/* Do a logic inside here....*/


		}else{
			echo "invalid username";
		}
	}
?>