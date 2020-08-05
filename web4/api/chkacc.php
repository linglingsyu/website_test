<?php
include_once "../base.php";

$chk =  $Member->count(['acc'=>$_POST['acc']]);
if(empty($chk)){
  echo 0; 
}else{
  echo 1;
}

?>