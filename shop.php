<?php
require('database.php');
require('product.php');
class Shop {
	private $database;
	private $productTable = 'products';

	public $title = "Suknelės";

	public $features = [
		"color"=>"spalva",
		"shape"=>"forma",
		"length"=>"ilgis",
		"size"=>"dydis"
	];

	function __construct() {
		$this->database = new Database();
	}

	//Retrieves an array of all of the products
	public function getAllProducts() {
		$query = 'SELECT * FROM '.$this->productTable;
		$result = [];
		$productData = $this->database->select($query);
		foreach ($productData as $key => $product) {
			array_push($result,new Product($product));
		}
		return $result;
	}

	//Retrieves the unique values in a specific column
	public function getUniqueValues($column = 'id') {
		$query = 'SELECT DISTINCT '.$column.' FROM '.$this->productTable;
		$data = $this->database->select($query);
		$result = [];
		foreach ($data as $key => $value) {
			array_push($result,$value[$column]);
		}
		return $result;
	}

	public function getColumnMinMax($column = 'id') {
		$query1 = 'SELECT MAX('.$column.') as max FROM '.$this->productTable;
		$query2 = 'SELECT MIN('.$column.') as min FROM '.$this->productTable;
		$data1 = $this->database->select($query1);
		$data2 = $this->database->select($query2);
		return ['max'=>$data1[0]['max'],'min'=>$data2[0]['min']];
	}

	//Retrieves the number of products in the database
	public function getNumberOfProducts() {
		$query = 'SELECT COUNT(*) as count FROM '.$this->productTable;
		return $this->database->select($query)[0]['count'];
	}

	//Retrieves a queried list of products
	public function getParticularProducts($features = [],$count = false) {
		
		$query ='SELECT ';
		
		if(!$count) {
			$query .= '*';
		} else {
			$query .= 'COUNT(*) as count';
		}
		
		$query .= ' FROM '.$this->productTable;
		$params = [];

		if(count($features) > 0) {
			$query .= ' WHERE ';
		}
		$i = 0;
		foreach ($features as $feature => $array) {
			if($i > 0) {
				$query .= ' AND ';
			}
			if($feature == 'price') {
				$query .= '(price>=? AND price<=?)';
				array_push($params,$array['min'],$array['max']);
			} else {
				$z = 0;
				foreach ($array as $key => $value) {
					if($z > 0) {
						$query .= ' OR ';
					} else {
						$query .= '(';
					}
					$query.= $feature.'=?';
					array_push($params,$value);
					if($z+1 == count($array)) {
						$query .= ')';
					}
					$z++;
				}
			}
			$i++;
		}
		$data = $this->database->select($query,$params);
		if(!$count) {
			$result = $data;
		} else {
			$result = $data[0]['count'];
		}
		return $result;
	}
}