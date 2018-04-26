<?php

namespace Componentizer;

class ComponentFactory
{
	private $components = array();

	public function	__construct()
	{
		$root = $_SERVER["DOCUMENT_ROOT"];
		$files = static::glob_recursive($root . "/components/index.php");

		$nameLength = strlen("index.php");
		foreach ($files as $file) {
			$componentName = static::camelCaseToHyphen(basename(substr($file, 0, -$nameLength)));
			$path_parts = pathinfo($file);

			$this->components[$componentName] = array(
				"absolutePath" => $file,
				"componentRelativeDir" => substr($path_parts["dirname"], strlen($root)),
				"className" => basename($path_parts["dirname"]),
			);
		}
	}

	public function getComponent($name)
	{
		$component = $this->components[$name];
		require_once($component["absolutePath"]);
		return $component;
	}

	public function hasComponent($name)
	{
		return isset($this->components[$name]);
	}

	private function camelCaseToHyphen($camelCase)
	{
		return strtolower(preg_replace(
			'/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/', "-", $camelCase));
	}

	// Does not support flag GLOB_BRACE
	private function glob_recursive($pattern, $flags = 0)
	{
		$files = glob($pattern, $flags);
		foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
		{
			$files = array_merge($files, static::glob_recursive($dir.'/'.basename($pattern), $flags));
		}
		return $files;
	}
}

?>
