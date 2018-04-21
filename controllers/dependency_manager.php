<?php
/**
 * Require a css dependency.
 *
 * This function will echo a html link tag with proper href path.
 * Note: If this function gets called more than once with the same
 * parameter `$name`, the html tag will be echoed only on the first time.
 * It doesn't make sense that a dependency gets included more than once
 * in the same html file.
 *
 * @param $name
 * The name of the css dependency that you want to obtain
 */
function require_vendor_style($name) {
	static $paths = array(
		"semantic-ui" => "/node_modules/semantic-ui/dist/semantic.min.css"
	);

	static $dependencySupplied = array();
	if ($dependencySupplied[$name] == true) {
		return;
	} else {
		$dependencySupplied[$name] = true;
	}


	if (array_key_exists($name, $paths)) {
		echo "<link rel=\"stylesheet\" href=\"$paths[$name]\">\n";
		return;
	} else {
		die("Path for css file $name not defined");
	}
}

/**
 * Require a js dependency.
 *
 * This function will echo a html script tag with proper src path.
 * Note: If this function gets called more than once with the same
 * parameter `$name`, the html tag will be echoed only on the first time.
 * It doesn't make sense that a dependency gets included more than once
 * in the same html file.
 *
 * @param $name
 * The name of the js dependency that you want to obtain
 */
function require_vendor_script($name) {
	static $paths = array(
		"semantic-ui" => "/node_modules/semantic-ui/dist/semantic.min.js",
		"jquery" => "/node_modules/jquery/dist/jquery.min.js"
	);

	static $dependencySupplied = array();
	if ($dependencySupplied[$name] == true) {
		return;
	} else {
		$dependencySupplied[$name] = true;
	}

	if (array_key_exists($name, $paths)) {
		echo "<script src=\"$paths[$name]\"></script>\n";
		return;
	} else {
		die("Path for js file $name not defined");
	}
}
?>
