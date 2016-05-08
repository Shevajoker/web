<?php 

$numb_art = $_POST['number_art'];
$name_art = $_POST['name_art'];
$prise_art = $_POST['prise_art'];
$info_art = $_POST['info_art'];
$collection = $_POST['spis_coll'];

if ($_FILES)
{
	$name_file = $_FILES["filename"]["name"];
	  $full_file_name = "../img/".$user_folder."/".$name_file; // путь к файлу
	  // move_uploaded_file($_FILES["filename"]["tmp_name"],$full_file_name);// записывает на сервер.
echo $name_file;
echo $full_file_name;
}

$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->real_query('SET NAMES utf8');
 $mysqli->real_query('INSERT INTO news (news_title, news_text) VALUES ("'.$newsTitle.'", "'$newsText'")');
 $res = $mysqli->use_result();

// $numb_art = $_POST['numb_art'];

echo $numb_art.' | '.$name_art. '|' .$prise_art. '|' .$info_art. '|' .$collection;

 ?>