<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type:application/json');
header('Content-type:text/html; charset="utf-8"');
  $index = $_GET['point'];
  // $data = array();
  $data = '';



$mysqli = new mysqli("localhost", "madpotat_root", "Qw78As45Zx12", "madpotat_anrex");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->real_query('SET NAMES utf8');
 $mysqli->real_query('SELECT product.*, collection.* FROM product, collection WHERE product.collection_ID = collection.collection_ID  AND collection.collection_ID = "'.$index.'"');
 $res = $mysqli->use_result();

 
$data = '[';
while ($row = $res->fetch_assoc())
 {

  $data .= '{"product_ID":"'.$row["product_ID"].'",
    "collection_ID":"'.$row["collection_ID"].'",
    "collection_name":"'.$row["collection_name"].'",
    "article_num": "'.$row["article_num"].'",
    "product_name": "'.$row["product_name"].'",
    "product_info": "'.$row["product_info"].'",
    "product_img": "'.$row["product_img"].'",
    "product_price": "'.$row["product_price"].'"

  },';

}


$data = mb_substr($data,0,-1);
$data .=']';
$data = chop($data,   ',]');
echo $data.']';



 ?>
