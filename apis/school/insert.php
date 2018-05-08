<?php

Framework\Injector::invoke(["ASL\\AuthenticationService", "ASL\\SchoolService", "ASL\\JsonRequestArray"],
	function($AuthenticationService, $SchoolService, $body) {
		try {
			$school = $body["school"];
			$school["id"] = $SchoolService->insert($school);
			echo json_encode($school);
		} catch (Exception $e) {
			echo $e->getMessage();  
			http_response_code(500);
		}
	});
?>
