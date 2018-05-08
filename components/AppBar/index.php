<?php

use ASL\ASLComponent;

class Appbar extends ASLComponent
{
	public function render($element)
	{
		$prepend = $element->filter("prepend");
		$append = $element->filter("append");

		ASLComponent::render($element)
			->append(
				parent::getTemplateContent('template.php')
			);

		$element->filter(".ui.menu")->prepend($prepend->html());
		$element->filter(".right.menu")->prepend($append->html());

		$prepend->remove();
		$append->remove();

		return $element;
	}

	protected function getModel()
	{
		return Framework\Injector::invoke(["ASL\\ProfileService"], 
			function($ProfileService) {
				$user = $_SESSION["user"];
				return array(
					"user" => $user,
					"profile" => $ProfileService->getByUser($user)[0]
				);
			});
	}
}
?>
