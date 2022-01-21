// jshint esversion: 6
function filterSearch(searchBox, cache) {
	let query = $(searchBox).val().trim().toLowerCase();
	let i;

	cache.forEach(function(friend) {
		/* 	If search box becomes empty, index automatically becomes true.
			So all of the elements in cache will be displayed. 
		*/
		i = 0;
		if (query)
			i = friend.name.indexOf(query);


		if (i === -1)
			friend.element.css("display", "none");
		else
			friend.element.css("display", "");
	});
}

/* --------------------------- Friends --------------------------- */
$("#friends-link").on("change", function() {
	if (this.checked) {
		$("section").remove();
		$("main").load("data/friends.php", function() {
			let $friends = $("#friends .item");
			let friendsCache = [];

			$friends.each(function() {
				friendsCache.push({
					element: $(this),
					name: $(this).attr("data-name").trim().toLowerCase()
				});
			});

			$("body").on("input", "#friends .search", function() {
				filterSearch(this, friendsCache);
			});
		});
	}
});
$("#friends-link").trigger("click");


/* ----------------------- Friend Requests ----------------------- */
$("#requests-link").on("change", function() {
	if (this.checked) {
		$("section").remove();
		$("main").load("data/friend-requests.php", function() {
			let $friendRequests = $("#friend-requests .item");
			let friendRequestsCache = [];

			$friendRequests.each(function() {
				friendRequestsCache.push({
					element: $(this),
					name: $(this).attr("data-name").trim().toLowerCase()
				});
			});

			$("body").on("input", "#friend-requests .search", function() {
				filterSearch(this, friendRequestsCache);
			});
		});
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