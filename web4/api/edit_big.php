<?php
include_once "../base.php";
$row = $Type->find($_POST['id']);
$row['name'] = $_POST['big'];
$Type->save($row);
to("../admin.php?do=th");
?>