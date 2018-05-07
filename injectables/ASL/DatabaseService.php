<?php

namespace ASL;

class PDODecorator
{
	private $pdo;

	public function __construct(\PDO $pdo) {
		$this->pdo = $pdo;
	}

	public function prepare(string $statement, array $driver_options = array())
	{
		$statement = $this->pdo->prepare($statement, $driver_options);
		return new PDOStatementDecorator($statement);
	}

	public function __call($name, $arguments) {
			return call_user_func_array(array($this->pdo, $name), $arguments);
	}
}

class PDOStatementDecorator
{
	private $statement;
	private $parameters;
	private $parameterCount;

	public function __construct(\PDOStatement $statement) {
		$this->statement = $statement;
		$sql = $this->statement->queryString;

		$match = preg_match_all("/:\w+/", $sql, $this->parameters);
		$this->parameters = $this->parameters[0];

		if ($match === 0) {
			unset($this->parameters);
			$this->parameterCount = substr_count($sql, "?");
		}
	}

	public function execute(array $inputParameters = array()) {
		return $this->statement->execute($this->adapatParameters($inputParameters));
	}

	public function __call($name, $arguments) {
			return call_user_func_array(array($this->statement, $name), $arguments);
	}

	private function adapatParameters(array $inputParameters) {
		$parameters = array();

		if (isset($this->parameters)) {
			foreach ($this->parameters as $parameter) {
				// $inputParameters array's keys don't have the leading colon,
				// thus substr($parameters, 1) is used
				$parameters[$parameter] = $inputParameters[substr($parameter, 1)];
			}
		} else {
			$parameters = array_slice($inputParameters, 0 , $this->parameterCount);
		}

		return $parameters;
	}

	//private function prependColon(array $inputParameters) {
		//$parameters = array();
		//array_walk($inputParameters, function($value, $key) use (&$parameters) {
			//$parameters[":" . $key] = $value;
		//});
		//return $parameters;
	//}
}

class DatabaseService extends \Framework\InjectableValue
{
	public function __invoke() 
	{
		$host = 'localhost';
		$db   = 'ASL';
		$user = 'root';
		$pass = '';

		$dsn = "mysql:host=$host;dbname=$db;";
		$opt = [
			\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
			\PDO::ATTR_EMULATE_PREPARES   => false,
		];

		return new PDODecorator(new \PDO($dsn, $user, $pass, $opt));
	}
}
?>
