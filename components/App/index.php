<?php

class App extends Component
{
	protected static $component_dir = __DIR__;

	protected function getTemplate() 
	{
		return
			'<!DOCTYPE html>
				<html>
					<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
						<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
						<title>Dashboard</title>
						<link rel="stylesheet" href="style.css"/>
						' . require_vendor_style("semantic-ui") . '
					</head>
					<body>
							<div class="ui sixteen column grid">
								<div class="row">
									<div class="thirteen wide column">
										<div class="ui basic segment container">
											{{ transclude }}
										</div>
									</div>
								</div>
							</div>
						' . require_vendor_script("jquery") . require_vendor_script("semantic-ui") . '
						<script src="init.js"></script>
					</body>
				</html>';
	}
}
?>
