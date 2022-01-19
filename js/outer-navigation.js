$("#check-menu").on("change", function() {
	if (this.checked) {
		$("#outer-navigation").css("visibility", "visible");
		$("#outer-navigation").css("opacity", "1");
	}
	else {
		$("#outer-navigation").css("visibility", "hidden");
		$("#outer-navigation").css("opacity", "0");
	}
});

$("#outer-navigation ul li a").on("click", function(e) {
	$this = $(this);
	if ($this.hasClass("requires-login") && userId === "") {
		e.preventDefault();
		alert("Please log-in first.");
	}
	else {
		$("#outer-navigation ul li a").removeClass("active");
		$this.addClass("active");
	}
});