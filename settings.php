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
	<link rel="stylesheet" type="text/css" href="css/image-upload.css" />
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
			<form action="src/edit-user.php" method="post" enctype="multipart/form-data" novalidate>
				<div id="drop-area">
					<img id="profile-picture" src="img/profile-pictures/<?php echo $u->profile_picture; ?>" />
				</div><!-- #drop-area -->
				<input id="profile-picture" type="file" name="profile-picture" />

				<label for="status">Status <span class="required">*</span></label>
				<select id="status" name="status" data-value="<?php echo $u->status; ?>">
					<option value="Safe">Safe</option>
					<option value="Moderately Affected">Moderately Affected</option>
					<option value="Severely Affected">Severely Affected</option>
				</select>

				<label for="unit">Unit <span class="required">*</span></label>
				<select id="unit" name="unit" data-value="<?php echo $u->unit; ?>">
					<option value="Metric">Metric</option>
					<option value="Imperial">Imperial</option>
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

				<input id="show-passwords" type="checkbox" class="show-password" />
				<label for="show-passwords" class="inline show-password-label">Show Passwords</label>

				<input id="id" type="hidden" name="id" readonly value="<?php echo $user_id; ?>" />
				<button id="save" type="submit" name="save" class="solo">Save</button>
			</form>
		</section><!-- #settings -->
	</main>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/outer-navigation.js"></script>
	<script src="js/show-password.js"></script>
	<script src="js/validation.js"></script>
	<script src="js/image-upload.js"></script>
	<script src="js/settings.js"></script>
</body>
</html>