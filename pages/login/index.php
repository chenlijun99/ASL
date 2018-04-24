<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<title>Login</title>
<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/services/dependency_manager.php");
require_vendor_style("semantic-ui");
?>
<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div class="ui middle aligned center aligned grid login-form">
			<div class="column">
				<h2 class="ui teal image header">
					<div class="content">
						Accedi a *
					</div>
				</h2>
				<form class="ui large form" method="post" action="process_login.php">
					<div class="ui stacked segment">
						<div class="field">
							<div class="ui left icon input">
								<i class="user icon"></i>
								<input type="text" name="email" placeholder="Indirizzo email">
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="lock icon"></i>
								<input type="password" name="password" placeholder="Password">
							</div>
						</div>
						<div class="ui fluid large teal submit button">Login</div>
					</div>
					<div class="ui error message"></div>
<?php
if ($_GET["error"] == "403") {
	echo '
		<div class="ui negative message">
			<div class="header">Credenziali errate</div>
			<p>La preghiamo di ritentare</p>
		</div>
	';
} else if ($_GET["error"] == "401") {
	echo '
		<div class="ui negative message">
			<div class="header">Accesso non autorizzato</div>
			<p>Deve identificarsi prima di accedere a contenuti non autorizzati</p>
		</div>
	';
}
?>
				</form>
			</div>
		</div>

<?php
require_vendor_script("jquery");
require_vendor_script("semantic-ui");
?>
<script src="form.js"></script>
	</body>
</html>

