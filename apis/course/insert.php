<?php

Framework\Injector::invoke(["ASL\\AuthenticationService", "ASL\\CourseService", "ASL\\JsonRequestArray"],
	function($AuthenticationService, $CourseService, $body) {
		try {
			$course = $body["course"];
			$course["id"] = $CourseService->insert($body["course"]);
			echo json_encode($course);
		} catch (Exception $e) {
			echo $e->getMessage();  
			http_response_code(500);
		}
	});
?>
