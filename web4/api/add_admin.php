<?php
include_once "../base.php";
$row = $Admin->find($_POST['id']);
$row['acc'] = $_POST['acc'];
$row['pw'] = $_POST['pw'];
$row['pr'] = serialize($_POST['pr']);
$Admin->save($row);
to("../admin.php?do=admin");
?>