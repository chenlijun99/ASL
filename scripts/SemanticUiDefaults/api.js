(function() {
'use strict';
	$.fn.api.settings.beforeSend = function(setting) {
		if (setting.dataType === "json") {
			if (setting.data && setting.data.nodeName === "FORM") {
				setting.data = $(setting.data).serializeJSON();
			}

			setting.data = JSON.stringify(setting.data);
			return setting;
		}
	};
})();
