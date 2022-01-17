// jshint esversion: 6
const userId = $("#fname").attr("data-user-id");
if (userId !== "")
	openWeatherMap.fetchWeatherByCityAndCountry($("#location").text());
else
	openWeatherMap.initialize();

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

$("nav ul li a").on("click", function(){
	$("nav ul li a").removeClass("active");
	$(this).addClass("active");
});