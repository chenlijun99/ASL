<?php

namespace ASL;

class CourseService extends \Framework\Injectable
{
	private $insert;
	private $getAll;
	private $getById;

	public function __construct() 
	{
		parent::inject("ASL\DatabaseService as db");

		$this->insert =
		 	$this->db->prepare("INSERT INTO Courses VALUES(NULL, :name, :targetAmount, :description)");
		$this->getAll =
		 	$this->db->prepare("SELECT * FROM Courses");
		$this->getById =
		 	$this->db->prepare("SELECT * FROM Courses WHERE id = :id");
	}

	public function insert(array $course)
	{
		$this->insert->execute($course);
		return $this->db->lastInsertId();
	}

	public function getById($id) {
		$this->getById->execute(array("id" => $id));
		return $this->getById->fetchAll()[0];
	}

	public function getAll() {
		$this->getAll->execute();
		return $this->getAll->fetchAll();
	}
}
?>
