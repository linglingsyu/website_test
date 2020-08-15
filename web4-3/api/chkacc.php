<?php

include_once "../base.php";
$res = $Member->find(['acc'=>$_POST['acc']]);
if(empty($res)){
  echo 0;
}else{
  echo 1;
}

?>