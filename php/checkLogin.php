<?php
// header ('Location: ../html/emter.html');
$link = mysql_connect('localhost', 'root');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
    echo 'true';

}
echo 'false';

mysql_close($link);


 ?>
