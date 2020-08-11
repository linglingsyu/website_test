<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $User->del($id);
  }else{
    $row = $User->find($id);
    $row['pw'] = $_POST['pw'][$key];
    $row['acc'] = $_POST['acc'][$key];
    $User->save($row);
  }

}

to("../admin.php?do=user");

?>