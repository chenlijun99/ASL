<?php

use ASL\ASLForm;

class CourseForm extends ASLForm
{
	public function render($element)
	{
		parent::render($element)
			->append(
				parent::getTemplateContent("template.php")
			);

		return $element;
	}

	public function getModel()
	{
		return Framework\Injector::invoke(["ASL\\SchoolService"], 
			function($SchoolService) {
				return 
					array(
						"schools" => $SchoolService->getAll()
					);
			});
	}
}
?>
