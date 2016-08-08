<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	unset($_SESSION['user']);
	$_SESSION['Message'] = 'Thank you. Good Bye';
	header('location:login.php');
}
?>