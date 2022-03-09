// jshint esversion: 6
const modalFlag = $("main").attr("data-modal");
if (modalFlag == "location")
	createModal(`<div class='info'><span class='error'>[ERROR]</span> Non-existent city! Please change your location.</div>`);
else if (modalFlag == "success")
	createModal("<div class='info'>Changes were successfully saved!</div>");
else if (modalFlag == "error")
	createModal("<div class='info'>An unexpected error occurred. Please try again later.</div>");

let status = $("#status").attr("data-value");
if (status == "Moderately Affected")
	$("#status option[value='Moderately Affected']").prop("selected", "selected");
else if (status == "Severely Affected")
	$("#status option[value='Severely Affected']").prop("selected", "selected");

let unit = $("#unit").attr("data-value");
if (unit == "Imperial")
	$("#unit option[value='Imperial']").prop("selected", "selected");

$("form").on("submit", function(e) {
	validate(e, true);
});