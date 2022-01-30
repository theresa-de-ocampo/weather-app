// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	$("#temperature .value").text(Math.round(data.current.temp));
	$("#temperature .unit").text(window[unit].temperature);
	$("#description").text(strToTitleCase(data.current.weather[0].description));
}

openWeatherMap.directGeocoding($("#friend-location").text())
.then(data => {
	const unit = $("header").attr("data-unit");
	openWeatherMap.fetchWeather(data[0].lat, data[0].lon, unit);
});