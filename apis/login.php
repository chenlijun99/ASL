<?php

Framework\Injector::invoke(["ASL\AuthenticationService", "ASL\JsonRequestObject"],
	function($AuthenticationService, $credentials) {
		$AuthenticationService->login($credentials);
	});
?>
