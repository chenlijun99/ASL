<?php

use ASL\ASLComponent;

class RegistrationDialog extends ASLComponent
{
	public function render($element)
	{
		ASLComponent::render($element)
			->append(
				file_get_contents("template.html", FILE_USE_INCLUDE_PATH)
			);

		return $element;
	}
}
?>
