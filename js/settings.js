// jshint esversion: 6
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