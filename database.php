<?php
require('connection.php');

class Database {
	
	private $connection;

	function __construct() {
		$connectionObject = new Connection();
		$this->connection = $connectionObject->get();
	}

	public function select($sql,$input_parameters = NULL) {
		if(isset($sql)) {
			$sql = $this->connection->prepare($sql); //Prepare the query for the database.
			if($input_parameters==NULL) {$sql->execute();}
			else {$sql->execute($input_parameters);}
				$result = $sql->fetchAll(PDO::FETCH_ASSOC); //Fetch associative array
				return $result; //Return the result
		}
		else {return false;} //Result to return if no query provided.
	}
}
?>