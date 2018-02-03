<?php

if($_ENV['MYSQL_DBNAME']!=null){
 
return 
[
        'database_type' => 'mysql',
        'database_name' => $_ENV['MYSQL_DBNAME'],
        'server' => $_ENV['MYSQL_HOST'],
        'username' => $_ENV['MYSQL_USERNAME'],
        'password' =>$_ENV['MYSQL_PASSWORD'],
        'port' => $_ENV['MYSQL_PORT'],
        'charset' => 'utf8'
    ];
}else

return 
[
        'database_type' => 'mysql',
        'database_name' => 'tang_poetry',
        'server' => 'localhost',
        'username' => 'root',
        'password' => '1992',
        'charset' => 'utf8'
    ];

