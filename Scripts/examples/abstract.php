#!/usr/bin/env php
<?php
// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);


interface Engine {
	public function initStorageEngine();
	public function startStorageEngine();
}

// parent abstract class
abstract class Database implements Engine {
	protected $attr = 'database_class';

	// abstract methods
	abstract protected function connect($arr);
	abstract protected function query($str);

	// non-abstract method
	protected function method3($var) {
	}

	public function initStorageEngine() {

	}

	public function startStorageEngine() {

	}
}

// child class that extends abstract parent class
class MySQL extends Database {
	protected $dbc = [];

	public function __construct() {

	}

	// Implement abstract method
	public function connect($arr) {
		$this->dbc = $arr;
		var_dump($this->dbc);
		echo "connect to database {$this->dbc['database']}\n";
	}

	// Implement abstract method
	public function query($str) {
		echo "query $str\n";
	}
}

$db = new MySQL();
$db->initStorageEngine();
$db->startStorageEngine();
$db->connect([ 'host' => 'localhost', 'user' => 'test', 'database' => 'test' ]);
$db->query('test');
