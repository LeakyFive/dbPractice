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

	public function makePreparedQuery($table, $operationType, $rowId = "", $valuesTypes = "", $fields = "", $values = "")
	{
		$placeholders = [];
		for ($i=0; $i < sizeof($fields); $i++)
		{ 
			array_push($placeholders, '?')
		}
		$impFields = implode(",", $fields);
		$impValues = implode(",", $placeholders);
		if ($operationType = 'insert')
		{ 
			$stmt = $this->conn->prepare("INSERT INTO $table VALUES ($impFields) ($impValues)");
		}
		if ($operationType = 'update')
		{
			$query = "UPDATE $table SET ";
			$valuesAssoc = array_fill_keys($fields, $values);
			foreach ($valuesAssoc as $key => $value) {
				if ($key != 'id')
				{
					$query .= "$value=?,";
				}
			}
			$query = substr($query, 0, -1);
			$query .= " WHERE id=$rowId";
			$stmt = $this->conn->prepare($query);
		}
		if ($operationType = 'delete') 
		{ 
			$stmt = $this->conn->query("DELETE FROM $table WHERE id=$rowId");
		}
		$stmt->bind_param($valuesTypes, ...$values);
		$stmt->execute();
	}
	
	public function fetch($result)
	{
		return $result->fetch_all($mode = self::FETCH_MODE)
	}
}
