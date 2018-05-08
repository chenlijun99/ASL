<?php

namespace ASL;

use \Framework\Component;

abstract class SemanticUiComponent extends Component
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
