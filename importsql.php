<?php


$_sql = file_get_contents('tang_poetry.sql');
 
$_arr = explode(';', $_sql);
//执行sql语句
foreach ($_arr as $_value) {
    echo '执行'.$_value;
    echo '</br>';
    $data->query($_value.';');
}
$tables=$data->query('SHOW TABLES LIKE "poets"')->fetchAll();
echo '执行完毕';
print_r($tables);
