<?php

use ASL\ASLComponent;

class StudentTable extends ASLComponent
{
	public function render($element)
	{
		return ASLComponent::render($element)
			->append(
				parent::getTemplateContent('template.html')
			);
	}

	protected function getModel()
	{
		return array("user" => $_SESSION["user"]);
	}
}
?>
