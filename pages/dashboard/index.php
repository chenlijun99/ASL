<?php
//session_start();

//Header("Location: http://$_SERVER[SERVER_NAME]/pages/login/?error=401"); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
<?php

require_component("Appbar");

$appbar = new Appbar();
echo $appbar->getHTML();

?>
	</body>
</html>
