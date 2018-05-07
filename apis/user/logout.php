<?php

Framework\Injector::invoke(["ASL\AuthenticationService", "ASL\JsonRequestArray"],
	function($AuthenticationService) {
		try {
			$AuthenticationService->logout();
			echo json_encode(true);
		} catch (Exception $e) {
			echo $e->getMessage();  
			http_response_code(500);
		}
	});
?>
