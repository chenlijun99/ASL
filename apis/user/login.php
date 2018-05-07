<?php

Framework\Injector::invoke(["ASL\AuthenticationService", "ASL\JsonRequestArray"],
	function($AuthenticationService, $credentials) {
		$AuthenticationService->login($credentials);
	});
?>
