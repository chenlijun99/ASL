$(function() {
	initComponents();
	var form = initForm();

	var permissionHandler = new ASLPermission($('registration-form'));
	permissionHandler.insert("all");
	$('div.field select[name="user[role]"]').change(function() {
		var role = $(this).val();
		permissionHandler.insert();

		if (role) {
			// add cfUnique validation when role is not selected
			// Backend knows from which table to query
			form.form('remove rule', 'cf');
			form.form('add rule', 'cf', {
				identifier  : 'profile[cf]',
				rules: [
					{
						type: 'cfUnique',
						value: role,
						prompt: 'Codice fiscale già in uso'
					},
					{
						type   : 'empty',
						prompt : 'Inserisci il tuo codice fiscale'
					},
					{
						type   : 'cf',
						prompt : 'Codice fiscale invalido'
					}
				]
			});
		} else {
			// remove cfUnique validation when role is not selected
			// as backend doesn't knows from which table to query
			form.form('remove rule', 'cf');
			form.form('add rule', 'cf', {
				identifier  : 'profile[cf]',
				rules: [
					{
						type   : 'empty',
						prompt : 'Inserisci il tuo codice fiscale'
					},
					{
						type   : 'cf',
						prompt : 'Codice fiscale invalido'
					}
				]
			});
		}
	});
});

function initForm() {
	return $('registration-form .ui.form')
		.form({
			inline: true,
			on: 'blur',
			fields: {
				email: {
					identifier  : 'user[email]',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci la tua email'
						},
						{
							type   : 'emailUnique',
							prompt : 'Email già in uso'
						},
						{
							type   : 'email',
							prompt : 'Inserisci un email valido'
						}
					]
				},
				password: {
					identifier  : 'user[password]',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci la password'
						}
					]
				},
				role: {
					identifier  : 'user[role]',
					rules: [
						{
							type   : 'empty',
							prompt : 'Seleziona il tuo ruolo'
						}
					]
				},


				surname: {
					identifier  : 'profile[surname]',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci il tuo cognome'
						}
					]
				},
				name: {
					identifier  : 'profile[name]',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci il tuo nome'
						}
					]
				},
				cf: {
					identifier  : 'profile[cf]',
					rules: [
						{
							type   : 'empty',
							prompt : 'Inserisci il tuo codice fiscale'
						},
						{
							type   : 'cf',
							prompt : 'Codice fiscale invalido'
						}
					]
				}
			}
		});
}

function initComponents() {
	$('registration-form select.ui.dropdown')
		.dropdown();
}
