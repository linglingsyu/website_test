<?php

include_once "../base.php";

switch ($_POST['type']) {
  case 1:
      $Log->save(['news'=>$_POST['id'],'user'=>$_POST['user']]);
      $data = $News->find($_POST['id']);
      $data['good']++;
      $News->save($data);
    break;
  
    case 2:
      $Log->del(['news'=>$_POST['id'],'user'=>$_POST['user']]);
      $data = $News->find($_POST['id']);
      $data['good']--;
      $News->save($data);
    break;

}


?>