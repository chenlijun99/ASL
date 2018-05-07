<?php

namespace ASL;

abstract class ASLComponent extends SemanticUiComponent
{
	public function render($element)
	{
		$element = parent::render($element);
		return $element->append(
			VendorDependencyManager::requireStyle("toastr") . 
			"<link rel=\"stylesheet\" href=\"/styles/helper.css\" />\n" .

			VendorDependencyManager::requireScript("toastr") . 
			"<script src=\"/scripts/ASLHelper.js\"></script>\n" .
			"<script src=\"/scripts/ASLAjaxDefaults.js\"></script>\n" .
			"<script src=\"/scripts/ASLPermission.js\"></script>\n"
		);
	}
}

?>
