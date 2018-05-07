<?php

Framework\Injector::invoke(["ASL\\ProfileService", "ASL\\JsonRequestArray"],
	function($ProfileService, $data) {
		$records = $ProfileService($data["role"])->getByCf($data["cf"]);

		echo json_encode(array(), JSON_FORCE_OBJECT);
		if (count($records) === 0) {
			http_response_code(404);
		}
	});
?>
