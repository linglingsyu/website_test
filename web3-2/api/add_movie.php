<?php

include_once "../base.php";

if(!empty($_FILES['mv']['tmp_name'])){
  $data['mv'] = $_FILES['mv']['name'];
}

if(!empty($_FILES['img']['tmp_name'])){
  $data['img'] = $_FILES['img']['name'];
}

$data['date'] = $_POST['year'] . "-".$_POST['month'] . "-" . $_POST['day'];
$data['class'] = $_POST['class'];
$data['length'] = $_POST['length'];
$data['boss'] = $_POST['boss'];
$data['director'] = $_POST['director'];
$data['intro'] = $_POST['intro'];
$data['name'] = $_POST['name'];
$Movie->save($data);

to("../admin.php?do=movie");
 
?>