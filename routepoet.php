<?php

function listbycreatenumdisplay($data){
$list=$data->query('select poets.name ,count(poetries.id) from poetries left join poets on poetries.poet_id = poets.id group by poets.id order by count(poetries.id) desc limit 50;')->fetchAll();
echo '<table>';
echo '<tr>
  <th>姓名</th>
  <th>创作数量</th>
</tr>';
foreach ($list as $item){
echo '<tr>';
echo '<th>'.$item['name'].'</th>';
echo '<th>'.$item['count(poetries.id)'].'</th>';
echo '</tr>';



}
echo '</table>';


}

function listbycreatenumhandlewithjson($data){
$list=$data->query('select poets.name ,count(poetries.id) from poetries left join poets on poetries.poet_id = poets.id group by poets.id order by count(poetries.id) desc limit 500;')->fetchAll();  
echo Flight::json($list);
}




Flight::route('/poet/list/createnum(/@display)',function($display){

$data=Flight::get('database');

if($display!=NULL)
        listbycreatenumdisplay($data);
else
        listbycreatenumhandlewithjson($data);


});

