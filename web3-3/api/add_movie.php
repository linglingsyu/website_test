<?php

include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
  $row['img'] =  $_FILES['img']['name'];
}

if(!empty($_FILES['mv']['tmp_name'])){
  $row['mv'] =  $_FILES['mv']['name'];
}
$row['name'] = $_POST['name'];
$row['class'] = $_POST['class'];
$row['length'] = $_POST['length'];
$row['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$row['boss'] = $_POST['boss'];
$row['director'] = $_POST['director'];
$row['intro'] = $_POST['intro'];

$Movie->save($row);
to("../admin.php?do=movie");


?>