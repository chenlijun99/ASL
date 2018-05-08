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
		$element->filter(".ui.breadcrumb i.divider:last-of-type")->remove();
		return $element;
	}

	public function getModel()
	{
		return 
			array(
				"paths" => array(
					"/" => "Home",
					"/pages/students" => "Studenti",
					"/pages/courses" => "Corsi",
					"/pages/courses/?id=:id" => function($id) {
						return Framework\Injector::invoke(["ASL\\CourseService"],
							function($CourseService) use ($id) {
								return $CourseService->getById($id)["name"];
							});
					},
					"/pages/schools" => "Scuole",
					"/pages/schools/?id=:id" => function($id) {
						return Framework\Injector::invoke(["ASL\\SchoolService"],
							function($SchoolService) use ($id) {
								return $SchoolService->getById($id)["name"];
							});
					},
					"/pages/students" => "Studenti",
					"/pages/myStudents" => "I miei studenti",
					"/pages/activities" => "Attività",
				)
			);
	}
}
?>
