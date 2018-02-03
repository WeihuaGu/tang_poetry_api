<?php

function display($data,$num) {
    if($num==NULL){
		$poetry=$data->query("select * from poetries order by rand( ) limit 1;")->fetchAll();
		echo $poetry[0]['title'];
		echo '</br>';
		echo $poetry[0]['content'];
        }else{
		$poetries=$data->query("select * from poetries order by rand( ) limit ".$num.";")->fetchAll();       
		foreach ($poetries as $poetry){
		echo $poetry['title'];
                echo '</br>';
                echo $poetry['content'];
		}
        }
}

function handlewithjson($data,$num){
      if($num==NULL){
                $poetry=$data->query("select * from poetries order by rand( ) limit 1;")->fetchAll();

                echo Flight::json($poetry);
        }else{
                $poetries=$data->query("select * from poetries order by rand( ) limit ".$num.";")->fetchAll();
                echo Flight::json($poetries);
                }

}
Flight::route('/poetry/random(/@num:[0-9]{1,99})(/@display)',function($num,$display){

$data=Flight::get('database');

if($display!=NULL)
        display($data,$num);
else
        handlewithjson($data,$num);
});

