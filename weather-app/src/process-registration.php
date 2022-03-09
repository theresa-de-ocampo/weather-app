<?php
if (isset($_POST["add"])) {
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	$user = new User();
	$user->addUser($_POST);
}