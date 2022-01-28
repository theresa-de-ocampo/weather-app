// jshint esversion: 6
function displayWeather(data, unit, setLocation) {
	if (setLocation) {
		openWeatherMap.reverseGeocoding(data.lat, data.lon)
		.then(data => {
			$("#location").text(data[0].name + ", " + data[0].country);
		});
	}
	const temperatureUnit = window[unit].temperature;

	// Quick Weather Section
	$("#temperature .value").text(Math.round(data.current.temp));
	$("#temperature .unit").text(temperatureUnit);
	$("#description").text(strToTitleCase(data.current.weather[0].description));

	// Weather Details Section
	$("#sunrise").text(window.moment(data.current.sunrise * 1000).format("hh:mm a"));
	$("#sunset").text(window.moment(data.current.sunset * 1000).format("hh:mm a"));
	$("#humidity .value").text(data.current.humidity);
	$("#wind-speed .value").text(data.current.wind_speed);
	$("#wind-speed .unit").text(window[unit].wind);
	$("#pressure .value").text(data.current.pressure);
	$("#visibility .value").text(data.current.visibility / 1000);

	// Hourly Forecast
	let hourData;
	const labels = [];
	const temperature = [];
	for (let i = 0; i < 5; i++) {
		hourData = data.hourly[i];
		labels.push([
			window.moment(hourData.dt * 1000).format("hh:mm a"),
			strToTitleCase(hourData.weather[0].description)
		]);
		temperature.push(Math.round(hourData.temp));
	}

	const context = $("#chart")[0].getContext("2d");
	let delayed;
	let gradient = context.createLinearGradient(0, 0, 0, 200);
	gradient.addColorStop(0, "#f8dba4");
	gradient.addColorStop(1, "#ff9f43");

	const hourlyData = {
		labels,
		datasets: [{
			label: "Hourly Forecast",
			data: temperature,
			fill: true,
			backgroundColor: gradient,
			borderColor: "#e5e5e5",
			pointBackgroundColor: "#ec6e4c",
			tension: 0.5
		}]
	};

	const config = {
		type: "line",
		data: hourlyData,
		options: {
			radius: 4,
			hitRadius: 30,
			hoverRadius: 7,
			responsive: true,
			maintainAspectRatio: false,
			scales: {
				y: {
					ticks: {
						callback: function(value) {
							return value + "° " + temperatureUnit;
						}
					}
				}
			},
			animation: {
				onComplete: () => {
					delayed = true;
				},
				delay: (context) => {
					let delay = 0;
					if (context.type === "data" && context.mode === "default" && !delayed)
						delay = context.dataIndex * 300 + context.datasetIndex * 100;
					return delay;
				}
			},
			plugins: {
				legend: {
					display: false
				}
			}
		}
	};
	const chart = new Chart(context, config);

	// Daily Forecast
	let forecastItems = "";
	data.daily.forEach(function(day, i) {
		if (i == 0)
			$("#today").html(`
				<h2>Daily Forecast &#8594;</h2>
				<div>
				<img src="http://openweathermap.org/img/wn//${day.weather[0].icon}@4x.png" alt="Weather Icon" class="icon" />
				<div class="data">
					<div class="day">${window.moment(day.dt * 1000).format("dddd")}</div>
					<div class="temperature">Day - ${day.temp.day}&#176; ${temperatureUnit}</div>
					<div class="temperature">Night - ${day.temp.night}&#176; ${temperatureUnit}</div>
				</div><!-- .data -->
				</div>
			`);
		else
			forecastItems += `
				<div class="forecast-item">
					<div class="day">${window.moment(day.dt * 1000).format("dddd")}</div>
					<img src="http://openweathermap.org/img/wn/${day.weather[0].icon}@2x.png" alt="Weather Icon" class="icon" />
					<div class="temperature">Day -  ${day.temp.day}&#176; ${temperatureUnit}</div>
					<div class="temperature">Night - ${day.temp.night}&#176; ${temperatureUnit}</div>
				</div><!-- .forecast-item -->
			`;
	});
	$("#forecast-wrapper").html(forecastItems);
}

if (userId !== "") {
	openWeatherMap.directGeocoding($("#location").text())
	.then(data => {
		openWeatherMap.fetchWeather(data[0].lat, data[0].lon);
	});
}
else
	openWeatherMap.initialize();