<?php

include_once "../base.php";
if(!empty($_POST['id'])){
  $data = $News->find($_POST['id']);
}

if(!empty($_POST['text'])){
  $data['text'] = $_POST['text'];
}

$News->save($data);
to("../admin.php?do=news");

?>