<?php
include_once "../base.php";
 $Que->save(['text'=>$_POST['name'],'parent'=>0]);
$que = $Que->find(['text'=>$_POST['name'],'parent'=>0]);
foreach($_POST['opt'] as  $opt){
  $res = $Que->save(['text'=>$opt,'parent'=>$que['id']]);
}

to("../admin.php?do=que");
?>