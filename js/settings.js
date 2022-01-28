// jshint esversion: 6
let status = $("#status").attr("data-value");
if (status == "Moderately Affected")
	$("#status option[value='moderately-affected']").prop("selected", "selected");
else if (status == "Severely Affected")
	$("#status option[value='severely-affected']").prop("selected", "selected");

let unit = $("#unit").attr("data-value");
if (unit == "Imperial")
	$("#unit option[value='imperial']").prop("selected", "selected");