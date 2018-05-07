<?php

Framework\Injector::invoke(["ASL\\UserService", "ASL\\JsonRequestArray"],
	function($UserService, $data) {
		$users = $UserService->getByEmail($data["email"]);

		echo json_encode(array(), JSON_FORCE_OBJECT);
		if (count($users) === 0) {
			http_response_code(404);
		}
	});
?>
