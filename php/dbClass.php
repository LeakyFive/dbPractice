<?php

class DBConnection
{
	protected $conn;

	protected $defaults = [
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'db' => 'dbName',
		'charset' => 'utf8',
	];

	const $FETCH_MODE = MYSQLI_ASSOC;

	public function __construct()
	{
		$opt = array_merge($this->defaults, $opt);
		$this->conn = new mysqli($opt['host'], $opt['user'], $opt['pass'], $opt['db']);
		if (!$this->conn) exit('Lost DB connection');
		$this->conn->set_charset($opt['charset']);
	}

	public function makeQuery($myQuery)
	{
		$q = $this->connect->query($myQuery);
		if($q) return $q;
		else return null;
	}

	public function fetch($result)
	{
		return $result->fetch_all($mode = self::FETCH_MODE)
	}

	public function add($table, $data)
	{

	}

	public function update($table, $data, $id)
	{

	}

	public function delete($table, $id)
	{

	}
}


$object = new ConnectDB();
$res=$object->selectFromTwoTables("city", "region", "region_id");
$mydata=$res->fetch_all(MYSQLI_ASSOC);
for($i=0,$count = sizeof($mydata);$i<$count;$i++)
{
    echo "<div {$mydata[$i]['region_id']}</div>";
}