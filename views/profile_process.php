<?php

include_once '../vendor/autoload.php';
use App\registration\Profile;


$obj = new Profile();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$obj->prepare($_POST)->store();
} else {
	$_SESSION['Message'] = 'Opps, Something was wrong.';
	header('locaton:profile.php');
}


?>