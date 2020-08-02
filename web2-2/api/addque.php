<?php
include_once "../base.php";

$Que->save(['text'=>$_POST['name'],'parent'=>0]);
$row = $Que->find(['text'=>$_POST['name'],'parent'=>0]);

foreach($_POST['text'] as $text){
  $Que->save(['text'=>$text,'parent'=>$row['id']]);
}

to("../admin.php?do=que");
?>