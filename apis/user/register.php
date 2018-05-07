<?php

Framework\Injector::invoke(["ASL\\UserService", "ASL\\JsonRequestArray"],
	function($UserService, $data) {
		try {
			$successful = $UserService->register($data["user"], $data["profile"]);

			if ($successful) {
				echo json_encode(true);
			} else {
				http_response_code(500);
			}
		} catch(Exception $e) {
			echo $e->getMessage();  
			http_response_code(500);
		}
	});
?>
