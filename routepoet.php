<?php
Flight::route('/poetry/random(/@num:[0-9])',function($num){

	$data=Flight::get('database');
        if($num==NULL){
		$poetry=$data->query("select content from poetries order by rand( ) limit 1;")->fetchAll();
		print_r($poetry);
        }else{
		$poetries=$data->query("select content from poetries order by rand( ) limit ".$num.";")->fetchAll();
                print_r($poetries);



        }
 
		


});

