// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	$("#temperature .value").text(Math.round(data.current.temp));
	$("#temperature .unit").text(window[unit].temperature);
	$("#description").text(strToTitleCase(data.current.weather[0].description));
}

openWeatherMap.directGeocoding($("#friend-location").text())
.then(data => {
	if (jQuery.isEmptyObject(data)) {
		$("#temperature").text("Unknown");
		$("#description").text("Unknown");
		createModal("<div class='info'>Sorry, there was an error in retrieving your friend's location.</div>");
	}
	else {
		const unit = $("header").attr("data-unit");
		openWeatherMap.fetchWeather(data[0].lat, data[0].lon, unit);
	}
});

$("#unfriend").on("click", function(e) {
	e.preventDefault();
	createModal(`
		<div class='info'>
			Are you sure you want to unfriend <b>${$("h2").text()}</b>?
			<button class='main'>Yes</button>
		</div><!-- .info -->
	`);

	$("body").on("click", "button.main", function() {
		$("form").submit();
	});
});