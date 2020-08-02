<?php
include_once "../base.php";

$res =  $User->find(['email'=>$_POST['email']]);
if(empty($res)){
  echo 0;
}else{
  echo $res['pw'];
}

?>