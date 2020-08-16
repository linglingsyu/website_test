<?php

include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
  $_POST['img'] = $_FILES['img']['name'];
}
$_POST['no'] = rand(111111,999999);
$Goods->save($_POST);
to("?do=th");

?>