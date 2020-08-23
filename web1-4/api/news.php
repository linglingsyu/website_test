<?php

include_once "../base.php";


if(empty($_POST['id'])){
  $data['text'] = $_POST['text'];
  $News->save($data);
}else{
  foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
      $News->del($id);
    }else{
      $row = $News->find($id);
      $row['text'] = $_POST['text'][$key];
      if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
        $row['sh'] = 1;
      }else{
        $row['sh'] = 0;
      }
      $News->save($row);
    }
  }
}

to("../admin.php?do=news");
?>