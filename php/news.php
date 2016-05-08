<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type:application/json');
header('Content-type:text/html; charset="utf-8"');

$data = '';

$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->real_query('SET NAMES utf8');
 $mysqli->real_query('SELECT * FROM news ORDER BY news_date DESC LIMIT 5');
 $res = $mysqli->use_result();

$data = '[';
while ($row = $res->fetch_assoc()) {
  $data .= '{
    "news_title":"'.$row["news_title"].'",
    "news_text":"'.$row["news_text"].'",
    "news_date":"'.$row["news_date"].'"
  },';
}

$res->free();
$mysqli->close();

 $data .=']';
$data = chop($data,   ',]');
echo $data.']';
// echo $user_id;




 ?>