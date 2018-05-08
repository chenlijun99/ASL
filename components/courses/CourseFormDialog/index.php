<?php

use ASL\ASLComponent;

class CourseFormDialog extends ASLComponent
{
	public function render($element)
	{
		ASLComponent::render($element)
			->append(
				parent::getTemplateContent("template.html")
			);

		return $element;
	}
}
?>
