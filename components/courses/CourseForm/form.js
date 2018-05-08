(function() {
'use strict';

	$(function() {
		initComponents();
		var form = initForm();
	});

	function initForm() {
		return $('course-form .ui.form')
			.form({
				inline: true,
				on: 'blur',
				fields: {
					name: {
						identifier  : 'course[name]',
						rules: [
							{
								type: 'empty',
								prompt: 'Inserisci il nome del corso'
							}
						]
					},
					targetAmount: {
						identifier  : 'course[targetAmount]',
						rules: [
							{
								type: 'empty',
								prompt: 'Inserisci il monte ore che uno studente necessita se frequenta questo corso'
							},
							{
								type: 'number',
								prompt: 'Numero invalido'

							}
						]
					},
					description: {
						identifier: 'course[description]',
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
		$('course-form select.ui.dropdown')
			.dropdown();
	}
})();
