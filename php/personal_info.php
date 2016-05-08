<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type:application/json');
header('Content-type:text/html; charset="utf-8"');

$user = $_GET['user'];
$user_id = $_GET['user_id'];

$data = '';

$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->real_query('SET NAMES utf8');
 $mysqli->real_query('SELECT users.*, users_info.* FROM users, users_info WHERE users.ID_users = users_info.ID_users  AND users.ID_users = "'.$user_id.'"');
 $res = $mysqli->use_result();

$data = '[';
while ($row = $res->fetch_assoc()) {
  $data .= '{
    "ID_users":"'.$row["ID_users"].'",
    "users_info_nazva":"'.$row["users_info_nazva"].'",
    "users_info_addres":"'.$row["users_info_addres"].'",
    "users_info_phon":"'.$row["users_info_phon"].'",
    "users_info_contact_face":"'.$row["users_info_contact_face"].'"
  },';
}

$res->free();
$mysqli->close();

 $data .=']';
$data = chop($data,   ',]');
echo $data.']';
// echo $user_id;




 ?>