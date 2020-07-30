<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del'] && in_array($id,$_POST['del']))){
    $User->del($id);
  }else{
    $data = $User->find($id);
    if(!empty($_POST['acc']) && !empty($_POST['pw'])){
      $data['acc'] = $_POST['acc'][$key];
      $data['pw'] = $_POST['pw'][$key];
    }
    $User->save($data);
  }
}

to("../admin.php?do=admin");

?>