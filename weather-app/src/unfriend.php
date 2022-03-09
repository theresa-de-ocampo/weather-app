<?php
if (isset($_POST["user-id"]) && isset($_POST["friend-id"])) {
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	require_once "../models/Friend.php";
	$user_id = $_POST["user-id"];
	$friend_id = $_POST["friend-id"];
	$friend_name = $_POST["friend-name"];
	$friend = new Friend();
	$friend->unfriend($user_id, $friend_id, $friend_name);
}