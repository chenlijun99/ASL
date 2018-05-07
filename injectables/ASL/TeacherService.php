<?php

namespace ASL;

class TeacherService extends \Framework\Injectable
{
	private $getByCf;
	private $insert;

	public function __construct() 
	{
		parent::inject("ASL\DatabaseService as db");

		$this->insert =
		 	$this->db->prepare("INSERT INTO Teachers VALUES(:cf, :name, :surname, :account)");
		$this->getByCf =
			$this->db->prepare("SELECT * FROM Teachers WHERE cf = :cf");
	}

	public function getByCf(string $cf) 
	{
		$this->getByCf->execute(array("cf" => $cf));
		return $this->getByCf->fetchAll();
	}

	public function insert(array $teacher)
	{
		$this->insert->execute($teacher);
	}
}
?>
