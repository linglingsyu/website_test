<?php

include_once "../base.php";



foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $Menu->del($id);
  }else{
    $row = $Menu->find($id);
    if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
      $row['sh'] = 1;
    }else{
      $row['sh'] = 0;
    }
    $row['text'] = $_POST['text'][$key];
    $row['link'] = $_POST['link'][$key];
    $Menu->save($row);
  }
}



to("../admin.php?do=menu");
?>