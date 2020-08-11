<?php

include_once "../base.php";
if(!empty($_POST['id'])){
  $data = $Title->find($_POST['id']);
}
if(!empty($_FILES['img']['tmp_name'])){
  $file = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img".$file);
  $data['img'] = $file;
}
if(!empty($_POST['text'])){
  $data['text'] = $_POST['text'];
}
$Title->save($data);
to("../admin.php?do=title");

?>