<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del'] && in_array($id,$_POST['del']))){
    $Menu->del($id);
  }else{
    $data = $Menu->find($id);
    if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
      $data['sh'] = 1;
    }else{
      $data['sh'] = 0;
    }
    if(!empty($_POST['name'])){
      $data['name'] = $_POST['name'][$key];
    }
    if(!empty($_POST['link'])){
      $data['link'] = $_POST['link'][$key];
    }
    $Menu->save($data);
  }


}

to("../admin.php?do=menu");

?>