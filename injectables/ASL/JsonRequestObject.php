<?php

namespace ASL;

class JsonRequestObject extends \Framework\InjectableValue
{
	public function __invoke() {
		return json_decode(file_get_contents('php://input'));
	}
}
?>
