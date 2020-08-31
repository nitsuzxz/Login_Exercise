<?php
	$db = mysqli_connect('localhost', 'root','', 'practice');//or die("cannot connect to database");

	if(!$db){
   		die("connection to db failed" . mysqli_error($db));
	}
?>

