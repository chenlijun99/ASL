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
			],
			"toastr" => "/node_modules/toastr/build/toastr.min.css"
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
			"semantic-ui" => [
				"/node_modules/semantic-ui/dist/semantic.min.js",
				"/scripts/SemanticUiDefaultApi.js"
			],
			"toastr" => "/node_modules/toastr/build/toastr.min.js",
			"jquery" => "/node_modules/jquery/dist/jquery.min.js",
			"jquery-serializejson" => "/node_modules/jquery-serializejson/jquery.serializejson.min.js"
		);

		if (array_key_exists($name, $paths)) {
			if (is_array($paths[$name])) {
				$script = "";
				foreach ($paths[$name] as $path) {
					$script .= "<script src=\"$path\"></script>\n";
				}
				return $script;
			} else {
				return "<script src=\"$paths[$name]\"></script>\n";
			}
		} else {
			die("Path for js file $name not defined");
		}
	}
}
?>
