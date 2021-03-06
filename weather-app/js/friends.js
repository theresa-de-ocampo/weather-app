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
$("body").on("click", "#get-started", function() {
	$("#search-link").trigger("click");
});


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
	let successMessage;
	if ($button.hasClass("main")) {
		url = "src/accept-friend-request.php";
		successMessage = "Friend request was successfully accepted";
	}
	else {
		url = "src/delete-friend-request.php";
		successMessage = "Friend request was successfully deleted";
	}

	$.ajax({
		url: url,
		method: "post",
		data: {from: friendId, to: $button.attr("data-user-id")}
	})
	.done(function(status) {
		if (status) {
			$("#" + friendId).remove();
			createModal(`<div class='info'>${successMessage}</div>`);
		}
		else
			createModal("<div class='info'>Sorry, an unexpected error occurred.</div>");
	});
});

/* ----------------------- Search List ----------------------- */
$("#search-link").on("change", function() {
	if (this.checked) {
		$("section").remove();
		$("main").load("data/search-list.php", function() {
			let $potentialFriends = $("#search-list .item");
			let potentialFriendsCache = [];

			$potentialFriends.each(function() {
				potentialFriendsCache.push({
					element: $(this),
					name: $(this).attr("data-name").trim().toLowerCase()
				});
			});

			$("body").on("input", "#search-list .search", function() {
				filterSearch(this, potentialFriendsCache);
			});
		});
	}
});

$("body").on("click", "#search-list button", function() {
	let url, from, to, newStatus;
	let $button = $(this);
	let userId = $button.attr("data-user-id");
	let potentialFriendId = $button.attr("data-not-friend-id");
	let successMessage;

	if ($button.hasClass("add-friend")) {
		url = "src/send-friend-request.php";
		from = userId;
		to = potentialFriendId;
		newStatus = "Cancel Request";
	}
	else if ($button.hasClass("cancel-request")) {
		url = "src/delete-friend-request.php";
		from = userId;
		to = potentialFriendId;
		newStatus = "Add Friend";
	}
	else if ($button.hasClass("delete")) {
		url = "src/delete-friend-request.php";
		from = potentialFriendId;
		to = userId;
		newStatus = "Add Friend";
	}
	else {
		url = "src/accept-friend-request.php";
		from = potentialFriendId;
		to = userId;
		newStatus = "Deleted";
		successMessage = "Friend request was successfully accepted!";
	}

	$.ajax({
		url: url,
		method: "post",
		data: {from: from, to: to}
	})
	.done(function(status) {
		if (status) {
			switch (newStatus) {
				case "Cancel Request":
					$("#" + potentialFriendId + " .actions.solo").html(`
						<button
							type="button" class="secondary cancel-request"
							data-user-id="${userId}" data-not-friend-id="${potentialFriendId}"
							>
							Cancel Request
						</button>
					`);
					break;
				case "Add Friend":
					$("#" + potentialFriendId + " .actions.solo").html(`
						<button
							type="button" class="main add-friend"
							data-user-id="${userId}" data-not-friend-id="${potentialFriendId}"
							>
							Add Friend
						</button>
					`);
					break;
				case "Deleted":
					$("#" + potentialFriendId).remove();
					createModal(`<div class='info'>${successMessage}</div>`);
					break;
				default:
					createModal("<div class='info'>Sorry, an unexpected error occurred.</div>");
			}
		}
		else
			createModal("<div class='info'>Sorry, an unexpected error occurred.</div>");
	});
});