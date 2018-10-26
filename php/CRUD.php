<?php

require_once "dbClass.php";

$conn = new ConnectDB();
$operationType = $_POST['action'];

if ($operationType == 'update') {
	$table = $_POST['table'];
	$id = $_POST['id'];
	$types = $_POST['types'];
	$fields = $_POST['fields'];
	$values = $_POST['values'];
	$conn->makePreparedQuery($table, $operationType, $id, $types, $field, $values);
}
if ($operationType == 'insert') {
	$table = $_POST['table'];
	$id = $_POST['id'];
	$types = $_POST['types'];
	$fields = $_POST['fields'];
	$values = $_POST['values'];
	$conn->makePreparedQuery(($table, $operationType, $id, $types, $field, $values);
}
if ($operationType == 'delete') {
	$table = $_POST['table'];
	$id = $_POST['id'];
	$conn->makePreparedQuery($table, $id);
}