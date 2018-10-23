<?php

require_once "dbClass.php";

$connection = new ConnectDB();

if (@$_POST['action'] == 'update') {
	$data = json_decode($_POST['entity'], true);
	$table = $_POST['table'];
	$id = $_POST['id'];
	$connection->update($table, $data, $id);
}
if (@$_POST['action'] == 'delete') {
	$table = $_POST['table'];
	$id = $_POST['id'];
	$connection->delete($table, $id);
}
if (@$_POST['action'] == 'add') {
	$table = $_POST['table'];
	$data = $_POST;
	$connection->add($table, $data);
}