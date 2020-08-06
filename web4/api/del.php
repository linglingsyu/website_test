<?php
include_once "../base.php";
$table = new DB( $_POST['table']);
echo $table->del($_POST['id']);

?>