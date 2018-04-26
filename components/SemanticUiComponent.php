<?php

namespace ASL;

use \Componentizer\Component;

abstract class SemanticUiComponent implements Component
{
	public function render($element)
	{
		return $element->append(
			VendorDependencyManager::requireStyle("semantic-ui") . 

			VendorDependencyManager::requireScript("jquery") .
			VendorDependencyManager::requireScript("semantic-ui")
		);
	}
}

?>
