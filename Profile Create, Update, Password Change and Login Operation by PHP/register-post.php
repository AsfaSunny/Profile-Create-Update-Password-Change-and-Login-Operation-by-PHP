<?php 
	session_start(); //session method or function jeikhane every type of error/success message stored hoye thakbe..
	require_once('db/dbconnect.php');



// if ($user_email) { //eamil validation check
// 	echo "valid email";
// } else {
// 	echo "invalid email";
// } 

$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING); //filter + sanitize kora hocche
$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING); //filter + sanitize kora hocce for reduce special css...
$user_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); //filter + email ke validate kora hocche
$user_mobile = $_POST['mobile'];
$password = $_POST['user_pass'];



$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$numcase    = preg_match('@[0-9]@', $password);
//$pattern = ;
$charcase = preg_match('/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\\\=\_+\-¬\`\]]/', $password);



// if (strlen($password) >= 8 && $uppercase == 1 && $lowercase == 1 && $numcase == 1 && $charcase == 1) {
// 	echo "password added";
// }
// else
// {
// 	echo "password must contain 8 cahracter include atleast one uppercase, one lowercase, one number and one special character";
// }








if ($user_name == NULL || $address == NULL || $user_email == NULL || $user_mobile == NULL || $password == NULL) 
{
	$_SESSION['register_error'] = "Every Field Must filled with info"; //session every message kei stored kore rakhbe
	// echo "aghe textbox gulo puron kor...😠";
	header('location: register-form.php'); //error hoilei abr register form e nia asbe
} 
else 
{
	if (strlen($user_mobile) == 11) { //mobile no. 11 hole entry korbe

		$Email_checking = "SELECT COUNT(*) AS total_user FROM `registration_table` WHERE email = '$user_email'"; // ekoi types er email aghe exist kina checking

		$result = mysqli_query($db_connect, $Email_checking); //query connection
		$assoc_array = mysqli_fetch_assoc($result); //result ke associative array te conversion.......

		if ($assoc_array['total_user'] == 0) { //same email na thakle entry korbe....

			if ($user_email) { //email valid kina check....

				if (strlen($password) >= 8 && $uppercase == 1 && $lowercase == 1 && $numcase == 1 && $charcase == 1) { 
				//password valid kina

					//$encrypt_pass = md5($password); //use this if you want your user pass to more secure and called this in insert

					$insert = "INSERT INTO `registration_table`(`name`, `address`, `email`, `mobile`, `password`) VALUES ('$user_name','$address','$user_email','$user_mobile', '$password' /*(dollar)encrypt_pass*/ )"; //insert query of mysql...
					mysqli_query($db_connect, $insert);
		
					$_SESSION['register_success'] = "Registration success 100% 😊"; //success and heading back to register to shaow the alert
					header('location: register-form.php');

				} else {
					$_SESSION['register_error'] = "Try Again -A password must contain:
					8 character include atleast 1 uppercase, lowercase, number and special character";
					header('location: register-form.php');
				}				
			} else {
				$_SESSION['register_error'] = "Invalid Email";
				header('location: register-form.php');
			}
		} else {
				$_SESSION['register_error'] = "This email had already been registered";
				header('location: register-form.php');
			}
		}
	else
	{
		//echo "register korar aghe valo kore mobile number te shikhe aye bhai";
		$_SESSION['register_error'] = "Where did you find these type of phone number...?? 😒";
		header('location: register-form.php');
	}
}



// $insert = "INSERT INTO `registration_table`(`name`, `address`, `email`, `mobile`, `password`) VALUES ('$user_name','$address','$user_email','$user_mobile','$password')"; //insert query of mysql...

// mysqli_query($db_connect, $insert); //inside the function mysql_query(), first parameter will be database info and second parameter will be query....


?>