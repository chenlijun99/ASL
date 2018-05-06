<?php

namespace ASL;

class AuthenticationService extends \Framework\Injectable
{
	function __construct() 
	{
		parent::inject("ASL\DatabaseService as DatabaseService");

		session_start();
	}

	function isAuthenticated() 
	{
	}

	function login() 
	{
		$this->DatabaseService->query();
	}

	function logout() 
	{

	}

	function is($role) 
	{

	}
}
?>
