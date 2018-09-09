<?php 

class Sql extends PDO {

	private $connection;

	public function __construct() {
		$this->connection = new PDO('mysql:host=localhost;dbname=php7_udemy', 'root', '');
	}

	public function query($rawQuery, $parameters = array()) {
		$statement = $this->connection->prepare($rawQuery);
		$this->setParameters($statement, $parameters);
		$statement->execute();
		return $statement;
	}

	public function select($rawQuery, $parameters = array()) : array {
		$statement = $this->query($rawQuery, $parameters);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	private function setParameters($statement, $parameters = array()) {
		foreach ($parameters as $key => $value) {
			$statement->bindParam($key, $value);
		}
	}
}

?>