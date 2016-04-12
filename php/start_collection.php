<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type:application/json');
header('Content-type:text/html; charset="utf-8"');

$data = '';

$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

 $mysqli->real_query('SELECT * FROM collection WHERE collection_vis = 1');
 $res = $mysqli->use_result();

 $data = '[';
while ($row = $res->fetch_assoc()) {
  $data .= '{
    "collection_ID":"'.$row["collection_ID"].'",
    "collection_img":"'.$row["collection_img"].'",
    "collection_name":"'.$row["collection_name"].'"
  },';
}
 $data .=']';
$data = chop($data,   ',]');
echo $data.']';

 ?>