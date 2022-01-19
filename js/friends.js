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