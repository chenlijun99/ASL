<?php

namespace ASL;

class ProfileService extends \Framework\InjectableValue
{
	public function __invoke() {
		parent::inject(
			"ASL\\TeacherService as teacher",
			"ASL\\StudentService as student"
		);

		return function($role) {
			return $this->$role;
		};
	}
}
?>
