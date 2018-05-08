$(function() {
	var form = $('login-form form');

	form
		.form({
			on: 'blur',
			onSuccess: function($event) {
				form.api({
					on: "now",
					method: 'POST',
					data: form[0],
					url: '/apis/user/login.php',
					onSuccess: function() {
						window.location.replace('/pages/dashboard/');
					},
					onFailure: function() {
						toastr.error('Credenziali errate');
					}
				});
				$event.preventDefault();
			},
			fields: {
				email: {
					identifier  : 'email',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci la tua email'
						},
						{
							type   : 'email',
							prompt : 'Email invalido'
						}
					]
				},
				password: {
					identifier  : 'password',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci la password'
						}
					]
				},
			}
		})
	;
});
