<?php

include_once "../base.php";
$row = $Member->find($_POST['id']);
$row['name'] = $_POST['name'];
$row['email'] = $_POST['email'];
$row['addr'] = $_POST['addr'];
$row['tel'] = $_POST['tel'];
$Member->save($row);
to("../admin.php?do=mem");
?>

