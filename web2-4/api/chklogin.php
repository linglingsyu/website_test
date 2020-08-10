<?php

include_once "../base.php";

$row = $User->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if(empty($row)){
  echo 0;
}else{
  echo 1;
  $_SESSION['user'] = $_POST['acc'];
}

?>