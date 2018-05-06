<?php

namespace Framework;

abstract class InjectableValue extends Injectable
{
	abstract public function __invoke();
}
?>
