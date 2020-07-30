<?php

include_once "../base.php";

if(!empty($_POST['total'])){
  $Total->save($_POST);
}
to("../admin.php?do=total");

?>