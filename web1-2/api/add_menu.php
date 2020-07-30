<?php

include_once "../base.php";

if(!empty($_POST['name']) &&!empty($_POST['link'])){
  $Menu->save($_POST);
}
to("../admin.php?do=menu");

?>