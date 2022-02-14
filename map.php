<?php require_once "src/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Theresa De Ocampo" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta 
		http-equiv="Content-Security-Policy"
		content="
			default-src 'self'
				https://api.openweathermap.org/ http://openweathermap.org/img/wn/
				https://openweathermap.org/
				data: gap: https://ssl.gstatic.com;
			media-src 'self';
			style-src 'self' https://fonts.googleapis.com;
			font-src 'self' https://fonts.gstatic.com;
			script-src 'self';" />
	<meta name="format-detection" content="telephone=yes">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/outer-navigation-menu.css" />
	<link rel="stylesheet" type="text/css" href="css/loading.css" />
	<link rel="stylesheet" type="text/css" href="css/map.css" />
	<title>WWÜ</title>
</head>
<body>
	<nav id="outer-navigation">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="friends.php" class="requires-login">Friends</a></li>
			<li><a href="settings.php" class="requires-login">Settings</a></li>
			<li><a href="map.php" class="active">Map</a></li>
		</ul>
	</nav><!-- #outer-navigation -->

	<header data-unit="<?php echo $unit; ?>">
		<a href="<?php echo $logInLogOut; ?>" class="fas fa-sign-<?php echo $icon; ?>-alt"></a>
		<div class="data">
			<p id="display-name" data-user-id="<?php echo $user_id; ?>"><?php echo $fname; ?></p>
			<p id="location"><?php echo $location; ?></p>
		</div><!-- .data -->
		<input id="check-menu" type="checkbox" name="check-menu" />
		<label for="check-menu" class="menu-button"><div class="menu-lines"></div></label>
	</header>

	<section id="map">
		<iframe scrolling="no"></iframe>
	</section><!-- #map -->

	<div id="loading"><img src="img/logo.png" alt="WWÜ" /></div>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/open-weather-map.js"></script>
	<script src="js/outer-navigation.js"></script>
	<script src="js/map.js"></script>
</body>
</html>