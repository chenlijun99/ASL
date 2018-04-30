<?php

use ASL\Database;

$pdo = Database::getConnection();

if (!$result) {
	Header("Location: /pages/login/?login_error=403"); 
} else {
	Header("Location: /pages/login/?login_error=401"); 
}

?>
