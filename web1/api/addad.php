<?php
include_once "../base.php";

$db = new DB("ad");
if(($_POST['id'])){
  $data = $db->find($_POST['id']); 
}else{
  $data=[];
}
$data["text"] = $_POST['text'];
$db->save($data);
to("../admin.php?do=ad");


