(function() {
'use strict';
	$(function() {
		initComponents();
		var form = initForm();
	});

	function initForm() {
		return $('school-form .ui.form')
			.form({
				inline: true,
				on: 'blur',
				fields: {
					name: {
						identifier: 'school[name]',
						rules: [
							{
								type: 'empty',
								prompt: 'Inserisci il nome della scuola'
							}
						]
					},
					description: {
						identifier: 'school[description]',
						rules: [
							{
								type: 'maxLength[1000]',
								prompt: 'Non superare i 1000 caratteri!'
							}
						]
					}
				}
			});
	}

	function initComponents() {
		$('school-form select.ui.dropdown')
			.dropdown();
	}
})();
