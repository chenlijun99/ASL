$(function() {

	$('login-form form').submit(function($event) {
		$.ajax({
			type: "POST",
			data: this,
			url: "/apis/login.php",
			success: function(result, textStatus, request) {
			},
			error: function(result) {
			}
		});
		$event.preventDefault();
	});

	$('login-form .ui.form')
		.form({
			fields: {
				email: {
					identifier  : 'email',
					rules: [
						{
							type   : 'empty',
							prompt : 'Si prega di inserire l\'email'
						},
						{
							type   : 'email',
							prompt : 'Si prega di inserire un email valido'
						}
					]
				},
				password: {
					identifier  : 'password',
					rules: [
						{
							type   : 'empty',
							prompt : 'Si prega di inserire la password'
						}
					]
				}
			}
		})
	;
});
