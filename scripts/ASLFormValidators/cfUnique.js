$(function() {
	$.fn.form.settings.rules.cfUnique = function(cf, role) {
		var res = true;
		$.ajax({
			async : false,
			url: '/apis/profile/cfUnique.php',
			type : "POST",
			data : {
				cf: cf,
				role: role
			},
			success: function() {
				res = false;
			},
			error: function() {
				res = true;
			}
		});

		return res;
	};
});

