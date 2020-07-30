<?php

include_once "../base.php";

if(!empty($_POST['text'])){
  $News->save($_POST);
}
to("../admin.php?do=news");

?>