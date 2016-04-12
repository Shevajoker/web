<?php 
$user = $_POST['user'];
$pass = $_POST['pass'];
$data = '';


$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

 $mysqli->real_query('SELECT * FROM users');
 $res = $mysqli->use_result();

while ($row = $res->fetch_assoc()) {
if ($user == $row['name_users']){
		$data = "true";
	}else {
		$data = "false";
	}
}

if ($data != "true"){
	$mysqli->real_query('INSERT INTO users(name_users, pass_users) VALUES ("'.$user.'", "'.$pass.'")');
	$id = $mysqli->insert_id; 
	$mysqli->real_query('INSERT INTO users_info(ID_users) VALUES ("'.$id.'")');


// 	INSERT INTO table1(поля таблицы) VALUE(ваши значения) 

// //узнаете последний созданный id первой таблицы 
// $id = mysql_insert_id(); 

// INSERT INTO table2(поля таблицы,id первой таблицы) VALUE(ваши значения,$id) 
// }
}

echo $data;

 ?>