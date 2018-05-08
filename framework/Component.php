<?php

namespace Framework;

abstract class Component 
{
	public function render($element)
	{
		return $element;
	}

	protected function getTemplateContent(string $path)
	{
		$refl = new \ReflectionClass($this);
		$path = pathinfo($refl->getFileName())["dirname"] . "/$path";
		ob_start();
		if (pathinfo($path)["extension"] === "php") {
			$model = $this->getModel();
		}
		require($path);
		return ob_get_clean();
	}

	protected function getModel() {
		return array();
	}
}
?>
