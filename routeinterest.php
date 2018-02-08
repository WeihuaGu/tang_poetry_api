<?php
require 'tabletoarray.php';

use Phpml\Classification\NaiveBayes;
function interestrandomdisplay($data,$num) {
 $recoders=new tabletoarray();
if($num==NULL)
print_r($recoders->random($data,NULL));
else
print_r($recoders->random($data,$num));
                 
}
function interestrandomhandlewithjson($data,$num){
$recoders=new tabletoarray();
if($num==NULL)
echo Flight::json($recoders->random($data,NULL));
else
echo Flight::json($recoders->random($data,$num));
               

}


Flight::route('/interest/randomrecords(/@num:[0-9]{1,500})(/@display)',function($num,$display){

$data=Flight::get('database');

if($display!=NULL)
        interestrandomdisplay($data,$num);
else
        interestrandomhandlewithjson($data,$num);
});



function mb_str_split($str){  
    return preg_split('/(?<!^)(?!$)/u', $str );  
}  
function  interestlikewhodisplay($data,$sentence){

$sentencearray = mb_str_split($sentence);
$weidu=count($sentencearray);

$recoders=new tabletoarray();
$dataset=$recoders->random($data,1000);
$samples=array();
$labels=array();
foreach ($dataset as $record){
if($record['content']!=NULL && $record['name']){

$contentarray = mb_str_split($record['content']);
//$contentset=array_unique($contentarray);
$rand_keys=array_rand($contentarray,$weidu);
$rand_contentarray=array();
foreach ($rand_keys as $randnum){
array_push($rand_contentarray,$contentarray[$randnum]);
}
array_push($samples,$rand_contentarray);
array_push($labels,$record['name']);
}
}

$classifier = new NaiveBayes();
$classifier->train($samples, $labels);
$test=$classifier->predict($sentencearray);
echo '与你接近的诗人是：';
echo $test;

}

function  interestlikewhohandlewithjson($data,$sentence){
$sentencearray = mb_str_split($sentence);
$weidu=count($sentencearray);

$recoders=new tabletoarray();
$dataset=$recoders->random($data,1000);
$samples=array();
$labels=array();
foreach ($dataset as $record){
if($record['content']!=NULL && $record['name']){

$contentarray = mb_str_split($record['content']);
//$contentset=array_unique($contentarray);
$rand_keys=array_rand($contentarray,$weidu);
$rand_contentarray=array();
foreach ($rand_keys as $randnum){
array_push($rand_contentarray,$contentarray[$randnum]);
}
array_push($samples,$rand_contentarray);
array_push($labels,$record['name']);
}
}

$classifier = new NaiveBayes();
$classifier->train($samples, $labels);
$test=$classifier->predict($sentencearray);
echo Flight::json(array("author"=>$test));
}
Flight::route('/interest/likewho/@sentence(/@display)',function($sentence,$display){

$data=Flight::get('database');

if($display!=NULL)
        interestlikewhodisplay($data,$sentence);
else
        interestlikewhohandlewithjson($data,$sentence);
});
