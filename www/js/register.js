
// jshint esversion: 6
function generateId() {
	const now = new Date();
	const components = [
		now.getFullYear(),
		now.getMonth() + 1,
		now.getDate(),
		now.getHours(),
		now.getMinutes(),
		now.getSeconds(),
		now.getMilliseconds()
	];
	return components.join("");
}

const options = { maximumAge: 3000, timeout: 5000, enableHighAccuracy: true };
navigator.geolocation.getCurrentPosition(onSuccess, () => {}, options);

function onSuccess(position) {
	openWeatherMap.reverseGeocoding(position.coords.latitude, position.coords.longitude)
	.then(data => {
		$("#location").val(data[0].name + ", " + data[0].country);
	});
}

$("#show-passwords").on("click", toggleVisibility);