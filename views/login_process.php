<?php

include_once '../vendor/autoload.php';
use App\registration\Registration;

$obj = new Registration();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['username'])) {
		if (!empty($_POST['pass'])) {
			$obj->prepare($_POST)->login();
		} else {
			$_SESSION['Message'] = 'Password can not be empty';
			header('location:login.php');
		}
		
	} else {
		$_SESSION['Message'] = 'Username can not be empty';
		header('location:login.php');
	}
	
} else {
	$_SESSION['Message'] = 'Opps, Something was wrong.';
	header('location:login.php');
}





?>