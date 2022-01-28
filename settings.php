<?php
	require_once "src/header.php";
	$user_id = $_SESSION["account-verified"];
	$user = new User();
	$u = $user->getUser($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Theresa De Ocampo" />
	<meta name="description" content="" />
	<meta name="format-detection" content="telephone=yes">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/outer-navigation-menu.css" />
	<link rel="stylesheet" type="text/css" href="css/input.css" />
	<link rel="stylesheet" type="text/css" href="css/validation.css" />
	<link rel="stylesheet" type="text/css" href="css/one-person-page.css" />
	<title>WWÜ</title>
</head>
<body>
	<nav id="outer-navigation">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="friends.php" class="requires-login">Friends</a></li>
			<li><a href="settings.php" class="requires-login" class="active">Settings</a></li>
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
		<section id="settings">
			<img src="img/profile-pictures/<?php echo $u->profile_picture; ?>" />

			<label for="status">Status <span class="required">*</span></label>
			<select id="status" name="status" data-value="<?php echo $u->status; ?>">
				<option value="safe">Safe</option>
				<option value="moderately-affected">Moderately Affected</option>
				<option value="severely-affected">Severely Affected</option>
			</select>

			<label for="unit">Unit <span class="required">*</span></label>
			<select id="unit" name="unit" data-value="<?php echo $u->unit; ?>">
				<option value="metric">Metric</option>
				<option value="imperial">Imperial</option>
			</select>

			<label for="fname">First Name <span class="required">*</span></label>
			<input id="fname" type="text" name="fname" value="<?php echo $u->fname; ?>" required />

			<label for="lname">Last Name <span class="required">*</span></label>
			<input id="lname" type="text" name="lname" value="<?php echo $u->lname; ?>" required />
			
			<label for="contact-no">Contact No. <span class="required">*</span></label>
			<input id="contact-no" type="text" name="contact-no" value="<?php echo $u->contact_no; ?>" required />

			<label for="city-country-code">City & Country Code <span class="required">*</span></label>
			<input id="city-country-code" type="text" name="city-country-code" value="<?php echo $u->location; ?>" required />

			<label for="email">Email <span class="required">*</span></label>
			<input id="email" type="email" name="email" value="<?php echo $u->email; ?>" required />

			<label for="password">Password <span class="required">*</span></label>
			<input id="password" type="password" name="password" required />

			<label for="confirm-password">Confirm Password <span class="required">*</span></label>
			<input id="confirm-password" type="password" name="confirm-password" required />

			<button id="save" type="button" name="save" class="solo">Save</button>
		</section><!-- #settings -->
	</main>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/outer-navigation.js"></script>
	<script src="js/settings.js"></script>
</body>
</html>