<?php

include_once "../base.php";
if(!empty($_POST['id'])){
  $data = $Ad->find($_POST['id']);
}

if(!empty($_POST['text'])){
  $data['text'] = $_POST['text'];
}

$Ad->save($data);
to("../admin.php?do=ad");

?>