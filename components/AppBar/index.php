<?php

use ASL\SemanticUiComponent;

class Appbar extends SemanticUiComponent
{
	public function render($element)
	{
		return SemanticUiComponent::render($element)
			->append(
				'<link rel="stylesheet" href="a"/>' .
				file_get_contents('template.html', FILE_USE_INCLUDE_PATH) .
				'<script src="init.js"></script>'
			);
	}
}
?>
