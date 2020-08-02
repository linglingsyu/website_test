<?php
include_once "../base.php";
switch($_POST['type']){
case "1":
  $news = $News->find($_POST['id']);
  $news['good']++;
  $News->save($news);
  $Log->save(['user'=>$_POST['user'],'news'=>$_POST['id']]);
break;

case "2":
$news = $News->find($_POST['id']);
$news['good']--;
$News->save($news);
$Log->del(['user'=>$_POST['user'],'news'=>$_POST['id']]);

break;
}
?>