<?php
	require_once "src/header.php";
	if (isset($_GET["friend-id"])) {
		$friend_id = $_GET["friend-id"];
		require_once "config/config.php";
		require_once "lib/database-handler.php";
		require_once "models/User.php";
		$user = new User();
		$f = $user->getUser($friend_id);
	}
	else {
		echo "<script>alert('Sorry, something went wrong!');</script>";
		echo "<script>window.location.href = 'friends.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Theresa De Ocampo" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/outer-navigation-menu.css" />
	<link rel="stylesheet" type="text/css" href="css/weather-status.css" />
	<link rel="stylesheet" type="text/css" href="css/one-person-page.css" />
	<link rel="stylesheet" type="text/css" href="css/friend.css" />
	<title>WWÜ</title>
</head>
<body>
	<nav id="outer-navigation">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="friends.php" class="active requires-login">Friends</a></li>
			<li><a href="settings.php" class="requires-login">Settings</a></li>
			<li><a href="#">Share</a></li>
		</ul>
	</nav><!-- #outer-navigation -->

	<header>
		<a href="<?php echo $logInLogOut; ?>" class="fas fa-sign-<?php echo $icon; ?>-alt"></a>
		<div class="data">
			<p id="fname" data-user-id="<?php echo $user_id; ?>"><?php echo $fname; ?></p>
			<p id="location"><?php echo $location; ?></p>
		</div><!-- .data -->
		<input id="check-menu" type="checkbox" name="check-menu" />
		<label for="check-menu" class="menu-button"><div class="menu-lines"></div></label>
	</header>

	<main>
		<section id="friend">
			<img src="img/profile-pictures/<?php echo $f->profile_picture; ?>" alt="Profile Picture" />
			<h2><?php echo $f->fname." ".$f->lname; ?></h2>
			<div>
				<span class="status <?php echo str_replace(" ", "-", strtolower($f->status)); ?>">&#9673;</span>
				<?php echo $f->status; ?>
			</div>

			<div id="friend-data">
				<div class="item">
					<div class="label">Location</div>
					<div id="friend-location" class="value"><?php echo $f->location; ?></div>
				</div><!-- .item -->
				<div class="item">
					<div class="label">Temperature</div>
					<div id="temperature" class="value"><span class="value"></span>&#176; <span class="unit"></span></div>
				</div><!-- .item -->
				<div class="item">
					<div class="label">Weather</div>
					<div id="description" class="value"></div>
				</div><!-- .item -->
				<div class="item">
					<div class="label">Contact No.</div>
					<div class="value"><a href="tel:<?php echo $f->contact_no; ?>"><?php echo $f->contact_no; ?></a></div>
				</div><!-- .item -->
				<div class="item">
					<div class="label">Email</div>
					<div class="value"><a href="mailto:<?php echo $f->email; ?>"><?php echo $f->email; ?></a></div>
				</div><!-- .item -->
			</div><!-- #friend-data -->
		</section><!-- #friend -->
	</main>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/open-weather-map.js"></script>
	<script src="js/util.js"></script>
	<script src="js/outer-navigation.js"></script>
	<script src="js/friend.js"></script>
</body>
</html>