<?php
/**
 * Require a css dependency.
 *
 * Get a html link tag that can be used to include the specified vendor stylesheet
 * Note: If this function gets called more than once with the same
 * parameter `$name`, the html tag will be returned only on the first time.
 * It doesn't make sense that a dependency gets included more than once
 * in the same html file.
 * You can think of this function as a sort of require_once().
 *
 * @param $name
 * The name of the css dependency that you want to obtain
 *
 * @returns A string representing the HTML link tag that could be used to include
 * the vendor stylesheet.
 *
 * A tipical usage is following
 *
 * ```
 * echo require_vendor_style("semantic-ui");
 * ```
 */
function require_vendor_style($name) {
	static $paths = array(
		"semantic-ui" => "/node_modules/semantic-ui/dist/semantic.min.css"
	);

	static $dependencySupplied = array();
	if (isset($dependencySupplied[$name])) {
		return;
	} else {
		$dependencySupplied[$name] = true;
	}


	if (array_key_exists($name, $paths)) {
		return "<link rel=\"stylesheet\" href=\"$paths[$name]\" />\n";
	} else {
		die("Path for css file $name not defined");
	}
}

/**
 * Require a js dependency.
 *
 * Get a html script tag that can be used to include the specified vendor script
 * Note: If this function gets called more than once with the same
 * parameter `$name`, the html tag will be returned only on the first time.
 * It doesn't make sense that a dependency gets included more than once
 * in the same html file.
 * You can think of this function as a sort of require_once().
 *
 * @param $name
 * The name of the js dependency that you want to obtain
 *
 * @returns A string representing the HTML script tag that could be used to include
 * the vendor script.
 *
 * A tipical usage is following
 *
 * ```
 * echo require_vendor_script("semantic-ui");
 * ```
 */
function require_vendor_script($name) {
	static $paths = array(
		"semantic-ui" => "/node_modules/semantic-ui/dist/semantic.min.js",
		"jquery" => "/node_modules/jquery/dist/jquery.min.js"
	);

	static $dependencySupplied = array();
	if (isset($dependencySupplied[$name])) {
		return;
	} else {
		$dependencySupplied[$name] = true;
	}

	if (array_key_exists($name, $paths)) {
		return "<script src=\"$paths[$name]\"></script>\n";
	} else {
		die("Path for js file $name not defined");
	}
}

/*
 * Require a component.
 * The component's class will then be available.
 *
 * @param $name
 * The name of the component you want to include
 *
 */
function require_component($name) 
{
	require_once($_SERVER["DOCUMENT_ROOT"] . "/components/$name/index.php");
}

/*
 * Require a service.
 * Function supplied by the service will then be available.
 *
 * @param $name
 * The name of the service you want to include
 */
function require_service($name) 
{
	require_once($_SERVER["DOCUMENT_ROOT"] . "/services/$name.php");
}
?>
