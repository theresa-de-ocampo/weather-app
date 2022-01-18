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
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/inner-navigation-menu.css" />
	<title>WWÜ</title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="friends.php" class="active requires-login">Friends</a></li>
			<li><a href="#" class="requires-login">Settings</a></li>
			<li><a href="#">Share</a></li>
		</ul>
	</nav>

	<header>
		<a href="login.html" class="fas fa-sign-<?php echo $icon; ?>-alt"></a>
		<div class="data">
			<p id="fname" data-user-id="<?php echo $user_id; ?>"><?php echo $fname; ?></p>
			<p id="location"><?php echo $location; ?></p>
		</div><!-- .data -->
		<input id="check-menu" type="checkbox" name="check-menu" />
		<label for="check-menu" class="menu-button"><div class="menu-lines"></div></label>
	</header>
	
	<main>
		<nav>
			<footer>
				<input id="requests" type="radio" name="radio">
				<input id="friends" type="radio" name="radio" checked>
				<input id="search" type="radio" name="radio">

				<label for="requests"><i class="fas fa-users"></i></label>
				<label for="friends"><i class="fas fa-home"></i></label>
				<label for="search"><i class="fas fa-search-plus"></i></label>

				<div id="circle"></div>

				<div id="frame">
					<div id="base">
						<span id="indicator"></span>
					</div>
				</div>
			</footer>
		</nav>
	</main>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/outer-navigation.js"></script>
</body>
</html>