<?php

include_once "../base.php";

if(!empty($_POST['bottom'])){
  $Bottom->save($_POST);
}
to("../admin.php?do=bottom");

?>