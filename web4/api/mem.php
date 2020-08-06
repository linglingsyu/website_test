<?php
include_once "../base.php";
$row = $Member->find($_POST['id']);
$row['acc'] = $_POST['acc'];
$row['pw'] = $_POST['pw'];
$row['name'] = $_POST['name'];
$row['addr'] = $_POST['addr'];
$row['tel'] = $_POST['pw'];
$row['email'] = $_POST['email'];
$Member->save($row);
to("../admin.php?do=mem");
?>