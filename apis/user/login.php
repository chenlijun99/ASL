<?php

Framework\Injector::invoke(["ASL\AuthenticationService", "ASL\JsonRequestArray"],
	function($AuthenticationService, $credentials) {
		try {
			$successful = $AuthenticationService->login($credentials);

			if ($successful) {
				echo json_encode(true);
			} else {
				http_response_code(500);
			}
		} catch (Exception $e) {
			echo $e->getMessage();  
			http_response_code(500);
		}
	});
?>
