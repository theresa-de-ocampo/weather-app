<?php
	require_once "src/modal.php";
?>
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
	<link rel="stylesheet" type="text/css" href="css/tingle.min.css" />
	<link rel="stylesheet" type="text/css" href="css/modal.css" />
	<link rel="stylesheet" type="text/css" href="css/input.css" />
	<link rel="stylesheet" type="text/css" href="css/login-registration.css" />
	<link rel="stylesheet" type="text/css" href="css/validation.css" />
	<title>WWÜ</title>
</head>
<body>
	<header class="curved"><h1>Welcome</h1></header>
	<form action="src/process-registration.php" method="post" novalidate data-modal="<?php echo $modal_flag; ?>">
		<label for="fname">First Name <span class="required">*</span></label>
		<input id="fname" type="text" name="fname" required />

		<label for="lname">Last Name <span class="required">*</span></label>
		<input id="lname" type="text" name="lname" required />
		
		<label for="contact-no">Contact No. <span class="required">*</span></label>
		<input id="contact-no" type="text" name="contact-no" required />

		<label for="location">City & Country Code <span class="required">*</span></label>
		<input id="location" type="text" name="location" required />

		<label for="email">Email <span class="required">*</span></label>
		<input id="email" type="email" name="email" required />

		<label for="password">Password <span class="required">*</span></label>
		<input id="password" type="password" name="password" required />

		<label for="confirm-password">Confirm Password <span class="required">*</span></label>
		<input id="confirm-password" type="password" name="confirm-password" required />

		<input id="show-passwords" type="checkbox" class="show-password" />
		<label for="show-passwords" class="inline show-password-label">Show Passwords</label>

		<a href="login.html">Already have an account?</a>
		<button id="sign-up" type="submit" name="add" class="solo">Sign Up</button>
	</form>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/tingle.min.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/open-weather-map.js"></script>
	<script src="js/show-password.js"></script>
	<script src="js/validation.js"></script>
	<script src="js/register.js"></script>
</body>
</html>