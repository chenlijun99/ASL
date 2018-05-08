<?php

namespace ASL;

class SchoolService extends \Framework\Injectable
{
	private $insert;
	private $getAll;
	private $getById;
	private $insertOfferedCourses;

	public function __construct() 
	{
		parent::inject("ASL\DatabaseService as db");

		$this->insert =
		 	$this->db->prepare("INSERT INTO Schools VALUES(NULL, :name, :description)");
		$this->getAll =
		 	$this->db->prepare("SELECT * FROM Schools");
		$this->getById =
		 	$this->db->prepare("SELECT * FROM Schools WHERE id = :id");

		$this->insertOfferedCourses =
			$this->db->prepare("INSERT INTO OfferedCourses VALUES(:school, :course)");
	}

	public function insert(array $school)
	{
		try {
			if (!empty($school["courses"])) {
				$this->db->beginTransaction();
				$this->insert->execute($school);
				$schoolId = $this->db->lastInsertId();

				foreach ($school["courses"] as $course) {
					$this->insertOfferedCourses->execute(array(
						"school" => $schoolId,
						"course" => $course
					));
				}

				$this->db->commit();
				return $schoolId;
			} else {
				$this->insert->execute($school);
				return $this->db->lastInsertId();
			}
		} catch (PDOException $e) {
			$this->db->rollBack();
			throw $e;
		}
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
