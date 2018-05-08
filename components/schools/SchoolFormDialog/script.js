$(function() {
	var form = $('school-form-dialog school-form .ui.form');

	form.submit(function($event) {
		form.api({
			on: "now",
			method: 'PUT',
			url: '/apis/school/insert.php',
			data: this,
			onSuccess: function(response) {
				toastr.success('Scuola inserita');
				modal.modal("hide");
				form.form("reset");

				$("school-form-dialog").trigger("school-form-dialog:success", response);
			},
			onFailure: function() {
				toastr.error('Opss, qualcosa è andato storto');
			}
		});
		$event.preventDefault();
	});

	var modal = $('school-form-dialog .ui.modal')
		.modal({
			onApprove: function() {
				form.trigger("submit");
				return false;
			}
		})
		.modal('attach events', '#school-form-dialog-trigger', 'show');
});
