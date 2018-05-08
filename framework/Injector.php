<?php

namespace Framework;

class Injector
{
	public static function invoke($dependencies, $callback) {
		$dependencyInstances = array();

		foreach ($dependencies as $dependency) {
			$dependencyInstances[] = static::get($dependency);
		}
		return call_user_func_array($callback, $dependencyInstances);
	}

	public static function get($name)
	{
		// if Injector is not created yet, create it.
		// Injector is a Singleton
		if (!isset(static::$instance)) {
			static::$instance = new static();
		}

		$injectable = &static::$instance->injectables[$name];
		// $injectables are instanced only once and cached
		if (!isset($injectable["instance"])) {
			$injectable["instance"] = static::createInjectable(static::$instance->injectables[$name]);
		}
		return $injectable["instance"];
	}

	private $injectables = array();
	private static $instance;

	private function	__construct()
	{
		/*
		 * convetion over configuration
		 * All the injectables classes should be put inside the "injectables/" directory
		 * in $_SERVER["DOCUMENT_ROOT"].
		 * Inside that directory filenames and the classname inside each of these file
		 * have to be the same.
		 * If you want to put a injectable class into a namespace, then you
		 * can create a directory whose name is the one of the namespace you're
		 * planning to use and put the file inside that directory.
		 *
		 * Examples
		 * "/injectables/A.php" // a injectable class called A that resides in the global namespace
		 * "/injectables/User/B.php" // a injectable class called A that resides in the "User" namespace
		 */
		$root = $_SERVER["DOCUMENT_ROOT"];
		$files = static::glob_recursive($root . "/injectables/*.php");

		foreach ($files as $file) {
			// remove root and /injectables from the path.
			// remove the extension (".php")
			$injectableName = substr($file, strlen($root . "/injectables/"), -strlen(".php"));

			// replace / with \. Indeed by convention directories represent namespace
			// with are expressed with "\"
			$injectableName = str_replace("/", "\\", $injectableName);

			$this->injectables[$injectableName] = array(
				"instance" => NULL,
				"name" => $injectableName,
				"path" => $file
			);
		}
	}

	private static function createInjectable($injectable) {
		require_once($injectable["path"]);
		$instance = new $injectable["name"];
		if (is_subclass_of($instance, "\\Framework\\InjectableValue")) {
			$instance = $instance();
		}
		return $instance;
	}

	// Does not support flag GLOB_BRACE
	private static function glob_recursive($pattern, $flags = 0)
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
