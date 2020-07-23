<?php
include_once "../base.php";

$db = new DB("user");
foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $db->del($id);
  }else{
    $row = $db->find($id);
    $row['acc'] = $_POST['acc'][$key];
    $row['pw'] = $_POST['pw'][$key];
    $db->save($row);
  }
}
to("../admin.php?do=user");




