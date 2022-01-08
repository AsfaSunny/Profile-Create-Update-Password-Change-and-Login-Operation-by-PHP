<?php 
	session_start(); 
	require_once('../db/dbconnect.php');


	$LogIn_Email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$LogIn_Pass = $_POST['password'];


	if ($LogIn_Email == NULL || $LogIn_Pass == NULL) {
		$_SESSION['Log_err'] = 'Without filling the field you cannot proceed!!!';
		header('location: login.php');
	}
	else
	{
		$login_query = "SELECT COUNT(*) AS total_logers FROM registration_table WHERE `email` = '$LogIn_Email' AND `password` = '$LogIn_Pass'";

		$login_RESULT = mysqli_query($db_connect, $login_query);
		$RESULT_asso = mysqli_fetch_assoc($login_RESULT);
		// print_r($RESULT_asso);
		if ($RESULT_asso['total_logers'] == 1) {
			$_SESSION['View_Email'] = $LogIn_Email;
			$_SESSION['status'] = 'yes';
			header('location: ../dashboard/dashboard.php');
			// $_SESSION['View_Email'] = $LogIn_Email; (eamil result won't show if this define under header())
		}
		else
		{
			$_SESSION['Log_err'] = 'Unknown Details or wrong password';
			header('location: login.php');
		}
	}


?>