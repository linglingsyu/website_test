<?php

include_once "../base.php";
if($_POST['acc'] != "admin"){
    $row = $Member->find(['acc'=>$_POST['acc']]);
  if(empty($row)){
    echo 0;
  }else{
    echo 1;
  }
}


?>