<?php

namespace ASL;

use \Framework\Component;

abstract class SemanticUiComponent extends Component
{
	public function render($element)
	{
		$semanticUiDefaultFiles = glob($_SERVER["DOCUMENT_ROOT"] . "/scripts/SemanticUiDefaults/*");
		$scripts = "";
		foreach ($semanticUiDefaultFiles as $file) {
			$path = substr($file, strlen($_SERVER["DOCUMENT_ROOT"]));
			$scripts .= 
				"<script src=\"$path\"></script>\n";
		}

		return $element->append(
			VendorDependencyManager::requireStyle("semantic-ui") . 

			VendorDependencyManager::requireScript("jquery") .
			VendorDependencyManager::requireScript("semantic-ui") .
			$scripts
		);
	}
}

?>
