(function(global) {
'use strict';

	global.ASLHelper = {
		getProperty: function(obj, path) {
			// inspired from https://stackoverflow.com/questions/6491463/accessing-nested-javascript-objects-with-string-key
			if (typeof obj === "object") {
				// convert indexes to properties
				path = path.replace(/\[(\w+)\]/g, '.$1');
				// strip a leading dot
				path = path.replace(/^\./, '');

				var properties = path.split('.');
				for (var i = 0, length = properties.length; i < length; ++i) {
					var property = properties[i];
					if (obj.hasOwnProperty(property)) {
						obj = obj[property];
					} else {
						return;
					}
				}
				return obj;
			}

		}
	};
})(window);
