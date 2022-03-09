// jshint esversion: 6
function validate(e, withCustomCheck) {
	const completeFlag = completeInput();
	let customFlag = true;
	if (withCustomCheck)
		customFlag = customCheck();
	let noError = completeFlag && customFlag;

	if (!noError){
		e.preventDefault();
		navigator.vibrate(2000);
		$firstErrorEl = $(".error").first();
		$("html, body").animate({
			scrollTop: $firstErrorEl.offset().top - 65
		}, 1000);
		$firstErrorEl.focus();
	}
}

function customCheck() {
	const emailFlag = emailCheck();
	const passwordFlag = passwordCheck();
	const confirmPasswordFlag = confirmPasswordCheck();
	return emailFlag && passwordFlag && confirmPasswordFlag;
}

function customCheckHandler($field, flag, message, passwordValue = "flag") {
	if ($field.val() && passwordValue){
		if (flag)
			return removeErrorMessage($field);
		else
			return showErrorMessage($field, message);
	}
	else {
		const $target = $field.next("." + $field.attr("id"));
		if ($target.hasClass($field.attr("id"))) {
			removeErrorMessage($field);
			if (!$field.val())
				showErrorMessage($field, "Field is required!");
		}
		else
			return false;
	}
}

function emailCheck() {
	const $email = $("#email");
	const regex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	const flag = regex.test($email.val());
	return customCheckHandler($email, flag, "Please enter a valid email.");
}

function passwordCheck() {
	const $password = $("#password");
	const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@\-#\s$%^&*]{8,}$/;
	const flag = regex.test($password.val());
	return customCheckHandler($password, flag, "Password should be a minimum of 8 characters consisting of at least one uppercase letter, one lowercase letter, and a digit.");
}

function confirmPasswordCheck() {
	let flag = true;
	const $password = $("#password");
	const $confirmPassword = $("#confirm-password");
	if ($password.val() != $confirmPassword.val())
		flag = false;
	return customCheckHandler($confirmPassword, flag, "Passwords do not match", $password.val());
}

function completeInput() {
	let completeFlag = true;
	$requiredFields = $("input:not([type='checkbox']), textarea, select").filter("[required]:visible");
	for (let field of $requiredFields) {
		if (!$(field).val())
			completeFlag = showErrorMessage($(field), "Field is required!");
		else
			removeErrorMessage($(field));
	}

	return completeFlag;
}

function showErrorMessage($field, message) {
	if (!$("." + $field.attr("id")).length) {
		var $errorContainer = $("<p class='error " + $field.attr("id") + "'></p>").text(message);
		var $iconMessage = $("<i class='fas fa-exclamation-circle'></i>");
		$errorContainer.prepend($iconMessage);
		$errorContainer.insertAfter($field);
	}
	return false;
}

function removeErrorMessage($field) {
	const $target = $field.next("." + $field.attr("id"));
	if ($target)
		$target.remove();
	return true;
}