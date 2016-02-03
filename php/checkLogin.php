<?php
// header ('Location: ../html/emter.html');
$user = $_POST['user'];
$pass = $_POST['pass'];

$link = mysql_connect('localhost', 'root');
 if (!$link) {
     die('Ошибка соединения: ' . mysql_error());
 }
 mysql_select_db('anrex') or die('Не удалось выбрать базу данных');
  $query = 'SELECT * FROM users WHERE name_users = "'.$user.'"';
  $result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
$row = mysql_fetch_array($result);

$user_sql = $row['name_users'];
$pass_sql = $row['pass_users'];

if($user == $user_sql && $pass == $pass_sql)
{
  echo 'true';
}
else {
  echo 'false';
}


 // Освобождаем память от результата
 mysql_free_result($result);
 mysql_close($link);


 ?>
