<?php
include_once "../base.php";
$row = $News->find($_POST['id']);
switch($_POST['type']){
  case 1:
    $row['good']++;
    $News->save($row);
    $Log->save(['news'=>$row['id'],'user'=>$_POST['user']]);
  break;
  case 2:
    $row['good']--;
    $News->save($row);
    $Log->del(['news'=>$row['id'],'user'=>$_POST['user']]);
  break;
}


?>