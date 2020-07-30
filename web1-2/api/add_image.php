<?php

include_once "../base.php";

if(!empty($_POST['id'])){
  $data = $Image->find($_POST['id']);
}else{
  $data = [];
}
if(!empty($_FILES['img']['tmp_name'])){
  $filename = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
  $data['img'] = $filename;
}

$Image->save($data);

to("../admin.php?do=image");

?>