$('app-bar .ui.dropdown')
	.dropdown({
		keepOnScreen: true
	});

$('app-bar #logout')
	.api({
		method: 'POST',
		url: '/apis/user/logout.php',
		onSuccess: function() {
			window.location.replace('/pages/login/');
		},
		onFailure: function() {
			toastr.error('Logout non riuscito');
		}
	});
