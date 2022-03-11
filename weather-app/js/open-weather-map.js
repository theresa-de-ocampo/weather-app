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
	"apiKey": "insert your API key here",
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
			createModal(`
				<div class='info'>
					<span class='error'>[ERROR]</span> Code: ${error.code} <br />
					${error.message}
				</div>
			`);
		}
	},
	load: function() {
		if (userId !== "") {
			this.directGeocoding($("#location").text())
			.then(data => {
				if (jQuery.isEmptyObject(data))
					window.location.replace("settings.php?modal=location");
				const unit = $("header").attr("data-unit");
				this.fetchWeather(data[0].lat, data[0].lon, unit);
			});
		}
		else
			this.initialize();
	}
};
