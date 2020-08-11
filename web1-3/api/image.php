<?php

include_once "../base.php";
if(!empty($_POST['id'])){
  $data = $Image->find($_POST['id']);
}
if(!empty($_FILES['img']['tmp_name'])){
  $file = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$file);
  $data['img'] = $file;
}

$Image->save($data);
to("../admin.php?do=image");

?>