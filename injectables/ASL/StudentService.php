<?php

namespace ASL;

class StudentService extends \Framework\Injectable
{
	private $insert;

	public function __construct() 
	{
		parent::inject("ASL\\DatabaseService as db");

		$this->insert =
		 	$this->db->prepare("INSERT INTO Students VALUES(:cf)");
	}

	public function insert(array $student)
	{
		$this->insert->execute($student);
	}
}
?>
