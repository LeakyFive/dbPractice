<?php

require_once "dbClass.php"; //подключаем наш класс подключения к БД

$conn = new ConnectDB(); //создаём экземпляр класса
$operationType = $_POST['action']; //получаем тип операции к БД полученный из суперглобального массива POST, тип операции храним на кнопке выполняющей ту или иную операцию

if ($operationType == 'update') { //собираем данные для выполнения update
	$table = $_POST['table'];
	$id = $_POST['id'];
	$types = $_POST['types'];
	$fields = $_POST['fields'];
	$values = $_POST['values'];
	$conn->makePreparedQuery($table, $operationType, $id, $types, $field, $values);
}
if ($operationType == 'insert') { //собираем данные для выполнения inserts
	$table = $_POST['table'];
	$id = $_POST['id'];
	$types = $_POST['types'];
	$fields = $_POST['fields'];
	$values = $_POST['values'];
	$conn->makePreparedQuery(($table, $operationType, $id, $types, $field, $values);
}
if ($operationType == 'delete') { //собираем данные для выполнения delete
	$table = $_POST['table'];
	$id = $_POST['id'];
	$conn->makePreparedQuery($table, $id);
}