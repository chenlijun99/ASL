<?php

namespace Framework;

abstract class Injectable
{
	private $dependencies = array();

	protected function inject(...$dependencies) {
		foreach ($dependencies as $dependency) {
			$dependency = explode(" as ", $dependency);
			$this->{ $dependency[1] ?: $dependency[0] } = Injector::get($dependency[0]);
		}
	}

	final public function __get($name) {
		return $this->dependencies[$name];
	}

	final public function __set($name, $value) {
		$this->dependencies[$name] = $value;
	}
}
?>
