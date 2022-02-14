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
	fetchWeather: function(latitude, longitude, unit = "metric", setLocation = false) {
		fetch(
			`https://api.openweathermap.org/data/2.5/onecall?lat=${latitude}&lon=${longitude}&exclude=minutely&units=${unit}&appid=${this.apiKey}`
		)
		.then(response => response.json())
		.then(data => displayWeather(data, unit, setLocation));
	},
	directGeocoding: function(location) {
		return fetch(`https://api.openweathermap.org/geo/1.0/direct?q=${location}&appid=${this.apiKey}`)
		.then(response => response.json())
		.then(data => { return data; });
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
			that.fetchWeather(position.coords.latitude, position.coords.longitude, "metric", true);
		}

		function onError(error) {
			alert(
				"Code: " + error.code + "\n" +
				"Message: " + error.message + "\n"
			);
		}
	},
	load: function() {
		if (userId !== "") {
			this.directGeocoding($("#location").text())
			.then(data => {
				if (jQuery.isEmptyObject(data)) {
					alert("[ERROR] Non-existent city! Please change your location.");
					window.location.replace("settings.php");
				}
				const unit = $("header").attr("data-unit");
				this.fetchWeather(data[0].lat, data[0].lon, unit);
			});
		}
		else
			this.initialize();
	}
};