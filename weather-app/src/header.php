<?php
	session_start();
	$unit = "metric";
	if (isset($_SESSION["account-verified"])) {
		$user_id = $_SESSION["account-verified"];
		require_once "config/config.php";
		require_once "lib/database-handler.php";
		require_once "models/User.php";
		$user = new User();
		$account = $user->getUser($user_id);
		$fname = $account->fname;
		$location = $account->location;
		$icon = "out";
		$logInLogOut = "src/sign-out.php";
		$unit = strtolower($account->unit);
	}
	else {
		$user_id = $location = "";
		$fname = "wwü";
		$icon = "in";
		$logInLogOut = "login.php";
	}
?>