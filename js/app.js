// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	if (setLocation)
		$("#location").text(data.name + ", " + data.sys.country);

	// Quick Weather Section
	$("#temperature .value").text(Math.round(data.main.temp));
	$("#temperature .unit").text(window[unit].temperature);
	$("#description").text(strToTitleCase(data.weather[0].description));

	// Weather Details Section
	$("#sunrise").text(window.moment(data.sys.sunrise * 1000).format("hh:mm a"));
	$("#sunset").text(window.moment(data.sys.sunset * 1000).format("hh:mm a"));
	$("#humidity .value").text(data.main.humidity);
	$("#wind-speed .value").text(data.wind.speed);
	$("#wind-speed .unit").text(window[unit].wind);
	$("#pressure .value").text(data.main.pressure);
	$("#visibility .value").text(data.visibility / 1000);
}

const userId = $("#fname").attr("data-user-id");
if (userId !== "")
	openWeatherMap.fetchWeatherByCityAndCountry($("#location").text());
else
	openWeatherMap.initialize();