<?php

namespace ASL;

abstract class ASLComponent extends SemanticUiComponent
{
	public function render($element)
	{
		return $element->append(
			VendorDependencyManager::requireStyle("semantic-ui") . 
			"<link rel=\"stylesheet\" href=\"/styles/helper.css\" />\n" .

			VendorDependencyManager::requireScript("jquery") .
			VendorDependencyManager::requireScript("semantic-ui") .
			"<script src=\"/scripts/ASLHelper.js\"></script>\n" .
			"<script src=\"/scripts/ASLPermission.js\"></script>\n"
		);
	}
}

?>
