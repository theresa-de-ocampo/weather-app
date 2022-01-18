// jshint esversion: 6
const userId = $("#fname").attr("data-user-id");
if (userId !== "")
	openWeatherMap.fetchWeatherByCityAndCountry($("#location").text());
else
	openWeatherMap.initialize();