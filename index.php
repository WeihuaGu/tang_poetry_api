<?php
require 'vendor/autoload.php';

$database=require 'database.php';
Flight::set('database', $database);
Flight::route('/', function(){
    echo '你好，唐诗!';
});

//数据库相关路由
require 'routedatabase.php';

//诗歌相关路由
require 'routepoetry.php';
Flight::start();
