<?php

include_once "../base.php";

if(!empty($_POST['id'])){
  $data = $Mvim->find($_POST['id']);
}else{
  $data = [];
}
if(!empty($_FILES['img']['tmp_name'])){
  $filename = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
  $data['img'] = $filename;
}

$Mvim->save($data);

to("../admin.php?do=mvim");

?>