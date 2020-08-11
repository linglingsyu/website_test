<?php

include_once "../base.php";
if(!empty($_POST['id'])){
  $data = $Mvim->find($_POST['id']);
}
if(!empty($_FILES['img']['tmp_name'])){
  $file = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img".$file);
  $data['img'] = $file;
}

$Mvim->save($data);
to("../admin.php?do=mvim");

?>