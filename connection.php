<?php
class Connection {
private $host;
private $user;
private $password;
private $db_name;
private $connection;

public function __construct() {
	$this->host = 'localhost';
	$this->user = 'root';
	$this->password = '';
	$this->db_name = 'store-demo';
	$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name.';charset=utf8',$this->user,$this->password,array(PDO::ATTR_PERSISTENT => true));
}

public function get() {
	return $this->connection;
}

}