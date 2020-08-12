<?php

include_once "../base.php";

    $row = $Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
  if(empty($row)){
    echo 0;
  }else{
    $_SESSION['admin'] = $_POST['acc'];
    echo 1;
  }


?>