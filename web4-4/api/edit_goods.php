<?php

include_once "../base.php";
$row = $Goods->find($_POST['id']);
if(!empty($_FILES['img']['tmp_name'])){
  $row['img'] = $_FILES['img']['name'];
}
$row['name'] = $_POST['name'];
$row['price'] = $_POST['price'];
$row['big'] = $_POST['big'];
$row['mid'] = $_POST['mid'];
$row['spec'] = $_POST['spec'];
$row['stock'] = $_POST['stock'];
$row['intro'] = $_POST['intro'];

$Goods->save($_POST);
to("../admin.php?do=th");

?>