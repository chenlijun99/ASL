(function() {
'use strict';
	$(function() {
		$("school-form-dialog").on("school-form-dialog:success", function($event, data) {
			$("school-table .items").append(
				'<div class="item">' +
					'<div class="content">' +
						'<a class="header" href="?id=' + data.id + '">' + data.name + '</a>' +
						'<div class="description">' +
							'<p>' + data.description + '</p>' +
						'</div>' +
					'</div>' +
				'</div>'
			);
		});
	});
})();

