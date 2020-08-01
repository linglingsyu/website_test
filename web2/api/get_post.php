<?php
include_once "../base.php";

$list = $News->find(["id"=>$_GET['id']]);
echo nl2br($list['text']);
?>