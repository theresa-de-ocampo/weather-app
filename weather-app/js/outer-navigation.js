// jshint esversion: 6
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

const userId = $("#display-name").attr("data-user-id");
$("#outer-navigation ul li a").on("click", function(e) {
	$this = $(this);
	if ($this.hasClass("requires-login") && userId === "") {
		e.preventDefault();
		createModal("<div class='info'>Please log-in first.</div>");
	}
	else {
		$("#outer-navigation ul li a").removeClass("active");
		$this.addClass("active");
	}
});