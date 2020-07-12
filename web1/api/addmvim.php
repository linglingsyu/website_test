<?php
include_once "../base.php";

$db = new DB("mvim");
if(($_POST['id'])){
  $data = $db->find($_POST['id']); 
}else{
  $data=[];
}
if (!empty($_FILES['img']["tmp_name"])) {
  $filename =  $_FILES['img']["name"];
  move_uploaded_file( $_FILES['img']["tmp_name"],"../img/".$filename);
  $data['img'] = $filename; 
}
$db->save($data);
to("../admin.php?do=mvim");


