// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	if (setLocation) {
		openWeatherMap.reverseGeocoding(data.lat, data.lon)
		.then(data => {
			$("#location").text(data[0].name + ", " + data[0].country);
		});
	}

	// Quick Weather Section
	$("#temperature .value").text(Math.round(data.current.temp));
	$("#temperature .unit").text(window[unit].temperature);
	$("#description").text(strToTitleCase(data.current.weather[0].description));

	// Weather Details Section
	$("#sunrise").text(window.moment(data.current.sunrise * 1000).format("hh:mm a"));
	$("#sunset").text(window.moment(data.current.sunset * 1000).format("hh:mm a"));
	$("#humidity .value").text(data.current.humidity);
	$("#wind-speed .value").text(data.current.wind_speed);
	$("#wind-speed .unit").text(window[unit].wind);
	$("#pressure .value").text(data.current.pressure);
	$("#visibility .value").text(data.current.visibility / 1000);
}

const userId = $("#fname").attr("data-user-id");
if (userId !== "") {
	openWeatherMap.directGeocoding($("#location").text())
	.then(data => {
		openWeatherMap.fetchWeather(data[0].lat, data[0].lon);
	});
}
else
	openWeatherMap.initialize();