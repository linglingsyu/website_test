<?php
include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
  $filename = $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
  $data['img'] = $filename;
}
$data['name'] = $_POST['name'];
$Poster->save($data);
to("../admin.php?do=poster");

?>