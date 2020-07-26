<?php

include_once "../base.php";

if(!empty($_POST['del'])){

  foreach($_POST['del'] as $v){
      $User->del(['id'=>$v]);
  }

}

to("../admin.php?do=user");


?>