<?php
	session_start();
	$user_id = $_SESSION["account-verified"];
	require_once "../config/config.php";
	require_once "../lib/database-handler.php";
	require_once "../models/User.php";
	require_once "../models/Friend.php";
	$friend = new Friend();
	$friends = $friend->getFriends($user_id);
?>
<section id="friends">
	<h2>Friends</h2>
	<input class="search" type="text" placeholder="Search" />
	<div class="list">
		<?php
		foreach ($friends as $f):
			if ($f->from == $user_id)
				$friend_id = $f->to;
			else
				$friend_id = $f->from;

			$f = $friend->getUser($friend_id);
		?>
		
		<a id="<?php echo $friend_id; ?>" class="item" href="friend.php?friend-id=<?php echo $friend_id; ?>">
			<img src="<?php echo "img/profile-pictures/".$f->profile_picture; ?>" />
			<div class="name"><?php echo $f->fname." ".$f->lname; ?></div>
			<div class="status <?php echo str_replace(" ", "-", strtolower($f->status)); ?>">&#9673;</div>
		</a><!-- #friend-id.item -->
		<?php endforeach; ?>
	</div><!-- .list -->
</section><!-- #friends -->