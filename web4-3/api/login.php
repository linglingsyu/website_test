<?php

include_once "../base.php";
$res = $Member->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if(empty($res)){
  echo 0;
}else{
  echo 1;
  $_SESSION['member'] = $_POST['acc'];
}

?>