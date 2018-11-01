<?php

require_once '../php/dbClass.php'; //подключаем файл с классом подключения к БД
$connect = new DBConnection(); //создаём экземпляр класса подключения к БД
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель администратора</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#">Панель администратора</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Пользователи <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Таблица</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Таблица</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<div id='addContainer' class="container" style="display: none;">
	<div class="pb-2 mt-4 mb-2 d-flex justify-content-end border-bottom">
		<h2 class="mr-auto">Добавить пользователя</h2>
	</div>
	<form>
    	<input type="text" data-type='s' name='name' class="form-control my-2" required placeholder="Имя">
    	<input type="text" data-type='s' name='login' class="form-control my-2" required placeholder="Логин">
    	<input type="password" data-type='s' name='password' class="form-control my-2" required placeholder="Пароль">
  		<button class="button-add btn btn-success my-2">Добавить</button>
	</form>
</div>
<div id='showTable' class="container">
	<div class="pb-2 mt-4 mb-2 d-flex justify-content-end border-bottom">
		<h2 class="mr-auto">Пользователи</h2>
		<button class="showadd-button btn btn-success">Добавить</a>
	</div>
			<table class="table table-hover my-3">
		  		<thead class="thead-light">
			    	<tr>
			        	<th scope="col">id</th>
			      	 	<th scope="col">Имя</th>
			      	 	<th scope="col">Логин</th>
			      		<th scope="col">Пароль</th>
			      		<th scope="col">Действия</th>
			    	</tr>
		  		</thead>
			  	<tbody>
			  	<?php
                  $query = "SELECT * FROM users"; //записываем запрос на выборку данных
                  $queryResult = $connect->makeUnpreparedQuery($query); //выполняем запрос записываем ответ MySQL в $queryResult
                  $data = $connect->fetch($queryResult); //данные полученные из MySQL преабоазовываем в ассоциативный массив
                  for($i = 0, $count = sizeof($data); $i < $count; $i++) // выводим данные в виде строк HTML-таблицы 
                  {
                  	echo "
                  	<tr>
			      		<th scope='row'>{$data[$i]['id']}</th>
			      		<td><input class='form-control' name='name' disabled type='text' value='{$data[$i]['name']}'></td>
			      		<td><input class='form-control' name='login' disabled type='text' value='{$data[$i]['login']}'></td>
			      		<td><input class='form-control' name='password' disabled type='text' value='{$data[$i]['password']}'></td>
			      		<td><div class='icons-ed-del'><i class='edit-button btn btn-light mr-2 far fa-edit fa-lg' style='color: #339af0;'></i><i data-opType='delete' class='delete-button btn btn-light far fa-trash-alt fa-lg' style='color: #ff6b6b;'></i></div>
			      		<div class='icons-сonf-canc' style='display: none;'><i data-opType='update' class='btn btn-light mr-2 fas fa-check fa-lg' style='color: #51cf66;'></i><i class='cancel-button btn btn-light fas fa-times fa-lg' style='color: #ff6b6b;'></i></div>
			      		</td>
			    	</tr>
                  	";                  
                  }
                 ?>
			  	</tbody>
			</table>
</div>

<script src="../js/script.js"></script>
</body>
</html>