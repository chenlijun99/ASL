<?php
Framework\Injector::invoke(["ASL\AuthenticationService"],
	function($AuthenticationService) {
		if (!$AuthenticationService->isAuthenticatedAs("admin", "schoolManager")) {
			Header("Location: http://$_SERVER[SERVER_NAME]/pages/login/"); 
		}
	});
?>

<?php
echo (new Framework\Renderer(file_get_contents('template.html', FILE_USE_INCLUDE_PATH)))->render();
?>
