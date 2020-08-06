<?php
include_once "../base.php";
$row = $Goods->find($_POST['id']);
if(!empty($_FILES['img']['tmp_name'])){
  $file = $_FILES['img']['name'];
  $row['img'] = $file;
}
$row['big'] = $_POST['big'];
$row['sec'] = $_POST['sec'];
$row['name'] = $_POST['name'];
$row['price'] = $_POST['price'];
$row['spec'] = $_POST['spec'];
$row['stock'] = $_POST['stock'];
$row['intro'] = $_POST['intro'];
$Goods->save($row);
 to("../admin.php?do=th");
?>