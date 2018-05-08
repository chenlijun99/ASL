(function() {
'use strict';
	$(function() {
		$("course-form-dialog").on("course-form-dialog:success", function($event, data) {
			$("course-table .items").append(
				'<div class="item">' +
					'<div class="content">' +
						'<a class="header" href="?id=' + data.id + '">' + data.name + '</a>' +
						  '<div class="meta">' +
							'<span class="target-amount">Monte ore: ' + data.targetAmount + ' ore</span>' +
						  "</div>" +
						'<div class="description">' +
							'<p>' + data.description + '</p>' +
						'</div>' +
					'</div>' +
				'</div>'
			);
		});
	});
})();
