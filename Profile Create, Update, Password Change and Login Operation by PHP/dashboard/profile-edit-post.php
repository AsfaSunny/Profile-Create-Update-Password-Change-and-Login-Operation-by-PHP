<?php 
	session_start();
	require_once('../db/dbconnect.php');
	// print_r($_POST);


$profile_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
$profile_email = filter_var($_POST['profile_email'], FILTER_VALIDATE_EMAIL);
$profile_mobile = $_POST['mobile'];

if (strlen($profile_mobile) == 11){
	$query_update = "UPDATE `registration_table` SET `name`= '$profile_name', `mobile`= '$profile_mobile' WHERE `email`= '$profile_email'";
	mysqli_query($db_connect, $query_update);
	header('location: profile.php');
}
else{
	$_SESSION['profile_error'] = "Updated Mobile Number must contain 11 digit!!!";
	header('location: profile-edit.php');
}


?>