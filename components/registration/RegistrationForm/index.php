<?php

use ASL\ASLComponent;

class RegistrationForm extends ASLComponent
{
	public function render($element)
	{
		ASLComponent::render($element)
			->append(
				file_get_contents("template.html", FILE_USE_INCLUDE_PATH)
			);

		$element->filter("form")->attr("action", $element->attr("action"));

		return $element;
	}
}
?>
