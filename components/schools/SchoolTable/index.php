<?php

use ASL\ASLComponent;

class SchoolTable extends ASLComponent
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
