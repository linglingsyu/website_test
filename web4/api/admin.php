<?php
include_once "../base.php";
$chk = $Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if(empty($chk)){
  echo 0;
}else{
  echo 1;
  $_SESSION['admin'] = $_POST['acc'];
}
?>