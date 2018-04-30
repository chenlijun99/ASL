<?php

use ASL\ASLComponent;

class App extends ASLComponent
{
	public function render($element)
	{
		$content = $element->html();
		$element->makeEmpty();

		ASLComponent::render($element)
			->append(
				'<link rel="stylesheet" href="style.css"/>' .
				file_get_contents('template.html', FILE_USE_INCLUDE_PATH) .
				'<script src="init.js"></script>'
			);

		$element->filter(".main-area")->append($content);

		return $element;
	}
}
?>
