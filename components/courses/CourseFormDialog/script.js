$(function() {
	var form = $('course-form-dialog course-form .ui.form');

	form.submit(function($event) {
		form.api({
			on: "now",
			method: 'PUT',
			url: '/apis/course/insert.php',
			data: this,
			onSuccess: function(response) {
				toastr.success('Corso inserito');
				modal.modal("hide");
				form.form("reset");
				$("course-form-dialog").trigger("course-form-dialog:success", response);
			},
			onFailure: function() {
				toastr.error('Opss, qualcosa è andato storto');
			}
		});
		$event.preventDefault();
	});

	var modal = $('course-form-dialog .ui.modal')
		.modal({
			onApprove: function() {
				form.trigger("submit");
				return false;
			}
		})
		.modal('attach events', '#course-form-dialog-trigger', 'show');
});
