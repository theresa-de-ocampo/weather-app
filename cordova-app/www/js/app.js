// jshint esversion: 6
document.addEventListener("deviceready", onDeviceReady, false);
function onDeviceReady() {
	if (navigator.connection.type == Connection.NONE)
		$("p").text("This application requires internet connection.");
	else
		cordova.InAppBrowser.open("https://weatheringwithu.000webhostapp.com/", "_self", "location=no,zoom=no,toolbar=no");
}