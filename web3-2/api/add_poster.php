<?php
include_once "../base.php";
if(!empty($_FILES['img']['tmp_name'])){
  $_POST['img'] = $_FILES['img']['name'];
}
$Poster->save($_POST);

to("../admin.php?do=poster")







?>