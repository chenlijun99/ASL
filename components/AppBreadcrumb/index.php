<?php

use ASL\ASLComponent;

class AppBreadcrumb extends ASLComponent
{
	public function render($element)
	{
		ASLComponent::render($element)
			->append(
				parent::getTemplateContent('template.php')
			);
		$element->filter(".ui.breadcrumb a.section:last-of-type")->addClass("active");
		$element->filter(".ui.breadcrumb div.divider:last-of-type")->remove();
		return $element;
	}

	public function getModel()
	{
		return 
			array(
				"paths" => array(
					"/" => "Home",
					"/pages/students" => "Studenti",
					"/pages/myStudents" => "I miei studenti",
					"/pages/activities" => "Attività",
				)
			);
	}
}
?>
