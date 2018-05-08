<?php

Framework\Injector::invoke(["ASL\\UserService", "ASL\\JsonRequestArray"],
	function($UserService, $data) {
		try {
			$UserService->register($data["user"], $data["profile"]);
			echo json_encode(true);

		} catch(Exception $e) {
			echo $e->getMessage();  
			http_response_code(500);
		}
	});
?>
