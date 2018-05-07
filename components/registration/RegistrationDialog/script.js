$(function() {
	var form = $('registration-dialog registration-form .ui.form');

	form.submit(function($event) {
		form.api({
			on: "now",
			method: 'PUT',
			url: '/apis/user/register.php',
			data: this,
			onSuccess: function() {
				toastr.success('Registrazione completata');
				modal.modal("hide");
				form.form("reset");
			},
			onFailure: function() {
				toastr.error('Opss, qualcosa è andato storto');
			}
		});
		$event.preventDefault();
	});

	var modal = $('registration-dialog .ui.modal')
		.modal({
			onApprove: function() {
				form.trigger("submit");
				return false;
			}
		})
		.modal('attach events', '#registration-dialog-trigger', 'show');
});
