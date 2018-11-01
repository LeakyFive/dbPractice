<?php

require_once "dbClass.php"; //подключаем наш класс подключения к БД

$conn = new DBConnection(); //создаём экземпляр класса
$operationType = $_POST['action']; //получаем тип операции к БД полученный из суперглобального массива POST, тип операции храним на кнопке выполняющей ту или иную операцию
// if ($operationType == 'update') { //собираем данные для выполнения update
// 	$table = $_POST['table'];
// 	$id = $_POST['id'];
// 	$types = $_POST['types'];
// 	$fields = $_POST['fields'];
// 	$values = $_POST['values'];
// 	$conn->makePreparedQuery($table, $operationType, $id, $types, $field, $values);
// }
if ($operationType == 'insert') { //собираем данные для выполнения insert
	$table = $_POST['table'];
	$types = $_POST['types'];
	$fields = json_decode($_POST['fields']);
	$values = json_decode($_POST['values']);
	$conn->makePreparedQuery($table, $operationType, null, $types, $fields, $values);
}
// if ($operationType == 'delete') { //собираем данные для выполнения delete
// 	$table = $_POST['table'];
// 	$id = $_POST['id'];
// 	$conn->makePreparedQuery($table, $id);
// }