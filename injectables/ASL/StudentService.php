<?php

namespace ASL;

class StudentService extends \Framework\Injectable
{
	private $getByCf;
	private $insert;

	public function __construct() 
	{
		parent::inject("ASL\\DatabaseService as db");

		$this->insert =
		 	$this->db->prepare("INSERT INTO Students VALUES(:cf, :name, :surname, :account)");
		$this->getByCf =
			$this->db->prepare("SELECT * FROM Students WHERE cf = :cf");
	}

	public function getByCf(string $cf) 
	{
		$this->getByCf->execute(array("cf" => $cf));
		return $this->getByCf->fetchAll();
	}

	public function insert(array $student)
	{
		$this->insert->execute($student);
	}
}
?>
