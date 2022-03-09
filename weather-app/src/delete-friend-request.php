<?php
if (isset($_POST["from"]) && isset($_POST["to"])) {
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	require_once "../models/Friend.php";
	$from = $_POST["from"];
	$to = $_POST["to"];
	$friend = new Friend();
	echo $friend->deleteFriendRequest($from, $to);
}