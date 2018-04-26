<?php

namespace ASL;

class VendorDependencyManager
{
	/**
	 * Require a css dependency.
	 *
	 * Get a html link tag with proper href path
	 * that can be used to include the specified vendor stylesheet
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
	public static function requireStyle($name) {
		static $paths = array(
			"semantic-ui" => "/node_modules/semantic-ui/dist/semantic.min.css"
		);

		if (array_key_exists($name, $paths)) {
			return "<link rel=\"stylesheet\" href=\"$paths[$name]\" />\n";
		} else {
			die("Path for css file $name not defined");
		}
	}

	/**
	 * Require a js dependency.
	 *
	 * Get a html script tag with proper src path
	 * that can be used to include the specified vendor script
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
	public static function requireScript($name) {
		static $paths = array(
			"semantic-ui" => "/node_modules/semantic-ui/dist/semantic.min.js",
			"jquery" => "/node_modules/jquery/dist/jquery.min.js"
		);

		if (array_key_exists($name, $paths)) {
			return "<script src=\"$paths[$name]\"></script>\n";
		} else {
			die("Path for js file $name not defined");
		}
	}
}
?>
