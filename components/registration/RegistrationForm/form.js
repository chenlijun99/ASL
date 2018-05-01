$(function() {
	initUI();

	var permissionHandler = new ASLPermission($('registration-form'));
	permissionHandler.insert("all");

	$('div.field select[name="role"]').change(function() {
		permissionHandler.insert($(this).val());
	});
});

function initUI() {
	$('registration-form select.ui.dropdown')
		.dropdown();

	$('registration-form .ui.form')
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
		});
}
