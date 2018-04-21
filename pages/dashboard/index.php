<?php
session_start();

Header("Location: http://$_SERVER[SERVER_NAME]/pages/login/?error=401"); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<title>Dashboard</title>
<?php
require("../../vendors.php");

include_css_file("semantic-ui");
?>
	</head>
	<body>
<?php
include_js_file("jquery");
include_js_file("semantic-ui");
?>
	</body>
</html>
