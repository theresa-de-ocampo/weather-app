// jshint esversion: 6
$("main").load("data/friends.php");

$("#requests-link").on("change", function() {
	if (this.checked) {
		$("section").remove();
		$("main").load("data/friend-requests.php");
	}
});

$("#friends-link").on("change", function() {
	if (this.checked) {
		$("section").remove();
		$("main").load("data/friends.php");
	}
});

$("body").on("click", "#friend-requests button", function() {
	let url;
	let $button = $(this);
	let friendId = $button.attr("data-friend-id");
	if ($button.hasClass("main"))
		url = "src/accept-friend-request.php";
	else
		url = "src/delete-friend-request.php";

	$.ajax({
		url: url,
		method: "post",
		data: {from: friendId, to: $button.attr("data-user-id")}
	})
	.done(function(status) {
		if (status)
			$("#" + friendId).remove();
		else
			alert("Sorry, an unexpected error occurred.");
	});
});