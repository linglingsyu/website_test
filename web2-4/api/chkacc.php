<?php

include_once "../base.php";

$row = $User->find(['acc'=>$_POST['acc']]);
if(empty($row)){
  echo 0;
}else{
  echo 1;
}

?>