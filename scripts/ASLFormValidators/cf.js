$(function() {
	$.fn.form.settings.rules.cf = function(cf) {
		if (!/^[0-9A-Z]{16}$/.test(cf))
			return false;

		var map = [1, 0, 5, 7, 9, 13, 15, 17, 19, 21, 1, 0, 5, 7, 9, 13, 15, 17,
			19, 21, 2, 4, 18, 20, 11, 3, 6, 8, 12, 14, 16, 10, 22, 25, 24, 23];
		var s = 0;
		for (var i = 0; i < 15; i++) {
			var c = cf.charCodeAt(i);
			if (c < 65)
				c = c - 48;
			else
				c = c - 55;
			if (i % 2 === 0)
				s += map[c];
			else
				s += c < 10 ? c : c - 10;
		}
		var atteso = String.fromCharCode(65 + s % 26);
		return atteso === cf.charAt(15);
	};
});
