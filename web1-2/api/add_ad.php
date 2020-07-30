<?php

include_once "../base.php";

if(!empty($_POST['text'])){
  $Ad->save($_POST);
}
to("../admin.php?do=ad");

?>