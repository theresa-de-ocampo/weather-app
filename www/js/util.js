function strToTitleCase(str) {
	str = str.toLowerCase();
	return str.replace(/(?:^|\s)\w/g, function(match) {
		return match.toUpperCase();
	});
}	