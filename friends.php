<?php require_once "src/header.php"; ?>
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
	<link rel="stylesheet" type="text/css" href="css/inner-navigation-menu.css" />
	<link rel="stylesheet" type="text/css" href="css/input.css" />
	<link rel="stylesheet" type="text/css" href="css/weather-status.css" />
	<link rel="stylesheet" type="text/css" href="css/friends.css" />
	<title>WWÜ</title>
</head>
<body>
	<nav id="outer-navigation">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="friends.php" class="active requires-login">Friends</a></li>
			<li><a href="#" class="requires-login">Settings</a></li>
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
	
	<main></main>

	<nav id="inner-navigation">
		<footer>
			<input id="requests-link" type="radio" name="radio">
			<input id="friends-link" type="radio" name="radio">
			<input id="search-link" type="radio" name="radio">

			<label for="requests-link"><i class="fas fa-users"></i></label>
			<label for="friends-link"><i class="fas fa-home"></i></label>
			<label for="search-link"><i class="fas fa-search-plus"></i></label>

			<div id="circle"></div>

			<div id="frame">
				<div id="base">
					<span id="indicator"></span>
				</div>
			</div>
		</footer>
	</nav><!-- #inner-navigation -->

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/outer-navigation.js"></script>
	<script src="js/friends.js"></script>
</body>
</html>