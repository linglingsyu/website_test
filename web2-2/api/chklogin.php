<?php
include_once "../base.php";
echo $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);


$_SESSION['user'] = $_POST['acc'];

?>