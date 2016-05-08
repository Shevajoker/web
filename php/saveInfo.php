<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type:application/json');
header('Content-type:text/html; charset="utf-8"');

$user_id = $_GET['user_id'];

$name = $_GET['name'];
$addres = $_GET['addres'];
$phon = $_GET['phon'];
$person = $_GET['person'];

$data = $name;
$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->real_query('SET NAMES utf8');

 $mysqli->real_query('UPDATE users_info SET users_info_nazva="'.$name.'", users_info_addres="'.$addres.'", users_info_phon="'.$phon.'", users_info_contact_face="'.$person.'" WHERE ID_users = "'.$user_id.'"');
 // 	$res = $mysqli->use_result();
 // 	$row = $res->fetch_assoc();
	// if ($row) {
	// 	$data = 'Сохранено!';
	// } else {$data = 'Не Сохранено!';}

echo $data;



 ?>