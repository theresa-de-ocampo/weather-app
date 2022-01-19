<?php
	session_start();
	$user_id = $_SESSION["account-verified"];
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	$user_id = 1;
	$user = new User();
	$friend_requests = $user->getFriendRequests($user_id);
?>
<section id="friend-requests">
	<h2>Friend Requests</h2>
	<input class="search" type="text" placeholder="Search" />
	<div class="list">
		<?php
		foreach ($friend_requests as $friend_request):
			$friend_id = $friend_request->from;
			$fr = $user->getUser($friend_id);
		?>
		
		<div class="item">
			<img src="<?php echo "img/profile-pictures/".$fr->profile_picture; ?>" />
			<div>
				<div class="name"><?php echo $fr->fname." ".$fr->lname; ?></div>
				<i><?php echo $fr->location; ?></i>
			</div>
			<div class="action solo">
				<button type="button" class="main">Accept</button>
				<button type="button" class="secondary">Delete</button>
			</div><!-- .action -->
		</div>
		<?php endforeach; ?>
	</div><!-- .list -->
</section><!-- #friends -->