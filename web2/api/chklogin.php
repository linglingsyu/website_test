<?php

include_once "../base.php";
$res =  $User->count(["acc"=>$_GET['acc'],"pw"=>$_GET['pw']]);

if($res>=1){
  echo 1;
  $_SESSION['user'] = $_GET['acc'];
}else{
  echo 0;
}


?>