<?php
print_r($_POST);
include_once "../base.php";
$Ord->del([$_POST['type']=>$_POST['data']]);

?>