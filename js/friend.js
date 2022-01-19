// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	$("#temperature .value").text(Math.round(data.main.temp));
	$("#temperature .unit").text(window[unit].temperature);
	$("#description").text(strToTitleCase(data.weather[0].description));
}

openWeatherMap.fetchWeatherByCityAndCountry($("#friend-location").text());