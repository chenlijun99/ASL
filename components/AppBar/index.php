<?php

use ASL\ASLComponent;

class Appbar extends ASLComponent
{
	public function render($element)
	{
		$prepend = $element->filter("prepend");
		$append = $element->filter("append");

		ASLComponent::render($element)
			->append(
				file_get_contents('template.html', FILE_USE_INCLUDE_PATH)
			);

		$element->filter(".ui.menu")->prepend($prepend->html());
		$element->filter(".right.menu")->prepend($append->html());

		$prepend->remove();
		$append->remove();

		return $element;
	}
}
?>
