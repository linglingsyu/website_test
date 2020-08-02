<?php
include_once "../base.php";

if(!empty($_POST)){
  echo $User->save($_POST);
}

?>