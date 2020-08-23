<?php

include_once "../base.php";


if(empty($_POST['id'])){
  $data['acc'] = $_POST['acc'];
  $data['pw'] = $_POST['pw'];
  $User->save($data);
}else{
  foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
      $User->del($id);
    }else{
      $row = $User->find($id);
      $row['acc'] = $_POST['acc'][$key];
      $row['pw'] = $_POST['pw'][$key];
      $User->save($row);
    }
  }
}

to("../admin.php?do=user");
?>