<?php

function randomdisplay($data,$num) {
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

function randomhandlewithjson($data,$num){
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
        randomdisplay($data,$num);
else
        randomhandlewithjson($data,$num);
});

function namedisplay($data,$name){

$poetries=$data->select("poetries",["title","content"],["title"=>$name]);	
foreach ($poetries as $poetry){
                echo $poetry['title'];
                echo '</br>';
                echo $poetry['content'];
                }



}

function namehandlewithjson($data,$name){
$poetries=$data->select("poetries","*",["title"=>$name]);
                
echo Flight::json($poetries);
}


Flight::route('/poetry/name/@name(/@display)',function($name,$display){

$data=Flight::get('database');

if($display!=NULL)
        namedisplay($data,$name);
else
        namehandlewithjson($data,$name);
});

