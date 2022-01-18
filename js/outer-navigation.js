$("#check-menu").on("change", function() {
	if (this.checked) {
		$("nav").css("visibility", "visible");
		$("nav").css("opacity", "1");
	}
	else {
		$("nav").css("visibility", "hidden");
		$("nav").css("opacity", "0");
	}
});

$("nav ul li a").on("click", function(e) {
	$this = $(this);
	if ($this.hasClass("requires-login") && userId === "") {
		e.preventDefault();
		alert("Please log-in first.");
	}
	else {
		$("nav ul li a").removeClass("active");
		$this.addClass("active");
	}
});