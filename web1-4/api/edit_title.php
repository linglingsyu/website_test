<?php

include_once "../base.php";



foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $Title->del($id);
  }else{
    $row = $Title->find($id);
    $row['text'] = $_POST['text'][$key];
    if( $id ==  $_POST['sh']){
      $row['sh'] = 1;
    }else{
      $row['sh'] = 0;
    }
    $Title->save($row);
  }
}



to("../admin.php?do=title");
?>