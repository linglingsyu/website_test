<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);
$db->del($_POST['id']);
?>