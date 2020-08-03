<?php
include_once "../base.php";

foreach($_POST['id'] as $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
      $User->del($id);
  }
}

to("../admin.php?do=user");
?>