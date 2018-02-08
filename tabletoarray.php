<?php
class tabletoarray{
function random($data,$num) {
    if($num==NULL){
		$query='select poetries.title ,poetries.content ,poets.name from poetries left join poets on poetries.poet_id=poets.id order by rand() limit 50 ;';
		$records=$data->query($query)->fetchAll();
		
		return $records;
        }else{
		$query='select poetries.title ,poetries.content ,poets.name from poetries left join poets on poetries.poet_id=poets.id order by rand() limit '.$num;
		$records=$data->query($query)->fetchAll();
                return $records;
        }
}



}
