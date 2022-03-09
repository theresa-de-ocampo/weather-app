<?php
	session_start();
	$user_id = $_SESSION["account-verified"];
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	require_once "../models/Friend.php";
	$friend = new Friend();
	$friend_ids = $friend->getFriendIds($user_id);
	$users = $friend->getUsers();
?>
<section id="search-list">
	<h2>Connect</h2>
	<input class="search" type="text" placeholder="Search" />
	<div class="list">
		<?php
	 		foreach ($users as $u):
	 			$id = $u->user_id;
	 			if (in_array($id, $friend_ids) || $user_id == $id)
	 				continue;
 				$name = $u->fname." ".$u->lname;
 				$pending_request = $friend->checkForRequest($user_id, $id);
		?>
		<div id="<?php echo $id; ?>" class="item" data-name="<?php echo $name; ?>">
			<img src="<?php echo "img/profile-pictures/".$u->profile_picture; ?>" />
			<div>
				<div class="name"><?php echo $name; ?></div>
				<i><?php echo $u->location; ?></i>
			</div>
			<div class="actions solo">
				<?php if (!$pending_request): ?>
				<button
					type="button" class="main add-friend"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $id; ?>">
					Add Friend
				</button>
				<?php else: ?>
				<?php if ($pending_request->from == $user_id): ?>
				<button
					type="button" class="secondary cancel-request"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $id; ?>"
					>
					Cancel Request
				</button>
				<?php else: ?>
				<button
					type="button" class="main accept"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $id; ?>"
					>
					Accept
				</button>
				<button
					type="button" class="secondary delete"
					data-user-id="<?php echo $user_id; ?>" data-not-friend-id="<?php echo $id; ?>"
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