<?php

include_once '../vendor/autoload.php';
use App\registration\Registration;


$obj = new Registration();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['username'])) {
		if (preg_match('/^[a-zA-Z0-9]+[.-_]*[a-zA-Z0-9]{5,20}$/', $_POST['username'])) {
			if (!empty($_POST['pass'])) {
				if (strlen($_POST['pass']) > 5 && strlen($_POST['pass']) < 11) {
					if ($_POST['pass'] == $_POST['repass']) {
					if (!empty($_POST['email'])) {
						if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == TRUE) {
							$obj->prepare($_POST)->signup();
						} else {
							$_SESSION['Message'] = 'Please enter a valid email address.';
							header('location:signup.php');
						}
						
					} else {
						$_SESSION['Message'] = 'Email can not be empty.';
						header('location:signup.php');
					}
					
				} else {
					$_SESSION['Message'] = 'Password does not match';
					header('location:signup.php');
				}
				} else {
					$_SESSION['Message'] = 'Password must be 6 to 10';
					header('location:signup.php');
				}
				
				
			} else {
				$_SESSION['Message'] = 'Password can not be empty';
				header('location:signup.php');
			}
			
		} else {
			$_SESSION['Message'] = 'Username must be valid and length should be 6 to 20.';
			header('location:signup.php');
		}
		
	} else {
		$_SESSION['Message'] = 'Username can not be empty.';
		header('location:signup.php');
	}	
} else {
	$_SESSION['Message'] = 'Opps, Something is wrong!';
	header('location:signup.php');
}

?>