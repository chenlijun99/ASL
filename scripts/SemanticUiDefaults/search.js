(function() {
'use strict';
	$.fn.search.settings.templates.message =
		function(message, type) {
			var html = '';
			if (message !== undefined && type !== undefined) {
				html +=  '' + '<div class="message ' + type + '">' ;
				// message type
				if (type == 'empty') {
					html += '' +
						'<div class="header">Nessun risultato</div class="header">' +
						'<div class="description">' + message + '</div class="description">';
				} else {
					html += ' <div class="description">' + message + '</div>';
				}
				html += '</div>';
			}
			return html;
		};
})();
