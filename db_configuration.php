<?php

$host='localhost';
$user='root';
$db_pass='';
$db_name='practice';

$conn= mysqli_connect($host,$user,$db_pass,$db_name);

	if(!$conn){
   		die("connection to db failed" . mysqli_error($conn));
	}
?>

