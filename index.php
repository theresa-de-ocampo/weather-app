<?php
	session_start();
	if (isset($_SESSION["account-verified"])) {
		$user_id = $_SESSION["account-verified"];
		require_once "config/config.php";
		require_once "lib/database-handler.php";
		require_once "models/User.php";
		$user = new User();
		$account = $user->getUser($user_id);
		$fname = $account->fname;
		$location = $account->location;
		$icon = "out";
	}
	else {
		$user_id = $location = "";
		$fname = "wwü";
		$icon = "in";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Theresa De Ocampo" />
	<meta name="description" content="" />
	<meta 
		http-equiv="Content-Security-Policy"
		content="
			default-src 'self' https://api.openweathermap.org/ data: gap: https://ssl.gstatic.com;
			media-src 'self';
			style-src 'self' https://fonts.googleapis.com;
			font-src 'self' https://fonts.gstatic.com;
			script-src 'self';" />
	<meta name="format-detection" content="telephone=yes">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/media-queries.css" />
	<title>WWÜ</title>
</head>
<body>
	<header>
		<a href="login.html" class="fas fa-sign-<?php echo $icon; ?>-alt"></a>
		<div class="data">
			<p id="fname" data-user-id="<?php echo $user_id; ?>"><?php echo $fname; ?></p>
			<p id="location"><?php echo $location; ?></p>
		</div><!-- .data -->
		<div class="fas fa-ellipsis-v" role="button"></div>
	</header>

	<main>
		<section id="quick-weather">
			<div class="glassmorphism">
				<div id="temperature"><span class="value"></span>&#176; <span class="unit"></span></div>
				<div id="description"></div>
			</div><!-- .glassmorphism -->
		</section><!-- #quick-weather -->

		<section id="weather-details">
			<div class="label">Sunrise & Sunset Time</div>
			<svg viewBox="0 0 500 150">
				<path id="curve" d="M73.2,148.6c4-6.1,65.5-96.8,178.6-95.6c111.3,1.2,170.8,90.3,175.1,97" />
				<text width="500">
					<textPath xlink:href="#curve">----------&#9681;---------------------</textPath>
				</text>
			</svg>
			<div id="sunrise-sunset">
				<div id="sunrise"></div>
				<div id="sunset"></div>
			</div><!-- #sunrise-sunset -->
			<table>
				<tr>
					<th>Humidity</th>
					<th>Wind Speed</th>
				</tr>
				<tr>
					<td id="humidity"><span class="value"></span> %</td>
					<td id="wind-speed"><span class="value"></span> <span class="unit"></span></td>
				</tr>
				<tr>
					<th>Pressure</th>
					<th>Visibility</th>
				</tr>
				<tr>
					<td id="pressure"><span class="value"></span> hPa</td>
					<td id="visibility"><span class="value"></span> km</td>
				</tr>
			</table>
		</section><!-- #weather-details -->
	</main>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/open-weather-map.js"></script>
	<script src="js/moment-2.29.1.min.js"></script>
	<script src="js/util.js"></script>
	<script src="js/app.js"></script>
</body>
</html>