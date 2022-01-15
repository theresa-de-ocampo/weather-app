// jshint esversion: 6
metric = {
	"temperature": "C", // Celsius
	"wind": "m/s", // meters per second
};

imperial = {
	"temperature": "F", // Farenheit
	"wind": "mph" // miles per hour
};

let openWeatherMap = {
	"apiKey": "364a5841b429913e54511e8bb51ba359",
	fetchWeatherByCityAndCountry: function(location, unit = "metric", setLocation = false) {
		fetch(`https://api.openweathermap.org/data/2.5/weather?q=${location}&units=${unit}&appid=${this.apiKey}`)
		.then(response => response.json())
		.then(data => this.displayWeather(data, unit, setLocation));
	},
	fetchWeatherByCoords: function(latitude, longitude, unit = "metric", setLocation = false) {
		fetch(
			`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=${unit}&appid=${this.apiKey}`
		)
		.then(response => response.json())
		.then(data => this.displayWeather(data, unit, setLocation));
	},
	displayWeather: function(data, unit, setLocation) {
		console.log(data);
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
	},
	reverseGeocoding: function(latitude, longitude) {
		return fetch(`https://api.openweathermap.org/geo/1.0/reverse?lat=${latitude}&lon=${longitude}&appid=${this.apiKey}`)
		.then(response => response.json())
		.then(data => { return data; });
	},
	initialize: function() {
		const that = this;
		const options = { maximumAge: 3000, timeout: 5000, enableHighAccuracy: true };
		navigator.geolocation.getCurrentPosition(onSuccess, onError, options);

		function onSuccess(position) {
			that.fetchWeatherByCoords(position.coords.latitude, position.coords.longitude, "metric", true);
		}

		function onError(error) {
			alert(
				"Code: " + error.code + "\n" +
				"Message: " + error.message + "\n"
			);
		}
	}
};