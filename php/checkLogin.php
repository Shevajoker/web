<?php
// header ('Location: ../html/emter.html');
$user = $_POST['user'];
$pass = $_POST['pass'];


$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

 $mysqli->real_query('SELECT * FROM users WHERE name_users = "'.$user.'"');
 $res = $mysqli->use_result();
 $row = $res->fetch_assoc();

$user_sql = $row['name_users'];
$pass_sql = $row['pass_users'];

if($user == $user_sql && $pass == $pass_sql)
{
  echo 'true';
}
else {
  echo 'false';
}


 ?>
