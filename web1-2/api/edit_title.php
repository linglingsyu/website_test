<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del'] && in_array($id,$_POST['del']))){
    $Title->del($id);
  }else{
    $data = $Title->find($id);
    if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
      $data['sh'] = 1;
    }else{
      $data['sh'] = 0;
    }
    if(!empty($_POST['text'])){
      $data['text'] = $_POST['text'][$key];
    }
    $Title->save($data);
  }


}

to("../admin.php?do=title");

?>