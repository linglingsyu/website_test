<?php

include_once "../base.php";

if(!empty($_POST['id'])){
  $data = $Goods->find($_POST['id']);
}

if(!empty($_FILES['img']['tmp_name'])){
  $file = $_FILES['img']['name'];
  $data['img'] = $file;
}

$data['big'] = $_POST['big'];
$data['mid'] = $_POST['mid'];
$data['no'] = rand(111111,999999);
$data['name'] = $_POST['name'];
$data['price'] = $_POST['price'];
$data['spec'] = $_POST['spec'];
$data['stock'] = $_POST['stock'];
$data['intro'] = $_POST['intro'];

  $row = $Goods->save($data);
  to("../admin.php?do=th");

?>