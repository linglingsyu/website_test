<?php

include_once "../base.php";

$row = $Member->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if(empty($row)){
  echo 0;
}else{
  echo 1;
  $_SESSION['mem'] = $_POST['acc'];
}
?>
