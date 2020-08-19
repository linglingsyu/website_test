<?php

include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
  $data['img'] =  $_FILES['img']['name'];
}
$data['name'] = $_POST['name'];

$Poster->save($data);
to("../admin.php?do=poster");


?>