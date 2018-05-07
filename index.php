<?php
Framework\Injector::invoke(["ASL\AuthenticationService"],
	function($AuthenticationService) {
		if ($AuthenticationService->isAuthenticated()) {
			Header("Location: http://$_SERVER[SERVER_NAME]/pages/dashboard/"); 
		} else {
			Header("Location: http://$_SERVER[SERVER_NAME]/pages/login/"); 
		}
	});
?>
