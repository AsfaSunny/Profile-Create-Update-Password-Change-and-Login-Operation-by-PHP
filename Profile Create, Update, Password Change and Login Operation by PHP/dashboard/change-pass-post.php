<?php 
session_start();
require_once('../db/dbconnect.php');
//print_r($_POST);

$Main_Eamil = $_POST['password_email'];
$OLD_pass = $_POST['main_pass'];
$NEW_pass = $_POST['new_pass'];
$CONFIRM_pass = $_POST['confirm_pass'];




$uppercase = preg_match('@[A-Z]@', $NEW_pass);
$lowercase = preg_match('@[a-z]@', $NEW_pass);
$numcase    = preg_match('@[0-9]@', $NEW_pass);
//$pattern = ;
$charcase = preg_match('/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\\\=\_+\-¬\`\]]/', $NEW_pass);

if (strlen($NEW_pass) >= 8 && $uppercase == 1 && $lowercase == 1 && $numcase == 1 && $charcase == 1) 
{

	if ($NEW_pass == $CONFIRM_pass) 
	{

		if ($NEW_pass != $OLD_pass) 
		{

			$OLD_pass_check = "SELECT COUNT(*) AS totalUSER FROM `registration_table` WHERE `email`='$Main_Eamil' AND `password`='$OLD_pass'";
			$Password_Find = mysqli_query($db_connect, $OLD_pass_check);
			$after_assoc = mysqli_fetch_assoc($Password_Find);

			if ($after_assoc['totalUSER'] == 1) 
			{
				$Update_Pass_Query = "UPDATE `registration_table` SET `password`='$NEW_pass' WHERE `email`='$Main_Eamil'";
				$Password_DB = mysqli_query($db_connect, $Update_Pass_Query);
				
				$_SESSION['change_pass_success'] = "Passsword Changed successfully!!";
				header('location: change-pass.php');
			}
			else
			{
				$_SESSION['change_pass_error'] = "Enter Your Correct Password";
				header('location: change-pass.php');
			}
		}
		else
		{
			$_SESSION['change_pass_error'] = "New and Old Password must be different!!!";
			header('location: change-pass.php');
		}
	}
	else
	{
		$_SESSION['change_pass_error'] = "New Password didn't match";
		header('location: change-pass.php');
	}
}
else
{
	$_SESSION['change_pass_error'] = "A passsword must contain 8 character with atleast 1 uppercase, 1 lowercase, 1 number and 1 special character";
	header('location: change-pass.php');
}


?>