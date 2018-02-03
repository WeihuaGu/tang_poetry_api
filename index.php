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

Flight::route('/database/importsql',function(){
	$data=Flight::get('database'); 
	$isTable =$data->query('SHOW TABLES LIKE "poets"')->fetchAll();
		if( $isTable ){
   			 echo '表存在';
			 print_r($isTable);
		}
		else
   			 require 'importsql.php';
		


});

require 'routepoetry.php';
Flight::start();
