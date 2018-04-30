<?php

use ASL\ASLComponent;

class NavigationMenu extends ASLComponent
{
	public function render($element)
	{
		return ASLComponent::render($element)
			->append(
				file_get_contents('template.html', FILE_USE_INCLUDE_PATH)
			);
	}
}
?>
