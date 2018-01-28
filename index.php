<?php
require 'vendor/autoload.php';

$database=require 'database.php';
Flight::set('database', $database);
Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('/database/info',function(){
$data=Flight::get('database');
$info=$data->info();
foreach($info as $item){
echo $item;
echo '</br>';
}
});
Flight::start();
