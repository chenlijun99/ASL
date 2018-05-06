<?php

namespace ASL;

abstract class ASLForm extends ASLComponent
{
	public function render($element)
	{
		ASLComponent::render($element);

		return $element->append(
			VendorDependencyManager::requireScript("jquery-serializejson") 
		);
	}
}

?>
