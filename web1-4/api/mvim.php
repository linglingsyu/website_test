<?php

include_once "../base.php";
if(empty($_POST['id'])){
  $data = [];
}else{
  $data = $Mvim->find($_POST['id']);
}

if(!empty($_FILES['img']['tmp_name'])){
  $data['img'] = $_FILES['img']['name'];
}
if(!empty($_POST['text'])){
  $data['text'] = $_POST['text'];
}

$Mvim->save($data);
to("../admin.php?do=mvim");
?>