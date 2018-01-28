<?php
    // 如果你使用php的依赖安装。可以使用以下方法自动载入
    require 'vendor/autoload.php';
    // Using Medoo namespace
    use Medoo\Medoo; 
     
    // 初始化配置
    $database = new medoo(require 'databaseconf.php'
    );
     
    return $database;

