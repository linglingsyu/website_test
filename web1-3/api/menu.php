<?php
include_once "../base.php";
$_POST['parent'] = 0;
$Menu->save($_POST);
to("../admin.php?do=menu");

?>