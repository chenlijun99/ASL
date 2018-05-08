<?php

namespace ASL;

abstract class ASLForm extends ASLComponent
{
	public function render($element)
	{
		parent::render($element);

		$formValidators = scandir($_SERVER["DOCUMENT_ROOT"] . "/scripts/ASLFormValidators");
		$scripts = "";
		foreach ($formValidators as $path) {
			if (preg_match("/^\w+.js$/", $path) === 1) {
				$path = "/scripts/ASLFormValidators/" . $path;
				$scripts .= 
					"<script src=\"$path\"></script>\n";
			}
		}

		return $element->append(
			VendorDependencyManager::requireScript("jquery-serializejson") .
			$scripts
		);
	}
}

?>
