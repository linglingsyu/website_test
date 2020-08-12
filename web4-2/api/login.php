<?php

include_once "../base.php";

    $row = $Member->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
  if(empty($row)){
    echo 0;
  }else{
    $_SESSION['mem'] = $_POST['acc'];
    echo 1;
  }


?>