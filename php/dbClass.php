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

	function __construct()
	{
		$opt = array_merge($this->defaults, $opt);
		$this->conn = new musqli($opt['host'], $opt['user'], $opt['pass'], $opt['db']);
		if (!$this->conn) exit('Lost DB connection');
		$this->conn->set_charset($opt['charset']);
	}

	function fetch($result)
	{
		return $result->fetch_all($mode = self::FETCH_MODE)
	}
}