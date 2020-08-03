<?php
include_once "../base.php";
switch($_POST['type']){
case "1":
  $row = $News->find($_POST['id']);
  $row['good']++;
  $News->save($row);
  $Log->save(['user'=>$_POST['user'],'news'=>$_POST['id']]);
break;
case "2":
  $row = $News->find($_POST['id']);
  $row['good']--;
  $News->save($row);
  $Log->del(['user'=>$_POST['user'],'news'=>$_POST['id']]);
break;
}

?>