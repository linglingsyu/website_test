<?php
include_once "../base.php";
// print_r($_POST);
$Ord->del([$_POST['type']=>$_POST['data']]);


?>