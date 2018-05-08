<?php

use ASL\ASLComponent;

class NavigationMenu extends ASLComponent
{
	public function render($element)
	{
		return ASLComponent::render($element)
			->append(
				parent::getTemplateContent('template.php')
			);
	}

	protected function getModel()
	{
		return array("user" => $_SESSION["user"]);
	}
}
?>
