<?php
function absolutise_path($relative_path, $currentFileAbsolute)
{
	return str_replace(
		pathinfo($currentFileAbsolute, PATHINFO_BASENAME),
	 	$relative_path, $currentFileAbsolute);
}
?>
