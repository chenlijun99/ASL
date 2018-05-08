<?php

namespace ASL;

class TeacherService extends \Framework\Injectable
{
	private $insert;

	public function __construct() 
	{
		parent::inject("ASL\DatabaseService as db");

		$this->insert =
		 	$this->db->prepare("INSERT INTO Teachers VALUES(:cf)");
	}

	public function insert(array $teacher)
	{
		$this->insert->execute($teacher);
	}
}
?>
