<?php
include_once "../base.php";
$no = rand(111111,999999);
if(!empty($_FILES['img']['tmp_name'])){
  $file = $_FILES['img']['name'];
  $row['img'] = $file;
}
$row['big'] = $_POST['big'];
$row['sec'] = $_POST['sec'];
$row['no'] = $no;
$row['name'] = $_POST['name'];
$row['price'] = $_POST['price'];
$row['spec'] = $_POST['spec'];
$row['stock'] = $_POST['stock'];
$row['intro'] = $_POST['intro'];
$Goods->save($row);
 to("../admin.php?do=th");
?>