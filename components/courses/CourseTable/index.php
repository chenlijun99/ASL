<?php

use ASL\ASLComponent;

class CourseTable extends ASLComponent
{
	public function render($element)
	{
		return ASLComponent::render($element)
			->append(
				parent::getTemplateContent('template.php')
			);
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
