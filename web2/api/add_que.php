<?php

include_once "../base.php";

$Que->save(['text'=>$_POST['name'],'parent'=>0]);
$id =  $Que->find(['text'=>$_POST['name']])['id'];


foreach($_POST['item'] as $item){
  $Que->save(['text'=>$item,'parent'=>$id]);
}

to("../admin.php?do=que");


?>