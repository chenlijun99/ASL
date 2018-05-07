<?php

namespace ASL;

class JsonRequestArray extends \Framework\InjectableValue
{
	public function __invoke() {
		return json_decode(file_get_contents('php://input'), true);
	}
}
?>
