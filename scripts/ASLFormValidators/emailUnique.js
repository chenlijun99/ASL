$(function() {
	$.fn.form.settings.rules.emailUnique = function(email) {
		var res = true;
		$.ajax({
			async : false,
			url: '/apis/user/emailUnique.php',
			type : "POST",
			data : {
				email : email
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
