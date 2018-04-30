<?php

namespace ASL;

class VendorDependencyManager
{
	/**
	 * Require a css dependency.
	 *
	 * @param $name
	 * The name of the css dependency that you want to obtain
	 *
	 * @returns A string representing the HTML link tag(s) that could be used to include
	 * the vendor stylesheet.
	 *
	 * A typical usage is following
	 *
	 * ```
	 * echo require_vendor_style("semantic-ui");
	 * ```
	 */
	public static function requireStyle($name) {
		static $paths = array(
			"semantic-ui" => [
				"/node_modules/semantic-ui/dist/semantic.min.css",
				"/styles/semantic-ui-media-queries.css",
				"/styles/semantic-ui-no-spacing-grid.css"
			]
		);

		if (array_key_exists($name, $paths)) {
			if (is_array($paths[$name])) {
				$link = "";
				foreach ($paths[$name] as $path) {
					$link .= "<link rel=\"stylesheet\" href=\"$path\" />\n"; 
				}
				return $link;
			} else {
				return "<link rel=\"stylesheet\" href=\"$paths[$name]\" />\n";
			}
		} else {
			die("Path for css file $name not defined");
		}
	}

	/**
	 * Require a js dependency.
	 *
	 * @param $name
	 * The name of the js dependency that you want to obtain
	 *
	 * @returns A string representing the HTML script tag(s) that could be used to include
	 * the vendor script.
	 *
	 * A typical usage is following
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
