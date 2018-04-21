<?php
function getDBConnection() {
	$host = 'localhost';
	$db   = 'ASL';
	$user = 'root';
	$pass = 'MySqlJt7Mh2Df9It8';

	$dsn = "mysql:host=$host;dbname=$db;";
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	return new PDO($dsn, $user, $pass, $opt);
}
?>
