<?php
class Appbar extends Component
{
	protected function getTemplate()
	{
		return 
			require_vendor_style("semantic-ui") . 

			file_get_contents('template.html', FILE_USE_INCLUDE_PATH) .

			require_vendor_script("jquery") .
		 	require_vendor_script("semantic-ui") .
			'<script src="init.js"></script>';
	}
}
?>
