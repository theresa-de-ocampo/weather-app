<?php
if (isset($_POST["submit"])) {
	session_start();
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	$email = $_POST["email"];
	$password = $_POST["password"];
	$user = new User();
	$account = $user->confirmUser($email);
	if ($account) {
		if (password_verify($password, $account->password)) {
			$_SESSION["account-verified"] = $account->user_id;
			$path = "../index.php";
		}
		else {
			$message = "The password you entered is incorrect!";
			$path = "../login.html";
		}
	}
	else {
		$message = "It seems like you don\'t have an account, please register first.";
		$path = "../register.html";
	}

	if (isset($message))
		echo "<script>alert('$message');</script>";
	echo "<script>window.location.replace('$path');</script>";
}