// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	if (setLocation) {
		openWeatherMap.reverseGeocoding(data.lat, data.lon)
		.then(data => {
			$("#location").text(data[0].name + ", " + data[0].country);
		});
	}
	
	const url =
		`https://openweathermap.org/weathermap?basemap=map&cities=true&layer=temperature&lat=${data.lat}&lon=${data.lon}&zoom=5`;
	const $map = $("iframe");
	$map.prop("src", url);

	$map.on("load", function() {
		$("#loading").css("display", "none");
	});
}

openWeatherMap.load();