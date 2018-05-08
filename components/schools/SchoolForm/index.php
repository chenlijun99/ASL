<?php

use ASL\ASLForm;

class SchoolForm extends ASLForm
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
		return Framework\Injector::invoke(["ASL\\CourseService"], 
			function($CourseService) {
				return 
					array(
						"courses" => $CourseService->getAll()
					);
			});
	}
}
?>
