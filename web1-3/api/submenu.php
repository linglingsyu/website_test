<?php

include_once "../base.php";
foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del'] && in_array($id,$_POST['del']))){
    $Menu->del($id);
  }else{
    $row = $Menu->find($id);
    $row['text'] = $_POST['text'][$key];
    $row['link'] = $_POST['link'][$key];
    $Menu->save($row);
  }
}

if(!empty($_POST['text2'])){
  foreach($_POST['text2'] as $key => $text){
    $data['text'] = $text;
    $data['link'] = $_POST['link2'][$key];
    $data['parent'] = $_POST['parent'];
    $Menu->save($data);
  }
}

to("../admin.php?do=menu");

?>
