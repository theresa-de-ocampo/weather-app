<?php
	session_start();
	$user_id = $_SESSION["account-verified"];
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	require_once "../models/Friend.php";
	$friend = new Friend();
	$not_friends = $friend->getNotFriends($user_id);
?>
<section id="search-list">
	<h2>Connect</h2>
	<input class="search" type="text" placeholder="Search" />
	<div class="list">
		<?php
		foreach ($not_friends as $not_friend):
			$not_friend_id = $not_friend->user_id;
			$name = $not_friend->fname." ".$not_friend->lname;
		?>
		<div id="<?php echo $not_friend_id; ?>" class="item" data-name="<?php echo $name; ?>">
			<img src="<?php echo "img/profile-pictures/".$not_friend->profile_picture; ?>" />
			<div>
				<div class="name"><?php echo $name; ?></div>
				<i><?php echo $not_friend->location; ?></i>
			</div>
			<div class="actions solo">
				<?php if (is_null($not_friend->status)): ?>
				<button
					type="button" class="main add-friend"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $not_friend_id; ?>">
					Add Friend
				</button>
				<?php else: ?>
				<?php if ($not_friend->from == $user_id): ?>
				<button
					type="button" class="secondary cancel-request"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $not_friend_id; ?>"
					>
					Cancel Request
				</button>
				<?php else: ?>
				<button
					type="button" class="main accept"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $not_friend_id; ?>"
					>
					Accept
				</button>
				<button
					type="button" class="secondary delete"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $not_friend_id; ?>"
					>
					Delete
				</button>
				<?php endif; ?>
				<?php endif; ?>
			</div><!-- .actions.solo -->
		</div><!-- #{friend-id} -->
		<?php endforeach; ?>
	</div><!-- .list -->
</section><!-- #search-list -->