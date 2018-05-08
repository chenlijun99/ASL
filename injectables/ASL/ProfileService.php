<?php

namespace ASL;

class ProfileService extends \Framework\Injectable
{
	private $getByCf;
	private $getByUser;
	private $insert;

	public function __construct() 
	{
		parent::inject(
			"ASL\\DatabaseService as db",
			"ASL\\TeacherService as teacher",
			"ASL\\StudentService as student"
		);

		$this->insert =
		 	$this->db->prepare("INSERT INTO Profiles VALUES(:cf, :name, :surname, :account)");
		$this->getByCf =
			$this->db->prepare("SELECT * FROM Profiles WHERE cf = :cf");
		$this->getByUser =
			$this->db->prepare("SELECT * FROM Profiles WHERE account = :id");
	}

	public function insert(array $profile)
	{
		$this->insert->execute($profile);
		$this->db->lastInsertId();
	}

	public function getByUser(array $user) 
	{
		$this->getByUser->execute($user);
		return $this->getByUser->fetchAll();
	}

	public function getByCf(string $cf) 
	{
		$this->getByCf->execute(array("cf" => $cf));
		return $this->getByCf->fetchAll();
	}

	public function role(string $role)
	{
		return $this->$role;
	}
}
?>
